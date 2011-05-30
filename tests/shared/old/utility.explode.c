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
char **explode(char *separator, char *string) {
    int count = count_occurrence(string, separator);

    char **strarr = (char **)malloc(count * sizeof(char *));
    int i = 0, co = 0, last = 0, len = (int)strlen(separator);
    char *tmp = (char *)malloc(len * sizeof(char));
    memset(tmp, 0, sizeof(tmp));
    while (string[i] != '\0') {
        strncpy(tmp, string + i, (size_t)len);
        tmp[len] = '\0';
        if (strcmp(tmp, separator) == 0) {
            strarr[co] = (char *)malloc((1 + (i - last)) * sizeof(char));
            memset(strarr[co], 0, sizeof(strarr[co]));
            strncpy(strarr[co], string + last, (size_t)(i - last));
            strarr[co][i - last] = '\0';
            last = i + len;
            co++;
        }
        i++;
    }
    free(tmp);
    strarr[co] = (char *)malloc((1 + (i - last)) * sizeof(char));
    memset(strarr[co], 0, sizeof(strarr[co]));
    strncpy(strarr[co], string + last, (size_t)(i - last));
//    strarr[co][i - last] = '\0';

    return strarr;
}
*/

void test_utility_explode_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite utility_explode_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_utility_explode_success1", test_utility_explode_success1))
       ) {
        return NULL;
    }

    return pSuite;
}
