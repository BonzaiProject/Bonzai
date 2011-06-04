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
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Fabio Cicerchia
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt GNU GPL 3.0
 * @link      http://www.phpguardian.org
 */
class PG_Utils_Help {
    // {{{ METHODS
    // {{{ function eleborate
    /**
     *
     * @access public
     * @param  PG_Utils_Options $options
     * @return void
     */
    public function eleborate(PG_Utils_Options $options) {
        printf("       _            ____                     _ _             ____\n"); // TODO: too long
        printf(" _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \\\n"); // TODO: too long
        printf("| '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |\n"); // TODO: too long
        printf("| |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/\n"); // TODO: too long
        printf("| .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|\n"); // TODO: too long
        printf("|_|         |_| phpGuardian CLI\n\n\n");

        printf("phpGuardian %s: %s\n", _("Version"), "4.0");
        printf("CLI %s:         %s\n", _("Version"), "1.0");
        printf("Copyright (C) 2006-%d Fabio Cicerchia\n\n", date("Y"));
        printf("License GPLv3+: GNU GPL version 3 or later <http://gnu.org/licenses/gpl.html>\n"); // TODO: too long
        printf("This is free software: you are free to change and redistribute it.\n"); // TODO: too long
        printf("There is NO WARRANTY, to the extent permitted by law.\n");

        if (!is_null($options->getOption('version'))) {
            printf("%s %s [%s] <config_file>\n\n", _("Usage:"), $_SERVER['argv'][0], _("options")); // TODO: too long
            printf("%s\n", _("Command & Relative Options:"));
            foreach($options->getScriptParameters() as $short => $long) {
                $short = str_replace(':', '', $short);
                $long  = str_replace(':', '', $long);

                $info = "-$short [--$long]";
                printf(" " . str_pad($info, 40, " ") . "%s\n", _($options->getLabelParameter($long))); // TODO: too long
            }
            printf("\n%s\n\n", _("Report bugs to bugs@phpguardian.org"));
        }
    }
    // }}}
    // }}}
}
