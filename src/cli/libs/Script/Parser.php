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
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Fabio Cicerchia
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt GNU General Public License 3.0
 * @link      http://www.phpguardian.org
 */
class PG_Script_Parser {
    // {{{ PROPERTIES
    /**
     *
     * @static
     * @access public
     * @var    array $config
     */
    public static $config = array();
    // }}}

    // {{{ METHODS
    // {{{ function elaborate
    /**
     *
     * @access public
     * @param  string $file
     * @return void
     */
    public function elaborate($file) {
        $this->loadConfig($file);

        $action = strtolower($this->config['SETUP']['ACTION']);
        $class  = "PG_" . ucfirst($action) . 'r';

        $obj = new $class();

        // TODO: ANALYZE THIS CODE FOR PROBLEMS
        foreach($this->config['PATHS']['LIST'] as $path) {
            $files = PG_Utils::rscandir($path['PATH']);
            $files = preg_grep('/\.php$/', $files);
            foreach($this->config['PATHS']['EXCLUDE_PATH_PATTERN'] as $pattern) {
                $files = preg_grep('/' . $pattern . '/', $files, PREG_GREP_INVERT);
            }

            foreach($files as $file) {
                $elem = $path;
                $elem['FILE'] = $file;
                unset($elem['PATH']);
                $this->config['FILES']['LIST'][] = $elem;
            }
        }

        // TODO: ANALYZE THIS CODE FOR PROBLEMS
        foreach($this->config['FILES']['LIST'] as $file) {
            foreach($this->config['FILES']['EXCLUDE_PATH_PATTERN'] as $pattern) {
                if (preg_match('/' . $pattern . '/', $file)) {
                    continue 2;
                }
            }

            $obj->elaborate($file);
        }
    }
    // }}}

    // {{{ function loadConfig
    /**
     *
     * @access protected
     * @param  string    $file
     * @throws PG_Exception
     * @return void
     */
    protected function loadConfig($file) {
        if (empty($file) || !is_readable($file)) {
            throw new PG_Exception('The file `' . $file . '` cannot be opened'); // TODO: BLOCKER ?
        }

        PG_Utils::pg_message("Loading configuration options...", false);

        $file         = PG_Utils::getFilePath($file);
        $this->config = parse_ini_file($file, true);

        $this->parseList(&$this->config['PATHS'], 'PATHS');
        $this->parseList(&$this->config['FILES'], 'FILES');

        $this->elaborateConfig();
    }
    // }}}

    // {{{ function elaborateConfig
    /**
     *
     * @access public
     * @return array
     */
    public function elaborateConfig() {
        $this->analyzeOptions();

        $this->handleConfigFiles('PATHS');
        $this->handleConfigFiles('FILES');

        if (!empty($this->config['KEY']['KEY_FILE'])) {
            $this->config['KEY']['KEY'] = PG_Utils::getFileContent($this->config['KEY']['KEY_FILE']);
        }
        $this->config['KEY']['KEY_HASH'] = PG_Hash::hash($this->config['KEY']['KEY']);

        return $this->config;
    }
    // }}}

    // {{{ function handleConfigFiles
    /**
     *
     * @access protected
     * @param  string    $key
     * @return void
     */
    protected function handleConfigFiles($key) {
        $exclude = 'EXCLUDE_' . substr($key, 0, -1) . '_PATTERN';
        $this->config[$key][$exclude] = split(',\s*', $this->config[$key][$exclude]);

        foreach($this->config[$key]['LIST'] as $k => $v) {
            $this->setInputInfoField(&$this->config[$key]['LIST'][$k], 'HEADER');
            $this->setInputInfoField(&$this->config[$key]['LIST'][$k], 'FOOTER');
        }
    }
    // }}}

    // {{{ function setInputInfoField
    /**
     *
     * @access protected
     * @param  array     $param
     * @param  string    $field
     * @return void
     */
    protected function setInputInfoField($param, $field) {
        if (!isset($param[$field])) {
            $param[$field] = $this->config[$field];
        }
    }
    // }}}

    // {{{ function analyzeOptions
    /**
     *
     * @access protected
     * @return void
     */
    protected function analyzeOptions() {
        foreach($this->config as $key => $value) {
            $this->config[$key] = array_map(array($this, 'convertToBoolean'), $value);
        }
    }
    // }}}

    // {{{ function convertToBoolean
    /**
     *
     * @access protected
     * @param  mixed           $value
     * @return boolean | mixed
     */
    protected function convertToBoolean($value) {
        if (is_string($value)) {
            if (strtolower($value) == 'yes') {
                return true;
            } elseif (strtolower($value) == 'no') {
                return false;
            }
        }

        return $value;
    }
    // }}}

    // {{{ function parseList
    /**
     *
     * @access protected
     * @param  string    $config
     * @param  string    $prefix
     * @return void
     */
    protected function parseList($config, $prefix) {
        $new = array();
        foreach($config as $key => $value) {
            if (preg_match('/^' . $prefix . '\.\d+\./', $key)) {
                unset($config[$key]);
                $id  = preg_replace('/.*(\d+).*/', '\1', $key);
                $key = preg_replace('/^' . $prefix . '\.\d+\./', '', $key);
                $new[$id][$key] = $value;
            }
        }
        $config['LIST'] = $new;
    }
    // }}}
    // }}}
}
