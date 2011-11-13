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
class Bonzai_Utils_Test extends Bonzai_TestCase
{
    // {{{ renameFile
    // {{{ test__renameFile
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__renameFile()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}
    // }}}

    // {{{ rScanDir
    // {{{ test__rScanDir__WithParams_Null_Null__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_Null_Null__ThrowException()
    {
        $value = null;
        Bonzai_Utils::rScanDir(null, $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Null_EmptyString__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_Null_EmptyString__ThrowException()
    {
        $value = '';
        Bonzai_Utils::rScanDir(null, $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Null_SpacedString__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_Null_SpacedString__ThrowException()
    {
        $value = ' ';
        Bonzai_Utils::rScanDir(null, $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Null_EmptyArray__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_Null_EmptyArray__ThrowException()
    {
        $value = array();
        Bonzai_Utils::rScanDir(null, $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Null_Array__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_Null_Array__ThrowException()
    {
        $value = array('a');
        Bonzai_Utils::rScanDir(null, $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_EmptyString_Null__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_EmptyString_Null__ThrowException()
    {
        $value = null;
        Bonzai_Utils::rScanDir('', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_EmptyString_EmptyString__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_EmptyString_EmptyString__ThrowException()
    {
        $value = '';
        Bonzai_Utils::rScanDir('', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_EmptyString_SpacedString__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_EmptyString_SpacedString__ThrowException()
    {
        $value = ' ';
        Bonzai_Utils::rScanDir('', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_EmptyString_EmptyArray__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_EmptyString_EmptyArray__ThrowException()
    {
        $value = array();
        Bonzai_Utils::rScanDir('', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_EmptyString_Array__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_EmptyString_Array__ThrowException()
    {
        $value = array('a');
        Bonzai_Utils::rScanDir('', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_SpacedString_Null__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_SpacedString_Null__ThrowException()
    {
        $value = null;
        Bonzai_Utils::rScanDir(' ', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_SpacedString_EmptyString__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_SpacedString_EmptyString__ThrowException()
    {
        $value = '';
        Bonzai_Utils::rScanDir(' ', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_SpacedString_SpacedString__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_SpacedString_SpacedString__ThrowException()
    {
        $value = ' ';
        Bonzai_Utils::rScanDir(' ', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_SpacedString_EmptyArray__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_SpacedString_EmptyArray__ThrowException()
    {
        $value = array();
        Bonzai_Utils::rScanDir(' ', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_SpacedString_Array__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_SpacedString_Array__ThrowException()
    {
        $value = array('a');
        Bonzai_Utils::rScanDir(' ', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Fake_Null__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_Fake_Null__ThrowException()
    {
        $value = null;
        Bonzai_Utils::rScanDir('a', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Fake_EmptyString__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_Fake_EmptyString__ThrowException()
    {
        $value = '';
        Bonzai_Utils::rScanDir('a', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Fake_SpacedString__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_Fake_SpacedString__ThrowException()
    {
        $value = ' ';
        Bonzai_Utils::rScanDir('a', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Fake_EmptyArray__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_Fake_EmptyArray__ThrowException()
    {
        $value = array();
        Bonzai_Utils::rScanDir('a', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Fake_Array__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__rScanDir__WithParams_Fake_Array__ThrowException()
    {
        $value = array('a');
        Bonzai_Utils::rScanDir('a', $value);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_NotReadable_Null__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_NotReadable_Null__ThrowException()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222); // -w--w--w-

        try {
            $value = null;
            Bonzai_Utils::rScanDir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_NotReadable_EmptyString__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_NotReadable_EmptyString__ThrowException()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222); // -w--w--w-

        try {
            $value = '';
            Bonzai_Utils::rScanDir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_NotReadable_SpacedString__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_NotReadable_SpacedString__ThrowException()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222); // -w--w--w-

        try {
            $value = ' ';
            Bonzai_Utils::rScanDir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_NotReadable_EmptyArray__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_NotReadable_EmptyArray__ThrowException()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222); // -w--w--w-

        try {
            $value = array();
            Bonzai_Utils::rScanDir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_NotReadable_Array__ThrowException
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_NotReadable_Array__ThrowException()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222); // -w--w--w-

        try {
            $value = array('a');
            Bonzai_Utils::rScanDir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_NotWritable_Null__IsEmpty
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_NotWritable_Null__IsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = null;
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_NotWritable_EmptyString__IsEmpty
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_NotWritable_EmptyString__IsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = '';
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_NotWritable_SpacedString__IsEmpty
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_NotWritable_SpacedString__IsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = ' ';
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_NotWritable_EmptyArray__IsEmpty
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_NotWritable_EmptyArray__IsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = array();
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_NotWritable_Array__AreEquals
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_NotWritable_Array__AreEquals()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = array('a');
        $this->assertEquals(array('a'), Bonzai_Utils::rScanDir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Writable_Null__IsEmpty
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_Writable_Null__IsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = null;
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Writable_EmptyString__IsEmpty
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_Writable_EmptyString__IsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = '';
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Writable_SpacedString__IsEmpty
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_Writable_SpacedString__IsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = ' ';
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Writable_EmptyArray__IsEmpty
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_Writable_EmptyArray__IsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = array();
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir__WithParams_Writable_Array__AreEquals
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir__WithParams_Writable_Array__AreEquals()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = array('a');
        $this->assertEquals(array('a'), Bonzai_Utils::rScanDir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir_ComplexCompare__AreEquals
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir_ComplexCompare__AreEquals()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $dirname2 = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir("$dirname/$dirname2", 0222); // -w--w--w-

        $this->assertEquals(array("$dirname/$dirname2/"), Bonzai_Utils::rScanDir($dirname));

        chmod("$dirname/$dirname2", 0777);
        rmdir("$dirname/$dirname2");
        rmdir($dirname);
    }
    // }}}

    // {{{ test__rScanDir_CurrentDirectories__AreEquals
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function test__rScanDir_CurrentDirectories__AreEquals()
    {
        $dirname = realpath(__DIR__ . '/../');

        $files = Bonzai_Utils::rScanDir($dirname);
        sort($files);
        $files = array_merge(preg_grep('#/tests/test_.+$|\.swp$#', $files, PREG_GREP_INVERT));
        foreach($files as $i => $file) {
            $files[$i] = str_replace(realpath("$dirname/../../"), "", $file);
        }

        $realfiles = array(
            '/src/cli/bonzai-cli',
            '/src/cli/libs/',
            '/src/cli/libs/Controller/',
            '/src/cli/libs/Controller/Controller.php',
            '/src/cli/libs/Encoder/',
            '/src/cli/libs/Encoder/Encoder.php',
            '/src/cli/libs/Exception/',
            '/src/cli/libs/Exception/Exception.php',
            '/src/cli/libs/Registry/',
            '/src/cli/libs/Registry/Registry.php',
            '/src/cli/libs/Task/',
            '/src/cli/libs/Task/Task.php',
            '/src/cli/libs/Tests/',
            '/src/cli/libs/Tests/TestCase.php',
            '/src/cli/libs/Utils/',
            '/src/cli/libs/Utils/Help.php',
            '/src/cli/libs/Utils/Options.php',
            '/src/cli/libs/Utils/Utils.php',
            '/src/cli/tests/',
            '/src/cli/tests/Bonzai_CLI_Test.php',
            '/src/cli/tests/Bonzai_Controller_Test.php',
            '/src/cli/tests/Bonzai_Encoder_Test.php',
            '/src/cli/tests/Bonzai_Exception_Test.php',
            '/src/cli/tests/Bonzai_Registry_Test.php',
            '/src/cli/tests/Bonzai_Task_Test.php',
            '/src/cli/tests/Bonzai_Utils_Help_Test.php',
            '/src/cli/tests/Bonzai_Utils_Options_Test.php',
            '/src/cli/tests/Bonzai_Utils_Test.php',
            '/src/cli/tests/cliSuite.php',
        );

        $this->assertEquals($realfiles, $files);
    }
    // }}}
    // }}}

    // {{{ getFileContent
    // {{{ test__getFileContent_ParamIsNull_ReturnsNull
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__getFileContent_ParamIsNull_ReturnsNull()
    {
        $this->assertNull(Bonzai_Utils::getFileContent(null));
    }
    // }}}

    // {{{ test__getFileContent_ParamIsEmptyString_ReturnsNull
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__getFileContent_ParamIsEmptyString_ReturnsNull()
    {
        $this->assertNull(Bonzai_Utils::getFileContent(''));
    }
    // }}}

    // {{{ test__getFileContent_ParamIsSpacedString_ReturnsNull
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__getFileContent_ParamIsSpacedString_ReturnsNull()
    {
        $this->assertNull(Bonzai_Utils::getFileContent(' '));
    }
    // }}}

    // {{{ test__getFileContent__WithParams_Fake__ThrowException
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__getFileContent__WithParams_Fake__ThrowException()
    {
        $this->assertEmpty(Bonzai_Utils::getFileContent('a'));
    }
    // }}}

    // {{{ test__getFileContent__WithParams_NotReadable__ThrowException
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     */
    public function test__getFileContent__WithParams_NotReadable__ThrowException()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0333); // -wx-wx-wx

        try {
            Bonzai_Utils::getFileContent($filename);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ test__getFileContent__WithParams_NotWritable__IsEmpty
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     */
    public function test__getFileContent__WithParams_NotWritable__IsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555); // r-xr-xr-x

        $this->assertEmpty(Bonzai_Utils::getFileContent($filename));

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ test__getFileContent__WithParam_Temp
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     */
    public function test__getFileContent__WithParam_Temp()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::getFileContent($filename);

        unlink($filename);
    }
    // }}}
    // }}}

    // {{{ putFileContent
    // {{{ test__putFileContent__WithParams_Null_Null__ThrowException
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__putFileContent__WithParams_Null_Null__ThrowException()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(null, null));
    }
    // }}}

    // {{{ test__putFileContent__WithParams_Null_EmptyString__ThrowException
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__putFileContent__WithParams_Null_EmptyString__ThrowException()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(null, ''));
    }
    // }}}

    // {{{ test__putFileContent__WithParams_Null_SpacedString__ThrowException
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__putFileContent__WithParams_Null_SpacedString__ThrowException()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(null, ' '));
    }
    // }}}

    // {{{ test__putFileContent__WithParams_Null_Fake__ThrowException
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__putFileContent__WithParams_Null_Fake__ThrowException()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(null, 'a'));
    }
    // }}}

    // {{{ test__putFileContent__WithParams_EmptyString_Null__ThrowException
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__putFileContent__WithParams_EmptyString_Null__ThrowException()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent('', null));
    }
    // }}}

    // {{{ test__putFileContent__WithParams_EmptyString_EmptyString__ThrowException
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__putFileContent__WithParams_EmptyString_EmptyString__ThrowException()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent('', ''));
    }
    // }}}

    // {{{ test__putFileContent__WithParams_EmptyString_SpacedString__ThrowException
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__putFileContent__WithParams_EmptyString_SpacedString__ThrowException()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent('', ' '));
    }
    // }}}

    // {{{ test__putFileContent__WithParams_EmptyString_Fake__ThrowException
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__putFileContent__WithParams_EmptyString_Fake__ThrowException()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent('', 'a'));
    }
    // }}}

    // {{{ test__putFileContent__WithParams_SpacedString_Null__ThrowException
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__putFileContent__WithParams_SpacedString_Null__ThrowException()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(' ', null));
    }
    // }}}

    // {{{ test__putFileContent__WithParams_SpacedString_EmptyString__AreEquals
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__putFileContent__WithParams_SpacedString_EmptyString__AreEquals()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent(' ', ''));
    }
    // }}}

    // {{{ test__putFileContent__WithParams_SpacedString_SpacedString__AreEquals
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__putFileContent__WithParams_SpacedString_SpacedString__AreEquals()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent(' ', ' '));
    }
    // }}}

    // {{{ test__putFileContent__WithParams_SpacedString_Fake__AreEquals
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function test__putFileContent__WithParams_SpacedString_Fake__AreEquals()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent(' ', 'a'));
    }
    // }}}

    // {{{ test__putFileContent__WithParams_Fake_Null__AreEquals
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_Fake_Null__AreEquals()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent('a', null));

        unlink('a');
    }
    // }}}

    // {{{ test__putFileContent__WithParams_Fake_EmptyString__AreEquals
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_Fake_EmptyString__AreEquals()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent('a', ''));

        unlink('a');
    }
    // }}}

    // {{{ test__putFileContent__WithParams_Fake_SpacedString__AreEquals
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_Fake_SpacedString__AreEquals()
    {
        $this->assertEquals(1, Bonzai_Utils::putFileContent('a', ' '));

        unlink('a');
    }
    // }}}

    // {{{ test__putFileContent__WithParams_Fake_Fake__AreEquals
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_Fake_Fake__AreEquals()
    {
        $this->assertEquals(1, Bonzai_Utils::putFileContent('a', 'a'));

        unlink('a');
    }
    // }}}

    // {{{ test__putFileContent__WithParams_Temp_Null__IsEmpty
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_Temp_Null__IsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, null);
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ test__putFileContent__WithParams_Temp_EmptyString__IsEmpty
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_Temp_EmptyString__IsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, '');
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ test__putFileContent__WithParams_Temp_SpacedString__AreEquals
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_Temp_SpacedString__AreEquals()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, ' ');
        $this->assertEquals(' ', file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ test__putFileContent__WithParams_Temp_String__AreEquals
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_Temp_String__AreEquals()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, 'a');
        $this->assertEquals('a', file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ test__putFileContent__WithParams_NotReadable_Null__IsEmpty
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_NotReadable_Null__IsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0333); // -wx-wx-wx

        Bonzai_Utils::putFileContent($filename, null);

        chmod($filename, 0777); // rwxrwxrwx
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ test__putFileContent__WithParams_NotReadable_EmptyString__IsEmpty
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_NotReadable_EmptyString__IsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0333); // -wx-wx-wx

        Bonzai_Utils::putFileContent($filename, '');

        chmod($filename, 0777); // rwxrwxrwx
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ test__putFileContent__WithParams_NotReadable_SpacedString__AreEquals
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_NotReadable_SpacedString__AreEquals()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0333); // -wx-wx-wx

        Bonzai_Utils::putFileContent($filename, ' ');

        chmod($filename, 0777); // rwxrwxrwx
        $this->assertEquals(' ', file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ test__putFileContent__WithParams_NotReadable_String__AreEquals
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_NotReadable_String__AreEquals()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0333); // -wx-wx-wx

        Bonzai_Utils::putFileContent($filename, 'a');

        chmod($filename, 0777); // rwxrwxrwx
        $this->assertEquals('a', file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ test__putFileContent__WithParams_NotWritable_Null__ThrowException
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_NotWritable_Null__ThrowException()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555); // r-xr-xr-x

        try {
            Bonzai_Utils::putFileContent($filename, null);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ test__putFileContent__WithParams_NotWritable_EmptyString__ThrowException
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_NotWritable_EmptyString__ThrowException()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555); // r-xr-xr-x

        try {
            Bonzai_Utils::putFileContent($filename, '');
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ test__putFileContent__WithParams_NotWritable_SpacedString__ThrowException
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_NotWritable_SpacedString__ThrowException()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555); // r-xr-xr-x

        try {
            Bonzai_Utils::putFileContent($filename, ' ');
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ test__putFileContent__WithParams_NotWritable_String__ThrowException
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function test__putFileContent__WithParams_NotWritable_String__ThrowException()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555); // r-xr-xr-x

        try {
            Bonzai_Utils::putFileContent($filename, 'a');
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}
    // }}}

    // {{{ checkFileValidity
    // {{{ test___CheckFileValidity
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__checkFileValidity()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}
    // }}}

    // {{{ info
    // {{{ test__info__JustCoverage
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__info__JustCoverage()
    {
        $this->object->info();
    }
    // }}}
    // }}}

    // {{{ message
    // {{{ test__message
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__message()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}
    // }}}

    // {{{ warn
    // {{{ test__warn__JustCoverage
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__warn__JustCoverage()
    {
        $this->object->warn();
    }
    // }}}
    // }}}

    // {{{ error
    // {{{ test__error__JustCoverage
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function test__error__JustCoverage()
    {
        $this->object->error();
    }
    // }}}
    // }}}
}
