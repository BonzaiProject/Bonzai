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

class Bonzai_Converter
{
    // {{{ PROPERTIES
    /**
     *
     * @access protected
     * @var    string
     */
    protected $pt_open_long = '<?php';

    /**
     *
     * @access protected
     * @var    string
     */
    protected $pt_open_short = '<?';

    /**
     *
     * @access protected
     * @var    string
     */
    protected $pt_close = '?>';

    /**
     *
     * @access protected
     * @var    integer
     */
    protected $pt_size_long = 5;

    /**
     *
     * @access protected
     * @var    array
     */
    protected $blocks = array();
    // }}}

    // {{{ METHODS
    // {{{ function convert
    /**
     *
     * @access protected
     * @param  string    $filename
     * @param  boolean   $asptag
     * @return string
     */
    protected function convert($filename, $asptag = false)
    {
        $content = Bonzai_Utils::getFileContent($filename);

        // Increase the total originary bytes
        Bonzai_Registry::getInstance()->append('total_orig_bytes', strlen($content), Bonzai_Registry::INTEGER_APPEND); // TODO: too long

        $source = $this->process($content, $asptag);

        // Increase the total converted bytes
        Bonzai_Registry::getInstance()->append('total_converted_bytes', strlen($source), Bonzai_Registry::INTEGER_APPEND); // TODO: too long

        // Print a message
        Bonzai_Utils::bonzai_message('Generated %s bytes.', true, strlen($source));

        return $source;
    }
    // }}}

    // {{{ function process
    /**
     *
     * @access protected
     * @param  string       $data
     * @param  boolean      $asptag
     * @throws Bonzai_Exception
     * @return string
     */
    protected function process($data, $asptag = false)
    {
        if (empty($data)) {
            throw new Bonzai_Exception('Cannot parse an empty data'); // TODO: NON BLOCKER
        }

        // TODO: ANALYZE THIS CODE FOR PROBLEMS
        $this->setTags($asptag);

        $data = str_replace($this->pt_close, ';' . $this->pt_close, $data);
        $this->finder($data, $asptag);

        $max = substr_count($data, $this->pt_open_short);

        $start = 0;
        $count = 0;
        $end   = $this->blocks[0]['open'];

        $data_len   = strlen($data);
        $final_data = $this->pt_open_long . PHP_EOL;

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
    protected function analyzeProcessBlock($data, $count, $max, $i, $start, $end, $data_len) // TODO: too long
    {
        $final_data = '';

        $elem = $this->blocks[$count];

        if ($count < $max && $i >= $elem['open'] && $i <= $elem['close']) {
            $from = $elem['open'] + $elem['size'];
            $to   = $elem['close'] - $elem['open'] - $elem['size'];

            $final_data .= substr($data, $from, $to);
            $start       = $i = (int)$elem['close'] + 2;
            $end         = ($count + 1 >= $max)
                           ? $data_len : $this->blocks[$count + 1]['open'];
            $count++;
        } else if ($i >= $start && $i <= $end) {
            $final_data .= PHP_EOL . 'echo <<<BONZAI_HD' . PHP_EOL;
            $final_data .= substr($data, $start, $end - $start);
            $final_data .= PHP_EOL . 'BONZAI_HD;' . PHP_EOL;

            $i = $end;
        } else {
            $final_data .= PHP_EOL . 'echo <<<BONZAI_HD' . PHP_EOL;
            $final_data .= substr($data, $i, $data_len - $i);
            $final_data .= PHP_EOL . 'BONZAI_HD;' . PHP_EOL;

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
    protected function setTags($asptag)
    {
        $this->pt_open_long = '<?php';
        $this->pt_close     = '?>';

        if ($asptag) {
            $this->pt_open_long = '<%';
            $this->pt_close     = '%>';
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
     * @throws Bonzai_Exception
     * @return void
     */
    protected function finder($data, $asptag = false)
    {
        if (empty($data)) {
            throw new Bonzai_Exception('Cannot parse an empty data'); // TODO: NON BLOCKER
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
    protected function analyzeFinderBlock($data, $pos, $opened, $count)
    {
        $tag_long  = substr($data, $pos, $this->pt_size_long);
        $tag_short = substr($data, $pos, 2);

        $is_long_tag  = $tag_long  == $this->pt_open_long;
        $is_short_tag = $tag_short == $this->pt_open_short;

        if (!$opened && $is_long_tag || $is_short_tag) {
            $len  = $is_long_tag
                    ? $this->pt_size_long : 2;
            $next = substr($data, $pos + $len, 1);
            $this->setBlock($count + 1, 'size', $len);

            $opened = $this->isOpened($next, $pos);
        } else if ($tag_short == $this->pt_close) {
            $this->setBlock($count, 'close', $pos);
            Bonzai_Utils::bonzai_message('Found php close #%s: %s', true, $count, $this->blocks[$count]['close']); // TODO: too long
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
    protected function isOpened($next, $pos)
    {
       global $count;

        $opened = in_array($next, array(PHP_EOL, '=', ' '));
        if ($opened) {
            $this->setBlock(++$count, 'open', $pos);
            Bonzai_Utils::bonzai_message('Found php start #%s: %s', true, $count, $this->blocks[$count]['open']); // TODO: too long
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
    protected function setBlock($pos, $key, $value)
    {
      if (empty($this->blocks[$pos])) {
          $this->blocks[$pos] = array('open' => 0, 'close' => 0, 'size' => 0);
      }

      $this->blocks[$pos][$key] = $value;
    }
    // }}}
    // }}}
}
