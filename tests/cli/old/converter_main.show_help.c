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
 * $Id: $
 **/

#include "../main.c"

/*
static void show_help(char *prg) {
    char *usage = _("Usage:");
    char *options = _("options");
    char *command = _("Command & Relative Options:");
    char *file = _("Read the content of input file");
    char *output = _("Save output into file");
    char *asp = _("Use the tag <% and %> instead <? and ?>");
    char *verbose = _("Enable verbose mode");
    char *quiet = _("Disable all messages");
    char *help = _("Show the help");
    char *version = _("Show the version");
    char *bug = _("Report bugs to bugs@phpguardian.org");

    printf("%s %s [%s] <code>\n\n", usage, prg, options);
    printf("%s\n", command);
    printf("  -f, --file <input>                     %s\n", file);
    printf("  -o, --output <file>                    %s\n", output);
    printf("  -a, --asp-tag                          %s\n", asp);
    printf("  -v, --verbose                          %s\n", verbose);
    printf("  -q, --quiet                            %s\n", quiet);
    printf("  -h, --help                             %s\n", help);
    printf("  --version                              %s\n\n", version);
    printf("%s\n\n", bug);

    free(usage);
    free(options);
    free(command);
    free(file);
    free(output);
    free(asp);
    free(verbose);
    free(quiet);
    free(help);
    free(version);
    free(bug);
}
*/

void test_main_main_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite main_main_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_main_main_success1", test_main_main_success1))
       ) {
        return NULL;
    }

    return pSuite;
}