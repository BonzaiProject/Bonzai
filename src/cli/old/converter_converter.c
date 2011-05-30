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
 * $Id: converter.c,v 1.5 2010-02-11 09:23:24 fabio Exp $
 **/

#ifndef _CONVERTER_C
    // {{{ DEFINES
    #define _CONVERTER_C
    // }}}

    // {{{ METHODS
    // {{{ char *pg_convert(char *data, bool asptag)
    /**
     * Convert the input source to pure php
     * @param char *data
     * @param bool asptag
     * @global char *PT_OPEN_LONG
     * @global char *PT_OPEN_SHORT
     * @global char *PT_CLOSE
     * @global char *PT_OPEN_ASP
     * @global char *PT_CLOSE_ASP
     * @return char *
     */
    char *pg_convert(char *data, bool asptag) {
        char *pt_open_long = PT_OPEN_LONG;
        char *pt_open_short = PT_OPEN_SHORT;
        char *pt_close = PT_CLOSE;
        int i, pt_size_long = 5, count = -1;

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
        int data_len = strlen(data);
        char *final_data = (char *)malloc((data_len * 2) * sizeof(char));
        sprintf(final_data, "%s\n", pt_open_long);
        char partial[data_len];
        for(i = 0; i < data_len; i++) {
            if (count < max && i >= php[count].open && i <= php[count].close) {
                strncpy(partial, data + (php[count].open + php[count].size), php[count].close - php[count].open - php[count].size);
                partial[php[count].close - php[count].open - php[count].size] = '\0';
                strcat(final_data, partial);
                start = i = (int)php[count++].close + 2;
                if (count >= max) end = data_len;
                else end = (int)php[count].open;
            } else if (i >= start && i <= end) {
                strcat(final_data, "\necho <<<PHPG_HD\n");
                strncpy(partial, data + start, end - start);
                partial[end - start] = '\0';
                strcat(final_data, partial);
                strcat(final_data, "\nPHPG_HD;\n");
                i = end;
            } else {
                strcat(final_data, "\necho <<<PHPG_HD\n");
                strncpy(partial, data + i, data_len - i);
                partial[data_len - i] = '\0';
                strcat(final_data, partial);
                strcat(final_data, "\nPHPG_HD;\n");
                i = data_len;
            }
        }
        strcat(final_data, pt_close);
        final_data[SLEN(final_data)] = '\0';

        return final_data;
    }
    // }}}

    // {{{ pt *pg_finder(char *data, bool asptag)
    /**
     * Convert the input source to pure php
     * @param char *data
     * @param bool asptag
     * @global char *PT_OPEN_LONG
     * @global char *PT_OPEN_SHORT
     * @global char *PT_CLOSE
     * @global char *PT_OPEN_ASP
     * @global char *PT_CLOSE_ASP
     * @return pt *
     */
    pt *pg_finder(char *data, bool asptag) {
        bool opened = false;
        int i, j, count = -1, pt_size_long = 5;

        char next[1];
        char *pt_open_long = (char *)PT_OPEN_LONG;
        char *pt_open_short = (char *)PT_OPEN_SHORT;
        char *pt_close = (char *)PT_CLOSE;

        if (asptag) {
            pt_open_long = pt_open_short = PT_OPEN_ASP;
            pt_close = PT_CLOSE_ASP;
            pt_size_long = 2;
        }

        int max = count_occurrence(data, pt_open_short);

        char tag_long[pt_size_long], tag_short[2];
        pt *php = (pt *)malloc(max * sizeof(pt));

        for (i = 0; i < max; i++) php[i].open = php[i].close = php[i].size = 0;

        int data_len = SLEN(data);
        for (j = 0; j < data_len; j++) {
            strncpy(tag_long, data + j, (size_t)pt_size_long);
            tag_long[pt_size_long] = '\0';
            strncpy(tag_short, data + j, 2);
            tag_short[2] = '\0';

            if (!opened && (is_equal(tag_long, pt_open_long) || is_equal(tag_short, pt_open_short))) {
                if (is_equal(tag_long, pt_open_long)) {
                    strncpy(next, data + j + pt_size_long, 1);
                    php[count + 1].size = pt_size_long;
                } else {
                    strncpy(next, data + j + 2, 1);
                    php[count + 1].size = 2;
                }
                next[1] = '\0';
                if (is_equal(next, "\n") || is_equal(next, "=") || is_equal(next, " ")) {
                    php[++count].open = j;
                    pg_message("Found php start #%d: %d", true, count, php[count].open);
                    opened = true;
                }
            } else if (is_equal(tag_short, pt_close)) {
                php[count].close = j;
                pg_message("Found php close #%d: %d", true, count, php[count].close);
                opened = false;
            }
        }

        return php;
    }
    // }}}
    // }}}
#endif /* _CONVERTER_C */
