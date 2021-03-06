<?php
/**
 * BONZAI
 * (was phpGuardian)
 *
 * CODENAME:  caffeine
 * VERSION:   0.2
 *
 * URL:       http://www.bonzai-project.org
 * E-MAIL:    info@bonzai-project.org
 *
 * COPYRIGHT: 2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
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
 * @copyright  2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

require_once BONZAI_PATH_LIBS . 'Exception' . DIRECTORY_SEPARATOR . 'Exception.php';

/**
 * BonzaiAbstract
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Core
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 * @abstract
 **/
abstract class BonzaiAbstract
{
    // {{{ PROPERTIES
    /**
     * The instance of BonzaiUtils.
     *
     * @static
     * @access protected
     * @var    BonzaiUtils
     */
    protected static $utils = null;
    // }}}

    // {{{ getUtils
    /**
     * The get method to retrieve the $utils protected properties.
     *
     * @param BonzaiUtils_Options $options The script's options.
     *
     * @access public
     * @return BonzaiUtils
     */
    public function getUtils(BonzaiUtilsOptions $options = null)
    {
        if (self::$utils === null) {
            self::$utils = new BonzaiUtils($options);
        }

        return self::$utils;
    }
    // }}}

    // {{{ getTempDir
    /**
     * Get the system temporary directory
     *
     * @static
     * @access public
     * @return string
     */
    public static function getTempDir()
    {
        switch(strtolower(PHP_OS))
        {
            case 'linux':
                return '/tmp/';
                break;
            case 'winnt':
            case 'win32':
            default:
                return DIRECTORY_SEPARATOR;
        }
    }
    // }}}
}
