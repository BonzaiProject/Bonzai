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
require_once __DIR__ . '/../libs/Converter/Converter.php';

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
class PG_Converter_Test extends PG_TestCase {
    public function testConvert() {
        // TODO: $this->object->convert($filename, $asptag = false);
        // INPUT:  filename, asptag
        // OUTPUT: string
        // WHAT:   convert a mixed source to a full php
        /*
        filename = null               | asptag = null  | output = ?
        filename = null               | asptag = ""    | output = ?
        filename = null               | asptag = " "   | output = ?
        filename = null               | asptag = true  | output = ?
        filename = null               | asptag = false | output = ?
        filename = ""                 | asptag = null  | output = ?
        filename = ""                 | asptag = ""    | output = ?
        filename = ""                 | asptag = " "   | output = ?
        filename = ""                 | asptag = true  | output = ?
        filename = ""                 | asptag = false | output = ?
        filename = " "                | asptag = null  | output = ?
        filename = " "                | asptag = ""    | output = ?
        filename = " "                | asptag = " "   | output = ?
        filename = " "                | asptag = true  | output = ?
        filename = " "                | asptag = false | output = ?
        filename = "aaa"              | asptag = null  | output = ?
        filename = "aaa"              | asptag = ""    | output = ?
        filename = "aaa"              | asptag = " "   | output = ?
        filename = "aaa"              | asptag = true  | output = ?
        filename = "aaa"              | asptag = false | output = ?
        filename = "__DIR__.__FILE__" | asptag = null  | output = ?
        filename = "__DIR__.__FILE__" | asptag = ""    | output = ?
        filename = "__DIR__.__FILE__" | asptag = " "   | output = ?
        filename = "__DIR__.__FILE__" | asptag = true  | output = ?
        filename = "__DIR__.__FILE__" | asptag = false | output = ?
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testProcess() {
        // TODO: $this->object->process($data, $asptag = false);
        // INPUT:  data, asptag
        // OUTPUT: string
        // WHAT:   convert a mixed source to a full php
        /*
        filename = null                           | asptag = null  | output = ?
        filename = null                           | asptag = ""    | output = ?
        filename = null                           | asptag = " "   | output = ?
        filename = null                           | asptag = true  | output = ?
        filename = null                           | asptag = false | output = ?
        filename = ""                             | asptag = null  | output = ?
        filename = ""                             | asptag = ""    | output = ?
        filename = ""                             | asptag = " "   | output = ?
        filename = ""                             | asptag = true  | output = ?
        filename = ""                             | asptag = false | output = ?
        filename = " "                            | asptag = null  | output = ?
        filename = " "                            | asptag = ""    | output = ?
        filename = " "                            | asptag = " "   | output = ?
        filename = " "                            | asptag = true  | output = ?
        filename = " "                            | asptag = false | output = ?
        filename = "aaa"                          | asptag = null  | output = ?
        filename = "aaa"                          | asptag = ""    | output = ?
        filename = "aaa"                          | asptag = " "   | output = ?
        filename = "aaa"                          | asptag = true  | output = ?
        filename = "aaa"                          | asptag = false | output = ?
        filename = "<?php echo 'a'; ?>"           | asptag = null  | output = ?
        filename = "<?php echo 'a'; ?>"           | asptag = ""    | output = ?
        filename = "<?php echo 'a'; ?>"           | asptag = " "   | output = ?
        filename = "<?php echo 'a'; ?>"           | asptag = true  | output = ?
        filename = "<?php echo 'a'; ?>"           | asptag = false | output = ?
        filename = "<pre><?php echo 'a'; ?>"      | asptag = null  | output = ?
        filename = "<pre><?php echo 'a'; ?>"      | asptag = ""    | output = ?
        filename = "<pre><?php echo 'a'; ?>"      | asptag = " "   | output = ?
        filename = "<pre><?php echo 'a'; ?>"      | asptag = true  | output = ?
        filename = "<pre><?php echo 'a'; ?>"      | asptag = false | output = ?
        filename = "<?php echo 'a'; ?><pre>"      | asptag = null  | output = ?
        filename = "<?php echo 'a'; ?><pre>"      | asptag = ""    | output = ?
        filename = "<?php echo 'a'; ?><pre>"      | asptag = " "   | output = ?
        filename = "<?php echo 'a'; ?><pre>"      | asptag = true  | output = ?
        filename = "<?php echo 'a'; ?><pre>"      | asptag = false | output = ?
        filename = "<pre><?php echo 'a'; ?><pre>" | asptag = null  | output = ?
        filename = "<pre><?php echo 'a'; ?><pre>" | asptag = ""    | output = ?
        filename = "<pre><?php echo 'a'; ?><pre>" | asptag = " "   | output = ?
        filename = "<pre><?php echo 'a'; ?><pre>" | asptag = true  | output = ?
        filename = "<pre><?php echo 'a'; ?><pre>" | asptag = false | output = ?
        filename = "<? echo 'a'; ?>"              | asptag = null  | output = ?
        filename = "<? echo 'a'; ?>"              | asptag = ""    | output = ?
        filename = "<? echo 'a'; ?>"              | asptag = " "   | output = ?
        filename = "<? echo 'a'; ?>"              | asptag = true  | output = ?
        filename = "<? echo 'a'; ?>"              | asptag = false | output = ?
        filename = "<pre><? echo 'a'; ?>"         | asptag = null  | output = ?
        filename = "<pre><? echo 'a'; ?>"         | asptag = ""    | output = ?
        filename = "<pre><? echo 'a'; ?>"         | asptag = " "   | output = ?
        filename = "<pre><? echo 'a'; ?>"         | asptag = true  | output = ?
        filename = "<pre><? echo 'a'; ?>"         | asptag = false | output = ?
        filename = "<? echo 'a'; ?><pre>"         | asptag = null  | output = ?
        filename = "<? echo 'a'; ?><pre>"         | asptag = ""    | output = ?
        filename = "<? echo 'a'; ?><pre>"         | asptag = " "   | output = ?
        filename = "<? echo 'a'; ?><pre>"         | asptag = true  | output = ?
        filename = "<? echo 'a'; ?><pre>"         | asptag = false | output = ?
        filename = "<pre><? echo 'a'; ?><pre>"    | asptag = null  | output = ?
        filename = "<pre><? echo 'a'; ?><pre>"    | asptag = ""    | output = ?
        filename = "<pre><? echo 'a'; ?><pre>"    | asptag = " "   | output = ?
        filename = "<pre><? echo 'a'; ?><pre>"    | asptag = true  | output = ?
        filename = "<pre><? echo 'a'; ?><pre>"    | asptag = false | output = ?
        filename = "<?= 'a'; ?>"                  | asptag = null  | output = ?
        filename = "<?= 'a'; ?>"                  | asptag = ""    | output = ?
        filename = "<?= 'a'; ?>"                  | asptag = " "   | output = ?
        filename = "<?= 'a'; ?>"                  | asptag = true  | output = ?
        filename = "<?= 'a'; ?>"                  | asptag = false | output = ?
        filename = "<pre><?= 'a'; ?>"             | asptag = null  | output = ?
        filename = "<pre><?= 'a'; ?>"             | asptag = ""    | output = ?
        filename = "<pre><?= 'a'; ?>"             | asptag = " "   | output = ?
        filename = "<pre><?= 'a'; ?>"             | asptag = true  | output = ?
        filename = "<pre><?= 'a'; ?>"             | asptag = false | output = ?
        filename = "<?= 'a'; ?><pre>"             | asptag = null  | output = ?
        filename = "<?= 'a'; ?><pre>"             | asptag = ""    | output = ?
        filename = "<?= 'a'; ?><pre>"             | asptag = " "   | output = ?
        filename = "<?= 'a'; ?><pre>"             | asptag = true  | output = ?
        filename = "<?= 'a'; ?><pre>"             | asptag = false | output = ?
        filename = "<pre><?= 'a'; ?><pre>"        | asptag = null  | output = ?
        filename = "<pre><?= 'a'; ?><pre>"        | asptag = ""    | output = ?
        filename = "<pre><?= 'a'; ?><pre>"        | asptag = " "   | output = ?
        filename = "<pre><?= 'a'; ?><pre>"        | asptag = true  | output = ?
        filename = "<pre><?= 'a'; ?><pre>"        | asptag = false | output = ?
        filename = "<% echo 'a'; %>"              | asptag = null  | output = ?
        filename = "<% echo 'a'; %>"              | asptag = ""    | output = ?
        filename = "<% echo 'a'; %>"              | asptag = " "   | output = ?
        filename = "<% echo 'a'; %>"              | asptag = true  | output = ?
        filename = "<% echo 'a'; %>"              | asptag = false | output = ?
        filename = "<pre><% echo 'a'; %>"         | asptag = null  | output = ?
        filename = "<pre><% echo 'a'; %>"         | asptag = ""    | output = ?
        filename = "<pre><% echo 'a'; %>"         | asptag = " "   | output = ?
        filename = "<pre><% echo 'a'; %>"         | asptag = true  | output = ?
        filename = "<pre><% echo 'a'; %>"         | asptag = false | output = ?
        filename = "<% echo 'a'; %><pre>"         | asptag = null  | output = ?
        filename = "<% echo 'a'; %><pre>"         | asptag = ""    | output = ?
        filename = "<% echo 'a'; %><pre>"         | asptag = " "   | output = ?
        filename = "<% echo 'a'; %><pre>"         | asptag = true  | output = ?
        filename = "<% echo 'a'; %><pre>"         | asptag = false | output = ?
        filename = "<pre><% echo 'a'; %><pre>"    | asptag = null  | output = ?
        filename = "<pre><% echo 'a'; %><pre>"    | asptag = ""    | output = ?
        filename = "<pre><% echo 'a'; %><pre>"    | asptag = " "   | output = ?
        filename = "<pre><% echo 'a'; %><pre>"    | asptag = true  | output = ?
        filename = "<pre><% echo 'a'; %><pre>"    | asptag = false | output = ?
        filename = "<?php echo '?>'; ?>"          | asptag = null  | output = ?
        filename = "<?php echo '?>'; ?>"          | asptag = ""    | output = ?
        filename = "<?php echo '?>'; ?>"          | asptag = " "   | output = ?
        filename = "<?php echo '?>'; ?>"          | asptag = true  | output = ?
        filename = "<?php echo '?>'; ?>"          | asptag = false | output = ?
        filename = "<?php echo '<?php ?>'; ?>"    | asptag = null  | output = ?
        filename = "<?php echo '<?php ?>'; ?>"    | asptag = ""    | output = ?
        filename = "<?php echo '<?php ?>'; ?>"    | asptag = " "   | output = ?
        filename = "<?php echo '<?php ?>'; ?>"    | asptag = true  | output = ?
        filename = "<?php echo '<?php ?>'; ?>"    | asptag = false | output = ?
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testAnalyzeProcessBlock() {
        // TODO: $this->object->analyzeProcessBlock($data, $count, $max, $i, $start, $end, $data_len);
        // TODO: refactor parent method: too input params
        // INPUT:  data, count, max, i, start, end, data_len
        // OUTPUT: string
        // WHAT:   convert a block of mixed source to a full php
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    //public function testsetTags() {
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    //public function testFinder() {
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    public function testAnalyzeFinderBlock() {
        // TODO: $this->object->analyzeFinderBlock($data, $pos, $opened, $count);
        // TODO: refactor parent method: too input params
        // INPUT:  data, pos, opened, count
        // OUTPUT: boolean
        // WHAT:   calculate if a block is opened or not
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testIsOpened() {
        // TODO: $this->object->isOpened($next, $pos);
        // INPUT:  news, pos
        // OUTPUT: boolean
        /*
        next = null  | pos = null | output = ?
        next = null  | pos = 0    | output = ?
        next = null  | pos = 1    | output = ?
        next = null  | pos = -1   | output = ?
        next = ""    | pos = null | output = ?
        next = ""    | pos = 0    | output = ?
        next = ""    | pos = 1    | output = ?
        next = ""    | pos = -1   | output = ?
        next = " "   | pos = null | output = ?
        next = " "   | pos = 0    | output = ?
        next = " "   | pos = 1    | output = ?
        next = " "   | pos = -1   | output = ?
        next = "aaa" | pos = null | output = ?
        next = "aaa" | pos = 0    | output = ?
        next = "aaa" | pos = 1    | output = ?
        next = "aaa" | pos = -1   | output = ?
        next = "\n"  | pos = null | output = ?
        next = "\n"  | pos = 0    | output = ?
        next = "\n"  | pos = 1    | output = ?
        next = "\n"  | pos = -1   | output = ?
        next = "="   | pos = null | output = ?
        next = "="   | pos = 0    | output = ?
        next = "="   | pos = 1    | output = ?
        next = "="   | pos = -1   | output = ?
        */
        // WHAT:   calculate if a block is opened or not
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    //public function testSetBlock() {
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}
}
