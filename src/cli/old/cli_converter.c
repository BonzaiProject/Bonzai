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
 * $Id: converter.c,v 1.6 2010-02-11 09:23:23 fabio Exp $
 **/

#ifndef _CONVERTER_C
    // {{{ DEFINES
    #define _CONVERTER_C
    // }}}

    // {{{ METHODS
    // {{{ char *pg_convert(char *filename, bool asptag)
    /**
     * Convert the input source to pure php
     * @param char *filename
     * @param bool asptag
     * @return char *
     */
    char *pg_convert(char *filename, bool asptag) {
        // Increase the total originary bytes
        total_orig_bytes += get_size(filename);

        // Get the ASP flag
        char *asp_flag = get_asp_option(asptag);

        int len = SLEN(filename) + SLEN(asp);

        // Set the command that will be executed
        char *command = (char *)malloc((43 + len) * sizeof(char)); // TODO: Why 43?
        (void)snprintf(command, (size_t)(43 + len), "env phpg-converter --quiet %s-f \"%s\"", asp_flag, filename);
        command[42 + len] = '\0';

        // Execute command
        char *source = read_process(command);
        free(command);

        // Increase the total converted bytes
        total_converted_bytes += SLEN(source);

        // Print a message
        pg_message("Generated %d bytes.", true, len);

        return source;
    }
    // }}}

    // {{{ char *get_asp_option(bool use)
    /**
     * Get the option for the ASP mode
     * @param bool use
     * @return char *
     */
    char *get_asp_option(bool use) {
        // Check if ASP Tags are enabled
        char *asp = (char *)malloc(3 * sizeof(char));
        memset(asp, 0, sizeof(asp));
        if (use) {
            pg_message("Enabled ASP tags instead of the PHP tags.", true);
            strcpy(asp, "-a ");
        }

        return asp;
    }
    // }}}
    // }}}
#endif /* _CONVERTER_C */
