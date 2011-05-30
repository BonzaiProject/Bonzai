/**
 *           _            ____                     _ _             ____  
 *     _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \ 
 *    | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 *    | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ 
 *    | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 *    |_|         |_| phpGuardian %MODULE%
 *
 *
 * PHPGUARDIAN2
 * 
 * CODE NAME:          %codename%
 * ENGINE VERSION:     %engine_ver%
 * MODULE VERSION:     %module_ver%
 *
 * URL:                http://www.phpguardian.org
 * E-MAIL:             info@phpguardian.org
 *
 * COPYRIGHT:          2006-%curr_year% Fabio Cicerchia
 * LICENSE:            GNU GPL 3+
 *                     This program is free software: you can redistribute it and/or modify
 *                     it under the terms of the GNU General Public License as published by
 *                     the Free Software Foundation, either version 3 of the License, or
 *                     (at your option) any later version.
 *
 *                     This program is distributed in the hope that it will be useful,
 *                     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *                     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *                     GNU General Public License for more details.
 *
 *                     You should have received a copy of the GNU General Public License
 *                     along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * $Id:
 **/

#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <ctype.h>
#include <math.h>
#include <string.h>
#include "php.h"
#include "php_ini.h"
#include "../standard/head.h"
#include "../standard/html.h"
#include "../standard/css.h"
#include "../standard/php_var.h"
#include "../standard/base64.c"
//#include "../zlib/zlib.c"
//#include "../zlib/zlib_fopen_wrapper.c"
//#include "../zlib/zlib_filter.c"
//#include "../zlib/php_zlib.hi"
#include "SAPI.h"
#include "zend_extensions.h"
#include "phpg.h"
#include "logos.h"

#define PHPG_MAX_LEN 4096
#define PHPG_VERSION "1.0"
#define SAPI_PHPG_VERSION_HEADER "X-Encoded-By: phpGuardian2 v" PHPG_VERSION

static function_entry phpg_functions[] = {
    PHP_FE(phpg_exec, NULL)
    PHP_FE(phpg_info, NULL)
    PHP_FE(phpg_credits, NULL)
    PHP_FE(phpg_version, NULL)
    PHP_FE(phpg_log, NULL)
    {NULL, NULL, NULL}
};

zend_module_entry phpg_module_entry = {
#if ZEND_MODULE_API_NO >= 20010901
    STANDARD_MODULE_HEADER,
#endif
    PHP_PHPG_EXTNAME,
    phpg_functions,
    PHP_MINIT(phpguardian),
    PHP_MSHUTDOWN(phpguardian),
    NULL,
    NULL,
    PHP_MINFO(phpguardian),
#if ZEND_MODULE_API_NO >= 20010901
    PHP_PHPG_VERSION,
#endif
    STANDARD_MODULE_PROPERTIES
};

#ifdef COMPILE_DL_PHPG
ZEND_GET_MODULE(phpg)
#endif

PHP_INI_BEGIN()
    PHP_INI_ENTRY("phpguardian.key_file", "", PHP_INI_ALL, NULL)
    PHP_INI_ENTRY("phpguardian.log_server", "", PHP_INI_ALL, NULL)
    PHP_INI_ENTRY("phpguardian.error_connection", "", PHP_INI_ALL, NULL)
    PHP_INI_ENTRY("phpguardian.not_reachable_die", "", PHP_INI_ALL, NULL)
PHP_INI_END()

PHP_MINIT_FUNCTION(phpguardian)
{
    php_register_info_logo(PHPG_LOGO_GUID, "image/gif", phpg_logo, sizeof(phpg_logo));

    REGISTER_STRING_CONSTANT("PHPG_VERSION", PHP_PHPG_VERSION, CONST_CS | CONST_PERSISTENT);
    REGISTER_INI_ENTRIES();
    return SUCCESS;
}

PHP_MSHUTDOWN_FUNCTION(phpguardian)
{
    UNREGISTER_INI_ENTRIES();
    return SUCCESS;
}

PHP_MINFO_FUNCTION(phpguardian)
{
    php_info_print_table_start();
    php_info_print_table_row(2, "phpGuardian support", "enabled");
    php_info_print_table_row(2, "phpGuardian version", PHP_PHPG_VERSION);
    php_info_print_table_end();
}

