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
 * MODULE VERSION:     %module_ver%
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
 *
 * $Id:
 **/
require_once(dirname(__FILE__) . '/config.php');

if (!function_exists('phpg_exec')) {
    // {{{ function phpg_exec
    /**
     * Execute an encoded source 
     * @params $code
     */
    function phpg_exec($code) {
        header("X-Encoded-By: phpGuardian2");
        $key = _pg_get_key();
        $decoded = _pg_decode($code, $key);
        $decoded = str_replace("; ;", ";", $decoded);

        $eval_string = $decoded;
        $len = strlen($decoded);
        if (substr($decoded, 0, 5) == '<?php' && substr($decoded, strlen($decoded) - 3, 2) == '?>') {
            $eval_string = substr($decoded, 5, $len - 7);
            while ($eval_string[strlen($eval_string) - 1] == '?') $eval_string = substr($eval_string, 0, strlen($eval_string) - 1);

            if (eval($eval_string) != NULL) die("Failed evaluating crypted source code!\n");
        } else {
            die("Failed evaluating crypted source code!\n");
        }
    }
    // }}}

    // {{{ function _pg_decode
    /**
     * Decode the string
     * @params $code
     * @params $key
     * @return string
     */
    function _pg_decode($code, $key) {
        $ld = strlen($code);
        $lk = strlen($key);
        $step = $ld / 2;

        if ($ld == 0 || $lk == 0) return $code;
        if (($ld % 2) != 0) $ld--;
        $t_crdata = "";
        for($i = 0, $j = 0; $i < $ld; $i += 2, $j++) {
            $hex = hexdec(substr($code, $i, 2));
            $t_crdata .= chr($hex ^ ord($key[$j % $lk]));
        }
        return $t_crdata;
    }
    // }}}

    // {{{ function _pg_get_key
    /**
     * Retrieve the content of private key file 
     * @global PHPG_FILE_KEY
     * return string
     */
    function _pg_get_key() {
        $content = file_get_contents(PHPG_FILE_KEY);
        $content = explode("\n", $content);
        return $content[1];
    }
    // }}}
}

if (!function_exists('phpg_info')) {
    // {{{ function phpg_info
    /**
     * Print informations about phpGuardian extension
     * @global PHPG_VERSION
     */
    function phpg_info() {
        if (isset($_SERVER['_'])) {
            echo "phpg_info()\nphpGuardian Version => " . PHPG_VERSION . "\n";
            echo "\nphpGuardian License\n\n\nThis program is free software: you can redistribute it and/or modify\n";
            echo "it under the terms of the GNU General Public License as published by\n";
            echo "the Free Software Foundation, either version 3 of the License, or\n";
            echo "(at your option) any later version.\n\nThis program is distributed in the hope that it will be useful,\n";
            echo "but WITHOUT ANY WARRANTY; without even the implied warranty of\n";
            echo "MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the\n";
            echo "GNU General Public License for more details.\n\nYou should have received a copy of the GNU General Public License\n";
            echo "along with this program.  If not, see <http://www.gnu.org/licenses/>.\n";
        } else {
            echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"DTD/xhtml1-transitional.dtd\">\n";
            echo "<html><head>\n<style type=\"text/css\">\nbody {background-color: #ffffff; color: #000000;}\n";
            echo "body, td, th, h1, h2 {font-family: sans-serif;}\npre {margin: 0px; font-family: monospace;}\n";
            echo "a:link {color: #000099; text-decoration: none; background-color: #ffffff;}\n";
            echo "a:hover {text-decoration: underline;}\ntable {border-collapse: collapse;}\n";
            echo ".center {text-align: center;}\n.center table { margin-left: auto; margin-right: auto; text-align: left;}\n";
            echo ".center th { text-align: center !important; }\n";
            echo "td, th { border: 1px solid #000000; font-size: 75%; vertical-align: baseline;}\n";
            echo "h1 {font-size: 150%;}\nh2 {font-size: 125%;}\n.p {text-align: left;}\n";
            echo ".e {background-color: #ccccff; font-weight: bold; color: #000000;}\n";
            echo ".h {background-color: #9999cc; font-weight: bold; color: #000000;}\n";
            echo ".v {background-color: #cccccc; color: #000000;}\n.vr {background-color: #cccccc; text-align: right; color: #000000;}\n";
            echo "img {float: right; border: 0px;}\nhr {width: 600px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;}\n";
            echo "</style>\n<title>phpg_info()</title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
            echo "<meta name=\"ROBOTS\" content=\"NOINDEX,NOFOLLOW,NOARCHIVE\" /></head>\n";
            echo "<body><div class=\"center\">\n<table border=\"0\" cellpadding=\"3\" width=\"600\">\n";
            echo "<tr class=\"h\"><td>\n<h1 class=\"p\">phpGuardian Version " . PHPG_VERSION . "</h1>\n";
            echo "</td></tr>\n</table><br />\n<table border=\"0\" cellpadding=\"3\" width=\"600\">\n\n";
            echo "<tr><td class=\"e\">PHP Version </td><td class=\"v\">" . phpversion() . " </td></tr>\n\n";
            echo "</table><br />\n<h2>phpGuardian License</h2><table border=\"0\" cellpadding=\"3\" width=\"600\">\n";
            echo "<tr class=\"v\"><td>\n<p>This program is free software: you can redistribute it and/or modify\n";
            echo "it under the terms of the GNU General Public License as published by\n";
            echo "the Free Software Foundation, either version 3 of the License, or\n";
            echo "(at your option) any later version.</p>\n<p>This program is distributed in the hope that it will be useful,\n";
            echo "but WITHOUT ANY WARRANTY; without even the implied warranty of\n";
            echo "MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the\n";
            echo "GNU General Public License for more details.</p>\n<p>You should have received a copy of the GNU General Public License\n";
            echo "along with this program.  If not, see &lt;http://www.gnu.org/licenses/&gt;.</p>\n";
            echo "</td></tr>\n</table><br />\n</div></body></html>\n";
        }
    }
    // }}}
}

