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

#ifndef _CLI_H
    // {{{ INCLUDES
    //#include <unistd.h>
    #include <ftw.h>
    #include <stdio.h>
    #include "shared.h"
    // }}}

    // {{{ DEFINES
    #define _CLI_H
    #define _FORTIFY_SOURCE 2

    #define CONFIG_SCRIPT ";\n;           _            ____                     _ _             ____  \n;     _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \\ \n;    | '_ \\| '_ \\| '_ \\| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \\  __) |\n;    | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ \n;    | .__/|_| |_| .__/ \\____|\\__,_|\\__,_|_|  \\__,_|_|\\__,_|_| |_|_____|\n;    |_|         |_| phpGuardian CLI v1.0\n;\n;\n; PHPGUARDIAN2 CLI SCRIPT\n; generated on YY-MM-DD H:i:s+z\n;\n\n[SETUP]\n;\n; Set the action to take.\n;\n; Value: ENCODE|DECODE\n;   ENCODE  encode a list of paths or / and files (default)\n;   DECODE  decode a list of paths or / and files\nACTION = \"ENCODE\"\n\n;\n; Auto generate the Private Key file from the `KEY' option.\n;\n; Value: YES|NO\n;   YES (default)\n;   NO\nAUTO_GENERATE_KEYFILE = \"YES\"\n\n;\n; Set the verbose mode of the CLI.\n; Each message are more detailed for more informations on the execution.\n;\n; Value: YES|NO\n;   YES (default)\n;   NO\nVERBOSE = \"YES\"\n\n;\n; Set the silent mode of the CLI.\n; Each message will be suppressed.\n;\n; Value: YES|NO\n;   YES\n;   NO  (default)\nSILENT = \"NO\"\n\n;\n; Use the PHP Extension instead thee PHP Class.\n; This is useful to insert into encoded source some additional instructions to ensure the correct decoding & execution.\n;\n; Value: YES|NO\n;   YES (default)\n;   NO\nUSE_PHP_EXTENSION = \"YES\"\n\n;\n; Convert the project source that use the ASP tags instead of PHP tags.\n;\n; Value: YES|NO\n;   YES (default)\n;   NO\nUSE_ASP_TAGS = \"YES\"\n\n[CONFIGURATION]\n;\n; Set the header text that will be saved into encoded file before the encoded block.\n;\n; Value: ... (default \"# phpGuardian ###########\\n\")\nHEADER = \"# phpGuardian ###########\\n\"\n\n;\n; Set the footer text that will be saved into encoded file after the encoded block.\n;\n; Value: ... (default \"\\n# phpGuardian ###########\")\nFOOTER = \"\\n# phpGuardian ###########\"\n\n;\n; Optimize the original source code.\n; Strip spaces, returns and comment.\n;\n; Value: YES|NO\n;   YES (default)\n;   NO\nOPTIMIZE_CODE = \"YES\"\n\n;\n; Disable the recovering of encoded source.\n; This disable the decoding of encoded source, but the script remain still executable.\n;\n; Value: YES|NO\n;   YES (default)\n;   NO\nDISABLE_RESTORING = \"YES\"\n\n;\n; Saving the original source code (during ENCODE action) or encoded code (during DECODE action) as new file with extension `.bak'.\n;\n; Value: YES|NO\n;   YES (default)\n;   NO\nSAVE_ORIGINAL_AS_BAK = \"YES\"\n\n;\n; Saving the encoded code as new file\n;\n; Value: YES|NO\n;   YES\n;   NO  (default)\nSAVE_ENCODED_AS_NEW = \"NO\"\n\n;\n; Saving the decoded code as new file.\n;\n; Value: YES|NO\n;   YES\n;   NO  (default)\nSAVE_DECODED_AS_NEW = \"NO\"\n\n[PHP_EXTENSION]\n;\n; The absolute path to extension module (.so or .dll)\n;\n; Value: ... (default \"\")\nEXTENSION_MODULE_PATH = \"\"\n\n[PHP_CLASS]\n;\n; Set the path to the PHP Class.\n;\n; Value: ... (default \"\")\nBASE_LIB_PATH = \"\"\n\n[KEY]\n;\n; Set the private key for ENCODE / DECODE action.\n;\n; Value: ... (default \"\")\nKEY = \"\"\n\n;\n; Set the path and the filename of the private key file.\n;\n; Value: ... (default \"\")\nKEY_FILE = \"\"\n\n[PATHS]\n;\n; Pattern (applied on the all paths) that will be excluded from the ENCODE / DECODE action.\n;\n; Value: ... (default \"\")\nEXCLUDE_PATH_PATTERN = \"\"\n\n;\n; List of the directories to elaborate.\n; Additional options for each directory are: HEADER, FOOTER, OPTIMIZE_CODE and DISABLE_RESTORING. For informations see above.\n;\n; Value: ...\nPATH = \"\"\nHEADER = \"\"\nFOOTER = \"\"\nOPTIMIZE_CODE = \"\"\nDISABLE_RESTORING = \"\"\n\n[FILES]\n;\n; Pattern (applied on the all files) that will be excluded from the ENCODE / DECODE action.\n;\n; Value: ... (default \"\")\nEXCLUDE_FILE_PATTERN = \"\"\n\n;\n; List of the files to elaborate.\n; Additional options for each file are: HEADER, FOOTER, OPTIMIZE_CODE and DISABLE_RESTORING. For informations see above.\n;\n; Value: ...\nFILE = \"\"\nHEADER = \"\"\nFOOTER = \"\"\nOPTIMIZE_CODE = \"\"\nDISABLE_RESTORING = \"\""
    #define DEC(c, i) pg_decode_file(c, i)
    #ifndef PHPG_DEBUG
        #define PHPG_DEBUG
    #endif /* PHPG_DEBUG */
    #define PHPG_EXEC_ID getpid()
    #define PHPG_EXEC_TIME time(NULL)
    #define PHPG_EXTENSION_STRING "\n\nif (!extension_loaded('phpguardian')) {\n\tif (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {\n\t\tdl('%sphpguardian.dll');\n\t} else {\n\t\tdl('%sphpguardian.so');\n\t}\n}\n\n\tphpg_exec('"
    #define PHPG_FOOTER_KEY "\n# PHPGUARDIAN P_KEY END BLOCK ##########"
    #define PHPG_H
    #define PHPG_HEADER_KEY "# PHPGUARDIAN P_KEY START BLOCK ########\n"
    #define PHPG_LIBRARY_STRING "\n\nrequire_once('%s/lib.php');\n\tphpg_exec('"
    #define PHPG_LOGO "            _            ____                     _ _             ____\n      _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \\\n     | '_ \\| '_ \\| '_ \\| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \\  __) |\n     | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ \n     | .__/|_| |_| .__/ \\____|\\__,_|\\__,_|_|  \\__,_|_|\\__,_|_| |_|_____|\n     |_|         |_| "
    #define PHPG_VER_CLI "1.0"
    #define PHPG_VER_ENGINE "4.0"
    #define X(a, b) (a^b)
    // }}}

    // {{{ GLOBALS
    int count_skipped = 0;
    int start_time = 0;
    char **skipped_files;
    long int total_converted_bytes = 0;
    long int total_generated_bytes = 0;
    long int total_orig_bytes = 0;
    int total_files = 0;
    // }}}

    // {{{ METHODS
    char *decode_char(char *characters, char key);
    void elaborate();
    char *encode_char(char character, char key);
    void generate();
    char *get_asp_option(bool use);
    bool get_bool(char *value);
    char *get_decoded_filename(char *filename);
    PGSS get_element(int pos, bool is_dir);
    char *get_encoded_filename(char *filename);
    char *get_filename(int pos, bool is_dir);
    char *get_footer(PGSS element);
    char *get_header(PGSS element, char *inner);
    char *get_inner();
    int main(int argc, char *argv[]);
    void parse();
    char *pg_code_crypt(char *data);
    char *pg_code_decrypt(char *data);
    char *pg_convert(char *filename, bool asptag);
    void pg_create_file_key();
    char *pg_cycle_decrypt(char *string, int lk, int ld);
    char *pg_cycle_encrypt(char *string, int key_len, int data_len);
    void pg_decode_file(int pos, bool is_dir);
    void pg_encode_file(int pos, bool is_dir);
    int pg_parser(char *name);
    void pg_script_parser(char *filename);
    void pg_set_vars(char *variable, char *value, int type, int counter);
    void print_help(char *prg);
    void print_version();
    void rename_file(char *filename);
    void report(int start_time);
    // }}}
#endif	/* _CLI_H */

