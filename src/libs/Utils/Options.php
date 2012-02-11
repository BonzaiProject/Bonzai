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
 * Bonzai_Utils_Options
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
class Bonzai_Utils_Options extends Bonzai_Abstract
{
    // {{{ PROPERTIES
    /**
     * The allowed script-parameters.
     *
     * @access protected
     * @var    array
     */
    protected $parameters = array(
        'b'  => 'backup',
        'd'  => 'dry',
        'r'  => 'report',
                'colors',
                'log:',
                'stderr',
        'q'  => 'quiet',
        'h'  => 'help',
        'v'  => 'version');

    /**
     * The description of each parameter.
     *
     * @access protected
     * @var    array
     */
    protected $labels = array(
        'backup'  => 'Backup the original file, generate a .bak file',
        'dry'     => 'Perform a trial run with no changes made',
        'report'  => 'Generate a full report',
        'colors'  => 'Use colors in output',
        'log'     => 'Log execution messages in textual format',
        'stderr'  => 'Write to STDERR instead of STDOUT',
        'quiet'   => 'Quiet mode. Don\'t output anything',
        'help'    => 'Show the help',
        'version' => 'Show the version');

    /**
     * The container of script parameter called at runtime.
     *
     * @access protected
     * @var    array
     */
    protected $options = array();

    /**
     * The container of script optional parameter called at runtime.
     *
     * @access protected
     * @var    array
     */
    protected $option_params = array();

    /**
     * The script's arguments.
     *
     * @access protected
     * @var    array
     */
    protected $arguments = array();
    // }}}

    // {{{ __construct
    /**
     * The class constructor.
     *
     * @param array $arguments The script's arguments.
     *
     * @access public
     * @return void
     */
    public function __construct(array $arguments = array())
    {
        $this->arguments = $arguments;
    }
    // }}}

    // {{{ init
    /**
     * Initialize the script-options.
     *
     * @access public
     * @throws Bonzai_Exception
     * @return void
     */
    public function init()
    {
        if (empty($this->arguments)
            || !is_array($this->arguments)
        ) {
            throw new Bonzai_Exception(gettext('Missing the script arguments.'));
        }

        $this->parseOptions($this->arguments);
    }
    // }}}

    // {{{ parseOptions
    /**
     * Parse the script-options to populate the array.
     *
     * @param array $arguments The array of script-parameter.
     *
     * @access protected
     * @return void
     */
    protected function parseOptions(array $arguments)
    {
        $this->options = array();

        unset($arguments[0]);
        $parameters = array_merge(array_keys($this->parameters), array_values($this->parameters));

        foreach ($parameters as $option) {
            $has_value = substr($option, -1, 1) == ':';
            $key       = $has_value
                         ? substr($option, 0, -1)
                         : $option;

            $prefix   = '--';
            $long_key = $key;
            if (strlen($key) == 1) {
                $prefix   = '-';
                $long_key = array_key_exists($key, $this->parameters)
                            ? $this->parameters[$key]
                            : null;
            }

            $exists = array_search("$prefix$key", $arguments, true);

            if ($exists) {
                $this->options[$long_key] = true;

                if ($has_value) {
                    $this->options[$long_key] = $arguments[$exists + 1];
                    unset($arguments[$exists + 1]);
                }

                unset($arguments[$exists]);
            }
        }

        // Some limitations
        if (isset($this->options['colors'])) {
            $this->options['colors'] = $this->options['colors'] && strtolower(PHP_OS) == 'linux';
        }

        $this->option_params = $arguments;
    }
    // }}}

    // {{{ getOptionParams
    /**
     * The get method to retrieve the $option_params protected properties.
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
     * The get method to retrieve the $options protected properties.
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
     * The get method to retrieve the single value from the array of $options
     * protected properties.
     *
     * @param string $key The key of option.
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
     * The get method to retrieve the $parameters protected properties.
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
     * The get method to retrieve the single value from the array of $labels
     * protected properties.
     *
     * @param string $key The key of option.
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
