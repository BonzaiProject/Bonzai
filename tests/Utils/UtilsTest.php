<?php
/**
 * BONZAI
 * (was phpGuardian)
 *
 * CODENAME:  caffeine
 * VERSION:   0.2
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

if (!defined('BONZAI_PATH_LIBS')) {
    define('BONZAI_PATH_LIBS', realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'libs') . DIRECTORY_SEPARATOR);
}

require_once BONZAI_PATH_LIBS . 'Tests'    . DIRECTORY_SEPARATOR . 'TestCase.php';
require_once BONZAI_PATH_LIBS . 'Abstract' . DIRECTORY_SEPARATOR . 'Abstract.php';
require_once BONZAI_PATH_LIBS . 'Utils'    . DIRECTORY_SEPARATOR . 'Options.php';
require_once BONZAI_PATH_LIBS . 'Utils'    . DIRECTORY_SEPARATOR . 'Utils.php';

/**
 * Bonzai_Utils_UtilsTest
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
    // {{{ PROPERTIES
    /**
     * Flag to decide whether instantiate automatically the class to be tested.
     *
     * @access protected
     * @var    boolean
     */
    protected $auto_instance = false;
    // }}}

    // {{{ setUp
    /**
     * PHPUnit setUp: instance the class if needed.
     *
     * @access protected
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        $className = substr(get_class($this), 0, -4); // Strip 'Test'

        if (!class_exists($className)) {
            $className = preg_replace('/_[^_]+$/', '', $className);
        }

        $this->object = new $className(new Bonzai_Utils_Options());
    }
    // }}}

    // {{{ __construct
    // Skipped the testing of `__construct` method.
    // }}}

    // {{{ backupFile
    // {{{ providerForBackupFile
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForBackupFile()
    {
        return $this->getFilledDataProvider(array(' ', 'a', array('a'), array(), null));
    }
    // }}}

    // {{{ testBackupFileWithProviderThrowException
    /**
     * TODO: Add a comment to this method
     *
     * @param mixed $filename The filename to be backup
     *
     * @ignore
     * @access                   public
     * @return                   void
     * @dataProvider             providerForBackupFile
     * @expectedException        Bonzai_Exception
     * @expectedExceptionCode    6534
     */
    public function testBackupFileWithProviderThrowException($filename)
    {
        $this->object->backupFile($filename);

        $file = is_array($filename)
                ? implode('', $filename)
                : $filename;
        $this->removeFile("$file.orig");
    }
    // }}}

    // {{{ testBackupFileParamExistentFileIsRenamed
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testBackupFileParamExistentFileIsRenamed()
    {
        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, 'a');

        $this->object->backupFile($filename);

        $this->assertFileExists("$filename.orig");
        $this->assertFileNotExists($filename);

        $this->removeFile("$filename.orig");
    }
    // }}}
    // }}}

    // {{{ recursiveScanDir
    // {{{ providerForRecursiveScanDir
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForRecursiveScanDir()
    {
        return $this->getFilledDataProvider(
            array(' ', '', null),
            array(array('a'), array())
        );
    }
    // }}}

    // {{{ testRecursiveScanDirWithProviderThrowException
    /**
     * TODO: Add a comment to this method
     *
     * @param mixed $base The base path where to start.
     * @param mixed $data The container of elements of scandir.
     *
     * @ignore
     * @access                   public
     * @return                   void
     * @dataProvider             providerForRecursiveScanDir
     * @expectedException        Bonzai_Exception
     * @expectedExceptionCode    6534
     */
    public function testRecursiveScanDirWithProviderThrowException($base, $data)
    {
        $this->object->recursiveScanDir($base, $data);
    }
    // }}}

    // {{{ providerForRecursiveScanDir2
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForRecursiveScanDir2()
    {
        return $this->getFilledDataProvider(array(array('a'), array()));
    }
    // }}}

    // {{{ testRecursiveScanDirWithProviderThrowException2
    /**
     * TODO: Add a comment to this method
     *
     * @param mixed $data The container of elements of scandir.
     *
     * @ignore
     * @access       public
     * @return       void
     * @dataProvider providerForRecursiveScanDir2
     */
    public function testRecursiveScanDirWithProviderThrowException2($data)
    {
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($this->getTempDir() . $dirname, 0222); // -w--w--w-

        try {
            $this->object->recursiveScanDir($dirname, $data);
            $this->fail("The exception was not threw.");
        } catch (Bonzai_Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($this->getTempDir() . $dirname, 0777); // rwxrwxrwx
        rmdir($this->getTempDir() . $dirname);
    }
    // }}}

    // {{{ providerForRecursiveScanDir3
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForRecursiveScanDir3()
    {
        return $this->getFilledDataProvider(array(array()));
    }
    // }}}

    // {{{ testRecursiveScanDirWithProviderIsEmpty
    /**
     * TODO: Add a comment to this method
     *
     * @param mixed $data The container of elements of scandir.
     *
     * @ignore
     * @access       public
     * @return       void
     * @dataProvider providerForRecursiveScanDir3
     */
    public function testRecursiveScanDirWithProviderIsEmpty($data)
    {
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $this->expectOutputString('');

        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($this->getTempDir() . $dirname, 0555); // r-xr-xr-x

        $this->object->recursiveScanDir($this->getTempDir() . $dirname, $data);

        chmod($this->getTempDir() . $dirname, 0777); // rwxrwxrwx
        rmdir($this->getTempDir() . $dirname);
    }
    // }}}

    // {{{ providerForRecursiveScanDir4
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForRecursiveScanDir4()
    {
        return $this->getFilledDataProvider(array(array()));
    }
    // }}}

    // {{{ testRecursiveScanDirWithProviderIsEmpty2
    /**
     * TODO: Add a comment to this method
     *
     * @param mixed $data The container of elements of scandir.
     *
     * @ignore
     * @access       public
     * @return       void
     * @dataProvider providerForRecursiveScanDir4
     */
    public function testRecursiveScanDirWithProviderIsEmpty2($data)
    {
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $this->expectOutputString('');

        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($this->getTempDir() . $dirname, 0777); // rwxrwxrwx

        $this->object->recursiveScanDir($this->getTempDir() . $dirname, $data);

        rmdir($this->getTempDir() . $dirname);
    }
    // }}}

    // {{{ testRecursiveScanDirWithParamsWritableArrayAreEquals
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRecursiveScanDirWithParamsWritableArrayAreEquals()
    {
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($this->getTempDir() . $dirname, 0777); // rwxrwxrwx

        $value = array('a');
        $this->assertEquals(array('a'), $this->object->recursiveScanDir($this->getTempDir() . $dirname, $value));
        rmdir($this->getTempDir() . $dirname);
    }
    // }}}

    // {{{ testRecursiveScanDirComplexCompareAreEquals
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRecursiveScanDirComplexCompareAreEquals()
    {
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $this->expectOutputRegex('/^\[\d{2}:\d{2}:\d{2}\] The directory .* was skipped because not readable/');

        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($this->getTempDir() . $dirname, 0777); // rwxrwxrwx

        $dirname2 = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . $dirname2, 0222); // -w--w--w-

        $value = $this->object->recursiveScanDir($this->getTempDir() . $dirname);
        $this->assertEquals(array($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . $dirname2), $value);

        chmod($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . $dirname2, 0777);
        rmdir($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . $dirname2);
        rmdir($this->getTempDir() . $dirname);
    }
    // }}}

    // {{{ testRecursiveScanDirCurrentDirectoriesAreEquals
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testRecursiveScanDirCurrentDirectoriesAreEquals()
    {
        $dirname = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);

        $files = $this->object->recursiveScanDir($dirname);
        sort($files);
        $files = preg_grep('/\.(php|sh)$/', $files);
        foreach ($files as $i => $file) {
            $files[$i] = str_replace(realpath($dirname . DIRECTORY_SEPARATOR), '', $file);
        }
        $files = preg_grep('/^[\\\\\/](src|tests|bin)/', $files);
        $files = array_merge($files);

        $realfiles = array(
            DIRECTORY_SEPARATOR . 'bin'   . DIRECTORY_SEPARATOR . 'build.sh',
            DIRECTORY_SEPARATOR . 'src'   . DIRECTORY_SEPARATOR . 'libs'       . DIRECTORY_SEPARATOR . 'Abstract'   . DIRECTORY_SEPARATOR . 'Abstract.php',
            DIRECTORY_SEPARATOR . 'src'   . DIRECTORY_SEPARATOR . 'libs'       . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'Controller.php',
            DIRECTORY_SEPARATOR . 'src'   . DIRECTORY_SEPARATOR . 'libs'       . DIRECTORY_SEPARATOR . 'Encoder'    . DIRECTORY_SEPARATOR . 'Encoder.php',
            DIRECTORY_SEPARATOR . 'src'   . DIRECTORY_SEPARATOR . 'libs'       . DIRECTORY_SEPARATOR . 'Exception'  . DIRECTORY_SEPARATOR . 'Exception.php',
            DIRECTORY_SEPARATOR . 'src'   . DIRECTORY_SEPARATOR . 'libs'       . DIRECTORY_SEPARATOR . 'Task'       . DIRECTORY_SEPARATOR . 'Abstract.php',
            DIRECTORY_SEPARATOR . 'src'   . DIRECTORY_SEPARATOR . 'libs'       . DIRECTORY_SEPARATOR . 'Task'       . DIRECTORY_SEPARATOR . 'Execute.php',
            DIRECTORY_SEPARATOR . 'src'   . DIRECTORY_SEPARATOR . 'libs'       . DIRECTORY_SEPARATOR . 'Task'       . DIRECTORY_SEPARATOR . 'Interface.php',
            DIRECTORY_SEPARATOR . 'src'   . DIRECTORY_SEPARATOR . 'libs'       . DIRECTORY_SEPARATOR . 'Tests'      . DIRECTORY_SEPARATOR . 'TestCase.php',
            DIRECTORY_SEPARATOR . 'src'   . DIRECTORY_SEPARATOR . 'libs'       . DIRECTORY_SEPARATOR . 'Utils'      . DIRECTORY_SEPARATOR . 'Help.php',
            DIRECTORY_SEPARATOR . 'src'   . DIRECTORY_SEPARATOR . 'libs'       . DIRECTORY_SEPARATOR . 'Utils'      . DIRECTORY_SEPARATOR . 'Options.php',
            DIRECTORY_SEPARATOR . 'src'   . DIRECTORY_SEPARATOR . 'libs'       . DIRECTORY_SEPARATOR . 'Utils'      . DIRECTORY_SEPARATOR . 'Utils.php',
            DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'Abstract'   . DIRECTORY_SEPARATOR . 'AbstractTest.php',
            DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'ControllerTest.php',
            DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'Encoder'    . DIRECTORY_SEPARATOR . 'EncoderTest.php',
            DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'Task'       . DIRECTORY_SEPARATOR . 'ExecuteTest.php',
            DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'Test.php',
            DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'Utils'      . DIRECTORY_SEPARATOR . 'HelpTest.php',
            DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'Utils'      . DIRECTORY_SEPARATOR . 'OptionsTest.php',
            DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'Utils'      . DIRECTORY_SEPARATOR . 'UtilsTest.php'
        );

        $this->assertEquals($realfiles, $files);
    }
    // }}}
    // }}}

    // {{{ getFileContent
    // {{{ providerForGetFileContent
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForGetFileContent()
    {
        return $this->getFilledDataProvider(array(null, '', ' ', 'a'));
    }
    // }}}

    // {{{ testGetFileContentWithProviderThrowException
    /**
     * TODO: Add a comment to this method
     *
     * @param mixed $filename The file where read the content.
     *
     * @ignore
     * @access                   public
     * @return                   void
     * @dataProvider             providerForGetFileContent
     * @expectedException        Bonzai_Exception
     * @expectedExceptionCode    6534
     */
    public function testGetFileContentWithProviderThrowException($filename)
    {
        $this->object->getFileContent($filename);
    }
    // }}}

    // {{{ testGetFileContentWithParamsNotReadableThrowException
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileContentWithParamsNotReadableThrowException()
    {
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0333); // -wx-wx-wx

        try {
            $this->object->getFileContent($filename);
            $this->fail("The exception was not threw.");
        } catch (Bonzai_Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        $this->removeFile($filename);
    }
    // }}}

    // {{{ testGetFileContentWithParamsNotWritableIsEmpty
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileContentWithParamsNotWritableIsEmpty()
    {
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555); // r-xr-xr-x

        try {
            $this->object->getFileContent($filename);
            $this->fail("The exception was not threw.");
        } catch (Bonzai_Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        $this->removeFile($filename);
    }
    // }}}

    // {{{ testGetFileContentWithParamTemp
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileContentWithParamTemp()
    {
        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, '');

        try {
            $this->object->getFileContent($filename);
            $this->fail("The exception was not threw.");
        } catch (Bonzai_Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        $this->removeFile($filename);
    }
    // }}}
    // }}}

    // {{{ putFileContent
    // {{{ testPutFileContentJustCoverage
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContentJustCoverage()
    {
        $this->markTestIncomplete('TBW');
    }
    // }}}
    // }}}

    // {{{ checkFileValidity
    // {{{ providerForCheckFileValidity
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForCheckFileValidity()
    {
        return $this->getFilledDataProvider(
            array(' ', '', 'a', array('a'), array(), null),
            array(' ', '', 'a', array('a'), array(), true, null) // TODO: removed false
        );
    }
    // }}}

    // {{{ testCheckFileValidityWithProviderThrowException
    /**
     * TODO: Add a comment to this method
     *
     * @param mixed $filename    The filename to be checked.
     * @param mixed $file_exists Flag to determine whether some check will be ignored.
     *
     * @ignore
     * @access                   public
     * @return                   void
     * @dataProvider             providerForCheckFileValidity
     * @expectedException        Bonzai_Exception
     * @expectedExceptionCode    6534
     */
    public function testCheckFileValidityWithProviderThrowException($filename, $file_exists)
    {
        $this->object->checkFileValidity($filename, $file_exists);
    }
    // }}}

    // {{{ testCheckFileValidityParamEmptyString
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileValidityParamEmptyString()
    {
        $this->expectOutputString('');

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, 'a');

        $this->object->checkFileValidity($filename);

        $this->removeFile($filename);
    }
    // }}}

    // {{{ testCheckFileValidityParamSpacedString
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileValidityParamSpacedString()
    {
        $this->expectOutputString('');

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, 'a');

        $this->object->checkFileValidity($filename);

        $this->removeFile($filename);
    }
    // }}}

    // {{{ testCheckFileValidityParamFake
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileValidityParamFake()
    {
        $this->expectOutputString('');

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, 'a');

        $this->object->checkFileValidity($filename);

        $this->removeFile($filename);
    }
    // }}}

    // {{{ testCheckFileValidityParamNull
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileValidityParamNull()
    {
        $this->expectOutputString('');

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, 'a');

        $this->object->checkFileValidity($filename);

        $this->removeFile($filename);
    }
    // }}}

    // {{{ testCheckFileValidityParamEmptyArray
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileValidityParamEmptyArray()
    {
        $this->expectOutputString('');

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, 'a');

        $this->object->checkFileValidity($filename);

        $this->removeFile($filename);
    }
    // }}}

    // {{{ testCheckFileValidityParamArray
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testCheckFileValidityParamArray()
    {
        $this->expectOutputString('');

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, 'a');

        $this->object->checkFileValidity($filename);

        $this->removeFile($filename);
    }
    // }}}

    // {{{ testCheckFileValidityParamCurrentFile
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access                   public
     * @return                   void
     * @expectedException        Bonzai_Exception
     * @expectedExceptionCode    6534
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
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testInfoJustCoverage()
    {
        $this->expectOutputString('');

        $this->object->info('');
    }
    // }}}
    // }}}

    // {{{ message
    // {{{ providerForMessage
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForMessage()
    {
        return $this->getFilledDataProvider(
            array(' ', '', 'a', 'error', 'info', 'warn', array('a'), array(), null),
            array('%s %d', array(), null),
            array(' ', '', 'a', 0, 1, array('a'), array(), null)
        );
    }
    // }}}

    // {{{ testMessageWithProviderThrowException
    /**
     * TODO: Add a comment to this method
     *
     * @param mixed $type The type of message.
     * @param mixed $text The text to be printed.
     * @param mixed $args The any parameters to be replaced in the text.
     *
     * @ignore
     * @access                   public
     * @return                   void
     * @dataProvider             providerForMessage
     * @expectedException        Bonzai_Exception
     * @expectedExceptionCode    6534
     */
    public function testMessageWithProviderThrowException($type, $text, $args)
    {
        $this->expectOutputString('');
        Bonzai_Utils_Utils::$silenced = true;

        $this->callMethod('message', array($type, $text, $args));

        Bonzai_Utils_Utils::$silenced = false;
    }
    // }}}

    // {{{ providerForMessage2
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForMessage2()
    {
        return $this->getFilledDataProvider(
            array(' ', '', 'a', 'error', 'info', 'warn', array('a'), array(), null),
            array(' ', '%s', '', 'a'),
            array(' ', '', 'a', 0, 1, array('a'), array(), null)
        );
    }
    // }}}

    // {{{ testMessageWithProvider
    /**
     * TODO: Add a comment to this method
     *
     * @param mixed $type The type of message.
     * @param mixed $text The text to be printed.
     * @param mixed $args The any parameters to be replaced in the text.
     *
     * @ignore
     * @access       public
     * @return       void
     * @dataProvider providerForMessage2
     */
    public function testMessageWithProvider($type, $text, $args)
    {
        $this->expectOutputString('');
        Bonzai_Utils_Utils::$silenced = true;

        $this->callMethod('message', array($type, $text, $args));

        Bonzai_Utils_Utils::$silenced = false;
    }
    // }}}

    // {{{ testMessageRealUse
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testMessageRealUse()
    {
        Bonzai_Utils_Utils::$silenced = false;
        ob_start();
          $this->callMethod('message', array('info', 'test'));
        $output = ob_get_clean();
        $this->assertRegExp('/^\[\d{2}:\d{2}:\d{2}\] test.*$/', $output);
        Bonzai_Utils_Utils::$silenced = true;
    }
    // }}}
    // }}}

    // {{{ composeMessage
    // {{{ testComposeMessageJustCoverage
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testComposeMessageJustCoverage()
    {
        $this->markTestIncomplete('TBW');
    }
    // }}}
    // }}}

    // {{{ warn
    // {{{ testWarnJustCoverage
    /**
     * Only code-coverage of `warn` method.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testWarnJustCoverage()
    {
        $this->expectOutputString('');

        $this->object->warn('');
    }
    // }}}
    // }}}

    // {{{ error
    // {{{ testErrorJustCoverage
    /**
     * Only code-coverage of `error` method.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testErrorJustCoverage()
    {
        $this->expectOutputString('');

        $this->object->error('');
    }
    // }}}
    // }}}

    // {{{ printHeader
    // {{{ testPrintHeaderJustCoverage
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testPrintHeaderJustCoverage()
    {
        $this->markTestIncomplete('TBW');
    }
    // }}}
    // }}}
}
