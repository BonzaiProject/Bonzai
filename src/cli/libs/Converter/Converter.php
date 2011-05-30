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
 * 
 * @category  Security
 * @package   phpGuardian
 * @version   4.0
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Fabio Cicerchia
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt GNU General Public License 3.0
 * @link      http://www.phpguardian.org
 */
class PG_Converter {  
    protected function convert($filename, $asptag = false) {
        $content = PG_Utils::getFileContent($filename);
        
        // Increase the total originary bytes
        PG_Registry::getInstance()->append('total_orig_bytes', strlen($content), PG_Registry::INTEGER_APPEND);

        $source = $this->process($content, $asptag);

        // Increase the total converted bytes
        PG_Registry::getInstance()->append('total_converted_bytes', strlen($source), PG_Registry::INTEGER_APPEND);

        // Print a message
        PG_Utils::pg_message("Generated %s bytes.", true, $len);

        return $source;
    }
    
    protected function process($data, $asptag = false) {
        if (empty($data)) {
            throw new PG_Exception('Cannot parse an empty data'); // TODO: NON BLOCKER
        }
        
        $count = -1;
        
        // TODO: ANALYZE THIS CODE FOR PROBLEMS
        list($pt_open_long, $pt_open_short, $pt_close) = $this->getTags($asptag);
        $pt_size_long  = strlen($pt_open_long);
        
        $data = str_replace($pt_close, ";" . $pt_close, $data);
        $php = $this->finder($data, $asptag);

        $max = substr_count($data, $pt_open_short);

        $start = $count = 0;
        $end   = $php[0]['open'];
        
        $data_len = strlen($data);
        $final_data = $pt_open_long . "\n";
        
        for($i = 0; $i < $data_len; $i++) {
            $elem = $php[$count];
            if ($count < $max && $i >= $elem['open'] && $i <= $elem['close']) {
                $final_data .= substr($data, $elem['open'] + $elem['size'], $elem['close'] - $elem['open'] - $elem['size']);
                $start = $i = (int)$elem['close'] + 2;
                if ($count + 1 >= $max) $end = $data_len;
                else $end = (int)$php[$count + 1]['open'];
                $count++;
            } else if ($i >= $start && $i <= $end) {
                $final_data .= "\necho <<<PHPG_HD\n";
                $final_data .= substr($data, $start, $end - $start);
                $final_data .= "\nPHPG_HD;\n";
                $i = $end;
            } else {
                $final_data .= "\necho <<<PHPG_HD\n";
                $final_data .= substr($data, $i, $data_len - $i);
                $final_data .= "\nPHPG_HD;\n";
                $i = $data_len;
            }
        }
        $final_data .= $pt_close;
        
        return $final_data;
    }
    
    /**
     *
     * @access protected
     * @param  boolean $asptag 
     * @return array
     */
    protected function getTags($asptag) {
        $pt_open_long = "<?php";
        $pt_close     = "?>";

        if ($asptag) {
            $pt_open_long = "<%";
            $pt_close     = "%>";
        }
        
        $pt_open_short = substr($pt_open_long, 0, 2);
        
        return array($pt_open_long, $pt_open_short, $pt_close);
    }
    
    protected function finder($data, $asptag = false) {
        if (empty($data)) {
            throw new PG_Exception('Cannot parse an empty data'); // TODO: NON BLOCKER
        }
        
        $opened = false;
        $count = -1;

        list($pt_open_long, $pt_open_short, $pt_close) = $this->getTags($asptag);
        $pt_size_long  = strlen($pt_open_long);

        $max = substr_count($data, $pt_open_short);

        for ($i = 0; $i < $max; $i++) {
            $php[$i] = array('open' => 0, 'close' => 0, 'size' => 0);
        }

        // TODO: ANALYZE THIS CODE FOR PROBLEMS
        $data_len = strlen($data);
        for ($j = 0; $j < $data_len; $j++) {
            $tag_long  = substr($data, $j, $pt_size_long);
            $tag_short = substr($data, $j, 2);

            if (!$opened && ($tag_long == $pt_open_long) || ($tag_short == $pt_open_short)) {
                if ($tag_long == $pt_open_long) {
                    $next = substr($data, $j + $pt_size_long, 1);
                    $php[$count + 1]['size'] = $pt_size_long;
                } else {
                    $next = substr($data, $j + 2, 1);
                    $php[$count + 1]['size'] = 2;
                }
                
                if ($next == "\n" || $next == "=" || $next == " ") {
                    $count++;
                    $php[$count]['open'] = $j;
                    PG_Utils::pg_message("Found php start #%s: %s", true, $count, $php[$count]['open']);
                    $opened = true;
                }
            } else if ($tag_short == $pt_close) {
                $php[$count]['close'] = $j;
                PG_Utils::pg_message("Found php close #%s: %s", true, $count, $php[$count]['close']);
                $opened = false;
            }
        }
        
        return $php;
    }
}
