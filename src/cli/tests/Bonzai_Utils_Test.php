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
        // TODO:   $this->object->getFilePath($file);
        // INPUT:  file
        // OUTPUT: string
        // WHAT:   get the path of file
        /*
        file = null      | output = ?
        file = ""        | output = ?
        file = " "       | output = ?
        file = "a"       | output = ?
        file = "noread"  | output = ?
        file = "nowrite" | output = ?
        file = "write"   | output = ?
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testRenameFile()
    {
        // TODO:   $this->object->renameFile($filename, $backup = true);
        // INPUT:  filename, backup
        // OUTPUT: void
        // WHAT:   rename a file
        /*
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testRscandir()
    {
        // TODO:   $this->object->rscandir($base = '', &$data = array());
        // INPUT:  base, data
        // OUTPUT: array
        // WHAT:   return the all directories & files into a directory
        /*
        file = null      | data = null  | output = ?
        file = null      | data = ""    | output = ?
        file = null      | data = " "   | output = ?
        file = null      | data = ()    | output = ?
        file = null      | data = (...) | output = ?
        file = ""        | data = null  | output = ?
        file = ""        | data = ""    | output = ?
        file = ""        | data = " "   | output = ?
        file = ""        | data = ()    | output = ?
        file = ""        | data = (...) | output = ?
        file = " "       | data = null  | output = ?
        file = " "       | data = ""    | output = ?
        file = " "       | data = " "   | output = ?
        file = " "       | data = ()    | output = ?
        file = " "       | data = (...) | output = ?
        file = "a"       | data = null  | output = ?
        file = "a"       | data = ""    | output = ?
        file = "a"       | data = " "   | output = ?
        file = "a"       | data = ()    | output = ?
        file = "a"       | data = (...) | output = ?
        file = "noread"  | data = null  | output = ?
        file = "noread"  | data = ""    | output = ?
        file = "noread"  | data = " "   | output = ?
        file = "noread"  | data = ()    | output = ?
        file = "noread"  | data = (...) | output = ?
        file = "nowrite" | data = null  | output = ?
        file = "nowrite" | data = ""    | output = ?
        file = "nowrite" | data = " "   | output = ?
        file = "nowrite" | data = ()    | output = ?
        file = "nowrite" | data = (...) | output = ?
        file = "write"   | data = null  | output = ?
        file = "write"   | data = ""    | output = ?
        file = "write"   | data = " "   | output = ?
        file = "write"   | data = ()    | output = ?
        file = "write"   | data = (...) | output = ?
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testGetFileContent()
    {
        // TODO:   $this->object->getFileContent($filename);
        // INPUT:  filename
        // OUTPUT: string
        // WHAT:   get the file's content
        /*
        filename = null     | output = ?
        filename = ""       | output = ?
        filename = " "      | output = ?
        filename = "a"      | output = ?
        filename = "empty"  | output = ?
        filename = "noread" | output = ?
        filename = "read"   | output = ?
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testPutFileContent()
    {
        // TODO:   $this->object->putFileContent($filename, $content);
        // INPUT:  filename, content
        // OUTPUT: boolean
        // WHAT:   return the status of saving
        /*
        filename = null      | content = null | output = ?
        filename = null      | content = ""   | output = ?
        filename = null      | content = " "  | output = ?
        filename = null      | content = "a"  | output = ?
        filename = ""        | content = null | output = ?
        filename = ""        | content = ""   | output = ?
        filename = ""        | content = " "  | output = ?
        filename = ""        | content = "a"  | output = ?
        filename = " "       | content = null | output = ?
        filename = " "       | content = ""   | output = ?
        filename = " "       | content = " "  | output = ?
        filename = " "       | content = "a"  | output = ?
        filename = "a"       | content = null | output = ?
        filename = "a"       | content = ""   | output = ?
        filename = "a"       | content = " "  | output = ?
        filename = "a"       | content = "a"  | output = ?
        filename = "empty"   | content = null | output = ?
        filename = "empty"   | content = ""   | output = ?
        filename = "empty"   | content = " "  | output = ?
        filename = "empty"   | content = "a"  | output = ?
        filename = "nowrite" | content = null | output = ?
        filename = "nowrite" | content = ""   | output = ?
        filename = "nowrite" | content = " "  | output = ?
        filename = "nowrite" | content = "a"  | output = ?
        filename = "write"   | content = null | output = ?
        filename = "write"   | content = ""   | output = ?
        filename = "write"   | content = " "  | output = ?
        filename = "write"   | content = "a"  | output = ?
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testMessage()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
