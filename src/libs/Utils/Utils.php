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
 * BonzaiUtils
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
class BonzaiUtils extends BonzaiAbstract
{
    // {{{ PROPERTIES
    /**
     * Flag to decide whether silence all output messages.
     *
     * @static
     * @access public
     * @var    boolean
     */
    public static $silenced = false;

    /**
     * The message history.
     *
     * @access public
     * @var    array
     */
    public $message_history = array();

    /**
     * The script's options.
     *
     * @access public
     * @var    BonzaiUtilsOptions
     */
    protected $options = null;
    // }}}

    // {{{ __construct
    /**
     * The class constructor.
     *
     * @param BonzaiUtilsOptions $options The script's options.
     *
     * @access public
     * @return void
     */
    public function __construct(BonzaiUtilsOptions $options)
    {
        $this->options = $options;
    }
    // }}}

    // {{{ backupFile
    /**
     * Backup a file with ".orig" extension.
     *
     * @param string $filename The filename to be backup
     *
     * @access public
     * @return void
     */
    public function backupFile($filename)
    {
        $this->putFileContent($filename . '.orig', $this->getFileContent($filename));

        unlink($filename);
    }
    // }}}

    // {{{ recursiveScanDir
    /**
     * Recursive scandir.
     *
     * @param string $base  The base path where to start.
     * @param array  &$data The container of elements of scandir.
     *
     * @access public
     * @throws BonzaiException
     * @return array
     */
    public function recursiveScanDir($base = '', array &$data = array())
    {
        if (is_readable($base) === false
            && is_executable($base) === false
        ) {
            throw new BonzaiException(sprintf(gettext('The directory `%s` cannot be opened.'), $base));
        }

        if (is_array($data) === false) {
            $data = array();
        }

        $array = array_diff(scandir($base), array('.', '..'));

        foreach ($array as $value) {
            $path = $base . DIRECTORY_SEPARATOR . $value;
            array_push($data, $path);

            if (is_dir($path) === true) {
                try {
                    $data = $this->recursiveScanDir($path, $data);
                } catch (BonzaiException $e) {
                    $this->warn('The directory `%s` was skipped because not readable.', $path);
                }
            }
        }

        return $data;
    }
    // }}}

    // {{{ getFileContent
    /**
     * Retrieve the content of a file.
     *
     * @param string $filename The file where read the content.
     *
     * @access public
     * @return string
     */
    public function getFileContent($filename)
    {
        $this->checkFileValidity($filename);

        return file_get_contents($filename);
    }
    // }}}

    // {{{ putFileContent
    /**
     * Save the content in a file.
     *
     * @param string $filename The file where put the content.
     * @param string $content  The content to be saved.
     *
     * @access public
     * @throws BonzaiException
     * @return string
     */
    public function putFileContent($filename, $content)
    {
        $this->checkFileValidity($filename, false);

        if (file_exists($filename) === true
            && is_writable($filename) === false
        ) {
            throw new BonzaiException(sprintf(gettext('The file `%s` cannot be written.'), $filename));
        }

        return file_put_contents($filename, $content);
    }
    // }}}

    // {{{ checkFileValidity
    /**
     * Check if a file is valid (validated, existent, readable, not-empty).
     *
     * @param string  $filename    The filename to be checked.
     * @param boolean $file_exists Flag to determine whether some check will be ignored.
     *
     * @access public
     * @throws BonzaiException
     * @return void
     */
    public function checkFileValidity($filename, $file_exists = true)
    {
        if (empty($filename) === true
            || is_string($filename) === false
            || trim($filename) === ''
            || ($file_exists !== false && file_exists($filename) === false)
        ) {
            throw new BonzaiException(sprintf(gettext('The file `%s` is invalid.'), $filename));
        }

        if ($file_exists !== false
            && is_readable($filename) === false
        ) {
            throw new BonzaiException(sprintf(gettext('The file `%s` is not readable.'), $filename));
        }

        if ($file_exists !== false
            && filesize($filename) === 0
        ) {
            throw new BonzaiException(sprintf(gettext('The file `%s` is empty.'), $filename));
        }

        if ($file_exists !== false) {
            $content = file_get_contents($filename);

            if (strpos($content, 'class Bonzai') !== false) {
                throw new BonzaiException(sprintf(gettext('The file `%s` is not able to be parsed.'), $filename));
            }
        }
    }
    // }}}

