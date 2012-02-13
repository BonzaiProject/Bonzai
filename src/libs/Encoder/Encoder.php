<?php
/**
 * BONZAI
 * (was phpGuardian)
 *
 * CODENAME:  caffeine
 * VERSION:   0.2
 *
 * URL:       http://www.bonzai-project.org
 * E-MAIL:    info@bonzai-project.org
 *
 * COPYRIGHT: 2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
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
 * @copyright  2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

/**
 * BonzaiEncoder
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Core
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/
class BonzaiEncoder extends BonzaiAbstract implements BonzaiTaskInterface
{
    // {{{ PROPERTIES
    /**
     * The counter of total parsed files.
     *
     * @access protected
     * @var    integer
     */
    protected $total_files = 0;

    /**
     * The counter of total skipped files.
     *
     * @access protected
     * @var    array
     */
    protected $skipped_files = array();
    // }}}

    // {{{ setOptions
    /**
     * Set the script's options.
     *
     * @param BonzaiUtilsOptions $options The script's options.
     *
     * @access public
     * @return void
     */
    public function setOptions(BonzaiUtilsOptions $options)
    {
        $this->options = $options;
    }
    // }}}

    // {{{ elaborate
    /**
     * Start the main elaboration of task.
     *
     * @access public
     * @return void
     */
    public function elaborate()
    {
        $this->getUtils($this->options)->printHeader();

        $files = $this->expandPathsToFiles($this->options->getOptionParams());
        $files = array_unique($files);

        $this->total_files = count($files);
        $this->processFileList($files);
    }
    // }}}

    // {{{ processFileList
    /**
     * Process the list of all files to be encoded.
     *
     * @param array $files The files to be encoded.
     *
     * @access protected
     * @return void
     */
    protected function processFileList(array $files)
    {
        foreach ($files as $filename) {
            try {
                $this->processFile($filename);
            } catch (BonzaiException $e) {
                array_push($this->skipped_files, $filename);
                $this->getUtils()->error('Cannot handle the file `%s`.', $filename);
            }
        }
    }
    // }}}

    // {{{ processFile
    /**
     * Process a single file.
     *
     * @param string $filename The file to be encoded.
     *
     * @access protected
     * @throws BonzaiException
     * @return void
     */
    protected function processFile($filename)
    {
        if (is_file($filename) === false) {
            throw new BonzaiException(sprintf(gettext('The file `%s` is invalid.'), $filename));
        }

        $this->getUtils()->info('Start encoding file `%s\'.', $filename);

        $bytecode = $this->getByteCode($filename);

        if ($this->options->getOption('backup') !== null
            && $this->options->getOption('dry') === null
        ) {
            $this->getUtils()->backupFile($filename);
        }

        if (empty($bytecode) === false) {
            $this->saveOutput($filename, $bytecode);
            $this->getUtils()->info('Saved encoded file to `%s`.', $filename);
        }

        if (BonzaiUtils::$silenced === false) {
            echo str_repeat('-', 80) . PHP_EOL;
        }
    }
    // }}}

    // {{{ saveOutput
    /**
     * Save the output to file.
     *
     * @param string $filename The filename where save the output.
     * @param string $bytecode The content to be saved.
     *
     * @access protected
     * @throws BonzaiException
     * @return void
     */
    protected function saveOutput($filename, $bytecode)
    {
        try {
            if ($this->options->getOption('dry') === null) {
                $this->getUtils()->putFileContent($filename, $bytecode);
            } else {
                if (is_writable($filename) === false) {
                    throw new BonzaiException(sprintf(gettext('The file `%s` cannot be written.'), $filename));
                }
            }
        } catch (BonzaiException $e) {
            array_push($this->skipped_files, $filename);
            $this->getUtils()->warn('The file `%s` was skipped because cannot be able to save it.', $filename);
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
            $tempnam    = tempnam($this->getTempDir(), 'BNZ');
            $filehandle = fopen($tempnam, 'w');

            bcompiler_set_filename_handler('basename');
            bcompiler_write_header($filehandle);
            bcompiler_write_file($filehandle, $filename);
            bcompiler_write_footer($filehandle);

            $bytecode = $this->getUtils()->getFileContent($tempnam);
        } catch (BonzaiException $e) {
            array_push($this->skipped_files, $filename);
            $this->getUtils()->error('Cannot handle the file `%s`.', $filename);
        }

        if ($filename !== null) {
            fclose($filehandle);
        }

        unlink($tempnam);

        return $bytecode;
    }
    // }}}

    // {{{ expandPathsToFiles
    /**
     * Convert a mixed array of files and directories in one with only files.
     *
     * @param array $files The array of mixed values to be converted.
     *
     * @access protected
     * @return array
     */
    protected function expandPathsToFiles($files)
    {
        if (is_array($files) === false) {
            return array();
        }

        $cloned = $files;
        foreach ($cloned as $key => $path) {
            $files[$key] = realpath(getcwd() . DIRECTORY_SEPARATOR . $path) === true
                           ? realpath(getcwd() . DIRECTORY_SEPARATOR . $path)
                           : realpath($path);

            if ($files[$key] === false) {
                unset($files[$key]);
                continue;
            }

            if (is_dir($files[$key]) === true) {
                try {
                    $scandir   = $this->getUtils()->recursiveScanDir($files[$key]);
                    $new_files = preg_grep('/\.php$/', $scandir);

                    unset($files[$key]);

                    $files = array_merge($files, $new_files);
                } catch (BonzaiException $e) {
                    $this->getUtils()->warn('The directory `%s` was skipped because not readable.', $files[$key]);
                }
            }
        }

        return $files;
    }
    // }}}

    // {{{ getTotalFiles
    /**
     * Get number of elaborated files.
     *
     * @access public
     * @return integer
     */
    public function getTotalFiles()
    {
        return $this->total_files;
    }
    // }}}

    // {{{ getSkippedFiles
    /**
     * Get number of skipped files.
     *
     * @access public
     * @return integer
     */
    public function getSkippedFiles()
    {
        return $this->skipped_files;
    }
    // }}}
}
