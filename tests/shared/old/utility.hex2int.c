/**
 *           _            ____                     _ _             ____  
 *     _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 *    | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 *    | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ 
 *    | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 *    |_|         |_| phpGuardian %MODULE%
 *
 *
 * PHPGUARDIAN2
 * 
 * CODE NAME:          %codename%
 * ENGINE VERSION:     %engine_ver%
 * MODULE VERSION:     %module_ver%
 *
 * URL:                http://www.phpguardian.org
 * E-MAIL:             info@phpguardian.org
 *
 * COPYRIGHT:          2006-%curr_year% Fabio Cicerchia
 * LICENSE:            GNU GPL 3+
 *                     This program is free software: you can redistribute it and/or modify
 *                     it under the terms of the GNU General Public License as published by
 *                     the Free Software Foundation, either version 3 of the License, or
 *                     (at your option) any later version.
 *
 *                     This program is distributed in the hope that it will be useful,
 *                     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *                     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *                     GNU General Public License for more details.
 *
 *                     You should have received a copy of the GNU General Public License
 *                     along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * $Id: $
 **/

#include "utility.c"

/*
unsigned int hex2int(char *value) {
    int i, ch, len = (int)strlen(value);
    unsigned int int_value = 0;

    for (i = 0; i < len; i++) {
        ch = (int)value[i];
        if (ch >= 48 && ch <= 57) ch = ch - 48; // From 0 to 9
        else if (ch >= 65 && ch <= 70) ch = ch - 55; // From A to F
        else if (ch >= 97 && ch <= 102) ch = ch - 87; // From a to f
        else return int_value;
        int_value = (int_value << 4) + ch;
    }
    return int_value;
}
*/

void test_utility_hex2int_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite utility_hex2int_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_utility_hex2int_success1", test_utility_hex2int_success1))
       ) {
        return NULL;
    }

    return pSuite;
}
