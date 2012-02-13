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
 * BonzaiUtilsHelp
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
class BonzaiUtilsHelp extends BonzaiAbstract implements BonzaiTaskInterface
{
    // {{{ setOptions
    /**
     * Set the script's options.
     *
     * @param BonzaiUtilsOptions $options The script's options.
     *
     * @access public
     * @return void
     */
    public function setOptions(BonzaiUtilsOptions $options)
    {
        $this->options = $options;
    }
    // }}}

    // {{{ elaborate
    /**
     * Start the main elaboration of task.
     *
     * @access public
     * @return void
     */
    public function elaborate()
    {
        $this->getUtils($this->options)->printHeader();

        if (BonzaiUtils::$silenced === false) {
            echo gettext('Version') . ': 0.2' . PHP_EOL;
            echo 'Copyright (C) 2006 - ' . date('Y');
            echo ' Bonzai (Fabio Cicerchia). ' . gettext('All rights reserved.');
            echo PHP_EOL . gettext('License MIT or GNU GPL 2') . PHP_EOL;
            echo str_repeat('-', 80) . PHP_EOL;
        }

        if ($this->options->getOption('version') === null) {
            $this->printAll($this->options);
        }
    }
    // }}}

    // {{{ printAll
    /**
     * Print all informations.
     *
     * @access public
     * @return void
     */
    protected function printAll()
    {
        if (BonzaiUtils::$silenced === false) {
            $use_colors  = ($this->options->getOption('colors') !== null);
            $start_color = $use_colors === true
                           ? "\033[1;37m"
                           : '';
            $end_color   = $use_colors === true
                           ? "\033[0m"
                           : '';

            echo PHP_EOL . $start_color . gettext('Usage') . ':' . $end_color;
            echo PHP_EOL . $_SERVER['argv'][0] . ' [' . strtoupper(gettext('Options'));
            echo ']... [' . gettext('FILES') . '|' . gettext('DIRECTORIES');
            echo ']...' . PHP_EOL . PHP_EOL;
            echo $start_color . gettext('Options') . ':' . $end_color . PHP_EOL;

            foreach ($this->options->getParameters() as $short => $long) {
                $has_value = strpos($long, ':') > 0;

                $short_txt = $has_value === true
                             ? substr($short, 0, -1)
                             : $short;
                $long_txt  = $has_value === true
                             ? substr($long, 0, -1)
                             : $long;

                $info  = is_int($short) === true
                         ? '    '
                         : ('-' . $short_txt . ', ');
                $info .= '--' . $long_txt;
                if ($has_value === true) {
                    $info .= '=<' . gettext('value') . '>';
                }

                $format = '    ' . str_pad($info, 20, ' ') . ' %s' . PHP_EOL;
                $row    = sprintf($format, gettext($this->options->getLabelParameter($long_txt)));

                echo wordwrap($row, 80, PHP_EOL . str_repeat(' ', 25), true);
            }

            echo PHP_EOL . gettext('Report bugs to info@bonzai-project.org') . PHP_EOL;
        }
    }
    // }}}
}
