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
void pg_set_vars(char *variable, char *value, int type, int counter) {
    // Exit if variable is empty
    if (strcmp(variable, "") == 0) {
        goto freeing;
    }

    if (strcmp(variable, "PG_S_ACTION") == 0) {
        (void)snprintf(PG_S_ACTION, strlen(value), "%s", value);
    } else if (strcmp(variable, "PG_S_VERBOSE") == 0) {
        PG_S_VERBOSE = get_bool(value);
        PG_S_SILENT = !PG_S_VERBOSE;
    } else if (strcmp(variable, "PG_S_SILENT") == 0) {
        PG_S_SILENT = get_bool(value);
        PG_S_VERBOSE = !PG_S_SILENT;
    } else if (strcmp(variable, "PG_S_USE_PHP_EXTENSION") == 0) {
        PG_S_USE_PHP_EXTENSION = get_bool(value);
    } else if (strcmp(variable, "PG_S_USE_ASP_TAGS") == 0) {
        PG_S_USE_ASP_TAGS = get_bool(value);
    } else if (strcmp(variable, "PG_S_HEADER") == 0) {
        if (counter == -1) {
            (void)snprintf(PG_S_HEADER, strlen(value), "%s", value);
        } else if (counter > -1) {
            if (type == 0) {
                (void)snprintf(PG_S_PATHS[counter].HEADER, strlen(value), "%s", value);
            } else  {
                (void)snprintf(PG_S_FILES[counter].HEADER, strlen(value), "%s", value);
            }
        } else {
            // the counter has negative value: handle the error
        }
    } else if (strcmp(variable, "PG_S_FOOTER") == 0) {
        if (counter == -1) {
            (void)snprintf(PG_S_FOOTER, strlen(value), "%s", value);
        } else if (counter > -1) {
            if (type == 0) {
                (void)snprintf(PG_S_PATHS[counter].FOOTER, strlen(value), "%s", value);
            } else {
                (void)snprintf(PG_S_FILES[counter].FOOTER, strlen(value), "%s", value);
            }
        } else {
            // the counter has negative value: handle the error
        }
    } else if (strcmp(variable, "PG_S_SAVE_ORIGINAL_AS_BAK") == 0) {
        PG_S_SAVE_ORIGINAL_AS_BAK = get_bool(value);
    } else if (strcmp(variable, "PG_S_SAVE_ENCODED_AS_NEW") == 0) {
        PG_S_SAVE_ENCODED_AS_NEW = get_bool(value);
    } else if (strcmp(variable, "PG_S_SAVE_DECODED_AS_NEW") == 0) {
        PG_S_SAVE_DECODED_AS_NEW = get_bool(value);
    } else if (strcmp(variable, "PG_S_EXTENSION_MODULE_PATH") == 0) {
        (void)snprintf(PG_S_EXTENSION_MODULE_PATH, strlen(value), "%s", value);
    } else if (strcmp(variable, "PG_S_BASE_LIB_PATH") == 0) {
        (void)snprintf(PG_S_BASE_LIB_PATH, strlen(value), "%s", value);
    } else if (strcmp(variable, "PG_S_AUTO_GENERATE_KEYFILE") == 0) {
        PG_S_AUTO_GENERATE_KEYFILE = get_bool(value);
    } else if (strcmp(variable, "PG_S_KEY") == 0) {
        (void)snprintf(PG_S_KEY, strlen(value), "%s", value);
        PG_S_KEY_HASH = HASH(PG_S_KEY);
        if (strlen(PG_S_KEY_HASH) == 0) {
            exit(EXIT_FAILURE);
        }
    } else if (strcmp(variable, "PG_S_KEY_FILE") == 0) {
#ifndef S_SPLINT_S
        (void)snprintf(PG_S_KEY_FILE, strlen(value), "%s", value);
#endif
        char *content = FGET(PG_S_KEY_FILE);

        if (strlen(content) > 80) {
            char *content2 = str_replace(PHPG_FOOTER_KEY, "", content);
            (void)snprintf(PG_S_KEY_HASH, 80, "%s", content2);
            //content = str_replace(PHPG_HEADER_KEY, "", content);
            free(content);
            free(content2);
        }
    } else if (strcmp(variable, "PG_S_EXCLUDE_PATH_PATTERN") == 0) {
#ifndef S_SPLINT_S
        value = str_replace("\",\"", "\", \"", value);
#endif
        char **value2 = explode("\", \"", value);
        if (value2 != NULL) {
            PG_S_EXCLUDE_PATH_PATTERN = value2;
        }
    } else if (strcmp(variable, "PG_S_PATH") == 0) {
        (void)snprintf(PG_S_PATHS[counter].PATH, strlen(value), "%s", value);
        PG_S_PATHS_COUNT = counter + 1;
    } else if (strcmp(variable, "PG_S_EXCLUDE_FILE_PATTERN") == 0) {
#ifndef S_SPLINT_S
        value = str_replace("\",\"", "\", \"", value);
#endif
        char **value2 = explode("\", \"", value);
        if (value2 != NULL) {
            PG_S_EXCLUDE_FILE_PATTERN = value2;
        }
    } else if (strcmp(variable, "PG_S_FILE") == 0) {
        (void)snprintf(PG_S_FILES[counter].PATH, strlen(value), "%s", value);
        PG_S_FILES_COUNT = counter + 1;
    }

freeing:
    free(variable);
}
*/

