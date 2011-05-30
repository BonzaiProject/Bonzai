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
 * $Id: $
 **/

#include "../converter.c"

/*
pt *pg_finder(char *data, bool asptag) {
    bool opened = false;
    int count = -1;

    char next[1];
    char *pt_open_long = (char *)PT_OPEN_LONG;
    char *pt_open_short = (char *)PT_OPEN_SHORT;
    char *pt_close = (char *)PT_CLOSE;
    int pt_size_long = 5;

    if (asptag) {
        pt_open_long = pt_open_short = PT_OPEN_ASP;
        pt_close = PT_CLOSE_ASP;
        pt_size_long = 2;
    }

    int max = count_occurrence(data, pt_open_short);

    char tag_long[pt_size_long], tag_short[2];
    pt *php = (pt *)malloc(max * sizeof(pt));

    int i;
    for (i = 0; i < max; i++) {
        php[i].open = php[i].close = php[i].size = 0;
    }

    int j;
    size_t len = strlen(data);
    for (j = 0; j < (int)len; j++) {
        strncpy(tag_long, data + j, (size_t)pt_size_long);
        tag_long[pt_size_long] = '\0';
        strncpy(tag_short, data + j, 2);
        tag_short[2] = '\0';

        if (!opened && (strcmp(tag_long, pt_open_long) == 0 || strcmp(tag_short, pt_open_short) == 0)) {
            if (strcmp(tag_long, pt_open_long) == 0) {
                strncpy(next, data + j + pt_size_long, 1);
                php[count + 1].size = pt_size_long;
            } else {
                strncpy(next, data + j + 2, 1);
                php[count + 1].size = 2;
            }
            next[1] = '\0';
            if (strcmp(next, "\n") == 0 || strcmp(next, "=") == 0 || strcmp(next, " ") == 0) {
                count++;
                php[count].open = j;
                pg_message("Found php start #%d: %d", true, count, php[count].open);
                opened = true;
            }
        } else if (strcmp(tag_short, pt_close) == 0) {
            php[count].close = j;
            pg_message("Found php close #%d: %d", true, count, php[count].close);
            opened = false;
        }
    }
    return php;
}
*/

void test_converter_pg_finder_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite converter_pg_finder_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_converter_pg_finder_success1", test_converter_pg_finder_success1))
       ) {
        return NULL;
    }

    return pSuite;
}