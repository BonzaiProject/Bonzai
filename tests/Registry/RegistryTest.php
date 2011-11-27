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
require_once __DIR__ . '/../../src/libs/Exception/Exception.php';
require_once __DIR__ . '/../../src/libs/Registry/Registry.php';

/**
 * Bonzai_Registry_Test
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
class Bonzai_Registry_RegistryTest extends Bonzai_TestCase
{
    // {{{ add
    // {{{ providerForAdd
    /**
     * providerForAdd
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForAdd()
    {
        return array(
            array('', ''),
            array('', null),
            array('', 'aaa'),
            array(null, ''),
            array(null, null),
            array(null, 'aaa'),
            array(array(), ''),
            array(array(), null),
            array(array(), 'aaa'),
        );
    }
    // }}}

    // {{{ testAddWithProviderThrowException
    /**
     * Add an element
     *
     * @param mixed $a
     * @param mixed $b
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     * @dataProvider providerForAdd
     */
    public function testAddWithProviderThrowException($a, $b)
    {
        Bonzai_Registry::add($a, $b);
    }
    // }}}

    // {{{ providerForAdd2
    /**
     * providerForAdd2
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForAdd2()
    {
        return array(
            array('aaa', ''),
            array('aaa', null),
            array('aaa', 'aaa'),
        );
    }
    // }}}

    // {{{ testAddWithParamsFakeEmptyStringIsEmpty
    /**
     * Add an element
     *
     * @param mixed $a
     * @param mixed $b
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForAdd2
     */
    public function testAddWithProviderIsEmpty($a, $b)
    {
        $value = Bonzai_Registry::add($a, $b);
        $this->assertEmpty($value);
    }
    // }}}
    // }}}

    // {{{ get
    // {{{ providerForGet
    /**
     * providerForGet
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForGet()
    {
        return array(
            array(''),
            array(array()),
            array(null),
        );
    }
    // }}}

    // {{{ testGetWithProviderThrowException
    /**
     * Return a saved object
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     * @dataProvider providerForGet
     */
    public function testGetWithProviderThrowException($a)
    {
        Bonzai_Registry::get($a);
    }
    // }}}

    // {{{ providerForGet2
    /**
     * providerForGet2
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForGet2()
    {
        return array(
            array(' '),
            array('a'),
        );
    }
    // }}}

    // {{{ testGetWithProvider
    /**
     * Return a saved object
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForGet2
     */
    public function testGetWithProvider($a)
    {
        $this->assertEmpty(Bonzai_Registry::get($a));
    }
    // }}}

    // {{{ testGetParamIsSpacedStringReturnsNull
    /**
     * Return a saved object
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetParamIsSpacedStringReturnsNull()
    {
        $this->assertEmpty(Bonzai_Registry::get(' '));
    }
    // }}}

    // {{{ testGetParamIsFakeReturnsNull
    /**
     * Return a saved object
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetParamIsFakeReturnsNull()
    {
        $this->assertEmpty(Bonzai_Registry::get('a'));
    }
    // }}}

    // {{{ testGetExistentKeyAreEquals
    /**
     * Return a saved object
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetExistentKeyAreEquals()
    {
        Bonzai_Registry::add('EXIST', 'content');
        $this->assertEquals('content', Bonzai_Registry::get('EXIST'));
    }
    // }}}
    // }}}

    // {{{ remove
    // {{{ providerForRemove
    /**
     * providerForRemove
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForRemove()
    {
        return array(
            array(''),
            array(null),
        );
    }
    // }}}

    // {{{ testRemoveWithProviderThrowException
    /**
     * Return a saved object
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     * @dataProvider providerForRemove
     */
    public function testRemoveWithProviderThrowException($a)
    {
        Bonzai_Registry::remove($a);
    }
    // }}}

    // {{{ providerForRemove2
    /**
     * providerForRemove2
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForRemove2()
    {
        return array(
            array('AAA'),
        );
    }
    // }}}

    // {{{ testRemoveWithProvider
    /**
     * Return a saved object
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForRemove2
     */
    public function testRemoveWithProvider($a)
    {
        $this->assertEmpty(Bonzai_Registry::remove($a));
    }
    // }}}

    // {{{ testRemoveWithParamSpacedString
    /**
     * Remove an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRemoveWithParamSpacedString()
    {
        $this->assertEmpty(Bonzai_Registry::remove(' '));
    }
    // }}}

    // {{{ testRemoveWithParamString
    /**
     * Remove an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRemoveWithParamString()
    {
        $this->assertEmpty(Bonzai_Registry::remove('a'));
    }
    // }}}

    // {{{ testRemoveExistentKeyReturnsNull
    /**
     * Remove an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRemoveExistentKeyReturnsNull()
    {
        $this->assertEmpty(Bonzai_Registry::add('EXIST', 'content'));
        Bonzai_Registry::remove('EXIST');
        $this->assertNull(Bonzai_Registry::get('EXIST'));
    }
    // }}}
    // }}}

    // {{{ append
    // {{{ providerForAppend
    /**
     * providerForAppend
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForAppend()
    {
        return array(
            array('', ''),
            array('', 'aaa'),
            array('', -1),
            array('', 0),
            array('', 1),
            array(null, ''),
            array(null, 'aaa'),
            array(null, -1),
            array(null, 0),
            array(null, 1),
            array(null, null),
            array(array(), 0),
            array(array(), 1),
            array(array(), 'aaa'),
            array(array(), -1),
            array(array(), ''),
            array(array(), null),
            array('', null),
        );
    }
    // }}}

    // {{{ testAppendWithProviderThrowException
    /**
     * Append an element
     *
     * @param mixed $a
     * @param mixed $b
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     * @dataProvider providerForAppend
     */
    public function testAppendWithProviderThrowException($a, $b)
    {
        Bonzai_Registry::append($a, $b);
    }
    // }}}

    // {{{ providerForAppend2
    /**
     * providerForAppend2
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForAppend2()
    {
        return array(
            array('aaa', ''),
            array('aaa', 'aaa'),
            array('aaa', -1),
            array('aaa', 0),
            array('aaa', 1),
            array('aaa', null),
        );
    }
    // }}}

    // {{{ testAppendWithProviderIsEmpty
    /**
     * Append an element
     *
     * @param mixed $a
     * @param mixed $b
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForAppend2
     */
    public function testAppendWithProviderIsEmpty($a, $b)
    {
        $value = Bonzai_Registry::append($a, $b);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ providerForAppend3
    /**
     * providerForAppend3
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForAppend3()
    {
        return array(
            array('a', 'a', 'aa'),
            array(0, 1, 1),
            array(10, 11, 21),
            array('10', '11', '1011'),
            array(10, -11, -1),
            array(array('a', 'b'), array('c'), array('a', 'b', array('c'))),
            array(array('a', 'b'), 'c', array('a', 'b', 'c')),
        );
    }

    // {{{ testAppendWithProviderAreEquals
    /**
     * Append an element
     *
     * @param mixed $a
     * @param mixed $b
     * @param mixed $c
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForAppend3
     */
    public function testAppendWithProviderAreEquals($a, $b, $c)
    {
        Bonzai_Registry::add('test', $a);
        Bonzai_Registry::append('test', $b);
        $this->assertEquals($c, Bonzai_Registry::get('test'));
    }
    // }}}
    // }}}

    // {{{ checkKeyValidity
    // {{{ providerForCheckKeyValidity
    /**
     * providerForCheckKeyValidity
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForCheckKeyValidity()
    {
        return array(
            array($this->object),
            array('0'),
            array(0),
            array(array()),
        );
    }
    // }}}

    // {{{ testCheckKeyValidityWithProviderThrowException
    /**
     * testCheckKeyValidityWithProviderThrowException
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     * @dataProvider providerForCheckKeyValidity
     */
    public function testCheckKeyValidityWithProviderThrowException($a)
    {
        $this->callMethod('checkKeyValidity', array($a));
    }
    // }}}

    // {{{ providerForCheckKeyValidity2
    /**
     * providerForCheckKeyValidity2
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForCheckKeyValidity2()
    {
        return array(
            array(' '),
            array('a'),
            array(-1),
            array(array('a')),
        );
    }
    // }}}

    // {{{ testCheckKeyValidityWithProvider
    /**
     * testCheckKeyValidityWithProvider
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForCheckKeyValidity2
     */
    public function testCheckKeyValidityWithProvider($a)
    {
        $this->assertEmpty($this->callMethod('checkKeyValidity', array($a)));
    }
    // }}}
    // }}}
}
