<?php
/**
 *
 * BONZAI
 * (was phpGuardian)
 *
 * CODE NAME:      phoenix
 * ENGINE VERSION: 0.1
 * MODULE VERSION: 0.1
 *
 * URL:            http://bonzai.fabiocicerchia.it
 * E-MAIL:         bonzai@fabiocicerchia.it
 *
 * COPYRIGHT:      2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * LICENSE:        MIT or GNU GPL 2
 *                 The MIT License is recommended for most projects, it's simple
 *                 and  easy  to understand and it places almost no restrictions
 *                 on  what  you  can do with bonzai.
 *                 If  the  GPL  suits  your project better you are also free to
 *                 use bonzai under that license.
 *                 You   don't  have  to  do  anything  special  to  choose  one
 *                 license  or  the  other  and  you don't have to notify anyone
 *                 which   license   you   are   using.  You  are  free  to  use
 *                 bonzai  in  commercial  projects  as  long  as  the copyright
 *                 header is left intact.
 *                 <http://www.opensource.org/licenses/mit-license.php>
 *                 <http://www.opensource.org/licenses/gpl-2.0.php>
 *
 **/

require_once __DIR__ . '/../libs/Tests/TestCase.php';
require_once __DIR__ . '/../libs/Decoder/Decoder.php';

/**
 *
 * @category  Security
 * @package   bonzai
 * @version   0.1
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @license   http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link      http://bonzai.fabiocicerchia.it
 */
class PG_Decoder_Test extends PG_TestCase
{
    //public function testElaborate()
    //{
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    public function testCodeDecrypt()
    {
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

    public function testGetDecodedFilename()
    {
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
