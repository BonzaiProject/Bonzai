/**
 *
 * BONZAI
 * (was phpGuardian)
 *
 * CODE NAME:      phoenix
 * ENGINE VERSION: 0.1
 * MODULE VERSION: 0.1
 *
 * URL:            http://www.bonzai-project.org
 * E-MAIL:         info@bonzai-project.org
 *
 * COPYRIGHT:      2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * LICENSE:        MIT or GNU GPL 2
 *                 The MIT License is recommended for most projects, it's simple
 *                 and  easy  to understand and it places almost no restrictions
 *                 on  what  you  can do with Bonzai.
 *                 If  the  GPL  suits  your project better you are also free to
 *                 use Bonzai under that license.
 *                 You   don't  have  to  do  anything  special  to  choose  one
 *                 license  or  the  other  and  you don't have to notify anyone
 *                 which   license   you   are   using.  You  are  free  to  use
 *                 Bonzai  in  commercial  projects  as  long  as  the copyright
 *                 header is left intact.
 *                 <http://www.opensource.org/licenses/mit-license.php>
 *                 <http://www.opensource.org/licenses/gpl-2.0.php>
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
#include "bonzai.h"
#include "logos.h"

#define BONZAI_MAX_LEN 4096
#define BONZAI_VERSION "0.1"
#define SAPI_BONZAI_VERSION_HEADER "X-Encoded-By: Bonzai v" BONZAI_VERSION

static function_entry bonzai_functions[] = {
    PHP_FE(bonzai_exec, NULL)
    PHP_FE(bonzai_info, NULL)
    PHP_FE(bonzai_credits, NULL)
    PHP_FE(bonzai_version, NULL)
    PHP_FE(bonzai_log, NULL)
    {NULL, NULL, NULL}
};

zend_module_entry bonzai_module_entry = {
#if ZEND_MODULE_API_NO >= 20010901
    STANDARD_MODULE_HEADER,
#endif
    PHP_BONZAI_EXTNAME,
    bonzai_functions,
    PHP_MINIT(bonzai),
    PHP_MSHUTDOWN(bonzai),
    NULL,
    NULL,
    PHP_MINFO(bonzai),
#if ZEND_MODULE_API_NO >= 20010901
    PHP_BONZAI_VERSION,
#endif
    STANDARD_MODULE_PROPERTIES
};

#ifdef COMPILE_DL_BONZAI
ZEND_GET_MODULE(bonzai)
#endif

PHP_INI_BEGIN()
    PHP_INI_ENTRY("bonzai.log_server", "", PHP_INI_ALL, NULL)
    PHP_INI_ENTRY("bonzai.error_connection", "", PHP_INI_ALL, NULL)
    PHP_INI_ENTRY("bonzai.not_reachable_die", "", PHP_INI_ALL, NULL)
PHP_INI_END()

PHP_MINIT_FUNCTION(bonzai)
{
    php_register_info_logo(BONZAI_LOGO_GUID, "image/gif", bonzai_logo, sizeof(bonzai_logo));

    REGISTER_STRING_CONSTANT("BONZAI_VERSION", PHP_BONZAI_VERSION, CONST_CS | CONST_PERSISTENT);
    REGISTER_INI_ENTRIES();
    return SUCCESS;
}

PHP_MSHUTDOWN_FUNCTION(bonzai)
{
    UNREGISTER_INI_ENTRIES();
    return SUCCESS;
}

PHP_MINFO_FUNCTION(bonzai)
{
    php_info_print_table_start();
    php_info_print_table_row(2, "Bonzai support", "enabled");
    php_info_print_table_row(2, "Bonzai version", PHP_BONZAI_VERSION);
    php_info_print_table_end();
}

// {{{ PHP_FUNCTION bonzai_exec
/**
 * Execute an encoded source 
 */ 
PHP_FUNCTION(bonzai_exec)
{
    char *code;
    int code_len;

    if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "s", &code, &code_len) == FAILURE) {
        RETURN_NULL();
    }

    char *key = _bonzai_get_key();
    char *decoded = _bonzai_decode(code, key);

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

        sapi_add_header(SAPI_BONZAI_VERSION_HEADER, sizeof(SAPI_BONZAI_VERSION_HEADER) - 1, 1);

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

// {{{ PHP_FUNCTION bonzai_info
/**
 * Print informations about bonzai extension
 */
