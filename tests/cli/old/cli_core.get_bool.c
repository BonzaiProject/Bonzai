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
static bool get_bool(char *value) {
    char *up = upper(value);

    bool val = (strcmp(up, "YES") == 0);
    free(up);

    // Return true if the value is yes
    return val;
}
*/

// error when param is missing
void test_core_get_bool_param_missing(void) {
	CU_ASSERT(false);
}


// return false when value is "AA"
void test_core_get_bool_value_string(void) {
	CU_ASSERT(false);
}

// return false when value is empty
void test_core_get_bool_value_empty(void) {
	CU_ASSERT(false);
}

// return true when value is "yes"
void test_core_get_bool_value_yes_lower(void) {
	CU_ASSERT(false);
}

// return true when value is "Yes"
void test_core_get_bool_value_yes_capitalized(void) {
	CU_ASSERT(false);
}

// return true when value is "YES"
void test_core_get_bool_value_yes_upper(void) {
   CU_ASSERT(true);
	CU_ASSERT(false);
}

// return false when value is "no"
void test_core_get_bool_value_no_lower(void) {
	CU_ASSERT(false);
}

// return false when value is "No"
void test_core_get_bool_value_no_capitalized(void) {
	CU_ASSERT(false);
}

// return false when value is "NO"
void test_core_get_bool_value_no_upper(void) {
	CU_ASSERT(false);
}

CU_pSuite core_get_bool_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_core_get_bool_param_missing", test_core_get_bool_param_missing)) ||
        (NULL == CU_add_test(pSuite, "test_core_get_bool_value_string", test_core_get_bool_value_string)) ||
        (NULL == CU_add_test(pSuite, "test_core_get_bool_value_empty", test_core_get_bool_value_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_get_bool_value_yes_lower", test_core_get_bool_value_yes_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_get_bool_value_yes_capitalized", test_core_get_bool_value_yes_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_get_bool_value_yes_upper", test_core_get_bool_value_yes_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_get_bool_value_no_lower", test_core_get_bool_value_no_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_get_bool_value_no_capitalized", test_core_get_bool_value_no_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_get_bool_value_no_upper", test_core_get_bool_value_no_upper))
       ) {
        return NULL;
    }

    return pSuite;
}