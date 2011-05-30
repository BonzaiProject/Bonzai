/**
 *        _            ____                     _ _             ____  
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ 
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian SHARED
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
 * $Id: globals.c,v 1.6 2010-02-11 09:23:24 fabio Exp $
 **/

#include <stdio.h>
#include <stdbool.h>
#include <CUnit/Basic.h>
#include <CUnit/Console.h>
#include <CUnit/Automated.h>

// {{{ METHODS
// {{{ int init_suite_success(void)
/**
 * Init suite success response
 * @return int
 */
int init_suite_success(void) {
    return 0;
}
// }}}

// {{{ int init_suite_failure(void)
/**
 * Init suite fail response
 * @return int
 */
int init_suite_failure(void) {
    return -1;
}
// }}}

// {{{ int clean_suite_success(void)
/**
 * Clean suite success response
 * @return int
 */
int clean_suite_success(void) {
    return 0;
}
// }}}

// {{{ int clean_suite_failure(void)
/**
 * Clean suite fail response
 * @return int
 */
int clean_suite_failure(void) {
    return -1;
}
// }}}

// {{{ CU_pSuite init_suite(char *name)
/**
 * Initialize a suite
 * @params char *name
 * @return CU_pSuite
 */
CU_pSuite init_suite(char *name) {
    // add a suite to the registry
    return CU_add_suite(name, init_suite_success, clean_suite_success);
}
// }}}

// {{{ void run_suite(char *name)
/**
 * Run the specified suite
 * @params char *name
 * @global int CU_BRM_NORMAL
 * @return void
 */
void run_suite(char *name) {
    // Run all tests using the basic interface
    CU_basic_set_mode(CU_BRM_NORMAL);
    CU_basic_run_tests();
    printf("\n");
    CU_basic_show_failures(CU_get_failure_list());
    printf("\n\n");

    // Run all tests using the automated interface
    CU_set_output_filename(name);
    CU_automated_run_tests();
    CU_list_tests_to_file();
}
// }}}

// {{{ int init_registry()
/**
 * Initialize a registry
 * @global int CUE_SUCCESS
 * @return int
 */
int init_registry() {
    // initialize the CUnit test registry
    if (CUE_SUCCESS != CU_initialize_registry()) {
        return CU_get_error();
    }
    return 0;
}
// }}}

// {{{ int clean_registry()
/**
 * Clean up the registry
 * @return int
 */
int clean_registry() {
    // Clean up registry and return
    CU_cleanup_registry();
    return CU_get_error();
}
// }}}
// }}}