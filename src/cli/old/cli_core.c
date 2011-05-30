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
 * $Id: core.c,v 1.5 2010-02-11 09:23:23 fabio Exp $
 **/

#ifndef _CORE_C
    // {{{ DEFINES
    #define _CORE_C
    // }}}

    // {{{ METHODS
    // {{{ void pg_set_vars(char *variable, char *value, int type, int counter)
    /**
     * Associate the script options to the program variable
     * @param char *variable
     * @param char *value
     * @param int type
     * @param int counter
     * @global char *PG_S_ACTION
     * @global bool PG_S_VERBOSE
     * @global bool PG_S_SILENT
     * @global bool PG_S_USE_PHP_EXTENSION
     * @global bool PG_S_USE_ASP_TAGS
     * @global char *PG_S_HEADER
     * @global PGSS PG_S_PATHS[]
     * @global PGSS PG_S_FILES[]
     * @global char *PG_S_FOOTER
     * @global bool PG_S_SAVE_ORIGINAL_AS_BAK
     * @global bool PG_S_SAVE_ENCODED_AS_NEW
     * @global bool PG_S_SAVE_DECODED_AS_NEW
     * @global char *PG_S_EXTENSION_MODULE_PATH
     * @global char *PG_S_BASE_LIB_PATH
     * @global bool PG_S_AUTO_GENERATE_KEYFILE
     * @global char *PG_S_KEY
     * @global char *PG_S_KEY_HASH
     * @global char *PG_S_KEY_FILE
     * @global char *PG_S_EXCLUDE_PATH_PATTERN[]
     * @global int PG_S_PATHS_COUNT
     * @global char *PG_S_EXCLUDE_FILE_PATTERN[]
     * @global int PG_S_FILES_COUNT
     * @return void
     */
    void pg_set_vars(/*@only@*/ char *variable, /*@only@*/ char *value, int type, int counter) {
        // Exit if variable is empty
        if (is_equal(variable, "")) {
            goto freeing;
        }

        if (is_equal(variable, "PG_S_ACTION")) {
            (void)snprintf(PG_S_ACTION, strlen(value), "%s", value);
        } else if (is_equal(variable, "PG_S_VERBOSE")) {
            PG_S_SILENT = !PG_S_VERBOSE = get_bool(value);
        } else if (is_equal(variable, "PG_S_SILENT")) {
            PG_S_VERBOSE = !PG_S_SILENT = get_bool(value);
        } else if (is_equal(variable, "PG_S_USE_PHP_EXTENSION")) {
            PG_S_USE_PHP_EXTENSION = get_bool(value);
        } else if (is_equal(variable, "PG_S_USE_ASP_TAGS")) {
            PG_S_USE_ASP_TAGS = get_bool(value);
        } else if (is_equal(variable, "PG_S_HEADER")) {
            if (counter == -1) {
                (void)snprintf(PG_S_HEADER, strlen(value), "%s", value);
            } else if (counter > -1) {
                if (type == 0) {
                    (void)snprintf(PG_S_PATHS[counter].HEADER, strlen(value), "%s", value);
                } else  {
                    (void)snprintf(PG_S_FILES[counter].HEADER, strlen(value), "%s", value);
                }
            } else {
                // TODO: the counter has negative value: handle the error
            }
        } else if (is_equal(variable, "PG_S_FOOTER")) {
            if (counter == -1) {
                (void)snprintf(PG_S_FOOTER, strlen(value), "%s", value);
            } else if (counter > -1) {
                if (type == 0) {
                    (void)snprintf(PG_S_PATHS[counter].FOOTER, strlen(value), "%s", value);
                } else {
                    (void)snprintf(PG_S_FILES[counter].FOOTER, strlen(value), "%s", value);
                }
            } else {
                // TODO: the counter has negative value: handle the error
            }
        } else if (is_equal(variable, "PG_S_SAVE_ORIGINAL_AS_BAK")) {
            PG_S_SAVE_ORIGINAL_AS_BAK = get_bool(value);
        } else if (is_equal(variable, "PG_S_SAVE_ENCODED_AS_NEW")) {
            PG_S_SAVE_ENCODED_AS_NEW = get_bool(value);
        } else if (is_equal(variable, "PG_S_SAVE_DECODED_AS_NEW")) {
            PG_S_SAVE_DECODED_AS_NEW = get_bool(value);
        } else if (is_equal(variable, "PG_S_EXTENSION_MODULE_PATH")) {
            (void)snprintf(PG_S_EXTENSION_MODULE_PATH, strlen(value), "%s", value);
        } else if (is_equal(variable, "PG_S_BASE_LIB_PATH")) {
            (void)snprintf(PG_S_BASE_LIB_PATH, strlen(value), "%s", value);
        } else if (is_equal(variable, "PG_S_AUTO_GENERATE_KEYFILE")) {
            PG_S_AUTO_GENERATE_KEYFILE = get_bool(value);
        } else if (is_equal(variable, "PG_S_KEY") == 0) {
            (void)snprintf(PG_S_KEY, strlen(value), "%s", value);
            PG_S_KEY_HASH = pg_get_hash(PG_S_KEY);
            if (SLEN(PG_S_KEY_HASH) == 0) {
                exit(EXIT_FAILURE);
            }
        } else if (is_equal(variable, "PG_S_KEY_FILE")) {
            (void)snprintf(PG_S_KEY_FILE, strlen(value), "%s", value);
            char *key_content = file_get_content(PG_S_KEY_FILE);

            if (SLEN(key_content) > 80) {
                char *clean_content = str_replace(PHPG_FOOTER_KEY, "", key_content);
                (void)snprintf(PG_S_KEY_HASH, 80, "%s", clean_content);
                free(clean_content);
            }
            free(key_content);
        } else if (is_equal(variable, "PG_S_EXCLUDE_PATH_PATTERN")) {
            value = str_replace("\",\"", "\", \"", value);
            char **patterns = explode("\", \"", value);
            if (value != NULL) {
                PG_S_EXCLUDE_PATH_PATTERN = patterns;
            }
        } else if (is_equal(variable, "PG_S_PATH")) {
            (void)snprintf(PG_S_PATHS[counter].PATH, strlen(value), "%s", value);
            PG_S_PATHS_COUNT = counter + 1;
        } else if (is_equal(variable, "PG_S_EXCLUDE_FILE_PATTERN")) {
            value = str_replace("\",\"", "\", \"", value);
            char **patterns = explode("\", \"", value);
            if (value != NULL) {
                PG_S_EXCLUDE_FILE_PATTERN = patterns;
            }
        } else if (is_equal(variable, "PG_S_FILE")) {
            (void)snprintf(PG_S_FILES[counter].PATH, strlen(value), "%s", value);
            PG_S_FILES_COUNT = counter + 1;
        }

    freeing:
        free(variable);
    }
    // }}}

    // {{{ static bool get_bool(char *value)
    /**
     * Get the bool value
     * @param char *value
     * @return bool
     */
    static bool get_bool(/*@only@*/ char *value) {
        char *up_string = upper(value);

        bool bool_val = (strcmp(up_string, "YES") == 0);
        free(up_string);

        // Return true if the value is yes
        return bool_val;
    }
    // }}}

    // {{{ void rename_file(char *filename)
    /**
     * Rename a file
     * @param char *filename
     * @global bool PG_S_SAVE_ORIGINAL_AS_BAK
     * @return void
     */
    void rename_file(char *filename) {
        if (PG_S_SAVE_ORIGINAL_AS_BAK) {
            int filename_len = SLEN(filename);
            char *original = (char *)malloc((6 + filename_len) * sizeof(char));
            (void)snprintf(original, (size_t)(6 + filename_len), "%s.orig", filename);
            original[5 + filename_len] = '\0';
            (void)rename(filename, original);
            free(original);
        }
    }
    // }}}

    // {{{ char *get_filename(int pos, bool is_dir)
    /**
     * Get the filename for the specific position
     * @param int pos
     * @param bool is_dir
     * @global PGSS PG_S_PATHS[]
     * @global char *PG_S_SINGLE_FILE
     * @global PGSS PG_S_FILES[]
     * @return char *
     */
    char *get_filename(int pos, bool is_dir) {
        if (is_dir)                               return PG_S_PATHS[pos].PATH;
        else if (!is_equal(PG_S_SINGLE_FILE, "")) return PG_S_SINGLE_FILE;
        else if (is_equal(PG_S_SINGLE_FILE, ""))  return PG_S_FILES[pos].PATH;
        else                                      return NULL;
    }
    // }}}
    // }}}
#endif /* _CORE_C */
