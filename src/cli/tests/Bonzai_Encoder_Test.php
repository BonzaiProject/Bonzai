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
    // {{{ elaborate
    // {{{ test__elaborate
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__elaborate()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}
    // }}}

    // {{{ processFile
    // {{{ test__processFile__WithParam_Null__IsEmpty
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__processFile__WithParam_Null__IsEmpty()
    {
        $this->assertEmpty($this->getMethod('processFile')->invokeArgs($this->object, array(null)));
    }
    // }}}

    // {{{ test__processFile__WithParam_EmptyString__IsEmpty
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__processFile__WithParam_EmptyString__IsEmpty()
    {
        $this->assertEmpty($this->getMethod('processFile')->invokeArgs($this->object, array('')));
    }
    // }}}

    // {{{ test__processFile__WithParam_SpacedString__IsEmpty
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__processFile__WithParam_SpacedString__IsEmpty()
    {
        $this->assertEmpty($this->getMethod('processFile')->invokeArgs($this->object, array(' ')));
    }
    // }}}

    // {{{ test__processFile__WithParam_FileNotExists__IsEmpty
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__processFile__WithParam_FileNotExists__IsEmpty()
    {
        $this->assertEmpty($this->getMethod('processFile')->invokeArgs($this->object, array('a')));

        unlink('a');
    }
    // }}}

    // {{{ test__processFile__WithParam_EmptyFile__FileIsEmpty
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     */
    public function test__processFile__WithParam_EmptyFile__FileIsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        try {
            $this->getMethod('processFile')->invokeArgs($this->object, array($filename));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `.+\/test_[a-zA-Z0-9]+` is empty\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        unlink($filename);
    }
    // }}}

    // {{{ test__processFile__WithParam_SizedFile__FileIsNotReadable
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     */
    public function test__processFile__WithParam_SizedFile__FileIsNotReadable()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0333); // -wx-wx-wx

        try {
            $this->getMethod('processFile')->invokeArgs($this->object, array($filename));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `.+\/test_[a-zA-Z0-9]+` is not readable\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ test__processFile__WithParam_NotWritableSizedFile__FileIsEmpty
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     */
    public function test__processFile__WithParam_NotWritableSizedFile__FileIsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0555); // r-xr-xr-x

        $this->assertEmpty($this->getMethod('processFile')->invokeArgs($this->object, array($filename)));

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ test__processFile__WithParam_SizedFile__FileIsEmpty
    /**
     * Process a file
     * @ignore
     * @access public
     * @return void
     */
    public function test__processFile__WithParam_SizedFile__FileIsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?' . '>');

        $this->assertEmpty($this->getMethod('processFile')->invokeArgs($this->object, array($filename)));

        unlink($filename);
    }
    // }}}
    // }}}

    // {{{ saveOutout
    // {{{ test__saveOutput
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__saveOutput()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}
    // }}}

    // {{{ getByteCode
    // {{{ test__getByteCode__WithParam_Null__FileIsInvalid
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function test__getByteCode__WithParam_Null__FileIsInvalid()
    {
        try {
            $this->getMethod('getByteCode')->invokeArgs($this->object, array(null));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `` is invalid\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }
    // }}}

    // {{{ test__getByteCode__WithParam_EmptyString__FileIsInvalid
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function test__getByteCode__WithParam_EmptyString__FileIsInvalid()
    {
        try {
            $this->getMethod('getByteCode')->invokeArgs($this->object, array(''));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `` is invalid\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }
    // }}}

    // {{{ test__getByteCode__WithParam_SpacedString__FileIsInvalid
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function test__getByteCode__WithParam_SpacedString__FileIsInvalid()
    {
        try {
            $this->getMethod('getByteCode')->invokeArgs($this->object, array(' '));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file ` ` is invalid\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }
    // }}}

    // {{{ test__getByteCode__WithParam_FileNotExists__FileIsInvalid
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function test__getByteCode__WithParam_FileNotExists__FileIsInvalid()
    {
        try {
            $this->getMethod('getByteCode')->invokeArgs($this->object, array('a'));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `a` is invalid\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }
    // }}}

    // {{{ test__getByteCode__WithParam_EmptyFile__FileIsEmpty
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function test__getByteCode__WithParam_EmptyFile__FileIsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        try {
            $this->getMethod('getByteCode')->invokeArgs($this->object, array($filename));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `.+\/test_[a-zA-Z0-9]+` is empty\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        unlink($filename);
    }
    // }}}

    // {{{ test__getByteCode__WithParam_SizedFile__FileIsNotReadable
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function test__getByteCode__WithParam_SizedFile__FileIsNotReadable()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0333); // -wx-wx-wx

        try {
            $this->getMethod('getByteCode')->invokeArgs($this->object, array($filename));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `.+\/test_[a-zA-Z0-9]+` is not readable\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ test__getByteCode__WithParam_SizedFile__FileIsEmpty
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function test__getByteCode__WithParam_SizedFile__FileIsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555); // r-xr-xr-x

        try {
            $this->getMethod('getByteCode')->invokeArgs($this->object, array($filename));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `.+\/test_[a-zA-Z0-9]+` is empty\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ test__getByteCode__WithParam_SizedFile__FileIsNotValid
    /**
     * Get the bytecode
     * @ignore
     * @access public
     * @return void
     */
    public function test__getByteCode__WithParam_SizedFile__FileIsNotValid()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?' . '>');

        $bytecode = $this->getMethod('getByteCode')->invokeArgs($this->object, array($filename));

        $this->assertRegExp('/bcompiler v/', $bytecode);

        unlink($filename);
    }
    // }}}
    // }}}

    // {{{ cleanSource
    // {{{ test__cleanSource
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__cleanSource()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}
    // }}}

    // {{{ expandPathsToFiles
    // {{{ test__expandPathsToFiles__WithParam_EmptyString__AreEquals
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__expandPathsToFiles__WithParam_EmptyString__AreEquals()
    {
        $this->assertEquals(array(), $this->getMethod('expandPathsToFiles')->invokeArgs($this->object, array('')));
    }
    // }}}

    // {{{ test__expandPathsToFiles__WithParam_Null__AreEquals
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__expandPathsToFiles__WithParam_Null__AreEquals()
    {
        $this->assertEquals(array(), $this->getMethod('expandPathsToFiles')->invokeArgs($this->object, array(null)));
    }
    // }}}

    // {{{ test__expandPathsToFiles__WithParam_Fake__AreEquals
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__expandPathsToFiles__WithParam_Fake__AreEquals()
    {
        $this->assertEquals(array(), $this->getMethod('expandPathsToFiles')->invokeArgs($this->object, array('a')));
    }
    // }}}

    // {{{ test__expandPathsToFiles__WithParam_SpacedString__AreEquals
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__expandPathsToFiles__WithParam_SpacedString__AreEquals()
    {
        $this->assertEquals(array(), $this->getMethod('expandPathsToFiles')->invokeArgs($this->object, array(' ')));
    }
    // }}}

    // {{{ test__expandPathsToFiles__WithParam_EmptyArray__AreEquals
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__expandPathsToFiles__WithParam_EmptyArray__AreEquals()
    {
        $this->assertEquals(array(), $this->getMethod('expandPathsToFiles')->invokeArgs($this->object, array(array())));
    }
    // }}}

    // {{{ test__expandPathsToFiles__WithParam_Array__AreEquals
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__expandPathsToFiles__WithParam_Array__AreEquals()
    {
        $this->assertEquals(array(), $this->getMethod('expandPathsToFiles')->invokeArgs($this->object, array(array('a'))));
    }
    // }}}

    // {{{ test__expandPathsToFiles__WithParam_Array__AreEquals
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__expandPathsToFiles__WithParam_Array__AreEquals_2()
    {
        $files = array(
            __DIR__ . '/Bonzai_Controller_Test.php',
            __DIR__ . '/Bonzai_Encoder_Test.php',
            __DIR__ . '/Bonzai_Exception_Test.php',
            __DIR__ . '/Bonzai_Registry_Test.php',
            __DIR__ . '/Bonzai_Task_Test.php',
            __DIR__ . '/Bonzai_Utils_Help_Test.php',
            __DIR__ . '/Bonzai_Utils_Options_Test.php',
            __DIR__ . '/Bonzai_Utils_Test.php',
            __DIR__ . '/cliSuite.php'
        );

        $this->assertEquals($files, $this->getMethod('expandPathsToFiles')->invokeArgs($this->object, array(array(__DIR__))));
    }
    // }}}
    // }}}
}
