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
class Bonzai_Converter
{
    // {{{ PROPERTIES
    /**
     * @access protected
     * @var    array
     */
    protected $php_tags = array();

    /**
     * @access protected
     * @var    array
     */
    protected $blocks = array();

    /**
     * @access protected
     * @var    integer
     */
    protected $count = -1;

    /**
     * @access protected
     * @var    integer
     */
    protected $max = 0;

    /**
     * @access protected
     * @var    integer
     */
    protected $start = 0;

    /**
     * @access protected
     * @var    integer
     */
    protected $end = 0;

    /**
     * @access protected
     * @var    integer
     */
    protected $curr = 0;

    /**
     * @access protected
     * @var    boolean
     */
    protected $opened = false;
    // }}}

    // {{{ convert
    /**
     * @access public
     * @param  string  $filename
     * @param  boolean $asptag
     * @return string
     */
    public function convert($filename, $asptag = false)
    {
        $content = Bonzai_Utils::getFileContent($filename);
        $source  = $this->process($content, $asptag);

        Bonzai_Registry::append('total_orig_bytes',      strlen($content), Bonzai_Registry::INT_APPEND);
        Bonzai_Registry::append('total_converted_bytes', strlen($source),  Bonzai_Registry::INT_APPEND);

        Bonzai_Utils::message('Generated %s bytes.', true, strlen($source));

        return $source;
    }
    // }}}

    // {{{ process
    /**
     * @access protected
     * @param  string  $data
     * @param  boolean $asptag
     * @throws Bonzai_Exception
     * @return string
     */
    protected function process($data, $asptag = false)
    {
        if (empty($data)) {
            throw new Bonzai_Exception('Cannot parse an empty data'); // UNCATCHED
        }

        $this->setTags($asptag);

        $data = str_replace($this->php_tags['close'], ';' . $this->php_tags['close'], $data); // USEFUL?
        $this->finder($data, $asptag);

        $this->max = substr_count($data, substr($this->php_tags['open'], 0, 2));

        $this->count = 0;
        $this->start = 0;
        $this->end   = $this->blocks[0]['open'];

        $data_len = strlen($data);

        $final_data = '';
        for($this->curr = 0; $this->curr < $data_len; $this->curr++) {
            $final_data .= $this->analyzeProcessBlock($data);
        }
        $final_data = $this->php_tags['open'] . PHP_EOL . $final_data . $this->php_tags['close'];

        return $final_data;
    }
    // }}}

    // {{{ analyzeProcessBlock
    /**
     * @access protected
     * @param  array $data
     * @return string
     */
    protected function analyzeProcessBlock($data)
    {
        $final_data = '';
        $data_len   = strlen($data);

        $block = $this->blocks[$this->count];

        $validElement = $this->count < $this->max;
        $intoBlock = $this->curr >= $block['open'] && $this->curr <= $block['close'];
        $betweenBlocks = $this->curr >= $this->start && $this->curr <= $this->end;

        if ($validElement && $intoBlock) {
            $from = $block['open'] + $block['size'];
            $to   = $block['close'] - $block['open'] - $block['size'];

            $final_data .= substr($data, $from, $to);
            $this->curr  = (int)$block['close'] + 2;
            $this->start = $this->curr;
            $this->end   = ($this->count + 1 >= $this->max)
                           ? $data_len : $this->blocks[$this->count + 1]['open'];
            $this->count++;
        } else {
            $final_data .= PHP_EOL . 'echo <<<BONZAI_HD' . PHP_EOL;

            if ($betweenBlocks) {
                $final_data .= substr($data, $this->start, $this->end - $this->start);
                $this->curr = $this->end;
            } else {
                $final_data .= substr($data, $this->curr, $data_len - $this->curr);
                $this->curr = $data_len;
            }

            $final_data .= PHP_EOL . 'BONZAI_HD;' . PHP_EOL;
        }

        return $final_data;
    }
    // }}}

    // {{{ setTags
    /**
     * @access protected
     * @param  boolean $asptag
     * @return void
     */
    protected function setTags($asptag)
    {
        $this->php_tags = array(
          'open'  => '<?php',
          'close' => '?' . '>'
        );

        if ($asptag) {
            $this->php_tags['open']  = '<%';
            $this->php_tags['close'] = '%' . '>';
        }
    }
    // }}}

    // {{{ finder
    /**
     * @access protected
     * @param  string  $data
     * @param  boolean $asptag
     * @throws Bonzai_Exception
     * @return void
     */
    protected function finder($data, $asptag = false)
    {
        if (empty($data)) {
            throw new Bonzai_Exception('Cannot parse an empty data'); // UNCATCHED
        }

        $this->setTags($asptag);

        $this->blocks = array();
        $this->count  = -1;
        $this->opened = false;

        $data_len = strlen($data);
        for ($this->curr = 0; $this->curr < $data_len; $this->curr++) {
            $this->analyzeFinderBlock($data);
        }

        $this->setBlock('close', $data_len);
    }
    // }}}

    // {{{ analyzeFinderBlock
    /**
     * @access protected
     * @param  string $data
     * @return void
     */
    protected function analyzeFinderBlock($data)
    {
        $tag_long  = substr($data, $this->curr, strlen($this->php_tags['open']));
        $tag_short = substr($data, $this->curr, 2);

        $is_long_tag  = $tag_long  == $this->php_tags['open'];
        $is_short_tag = $tag_short == substr($this->php_tags['open'], 0, 2);

        if (!$this->opened && ($is_long_tag || $is_short_tag)) {
            $len  = $is_long_tag
                    ? strlen($this->php_tags['open']) : 2;
            $next = substr($data, $this->curr + $len, 1);

            $this->opened = $this->isOpened($next, $this->curr);
            $this->setBlock('size', $len);
        } else if ($tag_short == $this->php_tags['close']) {
            $this->setBlock('close', $this->curr);
            $this->opened = false;

            Bonzai_Utils::message('Found php close #%s: %s', true, $this->count, $this->curr);
        }
    }
    // }}}

    // {{{ isOpened
    /**
     * @access protected
     * @param  string  $token
     * @param  integer $pos
     * @return boolean
     */
    protected function isOpened($token, $pos)
    {
        $opened = in_array($token, array(PHP_EOL, '=', ' ', "\t"));
        if ($opened) {
            $this->setBlock('open', $pos);
            Bonzai_Utils::message('Found php start #%s: %s', true, $this->count, $pos);
        }

        return $opened;
    }
    // }}}

    // {{{ setBlock
    /**
     * @access protected
     * @param  string $key
     * @param  array  $value
     * @return void
     */
    protected function setBlock($key, $value)
    {
        if ($key == 'open') {
            $this->count++;
        }
        $pos = $this->count;

        if (empty($this->blocks[$pos])) {
            $this->blocks[$pos] = array('open' => -1, 'close' => -1, 'size' => 0);
        }

        $this->blocks[$pos][$key] = $value;
    }
    // }}}
}
