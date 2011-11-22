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
 * @category   Optimization_&_Security
 * @package    Bonzai
 * @subpackage Tests
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version    Release: 0.1
 * @link       http://www.bonzai-project.org
 **/

require_once __DIR__ . '/../../src/libs/Tests/TestCase.php';
require_once __DIR__ . '/../../src/libs/Exception/Exception.php';
require_once __DIR__ . '/../../src/libs/Utils/Utils.php';

Bonzai_Utils::$silenced = true;

/**
 * Bonzai_Utils_Test
 *
 * @category   Optimization_&_Security
 * @package    Bonzai
 * @subpackage Tests
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version    Release: 0.1
 * @link       http://www.bonzai-project.org
 **/
class Bonzai_Utils_UtilsTest extends Bonzai_TestCase
{
    // {{{ renameFile
    // {{{ testRenameFileParamEmptyStringThrowException
    /**
     * testRenameFileParamEmptyStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRenameFileParamEmptyStringThrowException()
    {
        Bonzai_Utils::renameFile("");
    }
    // }}}

    // {{{ testRenameFileParamSpacedStringThrowException
    /**
     * testRenameFileParamSpacedStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRenameFileParamSpacedStringThrowException()
    {
        Bonzai_Utils::renameFile(" ");
    }
    // }}}

    // {{{ testRenameFileParamNullThrowException
    /**
     * testRenameFileParamNullThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRenameFileParamNullThrowException()
    {
        Bonzai_Utils::renameFile(null);
    }
    // }}}

    // {{{ testRenameFileParamEmptyArrayThrowException
    /**
     * testRenameFileParamEmptyArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRenameFileParamEmptyArrayThrowException()
    {
        Bonzai_Utils::renameFile(array());
    }
    // }}}

    // {{{ testRenameFileParamArrayThrowException
    /**
     * testRenameFileParamArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRenameFileParamArrayThrowException()
    {
        Bonzai_Utils::renameFile(array('a'));
    }
    // }}}

    // {{{ testRenameFileParamFakeThrowException
    /**
     * testRenameFileParamFakeThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRenameFileParamFakeThrowException()
    {
        Bonzai_Utils::renameFile('a');
    }
    // }}}

    // {{{ testRenameFileParamExistentFileIsRenamed
    /**
     * testRenameFileParamExistentFileIsRenamed
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRenameFileParamExistentFileIsRenamed()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'a');

        Bonzai_Utils::renameFile($filename);

        $this->assertFileExists("$filename.orig");
        $this->assertFileNotExists($filename);

        unlink("$filename.orig");
    }
    // }}}
    // }}}

    // {{{ rScanDir
    // {{{ testRScanDirWithParamsNullNullThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsNullNullThrowException()
    {
        $value = null;
        Bonzai_Utils::rScanDir(null, $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsNullEmptyStringThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsNullEmptyStringThrowException()
    {
        $value = '';
        Bonzai_Utils::rScanDir(null, $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsNullSpacedStringThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsNullSpacedStringThrowException()
    {
        $value = ' ';
        Bonzai_Utils::rScanDir(null, $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsNullEmptyArrayThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsNullEmptyArrayThrowException()
    {
        $value = array();
        Bonzai_Utils::rScanDir(null, $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsNullArrayThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsNullArrayThrowException()
    {
        $value = array('a');
        Bonzai_Utils::rScanDir(null, $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsEmptyStringNullThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsEmptyStringNullThrowException()
    {
        $value = null;
        Bonzai_Utils::rScanDir('', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsEmptyStringEmptyStringThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsEmptyStringEmptyStringThrowException()
    {
        $value = '';
        Bonzai_Utils::rScanDir('', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsEmptyStringSpacedStringThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsEmptyStringSpacedStringThrowException()
    {
        $value = ' ';
        Bonzai_Utils::rScanDir('', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsEmptyStringEmptyArrayThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsEmptyStringEmptyArrayThrowException()
    {
        $value = array();
        Bonzai_Utils::rScanDir('', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsEmptyStringArrayThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsEmptyStringArrayThrowException()
    {
        $value = array('a');
        Bonzai_Utils::rScanDir('', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsSpacedStringNullThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsSpacedStringNullThrowException()
    {
        $value = null;
        Bonzai_Utils::rScanDir(' ', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsSpacedStringEmptyStringThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsSpacedStringEmptyStringThrowException()
    {
        $value = '';
        Bonzai_Utils::rScanDir(' ', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsSpacedStringSpacedStringThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsSpacedStringSpacedStringThrowException()
    {
        $value = ' ';
        Bonzai_Utils::rScanDir(' ', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsSpacedStringEmptyArrayThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsSpacedStringEmptyArrayThrowException()
    {
        $value = array();
        Bonzai_Utils::rScanDir(' ', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsSpacedStringArrayThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsSpacedStringArrayThrowException()
    {
        $value = array('a');
        Bonzai_Utils::rScanDir(' ', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsFakeNullThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsFakeNullThrowException()
    {
        $value = null;
        Bonzai_Utils::rScanDir('a', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsFakeEmptyStringThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsFakeEmptyStringThrowException()
    {
        $value = '';
        Bonzai_Utils::rScanDir('a', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsFakeSpacedStringThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsFakeSpacedStringThrowException()
    {
        $value = ' ';
        Bonzai_Utils::rScanDir('a', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsFakeEmptyArrayThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsFakeEmptyArrayThrowException()
    {
        $value = array();
        Bonzai_Utils::rScanDir('a', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsFakeArrayThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRScanDirWithParamsFakeArrayThrowException()
    {
        $value = array('a');
        Bonzai_Utils::rScanDir('a', $value);
    }
    // }}}

    // {{{ testRScanDirWithParamsNotReadableNullThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsNotReadableNullThrowException()
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

    // {{{ testRScanDirWithParamsNotReadableEmptyStringThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsNotReadableEmptyStringThrowException()
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

    // {{{ testRScanDirWithParamsNotReadableSpacedStringThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsNotReadableSpacedStringThrowException()
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

    // {{{ testRScanDirWithParamsNotReadableEmptyArrayThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsNotReadableEmptyArrayThrowException()
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

    // {{{ testRScanDirWithParamsNotReadableArrayThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsNotReadableArrayThrowException()
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

    // {{{ testRScanDirWithParamsNotWritableNullIsEmpty
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsNotWritableNullIsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = null;
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRScanDirWithParamsNotWritableEmptyStringIsEmpty
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsNotWritableEmptyStringIsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = '';
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRScanDirWithParamsNotWritableSpacedStringIsEmpty
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsNotWritableSpacedStringIsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = ' ';
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRScanDirWithParamsNotWritableEmptyArrayIsEmpty
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsNotWritableEmptyArrayIsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = array();
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRScanDirWithParamsNotWritableArrayAreEquals
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsNotWritableArrayAreEquals()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = array('a');
        $this->assertEquals(array('a'), Bonzai_Utils::rScanDir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRScanDirWithParamsWritableNullIsEmpty
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsWritableNullIsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = null;
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRScanDirWithParamsWritableEmptyStringIsEmpty
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsWritableEmptyStringIsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = '';
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRScanDirWithParamsWritableSpacedStringIsEmpty
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsWritableSpacedStringIsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = ' ';
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRScanDirWithParamsWritableEmptyArrayIsEmpty
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsWritableEmptyArrayIsEmpty()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = array();
        $this->assertEmpty(Bonzai_Utils::rScanDir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRScanDirWithParamsWritableArrayAreEquals
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirWithParamsWritableArrayAreEquals()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = array('a');
        $this->assertEquals(array('a'), Bonzai_Utils::rScanDir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRScanDirComplexCompareAreEquals
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirComplexCompareAreEquals()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $dirname2 = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir("$dirname/$dirname2", 0222); // -w--w--w-

        $value = Bonzai_Utils::rScanDir($dirname);
        $this->assertEquals(array("$dirname/$dirname2/"), $value);

        chmod("$dirname/$dirname2", 0777);
        rmdir("$dirname/$dirname2");
        rmdir($dirname);
    }
    // }}}

    // {{{ testRScanDirCurrentDirectoriesAreEquals
    /**
     * Return the all directories & files into a directory
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRScanDirCurrentDirectoriesAreEquals()
    {
        $dirname = realpath(__DIR__ . '/../../');

        $files = Bonzai_Utils::rScanDir($dirname);
        sort($files);
        $files = preg_grep('#/test_.+$|\.swp$|\.git#', $files, PREG_GREP_INVERT);
        $files = array_merge($files);
        foreach($files as $i => $file) {
            $files[$i] = str_replace(realpath("$dirname/"), "", $file);
        }

        $realfiles = array(
            '/CHANGELOG',
            '/GPL-LICENSE',
            '/MIT-LICENSE',
            '/README',
            '/TODO',
            '/bin/',
            '/bin/build.sh',
            '/bin/release.sh',
            '/build.xml',
            '/build/',
            '/build/phpmd.xml',
            '/docs/',
            '/src/',
            '/src/bonzai-cli',
            '/src/libs/',
            '/src/libs/Controller/',
            '/src/libs/Controller/Controller.php',
            '/src/libs/Encoder/',
            '/src/libs/Encoder/Encoder.php',
            '/src/libs/Exception/',
            '/src/libs/Exception/Exception.php',
            '/src/libs/Registry/',
            '/src/libs/Registry/Registry.php',
            '/src/libs/Task/',
            '/src/libs/Task/Task.php',
            '/src/libs/Tests/',
            '/src/libs/Tests/TestCase.php',
            '/src/libs/Utils/',
            '/src/libs/Utils/Help.php',
            '/src/libs/Utils/Options.php',
            '/src/libs/Utils/Utils.php',
            '/tests/',
            '/tests/Controller/',
            '/tests/Controller/ControllerTest.php',
            '/tests/Encoder/',
            '/tests/Encoder/EncoderTest.php',
            '/tests/Exception/',
            '/tests/Exception/ExceptionTest.php',
            '/tests/Registry/',
            '/tests/Registry/RegistryTest.php',
            '/tests/Task/',
            '/tests/Task/TaskTest.php',
            '/tests/Test.php',
            '/tests/Test.xml',
            '/tests/Utils/',
            '/tests/Utils/HelpTest.php',
            '/tests/Utils/OptionsTest.php',
            '/tests/Utils/UtilsTest.php'
        );

        $this->assertEquals($realfiles, $files);
    }
    // }}}
    // }}}

    // {{{ getFileContent
    // {{{ testGetFileContentParamIsNullReturnsNull
    /**
     * Get the file's content
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContentParamIsNullReturnsNull()
    {
        $this->assertNull(Bonzai_Utils::getFileContent(null));
    }
    // }}}

    // {{{ testGetFileContentParamIsEmptyStringReturnsNull
    /**
     * Get the file's content
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContentParamIsEmptyStringReturnsNull()
    {
        $this->assertNull(Bonzai_Utils::getFileContent(''));
    }
    // }}}

    // {{{ testGetFileContentParamIsSpacedStringReturnsNull
    /**
     * Get the file's content
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContentParamIsSpacedStringReturnsNull()
    {
        $this->assertNull(Bonzai_Utils::getFileContent(' '));
    }
    // }}}

    // {{{ testGetFileContentWithParamsFakeThrowException
    /**
     * Get the file's content
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContentWithParamsFakeThrowException()
    {
        $this->assertEmpty(Bonzai_Utils::getFileContent('a'));
    }
    // }}}

    // {{{ testGetFileContentWithParamsNotReadableThrowException
    /**
     * Get the file's content
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileContentWithParamsNotReadableThrowException()
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

    // {{{ testGetFileContentWithParamsNotWritableIsEmpty
    /**
     * Get the file's content
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileContentWithParamsNotWritableIsEmpty()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555); // r-xr-xr-x

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

    // {{{ testGetFileContentWithParamTemp
    /**
     * Get the file's content
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileContentWithParamTemp()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        try {
            Bonzai_Utils::getFileContent($filename);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        unlink($filename);
    }
    // }}}
    // }}}

    // {{{ checkFileValidity
    // {{{ testCheckFileValidityWithParamsEmptyStringEmptyStringThrowException
    /**
     * testCheckFileValidityWithParamsEmptyStringEmptyStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyStringEmptyStringThrowException()
    {
        Bonzai_Utils::checkFileValidity('', '');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyStringSpacedStringThrowException
    /**
     * testCheckFileValidityWithParamsEmptyStringSpacedStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyStringSpacedStringThrowException()
    {
        Bonzai_Utils::checkFileValidity('', ' ');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyStringFakeThrowException
    /**
     * testCheckFileValidityWithParamsEmptyStringFakeThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyStringFakeThrowException()
    {
        Bonzai_Utils::checkFileValidity('', 'a');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyStringNullThrowException
    /**
     * testCheckFileValidityWithParamsEmptyStringNullThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyStringNullThrowException()
    {
        Bonzai_Utils::checkFileValidity('', null);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyStringEmptyArrayThrowException
    /**
     * testCheckFileValidityWithParamsEmptyStringEmptyArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyStringEmptyArrayThrowException()
    {
        Bonzai_Utils::checkFileValidity('', array());
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyStringArrayThrowException
    /**
     * testCheckFileValidityWithParamsEmptyStringArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyStringArrayThrowException()
    {
        Bonzai_Utils::checkFileValidity('', array('a'));
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyStringTrueThrowException
    /**
     * testCheckFileValidityWithParamsEmptyStringTrueThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyStringTrueThrowException()
    {
        Bonzai_Utils::checkFileValidity('', true);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyStringFalseThrowException
    /**
     * testCheckFileValidityWithParamsEmptyStringFalseThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyStringFalseThrowException()
    {
        Bonzai_Utils::checkFileValidity('', false);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsSpacedStringEmptyStringThrowException
    /**
     * testCheckFileValidityWithParamsSpacedStringEmptyStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsSpacedStringEmptyStringThrowException()
    {
        Bonzai_Utils::checkFileValidity(' ', '');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsSpacedStringSpacedStringThrowException
    /**
     * testCheckFileValidityWithParamsSpacedStringSpacedStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsSpacedStringSpacedStringThrowException()
    {
        Bonzai_Utils::checkFileValidity(' ', ' ');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsSpacedStringFakeThrowException
    /**
     * testCheckFileValidityWithParamsSpacedStringFakeThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsSpacedStringFakeThrowException()
    {
        Bonzai_Utils::checkFileValidity(' ', 'a');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsSpacedStringNullThrowException
    /**
     * testCheckFileValidityWithParamsSpacedStringNullThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsSpacedStringNullThrowException()
    {
        Bonzai_Utils::checkFileValidity(' ', null);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsSpacedStringEmptyArrayThrowException
    /**
     * testCheckFileValidityWithParamsSpacedStringEmptyArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsSpacedStringEmptyArrayThrowException()
    {
        Bonzai_Utils::checkFileValidity(' ', array());
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsSpacedStringArrayThrowException
    /**
     * testCheckFileValidityWithParamsSpacedStringArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsSpacedStringArrayThrowException()
    {
        Bonzai_Utils::checkFileValidity(' ', array('a'));
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsSpacedStringTrueThrowException
    /**
     * testCheckFileValidityWithParamsSpacedStringTrueThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsSpacedStringTrueThrowException()
    {
        Bonzai_Utils::checkFileValidity(' ', true);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsSpacedStringFalseThrowException
    /**
     * testCheckFileValidityWithParamsSpacedStringFalseThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsSpacedStringFalseThrowException()
    {
        Bonzai_Utils::checkFileValidity(' ', false);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsFakeEmptyStringThrowException
    /**
     * testCheckFileValidityWithParamsFakeEmptyStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsFakeEmptyStringThrowException()
    {
        Bonzai_Utils::checkFileValidity('a', '');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsFakeSpacedStringThrowException
    /**
     * testCheckFileValidityWithParamsFakeSpacedStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsFakeSpacedStringThrowException()
    {
        Bonzai_Utils::checkFileValidity('a', ' ');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsFakeFakeThrowException
    /**
     * testCheckFileValidityWithParamsFakeFakeThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsFakeFakeThrowException()
    {
        Bonzai_Utils::checkFileValidity('a', 'a');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsFakeNullThrowException
    /**
     * testCheckFileValidityWithParamsFakeNullThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsFakeNullThrowException()
    {
        Bonzai_Utils::checkFileValidity('a', null);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsFakeEmptyArrayThrowException
    /**
     * testCheckFileValidityWithParamsFakeEmptyArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsFakeEmptyArrayThrowException()
    {
        Bonzai_Utils::checkFileValidity('a', array());
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsFakeArrayThrowException
    /**
     * testCheckFileValidityWithParamsFakeArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsFakeArrayThrowException()
    {
        Bonzai_Utils::checkFileValidity('a', array('a'));
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsFakeTrueThrowException
    /**
     * testCheckFileValidityWithParamsFakeTrueThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsFakeTrueThrowException()
    {
        Bonzai_Utils::checkFileValidity('a', true);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsFakeFalseThrowException
    /**
     * testCheckFileValidityWithParamsFakeFalseThrowException
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileValidityWithParamsFakeFalseThrowException()
    {
        Bonzai_Utils::checkFileValidity('a', false);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsNullEmptyStringThrowException
    /**
     * testCheckFileValidityWithParamsNullEmptyStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsNullEmptyStringThrowException()
    {
        Bonzai_Utils::checkFileValidity(null, '');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsNullSpacedStringThrowException
    /**
     * testCheckFileValidityWithParamsNullSpacedStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsNullSpacedStringThrowException()
    {
        Bonzai_Utils::checkFileValidity(null, ' ');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsNullFakeThrowException
    /**
     * testCheckFileValidityWithParamsNullFakeThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsNullFakeThrowException()
    {
        Bonzai_Utils::checkFileValidity(null, 'a');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsNullNullThrowException
    /**
     * testCheckFileValidityWithParamsNullNullThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsNullNullThrowException()
    {
        Bonzai_Utils::checkFileValidity(null, null);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsNullEmptyArrayThrowException
    /**
     * testCheckFileValidityWithParamsNullEmptyArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsNullEmptyArrayThrowException()
    {
        Bonzai_Utils::checkFileValidity(null, array());
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsNullArrayThrowException
    /**
     * testCheckFileValidityWithParamsNullArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsNullArrayThrowException()
    {
        Bonzai_Utils::checkFileValidity(null, array('a'));
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsNullTrueThrowException
    /**
     * testCheckFileValidityWithParamsNullTrueThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsNullTrueThrowException()
    {
        Bonzai_Utils::checkFileValidity(null, true);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsNullFalseThrowException
    /**
     * testCheckFileValidityWithParamsNullFalseThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsNullFalseThrowException()
    {
        Bonzai_Utils::checkFileValidity(null, false);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyArrayEmptyStringThrowException
    /**
     * testCheckFileValidityWithParamsEmptyArrayEmptyStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyArrayEmptyStringThrowException()
    {
        Bonzai_Utils::checkFileValidity(array(), '');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyArraySpacedStringThrowException
    /**
     * testCheckFileValidityWithParamsEmptyArraySpacedStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyArraySpacedStringThrowException()
    {
        Bonzai_Utils::checkFileValidity(array(), ' ');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyArrayFakeThrowException
    /**
     * testCheckFileValidityWithParamsEmptyArrayFakeThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyArrayFakeThrowException()
    {
        Bonzai_Utils::checkFileValidity(array(), 'a');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyArrayNullThrowException
    /**
     * testCheckFileValidityWithParamsEmptyArrayNullThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyArrayNullThrowException()
    {
        Bonzai_Utils::checkFileValidity(array(), null);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyArrayEmptyArrayThrowException
    /**
     * testCheckFileValidityWithParamsEmptyArrayEmptyArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyArrayEmptyArrayThrowException()
    {
        Bonzai_Utils::checkFileValidity(array(), array());
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyArrayArrayThrowException
    /**
     * testCheckFileValidityWithParamsEmptyArrayArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyArrayArrayThrowException()
    {
        Bonzai_Utils::checkFileValidity(array(), array('a'));
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyArrayTrueThrowException
    /**
     * testCheckFileValidityWithParamsEmptyArrayTrueThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyArrayTrueThrowException()
    {
        Bonzai_Utils::checkFileValidity(array(), true);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsEmptyArrayFalseThrowException
    /**
     * testCheckFileValidityWithParamsEmptyArrayFalseThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsEmptyArrayFalseThrowException()
    {
        Bonzai_Utils::checkFileValidity(array(), false);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsArrayEmptyStringThrowException
    /**
     * testCheckFileValidityWithParamsArrayEmptyStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsArrayEmptyStringThrowException()
    {
        Bonzai_Utils::checkFileValidity(array('a'), '');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsArraySpacedStringThrowException
    /**
     * testCheckFileValidityWithParamsArraySpacedStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsArraySpacedStringThrowException()
    {
        Bonzai_Utils::checkFileValidity(array('a'), ' ');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsArrayFakeThrowException
    /**
     * testCheckFileValidityWithParamsArrayFakeThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsArrayFakeThrowException()
    {
        Bonzai_Utils::checkFileValidity(array('a'), 'a');
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsArrayNullThrowException
    /**
     * testCheckFileValidityWithParamsArrayNullThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsArrayNullThrowException()
    {
        Bonzai_Utils::checkFileValidity(array('a'), null);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsArrayEmptyArrayThrowException
    /**
     * testCheckFileValidityWithParamsArrayEmptyArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsArrayEmptyArrayThrowException()
    {
        Bonzai_Utils::checkFileValidity(array('a'), array());
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsArrayArrayThrowException
    /**
     * testCheckFileValidityWithParamsArrayArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsArrayArrayThrowException()
    {
        Bonzai_Utils::checkFileValidity(array('a'), array('a'));
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsArrayTrueThrowException
    /**
     * testCheckFileValidityWithParamsArrayTrueThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsArrayTrueThrowException()
    {
        Bonzai_Utils::checkFileValidity(array('a'), true);
    }
    // }}}

    // {{{ testCheckFileValidityWithParamsArrayFalseThrowException
    /**
     * testCheckFileValidityWithParamsArrayFalseThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityWithParamsArrayFalseThrowException()
    {
        Bonzai_Utils::checkFileValidity(array('a'), false);
    }
    // }}}

    // {{{ testCheckFileValidityParamEmptyString
    /**
     * testCheckFileValidityParamEmptyString
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileValidityParamEmptyString()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'a');

        Bonzai_Utils::checkFileValidity($filename);

        unlink($filename);
    }
    // }}}

    // {{{ testCheckFileValidityParamSpacedString
    /**
     * testCheckFileValidityParamSpacedString
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileValidityParamSpacedString()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'a');

        Bonzai_Utils::checkFileValidity($filename);

        unlink($filename);
    }
    // }}}

    // {{{ testCheckFileValidityParamFake
    /**
     * testCheckFileValidityParamFake
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileValidityParamFake()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'a');

        Bonzai_Utils::checkFileValidity($filename);

        unlink($filename);
    }
    // }}}

    // {{{ testCheckFileValidityParamNull
    /**
     * testCheckFileValidityParamNull
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileValidityParamNull()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'a');

        Bonzai_Utils::checkFileValidity($filename);

        unlink($filename);
    }
    // }}}

    // {{{ testCheckFileValidityParamEmptyArray
    /**
     * testCheckFileValidityParamEmptyArray
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileValidityParamEmptyArray()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'a');

        Bonzai_Utils::checkFileValidity($filename);

        unlink($filename);
    }
    // }}}

    // {{{ testCheckFileValidityParamArray
    /**
     * testCheckFileValidityParamArray
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileValidityParamArray()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'a');

        Bonzai_Utils::checkFileValidity($filename);

        unlink($filename);
    }
    // }}}

    // {{{ testCheckFileValidityParamCurrentFile
    /**
     * testCheckFileValidityParamCurrentFile
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testCheckFileValidityParamCurrentFile()
    {
        Bonzai_Utils::checkFileValidity(__FILE__);
    }
    // }}}
    // }}}

    // {{{ info
    // {{{ testInfoJustCoverage
    /**
     * testInfoJustCoverage
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testInfoJustCoverage()
    {
        $this->object->info();
    }
    // }}}
    // }}}

    // {{{ message
// {{{ testMessageInfoEmptyStringNull
/**
 * testMessageInfoEmptyStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoEmptyStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '', null));
}
// }}}

// {{{ testMessageInfoEmptyStringEmptyString
/**
 * testMessageInfoEmptyStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoEmptyStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '', ''));
}
// }}}

// {{{ testMessageInfoEmptyStringSpacedString
/**
 * testMessageInfoEmptyStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoEmptyStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '', ' '));
}
// }}}

// {{{ testMessageInfoEmptyStringFake
/**
 * testMessageInfoEmptyStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoEmptyStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '', 'a'));
}
// }}}

// {{{ testMessageInfoEmptyStringEmptyArray
/**
 * testMessageInfoEmptyStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoEmptyStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '', array()));
}
// }}}

// {{{ testMessageInfoEmptyStringArray
/**
 * testMessageInfoEmptyStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoEmptyStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '', array('a')));
}
// }}}

// {{{ testMessageInfoEmptyStringOne
/**
 * testMessageInfoEmptyStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoEmptyStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '', 1));
}
// }}}

// {{{ testMessageInfoEmptyStringZero
/**
 * testMessageInfoEmptyStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoEmptyStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '', 0));
}
// }}}

// {{{ testMessageInfoNullNullThrowException
/**
 * testMessageInfoNullNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoNullNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', null, null));
}
// }}}

// {{{ testMessageInfoNullEmptyStringThrowException
/**
 * testMessageInfoNullEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoNullEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', null, ''));
}
// }}}

// {{{ testMessageInfoNullSpacedStringThrowException
/**
 * testMessageInfoNullSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoNullSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', null, ' '));
}
// }}}

// {{{ testMessageInfoNullFakeThrowException
/**
 * testMessageInfoNullFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoNullFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', null, 'a'));
}
// }}}

// {{{ testMessageInfoNullEmptyArrayThrowException
/**
 * testMessageInfoNullEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoNullEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', null, array()));
}
// }}}

// {{{ testMessageInfoNullArrayThrowException
/**
 * testMessageInfoNullArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoNullArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', null, array('a')));
}
// }}}

// {{{ testMessageInfoNullOneThrowException
/**
 * testMessageInfoNullOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoNullOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', null, 1));
}
// }}}

// {{{ testMessageInfoNullZeroThrowException
/**
 * testMessageInfoNullZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoNullZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', null, 0));
}
// }}}

// {{{ testMessageInfoSpacedStringNull
/**
 * testMessageInfoSpacedStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoSpacedStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', ' ', null));
}
// }}}

// {{{ testMessageInfoSpacedStringEmptyString
/**
 * testMessageInfoSpacedStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoSpacedStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', ' ', ''));
}
// }}}

// {{{ testMessageInfoSpacedStringSpacedString
/**
 * testMessageInfoSpacedStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoSpacedStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', ' ', ' '));
}
// }}}

// {{{ testMessageInfoSpacedStringFake
/**
 * testMessageInfoSpacedStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoSpacedStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', ' ', 'a'));
}
// }}}

// {{{ testMessageInfoSpacedStringEmptyArray
/**
 * testMessageInfoSpacedStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoSpacedStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', ' ', array()));
}
// }}}

// {{{ testMessageInfoSpacedStringArray
/**
 * testMessageInfoSpacedStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoSpacedStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', ' ', array('a')));
}
// }}}

// {{{ testMessageInfoSpacedStringOne
/**
 * testMessageInfoSpacedStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoSpacedStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', ' ', 1));
}
// }}}

// {{{ testMessageInfoSpacedStringZero
/**
 * testMessageInfoSpacedStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoSpacedStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', ' ', 0));
}
// }}}

// {{{ testMessageInfoFakeNull
/**
 * testMessageInfoFakeNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoFakeNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', 'a', null));
}
// }}}

// {{{ testMessageInfoFakeEmptyString
/**
 * testMessageInfoFakeEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoFakeEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', 'a', ''));
}
// }}}

// {{{ testMessageInfoFakeSpacedString
/**
 * testMessageInfoFakeSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoFakeSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', 'a', ' '));
}
// }}}

// {{{ testMessageInfoFakeFake
/**
 * testMessageInfoFakeFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoFakeFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', 'a', 'a'));
}
// }}}

// {{{ testMessageInfoFakeEmptyArray
/**
 * testMessageInfoFakeEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoFakeEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', 'a', array()));
}
// }}}

// {{{ testMessageInfoFakeArray
/**
 * testMessageInfoFakeArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoFakeArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', 'a', array('a')));
}
// }}}

// {{{ testMessageInfoFakeOne
/**
 * testMessageInfoFakeOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoFakeOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', 'a', 1));
}
// }}}

// {{{ testMessageInfoFakeZero
/**
 * testMessageInfoFakeZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoFakeZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', 'a', 0));
}
// }}}

// {{{ testMessageInfoEmptyArrayNullThrowException
/**
 * testMessageInfoEmptyArrayNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoEmptyArrayNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', array(), null));
}
// }}}

// {{{ testMessageInfoEmptyArrayEmptyStringThrowException
/**
 * testMessageInfoEmptyArrayEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoEmptyArrayEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', array(), ''));
}
// }}}

// {{{ testMessageInfoEmptyArraySpacedStringThrowException
/**
 * testMessageInfoEmptyArraySpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoEmptyArraySpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', array(), ' '));
}
// }}}

// {{{ testMessageInfoEmptyArrayFakeThrowException
/**
 * testMessageInfoEmptyArrayFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoEmptyArrayFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', array(), 'a'));
}
// }}}

// {{{ testMessageInfoEmptyArrayEmptyArrayThrowException
/**
 * testMessageInfoEmptyArrayEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoEmptyArrayEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', array(), array()));
}
// }}}

// {{{ testMessageInfoEmptyArrayArrayThrowException
/**
 * testMessageInfoEmptyArrayArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoEmptyArrayArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', array(), array('a')));
}
// }}}

// {{{ testMessageInfoEmptyArrayOneThrowException
/**
 * testMessageInfoEmptyArrayOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoEmptyArrayOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', array(), 1));
}
// }}}

// {{{ testMessageInfoEmptyArrayZeroThrowException
/**
 * testMessageInfoEmptyArrayZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoEmptyArrayZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', array(), 0));
}
// }}}

// {{{ testMessageInfoStringSprintfNull
/**
 * testMessageInfoStringSprintfNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoStringSprintfNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s', null));
}
// }}}

// {{{ testMessageInfoStringSprintfEmptyString
/**
 * testMessageInfoStringSprintfEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoStringSprintfEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s', ''));
}
// }}}

// {{{ testMessageInfoStringSprintfSpacedString
/**
 * testMessageInfoStringSprintfSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoStringSprintfSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s', ' '));
}
// }}}

// {{{ testMessageInfoStringSprintfFake
/**
 * testMessageInfoStringSprintfFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoStringSprintfFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s', 'a'));
}
// }}}

// {{{ testMessageInfoStringSprintfEmptyArray
/**
 * testMessageInfoStringSprintfEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoStringSprintfEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s', array()));
}
// }}}

// {{{ testMessageInfoStringSprintfArray
/**
 * testMessageInfoStringSprintfArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoStringSprintfArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s', array('a')));
}
// }}}

// {{{ testMessageInfoStringSprintfOne
/**
 * testMessageInfoStringSprintfOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoStringSprintfOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s', 1));
}
// }}}

// {{{ testMessageInfoStringSprintfZero
/**
 * testMessageInfoStringSprintfZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageInfoStringSprintfZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s', 0));
}
// }}}

// {{{ testMessageInfoMultipleSprintfNullThrowException
/**
 * testMessageInfoMultipleSprintfNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoMultipleSprintfNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s %d', null));
}
// }}}

// {{{ testMessageInfoMultipleSprintfEmptyStringThrowException
/**
 * testMessageInfoMultipleSprintfEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoMultipleSprintfEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s %d', ''));
}
// }}}

// {{{ testMessageInfoMultipleSprintfSpacedStringThrowException
/**
 * testMessageInfoMultipleSprintfSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoMultipleSprintfSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s %d', ' '));
}
// }}}

// {{{ testMessageInfoMultipleSprintfFakeThrowException
/**
 * testMessageInfoMultipleSprintfFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoMultipleSprintfFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s %d', 'a'));
}
// }}}

// {{{ testMessageInfoMultipleSprintfEmptyArrayThrowException
/**
 * testMessageInfoMultipleSprintfEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoMultipleSprintfEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s %d', array()));
}
// }}}

// {{{ testMessageInfoMultipleSprintfArrayThrowException
/**
 * testMessageInfoMultipleSprintfArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoMultipleSprintfArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s %d', array('a')));
}
// }}}

// {{{ testMessageInfoMultipleSprintfOneThrowException
/**
 * testMessageInfoMultipleSprintfOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoMultipleSprintfOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s %d', 1));
}
// }}}

// {{{ testMessageInfoMultipleSprintfZeroThrowException
/**
 * testMessageInfoMultipleSprintfZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageInfoMultipleSprintfZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('info', '%s %d', 0));
}
// }}}

// {{{ testMessageWarnEmptyStringNull
/**
 * testMessageWarnEmptyStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnEmptyStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '', null));
}
// }}}

// {{{ testMessageWarnEmptyStringEmptyString
/**
 * testMessageWarnEmptyStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnEmptyStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '', ''));
}
// }}}

// {{{ testMessageWarnEmptyStringSpacedString
/**
 * testMessageWarnEmptyStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnEmptyStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '', ' '));
}
// }}}

// {{{ testMessageWarnEmptyStringFake
/**
 * testMessageWarnEmptyStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnEmptyStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '', 'a'));
}
// }}}

// {{{ testMessageWarnEmptyStringEmptyArray
/**
 * testMessageWarnEmptyStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnEmptyStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '', array()));
}
// }}}

// {{{ testMessageWarnEmptyStringArray
/**
 * testMessageWarnEmptyStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnEmptyStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '', array('a')));
}
// }}}

// {{{ testMessageWarnEmptyStringOne
/**
 * testMessageWarnEmptyStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnEmptyStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '', 1));
}
// }}}

// {{{ testMessageWarnEmptyStringZero
/**
 * testMessageWarnEmptyStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnEmptyStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '', 0));
}
// }}}

// {{{ testMessageWarnNullNullThrowException
/**
 * testMessageWarnNullNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnNullNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', null, null));
}
// }}}

// {{{ testMessageWarnNullEmptyStringThrowException
/**
 * testMessageWarnNullEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnNullEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', null, ''));
}
// }}}

// {{{ testMessageWarnNullSpacedStringThrowException
/**
 * testMessageWarnNullSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnNullSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', null, ' '));
}
// }}}

// {{{ testMessageWarnNullFakeThrowException
/**
 * testMessageWarnNullFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnNullFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', null, 'a'));
}
// }}}

// {{{ testMessageWarnNullEmptyArrayThrowException
/**
 * testMessageWarnNullEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnNullEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', null, array()));
}
// }}}

// {{{ testMessageWarnNullArrayThrowException
/**
 * testMessageWarnNullArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnNullArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', null, array('a')));
}
// }}}

// {{{ testMessageWarnNullOneThrowException
/**
 * testMessageWarnNullOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnNullOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', null, 1));
}
// }}}

// {{{ testMessageWarnNullZeroThrowException
/**
 * testMessageWarnNullZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnNullZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', null, 0));
}
// }}}

// {{{ testMessageWarnSpacedStringNull
/**
 * testMessageWarnSpacedStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnSpacedStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', ' ', null));
}
// }}}

// {{{ testMessageWarnSpacedStringEmptyString
/**
 * testMessageWarnSpacedStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnSpacedStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', ' ', ''));
}
// }}}

// {{{ testMessageWarnSpacedStringSpacedString
/**
 * testMessageWarnSpacedStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnSpacedStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', ' ', ' '));
}
// }}}

// {{{ testMessageWarnSpacedStringFake
/**
 * testMessageWarnSpacedStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnSpacedStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', ' ', 'a'));
}
// }}}

// {{{ testMessageWarnSpacedStringEmptyArray
/**
 * testMessageWarnSpacedStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnSpacedStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', ' ', array()));
}
// }}}

// {{{ testMessageWarnSpacedStringArray
/**
 * testMessageWarnSpacedStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnSpacedStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', ' ', array('a')));
}
// }}}

// {{{ testMessageWarnSpacedStringOne
/**
 * testMessageWarnSpacedStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnSpacedStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', ' ', 1));
}
// }}}

// {{{ testMessageWarnSpacedStringZero
/**
 * testMessageWarnSpacedStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnSpacedStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', ' ', 0));
}
// }}}

// {{{ testMessageWarnFakeNull
/**
 * testMessageWarnFakeNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnFakeNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', 'a', null));
}
// }}}

// {{{ testMessageWarnFakeEmptyString
/**
 * testMessageWarnFakeEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnFakeEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', 'a', ''));
}
// }}}

// {{{ testMessageWarnFakeSpacedString
/**
 * testMessageWarnFakeSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnFakeSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', 'a', ' '));
}
// }}}

// {{{ testMessageWarnFakeFake
/**
 * testMessageWarnFakeFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnFakeFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', 'a', 'a'));
}
// }}}

// {{{ testMessageWarnFakeEmptyArray
/**
 * testMessageWarnFakeEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnFakeEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', 'a', array()));
}
// }}}

// {{{ testMessageWarnFakeArray
/**
 * testMessageWarnFakeArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnFakeArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', 'a', array('a')));
}
// }}}

// {{{ testMessageWarnFakeOne
/**
 * testMessageWarnFakeOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnFakeOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', 'a', 1));
}
// }}}

// {{{ testMessageWarnFakeZero
/**
 * testMessageWarnFakeZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnFakeZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', 'a', 0));
}
// }}}

// {{{ testMessageWarnEmptyArrayNullThrowException
/**
 * testMessageWarnEmptyArrayNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnEmptyArrayNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', array(), null));
}
// }}}

// {{{ testMessageWarnEmptyArrayEmptyStringThrowException
/**
 * testMessageWarnEmptyArrayEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnEmptyArrayEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', array(), ''));
}
// }}}

// {{{ testMessageWarnEmptyArraySpacedStringThrowException
/**
 * testMessageWarnEmptyArraySpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnEmptyArraySpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', array(), ' '));
}
// }}}

// {{{ testMessageWarnEmptyArrayFakeThrowException
/**
 * testMessageWarnEmptyArrayFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnEmptyArrayFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', array(), 'a'));
}
// }}}

// {{{ testMessageWarnEmptyArrayEmptyArrayThrowException
/**
 * testMessageWarnEmptyArrayEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnEmptyArrayEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', array(), array()));
}
// }}}

// {{{ testMessageWarnEmptyArrayArrayThrowException
/**
 * testMessageWarnEmptyArrayArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnEmptyArrayArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', array(), array('a')));
}
// }}}

// {{{ testMessageWarnEmptyArrayOneThrowException
/**
 * testMessageWarnEmptyArrayOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnEmptyArrayOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', array(), 1));
}
// }}}

// {{{ testMessageWarnEmptyArrayZeroThrowException
/**
 * testMessageWarnEmptyArrayZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnEmptyArrayZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', array(), 0));
}
// }}}

// {{{ testMessageWarnStringSprintfNull
/**
 * testMessageWarnStringSprintfNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnStringSprintfNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s', null));
}
// }}}

// {{{ testMessageWarnStringSprintfEmptyString
/**
 * testMessageWarnStringSprintfEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnStringSprintfEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s', ''));
}
// }}}

// {{{ testMessageWarnStringSprintfSpacedString
/**
 * testMessageWarnStringSprintfSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnStringSprintfSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s', ' '));
}
// }}}

// {{{ testMessageWarnStringSprintfFake
/**
 * testMessageWarnStringSprintfFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnStringSprintfFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s', 'a'));
}
// }}}

// {{{ testMessageWarnStringSprintfEmptyArray
/**
 * testMessageWarnStringSprintfEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnStringSprintfEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s', array()));
}
// }}}

// {{{ testMessageWarnStringSprintfArray
/**
 * testMessageWarnStringSprintfArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnStringSprintfArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s', array('a')));
}
// }}}

// {{{ testMessageWarnStringSprintfOne
/**
 * testMessageWarnStringSprintfOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnStringSprintfOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s', 1));
}
// }}}

// {{{ testMessageWarnStringSprintfZero
/**
 * testMessageWarnStringSprintfZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageWarnStringSprintfZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s', 0));
}
// }}}

// {{{ testMessageWarnMultipleSprintfNullThrowException
/**
 * testMessageWarnMultipleSprintfNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnMultipleSprintfNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s %d', null));
}
// }}}

// {{{ testMessageWarnMultipleSprintfEmptyStringThrowException
/**
 * testMessageWarnMultipleSprintfEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnMultipleSprintfEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s %d', ''));
}
// }}}

// {{{ testMessageWarnMultipleSprintfSpacedStringThrowException
/**
 * testMessageWarnMultipleSprintfSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnMultipleSprintfSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s %d', ' '));
}
// }}}

// {{{ testMessageWarnMultipleSprintfFakeThrowException
/**
 * testMessageWarnMultipleSprintfFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnMultipleSprintfFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s %d', 'a'));
}
// }}}

// {{{ testMessageWarnMultipleSprintfEmptyArrayThrowException
/**
 * testMessageWarnMultipleSprintfEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnMultipleSprintfEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s %d', array()));
}
// }}}

// {{{ testMessageWarnMultipleSprintfArrayThrowException
/**
 * testMessageWarnMultipleSprintfArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnMultipleSprintfArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s %d', array('a')));
}
// }}}

// {{{ testMessageWarnMultipleSprintfOneThrowException
/**
 * testMessageWarnMultipleSprintfOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnMultipleSprintfOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s %d', 1));
}
// }}}

// {{{ testMessageWarnMultipleSprintfZeroThrowException
/**
 * testMessageWarnMultipleSprintfZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageWarnMultipleSprintfZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('warn', '%s %d', 0));
}
// }}}

// {{{ testMessageErrorEmptyStringNull
/**
 * testMessageErrorEmptyStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorEmptyStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '', null));
}
// }}}

// {{{ testMessageErrorEmptyStringEmptyString
/**
 * testMessageErrorEmptyStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorEmptyStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '', ''));
}
// }}}

// {{{ testMessageErrorEmptyStringSpacedString
/**
 * testMessageErrorEmptyStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorEmptyStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '', ' '));
}
// }}}

// {{{ testMessageErrorEmptyStringFake
/**
 * testMessageErrorEmptyStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorEmptyStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '', 'a'));
}
// }}}

// {{{ testMessageErrorEmptyStringEmptyArray
/**
 * testMessageErrorEmptyStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorEmptyStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '', array()));
}
// }}}

// {{{ testMessageErrorEmptyStringArray
/**
 * testMessageErrorEmptyStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorEmptyStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '', array('a')));
}
// }}}

// {{{ testMessageErrorEmptyStringOne
/**
 * testMessageErrorEmptyStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorEmptyStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '', 1));
}
// }}}

// {{{ testMessageErrorEmptyStringZero
/**
 * testMessageErrorEmptyStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorEmptyStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '', 0));
}
// }}}

// {{{ testMessageErrorNullNullThrowException
/**
 * testMessageErrorNullNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorNullNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', null, null));
}
// }}}

// {{{ testMessageErrorNullEmptyStringThrowException
/**
 * testMessageErrorNullEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorNullEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', null, ''));
}
// }}}

// {{{ testMessageErrorNullSpacedStringThrowException
/**
 * testMessageErrorNullSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorNullSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', null, ' '));
}
// }}}

// {{{ testMessageErrorNullFakeThrowException
/**
 * testMessageErrorNullFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorNullFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', null, 'a'));
}
// }}}

// {{{ testMessageErrorNullEmptyArrayThrowException
/**
 * testMessageErrorNullEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorNullEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', null, array()));
}
// }}}

// {{{ testMessageErrorNullArrayThrowException
/**
 * testMessageErrorNullArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorNullArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', null, array('a')));
}
// }}}

// {{{ testMessageErrorNullOneThrowException
/**
 * testMessageErrorNullOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorNullOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', null, 1));
}
// }}}

// {{{ testMessageErrorNullZeroThrowException
/**
 * testMessageErrorNullZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorNullZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', null, 0));
}
// }}}

// {{{ testMessageErrorSpacedStringNull
/**
 * testMessageErrorSpacedStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorSpacedStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', ' ', null));
}
// }}}

// {{{ testMessageErrorSpacedStringEmptyString
/**
 * testMessageErrorSpacedStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorSpacedStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', ' ', ''));
}
// }}}

// {{{ testMessageErrorSpacedStringSpacedString
/**
 * testMessageErrorSpacedStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorSpacedStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', ' ', ' '));
}
// }}}

// {{{ testMessageErrorSpacedStringFake
/**
 * testMessageErrorSpacedStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorSpacedStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', ' ', 'a'));
}
// }}}

// {{{ testMessageErrorSpacedStringEmptyArray
/**
 * testMessageErrorSpacedStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorSpacedStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', ' ', array()));
}
// }}}

// {{{ testMessageErrorSpacedStringArray
/**
 * testMessageErrorSpacedStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorSpacedStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', ' ', array('a')));
}
// }}}

// {{{ testMessageErrorSpacedStringOne
/**
 * testMessageErrorSpacedStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorSpacedStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', ' ', 1));
}
// }}}

// {{{ testMessageErrorSpacedStringZero
/**
 * testMessageErrorSpacedStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorSpacedStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', ' ', 0));
}
// }}}

// {{{ testMessageErrorFakeNull
/**
 * testMessageErrorFakeNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorFakeNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', 'a', null));
}
// }}}

// {{{ testMessageErrorFakeEmptyString
/**
 * testMessageErrorFakeEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorFakeEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', 'a', ''));
}
// }}}

// {{{ testMessageErrorFakeSpacedString
/**
 * testMessageErrorFakeSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorFakeSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', 'a', ' '));
}
// }}}

// {{{ testMessageErrorFakeFake
/**
 * testMessageErrorFakeFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorFakeFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', 'a', 'a'));
}
// }}}

// {{{ testMessageErrorFakeEmptyArray
/**
 * testMessageErrorFakeEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorFakeEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', 'a', array()));
}
// }}}

// {{{ testMessageErrorFakeArray
/**
 * testMessageErrorFakeArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorFakeArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', 'a', array('a')));
}
// }}}

// {{{ testMessageErrorFakeOne
/**
 * testMessageErrorFakeOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorFakeOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', 'a', 1));
}
// }}}

// {{{ testMessageErrorFakeZero
/**
 * testMessageErrorFakeZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorFakeZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', 'a', 0));
}
// }}}

// {{{ testMessageErrorEmptyArrayNullThrowException
/**
 * testMessageErrorEmptyArrayNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorEmptyArrayNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', array(), null));
}
// }}}

// {{{ testMessageErrorEmptyArrayEmptyStringThrowException
/**
 * testMessageErrorEmptyArrayEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorEmptyArrayEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', array(), ''));
}
// }}}

// {{{ testMessageErrorEmptyArraySpacedStringThrowException
/**
 * testMessageErrorEmptyArraySpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorEmptyArraySpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', array(), ' '));
}
// }}}

// {{{ testMessageErrorEmptyArrayFakeThrowException
/**
 * testMessageErrorEmptyArrayFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorEmptyArrayFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', array(), 'a'));
}
// }}}

// {{{ testMessageErrorEmptyArrayEmptyArrayThrowException
/**
 * testMessageErrorEmptyArrayEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorEmptyArrayEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', array(), array()));
}
// }}}

// {{{ testMessageErrorEmptyArrayArrayThrowException
/**
 * testMessageErrorEmptyArrayArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorEmptyArrayArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', array(), array('a')));
}
// }}}

// {{{ testMessageErrorEmptyArrayOneThrowException
/**
 * testMessageErrorEmptyArrayOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorEmptyArrayOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', array(), 1));
}
// }}}

// {{{ testMessageErrorEmptyArrayZeroThrowException
/**
 * testMessageErrorEmptyArrayZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorEmptyArrayZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', array(), 0));
}
// }}}

// {{{ testMessageErrorStringSprintfNull
/**
 * testMessageErrorStringSprintfNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorStringSprintfNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s', null));
}
// }}}

// {{{ testMessageErrorStringSprintfEmptyString
/**
 * testMessageErrorStringSprintfEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorStringSprintfEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s', ''));
}
// }}}

// {{{ testMessageErrorStringSprintfSpacedString
/**
 * testMessageErrorStringSprintfSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorStringSprintfSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s', ' '));
}
// }}}

// {{{ testMessageErrorStringSprintfFake
/**
 * testMessageErrorStringSprintfFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorStringSprintfFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s', 'a'));
}
// }}}

// {{{ testMessageErrorStringSprintfEmptyArray
/**
 * testMessageErrorStringSprintfEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorStringSprintfEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s', array()));
}
// }}}

// {{{ testMessageErrorStringSprintfArray
/**
 * testMessageErrorStringSprintfArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorStringSprintfArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s', array('a')));
}
// }}}

// {{{ testMessageErrorStringSprintfOne
/**
 * testMessageErrorStringSprintfOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorStringSprintfOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s', 1));
}
// }}}

// {{{ testMessageErrorStringSprintfZero
/**
 * testMessageErrorStringSprintfZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageErrorStringSprintfZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s', 0));
}
// }}}

// {{{ testMessageErrorMultipleSprintfNullThrowException
/**
 * testMessageErrorMultipleSprintfNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorMultipleSprintfNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s %d', null));
}
// }}}

// {{{ testMessageErrorMultipleSprintfEmptyStringThrowException
/**
 * testMessageErrorMultipleSprintfEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorMultipleSprintfEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s %d', ''));
}
// }}}

// {{{ testMessageErrorMultipleSprintfSpacedStringThrowException
/**
 * testMessageErrorMultipleSprintfSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorMultipleSprintfSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s %d', ' '));
}
// }}}

// {{{ testMessageErrorMultipleSprintfFakeThrowException
/**
 * testMessageErrorMultipleSprintfFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorMultipleSprintfFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s %d', 'a'));
}
// }}}

// {{{ testMessageErrorMultipleSprintfEmptyArrayThrowException
/**
 * testMessageErrorMultipleSprintfEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorMultipleSprintfEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s %d', array()));
}
// }}}

// {{{ testMessageErrorMultipleSprintfArrayThrowException
/**
 * testMessageErrorMultipleSprintfArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorMultipleSprintfArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s %d', array('a')));
}
// }}}

// {{{ testMessageErrorMultipleSprintfOneThrowException
/**
 * testMessageErrorMultipleSprintfOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorMultipleSprintfOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s %d', 1));
}
// }}}

// {{{ testMessageErrorMultipleSprintfZeroThrowException
/**
 * testMessageErrorMultipleSprintfZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageErrorMultipleSprintfZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('error', '%s %d', 0));
}
// }}}

// {{{ testMessageEmptyStringEmptyStringNull
/**
 * testMessageEmptyStringEmptyStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringEmptyStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '', null));
}
// }}}

// {{{ testMessageEmptyStringEmptyStringEmptyString
/**
 * testMessageEmptyStringEmptyStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringEmptyStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '', ''));
}
// }}}

// {{{ testMessageEmptyStringEmptyStringSpacedString
/**
 * testMessageEmptyStringEmptyStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringEmptyStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '', ' '));
}
// }}}

// {{{ testMessageEmptyStringEmptyStringFake
/**
 * testMessageEmptyStringEmptyStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringEmptyStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '', 'a'));
}
// }}}

// {{{ testMessageEmptyStringEmptyStringEmptyArray
/**
 * testMessageEmptyStringEmptyStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringEmptyStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '', array()));
}
// }}}

// {{{ testMessageEmptyStringEmptyStringArray
/**
 * testMessageEmptyStringEmptyStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringEmptyStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '', array('a')));
}
// }}}

// {{{ testMessageEmptyStringEmptyStringOne
/**
 * testMessageEmptyStringEmptyStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringEmptyStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '', 1));
}
// }}}

// {{{ testMessageEmptyStringEmptyStringZero
/**
 * testMessageEmptyStringEmptyStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringEmptyStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '', 0));
}
// }}}

// {{{ testMessageEmptyStringNullNullThrowException
/**
 * testMessageEmptyStringNullNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringNullNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', null, null));
}
// }}}

// {{{ testMessageEmptyStringNullEmptyStringThrowException
/**
 * testMessageEmptyStringNullEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringNullEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', null, ''));
}
// }}}

// {{{ testMessageEmptyStringNullSpacedStringThrowException
/**
 * testMessageEmptyStringNullSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringNullSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', null, ' '));
}
// }}}

// {{{ testMessageEmptyStringNullFakeThrowException
/**
 * testMessageEmptyStringNullFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringNullFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', null, 'a'));
}
// }}}

// {{{ testMessageEmptyStringNullEmptyArrayThrowException
/**
 * testMessageEmptyStringNullEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringNullEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', null, array()));
}
// }}}

// {{{ testMessageEmptyStringNullArrayThrowException
/**
 * testMessageEmptyStringNullArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringNullArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', null, array('a')));
}
// }}}

// {{{ testMessageEmptyStringNullOneThrowException
/**
 * testMessageEmptyStringNullOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringNullOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', null, 1));
}
// }}}

// {{{ testMessageEmptyStringNullZeroThrowException
/**
 * testMessageEmptyStringNullZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringNullZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', null, 0));
}
// }}}

// {{{ testMessageEmptyStringSpacedStringNull
/**
 * testMessageEmptyStringSpacedStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringSpacedStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', ' ', null));
}
// }}}

// {{{ testMessageEmptyStringSpacedStringEmptyString
/**
 * testMessageEmptyStringSpacedStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringSpacedStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', ' ', ''));
}
// }}}

// {{{ testMessageEmptyStringSpacedStringSpacedString
/**
 * testMessageEmptyStringSpacedStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringSpacedStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', ' ', ' '));
}
// }}}

// {{{ testMessageEmptyStringSpacedStringFake
/**
 * testMessageEmptyStringSpacedStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringSpacedStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', ' ', 'a'));
}
// }}}

// {{{ testMessageEmptyStringSpacedStringEmptyArray
/**
 * testMessageEmptyStringSpacedStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringSpacedStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', ' ', array()));
}
// }}}

// {{{ testMessageEmptyStringSpacedStringArray
/**
 * testMessageEmptyStringSpacedStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringSpacedStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', ' ', array('a')));
}
// }}}

// {{{ testMessageEmptyStringSpacedStringOne
/**
 * testMessageEmptyStringSpacedStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringSpacedStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', ' ', 1));
}
// }}}

// {{{ testMessageEmptyStringSpacedStringZero
/**
 * testMessageEmptyStringSpacedStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringSpacedStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', ' ', 0));
}
// }}}

// {{{ testMessageEmptyStringFakeNull
/**
 * testMessageEmptyStringFakeNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringFakeNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', 'a', null));
}
// }}}

// {{{ testMessageEmptyStringFakeEmptyString
/**
 * testMessageEmptyStringFakeEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringFakeEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', 'a', ''));
}
// }}}

// {{{ testMessageEmptyStringFakeSpacedString
/**
 * testMessageEmptyStringFakeSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringFakeSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', 'a', ' '));
}
// }}}

// {{{ testMessageEmptyStringFakeFake
/**
 * testMessageEmptyStringFakeFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringFakeFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', 'a', 'a'));
}
// }}}

// {{{ testMessageEmptyStringFakeEmptyArray
/**
 * testMessageEmptyStringFakeEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringFakeEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', 'a', array()));
}
// }}}

// {{{ testMessageEmptyStringFakeArray
/**
 * testMessageEmptyStringFakeArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringFakeArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', 'a', array('a')));
}
// }}}

// {{{ testMessageEmptyStringFakeOne
/**
 * testMessageEmptyStringFakeOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringFakeOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', 'a', 1));
}
// }}}

// {{{ testMessageEmptyStringFakeZero
/**
 * testMessageEmptyStringFakeZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringFakeZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', 'a', 0));
}
// }}}

// {{{ testMessageEmptyStringEmptyArrayNullThrowException
/**
 * testMessageEmptyStringEmptyArrayNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringEmptyArrayNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', array(), null));
}
// }}}

// {{{ testMessageEmptyStringEmptyArrayEmptyStringThrowException
/**
 * testMessageEmptyStringEmptyArrayEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringEmptyArrayEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', array(), ''));
}
// }}}

// {{{ testMessageEmptyStringEmptyArraySpacedStringThrowException
/**
 * testMessageEmptyStringEmptyArraySpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringEmptyArraySpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', array(), ' '));
}
// }}}

// {{{ testMessageEmptyStringEmptyArrayFakeThrowException
/**
 * testMessageEmptyStringEmptyArrayFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringEmptyArrayFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', array(), 'a'));
}
// }}}

// {{{ testMessageEmptyStringEmptyArrayEmptyArrayThrowException
/**
 * testMessageEmptyStringEmptyArrayEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringEmptyArrayEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', array(), array()));
}
// }}}

// {{{ testMessageEmptyStringEmptyArrayArrayThrowException
/**
 * testMessageEmptyStringEmptyArrayArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringEmptyArrayArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', array(), array('a')));
}
// }}}

// {{{ testMessageEmptyStringEmptyArrayOneThrowException
/**
 * testMessageEmptyStringEmptyArrayOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringEmptyArrayOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', array(), 1));
}
// }}}

// {{{ testMessageEmptyStringEmptyArrayZeroThrowException
/**
 * testMessageEmptyStringEmptyArrayZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringEmptyArrayZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', array(), 0));
}
// }}}

// {{{ testMessageEmptyStringStringSprintfNull
/**
 * testMessageEmptyStringStringSprintfNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringStringSprintfNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s', null));
}
// }}}

// {{{ testMessageEmptyStringStringSprintfEmptyString
/**
 * testMessageEmptyStringStringSprintfEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringStringSprintfEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s', ''));
}
// }}}

// {{{ testMessageEmptyStringStringSprintfSpacedString
/**
 * testMessageEmptyStringStringSprintfSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringStringSprintfSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s', ' '));
}
// }}}

// {{{ testMessageEmptyStringStringSprintfFake
/**
 * testMessageEmptyStringStringSprintfFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringStringSprintfFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s', 'a'));
}
// }}}

// {{{ testMessageEmptyStringStringSprintfEmptyArray
/**
 * testMessageEmptyStringStringSprintfEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringStringSprintfEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s', array()));
}
// }}}

// {{{ testMessageEmptyStringStringSprintfArray
/**
 * testMessageEmptyStringStringSprintfArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringStringSprintfArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s', array('a')));
}
// }}}

// {{{ testMessageEmptyStringStringSprintfOne
/**
 * testMessageEmptyStringStringSprintfOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringStringSprintfOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s', 1));
}
// }}}

// {{{ testMessageEmptyStringStringSprintfZero
/**
 * testMessageEmptyStringStringSprintfZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyStringStringSprintfZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s', 0));
}
// }}}

// {{{ testMessageEmptyStringMultipleSprintfNullThrowException
/**
 * testMessageEmptyStringMultipleSprintfNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringMultipleSprintfNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s %d', null));
}
// }}}

// {{{ testMessageEmptyStringMultipleSprintfEmptyStringThrowException
/**
 * testMessageEmptyStringMultipleSprintfEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringMultipleSprintfEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s %d', ''));
}
// }}}

// {{{ testMessageEmptyStringMultipleSprintfSpacedStringThrowException
/**
 * testMessageEmptyStringMultipleSprintfSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringMultipleSprintfSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s %d', ' '));
}
// }}}

// {{{ testMessageEmptyStringMultipleSprintfFakeThrowException
/**
 * testMessageEmptyStringMultipleSprintfFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringMultipleSprintfFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s %d', 'a'));
}
// }}}

// {{{ testMessageEmptyStringMultipleSprintfEmptyArrayThrowException
/**
 * testMessageEmptyStringMultipleSprintfEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringMultipleSprintfEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s %d', array()));
}
// }}}

// {{{ testMessageEmptyStringMultipleSprintfArrayThrowException
/**
 * testMessageEmptyStringMultipleSprintfArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringMultipleSprintfArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s %d', array('a')));
}
// }}}

// {{{ testMessageEmptyStringMultipleSprintfOneThrowException
/**
 * testMessageEmptyStringMultipleSprintfOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringMultipleSprintfOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s %d', 1));
}
// }}}

// {{{ testMessageEmptyStringMultipleSprintfZeroThrowException
/**
 * testMessageEmptyStringMultipleSprintfZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyStringMultipleSprintfZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('', '%s %d', 0));
}
// }}}

// {{{ testMessageSpacedStringEmptyStringNull
/**
 * testMessageSpacedStringEmptyStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringEmptyStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '', null));
}
// }}}

// {{{ testMessageSpacedStringEmptyStringEmptyString
/**
 * testMessageSpacedStringEmptyStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringEmptyStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '', ''));
}
// }}}

// {{{ testMessageSpacedStringEmptyStringSpacedString
/**
 * testMessageSpacedStringEmptyStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringEmptyStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '', ' '));
}
// }}}

// {{{ testMessageSpacedStringEmptyStringFake
/**
 * testMessageSpacedStringEmptyStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringEmptyStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '', 'a'));
}
// }}}

// {{{ testMessageSpacedStringEmptyStringEmptyArray
/**
 * testMessageSpacedStringEmptyStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringEmptyStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '', array()));
}
// }}}

// {{{ testMessageSpacedStringEmptyStringArray
/**
 * testMessageSpacedStringEmptyStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringEmptyStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '', array('a')));
}
// }}}

// {{{ testMessageSpacedStringEmptyStringOne
/**
 * testMessageSpacedStringEmptyStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringEmptyStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '', 1));
}
// }}}

// {{{ testMessageSpacedStringEmptyStringZero
/**
 * testMessageSpacedStringEmptyStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringEmptyStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '', 0));
}
// }}}

// {{{ testMessageSpacedStringNullNullThrowException
/**
 * testMessageSpacedStringNullNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringNullNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', null, null));
}
// }}}

// {{{ testMessageSpacedStringNullEmptyStringThrowException
/**
 * testMessageSpacedStringNullEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringNullEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', null, ''));
}
// }}}

// {{{ testMessageSpacedStringNullSpacedStringThrowException
/**
 * testMessageSpacedStringNullSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringNullSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', null, ' '));
}
// }}}

// {{{ testMessageSpacedStringNullFakeThrowException
/**
 * testMessageSpacedStringNullFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringNullFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', null, 'a'));
}
// }}}

// {{{ testMessageSpacedStringNullEmptyArrayThrowException
/**
 * testMessageSpacedStringNullEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringNullEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', null, array()));
}
// }}}

// {{{ testMessageSpacedStringNullArrayThrowException
/**
 * testMessageSpacedStringNullArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringNullArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', null, array('a')));
}
// }}}

// {{{ testMessageSpacedStringNullOneThrowException
/**
 * testMessageSpacedStringNullOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringNullOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', null, 1));
}
// }}}

// {{{ testMessageSpacedStringNullZeroThrowException
/**
 * testMessageSpacedStringNullZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringNullZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', null, 0));
}
// }}}

// {{{ testMessageSpacedStringSpacedStringNull
/**
 * testMessageSpacedStringSpacedStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringSpacedStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', ' ', null));
}
// }}}

// {{{ testMessageSpacedStringSpacedStringEmptyString
/**
 * testMessageSpacedStringSpacedStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringSpacedStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', ' ', ''));
}
// }}}

// {{{ testMessageSpacedStringSpacedStringSpacedString
/**
 * testMessageSpacedStringSpacedStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringSpacedStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', ' ', ' '));
}
// }}}

// {{{ testMessageSpacedStringSpacedStringFake
/**
 * testMessageSpacedStringSpacedStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringSpacedStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', ' ', 'a'));
}
// }}}

// {{{ testMessageSpacedStringSpacedStringEmptyArray
/**
 * testMessageSpacedStringSpacedStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringSpacedStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', ' ', array()));
}
// }}}

// {{{ testMessageSpacedStringSpacedStringArray
/**
 * testMessageSpacedStringSpacedStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringSpacedStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', ' ', array('a')));
}
// }}}

// {{{ testMessageSpacedStringSpacedStringOne
/**
 * testMessageSpacedStringSpacedStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringSpacedStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', ' ', 1));
}
// }}}

// {{{ testMessageSpacedStringSpacedStringZero
/**
 * testMessageSpacedStringSpacedStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringSpacedStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', ' ', 0));
}
// }}}

// {{{ testMessageSpacedStringFakeNull
/**
 * testMessageSpacedStringFakeNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringFakeNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', 'a', null));
}
// }}}

// {{{ testMessageSpacedStringFakeEmptyString
/**
 * testMessageSpacedStringFakeEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringFakeEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', 'a', ''));
}
// }}}

// {{{ testMessageSpacedStringFakeSpacedString
/**
 * testMessageSpacedStringFakeSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringFakeSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', 'a', ' '));
}
// }}}

// {{{ testMessageSpacedStringFakeFake
/**
 * testMessageSpacedStringFakeFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringFakeFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', 'a', 'a'));
}
// }}}

// {{{ testMessageSpacedStringFakeEmptyArray
/**
 * testMessageSpacedStringFakeEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringFakeEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', 'a', array()));
}
// }}}

// {{{ testMessageSpacedStringFakeArray
/**
 * testMessageSpacedStringFakeArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringFakeArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', 'a', array('a')));
}
// }}}

// {{{ testMessageSpacedStringFakeOne
/**
 * testMessageSpacedStringFakeOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringFakeOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', 'a', 1));
}
// }}}

// {{{ testMessageSpacedStringFakeZero
/**
 * testMessageSpacedStringFakeZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringFakeZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', 'a', 0));
}
// }}}

// {{{ testMessageSpacedStringEmptyArrayNullThrowException
/**
 * testMessageSpacedStringEmptyArrayNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringEmptyArrayNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', array(), null));
}
// }}}

// {{{ testMessageSpacedStringEmptyArrayEmptyStringThrowException
/**
 * testMessageSpacedStringEmptyArrayEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringEmptyArrayEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', array(), ''));
}
// }}}

// {{{ testMessageSpacedStringEmptyArraySpacedStringThrowException
/**
 * testMessageSpacedStringEmptyArraySpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringEmptyArraySpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', array(), ' '));
}
// }}}

// {{{ testMessageSpacedStringEmptyArrayFakeThrowException
/**
 * testMessageSpacedStringEmptyArrayFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringEmptyArrayFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', array(), 'a'));
}
// }}}

// {{{ testMessageSpacedStringEmptyArrayEmptyArrayThrowException
/**
 * testMessageSpacedStringEmptyArrayEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringEmptyArrayEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', array(), array()));
}
// }}}

// {{{ testMessageSpacedStringEmptyArrayArrayThrowException
/**
 * testMessageSpacedStringEmptyArrayArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringEmptyArrayArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', array(), array('a')));
}
// }}}

// {{{ testMessageSpacedStringEmptyArrayOneThrowException
/**
 * testMessageSpacedStringEmptyArrayOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringEmptyArrayOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', array(), 1));
}
// }}}

// {{{ testMessageSpacedStringEmptyArrayZeroThrowException
/**
 * testMessageSpacedStringEmptyArrayZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringEmptyArrayZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', array(), 0));
}
// }}}

// {{{ testMessageSpacedStringStringSprintfNull
/**
 * testMessageSpacedStringStringSprintfNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringStringSprintfNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s', null));
}
// }}}

// {{{ testMessageSpacedStringStringSprintfEmptyString
/**
 * testMessageSpacedStringStringSprintfEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringStringSprintfEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s', ''));
}
// }}}

// {{{ testMessageSpacedStringStringSprintfSpacedString
/**
 * testMessageSpacedStringStringSprintfSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringStringSprintfSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s', ' '));
}
// }}}

// {{{ testMessageSpacedStringStringSprintfFake
/**
 * testMessageSpacedStringStringSprintfFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringStringSprintfFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s', 'a'));
}
// }}}

// {{{ testMessageSpacedStringStringSprintfEmptyArray
/**
 * testMessageSpacedStringStringSprintfEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringStringSprintfEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s', array()));
}
// }}}

// {{{ testMessageSpacedStringStringSprintfArray
/**
 * testMessageSpacedStringStringSprintfArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringStringSprintfArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s', array('a')));
}
// }}}

// {{{ testMessageSpacedStringStringSprintfOne
/**
 * testMessageSpacedStringStringSprintfOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringStringSprintfOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s', 1));
}
// }}}

// {{{ testMessageSpacedStringStringSprintfZero
/**
 * testMessageSpacedStringStringSprintfZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageSpacedStringStringSprintfZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s', 0));
}
// }}}

// {{{ testMessageSpacedStringMultipleSprintfNullThrowException
/**
 * testMessageSpacedStringMultipleSprintfNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringMultipleSprintfNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s %d', null));
}
// }}}

// {{{ testMessageSpacedStringMultipleSprintfEmptyStringThrowException
/**
 * testMessageSpacedStringMultipleSprintfEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringMultipleSprintfEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s %d', ''));
}
// }}}

// {{{ testMessageSpacedStringMultipleSprintfSpacedStringThrowException
/**
 * testMessageSpacedStringMultipleSprintfSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringMultipleSprintfSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s %d', ' '));
}
// }}}

// {{{ testMessageSpacedStringMultipleSprintfFakeThrowException
/**
 * testMessageSpacedStringMultipleSprintfFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringMultipleSprintfFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s %d', 'a'));
}
// }}}

// {{{ testMessageSpacedStringMultipleSprintfEmptyArrayThrowException
/**
 * testMessageSpacedStringMultipleSprintfEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringMultipleSprintfEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s %d', array()));
}
// }}}

// {{{ testMessageSpacedStringMultipleSprintfArrayThrowException
/**
 * testMessageSpacedStringMultipleSprintfArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringMultipleSprintfArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s %d', array('a')));
}
// }}}

// {{{ testMessageSpacedStringMultipleSprintfOneThrowException
/**
 * testMessageSpacedStringMultipleSprintfOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringMultipleSprintfOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s %d', 1));
}
// }}}

// {{{ testMessageSpacedStringMultipleSprintfZeroThrowException
/**
 * testMessageSpacedStringMultipleSprintfZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageSpacedStringMultipleSprintfZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(' ', '%s %d', 0));
}
// }}}

// {{{ testMessageNullEmptyStringNull
/**
 * testMessageNullEmptyStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullEmptyStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '', null));
}
// }}}

// {{{ testMessageNullEmptyStringEmptyString
/**
 * testMessageNullEmptyStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullEmptyStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '', ''));
}
// }}}

// {{{ testMessageNullEmptyStringSpacedString
/**
 * testMessageNullEmptyStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullEmptyStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '', ' '));
}
// }}}

// {{{ testMessageNullEmptyStringFake
/**
 * testMessageNullEmptyStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullEmptyStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '', 'a'));
}
// }}}

// {{{ testMessageNullEmptyStringEmptyArray
/**
 * testMessageNullEmptyStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullEmptyStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '', array()));
}
// }}}

// {{{ testMessageNullEmptyStringArray
/**
 * testMessageNullEmptyStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullEmptyStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '', array('a')));
}
// }}}

// {{{ testMessageNullEmptyStringOne
/**
 * testMessageNullEmptyStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullEmptyStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '', 1));
}
// }}}

// {{{ testMessageNullEmptyStringZero
/**
 * testMessageNullEmptyStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullEmptyStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '', 0));
}
// }}}

// {{{ testMessageNullNullNullThrowException
/**
 * testMessageNullNullNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullNullNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, null, null));
}
// }}}

// {{{ testMessageNullNullEmptyStringThrowException
/**
 * testMessageNullNullEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullNullEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, null, ''));
}
// }}}

// {{{ testMessageNullNullSpacedStringThrowException
/**
 * testMessageNullNullSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullNullSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, null, ' '));
}
// }}}

// {{{ testMessageNullNullFakeThrowException
/**
 * testMessageNullNullFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullNullFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, null, 'a'));
}
// }}}

// {{{ testMessageNullNullEmptyArrayThrowException
/**
 * testMessageNullNullEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullNullEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, null, array()));
}
// }}}

// {{{ testMessageNullNullArrayThrowException
/**
 * testMessageNullNullArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullNullArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, null, array('a')));
}
// }}}

// {{{ testMessageNullNullOneThrowException
/**
 * testMessageNullNullOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullNullOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, null, 1));
}
// }}}

// {{{ testMessageNullNullZeroThrowException
/**
 * testMessageNullNullZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullNullZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, null, 0));
}
// }}}

// {{{ testMessageNullSpacedStringNull
/**
 * testMessageNullSpacedStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullSpacedStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, ' ', null));
}
// }}}

// {{{ testMessageNullSpacedStringEmptyString
/**
 * testMessageNullSpacedStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullSpacedStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, ' ', ''));
}
// }}}

// {{{ testMessageNullSpacedStringSpacedString
/**
 * testMessageNullSpacedStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullSpacedStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, ' ', ' '));
}
// }}}

// {{{ testMessageNullSpacedStringFake
/**
 * testMessageNullSpacedStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullSpacedStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, ' ', 'a'));
}
// }}}

// {{{ testMessageNullSpacedStringEmptyArray
/**
 * testMessageNullSpacedStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullSpacedStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, ' ', array()));
}
// }}}

// {{{ testMessageNullSpacedStringArray
/**
 * testMessageNullSpacedStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullSpacedStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, ' ', array('a')));
}
// }}}

// {{{ testMessageNullSpacedStringOne
/**
 * testMessageNullSpacedStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullSpacedStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, ' ', 1));
}
// }}}

// {{{ testMessageNullSpacedStringZero
/**
 * testMessageNullSpacedStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullSpacedStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, ' ', 0));
}
// }}}

// {{{ testMessageNullFakeNull
/**
 * testMessageNullFakeNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullFakeNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, 'a', null));
}
// }}}

// {{{ testMessageNullFakeEmptyString
/**
 * testMessageNullFakeEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullFakeEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, 'a', ''));
}
// }}}

// {{{ testMessageNullFakeSpacedString
/**
 * testMessageNullFakeSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullFakeSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, 'a', ' '));
}
// }}}

// {{{ testMessageNullFakeFake
/**
 * testMessageNullFakeFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullFakeFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, 'a', 'a'));
}
// }}}

// {{{ testMessageNullFakeEmptyArray
/**
 * testMessageNullFakeEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullFakeEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, 'a', array()));
}
// }}}

// {{{ testMessageNullFakeArray
/**
 * testMessageNullFakeArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullFakeArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, 'a', array('a')));
}
// }}}

// {{{ testMessageNullFakeOne
/**
 * testMessageNullFakeOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullFakeOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, 'a', 1));
}
// }}}

// {{{ testMessageNullFakeZero
/**
 * testMessageNullFakeZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullFakeZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, 'a', 0));
}
// }}}

// {{{ testMessageNullEmptyArrayNullThrowException
/**
 * testMessageNullEmptyArrayNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullEmptyArrayNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, array(), null));
}
// }}}

// {{{ testMessageNullEmptyArrayEmptyStringThrowException
/**
 * testMessageNullEmptyArrayEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullEmptyArrayEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, array(), ''));
}
// }}}

// {{{ testMessageNullEmptyArraySpacedStringThrowException
/**
 * testMessageNullEmptyArraySpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullEmptyArraySpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, array(), ' '));
}
// }}}

// {{{ testMessageNullEmptyArrayFakeThrowException
/**
 * testMessageNullEmptyArrayFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullEmptyArrayFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, array(), 'a'));
}
// }}}

// {{{ testMessageNullEmptyArrayEmptyArrayThrowException
/**
 * testMessageNullEmptyArrayEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullEmptyArrayEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, array(), array()));
}
// }}}

// {{{ testMessageNullEmptyArrayArrayThrowException
/**
 * testMessageNullEmptyArrayArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullEmptyArrayArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, array(), array('a')));
}
// }}}

// {{{ testMessageNullEmptyArrayOneThrowException
/**
 * testMessageNullEmptyArrayOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullEmptyArrayOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, array(), 1));
}
// }}}

// {{{ testMessageNullEmptyArrayZeroThrowException
/**
 * testMessageNullEmptyArrayZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullEmptyArrayZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, array(), 0));
}
// }}}

// {{{ testMessageNullStringSprintfNull
/**
 * testMessageNullStringSprintfNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullStringSprintfNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s', null));
}
// }}}

// {{{ testMessageNullStringSprintfEmptyString
/**
 * testMessageNullStringSprintfEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullStringSprintfEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s', ''));
}
// }}}

// {{{ testMessageNullStringSprintfSpacedString
/**
 * testMessageNullStringSprintfSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullStringSprintfSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s', ' '));
}
// }}}

// {{{ testMessageNullStringSprintfFake
/**
 * testMessageNullStringSprintfFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullStringSprintfFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s', 'a'));
}
// }}}

// {{{ testMessageNullStringSprintfEmptyArray
/**
 * testMessageNullStringSprintfEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullStringSprintfEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s', array()));
}
// }}}

// {{{ testMessageNullStringSprintfArray
/**
 * testMessageNullStringSprintfArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullStringSprintfArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s', array('a')));
}
// }}}

// {{{ testMessageNullStringSprintfOne
/**
 * testMessageNullStringSprintfOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullStringSprintfOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s', 1));
}
// }}}

// {{{ testMessageNullStringSprintfZero
/**
 * testMessageNullStringSprintfZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageNullStringSprintfZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s', 0));
}
// }}}

// {{{ testMessageNullMultipleSprintfNullThrowException
/**
 * testMessageNullMultipleSprintfNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullMultipleSprintfNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s %d', null));
}
// }}}

// {{{ testMessageNullMultipleSprintfEmptyStringThrowException
/**
 * testMessageNullMultipleSprintfEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullMultipleSprintfEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s %d', ''));
}
// }}}

// {{{ testMessageNullMultipleSprintfSpacedStringThrowException
/**
 * testMessageNullMultipleSprintfSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullMultipleSprintfSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s %d', ' '));
}
// }}}

// {{{ testMessageNullMultipleSprintfFakeThrowException
/**
 * testMessageNullMultipleSprintfFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullMultipleSprintfFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s %d', 'a'));
}
// }}}

// {{{ testMessageNullMultipleSprintfEmptyArrayThrowException
/**
 * testMessageNullMultipleSprintfEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullMultipleSprintfEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s %d', array()));
}
// }}}

// {{{ testMessageNullMultipleSprintfArrayThrowException
/**
 * testMessageNullMultipleSprintfArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullMultipleSprintfArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s %d', array('a')));
}
// }}}

// {{{ testMessageNullMultipleSprintfOneThrowException
/**
 * testMessageNullMultipleSprintfOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullMultipleSprintfOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s %d', 1));
}
// }}}

// {{{ testMessageNullMultipleSprintfZeroThrowException
/**
 * testMessageNullMultipleSprintfZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageNullMultipleSprintfZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(null, '%s %d', 0));
}
// }}}

// {{{ testMessageFakeEmptyStringNull
/**
 * testMessageFakeEmptyStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeEmptyStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '', null));
}
// }}}

// {{{ testMessageFakeEmptyStringEmptyString
/**
 * testMessageFakeEmptyStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeEmptyStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '', ''));
}
// }}}

// {{{ testMessageFakeEmptyStringSpacedString
/**
 * testMessageFakeEmptyStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeEmptyStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '', ' '));
}
// }}}

// {{{ testMessageFakeEmptyStringFake
/**
 * testMessageFakeEmptyStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeEmptyStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '', 'a'));
}
// }}}

// {{{ testMessageFakeEmptyStringEmptyArray
/**
 * testMessageFakeEmptyStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeEmptyStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '', array()));
}
// }}}

// {{{ testMessageFakeEmptyStringArray
/**
 * testMessageFakeEmptyStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeEmptyStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '', array('a')));
}
// }}}

// {{{ testMessageFakeEmptyStringOne
/**
 * testMessageFakeEmptyStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeEmptyStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '', 1));
}
// }}}

// {{{ testMessageFakeEmptyStringZero
/**
 * testMessageFakeEmptyStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeEmptyStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '', 0));
}
// }}}

// {{{ testMessageFakeNullNullThrowException
/**
 * testMessageFakeNullNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeNullNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', null, null));
}
// }}}

// {{{ testMessageFakeNullEmptyStringThrowException
/**
 * testMessageFakeNullEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeNullEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', null, ''));
}
// }}}

// {{{ testMessageFakeNullSpacedStringThrowException
/**
 * testMessageFakeNullSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeNullSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', null, ' '));
}
// }}}

// {{{ testMessageFakeNullFakeThrowException
/**
 * testMessageFakeNullFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeNullFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', null, 'a'));
}
// }}}

// {{{ testMessageFakeNullEmptyArrayThrowException
/**
 * testMessageFakeNullEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeNullEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', null, array()));
}
// }}}

// {{{ testMessageFakeNullArrayThrowException
/**
 * testMessageFakeNullArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeNullArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', null, array('a')));
}
// }}}

// {{{ testMessageFakeNullOneThrowException
/**
 * testMessageFakeNullOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeNullOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', null, 1));
}
// }}}

// {{{ testMessageFakeNullZeroThrowException
/**
 * testMessageFakeNullZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeNullZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', null, 0));
}
// }}}

// {{{ testMessageFakeSpacedStringNull
/**
 * testMessageFakeSpacedStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeSpacedStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', ' ', null));
}
// }}}

// {{{ testMessageFakeSpacedStringEmptyString
/**
 * testMessageFakeSpacedStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeSpacedStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', ' ', ''));
}
// }}}

// {{{ testMessageFakeSpacedStringSpacedString
/**
 * testMessageFakeSpacedStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeSpacedStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', ' ', ' '));
}
// }}}

// {{{ testMessageFakeSpacedStringFake
/**
 * testMessageFakeSpacedStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeSpacedStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', ' ', 'a'));
}
// }}}

// {{{ testMessageFakeSpacedStringEmptyArray
/**
 * testMessageFakeSpacedStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeSpacedStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', ' ', array()));
}
// }}}

// {{{ testMessageFakeSpacedStringArray
/**
 * testMessageFakeSpacedStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeSpacedStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', ' ', array('a')));
}
// }}}

// {{{ testMessageFakeSpacedStringOne
/**
 * testMessageFakeSpacedStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeSpacedStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', ' ', 1));
}
// }}}

// {{{ testMessageFakeSpacedStringZero
/**
 * testMessageFakeSpacedStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeSpacedStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', ' ', 0));
}
// }}}

// {{{ testMessageFakeFakeNull
/**
 * testMessageFakeFakeNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeFakeNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', 'a', null));
}
// }}}

// {{{ testMessageFakeFakeEmptyString
/**
 * testMessageFakeFakeEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeFakeEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', 'a', ''));
}
// }}}

// {{{ testMessageFakeFakeSpacedString
/**
 * testMessageFakeFakeSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeFakeSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', 'a', ' '));
}
// }}}

// {{{ testMessageFakeFakeFake
/**
 * testMessageFakeFakeFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeFakeFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', 'a', 'a'));
}
// }}}

// {{{ testMessageFakeFakeEmptyArray
/**
 * testMessageFakeFakeEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeFakeEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', 'a', array()));
}
// }}}

// {{{ testMessageFakeFakeArray
/**
 * testMessageFakeFakeArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeFakeArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', 'a', array('a')));
}
// }}}

// {{{ testMessageFakeFakeOne
/**
 * testMessageFakeFakeOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeFakeOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', 'a', 1));
}
// }}}

// {{{ testMessageFakeFakeZero
/**
 * testMessageFakeFakeZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeFakeZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', 'a', 0));
}
// }}}

// {{{ testMessageFakeEmptyArrayNullThrowException
/**
 * testMessageFakeEmptyArrayNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeEmptyArrayNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', array(), null));
}
// }}}

// {{{ testMessageFakeEmptyArrayEmptyStringThrowException
/**
 * testMessageFakeEmptyArrayEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeEmptyArrayEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', array(), ''));
}
// }}}

// {{{ testMessageFakeEmptyArraySpacedStringThrowException
/**
 * testMessageFakeEmptyArraySpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeEmptyArraySpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', array(), ' '));
}
// }}}

// {{{ testMessageFakeEmptyArrayFakeThrowException
/**
 * testMessageFakeEmptyArrayFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeEmptyArrayFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', array(), 'a'));
}
// }}}

// {{{ testMessageFakeEmptyArrayEmptyArrayThrowException
/**
 * testMessageFakeEmptyArrayEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeEmptyArrayEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', array(), array()));
}
// }}}

// {{{ testMessageFakeEmptyArrayArrayThrowException
/**
 * testMessageFakeEmptyArrayArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeEmptyArrayArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', array(), array('a')));
}
// }}}

// {{{ testMessageFakeEmptyArrayOneThrowException
/**
 * testMessageFakeEmptyArrayOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeEmptyArrayOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', array(), 1));
}
// }}}

// {{{ testMessageFakeEmptyArrayZeroThrowException
/**
 * testMessageFakeEmptyArrayZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeEmptyArrayZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', array(), 0));
}
// }}}

// {{{ testMessageFakeStringSprintfNull
/**
 * testMessageFakeStringSprintfNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeStringSprintfNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s', null));
}
// }}}

// {{{ testMessageFakeStringSprintfEmptyString
/**
 * testMessageFakeStringSprintfEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeStringSprintfEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s', ''));
}
// }}}

// {{{ testMessageFakeStringSprintfSpacedString
/**
 * testMessageFakeStringSprintfSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeStringSprintfSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s', ' '));
}
// }}}

// {{{ testMessageFakeStringSprintfFake
/**
 * testMessageFakeStringSprintfFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeStringSprintfFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s', 'a'));
}
// }}}

// {{{ testMessageFakeStringSprintfEmptyArray
/**
 * testMessageFakeStringSprintfEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeStringSprintfEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s', array()));
}
// }}}

// {{{ testMessageFakeStringSprintfArray
/**
 * testMessageFakeStringSprintfArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeStringSprintfArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s', array('a')));
}
// }}}

// {{{ testMessageFakeStringSprintfOne
/**
 * testMessageFakeStringSprintfOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeStringSprintfOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s', 1));
}
// }}}

// {{{ testMessageFakeStringSprintfZero
/**
 * testMessageFakeStringSprintfZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageFakeStringSprintfZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s', 0));
}
// }}}

// {{{ testMessageFakeMultipleSprintfNullThrowException
/**
 * testMessageFakeMultipleSprintfNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeMultipleSprintfNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s %d', null));
}
// }}}

// {{{ testMessageFakeMultipleSprintfEmptyStringThrowException
/**
 * testMessageFakeMultipleSprintfEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeMultipleSprintfEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s %d', ''));
}
// }}}

// {{{ testMessageFakeMultipleSprintfSpacedStringThrowException
/**
 * testMessageFakeMultipleSprintfSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeMultipleSprintfSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s %d', ' '));
}
// }}}

// {{{ testMessageFakeMultipleSprintfFakeThrowException
/**
 * testMessageFakeMultipleSprintfFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeMultipleSprintfFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s %d', 'a'));
}
// }}}

// {{{ testMessageFakeMultipleSprintfEmptyArrayThrowException
/**
 * testMessageFakeMultipleSprintfEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeMultipleSprintfEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s %d', array()));
}
// }}}

// {{{ testMessageFakeMultipleSprintfArrayThrowException
/**
 * testMessageFakeMultipleSprintfArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeMultipleSprintfArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s %d', array('a')));
}
// }}}

// {{{ testMessageFakeMultipleSprintfOneThrowException
/**
 * testMessageFakeMultipleSprintfOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeMultipleSprintfOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s %d', 1));
}
// }}}

// {{{ testMessageFakeMultipleSprintfZeroThrowException
/**
 * testMessageFakeMultipleSprintfZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageFakeMultipleSprintfZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array('a', '%s %d', 0));
}
// }}}

// {{{ testMessageEmptyArrayEmptyStringNull
/**
 * testMessageEmptyArrayEmptyStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayEmptyStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '', null));
}
// }}}

// {{{ testMessageEmptyArrayEmptyStringEmptyString
/**
 * testMessageEmptyArrayEmptyStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayEmptyStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '', ''));
}
// }}}

// {{{ testMessageEmptyArrayEmptyStringSpacedString
/**
 * testMessageEmptyArrayEmptyStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayEmptyStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '', ' '));
}
// }}}

// {{{ testMessageEmptyArrayEmptyStringFake
/**
 * testMessageEmptyArrayEmptyStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayEmptyStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '', 'a'));
}
// }}}

// {{{ testMessageEmptyArrayEmptyStringEmptyArray
/**
 * testMessageEmptyArrayEmptyStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayEmptyStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '', array()));
}
// }}}

// {{{ testMessageEmptyArrayEmptyStringArray
/**
 * testMessageEmptyArrayEmptyStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayEmptyStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '', array('a')));
}
// }}}

// {{{ testMessageEmptyArrayEmptyStringOne
/**
 * testMessageEmptyArrayEmptyStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayEmptyStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '', 1));
}
// }}}

// {{{ testMessageEmptyArrayEmptyStringZero
/**
 * testMessageEmptyArrayEmptyStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayEmptyStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '', 0));
}
// }}}

// {{{ testMessageEmptyArrayNullNullThrowException
/**
 * testMessageEmptyArrayNullNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayNullNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), null, null));
}
// }}}

// {{{ testMessageEmptyArrayNullEmptyStringThrowException
/**
 * testMessageEmptyArrayNullEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayNullEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), null, ''));
}
// }}}

// {{{ testMessageEmptyArrayNullSpacedStringThrowException
/**
 * testMessageEmptyArrayNullSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayNullSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), null, ' '));
}
// }}}

// {{{ testMessageEmptyArrayNullFakeThrowException
/**
 * testMessageEmptyArrayNullFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayNullFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), null, 'a'));
}
// }}}

// {{{ testMessageEmptyArrayNullEmptyArrayThrowException
/**
 * testMessageEmptyArrayNullEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayNullEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), null, array()));
}
// }}}

// {{{ testMessageEmptyArrayNullArrayThrowException
/**
 * testMessageEmptyArrayNullArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayNullArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), null, array('a')));
}
// }}}

// {{{ testMessageEmptyArrayNullOneThrowException
/**
 * testMessageEmptyArrayNullOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayNullOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), null, 1));
}
// }}}

// {{{ testMessageEmptyArrayNullZeroThrowException
/**
 * testMessageEmptyArrayNullZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayNullZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), null, 0));
}
// }}}

// {{{ testMessageEmptyArraySpacedStringNull
/**
 * testMessageEmptyArraySpacedStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArraySpacedStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), ' ', null));
}
// }}}

// {{{ testMessageEmptyArraySpacedStringEmptyString
/**
 * testMessageEmptyArraySpacedStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArraySpacedStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), ' ', ''));
}
// }}}

// {{{ testMessageEmptyArraySpacedStringSpacedString
/**
 * testMessageEmptyArraySpacedStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArraySpacedStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), ' ', ' '));
}
// }}}

// {{{ testMessageEmptyArraySpacedStringFake
/**
 * testMessageEmptyArraySpacedStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArraySpacedStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), ' ', 'a'));
}
// }}}

// {{{ testMessageEmptyArraySpacedStringEmptyArray
/**
 * testMessageEmptyArraySpacedStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArraySpacedStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), ' ', array()));
}
// }}}

// {{{ testMessageEmptyArraySpacedStringArray
/**
 * testMessageEmptyArraySpacedStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArraySpacedStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), ' ', array('a')));
}
// }}}

// {{{ testMessageEmptyArraySpacedStringOne
/**
 * testMessageEmptyArraySpacedStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArraySpacedStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), ' ', 1));
}
// }}}

// {{{ testMessageEmptyArraySpacedStringZero
/**
 * testMessageEmptyArraySpacedStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArraySpacedStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), ' ', 0));
}
// }}}

// {{{ testMessageEmptyArrayFakeNull
/**
 * testMessageEmptyArrayFakeNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayFakeNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), 'a', null));
}
// }}}

// {{{ testMessageEmptyArrayFakeEmptyString
/**
 * testMessageEmptyArrayFakeEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayFakeEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), 'a', ''));
}
// }}}

// {{{ testMessageEmptyArrayFakeSpacedString
/**
 * testMessageEmptyArrayFakeSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayFakeSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), 'a', ' '));
}
// }}}

// {{{ testMessageEmptyArrayFakeFake
/**
 * testMessageEmptyArrayFakeFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayFakeFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), 'a', 'a'));
}
// }}}

// {{{ testMessageEmptyArrayFakeEmptyArray
/**
 * testMessageEmptyArrayFakeEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayFakeEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), 'a', array()));
}
// }}}

// {{{ testMessageEmptyArrayFakeArray
/**
 * testMessageEmptyArrayFakeArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayFakeArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), 'a', array('a')));
}
// }}}

// {{{ testMessageEmptyArrayFakeOne
/**
 * testMessageEmptyArrayFakeOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayFakeOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), 'a', 1));
}
// }}}

// {{{ testMessageEmptyArrayFakeZero
/**
 * testMessageEmptyArrayFakeZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayFakeZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), 'a', 0));
}
// }}}

// {{{ testMessageEmptyArrayEmptyArrayNullThrowException
/**
 * testMessageEmptyArrayEmptyArrayNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayEmptyArrayNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), array(), null));
}
// }}}

// {{{ testMessageEmptyArrayEmptyArrayEmptyStringThrowException
/**
 * testMessageEmptyArrayEmptyArrayEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayEmptyArrayEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), array(), ''));
}
// }}}

// {{{ testMessageEmptyArrayEmptyArraySpacedStringThrowException
/**
 * testMessageEmptyArrayEmptyArraySpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayEmptyArraySpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), array(), ' '));
}
// }}}

// {{{ testMessageEmptyArrayEmptyArrayFakeThrowException
/**
 * testMessageEmptyArrayEmptyArrayFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayEmptyArrayFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), array(), 'a'));
}
// }}}

// {{{ testMessageEmptyArrayEmptyArrayEmptyArrayThrowException
/**
 * testMessageEmptyArrayEmptyArrayEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayEmptyArrayEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), array(), array()));
}
// }}}

// {{{ testMessageEmptyArrayEmptyArrayArrayThrowException
/**
 * testMessageEmptyArrayEmptyArrayArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayEmptyArrayArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), array(), array('a')));
}
// }}}

// {{{ testMessageEmptyArrayEmptyArrayOneThrowException
/**
 * testMessageEmptyArrayEmptyArrayOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayEmptyArrayOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), array(), 1));
}
// }}}

// {{{ testMessageEmptyArrayEmptyArrayZeroThrowException
/**
 * testMessageEmptyArrayEmptyArrayZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayEmptyArrayZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), array(), 0));
}
// }}}

// {{{ testMessageEmptyArrayStringSprintfNull
/**
 * testMessageEmptyArrayStringSprintfNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayStringSprintfNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s', null));
}
// }}}

// {{{ testMessageEmptyArrayStringSprintfEmptyString
/**
 * testMessageEmptyArrayStringSprintfEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayStringSprintfEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s', ''));
}
// }}}

// {{{ testMessageEmptyArrayStringSprintfSpacedString
/**
 * testMessageEmptyArrayStringSprintfSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayStringSprintfSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s', ' '));
}
// }}}

// {{{ testMessageEmptyArrayStringSprintfFake
/**
 * testMessageEmptyArrayStringSprintfFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayStringSprintfFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s', 'a'));
}
// }}}

// {{{ testMessageEmptyArrayStringSprintfEmptyArray
/**
 * testMessageEmptyArrayStringSprintfEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayStringSprintfEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s', array()));
}
// }}}

// {{{ testMessageEmptyArrayStringSprintfArray
/**
 * testMessageEmptyArrayStringSprintfArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayStringSprintfArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s', array('a')));
}
// }}}

// {{{ testMessageEmptyArrayStringSprintfOne
/**
 * testMessageEmptyArrayStringSprintfOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayStringSprintfOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s', 1));
}
// }}}

// {{{ testMessageEmptyArrayStringSprintfZero
/**
 * testMessageEmptyArrayStringSprintfZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageEmptyArrayStringSprintfZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s', 0));
}
// }}}

// {{{ testMessageEmptyArrayMultipleSprintfNullThrowException
/**
 * testMessageEmptyArrayMultipleSprintfNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayMultipleSprintfNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s %d', null));
}
// }}}

// {{{ testMessageEmptyArrayMultipleSprintfEmptyStringThrowException
/**
 * testMessageEmptyArrayMultipleSprintfEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayMultipleSprintfEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s %d', ''));
}
// }}}

// {{{ testMessageEmptyArrayMultipleSprintfSpacedStringThrowException
/**
 * testMessageEmptyArrayMultipleSprintfSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayMultipleSprintfSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s %d', ' '));
}
// }}}

// {{{ testMessageEmptyArrayMultipleSprintfFakeThrowException
/**
 * testMessageEmptyArrayMultipleSprintfFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayMultipleSprintfFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s %d', 'a'));
}
// }}}

// {{{ testMessageEmptyArrayMultipleSprintfEmptyArrayThrowException
/**
 * testMessageEmptyArrayMultipleSprintfEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayMultipleSprintfEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s %d', array()));
}
// }}}

// {{{ testMessageEmptyArrayMultipleSprintfArrayThrowException
/**
 * testMessageEmptyArrayMultipleSprintfArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayMultipleSprintfArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s %d', array('a')));
}
// }}}

// {{{ testMessageEmptyArrayMultipleSprintfOneThrowException
/**
 * testMessageEmptyArrayMultipleSprintfOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayMultipleSprintfOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s %d', 1));
}
// }}}

// {{{ testMessageEmptyArrayMultipleSprintfZeroThrowException
/**
 * testMessageEmptyArrayMultipleSprintfZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageEmptyArrayMultipleSprintfZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array(), '%s %d', 0));
}
// }}}

// {{{ testMessageArrayEmptyStringNull
/**
 * testMessageArrayEmptyStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayEmptyStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '', null));
}
// }}}

// {{{ testMessageArrayEmptyStringEmptyString
/**
 * testMessageArrayEmptyStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayEmptyStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '', ''));
}
// }}}

// {{{ testMessageArrayEmptyStringSpacedString
/**
 * testMessageArrayEmptyStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayEmptyStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '', ' '));
}
// }}}

// {{{ testMessageArrayEmptyStringFake
/**
 * testMessageArrayEmptyStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayEmptyStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '', 'a'));
}
// }}}

// {{{ testMessageArrayEmptyStringEmptyArray
/**
 * testMessageArrayEmptyStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayEmptyStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '', array()));
}
// }}}

// {{{ testMessageArrayEmptyStringArray
/**
 * testMessageArrayEmptyStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayEmptyStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '', array('a')));
}
// }}}

// {{{ testMessageArrayEmptyStringOne
/**
 * testMessageArrayEmptyStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayEmptyStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '', 1));
}
// }}}

// {{{ testMessageArrayEmptyStringZero
/**
 * testMessageArrayEmptyStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayEmptyStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '', 0));
}
// }}}

// {{{ testMessageArrayNullNullThrowException
/**
 * testMessageArrayNullNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayNullNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), null, null));
}
// }}}

// {{{ testMessageArrayNullEmptyStringThrowException
/**
 * testMessageArrayNullEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayNullEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), null, ''));
}
// }}}

// {{{ testMessageArrayNullSpacedStringThrowException
/**
 * testMessageArrayNullSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayNullSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), null, ' '));
}
// }}}

// {{{ testMessageArrayNullFakeThrowException
/**
 * testMessageArrayNullFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayNullFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), null, 'a'));
}
// }}}

// {{{ testMessageArrayNullEmptyArrayThrowException
/**
 * testMessageArrayNullEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayNullEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), null, array()));
}
// }}}

// {{{ testMessageArrayNullArrayThrowException
/**
 * testMessageArrayNullArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayNullArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), null, array('a')));
}
// }}}

// {{{ testMessageArrayNullOneThrowException
/**
 * testMessageArrayNullOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayNullOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), null, 1));
}
// }}}

// {{{ testMessageArrayNullZeroThrowException
/**
 * testMessageArrayNullZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayNullZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), null, 0));
}
// }}}

// {{{ testMessageArraySpacedStringNull
/**
 * testMessageArraySpacedStringNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArraySpacedStringNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), ' ', null));
}
// }}}

// {{{ testMessageArraySpacedStringEmptyString
/**
 * testMessageArraySpacedStringEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArraySpacedStringEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), ' ', ''));
}
// }}}

// {{{ testMessageArraySpacedStringSpacedString
/**
 * testMessageArraySpacedStringSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArraySpacedStringSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), ' ', ' '));
}
// }}}

// {{{ testMessageArraySpacedStringFake
/**
 * testMessageArraySpacedStringFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArraySpacedStringFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), ' ', 'a'));
}
// }}}

// {{{ testMessageArraySpacedStringEmptyArray
/**
 * testMessageArraySpacedStringEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArraySpacedStringEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), ' ', array()));
}
// }}}

// {{{ testMessageArraySpacedStringArray
/**
 * testMessageArraySpacedStringArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArraySpacedStringArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), ' ', array('a')));
}
// }}}

// {{{ testMessageArraySpacedStringOne
/**
 * testMessageArraySpacedStringOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArraySpacedStringOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), ' ', 1));
}
// }}}

// {{{ testMessageArraySpacedStringZero
/**
 * testMessageArraySpacedStringZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArraySpacedStringZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), ' ', 0));
}
// }}}

// {{{ testMessageArrayFakeNull
/**
 * testMessageArrayFakeNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayFakeNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), 'a', null));
}
// }}}

// {{{ testMessageArrayFakeEmptyString
/**
 * testMessageArrayFakeEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayFakeEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), 'a', ''));
}
// }}}

// {{{ testMessageArrayFakeSpacedString
/**
 * testMessageArrayFakeSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayFakeSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), 'a', ' '));
}
// }}}

// {{{ testMessageArrayFakeFake
/**
 * testMessageArrayFakeFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayFakeFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), 'a', 'a'));
}
// }}}

// {{{ testMessageArrayFakeEmptyArray
/**
 * testMessageArrayFakeEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayFakeEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), 'a', array()));
}
// }}}

// {{{ testMessageArrayFakeArray
/**
 * testMessageArrayFakeArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayFakeArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), 'a', array('a')));
}
// }}}

// {{{ testMessageArrayFakeOne
/**
 * testMessageArrayFakeOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayFakeOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), 'a', 1));
}
// }}}

// {{{ testMessageArrayFakeZero
/**
 * testMessageArrayFakeZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayFakeZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), 'a', 0));
}
// }}}

// {{{ testMessageArrayEmptyArrayNullThrowException
/**
 * testMessageArrayEmptyArrayNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayEmptyArrayNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), array(), null));
}
// }}}

// {{{ testMessageArrayEmptyArrayEmptyStringThrowException
/**
 * testMessageArrayEmptyArrayEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayEmptyArrayEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), array(), ''));
}
// }}}

// {{{ testMessageArrayEmptyArraySpacedStringThrowException
/**
 * testMessageArrayEmptyArraySpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayEmptyArraySpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), array(), ' '));
}
// }}}

// {{{ testMessageArrayEmptyArrayFakeThrowException
/**
 * testMessageArrayEmptyArrayFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayEmptyArrayFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), array(), 'a'));
}
// }}}

// {{{ testMessageArrayEmptyArrayEmptyArrayThrowException
/**
 * testMessageArrayEmptyArrayEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayEmptyArrayEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), array(), array()));
}
// }}}

// {{{ testMessageArrayEmptyArrayArrayThrowException
/**
 * testMessageArrayEmptyArrayArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayEmptyArrayArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), array(), array('a')));
}
// }}}

// {{{ testMessageArrayEmptyArrayOneThrowException
/**
 * testMessageArrayEmptyArrayOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayEmptyArrayOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), array(), 1));
}
// }}}

// {{{ testMessageArrayEmptyArrayZeroThrowException
/**
 * testMessageArrayEmptyArrayZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayEmptyArrayZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), array(), 0));
}
// }}}

// {{{ testMessageArrayStringSprintfNull
/**
 * testMessageArrayStringSprintfNull
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayStringSprintfNull()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s', null));
}
// }}}

// {{{ testMessageArrayStringSprintfEmptyString
/**
 * testMessageArrayStringSprintfEmptyString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayStringSprintfEmptyString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s', ''));
}
// }}}

// {{{ testMessageArrayStringSprintfSpacedString
/**
 * testMessageArrayStringSprintfSpacedString
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayStringSprintfSpacedString()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s', ' '));
}
// }}}

// {{{ testMessageArrayStringSprintfFake
/**
 * testMessageArrayStringSprintfFake
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayStringSprintfFake()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s', 'a'));
}
// }}}

// {{{ testMessageArrayStringSprintfEmptyArray
/**
 * testMessageArrayStringSprintfEmptyArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayStringSprintfEmptyArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s', array()));
}
// }}}

// {{{ testMessageArrayStringSprintfArray
/**
 * testMessageArrayStringSprintfArray
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayStringSprintfArray()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s', array('a')));
}
// }}}

// {{{ testMessageArrayStringSprintfOne
/**
 * testMessageArrayStringSprintfOne
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayStringSprintfOne()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s', 1));
}
// }}}

// {{{ testMessageArrayStringSprintfZero
/**
 * testMessageArrayStringSprintfZero
 *
 * @ignore
 * @access public
 * @return void
 */
public function testMessageArrayStringSprintfZero()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s', 0));
}
// }}}