// error when params are missing
void test_core_pg_set_vars_params_missing(void) {
	CU_ASSERT(false);
}

// error when variable is empty
void test_core_pg_set_vars_variable_empty(void) {
	CU_ASSERT(false);
}

// error when value is empty
void test_core_pg_set_vars_value_empty(void) {
	CU_ASSERT(false);
}

// error when type is empty
void test_core_pg_set_vars_type_empty(void) {
	CU_ASSERT(false);
}

// error when type is negative
void test_core_pg_set_vars_type_negative(void) {
	CU_ASSERT(false);
}

// error when counter is empty
void test_core_pg_set_vars_counter_empty(void) {
	CU_ASSERT(false);
}


// PG_S_ACTION return "AA" when variable is "PG_S_ACTION" and value is "AA"
void test_core_pg_set_vars_action_string(void) {
	CU_ASSERT(false);
}

// PG_S_VERBOSE return false when variable is "PG_S_VERBOSE" and value is "AA"
void test_core_pg_set_vars_verbose_string_malformatted(void) {
	CU_ASSERT(false);
}

// PG_S_VERBOSE return false when variable is "PG_S_VERBOSE" and value is empty
void test_core_pg_set_vars_verbose_empty(void) {
	CU_ASSERT(false);
}

// PG_S_VERBOSE return true when variable is "PG_S_VERBOSE" and value is "yes"
void test_core_pg_set_vars_verbose_yes_lower(void) {
	CU_ASSERT(false);
}

// PG_S_VERBOSE return true when variable is "PG_S_VERBOSE" and value is "Yes"
void test_core_pg_set_vars_verbose_yes_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_VERBOSE return true when variable is "PG_S_VERBOSE" and value is "YES"
void test_core_pg_set_vars_verbose_yes_upper(void) {
	CU_ASSERT(false);
}

// PG_S_VERBOSE return false when variable is "PG_S_VERBOSE" and value is "no"
void test_core_pg_set_vars_verbose_no_lower(void) {
	CU_ASSERT(false);
}

// PG_S_VERBOSE return false when variable is "PG_S_VERBOSE" and value is "No"
void test_core_pg_set_vars_verbose_no_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_VERBOSE return false when variable is "PG_S_VERBOSE" and value is "NO"
void test_core_pg_set_vars_verbose_no_upper(void) {
	CU_ASSERT(false);
}

// PG_S_SILENT return false when variable is "PG_S_VERBOSE" and value is "YES"
void test_core_pg_set_vars_verbose_yes_silent_value(void) {
	CU_ASSERT(false);
}

// PG_S_SILENT return true when variable is "PG_S_VERBOSE" and value is "NO"
void test_core_pg_set_vars_verbose_no_silent_value(void) {
	CU_ASSERT(false);
}

// PG_S_SILENT return false when variable is "PG_S_SILENT" and value is "AA"
void test_core_pg_set_vars_silent_string_malformatted(void) {
	CU_ASSERT(false);
}

// PG_S_SILENT return false when variable is "PG_S_SILENT" and value is empty
void test_core_pg_set_vars_silent_empty(void) {
	CU_ASSERT(false);
}

// PG_S_SILENT return true when variable is "PG_S_SILENT" and value is "yes"
void test_core_pg_set_vars_silent_yes_lower(void) {
	CU_ASSERT(false);
}

// PG_S_SILENT return true when variable is "PG_S_SILENT" and value is "Yes"
void test_core_pg_set_vars_silent_yes_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_SILENT return true when variable is "PG_S_SILENT" and value is "YES"
void test_core_pg_set_vars_silent_yes_upper(void) {
	CU_ASSERT(false);
}

// PG_S_SILENT return false when variable is "PG_S_SILENT" and value is "no"
void test_core_pg_set_vars_silent_no_lower(void) {
	CU_ASSERT(false);
}

// PG_S_SILENT return false when variable is "PG_S_SILENT" and value is "No"
void test_core_pg_set_vars_silent_no_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_SILENT return false when variable is "PG_S_SILENT" and value is "NO"
void test_core_pg_set_vars_silent_no_upper(void) {
	CU_ASSERT(false);
}

