<?php
/**
 * BONZAI
 * (was phpGuardian)
 *
 * CODE NAME: phoenix
 * VERSION:   0.1
 *
 * URL:       http://www.bonzai-project.org
 * E-MAIL:    info@bonzai-project.org
 *
 * COPYRIGHT: 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * LICENSE:   MIT or GNU GPL 2
 *            The MIT License is recommended for most projects, it's simple and
 *            easy to understand  and it places  almost no restrictions on what
 *            you can do with Bonzai.
 *            If the GPL  suits your project  better you are  also free to  use
 *            Bonzai under that license.
 *            You don't have  to do anything  special to choose  one license or
 *            the other  and you don't have to notify  anyone which license you
 *            are using.  You are free  to use Bonzai in commercial projects as
 *            long as the copyright header is left intact.
 *            <http://www.opensource.org/licenses/mit-license.php>
 *            <http://www.opensource.org/licenses/gpl-2.0.php>
 *
 * PHP version 5
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Core
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

/**
 * Bonzai_Registry
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Core
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/
class Bonzai_Registry extends Bonzai_Abstract
{
    // {{{ PROPERTIES
    /**
     * Storage Container for the Registry.
     *
     * @static
     * @access public
     * @var    array
     */
    public static $elements = array();
    // }}}

    // {{{ add
    /**
     * Add an element to the Storage Container.
     *
     * @param string $key   The key of element of Storage Container.
     * @param mixed  $value The value of element of Storage Container.
     *
     * @static
     * @access public
     * @return void
     */
    public static function add($key, $value)
    {
        $key = self::getStrVal($key);

        self::checkKeyValidity($key);
        self::$elements[$key] = $value;
    }
    // }}}

    // {{{ get
    /**
     * Get an element from the Storage Container.
     *
     * @param string $key The key of element of Storage Container.
     *
     * @static
     * @access public
     * @return mixed | null
     */
    public static function get($key)
    {
        $key = self::getStrVal($key);
        self::checkKeyValidity($key);

        if (isset(self::$elements[$key])) {
            return self::$elements[$key];
        }

        return null;
    }
    // }}}

    // {{{ remove
    /**
     * Remove an element from the Storage Container.
     *
     * @param string $key The key of element of Storage Container.
     *
     * @static
     * @access public
     * @return boolean
     */
    public static function remove($key)
    {
        $key = self::getStrVal($key);
        self::checkKeyValidity($key);

        if (isset(self::$elements[$key])) {
            unset(self::$elements[$key]);
        }
    }
    // }}}

    // {{{ append
    /**
     * Append an element to the Storage Container
     * (only if not exists, otherwise will be created).
     *
     * @param string $key   The key of element of Storage Container.
     * @param mixed  $value The value of element of Storage Container.
     *
     * @static
     * @access public
     * @return void
     */
    public static function append($key, $value)
    {
        $key = self::getStrVal($key);
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
     * Append an element based on variable-type.
     *
     * @param string $variable_type The type of variable to be saved.
     * @param string $key           The key of element of Storage Container.
     * @param mixed  $value         The value of element of Storage Container.
     *
     * @static
     * @access public
     * @return void
     */
    protected static function appendAs($variable_type, $key, $value)
    {
        $variable_type = self::getStrVal($variable_type);
        $key = self::getStrVal($key);

        $method = 'appendAs' . ucfirst($variable_type);

        if (method_exists('Bonzai_Registry', $method)) {
            self::$method($key, $value);
        }
    }
    // }}}

    // {{{ appendAsArray
    /**
     * Append an array-element to the Storage Container
     *
     * @param string $key   The key of element of Storage Container.
     * @param mixed  $value The value of element of Storage Container.
     *
     * @static
     * @access public
     * @return void
     */
    protected static function appendAsArray($key, $value)
    {
        $key = self::getStrVal($key);

        if (is_array(self::$elements[$key])) {
            self::$elements[$key][] = $value;
        }
    }
    // }}}

    // {{{ appendAsString
    /**
     * Append a string-element to the Storage Container.
     *
     * @param string $key   The key of element of Storage Container.
     * @param mixed  $value The value of element of Storage Container.
     *
     * @static
     * @access public
     * @return void
     */
    protected static function appendAsString($key, $value)
    {
        $key = self::getStrVal($key);

        if (is_string(self::$elements[$key])) {
            self::$elements[$key] .= $value;
        }
    }
    // }}}

    // {{{ appendAsInteger
    /**
     * Append an integer-element to the Storage Container.
     *
     * @param string $key   The key of element of Storage Container.
     * @param mixed  $value The value of element of Storage Container.
     *
     * @static
     * @access public
     * @return void
     */
    protected static function appendAsInteger($key, $value)
    {
        $key = self::getStrVal($key);

        self::$elements[$key] += $value;
    }
    // }}}

    // {{{ checkKeyValidity
    /**
     * Check the validity of an access-key.
     *
     * @param string $key The key of element of Storage Container.
     *
     * @static
     * @access protected
     * @throws Bonzai_Exception
     * @return void
     */
    protected static function checkKeyValidity($key)
    {
        $key = self::getStrVal($key);

        self::raiseExceptionIf(
            empty($key) || (!is_string($key) && !is_numeric($key)),
            'Invalid key type.'
        ); // Exception not catched
    }
    // }}}
}