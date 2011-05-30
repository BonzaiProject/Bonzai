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
 * $Id: $
 **/

#include "../parser.c"

/*
int pg_parser(char *name) {
#ifndef S_SPLINT_S
    int sp = strpos(name, ".php", 0);
    int len = (int)strlen(name);

    if ((sp + 4) != len) {
        return 0;
    }
#endif

    int j = 0, exclude = 0;
    // This code are also in main.c
    while (strcmp(PG_S_EXCLUDE_PATH_PATTERN[j], "") != 0 && exclude != 1) {
        exclude += count_occurrence(name, PG_S_EXCLUDE_PATH_PATTERN[j]);
        j++;
    }
    if (exclude != 0) {
        return 0;
    }

    j = exclude = 0;
    // This code are also in main.c
    while (strcmp(PG_S_EXCLUDE_FILE_PATTERN[j], "") != 0 && exclude != 1) {
        exclude += count_occurrence(name, PG_S_EXCLUDE_FILE_PATTERN[j]);
        j++;
    }
    if (exclude != 0) {
        return 0;
    }

    PG_S_SINGLE_FILE = name;

    if (strcmp(PG_S_ACTION, "ENCODE") == 0) {
        pg_encode_file(PG_S_CURRENT_POS, false);
    } else if (strcmp(PG_S_ACTION, "DECODE") == 0) {
        pg_decode_file(PG_S_CURRENT_POS, false);
    }

    return 0;
}
*/

void test_parser_pg_parser_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite parser_pg_parser_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_parser_pg_parser_success1", test_parser_pg_parser_success1))
       ) {
        return NULL;
    }

    return pSuite;
}