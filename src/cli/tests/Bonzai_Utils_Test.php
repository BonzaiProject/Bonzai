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
    public function testGetFilePath1()
    {
        $this->assertEquals(null, Bonzai_Utils::getFilePath(null));
    }

    // WHAT: get the path of file
    public function testGetFilePath2()
    {
        $this->assertEquals(null, Bonzai_Utils::getFilePath(''));
    }

    // WHAT: get the path of file
    public function testGetFilePath3()
    {
        $this->assertEquals(null, Bonzai_Utils::getFilePath(' '));
    }

    // WHAT: get the path of file
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFilePath4()
    {
        $this->assertEquals('', Bonzai_Utils::getFilePath('a'));
    }

    // WHAT: get the path of file
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFilePath5()
    {
        $this->assertEquals('', Bonzai_Utils::getFilePath('noread'));
    }

    // WHAT: get the path of file
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFilePath6()
    {
        $this->assertEquals('', Bonzai_Utils::getFilePath('nowrite'));
    }

    // WHAT: get the path of file
    public function testGetFilePath7()
    {
        $this->assertEquals('', Bonzai_Utils::getFilePath('write'));
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
        $this->assertEquals('', Bonzai_Utils::rscandir(null, $value = null));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir2()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir(null, $value = ''));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir3()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir(null, $value = ' '));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir4()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir(null, $value = array()));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir5()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir(null, $value = array('a')));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir6()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('', $value = null));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir7()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('', $value = ''));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir8()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('', $value = ' '));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir9()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('', $value = array()));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir10()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('', $value = array('a')));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir11()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir(' ', $value = null));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir12()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir(' ', $value = ''));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir13()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir(' ', $value = ' '));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir14()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir(' ', $value = array()));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir15()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir(' ', $value = array('a')));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir16()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('a', $value = null));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir17()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('a', $value = ''));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir18()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('a', $value = ' '));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir19()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('a', $value = array()));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir20()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('a', $value = array('a')));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir21()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('noread', $value = null));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir22()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('noread', $value = ''));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir23()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('noread', $value = ' '));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir24()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('noread', $value = array()));
    }

    // WHAT: return the all directories & files into a directory
    /**
     * @expectedException Bonzai_Exception
     */
    public function testRscandir25()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('noread', $value = array('a')));
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir26()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('nowrite', $value = null));
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir27()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('nowrite', $value = ''));
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir28()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('nowrite', $value = ' '));
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir29()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('nowrite', $value = array()));
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir30()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('nowrite', $value = array('a')));
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir31()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('write', $value = null));
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir32()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('write', $value = ''));
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir33()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('write', $value = ' '));
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir34()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('write', $value = array()));
    }

    // WHAT: return the all directories & files into a directory
    public function testRscandir35()
    {
        $this->assertEquals('', Bonzai_Utils::rscandir('write', $value = array('a')));
    }

    // WHAT: get the file's content
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContent1()
    {
        $this->assertEquals(null, Bonzai_Utils::getFileContent(null));
    }

    // WHAT: get the file's content
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContent2()
    {
        $this->assertEquals(null, Bonzai_Utils::getFileContent(''));
    }

    // WHAT: get the file's content
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContent3()
    {
        $this->assertEquals(null, Bonzai_Utils::getFileContent(' '));
    }

    // WHAT: get the file's content
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContent4()
    {
        $this->assertEquals('', Bonzai_Utils::getFileContent('a'));
    }

    // WHAT: get the file's content
    public function testGetFileContent5()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        $this->assertEquals('', Bonzai_Utils::getFileContent($filename));
        unlink($filename);
    }

    // WHAT: get the file's content
    /**
     * @expectedException Bonzai_Exception
     */
    public function testGetFileContent6()
    {
        $this->assertEquals(null, Bonzai_Utils::getFileContent('noread'));
    }

    // WHAT: get the file's content
    public function testGetFileContent7()
    {
        $this->assertEquals('', Bonzai_Utils::getFileContent('read'));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent1()
    {
        $this->assertEquals('', Bonzai_Utils::putFileContent(null, null));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent2()
    {
        $this->assertEquals('', Bonzai_Utils::putFileContent(null, ''));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent3()
    {
        $this->assertEquals('', Bonzai_Utils::putFileContent(null, ' '));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent4()
    {
        $this->assertEquals('', Bonzai_Utils::putFileContent(null, 'a'));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent5()
    {
        $this->assertEquals('', Bonzai_Utils::putFileContent('', null));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent6()
    {
        $this->assertEquals('', Bonzai_Utils::putFileContent('', ''));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent7()
    {
        $this->assertEquals('', Bonzai_Utils::putFileContent('', ' '));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent8()
    {
        $this->assertEquals('', Bonzai_Utils::putFileContent('', 'a'));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent9()
    {
        $this->assertEquals('', Bonzai_Utils::putFileContent(' ', null));
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
    }

    // WHAT: return the status of saving
    public function testPutFileContent14()
    {
        $this->assertEquals(0, Bonzai_Utils::putFileContent('a', ''));
    }

    // WHAT: return the status of saving
    public function testPutFileContent15()
    {
        $this->assertEquals(1, Bonzai_Utils::putFileContent('a', ' '));
    }

    // WHAT: return the status of saving
    public function testPutFileContent16()
    {
        $this->assertEquals(1, Bonzai_Utils::putFileContent('a', 'a'));
    }

    // WHAT: return the status of saving
    public function testPutFileContent17()
    {
        Bonzai_Utils::putFileContent('empty', null);
        $this->assertEquals('', file_get_contents('empty'));
    }

    // WHAT: return the status of saving
    public function testPutFileContent18()
    {
        Bonzai_Utils::putFileContent('empty', '');
        $this->assertEquals('', file_get_contents('empty'));
    }

    // WHAT: return the status of saving
    public function testPutFileContent19()
    {
        Bonzai_Utils::putFileContent('empty', ' ');
        $this->assertEquals(' ', file_get_contents('empty'));
    }

    // WHAT: return the status of saving
    public function testPutFileContent20()
    {
        Bonzai_Utils::putFileContent('empty', 'a');
        $this->assertEquals('a', file_get_contents('empty'));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent21()
    {
        $this->assertEquals('', Bonzai_Utils::putFileContent('nowrite', null));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent22()
    {
        $this->assertEquals('', Bonzai_Utils::putFileContent('nowrite', ''));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent23()
    {
        $this->assertEquals('', Bonzai_Utils::putFileContent('nowrite', ' '));
    }

    // WHAT: return the status of saving
    /**
     * @expectedException Bonzai_Exception
     */
    public function testPutFileContent24()
    {
        $this->assertEquals('', Bonzai_Utils::putFileContent('nowrite', 'a'));
    }

    // WHAT: return the status of saving
    public function testPutFileContent25()
    {
        Bonzai_Utils::putFileContent('write', null);
        $this->assertEquals('', file_get_contents('write'));
    }

    // WHAT: return the status of saving
    public function testPutFileContent26()
    {
        Bonzai_Utils::putFileContent('write', '');
        $this->assertEquals('', file_get_contents('write'));
    }

    // WHAT: return the status of saving
    public function testPutFileContent27()
    {
        Bonzai_Utils::putFileContent('write', ' ');
        $this->assertEquals(' ', file_get_contents('write'));
    }

    // WHAT: return the status of saving
    public function testPutFileContent28()
    {
        Bonzai_Utils::putFileContent('write', 'a');
        $this->assertEquals('a', file_get_contents('write'));
    }

    public function testMessage()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
