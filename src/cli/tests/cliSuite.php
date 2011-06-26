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
 *
 **/

require_once 'PHPUnit/Framework/TestSuite.php';

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
class cliSuite extends PHPUnit_Framework_TestSuite
{
    // {{{ METHODS
    // {{{ function __construct
    /**
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        $this->setName('cliSuite');

        $files = preg_grep('/Bonzai_.+_Test.php/', scandir(__DIR__));
        foreach($files as $file) {
            require_once __DIR__ . '/' . $file;
            $this->addTestSuite(substr($file, 0, -4));
        }
    }
    // }}}

    // {{{ function suite
    /**
     *
     * @static
     * @access public
     * @return cliSuite
     */
    public static function suite()
    {
        return new self();
    }
    // }}}
    // }}}
}
