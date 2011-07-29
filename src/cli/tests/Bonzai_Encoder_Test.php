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
require_once dirname(__FILE__) . '/../libs/Converter/Converter.php';
require_once dirname(__FILE__) . '/../libs/Utils/Utils.php';
require_once dirname(__FILE__) . '/../libs/Registry/Registry.php';
require_once dirname(__FILE__) . '/../libs/Encoder/Encoder.php';

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
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcessFile1()
    {
        $this->assertEquals('', $this->object->processFile(null));
    }

    // WHAT: process a file
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcessFile2()
    {
        $this->assertEquals('', $this->object->processFile(''));
    }

    // WHAT: process a file
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcessFile3()
    {
        $this->assertEquals('', $this->object->processFile(' '));
    }

    // WHAT: process a file
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcessFile4()
    {
        $this->assertEquals('', $this->object->processFile('a'));
    }

    // WHAT: process a file
    public function testProcessFile5()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        try {
            $this->assertEquals('', $this->object->processFile($filename));
        } catch (Exception $e) {
            unlink($filename);
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }

    // WHAT: process a file
    public function testProcessFile6()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0700);

        try {
            $this->assertEquals('', $this->object->processFile($filename));
        } catch (Exception $e) {
            unlink($filename);
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }

    // WHAT: process a file
    public function testProcessFile7()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?>');

        $this->assertEquals('', $this->object->processFile($filename));
        unlink($filename);
    }

    // WHAT: get the bytecode
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetByteCode1()
    {
        $this->assertEquals(null, $this->object->getByteCode(null));
    }

    // WHAT: get the bytecode
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetByteCode2()
    {
        $this->assertEquals(null, $this->object->getByteCode(''));
    }

    // WHAT: get the bytecode
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetByteCode3()
    {
        $this->assertEquals(null, $this->object->getByteCode(' '));
    }

    // WHAT: get the bytecode
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetByteCode4()
    {
        $this->assertEquals('', $this->object->getByteCode('a'));
    }

    // WHAT: get the bytecode
    public function testGetByteCode5()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        try {
            $this->assertEquals('', $this->object->getByteCode($filename));
        } catch (Exception $e) {
            unlink($filename);
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }

    // WHAT: get the bytecode
    public function testGetByteCode6()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0700);

        try {
            $this->assertEquals('', $this->object->getByteCode($filename));
        } catch (Exception $e) {
            unlink($filename);
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }

    // WHAT: get the bytecode
    public function testGetByteCode7()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?>');

        $this->assertEquals('', $this->object->getByteCode($filename));
        unlink($filename);
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
