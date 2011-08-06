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
     * @throws Bonzai_Exception
     * @return void
     */
    public function elaborate($files)
    {
        $this->expandPathsToFiles($files);

        foreach($files as $filename) {
            $this->processFile($filename);
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
            throw new Bonzai_Exception('The file is invalid'); // UNCATCHED
        }

        Bonzai_Utils::message('Start encoding file `%s\'.', false, $filename);

        $bytecode = $this->getByteCode($filename);

        //Bonzai_Utils::renameFile($filename, $backup = true); // ???

        Bonzai_Utils::message("Saving %s bytes...", true, strlen($bytecode));

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
        $bytecode = wordwrap($bytecode, 80, "\n             ", true);
        $final_content = '<' . '?php' . PHP_EOL . PHP_EOL . '# BONZAI START BLOCK #####' . PHP_EOL;
        $final_content .= 'bonzai_exec("' . $bytecode . '");';
        $final_content .= PHP_EOL . '# BONZAI END BLOCK #######' . PHP_EOL . '?' . '>';

        Bonzai_Utils::putFileContent($filename, $final_content);
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
        $bytecode = bonzai_get_bytecode($filename); // TODO: into ext

        if (empty($bytecode)) {
            Bonzai_Registry::append('skipped_files', $filename, Bonzai_Registry::ARRAY_APPEND);
            Bonzai_Utils::message('ERROR: The generated data is empty.', false);
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

            if (is_dir($path)) {
                unset($files[$key]);
                $new_files = preg_grep('/\.php$/', Bonzai_Utils::rscandir($path));
                array_merge($files, $new_files);
            }
        }
    }
    // }}}
}

#############################################################################################

function bonzai_get_bytecode($filename) {
    if (empty($filename) || !file_exists($filename)) {
        throw new Bonzai_Exception('The file is invalid'); // UNCATCHED
    }

    if (!is_readable($filename)) {
        throw new Bonzai_Exception('The file is not readable'); // UNCATCHED
    }

    if (filesize($filename) == 0) {
        throw new Bonzai_Exception('The file is empty'); // UNCATCHED
    }

    $fh = fopen('/tmp/phb.phb', 'w');
    //bcompiler_write_header($fh);
    bcompiler_write_file($fh, $filename);
    //bcompiler_write_footer($fh);
    fclose($fh);

    $content = file_get_contents('/tmp/phb.phb');
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
