<?php
/**
 * BONZAI
 * (was phpGuardian)
 *
 * CODENAME:  caffeine
 * VERSION:   0.2
 *
 * URL:       http://www.bonzai-project.org
 * E-MAIL:    info@bonzai-project.org
 *
 * COPYRIGHT: 2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * LICENSE:   MIT or GNU GPL 2
 *            The MIT License is recommended for most projects, it's simple and
 *            easy to understand  and it places  almost no restrictions on what
 *            you can do with Bonzai.
 *            If the GPL  suits your project  better you are  also free to  use
 *            Bonzai under that license.
 *            You don't have  to do anything  special to choose  one license or
 *            the other  and you don't have to notify  anyone which license you
 *            are using.  You are free  to use Bonzai in commercial projects as
 *            long as the copyright header is left intact.
 *            <http://www.opensource.org/licenses/mit-license.php>
 *            <http://www.opensource.org/licenses/gpl-2.0.php>
 *
 * PHP version 5
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Tests
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

if (!defined('BONZAI_PATH_LIBS')) {
    define('BONZAI_PATH_LIBS', realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'libs') . DIRECTORY_SEPARATOR);
}

require_once BONZAI_PATH_LIBS . 'Tests'    . DIRECTORY_SEPARATOR . 'TestCase.php';
require_once BONZAI_PATH_LIBS . 'Abstract' . DIRECTORY_SEPARATOR . 'Abstract.php';
require_once BONZAI_PATH_LIBS . 'Utils'    . DIRECTORY_SEPARATOR . 'Options.php';

/**
 * Bonzai_Utils_OptionsTest
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Tests
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/
class Bonzai_Utils_OptionsTest extends Bonzai_TestCase
{
    // {{{ init
    // {{{ testInitJustCoverage
    /**
     * Only code-coverage of `init` method.
     *
     * @ignore
     * @access                   public
     * @return                   void
     * @expectedException        Bonzai_Exception
     * @expectedExceptionCode    6534
     * @expectedExceptionMessage Missing the script arguments.
     */
    public function testInitJustCoverage()
    {
        $this->expectOutputString('');

        $this->object->init();
    }
    // }}}
    // }}}

    // {{{ parseOptions
    // {{{ testParseOptionsJustCoverage
    /**
     * Only code-coverage of `parseOptions` method.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testParseOptionsJustCoverage()
    {
        $this->expectOutputString('');

        $this->callMethod('parseOptions', array(array()));
    }
    // }}}

    // {{{ testParseOptionsParamArray
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testParseOptionsParamArray()
    {
        $this->expectOutputString('');

        $this->callMethod('parseOptions', array(array('a', 'b')));
    }
    // }}}

    // {{{ testParseOptionsParamFullOptions
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testParseOptionsParamFullOptions()
    {
        $this->expectOutputString('');

        $this->callMethod('parseOptions', array(array('-b', '--backup', '-d', '--dry', '--colors', '--stderr', '-q', '--quiet', '-h', '--help', '-v', '--version', '-r', 'report_file', '--report', 'report_file', '--log', 'log_file')));
    }
    // }}}
    // }}}

    // {{{ getOptionParams
    // {{{ testGetOptionParamsJustCoverage
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetOptionParamsJustCoverage()
    {
        $this->assertEquals(array(), $this->object->getOptionParams());
    }
    // }}}
    // }}}

    // {{{ getOptions
    // {{{ testGetOptionsJustCoverage
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetOptionsJustCoverage()
    {
        $this->assertEquals(array(), $this->object->getOptions());
    }
    // }}}
    // }}}

    // {{{ getOption
    // {{{ testGetOptionJustCoverage
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetOptionJustCoverage()
    {
        $this->assertNull($this->object->getOption(null));
    }
    // }}}
    // }}}

    // {{{ getParameters
    // {{{ testGetParametersJustCoverage
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetParametersJustCoverage()
    {
        $this->assertEquals('array', gettype($this->object->getParameters()));
    }
    // }}}
    // }}}

    // {{{ getLabelParameter
    // {{{ testGetLabelParameterWithParamExistentAreEquals
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetLabelParameterWithParamExistentAreEquals()
    {
        $value = $this->object->getLabelParameter('help');
        $this->assertEquals('Show the help', $value);
    }
    // }}}

    // {{{ testGetLabelParameterWithParamNotExistentIsNull
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetLabelParameterWithParamNotExistentIsNull()
    {
        $this->assertNull($this->object->getLabelParameter('a'));
    }
    // }}}
    // }}}
}
