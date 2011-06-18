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
 * LICENSE:        MIT or GNU GPL 2
 *                 The MIT License is recommended for most projects, it's simple
 *                 and  easy  to understand and it places almost no restrictions
 *                 on  what  you  can do with phpGuardian.
 *                 If  the  GPL  suits  your project better you are also free to
 *                 use phpGuardian under that license.
 *                 You   don't  have  to  do  anything  special  to  choose  one
 *                 license  or  the  other  and  you don't have to notify anyone
 *                 which   license   you   are   using.  You  are  free  to  use
 *                 phpGuardian  in  commercial projects as long as the copyright
 *                 header is left intact.
 *                 <http://www.opensource.org/licenses/mit-license.php>
 *                 <http://www.opensource.org/licenses/gpl-2.0.php>
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
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @license   http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link      http://www.phpguardian.org
 */
class PG_Utils_Help
{
    // {{{ METHODS
    // {{{ function elaborate
    /**
     *
     * @access public
     * @param  PG_Utils_Options $options
     * @return void
     */
    public function elaborate(PG_Utils_Options $options)
    {
        printf('       _            ____                     _ _             ____' . PHP_EOL); // TODO: too long
        printf(' _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \\' . PHP_EOL); // TODO: too long
        printf('| \'_ \\| \'_ \\| \'_ \\| |  _| | | |/ _` | \'__/ _` | |/ _` | \'_ \\  __) |' . PHP_EOL); // TODO: too long
        printf('| |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/' . PHP_EOL); // TODO: too long
        printf('| .__/|_| |_| .__/ \\____|\\__,_|\\__,_|_|  \\__,_|_|\\__,_|_| |_|_____|' . PHP_EOL); // TODO: too long
        printf('|_|         |_| phpGuardian CLI' . PHP_EOL . PHP_EOL . PHP_EOL);

        printf('phpGuardian %s: %s' . PHP_EOL, _('Version'), '4.0');
        printf('CLI %s:         %s' . PHP_EOL, _('Version'), '1.0');
        printf('Copyright (C) 2006-%d Fabio Cicerchia' . PHP_EOL . PHP_EOL, date('Y'));
        printf('License GPLv3+: GNU GPL version 3 or later <http://gnu.org/licenses/gpl.html>' . PHP_EOL); // TODO: too long
        printf('This is free software: you are free to change and redistribute it.' . PHP_EOL); // TODO: too long
        printf('There is NO WARRANTY, to the extent permitted by law.' . PHP_EOL);

        if (!is_null($options->getOption('version'))) {
            printf('%s %s [%s] <config_file>' . PHP_EOL . PHP_EOL, _('Usage:'), $_SERVER['argv'][0], _('options')); // TODO: too long
            printf('%s' . PHP_EOL, _('Command & Relative Options:'));
            foreach($options->getScriptParameters() as $short => $long) {
                $short = str_replace(':', '', $short);
                $long  = str_replace(':', '', $long);

                $info = "-$short [--$long]";
                printf(' ' . str_pad($info, 40, " ") . '%s' . PHP_EOL, _($options->getLabelParameter($long))); // TODO: too long
            }
            printf(PHP_EOL . '%s' . PHP_EOL . PHP_EOL, _('Report bugs to bugs@phpguardian.org'));
        }
    }
    // }}}
    // }}}
}
