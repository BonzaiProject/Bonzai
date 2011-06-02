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
        PG_Utils::pg_message("Generated %s bytes.", true, strlen($source));

        return $source;
    }

    protected function process($data, $asptag = false) {
        if (empty($data)) {
            throw new PG_Exception('Cannot parse an empty data'); // TODO: NON BLOCKER
        }

        $count = -1;

        // TODO: ANALYZE THIS CODE FOR PROBLEMS
        list($pt_open_long, $pt_open_short, $pt_close) = $this->getTags($asptag);

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
                $start       = $i = (int)$elem['close'] + 2;
                $end         = ($count + 1 >= $max) ? $data_len : $php[$count + 1]['open'];
                $count++;
            } else if ($i >= $start && $i <= $end) {
                $final_data .= "\necho <<<PHPG_HD\n" . substr($data, $start, $end - $start) . "\nPHPG_HD;\n";
                $i = $end;
            } else {
                $final_data .= "\necho <<<PHPG_HD\n" . substr($data, $i, $data_len - $i) . "\nPHPG_HD;\n";
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
        $pt_size_long = strlen($pt_open_long);

        $php = array();

        $max = substr_count($data, $pt_open_short);

        // TODO: ANALYZE THIS CODE FOR PROBLEMS
        $data_len = strlen($data);
        for ($j = 0; $j < $data_len; $j++) {
            $opened = $this->analyzeBlock($data, $j, &$php, $opened);
        }

        return $php;
    }

    protected function analyzeBlock($data, $pos, $php, $opened) {
    global $pt_close, $pt_open_short, $pt_open_long;

        $tag_long  = substr($data, $pos, $pt_size_long);
        $tag_short = substr($data, $pos, 2);

        $is_long_tag  = $tag_long == $pt_open_long;
        $is_short_tag = $tag_short == $pt_open_short;

        if (!$opened && $is_long_tag || $is_short_tag) {
            $len  = $is_long_tag ? $pt_size_long : 2;
            $next = substr($data, $j + $len, 1);
            $this->setBlock(&$php, $count + 1, 'size', $len);

            $opened = $this->isOpened(&$php, $next);
        } else if ($tag_short == $pt_close) {
            $this->setBlock(&$php, $count, 'close', $j);
            PG_Utils::pg_message("Found php close #%s: %s", true, $count, $php[$count]['close']);
            $opened = false;
        }

        return $opened;
    }

    protected function isOpened($php, $next) {
        if ($opened = in_array($next, array("\n", "=", " ")) {
            $this->setBlock(&$php, ++$count, 'open', $j);
            PG_Utils::pg_message("Found php start #%s: %s", true, $count, $php[$count]['open']);
        }

        return $opened;
    }

    protected function setBlock($container, $pos, $key, $value) {
      if (empty($container[$pos])) {
          $container[$pos] = array('open' => 0, 'close' => 0, 'size' => 0);
      }

      $container[$pos][$key] = $value;
    }
}
