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

Bonzai_Utils::$silenced = true;

/**
 * Bonzai_Utils_Test
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
class Bonzai_Utils_Test extends Bonzai_TestCase
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
        $dirname = realpath(__DIR__ . '/../');

        $files = Bonzai_Utils::rScanDir($dirname);
        sort($files);
        $files = preg_grep('#/tests/test_.+$|\.swp$#', $files, PREG_GREP_INVERT);
        $files = array_merge($files);
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
            '/src/cli/tests/CliSuite.php',
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
    // {{{ testMessage
    /**
     * testMessage
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testMessage()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
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
        $this->object->warn();
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
        $this->object->error();
    }
    // }}}
    // }}}
}
