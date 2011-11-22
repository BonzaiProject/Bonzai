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
 *
 * PHP version 5
 *
 * @category   Optimization_&_Security
 * @package    Bonzai
 * @subpackage Tests
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version    Release: 0.1
 * @link       http://www.bonzai-project.org
 **/

require_once __DIR__ . '/../../src/libs/Tests/TestCase.php';
require_once __DIR__ . '/../../src/libs/Utils/Options.php';

/**
 * Bonzai_Utils_Options_Test
 *
 * @category   Optimization_&_Security
 * @package    Bonzai
 * @subpackage Tests
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version    Release: 0.1
 * @link       http://www.bonzai-project.org
 **/
class Bonzai_Utils_OptionsTest extends Bonzai_TestCase
{
    // {{{ init
    // {{{ testInitJustCoverage
    /**
     * testInitJustCoverage
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testInitJustCoverage()
    {
        $this->object->init(array('help'));
    }
    // }}}
    // }}}

    // {{{ parseOptions
    // {{{ testParseOptionsParamEmptyStringThrowException
    /**
     * testParseOptionsParamEmptyStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testParseOptionsParamEmptyStringThrowException()
    {
        $this->callMethod('parseOptions', array(''));
    }
    // }}}

    // {{{ testParseOptionsParamSpacedStringThrowException
    /**
     * testParseOptionsParamSpacedStringThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testParseOptionsParamSpacedStringThrowException()
    {
        $this->callMethod('parseOptions', array(' '));
    }
    // }}}

    // {{{ testParseOptionsParamFakeThrowException
    /**
     * testParseOptionsParamFakeThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testParseOptionsParamFakeThrowException()
    {
        $this->callMethod('parseOptions', array('a'));
    }
    // }}}

    // {{{ testParseOptionsParamNullThrowException
    /**
     * testParseOptionsParamNullThrowException
     *
     * @ignore
     * @access public
     * @return void
     * @expectedException Bonzai_Exception
     */
    public function testParseOptionsParamNullThrowException()
    {
        $this->callMethod('parseOptions', array(null));
    }
    // }}}

    // {{{ testParseOptionsParamEmptyArrayThrowException
    /**
     * testParseOptionsParamEmptyArrayThrowException
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testParseOptionsParamEmptyArrayThrowException()
    {
        $this->callMethod('parseOptions', array(array()));
    }
    // }}}

    // {{{ testParseOptionsParamArray
    /**
     * testParseOptionsParamArray
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testParseOptionsParamArray()
    {
        $this->callMethod('parseOptions', array(array('a', 'b')));
    }
    // }}}

    // {{{ testParseOptionsParamFullOptions
    /**
     * testParseOptionsParamFullOptions
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testParseOptionsParamFullOptions()
    {
        $this->callMethod('parseOptions', array(array('-b', '--backup', '-d', '--dry', '--colors', '--stderr', '-q', '--quiet', '-h', '--help', '-v', '--version', '-r', 'report_file', '--report', 'report_file', '--log', 'log_file')));
    }
    // }}}
    // }}}

    // {{{ getOptionParams
    // {{{ testGetOptionParamsJustCoverage
    /**
     * testGetOptionParamsJustCoverage
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetOptionParamsJustCoverage()
    {
        $this->object->getOptionParams();
    }
    // }}}
    // }}}

    // {{{ getOptions
    // {{{ testGetOptionsJustCoverage
    /**
     * testGetOptionsJustCoverage
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetOptionsJustCoverage()
    {
        $this->object->getOptions();
    }
    // }}}
    // }}}

    // {{{ getOption
    // {{{ testGetOptionJustCoverage
    /**
     * testGetOptionJustCoverage
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetOptionJustCoverage()
    {
        $this->object->getOption(null);
    }
    // }}}
    // }}}

    // {{{ getParameters
    // {{{ testGetParametersJustCoverage
    /**
     * testGetParametersJustCoverage
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetParametersJustCoverage()
    {
        $this->object->getParameters();
    }
    // }}}
    // }}}

    // {{{ getLabelParameter
    // {{{ testGetLabelParameterWithParamExistentAreEquals
    /**
     * testGetLabelParameterWithParam_ExistentAreEquals
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
     * testGetLabelParameterWithParam_NotExistentIsNull
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