// {{{ testMessageArrayMultipleSprintfNullThrowException
/**
 * testMessageArrayMultipleSprintfNullThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayMultipleSprintfNullThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s %d', null));
}
// }}}

// {{{ testMessageArrayMultipleSprintfEmptyStringThrowException
/**
 * testMessageArrayMultipleSprintfEmptyStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayMultipleSprintfEmptyStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s %d', ''));
}
// }}}

// {{{ testMessageArrayMultipleSprintfSpacedStringThrowException
/**
 * testMessageArrayMultipleSprintfSpacedStringThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayMultipleSprintfSpacedStringThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s %d', ' '));
}
// }}}

// {{{ testMessageArrayMultipleSprintfFakeThrowException
/**
 * testMessageArrayMultipleSprintfFakeThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayMultipleSprintfFakeThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s %d', 'a'));
}
// }}}

// {{{ testMessageArrayMultipleSprintfEmptyArrayThrowException
/**
 * testMessageArrayMultipleSprintfEmptyArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayMultipleSprintfEmptyArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s %d', array()));
}
// }}}

// {{{ testMessageArrayMultipleSprintfArrayThrowException
/**
 * testMessageArrayMultipleSprintfArrayThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayMultipleSprintfArrayThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s %d', array('a')));
}
// }}}

// {{{ testMessageArrayMultipleSprintfOneThrowException
/**
 * testMessageArrayMultipleSprintfOneThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayMultipleSprintfOneThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s %d', 1));
}
// }}}

// {{{ testMessageArrayMultipleSprintfZeroThrowException
/**
 * testMessageArrayMultipleSprintfZeroThrowException
 *
 * @ignore
 * @access public
 * @return void
 * @expectedException Bonzai_Exception
 */
public function testMessageArrayMultipleSprintfZeroThrowException()
{
    Bonzai_Utils::$silenced = false;
    $this->callMethod('message', array(array('a'), '%s %d', 0));
}
// }}}

    // }}}

    // {{{ warn
    // {{{ testWarnJustCoverage
    /**
     * testWarnJustCoverage
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testWarnJustCoverage()
    {
        $this->object->warn('');
    }
    // }}}
    // }}}

    // {{{ error
    // {{{ testErrorJustCoverage
    /**
     * testErrorJustCoverage
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testErrorJustCoverage()
    {
        $this->object->error('');
    }
    // }}}
    // }}}
}
