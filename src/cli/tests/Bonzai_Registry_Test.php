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
require_once __DIR__ . '/../libs/Registry/Registry.php';

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
    public function testAdd()
    {
        // WHAT: add an element
        $this->assertEquals('', $this->object->add('', '', null));
        $this->assertEquals('', $this->object->add('', '', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->add('', null, null));
        $this->assertEquals('', $this->object->add('', null, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->add('', 'aaa', null));
        $this->assertEquals('', $this->object->add('', 'aaa', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->add(null, '', null));
        $this->assertEquals('', $this->object->add(null, '', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->add(null, null, null));
        $this->assertEquals('', $this->object->add(null, null, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->add(null, 'aaa', null));
        $this->assertEquals('', $this->object->add(null, 'aaa', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->add('aaa', '', null));
        $this->assertEquals('', $this->object->add('aaa', '', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->add('aaa', null, null));
        $this->assertEquals('', $this->object->add('aaa', null, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->add('aaa', 'aaa', null));
        $this->assertEquals('', $this->object->add('aaa', 'aaa', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->add(array(), '', null));
        $this->assertEquals('', $this->object->add(array(), '', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->add(array(), null, null));
        $this->assertEquals('', $this->object->add(array(), null, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->add(array(), 'aaa', null));
        $this->assertEquals('', $this->object->add(array(), 'aaa', $this->object::ARRAY_APPEND));
    }

    public function testGet()
    {
        // WHAT: return a saved object
        $this->assertEquals('', $this->object->get(null));
        $this->assertEquals('', $this->object->get(''));
        $this->assertEquals('', $this->object->get(' '));
        $this->assertEquals('', $this->object->get('a'));
        $this->assertEquals('', $this->object->get('EXIST'));
    }

    public function testRemove()
    {
        // WHAT: remove an element
        $this->assertEquals('', $this->object->remove(null));
        $this->assertEquals('', $this->object->remove(''));
        $this->assertEquals('', $this->object->remove(' '));
        $this->assertEquals('', $this->object->remove('a'));
        $this->assertEquals('', $this->object->remove('EXIST'));
    }

    public function testAppend()
    {
        // WHAT: append an element
        $this->assertEquals('', $this->object->append('', '', null));
        $this->assertEquals('', $this->object->append('', '', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append('', '', $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append('', null, null));
        $this->assertEquals('', $this->object->append('', null, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append('', null, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append('', 'aaa', null));
        $this->assertEquals('', $this->object->append('', 'aaa', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append('', 'aaa', $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append('', 0, null));
        $this->assertEquals('', $this->object->append('', 0, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append('', 0, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append('', 1, null));
        $this->assertEquals('', $this->object->append('', 1, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append('', 1, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append('', -1, null));
        $this->assertEquals('', $this->object->append('', -1, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append('', -1, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append(null, '', null));
        $this->assertEquals('', $this->object->append(null, '', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append(null, '', $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append(null, null, null));
        $this->assertEquals('', $this->object->append(null, null, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append(null, null, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append(null, 'aaa', null));
        $this->assertEquals('', $this->object->append(null, 'aaa', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append(null, 'aaa', $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append(null, 0, null));
        $this->assertEquals('', $this->object->append(null, 0, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append(null, 0, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append(null, 1, null));
        $this->assertEquals('', $this->object->append(null, 1, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append(null, 1, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append(null, -1, null));
        $this->assertEquals('', $this->object->append(null, -1, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append(null, -1, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append('aaa', '', null));
        $this->assertEquals('', $this->object->append('aaa', '', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append('aaa', '', $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append('aaa', null, null));
        $this->assertEquals('', $this->object->append('aaa', null, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append('aaa', null, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append('aaa', 'aaa', null));
        $this->assertEquals('', $this->object->append('aaa', 'aaa', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append('aaa', 'aaa', $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append('aaa', 0, null));
        $this->assertEquals('', $this->object->append('aaa', 0, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append('aaa', 0, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append('aaa', 1, null));
        $this->assertEquals('', $this->object->append('aaa', 1, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append('aaa', 1, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append('aaa', -1, null));
        $this->assertEquals('', $this->object->append('aaa', -1, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append('aaa', -1, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append(array(), '', null));
        $this->assertEquals('', $this->object->append(array(), '', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append(array(), '', $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append(array(), null, null));
        $this->assertEquals('', $this->object->append(array(), null, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append(array(), null, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append(array(), 'aaa', null));
        $this->assertEquals('', $this->object->append(array(), 'aaa', $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append(array(), 'aaa', $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append(array(), 0, null));
        $this->assertEquals('', $this->object->append(array(), 0, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append(array(), 0, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append(array(), 1, null));
        $this->assertEquals('', $this->object->append(array(), 1, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append(array(), 1, $this->object::INT_APPEND));
        $this->assertEquals('', $this->object->append(array(), -1, null));
        $this->assertEquals('', $this->object->append(array(), -1, $this->object::ARRAY_APPEND));
        $this->assertEquals('', $this->object->append(array(), -1, $this->object::INT_APPEND));
    }
}
