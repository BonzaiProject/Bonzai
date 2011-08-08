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

require_once dirname(__FILE__) . '/../libs/Tests/TestCase.php';
require_once dirname(__FILE__) . '/../libs/Exception/Exception.php';
require_once dirname(__FILE__) . '/../libs/Utils/Utils.php';
require_once dirname(__FILE__) . '/../libs/Registry/Registry.php';
require_once dirname(__FILE__) . '/../libs/Encoder/Encoder.php';

Bonzai_Utils::$silenced = true;

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
class Bonzai_Encoder_Test extends Bonzai_TestCase
{
    // {{{ testProcessFile1
    // WHAT: process a file
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testProcessFile1()
    {
        $this->assertEmpty($this->object->processFile(null));
    }
    // }}}

    // {{{ testProcessFile2
    // WHAT: process a file
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testProcessFile2()
    {
        $this->assertEmpty($this->object->processFile(''));
    }
    // }}}

    // {{{ testProcessFile3
    // WHAT: process a file
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testProcessFile3()
    {
        $this->assertEmpty($this->object->processFile(' '));
    }
    // }}}

    // {{{ testProcessFile4
    // WHAT: process a file
    /**
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testProcessFile4()
    {
        $this->assertEmpty($this->object->processFile('a'));

        unlink('a');
    }
    // }}}

    // {{{ testProcessFile5
    // WHAT: process a file
    /**
     * @access public
     * @return void
     */
    public function testProcessFile5()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        $this->object->processFile($filename);

        unlink($filename);
    }
    // }}}

    // {{{ testProcessFile6
    // WHAT: process a file
    /**
     * @access public
     * @return void
     */
    public function testProcessFile6()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, 'aaa');
        chmod($filename, 0333);

        $this->assertEmpty($this->object->processFile($filename));

        chmod($filename, 0777);
        unlink($filename);
    }
    // }}}

    // {{{ testProcessFile7
    // WHAT: process a file
    /**
     * @access public
     * @return void
     */
    public function testProcessFile7()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?' . '>');

        $this->assertEmpty($this->object->processFile($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testGetByteCode1
    // WHAT: get the bytecode
    /**
     * @access public
     * @return void
     */
    public function testGetByteCode1()
    {
        $this->assertNull($this->object->getByteCode(null));
    }
    // }}}

    // {{{ testGetByteCode2
    // WHAT: get the bytecode
    /**
     * @access public
     * @return void
     */
    public function testGetByteCode2()
    {
        $this->assertNull($this->object->getByteCode(''));
    }
    // }}}

    // {{{ testGetByteCode3
    // WHAT: get the bytecode
    /**
     * @access public
     * @return void
     */
    public function testGetByteCode3()
    {
        $this->assertNull($this->object->getByteCode(' '));
    }
    // }}}

    // {{{ testGetByteCode4
    // WHAT: get the bytecode
    /**
     * @access public
     * @return void
     */
    public function testGetByteCode4()
    {
        $this->assertEmpty($this->object->getByteCode('a'));
    }
    // }}}

    // {{{ testGetByteCode5
    // WHAT: get the bytecode
    /**
     * @access public
     * @return void
     */
    public function testGetByteCode5()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');

        $this->assertNull($this->object->getByteCode($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testGetByteCode6
    // WHAT: get the bytecode
    /**
     * @access public
     * @return void
     */
    public function testGetByteCode6()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '');
        chmod($filename, 0700);

        $this->assertNull($this->object->getByteCode($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testGetByteCode7
    // WHAT: get the bytecode
    /**
     * @access public
     * @return void
     */
    public function testGetByteCode7()
    {
        $filename = tempnam('.', 'test_');
        file_put_contents($filename, '<?php echo "aaa"; ?' . '>');

        $this->assertRegExp('/^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/', $this->object->getByteCode($filename));

        unlink($filename);
    }
    // }}}

    // {{{ testExpandPathsToFiles
    /**
     * @access public
     * @return void
     */
    public function testExpandPathsToFiles()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
    // }}}
}
