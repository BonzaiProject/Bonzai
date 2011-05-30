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

#include "../encoder.c"

/*
void pg_create_file_key() {
    if (strcmp(PG_S_KEY_FILE, "") == 0) {
        strcpy(PG_S_KEY_FILE, "key.pgk");
    }

    pg_message("Saving key (%d bytes) into file `%s'.", true, strlen(PG_S_KEY_HASH), PG_S_KEY_FILE);

    (void)remove(PG_S_KEY_FILE);
    //FPUT(PG_S_KEY_FILE, PG_S_KEY_HASH, PHPG_HEADER_KEY, PHPG_FOOTER_KEY);
    FPUT(PG_S_KEY_FILE, PG_S_KEY_HASH, "", "");
}
*/

void test_encoder_pg_create_file_key_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite encoder_pg_create_file_key_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_encoder_pg_create_file_key_success1", test_encoder_pg_create_file_key_success1))
       ) {
        return NULL;
    }

    return pSuite;
}