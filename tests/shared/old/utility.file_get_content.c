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
char *file_get_content(char *filename) {
    FILE *fp;
    (void)stat(filename, &filestats);
    if ((int)filestats.st_size < 0) {
        return NULL;
    } else {
        char *content = (char *)malloc((size_t)(filestats.st_size + 1) * sizeof(char));
        memset(content, 0, sizeof(content));

        fp = fopen(filename, "r");
        (void)fread(content, 1, (size_t)filestats.st_size, fp);
        (void)fclose(fp);
        content[filestats.st_size] = '\0';
        return content;
    }
}
*/

void test_utility_file_get_content_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite utility_file_get_content_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_utility_file_get_content_success1", test_utility_file_get_content_success1))
       ) {
        return NULL;
    }

    return pSuite;
}
