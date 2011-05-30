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
char *pg_convert(char *filename, bool asptag) {
    // Increase the total originary bytes
    total_orig_bytes += get_size(filename);

    // Get the ASP option
    char *asp = get_asp_option(asptag);

    int len = (int)strlen(filename) + (int)strlen(asp);

    // Set the command that will be executed
    char *command = (char *)malloc((43 + len) * sizeof(char));
    (void)snprintf(command, (size_t)(43 + len), "env phpg-converter --quiet %s-f \"%s\"", asp, filename);
    command[42 + len] = '\0';

    // Execute command
    char *source = read_process(command);
    free(command);

    // Increase the total converted bytes
    total_converted_bytes += (int)strlen(source);

    // Print a message
    pg_message("Generated %d bytes.", true, len);

    return source;
}
*/

// error when param is missing
void test_converter_pg_convert_param_missing(void) {
    CU_ASSERT(false);
}
// error when param filename is empty
void test_convert_pg_convert_filename_empty(void) {
    CU_ASSERT(false);
}

// error when param asptag is empty
void test_convert_pg_convert_asptag_empty(void) {
    CU_ASSERT(false);
}


// return "<?php echo 'a'; ?>" when the input file-content is the same
void test_convert_pg_convert_full_php_return_same(void) {
    CU_ASSERT(false);
}

// return "<?php\necho <<<PHPG_HD\n<span>\nPHPG_HD;\n?>" when the input file-content is "<span>"
void test_convert_pg_convert_html_return_php_converted(void) {
    CU_ASSERT(false);
}

// return "<?php\necho 'a';\necho <<<PHPG_HD\n<span>\nPHPG_HD;\n?>" when the input file-content is "<?php echo 'a'; ?><span>"
void test_convert_pg_convert_mixed_php_return_converted(void) {
    CU_ASSERT(false);
}

// return "<?php\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\n?>" when the input file-content is "<span><?php echo 'a'; ?>"
void test_convert_pg_convert_mixed_php_return_converted2(void) {
    CU_ASSERT(false);
}

// return "<?php\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\necho <<<PHPG_HD\n</span>\nPHPG_HD;\n?>" when the input file-content is "<span><?php echo 'a'; ?></span>"
void test_convert_pg_convert_mixed_php_return_converted3(void) {
    CU_ASSERT(false);
}

// return "<?php\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\necho <<<PHPG_HD\n</span>\nPHPG_HD;\necho 'a';\n?>" when the input file-content is "<span><?php echo 'a'; ?></span><?php echo 'a'; ?>"
void test_convert_pg_convert_mixed_php_return_converted4(void) {
    CU_ASSERT(false);
}


// return "<?php echo 'a'; ?>" when the input file-content is "<? echo 'a'; ?>"
void test_convert_pg_convert_full_short_php_return_same_long(void) {
    CU_ASSERT(false);
}

// return "<?php\necho 'a';\necho <<<PHPG_HD\n<span>\nPHPG_HD;\n?>" when the input file-content is "<? echo 'a'; ?><span>"
void test_convert_pg_convert_mixed_short_php_return_converted(void) {
    CU_ASSERT(false);
}

// return "<?php\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\n?>" when the input file-content is "<span><? echo 'a'; ?>"
void test_convert_pg_convert_mixed_short_php_return_converted2(void) {
    CU_ASSERT(false);
}

// return "<?php\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\necho <<<PHPG_HD\n</span>\nPHPG_HD;\n?>" when the input file-content is "<span><? echo 'a'; ?></span>"
void test_convert_pg_convert_mixed_short_php_return_converted3(void) {
    CU_ASSERT(false);
}

// return "<?php\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\necho <<<PHPG_HD\n</span>\nPHPG_HD;\necho 'a';\n?>" when the input file-content is "<span><? echo 'a'; ?></span><? echo 'a'; ?>"
void test_convert_pg_convert_mixed_short_php_return_converted4(void) {
    CU_ASSERT(false);
}


// return "<?php echo 'a'; ?>" when the input file-content is "<?php='a';?>"
void test_convert_pg_convert_full_echo_shorted_return_converted(void) {
    CU_ASSERT(false);
}

// return "<?php\necho 'a';\necho <<<PHPG_HD\n<span>\nPHPG_HD;\n?>" when the input file-content is "<?php='a';?><span>"
void test_convert_pg_convert_mixed_echo_shorted_return_converted(void) {
    CU_ASSERT(false);
}

// return "<?php\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\n?>" when the input file-content is "<span><?php='a';?>"
void test_convert_pg_convert_mixed_echo_shorted_return_converted2(void) {
    CU_ASSERT(false);
}

// return "<?php\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\necho <<<PHPG_HD\n</span>\nPHPG_HD;\n?>" when the input file-content is "<span><?php='a';?></span>"
void test_convert_pg_convert_mixed_echo_shorted_return_converted3(void) {
    CU_ASSERT(false);
}

// return "<?php\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\necho <<<PHPG_HD\n</span>\nPHPG_HD;\necho 'a';\n?>" when the input file-content is "<span><?php='a';?></span><?php='a';?>"
void test_convert_pg_convert_mixed_echo_shorted_return_converted4(void) {
    CU_ASSERT(false);
}


// return "<?php echo 'a'; ?>" when the input file-content is "<?='a';?>"
void test_convert_pg_convert_full_short_echo_shorted_return_converted(void) {
    CU_ASSERT(false);
}

