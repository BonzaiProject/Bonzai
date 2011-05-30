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
 * $Id: $
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
class PG_Registry {
    public static $elements = array();
    public static $instance = null;
    
    public static const ARRAY_APPEND   = 0;
    public static const INTEGER_APPEND = 1;
    
    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    public function add($key, $value, $type = null) {
        if ($type == self::ARRAY_APPEND) {
            $value = array($value);
        }
        $this->elements[$key] = $value;
    }
    
    public function get($key) {
        if (isset($this->elements[$key])) {
            return $this->elements[$key];
        }
        
        return null;
    }
    
    public function remove($key) {
        if (isset($this->elements[$key])) {
            unset($this->elements[$key]);
        }
    }
    
    public function append($key, $value, $type = null) {
        if (isset($this->elements[$key])) {
            if (is_array($value)) {
                $this->elements[$key][] = $value;
            } elseif (is_string($this->elements[$key])) {
                $this->elements[$key] .= $value;
            } elseif (is_numeric($this->elements[$key]) && type == self::INTEGER_APPEND) {
                $this->elements[$key] += $value;
            }
        } else {
            $this->add($key, $value, $type);
        }
    }
}
