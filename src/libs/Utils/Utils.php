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
 * Bonzai_Controller
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
class Bonzai_Utils extends Bonzai_Abstract
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

    protected $options = null;
    // }}}

    public function __construct(Bonzai_Utils_Options $options = null)
    {
        $this->options = $options;
    }

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
        $filename = $this->getStrVal($filename);

        $content = $this->getFileContent($filename);
        $this->putFileContent($filename . '.orig', $content);

        unlink($filename);
    }
    // }}}

    // {{{ rScanDir
    // TODO: Optimize Cyclomatic Complexity (7).
    /**
     * Recursive scandir.
     *
     * @param string $base  The base path where to start.
     * @param array  &$data The container of elements of scandir.
     *
     * @access public
     * @throws Bonzai_Exception
     * @return array
     */
    public function rScanDir($base = '', array &$data = array())
    {
        $base = $this->getStrVal($base);

        $this->raiseExceptionIf(
            !is_readable($base) && !is_executable($base),
            array('The directory `%s` cannot be opened.', $base)
        );

        if (!is_array($data)) {
            $data = array();
        }

        $array = array_diff(scandir($base), array('.', '..'));

        foreach ($array as $value) {
            $path = $base . '/' . $value;
            if (is_dir($path)) {
                $data[] = $path . '/';
                try {
                    $data = $this->rScanDir($path, $data);
                } catch (Bonzai_Exception $e) {
                    $this->warn(
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
     * Retrieve the content of a file.
     *
     * @param string $filename The file where read the content.
     *
     * @access public
     * @return string
     */
    public function getFileContent($filename)
    {
        $filename = $this->getStrVal($filename);
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
     * @throws Bonzai_Exception
     * @return string
     */
    public function putFileContent($filename, $content)
    {
        $filename = $this->getStrVal($filename);
        $content = $this->getStrVal($content);

        $this->checkFileValidity($filename, false);

        $this->raiseExceptionIf(
            file_exists($filename) && !is_writable($filename),
            array('The file `%s` cannot be written.', $filename)
        );

        return file_put_contents($filename, $content);
    }
    // }}}

    // {{{ checkFileValidity
    // TODO: Optimize Cyclomatic Complexity (9).
    /**
     * Check if a file is valid (validated, existent, readable, not-empty).
     *
     * @param string  $filename    The filename to be checked.
     * @param boolean $file_exists Flag to determine whether some check will be ignored.
     *
     * @access public
     * @throws Bonzai_Exception
     * @return void
     */
    public function checkFileValidity($filename, $file_exists = true)
    {
        $filename = $this->getStrVal($filename);
        $file_exists = is_bool($file_exists) ? $file_exists : true;

        $this->raiseExceptionIf(
            empty($filename) || !is_string($filename) || trim($filename) == ''
            || ($file_exists && !file_exists($filename)),
            array('The file `%s` is invalid.', $filename)
        );

        $this->raiseExceptionIf(
            $file_exists && !is_readable($filename),
            array('The file `%s` is not readable.', $filename)
        );

        $this->raiseExceptionIf(
            $file_exists && filesize($filename) == 0,
            array('The file `%s` is empty.', $filename)
        );

        if ($file_exists) {
            $content = file_get_contents($filename);
            $this->raiseExceptionIf(
                strpos($content, 'class Bonzai_') !== false,
                array('The file `%s` is not able to be parsed.', $filename)
            );
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
    // TODO: Optimize Cyclomatic Complexity (9).
    /**
     * Send a message to output.
     *
     * @access protected
     * @return void
     */
    protected function message()
    {
        $quiet_mode = Bonzai_Utils::$silenced
                      || ($this->options && $this->options->getOption('quiet') !== null);

        $args = func_get_args();
        $type = array_shift($args);
        $text = array_shift($args);

        $this->raiseExceptionIf(!is_string($text), 'Invalid message format.');

        if (!empty($text)) {
            $text = gettext($text);

            $occurrences = substr_count($text, '%');
            if ($occurrences > 0) {
                $this->raiseExceptionIf(
                    $occurrences != count($args),
                    'Numbers of parameters doesn\'t match.'
                );

                $text = vsprintf($text, $args);
            }

            $message = $this->composeMessage($text, $type);

            $use_stderr = ($this->options && $this->options->getOption('stderr') !== null);

            if (!$quiet_mode) {
                if ($use_stderr && $type == 'error') {
                    file_put_contents('php://stderr', $message);
                } else {
                    echo $message;
                }
            }
        }
    }
    // }}}

    // {{{ composeMessage
    // TODO: Write some test on this method for phpUnit.
    // TODO: Optimize Cyclomatic Complexity (7).
    /**
     * Compose the message.
     *
     * @param string $text The text to be outputted.
     * @param string $type The type of message (info, warn or error).
     *
     * @access protected
     * @return void
     */
    protected function composeMessage($text, $type) {
        $prefix     = '[' . date('H:i:s') . '] ';
        $prefix_len = strlen($prefix);

        $string = PHP_EOL . str_repeat(' ', $prefix_len);
        $text   = wordwrap($text, 80 - $prefix_len, $string, true);

        $message = $prefix . $text . PHP_EOL;
        if ($this->options && $this->options->getOption('log') !== null) {
            $this->message_history[] = $prefix . $text;
        }

        if ($this->options && $this->options->getOption('colors') !== null) {
            if ($type == 'error') {
                $message = "\033[0;37m\033[41m" . $message . "\033[0m";
            } elseif ($type == 'warn') {
                $message = "\033[0;30m\033[43m" . $message . "\033[0m";
            }
        }

        return $message;
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

        return call_user_func_array(array('Bonzai_Utils', 'message'), $parameters);
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

        return call_user_func_array(array('Bonzai_Utils', 'message'), $parameters);
    }
    // }}}

    // {{{ printHeader
    // TODO: Write some test on this method for phpUnit.
    // TODO: Optimize Cyclomatic Complexity (5).
    /**
     * Print the script header
     *
     * @param Bonzai_Utils_Options $options      The options of the script.
     * @param boolean              $ignore_quiet Flag to decide wheter ignore the quiet mode.
     *
     * @access public
     * @return void
     */
    public function printHeader(
        Bonzai_Utils_Options $options,
        $ignore_quiet = false
    ) {
        $ignore_quiet = (bool)$ignore_quiet;

        $quiet_mode = ($options->getOption('quiet') !== null && !$ignore_quiet);
        if (!$quiet_mode && !self::$silenced) {
            $use_colors  = ($options->getOption('colors') !== null);
            $start_color = $use_colors ? "\033[1;37m" : '';
            $end_color   = $use_colors ? "\033[0m"    : '';

            $previously = gettext('(was phpGuardian)');

            echo str_repeat('-', 80) . PHP_EOL;
            echo $start_color . 'BONZAI' . str_repeat(' ', 74 - strlen($previously));
            echo $previously . $end_color . PHP_EOL;
            echo str_repeat('-', 80) . PHP_EOL;
        }
    }
    // }}}
}
