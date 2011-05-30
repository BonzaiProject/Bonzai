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

#include "../parser.c"

/*
void pg_script_parser(char *filename) {
    pg_message("Loading configuration options...", false);
    char *content = FGET(filename);
    char *new_content = (char *)malloc((strlen(content)) * sizeof(char));
    memset(new_content, 0, sizeof(new_content));
    char **result = explode("\n", content);
    int i, runs = count_occurrence(content, "\n");
    char *string;
    for (i = 0; i < runs; i++) {
        if (result[i][0] != ';' && result[i][0] != '[' && result[i][1] != '\0') {
            string = (char *)malloc((6 + strlen(result[i])) * sizeof(char));
            sprintf(string, "PG_S_%s\n", result[i]);
            strcat(new_content, string);

//            strcat(new_content, "PG_S_");
//            strcat(new_content, result[i]);
//            strcat(new_content, "\n");
        }
    }

    new_content = str_replace(" = ", "#@#", new_content);
    new_content = str_replace(" =", "#@#", new_content);
    new_content = str_replace("= ", "#@#", new_content);
    new_content = str_replace("\" ", "\"\n", new_content);

    result = explode("\n", new_content);
    int count, type;
    count = type = -1;
    char **tmp;
    runs = count_occurrence(new_content, "\n");
    for (i = 0; i < runs; i++) {
        if (strcmp(result[i], "") != 0) {
            result[i] = str_replace("=", "#@#", result[i]);
            tmp = explode("#@#", result[i]);
            if (strcmp(tmp[0], "PG_S_PATH") == 0 || strcmp(tmp[0], "PG_S_FILE") == 0) {
                int val = strcmp(tmp[0], "PG_S_PATH") == 0 ? 0 : 1;
                if (type != val) {
                    type = val;
                    count = -1;
                }
                count++;
            }

            if (strlen(tmp[1]) > 1) {
                strncpy(tmp[1], tmp[1] + 1, strlen(tmp[1]) - 2);
                tmp[1][strlen(tmp[1]) - 2] = '\0';
            }
            SV(upper(tmp[0]), tmp[1], type, count);
        }
    }
}
*/

void test_parser_pg_script_parser_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite parser_pg_script_parser_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_parser_pg_script_parser_success1", test_parser_pg_script_parser_success1))
       ) {
        return NULL;
    }

    return pSuite;
}