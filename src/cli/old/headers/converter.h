/**
 *        _            ____                     _ _             ____  
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ 
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian CONVERTER
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
 * $Id: converter.h,v 1.4 2010-02-11 09:23:24 fabio Exp $
 **/

#ifndef _CONVERTER_H    
    // {{{ INCLUDES
    //#include <unistd.h>
    #include <stdio.h>
    #include <sys/stat.h>
    #include "shared.h"
    // }}}

    // {{{ DEFINES
    #define _CONVERTER_H
    #define _FORTIFY_SOURCE 2

    #ifndef PHPG_DEBUG
        #define PHPG_DEBUG
    #endif /* PHPG_DEBUG */
    #define PHPG_EXEC_ID getpid()
    #define PHPG_EXEC_TIME time(NULL)
    #define PHPG_H
    #define PHPG_LOGO "            _            ____                     _ _             ____\n      _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \\\n     | '_ \\| '_ \\| '_ \\| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \\  __) |\n     | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ \n     | .__/|_| |_| .__/ \\____|\\__,_|\\__,_|_|  \\__,_|_|\\__,_|_| |_|_____|\n     |_|         |_| "
    #define PHPG_VER_CLI "1.0"
    #define PHPG_VER_ENGINE "4.0"
    #define PT_CLOSE "?>"
    #define PT_CLOSE_ASP "%>"
    #define PT_OPEN_ASP "<%"
    #define PT_OPEN_LONG "<?php"
    #define PT_OPEN_SHORT "<?"
    // }}}

    // {{{ STRUCTS
    typedef struct {
        int open;
        int close;
        int size;
    } pt;
    // }}}

    // {{{ METHODS
    static void convert(char *text, char *output);
    int main(int argc, char *argv[]);
    char *pg_convert(char *data, bool asptag);
    pt *pg_finder(char *data, bool asptag);
    static void show_help(char *prg);
    static void show_version();
    // }}}
#endif	/* _CONVERTER_H */

