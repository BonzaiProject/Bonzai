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

#include "../decoder.c"

/*
char *pg_cycle_decrypt(char *string, int lk, int ld) {
    int i, j = 0;
    char *t_crdata = (char *)malloc(sizeof(char));
    char t2_char1[2];

    // Init the container string
    char *crdata = (char *)malloc(((ld / 2) + 1) * sizeof(char));
    memset(crdata, 0, sizeof(crdata));

    // Decode it
    for(i = 0; i < ld; i += 2) {
        strncpy(t2_char1, string + i, 2);
        t2_char1[2] = '\0';
        free(t_crdata);
        t_crdata = decode_char(t2_char1, PG_S_KEY_HASH[j % lk]);
        strcat(crdata, t_crdata);
        j++;
    }
    free(t_crdata);

    return crdata;
}
*/

void test_decoder_pg_cycle_decrypt_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite decoder_pg_cycle_decrypt_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_decoder_pg_cycle_decrypt_success1", test_decoder_pg_cycle_decrypt_success1))
       ) {
        return NULL;
    }

    return pSuite;
}