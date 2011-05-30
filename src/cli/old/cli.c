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
 * $Id: main.c,v 1.7 2010-02-11 09:23:23 fabio Exp $
 **/

#ifndef _MAIN_C
    // {{{ DEFINES
    #define _MAIN_C
    // }}}

    // {{{ INCLUDES
    #include "../headers/cli.h"
    #include "cli_converter.c"
    #include "cli_core.c"
    #include "cli_decoder.c"
    #include "cli_encoder.c"
    #include "cli_parser.c"
    // }}}

    // {{{ METHODS
    // {{{ int main(int argc, char *argv[])
    /**
     * Main method
     * @param int argc
     * @param char *argv[]
     * @global char *ACTION
     * @global char *SCRIPT_FILE
     * @global bool PG_S_SILENT
     * @global const PHPG_VER_CLI
     * @global const PHPG_VER_ENGINE
     * @global bool PG_S_VERBOSE
     * @global bool PG_S_AUTO_GENERATE_KEYFILE
     * @global int PG_S_PATHS_COUNT
     * @global int PG_S_FILES_COUNT
     * @global PGSS PG_S_PATHS[]
     * @global int PG_S_CURRENT_POS
     * @global char *PG_S_EXCLUDE_PATH_PATTERN[]
     * @global PGSS PG_S_FILES[]
     * @global char *PG_S_EXCLUDE_FILE_PATTERN[]
     * @global char *PG_S_ACTION
     * @return int
     */
    int main(int argc, char *argv[]) {
        int i;
        bool found_info_action = false;

        for (i = 1; i < argc; i++) {
            if (is_equal(argv[i], "-h") || is_equal(argv[i], "--help")) {
                strcpy(ACTION, "HELP");
                found_info_action = true;
            } else if (is_equal(argv[i], "--version")) {
                strcpy(ACTION, "VERSION");
                found_info_action = true;
            }

            if (!found_info_action) {
                if (is_equal(argv[i], "-g") || is_equal(argv[i], "--generate")) {
                    strcpy(ACTION, "GENERATE");
                    SCRIPT_FILE = argv[++i];
                } else {
                    strcpy(ACTION, "PARSE");
                    SCRIPT_FILE = argv[i];
                }
            }
        }

        (void)setlocale(LC_ALL, "");
        (void)bindtextdomain("phpg-cli", "locale");
        (void)textdomain("phpg-cli");

        if ((!PG_S_SILENT || is_equal(ACTION, "HELP")) && (is_equal(ACTION, "VERSION"))) {
            printf(PHPG_LOGO);
            printf("phpGuardian CLI v%s\n\n", PHPG_VER_CLI);
        }

        if (is_equal(ACTION, "GENERATE"))     generate();
        else if (is_equal(ACTION, "PARSE"))   parse();
        else if (is_equal(ACTION, "VERSION")) print_version();
        else                                  print_help(argv[0]);

        return 0;
    }
    // }}}

    // {{{ static void generate()
    /**
     * Generate the config file
     * @global char *SCRIPT_FILE
     * @global char *CONFIG_SCRIPT
     */
    static void generate() {
        printf("%s\n", _("Generation config script..."));
        file_put_content(SCRIPT_FILE, CONFIG_SCRIPT, "", "");

        pg_message("Config script generated.", true);
    }
    // }}}

    // {{{ static void parse()
    /**
     * Parse the config file
     * @global char **SCRIPT_FILE
     * @global bool PG_S_AUTO_GENERATE_KEYFILE
     * @return void
     */
    static void parse() {
        int start_time = (int)time(NULL);

        pg_script_parser(SCRIPT_FILE);

        if (PG_S_AUTO_GENERATE_KEYFILE) pg_create_file_key();

        elaborate();
        report(start_time);
    }
    // }}}

    // {{{ static void elaborate()
    /**
     * Elaborate a file
     * @global int PG_S_PATHS_COUNT
     * @global int PG_S_FILES_COUNT
     * @global char **PG_S_EXCLUDE_PATH_PATTERN
     * @global PGSS PG_S_PATHS
     * @global int PG_S_CURRENT_POS
     * @global char **PG_S_EXCLUDE_FILE_PATTERN
     * @global PGSS PG_S_FILES
     * @global char **PG_S_ACTION
     * @return void
     */
    static void elaborate() {
        bool is_dir;
        int j, exclude_counter;

        for(PG_S_CURRENT_POS = 0; PG_S_CURRENT_POS < (PG_S_PATHS_COUNT + PG_S_FILES_COUNT); PG_S_CURRENT_POS++) {
            j = exclude_counter = 0;
            is_dir = false;
            if (PG_S_CURRENT_POS < PG_S_PATHS_COUNT) {
                is_dir = true;
                exclude_counter = get_total_excluded(PG_S_EXCLUDE_PATH_PATTERN, PG_S_PATHS);
            } else {
                PG_S_CURRENT_POS -= PG_S_PATHS_COUNT;
                exclude_counter = get_total_excluded(PG_S_EXCLUDE_FILE_PATTERN, PG_S_FILES);
            }

            if (exclude_counter == 0 && is_equal(PG_S_ACTION, "ENCODE")) {
                pg_encode_file(PG_S_CURRENT_POS, is_dir);
            } else if (exclude_counter == 0 && is_equal(PG_S_ACTION, "DECODE")) {
                pg_decode_file(PG_S_CURRENT_POS, is_dir);
            }
        }
    }
    // }}}

    // This code are also in parser.c
    int get_total_excluded(char **pattern, PGSS data[1000]) {
        int j = 0, counter = 0;

        while(!is_equal(pattern[j], "") && counter != 1) {
            counter = count_occurrence(data[PG_S_CURRENT_POS].PATH, pattern[j]);
            j++;
        }

        return counter;
    }


    // {{{ static void report(int start_time)
    /**
     * Print the final report
     * @param int start_time
     * @return void
     */
    static void report(int start_time) {
        int i;

        printf("-------------------------\n");
        printf(_("Total time: %lds"), (time(NULL) - start_time));
        printf("\n\n");
        printf(_("Total files processed: %d"), total_files);
        printf("\n");
        printf(_("Total files skipped: %d"), count_skipped);
        printf("\n");
        if (count_skipped > 0) {
            printf("\t%s\n", _("Skipped files:"));
            for(i = 0; i < count_skipped; i++) {
                printf("\t%s\n", skipped_files[i]);
            }
        }
        printf(_("Total bytes processed: %ld"), total_orig_bytes);
        printf("\n");
        if (strcmp(PG_S_ACTION, "ENCODE") == 0) {
            printf(_("Total converted bytes: %ld"), total_converted_bytes);
            printf("\n");
        }
        printf(_("Total generated bytes: %ld"), total_generated_bytes);
        printf("\n\n");
        if (is_equal(PG_S_ACTION, "ENCODE")) {
            printf(_("Total size increasing: %ldb"), (total_generated_bytes-total_orig_bytes));
            printf("\n");
            printf(_("Total size increasing: %2.2f%%"), (float)((100.0 / total_orig_bytes) * total_generated_bytes));
            printf("\n");
        } else if (is_equal(PG_S_ACTION, "DECODE")) {
            printf(_("Total size decreasing: %ldb"), (total_orig_bytes-total_generated_bytes));
            printf("\n");
            printf(_("Total size decreasing: %2.2f%%"), (float)((100.0 / total_orig_bytes) * total_generated_bytes));
            printf("\n");
        }
    }
    // }}}

    // {{{ static void print_version()
    /**
     * Print out the current version
     * @global const PHPG_VER_ENGINE
     * @global const PHPG_VER_CLI
     * @global bool PG_S_VERBOSE
     * @return void
     */
    static void print_version() {
        printf("phpGuardian %s: %s\n", _("Version"), PHPG_VER_ENGINE);
        printf("CLI %s: %s\n", _("Version"), PHPG_VER_CLI);
        if (PG_S_VERBOSE) {
            printf("Copyright (C) 2006-2011 Fabio Cicerchia\n");
            printf("License GPLv3+: GNU GPL version 3 or later <http://gnu.org/licenses/gpl.html>\nThis is free software: you are free to change and redistribute it.\nThere is NO WARRANTY, to the extent permitted by law.\n");
        }
    }
    // }}}

    // {{{ static void print_help(char *prg)
    /**
     * Print out the help
     * @param char *prg
     * @return void
     */
    static void print_help(char *prg) {
        printf("%s %s [%s] <config_file>\n\n", _("Usage:"), prg, _("options"));
        printf("%s\n", _("Command & Relative Options:"));
        printf("  -g [--generate]                         %s\n", _("Generate a new script file"));
        printf("  -h [--help]                             %s\n", _("Show the help"));
        printf("  --version                               %s\n\n", _("Show the version"));
        printf("%s\n\n", _("Report bugs to bugs@phpguardian.org"));
    }
    // }}}
    // }}}
#endif /* _MAIN_C */