// return "<?php\necho 'a';\necho <<<PHPG_HD\n<span>\nPHPG_HD;\n?>" when the input file-content is "<?='a';?><span>"
void test_convert_pg_convert_mixed_short_echo_shorted_return_converted(void) {
    CU_ASSERT(false);
}

// return "<?php\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\n?>" when the input file-content is "<span><?='a';?>"
void test_convert_pg_convert_mixed_short_echo_shorted_return_converted2(void) {
    CU_ASSERT(false);
}

// return "<?php\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\necho <<<PHPG_HD\n</span>\nPHPG_HD;\n?>" when the input file-content is "<span><?='a';?></span>"
void test_convert_pg_convert_mixed_short_echo_shorted_return_converted3(void) {
    CU_ASSERT(false);
}

// return "<?php\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\necho <<<PHPG_HD\n</span>\nPHPG_HD;\necho 'a';\n?>" when the input file-content is "<span><?='a';?></span><?='a';?>"
void test_convert_pg_convert_mixed_short_echo_shorted_return_converted4(void) {
    CU_ASSERT(false);
}


// return "<% echo 'a'; %>" when the input file-content is the same and asptag is true
void test_convert_pg_convert_full_asp_return_same(void) {
    CU_ASSERT(false);
}

// return "<%\necho <<<PHPG_HD\n<span>\nPHPG_HD;\n%>" when the input file-content is "<span>" and asptag is true
void test_convert_pg_convert_html_return_converted_asp(void) {
    CU_ASSERT(false);
}

// return "<%\necho 'a';\necho <<<PHPG_HD\n<span>\nPHPG_HD;\n%>" when the input file-content is "<% echo 'a'; %><span>" and asptag is true
void test_convert_pg_convert_mixed_asp_return_converted(void) {
    CU_ASSERT(false);
}

// return "<%\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\n%>" when the input file-content is "<span><% echo 'a'; %>" and asptag is true
void test_convert_pg_convert_mixed_asp_return_converted2(void) {
    CU_ASSERT(false);
}

// return "<%\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\necho <<<PHPG_HD\n</span>\nPHPG_HD;\n%>" when the input file-content is "<span><% echo 'a'; %></span>" and asptag is true
void test_convert_pg_convert_mixed_asp_return_converted3(void) {
    CU_ASSERT(false);
}

// return "<%\necho <<<PHPG_HD\n<span>\nPHPG_HD;\necho 'a';\necho <<<PHPG_HD\n</span>\nPHPG_HD;\necho 'a';\n%>" when the input file-content is "<span><% echo 'a'; %></span><% echo 'a'; %>" and asptag is true
void test_convert_pg_convert_mixed_asp_return_converted4(void) {
    CU_ASSERT(false);
}

CU_pSuite converter_pg_convert_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_converter_pg_convert_param_missing", test_converter_pg_convert_param_missing)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_filename_empty", test_convert_pg_convert_filename_empty)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_asptag_empty", test_convert_pg_convert_asptag_empty)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_full_php_return_same", test_convert_pg_convert_full_php_return_same)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_html_return_php_converted", test_convert_pg_convert_html_return_php_converted)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_php_return_converted", test_convert_pg_convert_mixed_php_return_converted)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_php_return_converted2", test_convert_pg_convert_mixed_php_return_converted2)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_php_return_converted3", test_convert_pg_convert_mixed_php_return_converted3)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_php_return_converted4", test_convert_pg_convert_mixed_php_return_converted4)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_full_short_php_return_same_long", test_convert_pg_convert_full_short_php_return_same_long)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_short_php_return_converted", test_convert_pg_convert_mixed_short_php_return_converted)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_short_php_return_converted2", test_convert_pg_convert_mixed_short_php_return_converted2)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_short_php_return_converted3", test_convert_pg_convert_mixed_short_php_return_converted3)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_short_php_return_converted4", test_convert_pg_convert_mixed_short_php_return_converted4)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_full_echo_shorted_return_converted", test_convert_pg_convert_full_echo_shorted_return_converted)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_echo_shorted_return_converted", test_convert_pg_convert_mixed_echo_shorted_return_converted)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_echo_shorted_return_converted2", test_convert_pg_convert_mixed_echo_shorted_return_converted2)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_echo_shorted_return_converted3", test_convert_pg_convert_mixed_echo_shorted_return_converted3)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_echo_shorted_return_converted4", test_convert_pg_convert_mixed_echo_shorted_return_converted4)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_full_short_echo_shorted_return_converted", test_convert_pg_convert_full_short_echo_shorted_return_converted)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_short_echo_shorted_return_converted", test_convert_pg_convert_mixed_short_echo_shorted_return_converted)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_short_echo_shorted_return_converted2", test_convert_pg_convert_mixed_short_echo_shorted_return_converted2)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_short_echo_shorted_return_converted3", test_convert_pg_convert_mixed_short_echo_shorted_return_converted3)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_short_echo_shorted_return_converted4", test_convert_pg_convert_mixed_short_echo_shorted_return_converted4)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_full_asp_return_same", test_convert_pg_convert_full_asp_return_same)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_html_return_converted_asp", test_convert_pg_convert_html_return_converted_asp)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_asp_return_converted", test_convert_pg_convert_mixed_asp_return_converted)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_asp_return_converted2", test_convert_pg_convert_mixed_asp_return_converted2)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_asp_return_converted3", test_convert_pg_convert_mixed_asp_return_converted3)) ||
        (NULL == CU_add_test(pSuite, "test_convert_pg_convert_mixed_asp_return_converted4", test_convert_pg_convert_mixed_asp_return_converted4))
       ) {
        return NULL;
    }

    return pSuite;
}