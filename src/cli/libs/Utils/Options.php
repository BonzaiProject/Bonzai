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
 * Bonzai_Utils_Options
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
class Bonzai_Utils_Options
{
    // {{{ PROPERTIES
    /**
     * @access protected
     * @var    array $parameters
     */
    protected $parameters = array(
        'b'  => 'backup',
        'd'  => 'dry',
        'r:' => 'report:',
                'colors',
                'log:',
                'stderr',
        'q'  => 'quiet',
        'h'  => 'help',
        'v'  => 'version');

    /**
     * @access protected
     * @var    array $labels
     */
    protected $labels = array(
        'backup'  =>
        'Backup the original file, generate a .bak file (default: false)',
        'dry'     => 'Perform a trial run with no changes made',
        'colorf'  => 'Use colors in output',
        'log'     => 'Log execution messages in textual format',
        'stderr'  => 'Write to STDERR instead of STDOUT',
        'report'  => 'Generate a full report',
        'colors'  => 'Use colors in output',
        'log'     => 'Log execution messages in textual format',
        'stderr'  => 'Write to STDERR instead of STDOUT',
        'quiet'   => 'Quiet mode. Don\'t output anything',
        'help'    => 'Show the help',
        'version' => 'Show the version');

    /**
     * @access protected
     * @var    array $options
     */
    protected $options = array();

    /**
     * @access protected
     * @var    array $option_params
     */
    protected $option_params = array();
    // }}}

    // {{{ init
    /**
     * init
     *
     * @param array $argv
     *
     * @access public
     * @throws Bonzai_Exception
     * @return void
     */
    public function init($argv)
    {
        if (empty($argv) || !is_array($argv)) {
            $message = gettext('Missing the script arguments.');
            throw new Bonzai_Exception($message);
        }

        $input = implode('', array_keys($this->parameters));
        $this->options = getopt($input, $this->parameters);
        $this->parseOptions($argv);
    }
    // }}}

    // {{{ parseOptions
    // TODO: Optimize cyclomatic complexity (8)
    /**
     * parseOptions
     *
     * @param array $argv
     *
     * @access protected
     * @throws Bonzai_Exception
     * @return void
     */
    protected function parseOptions($argv)
    {
        if (!is_array($this->options) || !is_array($argv)) {
            $message = gettext('Invalid parameters to be parsed.');
            throw new Bonzai_Exception($message);
        }

        $options = array_keys($this->options);
        $options = array_merge($options, array_values($this->options));
        $options = preg_grep('/.+/', $options);

        foreach ($argv as $key => $value) {
            if ($key == 0) {
                continue;
            }

            if ($value[0] !== '-') {
                $prev_key = preg_replace('/^-{1,2}/', '', $argv[$key - 1]) . ':';
                if (!isset($this->parameters[$prev_key])
                    && !in_array($prev_key, $this->parameters)) {
                    $this->option_params[] = $value;
                }
            }
        }
    }
    // }}}

    // {{{ getOptionParams
    /**
     * getOptionParams
     *
     * @access public
     * @return array
     */
    public function getOptionParams()
    {
        return $this->option_params;
    }
    // }}}

    // {{{ getOptions
    /**
     * getOptions
     *
     * @access public
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
    // }}}

    // {{{ getOption
    /**
     * getOption
     *
     * @param string $key
     *
     * @access public
     * @return string | null
     */
    public function getOption($key)
    {
        if (isset($this->options[$key])) {
            return $this->options[$key];
        }

        return null;
    }
    // }}}

    // {{{ getParameters
    /**
     * getParameters
     *
     * @access public
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
    // }}}

    // {{{ getLabelParameter
    /**
     * getLabelParameter
     *
     * @param string $key
     *
     * @access public
     * @return string | null
     */
    public function getLabelParameter($key)
    {
        if (isset($this->labels[$key])) {
            return $this->labels[$key];
        }

        return null;
    }
    // }}}
}
