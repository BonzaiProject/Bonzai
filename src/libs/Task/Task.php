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
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Core
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

/**
 * Bonzai_Task
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Core
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/
class Bonzai_Task extends Bonzai_Abstract
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
    public function loadAndExecute(Bonzai_Utils_Options $options)
    {
        $this->load($options);

        return $this->execute();
    }
    // }}}

    // {{{ load
    /**
     * load
     *
     * @param Bonzai_Utils_Options $options
     *
     * @access protected
     * @return void
     */
    protected function load(Bonzai_Utils_Options $options) // TODO: MODIFIED
    {
        $this->options = $options;

        if ($options->getOptionParams() && $options->getOption('help') === null && $options->getOption('version') === null
        ) {
            $this->task = 'Bonzai_Encoder';
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
        $class = new $this->task();

        $this->raiseExceptionIf(!method_exists($class, 'elaborate'), array('Cannot launch the task `%s`.', $this->task));

        $start = microtime(true);
        $res   = $class->elaborate($this->options);

        $report = $this->generateReport((microtime(true) - $start) / 1000000);
        if ($this->options->getOption('quiet') === null) {
            echo $report;
        }
        $this->saveReportFile($report);

        return $res;
    }
    // }}}

    // {{{ saveReportFile
    /**
     * saveReportFile
     *
     * @param string $post
     *
     * @access protected
     * @return mixed
     */
    protected function saveReportFile($post)
    {
        $post = $this->getStrVal($post);

        $contents = implode(PHP_EOL, $this->getUtils()->message_history);
        if ($this->options->getOption('log') !== null && !empty($contents)) {
            $pre  = str_repeat('-', 80) . PHP_EOL;
            $pre .= 'BONZAI' . str_repeat(' ', 50);
            $pre .= gettext('(previously phpGuardian)') . PHP_EOL;
            $pre .= str_repeat('-', 80) . PHP_EOL;

            $this->getUtils()->putFileContent($this->options->getOption('log'), $pre . $contents . $post);
        }
    }
    // }}}

    // {{{ generateReport
    /**
     * generateReport
     *
     * @param int $time
     *
     * @access protected
     * @return mixed
     */
    protected function generateReport($time)
    {
        $time = intval($time);

        $post = '';
        if ($this->options->getOption('report') !== null) {
            ob_start();
            $skipped_files = Bonzai_Registry::get('skipped_files');
            $skipped       = count($skipped_files);

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
        }

        return $post;
    }
    // }}}
}
