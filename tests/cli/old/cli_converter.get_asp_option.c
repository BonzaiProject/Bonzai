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

#include "../converter.c"

/*
char *get_asp_option(bool use) {
    // Check if ASP Tags are enabled
    char *asp = (char *)malloc(3 * sizeof(char));
    memset(asp, 0, sizeof(asp));
    if (use) {
        pg_message("Enabled ASP tags instead of the PHP tags.", true);
        strcpy(asp, "-a ");
    }

    return asp;
}
*/

// error when param is missing
void test_converter_get_asp_option_param_missing(void) {
    CU_ASSERT(false);
}

// string null when param is false
void test_converter_get_asp_option_param_false(void) {
    CU_ASSERT(false);
}

// string "-a " when param is true
void test_converter_get_asp_option_param_true(void) {
    CU_ASSERT(false);
}

CU_pSuite converter_get_asp_option_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_converter_get_asp_option_param_missing", test_converter_get_asp_option_param_missing)) ||
        (NULL == CU_add_test(pSuite, "test_converter_get_asp_option_param_true", test_converter_get_asp_option_param_true)) ||
        (NULL == CU_add_test(pSuite, "test_converter_get_asp_option_param_false", test_converter_get_asp_option_param_false))
       ) {
        return NULL;
    }

    return pSuite;
}