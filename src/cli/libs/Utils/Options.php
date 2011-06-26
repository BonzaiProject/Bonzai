<?php
/**
 *
 * BONZAI
 * (was phpGuardian)
 *
 * CODE NAME:      phoenix
 * ENGINE VERSION: 0.1
 * MODULE VERSION: 0.1
 *
 * URL:            http://bonzai.fabiocicerchia.it
 * E-MAIL:         bonzai@fabiocicerchia.it
 *
 * COPYRIGHT:      2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * LICENSE:        MIT or GNU GPL 2
 *                 The MIT License is recommended for most projects, it's simple
 *                 and  easy  to understand and it places almost no restrictions
 *                 on  what  you  can do with Bonzai.
 *                 If  the  GPL  suits  your project better you are also free to
 *                 use Bonzai under that license.
 *                 You   don't  have  to  do  anything  special  to  choose  one
 *                 license  or  the  other  and  you don't have to notify anyone
 *                 which   license   you   are   using.  You  are  free  to  use
 *                 Bonzai  in  commercial  projects  as  long  as  the copyright
 *                 header is left intact.
 *                 <http://www.opensource.org/licenses/mit-license.php>
 *                 <http://www.opensource.org/licenses/gpl-2.0.php>
 **/

/**
 *
 * @category  Security
 * @package   Bonzai
 * @version   0.1
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @license   http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link      http://bonzai.fabiocicerchia.it
 */
class Bonzai_Utils_Options
{
    // {{{ PROPERTIES
    /**
     *
     * @access protected
     * @var    array     $parameters
     */
    protected $parameters = array(
        'g:' => 'generate:',
        'h'  => 'help',
        'v'  => 'version');

    /**
     *
     * @access protected
     * @var    array     $labels
     */
    protected $labels = array(
        'generate' => 'Generate a new script file',
        'help'     => 'Show the help',
        'version'  => 'Show the version');
    // }}}

    // {{{ METHODS
    // {{{ function init
    /**
     *
     * @access public
     * @param  array        $argv
     * @throws Bonzai_Exception
     * @return void
     */
    public function init($argv)
    {
        if (empty($argv) || !is_array($argv)) {
            throw new Bonzai_Exception('Missing the script arguments'); // TODO: BLOCKER
        }

        $this->options     = getopt(implode('', array_keys($this->parameters)), $this->parameters); // TODO: too long
        $this->non_options = array_slice($argv, 1);

        $this->parseOptions($this->options, $this->non_options);
    }
    // }}}

    // {{{ function parseOptions
    // TODO: cyclomatic complex: 7
    /**
     *
     * @access protected
     * @param  array     $options
     * @param  array     $non_options
     * @throws Bonzai_Exception
     * @return void
     */
    protected function parseOptions(&$options, &$non_options)
    {
        if (!is_array($options) || !is_array($non_options)) {
            throw new Bonzai_Exception('Invalid parameters to be parsed'); // TODO: NON BLOCKER
        }

        // TODO: ANALYZE THIS CODE FOR PROBLEMS
        foreach($options as $key => $value) {
            unset($non_options[array_search('-' . $key, $non_options)]);

            $has_value = !$value ? '' : ':';
            $new_key   = $key . $has_value;
            if (!empty($this->parameters[$new_key])) {
                $new_key = substr($this->parameters[$new_key], 0, strlen($this->parameters[$new_key]) - strlen($has_value)); // TODO: too long
                if (empty($options[$new_key])) {
                    $options[$new_key] = $value;
                }
                unset($options[$key]);
            }
        }
    }
    // }}}

    // {{{ function getParameters
    /**
     *
     * @access public
     * @return array
     */
    public function getParameters()
    {
        return $this->non_options;
    }
    // }}}

    // {{{ function getOptions
    /**
     *
     * @access public
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
    // }}}

    // {{{ function getOption
    /**
     *
     * @access public
     * @param  string        $key
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

    // {{{ function getScriptParameters
    /**
     *
     * @access public
     * @return array
     */
    public function getScriptParameters()
    {
        return $this->parameters;
    }
    // }}}

    // {{{ function getLabelParameter
    /**
     *
     * @access public
     * @param  string        $key
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
    // }}}
}
