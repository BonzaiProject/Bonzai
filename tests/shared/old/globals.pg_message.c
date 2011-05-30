/**
 *           _            ____                     _ _             ____  
 *     _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 *    | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 *    | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ 
 *    | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 *    |_|         |_| phpGuardian %MODULE%
 *
 *
 * PHPGUARDIAN2
 * 
 * CODE NAME:          %codename%
 * ENGINE VERSION:     %engine_ver%
 * MODULE VERSION:     %module_ver%
 *
 * URL:                http://www.phpguardian.org
 * E-MAIL:             info@phpguardian.org
 *
 * COPYRIGHT:          2006-%curr_year% Fabio Cicerchia
 * LICENSE:            GNU GPL 3+
 *                     This program is free software: you can redistribute it and/or modify
 *                     it under the terms of the GNU General Public License as published by
 *                     the Free Software Foundation, either version 3 of the License, or
 *                     (at your option) any later version.
 *
 *                     This program is distributed in the hope that it will be useful,
 *                     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *                     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *                     GNU General Public License for more details.
 *
 *                     You should have received a copy of the GNU General Public License
 *                     along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * $Id: $
 **/

#include "globals.c"

/*
void pg_message(char *text, bool verbose, ...) {
    if (!PG_S_SILENT || (verbose && PG_S_VERBOSE)) {
        int i = 0;
        char *textg = _(text);
        va_list vp;
        va_start(vp, verbose);
        printf("[%d] ", (int)time(NULL));

        while(textg[i] != '\0') {
            if (textg[i] == '%' && textg[i + 1] == 's') {
                printf("%s", va_arg(vp, char *));
                i++;
            } else if (textg[i] == '%' && textg[i + 1] == 'd') {
                printf("%d", va_arg(vp, int));
                i++;
            } else printf("%c", textg[i]);
            i++;
        }
        free(textg);
        va_end(vp);
        printf("\n");
    }
}
*/

void test_globals_pg_message_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite globals_pg_message_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_globals_pg_message_success1", test_globals_pg_message_success1))
       ) {
        return NULL;
    }

    return pSuite;
}
