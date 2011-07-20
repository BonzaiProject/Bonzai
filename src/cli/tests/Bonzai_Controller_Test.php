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
    // {{{ testGetFileNameFromClassName
    // WHAT: retrieve the class filename
    /**
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName1()
    {
        $this->assertEquals(null, $this->object->getFileNameFromClassName(''));
    }
    // }}}

    // {{{ testGetFileNameFromClassName
    // WHAT: retrieve the class filename
    /**
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName2()
    {
        $this->assertEquals(null, $this->object->getFileNameFromClassName(null));
    }
    // }}}

    // {{{ testGetFileNameFromClassName
    // WHAT: retrieve the class filename
    /**
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName3()
    {
        $this->assertEquals(null, $this->object->getFileNameFromClassName(' '));
    }
    // }}}

    // {{{ testGetFileNameFromClassName
    // WHAT: retrieve the class filename
    /**
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName4()
    {
        $this->assertEquals(null, $this->object->getFileNameFromClassName('aaa'));
    }
    // }}}

    // {{{ testGetFileNameFromClassName
    // WHAT: retrieve the class filename
    /**
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName5()
    {
        $this->assertEquals(null, $this->object->getFileNameFromClassName('Bonzai_'));
    }
    // }}}

    // {{{ testGetFileNameFromClassName
    // WHAT: retrieve the class filename
    /**
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName6()
    {
        $this->assertEquals(null, $this->object->getFileNameFromClassName('Bonzai_aaa'));
    }
    // }}}

    // {{{ testGetFileNameFromClassName
    // WHAT: retrieve the class filename
    /**
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName7()
    {
        $this->assertEquals('Controller/Controller.php', $this->object->getFileNameFromClassName('Bonzai_Controller'));
    }
    // }}}

    // {{{ testGetFileNameFromClassName
    // WHAT: retrieve the class filename
    /**
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName8()
    {
        $this->assertEquals('Utils/Utils.php', $this->object->getFileNameFromClassName('Bonzai_Utils'));
    }
    // }}}

    // {{{ testGetFileNameFromClassName
    // WHAT: retrieve the class filename
    /**
     * @access public
     * @return void
     */
    public function testGetFileNameFromClassName9()
    {
        $this->assertEquals('Utils/Help.php', $this->object->getFileNameFromClassName('Bonzai_Utils_Help'));
    }
    // }}}

    // {{{ testCheckFile
    // WHAT: check if a file exists in a dir
    /**
     * @access public
     * @return void
     */
    public function testCheckFile1()
    {
        $this->assertEquals(false, $this->object->checkFile(''));
    }
    // }}}

    // {{{ testCheckFile
    // WHAT: check if a file exists in a dir
    /**
     * @access public
     * @return void
     */
    public function testCheckFile2()
    {
        $this->assertEquals(false, $this->object->checkFile(null));
    }
    // }}}

    // {{{ testCheckFile
    // WHAT: check if a file exists in a dir
    /**
     * @access public
     * @return void
     */
    public function testCheckFile3()
    {
        $this->assertEquals(false, $this->object->checkFile(' '));
    }
    // }}}

    // {{{ testCheckFile
    // WHAT: check if a file exists in a dir
    /**
     * @access public
     * @return void
     */
    public function testCheckFile4()
    {
        $this->assertEquals(false, $this->object->checkFile('Controller'));
    }
    // }}}

    // {{{ testCheckFile
    // WHAT: check if a file exists in a dir
    /**
     * @access public
     * @return void
     */
    public function testCheckFile5()
    {
        $this->assertEquals(true, $this->object->checkFile('Controller/Controller'));
    }
    // }}}
}
