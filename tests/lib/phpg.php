<?php
/**
 *           _            ____                     _ _             ____  
 *     _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \ 
 *    | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 *    | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ 
 *    | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 *    |_|         |_| phpGuardian %MODULE%
 *
 *
 * PHPGUARDIAN2
 * 
 * CODE NAME:          %codename%
 * ENGINE VERSION:     %engine_ver%
 * EXT VERSION:        %module_ver%
 *
 * URL:                http://www.phpguardian.org
 * E-MAIL:             info@phpguardian.org
 *
 * COPYRIGHT:          2006-%curr_year% Fabio Cicerchia
 * LICENSE:            GNU GPL 3+
 *                     This program is free software: you can redistribute it and/or modify
 *                     it under the terms of the GNU General Public License as published by
 *                     the Free Software Foundation, either version 3 of the License, or
 *                     (at your option) any later version.
 *
 *                     This program is distributed in the hope that it will be useful,
 *                     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *                     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *                     GNU General Public License for more details.
 *
 *                     You should have received a copy of the GNU General Public License
 *                     along with this program. If not, see <http://www.gnu.org/licenses/>.
 **/

define("PHPG_VERSION", "1.0");
define("PHPG_LOG_SERVER", "http://www.phpguardian.org/server.php");
define("PHPG_ERR_CONNECTION", "Error in the connection to the web site.");
define("PHPG_NOT_REACHABLE_DIE", true);

function phpg_exec($code) {
    header("X-Encoded-By: phpGuardian2");
    define("start_phpg_execution", time());
    $key = _pg_get_key("test");
    $decoded = _pg_decode($code, $key);

    $eval_string = $decoded;
    $len = strlen($decoded);
    $eval_string = substr($decoded, 5, $len - 7);
    while ($eval_string[strlen($eval_string) - 1] == '?') {
        $eval_string = substr($eval_string, 0, strlen($eval_string) - 1);
    }
    
    if (eval($eval_string) != NULL) {
        die("Failed evaluating crypted source code!\n");
    }
}

function _pg_decode($code, $key) {
    /*if (!isset(start_phpg_execution)) {
        die("Suspected hacking attempts!\n");
    }*/
    $j = 0;
    $ld = strlen($code);
    $lk = strlen($key);
    $step = $ld / 2;

    if ($ld == 0) return "";

    if (strlen($key) == 0) {
        return $code;
    }
    if(($ld % 2) != 0) {
        $ld--;
    }
    $hex;
    $s = $code;
    $t_crdata = "";
    for($i = 0; $i < $ld; $i += 2) {
        $hex = hexdec(substr($s, $i, 2));
        $t_char = $hex ^ ord($key[$j % $lk]);

        $t_crdata .= chr($t_char);
        
        $j++;
    }
    return $t_crdata;
}

function _pg_get_key() {
    /*if (!isset(start_phpg_execution) || start_phpg_execution != time()) {
        die("Suspected hacking attempts!\n");
    }*/
    $fkey = ini_get("phpguardian.key_file");
    $content = file_get_contents($fkey);
    return $content;
}

function phpg_info() {
    if (isset($_SERVER['_'])) {
        echo "phpg_info()\n";
        echo "phpGuardian Version => " . PHPG_VERSION . "\n";
        echo "\n";
        echo "phpGuardian License\n";
        echo "\n";
        echo "\n";
        echo "This program is free software: you can redistribute it and/or modify\n";
        echo "it under the terms of the GNU General Public License as published by\n";
        echo "the Free Software Foundation, either version 3 of the License, or\n";
        echo "(at your option) any later version.\n";
        echo "\n";
        echo "This program is distributed in the hope that it will be useful,\n";
        echo "but WITHOUT ANY WARRANTY; without even the implied warranty of\n";
        echo "MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the\n";
        echo "GNU General Public License for more details.\n";
        echo "\n";
        echo "You should have received a copy of the GNU General Public License\n";
        echo "along with this program.  If not, see <http://www.gnu.org/licenses/>.\n";
    } else {
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"DTD/xhtml1-transitional.dtd\">\n";
        echo "<html><head>\n";
        echo "<style type=\"text/css\">\n";
        echo "body {background-color: #ffffff; color: #000000;}\n";
        echo "body, td, th, h1, h2 {font-family: sans-serif;}\n";
        echo "pre {margin: 0px; font-family: monospace;}\n";
        echo "a:link {color: #000099; text-decoration: none; background-color: #ffffff;}\n";
        echo "a:hover {text-decoration: underline;}\n";
        echo "table {border-collapse: collapse;}\n";
        echo ".center {text-align: center;}\n";
        echo ".center table { margin-left: auto; margin-right: auto; text-align: left;}\n";
        echo ".center th { text-align: center !important; }\n";
        echo "td, th { border: 1px solid #000000; font-size: 75%; vertical-align: baseline;}\n";
        echo "h1 {font-size: 150%;}\n";
        echo "h2 {font-size: 125%;}\n";
        echo ".p {text-align: left;}\n";
        echo ".e {background-color: #ccccff; font-weight: bold; color: #000000;}\n";
        echo ".h {background-color: #9999cc; font-weight: bold; color: #000000;}\n";
        echo ".v {background-color: #cccccc; color: #000000;}\n";
        echo ".vr {background-color: #cccccc; text-align: right; color: #000000;}\n";
        echo "img {float: right; border: 0px;}\n";
        echo "hr {width: 600px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;}\n";
        echo "</style>\n";
        echo "<title>phpg_info()</title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
        echo "<meta name=\"ROBOTS\" content=\"NOINDEX,NOFOLLOW,NOARCHIVE\" /></head>\n";
        echo "<body><div class=\"center\">\n";
        echo "<table border=\"0\" cellpadding=\"3\" width=\"600\">\n";
        echo "<tr class=\"h\"><td>\n";
        echo "<h1 class=\"p\">phpGuardian Version " . PHPG_VERSION . "</h1>\n";
        echo "</td></tr>\n";
        echo "</table><br />\n";
        echo "<table border=\"0\" cellpadding=\"3\" width=\"600\">\n";
        echo "\n";
        echo "<tr><td class=\"e\">PHP Version </td><td class=\"v\">" . phpversion() . " </td></tr>\n";
        echo "\n";
        echo "</table><br />\n";
        echo "<h2>phpGuardian License</h2><table border=\"0\" cellpadding=\"3\" width=\"600\">\n";
        echo "<tr class=\"v\"><td>\n";
        echo "<p>This program is free software: you can redistribute it and/or modify\n";
        echo "it under the terms of the GNU General Public License as published by\n";
        echo "the Free Software Foundation, either version 3 of the License, or\n";
        echo "(at your option) any later version.</p>\n";
        echo "<p>This program is distributed in the hope that it will be useful,\n";
        echo "but WITHOUT ANY WARRANTY; without even the implied warranty of\n";
        echo "MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the\n";
        echo "GNU General Public License for more details.</p>\n";
        echo "<p>You should have received a copy of the GNU General Public License\n";
        echo "along with this program.  If not, see &lt;http://www.gnu.org/licenses/&gt;.</p>\n";
        echo "</td></tr>\n";
        echo "</table><br />\n";
        echo "</div></body></html>\n";
    }
}

