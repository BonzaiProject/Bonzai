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
        $this->expandPathsToFiles($files);

        try {
            foreach($files as $filename) {
                $this->processFile($filename);
            }
        } catch (Bonzai_Exception $e) {
            // TODO: The file `%s` is invalid.
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

        Bonzai_Utils::message('Start encoding file `%s\'.', $filename);

        $bytecode = $this->getByteCode($filename);

        //Bonzai_Utils::renameFile($filename, $backup = true); // TODO: ???

        Bonzai_Utils::message("Saving %s bytes...", strlen($bytecode));

        $this->saveOutput($filename, $bytecode);
    }
    // }}}

    // {{{ saveOutput
    /**
     * @access public
     * @param  string $filename
     * @param  string $bytecode
     * @return void
     */
    public function saveOutput($filename, $bytecode)
    {
        $bytecode = wordwrap($bytecode, 80, PHP_EOL . "             ", true);
        $content  = '<' . '?php' . PHP_EOL . PHP_EOL . '# BONZAI START BLOCK #####' . PHP_EOL;
        $content .= 'bonzai_exec("' . $bytecode . '");';
        $content .= PHP_EOL . '# BONZAI END BLOCK #######' . PHP_EOL . '?' . '>';

        try {
            Bonzai_Utils::putFileContent($filename, $content);
        } catch (Bonzai_Exception $e) {
            Bonzai_Utils::message('The file `%s` was skipped because cannot be able to save it.', $filename);
            Bonzai_Registry::append('skipped_files', $filename, Bonzai_Registry::ARRAY_APPEND);
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

        try {
            $bytecode = bonzai_get_bytecode($filename); // TODO: into ext
        } catch (Bonzai_Exception $e) {
            Bonzai_Registry::append('skipped_files', $filename, Bonzai_Registry::ARRAY_APPEND);
            Bonzai_Utils::message('Cannot handle the file `%s`.', $filename);
        }

        return $bytecode;
    }
    // }}}

    // {{{ expandPathsToFiles
    /**
     * @access protected
     * @return void
     */
    protected function expandPathsToFiles($files)
    {
        $cloned = $files; // TODO: Executed 0 times
        foreach($cloned as $key => $path) { // TODO: Executed 0 times
            $files[$key] = realpath(getcwd() . '/' . $path); // TODO: Executed 0 times
            $path        = $files[$key]; // TODO: Executed 0 times

            try {
                if (is_dir($path)) { // TODO: Executed 0 times
                    unset($files[$key]); // TODO: Executed 0 times
                    $new_files = preg_grep('/\.php$/', Bonzai_Utils::rscandir($path)); // TODO: Executed 0 times
                    array_merge($files, $new_files); // TODO: Executed 0 times
                }
            } catch (Bonzai_Exception $e) {
                Bonzai_Utils::message('The directory `%s` was skipped because not readable.', $path); // TODO: Executed 0 times
            }
        }
    }
    // }}}
}
