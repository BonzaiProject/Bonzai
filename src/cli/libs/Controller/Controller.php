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

require_once __DIR__ . '/../Exception/Exception.php';

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
class Bonzai_Controller
{
    // {{{ PROPERTIES
    /**
     * @access protected
     * @var    Bonzai_Utils_Options
     */
    protected $options = null;
    // }}}

    // {{{ __construct
    /**
     * __construct
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        spl_autoload_register('Bonzai_Controller::autoload');
    }
    // }}}

    // {{{ elaborate
    /**
     * elaborate
     *
     * @param array $argv
     *
     * @access public
     * @return void
     */
    public function elaborate($argv)
    {
        $this->options = new Bonzai_Utils_Options();

        try {
            $this->options->init($argv);
        } catch (Bonzai_Exception $e) {
            // Fallback behaviour: show the help
        }

        Bonzai_Registry::add('options', $this->options);

        $this->handleTask();
    }
    // }}}

    // {{{ handleTask
    /**
     * handleTask
     *
     * @access protected
     * @return void
     */
    protected function handleTask()
    {
        $task = new Bonzai_Task();
        $task->loadAndExecute($this->options);
    }
    // }}}

    // {{{ autoload
    /**
     * autoload
     *
     * @param string $name
     *
     * @access protected
     * @throws Bonzai_Exception
     * @return void
     */
    protected function autoload($name)
    {
        if (strpos($name, 'Bonzai_') == 0) {
            $filename = $this->getFileNameFromClassName($name);

            if (!$this->checkFile($filename)) {
                $message = gettext('The class `%s` cannot be loaded.');
                throw new Bonzai_Exception(sprintf($message, $name));
            }

            include_once __DIR__ . '/../' . $filename . '.php';
        }
    }
    // }}}

    // {{{ getFileNameFromClassName
    /**
     * getFileNameFromClassName
     *
     * @param string $name
     *
     * @access protected
     * @return string
     */
    protected function getFileNameFromClassName($name)
    {
        $name = preg_replace('/^Bonzai_/', '', trim($name));
        if (empty($name)) {
            return null;
        }

        $filename = str_replace('_', DIRECTORY_SEPARATOR, $name);
        if (!$this->checkFile($filename) && ($name == $filename)) {
            $filename .= DIRECTORY_SEPARATOR . $name;
        }

        if ($this->checkFile($filename)) {
            return $filename;
        }

        return null;
    }
    // }}}

    // {{{ checkFile
    /**
     * checkFile
     *
     * @param string $filename
     *
     * @access protected
     * @return boolean
     */
    protected function checkFile($filename)
    {
        return file_exists(__DIR__ . '/../' . $filename . '.php');
    }
    // }}}
}
