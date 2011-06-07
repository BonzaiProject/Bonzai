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

require_once __DIR__ . '/../libs/Tests/TestCase.php';
require_once __DIR__ . '/../libs/Script/Parser.php';

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
class PG_Script_Parser_Test extends PG_TestCase
{
    //public function testElaborate()
    //{
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    //public function testExpandPathsToFiles()
    //{
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    //public function testLoadConfig()
    //{
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    public function testElaborateConfig()
    {
        // TODO: $this->object->elaborateConfig();
        // INPUT:  -
        // OUTPUT: array
        // WHAT:   return the config array
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    //public function testHandleConfigFiles()
    //{
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    //public function testSetInputInfoField()
    //{
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    //public function testAnalyzeOptions()
    //{
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    public function testConvertToBoolean()
    {
        // TODO: $this->object->convertToBoolean($value);
        // INPUT:  value
        // OUTPUT: mixed
        // WHAT:   return true if yes, false if no, otherwise the original value
        /*
        value = null  | output = ?
        value = ""    | output = ?
        value = " "   | output = ?
        value = "a"   | output = ?
        value = ()    | output = ?
        value = (...) | output = ?
        value = OBJ   | output = ?
        value = true  | output = ?
        value = false | output = ?
        value = 1     | output = ?
        value = 0     | output = ?
        value = "yes" | output = ?
        value = "no"  | output = ?
        value = "YES" | output = ?
        value = "NO"  | output = ?
        value = "YeS" | output = ?
        value = "No"  | output = ?
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    //public function testParseList()
    //{
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}
}
