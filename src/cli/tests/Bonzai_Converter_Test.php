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
require_once __DIR__ . '/../libs/Exception/Exception.php';
require_once __DIR__ . '/../libs/Utils/Utils.php';
require_once __DIR__ . '/../libs/Converter/Converter.php';

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
class Bonzai_Converter_Test extends Bonzai_TestCase
{
    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess1()
    {
        $this->assertEquals(null, $this->object->process(null, null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess2()
    {
        $this->assertEquals(null, $this->object->process(null, ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess3()
    {
        $this->assertEquals(null, $this->object->process(null, ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess4()
    {
        $this->assertEquals(null, $this->object->process(null, true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess5()
    {
        $this->assertEquals(null, $this->object->process(null, false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess6()
    {
        $this->assertEquals(null, $this->object->process('', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess7()
    {
        $this->assertEquals(null, $this->object->process('', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess8()
    {
        $this->assertEquals(null, $this->object->process('', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess9()
    {
        $this->assertEquals(null, $this->object->process('', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess10()
    {
        $this->assertEquals(null, $this->object->process('', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess11()
    {
        $this->assertEquals(null, $this->object->process(' ', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess12()
    {
        $this->assertEquals(null, $this->object->process(' ', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess13()
    {
        $this->assertEquals(null, $this->object->process(' ', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess14()
    {
        $this->assertEquals(null, $this->object->process(' ', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess15()
    {
        $this->assertEquals(null, $this->object->process(' ', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess16()
    {
        $this->assertEquals(null, $this->object->process('aaa', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess17()
    {
        $this->assertEquals(null, $this->object->process('aaa', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess18()
    {
        $this->assertEquals(null, $this->object->process('aaa', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess19()
    {
        $this->assertEquals("<%\necho <<<BONZAI;\naaa\nBONZAI;\n%>", $this->object->process('aaa', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess20()
    {
        $this->assertEquals("<?php\necho <<<BONZAI;\naaa\nBONZAI;\n?>", $this->object->process('aaa', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess21()
    {
        $this->assertEquals(null, $this->object->process('<?php echo "a"; ?>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess22()
    {
        $this->assertEquals(null, $this->object->process('<?php echo "a"; ?>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess23()
    {
        $this->assertEquals(null, $this->object->process('<?php echo "a"; ?>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess24()
    {
        $this->assertEquals('<% echo "a"; %>', $this->object->process('<?php echo "a"; ?>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess25()
    {
        $this->assertEquals('<?php echo "a"; ?>', $this->object->process('<?php echo "a"; ?>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess26()
    {
        $this->assertEquals(null, $this->object->process('<pre><?php echo "a"; ?>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess27()
    {
        $this->assertEquals(null, $this->object->process('<pre><?php echo "a"; ?>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess28()
    {
        $this->assertEquals(null, $this->object->process('<pre><?php echo "a"; ?>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess29()
    {
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess30()
    {
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess31()
    {
        $this->assertEquals(null, $this->object->process('<?php echo "a"; ?><pre>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess32()
    {
        $this->assertEquals(null, $this->object->process('<?php echo "a"; ?><pre>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess33()
    {
        $this->assertEquals(null, $this->object->process('<?php echo "a"; ?><pre>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess34()
    {
        $this->assertEquals('', $this->object->process('<?php echo "a"; ?><pre>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess35()
    {
        $this->assertEquals('', $this->object->process('<?php echo "a"; ?><pre>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess36()
    {
        $this->assertEquals(null, $this->object->process('<pre><?php echo "a"; ?><pre>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess37()
    {
        $this->assertEquals(null, $this->object->process('<pre><?php echo "a"; ?><pre>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess38()
    {
        $this->assertEquals(null, $this->object->process('<pre><?php echo "a"; ?><pre>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess39()
    {
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?><pre>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess40()
    {
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?><pre>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess41()
    {
        $this->assertEquals(null, $this->object->process('<? echo "a"; ?>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess42()
    {
        $this->assertEquals(null, $this->object->process('<? echo "a"; ?>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess43()
    {
        $this->assertEquals(null, $this->object->process('<? echo "a"; ?>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess44()
    {
        $this->assertEquals('', $this->object->process('<? echo "a"; ?>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess45()
    {
        $this->assertEquals('', $this->object->process('<? echo "a"; ?>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess46()
    {
        $this->assertEquals(null, $this->object->process('<pre><? echo "a"; ?>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess47()
    {
        $this->assertEquals(null, $this->object->process('<pre><? echo "a"; ?>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess48()
    {
        $this->assertEquals(null, $this->object->process('<pre><? echo "a"; ?>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess49()
    {
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess50()
    {
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess51()
    {
        $this->assertEquals(null, $this->object->process('<? echo "a"; ?><pre>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess52()
    {
        $this->assertEquals(null, $this->object->process('<? echo "a"; ?><pre>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess53()
    {
        $this->assertEquals(null, $this->object->process('<? echo "a"; ?><pre>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess54()
    {
        $this->assertEquals('', $this->object->process('<? echo "a"; ?><pre>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess55()
    {
        $this->assertEquals('', $this->object->process('<? echo "a"; ?><pre>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess56()
    {
        $this->assertEquals(null, $this->object->process('<pre><? echo "a"; ?><pre>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess57()
    {
        $this->assertEquals(null, $this->object->process('<pre><? echo "a"; ?><pre>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess58()
    {
        $this->assertEquals(null, $this->object->process('<pre><? echo "a"; ?><pre>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess59()
    {
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?><pre>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess60()
    {
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?><pre>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess61()
    {
        $this->assertEquals('', $this->object->process('<?= "a"; ?>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess62()
    {
        $this->assertEquals(null, $this->object->process('<?= "a"; ?>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess63()
    {
        $this->assertEquals(null, $this->object->process('<?= "a"; ?>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess64()
    {
        $this->assertEquals(null, $this->object->process('<?= "a"; ?>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess65()
    {
        $this->assertEquals('', $this->object->process('<?= "a"; ?>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess66()
    {
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess67()
    {
        $this->assertEquals(null, $this->object->process('<pre><?= "a"; ?>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess68()
    {
        $this->assertEquals(null, $this->object->process('<pre><?= "a"; ?>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess69()
    {
        $this->assertEquals(null, $this->object->process('<pre><?= "a"; ?>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess70()
    {
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess71()
    {
        $this->assertEquals('', $this->object->process('<?= "a"; ?><pre>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess72()
    {
        $this->assertEquals(null, $this->object->process('<?= "a"; ?><pre>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess73()
    {
        $this->assertEquals(null, $this->object->process('<?= "a"; ?><pre>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess74()
    {
        $this->assertEquals(null, $this->object->process('<?= "a"; ?><pre>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess75()
    {
        $this->assertEquals('', $this->object->process('<?= "a"; ?><pre>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess76()
    {
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?><pre>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess77()
    {
        $this->assertEquals(null, $this->object->process('<pre><?= "a"; ?><pre>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess78()
    {
        $this->assertEquals(null, $this->object->process('<pre><?= "a"; ?><pre>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess79()
    {
        $this->assertEquals(null, $this->object->process('<pre><?= "a"; ?><pre>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess80()
    {
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?><pre>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess81()
    {
        $this->assertEquals('', $this->object->process('<% echo "a"; %>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess82()
    {
        $this->assertEquals(null, $this->object->process('<% echo "a"; %>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess83()
    {
        $this->assertEquals(null, $this->object->process('<% echo "a"; %>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess84()
    {
        $this->assertEquals(null, $this->object->process('<% echo "a"; %>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess85()
    {
        $this->assertEquals('', $this->object->process('<% echo "a"; %>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess86()
    {
        $this->assertEquals(null, $this->object->process('<pre><% echo "a"; %>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess87()
    {
        $this->assertEquals(null, $this->object->process('<pre><% echo "a"; %>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess88()
    {
        $this->assertEquals(null, $this->object->process('<pre><% echo "a"; %>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess89()
    {
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess90()
    {
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess91()
    {
        $this->assertEquals(null, $this->object->process('<% echo "a"; %><pre>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess92()
    {
        $this->assertEquals(null, $this->object->process('<% echo "a"; %><pre>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess93()
    {
        $this->assertEquals(null, $this->object->process('<% echo "a"; %><pre>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess94()
    {
        $this->assertEquals('', $this->object->process('<% echo "a"; %><pre>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess95()
    {
        $this->assertEquals('', $this->object->process('<% echo "a"; %><pre>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess96()
    {
        $this->assertEquals(null, $this->object->process('<pre><% echo "a"; %><pre>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess97()
    {
        $this->assertEquals(null, $this->object->process('<pre><% echo "a"; %><pre>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess98()
    {
        $this->assertEquals(null, $this->object->process('<pre><% echo "a"; %><pre>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess99()
    {
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %><pre>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess100()
    {
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %><pre>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess101()
    {
        $this->assertEquals(null, $this->object->process('<?php echo "?>"; ?>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess102()
    {
        $this->assertEquals(null, $this->object->process('<?php echo "?>"; ?>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess103()
    {
        $this->assertEquals(null, $this->object->process('<?php echo "?>"; ?>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess104()
    {
        $this->assertEquals('', $this->object->process('<?php echo "?>"; ?>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess105()
    {
        $this->assertEquals('', $this->object->process('<?php echo "?>"; ?>', false));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess106()
    {
        $this->assertEquals(null, $this->object->process('<?php echo "<?php ?>"; ?>', null));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess107()
    {
        $this->assertEquals(null, $this->object->process('<?php echo "<?php ?>"; ?>', ''));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess108()
    {
        $this->assertEquals(null, $this->object->process('<?php echo "<?php ?>"; ?>', ' '));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess109()
    {
        $this->assertEquals('', $this->object->process('<?php echo "<?php ?>"; ?>', true));
    }

    // WHAT: convert a mixed source to a full php
    /**
     * @expectedException Bonzai_Exception
     */
    public function testProcess110()
    {
        $this->assertEquals('', $this->object->process('<?php echo "<?php ?>"; ?>', false));
    }
}
