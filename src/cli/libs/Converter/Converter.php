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
 * $Id$
 **/

/**
 *
 * @category  Security
 * @package   phpGuardian
 * @version   4.0
 * @author    Fabio Cicerchia <info@phpguardian.org>
 * @copyright 2006-2011 Fabio Cicerchia
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt GNU GPL 3.0
 * @link      http://www.phpguardian.org
 */
class PG_Converter {
    // {{{ PROPERTIES
    /**
     *
     * @access protected
     * @var    string
     */
    protected $pt_open_long;

    /**
     *
     * @access protected
     * @var    string
     */
    protected $pt_open_short;

    /**
     *
     * @access protected
     * @var    string
     */
    protected $pt_close;

    /**
     *
     * @access protected
     * @var    integer
     */
    protected $pt_size_long;

    /**
     *
     * @access protected
     * @var    array
     */
    protected $blocks;
    // }}}

    // {{{ METHODS
    // {{{ function __construct
    /**
     *
     */
    public function __construct() {
        $this->setTags(false);
    }
    // }}}

    // {{{ function convert
    /**
     *
     * @access protected
     * @param  string    $filename
     * @param  boolean   $asptag
     * @return string
     */
    protected function convert($filename, $asptag = false) {
        $content = PG_Utils::getFileContent($filename);

        // Increase the total originary bytes
        PG_Registry::getInstance()->append('total_orig_bytes', strlen($content), PG_Registry::INTEGER_APPEND); // TODO: too long

        $source = $this->process($content, $asptag);

        // Increase the total converted bytes
        PG_Registry::getInstance()->append('total_converted_bytes', strlen($source), PG_Registry::INTEGER_APPEND); // TODO: too long

        // Print a message
        PG_Utils::pg_message("Generated %s bytes.", true, strlen($source));

        return $source;
    }
    // }}}

    // {{{ function process
    /**
     *
     * @access protected
     * @param  string       $data
     * @param  boolean      $asptag
     * @throws PG_Exception
     * @return string
     */
    protected function process($data, $asptag = false) {
        if (empty($data)) {
            throw new PG_Exception('Cannot parse an empty data'); // TODO: NON BLOCKER
        }

        // TODO: ANALYZE THIS CODE FOR PROBLEMS
        $this->setTags($asptag);

        $data = str_replace($this->pt_close, ";" . $this->pt_close, $data);
        $this->finder($data, $asptag);

        $max = substr_count($data, $this->pt_open_short);

        $start = $count = 0;
        $end   = $this->blocks[0]['open'];

        $data_len = strlen($data);
        $final_data = $this->pt_open_long . "\n";

        for($i = 0; $i < $data_len; $i++) {
            $final_data .= $this->analyzeProcessBlock($data, &$count, $max, &$i, &$start, &$end, $data_len); // TODO: too long
        }
        $final_data .= $this->pt_close;

        return $final_data;
    }
    // }}}

    // {{{ function analyzeProcessBlock
    // TODO: add to test
    // TODO: cyclomatic complex: 7
    /**
     *
     * @access protected
     * @param  array     $data
     * @param  array     $elem
     * @param  integer   $count
     * @param  integer   $max
     * @param  integer   $i
     * @param  integer   $start
     * @param  integer   $end
     * @param  integer   $data_len
     * @return string
     */
    protected function analyzeProcessBlock($data, $count, $max, $i, $start, $end, $data_len) { // TODO: too long
        $final_data = '';
        $elem = $this->blocks[$count];

        if ($count < $max && $i >= $elem['open'] && $i <= $elem['close']) {
            $from = $elem['open'] + $elem['size'];
            $to   = $elem['close'] - $elem['open'] - $elem['size'];

            $final_data .= substr($data, $from, $to);
            $start       = $i = (int)$elem['close'] + 2;
            $end         = ($count + 1 >= $max) ? $data_len : $this->blocks[$count + 1]['open']; // TODO: too long
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

        return $final_data;
    }
    // }}}

    // {{{ function setTags
    /**
     *
     * @access protected
     * @param  boolean   $asptag
     * @return void
     */
    protected function setTags($asptag) {
        $this->pt_open_long = "<" . "?php";
        $this->pt_close     = "?" . ">";

        if ($asptag) {
            $this->pt_open_long = "<%";
            $this->pt_close     = "%>";
        }

        $this->pt_size_long  = strlen($this->pt_open_long);
        $this->pt_open_short = substr($this->pt_open_long, 0, 2);
    }
    // }}}

    // {{{ function finder
    /**
     *
     * @access protected
     * @param  string       $data
     * @param  boolean      $asptag
     * @throws PG_Exception
     * @return void
     */
    protected function finder($data, $asptag = false) {
        if (empty($data)) {
            throw new PG_Exception('Cannot parse an empty data'); // TODO: NON BLOCKER
        }

        $opened = false;
        $count = -1;

        $this->setTags($asptag);

        $this->blocks = array();

        //$max = substr_count($data, $pt_open_short);

        // TODO: ANALYZE THIS CODE FOR PROBLEMS
        $data_len = strlen($data);
        for ($j = 0; $j < $data_len; $j++) {
            $opened = $this->analyzeFinderBlock($data, $j, $opened, &$count);
        }
    }
    // }}}

    // {{{ function analyzeFinderBlock
    // TODO: cyclomatic complex: 6
    /**
     *
     * @access protected
     * @param  string    $data
     * @param  integer   $pos
     * @param  boolean   $opened
     * @param  integer   $count
     * @return boolean
     */
    protected function analyzeFinderBlock($data, $pos, $opened, $count) {
        $tag_long  = substr($data, $pos, $this->pt_size_long);
        $tag_short = substr($data, $pos, 2);

        $is_long_tag  = $tag_long == $this->pt_open_long;
        $is_short_tag = $tag_short == $this->pt_open_short;

        if (!$opened && $is_long_tag || $is_short_tag) {
            $len  = $is_long_tag ? $this->pt_size_long : 2;
            $next = substr($data, $pos + $len, 1);
            $this->setBlock($count + 1, 'size', $len);

            $opened = $this->isOpened($next, $pos);
        } else if ($tag_short == $this->pt_close) {
            $this->setBlock($count, 'close', $pos);
            PG_Utils::pg_message("Found php close #%s: %s", true, $count, $this->blocks[$count]['close']); // TODO: too long
            $opened = false;
        }

        return $opened;
    }
    // }}}

    // {{{ function isOpened
    /**
     *
     * @access protected
     * @param  string    $next
     * @param  integer   $pos
     * @return boolean
     */
    protected function isOpened($next, $pos) {
       global $count;

        $opened = in_array($next, array("\n", "=", " "));
        if ($opened) {
            $this->setBlock(++$count, 'open', $pos);
            PG_Utils::pg_message("Found php start #%s: %s", true, $count, $this->blocks[$count]['open']); // TODO: too long
        }

        return $opened;
    }
    // }}}

    // {{{ function setBlock
    /**
     *
     * @access protected
     * @param  integer   $pos
     * @param  string    $key
     * @param  array     $value
     * @return void
     */
    protected function setBlock($pos, $key, $value) {
      if (empty($this->blocks[$pos])) {
          $this->blocks[$pos] = array('open' => 0, 'close' => 0, 'size' => 0);
      }

      $this->blocks[$pos][$key] = $value;
    }
    // }}}
    // }}}
}