// {{{ PHP_FUNCTION phpg_exec
/**
 * Execute an encoded source 
 */ 
PHP_FUNCTION(phpg_exec)
{
    char *code;
    int code_len;

    if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "s", &code, &code_len) == FAILURE) {
        RETURN_NULL();
    }

    char *key = _pg_get_key();
    char *decoded = _pg_decode(code, key);

    char *eval_string = decoded;
    int len = strlen(decoded);
    char *tmp = (char *)emalloc(6);
    char *tmp2 = (char *)emalloc(4);
    strncpy(tmp, decoded, 5);
    tmp[5] = '\0';
    strncpy(tmp2, decoded + len - 3, 3);
    tmp2[2] = '\0';
    if (strcmp(tmp, "<?php") == 0 && strcmp(tmp2, "?>") == 0) {
        strncpy(eval_string, decoded + 5, len - 8);
        eval_string[len - 8] = '\0';
        while (eval_string[strlen(eval_string) - 1] == '?') eval_string[strlen(eval_string) - 1] = '\0';

        sapi_add_header(SAPI_PHPG_VERSION_HEADER, sizeof(SAPI_PHPG_VERSION_HEADER) - 1, 1);

        char *compiled_string_description = zend_make_compiled_string_description("Nothing to declare... for now ;)" TSRMLS_CC);
        if (zend_eval_string(eval_string, NULL, compiled_string_description TSRMLS_CC) == FAILURE) {
            efree(compiled_string_description);
            php_error_docref(NULL TSRMLS_CC, E_ERROR, "Failed evaluating crypted source code!");
        }
        efree(compiled_string_description);
    } else {
        php_error_docref(NULL TSRMLS_CC, E_ERROR, "Failed evaluating crypted source code!");
    }
    efree(key);
    efree(decoded);
    efree(tmp);
    efree(tmp2);
}
// }}}

// {{{ char *_pg_decode
/**
 * Decode the string
 * @params char *code
 * @params char *key
 * @return char *
 */
char *_pg_decode(char *code, char *key) {
    int i, t_char, j = 0;
    int ld = strlen(code);
    int lk = strlen(key);
    int step = ld / 2;

    if (ld == 0 || lk == 0) return "";

    if (code[ld] == '\0' && ((ld % 2) != 0)) ld--;
    code[ld] = '\0';

    int hex, x;
    char c, *s = code;
    double fnum;
    char *t_crdata = (char *)emalloc(step + 1);

    for(i = 0; i < ld; i += 2) {
        fnum = x = 0;
        while(x < 2) {
            c = *s++;
            if (c >= '0' && c <= '9') c -= '0';
            else if (c >= 'A' && c <= 'Z') c -= 'A' - 10;
            else if (c >= 'a' && c <= 'z') c -= 'a' - 10;
            else continue;

            fnum = fnum * 16 + c;
            x++;
        }
        t_char = (int)fnum ^ (int)key[j % lk];
        t_crdata[j] = (char)t_char;
        j++;
    }
    t_crdata[j] = '\0';
    return t_crdata;
}
// }}}

// {{{ char *_pg_get_key
/**
 * Retrieve the content of private key file 
 * return char *
 */
char *_pg_get_key() {
    char *fkey = INI_STR("phpguardian.key_file");
    int fp = open(fkey, O_RDONLY);
    struct stat filestats;
    fstat(fp, &filestats);
    if ((int)filestats.st_size < 0) {
        close(fp);
        return "";
    } else {
        char *content = (char *)emalloc(filestats.st_size);

        int res = read(fp, content, filestats.st_size);
        close(fp);
        content[(int)filestats.st_size] = '\0';
        
        if ((int)filestats.st_size > 80) {
            int start = strlen(PHPG_HEADER_KEY);
            char *t_key = (char *)emalloc(81);
            strncpy(t_key, content + start, 80);
            t_key[80] = '\0';
            return t_key;
        }
        return "";
    }
}
// }}}

// {{{ PHP_FUNCTION phpg_info
/**
 * Print informations about phpGuardian extension
 */
