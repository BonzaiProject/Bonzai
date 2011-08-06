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

require_once dirname(__FILE__) . '/../libs/Tests/TestCase.php';
require_once dirname(__FILE__) . '/../libs/Exception/Exception.php';
require_once dirname(__FILE__) . '/../libs/Utils/Utils.php';

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
    // WHAT: get the path of file
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFilePath1()
    {
        Bonzai_Utils::getFilePath(null);
    }

    // WHAT: get the path of file
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFilePath2()
    {
        Bonzai_Utils::getFilePath('');
    }

    // WHAT: get the path of file
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFilePath3()
    {
        Bonzai_Utils::getFilePath(' ');
    }

    // WHAT: get the path of file
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFilePath4()
    {
        Bonzai_Utils::getFilePath('a');
    }

    // WHAT: get the path of file
    public function testGetFilePath5()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0333);

        try {
            Bonzai_Utils::getFilePath($filename);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777);
        unlink($filename);
    }

    // WHAT: get the path of file
    public function testGetFilePath6()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0555);

        $this->assertEquals($filename, Bonzai_Utils::getFilePath($filename));

        chmod($filename, 0777);
        unlink($filename);
    }

    // WHAT: get the path of file
    public function testGetFilePath7()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'aaa');

        Bonzai_Utils::getFilePath($filename);

        unlink($filename);
    }

    public function testRenameFile()
    {
        // TODO:   Bonzai_Utils::renameFile($filename, $backup = true);
        // INPUT:  filename, backup
        // OUTPUT: void
        // WHAT:   rename a file
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir1()
    {
        $value = null;
        Bonzai_Utils::rscandir(null, $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir2()
    {
        $value = '';
        Bonzai_Utils::rscandir(null, $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir3()
    {
        $value = ' ';
        Bonzai_Utils::rscandir(null, $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir4()
    {
        $value = array();
        Bonzai_Utils::rscandir(null, $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir5()
    {
        $value = array('a');
        Bonzai_Utils::rscandir(null, $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir6()
    {
        $value = null;
        Bonzai_Utils::rscandir('', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir7()
    {
        $value = '';
        Bonzai_Utils::rscandir('', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir8()
    {
        $value = ' ';
        Bonzai_Utils::rscandir('', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir9()
    {
        $value = array();
        Bonzai_Utils::rscandir('', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir10()
    {
        $value = array('a');
        Bonzai_Utils::rscandir('', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir11()
    {
        $value = null;
        Bonzai_Utils::rscandir(' ', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir12()
    {
        $value = '';
        Bonzai_Utils::rscandir(' ', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir13()
    {
        $value = ' ';
        Bonzai_Utils::rscandir(' ', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir14()
    {
        $value = array();
        Bonzai_Utils::rscandir(' ', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir15()
    {
        $value = array('a');
        Bonzai_Utils::rscandir(' ', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir16()
    {
        $value = null;
        Bonzai_Utils::rscandir('a', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir17()
    {
        $value = '';
        Bonzai_Utils::rscandir('a', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir18()
    {
        $value = ' ';
        Bonzai_Utils::rscandir('a', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir19()
    {
        $value = array();
        Bonzai_Utils::rscandir('a', $value);
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir20()
    {
        $value = array('a');
        Bonzai_Utils::rscandir('a', $value);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir21()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222);

        try {
            $value = null;
            Bonzai_Utils::rscandir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777);
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir22()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222);

        try {
            $value = '';
            Bonzai_Utils::rscandir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777);
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir23()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222);

        try {
            $value = ' ';
            Bonzai_Utils::rscandir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777);
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir24()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222);

        try {
            $value = array();
            Bonzai_Utils::rscandir($dirname, $value);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777);
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir25()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0222);

        try {
            $value = array('a');
            Bonzai_Utils::rscandir($dirname, $value);
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($dirname, 0777);
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir26()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555);

        $value = null;
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777);
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir27()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555);

        $value = '';
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777);
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir28()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555);

        $value = ' ';
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777);
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir29()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555);

        $value = array();
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777);
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir30()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555);

        $value = array('a');
        $this->assertEquals(array('a'), Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777);
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir31()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777);

        $value = null;
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir32()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777);

        $value = '';
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir33()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777);

        $value = ' ';
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir34()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777);

        $value = array();
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir35()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777);

        $value = array('a');
        $this->assertEquals(array('a'), Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }

    // WHAT: get the file's content
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContent1()
    {
        $this->assertNull(Bonzai_Utils::getFileContent(null));
    }

    // WHAT: get the file's content
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContent2()
    {
        $this->assertNull(Bonzai_Utils::getFileContent(''));
    }

    // WHAT: get the file's content
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContent3()
    {
        $this->assertNull(Bonzai_Utils::getFileContent(' '));
    }

    // WHAT: get the file's content
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContent4()
    {
        $this->assertEmpty(Bonzai_Utils::getFileContent('a'));
    }

    // WHAT: get the file's content
    public function testGetFileContent5()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0333);

        try {
            Bonzai_Utils::getFileContent($filename);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777);
        unlink($filename);
    }

    // WHAT: get the file's content
    public function testGetFileContent6()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555);

        $this->assertEmpty(Bonzai_Utils::getFileContent($filename));

        chmod($filename, 0777);
        unlink($filename);
    }

    // WHAT: get the file's content
    public function testGetFileContent7()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::getFileContent($filename);

        unlink($filename);
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent1()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(null, null));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent2()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(null, ''));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent3()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(null, ' '));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent4()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(null, 'a'));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent5()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent('', null));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent6()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent('', ''));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent7()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent('', ' '));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent8()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent('', 'a'));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent9()
    {
        $this->assertEmpty(Bonzai_Utils::putFileContent(' ', null));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent10()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent(' ', ''));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent11()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent(' ', ' '));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent12()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent(' ', 'a'));
    }

    // WHAT: return the status of saving
    public function testPutFileContent13()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent('a', null));

        unlink('a');
    }

    // WHAT: return the status of saving
    public function testPutFileContent14()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent('a', ''));

        unlink('a');
    }

    // WHAT: return the status of saving
    public function testPutFileContent15()
    {
        $this->assertEquals(1, Bonzai_Utils::putFileContent('a', ' '));

        unlink('a');
    }

    // WHAT: return the status of saving
    public function testPutFileContent16()
    {
        $this->assertEquals(1, Bonzai_Utils::putFileContent('a', 'a'));

        unlink('a');
    }

    // WHAT: return the status of saving
    public function testPutFileContent17()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, null);
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }

    // WHAT: return the status of saving
    public function testPutFileContent18()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, '');
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }

    // WHAT: return the status of saving
    public function testPutFileContent19()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, ' ');
        $this->assertEquals(' ', file_get_contents($filename));

        unlink($filename);
    }

    // WHAT: return the status of saving
    public function testPutFileContent20()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, 'a');
        $this->assertEquals('a', file_get_contents($filename));

        unlink($filename);
    }

    // WHAT: return the status of saving
    public function testPutFileContent21()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555);

        try {
            Bonzai_Utils::putFileContent($filename, null);
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777);
        unlink($filename);
    }

    // WHAT: return the status of saving
    public function testPutFileContent22()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555);

        try {
            Bonzai_Utils::putFileContent($filename, '');
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777);
        unlink($filename);
    }

    // WHAT: return the status of saving
    public function testPutFileContent23()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555);

        try {
            Bonzai_Utils::putFileContent($filename, ' ');
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777);
        unlink($filename);
    }

    // WHAT: return the status of saving
    public function testPutFileContent24()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555);

        try {
            Bonzai_Utils::putFileContent($filename, 'a');
            $this->assertTrue(false, "The exception was not threw.");
        } catch (Exception $e) {
            $this->assertInstanceOf('Bonzai_Exception', $e);
        }

        chmod($filename, 0777);
        unlink($filename);
    }

    // WHAT: return the status of saving
    public function testPutFileContent25()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, null);
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }

    // WHAT: return the status of saving
    public function testPutFileContent26()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, '');
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }

    // WHAT: return the status of saving
    public function testPutFileContent27()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, ' ');
        $this->assertEquals(' ', file_get_contents($filename));

        unlink($filename);
    }

    // WHAT: return the status of saving
    public function testPutFileContent28()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, 'a');
        $this->assertEquals('a', file_get_contents($filename));

        unlink($filename);
    }

    public function testMessage()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
