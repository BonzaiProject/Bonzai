/**
 *        _            ____                     _ _             ____  
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ 
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian SHARED
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
 * $Id: globals.h,v 1.5 2010-02-11 09:23:24 fabio Exp $
 **/

#ifndef _SHARED_H
    // {{{ INCLUDES
    #include <stdarg.h>
    #include <dirent.h>
    #include <stdbool.h>
    #include <string.h>
    #include <ctype.h>
    #include <fcntl.h>
    #include <libintl.h>
    #include <math.h>
    #include <time.h>
    #include <stdlib.h>
    #include <locale.h>
    // }}}

    // {{{ DEFINES
    #define _SHARED_H
    
    #define _(str) gettext(str)
    #define MAX_SIZE 4096
    #define SLEN(s) (int)strlen(s)
    #define X(a, b) (a^b)
    // }}}

    // {{{ STRUCTS
    typedef struct {
        char *PATH;
        char *HEADER;
        char *FOOTER;
    } PGSS;
    static struct stat filestats;
    // }}}

    // {{{ GLOBALS
    char *ACTION = "HELP";
    char *PG_S_ACTION = "";
    bool PG_S_AUTO_GENERATE_KEYFILE = false;
    char *PG_S_BASE_LIB_PATH = "";
    int PG_S_CURRENT_POS = 0;
    char **PG_S_EXCLUDE_FILE_PATTERN;
    char **PG_S_EXCLUDE_PATH_PATTERN;
    char *PG_S_EXTENSION_MODULE_PATH = "";
    PGSS PG_S_FILES[1000];
    int PG_S_FILES_COUNT;
    char *PG_S_FOOTER = "# phpGuardian ###########";
    char *PG_S_HEADER = "# phpGuardian ###########";
    char *PG_S_KEY = "";
    char *PG_S_KEY_FILE = "";
    char *PG_S_KEY_HASH = "";
    PGSS PG_S_PATHS[1000];
    int PG_S_PATHS_COUNT;
    bool PG_S_SAVE_ENCODED_AS_NEW = false;
    bool PG_S_SAVE_DECODED_AS_NEW = false;
    bool PG_S_SAVE_ORIGINAL_AS_BAK = true;
    bool PG_S_SILENT = false;
    char *PG_S_SINGLE_FILE = "";
    bool PG_S_USE_ASP_TAGS = false;
    bool PG_S_USE_PHP_EXTENSION = true;
    bool PG_S_VERBOSE = false;
    char *SCRIPT_FILE = "";
    // }}}

    // {{{ METHODS
    int count_occurrence(char *string, char *substring);
    char **explode(char *separator, char *string);
    unsigned int hex2int(char *value);
    char *int2hex(unsigned int value);
    char *file_get_content(char *filename);
    void file_put_content(char *filename, char *data, char *header, char *footer);
    bool is_equal(char* a, char* b);
    char *lower(/*@only@*/ char *string);
    #ifndef PG_GET_HASH
    char *pg_get_hash(char *text);
    #endif
    void pg_message(char *text, bool verbose, ...);
    char *read_process(char *process);
    void scan(char *path);
    char *str_replace(char *search, char *replace, char *subject);
    int strpos(char *string, char *substring, int start);
    char *upper(/*@only@*/ char *string);
    void walkdir(char *path);
    // }}}
#endif	/* _SHARED_H */