// PG_S_VERBOSE return false when variable is "PG_S_SILENT" and value is "YES"
void test_core_pg_set_vars_sileno_yes_verbose_value(void) {
	CU_ASSERT(false);
}

// PG_S_VERBOSE return true when variable is "PG_S_SILENT" and value is "NO"
void test_core_pg_set_vars_silent_no_verbose_value(void) {
	CU_ASSERT(false);
}

// PG_S_USE_PHP_EXTENSION return false when variable is "PG_S_USE_PHP_EXTENSION" and value is "AA"
void test_core_pg_set_vars_phpext_string_malformatted(void) {
	CU_ASSERT(false);
}

// PG_S_USE_PHP_EXTENSION return false when variable is "PG_S_USE_PHP_EXTENSION" and value is empty
void test_core_pg_set_vars_phpext_empty(void) {
	CU_ASSERT(false);
}

// PG_S_USE_PHP_EXTENSION return true when variable is "PG_S_USE_PHP_EXTENSION" and value is "yes"
void test_core_pg_set_vars_phpext_yes_lower(void) {
	CU_ASSERT(false);
}

// PG_S_USE_PHP_EXTENSION return true when variable is "PG_S_USE_PHP_EXTENSION" and value is "Yes"
void test_core_pg_set_vars_phpext_yes_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_USE_PHP_EXTENSION return true when variable is "PG_S_USE_PHP_EXTENSION" and value is "YES"
void test_core_pg_set_vars_phpext_yes_upper(void) {
	CU_ASSERT(false);
}

// PG_S_USE_PHP_EXTENSION return false when variable is "PG_S_USE_PHP_EXTENSION" and value is "no"
void test_core_pg_set_vars_phpext_no_lower(void) {
	CU_ASSERT(false);
}

// PG_S_USE_PHP_EXTENSION return false when variable is "PG_S_USE_PHP_EXTENSION" and value is "No"
void test_core_pg_set_vars_phpext_no_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_USE_PHP_EXTENSION return false when variable is "PG_S_USE_PHP_EXTENSION" and value is "NO"
void test_core_pg_set_vars_phpext_no_upper(void) {
	CU_ASSERT(false);
}

// PG_S_USE_ASP_TAGS return false when variable is "PG_S_USE_ASP_TAGS" and value is "AA"
void test_core_pg_set_vars_asptag_string_malformatted(void) {
	CU_ASSERT(false);
}

// PG_S_USE_ASP_TAGS return false when variable is "PG_S_USE_ASP_TAGS" and value is empty
void test_core_pg_set_vars_asptag_empty(void) {
	CU_ASSERT(false);
}

// PG_S_USE_ASP_TAGS return true when variable is "PG_S_USE_ASP_TAGS" and value is "yes"
void test_core_pg_set_vars_asptag_yes_lower(void) {
	CU_ASSERT(false);
}

// PG_S_USE_ASP_TAGS return true when variable is "PG_S_USE_ASP_TAGS" and value is "Yes"
void test_core_pg_set_vars_asptag_yes_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_USE_ASP_TAGS return true when variable is "PG_S_USE_ASP_TAGS" and value is "YES"
void test_core_pg_set_vars_asptag_yes_upper(void) {
	CU_ASSERT(false);
}

// PG_S_USE_ASP_TAGS return false when variable is "PG_S_USE_ASP_TAGS" and value is "no"
void test_core_pg_set_vars_asptag_no_lower(void) {
	CU_ASSERT(false);
}

// PG_S_USE_ASP_TAGS return false when variable is "PG_S_USE_ASP_TAGS" and value is "No"
void test_core_pg_set_vars_asptag_no_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_USE_ASP_TAGS return false when variable is "PG_S_USE_ASP_TAGS" and value is "NO"
void test_core_pg_set_vars_asptag_no_upper(void) {
	CU_ASSERT(false);
}

// PG_S_HEADER return "" when variable is "PG_S_HEADER" and value is "" and counter is -1
void test_core_pg_set_vars_header_empty(void) {
	CU_ASSERT(false);
}

// PG_S_HEADER return "AA" when variable is "PG_S_HEADER" and value is "AA" and counter is -1
void test_core_pg_set_vars_header_string(void) {
	CU_ASSERT(false);
}

// PG_S_PATHS[0].HEADER return "" when variable is "PG_S_HEADER" and value is "" and counter is 0 and type is 0
void test_core_pg_set_vars_header_empty_paths(void) {
	CU_ASSERT(false);
}

// PG_S_PATHS[0].HEADER return "AA" when variable is "PG_S_HEADER" and value is "AA" and counter is 0 and type is 0
void test_core_pg_set_vars_header_string_paths(void) {
	CU_ASSERT(false);
}

