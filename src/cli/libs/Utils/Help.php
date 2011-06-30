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
 * URL:            http://www.bonzai-project.org
 * E-MAIL:         info@bonzai-project.org
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
 * @link      http://www.bonzai-project.org
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
        $BOLD    = "\033[1m";
        $CLS     = "\033[0m";

        $BLACK   = "\033[30m";
        $RED     = "\033[31m";
        $GREEN   = "\033[32m";
        $YELLOW  = "\033[33m";
        $BLUE    = "\033[34m";
        $MAGENTA = "\033[35m";
        $CYAN    = "\033[36m";
        $WHITE   = "\033[37m";

        printf($BOLD . "BONZAI\n" . $CLS);
        printf("(was phpGuardian)\n");

        printf("-------------------------------------------------------------------------------\n");
        printf("Version: 0.1\n");
        printf("Copyright (C) 2006-2011 Bonzai - Fabio Cicerchia."
               . " All rights reserved.\n");
        printf("License MIT or GNU GPL 2\n");
        printf("-------------------------------------------------------------------------------\n");

        if (is_null($options->getOption('version'))) {
            printf("\n%s\n%s [%s]... [%s|%s]\n\n", $BOLD . _('Usage:') . $CLS, $_SERVER['argv'][0], _('OPTIONS'), _('FILE'), _('DIRECTORY')); // TODO: too long
            printf("%s\n", $BOLD . _('Options:') . $CLS);
            foreach($options->getParameters() as $short => $long) {
                $has_value = strpos($short, ':') > 0;

                $short = str_replace(':', '', $short);
                $long  = str_replace(':', '', $long);

                $info = "-$short, --$long";
                if ($has_value) {
                    $info .= "=<value>";
                }

                printf('    ' . str_pad($info, 30, " ") . "%s\n", _($options->getLabelParameter($long))); // TODO: too long
            }
            printf("Report bugs to info@bonzai-project.org\n");
        }
    }
    // }}}
    // }}}
}
