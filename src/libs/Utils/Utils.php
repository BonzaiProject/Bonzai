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
 * @category   Optimization_and_Security
 * @package    Bonzai
 * @subpackage Utils
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

/**
 * Bonzai_Controller
 *
 * @category   Optimization_and_Security
 * @package    Bonzai
 * @subpackage Utils
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version    Release: 0.1
 * @link       http://www.bonzai-project.org
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

    /**
     * @static
     * @access public
     * @var    array
     */
    public static $message_history = array();
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
        $filename = is_array($filename) ? implode('', $filename) : strval($filename);

        self::putFileContent(
            $filename . '.orig',
            self::getFileContent($filename)
        );

        unlink($filename);
    }
    // }}}

    // {{{ rScanDir
    // TODO: Optimize Cyclomatic Complexity (8)
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
    public static function rScanDir($base = '', array &$data = array())
    {
        $base = is_array($base) ? implode('', $base) : strval($base);

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
                    $data = Bonzai_Utils::rScanDir($path, $data);
                } catch (Bonzai_Exception $e) {
                    Bonzai_Utils::message(
                        'The directory `%s` was skipped because not readable.',
                        $path
                    );

                    unset($e);
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
        $filename = is_array($filename) ? implode('', $filename) : strval($filename);
        self::checkFileValidity($filename);

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
        $filename = is_array($filename) ? implode('', $filename) : strval($filename);
        $content = is_array($content) ? implode('', $content) : strval($content);

        self::checkFileValidity($filename, false);

        if (file_exists($filename) && !is_writable($filename)) {
            $message = gettext('The file `%s` cannot be written.');
            throw new Bonzai_Exception(sprintf($message, $filename));
        }

        return file_put_contents($filename, $content);
    }
    // }}}

    // {{{ checkFileValidity
    // TODO: Optimize Cyclomatic Complexity (13)
    /**
     * checkFileValidity
     *
     * @param string  $filename
     * @param boolean $file_exists
     *
     * @static
     * @access public
     * @throws Bonzai_Exception
     * @return void
     */
    public static function checkFileValidity($filename, $file_exists = true)
    {
        $filename = is_array($filename) ? implode('', $filename) : strval($filename);
        $file_exists = is_bool($file_exists) ? $file_exists : true;

        if (empty($filename)
            || !is_string($filename)
            || trim($filename) == ''
            || ($file_exists && !file_exists($filename))
        ) {
            $message = gettext('The file `%s` is invalid.');
            throw new Bonzai_Exception(sprintf($message, $filename));
        }

        if ($file_exists && !is_readable($filename)) {
            $message = gettext('The file `%s` is not readable.');
            throw new Bonzai_Exception(sprintf($message, $filename));
        }

        if ($file_exists && filesize($filename) == 0) {
            $message = gettext('The file `%s` is empty.');
            throw new Bonzai_Exception(sprintf($message, $filename));
        }

        if ($file_exists) {
            $content = file_get_contents($filename);
            if (strpos($content, 'class Bonzai_') !== false) {
                $message = gettext('The file `%s` is not able to be parsed.');
                throw new Bonzai_Exception(sprintf($message, $filename));
            }
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
    // TODO: Optimize Cyclomatic Complexity (17)
    /**
     * message
     *
     * @static
     * @access protected
     * @return void
     */
    protected static function message()
    {
        if (!self::$silenced) {
            $options    = Bonzai_Registry::get('options');
            $quiet_mode = ($options && $options->getOption('quiet') !== null);

            $args = func_get_args();
            $type = array_shift($args);
            $text = array_shift($args);

            if (!is_string($text)) {
                $message = 'Invalid message format';
                throw new Bonzai_Exception($message);
            }

            if (!empty($text)) {
                $text = gettext($text);

                $occurrences = substr_count($text, '%');
                if ($occurrences > 0) {
                    if ($occurrences != count($args)) {
                        $message = 'Numbers of parameters doesn\'t match.';
                        throw new Bonzai_Exception($message);
                    }

                    $text = vsprintf($text, $args);
                }

                $prefix     = '[' . date('H:i:s') . '] ';
                $prefix_len = strlen($prefix);

                $string = PHP_EOL . str_repeat(' ', $prefix_len);
                $text   = wordwrap($text, 80 - $prefix_len, $string, true);

                $use_stderr = ($options && $options->getOption('stderr') !== null);

                $message = $prefix . $text . PHP_EOL;
                if ($options && $options->getOption('log') !== null) {
                    self::$message_history[] = $prefix . $text;
                }

                if ($options && $options->getOption('colors') !== null) {
                    if ($type == 'error') {
                        $message = "\033[0;37m\033[41m" . $message . "\033[0m";
                    } elseif ($type == 'warn') {
                        $message = "\033[0;30m\033[43m" . $message . "\033[0m";
                    }
                }

                if (!$quiet_mode) {
                    if ($use_stderr && $type == 'error') {
                        file_put_contents('php://stderr', $message);
                    } else {
                        echo $message;
                    }
                }
            }
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

    // {{{ printHeader
    // TODO: ADD TEST
    // TODO: Optimize Cyclomatic Complexity (7)
    /**
     * printHeader
     *
     * @param Bonzai_Utils_Options $options
     * @param boolean              $ignore_quiet
     *
     * @static
     * @access public
     * @return void
     */
    public static function printHeader(Bonzai_Utils_Options $options, $ignore_quiet = false)
    {
        $ignore_quiet = (bool)$ignore_quiet;

        $quiet_mode = ($options->getOption('quiet') !== null && !$ignore_quiet);
        if (!$quiet_mode) {
            $use_colors  = ($options->getOption('colors') !== null);
            $start_color = $use_colors ? "\033[1;37m" : '';
            $end_color   = $use_colors ? "\033[0m"    : '';

            echo str_repeat('-', 80) . PHP_EOL;
            echo $start_color . 'BONZAI' . str_repeat(' ', 50);
            echo gettext('(previously phpGuardian)') . $end_color . PHP_EOL;
            echo str_repeat('-', 80) . PHP_EOL;
        }
    }
    // }}}
}
