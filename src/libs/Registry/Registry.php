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
 *
 * PHP version 5
 *
 * @category   Optimization_and_Security
 * @package    Bonzai
 * @subpackage Registry
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

/**
 * Bonzai_Registry
 *
 * @category   Optimization_and_Security
 * @package    Bonzai
 * @subpackage Registry
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version    Release: 0.1
 * @link       http://www.bonzai-project.org
 **/
class Bonzai_Registry
{
    // {{{ PROPERTIES
    /**
     * @static
     * @access public
     * @var    array
     */
    public static $elements = array();
    // }}}

    // {{{ add
    /**
     * add
     *
     * @param string $key
     * @param mixed  $value
     *
     * @static
     * @access public
     * @return void
     */
    public static function add($key, $value)
    {
        $key = is_array($key) ? implode('', $key) : strval($key);

        self::checkKeyValidity($key);
        self::$elements[$key] = $value;
    }
    // }}}

    // {{{ get
    /**
     * get
     *
     * @param string $key
     *
     * @static
     * @access public
     * @return mixed | null
     */
    public static function get($key)
    {
        $key = is_array($key) ? implode('', $key) : strval($key);
        self::checkKeyValidity($key);

        if (isset(self::$elements[$key])) {
            return self::$elements[$key];
        }

        return null;
    }
    // }}}

    // {{{ remove
    /**
     * remove
     *
     * @param string $key
     *
     * @static
     * @access public
     * @return boolean
     */
    public static function remove($key)
    {
        $key = is_array($key) ? implode('', $key) : strval($key);
        self::checkKeyValidity($key);

        if (isset(self::$elements[$key])) {
            unset(self::$elements[$key]);
        }
    }
    // }}}

    // {{{ append
    /**
     * append
     *
     * @param string $key
     * @param mixed  $value
     *
     * @static
     * @access public
     * @return void
     */
    public static function append($key, $value)
    {
        $key = is_array($key) ? implode('', $key) : strval($key);
        self::checkKeyValidity($key);

        if (isset(self::$elements[$key])) {
            self::appendAs(gettype(self::$elements[$key]), $key, $value);
        } else {
            self::add($key, $value);
        }
    }
    // }}}

    // {{{ appendAs
    /**
     * appendAs
     *
     * @param string $variable_type
     * @param string $key
     * @param mixed  $value
     *
     * @static
     * @access public
     * @return void
     */
    protected static function appendAs($variable_type, $key, $value)
    {
        $variable_type = is_array($variable_type)
                         ? implode('', $variable_type)
                         : strval($variable_type);

        $key = is_array($key) ? implode('', $key) : strval($key);
        $method = 'appendAs' . ucfirst($variable_type);

        if (method_exists('Bonzai_Registry', $method)) {
            self::$method($key, $value);
        }
    }
    // }}}

    // {{{ appendAsArray
    /**
     * appendAsArray
     *
     * @param string $key
     * @param mixed  $value
     *
     * @static
     * @access public
     * @return void
     */
    protected static function appendAsArray($key, $value)
    {
        $key = is_array($key) ? implode('', $key) : strval($key);

        if (is_array(self::$elements[$key])) {
            self::$elements[$key][] = $value;
        }
    }
    // }}}

    // {{{ appendAsString
    /**
     * appendAsString
     *
     * @param string $key
     * @param mixed  $value
     *
     * @static
     * @access public
     * @return void
     */
    protected static function appendAsString($key, $value)
    {
        $key = is_array($key) ? implode('', $key) : strval($key);

        if (is_string(self::$elements[$key])) {
            self::$elements[$key] .= $value;
        }
    }
    // }}}

    // {{{ appendAsInteger
    /**
     * appendAsInteger
     *
     * @param string $key
     * @param mixed  $value
     *
     * @static
     * @access public
     * @return void
     */
    protected static function appendAsInteger($key, $value)
    {
        $key = is_array($key) ? implode('', $key) : strval($key);

        self::$elements[$key] += $value;
    }
    // }}}

    // {{{ checkKeyValidity
    /**
     * checkKeyValidity
     *
     * @param string $key
     *
     * @static
     * @access protected
     * @throws Bonzai_Exception
     * @return void
     */
    protected static function checkKeyValidity($key)
    {
        $key = is_array($key) ? implode('', $key) : strval($key);

        if (empty($key) || (!is_string($key) && !is_numeric($key))) {
            $message = gettext('Invalid key type.');
            throw new Bonzai_Exception($message); // Exception not catched
        }
    }
    // }}}
}
