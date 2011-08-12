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

require_once dirname(__FILE__) . '/../libs/Tests/TestCase.php';
require_once dirname(__FILE__) . '/../libs/Controller/Controller.php';

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
    // {{{ testGetFileNameFromClassName1
    // WHAT: retrieve the class filename
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName1()
    {
        $this->assertNull($this->object->getFileNameFromClassName(''));
    }
    // }}}

    // {{{ testGetFileNameFromClassName2
    // WHAT: retrieve the class filename
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName2()
    {
        $this->assertNull($this->object->getFileNameFromClassName(null));
    }
    // }}}

    // {{{ testGetFileNameFromClassName3
    // WHAT: retrieve the class filename
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName3()
    {
        $this->assertNull($this->object->getFileNameFromClassName(' '));
    }
    // }}}

    // {{{ testGetFileNameFromClassName4
    // WHAT: retrieve the class filename
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName4()
    {
        $this->assertNull($this->object->getFileNameFromClassName('aaa'));
    }
    // }}}

    // {{{ testGetFileNameFromClassName5
    // WHAT: retrieve the class filename
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName5()
    {
        $this->assertNull($this->object->getFileNameFromClassName('Bonzai_'));
    }
    // }}}

    // {{{ testGetFileNameFromClassName6
    // WHAT: retrieve the class filename
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName6()
    {
        $this->assertNull($this->object->getFileNameFromClassName('Bonzai_aaa'));
    }
    // }}}

    // {{{ testGetFileNameFromClassName7
    // WHAT: retrieve the class filename
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName7()
    {
        $this->assertEquals('Controller/Controller', $this->object->getFileNameFromClassName('Bonzai_Controller'));
    }
    // }}}

    // {{{ testGetFileNameFromClassName8
    // WHAT: retrieve the class filename
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName8()
    {
        $this->assertEquals('Utils/Utils', $this->object->getFileNameFromClassName('Bonzai_Utils'));
    }
    // }}}

    // {{{ testGetFileNameFromClassName9
    // WHAT: retrieve the class filename
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName9()
    {
        $this->assertEquals('Utils/Help', $this->object->getFileNameFromClassName('Bonzai_Utils_Help'));
    }
    // }}}

    // {{{ testCheckFile1
    // WHAT: check if a file exists in a dir
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFile1()
    {
        $this->assertFalse($this->object->checkFile(''));
    }
    // }}}

    // {{{ testCheckFile2
    // WHAT: check if a file exists in a dir
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFile2()
    {
        $this->assertFalse($this->object->checkFile(null));
    }
    // }}}

    // {{{ testCheckFile3
    // WHAT: check if a file exists in a dir
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFile3()
    {
        $this->assertFalse($this->object->checkFile(' '));
    }
    // }}}

    // {{{ testCheckFile4
    // WHAT: check if a file exists in a dir
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFile4()
    {
        $this->assertFalse($this->object->checkFile('Controller'));
    }
    // }}}

    // {{{ testCheckFile5
    // WHAT: check if a file exists in a dir
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFile5()
    {
        $this->assertTrue($this->object->checkFile('Controller/Controller'));
    }
    // }}}
}
