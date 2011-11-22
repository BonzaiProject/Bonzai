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
 * @category   Optimization_&_Security
 * @package    Bonzai
 * @subpackage Task
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

/**
 * Bonzai_Task
 *
 * @category   Optimization_&_Security
 * @package    Bonzai
 * @subpackage Task
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version    Release: 0.1
 * @link       http://www.bonzai-project.org
 **/
class Bonzai_Task
{
    // {{{ PROPERTIES
    /**
     * @access protected
     * @var    string $task
     */
    protected $task = 'Bonzai_Utils_Help';

    /**
     * @access protected
     * @var    mixed $options
     */
    protected $options = null;

    /**
     * @access protected
     * @var    mixed $parameters
     */
    protected $parameters = null;
    // }}}

    // {{{ loadAndExecute
    /**
     * loadAndExecute
     *
     * @param Bonzai_Utils_Options $options
     *
     * @access public
     * @return mixed
     */
    public function loadAndExecute(Bonzai_Utils_Options $options = null)
    {
        $this->load($options);

        return $this->execute();
    }
    // }}}

    // {{{ load
    // TODO: Optimize cyclomatic complexity (5)
    /**
     * load
     *
     * @param Bonzai_Utils_Options $options
     *
     * @access protected
     * @return void
     */
    protected function load(Bonzai_Utils_Options $options = null)
    {
        if (is_null($options)) {
            $options = new Bonzai_Utils_Options;
        }

        $this->options    = $options;
        $this->parameters = $options;

        $options = $this->options->getOptionParams();
        if (!empty($options)
            && $this->options->getOption('help') === null
            && $this->options->getOption('version') === null
        ) {
            $this->task       = 'Bonzai_Encoder';
            $this->parameters = $options;
        }
    }
    // }}}

    // {{{ execute
    /**
     * execute
     *
     * @access protected
     * @throws Bonzai_Exception
     * @return mixed
     */
    protected function execute()
    {
        $class = $this->task;
        $class = new $class();

        if (!method_exists($class, 'elaborate')) {
            $message = gettext('Cannot launch the task `%s`.');
            throw new Bonzai_Exception(sprintf($message, $this->task));
        }

        $parameters = $this->parameters;
        if (is_null($parameters)) {
            $parameters = new Bonzai_Utils_Options;
        }

        $start = microtime(true);
        $res   = $class->elaborate($parameters);
        $time  = (microtime(true) - $start) / 1000000;

        $post = '';
        if ($this->options && $this->options->getOption('report') !== null) {
            ob_start();
            $skipped_files = Bonzai_Registry::get('skipped_files');
            $skipped = count($skipped_files);

            $total_files = Bonzai_Registry::get('total_files');
            printf(gettext('Total time:            %0.2fs') . PHP_EOL, $time);
            printf(gettext('Total files processed: %d') . PHP_EOL, $total_files);
            printf(gettext('Total files skipped:   %d') . PHP_EOL, $skipped);
            if ($skipped > 0) {
                echo "\t" . gettext('Skipped files:') . PHP_EOL;
                foreach ($skipped_files as $file) {
                    echo "\t" . $file . PHP_EOL;
                }
            }
            $post = PHP_EOL . ob_get_clean();

            if ($this->options->getOption('quiet') === null) {
                echo $post;
            }
        }

        $log_file = $this->options ? $this->options->getOption('log') : null;
        $contents = implode(PHP_EOL, Bonzai_Utils::$message_history);
        if ($log_file !== null && !empty($contents)) {
            $pre  = str_repeat('-', 80) . PHP_EOL;
            $pre .= 'BONZAI' . str_repeat(' ', 50);
            $pre .= gettext('(previously phpGuardian)') . PHP_EOL;
            $pre .= str_repeat('-', 80) . PHP_EOL;

            Bonzai_Utils::putFileContent($log_file, $pre . $contents . $post);
        }

        return $res;
    }
    // }}}
}
