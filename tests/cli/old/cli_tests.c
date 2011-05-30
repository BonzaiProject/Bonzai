// Custom Test Library
#include "../../shared_libs/unit_tests.c"

// Needed includes
#include "../global.h"
#include "../../shared_libs/externals/sha1.c"
#include "../../shared_libs/externals/md5.c"
#include "../../shared_libs/utility.c"
#include "../../shared_libs/globals.c"

// Test Suites
#include "converter.get_asp_option.c"
#include "converter.pg_convert.c"
#include "core.get_bool.c"
#include "core.get_filename.c"
#include "core.pg_set_vars.c"
#include "core.rename_file.c"
#include "decoder.decode_char.c"
#include "decoder.get_decoded_filename.c"
#include "decoder.pg_code_decrypt.c"
#include "decoder.pg_cycle_decrypt.c"
#include "decoder.pg_decode_file.c"
#include "encoder.encode_char.c"
#include "encoder.get_element.c"
#include "encoder.get_encoded_filename.c"
#include "encoder.get_footer.c"
#include "encoder.get_header.c"
#include "encoder.get_inner.c"
#include "encoder.pg_code_crypt.c"
#include "encoder.pg_create_file_key.c"
#include "encoder.pg_encode_file.c"
//#include "main.elaborate.c"
//#include "main.generate.c"
//#include "main.main.c"
//#include "main.parse.c"
//#include "main.print_help.c"
//#include "main.print_version.c"
//#include "main.report.c"
#include "parser.pg_parser.c"
#include "parser.pg_script_parser.c"
#include "parser.scan.c"
#include "parser.walkdir.c"

bool all_suites() {
    CU_pSuite pSuite1 = init_suite("converter.get_asp_option");
    CU_pSuite pSuite2 = init_suite("converter.pg_convert");
    CU_pSuite pSuite3 = init_suite("core.get_bool");
    CU_pSuite pSuite4 = init_suite("core.get_filename");
    CU_pSuite pSuite5 = init_suite("core.pg_set_vars");
    CU_pSuite pSuite6 = init_suite("core.rename_file");
    CU_pSuite pSuite7 = init_suite("decoder.decode_char");
    CU_pSuite pSuite8 = init_suite("decoder.get_decoded_filename");
    CU_pSuite pSuite9 = init_suite("decoder.pg_code_decrypt");
    CU_pSuite pSuite10 = init_suite("decoder.pg_cycle_decrypt");
    CU_pSuite pSuite11 = init_suite("decoder.pg_decode_file");
    CU_pSuite pSuite12 = init_suite("encoder.encode_char");
    CU_pSuite pSuite13 = init_suite("encoder.get_element");
    CU_pSuite pSuite14 = init_suite("encoder.get_encoded_filename");
    CU_pSuite pSuite15 = init_suite("encoder.get_footer");
    CU_pSuite pSuite16 = init_suite("encoder.get_header");
    CU_pSuite pSuite17 = init_suite("encoder.get_inner");
    CU_pSuite pSuite18 = init_suite("encoder.pg_code_crypt");
    CU_pSuite pSuite19 = init_suite("encoder.pg_create_file_key");
    CU_pSuite pSuite20 = init_suite("encoder.pg_encode_file");
    CU_pSuite pSuite21 = init_suite("parser.pg_parser");
    CU_pSuite pSuite22 = init_suite("parser.pg_script_parser");
    CU_pSuite pSuite23 = init_suite("parser.scan");
    CU_pSuite pSuite24 = init_suite("parser.walkdir");

    if (pSuite1 == NULL || pSuite2 == NULL || pSuite3 == NULL || pSuite4 == NULL || pSuite5 == NULL || pSuite6 == NULL || pSuite7 == NULL || pSuite8 == NULL || pSuite9 == NULL || pSuite10 == NULL || pSuite11 == NULL || pSuite12 == NULL || pSuite13 == NULL || pSuite14 == NULL || pSuite15 == NULL || pSuite16 == NULL || pSuite17 == NULL || pSuite18 == NULL || pSuite19 == NULL || pSuite20 == NULL || pSuite21 == NULL || pSuite22 == NULL || pSuite23 == NULL || pSuite24 == NULL) {
        return clean_registry();
    }

    if (
        (false == converter_get_asp_option_create_suite(pSuite1)) ||
        (false == converter_pg_convert_create_suite(pSuite2)) ||
        (false == core_get_bool_create_suite(pSuite3)) ||
        (false == core_get_filename_create_suite(pSuite4)) ||
        (false == core_pg_set_vars_create_suite(pSuite5)) ||
        (false == core_rename_file_create_suite(pSuite6)) ||
        (false == decoder_decode_char_create_suite(pSuite7)) ||
        (false == decoder_get_decoded_filename_create_suite(pSuite8)) ||
        (false == decoder_pg_code_decrypt_create_suite(pSuite9)) ||
        (false == decoder_pg_cycle_decrypt_create_suite(pSuite10)) ||
        (false == decoder_pg_decode_file_create_suite(pSuite11)) ||
        (false == encoder_encode_char_create_suite(pSuite12)) ||
        (false == encoder_get_element_create_suite(pSuite13)) ||
        (false == encoder_get_encoded_filename_create_suite(pSuite14)) ||
        (false == encoder_get_footer_create_suite(pSuite15)) ||
        (false == encoder_get_header_create_suite(pSuite16)) ||
        (false == encoder_get_inner_create_suite(pSuite17)) ||
        (false == encoder_pg_code_crypt_create_suite(pSuite18)) ||
        (false == encoder_pg_create_file_key_create_suite(pSuite19)) ||
        (false == encoder_pg_encode_file_create_suite(pSuite20)) ||
        (false == parser_pg_parser_create_suite(pSuite21)) ||
        (false == parser_pg_script_parser_create_suite(pSuite22)) ||
        (false == parser_scan_create_suite(pSuite23)) ||
        (false == parser_walkdir_create_suite(pSuite24))
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
