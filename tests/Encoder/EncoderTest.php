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
    define('BONZAI_PATH_LIBS', realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'libs') . DIRECTORY_SEPARATOR);
}

require_once BONZAI_PATH_LIBS . 'Tests'    . DIRECTORY_SEPARATOR . 'TestCase.php';
require_once BONZAI_PATH_LIBS . 'Abstract' . DIRECTORY_SEPARATOR . 'Abstract.php';
require_once BONZAI_PATH_LIBS . 'Task'     . DIRECTORY_SEPARATOR . 'Interface.php';
require_once BONZAI_PATH_LIBS . 'Utils'    . DIRECTORY_SEPARATOR . 'Utils.php';
require_once BONZAI_PATH_LIBS . 'Utils'    . DIRECTORY_SEPARATOR . 'Options.php';
require_once BONZAI_PATH_LIBS . 'Encoder'  . DIRECTORY_SEPARATOR . 'Encoder.php';

/**
 * Bonzai_Encoder_EncoderTest
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
class Bonzai_Encoder_EncoderTest extends Bonzai_TestCase
{
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

        $options = new Bonzai_Utils_Options();
        $this->object->setOptions($options);
        $utils = $this->object->getUtils($options);
    }
    // }}}

    // {{{ setOptions
    // {{{ testSetOptionsJustCoverage
    /**
     * Only code-coverage of `setOptions` method.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testSetOptionsJustCoverage()
    {
        $this->expectOutputString('');
        $this->object->setOptions(new Bonzai_Utils_Options());
    }
    // }}}
    // }}}

    // {{{ elaborate
    // {{{ testElaborateJustCoverage
    /**
     * Only code-coverage of `elaborate` method.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testElaborateJustCoverage()
    {
        $this->expectOutputRegex('/^.*BONZAI +\(was phpGuardian\).*$/s');
        $this->object->elaborate();
    }
    // }}}
    // }}}

    // {{{ processFileList
    // {{{ testProcessFileListJustCoverage
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testProcessFileListJustCoverage()
    {
        $this->markTestIncomplete('TBW');
    }
    // }}}
    // }}}

    // {{{ processFile
    // {{{ providerForProcessFile
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForProcessFile()
    {
        return $this->getFilledDataProvider(array(' ', '', '1', null));
    }
    // }}}

    // {{{ testProcessFileWithProviderThrowException
    /**
     * Test if `processFile` method throw an exception for invalid files.
     *
     * @param mixed $file The file to be encoded.
     *
     * @ignore
     * @access                   public
     * @return                   void
     * @dataProvider             providerForProcessFile
     * @expectedException        Bonzai_Exception
     * @expectedExceptionCode    6534
     */
    public function testProcessFileWithProviderThrowException($file)
    {
        $this->callMethod('processFile', array($file));
        $this->removeFile($file);
    }
    // }}}

    // {{{ testProcessFileWithParamEmptyFileFileIsEmpty
    /**
     * Test if `processFile` method throw an exception for an empty file.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testProcessFileWithParamEmptyFileFileIsEmpty()
    {
        $filename = tempnam($this->getTempDir(), 'test_');

        file_put_contents($filename, '');

        $this->expectOutputRegex('/^\[\d{2}:\d{2}:\d{2}\] Start encoding file .*$/');

        try {
            $this->callMethod('processFile', array($filename));
            $this->fail('The exception was not threw.');
        } catch(Bonzai_Exception $e) {
            $this->assertRegExp('/^' . sprintf(gettext('The file `%s` is empty.'), '.+(\/test_[a-zA-Z0-9]+|\\\\tes[a-zA-Z0-9]+\.tmp)') . '$/', $e->getMessage());

            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        $this->removeFile($filename);
    }
    // }}}

    // {{{ testProcessFileWithParamSizedFileFileIsNotReadable
    /**
     * Test if `processFile` method throw an exception for a not-readable file.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testProcessFileWithParamSizedFileFileIsNotReadable()
    {
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0333); // -wx-wx-wx

        $this->expectOutputRegex('/^\[\d{2}:\d{2}:\d{2}\] Start encoding file .*$/');

        try {
            $this->callMethod('processFile', array($filename));
            $this->fail('The exception was not threw. ' . $filename);
        } catch(Bonzai_Exception $e) {
            $this->assertRegExp('/^' . sprintf(gettext('The file `%s` is not readable.'), '.+(\/test_[a-zA-Z0-9]+|\\\\tes[a-zA-Z0-9]+\.tmp)') . '$/', $e->getMessage());

            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        $this->removeFile($filename);
    }
    // }}}

    // {{{ testProcessFileWithParamNotWritableSizedFileFileIsEmpty
    /**
     * Test if `processFile` method does nothing for a not-writable file.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testProcessFileWithParamNotWritableSizedFileFileIsEmpty()
    {
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $this->expectOutputRegex('/^\[\d{2}:\d{2}:\d{2}\].*-+/s');

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0555); // r-xr-xr-x

        $this->callMethod('processFile', array($filename));

        $this->removeFile($filename);
    }
    // }}}

    // {{{ testProcessFileWithParamSizedFileFileIsEmpty
    /**
     * Test if `processFile` method does nothing for a not-writable file.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testProcessFileWithParamSizedFileFileIsEmpty()
    {
        $this->expectOutputRegex('/^\[\d{2}:\d{2}:\d{2}\].*-+/s');

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?' . '>');

        $this->callMethod('processFile', array($filename));

        $this->removeFile($filename);
    }
    // }}}
    // }}}

    // {{{ saveOutput
    // {{{ providerForSaveOutput
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForSaveOutput()
    {
        return $this->getFilledDataProvider(
            array(' ', '', 'b', 'c', 'd', 'e', 'f', 'g', null, tempnam($this->getTempDir(), 'test_')),
            array(' ', '', 'a', array('a'), array(), null)
        );
    }
    // }}}

    // {{{ testSaveOutputWithProvider
    /**
     * TODO: Add a comment to this method
     *
     * @param mixed $filename The filename where save the output.
     * @param mixed $bytecode The content to be saved.
     *
     * @ignore
     * @access       public
     * @return       void
     * @dataProvider providerForSaveOutput
     */
    public function testSaveOutputWithProvider($filename, $bytecode)
    {
        $this->expectOutputString('');

        Bonzai_Utils_Utils::$silenced = true;

        $this->callMethod('saveOutput', array($filename, $bytecode));

        $this->removeFile($filename);

        Bonzai_Utils_Utils::$silenced = false;
    }
    // }}}
    // }}}

    // {{{ getByteCode
    // {{{ providerForGetByteCode
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForGetByteCode()
    {
        return $this->getFilledDataProvider(array(' ', '', '2', null));
    }
    // }}}

    // {{{ testGetByteCodeWithProviderIsInvalid
    /**
     * TODO: Add a comment to this method
     *
     * @param mixed $filename The filename where extract the byte-code.
     *
     * @ignore
     * @access       public
     * @return       void
     * @dataProvider providerForGetByteCode
     */
    public function testGetByteCodeWithProviderIsInvalid($filename)
    {
        try {
            $this->callMethod('getByteCode', array($filename));
            $this->fail('The exception was not threw.');
        } catch(Bonzai_Exception $e) {
            $this->assertRegExp('/^' . sprintf(gettext('The file `%s` is invalid.'), strval($filename)) . '$/', $e->getMessage());
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        $this->removeFile($filename);
    }
    // }}}

    // {{{ providerForGetByteCode2
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForGetByteCode2()
    {
        return $this->getFilledDataProvider(array(0777, 0555)); // rwxrwxrwx, r-xr-xr-x
    }
    // }}}

    // {{{ testGetByteCodeWithProviderIsEmpty
    /**
     * TODO: Add a comment to this method
     *
     * @param mixed $permission The permission mode
     *
     * @ignore
     * @access       public
     * @return       void
     * @dataProvider providerForGetByteCode2
     */
    public function testGetByteCodeWithProviderIsEmpty($permission)
    {
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, '');
        chmod($filename, $permission);

        try {
            $this->callMethod('getByteCode', array($filename));
            $this->fail('The exception was not threw.');
        } catch(Bonzai_Exception $e) {
            $this->assertRegExp('/^' . sprintf(gettext('The file `%s` is empty.'), '.+(\/test_[a-zA-Z0-9]+|\\\\tes[a-zA-Z0-9]+\.tmp)') . '$/', $e->getMessage());

            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        $this->removeFile($filename);
    }
    // }}}

    // {{{ testGetByteCodeWithParamSizedFileFileIsNotReadable
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCodeWithParamSizedFileFileIsNotReadable()
    {
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0333); // -wx-wx-wx

        try {
            $this->callMethod('getByteCode', array($filename));
            $this->fail('The exception was not threw.');
        } catch(Bonzai_Exception $e) {
            $this->assertRegExp('/^' . sprintf(gettext('The file `%s` is not readable.'), '.+(\/test_[a-zA-Z0-9]+|\\\\tes[a-zA-Z0-9]+\.tmp)') . '$/', $e->getMessage());

            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        $this->removeFile($filename);
    }
    // }}}

    // {{{ testGetByteCodeWithParamSizedFileFileIsNotValid
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetByteCodeWithParamSizedFileFileIsNotValid()
    {
        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?' . '>');

        $bytecode = $this->callMethod('getByteCode', array($filename));

        $this->assertRegExp('/bcompiler v/', $bytecode);

        $this->removeFile($filename);
    }
    // }}}
    // }}}

    // {{{ expandPathsToFiles
    // {{{ providerForExpandPathsToFiles
    /**
     * Data Provider.
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForExpandPathsToFiles()
    {
        return $this->getFilledDataProvider(array(' ', '', '3', array('4'), array(), null));
    }
    // }}}

    // {{{ testExpandPathsToFilesWithProviderAreEquals
    /**
     * TODO: Add a comment to this method
     *
     * @param mixed $files The array of mixed values to be converted.
     *
     * @ignore
     * @access       public
     * @return       void
     * @dataProvider providerForExpandPathsToFiles
     */
    public function testExpandPathsToFilesWithProviderAreEquals($files)
    {
        Bonzai_Utils_Utils::$silenced = true;

        $value = $this->callMethod('expandPathsToFiles', array($files));
        $this->assertEquals(array(), $value);

        Bonzai_Utils_Utils::$silenced = false;
    }
    // }}}

    // {{{ testExpandPathsToFilesWithParamArrayAreEquals2
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testExpandPathsToFilesWithParamArrayAreEquals2()
    {
        $dirname = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);

        $files = $this->callMethod('expandPathsToFiles', array(array(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR)));
        sort($files);
        $files = preg_grep('#/test_.+$|\.swp$|\.git#', $files, PREG_GREP_INVERT);
        $files = array_merge($files);
        foreach ($files as $i => $file) {
            $files[$i] = str_replace(realpath($dirname . DIRECTORY_SEPARATOR), '', $file);
        }

        $realfiles = array(
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

    // {{{ testExpandPathsToFilesWithParamUnreadableAreEquals
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testExpandPathsToFilesWithParamUnreadableAreEquals()
    {
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $this->expectOutputRegex('/^\[\d{2}:\d{2}:\d{2}\] The directory .* was skipped because not readable/');

        $dirname = realpath(dirname(__FILE__) . '/../');

        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($this->getTempDir() . $dirname, 0777); // rwxrwxrwx
        file_put_contents($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . 'file.php', 'test');
        mkdir($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . $dirname, 0222); // -w--w--w-

        $files = $this->callMethod('expandPathsToFiles', array(array($this->getTempDir() . $dirname)));
        sort($files);

        $realfiles = array($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . 'file.php');

        $this->assertEquals($realfiles, $files);

        chmod($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . $dirname, 0777); // rwxrwxrwx
        chmod($this->getTempDir() . $dirname, 0777); // rwxrwxrwx

        $this->removeFile($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . 'file.php');

        rmdir($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . $dirname);
        rmdir($this->getTempDir() . $dirname);
    }
    // }}}
    // }}}

    // {{{ getTotalFiles
    // {{{ testGetTotalFilesJustCoverage
    /**
     * Only code-coverage of `getTotalFiles` method.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetTotalFilesJustCoverage()
    {
        $this->assertEquals(0, $this->object->getTotalFiles());
    }
    // }}}
    // }}}

    // {{{ getSkippedFiles
    // {{{ testGetSkippedFilesJustCoverage
    /**
     * Only code-coverage of `getSkippedFiles` method.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetSkippedFilesJustCoverage()
    {
        $this->assertEquals(array(), $this->object->getSkippedFiles());
    }
    // }}}
    // }}}
}
