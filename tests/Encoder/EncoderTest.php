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

require_once BONZAI_PATH_LIBS . 'Tests'     . DIRECTORY_SEPARATOR . 'TestCase.php';
require_once BONZAI_PATH_LIBS . 'Abstract'  . DIRECTORY_SEPARATOR . 'Abstract.php';
require_once BONZAI_PATH_LIBS . 'Interface' . DIRECTORY_SEPARATOR . 'Task.php';
require_once BONZAI_PATH_LIBS . 'Utils'     . DIRECTORY_SEPARATOR . 'Utils.php';
require_once BONZAI_PATH_LIBS . 'Utils'     . DIRECTORY_SEPARATOR . 'Options.php';
require_once BONZAI_PATH_LIBS . 'Encoder'   . DIRECTORY_SEPARATOR . 'Encoder.php';

/**
 * Bonzai_Encoder_Test
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
        $this->assertEmpty(
            $this->object->elaborate(new Bonzai_Utils_Options())
        );
    }
    // }}}
    // }}}

    // {{{ processFile
    // {{{ providerForProcessFile
    /**
     * providerForProcessFile
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForProcessFile()
    {
        return array(
            array(null),
            array(''),
            array('1'),
            array(' '),
        );
    }
    // }}}

    // {{{ testProcessFileWithProviderThrowException
    /**
     * Process a file
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     * @dataProvider providerForProcessFile
     */
    public function testProcessFileWithProviderThrowException($a)
    {
        $this->callMethod(
            'processFile',
            array($a)
        );

        if (is_string($a) && is_file($a)) {
            unlink($a);
        }
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
        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, '');

        try {
            $this->callMethod(
                'processFile',
                array($filename)
            );
            $this->fail("The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp(
                '/^' . sprintf(gettext('The file `%s` is empty.'), '.+(\/test_[a-zA-Z0-9]+|\\\\tes[a-zA-Z0-9]+\.tmp)') . '$/',
                $e->getMessage()
            );

            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
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
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0333); // -wx-wx-wx

        try {
            $this->callMethod(
                'processFile',
                array($filename)
            );
            $this->fail("The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp(
                '/^' . sprintf(gettext('The file `%s` is not readable.'), '.+(\/test_[a-zA-Z0-9]+|\\\\tes[a-zA-Z0-9]+\.tmp)') . '$/',
                $e->getMessage()
            );

            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
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
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0555); // r-xr-xr-x

        $this->assertEmpty(
            $this->callMethod('processFile', array($filename))
        );

        chmod($filename, 0777); // rwxrwxrwx
        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
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
        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?' . '>');

        $this->assertEmpty(
            $this->callMethod(
                'processFile',
                array($filename)
            )
        );

        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
    }
    // }}}
    // }}}

    // {{{ saveOutput
    // {{{ providerForSaveOutput
    /**
     * providerForSaveOutput
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForSaveOutput()
    {
        return array(
            array(' ', ' '),
            array(' ', ''),
            array(' ', 'a'),
            array(' ', array('a')),
            array(' ', array()),
            array(' ', null),
            array('', ' '),
            array('', ''),
            array('', 'a'),
            array('', array('a')),
            array('', array()),
            array('', null),
            array('b', ' '),
            array('c', ''),
            array('d', 'a'),
            array('e', array('a')),
            array('f', array()),
            array('g', null),
            array(array('h'), ' '),
            array(array('i'), ''),
            array(array('j'), 'a'),
            array(array('k'), array('a')),
            array(array('l'), array()),
            array(array('m'), null),
            array(array(), ' '),
            array(array(), ''),
            array(array(), 'a'),
            array(array(), array('a')),
            array(array(), array()),
            array(array(), null),
            array(null, ' '),
            array(null, ''),
            array(null, 'a'),
            array(null, array('a')),
            array(null, array()),
            array(null, null),
            array(tempnam('.', 'test_'), ' '),
            array(tempnam('.', 'test_'), ''),
            array(tempnam('.', 'test_'), 'a'),
            array(tempnam('.', 'test_'), array('a')),
            array(tempnam('.', 'test_'), array()),
            array(tempnam('.', 'test_'), null),
        );
    }
    // }}}

    // {{{ testSaveOutputWithProviderJustCoverage
    /**
     * testSaveOutputWithProviderJustCoverage
     *
     * @param mixed $a
     * @param mixed $b
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForSaveOutput
     */
    public function testSaveOutputWithProviderJustCoverage($a, $b)
    {
        $this->assertEmpty(
            $this->callMethod(
                'saveOutput',
                array($a, $b)
            )
        );

        $a = is_array($a) ? implode('', $a) : strval($a);
        if (!empty($a) && is_file($a)) {
            unlink($a);
        }
    }
    // }}}
    // }}}

    // {{{ getByteCode
    // {{{ providerForGetByteCode
    /**
     * providerForGetByteCode
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForGetByteCode()
    {
        return array(
            array(null),
            array(''),
            array(' '),
            array('2'),
        );
    }
    // }}}

    // {{{ testGetByteCodeWithProviderIsInvalid
    /**
     * Get the bytecode
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForGetByteCode
     */
    public function testGetByteCodeWithProviderIsInvalid($a)
    {
        try {
            $this->callMethod('getByteCode', array($a));
            $this->fail("The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp(
                '/^' . sprintf(gettext('The file `%s` is invalid.'), strval($a)) . '$/',
                $e->getMessage()
            );
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        if (is_string($a) && is_file($a)) {
            unlink($a);
        }
    }
    // }}}

    // {{{ providerForGetByteCode2
    /**
     * providerForGetByteCode2
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForGetByteCode2()
    {
        return array(
            array(0777), // rwxrwxrwx
            array(0555), // r-xr-xr-x
        );
    }
    // }}}

    // {{{ testGetByteCodeWithParamEmptyFileFileIsEmpty
    /**
     * Get the bytecode
     *
     * @param mixed $a
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForGetByteCode2
     */
    public function testGetByteCodeWithProviderIsEmpty($a)
    {
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, '');
        chmod($filename, $a);

        try {
            $this->callMethod('getByteCode', array($filename));
            $this->fail("The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp(
                '/^' . sprintf(gettext('The file `%s` is empty.'), '.+(\/test_[a-zA-Z0-9]+|\\\\tes[a-zA-Z0-9]+\.tmp)') . '$/',
                $e->getMessage()
            );

            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
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
        if (strtolower(PHP_OS) == 'winnt' || strtolower(PHP_OS) == 'win32') {
            $this->markTestSkipped('The chmod isn\'t available on Windows.');
        }

        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0333); // -wx-wx-wx

        try {
            $this->callMethod('getByteCode', array($filename));
            $this->fail("The exception was not threw.");
        } catch(Exception $e) {
            $this->assertRegExp(
                '/^' . sprintf(gettext('The file `%s` is not readable.'), '.+(\/test_[a-zA-Z0-9]+|\\\\tes[a-zA-Z0-9]+\.tmp)') . '$/',
                $e->getMessage()
            );

            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777); // rwxrwxrwx
        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
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
        $filename = tempnam($this->getTempDir(), 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?' . '>');

        $bytecode = $this->callMethod('getByteCode', array($filename));

        $this->assertRegExp('/bcompiler v/', $bytecode);

        if (is_string($filename) && is_file($filename)) {
            unlink($filename);
        }
    }
    // }}}
    // }}}

    // {{{ expandPathsToFiles
    // {{{ providerForExpandPathsToFiles
    /**
     * providerForExpandPathsToFiles
     *
     * @ignore
     * @access public
     * @return array
     */
    public function providerForExpandPathsToFiles()
    {
        return array(
            array(''),
            array(null),
            array('3'),
            array(' '),
            array(array()),
            array(array('4')),
        );
    }
    // }}}

    // {{{ testExpandPathsToFilesWithProviderAreEquals
    /**
     * testExpandPathsToFilesWithProviderAreEquals
     *
     * @ignore
     * @access public
     * @return void
     * @dataProvider providerForExpandPathsToFiles
     */
    public function testExpandPathsToFilesWithProviderAreEquals()
    {
        $value = $this->callMethod('expandPathsToFiles', array(''));
        $this->assertEquals(array(), $value);
    }
    // }}}

    // {{{ testExpandPathsToFilesWithParamArrayAreEquals2
    /**
     * testExpandPathsToFilesWithParamArrayAreEquals
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testExpandPathsToFilesWithParamArrayAreEquals2()
    {
        $dirname = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);

        $files = $this->callMethod(
            'expandPathsToFiles',
            array(array(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR))
        );
        sort($files);
        $files = preg_grep(
            '#/test_.+$|\.swp$|\.git#',
            $files,
            PREG_GREP_INVERT
        );
        $files = array_merge($files);
        foreach ($files as $i => $file) {
            $files[$i] = str_replace(realpath($dirname . DIRECTORY_SEPARATOR), '', $file);
        }

        $realfiles = array(

            DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'ControllerTest.php',
            DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'Encoder'    . DIRECTORY_SEPARATOR . 'EncoderTest.php',
            DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'Task'       . DIRECTORY_SEPARATOR . 'TaskTest.php',
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
        mkdir($this->getTempDir() . $dirname, 0777); // rwxrwxrwx
        file_put_contents($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . 'file.php', 'test');
        mkdir($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . $dirname, 0222); // -w--w--w-

        $files = $this->callMethod(
            'expandPathsToFiles',
            array(array($dirname))
        );
        sort($files);

        $realfiles = array(
            getcwd() . DIRECTORY_SEPARATOR . $dirname . DIRECTORY_SEPARATOR . 'file.php'
        );

        $this->assertEquals($realfiles, $files);

        chmod($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . $dirname, 0777); // rwxrwxrwx
        chmod($this->getTempDir() . $dirname, 0777); // rwxrwxrwx
        if (is_string($dirname . DIRECTORY_SEPARATOR . 'file.php') && is_file($dirname . DIRECTORY_SEPARATOR . 'file.php')) {
            unlink($dirname . DIRECTORY_SEPARATOR . 'file.php');
        }
        rmdir($this->getTempDir() . $dirname . DIRECTORY_SEPARATOR . $dirname);
        rmdir($this->getTempDir() . $dirname);
    }
    // }}}
    // }}}
}
