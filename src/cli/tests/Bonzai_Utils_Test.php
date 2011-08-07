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
    // {{{ testGetFilePath1
    // WHAT: get the path of file
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetFilePath1()
    {
        Bonzai_Utils::getFilePath(null);
    }
    // }}}

    // {{{ testGetFilePath2
    // WHAT: get the path of file
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetFilePath2()
    {
        Bonzai_Utils::getFilePath('');
    }
    // }}}

    // {{{ testGetFilePath3
    // WHAT: get the path of file
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetFilePath3()
    {
        Bonzai_Utils::getFilePath(' ');
    }
    // }}}

    // {{{ testGetFilePath4
    // WHAT: get the path of file
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testGetFilePath4()
    {
        Bonzai_Utils::getFilePath('a');
    }
    // }}}

    // {{{ testGetFilePath5
    // WHAT: get the path of file
    /**
     * @access public
     * @return void
     */
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
    // }}}

    // {{{ testGetFilePath6
    // WHAT: get the path of file
    /**
     * @access public
     * @return void
     */
    public function testGetFilePath6()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0555);

        $this->assertEquals($filename, Bonzai_Utils::getFilePath($filename));

        chmod($filename, 0777);
        unlink($filename);
    }
    // }}}

    // {{{ testGetFilePath7
    // WHAT: get the path of file
    /**
     * @access public
     * @return void
     */
    public function testGetFilePath7()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'aaa');

        Bonzai_Utils::getFilePath($filename);

        unlink($filename);
    }
    // }}}

// {{{ testRenameFile
    /**
     * @access public
     * @return void
     */
    public function testRenameFile()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}

    // {{{ testRscandir1
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
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
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
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
    // }}}

    // {{{ testRscandir22
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
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
    // }}}

    // {{{ testRscandir23
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
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
    // }}}

    // {{{ testRscandir24
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
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
    // }}}

    // {{{ testRscandir25
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
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
    // }}}

    // {{{ testRscandir26
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
    public function testRscandir26()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555);

        $value = null;
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777);
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir27
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
    public function testRscandir27()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555);

        $value = '';
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777);
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir28
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
    public function testRscandir28()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555);

        $value = ' ';
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777);
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir29
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
    public function testRscandir29()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555);

        $value = array();
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777);
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir30
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
    public function testRscandir30()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0555);

        $value = array('a');
        $this->assertEquals(array('a'), Bonzai_Utils::rscandir($dirname, $value));

        chmod($dirname, 0777);
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir31
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
    public function testRscandir31()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777);

        $value = null;
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir32
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
    public function testRscandir32()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777);

        $value = '';
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir33
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
    public function testRscandir33()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777);

        $value = ' ';
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir34
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
    public function testRscandir34()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777);

        $value = array();
        $this->assertEmpty(Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testRscandir35
    // WHAT: return the all directories & files into a directory
    /**
     * @access public
     * @return void
     */
    public function testRscandir35()
    {
        $dirname = 'test_dir_' . substr(md5(microtime()), 0, 5);
        mkdir($dirname, 0777);

        $value = array('a');
        $this->assertEquals(array('a'), Bonzai_Utils::rscandir($dirname, $value));
        rmdir($dirname);
    }
    // }}}

    // {{{ testGetFileContent1
    // WHAT: get the file's content
    /**
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
    // WHAT: get the file's content
    /**
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
    // WHAT: get the file's content
    /**
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
    // WHAT: get the file's content
    /**
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
    // WHAT: get the file's content
    /**
     * @access public
     * @return void
     */
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
    // }}}

    // {{{ testGetFileContent6
    // WHAT: get the file's content
    /**
     * @access public
     * @return void
     */
    public function testGetFileContent6()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0555);

        $this->assertEmpty(Bonzai_Utils::getFileContent($filename));

        chmod($filename, 0777);
        unlink($filename);
    }
    // }}}

    // {{{ testGetFileContent7
    // WHAT: get the file's content
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
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
    // WHAT: return the status of saving
    /**
     * @access public
     * @return void
     */
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
    // }}}

    // {{{ testPutFileContent22
    // WHAT: return the status of saving
    /**
     * @access public
     * @return void
     */
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
    // }}}

    // {{{ testPutFileContent23
    // WHAT: return the status of saving
    /**
     * @access public
     * @return void
     */
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
    // }}}

    // {{{ testPutFileContent24
    // WHAT: return the status of saving
    /**
     * @access public
     * @return void
     */
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
    // }}}

    // {{{ testPutFileContent25
    // WHAT: return the status of saving
    /**
     * @access public
     * @return void
     */
    public function testPutFileContent25()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, null);
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testPutFileContent26
    // WHAT: return the status of saving
    /**
     * @access public
     * @return void
     */
    public function testPutFileContent26()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, '');
        $this->assertEmpty(file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testPutFileContent27
    // WHAT: return the status of saving
    /**
     * @access public
     * @return void
     */
    public function testPutFileContent27()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, ' ');
        $this->assertEquals(' ', file_get_contents($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testPutFileContent28
    // WHAT: return the status of saving
    /**
     * @access public
     * @return void
     */
    public function testPutFileContent28()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        Bonzai_Utils::putFileContent($filename, 'a');
        $this->assertEquals('a', file_get_contents($filename));

        unlink($filename);
    }
    // }}}

// {{{ testMessage
    /**
     * @access public
     * @return void
     */
    public function testMessage()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}
}
