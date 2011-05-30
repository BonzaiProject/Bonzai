/**
 *        _            ____                     _ _             ____  
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ 
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian HASH
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
 * $Id: core.h,v 1.4 2010-02-11 09:23:24 fabio Exp $
 **/

#ifndef _HASH_H
    // {{{ INCLUDES
    //#include <unistd.h>
    #include <ftw.h>
    #include "shared.h"
    // }}}

    // {{{ DEFINES
    #define _HASH_H
    #define _FORTIFY_SOURCE 2

    #ifndef PHPG_DEBUG
        #define PHPG_DEBUG
    #endif /* PHPG_DEBUG */
    #define PG_GET_HASH 1
    #define PHPG_EXEC_ID getpid()
    #define PHPG_EXEC_TIME time(NULL)
    #define PHPG_H
    #define PHPG_LOGO "            _            ____                     _ _             ____\n      _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \\\n     | '_ \\| '_ \\| '_ \\| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \\  __) |\n     | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ \n     | .__/|_| |_| .__/ \\____|\\__,_|\\__,_|_|  \\__,_|_|\\__,_|_| |_|_____|\n     |_|         |_| "
    #define PHPG_VER_CLI "1.0"
    #define PHPG_VER_ENGINE "4.0"
    // }}}

    // {{{ METHODS
    static void hash(char *output, char *text);
    static char *hex_char(unsigned int character);
    int main(int argc, char *argv[]);
    static unsigned char *md5_init(char *text);
    char *pg_get_hash(char *text);
    static void print_help(char *prg);
    static unsigned char *sha1_init(char *text);
    static void show_version();
    // }}}
#endif /* _HASH_H */

