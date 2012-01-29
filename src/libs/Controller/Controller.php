<?php
/**
 * BONZAI
 * (was phpGuardian)
 *
 * CODE NAME: phoenix
 * VERSION:   0.1
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

require_once __DIR__ . '/../Abstract/Abstract.php';

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
class Bonzai_Controller extends Bonzai_Abstract
{
    protected $options = null;

    // {{{ __construct
    /**
     * The __construct.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        // Init the gettext support with the current locale (in use)
        if (getenv('LANG')) {
            $lang   = getenv('LANG');
            $domain = 'messages';

            $res = putenv('LC_ALL=' . $lang);
            $res = setlocale(LC_ALL, $lang);
            $res = bindtextdomain($domain, __DIR__ . '/../../../locales/');
            $res = bind_textdomain_codeset($domain, 'UTF-8');
            $res = textdomain($domain);
        }

        spl_autoload_register('Bonzai_Controller::autoload');
    }
    // }}}

    // {{{ elaborate
    /**
     * Starts the main elaboration of script.
     *
     * @param Bonzai_Utils_Options $options The options of the script.
     *
     * @access public
     * @return void
     */
    public function elaborate(Bonzai_Utils_Options $options)
    {
        try {
            $this->options = $options;
            $this->options->init();
        } catch (Bonzai_Exception $e) {
            // Fallback behaviour: show the help
            unset($e);
        }

        $this->handleTask();
    }
    // }}}

    // {{{ handleTask
    /**
     * Handle the right task based on options.
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
     * Autoload "magically" each Bonzai_* class.
     *
     * @param string $name The name of class to be autoloaded.
     *
     * @access protected
     * @throws Bonzai_Exception
     * @return void
     */
    protected function autoload($name)
    {
        $name = $this->getStrVal($name);

        if (strpos($name, 'Bonzai_') === 0) {
            $filename = $this->getFileNameFromClassName($name);

            $this->raiseExceptionIf(
                !$this->checkFile($filename),
                array('The class `%s` cannot be loaded.', $name)
            );

            include_once __DIR__ . '/../' . $filename . '.php';
        }
    }
    // }}}

    // {{{ getFileNameFromClassName
    /**
     * Get the filename from the classname.
     *
     * @param string $name The classname that will be converted.
     *
     * @access protected
     * @return string
     */
    protected function getFileNameFromClassName($name)
    {
        $name = $this->getStrVal($name);

        $path = preg_replace(
            '/^Bonzai_(.+?)(?:_(.+))?$/',
            '\1' . DIRECTORY_SEPARATOR . '\2',
            trim($name)
        );

        if (substr($path, -1, 1) == '/') {
            $path = preg_replace(
                '/(.+)\//',
                '\1' . DIRECTORY_SEPARATOR . '\1',
                $path
            );
        }

        if ($this->checkFile($path)) {
            return $path;
        }

        return null;
    }
    // }}}

    // {{{ checkFile
    /**
     * Check if a file exists on filesystem.
     *
     * @param string $filename The filename to be checked.
     *
     * @access protected
     * @return boolean
     */
    protected function checkFile($filename)
    {
        $filename = $this->getStrVal($filename);

        return file_exists(__DIR__ . '/../' . $filename . '.php');
    }
    // }}}
}
