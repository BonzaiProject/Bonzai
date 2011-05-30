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

#include "../main.c"

/*
static void elaborate() {
    bool is_dir;
    int i, j, exclude, counter = 0;
    for(i = 0; i < (PG_S_PATHS_COUNT + PG_S_FILES_COUNT); i++) {
        counter = i;
        exclude = j = 0;
        is_dir = false;
        if (i < PG_S_PATHS_COUNT) {
            is_dir = true;
            // This code are also in parser.c
            while(strcmp(PG_S_EXCLUDE_PATH_PATTERN[j], "") != 0 && exclude != 1) {
                exclude = count_occurrence(PG_S_PATHS[PG_S_CURRENT_POS].PATH, PG_S_EXCLUDE_PATH_PATTERN[j]);
                j++;
            }
        } else {
            counter = i - PG_S_PATHS_COUNT;
            // This code are also in parser.c
            while(strcmp(PG_S_EXCLUDE_FILE_PATTERN[j], "") != 0 && exclude != 1) {
                exclude = count_occurrence(PG_S_FILES[PG_S_CURRENT_POS].PATH, PG_S_EXCLUDE_FILE_PATTERN[j]);
                j++;
            }
        }
        PG_S_CURRENT_POS = counter;

        if (exclude == 0 && strcmp(PG_S_ACTION, "ENCODE") == 0) {
            ENC(counter, is_dir);
        } else if (exclude == 0 && strcmp(PG_S_ACTION, "DECODE") == 0) {
            DEC(counter, is_dir);
        }
    }
}
*/

void test_main_elaborate_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite main_elaborate_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_main_elaborate_success1", test_main_elaborate_success1))
       ) {
        return NULL;
    }

    return pSuite;
}