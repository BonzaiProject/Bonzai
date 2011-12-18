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
 * COPYRIGHT: 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
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
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
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
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
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
     * @var    array $parameters
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
     * @access protected
     * @var    array $labels
     */
    protected $labels = array(
        'backup'  => 'Backup the original file, generate a .bak file',
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
     * The container of script parameter called at runtime.
     *
     * @access protected
     * @var    array $options
     */
    protected $options = array();

    /**
     * The container of script optional parameter called at runtime.
     *
     * @access protected
     * @var    array $option_params
     */
    protected $option_params = array();
    // }}}

    // {{{ init
    /**
     * Initialize the script-options.
     *
     * @param array $arguments The array of script-parameter.
     *
     * @access public
     * @throws Bonzai_Exception
     * @return void
     */
    public function init(array $arguments)
    {
        $this->raiseExceptionIf(
            empty($arguments) || !is_array($arguments),
            'Missing the script arguments.'
        );

        $input = preg_grep('/^[a-z]:?$/', array_keys($this->parameters));
        $input = implode('', $input);
        $this->options = getopt($input, array_values($this->parameters));
        $this->parseOptions($arguments);
    }
    // }}}

    // {{{ parseOptions
    /**
     * Parse the script-options to populate the array.
     *
     * @param array $arguments The array of script-parameter.
     *
     * @access protected
     * @throws Bonzai_Exception
     * @return void
     */
    protected function parseOptions(array $arguments)
    {
        $this->raiseExceptionIf(
            !is_array($this->options),
            'Invalid parameters to be parsed.'
        );

        $this->populateOptionParams($arguments);
    }
    // }}}

    // {{{ populateOptionParams
    // TODO: Optimize Cyclomatic Complexity (5).
    /**
     * Populate the array of script-options called at runtime.
     *
     * @param array $arguments The array of script-parameter.
     *
     * @access protected
     * @return void
     */
    protected function populateOptionParams(array $arguments)
    {
        $arguments = array_slice($arguments, 1);
        $prev_value = '';
        foreach ($arguments as $value) {
            $prev_key = preg_replace('/^-{1,2}/', '', $prev_value) . ':';
            if ($value[0] !== '-'
                && !isset($this->parameters[$prev_key])
                && !in_array($prev_key, $this->parameters)
            ) {
                $this->option_params[] = $value;
            }

            $prev_value = $value;
        }
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
        $key = $this->getStrVal($key);

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
        $key = $this->getStrVal($key);

        if (isset($this->labels[$key])) {
            return $this->labels[$key];
        }

        return null;
    }
    // }}}
}