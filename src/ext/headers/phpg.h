/**
 *        _            ____                     _ _             ____  
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ 
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian EXTENSION
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
 * $Id:
 **/

#ifndef PHP_PHPG_H
    // {{{ DEFINES
    #define PHP_PHPG_H
    #define PHP_PHPG_VERSION "4.0"
    #define PHP_PHPG_EXTNAME "phpGuardian"
    #define PHPG_FOOTER_KEY "\n# PHPGUARDIAN P_KEY END BLOCK ##########"
    #define PHPG_HEADER_KEY "# PHPGUARDIAN P_KEY START BLOCK ########\n"
    #define ZTS 1
    #define phpext_phpg_ptr &phpg_module_entry
    // }}}

    // {{{ STRUCTS
    extern zend_module_entry phpg_module_entry;
    // }}}

    // {{{ METHODS
    PHP_MINIT_FUNCTION(phpguardian);
    PHP_MSHUTDOWN_FUNCTION(phpguardian);
    PHP_MINFO_FUNCTION(phpguardian);

    PHP_FUNCTION(phpg_exec);
    char *_pg_decode(char *code, char *key);
    char *_pg_get_key();
    PHP_FUNCTION(phpg_info);
    PHP_FUNCTION(phpg_credits);
    PHP_FUNCTION(phpg_version);
    PHP_FUNCTION(phpg_log);
    char *phpg_base64_encode(char *data);
    PHP_FUNCTION(phpg_logo_guid);
    // }}}
#endif /* PHP_PHPG_H */
