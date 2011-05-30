/**
 *        _            ____                     _ _             ____
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian CONVERTER
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
 * $Id: main.c,v 1.6 2010-02-11 09:23:24 fabio Exp $
 **/

#ifndef _MAIN_C
    // {{{ DEFINES
    #define _MAIN_C
    // }}}

    // {{{ INCLUDES
    #include "../headers/converter.h"
    #include "converter_converter.c"
    // }}}

    // {{{ METHODS
    // {{{ int main(int argc, char *argv[])
    /**
     * Main method
     * @param int argc
     * @param char *argv[]
     * @global char *ACTION
     * @global bool PG_S_VERBOSE
     * @global bool PG_S_SILENT
     * @global bool PG_S_USE_ASP_TAGS
     * @global const PHPG_VER_CLI
     * @global const PHPG_VER_ENGINE
     * @return int
     */
    int main(int argc, char *argv[]) {
        int i;
        bool found_info_action = false;

        char *text = "";
        char *output = "";
        for (i = 1; i < argc; i++) {
            if (is_equal(argv[i], "-h") || is_equal(argv[i], "--help")) {
                strcpy(ACTION, "HELP");
                found_info_action = true;
            } else if (is_equal(argv[i], "--version")) {
                strcpy(ACTION, "VERSION");
                found_info_action = true;
            }
            if (!found_info_action) {
                if (is_equal(argv[i], "-v") || is_equal(argv[i], "--verbose")) {
                    PG_S_VERBOSE = true;
                    PG_S_SILENT = false;
                } else if (is_equal(argv[i], "-q") || is_equal(argv[i], "--quiet")) {
                    PG_S_VERBOSE = false;
                    PG_S_SILENT = true;
                } else if (is_equal(argv[i], "-f") || is_equal(argv[i], "--file")) {
                    strcpy(ACTION, "CONVERT");
                    text = file_get_content(argv[++i]);
                } else if (is_equal(argv[i], "-o") || is_equal(argv[i], "--output")) {
                    output = argv[++i];
                } else if (is_equal(argv[i], "-a") || is_equal(argv[i], "--asp-tag")) PG_S_USE_ASP_TAGS = true;
                else if (is_equal(argv[i], "-v") || is_equal(argv[i], "--verbose"))   PG_S_VERBOSE = true;
                else {
                    strcpy(ACTION, "CONVERT");
                    text = argv[i];
                }
            }
        }

        (void)setlocale(LC_ALL, "");
        (void)bindtextdomain("phpg-converter", "locale");
        (void)textdomain("phpg-converter");

        if (!PG_S_SILENT && !is_equal(ACTION, "CONVERT")) {
            printf(PHPG_LOGO);
            printf("phpGuardian CONVERTER v%s\n\n", PHPG_VER_CLI);
        }

        if (is_equal(ACTION, "CONVERT"))      convert(text, output);
        else if (is_equal(ACTION, "VERSION")) show_version();
        else                                  show_help(argv[0]);

        return 0;
    }
    // }}}

    // {{{ static void convert(char *text, char *output)
    /**
     * Convert the input string
     * @param char *text
     * @param char *output
     * @global bool PG_S_USE_ASP_TAGS
     * @return void
     */
    static void convert(char *text, char *output) {
        char *converted = pg_convert(text, PG_S_USE_ASP_TAGS);

        if (is_equal(output, "")) printf("%s\n", converted);
        else                      file_put_content(output, converted, "", "");
        free(converted);
    }
    // }}}

    // {{{ static void show_version()
    /**
     * Print out the current version
     * @global PHPG_VER_ENGINE
     * @global PHPG_VER_CLI
     * @global PG_S_VERBOSE
     * @return void
     */
    static void show_version() {
        printf("phpGuardian %s: %s\n", _("Version"), PHPG_VER_ENGINE);
        printf("CONVERTER %s: %s\n", _("Version"), PHPG_VER_CLI);

        if (PG_S_VERBOSE) {
            printf("Copyright (C) 2006-2011 Fabio Cicerchia\n");
            printf("License GPLv3+: GNU GPL version 3 or later <http://gnu.org/licenses/gpl.html>\nThis is free software: you are free to change and redistribute it.\nThere is NO WARRANTY, to the extent permitted by law.\n");
        }
    }
    // }}}

    // {{{ static void show_help(char *prg)
    /**
     * Print out the help
     * @param char *prg
     * @return void
     */
    static void show_help(char *prg) {
        printf("%s %s [%s] <code>\n\n", _("Usage:"), prg, _("options"));
        printf("%s\n", _("Command & Relative Options:"));
        printf("  -f, --file <input>                     %s\n", _("Read the content of input file"));
        printf("  -o, --output <file>                    %s\n", _("Save output into file"));
        printf("  -a, --asp-tag                          %s\n", _("Use the tag <% and %> instead <? and ?>"));
        printf("  -v, --verbose                          %s\n", _("Enable verbose mode"));
        printf("  -q, --quiet                            %s\n", _("Disable all messages"));
        printf("  -h, --help                             %s\n", _("Show the help"));
        printf("  --version                              %s\n\n", _("Show the version"));
        printf("%s\n\n", _("Report bugs to bugs@phpguardian.org"));
    }
    // }}}
    // }}}
#endif /* _MAIN_C */
