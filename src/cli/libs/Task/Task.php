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
class Bonzai_Task
{
    // {{{ PROPERTIES
    /**
     * @access protected
     * @var    string $task
     */
    protected $task = 'Bonzai_Utils_Help';

    /**
     * @access protected
     * @var    mixed $parameters
     */
    protected $parameters = null;
    // }}}

    // {{{ loadAndExecute
    /**
     * @access public
     * @param  Bonzai_Utils_Options $options
     * @return mixed
     */
    public function loadAndExecute(Bonzai_Utils_Options $options = null)
    {
        if (is_null($options)) {
            $options = new Bonzai_Utils_Options;
        }

        $this->load($options);

        try {
            return $this->execute();
        } catch (Bonzai_Exception $e) {
            $fallback = new Bonzai_Utils_Help();
            return $fallback->elaborate(new Bonzai_Utils_Options());
        }
    }
    // }}}

    // {{{ load
    /**
     * @access protected
     * @param  Bonzai_Utils_Options $options
     * @return void
     */
    protected function load(Bonzai_Utils_Options $options = null)
    {
        $this->parameters = $options;

        $options = $this->parameters->getOptionParams();
        if (!empty($options) && $this->parameters->getOption('help') === null && $this->parameters->getOption('version') === null) {
            $this->task       = 'Bonzai_Encoder';
            $this->parameters = $options;
        }
    }
    // }}}

    // {{{ execute
    /**
     * @access protected
     * @throws Bonzai_Exception
     * @return mixed
     */
    protected function execute()
    {
        $class = $this->task;
        $class = new $class();

        if (!method_exists($class, 'elaborate')) {
            $message = gettext('Cannot launch the task `%s`.');
            throw new Bonzai_Exception(sprintf($message, $this->task));
        }

        return $class->elaborate($this->parameters);
    }
    // }}}
}
