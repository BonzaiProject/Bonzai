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
    public function testGetInstance()
    {
        // TODO:   $this->object->getInstance();
        // INPUT:  -
        // OUTPUT: class
        // WHAT:   get the instance
        /*
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testAdd()
    {
        // TODO:   $this->object->add($key, $value, $type = null);
        // INPUT:  key, value, type
        // OUTPUT: void
        // WHAT:   add an element
        /*
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testGet()
    {
        // TODO: $this->object->get($key);
        // INPUT:  key
        // OUTPUT: mixed
        // WHAT:   return a saved object
        /*
        key = null    | output = ?
        key = ""      | output = ?
        key = " "     | output = ?
        key = "a"     | output = ?
        key = "EXIST" | output = ?
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testRemove()
    {
        // TODO:   $this->object->remove($key);
        // INPUT:  key
        // OUTPUT: void
        // WHAT:   remove an element
        /*
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testAppend()
    {
        // TODO:   $this->object->append($key, $value, $type = null);
        // INPUT:  key, value, type
        // OUTPUT: void
        // WHAT:   append an element
        /*
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