PHP_FUNCTION(phpg_info)
{
    if (sapi_module.phpinfo_as_text) {
        PUTS("phpg_info()\n");
    } else {
        PUTS("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"DTD/xhtml1-transitional.dtd\">\n");
        PUTS("<html>");
        PUTS("<head>\n");
        php_info_print_style(TSRMLS_C);
        PUTS("<title>phpg_info()</title>");
        PUTS("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n");
        PUTS("<meta name=\"ROBOTS\" content=\"NOINDEX,NOFOLLOW,NOARCHIVE\" />");
        PUTS("</head>\n");
        PUTS("<body><div class=\"center\">\n");
    }

    if (sapi_module.phpinfo_as_text) {
        php_info_print_table_row(2, "phpGuardian Version", PHP_PHPG_VERSION);
    } else {
        php_info_print_box_start(1);
        php_printf("<h1 class=\"p\">phpGuardian Version %s</h1>\n", PHP_PHPG_VERSION);
    }
    php_info_print_box_end();

    php_info_print_table_start();

    char temp_api[10];

    php_info_print_table_row(2, "Build Date", __DATE__ " " __TIME__);
    php_info_print_table_row(2, "PHP Version", PHP_VERSION);

    snprintf(temp_api, sizeof(temp_api), "%d", PHP_API_VERSION);
    php_info_print_table_row(2, "PHP API", temp_api);

    snprintf(temp_api, sizeof(temp_api), "%d", ZEND_MODULE_API_NO);
    php_info_print_table_row(2, "PHP Extension", temp_api);

    snprintf(temp_api, sizeof(temp_api), "%d", ZEND_EXTENSION_API_NO);
    php_info_print_table_row(2, "Zend Extension", temp_api);
#if ZEND_DEBUG
    php_info_print_table_row(2, "Debug Build", "yes");
#else
    php_info_print_table_row(2, "Debug Build", "no");
#endif

#ifdef ZTS
    php_info_print_table_row(2, "Thread Safety", "enabled");
#else
    php_info_print_table_row(2, "Thread Safety", "disabled");
#endif

    php_info_print_table_end();

    if (sapi_module.phpinfo_as_text) {
        PUTS("\nphpGuardian License\n");
        php_info_print_box_start(0);
        PUTS("This program is free software: you can redistribute it and/or modify\n");
        PUTS("it under the terms of the GNU General Public License as published by\n");
        PUTS("the Free Software Foundation, either version 3 of the License, or\n");
        PUTS("(at your option) any later version.\n");
        PUTS("\nThis program is distributed in the hope that it will be useful,\n");
        PUTS("but WITHOUT ANY WARRANTY; without even the implied warranty of\n");
        PUTS("MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the\n");
        PUTS("GNU General Public License for more details.\n");
        PUTS("\nYou should have received a copy of the GNU General Public License\n");
        PUTS("along with this program. If not, see <http://www.gnu.org/licenses/>.\n");
    } else {
        PUTS("<h2>phpGuardian License</h2>");
        php_info_print_box_start(0);
        PUTS("<p>This program is free software: you can redistribute it and/or modify\n");
        PUTS("it under the terms of the GNU General Public License as published by\n");
        PUTS("the Free Software Foundation, either version 3 of the License, or\n");
        PUTS("(at your option) any later version.</p>\n");
        PUTS("<p>This program is distributed in the hope that it will be useful,\n");
        PUTS("but WITHOUT ANY WARRANTY; without even the implied warranty of\n");
        PUTS("MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the\n");
        PUTS("GNU General Public License for more details.</p>\n");
        PUTS("<p>You should have received a copy of the GNU General Public License\n");
        PUTS("along with this program. If not, see &lt;http://www.gnu.org/licenses/&gt;.</p>\n");
        php_info_print_box_end();
    }

    if (!sapi_module.phpinfo_as_text) {
        PUTS("</div></body></html>");
    }
}
// }}}

// {{{ PHP_FUNCTION phpg_credits
/**
 * Print the credits of phpGuardian project
 */
