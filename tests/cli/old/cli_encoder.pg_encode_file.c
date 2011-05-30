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
void pg_encode_file(int pos, bool is_dir) {
    // Get the filename
    char *filename = get_filename(pos, is_dir);

#ifndef S_SPLINT_S
    // Check if filename isn't empty
    if (strcmp(filename, "") == 0) {
        free(filename);
        return;
    }
#endif

    // Get the element
    PGSS tmp = get_element(pos, is_dir);

    char *inner = get_inner();
    char *header = get_header(tmp, inner);
    char *footer = get_footer(tmp);

    // Open it
    DIR *pdir = opendir(filename);

    // Print a message
    printf(_("Start encoding file `%s'."), filename);
    printf("\n");

    // Is a file?
    if (pdir == NULL) {
        // Get the content
        char *content = FGET(filename);
        // Convert the content
        char *content2 = pg_convert(content, PG_S_USE_ASP_TAGS);
        free(content);

        // If the converted data is empty
        if (strcmp(content2, "") == 0) {
            // Set the file as skipped
            // CHANGE: array_push
            skipped_files = (char **)realloc(skipped_files, (sizeof(skipped_files) + 1) * sizeof(char *));
            skipped_files[count_skipped] = filename;
            count_skipped++;

            // Print a message
            pg_message("ERROR: The converted data is empty.", false);
            goto freeing;
        }
        content = CR(content2);
        free(content2);
        if (strcmp(content, "") != 0) {
#ifndef S_SPLINT_S
            rename_file(filename);
#endif
            char *encoded = get_encoded_filename(filename);
            // Print a message
            pg_message("Saving %d bytes...", true, strlen(content));

            // Save the file
            FPUT(encoded, content, header, footer);
            free(encoded);
            free(content);
        } else {
            // Set the file as skipped
            // CHANGE: array_push
            skipped_files = (char **)realloc(skipped_files, (sizeof(skipped_files) + 1) * sizeof(char *));
            skipped_files[count_skipped] = filename;

            count_skipped++;

            // Print a message
            pg_message("ERROR: The encoded data is empty.", false);
        }
    } else {
        //walkdir(filename);
    }

freeing:
    free(tmp.PATH);
    free(tmp.HEADER);
    free(tmp.FOOTER);
    free(filename);
    free(inner);
    free(header);
    free(footer);
}
*/

void test_encoder_pg_encode_file_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite encoder_pg_encode_file_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_encoder_pg_encode_file_success1", test_encoder_pg_encode_file_success1))
       ) {
        return NULL;
    }

    return pSuite;
}