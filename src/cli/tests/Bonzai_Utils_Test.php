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
// {{{ testRenameFile
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testRenameFile()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}

    // {{{ testRscandir1
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir1()
    {
        $value = null;
        Bonzai_Utils::rscandir(null, $value);
    }
    // }}}

    // {{{ testRscandir2
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir2()
    {
        $value = '';
        Bonzai_Utils::rscandir(null, $value);
    }
    // }}}

    // {{{ testRscandir3
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir3()
    {
        $value = ' ';
        Bonzai_Utils::rscandir(null, $value);
    }
    // }}}

    // {{{ testRscandir4
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir4()
    {
        $value = array();
        Bonzai_Utils::rscandir(null, $value);
    }
    // }}}

    // {{{ testRscandir5
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir5()
    {
        $value = array('a');
        Bonzai_Utils::rscandir(null, $value);
    }
    // }}}

    // {{{ testRscandir6
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir6()
    {
        $value = null;
        Bonzai_Utils::rscandir('', $value);
    }
    // }}}

    // {{{ testRscandir7
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir7()
    {
        $value = '';
        Bonzai_Utils::rscandir('', $value);
    }
    // }}}

    // {{{ testRscandir8
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir8()
    {
        $value = ' ';
        Bonzai_Utils::rscandir('', $value);
    }
    // }}}

    // {{{ testRscandir9
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir9()
    {
        $value = array();
        Bonzai_Utils::rscandir('', $value);
    }
    // }}}

    // {{{ testRscandir10
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir10()
    {
        $value = array('a');
        Bonzai_Utils::rscandir('', $value);
    }
    // }}}

    // {{{ testRscandir11
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir11()
    {
        $value = null;
        Bonzai_Utils::rscandir(' ', $value);
    }
    // }}}

    // {{{ testRscandir12
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir12()
    {
        $value = '';
        Bonzai_Utils::rscandir(' ', $value);
    }
    // }}}

    // {{{ testRscandir13
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir13()
    {
        $value = ' ';
        Bonzai_Utils::rscandir(' ', $value);
    }
    // }}}

    // {{{ testRscandir14
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir14()
    {
        $value = array();
        Bonzai_Utils::rscandir(' ', $value);
    }
    // }}}

    // {{{ testRscandir15
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir15()
    {
        $value = array('a');
        Bonzai_Utils::rscandir(' ', $value);
    }
    // }}}

    // {{{ testRscandir16
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir16()
    {
        $value = null;
        Bonzai_Utils::rscandir('a', $value);
    }
    // }}}

    // {{{ testRscandir17
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir17()
    {
        $value = '';
        Bonzai_Utils::rscandir('a', $value);
    }
    // }}}

    // {{{ testRscandir18
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir18()
    {
        $value = ' ';
        Bonzai_Utils::rscandir('a', $value);
    }
    // }}}

    // {{{ testRscandir19
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir19()
    {
        $value = array();
        Bonzai_Utils::rscandir('a', $value);
    }
    // }}}

    // {{{ testRscandir20
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testRscandir20()
    {
        $value = array('a');
        Bonzai_Utils::rscandir('a', $value);
    }
    // }}}

    // {{{ testRscandir21
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir21()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222); // -w--w--w-

        try {
            $value = null;
            Bonzai_Utils::rscandir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir22
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir22()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222); // -w--w--w-

        try {
            $value = '';
            Bonzai_Utils::rscandir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir23
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir23()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222); // -w--w--w-

        try {
            $value = ' ';
            Bonzai_Utils::rscandir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir24
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir24()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222); // -w--w--w-

        try {
            $value = array();
            Bonzai_Utils::rscandir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir25
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir25()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222); // -w--w--w-

        try {
            $value = array('a');
            Bonzai_Utils::rscandir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir26
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir26()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = null;
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir27
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir27()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = '';
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir28
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir28()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = ' ';
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir29
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir29()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = array();
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir30
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir30()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555); // r-xr-xr-x

        $value = array('a');
        $this->assertEquals(array('a'), Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777); // rwxrwxrwx
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir31
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir31()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = null;
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir32
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir32()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = '';
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir33
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir33()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = ' ';
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir34
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir34()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = array();
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir35
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir35()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $value = array('a');
        $this->assertEquals(array('a'), Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir36
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir36()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777); // rwxrwxrwx

        $dirname2 = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir("$dirname/$dirname2", 0222); // -w--w--w-

        $this->assertEquals(array("$dirname/$dirname2/"), Bonzai_Utils::rscandir($dirname));

        chmod("$dirname/$dirname2", 0777);
        rmdir("$dirname/$dirname2");
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir37
    /**
     * Return the all directories & files into a directory
     * @ignore
     * @access public
     * @return void
     */
    public function testRscandir37()
    {
        $dirname = realpath(__DIR__ . '/../');

        $files = Bonzai_Utils::rscandir($dirname);
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

    // {{{ testGetFileContent1
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContent1()
    {
        $this->assertNull(Bonzai_Utils::getFileContent(null));
    }
    // }}}

    // {{{ testGetFileContent2
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContent2()
    {
        $this->assertNull(Bonzai_Utils::getFileContent(''));
    }
    // }}}

    // {{{ testGetFileContent3
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContent3()
    {
        $this->assertNull(Bonzai_Utils::getFileContent(' '));
    }
    // }}}

    // {{{ testGetFileContent4
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContent4()
    {
        $this->assertEmpty(Bonzai_Utils::getFileContent('a'));
    }
    // }}}

    // {{{ testGetFileContent5
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileContent5()
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

    // {{{ testGetFileContent6
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileContent6()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555); // r-xr-xr-x

        $this->assertEmpty(Bonzai_Utils::getFileContent($filename));

        chmod($filename, 0777); // rwxrwxrwx
        unlink($filename);
    }
    // }}}

    // {{{ testGetFileContent7
    /**
     * Get the file's content
     * @ignore
     * @access public
     * @return void
     */
    public function testGetFileContent7()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::getFileContent($filename);

        unlink($filename);
    }
    // }}}

    // {{{ testPutFileContent1
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent1()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(null, null));
    }
    // }}}

    // {{{ testPutFileContent2
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent2()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(null, ''));
    }
    // }}}

    // {{{ testPutFileContent3
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent3()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(null, ' '));
    }
    // }}}

    // {{{ testPutFileContent4
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent4()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(null, 'a'));
    }
    // }}}

    // {{{ testPutFileContent5
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent5()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent('', null));
    }
    // }}}

    // {{{ testPutFileContent6
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent6()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent('', ''));
    }
    // }}}

    // {{{ testPutFileContent7
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent7()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent('', ' '));
    }
    // }}}

    // {{{ testPutFileContent8
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent8()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent('', 'a'));
    }
    // }}}

    // {{{ testPutFileContent9
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent9()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(' ', null));
    }
    // }}}

    // {{{ testPutFileContent10
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent10()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent(' ', ''));
    }
    // }}}

    // {{{ testPutFileContent11
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent11()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent(' ', ' '));
    }
    // }}}

    // {{{ testPutFileContent12
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent12()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent(' ', 'a'));
    }
    // }}}

    // {{{ testPutFileContent13
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent13()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent('a', null));

        unlink('a');
    }
    // }}}

    // {{{ testPutFileContent14
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent14()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent('a', ''));

        unlink('a');
    }
    // }}}

    // {{{ testPutFileContent15
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent15()
    {
        $this->assertEquals(1, Bonzai_Utils::putFileContent('a', ' '));

        unlink('a');
    }
    // }}}

    // {{{ testPutFileContent16
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent16()
    {
        $this->assertEquals(1, Bonzai_Utils::putFileContent('a', 'a'));

        unlink('a');
    }
    // }}}

    // {{{ testPutFileContent17
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent17()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, null);
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testPutFileContent18
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent18()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, '');
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testPutFileContent19
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent19()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, ' ');
        $this->assertEquals(' ', file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testPutFileContent20
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent20()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, 'a');
        $this->assertEquals('a', file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testPutFileContent21
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent21()
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

    // {{{ testPutFileContent22
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent22()
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

    // {{{ testPutFileContent23
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent23()
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

    // {{{ testPutFileContent24
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent24()
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

    // {{{ testPutFileContent25
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent25()
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

    // {{{ testPutFileContent26
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent26()
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

    // {{{ testPutFileContent27
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent27()
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

    // {{{ testPutFileContent28
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent28()
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

    // {{{ testPutFileContent29
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent29()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, null);
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testPutFileContent30
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent30()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, '');
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testPutFileContent31
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent31()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, ' ');
        $this->assertEquals(' ', file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testPutFileContent32
    /**
     * Return the status of saving
     * @ignore
     * @access public
     * @return void
     */
    public function testPutFileContent32()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, 'a');
        $this->assertEquals('a', file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testCheckFileValidity
    /**
     * @ignore
     * @access public
     * @return void
     */
    public static function checkFileValidity()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}

    // {{{ testMessage
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testMessage()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}

    // {{{ testInfo
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testInfo()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}

    // {{{ testWarn
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testWarn()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}

    // {{{ testError
    /**
     * @ignore
     * @access public
     * @return void
     */
    public function testError()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}
}
