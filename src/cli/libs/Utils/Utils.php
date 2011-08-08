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
     * @param  string $filename
     * @throws Bonzai_Exception
     * @return string
     */
    public static function getFilePath($filename)
    {
        $filename = trim($filename);

        if (!empty($filename) && (!file_exists(dirname($filename)) || dirname($filename) == '.')) {
            $filename = getcwd() . '/' . $filename;
        }

        if (!is_readable($filename)) {
            $message = gettext('The file `%s` cannot be opened.');
            throw new Bonzai_Exception(sprintf($message, $filename)); // UNCATCHED
        }

        return $filename;
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
                $message = gettext('The file `%s` cannot be written.');
                throw new Bonzai_Exception(sprintf($message, $backup_filename)); // UNCATCHED
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
        if (!is_readable($base) && !is_executable($base)) {
            $message = gettext('The directory `%s` cannot be opened.');
            throw new Bonzai_Exception(sprintf($message, $base)); // UNCATCHED
        }

        if (!is_array($data)) {
          $data = array();
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
            $message = gettext('The file `%s` cannot be opened.');
            throw new Bonzai_Exception(sprintf($message, $filename)); // UNCATCHED
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
        $filename = trim($filename);

        if (empty($filename) || (file_exists($filename) && !is_writable($filename))) {
            $message = gettext('The file `%s` cannot be written.');
            throw new Bonzai_Exception(sprintf($message, $filename)); // UNCATCHED
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

        $text = vsprintf(gettext($text), $args);

        printf("[%d] %s\n", time(), $text);
    }
    // }}}
}
