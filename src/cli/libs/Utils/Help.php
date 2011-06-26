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
class Bonzai_Utils_Help
{
    // {{{ METHODS
    // {{{ function elaborate
    /**
     *
     * @access public
     * @param  Bonzai_Utils_Options $options
     * @return void
     */
    public function elaborate(Bonzai_Utils_Options $options)
    {
        printf('BONZAI' . PHP_EOL);
        printf('(was phpGuardian)' . PHP_EOL . PHP_EOL);

        printf('Version: 0.1' . PHP_EOL);
        printf('Copyright (C) 2006-2011 Bonzai - Fabio Cicerchia.
				All rights reserved.' . PHP_EOL);
        printf('License MIT <http://www.opensource.org/licenses/mit-license.php>
        		 or GNU GPL 2 <http://www.opensource.org/licenses/gpl-2.0.php>'
        	   . PHP_EOL . PHP_EOL);

        printf('Usage:' . PHP_EOL);
        printf('    ./bonzai-cli [COMMAND] [OPTIONS]... [FILE|DIRECTORY]'
        	   . PHP_EOL . PHP_EOL);

        printf('Commands:' . PHP_EOL);
        printf('    encode            Encode all files into directory
				(recursively)' . PHP_EOL . PHP_EOL);

        printf('Options:' . PHP_EOL);
        printf('    -b, --backup		Backup the original file, generate a
				.bak file (default: false)' . PHP_EOL);
        printf('    --ext=<extension>	Parse only the file that matches the
				specified extension (default: php)' . PHP_EOL);
        printf('    -a, --asp			Use the tags asp instead php'
				. PHP_EOL . PHP_EOL);

        printf('	--verbose			Verbose' . PHP_EOL);
        printf('    -h, --help			Show the help' . PHP_EOL);
        printf('    -v, --version		Show the version' . PHP_EOL . PHP_EOL);


        printf('Report bugs to bonzai@fabiocicerchia.it' . PHP_EOL);

        /*if (!is_null($options->getOption('version'))) {
            printf('%s %s [%s] <config_file>' . PHP_EOL . PHP_EOL, _('Usage:'), $_SERVER['argv'][0], _('options')); // TODO: too long
            printf('%s' . PHP_EOL, _('Command & Relative Options:'));
            foreach($options->getScriptParameters() as $short => $long) {
                $short = str_replace(':', '', $short);
                $long  = str_replace(':', '', $long);

                $info = "-$short [--$long]";
                printf(' ' . str_pad($info, 40, " ") . '%s' . PHP_EOL, _($options->getLabelParameter($long))); // TODO: too long
            }
            printf(PHP_EOL . '%s' . PHP_EOL . PHP_EOL, _('Report bugs to bugs@bonzai.org'));
        }*/
    }
    // }}}
    // }}}
}
