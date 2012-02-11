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

require_once BONZAI_PATH_LIBS . 'Abstract' . DIRECTORY_SEPARATOR . 'Abstract.php';

/**
 * Bonzai_Controller_Controller
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
class Bonzai_Controller_Controller extends Bonzai_Abstract
{
    // {{{ __construct
    /**
     * The class constructor.
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

            putenv('LC_ALL=' . $lang);
            setlocale(LC_ALL, $lang);
            bindtextdomain($domain, BONZAI_PATH_LIBS . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'locales' . DIRECTORY_SEPARATOR);
            bind_textdomain_codeset($domain, 'UTF-8');
            textdomain($domain);
        }

        spl_autoload_register('Bonzai_Controller_Controller::autoload');
    }
    // }}}

    // {{{ elaborate
    /**
     * Start the main elaboration of script.
     *
     * @param Bonzai_Utils_Options $options The script's options.
     *
     * @access public
     * @return void
     */
    public function elaborate(Bonzai_Utils_Options $options)
    {
        try {
            $options->init();
        } catch (Bonzai_Exception $e) {
            // Fallback behaviour: show the help
        }

        if ($options->getOption('quiet')) {
            ob_start();
        }

        $task = new Bonzai_Task_Execute();
        $task->loadAndExecute($options);

        if ($options->getOption('quiet')) {
            ob_end_clean();
        }
    }
    // }}}

    // {{{ autoload
    /**
     * Autoload "magically" each Bonzai_* class.
     *
     * @param string $name The name of class to be autoloaded.
     *
     * @access public
     * @throws Bonzai_Exception
     * @return void
     */
    public function autoload($name)
    {
        if (strpos($name, 'Bonzai_') === 0) {
            $filename = preg_replace('/^Bonzai_(.+)_(.+)$/U', '\1/\2', $name);
            $filename = preg_replace('/^Bonzai_(.+)$/U',      '\1/\1', $filename);
            $filename = str_replace('/', DIRECTORY_SEPARATOR, $filename);

            $filepath = BONZAI_PATH_LIBS . $filename . '.php';

            if (!file_exists($filepath)) {
                throw new Bonzai_Exception(sprintf(gettext('The class `%s` cannot be loaded.'), $name));
            }

            include_once $filepath;
        }
    }
    // }}}
}
