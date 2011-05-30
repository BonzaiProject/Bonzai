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
int main(int argc, char *argv[]) {
    int i;
    bool found = false;

    char *text = "";
    char *output = "";
    for (i = 1; i < argc; i++) {
        if (strcmp(argv[i], "-h") == 0 || strcmp(argv[i], "--help") == 0) {
            strcpy(ACTION, "HELP");
            found = true;
        } else if (strcmp(argv[i], "--version") == 0) {
            strcpy(ACTION, "VERSION");
            found = true;
        }
        if (!found) {
            if (strcmp(argv[i], "-v") == 0 || strcmp(argv[i], "--verbose") == 0) {
                PG_S_VERBOSE = true;
                PG_S_SILENT = false;
            } else if (strcmp(argv[i], "-q") == 0 || strcmp(argv[i], "--quiet") == 0) {
                PG_S_SILENT = true;
                PG_S_VERBOSE = false;
            } else if (strcmp(argv[i], "-f") == 0 || strcmp(argv[i], "--file") == 0) {
                strcpy(ACTION, "CONVERT");
                i++;
                text = FGET(argv[i]);
            } else if (strcmp(argv[i], "-o") == 0 || strcmp(argv[i], "--output") == 0) {
                i++;
                output = argv[i];
            } else if (strcmp(argv[i], "-a") == 0 || strcmp(argv[i], "--asp-tag") == 0) PG_S_USE_ASP_TAGS = true;
            else if (strcmp(argv[i], "-v") == 0 || strcmp(argv[i], "--verbose") == 0) PG_S_VERBOSE = true;
            else {
                strcpy(ACTION, "CONVERT");
                text = argv[i];
            }
        }
    }

    (void)setlocale(LC_ALL, "");
    (void)bindtextdomain("phpg-converter", "locale");
    (void)textdomain("phpg-converter");

    if (!PG_S_SILENT && strcmp(ACTION, "CONVERT") != 0) {
        printf(PHPG_LOGO);
        printf("phpGuardian CONVERTER v%s\n\n", PHPG_VER_CLI);
    }

    if (strcmp(ACTION, "CONVERT") == 0) {
        convert(text, output);
    } else if (strcmp(ACTION, "VERSION") == 0) {
        show_version();
    } else {
        show_help(argv[0]);
    }

    return 0;
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