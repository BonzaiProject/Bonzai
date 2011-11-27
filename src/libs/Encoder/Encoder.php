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
 * @category   Optimization_and_Security
 * @package    Bonzai
 * @subpackage Encoder
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

/**
 * Bonzai_Encoder
 *
 * @category   Optimization_and_Security
 * @package    Bonzai
 * @subpackage Encoder
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version    Release: 0.1
 * @link       http://www.bonzai-project.org
 **/
class Bonzai_Encoder
{
    // {{{ elaborate
    /**
     * elaborate
     *
     * @param Bonzai_Utils_Options $options
     *
     * @access public
     * @return void
     */
    public function elaborate(Bonzai_Utils_Options $options) // TODO: MODIFIED
    {
        Bonzai_Utils::printHeader($options);

        $files = $this->expandPathsToFiles($options->getOptionParams());
        $files = array_unique($files);
        Bonzai_Registry::add('total_files', count($files));

        Bonzai_Registry::add('skipped_files', array());
        foreach ($files as $filename) {
            try {
                $this->processFile($options, $filename);
            } catch (Bonzai_Exception $e) {
                Bonzai_Registry::append('skipped_files', $filename);
                Bonzai_Utils::error('Cannot handle the file `%s`.', $filename);

                unset($e);
            }
        }
    }
    // }}}

    // {{{ processFile
    // TODO: MODIFIED
    // TODO: Optimize Cyclomatic Complexity (7)
    /**
     * processFile
     *
     * @param Bonzai_Utils_Options $options
     * @param string               $filename
     *
     * @access protected
     * @throws Bonzai_Exception
     * @return boolean
     */
    protected function processFile(Bonzai_Utils_Options $options, $filename)
    {
        $filename = is_array($filename) ? implode('', $filename) : strval($filename);

        if (!is_file($filename)) {
            $message = gettext('The file `%s` is invalid.');
            throw new Bonzai_Exception(sprintf($message, $filename));
        }

        Bonzai_Utils::info('Start encoding file `%s\'.', $filename);

        $bytecode = $this->getByteCode($filename);

        if ($options->getOption('backup') !== null) {
            Bonzai_Utils::renameFile($filename);
        }

        if (!empty($bytecode)) {
            $this->saveOutput($options, $filename, $bytecode);
            Bonzai_Utils::info("Saved encoded file to `%s'.", $filename);
        }

        if ($options->getOption('quiet') === null) {
            echo str_repeat('-', 80) . PHP_EOL;
        }
    }
    // }}}

    // {{{ saveOutput
    // TODO: MODIFIED
    // TODO: Optimize Cyclomatic Complexity (5)
    /**
     * saveOutput
     *
     * @param Bonzai_Utils_Options $options
     * @param string               $filename
     * @param string               $bytecode
     *
     * @access protected
     * @return void
     */
    protected function saveOutput(Bonzai_Utils_Options $options, $filename, $bytecode)
    {
        $filename = is_array($filename) ? implode('', $filename) : strval($filename);
        $bytecode = is_array($bytecode) ? implode('', $bytecode) : strval($bytecode);

        try {
            if ($options->getOption('dry') === null) {
                Bonzai_Utils::putFileContent($filename, $bytecode);
            } elseif (!is_writable($filename)) {
                $message = gettext('The file `%s` cannot be written.');
                throw new Bonzai_Exception(sprintf($message, $filename));
            }
        } catch (Bonzai_Exception $e) {
            Bonzai_Registry::append('skipped_files', $filename);
            Bonzai_Utils::warn(
                'The file `%s` was skipped because cannot be able to save it.',
                $filename
            );

            unset($e);
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
            Bonzai_Registry::append('skipped_files', $filename);
            Bonzai_Utils::error('Cannot handle the file `%s`.', $filename);

            unset($e);
        }

        return $bytecode;
    }
    // }}}

    // {{{ expandPathsToFiles
    // TODO: Optimize Cyclomatic Complexity (7)
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
            $files[$key] = realpath(getcwd() . '/' . $path) ?: realpath($path);

            if ($files[$key] == false) {
                unset($files[$key]);
                continue;
            }

            if (is_dir($files[$key])) {
                try {
                    $scandir   = Bonzai_Utils::rScanDir($files[$key]);
                    $new_files = preg_grep('/\.php$/', $scandir);

                    unset($files[$key]);

                    $files     = array_merge($files, $new_files);
                } catch (Bonzai_Exception $e) {
                    Bonzai_Utils::warn(
                        'The directory `%s` was skipped because not readable.',
                        $files[$key]
                    );

                    unset($e);
                }
            }
        }

        return $files;
    }
    // }}}
}
