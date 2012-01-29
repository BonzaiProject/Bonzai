<?php
/**
 * BONZAI
 * (was phpGuardian)
 *
 * CODE NAME: phoenix
 * VERSION:   0.1
 *
 * URL:       http://www.bonzai-project.org
 * E-MAIL:    info@bonzai-project.org
 *
 * COPYRIGHT: 2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * LICENSE:   MIT or GNU GPL 2
 *            The MIT License is recommended for most projects, it's simple and
 *            easy to understand  and it places  almost no restrictions on what
 *            you can do with Bonzai.
 *            If the GPL  suits your project  better you are  also free to  use
 *            Bonzai under that license.
 *            You don't have  to do anything  special to choose  one license or
 *            the other  and you don't have to notify  anyone which license you
 *            are using.  You are free  to use Bonzai in commercial projects as
 *            long as the copyright header is left intact.
 *            <http://www.opensource.org/licenses/mit-license.php>
 *            <http://www.opensource.org/licenses/gpl-2.0.php>
 *
 * PHP version 5
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Tests
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

require_once __DIR__ . '/../../src/libs/Tests/TestCase.php';
require_once __DIR__ . '/../../src/libs/Abstract/Abstract.php';
require_once __DIR__ . '/../../src/libs/Exception/Exception.php';
require_once __DIR__ . '/../../src/libs/Utils/Options.php';
require_once __DIR__ . '/../../src/libs/Utils/Utils.php';

/**
 * Bonzai_Utils_Test
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Tests
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/
class Bonzai_Utils_UtilsTest extends Bonzai_TestCase
{
    // {{{ backupFile
    // {{{ providerForBackupFile
    /**
     * providerForBackupFile
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForBackupFile()
    {
        return array(
            array(' '),
            array('a'),
            array(array('a')),
            array(array()),
            array(null),
        );
    }
    // }}}

    // {{{ testBackupFileWithProviderThrowException
    /**
     * testBackupFileWithProviderThrowException
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     * @dataProvider providerForBackupFile
     */
    public function testBackupFileWithProviderThrowException($a)
    {
        $this->object->backupFile($a);

        $file = is_array($a) ? implode('', $a) : $a;
        if (is_string($file) && is_file("$file.orig")) {
            unlink("$file.orig");
        }
    }
    // }}}

    // {{{ testBackupFileParamExistentFileIsRenamed
    /**
     * testBackupFileParamExistentFileIsRenamed
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testBackupFileParamExistentFileIsRenamed()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'a');

        $this->object->backupFile($filename);

        $this->assertFileExists("$filename.orig");
        $this->assertFileNotExists($filename);

        if (is_string($filename) && is_file("$filename.orig")) {
            unlink("$filename.orig");
        }
    }
    // }}}
    // }}}

    // {{{ rScanDir
    // {{{ providerForRScanDir
    /**
     * providerForRScanDir
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForRScanDir()
    {
        return array(
            array(' ', array('a')),
            array(' ', array()),
            array('', array('a')),
            array('', array()),
            array(null, array('a')),
            array(null, array()),
        );
    }
    // }}}

    // {{{ testRScanDirWithProviderThrowException
    /**
     * Return the all directories & files into a directory
     *
     * @param mixed $a
     * @param mixed $b
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     * @dataProvider providerForRScanDir
     */
    public function testRScanDirWithProviderThrowException($a, $b)
    {
        $this->object->rScanDir($a, $b);
    }
    // }}}

    // {{{ providerForRScanDir2
    /**
     * providerForRScanDir2
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForRScanDir2()
    {
        return array(
            array(array()),
            array(array('a')),
        );
    }
    // }}}

    // {{{ testRScanDirWithProviderThrowException2
    /**
     * Return the all directories & files into a directory
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForRScanDir2
     */
    public function testRScanDirWithProviderThrowException2($a)
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222); // -w--w--w-

        try {
            $this->object->rScanDir($dirname, $a);
            $this->fail("The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ providerForRScanDir3
    /**
     * providerForRScanDir3
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForRScanDir3()
    {
        return array(
            array(array()),
        );
    }
    // }}}

    // {{{ testRScanDirWithProviderIsEmpty
    /**
     * Return the all directories & files into a directory
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForRScanDir3
     */
    public function testRScanDirWithProviderIsEmpty($a)
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $this->assertEmpty($this->object->rScanDir($dirname, $a));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ providerForRScanDir4
    /**
     * providerForRScanDir4
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForRScanDir4()
    {
        return array(
            array(array()),
        );
    }
    // }}}

    // {{{ testRScanDirWithProviderIsEmpty2
    /**
     * Return the all directories & files into a directory
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForRScanDir4
     */
    public function testRScanDirWithProviderIsEmpty2($a)
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $this->assertEmpty($this->object->rScanDir($dirname, $a));
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
        $this->assertEquals(
            array('a'),
            $this->object->rScanDir($dirname, $value)
        );
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

        $value = $this->object->rScanDir($dirname);
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

        $files = $this->object->rScanDir($dirname);
        sort($files);
        $files = preg_grep('/\.(php|sh)$/', $files);
        foreach ($files as $i => $file) {
            $files[$i] = str_replace(realpath("$dirname/"), "", $file);
        }
        $files = preg_grep('/^\/(src|tests|bin)/', $files);
        $files = array_merge($files);

        $realfiles = array(
            '/bin/build.sh',
            '/src/libs/Abstract/Abstract.php',
            '/src/libs/Controller/Controller.php',
            '/src/libs/Encoder/Encoder.php',
            '/src/libs/Exception/Exception.php',
            '/src/libs/Interface/Task.php',
            '/src/libs/Task/Task.php',
            '/src/libs/Tests/TestCase.php',
            '/src/libs/Utils/Help.php',
            '/src/libs/Utils/Options.php',
            '/src/libs/Utils/Utils.php',
            '/tests/Controller/ControllerTest.php',
            '/tests/Encoder/EncoderTest.php',
            '/tests/Task/TaskTest.php',
            '/tests/Test.php',
            '/tests/Utils/HelpTest.php',
            '/tests/Utils/OptionsTest.php',
            '/tests/Utils/UtilsTest.php'
        );

        $this->assertEquals($realfiles, $files);
    }
    // }}}
    // }}}

    // {{{ getFileContent
    // {{{ providerForGetFileContent
    /**
     * providerForGetFileContent
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForGetFileContent()
    {
        return array(
            array(null),
            array(''),
            array(' '),
            array('a'),
        );
    }
    // }}}

    // {{{ testGetFileContentParamIsNullReturnsNull
    /**
     * Get the file's content
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     * @dataProvider providerForGetFileContent
     */
    public function testGetFileContentWithProviderThrowException($a)
    {
        $this->object->getFileContent($a);
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
            $this->object->getFileContent($filename);
            $this->fail("The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
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
            $this->object->getFileContent($filename);
            $this->fail("The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
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
            $this->object->getFileContent($filename);
            $this->fail("The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
    }
    // }}}
    // }}}

    // {{{ checkFileValidity
    // {{{ providerForCheckFileValidity
    /**
     * providerForCheckFileValidity
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForCheckFileValidity()
    {
        return array(
            array(' ', ' '),
            array(' ', ''),
            array(' ', 'a'),
            array(' ', array('a')),
            array(' ', array()),
            array(' ', false),
            array(' ', null),
            array(' ', true),
            array('', ' '),
            array('', 'a'),
            array('', array('a')),
            array('', array()),
            array('', false),
            array('', null),
            array('', true),
            array('a', ' '),
            array('a', ''),
            array('a', 'a'),
            array('a', array('a')),
            array('a', array()),
            array('a', false),
            array('a', null),
            array('a', true),
            array(array('a'), ' '),
            array(array('a'), ''),
            array(array('a'), 'a'),
            array(array('a'), array('a')),
            array(array('a'), array()),
            array(array('a'), false),
            array(array('a'), null),
            array(array('a'), true),
            array(array(), ' '),
            array(array(), ''),
            array(array(), 'a'),
            array(array(), array('a')),
            array(array(), array()),
            array(array(), false),
            array(array(), null),
            array(array(), true),
            array(null, ' '),
            array(null, ''),
            array(null, 'a'),
            array(null, array('a')),
            array(null, array()),
            array(null, false),
            array(null, null),
            array(null, true),
        );
    }
    // }}}

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
        $this->object->checkFileValidity('', '');
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

        $this->assertEmpty($this->object->checkFileValidity($filename));

        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
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

        $this->assertEmpty($this->object->checkFileValidity($filename));

        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
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

        $this->assertEmpty($this->object->checkFileValidity($filename));

        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
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

        $this->assertEmpty($this->object->checkFileValidity($filename));

        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
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

        $this->assertEmpty($this->object->checkFileValidity($filename));

        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
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

        $this->assertEmpty($this->object->checkFileValidity($filename));

        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
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
        $this->object->checkFileValidity(__FILE__);
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
        $this->assertEmpty($this->object->info(''));
    }
    // }}}
    // }}}

    // {{{ message
    // {{{ providerForMessage
    /**
     * providerForMessage
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForMessage()
    {
        return array(
            array(' ', '%s %d', ' '),
            array(' ', '%s %d', ''),
            array(' ', '%s %d', 'a'),
            array(' ', '%s %d', 0),
            array(' ', '%s %d', 1),
            array(' ', '%s %d', array('a')),
            array(' ', '%s %d', array()),
            array(' ', '%s %d', null),
            array(' ', array(), ' '),
            array(' ', array(), ''),
            array(' ', array(), 'a'),
            array(' ', array(), 0),
            array(' ', array(), 1),
            array(' ', array(), array('a')),
            array(' ', array(), array()),
            array(' ', array(), null),
            array(' ', null, ' '),
            array(' ', null, ''),
            array(' ', null, 'a'),
            array(' ', null, 0),
            array(' ', null, 1),
            array(' ', null, array('a')),
            array(' ', null, array()),
            array(' ', null, null),
            array('', '%s %d', ' '),
            array('', '%s %d', ''),
            array('', '%s %d', 'a'),
            array('', '%s %d', 0),
            array('', '%s %d', 1),
            array('', '%s %d', array('a')),
            array('', '%s %d', array()),
            array('', '%s %d', null),
            array('', array(), ' '),
            array('', array(), ''),
            array('', array(), 'a'),
            array('', array(), 0),
            array('', array(), 1),
            array('', array(), array('a')),
            array('', array(), array()),
            array('', array(), null),
            array('', null, ' '),
            array('', null, ''),
            array('', null, 'a'),
            array('', null, 0),
            array('', null, 1),
            array('', null, array('a')),
            array('', null, array()),
            array('', null, null),
            array('a', '%s %d', ' '),
            array('a', '%s %d', ''),
            array('a', '%s %d', 'a'),
            array('a', '%s %d', 0),
            array('a', '%s %d', 1),
            array('a', '%s %d', array('a')),
            array('a', '%s %d', array()),
            array('a', '%s %d', null),
            array('a', array(), ' '),
            array('a', array(), ''),
            array('a', array(), 'a'),
            array('a', array(), 0),
            array('a', array(), 1),
            array('a', array(), array('a')),
            array('a', array(), array()),
            array('a', array(), null),
            array('a', null, ' '),
            array('a', null, ''),
            array('a', null, 'a'),
            array('a', null, 0),
            array('a', null, 1),
            array('a', null, array('a')),
            array('a', null, array()),
            array('a', null, null),
            array('error', '%s %d', ' '),
            array('error', '%s %d', ''),
            array('error', '%s %d', 'a'),
            array('error', '%s %d', 0),
            array('error', '%s %d', 1),
            array('error', '%s %d', array('a')),
            array('error', '%s %d', array()),
            array('error', '%s %d', null),
            array('error', array(), ' '),
            array('error', array(), ''),
            array('error', array(), 'a'),
            array('error', array(), 0),
            array('error', array(), 1),
            array('error', array(), array('a')),
            array('error', array(), array()),
            array('error', array(), null),
            array('error', null, ' '),
            array('error', null, ''),
            array('error', null, 'a'),
            array('error', null, 0),
            array('error', null, 1),
            array('error', null, array('a')),
            array('error', null, array()),
            array('error', null, null),
            array('info', '%s %d', ' '),
            array('info', '%s %d', ''),
            array('info', '%s %d', 'a'),
            array('info', '%s %d', 0),
            array('info', '%s %d', 1),
            array('info', '%s %d', array('a')),
            array('info', '%s %d', array()),
            array('info', '%s %d', null),
            array('info', array(), ' '),
            array('info', array(), ''),
            array('info', array(), 'a'),
            array('info', array(), 0),
            array('info', array(), 1),
            array('info', array(), array('a')),
            array('info', array(), array()),
            array('info', array(), null),
            array('info', null, ' '),
            array('info', null, ''),
            array('info', null, 'a'),
            array('info', null, 0),
            array('info', null, 1),
            array('info', null, array('a')),
            array('info', null, array()),
            array('info', null, null),
            array('warn', '%s %d', ' '),
            array('warn', '%s %d', ''),
            array('warn', '%s %d', 'a'),
            array('warn', '%s %d', 0),
            array('warn', '%s %d', 1),
            array('warn', '%s %d', array('a')),
            array('warn', '%s %d', array()),
            array('warn', '%s %d', null),
            array('warn', array(), ' '),
            array('warn', array(), ''),
            array('warn', array(), 'a'),
            array('warn', array(), 0),
            array('warn', array(), 1),
            array('warn', array(), array('a')),
            array('warn', array(), array()),
            array('warn', array(), null),
            array('warn', null, ' '),
            array('warn', null, ''),
            array('warn', null, 'a'),
            array('warn', null, 0),
            array('warn', null, 1),
            array('warn', null, array('a')),
            array('warn', null, array()),
            array('warn', null, null),
            array(array('a'), '%s %d', ' '),
            array(array('a'), '%s %d', ''),
            array(array('a'), '%s %d', 'a'),
            array(array('a'), '%s %d', 0),
            array(array('a'), '%s %d', 1),
            array(array('a'), '%s %d', array('a')),
            array(array('a'), '%s %d', array()),
            array(array('a'), '%s %d', null),
            array(array('a'), array(), ' '),
            array(array('a'), array(), ''),
            array(array('a'), array(), 'a'),
            array(array('a'), array(), 0),
            array(array('a'), array(), 1),
            array(array('a'), array(), array('a')),
            array(array('a'), array(), array()),
            array(array('a'), array(), null),
            array(array('a'), null, ' '),
            array(array('a'), null, ''),
            array(array('a'), null, 'a'),
            array(array('a'), null, 0),
            array(array('a'), null, 1),
            array(array('a'), null, array('a')),
            array(array('a'), null, array()),
            array(array('a'), null, null),
            array(array(), '%s %d', ' '),
            array(array(), '%s %d', ''),
            array(array(), '%s %d', 'a'),
            array(array(), '%s %d', 0),
            array(array(), '%s %d', 1),
            array(array(), '%s %d', array('a')),
            array(array(), '%s %d', array()),
            array(array(), '%s %d', null),
            array(array(), array(), ' '),
            array(array(), array(), ''),
            array(array(), array(), 'a'),
            array(array(), array(), 0),
            array(array(), array(), 1),
            array(array(), array(), array('a')),
            array(array(), array(), array()),
            array(array(), array(), null),
            array(array(), null, ' '),
            array(array(), null, ''),
            array(array(), null, 'a'),
            array(array(), null, 0),
            array(array(), null, 1),
            array(array(), null, array('a')),
            array(array(), null, array()),
            array(array(), null, null),
            array(null, '%s %d', ' '),
            array(null, '%s %d', ''),
            array(null, '%s %d', 'a'),
            array(null, '%s %d', 0),
            array(null, '%s %d', 1),
            array(null, '%s %d', array('a')),
            array(null, '%s %d', array()),
            array(null, '%s %d', null),
            array(null, array(), ' '),
            array(null, array(), ''),
            array(null, array(), 'a'),
            array(null, array(), 0),
            array(null, array(), 1),
            array(null, array(), array('a')),
            array(null, array(), array()),
            array(null, array(), null),
            array(null, null, ' '),
            array(null, null, ''),
            array(null, null, 'a'),
            array(null, null, 0),
            array(null, null, 1),
            array(null, null, array('a')),
            array(null, null, array()),
            array(null, null, null),
        );
    }
    // }}}

    // {{{ testMessageWithProviderThrowException
    /**
     * testMessageWithProviderThrowException
     *
     * @param mixed $a
     * @param mixed $b
     * @param mixed $c
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     * @dataProvider providerForMessage
     */
    public function testMessageWithProviderThrowException($a, $b, $c)
    {
        $this->callMethod('message', array($a, $b, $c));
    }
    // }}}

    // {{{ providerForMessage2
    /**
     * providerForMessage2
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForMessage2()
    {
        return array(
            array(' ', ' ', ' '),
            array(' ', ' ', ''),
            array(' ', ' ', 'a'),
            array(' ', ' ', 0),
            array(' ', ' ', 1),
            array(' ', ' ', array('a')),
            array(' ', ' ', array()),
            array(' ', ' ', null),
            array(' ', '%s', ' '),
            array(' ', '%s', ''),
            array(' ', '%s', 'a'),
            array(' ', '%s', 0),
            array(' ', '%s', 1),
            array(' ', '%s', array('a')),
            array(' ', '%s', array()),
            array(' ', '%s', null),
            array(' ', '', ' '),
            array(' ', '', ''),
            array(' ', '', 'a'),
            array(' ', '', 0),
            array(' ', '', 1),
            array(' ', '', array('a')),
            array(' ', '', array()),
            array(' ', '', null),
            array(' ', 'a', ' '),
            array(' ', 'a', ''),
            array(' ', 'a', 'a'),
            array(' ', 'a', 0),
            array(' ', 'a', 1),
            array(' ', 'a', array('a')),
            array(' ', 'a', array()),
            array(' ', 'a', null),
            array('', ' ', ' '),
            array('', ' ', ''),
            array('', ' ', 'a'),
            array('', ' ', 0),
            array('', ' ', 1),
            array('', ' ', array('a')),
            array('', ' ', array()),
            array('', ' ', null),
            array('', '%s', ' '),
            array('', '%s', ''),
            array('', '%s', 'a'),
            array('', '%s', 0),
            array('', '%s', 1),
            array('', '%s', array('a')),
            array('', '%s', array()),
            array('', '%s', null),
            array('', '', ' '),
            array('', '', ''),
            array('', '', 'a'),
            array('', '', 0),
            array('', '', 1),
            array('', '', array('a')),
            array('', '', array()),
            array('', '', null),
            array('', 'a', ' '),
            array('', 'a', ''),
            array('', 'a', 'a'),
            array('', 'a', 0),
            array('', 'a', 1),
            array('', 'a', array('a')),
            array('', 'a', array()),
            array('', 'a', null),
            array('a', ' ', ' '),
            array('a', ' ', ''),
            array('a', ' ', 'a'),
            array('a', ' ', 0),
            array('a', ' ', 1),
            array('a', ' ', array('a')),
            array('a', ' ', array()),
            array('a', ' ', null),
            array('a', '%s', ' '),
            array('a', '%s', ''),
            array('a', '%s', 'a'),
            array('a', '%s', 0),
            array('a', '%s', 1),
            array('a', '%s', array('a')),
            array('a', '%s', array()),
            array('a', '%s', null),
            array('a', '', ' '),
            array('a', '', ''),
            array('a', '', 'a'),
            array('a', '', 0),
            array('a', '', 1),
            array('a', '', array('a')),
            array('a', '', array()),
            array('a', '', null),
            array('a', 'a', ' '),
            array('a', 'a', ''),
            array('a', 'a', 'a'),
            array('a', 'a', 0),
            array('a', 'a', 1),
            array('a', 'a', array('a')),
            array('a', 'a', array()),
            array('a', 'a', null),
            array('error', ' ', ' '),
            array('error', ' ', ''),
            array('error', ' ', 'a'),
            array('error', ' ', 0),
            array('error', ' ', 1),
            array('error', ' ', array('a')),
            array('error', ' ', array()),
            array('error', ' ', null),
            array('error', '%s', ' '),
            array('error', '%s', ''),
            array('error', '%s', 'a'),
            array('error', '%s', 0),
            array('error', '%s', 1),
            array('error', '%s', array('a')),
            array('error', '%s', array()),
            array('error', '%s', null),
            array('error', '', ' '),
            array('error', '', ''),
            array('error', '', 'a'),
            array('error', '', 0),
            array('error', '', 1),
            array('error', '', array('a')),
            array('error', '', array()),
            array('error', '', null),
            array('error', 'a', ' '),
            array('error', 'a', ''),
            array('error', 'a', 'a'),
            array('error', 'a', 0),
            array('error', 'a', 1),
            array('error', 'a', array('a')),
            array('error', 'a', array()),
            array('error', 'a', null),
            array('info', ' ', ' '),
            array('info', ' ', ''),
            array('info', ' ', 'a'),
            array('info', ' ', 0),
            array('info', ' ', 1),
            array('info', ' ', array('a')),
            array('info', ' ', array()),
            array('info', ' ', null),
            array('info', '%s', ' '),
            array('info', '%s', ''),
            array('info', '%s', 'a'),
            array('info', '%s', 0),
            array('info', '%s', 1),
            array('info', '%s', array('a')),
            array('info', '%s', array()),
            array('info', '%s', null),
            array('info', '', ' '),
            array('info', '', ''),
            array('info', '', 'a'),
            array('info', '', 0),
            array('info', '', 1),
            array('info', '', array('a')),
            array('info', '', array()),
            array('info', '', null),
            array('info', 'a', ' '),
            array('info', 'a', ''),
            array('info', 'a', 'a'),
            array('info', 'a', 0),
            array('info', 'a', 1),
            array('info', 'a', array('a')),
            array('info', 'a', array()),
            array('info', 'a', null),
            array('warn', ' ', ' '),
            array('warn', ' ', ''),
            array('warn', ' ', 'a'),
            array('warn', ' ', 0),
            array('warn', ' ', 1),
            array('warn', ' ', array('a')),
            array('warn', ' ', array()),
            array('warn', ' ', null),
            array('warn', '%s', ' '),
            array('warn', '%s', ''),
            array('warn', '%s', 'a'),
            array('warn', '%s', 0),
            array('warn', '%s', 1),
            array('warn', '%s', array('a')),
            array('warn', '%s', array()),
            array('warn', '%s', null),
            array('warn', '', ' '),
            array('warn', '', ''),
            array('warn', '', 'a'),
            array('warn', '', 0),
            array('warn', '', 1),
            array('warn', '', array('a')),
            array('warn', '', array()),
            array('warn', '', null),
            array('warn', 'a', ' '),
            array('warn', 'a', ''),
            array('warn', 'a', 'a'),
            array('warn', 'a', 0),
            array('warn', 'a', 1),
            array('warn', 'a', array('a')),
            array('warn', 'a', array()),
            array('warn', 'a', null),
            array(array('a'), ' ', ' '),
            array(array('a'), ' ', ''),
            array(array('a'), ' ', 'a'),
            array(array('a'), ' ', 0),
            array(array('a'), ' ', 1),
            array(array('a'), ' ', array('a')),
            array(array('a'), ' ', array()),
            array(array('a'), ' ', null),
            array(array('a'), '%s', ' '),
            array(array('a'), '%s', ''),
            array(array('a'), '%s', 'a'),
            array(array('a'), '%s', 0),
            array(array('a'), '%s', 1),
            array(array('a'), '%s', array('a')),
            array(array('a'), '%s', array()),
            array(array('a'), '%s', null),
            array(array('a'), '', ' '),
            array(array('a'), '', ''),
            array(array('a'), '', 'a'),
            array(array('a'), '', 0),
            array(array('a'), '', 1),
            array(array('a'), '', array('a')),
            array(array('a'), '', array()),
            array(array('a'), '', null),
            array(array('a'), 'a', ' '),
            array(array('a'), 'a', ''),
            array(array('a'), 'a', 'a'),
            array(array('a'), 'a', 0),
            array(array('a'), 'a', 1),
            array(array('a'), 'a', array('a')),
            array(array('a'), 'a', array()),
            array(array('a'), 'a', null),
            array(array(), ' ', ' '),
            array(array(), ' ', ''),
            array(array(), ' ', 'a'),
            array(array(), ' ', 0),
            array(array(), ' ', 1),
            array(array(), ' ', array('a')),
            array(array(), ' ', array()),
            array(array(), ' ', null),
            array(array(), '%s', ' '),
            array(array(), '%s', ''),
            array(array(), '%s', 'a'),
            array(array(), '%s', 0),
            array(array(), '%s', 1),
            array(array(), '%s', array('a')),
            array(array(), '%s', array()),
            array(array(), '%s', null),
            array(array(), '', ' '),
            array(array(), '', ''),
            array(array(), '', 'a'),
            array(array(), '', 0),
            array(array(), '', 1),
            array(array(), '', array('a')),
            array(array(), '', array()),
            array(array(), '', null),
            array(array(), 'a', ' '),
            array(array(), 'a', ''),
            array(array(), 'a', 'a'),
            array(array(), 'a', 0),
            array(array(), 'a', 1),
            array(array(), 'a', array('a')),
            array(array(), 'a', array()),
            array(array(), 'a', null),
            array(null, ' ', ' '),
            array(null, ' ', ''),
            array(null, ' ', 'a'),
            array(null, ' ', 0),
            array(null, ' ', 1),
            array(null, ' ', array('a')),
            array(null, ' ', array()),
            array(null, ' ', null),
            array(null, '%s', ' '),
            array(null, '%s', ''),
            array(null, '%s', 'a'),
            array(null, '%s', 0),
            array(null, '%s', 1),
            array(null, '%s', array('a')),
            array(null, '%s', array()),
            array(null, '%s', null),
            array(null, '', ' '),
            array(null, '', ''),
            array(null, '', 'a'),
            array(null, '', 0),
            array(null, '', 1),
            array(null, '', array('a')),
            array(null, '', array()),
            array(null, '', null),
            array(null, 'a', ' '),
            array(null, 'a', ''),
            array(null, 'a', 'a'),
            array(null, 'a', 0),
            array(null, 'a', 1),
            array(null, 'a', array('a')),
            array(null, 'a', array()),
            array(null, 'a', null),
        );
    }
    // }}}

    // {{{ testMessageInfoEmptyStringNull
    /**
     * testMessageInfoEmptyStringNull
     *
     * @param mixed $a
     * @param mixed $b
     * @param mixed $c
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForMessage2
     */
    public function testMessageWithProvider($a, $b, $c)
    {
        $this->assertEmpty($this->callMethod('message', array($a, $b, $c)));
    }
    // }}}

    // {{{ testMessageRealUse
    /**
     * testMessageRealUse
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testMessageRealUse()
    {
        Bonzai_Utils::$silenced = false;
        ob_start();
          $this->callMethod('message', array('info', 'test'));
        $output = ob_get_clean();
        $this->assertRegExp('/^\[\d{2}:\d{2}:\d{2}\] test\n$/', $output);
        Bonzai_Utils::$silenced = true;
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
        $this->assertEmpty($this->object->warn(''));
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
        $this->assertEmpty($this->object->error(''));
    }
    // }}}
    // }}}
}
