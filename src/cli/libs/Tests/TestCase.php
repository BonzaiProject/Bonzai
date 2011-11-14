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
 * @category  Optimization_&_Security
 * @package   Bonzai
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 *            http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version   Release: 0.1
 * @link      http://www.bonzai-project.org
 **/

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * Bonzai_TestCase
 *
 * @category  Optimization_&_Security
 * @package   Bonzai
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 *            http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @version   Release: 0.1
 * @link      http://www.bonzai-project.org
 **/
class Bonzai_TestCase extends PHPUnit_Framework_TestCase
{
    // {{{ PROPERTIES
    /**
     * @access protected
     * @var    mixed
     */
    protected $object = null;

    /**
     * @access protected
     * @var    boolean
     */
    protected $auto_instance = true;
    // }}}

    // {{{ setUp
    /**
     * setUp
     *
     * @access protected
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        if ($this->auto_instance) {
            $className    = substr(get_class($this), 0, -5); // Strip '_Test'
            $this->object = new $className;
        }
    }
    // }}}

    // {{{ callMethod
    /**
     * callMethod
     *
     * @param string $name
     * @param array  $parameters
     *
     * @static
     * @access protected
     * @return method
     */
    public function callMethod($name, $parameters = array())
    {
        $method = new ReflectionMethod(get_class($this->object), $name);
        $method->setAccessible(true);

        return $method->invokeArgs($this->object, $parameters);
    }
    // }}}
}
