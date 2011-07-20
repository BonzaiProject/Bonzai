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
require_once __DIR__ . '/../libs/Encoder/Encoder.php';

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
class Bonzai_Encoder_Test extends Bonzai_TestCase
{
    // WHAT: process a file
    public function testProcessFile1()
    {
        $this->assertEquals('', $this->object->processFile(null));
    }

    // WHAT: process a file
    public function testProcessFile2()
    {
        $this->assertEquals('', $this->object->processFile(''));
    }

    // WHAT: process a file
    public function testProcessFile3()
    {
        $this->assertEquals('', $this->object->processFile(' '));
    }

    // WHAT: process a file
    public function testProcessFile4()
    {
        $this->assertEquals('', $this->object->processFile('a'));
    }

    // WHAT: process a file
    public function testProcessFile5()
    {
        $this->assertEquals('', $this->object->processFile('empty'));
    }

    // WHAT: process a file
    public function testProcessFile6()
    {
        $this->assertEquals('', $this->object->processFile('noread'));
    }

    // WHAT: process a file
    public function testProcessFile7()
    {
        $this->assertEquals('', $this->object->processFile('read'));
    }

    // WHAT: get the bytecode
    public function testGetByteCode1()
    {
        $this->assertEquals(null, $this->object->getByteCode(null));
    }

    // WHAT: get the bytecode
    public function testGetByteCode2()
    {
        $this->assertEquals(null, $this->object->getByteCode(''));
    }

    // WHAT: get the bytecode
    public function testGetByteCode3()
    {
        $this->assertEquals(null, $this->object->getByteCode(' '));
    }

    // WHAT: get the bytecode
    public function testGetByteCode4()
    {
        $this->assertEquals('', $this->object->getByteCode('a'));
    }

    // WHAT: get the bytecode
    public function testGetByteCode5()
    {
        $this->assertEquals('', $this->object->getByteCode('empty'));
    }

    // WHAT: get the bytecode
    public function testGetByteCode6()
    {
        $this->assertEquals('', $this->object->getByteCode('noread'));
    }

    // WHAT: get the bytecode
    public function testGetByteCode7()
    {
        $this->assertEquals('', $this->object->getByteCode('read'));
    }

    public function testExpandPathsToFiles()
    {
        // TODO:   $this->object->expandPathsToFiles($files);
        // INPUT:  files
        // OUTPUT: void
        // WHAT:   explode dir in files list
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
