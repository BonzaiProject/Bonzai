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
 * @subpackage Tests
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

require_once __DIR__ . '/../../src/libs/Tests/TestCase.php';
require_once __DIR__ . '/../../src/libs/Controller/Controller.php';

/**
 * Bonzai_Controller_Test
 *
 * @category   Optimization_and_Security
 * @package    Bonzai
 * @subpackage Tests
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version    Release: 0.1
 * @link       http://www.bonzai-project.org
 **/
class Bonzai_Controller_ControllerTest extends Bonzai_TestCase
{
    // {{{ elaborate
    // {{{ testElaborateJustCoverage
    /**
     * Check if a file exists in a dir
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testElaborateJustCoverage()
    {
        $this->assertEmpty($this->object->elaborate(array(), new Bonzai_Utils_Options()));
    }
    // }}}
    // }}}

    // {{{ handleTask
    // {{{ testHandleTaskJustCoverage
    /**
     * testHandleTaskJustCoverage
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testHandleTaskJustCoverage()
    {
        $this->assertEmpty($this->callMethod('handleTask', array(new Bonzai_Utils_Options())));
    }
    // }}}
    // }}}

    // {{{ autoload
    // {{{ testAutoloadWithParamInvalidClass
    /**
     * testAutoloadWithParamInvalidClass
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAutoloadWithParamInvalidClass()
    {
        $this->assertEmpty($this->callMethod('autoload', array('Bonzai')));
    }
    // }}}

    // {{{ testAutoloadWithParamFakeThrowException
    /**
     * testAutoloadWithParamFakeThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAutoloadWithParamFakeThrowException()
    {
        $this->callMethod('autoload', array('Bonzai_Fake'));
    }
    // }}}

    // {{{ testAutoloadWithParamLoadedClassReturnNothing
    /**
     * testAutoloadWithParamLoadedClassReturnNothing
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAutoloadWithParamLoadedClassReturnNothing()
    {
        $this->assertEmpty($this->callMethod('autoload', array('Bonzai_Controller')));
    }
    // }}}
    // }}}

    // {{{ getFileNameFromClassName
    // {{{ providerForGetFileNameFromClassName
    /**
     * providerForGetFileNameFromClassName
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForGetFileNameFromClassName()
    {
        return array(
            array(''),
            array(null),
            array(' '),
            array('aaa'),
        );
    }
    // }}}

    // {{{ testGetFileNameFromClassNameWithProviderReturnsNull
    /**
     * Retrieve the class filename
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForGetFileNameFromClassName
     */
    public function testGetFileNameFromClassNameWithProviderReturnsNull($a)
    {
        $value = $this->callMethod('getFileNameFromClassName', array($a));
        $this->assertNull($value);
    }
    // }}}

    // {{{ testGetFileNameFromClassNameWithParamBadFormattedReturnsNull
    /**
     * Retrieve the class filename
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassNameWithParamBadFormattedReturnsNull()
    {
        $value = $this->callMethod('getFileNameFromClassName', array('Bonzai_'));
        $this->assertNull($value);
    }
    // }}}

    // {{{ testGetFileNameFromClassNameWithParamNotExistentReturnsNull
    /**
     * Retrieve the class filename
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassNameWithParamNotExistentReturnsNull()
    {
        $value = $this->callMethod('getFileNameFromClassName', array('Bonzai_aaa'));
        $this->assertNull($value);
    }
    // }}}

    // {{{ testGetFileNameFromClassNameWithParamRealAreEquals
    /**
     * Retrieve the class filename
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassNameWithParamRealAreEquals()
    {
        $params = array('Bonzai_Controller');
        $value = $this->callMethod('getFileNameFromClassName', $params);
        $this->assertEquals('Controller/Controller', $value);
    }
    // }}}

    // {{{ testGetFileNameFromClassNameWithParamRealAreEquals2
    /**
     * Retrieve the class filename
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassNameWithParamRealAreEquals2()
    {
        $params = array('Bonzai_Utils');
        $value = $this->callMethod('getFileNameFromClassName', $params);
        $this->assertEquals('Utils/Utils', $value);
    }
    // }}}

    // {{{ testGetFileNameFromClassNameWithParamRealAreEquals3
    /**
     * Retrieve the class filename
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassNameWithParamRealAreEquals3()
    {
        $params = array('Bonzai_Utils_Help');
        $value = $this->callMethod('getFileNameFromClassName', $params);
        $this->assertEquals('Utils/Help', $value);
    }
    // }}}
    // }}}

    // {{{ checkFile
    // {{{ providerForCheckFile
    /**
     * providerForCheckFile
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForCheckFile()
    {
        return array(
            array(''),
            array(null),
            array(' '),
            array('aaa'),
        );
    }
    // }}}

    // {{{ testCheckFileWithProviderReturnsFalse
    /**
     * Check if a file exists in a dir
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForCheckFile
     */
    public function testCheckFileWithParamEmptyStringReturnsFalse($a)
    {
        $this->assertFalse($this->callMethod('checkFile', array($a)));
    }
    // }}}

    // {{{ testCheckFileWithParamRightReturnsTrue
    /**
     * Check if a file exists in a dir
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileWithParamRightReturnsTrue()
    {
        $value = $this->callMethod('checkFile', array('Controller/Controller'));
        $this->assertTrue($value);
    }
    // }}}
    // }}}
}
