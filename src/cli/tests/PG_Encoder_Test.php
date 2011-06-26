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
require_once __DIR__ . '/../libs/Encoder/Encoder.php';

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
class PG_Encoder_Test extends PG_TestCase
{
    //public function testElaborate()
    //{
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    public function testCodeCrypt()
    {
        // TODO: $this->object->codeCrypt($data);
        // INPUT:  data
        // OUTPUT: string
        // WHAT:   return the encoded string
        /*
        data = null          | output = ?
        data = ""            | output = ?
        data = " "           | output = ?
        data = "aaa"         | output = ?
        data = "REALDECODED" | output = ?
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testGetInner()
    {
        // TODO: $this->object->getInner();
        // INPUT:  -
        // OUTPUT: string
        // WHAT:   get the internal string that loads the libraries
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testGetHeader()
    {
        // TODO: $this->object->getHeader($element, $inner);
        // INPUT:  element, inner
        // OUTPUT: string
        // WHAT:   get the header string
        /*
        element = null  | inner = null | output = ?
        element = null  | inner = ""   | output = ?
        element = null  | inner = " "  | output = ?
        element = null  | inner = "a"  | output = ?
        element = ""    | inner = null | output = ?
        element = ""    | inner = ""   | output = ?
        element = ""    | inner = " "  | output = ?
        element = ""    | inner = "a"  | output = ?
        element = " "   | inner = null | output = ?
        element = " "   | inner = ""   | output = ?
        element = " "   | inner = " "  | output = ?
        element = " "   | inner = "a"  | output = ?
        element = "a"   | inner = null | output = ?
        element = "a"   | inner = ""   | output = ?
        element = "a"   | inner = " "  | output = ?
        element = "a"   | inner = "a"  | output = ?
        element = ()    | inner = null | output = ?
        element = ()    | inner = ""   | output = ?
        element = ()    | inner = " "  | output = ?
        element = ()    | inner = "a"  | output = ?
        element = (...) | inner = null | output = ?
        element = (...) | inner = ""   | output = ?
        element = (...) | inner = " "  | output = ?
        element = (...) | inner = "a"  | output = ?
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testGetFooter()
    {
        // TODO: $this->object->getFooter($element);
        // INPUT:  element
        // OUTPUT: string
        // WHAT:   get the footer string
        /*
        element = null  | output = ?
        element = ""    | output = ?
        element = " "   | output = ?
        element = "a"   | output = ?
        element = ()    | output = ?
        element = (...) | output = ?
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testGetEncodedFilename()
    {
        // TODO: $this->object->getEncodedFilename($filename);
        // INPUT:  filename
        // OUTPUT: string
        // WHAT:   return the encoded filename
        /*
        filename = null | output = ?
        filename = ""   | output = ?
        filename = " "  | output = ?
        filename = "a"  | output = ?
        */
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
