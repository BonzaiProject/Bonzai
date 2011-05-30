/**
 *        _            ____                     _ _             ____
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian HASH
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
char *pg_get_hash(char *text) {
    unsigned char *digest_sha1 = sha1_init(text);
    unsigned char *digest_md5 = md5_init(text);
    char *hex;

    int i;
    char *hash = (char *)malloc((80) * sizeof(char));
    (void)snprintf(hash, 80, "%s", "");
    for (i = 0; i < 20; i++) {
        hex = hex_char((unsigned int)digest_sha1[i]);
        strcat(hash, hex);
        free(hex);
        hex = hex_char((i > 15) ? (unsigned int)255 : (unsigned int)digest_md5[i]);
        strcat(hash, hex);
    }
    hash[80] = '\0';
    free(digest_sha1);
    free(digest_md5);
    free(hex);
    return hash;
}
*/

void test_core_pg_get_hash_success1(void) {
   CU_ASSERT(true);
}

bool core_pg_get_hash_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_core_pg_get_hash_success1", test_core_pg_get_hash_success1))
       ) {
        return false;
    }

    return true;
}