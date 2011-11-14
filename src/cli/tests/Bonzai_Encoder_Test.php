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
require_once __DIR__ . '/../libs/Utils/Utils.php';
require_once __DIR__ . '/../libs/Registry/Registry.php';
require_once __DIR__ . '/../libs/Encoder/Encoder.php';

Bonzai_Utils::$silenced = true;

/**
 * Bonzai_Encoder_Test
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
class Bonzai_Encoder_Test extends Bonzai_TestCase
{
    // {{{ elaborate
    // {{{ testElaborateJustCoverage
    /**
     * testElaborateJustCoverage
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testElaborateJustCoverage()
    {
        $this->object->elaborate(array());
    }
    // }}}
    // }}}

    // {{{ processFile
    // {{{ testProcessFileWithParamNullIsEmpty
    /**
     * Process a file
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testProcessFileWithParamNullIsEmpty()
    {
        $this->assertEmpty($this->callMethod('processFile', array(null)));
    }
    // }}}

    // {{{ testProcessFileWithParamEmptyStringIsEmpty
    /**
     * Process a file
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testProcessFileWithParamEmptyStringIsEmpty()
    {
        $this->assertEmpty($this->callMethod('processFile', array('')));
    }
    // }}}

    // {{{ testProcessFileWithParamSpacedStringIsEmpty
    /**
     * Process a file
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testProcessFileWithParamSpacedStringIsEmpty()
    {
        $this->assertEmpty($this->callMethod('processFile', array(' ')));
    }
    // }}}

    // {{{ testProcessFileWithParamFileNotExistsIsEmpty
    /**
     * Process a file
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testProcessFileWithParamFileNotExistsIsEmpty()
    {
        $this->assertEmpty($this->callMethod('processFile', array('a')));

        unlink('a');
    }
    // }}}

    // {{{ testProcessFileWithParamEmptyFileFileIsEmpty
    /**
     * Process a file
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testProcessFileWithParamEmptyFileFileIsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        try {
            $this->callMethod('processFile', array($filename));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp(
                '/^The file `.+\/test_[a-zA-Z0-9]+` is empty\.$/',
                $e->getMessage()
            );

            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        unlink($filename);
    }
    // }}}

    // {{{ testProcessFileWithParamSizedFileFileIsNotReadable
    /**
     * Process a file
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testProcessFileWithParamSizedFileFileIsNotReadable()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0333); // -wx-wx-wx

        try {
            $this->callMethod('processFile', array($filename));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp(
                '/^The file `.+\/test_[a-zA-Z0-9]+` is not readable\.$/',
                $e->getMessage()
            );

            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ testProcessFileWithParamNotWritableSizedFileFileIsEmpty
    /**
     * Process a file
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testProcessFileWithParamNotWritableSizedFileFileIsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0555); // r-xr-xr-x

        $this->assertEmpty($this->callMethod('processFile', array($filename)));

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ testProcessFileWithParamSizedFileFileIsEmpty
    /**
     * Process a file
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testProcessFileWithParamSizedFileFileIsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?' . '>');

        $this->assertEmpty($this->callMethod('processFile', array($filename)));

        unlink($filename);
    }
    // }}}
    // }}}

    // {{{ saveOutout
    // {{{ testSaveOutput
    /**
     * testSaveOutput
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testSaveOutput()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}
    // }}}

    // {{{ getByteCode
    // {{{ testGetByteCodeWithParamNullFileIsInvalid
    /**
     * Get the bytecode
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCodeWithParamNullFileIsInvalid()
    {
        try {
            $this->callMethod('getByteCode', array(null));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `` is invalid\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }
    // }}}

    // {{{ testGetByteCodeWithParamEmptyStringFileIsInvalid
    /**
     * Get the bytecode
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCodeWithParamEmptyStringFileIsInvalid()
    {
        try {
            $this->callMethod('getByteCode', array(''));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `` is invalid\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }
    // }}}

    // {{{ testGetByteCodeWithParamSpacedStringFileIsInvalid
    /**
     * Get the bytecode
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCodeWithParamSpacedStringFileIsInvalid()
    {
        try {
            $this->callMethod('getByteCode', array(' '));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file ` ` is invalid\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }
    // }}}

    // {{{ testGetByteCodeWithParamFileNotExistsFileIsInvalid
    /**
     * Get the bytecode
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCodeWithParamFileNotExistsFileIsInvalid()
    {
        try {
            $this->callMethod('getByteCode', array('a'));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp('/^The file `a` is invalid\.$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }
    }
    // }}}

    // {{{ testGetByteCodeWithParamEmptyFileFileIsEmpty
    /**
     * Get the bytecode
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCodeWithParamEmptyFileFileIsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        try {
            $this->callMethod('getByteCode', array($filename));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp(
                '/^The file `.+\/test_[a-zA-Z0-9]+` is empty\.$/',
                $e->getMessage()
            );

            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        unlink($filename);
    }
    // }}}

    // {{{ testGetByteCodeWithParamSizedFileFileIsNotReadable
    /**
     * Get the bytecode
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCodeWithParamSizedFileFileIsNotReadable()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0333); // -wx-wx-wx

        try {
            $this->callMethod('getByteCode', array($filename));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp(
                '/^The file `.+\/test_[a-zA-Z0-9]+` is not readable\.$/',
                $e->getMessage()
            );

            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ testGetByteCodeWithParamSizedFileFileIsEmpty
    /**
     * Get the bytecode
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCodeWithParamSizedFileFileIsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555); // r-xr-xr-x

        try {
            $this->callMethod('getByteCode', array($filename));
            $this->assertTrue(false, "The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp(
                '/^The file `.+\/test_[a-zA-Z0-9]+` is empty\.$/',
                $e->getMessage()
            );

            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ testGetByteCodeWithParamSizedFileFileIsNotValid
    /**
     * Get the bytecode
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCodeWithParamSizedFileFileIsNotValid()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?' . '>');

        $bytecode = $this->callMethod('getByteCode', array($filename));

        $this->assertRegExp('/bcompiler v/', $bytecode);

        unlink($filename);
    }
    // }}}
    // }}}

    // {{{ cleanSource
    // {{{ testCleanSource
    /**
     * testCleanSource
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCleanSource()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}
    // }}}

    // {{{ expandPathsToFiles
    // {{{ testExpandPathsToFilesWithParamEmptyStringAreEquals
    /**
     * testExpandPathsToFilesWithParamEmptyStringAreEquals
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testExpandPathsToFilesWithParamEmptyStringAreEquals()
    {
        $value = $this->callMethod('expandPathsToFiles', array(''));
        $this->assertEquals(array(), $value);
    }
    // }}}

    // {{{ testExpandPathsToFilesWithParamNullAreEquals
    /**
     * testExpandPathsToFilesWithParamNullAreEquals
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testExpandPathsToFilesWithParamNullAreEquals()
    {
        $value = $this->callMethod('expandPathsToFiles', array(null));
        $this->assertEquals(array(), $value);
    }
    // }}}

    // {{{ testExpandPathsToFilesWithParamFakeAreEquals
    /**
     * testExpandPathsToFilesWithParamFakeAreEquals
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testExpandPathsToFilesWithParamFakeAreEquals()
    {
        $value = $this->callMethod('expandPathsToFiles', array('a'));
        $this->assertEquals(array(), $value);
    }
    // }}}

    // {{{ testExpandPathsToFilesWithParamSpacedStringAreEquals
    /**
     * testExpandPathsToFilesWithParamSpacedStringAreEquals
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testExpandPathsToFilesWithParamSpacedStringAreEquals()
    {
        $value = $this->callMethod('expandPathsToFiles', array(' '));
        $this->assertEquals(array(), $value);
    }
    // }}}

    // {{{ testExpandPathsToFilesWithParamEmptyArrayAreEquals
    /**
     * testExpandPathsToFilesWithParamEmptyArrayAreEquals
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testExpandPathsToFilesWithParamEmptyArrayAreEquals()
    {
        $value = $this->callMethod('expandPathsToFiles', array(array()));
        $this->assertEquals(array(), $value);
    }
    // }}}

    // {{{ testExpandPathsToFilesWithParamArrayAreEquals
    /**
     * testExpandPathsToFilesWithParamArrayAreEquals
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testExpandPathsToFilesWithParamArrayAreEquals()
    {
        $value = $this->callMethod('expandPathsToFiles', array(array('a')));
        $this->assertEquals(array(), $value);
    }
    // }}}

    // {{{ testExpandPathsToFilesWithParamArrayAreEquals_2
    /**
     * testExpandPathsToFilesWithParamArrayAreEquals
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testExpandPathsToFilesWithParamArrayAreEquals_2()
    {
        $dirname = realpath(__DIR__ . '/../');

        $files = $this->callMethod('expandPathsToFiles', array(array(__DIR__)));
        sort($files);
        $files = preg_grep('#/tests/test_.+$|\.swp$#', $files, PREG_GREP_INVERT);
        $files = array_merge($files);
        foreach ($files as $i => $file) {
            $files[$i] = str_replace(realpath("$dirname/../../"), "", $file);
        }

        $realfiles = array(
            '/src/cli/tests/Bonzai_CLI_Test.php',
            '/src/cli/tests/Bonzai_Controller_Test.php',
            '/src/cli/tests/Bonzai_Encoder_Test.php',
            '/src/cli/tests/Bonzai_Exception_Test.php',
            '/src/cli/tests/Bonzai_Registry_Test.php',
            '/src/cli/tests/Bonzai_Task_Test.php',
            '/src/cli/tests/Bonzai_Utils_Help_Test.php',
            '/src/cli/tests/Bonzai_Utils_Options_Test.php',
            '/src/cli/tests/Bonzai_Utils_Test.php',
            '/src/cli/tests/CliSuite.php',
        );

        $this->assertEquals($realfiles, $files);
    }
    // }}}

    // {{{ testExpandPathsToFilesWithParamUnreadableAreEquals
    /**
     * testExpandPathsToFilesWithParamUnreadableAreEquals
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testExpandPathsToFilesWithParamUnreadableAreEquals()
    {
        $dirname = realpath(__DIR__ . '/../');

        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx
        file_put_contents("$dirname/file.php", "test");
        mkdir("$dirname/$dirname", 0222); // -w--w--w-

        $files = $this->callMethod('expandPathsToFiles', array(array($dirname)));
        sort($files);

        $realfiles = array(
            getcwd() . '/' . $dirname . '/file.php'
        );

        $this->assertEquals($realfiles, $files);

        chmod("$dirname/$dirname", 0777); // rwxrwxrwx
        chmod($dirname, 0777); // rwxrwxrwx
        unlink("$dirname/file.php");
        rmdir("$dirname/$dirname");
        rmdir($dirname);
    }
    // }}}
    // }}}
}
