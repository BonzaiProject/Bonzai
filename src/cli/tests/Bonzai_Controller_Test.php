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
    // {{{ test__GetFileNameFromClassName__WithParam_EmptyString__ReturnsNull
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__GetFileNameFromClassName__WithParam_EmptyString__ReturnsNull()
    {
        $this->assertNull($this->object->getFileNameFromClassName(''));
    }
    // }}}

    // {{{ test__GetFileNameFromClassName__WithParam_Null__ReturnsNull
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__GetFileNameFromClassName__WithParam_Null__ReturnsNull()
    {
        $this->assertNull($this->object->getFileNameFromClassName(null));
    }
    // }}}

    // {{{ test__GetFileNameFromClassName__WithParam_SpacedString__ReturnsNull
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__GetFileNameFromClassName__WithParam_SpacedString__ReturnsNull()
    {
        $this->assertNull($this->object->getFileNameFromClassName(' '));
    }
    // }}}

    // {{{ test__GetFileNameFromClassName__WithParam_Fake__ReturnsNull
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__GetFileNameFromClassName__WithParam_Fake__ReturnsNull()
    {
        $this->assertNull($this->object->getFileNameFromClassName('aaa'));
    }
    // }}}

    // {{{ test__GetFileNameFromClassName__WithParam_BadFormatted__ReturnsNull
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__GetFileNameFromClassName__WithParam_BadFormatted__ReturnsNull()
    {
        $this->assertNull($this->object->getFileNameFromClassName('Bonzai_'));
    }
    // }}}

    // {{{ test__GetFileNameFromClassName__WithParam_NotExistent__ReturnsNull
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__GetFileNameFromClassName__WithParam_NotExistent__ReturnsNull()
    {
        $this->assertNull($this->object->getFileNameFromClassName('Bonzai_aaa'));
    }
    // }}}

    // {{{ test__GetFileNameFromClassName__WithParam_Real_AreEquals
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__GetFileNameFromClassName__WithParam_Real_AreEquals()
    {
        $this->assertEquals('Controller/Controller', $this->object->getFileNameFromClassName('Bonzai_Controller'));
    }
    // }}}

    // {{{ test__GetFileNameFromClassName__WithParam_Real_AreEquals_2
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__GetFileNameFromClassName__WithParam_Real_AreEquals_2()
    {
        $this->assertEquals('Utils/Utils', $this->object->getFileNameFromClassName('Bonzai_Utils'));
    }
    // }}}

    // {{{ test__GetFileNameFromClassName__WithParam_Real_AreEquals_3
    /**
     * Retrieve the class filename
     * @ignore
     * @access public
     * @return void
     */
    public function test__GetFileNameFromClassName__WithParam_Real_AreEquals_3()
    {
        $this->assertEquals('Utils/Help', $this->object->getFileNameFromClassName('Bonzai_Utils_Help'));
    }
    // }}}

    // {{{ test__CheckFile__WithParam_EmptyString__ReturnsFalse
    /**
     * Check if a file exists in a dir
     * @ignore
     * @access public
     * @return void
     */
    public function test__CheckFile__WithParam_EmptyString__ReturnsFalse()
    {
        $this->assertFalse($this->object->checkFile(''));
    }
    // }}}

    // {{{ test__CheckFile__WithParam_Null__ReturnsFalse
    /**
     * Check if a file exists in a dir
     * @ignore
     * @access public
     * @return void
     */
    public function test__CheckFile__WithParam_Null__ReturnsFalse()
    {
        $this->assertFalse($this->object->checkFile(null));
    }
    // }}}

    // {{{ test__CheckFile__WithParam_SpacedString__ReturnsFalse
    /**
     * Check if a file exists in a dir
     * @ignore
     * @access public
     * @return void
     */
    public function test__CheckFile__WithParam_SpacedString__ReturnsFalse()
    {
        $this->assertFalse($this->object->checkFile(' '));
    }
    // }}}

    // {{{ test__CheckFile__WithParam_Wrong__ReturnsFalse
    /**
     * Check if a file exists in a dir
     * @ignore
     * @access public
     * @return void
     */
    public function test__CheckFile__WithParam_Wrong__ReturnsFalse()
    {
        $this->assertFalse($this->object->checkFile('Controller'));
    }
    // }}}

    // {{{ test__CheckFile__WithParam_Right__ReturnsTrue
    /**
     * Check if a file exists in a dir
     * @ignore
     * @access public
     * @return void
     */
    public function test__CheckFile__WithParam_Right__ReturnsTrue()
    {
        $this->assertTrue($this->object->checkFile('Controller/Controller'));
    }
    // }}}
}
