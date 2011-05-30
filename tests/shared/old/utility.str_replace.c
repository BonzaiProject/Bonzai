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

#include "utility.c"

/*
char *str_replace(char *search, char *replace, char *subject) {
#ifndef S_SPLINT_S
    if (search == NULL || strlen(search) == 0 || replace == NULL || subject == NULL || strlen(subject) == 0) {
        return subject;
    }
#endif

    char *p1 = NULL, *p2 = NULL;//(char *)malloc(0);
    size_t len;

    while (strstr(subject, search)) {
        p1 = strstr(subject, search);
        len = (p2 != NULL) ? strlen(p2) : 0;
        strncpy(p2 + len, subject, (size_t)(p1 - subject));
        strcat(p2, replace);
        p1 += strlen(search);
        subject = p1;
    }
    return strcat(p2, p1);
}
*/

void test_utility_str_replace_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite utility_str_replace_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_utility_str_replace_success1", test_utility_str_replace_success1))
       ) {
        return NULL;
    }

    return pSuite;
}
