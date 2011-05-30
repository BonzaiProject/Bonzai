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

#include "../encoder.c"

/*
static char *get_footer(PGSS element) {
    int len;
    char *footer;

    if (element.FOOTER != PG_S_FOOTER) {
        len = (int)strlen(PG_S_FOOTER);

        footer = (char *)malloc((8 + len) * sizeof(char));
        memset(footer, 0, sizeof(footer));
        (void)snprintf(footer, (size_t)(7 + strlen(PG_S_FOOTER)), "');\n%s\n?>", PG_S_FOOTER);
    } else {
        len = (int)strlen(element.FOOTER);

        footer = (char *)malloc((8 + len) * sizeof(char));
        memset(footer, 0, sizeof(footer));
        (void)snprintf(footer, (size_t)(7 + strlen(element.FOOTER)), "');\n%s\n?>", element.FOOTER);
    }
    footer[7 + len] = '\0';

    return footer;
}
*/

void test_encoder_get_footer_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite encoder_get_footer_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_encoder_get_footer_success1", test_encoder_get_footer_success1))
       ) {
        return NULL;
    }

    return pSuite;
}