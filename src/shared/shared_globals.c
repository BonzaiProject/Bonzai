/**
 *        _            ____                     _ _             ____  
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ 
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian SHARED
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
 * $Id: globals.c,v 1.6 2010-02-11 09:23:24 fabio Exp $
 **/

#ifndef _GLOBALS_C
    // {{{ DEFINES
    #define _GLOBALS_C
    // }}}

    // {{{ INCLUDES
    #include "../headers/shared.h"
    // }}}

    // {{{ METHODS
    // {{{ char *pg_get_hash(char *text)
    /**
     * Generate the mixed hash
     * @params char *text
     * @return char *
     */
    #ifndef PG_GET_HASH
    char *pg_get_hash(char *text) {
        int text_len = SLEN(text);
        char *command = (char *)malloc((17 + text_len) * sizeof(char));
        (void)snprintf(command, (size_t)(17 + text_len), "env phpg-hash \"%s\"", text);
        command[16 + text_len] = '\0';

        //char *hash = (char *)malloc(81 * sizeof(char));
        char *hash = read_process(command);
        free(command);

        //FILE *fp = popen(command, "r");
        //fgets(hash, 81, fp);
        //pclose(fp);
        //hash[80] = '\0';
        if (is_equal(hash, "")) {
            pg_message("ERROR: Impossible generate hash!", false);
            return NULL;
        }
        return hash;
    }
    #endif
    // }}}

    // {{{ void pg_message(char *text, bool verbose, ...)
    /**
     * Print custom messages
     * @params char *text
     * @params bool verbose
     * @params mixed ...
     * @global bool PG_S_SILENT
     * @global bool PG_S_VERBOSE
     * @return void
     */
    void pg_message(char *text, bool verbose, ...) {
        if (!PG_S_SILENT || (verbose && PG_S_VERBOSE)) {
            int i = 0;
            char *gettext_text = _(text);
            va_list vp;
            va_start(vp, verbose);
            printf("[%d] ", (int)time(NULL));

            while(gettext_text[i] != '\0') {
                if (gettext_text[i] == '%' && gettext_text[i + 1] == 's') {
                    printf("%s", va_arg(vp, char *));
                    i++;
                } else if (gettext_text[i] == '%' && gettext_text[i + 1] == 'd') {
                    printf("%d", va_arg(vp, int));
                    i++;
                } else printf("%c", gettext_text[i]);
                i++;
            }
            free(gettext_text);
            va_end(vp);
            printf("\n");
        }
    }
    // }}}
    // }}}
#endif /* _GLOBALS_C */