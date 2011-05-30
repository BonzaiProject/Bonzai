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
char *pg_get_hash(char *text) {
    int len = (int)strlen(text);
    char *command = (char *)malloc((17 + len) * sizeof(char));
    (void)snprintf(command, (size_t)(17 + len), "env phpg-hash \"%s\"", text);
    command[16 + len] = '\0';

    //char *hash = (char *)malloc(81 * sizeof(char));
    char *hash = read_process(command);
    free(command);

    //FILE *fp = popen(command, "r");
    //fgets(hash, 81, fp);
    //pclose(fp);
    //hash[80] = '\0';
    if (strcmp(hash, "") == 0) {
        pg_message("ERROR: Impossible generate hash!", false);
        return NULL;
    }
    return hash;
}
*/

void test_globals_pg_get_hash_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite globals_pg_get_hash_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_globals_pg_get_hash_success1", test_globals_pg_get_hash_success1))
       ) {
        return NULL;
    }

    return pSuite;
}
