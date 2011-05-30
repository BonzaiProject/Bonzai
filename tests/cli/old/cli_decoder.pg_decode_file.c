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
void pg_decode_file(int pos, bool is_dir) {
    // Get the filename
    char *filename = get_filename(pos, is_dir);

#ifndef S_SPLINT_S
    // Check if filename isn't empty
    if (strcmp(filename, "") == 0) {
        return;
    }
#endif

    // Open it
    DIR *pdir = opendir(filename);

    // Print a message
    printf(_("Start decoding file `%s'."), filename);
    printf("\n");

    // Is a file?
    if (pdir == NULL) {
        // Get the content
        char *content = FGET(filename);
#ifndef S_SPLINT_S
        // Increase the total originary bytes
        total_orig_bytes += strlen(content);
#endif
        // Decode the content
        char *content2 = DC(content);
        free(content);

        // If the decoded data isn't empty
        if (strcmp(content2, "") != 0) {
#ifndef S_SPLINT_S
            rename_file(filename);
#endif
            char *decoded = get_decoded_filename(filename);

            // Print a message
            pg_message("Saving %d bytes...", true, strlen(content2));

            // Save the file
            FPUT(decoded, content2, "", "");
            free(content2);
            free(decoded);
        } else {
            // Set the file as skipped
            // CHANGE: array_push
            skipped_files = (char **)realloc(skipped_files, (sizeof(skipped_files) + 1) * sizeof(char *));
            skipped_files[count_skipped] = filename;

            count_skipped++;

            // Print a message
            pg_message("ERROR: The decoded data is empty.", false);
        }
    } else {
        //walkdir(filename);
    }
    free(filename);
}
*/

void test_decoder_pg_decode_file_success1(void) {
   CU_ASSERT(true);
}

CU_pSuite decoder_pg_decode_file_create_suite(CU_pSuite pSuite) {
    /* add the tests to the suite */
    if (
        (NULL == CU_add_test(pSuite, "test_decoder_pg_decode_file_success1", test_decoder_pg_decode_file_success1))
       ) {
        return NULL;
    }

    return pSuite;
}