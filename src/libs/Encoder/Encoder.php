<?php
/**
 * BONZAI
 * (was phpGuardian)
 *
 * CODE NAME: phoenix
 * VERSION:   0.1
 *
 * URL:       http://www.bonzai-project.org
 * E-MAIL:    info@bonzai-project.org
 *
 * COPYRIGHT: 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * LICENSE:   MIT or GNU GPL 2
 *            The MIT License is recommended for most projects, it's simple and
 *            easy to understand  and it places  almost no restrictions on what
 *            you can do with Bonzai.
 *            If the GPL  suits your project  better you are  also free to  use
 *            Bonzai under that license.
 *            You don't have  to do anything  special to choose  one license or
 *            the other  and you don't have to notify  anyone which license you
 *            are using.  You are free  to use Bonzai in commercial projects as
 *            long as the copyright header is left intact.
 *            <http://www.opensource.org/licenses/mit-license.php>
 *            <http://www.opensource.org/licenses/gpl-2.0.php>
 *
 * PHP version 5
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Core
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

/**
 * Bonzai_Encoder
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Core
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/
class Bonzai_Encoder extends Bonzai_Abstract implements Bonzai_Interface_Task
{
    // {{{ elaborate
    // TODO: The method was modified, then re-check the tests.
    /**
     * Starts the main elaboration of task.
     *
     * @param Bonzai_Utils_Options $options The options of the script.
     *
     * @access public
     * @return void
     */
    public function elaborate(Bonzai_Utils_Options $options)
    {
        $this->getUtils()->printHeader($options, false);

        $files = $this->expandPathsToFiles($options->getOptionParams());
        $files = array_unique($files);
        // TODO: Drop this dependency with Bonzai_Registry.
        Bonzai_Registry::add('total_files', count($files));

        $this->processFileList($options, $files);
    }
    // }}}

    // {{{ processFileList
    // TODO: Write some test on this method for phpUnit.
    /**
     * Process the list of all files to be encoded.
     *
     * @param Bonzai_Utils_Options $options The options of the script.
     * @param array                $files   The files to be encoded.
     *
     * @access protected
     * @return void
     */
    protected function processFileList(
        Bonzai_Utils_Options $options,
        array $files
    ) {
        // TODO: Drop this dependency with Bonzai_Registry.
        Bonzai_Registry::add('skipped_files', array());
        foreach ($files as $filename) {
            try {
                $this->processFile($options, $filename);
            } catch (Bonzai_Exception $e) {
                // TODO: Drop this dependency with Bonzai_Registry.
                Bonzai_Registry::append('skipped_files', $filename);
                $this->getUtils()->error(
                    'Cannot handle the file `%s`.', $filename
                );

                unset($e);
            }
        }
    }
    // }}}

    // {{{ processFile
    // TODO: The method was modified, then re-check the tests.
    /**
     * Process a single file.
     *
     * @param Bonzai_Utils_Options $options  The options of the script.
     * @param string               $filename The file to be encoded.
     *
     * @access protected
     * @throws Bonzai_Exception
     * @return void
     */
    protected function processFile(Bonzai_Utils_Options $options, $filename)
    {
        $filename = $this->getStrVal($filename);

        $this->raiseExceptionIf(
            !is_file($filename),
            array('The file `%s` is invalid.', $filename)
        );

        $this->getUtils()->info('Start encoding file `%s\'.', $filename);

        $bytecode = $this->getByteCode($filename);

        if ($options->getOption('backup') !== null
            && $options->getOption('dry') === null
        ) {
            $this->getUtils()->renameFile($filename);
        }

        if (!empty($bytecode)) {
            $this->saveOutput($options, $filename, $bytecode);
            $this->getUtils()->info('Saved encoded file to `%s`.', $filename);
        }

        if ($options->getOption('quiet') === null && !Bonzai_Utils::$silenced) {
            echo str_repeat('-', 80) . PHP_EOL;
        }
    }
    // }}}

    // {{{ saveOutput
    // TODO: The method was modified, then re-check the tests.
    /**
     * Save the output to file.
     *
     * @param Bonzai_Utils_Options $options  The options of the script.
     * @param string               $filename The filename where save the output.
     * @param string               $bytecode The content to be saved.
     *
     * @access protected
     * @return void
     */
    protected function saveOutput(
        Bonzai_Utils_Options $options,
        $filename, $bytecode
    ) {
        $filename = $this->getStrVal($filename);
        $bytecode = $this->getStrVal($bytecode);

        try {
            if ($options->getOption('dry') === null) {
                $this->getUtils()->putFileContent($filename, $bytecode);
            } else {
                $this->raiseExceptionIf(
                    !is_writable($filename),
                    array('The file `%s` cannot be written.', $filename)
                );
            }
        } catch (Bonzai_Exception $e) {
            // TODO: Drop this dependency with Bonzai_Registry.
            Bonzai_Registry::append('skipped_files', $filename);
            $this->getUtils()->warn(
                'The file `%s` was skipped because cannot be able to save it.',
                $filename
            );

            unset($e);
        }
    }
    // }}}

    // {{{ getByteCode
    /**
     * Retrieve the byte-code from a file.
     *
     * @param string $filename The filename where extract the byte-code.
     *
     * @access protected
     * @return string
     */
    protected function getByteCode($filename)
    {
        $bytecode = null;

        $this->getUtils()->checkFileValidity($filename);

        try {
            $tempnam = tempnam('/tmp', 'BNZ');
            $filehandle = fopen($tempnam, 'w');

            bcompiler_write_header($filehandle);
            bcompiler_write_file($filehandle, $filename);
            bcompiler_write_footer($filehandle);

            fclose($filehandle);

            $bytecode = $this->getUtils()->getFileContent($tempnam);
            unlink($tempnam);
        } catch (Bonzai_Exception $e) {
            // TODO: Drop this dependency with Bonzai_Registry.
            Bonzai_Registry::append('skipped_files', $filename);
            $this->getUtils()->error(
                'Cannot handle the file `%s`.',
                $filename
            );

            unset($e);
        }

        return $bytecode;
    }
    // }}}

    // {{{ expandPathsToFiles
    // TODO: Optimize Cyclomatic Complexity (7).
    /**
     * Convert a mixed array of files and directories in only files.
     *
     * @param array $files The array of mixed values to be converted.
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
                    $scandir   = $this->getUtils()->rScanDir($files[$key]);
                    $new_files = preg_grep('/\.php$/', $scandir);

                    unset($files[$key]);

                    $files = array_merge($files, $new_files);
                } catch (Bonzai_Exception $e) {
                    $this->getUtils()->warn(
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
