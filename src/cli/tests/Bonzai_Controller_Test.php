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
 **/

require_once __DIR__ . '/../libs/Tests/TestCase.php';
require_once __DIR__ . '/../libs/Controller/Controller.php';

/**
 * @category  Optimization & Security
 * @package   Bonzai
 * @version   0.1
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @license   http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link      http://www.bonzai-project.org
 */
class Bonzai_Controller_Test extends Bonzai_TestCase
{
    // {{{ elaborate
    // {{{ test__elaborate
    /**
     * Check if a file exists in a dir
     * @ignore
     * @access public
     * @return void
     */
    public function test__elaborate()
    {
        $this->object->elaborate(array());
    }
    // }}}
    // }}}

    // {{{ handleTask
    // {{{ test__handleTask
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__handleTask()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}
    // }}}

    // {{{ __autoload
    // {{{ test____autoload__WithParam_InvalidClass__ThrowException
    /**
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test____autoload__WithParam_InvalidClass__ThrowException()
    {
        $this->getMethod('__autoload')->invokeArgs($this->object, array('Bonzai'));
    }
    // }}}

    // {{{ test____autoload__WithParam_Fake__ThrowException
    /**
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test____autoload__WithParam_Fake__ThrowException()
    {
        $this->getMethod('__autoload')->invokeArgs($this->object, array('Bonzai_Fake'));
    }
    // }}}

    // {{{ test____autoload__WithParam_LoadedClass__ReturnNothing
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test____autoload__WithParam_LoadedClass__ReturnNothing()
    {
        $this->getMethod('__autoload')->invokeArgs($this->object, array('Bonzai_Controller'));
    }
    // }}}
    // }}}

    // {{{ getFileNameFromClassName
    // {{{ test__getFileNameFromClassName__WithParam_EmptyString__ReturnsNull
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__getFileNameFromClassName__WithParam_EmptyString__ReturnsNull()
    {
        $this->assertNull($this->getMethod('getFileNameFromClassName')->invokeArgs($this->object, array('')));
    }
    // }}}

    // {{{ test__getFileNameFromClassName__WithParam_Null__ReturnsNull
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__getFileNameFromClassName__WithParam_Null__ReturnsNull()
    {
        $this->assertNull($this->getMethod('getFileNameFromClassName')->invokeArgs($this->object, array(null)));
    }
    // }}}

    // {{{ test__getFileNameFromClassName__WithParam_SpacedString__ReturnsNull
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__getFileNameFromClassName__WithParam_SpacedString__ReturnsNull()
    {
        $this->assertNull($this->getMethod('getFileNameFromClassName')->invokeArgs($this->object, array(' ')));
    }
    // }}}

    // {{{ test__getFileNameFromClassName__WithParam_Fake__ReturnsNull
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__getFileNameFromClassName__WithParam_Fake__ReturnsNull()
    {
        $this->assertNull($this->getMethod('getFileNameFromClassName')->invokeArgs($this->object, array('aaa')));
    }
    // }}}

    // {{{ test__getFileNameFromClassName__WithParam_BadFormatted__ReturnsNull
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__getFileNameFromClassName__WithParam_BadFormatted__ReturnsNull()
    {
        $this->assertNull($this->getMethod('getFileNameFromClassName')->invokeArgs($this->object, array('Bonzai_')));
    }
    // }}}

    // {{{ test__getFileNameFromClassName__WithParam_NotExistent__ReturnsNull
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__getFileNameFromClassName__WithParam_NotExistent__ReturnsNull()
    {
        $this->assertNull($this->getMethod('getFileNameFromClassName')->invokeArgs($this->object, array('Bonzai_aaa')));
    }
    // }}}

    // {{{ test__getFileNameFromClassName__WithParam_Real_AreEquals
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__getFileNameFromClassName__WithParam_Real_AreEquals()
    {
        $this->assertEquals('Controller/Controller', $this->getMethod('getFileNameFromClassName')->invokeArgs($this->object, array('Bonzai_Controller')));
    }
    // }}}

    // {{{ test__getFileNameFromClassName__WithParam_Real_AreEquals_2
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__getFileNameFromClassName__WithParam_Real_AreEquals_2()
    {
        $this->assertEquals('Utils/Utils', $this->getMethod('getFileNameFromClassName')->invokeArgs($this->object, array('Bonzai_Utils')));
    }
    // }}}

    // {{{ test__getFileNameFromClassName__WithParam_Real_AreEquals_3
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__getFileNameFromClassName__WithParam_Real_AreEquals_3()
    {
        $this->assertEquals('Utils/Help', $this->getMethod('getFileNameFromClassName')->invokeArgs($this->object, array('Bonzai_Utils_Help')));
    }
    // }}}
    // }}}

    // {{{ checkFile
    // {{{ test__checkFile__WithParam_EmptyString__ReturnsFalse
    /**
     * Check if a file exists in a dir
     * @ignore
     * @access public
     * @return void
     */
    public function test__checkFile__WithParam_EmptyString__ReturnsFalse()
    {
        $this->assertFalse($this->getMethod('checkFile')->invokeArgs($this->object, array('')));
    }
    // }}}

    // {{{ test__checkFile__WithParam_Null__ReturnsFalse
    /**
     * Check if a file exists in a dir
     * @ignore
     * @access public
     * @return void
     */
    public function test__checkFile__WithParam_Null__ReturnsFalse()
    {
        $this->assertFalse($this->getMethod('checkFile')->invokeArgs($this->object, array(null)));
    }
    // }}}

    // {{{ test__checkFile__WithParam_SpacedString__ReturnsFalse
    /**
     * Check if a file exists in a dir
     * @ignore
     * @access public
     * @return void
     */
    public function test__checkFile__WithParam_SpacedString__ReturnsFalse()
    {
        $this->assertFalse($this->getMethod('checkFile')->invokeArgs($this->object, array(' ')));
    }
    // }}}

    // {{{ test__checkFile__WithParam_Wrong__ReturnsFalse
    /**
     * Check if a file exists in a dir
     * @ignore
     * @access public
     * @return void
     */
    public function test__checkFile__WithParam_Wrong__ReturnsFalse()
    {
        $this->assertFalse($this->getMethod('checkFile')->invokeArgs($this->object, array('Controller')));
    }
    // }}}

    // {{{ test__checkFile__WithParam_Right__ReturnsTrue
    /**
     * Check if a file exists in a dir
     * @ignore
     * @access public
     * @return void
     */
    public function test__checkFile__WithParam_Right__ReturnsTrue()
    {
        $this->assertTrue($this->getMethod('checkFile')->invokeArgs($this->object, array('Controller/Controller')));
    }
    // }}}
    // }}}
}
