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

#include "../core.c"

/*
void rename_file(char *filename) {
    if (PG_S_SAVE_ORIGINAL_AS_BAK) {
        int len = (int)strlen(filename);
        char *original = (char *)malloc((6 + len) * sizeof(char));
        (void)snprintf(original, (size_t)(6 + len), "%s.orig", filename);
        original[5 + len] = '\0';
        (void)rename(filename, original);
        free(original);
    }
}
*/

void test_core_rename_file_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite core_rename_file_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_core_rename_file_success1", test_core_rename_file_success1))
       ) {
        return NULL;
    }

    return pSuite;
}