// Custom Test Library
#include "../../shared_libs/unit_tests.c"

// Needed includes
/*#include "../global.h"*/
/*#include "../../shared_libs/externals/sha1.c"*/
/*#include "../../shared_libs/externals/md5.c"*/
/*#include "../../shared_libs/utility.c"*/
/*#include "../../shared_libs/globals.c"*/

// Test Suites
#include "globals.pg_get_hash.c"
#include "globals.pg_message.c"
#include "utility.count_occurrence.c"
#include "utility.explode.c"
#include "utility.file_get_content.c"
#include "utility.file_put_content.c"
#include "utility.get_size.c"
#include "utility.hex2int.c"
#include "utility.int2hex.c"
#include "utility.lower.c"
#include "utility.read_process.c"
#include "utility.strpos.c"
#include "utility.str_replace.c"
#include "utility.upper.c"


bool all_suites() {
    CU_pSuite pSuite1 = init_suite("globals.pg_get_hash.c");
    CU_pSuite pSuite2 = init_suite("globals.pg_message.c");
    CU_pSuite pSuite3 = init_suite("utility.count_occurrence.c");
    CU_pSuite pSuite4 = init_suite("utility.explode.c");
    CU_pSuite pSuite5 = init_suite("utility.file_get_content.c");
    CU_pSuite pSuite6 = init_suite("utility.file_put_content.c");
    CU_pSuite pSuite7 = init_suite("utility.get_size.c");
    CU_pSuite pSuite8 = init_suite("utility.hex2int.c");
    CU_pSuite pSuite9 = init_suite("utility.int2hex.c");
    CU_pSuite pSuite10 = init_suite("utility.lower.c");
    CU_pSuite pSuite11 = init_suite("utility.read_process.c");
    CU_pSuite pSuite12 = init_suite("utility.strpos.c");
    CU_pSuite pSuite13 = init_suite("utilit.y.str_replace.c");
    CU_pSuite pSuite14 = init_suite("utility.upper.c");

    if (pSuite1 == NULL || pSuite2 == NULL || pSuite3 == NULL || pSuite4 == NULL || pSuite5 == NULL || pSuite6 == NULL || pSuite7 == NULL || pSuite8 == NULL || pSuite9 == NULL || pSuite10 == NULL || pSuite11 == NULL || pSuite12 == NULL || pSuite13 == NULL || pSuite14 == NULL) {
        return clean_registry();
    }

    if (
        (false == globals_pg_get_hash_create_suite(pSuite1)) ||
        (false == globals_pg_message_create_suite(pSuite2)) ||
        (false == utility_count_occurrence_create_suite(pSuite3)) ||
        (false == utility_explode_create_suite(pSuite4)) ||
        (false == utility_file_get_content_create_suite(pSuite5)) ||
        (false == utility_file_put_content_create_suite(pSuite6)) ||
        (false == utility_get_size_create_suite(pSuite7)) ||
        (false == utility_hex2int_create_suite(pSuite8)) ||
        (false == utility_int2hex_create_suite(pSuite9)) ||
        (false == utility_lower_create_suite(pSuite10)) ||
        (false == utility_read_process_create_suite(pSuite11)) ||
        (false == utility_strpos_create_suite(pSuite12)) ||
        (false == utility_str_replace_create_suite(pSuite13)) ||
        (false == utility_upper_create_suite(pSuite14))
    ) {
        return false;
    }
    return true;
}

int main() {
    int init = init_registry();
    if (init != 0) return init;

    CU_pSuite pSuite = init_suite("all_tests");
    if (pSuite == NULL || !all_suites()) {
        return clean_registry();
    }
    run_suite("all_tests");

    return clean_registry();
}
