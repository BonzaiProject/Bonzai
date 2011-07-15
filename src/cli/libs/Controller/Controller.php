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

require_once __DIR__ . '/../Exception/Exception.php';

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
class Bonzai_Controller
{
    // {{{ PROPERTIES
    /**
     * @access protected
     * @var    array
     */
    protected $options = array();
    // }}}

    // {{{ __construct
    /**
     * @access public
     * @return void
     */
    public function __construct()
    {
        spl_autoload_register('Bonzai_Controller::__autoload');
    }
    // }}}

    // {{{ elaborate
    /**
     * @access public
     * @return void
     */
    public function elaborate()
    {
        $this->options = new Bonzai_Utils_Options();
        $this->options->init($_SERVER['argv']);

        $this->handleTask();
    }
    // }}}

    // {{{ handleTask
    /**
     * @access protected
     * @return void
     */
    protected function handleTask()
    {
        $task = new Bonzai_Task();
        $task->loadAndExecute($this->options);
    }
    // }}}

    // {{{ __autoload
    /**
     * @access public
     * @param  string $name
     * @throws Bonzai_Exception
     * @return void
     */
    public function __autoload($name)
    {
        if (strpos($name, 'Bonzai_') == 0) {
            $filename = $this->getFileNameFromClassName($name);

            if (!$this->checkFile($filename)) {
                throw new Bonzai_Exception('The class `' . $name . '` cannot be loaded'); // UNCATCHED
            }

            require_once __DIR__ . '/../' . $filename . '.php';
        }
    }
    // }}}

    // {{{ getFileNameFromClassName
    /**
     * @access protected
     * @param  string $name
     * @return string
     */
    protected function getFileNameFromClassName($name)
    {
        $name     = preg_replace('/^Bonzai_/', '', $name);
        $filename = str_replace('_', DIRECTORY_SEPARATOR, $name);

        if (!$this->checkFile($filename) && ($name == $filename)) {
            $filename .= DIRECTORY_SEPARATOR . $name;
        }

        return $filename;
    }
    // }}}

    // {{{ checkFile
    /**
     * @access protected
     * @param  string $filename
     * @return boolean
     */
    protected function checkFile($filename)
    {
        return file_exists(__DIR__ . '/../' . $filename . '.php');
    }
    // }}}
}
