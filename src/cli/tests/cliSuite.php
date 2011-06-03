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

require_once 'PHPUnit/Framework/TestSuite.php';

require_once __DIR__ . '/PG_Controller_Test.php';
require_once __DIR__ . '/PG_Converter_Test.php';
require_once __DIR__ . '/PG_Decoder_Test.php';
require_once __DIR__ . '/PG_Encoder_Test.php';
require_once __DIR__ . '/PG_Exception_Test.php';
require_once __DIR__ . '/PG_Hash_Test.php';
require_once __DIR__ . '/PG_Registry_Test.php';
require_once __DIR__ . '/PG_Script_Generator_Test.php';
require_once __DIR__ . '/PG_Script_Parser_Test.php';
require_once __DIR__ . '/PG_Task_Test.php';
require_once __DIR__ . '/PG_Utils_Help_Test.php';
require_once __DIR__ . '/PG_Utils_Options_Test.php';
require_once __DIR__ . '/PG_Utils_Test.php';

/**
 *
 *
 * @category  Security
 * @package   phpGuardian
 * @version   4.0
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Fabio Cicerchia
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt GNU General Public License 3.0
 * @link      http://www.phpguardian.org
 */
class cliSuite extends PHPUnit_Framework_TestSuite {
    public function __construct() {
        $this->setName('cliSuite');

        $this->addTestSuite('PG_Controller_Test');
        $this->addTestSuite('PG_Converter_Test');
        $this->addTestSuite('PG_Decoder_Test');
        $this->addTestSuite('PG_Encoder_Test');
        $this->addTestSuite('PG_Exception_Test');
        $this->addTestSuite('PG_Hash_Test');
        $this->addTestSuite('PG_Registry_Test');
        $this->addTestSuite('PG_Script_Generator_Test');
        $this->addTestSuite('PG_Script_Parser_Test');
        $this->addTestSuite('PG_Task_Test');
        $this->addTestSuite('PG_Utils_Help_Test');
        $this->addTestSuite('PG_Utils_Options_Test');
        $this->addTestSuite('PG_Utils_Test');
    }

    /**
     * Creates the suite.
     */
    public static function suite() {
        return new self ();
    }
}
