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
 * $Id: parser.c,v 1.6 2010-02-11 09:23:24 fabio Exp $
 **/

#ifndef _PARSER_C
    // {{{ DEFINES
    #define _PARSER_C
    // }}}

    // {{{ METHODS
    // {{{ int pg_parser(char *name)
    /**
     * File / Directory parser for encoding / decoding
     * @param char *name
     * @global char *PG_S_EXCLUDE_PATH_PATTERN[]
     * @global char *PG_S_EXCLUDE_FILE_PATTERN[]
     * @global char *PG_S_SINGLE_FILE
     * @global char *PG_S_ACTION
     * @global int PG_S_CURRENT_POS
     * @return int
     */
    int pg_parser(char *name) {
        int extension_position = strpos(name, ".php", 0), name_len = SLEN(name);

        if ((extension_position + 4) != name_len) {
            return 0;
        }

        int i = 0, exclude_counter = 0;
        // This code are also in main.c
        while (!is_equal(PG_S_EXCLUDE_PATH_PATTERN[i], "") && exclude_counter != 1) {
            exclude_counter += count_occurrence(name, PG_S_EXCLUDE_PATH_PATTERN[i]);
            i++;
        }
        if (exclude_counter != 0) {
            return 0;
        }

        i = exclude_counter = 0;
        // This code are also in main.c
        while (!is_equal(PG_S_EXCLUDE_FILE_PATTERN[i], "") && exclude_counter != 1) {
            exclude_counter += count_occurrence(name, PG_S_EXCLUDE_FILE_PATTERN[i]);
            i++;
        }
        if (exclude_counter != 0) {
            return 0;
        }

        PG_S_SINGLE_FILE = name;

        if (is_equal(PG_S_ACTION, "ENCODE"))      pg_encode_file(PG_S_CURRENT_POS, false);
        else if (is_equal(PG_S_ACTION, "DECODE")) pg_decode_file(PG_S_CURRENT_POS, false);

        return 0;
    }
    // }}}

    // {{{ void pg_script_parser(char *filename)
    /**
     * Parse the config script to set the program variables
     * @param char *filename
     * @return void
     */
    void pg_script_parser(char *filename) {
        pg_message("Loading configuration options...", false);
        char *file_content = file_get_content(filename);
        char *new_content = (char *)malloc(strlen(file_content) * sizeof(char));
        memset(new_content, 0, sizeof(new_content));
        char **lines = explode("\n", file_content);
        int i, occurrences = count_occurrence(file_content, "\n");
        char *string;
        for (i = 0; i < occurrences; i++) {
            if (lines[i][0] != ';' && lines[i][0] != '[' && lines[i][1] != '\0') {
                string = (char *)malloc((6 + strlen(lines[i])) * sizeof(char));
                sprintf(string, "PG_S_%s\n", lines[i]);
                strcat(new_content, string);
            }
        }

        new_content = str_replace(" = ", "#@#", new_content);
        new_content = str_replace(" =", "#@#", new_content);
        new_content = str_replace("= ", "#@#", new_content);
        new_content = str_replace("\" ", "\"\n", new_content);

        lines = explode("\n", new_content);
        int count = -1, type = -1;
        char **opt;
        occurrences = count_occurrence(new_content, "\n");
        for (i = 0; i < occurrences; i++) {
            if (!is_equal(lines[i], "")) {
                lines[i] = str_replace("=", "#@#", lines[i]);
                opt = explode("#@#", lines[i]);
                if (is_equal(opt[0], "PG_S_PATH") || is_equal(opt[0], "PG_S_FILE")) {
                    int val = strcmp(opt[0], "PG_S_PATH") == 0 ? 0 : 1;
                    if (type != val) {
                        type = val;
                        count = -1;
                    }
                    count++;
                }

                if (SLEN(opt[1]) > 1) {
                    strncpy(opt[1], opt[1] + 1, strlen(opt[1]) - 2);
                    opt[1][SLEN(opt[1]) - 2] = '\0';
                }
                pg_set_vars(upper(opt[0]), opt[1], type, count);
            }
        }
    }
    // }}}
    // }}}
#endif /* _PARSER_C */
