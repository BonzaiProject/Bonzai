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
 * URL:            http://www.bonzai-project.org
 * E-MAIL:         info@bonzai-project.org
 *
 * COPYRIGHT:      2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * LICENSE:        MIT or GNU GPL 2
 *                 The MIT License is recommended for most projects, it's simple
 *                 and  easy  to understand and it places almost no restrictions
 *                 on  what  you  can do with Bonzai.
 *                 If  the  GPL  suits  your project better you are also free to
 *                 use Bonzai under that license.
 *                 You   don't  have  to  do  anything  special  to  choose  one
 *                 license  or  the  other  and  you don't have to notify anyone
 *                 which   license   you   are   using.  You  are  free  to  use
 *                 Bonzai  in  commercial  projects  as  long  as  the copyright
 *                 header is left intact.
 *                 <http://www.opensource.org/licenses/mit-license.php>
 *                 <http://www.opensource.org/licenses/gpl-2.0.php>
 **/

require_once __DIR__ . '/../Exception/Exception.php';

/**
 *
 * @category  Security
 * @package   Bonzai
 * @version   0.1
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @license   http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link      http://www.bonzai-project.org
 */

class Bonzai_Controller
{
    // {{{ PROPERTIES
    /**
     *
     * @access protected
     * @var    array
     */
    protected $options = array();
    // }}}

    // {{{ METHODS
    // {{{ function __construct
    /**
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        // Register the custom autoloader
        spl_autoload_register('Bonzai_Controller::__autoload');
    }
    // }}}

    // {{{ function elaborate
    /**
     *
     * @access public
     * @return void
     */
    public function elaborate()
    {
        // Get the Script Options
        $this->options = new Bonzai_Utils_Options();
        $this->options->init($_SERVER['argv']);

        // Switch to Selected Task
        $this->handleTask();
    }
    // }}}

    // {{{ function handleTask
    /**
     *
     * @access public
     * @return void
     */
    public function handleTask()
    {
        // Load the Task Handler
        $task = new Bonzai_Task();

        // load and excute task
        $task->loadAndExecute($this->options);
    }
    // }}}

    // {{{ function __autoload
    /**
     *
     * @access public
     * @param  string       $name
     * @throws Bonzai_Exception
     * @return void
     */
    public function __autoload($name)
    {
        if (substr($name, 0, 7) == 'Bonzai_') {
            // Get the class filename
            $filename = $this->getClassFileName($name);

            if (!$this->checkFile($filename)) {
                $message = "The class `$name` cannot be loaded";
                throw new Bonzai_Exception($message); // TODO: BLOCKER
            }

            require_once __DIR__ . "/../$filename.php";
        }
    }
    // }}}

    // {{{ function getClassFileName
    // TODO: add to test
    /**
     *
     * @access protected
     * @param  string    $name
     * @return string
     */
    protected function getClassFileName($name)
    {
        $name     = preg_replace('/^Bonzai_/', '', $name);
        $filename = str_replace('_', DIRECTORY_SEPARATOR, $name);

        if (!$this->checkFile($filename) && ($name == $filename)) {
            $filename .= DIRECTORY_SEPARATOR . $name;
        }

        return $filename;
    }
    // }}}

    // {{{ function checkFile
    // TODO: add to test
    /**
     *
     * @access protected
     * @param  string    $filename
     * @return boolean
     */
    protected function checkFile($filename)
    {
        return file_exists(__DIR__ . "/../$filename.php");
    }
    // }}}
    // }}}
}
