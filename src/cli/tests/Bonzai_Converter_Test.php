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
    public function testProcess()
    {
        // WHAT: convert a mixed source to a full php
        $this->assertEquals('', $this->object->process(null, null));
        $this->assertEquals('', $this->object->process(null, ''));
        $this->assertEquals('', $this->object->process(null, ' '));
        $this->assertEquals('', $this->object->process(null, true));
        $this->assertEquals('', $this->object->process(null, false));
        $this->assertEquals('', $this->object->process('', null));
        $this->assertEquals('', $this->object->process('', ''));
        $this->assertEquals('', $this->object->process('', ' '));
        $this->assertEquals('', $this->object->process('', true));
        $this->assertEquals('', $this->object->process('', false));
        $this->assertEquals('', $this->object->process(' ', null));
        $this->assertEquals('', $this->object->process(' ', ''));
        $this->assertEquals('', $this->object->process(' ', ' '));
        $this->assertEquals('', $this->object->process(' ', true));
        $this->assertEquals('', $this->object->process(' ', false));
        $this->assertEquals('', $this->object->process('aaa', null));
        $this->assertEquals('', $this->object->process('aaa', ''));
        $this->assertEquals('', $this->object->process('aaa', ' '));
        $this->assertEquals('', $this->object->process('aaa', true));
        $this->assertEquals('', $this->object->process('aaa', false));
        $this->assertEquals('', $this->object->process('<?php echo "a"; ?>', null));
        $this->assertEquals('', $this->object->process('<?php echo "a"; ?>', ''));
        $this->assertEquals('', $this->object->process('<?php echo "a"; ?>', ' '));
        $this->assertEquals('', $this->object->process('<?php echo "a"; ?>', true));
        $this->assertEquals('', $this->object->process('<?php echo "a"; ?>', false));
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?>', null));
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?>', ''));
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?>', ' '));
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?>', true));
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?>', false));
        $this->assertEquals('', $this->object->process('<?php echo "a"; ?><pre>', null));
        $this->assertEquals('', $this->object->process('<?php echo "a"; ?><pre>', ''));
        $this->assertEquals('', $this->object->process('<?php echo "a"; ?><pre>', ' '));
        $this->assertEquals('', $this->object->process('<?php echo "a"; ?><pre>', true));
        $this->assertEquals('', $this->object->process('<?php echo "a"; ?><pre>', false));
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?><pre>', null));
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?><pre>', ''));
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?><pre>', ' '));
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?><pre>', true));
        $this->assertEquals('', $this->object->process('<pre><?php echo "a"; ?><pre>', false));
        $this->assertEquals('', $this->object->process('<? echo "a"; ?>', null));
        $this->assertEquals('', $this->object->process('<? echo "a"; ?>', ''));
        $this->assertEquals('', $this->object->process('<? echo "a"; ?>', ' '));
        $this->assertEquals('', $this->object->process('<? echo "a"; ?>', true));
        $this->assertEquals('', $this->object->process('<? echo "a"; ?>', false));
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?>', null));
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?>', ''));
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?>', ' '));
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?>', true));
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?>', false));
        $this->assertEquals('', $this->object->process('<? echo "a"; ?><pre>', null));
        $this->assertEquals('', $this->object->process('<? echo "a"; ?><pre>', ''));
        $this->assertEquals('', $this->object->process('<? echo "a"; ?><pre>', ' '));
        $this->assertEquals('', $this->object->process('<? echo "a"; ?><pre>', true));
        $this->assertEquals('', $this->object->process('<? echo "a"; ?><pre>', false));
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?><pre>', null));
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?><pre>', ''));
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?><pre>', ' '));
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?><pre>', true));
        $this->assertEquals('', $this->object->process('<pre><? echo "a"; ?><pre>', false));
        $this->assertEquals('', $this->object->process('<?= "a"; ?>', null));
        $this->assertEquals('', $this->object->process('<?= "a"; ?>', ''));
        $this->assertEquals('', $this->object->process('<?= "a"; ?>', ' '));
        $this->assertEquals('', $this->object->process('<?= "a"; ?>', true));
        $this->assertEquals('', $this->object->process('<?= "a"; ?>', false));
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?>', null));
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?>', ''));
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?>', ' '));
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?>', true));
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?>', false));
        $this->assertEquals('', $this->object->process('<?= "a"; ?><pre>', null));
        $this->assertEquals('', $this->object->process('<?= "a"; ?><pre>', ''));
        $this->assertEquals('', $this->object->process('<?= "a"; ?><pre>', ' '));
        $this->assertEquals('', $this->object->process('<?= "a"; ?><pre>', true));
        $this->assertEquals('', $this->object->process('<?= "a"; ?><pre>', false));
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?><pre>', null));
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?><pre>', ''));
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?><pre>', ' '));
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?><pre>', true));
        $this->assertEquals('', $this->object->process('<pre><?= "a"; ?><pre>', false));
        $this->assertEquals('', $this->object->process('<% echo "a"; %>', null));
        $this->assertEquals('', $this->object->process('<% echo "a"; %>', ''));
        $this->assertEquals('', $this->object->process('<% echo "a"; %>', ' '));
        $this->assertEquals('', $this->object->process('<% echo "a"; %>', true));
        $this->assertEquals('', $this->object->process('<% echo "a"; %>', false));
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %>', null));
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %>', ''));
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %>', ' '));
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %>', true));
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %>', false));
        $this->assertEquals('', $this->object->process('<% echo "a"; %><pre>', null));
        $this->assertEquals('', $this->object->process('<% echo "a"; %><pre>', ''));
        $this->assertEquals('', $this->object->process('<% echo "a"; %><pre>', ' '));
        $this->assertEquals('', $this->object->process('<% echo "a"; %><pre>', true));
        $this->assertEquals('', $this->object->process('<% echo "a"; %><pre>', false));
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %><pre>', null));
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %><pre>', ''));
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %><pre>', ' '));
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %><pre>', true));
        $this->assertEquals('', $this->object->process('<pre><% echo "a"; %><pre>', false));
        $this->assertEquals('', $this->object->process('<?php echo "?>"; ?>', null));
        $this->assertEquals('', $this->object->process('<?php echo "?>"; ?>', ''));
        $this->assertEquals('', $this->object->process('<?php echo "?>"; ?>', ' '));
        $this->assertEquals('', $this->object->process('<?php echo "?>"; ?>', true));
        $this->assertEquals('', $this->object->process('<?php echo "?>"; ?>', false));
        $this->assertEquals('', $this->object->process('<?php echo "<?php ?>"; ?>', null));
        $this->assertEquals('', $this->object->process('<?php echo "<?php ?>"; ?>', ''));
        $this->assertEquals('', $this->object->process('<?php echo "<?php ?>"; ?>', ' '));
        $this->assertEquals('', $this->object->process('<?php echo "<?php ?>"; ?>', true));
        $this->assertEquals('', $this->object->process('<?php echo "<?php ?>"; ?>', false));
    }
}
