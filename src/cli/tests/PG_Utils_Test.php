<?php
/**
 *        _            ____                     _ _             ____
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian CLI
 *
 *
 * PHPGUARDIAN2
 *
 * CODE NAME:      phoenix
 * ENGINE VERSION: 4.0
 * MODULE VERSION: 1.0
 *
 * URL:            http://www.phpguardian.org
 * E-MAIL:         info@phpguardian.org
 *
 * COPYRIGHT:      2006-2011 Fabio Cicerchia
 * LICENSE:        GNU GPL 3+
 *                 This program is free software: you can redistribute it and/or
 *                 modify it under the terms of the GNU General Public License
 *                 as published by the Free Software Foundation, either version
 *                 3 of the License, or (at your option) any later version.
 *
 *                 This program is distributed in the hope that it will be
 *                 useful, but WITHOUT ANY WARRANTY; without even the implied
 *                 warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *                 PURPOSE. See the GNU General Public License for more details.
 *
 *                 You should have received a copy of the GNU General Public
 *                 Licensealong with this program. If not, see
 *                 <http://www.gnu.org/licenses/>.
 *
 * $Id$
 **/

require_once __DIR__ . '/../libs/Tests/PG_TestCase.php';
require_once __DIR__ . '/../libs/Utils/Utils.php';

/**
 *
 *
 * @category  Security
 * @package   phpGuardian
 * @version   4.0
 * @author    Fabio Cicerchia <info@phpguardian.org>
 * @copyright 2006-2011 Fabio Cicerchia
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt GNU GPL 3.0
 * @link      http://www.phpguardian.org
 */
class PG_Utils_Test extends PG_TestCase {
    public function testGetFilePath() {
        // TODO: $this->object->getFilePath($file);
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

    //public function testRename_file() {
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    public function testRscandir() {
        // TODO: $this->object->rscandir($base = '', &$data = array());
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

    public function testGetFileContent() {
        // TODO: $this->object->getFileContent($filename);
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

    public function testPutFileContent() {
        // TODO: $this->object->putFileContent($filename, $content);
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

    //public function testPg_message() {
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}
}
