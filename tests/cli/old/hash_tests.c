// Custom Test Library
#include "../../shared_libs/unit_tests.c"

// Needed includes
#include "../global.h"
#include "../../shared_libs/externals/sha1.c"
#include "../../shared_libs/externals/md5.c"
#include "../../shared_libs/utility.c"
#include "../../shared_libs/globals.c"

// Test Suites
#include "core.hex_char.c"
#include "core.md5_init.c"
#include "core.pg_get_hash.c"
#include "core.sha1_init.c"
//#include "main.hash.c"
//#include "main.main.c"
//#include "main.print_help.c"
//#include "main.show_version.c"

bool all_suites() {
    CU_pSuite pSuite1 = init_suite("core.hex_char");
    CU_pSuite pSuite2 = init_suite("core.md5_init");
    CU_pSuite pSuite3 = init_suite("core.pg_get_hash");
    CU_pSuite pSuite4 = init_suite("core.sha1_init");

    if (pSuite1 == NULL || pSuite2 == NULL || pSuite3 == NULL || pSuite4 == NULL) {
        return clean_registry();
    }

    if (
        (false == core_hex_char_create_suite(pSuite1)) ||
        (false == core_md5_init_create_suite(pSuite2)) ||
        (false == core_pg_get_hash_create_suite(pSuite3)) ||
        (false == core_sha1_init_create_suite(pSuite4))
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
