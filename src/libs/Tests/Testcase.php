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
 * @subpackage Core
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 **/

require_once 'PHPUnit/Framework/TestCase.php';
require_once BONZAI_PATH_LIBS . 'Abstract' . DIRECTORY_SEPARATOR . 'Abstract.php';
require_once BONZAI_PATH_LIBS . 'Utils'    . DIRECTORY_SEPARATOR . 'Utils.php';

/**
 * BonzaiTestcase
 *
 * @category   Optimization_And_Security
 * @package    Bonzai
 * @subpackage Core
 * @author     Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright  2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
 * @license    http://www.opensource.org/licenses/mit-license.php MIT
 *             http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link       http://www.bonzai-project.org
 * @abstract
 **/
abstract class BonzaiTestcase extends PHPUnit_Framework_TestCase
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

        //BonzaiUtils::$silenced = true;

        if ($this->auto_instance === true) {
            $className = substr(get_class($this), 0, -4); // Strip 'Test'

            if (class_exists($className) === false) {
                $className = preg_replace('/_[^_]+$/', '', $className);
            }

            $this->object = new $className;
        }
    }
    // }}}

    // {{{ tearDown
    /**
     * PHPUnit tearDown: destroy the instance.
     *
     * @access protected
     * @return void
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->object = null;
    }
    // }}}

    // {{{ callMethod
    /**
     * Workaround to test protected methods.
     *
     * @param string $name       The name of protected method.
     * @param array  $parameters The parameters to be passed to method.
     *
     * @access protected
     * @return mixed
     */
    protected function callMethod($name, array $parameters = array())
    {
        $PHP_VERSION = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '.' . PHP_RELEASE_VERSION;
        if (version_compare($PHP_VERSION, '5.3.2') < 0) {
            $this->markTestSkipped('The current PHP version (' . $PHP_VERSION . ') doesn\'t support the `setAccessible` method of `ReflectionMethod`.');
        }

        $method = new ReflectionMethod(get_class($this->object), $name);
        $method->setAccessible(true);

        return $method->invokeArgs($this->object, $parameters);
    }
    // }}}

    // {{{ removeFile
    /**
     * Remove an existent file.
     *
     * @param string $file The name of file to remove.
     *
     * @access protected
     * @return void
     */
    protected function removeFile($file)
    {
        $file = is_array($file) === true
                ? implode('', $file)
                : strval($file);

        if (is_string($file) === true
            && is_file($file) === true
        ) {
            chmod($file, 0777); // rwxrwxrwx
            unlink($file);
        }
    }
    // }}}

    // {{{ getFilledDataProvider
    /**
     * Create the array for the data provider
     *
     * @access protected
     * @return array
     */
    protected function getFilledDataProvider()
    {
        return $this->getMatrix(func_get_args());
    }
    // }}}

    // {{{ getMatrix
    /**
     * Generate a matrix from multiple array
     *
     * @param array   $parameters The array to combine them
     * @param integer $index      The primary array's index
     * @param array   $elements   The partial matrix
     *
     * @access protected
     * @return array
     */
    protected function getMatrix($parameters, $index = 0, $elements = array())
    {
        $combined = array();

        foreach ($parameters[$index] as $elem) {
            $_elems = $elements;
            array_push($_elems, $elem);

            if (isset($parameters[$index + 1]) === true) {
                $combined = array_merge($combined, $this->getMatrix($parameters, $index + 1, $_elems));
                continue;
            }

            array_push($combined, $_elems);
        }

        return $combined;
    }
    // }}}

    // {{{ getTempDir
    /**
     * Get the system temporary directory
     *
     * @access public
     * @return string
     */
    public function getTempDir()
    {
        return BonzaiAbstract::getTempDir();
    }
    // }}}
}
