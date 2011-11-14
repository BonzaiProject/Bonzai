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
 * @category  Optimization_&_Security
 * @package   Bonzai
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 *            http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version   Release: 0.1
 * @link      http://www.bonzai-project.org
 **/

require_once __DIR__ . '/../libs/Tests/TestCase.php';
require_once __DIR__ . '/../libs/Exception/Exception.php';
require_once __DIR__ . '/../libs/Registry/Registry.php';

/**
 * Bonzai_Registry_Test
 *
 * @category  Optimization_&_Security
 * @package   Bonzai
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 *            http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version   Release: 0.1
 * @link      http://www.bonzai-project.org
 **/
class Bonzai_Registry_Test extends Bonzai_TestCase
{
    // {{{ add
    // {{{ testAddWithParamsEmptyStringEmptyStringNullThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsEmptyStringEmptyStringNullThrowException()
    {
        Bonzai_Registry::add('', '', null);
    }
    // }}}

    // {{{ testAddWithParamsEmptyStringEmptyStringArrayAppendThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsEmptyStringEmptyStringArrayAppendThrowException()
    {
        Bonzai_Registry::add('', '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAddWithParamsEmptyStringNullNullThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsEmptyStringNullNullThrowException()
    {
        Bonzai_Registry::add('', null, null);
    }
    // }}}

    // {{{ testAddWithParamsEmptyStringNullArrayAppendThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsEmptyStringNullArrayAppendThrowException()
    {
        Bonzai_Registry::add('', null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAddWithParamsEmptyStringFakeNullThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsEmptyStringFakeNullThrowException()
    {
        Bonzai_Registry::add('', 'aaa', null);
    }
    // }}}

    // {{{ testAddWithParamsEmptyStringFakeArrayAppendThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsEmptyStringFakeArrayAppendThrowException()
    {
        Bonzai_Registry::add('', 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAddWithParamsNullEmptyStringNullThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsNullEmptyStringNullThrowException()
    {
        Bonzai_Registry::add(null, '', null);
    }
    // }}}

    // {{{ testAddWithParamsNullEmptyStringArrayAppendThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsNullEmptyStringArrayAppendThrowException()
    {
        Bonzai_Registry::add(null, '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAddWithParamsNullNullNullThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsNullNullNullThrowException()
    {
        Bonzai_Registry::add(null, null, null);
    }
    // }}}

    // {{{ testAddWithParamsNullNullArrayAppendThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsNullNullArrayAppendThrowException()
    {
        Bonzai_Registry::add(null, null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAddWithParamsNullFakeNullThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsNullFakeNullThrowException()
    {
        Bonzai_Registry::add(null, 'aaa', null);
    }
    // }}}

    // {{{ testAddWithParamsNullFakeArrayAppendThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsNullFakeArrayAppendThrowException()
    {
        Bonzai_Registry::add(null, 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAddWithParamsFakeEmptyStringNullIsEmpty
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAddWithParamsFakeEmptyStringNullIsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', '', null));
    }
    // }}}

    // {{{ testAddWithParamsFakeEmptyStringArrayAppendIsEmpty
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAddWithParamsFakeEmptyStringArrayAppendIsEmpty()
    {
        $value = Bonzai_Registry::add('aaa', '', Bonzai_Registry::ARRAY_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAddWithParamsFakeNullNullIsEmpty
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAddWithParamsFakeNullNullIsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', null, null));
    }
    // }}}

    // {{{ testAddWithParamsFakeNullArrayAppendIsEmpty
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAddWithParamsFakeNullArrayAppendIsEmpty()
    {
        $value = Bonzai_Registry::add('aaa', null, Bonzai_Registry::ARRAY_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAddWithParamsFakeFakeNullIsEmpty
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAddWithParamsFakeFakeNullIsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', 'aaa', null));
    }
    // }}}

    // {{{ testAddWithParamsFakeFakeArrayAppendIsEmpty
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAddWithParamsFakeFakeArrayAppendIsEmpty()
    {
        $value = Bonzai_Registry::add('aaa', 'aaa', Bonzai_Registry::ARRAY_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAddWithParamsEmptyArrayEmptyStringNullThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsEmptyArrayEmptyStringNullThrowException()
    {
        Bonzai_Registry::add(array(), '', null);
    }
    // }}}

    // {{{ testAddWithParamsEmptyArrayEmptyStringArrayAppendThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsEmptyArrayEmptyStringArrayAppendThrowException()
    {
        Bonzai_Registry::add(array(), '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAddWithParamsEmptyArrayNullNullThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsEmptyArrayNullNullThrowException()
    {
        Bonzai_Registry::add(array(), null, null);
    }
    // }}}

    // {{{ testAddWithParamsEmptyArrayNullArrayAppendThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsEmptyArrayNullArrayAppendThrowException()
    {
        Bonzai_Registry::add(array(), null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAddWithParamsEmptyArrayFakeNullThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsEmptyArrayFakeNullThrowException()
    {
        Bonzai_Registry::add(array(), 'aaa', null);
    }
    // }}}

    // {{{ testAddWithParamsEmptyArrayFakeArrayAppendThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAddWithParamsEmptyArrayFakeArrayAppendThrowException()
    {
        Bonzai_Registry::add(array(), 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}
    // }}}

    // {{{ get
    // {{{ testGetParamIsNullThrowException
    /**
     * Return a saved object
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetParamIsNullThrowException()
    {
        Bonzai_Registry::get(null);
    }
    // }}}

    // {{{ testGetParamIsEmptyStringThrowException
    /**
     * Return a saved object
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetParamIsEmptyStringThrowException()
    {
        Bonzai_Registry::get('');
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
        $this->assertNull(Bonzai_Registry::get(' '));
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
        $this->assertNull(Bonzai_Registry::get('a'));
    }
    // }}}

    // {{{ testGetParamIsEmptyArrayThrowException
    /**
     * Return a saved object
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetParamIsEmptyArrayThrowException()
    {
        Bonzai_Registry::get(array());
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
    // {{{ testRemoveParamIsNullThrowException
    /**
     * Remove an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRemoveParamIsNullThrowException()
    {
        Bonzai_Registry::remove(null);
    }
    // }}}

    // {{{ testRemoveParamIsEmptyStringThrowException
    /**
     * Remove an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRemoveParamIsEmptyStringThrowException()
    {
        Bonzai_Registry::remove('');
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
        Bonzai_Registry::remove(' ');
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
        Bonzai_Registry::remove('a');
    }
    // }}}

    // {{{ testRemoveParamIsEmptyArrayThrowException
    /**
     * Remove an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRemoveParamIsEmptyArrayThrowException()
    {
        Bonzai_Registry::remove(array());
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
        Bonzai_Registry::add('EXIST', 'content');
        Bonzai_Registry::remove('EXIST');
        $this->assertNull(Bonzai_Registry::get('EXIST'));
    }
    // }}}
    // }}}

    // {{{ append
    // {{{ testAppendWithParamsEmptyStringEmptyStringNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringEmptyStringNullThrowException()
    {
        Bonzai_Registry::append('', '', null);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringEmptyStringArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringEmptyStringArrayAppendThrowException()
    {
        Bonzai_Registry::append('', '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringEmptyStringIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringEmptyStringIntAppendThrowException()
    {
        Bonzai_Registry::append('', '', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringNullNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringNullNullThrowException()
    {
        Bonzai_Registry::append('', null, null);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringNullArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringNullArrayAppendThrowException()
    {
        Bonzai_Registry::append('', null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringNullIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringNullIntAppendThrowException()
    {
        Bonzai_Registry::append('', null, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringFakeNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringFakeNullThrowException()
    {
        Bonzai_Registry::append('', 'aaa', null);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringFakeArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringFakeArrayAppendThrowException()
    {
        Bonzai_Registry::append('', 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringFakeIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringFakeIntAppendThrowException()
    {
        Bonzai_Registry::append('', 'aaa', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringZeroNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringZeroNullThrowException()
    {
        Bonzai_Registry::append('', 0, null);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringZeroArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringZeroArrayAppendThrowException()
    {
        Bonzai_Registry::append('', 0, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringZeroIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringZeroIntAppendThrowException()
    {
        Bonzai_Registry::append('', 0, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringOneNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringOneNullThrowException()
    {
        Bonzai_Registry::append('', 1, null);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringOneArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringOneArrayAppendThrowException()
    {
        Bonzai_Registry::append('', 1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringOneIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringOneIntAppendThrowException()
    {
        Bonzai_Registry::append('', 1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringNegativeNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringNegativeNullThrowException()
    {
        Bonzai_Registry::append('', -1, null);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringNegativeArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringNegativeArrayAppendThrowException()
    {
        Bonzai_Registry::append('', -1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyStringNegativeOneIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyStringNegativeOneIntAppendThrowException()
    {
        Bonzai_Registry::append('', -1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsNullEmptyStringNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullEmptyStringNullThrowException()
    {
        Bonzai_Registry::append(null, '', null);
    }
    // }}}

    // {{{ testAppendWithParamsNullEmptyStringArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullEmptyStringArrayAppendThrowException()
    {
        Bonzai_Registry::append(null, '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsNullEmptyStringIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullEmptyStringIntAppendThrowException()
    {
        Bonzai_Registry::append(null, '', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsNullNullNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullNullNullThrowException()
    {
        Bonzai_Registry::append(null, null, null);
    }
    // }}}

    // {{{ testAppendWithParamsNullNullArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullNullArrayAppendThrowException()
    {
        Bonzai_Registry::append(null, null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsNullNullIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullNullIntAppendThrowException()
    {
        Bonzai_Registry::append(null, null, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsNullFakeNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullFakeNullThrowException()
    {
        Bonzai_Registry::append(null, 'aaa', null);
    }
    // }}}

    // {{{ testAppendWithParamsNullFakeArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullFakeArrayAppendThrowException()
    {
        Bonzai_Registry::append(null, 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsNullFakeIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullFakeIntAppendThrowException()
    {
        Bonzai_Registry::append(null, 'aaa', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsNullZeroNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullZeroNullThrowException()
    {
        Bonzai_Registry::append(null, 0, null);
    }
    // }}}

    // {{{ testAppendWithParamsNullZeroArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullZeroArrayAppendThrowException()
    {
        Bonzai_Registry::append(null, 0, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsNullZeroIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullZeroIntAppendThrowException()
    {
        Bonzai_Registry::append(null, 0, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsNullOneNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullOneNullThrowException()
    {
        Bonzai_Registry::append(null, 1, null);
    }
    // }}}

    // {{{ testAppendWithParamsNullOneArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullOneArrayAppendThrowException()
    {
        Bonzai_Registry::append(null, 1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsNullOneIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullOneIntAppendThrowException()
    {
        Bonzai_Registry::append(null, 1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsNullNegativeNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullNegativeNullThrowException()
    {
        Bonzai_Registry::append(null, -1, null);
    }
    // }}}

    // {{{ testAppendWithParamsNullNegativeArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullNegativeArrayAppendThrowException()
    {
        Bonzai_Registry::append(null, -1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsNullNegativeIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsNullNegativeIntAppendThrowException()
    {
        Bonzai_Registry::append(null, -1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsFakeEmptyStringNullIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeEmptyStringNullIsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', '', null));
    }
    // }}}

    // {{{ testAppendWithParamsFakeEmptyStringArrayAppendIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeEmptyStringArrayAppendIsEmpty()
    {
        $value = Bonzai_Registry::append('aaa', '', Bonzai_Registry::ARRAY_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAppendWithParamsFakeEmptyStringIntAppendIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeEmptyStringIntAppendIsEmpty()
    {
        $value = Bonzai_Registry::append('aaa', '', Bonzai_Registry::INT_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAppendWithParamsFakeNullNullIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeNullNullIsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', null, null));
    }
    // }}}

    // {{{ testAppendWithParamsFakeNullArrayAppendIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeNullArrayAppendIsEmpty()
    {
        $value = Bonzai_Registry::append('aaa', null, Bonzai_Registry::ARRAY_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAppendWithParamsFakeNullIntAppendIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeNullIntAppendIsEmpty()
    {
        $value = Bonzai_Registry::append('aaa', null, Bonzai_Registry::INT_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAppendWithParamsFakeFakeNullIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeFakeNullIsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 'aaa', null));
    }
    // }}}

    // {{{ testAppendWithParamsFakeFakeArrayAppendIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeFakeArrayAppendIsEmpty()
    {
        $value = Bonzai_Registry::append('aaa', 'aaa', Bonzai_Registry::ARRAY_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAppendWithParamsFakeFakeIntAppendIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeFakeIntAppendIsEmpty()
    {
        $value = Bonzai_Registry::append('aaa', 'aaa', Bonzai_Registry::INT_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAppendWithParamsFakeZeroNullIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeZeroNullIsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 0, null));
    }
    // }}}

    // {{{ testAppendWithParamsFakeZeroArrayAppendIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeZeroArrayAppendIsEmpty()
    {
        $value = Bonzai_Registry::append('aaa', 0, Bonzai_Registry::ARRAY_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAppendWithParamsFakeZeroIntAppendIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeZeroIntAppendIsEmpty()
    {
        $value = Bonzai_Registry::append('aaa', 0, Bonzai_Registry::INT_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAppendWithParamsFakeOneNullIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeOneNullIsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 1, null));
    }
    // }}}

    // {{{ testAppendWithParamsFakeOneArrayAppendIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeOneArrayAppendIsEmpty()
    {
        $value = Bonzai_Registry::append('aaa', 1, Bonzai_Registry::ARRAY_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAppendWithParamsFakeOneIntAppendIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeOneIntAppendIsEmpty()
    {
        $value = Bonzai_Registry::append('aaa', 1, Bonzai_Registry::INT_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAppendWithParamsFakeNegativeNullIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeNegativeNullIsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', -1, null));
    }
    // }}}

    // {{{ testAppendWithParamsFakeNegativeArrayAppendIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeNegativeArrayAppendIsEmpty()
    {
        $value = Bonzai_Registry::append('aaa', -1, Bonzai_Registry::ARRAY_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAppendWithParamsFakeNegativeIntAppendIsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendWithParamsFakeNegativeIntAppendIsEmpty()
    {
        $value = Bonzai_Registry::append('aaa', -1, Bonzai_Registry::INT_APPEND);
        $this->assertEmpty($value);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayNullThrowException()
    {
        Bonzai_Registry::append(array(), '', null);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayEmptyStringArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayEmptyStringArrayAppendThrowException()
    {
        Bonzai_Registry::append(array(), '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayEmptyStringIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayEmptyStringIntAppendThrowException()
    {
        Bonzai_Registry::append(array(), '', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayNullNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayNullNullThrowException()
    {
        Bonzai_Registry::append(array(), null, null);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayNullArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayNullArrayAppendThrowException()
    {
        Bonzai_Registry::append(array(), null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayNullIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayNullIntAppendThrowException()
    {
        Bonzai_Registry::append(array(), null, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayFakeNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayFakeNullThrowException()
    {
        Bonzai_Registry::append(array(), 'aaa', null);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayFakeArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayFakeArrayAppendThrowException()
    {
        Bonzai_Registry::append(array(), 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayFakeIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayFakeIntAppendThrowException()
    {
        Bonzai_Registry::append(array(), 'aaa', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayZeroNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayZeroNullThrowException()
    {
        Bonzai_Registry::append(array(), 0, null);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayZeroArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayZeroArrayAppendThrowException()
    {
        Bonzai_Registry::append(array(), 0, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayZeroIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayZeroIntAppendThrowException()
    {
        Bonzai_Registry::append(array(), 0, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayOneNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayOneNullThrowException()
    {
        Bonzai_Registry::append(array(), 1, null);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayOneArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayOneArrayAppendThrowException()
    {
        Bonzai_Registry::append(array(), 1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayOneIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayOneIntAppendThrowException()
    {
        Bonzai_Registry::append(array(), 1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayNegativeNullThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayNegativeNullThrowException()
    {
        Bonzai_Registry::append(array(), -1, null);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayNegativeArrayAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayNegativeArrayAppendThrowException()
    {
        Bonzai_Registry::append(array(), -1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ testAppendWithParamsEmptyArrayNegativeIntAppendThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testAppendWithParamsEmptyArrayNegativeIntAppendThrowException()
    {
        Bonzai_Registry::append(array(), -1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ testAppendStringToExistentAreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendStringToExistentAreEquals()
    {
        Bonzai_Registry::add('test', 'a');
        Bonzai_Registry::append('test', 'a');
        $this->assertEquals('aa', Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ testAppendIntToExistentAreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendIntToExistentAreEquals()
    {
        Bonzai_Registry::add('test', 0);
        Bonzai_Registry::append('test', 1);
        $this->assertEquals(1, Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ testAppendIntToExistentAreEquals2
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendIntToExistentAreEquals2()
    {
        Bonzai_Registry::add('test', 10);
        Bonzai_Registry::append('test', 11, Bonzai_Registry::INT_APPEND);
        $this->assertEquals(21, Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ testAppendIntToExistentWithIntAppendAreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendIntToExistentWithIntAppendAreEquals()
    {
        Bonzai_Registry::add('test', 0);
        Bonzai_Registry::append('test', 1, Bonzai_Registry::INT_APPEND);
        $this->assertEquals(1, Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ testAppendStringIntToExistentAreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendStringIntToExistentAreEquals()
    {
        Bonzai_Registry::add('test', 10);
        Bonzai_Registry::append('test', 11);
        $this->assertEquals(1011, Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ testAppendStringIntToExistentAreEquals2
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendStringIntToExistentAreEqual2()
    {
        Bonzai_Registry::add('test', 10);
        Bonzai_Registry::append('test', -11);
        $this->assertEquals('10-11', Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ testAppendNegativeIntToExistentAreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendNegativeIntToExistentAreEquals()
    {
        Bonzai_Registry::add('test', 10);
        Bonzai_Registry::append('test', -11, Bonzai_Registry::INT_APPEND);
        $this->assertEquals(-1, Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ testAppendArrayToExistentAreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendArrayToExistentAreEquals()
    {
        Bonzai_Registry::add('test', array('a', 'b'));
        Bonzai_Registry::append('test', array('c'));
        $value = Bonzai_Registry::get('test');
        $this->assertEquals(array('a', 'b', array('c')), $value);
    }
    // }}}

    // {{{ testAppendStringToExistentArrayAreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testAppendStringToExistentArrayAreEquals()
    {
        Bonzai_Registry::add('test', array('a', 'b'));
        Bonzai_Registry::append('test', 'c');
        $this->assertEquals(array('a', 'b', 'c'), Bonzai_Registry::get('test'));
    }
    // }}}
    // }}}

    // {{{ checkKeyValidity
    // {{{ testCheckKeyValidityWithParamEmptyStringThrowException
    /**
     * testCheckKeyValidityWithParamEmptyStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckKeyValidityWithParamEmptyStringThrowException()
    {
        $this->callMethod('checkKeyValidity', array(''));
    }
    // }}}

    // {{{ testCheckKeyValidityWithParamSpacedStringThrowException
    /**
     * testCheckKeyValidityWithParamSpacedStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckKeyValidityWithParamSpacedStringThrowException()
    {
        $this->callMethod('checkKeyValidity', array(' '));
    }
    // }}}

    // {{{ testCheckKeyValidityWithParamFakeThrowException
    /**
     * testCheckKeyValidityWithParamFakeThrowException
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckKeyValidityWithParamFakeThrowException()
    {
        $this->callMethod('checkKeyValidity', array('a'));
    }
    // }}}

    // {{{ testCheckKeyValidityWithParamNullThrowException
    /**
     * testCheckKeyValidityWithParamNullThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckKeyValidityWithParamNullThrowException()
    {
        $this->callMethod('checkKeyValidity', array(null));
    }
    // }}}

    // {{{ testCheckKeyValidityWithParamEmptyArrayThrowException
    /**
     * testCheckKeyValidityWithParamEmptyArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckKeyValidityWithParamEmptyArrayThrowException()
    {
        $this->callMethod('checkKeyValidity', array(array()));
    }
    // }}}

    // {{{ testCheckKeyValidityWithParamArrayThrowException
    /**
     * testCheckKeyValidityWithParamArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckKeyValidityWithParamArrayThrowException()
    {
        $this->callMethod('checkKeyValidity', array(array('a')));
    }
    // }}}

    // {{{ testCheckKeyValidityWithParamZeroThrowException
    /**
     * testCheckKeyValidityWithParamZeroThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckKeyValidityWithParamZeroThrowException()
    {
        $this->callMethod('checkKeyValidity', array(0));
    }
    // }}}

    // {{{ testCheckKeyValidityWithParamZeroStringThrowException
    /**
     * testCheckKeyValidityWithParamZeroStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckKeyValidityWithParamZeroStringThrowException()
    {
        $this->callMethod('checkKeyValidity', array('0'));
    }
    // }}}

    // {{{ testCheckKeyValidityWithParamNegativeThrowException
    /**
     * testCheckKeyValidityWithParamNegativeThrowException
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckKeyValidityWithParamNegativeThrowException()
    {
        $this->callMethod('checkKeyValidity', array(-1));
    }
    // }}}

    // {{{ testCheckKeyValidityWithParamOjbectThrowException
    /**
     * testCheckKeyValidityWithParamOjbectThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckKeyValidityWithParamObjectThrowException()
    {
        $this->callMethod('checkKeyValidity', array($this->object));
    }
    // }}}
    // }}}
}