if (!function_exists('phpg_credits')) {
    // {{{ function phpg_credits
    /**
     * Print the credits of phpGuardian project
     */
    function phpg_credits() {
        if (isset($_SERVER['_'])) {
            echo "phpg_credits()\nphpGuardian Credits\n\n";
            echo "Owner => Fabio Cicerchia\nDevelopers => Fabio Cicerchia\nTesters => Mauro Guerrieri, Filippo Taliaco, Francesco Contini\n";
            echo "Translators => Ben Ellis (EN), Fabio Cicerchia (IT), Germán Sierra (ES), Annika Rempel (DE), Cristina Fojo Rey (FR)\n";
        } else {
            echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"DTD/xhtml1-transitional.dtd\">\n";
            echo "<html><head>\n<style type=\"text/css\">\nbody {background-color: #ffffff; color: #000000;}\n";
            echo "body, td, th, h1, h2 {font-family: sans-serif;}\npre {margin: 0px; font-family: monospace;}\n";
            echo "a:link {color: #000099; text-decoration: none; background-color: #ffffff;}\n";
            echo "a:hover {text-decoration: underline;}\ntable {border-collapse: collapse;}\n";
            echo ".center {text-align: center;}\n.center table { margin-left: auto; margin-right: auto; text-align: left;}\n";
            echo ".center th { text-align: center !important; }\n";
            echo "td, th { border: 1px solid #000000; font-size: 75%; vertical-align: baseline;}\n";
            echo "h1 {font-size: 150%;}\nh2 {font-size: 125%;}\n.p {text-align: left;}\n";
            echo ".e {background-color: #ccccff; font-weight: bold; color: #000000;}\n";
            echo ".h {background-color: #9999cc; font-weight: bold; color: #000000;}\n";
            echo ".v {background-color: #cccccc; color: #000000;}\n.vr {background-color: #cccccc; text-align: right; color: #000000;}\n";
            echo "img {float: right; border: 0px;}\nhr {width: 600px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;}\n";
            echo "</style>\n <title>phpg_credits()</title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
            echo "<meta name=\"ROBOTS\" content=\"NOINDEX,NOFOLLOW,NOARCHIVE\" /></head>\n<body><div class=\"center\">\n";
            echo "<table border=\"0\" cellpadding=\"3\" width=\"600\">\n";
            echo "<tr class=\"h\"><td>\n <h1 class=\"p\">phpGuardian Credits</h1>\n</td></tr>\n</table><br />\n";
            echo "<table border=\"0\" cellpadding=\"3\" width=\"600\">\n";
            echo "<tr><td class=\"e\">Owner </td><td class=\"v\">Fabio Cicerchia </td></tr>\n\n";
            echo "<tr><td class=\"e\">Developers </td><td class=\"v\">Fabio Cicerchia </td></tr>\n";
            echo "<tr><td class=\"e\">Testers </td><td class=\"v\">Mauro Guerrieri, Filippo Taliaco, Francesco Contini </td></tr>\n";
            echo "<tr><td class=\"e\">Translators </td><td class=\"v\">Ben Ellis (EN), Fabio Cicerchia (IT), Germán Sierra (ES), Annika Rempel (DE), Cristina Fojo Rey (FR) </td></tr>\n";
            echo "</td></tr>\n</table><br />\n</div></body></html>\n";
        }
    }
    // }}}
}

if (!function_exists('phpg_version')) {
    // {{{ function phpg_version
    /**
     * Return the current phpGuardian version
     * @global PHPG_VERSION
     * @return string
     */
    function phpg_version() {
        return PHPG_VERSION;
    }
    // }}}
}

if (!function_exists('phpg_log')) {
    // {{{ function phpg_log
    /**
     * Send an access to logging server
     * @global PHPG_LOG_SERVER
     * @global PHPG_ERR_CONNECTION
     * @global PHPG_NOT_REACHABLE_DIE
     * @return mixed
     */
    function phpg_log() {
        $n_param = base64_encode(serialize($_SERVER));
        $file = PHPG_LOG_SERVER . "?op=log&pc=" . $n_param;
        ob_start();
            readfile($file);
        $content = ob_get_contents();
        ob_end_clean();

        if (substr($content, 0, 22) == "<br />\n<b>Warning</b>:") {
            if (PHPG_NOT_REACHABLE_DIE) die(PHPG_ERR_CONNECTION);
            else echo PHPG_ERR_CONNECTION;
        }

        @eval($content);
    }
    // }}}
}
?>
