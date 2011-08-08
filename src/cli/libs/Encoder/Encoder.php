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
            // The file `%s` is invalid.
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

        //Bonzai_Utils::renameFile($filename, $backup = true); // ???

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
        $cloned = $files;
        foreach($cloned as $key => $path) {
            $files[$key] = realpath(getcwd() . '/' . $path);
            $path        = $files[$key];

            try {
                if (is_dir($path)) {
                    unset($files[$key]);
                    $new_files = preg_grep('/\.php$/', Bonzai_Utils::rscandir($path));
                    array_merge($files, $new_files);
                }
            } catch (Bonzai_Exception $e) {
                Bonzai_Utils::message('The directory `%s` was skipped because not readable.', $path);
            }
        }
    }
    // }}}
}

#############################################################################################

function bonzai_get_bytecode($filename) {
    if (empty($filename) || !file_exists($filename)) {
        $message = gettext('The file `%s` is invalid.');
        throw new Bonzai_Exception(sprintf($message, $filename));
    }

    if (!is_readable($filename)) {
        $message = gettext('The file `%s` is not readable.');
        throw new Bonzai_Exception(sprintf($message, $filename));
    }

    if (filesize($filename) == 0) {
        $message = gettext('The file `%s` is empty.');
        throw new Bonzai_Exception(sprintf($message, $filename));
    }

    $fh = fopen('/tmp/phb.phb', 'w');
    //bcompiler_write_header($fh);
    bcompiler_write_file($fh, $filename);
    //bcompiler_write_footer($fh);
    fclose($fh);

    $content = Bonzai_Utils::getFileContent('/tmp/phb.phb');
    unlink('/tmp/phb.phb');

    $content = convert_to_hex(gzcompress($content, 9));
    $content = base64_encode(gzcompress($content, 9));

    return $content;
}

function convert_to_hex($string) {
  $hex = '';
  $len = strlen($string);
  for($i = 0; $i < $len; $i++) {
    $hex .= str_pad(dechex(ord($string[$i])), 2, '0', STR_PAD_LEFT);
  }

  return strtoupper($hex);
}