// PG_S_FILES[0].HEADER return "" when variable is "PG_S_HEADER" and value is "" and counter is 0 and type is 1
void test_core_pg_set_vars_header_empty_files(void) {
	CU_ASSERT(false);
}

// PG_S_FILES[0].HEADER return "AA" when variable is "PG_S_HEADER" and value is "AA" and counter is 0 and type is 1
void test_core_pg_set_vars_header_string_files(void) {
	CU_ASSERT(false);
}

// PG_S_FOOTER return "" when variable is "PG_S_FOOTER" and value is "" and counter is -1
void test_core_pg_set_vars_footer_empty(void) {
	CU_ASSERT(false);
}

// PG_S_FOOTER return "AA" when variable is "PG_S_FOOTER" and value is "AA" and counter is -1
void test_core_pg_set_vars_footer_string(void) {
	CU_ASSERT(false);
}

// PG_S_PATHS[0].FOOTER return "" when variable is "PG_S_FOOTER" and value is "" and counter is 0 and type is 0
void test_core_pg_set_vars_footer_empty_paths(void) {
	CU_ASSERT(false);
}

// PG_S_PATHS[0].FOOTER return "AA" when variable is "PG_S_FOOTER" and value is "AA" and counter is 0 and type is 0
void test_core_pg_set_vars_footer_string_paths(void) {
	CU_ASSERT(false);
}

// PG_S_FILES[0].FOOTER return "" when variable is "PG_S_FOOTER" and value is "" and counter is 0 and type is 1
void test_core_pg_set_vars_footer_empty_files(void) {
	CU_ASSERT(false);
}

