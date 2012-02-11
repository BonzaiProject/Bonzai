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
    define('BONZAI_PATH_LIBS', realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'libs') . DIRECTORY_SEPARATOR);
}

require_once BONZAI_PATH_LIBS . 'Tests'    . DIRECTORY_SEPARATOR . 'TestCase.php';
require_once BONZAI_PATH_LIBS . 'Abstract' . DIRECTORY_SEPARATOR . 'Abstract.php';

/**
 * Abstract_Fake
 *
 * @category Optimization_And_Security
 * @package  Bonzai
 * @author   Fabio Cicerchia <info@fabiocicerchia.it>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 *           http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link     http://www.bonzai-project.org
 **/
class Abstract_Fake extends Bonzai_Abstract
{
}

/**
 * Bonzai_Abstract_AbstractTest
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
class Bonzai_Abstract_AbstractTest extends Bonzai_TestCase
{
    // {{{ PROPERTIES
    /**
     * Flag to decide whether instantiate automatically the class to be tested.
     *
     * @access protected
     * @var    boolean
     */
    protected $auto_instance = false;
    // }}}

    // {{{ setUp
    /**
     * PHPUnit setUp: instance the class if needed.
     *
     * @access protected
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        $this->object = new Abstract_Fake;
    }
    // }}}

    // {{{ getUtils
    // {{{ testGetUtilsReturnInstance
    /**
     * Test if `getUtils` method return a Bonzai_Utils_Options instance.
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetUtilsReturnInstance()
    {
        $this->assertInstanceOf('Bonzai_Utils_Utils', $this->object->getUtils(new Bonzai_Utils_Options()));
    }
    // }}}
    // }}}

    // {{{ getTempDir
    // {{{ testGetTempDirJustCoverage
    /**
     * TODO: Add a comment to this method
     *
     * @ignore
     * @access public
     * @return void
     */
    public function testGetTempDirJustCoverage()
    {
        $this->markTestIncomplete('TBW');
    }
    // }}}
    // }}}
}
