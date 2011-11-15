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
 *
 * PHP version 5
 *
 * @category  Optimization_&_Security
 * @package   Bonzai
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 *            http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version   Release: 0.1
 * @link      http://www.bonzai-project.org
 **/

/**
 * Bonzai_Encoder
 *
 * @category  Optimization_&_Security
 * @package   Bonzai
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 *            http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version   Release: 0.1
 * @link      http://www.bonzai-project.org
 **/
class Bonzai_Encoder
{
    // {{{ elaborate
    /**
     * elaborate
     *
     * @param array $files
     *
     * @access public
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

        $files = array_unique($this->expandPathsToFiles($files));

        foreach ($files as $filename) {
            try {
                $this->processFile($filename);
            } catch (Bonzai_Exception $e) {
                Bonzai_Registry::append(
                    'skipped_files',
                    $filename,
                    Bonzai_Registry::ARRAY_APPEND
                );

                Bonzai_Utils::error('Cannot handle the file `%s`.', $filename);
            }
        }
    }
    // }}}

    // {{{ processFile
    /**
     * processFile
     *
     * @param string $filename
     *
     * @access protected
     * @throws Bonzai_Exception
     * @return boolean
     */
    protected function processFile($filename)
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
     * saveOutput
     *
     * @param string $filename
     * @param string $bytecode
     *
     * @access protected
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
            Bonzai_Registry::append(
                'skipped_files',
                $filename,
                Bonzai_Registry::ARRAY_APPEND
            );

            Bonzai_Utils::warn(
                'The file `%s` was skipped because cannot be able to save it.',
                $filename
            );
        }
    }
    // }}}

    // {{{ getByteCode
    /**
     * getByteCode
     *
     * @param string $filename
     *
     * @access protected
     * @return string
     */
    protected function getByteCode($filename)
    {
        $bytecode = null;

        Bonzai_Utils::checkFileValidity($filename);

        try {
            $tempnam = tempnam('/tmp', 'BNZ');
            $fh = fopen($tempnam, 'w');

            bcompiler_write_header($fh);
            bcompiler_write_file($fh, $filename);
            bcompiler_write_footer($fh);

            fclose($fh);

            $bytecode = Bonzai_Utils::getFileContent($tempnam);
            unlink($tempnam);
        } catch (Bonzai_Exception $e) {
            Bonzai_Registry::append(
                'skipped_files',
                $filename,
                Bonzai_Registry::ARRAY_APPEND
            );

            Bonzai_Utils::error('Cannot handle the file `%s`.', $filename);
        }

        return $bytecode;
    }
    // }}}

    // {{{ expandPathsToFiles
    /**
     * expandPathsToFiles
     *
     * @param array $files
     *
     * @access protected
     * @return array
     */
    protected function expandPathsToFiles($files)
    {
        if (!is_array($files)) {
            return array();
        }

        $cloned = $files;
        foreach ($cloned as $key => $path) {
            $path = realpath(getcwd() . '/' . $path) ?: realpath($path);
            if ($path == false) {
                unset($files[$key]);
            } else {
                $files[$key] = $path;

                try {
                    if (is_dir($path)) {
                        unset($files[$key]);

                        $scandir = Bonzai_Utils::rScanDir($path);
                        $new_files = preg_grep('/\.php$/', $scandir);
                        $files = array_merge($files, $new_files);
                    }
                } catch (Bonzai_Exception $e) {
                    Bonzai_Utils::warn(
                        'The directory `%s` was skipped because not readable.',
                        $path
                    );
                }
            }
        }

        return $files;
    }
    // }}}
}