// PG_S_FILES[0].FOOTER return "AA" when variable is "PG_S_FOOTER" and value is "AA" and counter is 0 and type is 1
void test_core_pg_set_vars_footer_string_files(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ORIGINAL_AS_BAK return false when variable is "PG_S_SAVE_ORIGINAL_AS_BAK" and value is "AA"
void test_core_pg_set_vars_save_bak_string_malformatted(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ORIGINAL_AS_BAK return false when variable is "PG_S_SAVE_ORIGINAL_AS_BAK" and value is empty
void test_core_pg_set_vars_save_bak_empty(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ORIGINAL_AS_BAK return true when variable is "PG_S_SAVE_ORIGINAL_AS_BAK" and value is "yes"
void test_core_pg_set_vars_save_bak_yes_lower(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ORIGINAL_AS_BAK return true when variable is "PG_S_SAVE_ORIGINAL_AS_BAK" and value is "Yes"
void test_core_pg_set_vars_save_bak_yes_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ORIGINAL_AS_BAK return true when variable is "PG_S_SAVE_ORIGINAL_AS_BAK" and value is "YES"
void test_core_pg_set_vars_save_bak_yes_upper(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ORIGINAL_AS_BAK return false when variable is "PG_S_SAVE_ORIGINAL_AS_BAK" and value is "no"
void test_core_pg_set_vars_save_bak_no_lower(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ORIGINAL_AS_BAK return false when variable is "PG_S_SAVE_ORIGINAL_AS_BAK" and value is "No"
void test_core_pg_set_vars_save_bak_no_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ORIGINAL_AS_BAK return false when variable is "PG_S_SAVE_ORIGINAL_AS_BAK" and value is "NO"
void test_core_pg_set_vars_save_bak_no_upper(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ENCODED_AS_NEW return false when variable is "PG_S_SAVE_ENCODED_AS_NEW" and value is "AA"
void test_core_pg_set_vars_save_encoded_string_malformatted(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ENCODED_AS_NEW return false when variable is "PG_S_SAVE_ENCODED_AS_NEW" and value is empty
void test_core_pg_set_vars_save_encoded_empty(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ENCODED_AS_NEW return true when variable is "PG_S_SAVE_ENCODED_AS_NEW" and value is "yes"
void test_core_pg_set_vars_save_encoded_yes_lower(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ENCODED_AS_NEW return true when variable is "PG_S_SAVE_ENCODED_AS_NEW" and value is "Yes"
void test_core_pg_set_vars_save_encoded_yes_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ENCODED_AS_NEW return true when variable is "PG_S_SAVE_ENCODED_AS_NEW" and value is "YES"
void test_core_pg_set_vars_save_encoded_yes_upper(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ENCODED_AS_NEW return false when variable is "PG_S_SAVE_ENCODED_AS_NEW" and value is "no"
void test_core_pg_set_vars_save_encoded_no_lower(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ENCODED_AS_NEW return false when variable is "PG_S_SAVE_ENCODED_AS_NEW" and value is "No"
void test_core_pg_set_vars_save_encoded_no_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_ENCODED_AS_NEW return false when variable is "PG_S_SAVE_ENCODED_AS_NEW" and value is "NO"
void test_core_pg_set_vars_save_encoded_upper(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_DECODED_AS_NEW return false when variable is "PG_S_SAVE_DECODED_AS_NEW" and value is "AA"
void test_core_pg_set_vars_save_decoded_string_malformatted(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_DECODED_AS_NEW return false when variable is "PG_S_SAVE_DECODED_AS_NEW" and value is empty
void test_core_pg_set_vars_save_decoded_empty(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_DECODED_AS_NEW return true when variable is "PG_S_SAVE_DECODED_AS_NEW" and value is "yes"
void test_core_pg_set_vars_save_decoded_yes_lower(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_DECODED_AS_NEW return true when variable is "PG_S_SAVE_DECODED_AS_NEW" and value is "Yes"
void test_core_pg_set_vars_save_decoded_yes_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_DECODED_AS_NEW return true when variable is "PG_S_SAVE_DECODED_AS_NEW" and value is "YES"
void test_core_pg_set_vars_save_decoded_yes_upper(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_DECODED_AS_NEW return false when variable is "PG_S_SAVE_DECODED_AS_NEW" and value is "no"
void test_core_pg_set_vars_save_decoded_no_lower(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_DECODED_AS_NEW return false when variable is "PG_S_SAVE_DECODED_AS_NEW" and value is "No"
void test_core_pg_set_vars_save_decoded_no_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_SAVE_DECODED_AS_NEW return false when variable is "PG_S_SAVE_DECODED_AS_NEW" and value is "NO"
void test_core_pg_set_vars_save_decoded_upper(void) {
	CU_ASSERT(false);
}

// PG_S_EXTENSION_MODULE_PATH return "" when variable is "PG_S_EXTENSION_MODULE_PATH" and value is ""
void test_core_pg_set_vars_ext_path_empty(void) {
	CU_ASSERT(false);
}

// PG_S_EXTENSION_MODULE_PATH return "AA" when variable is "PG_S_EXTENSION_MODULE_PATH" and value is "AA"
void test_core_pg_set_vars_ext_path_string(void) {
	CU_ASSERT(false);
}

// PG_S_BASE_LIB_PATH return "" when variable is "PG_S_BASE_LIB_PATH" and value is ""
void test_core_pg_set_vars_lib_path_empty(void) {
	CU_ASSERT(false);
}

// PG_S_BASE_LIB_PATH return "AA" when variable is "PG_S_BASE_LIB_PATH" and value is "AA"
void test_core_pg_set_vars_lib_empty_string(void) {
	CU_ASSERT(false);
}

// PG_S_AUTO_GENERATE_KEYFILE return false when variable is "PG_S_AUTO_GENERATE_KEYFILE" and value is "AA"
void test_core_pg_set_vars_gen_keyfile_string_malformatted(void) {
	CU_ASSERT(false);
}

// PG_S_AUTO_GENERATE_KEYFILE return false when variable is "PG_S_AUTO_GENERATE_KEYFILE" and value is empty
void test_core_pg_set_vars_gen_keyfile_empty(void) {
	CU_ASSERT(false);
}

// PG_S_AUTO_GENERATE_KEYFILE return true when variable is "PG_S_AUTO_GENERATE_KEYFILE" and value is "yes"
void test_core_pg_set_vars_gen_keyfile_yes_lower(void) {
	CU_ASSERT(false);
}

// PG_S_AUTO_GENERATE_KEYFILE return true when variable is "PG_S_AUTO_GENERATE_KEYFILE" and value is "Yes"
void test_core_pg_set_vars_gen_keyfile_yes_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_AUTO_GENERATE_KEYFILE return true when variable is "PG_S_AUTO_GENERATE_KEYFILE" and value is "YES"
void test_core_pg_set_vars_gen_keyfile_yes_upper(void) {
	CU_ASSERT(false);
}

// PG_S_AUTO_GENERATE_KEYFILE return false when variable is "PG_S_AUTO_GENERATE_KEYFILE" and value is "no"
void test_core_pg_set_vars_gen_keyfile_no_lower(void) {
	CU_ASSERT(false);
}

// PG_S_AUTO_GENERATE_KEYFILE return false when variable is "PG_S_AUTO_GENERATE_KEYFILE" and value is "No"
void test_core_pg_set_vars_gen_keyfile_no_capitalized(void) {
	CU_ASSERT(false);
}

// PG_S_AUTO_GENERATE_KEYFILE return false when variable is "PG_S_AUTO_GENERATE_KEYFILE" and value is "NO"
void test_core_pg_set_vars_gen_keyfile_no_upper(void) {
	CU_ASSERT(false);
}

// PG_S_KEY return "" when variable is "PG_S_KEY" and value is ""
void test_core_pg_set_vars_key_empty(void) {
	CU_ASSERT(false);
}

// PG_S_KEY return "AA" when variable is "PG_S_KEY" and value is "AA"
void test_core_pg_set_vars_key_string(void) {
	CU_ASSERT(false);
}

// PG_S_KEY_HASH return "..." when variable is "PG_S_KEY" and value is ""
void test_core_pg_set_vars_key_hash_empty(void) {
	CU_ASSERT(false);
}

// PG_S_KEY_HASH return "..." when variable is "PG_S_KEY" and value is "AA"
void test_core_pg_set_vars_key_hash_string(void) {
	CU_ASSERT(false);
}

// error when PHPG_S_HASH is empty
void test_core_pg_set_vars_hash_empty(void) {
	CU_ASSERT(false);
}

// PG_S_KEY_FILE return "" when variable is "PG_S_KEY_FILE" and value is ""
void test_core_pg_set_vars_key_file_empty(void) {
	CU_ASSERT(false);
}

// PG_S_KEY_FILE return "AA" when variable is "PG_S_KEY_FILE" and value is "AA"
void test_core_pg_set_vars_key_file_string(void) {
	CU_ASSERT(false);
}

// PG_S_KEY_HASH return "BB" when variable is "PG_S_KEY_FILE" and value is "AA" and "AA"'s file-content is "##..\nBB\n#.."
void test_core_pg_set_vars_key_hash_string_from_file(void) {
	CU_ASSERT(false);
}

// PG_S_EXCLUDE_PATH_PATTERN return "" when variable is "PG_S_EXCLUDE_PATH_PATTERN" and value is ""
void test_core_pg_set_vars_exclude_path_empty(void) {
	CU_ASSERT(false);
}

// PG_S_EXCLUDE_PATH_PATTERN return array("A") when variable is "PG_S_EXCLUDE_PATH_PATTERN" and value is ""A""
void test_core_pg_set_vars_exclude_path_string(void) {
	CU_ASSERT(false);
}

// PG_S_EXCLUDE_PATH_PATTERN return array("A", "B") when variable is "PG_S_EXCLUDE_PATH_PATTERN" and value is ""A", "B""
void test_core_pg_set_vars_exclude_path_string2(void) {
	CU_ASSERT(false);
}

// PG_S_EXCLUDE_PATH_PATTERN return array("A", "B") when variable is "PG_S_EXCLUDE_PATH_PATTERN" and value is ""A","B""
void test_core_pg_set_vars_exclude_path_string3(void) {
	CU_ASSERT(false);
}

// PG_S_PATHS[0].PATH return "" when variable is "PG_S_PATH" and value is "" and counter is 0
void test_core_pg_set_vars_path_empty(void) {
	CU_ASSERT(false);
}

// PG_S_PATHS[0].PATH return "AA" when variable is "PG_S_PATH" and value is "AA" and counter is 0
void test_core_pg_set_vars_path_string(void) {
	CU_ASSERT(false);
}

// PG_S_PATHS_COUNT return 1 when variable is "PG_S_PATH" and value is "AA" and counter is 0
void test_core_pg_set_vars_path_count(void) {
	CU_ASSERT(false);
}

// error when counter is negative
void test_core_pg_set_vars_path_counter_negative(void) {
	CU_ASSERT(false);
}

// PHPG_S_PATHS_COUNT return 1
void test_core_pg_set_vars_path_count_value(void) {
	CU_ASSERT(false);
}

// error when variable is "PG_S_EXCLUDE_FILE_PATTERN" and value is ""
void test_core_pg_set_vars_exclude_file_empty(void) {
	CU_ASSERT(false);
}

// PG_S_EXCLUDE_FILE_PATTERN return array("A") when variable is "PG_S_EXCLUDE_FILE_PATTERN" and value is ""A""
void test_core_pg_set_vars_exclude_file_string(void) {
	CU_ASSERT(false);
}

// PG_S_EXCLUDE_FILE_PATTERN return array("A", "B") when variable is "PG_S_EXCLUDE_FILE_PATTERN" and value is ""A", "B""
void test_core_pg_set_vars_exclude_file_string2(void) {
	CU_ASSERT(false);
}

// PG_S_EXCLUDE_FILE_PATTERN return array("A", "B") when variable is "PG_S_EXCLUDE_FILE_PATTERN" and value is ""A","B""
void test_core_pg_set_vars_exclude_file_string3(void) {
	CU_ASSERT(false);
}

// PG_S_FILES[0].PATH return "" when variable is "PG_S_FILE" and value is "" and counter is 0
void test_core_pg_set_vars_file_empty(void) {
	CU_ASSERT(false);
}

// PG_S_FILES[0].PATH return "AA" when variable is "PG_S_FILE" and value is "AA" and counter is 0
void test_core_pg_set_vars_file_string(void) {
	CU_ASSERT(false);
}

// PG_S_FILES_COUNT return 1 when variable is "PG_S_FILE" and value is "AA" and counter is 0
void test_core_pg_set_vars_file_count(void) {
	CU_ASSERT(false);
}

// error when counter is negative
void test_core_pg_set_vars_file_counter_negative(void) {
	CU_ASSERT(false);
}

// PG_S_FILES_COUNT return 1
void test_core_pg_set_vars_file_count_negative(void) {
	CU_ASSERT(false);
}

CU_pSuite core_pg_set_vars_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_params_missing", test_core_pg_set_vars_params_missing)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_variable_empty", test_core_pg_set_vars_variable_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_value_empty", test_core_pg_set_vars_value_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_type_empty", test_core_pg_set_vars_type_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_type_negative", test_core_pg_set_vars_type_negative)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_counter_empty", test_core_pg_set_vars_counter_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_action_string", test_core_pg_set_vars_action_string)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_verbose_string_malformatted", test_core_pg_set_vars_verbose_string_malformatted)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_verbose_empty", test_core_pg_set_vars_verbose_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_verbose_yes_lower", test_core_pg_set_vars_verbose_yes_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_verbose_yes_capitalized", test_core_pg_set_vars_verbose_yes_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_verbose_yes_upper", test_core_pg_set_vars_verbose_yes_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_verbose_no_lower", test_core_pg_set_vars_verbose_no_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_verbose_no_capitalized", test_core_pg_set_vars_verbose_no_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_verbose_no_upper", test_core_pg_set_vars_verbose_no_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_verbose_yes_silent_value", test_core_pg_set_vars_verbose_yes_silent_value)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_verbose_no_silent_value", test_core_pg_set_vars_verbose_no_silent_value)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_silent_string_malformatted", test_core_pg_set_vars_silent_string_malformatted)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_silent_empty", test_core_pg_set_vars_silent_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_silent_yes_lower", test_core_pg_set_vars_silent_yes_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_silent_yes_capitalized", test_core_pg_set_vars_silent_yes_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_silent_yes_upper", test_core_pg_set_vars_silent_yes_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_silent_no_lower", test_core_pg_set_vars_silent_no_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_silent_no_capitalized", test_core_pg_set_vars_silent_no_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_silent_no_upper", test_core_pg_set_vars_silent_no_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_sileno_yes_verbose_value", test_core_pg_set_vars_sileno_yes_verbose_value)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_silent_no_verbose_value", test_core_pg_set_vars_silent_no_verbose_value)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_phpext_string_malformatted", test_core_pg_set_vars_phpext_string_malformatted)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_phpext_empty", test_core_pg_set_vars_phpext_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_phpext_yes_lower", test_core_pg_set_vars_phpext_yes_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_phpext_yes_capitalized", test_core_pg_set_vars_phpext_yes_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_phpext_yes_upper", test_core_pg_set_vars_phpext_yes_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_phpext_no_lower", test_core_pg_set_vars_phpext_no_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_phpext_no_capitalized", test_core_pg_set_vars_phpext_no_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_phpext_no_upper", test_core_pg_set_vars_phpext_no_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_asptag_string_malformatted", test_core_pg_set_vars_asptag_string_malformatted)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_asptag_empty", test_core_pg_set_vars_asptag_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_asptag_yes_lower", test_core_pg_set_vars_asptag_yes_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_asptag_yes_capitalized", test_core_pg_set_vars_asptag_yes_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_asptag_yes_upper", test_core_pg_set_vars_asptag_yes_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_asptag_no_lower", test_core_pg_set_vars_asptag_no_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_asptag_no_capitalized", test_core_pg_set_vars_asptag_no_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_asptag_no_upper", test_core_pg_set_vars_asptag_no_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_header_empty", test_core_pg_set_vars_header_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_header_string", test_core_pg_set_vars_header_string)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_header_empty_paths", test_core_pg_set_vars_header_empty_paths)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_header_string_paths", test_core_pg_set_vars_header_string_paths)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_header_empty_files", test_core_pg_set_vars_header_empty_files)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_header_string_files", test_core_pg_set_vars_header_string_files)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_footer_empty", test_core_pg_set_vars_footer_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_footer_string", test_core_pg_set_vars_footer_string)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_footer_empty_paths", test_core_pg_set_vars_footer_empty_paths)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_footer_string_paths", test_core_pg_set_vars_footer_string_paths)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_footer_empty_files", test_core_pg_set_vars_footer_empty_files)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_footer_string_files", test_core_pg_set_vars_footer_string_files)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_bak_string_malformatted", test_core_pg_set_vars_save_bak_string_malformatted)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_bak_empty", test_core_pg_set_vars_save_bak_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_bak_yes_lower", test_core_pg_set_vars_save_bak_yes_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_bak_yes_capitalized", test_core_pg_set_vars_save_bak_yes_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_bak_yes_upper", test_core_pg_set_vars_save_bak_yes_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_bak_no_lower", test_core_pg_set_vars_save_bak_no_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_bak_no_capitalized", test_core_pg_set_vars_save_bak_no_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_bak_no_upper", test_core_pg_set_vars_save_bak_no_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_encoded_string_malformatted", test_core_pg_set_vars_save_encoded_string_malformatted)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_encoded_empty", test_core_pg_set_vars_save_encoded_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_encoded_yes_lower", test_core_pg_set_vars_save_encoded_yes_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_encoded_yes_capitalized", test_core_pg_set_vars_save_encoded_yes_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_encoded_yes_upper", test_core_pg_set_vars_save_encoded_yes_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_encoded_no_lower", test_core_pg_set_vars_save_encoded_no_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_encoded_no_capitalized", test_core_pg_set_vars_save_encoded_no_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_encoded_upper", test_core_pg_set_vars_save_encoded_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_decoded_string_malformatted", test_core_pg_set_vars_save_decoded_string_malformatted)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_decoded_empty", test_core_pg_set_vars_save_decoded_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_decoded_yes_lower", test_core_pg_set_vars_save_decoded_yes_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_decoded_yes_capitalized", test_core_pg_set_vars_save_decoded_yes_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_decoded_yes_upper", test_core_pg_set_vars_save_decoded_yes_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_decoded_no_lower", test_core_pg_set_vars_save_decoded_no_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_decoded_no_capitalized", test_core_pg_set_vars_save_decoded_no_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_save_decoded_upper", test_core_pg_set_vars_save_decoded_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_ext_path_empty", test_core_pg_set_vars_ext_path_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_ext_path_string", test_core_pg_set_vars_ext_path_string)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_lib_path_empty", test_core_pg_set_vars_lib_path_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_lib_empty_string", test_core_pg_set_vars_lib_empty_string)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_gen_keyfile_string_malformatted", test_core_pg_set_vars_gen_keyfile_string_malformatted)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_gen_keyfile_empty", test_core_pg_set_vars_gen_keyfile_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_gen_keyfile_yes_lower", test_core_pg_set_vars_gen_keyfile_yes_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_gen_keyfile_yes_capitalized", test_core_pg_set_vars_gen_keyfile_yes_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_gen_keyfile_yes_upper", test_core_pg_set_vars_gen_keyfile_yes_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_gen_keyfile_no_lower", test_core_pg_set_vars_gen_keyfile_no_lower)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_gen_keyfile_no_capitalized", test_core_pg_set_vars_gen_keyfile_no_capitalized)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_gen_keyfile_no_upper", test_core_pg_set_vars_gen_keyfile_no_upper)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_key_empty", test_core_pg_set_vars_key_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_key_string", test_core_pg_set_vars_key_string)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_key_hash_empty", test_core_pg_set_vars_key_hash_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_key_hash_string", test_core_pg_set_vars_key_hash_string)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_hash_empty", test_core_pg_set_vars_hash_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_key_file_empty", test_core_pg_set_vars_key_file_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_key_file_string", test_core_pg_set_vars_key_file_string)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_key_hash_string_from_file", test_core_pg_set_vars_key_hash_string_from_file)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_exclude_path_empty", test_core_pg_set_vars_exclude_path_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_exclude_path_string", test_core_pg_set_vars_exclude_path_string)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_exclude_path_string2", test_core_pg_set_vars_exclude_path_string2)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_exclude_path_string3", test_core_pg_set_vars_exclude_path_string3)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_path_empty", test_core_pg_set_vars_path_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_path_string", test_core_pg_set_vars_path_string)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_path_count", test_core_pg_set_vars_path_count)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_path_counter_negative", test_core_pg_set_vars_path_counter_negative)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_path_count_value", test_core_pg_set_vars_path_count_value)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_exclude_file_empty", test_core_pg_set_vars_exclude_file_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_exclude_file_string", test_core_pg_set_vars_exclude_file_string)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_exclude_file_string2", test_core_pg_set_vars_exclude_file_string2)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_exclude_file_string3", test_core_pg_set_vars_exclude_file_string3)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_file_empty", test_core_pg_set_vars_file_empty)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_file_string", test_core_pg_set_vars_file_string)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_file_count", test_core_pg_set_vars_file_count)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_file_counter_negative", test_core_pg_set_vars_file_counter_negative)) ||
        (NULL == CU_add_test(pSuite, "test_core_pg_set_vars_file_count_negative", test_core_pg_set_vars_file_count_negative))
       ) {
        return NULL;
    }

    return pSuite;
}