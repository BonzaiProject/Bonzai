<?php
/**
 *        _            ____                     _ _             ____
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian CLI
 *
 *
 * PHPGUARDIAN2
 *
 * CODE NAME:      phoenix
 * ENGINE VERSION: 4.0
 * MODULE VERSION: 1.0
 *
 * URL:            http://www.phpguardian.org
 * E-MAIL:         info@phpguardian.org
 *
 * COPYRIGHT:      2006-2011 Fabio Cicerchia
 * LICENSE:        GNU GPL 3+
 *                 This program is free software: you can redistribute it and/or
 *                 modify it under the terms of the GNU General Public License
 *                 as published by the Free Software Foundation, either version
 *                 3 of the License, or (at your option) any later version.
 *
 *                 This program is distributed in the hope that it will be
 *                 useful, but WITHOUT ANY WARRANTY; without even the implied
 *                 warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *                 PURPOSE. See the GNU General Public License for more details.
 *
 *                 You should have received a copy of the GNU General Public
 *                 Licensealong with this program. If not, see
 *                 <http://www.gnu.org/licenses/>.
 *
 * $Id$
 **/

/**
 *
 * @category  Security
 * @package   phpGuardian
 * @version   4.0
 * @author    Fabio Cicerchia <info@phpguardian.org>
 * @copyright 2006-2011 Fabio Cicerchia
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt GNU GPL 3.0
 * @link      http://www.phpguardian.org
 */
class PG_Utils_Options {
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
     * @throws PG_Exception
     * @return void
     */
    public function init($argv) {
        if (!is_array($argv) || empty($argv)) {
            throw new PG_Exception('Missing the script arguments'); // TODO: BLOCKER
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
     * @throws PG_Exception
     * @return void
     */
    protected function parseOptions(&$options, &$non_options) {
        if (!is_array($options) || !is_array($non_options)) {
            throw new PG_Exception('Invalid parameters to be parsed'); // TODO: NON BLOCKER
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
    public function getParameters() {
        return $this->non_options;
    }
    // }}}

    // {{{ function getOptions
    /**
     *
     * @access public
     * @return array
     */
    public function getOptions() {
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
    public function getOption($key) {
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
    public function getScriptParameters() {
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
    public function getLabelParameter($key) {
        if (isset($this->labels[$key])) {
            return $this->labels[$key];
        }

        return null;
    }
    // }}}
    // }}}
}
