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
    public function testGetFilePath()
    {
        // WHAT: get the path of file
        $this->assertEquals('', $this->object->getFilePath(null));
        $this->assertEquals('', $this->object->getFilePath(''));
        $this->assertEquals('', $this->object->getFilePath(' '));
        $this->assertEquals('', $this->object->getFilePath('a'));
        $this->assertEquals('', $this->object->getFilePath('noread'));
        $this->assertEquals('', $this->object->getFilePath('nowrite'));
        $this->assertEquals('', $this->object->getFilePath('write'));
    }

    public function testRenameFile()
    {
        // TODO:   $this->object->renameFile($filename, $backup = true);
        // INPUT:  filename, backup
        // OUTPUT: void
        // WHAT:   rename a file
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testRscandir()
    {
        // WHAT: return the all directories & files into a directory
        $this->assertEquals('', $this->object->rscandir(null, null));
        $this->assertEquals('', $this->object->rscandir(null, ''));
        $this->assertEquals('', $this->object->rscandir(null, ' '));
        $this->assertEquals('', $this->object->rscandir(null, array()));
        $this->assertEquals('', $this->object->rscandir(null, array('a')));
        $this->assertEquals('', $this->object->rscandir('', null));
        $this->assertEquals('', $this->object->rscandir('', ''));
        $this->assertEquals('', $this->object->rscandir('', ' '));
        $this->assertEquals('', $this->object->rscandir('', array()));
        $this->assertEquals('', $this->object->rscandir('', array('a')));
        $this->assertEquals('', $this->object->rscandir(' ', null));
        $this->assertEquals('', $this->object->rscandir(' ', ''));
        $this->assertEquals('', $this->object->rscandir(' ', ' '));
        $this->assertEquals('', $this->object->rscandir(' ', array()));
        $this->assertEquals('', $this->object->rscandir(' ', array('a')));
        $this->assertEquals('', $this->object->rscandir('a', null));
        $this->assertEquals('', $this->object->rscandir('a', ''));
        $this->assertEquals('', $this->object->rscandir('a', ' '));
        $this->assertEquals('', $this->object->rscandir('a', array()));
        $this->assertEquals('', $this->object->rscandir('a', array('a')));
        $this->assertEquals('', $this->object->rscandir('noread', null));
        $this->assertEquals('', $this->object->rscandir('noread', ''));
        $this->assertEquals('', $this->object->rscandir('noread', ' '));
        $this->assertEquals('', $this->object->rscandir('noread', array()));
        $this->assertEquals('', $this->object->rscandir('noread', array('a')));
        $this->assertEquals('', $this->object->rscandir('nowrite', null));
        $this->assertEquals('', $this->object->rscandir('nowrite', ''));
        $this->assertEquals('', $this->object->rscandir('nowrite', ' '));
        $this->assertEquals('', $this->object->rscandir('nowrite', array()));
        $this->assertEquals('', $this->object->rscandir('nowrite', array('a')));
        $this->assertEquals('', $this->object->rscandir('write', null));
        $this->assertEquals('', $this->object->rscandir('write', ''));
        $this->assertEquals('', $this->object->rscandir('write', ' '));
        $this->assertEquals('', $this->object->rscandir('write', array()));
        $this->assertEquals('', $this->object->rscandir('write', array('a')));
    }

    public function testGetFileContent()
    {
        // WHAT: get the file's content
        $this->assertEquals('', $this->object->getFileContent(null));
        $this->assertEquals('', $this->object->getFileContent(''));
        $this->assertEquals('', $this->object->getFileContent(' '));
        $this->assertEquals('', $this->object->getFileContent('a'));
        $this->assertEquals('', $this->object->getFileContent('empty'));
        $this->assertEquals('', $this->object->getFileContent('noread'));
        $this->assertEquals('', $this->object->getFileContent('read'));
    }

    public function testPutFileContent()
    {
        // WHAT: return the status of saving
        $this->assertEquals('', $this->object->putFileContent(null, null));
        $this->assertEquals('', $this->object->putFileContent(null, ''));
        $this->assertEquals('', $this->object->putFileContent(null, ' '));
        $this->assertEquals('', $this->object->putFileContent(null, 'a'));
        $this->assertEquals('', $this->object->putFileContent('', null));
        $this->assertEquals('', $this->object->putFileContent('', ''));
        $this->assertEquals('', $this->object->putFileContent('', ' '));
        $this->assertEquals('', $this->object->putFileContent('', 'a'));
        $this->assertEquals('', $this->object->putFileContent(' ', null));
        $this->assertEquals('', $this->object->putFileContent(' ', ''));
        $this->assertEquals('', $this->object->putFileContent(' ', ' '));
        $this->assertEquals('', $this->object->putFileContent(' ', 'a'));
        $this->assertEquals('', $this->object->putFileContent('a', null));
        $this->assertEquals('', $this->object->putFileContent('a', ''));
        $this->assertEquals('', $this->object->putFileContent('a', ' '));
        $this->assertEquals('', $this->object->putFileContent('a', 'a'));
        $this->assertEquals('', $this->object->putFileContent('empty', null));
        $this->assertEquals('', $this->object->putFileContent('empty', ''));
        $this->assertEquals('', $this->object->putFileContent('empty', ' '));
        $this->assertEquals('', $this->object->putFileContent('empty', 'a'));
        $this->assertEquals('', $this->object->putFileContent('nowrite', null));
        $this->assertEquals('', $this->object->putFileContent('nowrite', ''));
        $this->assertEquals('', $this->object->putFileContent('nowrite', ' '));
        $this->assertEquals('', $this->object->putFileContent('nowrite', 'a'));
        $this->assertEquals('', $this->object->putFileContent('write', null));
        $this->assertEquals('', $this->object->putFileContent('write', ''));
        $this->assertEquals('', $this->object->putFileContent('write', ' '));
        $this->assertEquals('', $this->object->putFileContent('write', 'a'));
    }

    public function testMessage()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
