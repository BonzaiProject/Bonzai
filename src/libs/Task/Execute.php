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
 * BonzaiTaskExecute
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
class BonzaiTaskExecute extends BonzaiAbstract
{
    // {{{ PROPERTIES
    /**
     * Task to be executed.
     *
     * @access protected
     * @var    string
     */
    protected $task = 'BonzaiUtilsHelp';

    /**
     * Instance of Bonzai*Task
     *
     * @access protected
     * @var    Bonzai*Task
     */
    protected $instance = null;

    /**
     * The execution report
     *
     * @access protected
     * @var    string
     */
    protected $report = '';
    // }}}

    // {{{ loadAndExecute
    /**
     * Load and execute the task.
     *
     * @param BonzaiUtilsOptions $options The script's options.
     *
     * @access public
     * @return void
     */
    public function loadAndExecute(BonzaiUtilsOptions $options)
    {
        if ($options->getOptionParams() !== array()
            && $options->getOption('help') === null
            && $options->getOption('version') === null
        ) {
            $this->task = 'BonzaiEncoder';
        }

        $this->options = $options;

        $this->execute();
    }
    // }}}

    // {{{ execute
    /**
     * Execute the task.
     *
     * @access protected
     * @throws BonzaiException
     * @return void
     */
    protected function execute()
    {
        $this->instance = new $this->task();
        $this->instance->setOptions($this->options);

        if (method_exists($this->instance, 'elaborate') === false) {
            throw new BonzaiException(sprintf(gettext('Cannot launch the task `%s`.'), $this->task));
        }

        $start = microtime(true);
        $this->instance->elaborate();

        $this->generateReport(microtime(true) - $start);
        $this->saveReportFile();
        echo $this->report;
    }
    // }}}

    // {{{ saveReportFile
    /**
     * Save to file the report.
     *
     * @access protected
     * @return void
     */
    protected function saveReportFile()
    {
        if ($this->options->getOption('log') !== null
            && empty($contents) === false
        ) {
            $pre  = str_repeat('-', 80) . PHP_EOL . 'BONZAI' . str_repeat(' ', 50);
            $pre .= gettext('(was phpGuardian)') . PHP_EOL . str_repeat('-', 80) . PHP_EOL;

            $contents = implode(PHP_EOL, $this->getUtils()->message_history);

            $this->getUtils()->putFileContent($this->options->getOption('log'), $pre . $contents . $this->report);
        }
    }
    // }}}

    // {{{ generateReport
    /**
     * Generate the execution report.
     *
     * @param int $time Time of script execution.
     *
     * @access protected
     * @return void
     */
    protected function generateReport($time)
    {
        if ($this->options->getOption('report') !== null) {
            $skipped_files = $this->instance->getSkippedFiles();

            $this->report  = gettext('Total time:            %0.2fs') . PHP_EOL;
            $this->report .= gettext('Total files processed: %d') . PHP_EOL;
            $this->report .= gettext('Total files skipped:   %d') . PHP_EOL;
            $this->report  = sprintf($this->report, intval($time), $this->instance->getTotalFiles(), count($skipped_files));

            if ($skipped_files !== array()) {
                $this->report .= "\t" . gettext('Skipped files:') . PHP_EOL;
                foreach ($skipped_files as $file) {
                    $this->report .= "\t" . $file . PHP_EOL;
                }
            }
        }
    }
    // }}}
}
