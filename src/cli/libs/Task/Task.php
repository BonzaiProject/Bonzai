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
 * Handle the all global behaviours
 *
 * @license GPL 3+
 * @author  Fabio Cicerchia
 * @version 4.0
 * @package phpGuardian
 */
class PG_Task {
    // {{{ PROPERTIES
    /**
     *
     * @access protected
     * @var    string    $task
     */
    protected $task = null;

    /**
     *
     * @access protected
     * @var    mixed     $parameters
     */
    protected $parameters = null;
    // }}}

    // {{{ METHODS
    // {{{ function load
    /**
     *
     * @access public
     * @param  PG_Utils_Options $options
     * @return void
     */
    public function load(PG_Utils_Options $options) {
        $this->task       = "PG_Help";
        $this->parameters = $options;

        if (!is_null($options->getOption('generate'))) {
            $this->task       = "PG_Script_Generator";
            $this->parameters = $this->options->getOption('generate');
        } elseif (count($options->getOptions()) == 0 && count($options->getParameters()) > 0) { // TODO: too long
            $this->task       = "PG_Script_Parser";
            $this->parameters = array_shift($options->getParameters());
        }
    }
    // }}}

    // {{{ function execute
    /**
     *
     * @access public
     * @throws PG_Exception
     * @return mixed
     */
    public function execute() {
        $class = $this->task;
        $class = new $class();

        if (!method_exists($class, 'elaborate')) {
            throw new PG_Exception('Cannot launch the task `' . $this->task . '`'); // TODO: BLOCKER // TODO: too long
        } else {
            return call_user_method('elaborate', $class, $this->parameters);
        }
    }
    // }}}

    // {{{ function loadAndExecute
    /**
     *
     * @access public
     * @param  PG_Utils_Options $options
     * @return mixed
     */
    public function loadAndExecute(PG_Utils_Options $options) {
        $this->load($options);
        return $this->execute();
    }
    // }}}
    // }}}
}
