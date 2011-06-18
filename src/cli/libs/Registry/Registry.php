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
 * LICENSE:        MIT or GNU GPL 2
 *                 The MIT License is recommended for most projects, it's simple
 *                 and  easy  to understand and it places almost no restrictions
 *                 on  what  you  can do with phpGuardian.
 *                 If  the  GPL  suits  your project better you are also free to
 *                 use phpGuardian under that license.
 *                 You   don't  have  to  do  anything  special  to  choose  one
 *                 license  or  the  other  and  you don't have to notify anyone
 *                 which   license   you   are   using.  You  are  free  to  use
 *                 phpGuardian  in  commercial projects as long as the copyright
 *                 header is left intact.
 *                 <http://www.opensource.org/licenses/mit-license.php>
 *                 <http://www.opensource.org/licenses/gpl-2.0.php>
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
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @license   http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link      http://www.phpguardian.org
 */
class PG_Registry
{
    // {{{ PROPERTIES
    /**
     *
     * @static
     * @access public
     * @var    array
     */
    public static $elements = array();

    /**
     *
     * @static
     * @access public
     * @var    PG_Registry
     */
    public static $instance = null;

    /**
     *
     * @static
     * @var integer
     */
    const ARRAY_APPEND = 0;

    /**
     *
     * @static
     * @var integer
     */
    const INTEGER_APPEND = 1;
    // }}}

    // {{{ METHODS
    // {{{ function getInstance
    /**
     *
     * @static
     * @access public
     * @return PG_Registry
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    // }}}

    // {{{ function add
    /**
     *
     * @access public
     * @param  string  $key
     * @param  mixed   $value
     * @param  integer $type
     * @return void
     */
    public function add($key, $value, $type = null)
    {
        if ($type == self::ARRAY_APPEND) {
            $value = array($value);
        }
        $this->elements[$key] = $value;
    }
    // }}}

    // {{{ function get
    /**
     *
     * @access public
     * @param  string       $key
     * @return mixed | null
     */
    public function get($key)
    {
        if (isset($this->elements[$key])) {
            return $this->elements[$key];
        }

        return null;
    }
    // }}}

    // {{{ function remove
    /**
     *
     * @access public
     * @param  string $key
     * @return void
     */
    public function remove($key)
    {
        if (isset($this->elements[$key])) {
            unset($this->elements[$key]);
        }
    }
    // }}}

    // {{{ function append
    // TODO: cyclomatic complex: 6
    /**
     *
     * @access public
     * @param  string  $key
     * @param  mixed   $value
     * @param  integer $type
     * @return void
     */
    public function append($key, $value, $type = null)
    {
        if (isset($this->elements[$key])) {
            if (is_array($value)) {
                $this->elements[$key][] = $value;
            } elseif (is_string($this->elements[$key])) {
                $this->elements[$key] .= $value;
            } elseif (is_numeric($this->elements[$key]) && type == self::INTEGER_APPEND) { // TODO: too long
                $this->elements[$key] += $value;
            }
        } else {
            $this->add($key, $value, $type);
        }
    }
    // }}}
    // }}}
}
