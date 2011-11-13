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
    // {{{ test__add__WithParams_EmptyString_EmptyString_Null__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_EmptyString_EmptyString_Null__ThrowException()
    {
        Bonzai_Registry::add('', '', null);
    }
    // }}}

    // {{{ test__add__WithParams_EmptyString_EmptyString_ArrayAppend__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_EmptyString_EmptyString_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::add('', '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__add__WithParams_EmptyString_Null_Null__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_EmptyString_Null_Null__ThrowException()
    {
        Bonzai_Registry::add('', null, null);
    }
    // }}}

    // {{{ test__add__WithParams_EmptyString_Null_ArrayAppend__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_EmptyString_Null_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::add('', null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__add__WithParams_EmptyString_Fake_Null__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_EmptyString_Fake_Null__ThrowException()
    {
        Bonzai_Registry::add('', 'aaa', null);
    }
    // }}}

    // {{{ test__add__WithParams_EmptyString_Fake_ArrayAppend__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_EmptyString_Fake_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::add('', 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__add__WithParams_Null_EmptyString_Null__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_Null_EmptyString_Null__ThrowException()
    {
        Bonzai_Registry::add(null, '', null);
    }
    // }}}

    // {{{ test__add__WithParams_Null_EmptyString_ArrayAppend__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_Null_EmptyString_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::add(null, '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__add__WithParams_Null_Null_Null__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_Null_Null_Null__ThrowException()
    {
        Bonzai_Registry::add(null, null, null);
    }
    // }}}

    // {{{ test__add__WithParams_Null_Null_ArrayAppend__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_Null_Null_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::add(null, null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__add__WithParams_Null_Fake_Null__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_Null_Fake_Null__ThrowException()
    {
        Bonzai_Registry::add(null, 'aaa', null);
    }
    // }}}

    // {{{ test__add__WithParams_Null_Fake_ArrayAppend__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_Null_Fake_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::add(null, 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__add__WithParams_Fake_EmptyString_Null__IsEmpty
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__add__WithParams_Fake_EmptyString_Null__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', '', null));
    }
    // }}}

    // {{{ test__add__WithParams_Fake_EmptyString_ArrayAppend__IsEmpty
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__add__WithParams_Fake_EmptyString_ArrayAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', '', Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ test__add__WithParams_Fake_Null_Null__IsEmpty
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__add__WithParams_Fake_Null_Null__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', null, null));
    }
    // }}}

    // {{{ test__add__WithParams_Fake_Null_ArrayAppend__IsEmpty
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__add__WithParams_Fake_Null_ArrayAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', null, Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ test__add__WithParams_Fake_Fake_Null__IsEmpty
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__add__WithParams_Fake_Fake_Null__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', 'aaa', null));
    }
    // }}}

    // {{{ test__add__WithParams_Fake_Fake_ArrayAppend__IsEmpty
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__add__WithParams_Fake_Fake_ArrayAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::add('aaa', 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ test__add__WithParams_EmptyArray_EmptyString_Null__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_EmptyArray_EmptyString_Null__ThrowException()
    {
        Bonzai_Registry::add(array(), '', null);
    }
    // }}}

    // {{{ test__add__WithParams_EmptyArray_EmptyString_ArrayAppend__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_EmptyArray_EmptyString_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::add(array(), '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__add__WithParams_EmptyArray_Null_Null__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_EmptyArray_Null_Null__ThrowException()
    {
        Bonzai_Registry::add(array(), null, null);
    }
    // }}}

    // {{{ test__add__WithParams_EmptyArray_Null_ArrayAppend__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_EmptyArray_Null_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::add(array(), null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__add__WithParams_EmptyArray_Fake_Null__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_EmptyArray_Fake_Null__ThrowException()
    {
        Bonzai_Registry::add(array(), 'aaa', null);
    }
    // }}}

    // {{{ test__add__WithParams_EmptyArray_Fake_ArrayAppend__ThrowException
    /**
     * Add an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__add__WithParams_EmptyArray_Fake_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::add(array(), 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}
    // }}}

    // {{{ get
    // {{{ test__get_ParamIsNull__ThrowException
    /**
     * Return a saved object
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__get_ParamIsNull__ThrowException()
    {
        Bonzai_Registry::get(null);
    }
    // }}}

    // {{{ test__get_ParamIsEmptyString__ThrowException
    /**
     * Return a saved object
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__get_ParamIsEmptyString__ThrowException()
    {
        Bonzai_Registry::get('');
    }
    // }}}

    // {{{ test__get_ParamIsSpacedString__ReturnsNull
    /**
     * Return a saved object
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__get_ParamIsSpacedString__ReturnsNull()
    {
        $this->assertNull(Bonzai_Registry::get(' '));
    }
    // }}}

    // {{{ test__get_ParamIsFake__ReturnsNull
    /**
     * Return a saved object
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__get_ParamIsFake__ReturnsNull()
    {
        $this->assertNull(Bonzai_Registry::get('a'));
    }
    // }}}

    // {{{ test__get_ParamIsEmptyArray__ThrowException
    /**
     * Return a saved object
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__get_ParamIsEmptyArray__ThrowException()
    {
        Bonzai_Registry::get(array());
    }
    // }}}

    // {{{ test__get_ExistentKey__AreEquals
    /**
     * Return a saved object
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__get_ExistentKey__AreEquals()
    {
        Bonzai_Registry::add('EXIST', 'content');
        $this->assertEquals('content', Bonzai_Registry::get('EXIST'));
    }
    // }}}
    // }}}

  // {{{ remove
    // {{{ test__remove_ParamIsNull__ThrowException
    /**
     * Remove an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__remove_ParamIsNull__ThrowException()
    {
        Bonzai_Registry::remove(null);
    }
    // }}}

    // {{{ test__remove_ParamIsEmptyString__ThrowException
    /**
     * Remove an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__remove_ParamIsEmptyString__ThrowException()
    {
        Bonzai_Registry::remove('');
    }
    // }}}

    // {{{ test__remove__WithParam_SpacedString
    /**
     * Remove an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__remove__WithParam_SpacedString()
    {
        Bonzai_Registry::remove(' ');
    }
    // }}}

    // {{{ test__remove__WithParam_String
    /**
     * Remove an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__remove__WithParam_String()
    {
        Bonzai_Registry::remove('a');
    }
    // }}}

    // {{{ test__remove_ParamIsEmptyArray__ThrowException
    /**
     * Remove an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__remove_ParamIsEmptyArray__ThrowException()
    {
        Bonzai_Registry::remove(array());
    }
    // }}}

    // {{{ test__remove_ExistentKey__ReturnsNull
    /**
     * Remove an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__remove_ExistentKey__ReturnsNull()
    {
        Bonzai_Registry::add('EXIST', 'content');
        Bonzai_Registry::remove('EXIST');
        $this->assertNull(Bonzai_Registry::get('EXIST'));
    }
    // }}}
    // }}}

    // {{{ append
    // {{{ test__append__WithParams_EmptyString_EmptyString_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_EmptyString_Null__ThrowException()
    {
        Bonzai_Registry::append('', '', null);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_EmptyString_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_EmptyString_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append('', '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_EmptyString_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_EmptyString_IntAppend__ThrowException()
    {
        Bonzai_Registry::append('', '', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_Null_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_Null_Null__ThrowException()
    {
        Bonzai_Registry::append('', null, null);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_Null_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_Null_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append('', null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_Null_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_Null_IntAppend__ThrowException()
    {
        Bonzai_Registry::append('', null, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_Fake_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_Fake_Null__ThrowException()
    {
        Bonzai_Registry::append('', 'aaa', null);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_Fake_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_Fake_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append('', 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_Fake_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_Fake_IntAppend__ThrowException()
    {
        Bonzai_Registry::append('', 'aaa', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_Zero_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_Zero_Null__ThrowException()
    {
        Bonzai_Registry::append('', 0, null);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_Zero_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_Zero_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append('', 0, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_Zero_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_Zero_IntAppend__ThrowException()
    {
        Bonzai_Registry::append('', 0, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_One_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_One_Null__ThrowException()
    {
        Bonzai_Registry::append('', 1, null);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_One_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_One_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append('', 1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_One_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_One_IntAppend__ThrowException()
    {
        Bonzai_Registry::append('', 1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_Negative_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_Negative_Null__ThrowException()
    {
        Bonzai_Registry::append('', -1, null);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_Negative_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_Negative_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append('', -1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyString_NegativeOne_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyString_NegativeOne_IntAppend__ThrowException()
    {
        Bonzai_Registry::append('', -1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_Null_EmptyString_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_EmptyString_Null__ThrowException()
    {
        Bonzai_Registry::append(null, '', null);
    }
    // }}}

    // {{{ test__append__WithParams_Null_EmptyString_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_EmptyString_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append(null, '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_Null_EmptyString_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_EmptyString_IntAppend__ThrowException()
    {
        Bonzai_Registry::append(null, '', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_Null_Null_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_Null_Null__ThrowException()
    {
        Bonzai_Registry::append(null, null, null);
    }
    // }}}

    // {{{ test__append__WithParams_Null_Null_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_Null_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append(null, null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_Null_Null_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_Null_IntAppend__ThrowException()
    {
        Bonzai_Registry::append(null, null, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_Null_Fake_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_Fake_Null__ThrowException()
    {
        Bonzai_Registry::append(null, 'aaa', null);
    }
    // }}}

    // {{{ test__append__WithParams_Null_Fake_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_Fake_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append(null, 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_Null_Fake_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_Fake_IntAppend__ThrowException()
    {
        Bonzai_Registry::append(null, 'aaa', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_Null_Zero_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_Zero_Null__ThrowException()
    {
        Bonzai_Registry::append(null, 0, null);
    }
    // }}}

    // {{{ test__append__WithParams_Null_Zero_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_Zero_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append(null, 0, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_Null_Zero_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_Zero_IntAppend__ThrowException()
    {
        Bonzai_Registry::append(null, 0, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_Null_One_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_One_Null__ThrowException()
    {
        Bonzai_Registry::append(null, 1, null);
    }
    // }}}

    // {{{ test__append__WithParams_Null_One_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_One_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append(null, 1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_Null_One_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_One_IntAppend__ThrowException()
    {
        Bonzai_Registry::append(null, 1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_Null_Negative_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_Negative_Null__ThrowException()
    {
        Bonzai_Registry::append(null, -1, null);
    }
    // }}}

    // {{{ test__append__WithParams_Null_Negative_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_Negative_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append(null, -1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_Null_Negative_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_Null_Negative_IntAppend__ThrowException()
    {
        Bonzai_Registry::append(null, -1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_Fake_EmptyString_Null__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_EmptyString_Null__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', '', null));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_EmptyString_ArrayAppend__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_EmptyString_ArrayAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', '', Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_EmptyString_IntAppend__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_EmptyString_IntAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', '', Bonzai_Registry::INT_APPEND));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_Null_Null__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_Null_Null__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', null, null));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_Null_ArrayAppend__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_Null_ArrayAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', null, Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_Null_IntAppend__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_Null_IntAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', null, Bonzai_Registry::INT_APPEND));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_Fake_Null__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_Fake_Null__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 'aaa', null));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_Fake_ArrayAppend__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_Fake_ArrayAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 'aaa', Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_Fake_IntAppend__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_Fake_IntAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 'aaa', Bonzai_Registry::INT_APPEND));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_Zero_Null__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_Zero_Null__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 0, null));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_Zero_ArrayAppend__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_Zero_ArrayAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 0, Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_Zero_IntAppend__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_Zero_IntAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 0, Bonzai_Registry::INT_APPEND));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_One_Null__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_One_Null__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 1, null));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_One_ArrayAppend__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_One_ArrayAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 1, Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_One_IntAppend__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_One_IntAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', 1, Bonzai_Registry::INT_APPEND));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_Negative_Null__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_Negative_Null__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', -1, null));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_Negative_ArrayAppend__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_Negative_ArrayAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', -1, Bonzai_Registry::ARRAY_APPEND));
    }
    // }}}

    // {{{ test__append__WithParams_Fake_Negative_IntAppend__IsEmpty
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append__WithParams_Fake_Negative_IntAppend__IsEmpty()
    {
        $this->assertEmpty(Bonzai_Registry::append('aaa', -1, Bonzai_Registry::INT_APPEND));
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_Null__ThrowException()
    {
        Bonzai_Registry::append(array(), '', null);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_EmptyString_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_EmptyString_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append(array(), '', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_EmptyString_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_EmptyString_IntAppend__ThrowException()
    {
        Bonzai_Registry::append(array(), '', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_Null_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_Null_Null__ThrowException()
    {
        Bonzai_Registry::append(array(), null, null);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_Null_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_Null_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append(array(), null, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_Null_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_Null_IntAppend__ThrowException()
    {
        Bonzai_Registry::append(array(), null, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_Fake_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_Fake_Null__ThrowException()
    {
        Bonzai_Registry::append(array(), 'aaa', null);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_Fake_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_Fake_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append(array(), 'aaa', Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_Fake_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_Fake_IntAppend__ThrowException()
    {
        Bonzai_Registry::append(array(), 'aaa', Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_Zero_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_Zero_Null__ThrowException()
    {
        Bonzai_Registry::append(array(), 0, null);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_Zero_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_Zero_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append(array(), 0, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_Zero_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_Zero_IntAppend__ThrowException()
    {
        Bonzai_Registry::append(array(), 0, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_One_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_One_Null__ThrowException()
    {
        Bonzai_Registry::append(array(), 1, null);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_One_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_One_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append(array(), 1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_One_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_One_IntAppend__ThrowException()
    {
        Bonzai_Registry::append(array(), 1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_Negative_Null__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_Negative_Null__ThrowException()
    {
        Bonzai_Registry::append(array(), -1, null);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_Negative_ArrayAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_Negative_ArrayAppend__ThrowException()
    {
        Bonzai_Registry::append(array(), -1, Bonzai_Registry::ARRAY_APPEND);
    }
    // }}}

    // {{{ test__append__WithParams_EmptyArray_Negative_IntAppend__ThrowException
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__append__WithParams_EmptyArray_Negative_IntAppend__ThrowException()
    {
        Bonzai_Registry::append(array(), -1, Bonzai_Registry::INT_APPEND);
    }
    // }}}

    // {{{ test__append_StringToExistent__AreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append_StringToExistent__AreEquals()
    {
        Bonzai_Registry::add('test', 'a');
        Bonzai_Registry::append('test', 'a');
        $this->assertEquals('aa', Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ test__append_IntToExistent__AreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append_IntToExistent__AreEquals()
    {
        Bonzai_Registry::add('test', 0);
        Bonzai_Registry::append('test', 1);
        $this->assertEquals(1, Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ test__append_IntToExistentWithIntAppend__AreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append_IntToExistentWithIntAppend__AreEquals()
    {
        Bonzai_Registry::add('test', 0);
        Bonzai_Registry::append('test', 1, Bonzai_Registry::INT_APPEND);
        $this->assertEquals(1, Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ test__append_IntToExistent__AreEquals_2
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append_IntToExistent__AreEquals_2()
    {
        Bonzai_Registry::add('test', 10);
        Bonzai_Registry::append('test', 11, Bonzai_Registry::INT_APPEND);
        $this->assertEquals(21, Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ test__append_StringIntToExistent__AreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append_StringIntToExistent__AreEquals()
    {
        Bonzai_Registry::add('test', 10);
        Bonzai_Registry::append('test', 11);
        $this->assertEquals(1011, Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ test__append_StringIntToExistent__AreEquals_2
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append_StringIntToExistent__AreEquals_2()
    {
        Bonzai_Registry::add('test', 10);
        Bonzai_Registry::append('test', -11);
        $this->assertEquals('10-11', Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ test__append_NegativeIntToExistent__AreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append_NegativeIntToExistent__AreEquals()
    {
        Bonzai_Registry::add('test', 10);
        Bonzai_Registry::append('test', -11, Bonzai_Registry::INT_APPEND);
        $this->assertEquals(-1, Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ test__append_ArrayToExistent__AreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append_ArrayToExistent__AreEquals()
    {
        Bonzai_Registry::add('test', array('a', 'b'));
        Bonzai_Registry::append('test', array('c'));
        $this->assertEquals(array('a', 'b', array('c')), Bonzai_Registry::get('test'));
    }
    // }}}

    // {{{ test__append_StringToExistentArray__AreEquals
    /**
     * Append an element
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__append_StringToExistentArray__AreEquals()
    {
        Bonzai_Registry::add('test', array('a', 'b'));
        Bonzai_Registry::append('test', 'c');
        $this->assertEquals(array('a', 'b', 'c'), Bonzai_Registry::get('test'));
    }
    // }}}
    // }}}

    // {{{ checkKeyValidity
    // {{{ test__checkKeyValidity__WithParam_EmptyString__ThrowException
    /**
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__checkKeyValidity__WithParam_EmptyString__ThrowException()
    {
        $this->getMethod('checkKeyValidity')->invokeArgs($this->object, array(''));
    }
    // }}}

    // {{{ test__checkKeyValidity__WithParam_SpacedString__ThrowException
    /**
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__checkKeyValidity__WithParam_SpacedString__ThrowException()
    {
        $this->getMethod('checkKeyValidity')->invokeArgs($this->object, array(' '));
    }
    // }}}

    // {{{ test__checkKeyValidity__WithParam_Fake__ThrowException
    /**
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__checkKeyValidity__WithParam_Fake__ThrowException()
    {
        $this->getMethod('checkKeyValidity')->invokeArgs($this->object, array('a'));
    }
    // }}}

    // {{{ test__checkKeyValidity__WithParam_Null__ThrowException
    /**
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__checkKeyValidity__WithParam_Null__ThrowException()
    {
        $this->getMethod('checkKeyValidity')->invokeArgs($this->object, array(null));
    }
    // }}}

    // {{{ test__checkKeyValidity__WithParam_EmptyArray__ThrowException
    /**
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__checkKeyValidity__WithParam_EmptyArray__ThrowException()
    {
        $this->getMethod('checkKeyValidity')->invokeArgs($this->object, array(array()));
    }
    // }}}

    // {{{ test__checkKeyValidity__WithParam_Array__ThrowException
    /**
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__checkKeyValidity__WithParam_Array__ThrowException()
    {
        $this->getMethod('checkKeyValidity')->invokeArgs($this->object, array(array('a')));
    }
    // }}}

    // {{{ test__checkKeyValidity__WithParam_Zero__ThrowException
    /**
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__checkKeyValidity__WithParam_Zero__ThrowException()
    {
        $this->getMethod('checkKeyValidity')->invokeArgs($this->object, array(0));
    }
    // }}}

    // {{{ test__checkKeyValidity__WithParam_ZeroString__ThrowException
    /**
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__checkKeyValidity__WithParam_ZeroString__ThrowException()
    {
        $this->getMethod('checkKeyValidity')->invokeArgs($this->object, array('0'));
    }
    // }}}

    // {{{ test__checkKeyValidity__WithParam_Negative__ThrowException
    /**
     *
     * @ignore
     * @access public
     * @return void
     */
    public function test__checkKeyValidity__WithParam_Negative__ThrowException()
    {
        $this->getMethod('checkKeyValidity')->invokeArgs($this->object, array(-1));
    }
    // }}}

    // {{{ test__checkKeyValidity__WithParam_Ojbect__ThrowException
    /**
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__checkKeyValidity__WithParam_Object__ThrowException()
    {
        $this->getMethod('checkKeyValidity')->invokeArgs($this->object, array($this->object));
    }
    // }}}
    // }}}
}
