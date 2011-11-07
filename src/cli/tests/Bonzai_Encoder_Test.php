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
require_once __DIR__ . '/../libs/Exception/Exception.php';
require_once __DIR__ . '/../libs/Utils/Utils.php';
require_once __DIR__ . '/../libs/Registry/Registry.php';
require_once __DIR__ . '/../libs/Encoder/Encoder.php';

Bonzai_Utils::$silenced = true;

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
    // {{{ testProcessFile1
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testProcessFile1()
    {
        $this->assertEmpty($this->object->processFile(null));
    }
    // }}}

    // {{{ testProcessFile2
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testProcessFile2()
    {
        $this->assertEmpty($this->object->processFile(''));
    }
    // }}}

    // {{{ testProcessFile3
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testProcessFile3()
    {
        $this->assertEmpty($this->object->processFile(' '));
    }
    // }}}

    // {{{ testProcessFile4
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testProcessFile4()
    {
        $this->assertEmpty($this->object->processFile('a'));

        unlink('a');
    }
    // }}}

    // {{{ testProcessFile5
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     */
    public function testProcessFile5()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        try {
            $this->object->processFile($filename);
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `.+\/test_[a-zA-Z0-9]+` is empty\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        unlink($filename);
    }
    // }}}

    // {{{ testProcessFile6
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     */
    public function testProcessFile6()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0333); // -wx-wx-wx

        try {
            $this->object->processFile($filename);
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `.+\/test_[a-zA-Z0-9]+` is not readable\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ testProcessFile7
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     */
    public function testProcessFile7()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0555); // r-xr-xr-x

        $this->assertEmpty($this->object->processFile($filename));

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ testProcessFile7
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     */
    public function testProcessFile8()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?' . '>');

        $this->assertEmpty($this->object->processFile($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testGetByteCode1
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCode1()
    {
        try {
            $this->object->getByteCode(null);
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `` is invalid\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }
    // }}}

    // {{{ testGetByteCode2
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCode2()
    {
        try {
            $this->object->getByteCode('');
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `` is invalid\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }
    // }}}

    // {{{ testGetByteCode3
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCode3()
    {
        try {
            $this->object->getByteCode(' ');
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file ` ` is invalid\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }
    // }}}

    // {{{ testGetByteCode4
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCode4()
    {
        try {
            $this->object->getByteCode('a');
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `a` is invalid\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }
    // }}}

    // {{{ testGetByteCode5
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCode5()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        try {
            $this->object->getByteCode($filename);
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `.+\/test_[a-zA-Z0-9]+` is empty\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        unlink($filename);
    }
    // }}}

    // {{{ testGetByteCode6
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCode6()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0333); // -wx-wx-wx

        try {
            $this->object->getByteCode($filename);
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `.+\/test_[a-zA-Z0-9]+` is not readable\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ testGetByteCode7
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCode7()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555); // r-xr-xr-x

        try {
            $this->object->getByteCode($filename);
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `.+\/test_[a-zA-Z0-9]+` is empty\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ testGetByteCode8
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCode8()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?' . '>');

        $bytecode = $this->object->getByteCode($filename);

        $this->assertRegExp('/bcompiler v/', $bytecode);

        unlink($filename);
    }
    // }}}

    // {{{ testExpandPathsToFiles
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testExpandPathsToFiles()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}
}