function phpg_credits() {
    if (isset($_SERVER['_'])) {
        echo "phpg_credits()\n";
        echo "phpGuardian Credits\n";
        echo "\n";
        echo "Owner => Fabio Cicerchia\n";
    } else {
    	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"DTD/xhtml1-transitional.dtd\">\n";
    	echo "<html><head>\n";
    	echo "<style type=\"text/css\">\n";
    	echo "body {background-color: #ffffff; color: #000000;}\n";
    	echo "body, td, th, h1, h2 {font-family: sans-serif;}\n";
    	echo "pre {margin: 0px; font-family: monospace;}\n";
    	echo "a:link {color: #000099; text-decoration: none; background-color: #ffffff;}\n";
    	echo "a:hover {text-decoration: underline;}\n";
    	echo "table {border-collapse: collapse;}\n";
    	echo ".center {text-align: center;}\n";
    	echo ".center table { margin-left: auto; margin-right: auto; text-align: left;}\n";
    	echo ".center th { text-align: center !important; }\n";
    	echo "td, th { border: 1px solid #000000; font-size: 75%; vertical-align: baseline;}\n";
    	echo "h1 {font-size: 150%;}\n";
    	echo "h2 {font-size: 125%;}\n";
    	echo ".p {text-align: left;}\n";
    	echo ".e {background-color: #ccccff; font-weight: bold; color: #000000;}\n";
    	echo ".h {background-color: #9999cc; font-weight: bold; color: #000000;}\n";
    	echo ".v {background-color: #cccccc; color: #000000;}\n";
    	echo ".vr {background-color: #cccccc; text-align: right; color: #000000;}\n";
    	echo "img {float: right; border: 0px;}\n";
    	echo "hr {width: 600px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;}\n";
    	echo "</style>\n";
    	echo "<title>phpg_credits()</title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
    	echo "<meta name=\"ROBOTS\" content=\"NOINDEX,NOFOLLOW,NOARCHIVE\" /></head>\n";
    	echo "<body><div class=\"center\">\n";
    	echo "<table border=\"0\" cellpadding=\"3\" width=\"600\">\n";
    	echo "<tr class=\"h\"><td>\n";
    	echo "<h1 class=\"p\">phpGuardian Credits</h1>\n";
    	echo "</td></tr>\n";
    	echo "</table><br />\n";
    	echo "<table border=\"0\" cellpadding=\"3\" width=\"600\">\n";
    	echo "<tr><td class=\"e\">Owner </td><td class=\"v\">Fabio Cicerchia </td></tr>\n";
    	echo "</td></tr>\n";
    	echo "</table><br />\n";
      	echo "</div></body></html>\n";
    }
}

function phpg_version() {
    return PHPG_VERSION;
}

function phpg_log() {
    $n_param = base64_encode(gzdeflate(serialize($_SERVER)));
    $file = PHPG_LOG_SERVER . "?op=log&p=" . $n_param;
    ob_start();
        readfile($file);
    $content = ob_get_contents();
    ob_end_clean();

    if (stripos('$value', $content) !== false) {
        $content .= "\n$value = '';";
    }

    if (substr($content, 0, 22) == "<br />\n<b>Warning</b>:") {
        $message = PHPG_ERR_CONNECTION;
    }
    
    if (PHPG_NOT_REACHABLE_DIE && !empty($message)) {
        die($message);
    } elseif (!empty($message)) {
        echo $message;
    }
}
?>