PHP_FUNCTION(bonzai_info)
{
    if (sapi_module.phpinfo_as_text) {
        PUTS("bonzai_info()\n");
    } else {
        PUTS("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"DTD/xhtml1-transitional.dtd\">\n");
        PUTS("<html>");
        PUTS("<head>\n");
        php_info_print_style(TSRMLS_C);
        PUTS("<title>bonzai_info()</title>");
        PUTS("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n");
        PUTS("<meta name=\"ROBOTS\" content=\"NOINDEX,NOFOLLOW,NOARCHIVE\" />");
        PUTS("</head>\n");
        PUTS("<body><div class=\"center\">\n");
    }

    if (sapi_module.phpinfo_as_text) {
        php_info_print_table_row(2, "Bonzai Version", PHP_BONZAI_VERSION);
    } else {
        php_info_print_box_start(1);
        php_printf("<h1 class=\"p\">Bonzai Version %s</h1>\n", PHP_BONZAI_VERSION);
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
        PUTS("\nBonzai License\n");
        php_info_print_box_start(0);
        PUTS("MIT or GNU GPL 2\n");
        PUTS("The MIT License is recommended for most projects, it's simple\n");
        PUTS("and  easy  to understand and it places almost no restrictions\n");
        PUTS("on  what  you  can do with Bonzai.\n");
        PUTS("If  the  GPL  suits  your project better you are also free to\n");
        PUTS("use Bonzai under that license.\n");
        PUTS("You   don't  have  to  do  anything  special  to  choose  one\n");
        PUTS("license  or  the  other  and  you don't have to notify anyone\n");
        PUTS("which   license   you   are   using.  You  are  free  to  use\n");
        PUTS("Bonzai  in  commercial  projects  as  long  as  the copyright\n");
        PUTS("header is left intact.\n");
        PUTS("<http://www.opensource.org/licenses/mit-license.php>\n");
        PUTS("<http://www.opensource.org/licenses/gpl-2.0.php>\n");
    } else {
        PUTS("<h2>Bonzai License</h2>");
        php_info_print_box_start(0);
        PUTS("<p>MIT or GNU GPL 2</p>");
        PUTS("<p>The MIT License is recommended for most projects, it's simple\n");
        PUTS("and  easy  to understand and it places almost no restrictions\n");
        PUTS("on  what  you  can do with Bonzai.</p>\n");
        PUTS("<p>If  the  GPL  suits  your project better you are also free to\n");
        PUTS("use Bonzai under that license.</p>\n");
        PUTS("<p>You   don't  have  to  do  anything  special  to  choose  one\n");
        PUTS("license  or  the  other  and  you don't have to notify anyone\n");
        PUTS("which   license   you   are   using.  You  are  free  to  use\n");
        PUTS("Bonzai  in  commercial  projects  as  long  as  the copyright\n");
        PUTS("header is left intact.</p>\n");
        PUTS("<p>&lt;http://www.opensource.org/licenses/mit-license.php&gt;</p>\n");
        PUTS("<p>&lt;http://www.opensource.org/licenses/gpl-2.0.php&gt;</p>\n");
        php_info_print_box_end();
    }

    if (!sapi_module.phpinfo_as_text) {
        PUTS("</div></body></html>");
    }
}
// }}}

// {{{ PHP_FUNCTION bonzai_credits
/**
 * Print the credits of bonzai project
 */
PHP_FUNCTION(bonzai_credits)
{
    if (sapi_module.phpinfo_as_text) {
        PUTS("bonzai_credits()\n");
    } else {
        PUTS("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"DTD/xhtml1-transitional.dtd\">\n");
        PUTS("<html>");
        PUTS("<head>\n");
        php_info_print_style(TSRMLS_C);
        PUTS("<title>bonzai_credits()</title>");
        PUTS("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n");
        PUTS("<meta name=\"ROBOTS\" content=\"NOINDEX,NOFOLLOW,NOARCHIVE\" />");
        PUTS("</head>\n");
        PUTS("<body><div class=\"center\">\n");
    }

    if (sapi_module.phpinfo_as_text) {
        PUTS("Bonzai Credits\n");
    } else {
        php_info_print_box_start(1);
        PUTS("<h1 class=\"p\">Bonzai Credits</h1>\n");
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

// {{{ PHP_FUNCTION bonzai_version
/**
 * Return the current bonzai version
 * @return string
 */
PHP_FUNCTION(bonzai_version)
{
    RETURN_STRING(PHP_BONZAI_VERSION, 1);
}
// }}}

// {{{ PHP_FUNCTION bonzai_log
/**
 * Send an access to logging server
 */
PHP_FUNCTION(bonzai_log)
{
    // LIKE serialize
    zval **struc;
    php_serialize_data_t var_hash;
    smart_str buf = {0};

    PHP_VAR_SERIALIZE_INIT(var_hash);
    php_var_serialize(&buf, &PG(http_globals)[TRACK_VARS_SERVER], &var_hash TSRMLS_CC);
    PHP_VAR_SERIALIZE_DESTROY(var_hash);
    
    char *n_param = bonzai_base64_encode((char *)buf.c);
    char *server = INI_STR("bonzai.log_server");
    int len = 11 + strlen(server) + strlen(n_param);
    char *file = emalloc(len);
    sprintf(file, "%s?op=log&pc=%s", server, n_param);
    file[len] = '\0';

    int size = 0;
    // LIKE readfile
    php_stream_context *context = NULL;
    php_stream *stream = php_stream_open_wrapper_ex(file, "rb", 0 | ENFORCE_SAFE_MODE | REPORT_ERRORS, NULL, context);
    char content[BONZAI_MAX_LEN];
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
        if (INI_STR("bonzai.not_reachable_die") == "true") die(INI_STR("bonzai.error_connection"));
        else php_printf("%s", INI_STR("bonzai.error_connection"));
    }
    efree(tmp);

    char *compiled_string_description = zend_make_compiled_string_description("Nothing to declare... for now ;)" TSRMLS_CC);
    zend_eval_string(content, NULL, compiled_string_description TSRMLS_CC); 
    efree(compiled_string_description);
}
// }}}

// {{{ char *bonzai_base64_encode 
/**
 * Convert a string in base64
 * @param char *data
 * @return char *
 */
char *bonzai_base64_encode(char *data) {
    unsigned char *result;
    int str_len = strlen(data), ret_length;
    result = php_base64_encode(data, str_len, &ret_length);
    return (char *)result;
}
// }}}

PHP_FUNCTION(bonzai_logo_guid)
{
        if (ZEND_NUM_ARGS() != 0) {
                WRONG_PARAM_COUNT;
        }

        RETURN_STRINGL(BONZAI_LOGO_GUID, sizeof(BONZAI_LOGO_GUID) - 1, 1);
}
