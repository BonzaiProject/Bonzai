<?php
/**
 * BONZAI
 * (was phpGuardian)
 *
 * CODE NAME: phoenix
 * VERSION:   0.1
 *
 * URL:       http://www.bonzai-project.org
 * E-MAIL:    info@bonzai-project.org
 *
 * COPYRIGHT: 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
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
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

require_once __DIR__ . '/../../src/libs/Tests/TestCase.php';
require_once __DIR__ . '/../../src/libs/Abstract/Abstract.php';
require_once __DIR__ . '/../../src/libs/Utils/Options.php';

/**
 * Bonzai_Utils_Options_Test
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Tests
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
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
        $this->assertEmpty($this->object->init(array('help')));
    }
    // }}}
    // }}}

    // {{{ parseOptions
    // {{{ testParseOptionsJustCoverage
    /**
     * testParseOptionsJustCoverage
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testParseOptionsJustCoverage()
    {
        $this->assertEmpty($this->callMethod('parseOptions', array(array())));
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
        $this->assertEmpty(
            $this->callMethod('parseOptions', array(array('a', 'b')))
        );
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
        $this->assertEmpty($this->callMethod('parseOptions', array(array('-b', '--backup', '-d', '--dry', '--colors', '--stderr', '-q', '--quiet', '-h', '--help', '-v', '--version', '-r', 'report_file', '--report', 'report_file', '--log', 'log_file'))));
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
        $this->assertEmpty($this->object->getOptionParams());
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
        $this->assertEmpty($this->object->getOptions());
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
        $this->assertEmpty($this->object->getOption(null));
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
        $this->assertEquals('array', gettype($this->object->getParameters()));
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
     * testGetLabelParameterWithParamNotExistentIsNull
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
