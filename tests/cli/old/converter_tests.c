// Custom Test Library
#include "../../shared_libs/unit_tests.c"

// Needed includes
#include "../global.h"
#include "../../shared_libs/externals/sha1.c"
#include "../../shared_libs/externals/md5.c"
#include "../../shared_libs/utility.c"
#include "../../shared_libs/globals.c"

// Test Suites
#include "converter.pg_convert.c"
#include "converter.pg_finder.c"
//#include "main.convert.c"
//#include "main.main.c"
//#include "main.show_help.c"
//#include "main.show_version.c"

bool all_suites() {
    CU_pSuite pSuite1 = init_suite("converter.pg_convert");
    CU_pSuite pSuite2 = init_suite("converter.pg_finder");

    if (pSuite1 == NULL || pSuite2 == NULL) {
        return clean_registry();
    }

    if (
        (false == converter_pg_convert_create_suite(pSuite1)) ||
        (false == converter_pg_finder_create_suite(pSuite2))
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
