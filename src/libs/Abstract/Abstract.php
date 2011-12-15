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

require_once __DIR__ . '/../Exception/Exception.php';

/**
 * Bonzai_Abstract
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
abstract class Bonzai_Abstract
{
    // {{{ PROPERTIES
    /**
     * @static
     * @access protected
     * @var    Bonzai_Utils
     */
    protected static $utils = null;
    // }}}

    // {{{ getUtils
    // TODO: ADD TEST
    /**
     * getUtils
     *
     * @access public
     * @return Bonzai_Utils
     */
    public function getUtils()
    {
        if (is_null(self::$utils)) {
            self::$utils = new Bonzai_Utils();
        }

        return self::$utils;
    }
    // }}}

    // {{{ raiseExceptionIf
    // TODO: ADD TEST
    /**
     * raiseExceptionIf
     *
     * @param boolean $condition
     * @param mixed   $message
     *
     * @access protected
     * @throws Bonzai_Exception
     * @return void
     */
    protected static function raiseExceptionIf($condition, $message)
    {
        if (is_array($message)) {
            $format = gettext(array_shift($message));
            $message = vsprintf($format, $message);
        } else {
            $message = gettext(strval($message));
        }

        if ($condition) {
            throw new Bonzai_Exception($message);
        }
    }
    // }}}

    // {{{ getStrVal
    // TODO: ADD TEST
    /**
     * getStrVal
     *
     * @param mixed $var
     *
     * @access protected
     * @return string
     */
    protected static function getStrVal($var)
    {
        return is_array($var) ? implode('', $var) : strval($var);
    }
    // }}}
}
