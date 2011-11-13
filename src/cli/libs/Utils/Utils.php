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
 * @category  Optimization_&_Security
 * @package   Bonzai
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 *            http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version   Release: 0.1
 * @link      http://www.bonzai-project.org
 **/

/**
 * Bonzai_Controller
 *
 * @category  Optimization_&_Security
 * @package   Bonzai
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 *            http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version   Release: 0.1
 * @link      http://www.bonzai-project.org
 **/
class Bonzai_Utils
{
    // {{{ PROPERTIES
    /**
     * @static
     * @access public
     * @var    boolean
     */
    public static $silenced = false;
    // }}}

    // {{{ renameFile
    /**
     * renameFile
     *
     * @param string $filename
     *
     * @static
     * @access public
     * @throws Bonzai_Exception
     * @return void
     */
    public static function renameFile($filename)
    {
        return self::putFileContent(
            $filename . '.orig',
            self::getFileContent($filename)
        );
    }
    // }}}

    // {{{ rScanDir
    /**
     * rScanDir
     *
     * @param string $base
     * @param array  &$data
     *
     * @static
     * @access public
     * @throws Bonzai_Exception
     * @return array
     */
    public static function rScanDir($base = '', &$data = array())
    {
        if (!is_readable($base) && !is_executable($base)) {
            $message = gettext('The directory `%s` cannot be opened.');
            throw new Bonzai_Exception(sprintf($message, $base));
        }

        if (!is_array($data)) {
            $data = array();
        }

        $array = array_diff(scandir($base), array('.', '..'));

        foreach ($array as $value) {
            $path = $base . '/' . $value;
            if (is_dir($path)) {
                $data[] = $path . '/';
                try {
                    $res  = Bonzai_Utils::rScanDir($path, $data);
                    $data = $res;
                } catch (Bonzai_Exception $e) {
                    Bonzai_Utils::message(
                        'The directory `%s` was skipped because not readable.',
                        $path
                    );
                }
            } elseif (is_file($path)) {
                $data[] = $path;
            }
        }

        return $data;
    }
    // }}}

    // {{{ getFileContent
    /**
     * getFileContent
     *
     * @param string $filename
     *
     * @static
     * @access public
     * @throws Bonzai_Exception
     * @return string
     */
    public static function getFileContent($filename)
    {
        if (!is_readable($filename)) {
            $message = gettext('The file `%s` cannot be opened.');
            throw new Bonzai_Exception(sprintf($message, $filename));
        }

        return file_get_contents($filename);
    }
    // }}}

    // {{{ putFileContent
    /**
     * putFileContent
     *
     * @param string $filename
     * @param string $content
     *
     * @static
     * @access public
     * @throws Bonzai_Exception
     * @return string
     */
    public static function putFileContent($filename, $content)
    {
        $filename = trim($filename);

        if (empty($filename)
            || (file_exists($filename)
            && !is_writable($filename))
        ) {
            $message = gettext('The file `%s` cannot be written.');
            throw new Bonzai_Exception(sprintf($message, $filename));
        }

        return file_put_contents($filename, $content);
    }
    // }}}

    // {{{ checkFileValidity
    /**
     * checkFileValidity
     *
     * @param string $filename
     *
     * @static
     * @access public
     * @throws Bonzai_Exception
     * @return void
     */
    public static function checkFileValidity($filename)
    {
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

        $content = Bonzai_Utils::getFileContent($filename);
        if (strpos($content, 'class Bonzai_') !== false) {
            $message = gettext('The file `%s` is not able to be parsed.');
            throw new Bonzai_Exception(sprintf($message, $filename));
        }
    }
    // }}}

    // {{{ info
    /**
     * info
     *
     * @static
     * @access public
     * @return void
     */
    public static function info()
    {
        $parameters = func_get_args();
        array_unshift($parameters, 'info');

        return call_user_func_array(array('Bonzai_Utils', 'message'), $parameters);
    }
    // }}}

    // {{{ message
    /**
     * message
     *
     * @static
     * @access protected
     * @return void
     */
    protected static function message()
    {
        $options    = Bonzai_Registry::get('options');
        $quiet_mode = ($options && $options->getOption('quiet') !== null);
        if (!self::$silenced && !$quiet_mode) {
            $args = func_get_args();
            $type = array_shift($args);
            $text = array_shift($args);

            $text = vsprintf(gettext($text), $args);

            $prefix = '[' . date('H:i:s') . '] ';
            $prefix_len = strlen($prefix);

            $string = PHP_EOL . str_repeat(' ', $prefix_len);
            $text = wordwrap($text, 80 - $prefix_len, $string, true);

            $use_stderr = ($options && $options->getOption('stderr') !== null);

            $message = $prefix . $text . PHP_EOL;
            $std = ($use_stderr && $type == 'error')
                   ? 'php://stderr'
                   : 'php://stdout';

            file_put_contents($std, $message);
        }
    }
    // }}}

    // {{{ warn
    /**
     * warn
     *
     * @static
     * @access public
     * @return void
     */
    public static function warn()
    {
        $parameters = func_get_args();
        array_unshift($parameters, 'warn');

        return call_user_func_array(array('Bonzai_Utils', 'message'), $parameters);
    }
    // }}}

    // {{{ error
    /**
     * error
     *
     * @static
     * @access public
     * @return void
     */
    public static function error()
    {
        $parameters = func_get_args();
        array_unshift($parameters, 'error');

        return call_user_func_array(array('Bonzai_Utils', 'message'), $parameters);
    }
    // }}}
}