PHP_FUNCTION(phpg_credits)
{
    if (sapi_module.phpinfo_as_text) {
        PUTS("phpg_credits()\n");
    } else {
        PUTS("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"DTD/xhtml1-transitional.dtd\">\n");
        PUTS("<html>");
        PUTS("<head>\n");
        php_info_print_style(TSRMLS_C);
        PUTS("<title>phpg_credits()</title>");
        PUTS("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n");
        PUTS("<meta name=\"ROBOTS\" content=\"NOINDEX,NOFOLLOW,NOARCHIVE\" />");
        PUTS("</head>\n");
        PUTS("<body><div class=\"center\">\n");
    }

    if (sapi_module.phpinfo_as_text) {
        PUTS("phpGuardian Credits\n");
    } else {
        php_info_print_box_start(1);
        PUTS("<h1 class=\"p\">phpGuardian Credits</h1>\n");
    }
    php_info_print_box_end();

    php_info_print_table_start();
    php_info_print_table_row(2, "Owner", "Fabio Cicerchia");
    php_info_print_box_end();

    if (!sapi_module.phpinfo_as_text) {
        PUTS("</div></body></html>");
    }
}
// }}}

// {{{ PHP_FUNCTION phpg_version
/**
 * Return the current phpGuardian version
 * @return string
 */
PHP_FUNCTION(phpg_version)
{
    RETURN_STRING(PHP_PHPG_VERSION, 1);
}
// }}}

// {{{ PHP_FUNCTION phpg_log
/**
 * Send an access to logging server
 */
PHP_FUNCTION(phpg_log)
{
    // LIKE serialize
    zval **struc;
    php_serialize_data_t var_hash;
    smart_str buf = {0};

    PHP_VAR_SERIALIZE_INIT(var_hash);
    php_var_serialize(&buf, &PG(http_globals)[TRACK_VARS_SERVER], &var_hash TSRMLS_CC);
    PHP_VAR_SERIALIZE_DESTROY(var_hash);
    
    char *n_param = phpg_base64_encode((char *)buf.c);
    char *server = INI_STR("phpguardian.log_server");
    int len = 11 + strlen(server) + strlen(n_param);
    char *file = emalloc(len);
    sprintf(file, "%s?op=log&pc=%s", server, n_param);
    file[len] = '\0';

    int size = 0;
    // LIKE readfile
    php_stream_context *context = NULL;
    php_stream *stream = php_stream_open_wrapper_ex(file, "rb", 0 | ENFORCE_SAFE_MODE | REPORT_ERRORS, NULL, context);
    char content[PHPG_MAX_LEN];
    if (stream) {
        size_t bcount = 0;
        char buf[1];
        int b;

        while ((b = php_stream_read(stream, buf, sizeof(buf))) > 0) {
            content[bcount] = buf[0];
            bcount += b;
        }
        content[bcount] = '\0';
        php_stream_close(stream);
    }
    efree(file);

    char *message;
    char *tmp = (char *)emalloc(22 * sizeof(char));
    strncpy(tmp, content, 22);
    tmp[22] = '\0';
    if (strcmp(tmp, "<br />\n<b>Warning</b>:")) {
        if (INI_STR("phpguardian.not_reachable_die") == "true") die(INI_STR("phpguardian.error_connection"));
        else php_printf("%s", INI_STR("phpguardian.error_connection"));
    }
    efree(tmp);

    char *compiled_string_description = zend_make_compiled_string_description("Nothing to declare... for now ;)" TSRMLS_CC);
    zend_eval_string(content, NULL, compiled_string_description TSRMLS_CC); 
    efree(compiled_string_description);
}
// }}}

// {{{ char *phpg_base64_encode 
/**
 * Convert a string in base64
 * @param char *data
 * @return char *
 */
char *phpg_base64_encode(char *data) {
    unsigned char *result;
    int str_len = strlen(data), ret_length;
    result = php_base64_encode(data, str_len, &ret_length);
    return (char *)result;
}
// }}}

PHP_FUNCTION(phpg_logo_guid)
{
        if (ZEND_NUM_ARGS() != 0) {
                WRONG_PARAM_COUNT;
        }

        RETURN_STRINGL(PHPG_LOGO_GUID, sizeof(PHPG_LOGO_GUID) - 1, 1);
}