    // {{{ info
    /**
     * Send a message in "info" mode.
     *
     * @access public
     * @return void
     */
    public function info()
    {
        $parameters = func_get_args();
        array_unshift($parameters, 'info');

        return call_user_func_array(array($this, 'message'), $parameters);
    }
    // }}}

    // {{{ message
    /**
     * Send a message to output.
     *
     * @param string $type The type of message (info, warn or error).
     * @param string $text The text to be printed.
     * @param array  $args The any parameters to be replaced in the text.
     *
     * @access protected
     * @throws BonzaiException
     * @return void
     */
    protected function message()
    {
        $args = func_get_args();
        $type = array_shift($args);
        $text = array_shift($args);

        if (is_string($text) === false) {
            throw new BonzaiException(gettext('Invalid message format.'));
        }

        if (empty($text) === false) {
            $text        = gettext($text);
            $occurrences = substr_count($text, '%');

            if ($occurrences > 0) {
                if ($occurrences !== count($args)) {
                    throw new BonzaiException(gettext('Numbers of parameters doesn\'t match.'));
                }

                $text = vsprintf($text, $args);
            }

            $message = $this->composeMessage($text, $type);

            $use_stderr = $this->options->getOption('stderr') !== null;

            if (self::$silenced === false) {
                if ($use_stderr === true
                    && $type === 'error'
                ) {
                    file_put_contents('php://stderr', $message);
                } else {
                    echo $message;
                }
            }
        }
    }
    // }}}

    // {{{ composeMessage
    /**
     * Compose the message.
     *
     * @param string $text The text to be outputted.
     * @param string $type The type of message (info, warn or error).
     *
     * @access protected
     * @return string | null
     */
    protected function composeMessage($text, $type)
    {
        $text = trim($text);

        if (empty($text) === false) {
            $prefix     = '[' . date('H:i:s') . '] ';
            $prefix_len = strlen($prefix);

            $string = PHP_EOL . str_repeat(' ', $prefix_len);
            //$text   = wordwrap($text, 80 - $prefix_len, $string, true);

            $message = $prefix . $text . PHP_EOL;
            if ($this->options->getOption('log') !== null) {
                array_push($this->message_history, $prefix . $text);
            }

            if ($this->options->getOption('colors') !== null) {
                if ($type === 'error') {
                    $message = "\033[0;37m\033[41m" . $message . "\033[0m";
                } elseif ($type === 'warn') {
                    $message = "\033[0;30m\033[43m" . $message . "\033[0m";
                }
            }

            return $message;
        }

        return null;
    }
    // }}}

    // {{{ warn
    /**
     * Send a message in "warn" mode.
     *
     * @access public
     * @return void
     */
    public function warn()
    {
        $parameters = func_get_args();
        array_unshift($parameters, 'warn');

        return call_user_func_array(array('BonzaiUtils', 'message'), $parameters);
    }
    // }}}

    // {{{ error
    /**
     * Send a message in "error" mode.
     *
     * @access public
     * @return void
     */
    public function error()
    {
        $parameters = func_get_args();
        array_unshift($parameters, 'error');

        return call_user_func_array(array('BonzaiUtils', 'message'), $parameters);
    }
    // }}}

    // {{{ printHeader
    /**
     * Print the script header.
     *
     * @access public
     * @return void
     */
    public function printHeader()
    {
        if (self::$silenced === false) {
            $use_colors = ($this->options->getOption('colors') !== null);

            $start_color = $use_colors === true
                           ? "\033[1;37m"
                           : '';
            $end_color   = $use_colors === true
                           ? "\033[0m"
                           : '';

            $previously = gettext('(was phpGuardian)');

            echo str_repeat('-', 80) . PHP_EOL;
            echo $start_color . 'BONZAI' . str_repeat(' ', 74 - strlen($previously));
            echo $previously . $end_color . PHP_EOL;
            echo str_repeat('-', 80) . PHP_EOL;
        }
    }
    // }}}
}
