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
 * @subpackage Core
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

require_once 'PHPUnit/Framework/TestCase.php';
require_once __DIR__ . '/../Abstract/Abstract.php';
require_once __DIR__ . '/../Utils/Utils.php';

/**
 * Bonzai_TestCase
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Core
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/
abstract class Bonzai_TestCase extends PHPUnit_Framework_TestCase
{
    // {{{ PROPERTIES
    /**
     * The instance of class to be tested.
     *
     * @access protected
     * @var    mixed
     */
    protected $object = null;

    /**
     * Flag to decide whether instantiate automatically the class to be tested.
     *
     * @access protected
     * @var    boolean
     */
    protected $auto_instance = true;
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

        Bonzai_Utils::$silenced = true;

        if ($this->auto_instance) {
            $className = substr(get_class($this), 0, -4); // Strip 'Test'
            if (!class_exists($className)) {
                $className = preg_replace('/_[^_]+$/', '', $className);
            }

            $this->object = new $className;
        }
    }
    // }}}

    // {{{ callMethod
    /**
     * Workaround to test the protected methods.
     *
     * @param string $name       The name of protected method.
     * @param array  $parameters The parameters to be passed to method.
     *
     * @static
     * @access protected
     * @return method
     */
    public function callMethod($name, array $parameters = array())
    {
        $name = strval($name);

        $method = new ReflectionMethod(get_class($this->object), $name);
        $method->setAccessible(true);

        return $method->invokeArgs($this->object, $parameters);
    }
    // }}}
}