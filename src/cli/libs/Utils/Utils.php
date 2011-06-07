<?php
/**
 *        _            ____                     _ _             ____
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian CLI
 *
 *
 * PHPGUARDIAN2
 *
 * CODE NAME:      phoenix
 * ENGINE VERSION: 4.0
 * MODULE VERSION: 1.0
 *
 * URL:            http://www.phpguardian.org
 * E-MAIL:         info@phpguardian.org
 *
 * COPYRIGHT:      2006-2011 Fabio Cicerchia
 * LICENSE:        GNU GPL 3+
 *                 This program is free software: you can redistribute it and/or
 *                 modify it under the terms of the GNU General Public License
 *                 as published by the Free Software Foundation, either version
 *                 3 of the License, or (at your option) any later version.
 *
 *                 This program is distributed in the hope that it will be
 *                 useful, but WITHOUT ANY WARRANTY; without even the implied
 *                 warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *                 PURPOSE. See the GNU General Public License for more details.
 *
 *                 You should have received a copy of the GNU General Public
 *                 Licensealong with this program. If not, see
 *                 <http://www.gnu.org/licenses/>.
 *
 * $Id$
 **/

/**
 *
 * @category  Security
 * @package   phpGuardian
 * @version   4.0
 * @author    Fabio Cicerchia <info@phpguardian.org>
 * @copyright 2006-2011 Fabio Cicerchia
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt GNU GPL 3.0
 * @link      http://www.phpguardian.org
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

        if (!PG_Script_Parser::$config['SETUP']['SILENT'] || ($verbose && PG_Script_Parser::$config['SETUP']['PG_S_VERBOSE'])) { // TODO: too long
            $gettext_text = _($text);

            //foreach($args as $arg) {
                //$gettext_text = str_replace('%s', $arg, $gettext_text, 1); //TODO: FIX THIS
            //}

            printf("[%d] %s\n", time(), $gettext_text);
        }
    }
    // }}}
    // }}}
}
