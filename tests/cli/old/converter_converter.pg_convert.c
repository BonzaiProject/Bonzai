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

#include "../converter.c"

/*
char *pg_convert(char *data, bool asptag) {
    int i;

    char *pt_open_long = PT_OPEN_LONG;
    char *pt_open_short = PT_OPEN_SHORT;
    char *pt_close = PT_CLOSE;
    int pt_size_long = 5;
    int count = -1;

    if (asptag) {
        pt_open_long = pt_open_short = PT_OPEN_ASP;
        pt_close = PT_CLOSE_ASP;
        pt_size_long = 2;
    }
    data = str_replace(PT_CLOSE, ";" PT_CLOSE, data);
    pt *php = pg_finder(data, asptag);

    int max = count_occurrence(data, pt_open_short);

    int start = count = 0;
    int end = php[0].open;
    int len = strlen(data);
    char *outp = (char *)malloc((len * 2) * sizeof(char));
    sprintf(outp, "%s\n", pt_open_long);
    char tmp[len];
    for(i = 0; i < len; i++) {
        if (count < max && i >= php[count].open && i <= php[count].close) {
            strncpy(tmp, data + (php[count].open + php[count].size), php[count].close - php[count].open - php[count].size);
            tmp[php[count].close - php[count].open - php[count].size] = '\0';
            strcat(outp, tmp);
            start = i = (int)php[count].close + 2;
            if (count + 1 >= max) end = len;
            else end = (int)php[count + 1].open;
            count++;
        } else if (i >= start && i <= end) {
            strcat(outp, "\necho <<<PHPG_HD\n");
            strncpy(tmp, data + start, end - start);
            tmp[end - start] = '\0';
            strcat(outp, tmp);
            strcat(outp, "\nPHPG_HD;\n");
            i = end;
        } else {
            strcat(outp, "\necho <<<PHPG_HD\n");
            strncpy(tmp, data + i, len - i);
            tmp[len - i] = '\0';
            strcat(outp, tmp);
            strcat(outp, "\nPHPG_HD;\n");
            i = len;
        }
    }
    strcat(outp, pt_close);
    outp[strlen(outp)] = '\0';
    return outp;
}
*/

void test_converter_pg_convert_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite converter_pg_convert_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_converter_pg_convert_success1", test_converter_pg_convert_success1))
       ) {
        return NULL;
    }

    return pSuite;
}