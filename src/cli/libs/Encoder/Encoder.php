<?php
/**
 * BONZAI
 * (was phpGuardian)
 *
 * CODE NAME:  phoenix
 * VERSION:    0.1
 *
 * URL:        http://www.bonzai-project.org
 * E-MAIL:     info@bonzai-project.org
 *
 * COPYRIGHT:  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * LICENSE:    MIT or GNU GPL 2
 *             The MIT License is recommended for most projects, it's simple and
 *             easy to understand  and it places  almost no restrictions on what
 *             you can do with Bonzai.
 *             If the GPL  suits your project  better you are  also free to  use
 *             Bonzai under that license.
 *             You don't have  to do anything  special to choose  one license or
 *             the other  and you don't have to notify  anyone which license you
 *             are using.  You are free  to use Bonzai in commercial projects as
 *             long as the copyright header is left intact.
 *             <http://www.opensource.org/licenses/mit-license.php>
 *             <http://www.opensource.org/licenses/gpl-2.0.php>
 **/

/**
 * @category  Optimization & Security
 * @package   Bonzai
 * @version   0.1
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @license   http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link      http://www.bonzai-project.org
 */
class Bonzai_Encoder
{
    // {{{ elaborate
    /**
     * @access public
     * @param  array $files
     * @return void
     */
    public function elaborate($files)
    {
        $options    = Bonzai_Registry::get('options');
        $quiet_mode = ($options && $options->getOption('quiet') !== null);
        if (!$quiet_mode) {
            echo str_repeat('-', 80) . PHP_EOL;
            echo 'BONZAI' . str_repeat(' ', 50);
            echo gettext('(previously phpGuardian)') . PHP_EOL;
            echo str_repeat('-', 80) . PHP_EOL;
        }

        $files = $this->expandPathsToFiles($files);
        $files = array_unique($files);

        foreach($files as $filename) {
            try {
                $this->processFile($filename);
            } catch (Bonzai_Exception $e) {
                Bonzai_Registry::append('skipped_files', $filename, Bonzai_Registry::ARRAY_APPEND);
                Bonzai_Utils::error('Cannot handle the file `%s`.', $filename);
            }
        }
    }
    // }}}

    // {{{ processFile
    /**
     * @access public
     * @param  string $filename
     * @throws Bonzai_Exception
     * @return void
     */
    public function processFile($filename)
    {
        if (empty($filename) || !file_exists($filename)) {
            $message = gettext('The file `%s` is invalid.');
            throw new Bonzai_Exception(sprintf($message, $filename));
        }

        Bonzai_Utils::info('Start encoding file `%s\'.', $filename);

        $bytecode = $this->getByteCode($filename);

        $options = Bonzai_Registry::get('options');
        $backup  = ($options && $options->getOption('backup') !== null);
        if ($backup) {
            Bonzai_Utils::renameFile($filename);
        }

        if (!empty($bytecode)) {
            $this->saveOutput($filename, $bytecode);
            Bonzai_Utils::info("Saved encoded file to `%s'.", $filename);
        }

        $quiet_mode = ($options && $options->getOption('quiet') !== null);
        if (!$quiet_mode) {
            echo str_repeat('-', 80) . PHP_EOL;
        }
    }
    // }}}

    // {{{ saveOutput
    /**
     * @access protected
     * @param  string $filename
     * @param  string $bytecode
     * @return void
     */
    protected function saveOutput($filename, $bytecode)
    {
        $options = Bonzai_Registry::get('options');
        $dry_run = ($options && $options->getOption('dry') !== null);
        try {
            if (!$dry_run) {
                Bonzai_Utils::putFileContent($filename, $bytecode);
            } elseif (!is_writable($filename)) {
                $message = gettext('The file `%s` cannot be written.');
                throw new Bonzai_Exception(sprintf($message, $filename));
            }
        } catch (Bonzai_Exception $e) {
            Bonzai_Registry::append('skipped_files', $filename, Bonzai_Registry::ARRAY_APPEND);
            Bonzai_Utils::warn('The file `%s` was skipped because cannot be able to save it.', $filename);
        }
    }
    // }}}

    // {{{ getByteCode
    /**
     * @access public
     * @param  string $filename
     * @return string
     */
    public function getByteCode($filename)
    {
        $bytecode = null;

        Bonzai_Utils::checkFileValidity($filename);

        try {
            $tempnam = tempnam('/tmp', 'BNZ');
            $fh = fopen($tempnam, 'w');

            bcompiler_write_header($fh);
            bcompiler_write_file($fh, $this->cleanSource($filename));
            bcompiler_write_footer($fh);

            fclose($fh);

            $bytecode = Bonzai_Utils::getFileContent($tempnam);
            unlink($tempnam);
        } catch (Bonzai_Exception $e) {
            Bonzai_Registry::append('skipped_files', $filename, Bonzai_Registry::ARRAY_APPEND);
            Bonzai_Utils::error('Cannot handle the file `%s`.', $filename);
        }

        return $bytecode;
    }
    // }}}

    // {{{ cleanSource
    /**
     * @access protected
     * @param  string $filename
     * @return string
     */
    protected function cleanSource($filename) // TODO: ADD TEST
    {
        $content = Bonzai_Utils::getFileContent($filename);
        $cleaned = '';

        $commentTokens = array(T_COMMENT);

        if (defined('T_DOC_COMMENT')) {
            $commentTokens[] = T_DOC_COMMENT; // PHP 5
        }

        if (defined('T_ML_COMMENT')) {
            $commentTokens[] = T_ML_COMMENT; // PHP 4
        }

        $tokens = token_get_all($content);

        foreach ($tokens as $token) {
            if (is_array($token)) {
                if (in_array($token[0], $commentTokens)) {
                    continue;
                }

                $token = $token[1];
            }

            $cleaned .= $token;
        }

        $tempnam = tempnam('/tmp', 'BNZ');
        Bonzai_Utils::putFileContent($tempnam, $cleaned);

        return $tempnam;
    }
    // }}}

    // {{{ expandPathsToFiles
    /**
     * @access protected
     * @param  array $files
     * @return void
     */
    protected function expandPathsToFiles($files)
    {
        $cloned = $files;
        foreach($cloned as $key => $path) {
            $files[$key] = realpath(getcwd() . '/' . $path);
            $path        = $files[$key];

            try {
                if (is_dir($path)) {
                    unset($files[$key]);
                    $new_files = preg_grep('/\.php$/', Bonzai_Utils::rscandir($path));
                    $files = array_merge($files, $new_files);
                }
            } catch (Bonzai_Exception $e) {
                Bonzai_Utils::warn('The directory `%s` was skipped because not readable.', $path);
            }
        }

        return $files;
    }
    // }}}
}
