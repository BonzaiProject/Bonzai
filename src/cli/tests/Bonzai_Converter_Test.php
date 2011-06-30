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
 * URL:            http://www.bonzai-project.org
 * E-MAIL:         info@bonzai-project.org
 *
 * COPYRIGHT:      2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * LICENSE:        MIT or GNU GPL 2
 *                 The MIT License is recommended for most projects, it's simple
 *                 and  easy  to understand and it places almost no restrictions
 *                 on  what  you  can do with Bonzai.
 *                 If  the  GPL  suits  your project better you are also free to
 *                 use Bonzai under that license.
 *                 You   don't  have  to  do  anything  special  to  choose  one
 *                 license  or  the  other  and  you don't have to notify anyone
 *                 which   license   you   are   using.  You  are  free  to  use
 *                 Bonzai  in  commercial  projects  as  long  as  the copyright
 *                 header is left intact.
 *                 <http://www.opensource.org/licenses/mit-license.php>
 *                 <http://www.opensource.org/licenses/gpl-2.0.php>
 *
 **/

require_once __DIR__ . '/../libs/Tests/TestCase.php';
require_once __DIR__ . '/../libs/Converter/Converter.php';

/**
 *
 * @category  Security
 * @package   Bonzai
 * @version   0.1
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @license   http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link      http://www.bonzai-project.org
 */
class Bonzai_Converter_Test extends Bonzai_TestCase
{
    public function testConvert()
    {
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

    public function testProcess()
    {
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

    public function testAnalyzeProcessBlock()
    {
        // TODO: $this->object->analyzeProcessBlock($data, $count, $max, $i, $start, $end, $data_len);
        // TODO: refactor parent method: too input params
        // INPUT:  data, count, max, i, start, end, data_len
        // OUTPUT: string
        // WHAT:   convert a block of mixed source to a full php
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    //public function testsetTags()
    //{
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    //public function testFinder()
    //{
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}

    public function testAnalyzeFinderBlock()
    {
        // TODO: $this->object->analyzeFinderBlock($data, $pos, $opened, $count);
        // TODO: refactor parent method: too input params
        // INPUT:  data, pos, opened, count
        // OUTPUT: boolean
        // WHAT:   calculate if a block is opened or not
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testIsOpened()
    {
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

    //public function testSetBlock()
    //{
        // TODO: A method without return need to be tested?
        //$this->markTestIncomplete('This test has not been implemented yet.');
    //}
}
