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
require_once dirname(__FILE__) . '/../libs/Exception/Exception.php';
require_once dirname(__FILE__) . '/../libs/Registry/Registry.php';

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
class Bonzai_Registry_Test extends Bonzai_TestCase
{
    // {{{ testAdd1
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd1()
    {
        Bonzai_Registry::add('', '', null);
    }
    // }}}

    // {{{ testAdd2
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd2()
    {
        Bonzai_Registry::add('', '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAdd3
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd3()
    {
        Bonzai_Registry::add('', null, null);
    }
    // }}}

    // {{{ testAdd4
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd4()
    {
        Bonzai_Registry::add('', null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAdd5
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd5()
    {
        Bonzai_Registry::add('', 'aaa', null);
    }
    // }}}

    // {{{ testAdd6
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd6()
    {
        Bonzai_Registry::add('', 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAdd7
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd7()
    {
        Bonzai_Registry::add(null, '', null);
    }
    // }}}

    // {{{ testAdd8
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd8()
    {
        Bonzai_Registry::add(null, '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAdd9
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd9()
    {
        Bonzai_Registry::add(null, null, null);
    }
    // }}}

    // {{{ testAdd10
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd10()
    {
        Bonzai_Registry::add(null, null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAdd11
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd11()
    {
        Bonzai_Registry::add(null, 'aaa', null);
    }
    // }}}

    // {{{ testAdd12
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd12()
    {
        Bonzai_Registry::add(null, 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAdd13
    // WHAT: add an element
    /**
     * @access public
     * @return void
     */
    public function testAdd13()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', '', null));
    }
    // }}}

    // {{{ testAdd14
    // WHAT: add an element
    /**
     * @access public
     * @return void
     */
    public function testAdd14()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', '', Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ testAdd15
    // WHAT: add an element
    /**
     * @access public
     * @return void
     */
    public function testAdd15()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', null, null));
    }
    // }}}

    // {{{ testAdd16
    // WHAT: add an element
    /**
     * @access public
     * @return void
     */
    public function testAdd16()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', null, Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ testAdd17
    // WHAT: add an element
    /**
     * @access public
     * @return void
     */
    public function testAdd17()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', 'aaa', null));
    }
    // }}}

    // {{{ testAdd18
    // WHAT: add an element
    /**
     * @access public
     * @return void
     */
    public function testAdd18()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ testAdd19
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd19()
    {
        Bonzai_Registry::add(array(), '', null);
    }
    // }}}

    // {{{ testAdd20
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd20()
    {
        Bonzai_Registry::add(array(), '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAdd21
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd21()
    {
        Bonzai_Registry::add(array(), null, null);
    }
    // }}}

    // {{{ testAdd22
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd22()
    {
        Bonzai_Registry::add(array(), null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAdd23
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd23()
    {
        Bonzai_Registry::add(array(), 'aaa', null);
    }
    // }}}

    // {{{ testAdd24
    // WHAT: add an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAdd24()
    {
        Bonzai_Registry::add(array(), 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testGet1
    // WHAT: return a saved object
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGet1()
    {
        Bonzai_Registry::get(null);
    }
    // }}}

    // {{{ testGet2
    // WHAT: return a saved object
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGet2()
    {
        Bonzai_Registry::get('');
    }
    // }}}

    // {{{ testGet3
    // WHAT: return a saved object
    /**
     * @access public
     * @return void
     */
    public function testGet3()
    {
        $this->assertEmpty(Bonzai_Registry::get(' '));
    }
    // }}}

    // {{{ testGet4
    // WHAT: return a saved object
    /**
     * @access public
     * @return void
     */
    public function testGet4()
    {
        $this->assertEmpty(Bonzai_Registry::get('a'));
    }
    // }}}

    // {{{ testGet5
    // WHAT: return a saved object
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGet5()
    {
        Bonzai_Registry::get(array());
    }
    // }}}

    // {{{ testGet6
    // WHAT: return a saved object
    /**
     * @access public
     * @return void
     */
    public function testGet6()
    {
        $this->assertEmpty(Bonzai_Registry::get('EXIST'));
    }
    // }}}

    // {{{ testRemove1
    // WHAT: remove an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRemove1()
    {
        Bonzai_Registry::remove(null);
    }
    // }}}

    // {{{ testRemove2
    // WHAT: remove an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRemove2()
    {
        Bonzai_Registry::remove('');
    }
    // }}}

    // {{{ testRemove3
    // WHAT: remove an element
    /**
     * @access public
     * @return void
     */
    public function testRemove3()
    {
        $this->assertEmpty(Bonzai_Registry::remove(' '));
    }
    // }}}

    // {{{ testRemove4
    // WHAT: remove an element
    /**
     * @access public
     * @return void
     */
    public function testRemove4()
    {
        $this->assertEmpty(Bonzai_Registry::remove('a'));
    }
    // }}}

    // {{{ testRemove5
    // WHAT: remove an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRemove5()
    {
        Bonzai_Registry::remove(array());
    }
    // }}}

    // {{{ testRemove6
    // WHAT: remove an element
    /**
     * @access public
     * @return void
     */
    public function testRemove6()
    {
        $this->assertEmpty(Bonzai_Registry::remove('EXIST'));
    }
    // }}}

    // {{{ testAppend1
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend1()
    {
        Bonzai_Registry::append('', '', null);
    }
    // }}}

    // {{{ testAppend2
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend2()
    {
        Bonzai_Registry::append('', '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend3
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend3()
    {
        Bonzai_Registry::append('', '', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend4
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend4()
    {
        Bonzai_Registry::append('', null, null);
    }
    // }}}

    // {{{ testAppend5
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend5()
    {
        Bonzai_Registry::append('', null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend6
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend6()
    {
        Bonzai_Registry::append('', null, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend7
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend7()
    {
        Bonzai_Registry::append('', 'aaa', null);
    }
    // }}}

    // {{{ testAppend8
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend8()
    {
        Bonzai_Registry::append('', 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend9
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend9()
    {
        Bonzai_Registry::append('', 'aaa', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend10
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend10()
    {
        Bonzai_Registry::append('', 0, null);
    }
    // }}}

    // {{{ testAppend11
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend11()
    {
        Bonzai_Registry::append('', 0, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend12
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend12()
    {
        Bonzai_Registry::append('', 0, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend13
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend13()
    {
        Bonzai_Registry::append('', 1, null);
    }
    // }}}

    // {{{ testAppend14
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend14()
    {
        Bonzai_Registry::append('', 1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend15
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend15()
    {
        Bonzai_Registry::append('', 1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend16
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend16()
    {
        Bonzai_Registry::append('', -1, null);
    }
    // }}}

    // {{{ testAppend17
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend17()
    {
        Bonzai_Registry::append('', -1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend18
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend18()
    {
        Bonzai_Registry::append('', -1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend19
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend19()
    {
        Bonzai_Registry::append(null, '', null);
    }
    // }}}

    // {{{ testAppend20
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend20()
    {
        Bonzai_Registry::append(null, '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend21
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend21()
    {
        Bonzai_Registry::append(null, '', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend22
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend22()
    {
        Bonzai_Registry::append(null, null, null);
    }
    // }}}

    // {{{ testAppend23
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend23()
    {
        Bonzai_Registry::append(null, null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend24
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend24()
    {
        Bonzai_Registry::append(null, null, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend25
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend25()
    {
        Bonzai_Registry::append(null, 'aaa', null);
    }
    // }}}

    // {{{ testAppend26
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend26()
    {
        Bonzai_Registry::append(null, 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend27
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend27()
    {
        Bonzai_Registry::append(null, 'aaa', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend28
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend28()
    {
        Bonzai_Registry::append(null, 0, null);
    }
    // }}}

    // {{{ testAppend29
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend29()
    {
        Bonzai_Registry::append(null, 0, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend30
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend30()
    {
        Bonzai_Registry::append(null, 0, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend31
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend31()
    {
        Bonzai_Registry::append(null, 1, null);
    }
    // }}}

    // {{{ testAppend32
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend32()
    {
        Bonzai_Registry::append(null, 1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend33
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend33()
    {
        Bonzai_Registry::append(null, 1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend34
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend34()
    {
        Bonzai_Registry::append(null, -1, null);
    }
    // }}}

    // {{{ testAppend35
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend35()
    {
        Bonzai_Registry::append(null, -1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend36
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend36()
    {
        Bonzai_Registry::append(null, -1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend37
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend37()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', '', null));
    }
    // }}}

    // {{{ testAppend38
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend38()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', '', Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ testAppend39
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend39()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', '', Bonzai_Registry::INT_APPEND));
    }
    // }}}

    // {{{ testAppend40
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend40()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', null, null));
    }
    // }}}

    // {{{ testAppend41
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend41()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', null, Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ testAppend42
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend42()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', null, Bonzai_Registry::INT_APPEND));
    }
    // }}}

    // {{{ testAppend43
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend43()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 'aaa', null));
    }
    // }}}

    // {{{ testAppend44
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend44()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ testAppend45
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend45()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 'aaa', Bonzai_Registry::INT_APPEND));
    }
    // }}}

    // {{{ testAppend46
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend46()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 0, null));
    }
    // }}}

    // {{{ testAppend47
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend47()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 0, Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ testAppend48
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend48()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 0, Bonzai_Registry::INT_APPEND));
    }
    // }}}

    // {{{ testAppend49
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend49()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 1, null));
    }
    // }}}

    // {{{ testAppend50
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend50()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 1, Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ testAppend51
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend51()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 1, Bonzai_Registry::INT_APPEND));
    }
    // }}}

    // {{{ testAppend52
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend52()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', -1, null));
    }
    // }}}

    // {{{ testAppend53
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend53()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', -1, Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ testAppend54
    // WHAT: append an element
    /**
     * @access public
     * @return void
     */
    public function testAppend54()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', -1, Bonzai_Registry::INT_APPEND));
    }
    // }}}

    // {{{ testAppend55
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend55()
    {
        Bonzai_Registry::append(array(), '', null);
    }
    // }}}

    // {{{ testAppend56
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend56()
    {
        Bonzai_Registry::append(array(), '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend57
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend57()
    {
        Bonzai_Registry::append(array(), '', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend58
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend58()
    {
        Bonzai_Registry::append(array(), null, null);
    }
    // }}}

    // {{{ testAppend59
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend59()
    {
        Bonzai_Registry::append(array(), null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend60
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend60()
    {
        Bonzai_Registry::append(array(), null, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend61
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend61()
    {
        Bonzai_Registry::append(array(), 'aaa', null);
    }
    // }}}

    // {{{ testAppend62
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend62()
    {
        Bonzai_Registry::append(array(), 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend63
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend63()
    {
        Bonzai_Registry::append(array(), 'aaa', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend64
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend64()
    {
        Bonzai_Registry::append(array(), 0, null);
    }
    // }}}

    // {{{ testAppend65
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend65()
    {
        Bonzai_Registry::append(array(), 0, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend66
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend66()
    {
        Bonzai_Registry::append(array(), 0, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend67
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend67()
    {
        Bonzai_Registry::append(array(), 1, null);
    }
    // }}}

    // {{{ testAppend68
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend68()
    {
        Bonzai_Registry::append(array(), 1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend69
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend69()
    {
        Bonzai_Registry::append(array(), 1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppend70
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend70()
    {
        Bonzai_Registry::append(array(), -1, null);
    }
    // }}}

    // {{{ testAppend71
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend71()
    {
        Bonzai_Registry::append(array(), -1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppend72
    // WHAT: append an element
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppend72()
    {
        Bonzai_Registry::append(array(), -1, Bonzai_Registry::INT_APPEND);
    }
    // }}}
}
