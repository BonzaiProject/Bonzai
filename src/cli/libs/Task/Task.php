<?php
/**
 *        _            ____                     _ _             ____
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian CLI
 *
 *
 * PHPGUARDIAN2
 *
 * CODE NAME:      phoenix
 * ENGINE VERSION: 4.0
 * MODULE VERSION: 1.0
 *
 * URL:            http://www.phpguardian.org
 * E-MAIL:         info@phpguardian.org
 *
 * COPYRIGHT:      2006-2011 Fabio Cicerchia
 * LICENSE:        MIT or GNU GPL 2
 *                 The MIT License is recommended for most projects, it's simple
 *                 and  easy  to understand and it places almost no restrictions
 *                 on  what  you  can do with phpGuardian.
 *                 If  the  GPL  suits  your project better you are also free to
 *                 use phpGuardian under that license.
 *                 You   don't  have  to  do  anything  special  to  choose  one
 *                 license  or  the  other  and  you don't have to notify anyone
 *                 which   license   you   are   using.  You  are  free  to  use
 *                 phpGuardian  in  commercial projects as long as the copyright
 *                 header is left intact.
 *                 <http://www.opensource.org/licenses/mit-license.php>
 *                 <http://www.opensource.org/licenses/gpl-2.0.php>
 *
 * $Id$
 **/

/**
 * Handle the all global behaviours
 *
 * @category  Security
 * @package   phpGuardian
 * @version   4.0
 * @author    Fabio Cicerchia <info@phpguardian.org>
 * @copyright 2006-2011 Fabio Cicerchia
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @license   http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link      http://www.phpguardian.org
 */
class PG_Task
{
    // {{{ PROPERTIES
    /**
     *
     * @access protected
     * @var    string    $task
     */
    protected $task = 'PG_Utils_Help';

    /**
     *
     * @access protected
     * @var    mixed     $parameters
     */
    protected $parameters = null;
    // }}}

    // {{{ METHODS
    // {{{ function load
    /**
     *
     * @access public
     * @param  PG_Utils_Options $options
     * @return void
     */
    public function load(PG_Utils_Options $options)
    {
        $this->parameters = $options;

        if (!is_null($options->getOption('generate'))) {
            $this->task       = 'PG_Script_Generator';
            $this->parameters = $this->options->getOption('generate');
        } elseif (count($options->getOptions()) == 0 && count($options->getParameters()) > 0) { // TODO: too long
            $this->task       = 'PG_Script_Parser';
            $this->parameters = array_shift($options->getParameters());
        }
    }
    // }}}

    // {{{ function execute
    /**
     *
     * @access public
     * @throws PG_Exception
     * @return mixed
     */
    public function execute()
    {
        $class = $this->task;
        $class = new $class();

        if (!method_exists($class, 'elaborate')) {
            throw new PG_Exception('Cannot launch the task `' . $this->task . '`'); // TODO: BLOCKER // TODO: too long
        } else {
            return call_user_method('elaborate', $class, $this->parameters);
        }
    }
    // }}}

    // {{{ function loadAndExecute
    /**
     *
     * @access public
     * @param  PG_Utils_Options $options
     * @return mixed
     */
    public function loadAndExecute(PG_Utils_Options $options)
    {
        $this->load($options);
        return $this->execute();
    }
    // }}}
    // }}}
}
