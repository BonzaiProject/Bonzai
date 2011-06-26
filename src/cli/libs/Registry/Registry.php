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
class Bonzai_Registry
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
     * @var    Bonzai_Registry
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
     * @return Bonzai_Registry
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
