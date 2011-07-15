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
class Bonzai_Utils
{
    // {{{ getFilePath
    /**
     * @static
     * @access public
     * @param  string $file
     * @throws Bonzai_Exception
     * @return string
     */
    public static function getFilePath($file)
    {
        if (!file_exists(dirname($file)) || dirname($file) == '.') {
            $file = getcwd() . '/' . $file;
        }

        if (!is_readable($file)) {
            throw new Bonzai_Exception('The file `' . $file . '` cannot be opened'); // UNCATCHED
        } else {
            return $file;
        }
    }
    // }}}

    // {{{ renameFile
    /**
     * @static
     * @access public
     * @param  string  $filename
     * @param  boolean $backup
     * @throws Bonzai_Exception
     * @return void
     */
    public static function renameFile($filename, $backup = true)
    {
        if ($backup) {
            $backup_filename = $filename . '.orig';

            if (!is_writable($backup_filename)) {
                throw new Bonzai_Exception('The file `' . $backup_filename . '` cannot be written'); // UNCATCHED
            }

            file_put_contents($backup_filename, self::getFileContent($filename));
        }
    }
    // }}}

    // {{{ rscandir
    /**
     * @static
     * @access public
     * @param  string $base
     * @param  array  $data
     * @throws Bonzai_Exception
     * @return array
     */
    public static function rscandir($base = '', &$data = array())
    {
        if (!is_readable($base)) {
            throw new Bonzai_Exception('The directory `' . $base . '` cannot be opened'); // UNCATCHED
        }

        $array = array_diff(scandir($base), array('.', '..'));

        foreach($array as $value) {
            $path = $base . '/' . $value;
            if (is_dir($path)) {
                $data[] = $path . '/';
                $data = Bonzai_Utils::rscandir($path, $data);
            } elseif (is_file($path)) {
                $data[] = $path;
            }
        }

        return $data;
    }
    // }}}

    // {{{ getFileContent
    /**
     * @static
     * @access public
     * @param  string $filename
     * @throws Bonzai_Exception
     * @return string
     */
    public static function getFileContent($filename)
    {
        if (!is_readable($filename)) {
            throw new Bonzai_Exception('The file `' . $filename . '` cannot be opened'); // UNCATCHED
        }

        return file_get_contents($filename);
    }
    // }}}

    // {{{ putFileContent
    /**
     * @static
     * @access public
     * @param  string $filename
     * @param  string $content
     * @throws Bonzai_Exception
     * @return string
     */
    public static function putFileContent($filename, $content)
    {
        if (!is_writable($filename)) {
            throw new Bonzai_Exception('The file `' . $filename . '` cannot be written'); // UNCATCHED
        }

        return file_put_contents($filename, $content);
    }
    // }}}

    // {{{ message
    /**
     * @static
     * @access public
     * @return void
     */
    public static function message()
    {
        $args    = func_get_args();
        $text    = array_shift($args);
        $verbose = isset($args[1])
                   ? array_shift($args) : true;

        /* TODO: if (!Bonzai_Script_Parser::$config['SETUP']['SILENT'] || ($verbose && Bonzai_Script_Parser::$config['SETUP']['Bonzai_S_VERBOSE'])) { // TODO: too long
            $gettext_text = _($text);

            //foreach($args as $arg) {
                //$gettext_text = str_replace('%s', $arg, $gettext_text, 1); //TODO: FIX THIS
            //}

            printf("[%d] %s\n", time(), $gettext_text);
        }*/
    }
    // }}}
}
