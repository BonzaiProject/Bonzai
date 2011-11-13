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

/**
 * Bonzai_Utils_Help
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
class Bonzai_Utils_Help
{
    // {{{ elaborate
    /**
     * elaborate
     *
     * @param Bonzai_Utils_Options $options
     *
     * @access public
     * @return void
     */
    public function elaborate(Bonzai_Utils_Options $options)
    {
        echo str_repeat('-', 80) . PHP_EOL;
        echo 'BONZAI' . str_repeat(' ', 50);
        echo gettext('(previously phpGuardian)') . PHP_EOL;
        echo str_repeat('-', 80) . PHP_EOL;

        echo gettext('Version') . ': 0.1' . PHP_EOL;
        echo 'Copyright (C) 2006 - ' . date('Y') . ' Bonzai (Fabio Cicerchia). '
               . gettext('All rights reserved.') . PHP_EOL;
        echo gettext('License MIT or GNU GPL 2') . PHP_EOL;
        echo str_repeat('-', 80) . PHP_EOL;

        if (is_null($options->getOption('version'))) {
            echo PHP_EOL . gettext('Usage') . ':' . PHP_EOL;
            echo $_SERVER['argv'][0] . ' [' . gettext('OPTIONS');
            echo ']... [' . gettext('FILES') . '|' . gettext('DIRECTORIES');
            echo ']...' . PHP_EOL . PHP_EOL;
            echo gettext('Options') . ':' . PHP_EOL;
            foreach ($options->getParameters() as $short => $long) {
                $has_value = strpos($long, ':') > 0;

                $only_long = is_int($short);

                $short = str_replace(':', '', $short);
                $long  = str_replace(':', '', $long);

                $info = ($only_long ? '' : "-$short, ") . "--$long";
                if ($has_value) {
                    $info .= '=<value>';
                }

                $format = '    ' . str_pad($info, 20, ' ') . ' %s' . PHP_EOL;
                $row = sprintf($format, gettext($options->getLabelParameter($long)));
                echo wordwrap($row, 80, PHP_EOL . str_repeat(' ', 25), true);
            }
            echo PHP_EOL . gettext('Report bugs to info@bonzai-project.org');
            echo PHP_EOL;
        }
    }
    // }}}
}
