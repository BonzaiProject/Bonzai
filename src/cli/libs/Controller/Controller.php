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
 * @category  Security
 * @package   phpGuardian
 * @version   4.0
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Fabio Cicerchia
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt GNU General Public License 3.0
 * @link      http://www.phpguardian.org
 */
class PG_Controller {
    // {{{ PROPERTIES
    /**
     *
     * @access protected
     * @var    array
     */
    protected $options = array();
    // }}}

    // {{{ METHODS
    // {{{ function __construct
    /**
     *
     * @access public
     * @return void
     */
    public function __construct() {
        // Register the custom autoloader
        spl_autoload_register('PG_Controller::__autoload');
    }
    // }}}

    // {{{ function elaborate
    /**
     *
     * @access public
     * @return void
     */
    public function elaborate() {
        // Get the Script Options
        $this->options = new PG_Utils_Options();
        $this->options->init($_SERVER['argv']);

        // Switch to Selected Task
        $this->handleTask();
    }
    // }}}

    // {{{ function handleTask
    /**
     *
     * @access public
     * @return void
     */
    public function handleTask()
    {
        // Load the Task Handler
        $task = new PG_Task();

        // load and excute task
        $task->loadAndExecute($this->options);
    }
    // }}}

    // {{{ function __autoload
    /**
     *
     * @access public
     * @param  string       $name
     * @throws PG_Exception
     * @return void
     */
    public function __autoload($name) {
        if (substr($name, 0, 3) == 'PG_') {
            // Get the class filename
            $name     = preg_replace('/^PG_/', '', $name);
            $filename = str_replace('_', DIRECTORY_SEPARATOR, $name);

            $full_filename = __DIR__ . '/../' . $filename . '.php';
            if (!file_exists($full_filename) && ($name == $filename)) {
                $filename     .= DIRECTORY_SEPARATOR . $name;
                $full_filename = __DIR__ . '/../' . $filename . '.php';
            }

            if (!file_exists($full_filename)) {
                throw new PG_Exception('The class `' . $name . '` cannot be loaded'); // TODO: BLOCKER
            }

            require_once $full_filename;
        }
    }
    // }}}
    // }}}
}
