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
    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd1()
    {
        Bonzai_Registry::add('', '', null);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd2()
    {
        Bonzai_Registry::add('', '', Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd3()
    {
        Bonzai_Registry::add('', null, null);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd4()
    {
        Bonzai_Registry::add('', null, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd5()
    {
        Bonzai_Registry::add('', 'aaa', null);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd6()
    {
        Bonzai_Registry::add('', 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd7()
    {
        Bonzai_Registry::add(null, '', null);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd8()
    {
        Bonzai_Registry::add(null, '', Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd9()
    {
        Bonzai_Registry::add(null, null, null);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd10()
    {
        Bonzai_Registry::add(null, null, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd11()
    {
        Bonzai_Registry::add(null, 'aaa', null);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd12()
    {
        Bonzai_Registry::add(null, 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: add an element
    public function testAdd13()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', '', null));
    }

    // WHAT: add an element
    public function testAdd14()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', '', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    public function testAdd15()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', null, null));
    }

    // WHAT: add an element
    public function testAdd16()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', null, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    public function testAdd17()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', 'aaa', null));
    }

    // WHAT: add an element
    public function testAdd18()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd19()
    {
        Bonzai_Registry::add(array(), '', null);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd20()
    {
        Bonzai_Registry::add(array(), '', Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd21()
    {
        Bonzai_Registry::add(array(), null, null);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd22()
    {
        Bonzai_Registry::add(array(), null, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd23()
    {
        Bonzai_Registry::add(array(), 'aaa', null);
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd24()
    {
        Bonzai_Registry::add(array(), 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: return a saved object
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGet1()
    {
        Bonzai_Registry::get(null);
    }

    // WHAT: return a saved object
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGet2()
    {
        Bonzai_Registry::get('');
    }

    // WHAT: return a saved object
    public function testGet3()
    {
        $this->assertEmpty(Bonzai_Registry::get(' '));
    }

    // WHAT: return a saved object
    public function testGet4()
    {
        $this->assertEmpty(Bonzai_Registry::get('a'));
    }

    // WHAT: return a saved object
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGet5()
    {
        Bonzai_Registry::get(array());
    }

    // WHAT: return a saved object
    public function testGet6()
    {
        $this->assertEmpty(Bonzai_Registry::get('EXIST'));
    }

    // WHAT: remove an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRemove1()
    {
        Bonzai_Registry::remove(null);
    }

    // WHAT: remove an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRemove2()
    {
        Bonzai_Registry::remove('');
    }

    // WHAT: remove an element
    public function testRemove3()
    {
        $this->assertEmpty(Bonzai_Registry::remove(' '));
    }

    // WHAT: remove an element
    public function testRemove4()
    {
        $this->assertEmpty(Bonzai_Registry::remove('a'));
    }

    // WHAT: remove an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRemove5()
    {
        Bonzai_Registry::remove(array());
    }

    // WHAT: remove an element
    public function testRemove6()
    {
        $this->assertEmpty(Bonzai_Registry::remove('EXIST'));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend1()
    {
        Bonzai_Registry::append('', '', null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend2()
    {
        Bonzai_Registry::append('', '', Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend3()
    {
        Bonzai_Registry::append('', '', Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend4()
    {
        Bonzai_Registry::append('', null, null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend5()
    {
        Bonzai_Registry::append('', null, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend6()
    {
        Bonzai_Registry::append('', null, Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend7()
    {
        Bonzai_Registry::append('', 'aaa', null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend8()
    {
        Bonzai_Registry::append('', 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend9()
    {
        Bonzai_Registry::append('', 'aaa', Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend10()
    {
        Bonzai_Registry::append('', 0, null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend11()
    {
        Bonzai_Registry::append('', 0, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend12()
    {
        Bonzai_Registry::append('', 0, Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend13()
    {
        Bonzai_Registry::append('', 1, null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend14()
    {
        Bonzai_Registry::append('', 1, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend15()
    {
        Bonzai_Registry::append('', 1, Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend16()
    {
        Bonzai_Registry::append('', -1, null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend17()
    {
        Bonzai_Registry::append('', -1, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend18()
    {
        Bonzai_Registry::append('', -1, Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend19()
    {
        Bonzai_Registry::append(null, '', null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend20()
    {
        Bonzai_Registry::append(null, '', Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend21()
    {
        Bonzai_Registry::append(null, '', Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend22()
    {
        Bonzai_Registry::append(null, null, null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend23()
    {
        Bonzai_Registry::append(null, null, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend24()
    {
        Bonzai_Registry::append(null, null, Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend25()
    {
        Bonzai_Registry::append(null, 'aaa', null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend26()
    {
        Bonzai_Registry::append(null, 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend27()
    {
        Bonzai_Registry::append(null, 'aaa', Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend28()
    {
        Bonzai_Registry::append(null, 0, null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend29()
    {
        Bonzai_Registry::append(null, 0, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend30()
    {
        Bonzai_Registry::append(null, 0, Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend31()
    {
        Bonzai_Registry::append(null, 1, null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend32()
    {
        Bonzai_Registry::append(null, 1, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend33()
    {
        Bonzai_Registry::append(null, 1, Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend34()
    {
        Bonzai_Registry::append(null, -1, null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend35()
    {
        Bonzai_Registry::append(null, -1, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend36()
    {
        Bonzai_Registry::append(null, -1, Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    public function testAppend37()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', '', null));
    }

    // WHAT: append an element
    public function testAppend38()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', '', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    public function testAppend39()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', '', Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    public function testAppend40()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', null, null));
    }

    // WHAT: append an element
    public function testAppend41()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', null, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    public function testAppend42()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', null, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    public function testAppend43()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 'aaa', null));
    }

    // WHAT: append an element
    public function testAppend44()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    public function testAppend45()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 'aaa', Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    public function testAppend46()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 0, null));
    }

    // WHAT: append an element
    public function testAppend47()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 0, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    public function testAppend48()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 0, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    public function testAppend49()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 1, null));
    }

    // WHAT: append an element
    public function testAppend50()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 1, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    public function testAppend51()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 1, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    public function testAppend52()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', -1, null));
    }

    // WHAT: append an element
    public function testAppend53()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', -1, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    public function testAppend54()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', -1, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend55()
    {
        Bonzai_Registry::append(array(), '', null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend56()
    {
        Bonzai_Registry::append(array(), '', Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend57()
    {
        Bonzai_Registry::append(array(), '', Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend58()
    {
        Bonzai_Registry::append(array(), null, null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend59()
    {
        Bonzai_Registry::append(array(), null, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend60()
    {
        Bonzai_Registry::append(array(), null, Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend61()
    {
        Bonzai_Registry::append(array(), 'aaa', null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend62()
    {
        Bonzai_Registry::append(array(), 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend63()
    {
        Bonzai_Registry::append(array(), 'aaa', Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend64()
    {
        Bonzai_Registry::append(array(), 0, null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend65()
    {
        Bonzai_Registry::append(array(), 0, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend66()
    {
        Bonzai_Registry::append(array(), 0, Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend67()
    {
        Bonzai_Registry::append(array(), 1, null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend68()
    {
        Bonzai_Registry::append(array(), 1, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend69()
    {
        Bonzai_Registry::append(array(), 1, Bonzai_Registry::INT_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend70()
    {
        Bonzai_Registry::append(array(), -1, null);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend71()
    {
        Bonzai_Registry::append(array(), -1, Bonzai_Registry::ARRAY_APPEND);
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend72()
    {
        Bonzai_Registry::append(array(), -1, Bonzai_Registry::INT_APPEND);
    }
}
