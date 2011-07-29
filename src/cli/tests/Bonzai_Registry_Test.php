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
        $this->assertEquals('', Bonzai_Registry::add('', '', null));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd2()
    {
        $this->assertEquals('', Bonzai_Registry::add('', '', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd3()
    {
        $this->assertEquals('', Bonzai_Registry::add('', null, null));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd4()
    {
        $this->assertEquals('', Bonzai_Registry::add('', null, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd5()
    {
        $this->assertEquals('', Bonzai_Registry::add('', 'aaa', null));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd6()
    {
        $this->assertEquals('', Bonzai_Registry::add('', 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd7()
    {
        $this->assertEquals('', Bonzai_Registry::add(null, '', null));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd8()
    {
        $this->assertEquals('', Bonzai_Registry::add(null, '', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd9()
    {
        $this->assertEquals('', Bonzai_Registry::add(null, null, null));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd10()
    {
        $this->assertEquals('', Bonzai_Registry::add(null, null, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd11()
    {
        $this->assertEquals('', Bonzai_Registry::add(null, 'aaa', null));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd12()
    {
        $this->assertEquals('', Bonzai_Registry::add(null, 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    public function testAdd13()
    {
        $this->assertEquals('', Bonzai_Registry::add('aaa', '', null));
    }

    // WHAT: add an element
    public function testAdd14()
    {
        $this->assertEquals('', Bonzai_Registry::add('aaa', '', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    public function testAdd15()
    {
        $this->assertEquals('', Bonzai_Registry::add('aaa', null, null));
    }

    // WHAT: add an element
    public function testAdd16()
    {
        $this->assertEquals('', Bonzai_Registry::add('aaa', null, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    public function testAdd17()
    {
        $this->assertEquals('', Bonzai_Registry::add('aaa', 'aaa', null));
    }

    // WHAT: add an element
    public function testAdd18()
    {
        $this->assertEquals('', Bonzai_Registry::add('aaa', 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd19()
    {
        $this->assertEquals('', Bonzai_Registry::add(array(), '', null));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd20()
    {
        $this->assertEquals('', Bonzai_Registry::add(array(), '', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd21()
    {
        $this->assertEquals('', Bonzai_Registry::add(array(), null, null));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd22()
    {
        $this->assertEquals('', Bonzai_Registry::add(array(), null, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd23()
    {
        $this->assertEquals('', Bonzai_Registry::add(array(), 'aaa', null));
    }

    // WHAT: add an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAdd24()
    {
        $this->assertEquals('', Bonzai_Registry::add(array(), 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: return a saved object
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGet1()
    {
        $this->assertEquals('', Bonzai_Registry::get(null));
    }

    // WHAT: return a saved object
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGet2()
    {
        $this->assertEquals('', Bonzai_Registry::get(''));
    }

    // WHAT: return a saved object
    public function testGet3()
    {
        $this->assertEquals('', Bonzai_Registry::get(' '));
    }

    // WHAT: return a saved object
    public function testGet4()
    {
        $this->assertEquals('', Bonzai_Registry::get('a'));
    }

    // WHAT: return a saved object
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGet5()
    {
        $this->assertEquals('', Bonzai_Registry::get(array()));
    }

    // WHAT: return a saved object
    public function testGet6()
    {
        $this->assertEquals('', Bonzai_Registry::get('EXIST'));
    }

    // WHAT: remove an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRemove1()
    {
        $this->assertEquals('', Bonzai_Registry::remove(null));
    }

    // WHAT: remove an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRemove2()
    {
        $this->assertEquals('', Bonzai_Registry::remove(''));
    }

    // WHAT: remove an element
    public function testRemove3()
    {
        $this->assertEquals('', Bonzai_Registry::remove(' '));
    }

    // WHAT: remove an element
    public function testRemove4()
    {
        $this->assertEquals('', Bonzai_Registry::remove('a'));
    }

    // WHAT: remove an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRemove5()
    {
        $this->assertEquals('', Bonzai_Registry::remove(array()));
    }

    // WHAT: remove an element
    public function testRemove6()
    {
        $this->assertEquals('', Bonzai_Registry::remove('EXIST'));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend1()
    {
        $this->assertEquals('', Bonzai_Registry::append('', '', null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend2()
    {
        $this->assertEquals('', Bonzai_Registry::append('', '', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend3()
    {
        $this->assertEquals('', Bonzai_Registry::append('', '', Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend4()
    {
        $this->assertEquals('', Bonzai_Registry::append('', null, null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend5()
    {
        $this->assertEquals('', Bonzai_Registry::append('', null, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend6()
    {
        $this->assertEquals('', Bonzai_Registry::append('', null, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend7()
    {
        $this->assertEquals('', Bonzai_Registry::append('', 'aaa', null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend8()
    {
        $this->assertEquals('', Bonzai_Registry::append('', 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend9()
    {
        $this->assertEquals('', Bonzai_Registry::append('', 'aaa', Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend10()
    {
        $this->assertEquals('', Bonzai_Registry::append('', 0, null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend11()
    {
        $this->assertEquals('', Bonzai_Registry::append('', 0, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend12()
    {
        $this->assertEquals('', Bonzai_Registry::append('', 0, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend13()
    {
        $this->assertEquals('', Bonzai_Registry::append('', 1, null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend14()
    {
        $this->assertEquals('', Bonzai_Registry::append('', 1, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend15()
    {
        $this->assertEquals('', Bonzai_Registry::append('', 1, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend16()
    {
        $this->assertEquals('', Bonzai_Registry::append('', -1, null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend17()
    {
        $this->assertEquals('', Bonzai_Registry::append('', -1, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend18()
    {
        $this->assertEquals('', Bonzai_Registry::append('', -1, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend19()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, '', null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend20()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, '', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend21()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, '', Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend22()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, null, null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend23()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, null, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend24()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, null, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend25()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, 'aaa', null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend26()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend27()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, 'aaa', Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend28()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, 0, null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend29()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, 0, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend30()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, 0, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend31()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, 1, null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend32()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, 1, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend33()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, 1, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend34()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, -1, null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend35()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, -1, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend36()
    {
        $this->assertEquals('', Bonzai_Registry::append(null, -1, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    public function testAppend37()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', '', null));
    }

    // WHAT: append an element
    public function testAppend38()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', '', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    public function testAppend39()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', '', Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    public function testAppend40()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', null, null));
    }

    // WHAT: append an element
    public function testAppend41()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', null, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    public function testAppend42()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', null, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    public function testAppend43()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', 'aaa', null));
    }

    // WHAT: append an element
    public function testAppend44()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    public function testAppend45()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', 'aaa', Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    public function testAppend46()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', 0, null));
    }

    // WHAT: append an element
    public function testAppend47()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', 0, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    public function testAppend48()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', 0, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    public function testAppend49()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', 1, null));
    }

    // WHAT: append an element
    public function testAppend50()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', 1, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    public function testAppend51()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', 1, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    public function testAppend52()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', -1, null));
    }

    // WHAT: append an element
    public function testAppend53()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', -1, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    public function testAppend54()
    {
        $this->assertEquals('', Bonzai_Registry::append('aaa', -1, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend55()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), '', null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend56()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), '', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend57()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), '', Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend58()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), null, null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend59()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), null, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend60()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), null, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend61()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), 'aaa', null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend62()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend63()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), 'aaa', Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend64()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), 0, null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend65()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), 0, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend66()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), 0, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend67()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), 1, null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend68()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), 1, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend69()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), 1, Bonzai_Registry::INT_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend70()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), -1, null));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend71()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), -1, Bonzai_Registry::ARRAY_APPEND));
    }

    // WHAT: append an element
    /**
     * @expectedException Bonzai_Exception
     */
    public function testAppend72()
    {
        $this->assertEquals('', Bonzai_Registry::append(array(), -1, Bonzai_Registry::INT_APPEND));
    }
}
