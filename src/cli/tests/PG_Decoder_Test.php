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
require_once __DIR__ . '/../libs/Decoder/Decoder.php';

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
class PG_Decoder_Test extends PG_TestCase {
    //public function testElaborate() {
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    public function testCodeDecrypt() {
        // TODO: $this->object->codeDecrypt($data);
        // INPUT:  data
        // OUTPUT: string
        /*
        data = null          | output = ?
        data = ""            | output = ?
        data = " "           | output = ?
        data = "aaa"         | output = ?
        data = "REALENCODED" | output = ?
        */
        // WHAT:   return the decoded string
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testCycleDecrypt() {
        // TODO: $this->object->cycleDecrypt($string, $key_len, $data_len);
        // TODO: refactor parent method: too input params
        // INPUT:  string, key_len, data_len
        // OUTPUT: string
        // WHAT:   return the decoded string
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testDecodeChar() {
        // TODO: $this->object->decodeChar($characters, $key);
        // INPUT:  characters, key
        // OUTPUT: string
        // WHAT:   return the decoded char
        /*
        characters = null | key = null | output = ?
        characters = null | key = ""   | output = ?
        characters = null | key = " "  | output = ?
        characters = null | key = "a"  | output = ?
        characters = ""   | key = null | output = ?
        characters = ""   | key = ""   | output = ?
        characters = ""   | key = " "  | output = ?
        characters = ""   | key = "a"  | output = ?
        characters = " "  | key = null | output = ?
        characters = " "  | key = ""   | output = ?
        characters = " "  | key = " "  | output = ?
        characters = " "  | key = "a"  | output = ?
        characters = "a"  | key = null | output = ?
        characters = "a"  | key = ""   | output = ?
        characters = "a"  | key = " "  | output = ?
        characters = "a"  | key = "a"  | output = ?
        characters = "b"  | key = null | output = ?
        characters = "b"  | key = ""   | output = ?
        characters = "b"  | key = " "  | output = ?
        characters = "b"  | key = "a"  | output = ?
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testGetDecodedFilename() {
        // TODO: $this->object->getDecodedFilename($filename);
        // INPUT:  filename
        // OUTPUT: string
        /*
        filename = null | output = ?
        filename = ""   | output = ?
        filename = " "  | output = ?
        filename = "a"  | output = ?
        */
        // WHAT:   return the decoded filename
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
