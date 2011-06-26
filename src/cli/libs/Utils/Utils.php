<?php
/**
 *
 * BONZAI
 * (was phpGuardian)
 *
 * CODE NAME:      phoenix
 * ENGINE VERSION: 0.1
 * MODULE VERSION: 0.1
 *
 * URL:            http://bonzai.fabiocicerchia.it
 * E-MAIL:         bonzai@fabiocicerchia.it
 *
 * COPYRIGHT:      2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * LICENSE:        MIT or GNU GPL 2
 *                 The MIT License is recommended for most projects, it's simple
 *                 and  easy  to understand and it places almost no restrictions
 *                 on  what  you  can do with bonzai.
 *                 If  the  GPL  suits  your project better you are also free to
 *                 use bonzai under that license.
 *                 You   don't  have  to  do  anything  special  to  choose  one
 *                 license  or  the  other  and  you don't have to notify anyone
 *                 which   license   you   are   using.  You  are  free  to  use
 *                 bonzai  in  commercial  projects  as  long  as  the copyright
 *                 header is left intact.
 *                 <http://www.opensource.org/licenses/mit-license.php>
 *                 <http://www.opensource.org/licenses/gpl-2.0.php>
 **/

/**
 *
 * @category  Security
 * @package   bonzai
 * @version   0.1
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @license   http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link      http://bonzai.fabiocicerchia.it
 */
class PG_Utils
{
    // {{{ METHODS
    // {{{ function getFilePath
    /**
     *
     * @static
     * @access public
     * @param  string $file
     * @throws PG_Exception
     * @return string
     */
    public static function getFilePath($file)
    {
        if (!file_exists(dirname($file)) || dirname($file) == '.') {
            $file = getcwd() . "/$file";
        }

        if (!is_readable($file)) {
            throw new PG_Exception("The file `$file` cannot be opened"); // TODO: BLOCKER ?
        } else {
            return $file;
        }
    }
    // }}}

    // {{{ function rename_file
    /**
     *
     * @static
     * @access public
     * @param  string  $filename
     * @param  boolean $backup
     * @throws PG_Exception
     * @return void
     */
    public static function rename_file($filename, $backup = true)
    {
        if ($backup) {
            $backup_filename = "$filename.orig";

            if (!is_writable($backup_filename)) {
                $message = "The file `$backup_filename` cannot be written";
                throw new PG_Exception($message); // TODO: BLOCKER ?
            }

            file_put_contents($backup_filename, self::getFileContent($filename));
        }
    }
    // }}}

    // {{{ function rscandir
    // TODO: cyclomatic complex: 5
    /**
     *
     * @static
     * @access public
     * @param  string       $base
     * @param  array        $data
     * @throws PG_Exception
     * @return array
     */
    public static function rscandir($base = '', &$data = array())
    {
        if (!is_readable($base)) {
            $message = "The directory `$base` cannot be opened";
            throw new PG_Exception($message); // TODO: BLOCKER ?
        }

        $array = array_diff(scandir($base), array('.', '..'));

        foreach($array as $value) {
            $path = "$base/$value";
            if (is_dir($path)) {
                $data[] = "$path/";
                $data = PG_Utils::rscandir($path, $data);
            } elseif (is_file($path)) {
                $data[] = $path;
            }
        }

        return $data;
    }
    // }}}

    // {{{ function getFileContent
    /**
     *
     * @static
     * @access public
     * @param  string       $filename
     * @throws PG_Exception
     * @return string
     */
    public static function getFileContent($filename)
    {
        if (!is_readable($filename)) {
            $message = "The file `$filename` cannot be opened";
            throw new PG_Exception($message); // TODO: NON BLOCKER
        }

        return file_get_contents($filename);
    }
    // }}}

    // {{{ function putFileContent
    /**
     *
     * @static
     * @access public
     * @param  string       $filename
     * @param  string       $content
     * @throws PG_Exception
     * @return string
     */
    public static function putFileContent($filename, $content)
    {
        if (!is_writable($filename)) {
            $message = "The file `$filename` cannot be written";
            throw new PG_Exception($message); // TODO: BLOCKER ?
        }

        return file_put_contents($filename, $content);
    }
    // }}}

    // {{{ function pg_message
    // TODO: cyclomatic complex: 5
    /**
     *
     * @static
     * @access public
     * @return void
     */
    public static function pg_message()
    {
        $args    = func_get_args();
        $text    = array_shift($args);
        $verbose = isset($args[1])
                   ? array_shift($args) : true;

        /* TODO: if (!PG_Script_Parser::$config['SETUP']['SILENT'] || ($verbose && PG_Script_Parser::$config['SETUP']['PG_S_VERBOSE'])) { // TODO: too long
            $gettext_text = _($text);

            //foreach($args as $arg) {
                //$gettext_text = str_replace('%s', $arg, $gettext_text, 1); //TODO: FIX THIS
            //}

            printf("[%d] %s\n", time(), $gettext_text);
        }*/
    }
    // }}}
    // }}}
}
