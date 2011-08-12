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
 **/

/**
 * @category  Optimization & Security
 * @package   Bonzai
 * @version   0.1
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @license   http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link      http://www.bonzai-project.org
 */
class Bonzai_Utils_Options
{
    // {{{ PROPERTIES
    /**
     * @access protected
     * @var    array $parameters
     */
    protected $parameters = array(
        'b'  => 'backup',
        'h'  => 'help',
        'v'  => 'version');

    /**
     * @access protected
     * @var    array $labels
     */
    protected $labels = array(
        'backup'  => 'Backup the original file, generate a .bak file (default: false)',
        'help'    => 'Show the help',
        'version' => 'Show the version');
    // }}}

    // {{{ init
    /**
     * @access public
     * @param  array $argv
     * @throws Bonzai_Exception
     * @return void
     */
    public function init($argv)
    {
        if (empty($argv) || !is_array($argv)) {
            $message = gettext('Missing the script arguments.');
            throw new Bonzai_Exception($message);
        }

        $this->options     = getopt(implode('', array_keys($this->parameters)), $this->parameters);
        $this->non_options = array_slice($argv, 1);

        $this->parseOptions();
    }
    // }}}

    // {{{ parseOptions
    // TODO: Cyclomatic Complexity 7
    /**
     * @access protected
     * @throws Bonzai_Exception
     * @return void
     */
    protected function parseOptions()
    {
        if (!is_array($this->options) || !is_array($this->non_options)) {
            $message = gettext('Invalid parameters to be parsed.');
            throw new Bonzai_Exception($message);
        }

        foreach($this->options as $key => $value) {
            unset($this->non_options[array_search('-' . $key, $this->non_options)]);

            $has_value = !$value ? '' : ':';
            $new_key   = $key . $has_value;
            if (!empty($this->parameters[$new_key])) {
                $new_key = substr($this->parameters[$new_key], 0, strlen($this->parameters[$new_key]) - strlen($has_value));
                if (empty($this->options[$new_key])) {
                    $this->options[$new_key] = $value;
                }
                unset($this->options[$key]);
            }
        }
    }
    // }}}

    // {{{ getNonOptions
    /**
     * @access public
     * @return array
     */
    public function getNonOptions()
    {
        return $this->non_options;
    }
    // }}}

    // {{{ getOptions
    /**
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
     * @access public
     * @param  string $key
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

    // {{{ getScriptParameters
    /**
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
     * @access public
     * @param  string $key
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
