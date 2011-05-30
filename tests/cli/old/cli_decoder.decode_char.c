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

#include "../decoder.c"

/*
static char *decode_char(char *characters, char key) {
    char *t_crdata = (char *)malloc(sizeof(char));
    (void)snprintf(t_crdata, (size_t)1, "%c", (char)X(H2I(characters), (int)key));
    t_crdata[1] = '\0';
    return t_crdata;
}
*/

void test_decoder_decode_char_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite decoder_decode_char_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_decoder_decode_char_success1", test_decoder_decode_char_success1))
       ) {
        return NULL;
    }

    return pSuite;
}