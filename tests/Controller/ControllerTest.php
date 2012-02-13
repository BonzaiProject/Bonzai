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
 * @subpackage Tests
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

if (defined('BONZAI_PATH_LIBS') === false) {
    define('BONZAI_PATH_LIBS', realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'libs') . DIRECTORY_SEPARATOR);
}

require_once BONZAI_PATH_LIBS . 'Tests'      . DIRECTORY_SEPARATOR . 'Testcase.php';
require_once BONZAI_PATH_LIBS . 'Abstract'   . DIRECTORY_SEPARATOR . 'Abstract.php';
require_once BONZAI_PATH_LIBS . 'Utils'      . DIRECTORY_SEPARATOR . 'Utils.php';
require_once BONZAI_PATH_LIBS . 'Controller' . DIRECTORY_SEPARATOR . 'Controller.php';

/**
 * BonzaiControllerTest
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Tests
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/
class BonzaiControllerTest extends BonzaiTestcase
{
    // {{{ __construct
    // Skipped the testing of `__construct` method.
    // }}}

    // {{{ elaborate
    // {{{ testElaborateJustCoverage
    /**
     * Only code-coverage of `elaborate` method.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testElaborateJustCoverage()
    {
        $this->expectOutputRegex('/^.*BONZAI +\(was phpGuardian\).*Usage:.*Options:.*$/s');

        $instance_BUO = new BonzaiUtilsOptions(array());
        $this->object->elaborate($instance_BUO);
    }
    // }}}

    // {{{ testElaborateJustCoverage2
    /**
     * Only code-coverage of `elaborate` method.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testElaborateJustCoverage2()
    {
        $this->expectOutputString('');

        $instance_BUO = new BonzaiUtilsOptions(array(__FILE__, '--quiet'));
        $this->object->elaborate($instance_BUO);
    }
    // }}}
    // }}}

    // {{{ autoload
    // {{{ testAutoloadWithParamInvalidClass
    /**
     * Test if `autoload` method does nothing for a out-of-scope classname.
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException        BonzaiException
     * @expectedExceptionCode    6534
     * @expectedExceptionMessage The class `Bonzai` cannot be loaded.
     */
    public function testAutoloadWithParamInvalidClass()
    {
        $this->callMethod('autoload', array('Bonzai'));
    }
    // }}}

    // {{{ testAutoloadWithParamFakeThrowException
    /**
     * Test if `autoload` method throw an exception for a not-existent classname.
     *
     * @ignore
     * @access                   public
     * @return                   void
     * @expectedException        BonzaiException
     * @expectedExceptionCode    6534
     * @expectedExceptionMessage The class `BonzaiFake` cannot be loaded.
     */
    public function testAutoloadWithParamFakeThrowException()
    {
        $this->callMethod('autoload', array('BonzaiFake'));
    }
    // }}}

    // {{{ testAutoloadWithParamLoadedClassReturnNothing
    /**
     * Test if `autoload` method doesn't throw an exception for an existent classname.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAutoloadWithParamLoadedClassReturnNothing()
    {
        $this->callMethod('autoload', array('BonzaiController'));
        $this->assertTrue(class_exists('BonzaiController'));
    }
    // }}}
    // }}}
}
