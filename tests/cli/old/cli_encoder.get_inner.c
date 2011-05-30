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
static char *get_inner() {
    char *inner = (char *)malloc((MAX_SIZE) * sizeof(char));
    memset(inner, 0, sizeof(inner));
    if (PG_S_USE_PHP_EXTENSION) {
        (void)snprintf(inner, (size_t)(strlen(PHPG_EXTENSION_STRING) - 4 + strlen(PG_S_EXTENSION_MODULE_PATH) + strlen(PG_S_EXTENSION_MODULE_PATH)), PHPG_EXTENSION_STRING, PG_S_EXTENSION_MODULE_PATH, PG_S_EXTENSION_MODULE_PATH);
    } else {
        (void)snprintf(inner, (size_t)(strlen(PHPG_LIBRARY_STRING) - 2 + strlen(PG_S_BASE_LIB_PATH)), PHPG_LIBRARY_STRING, PG_S_BASE_LIB_PATH);
    }
    inner[strlen(inner)] = '\0';

    return inner;
}
*/

void test_encoder_get_inner_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite encoder_get_inner_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_encoder_get_inner_success1", test_encoder_get_inner_success1))
       ) {
        return NULL;
    }

    return pSuite;
}