/**
 * BONZAI
 * (was phpGuardian)
 *
 * CODE NAME:  phoenix
 * VERSION:    0.1
 *
 * URL:        http://www.bonzai-project.org
 * E-MAIL:     info@bonzai-project.org
 *
 * COPYRIGHT:  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
 * LICENSE:    MIT or GNU GPL 2
 *             The MIT License is recommended for most projects, it's simple and
 *             easy to understand  and it places  almost no restrictions on what
 *             you can do with Bonzai.
 *             If the GPL  suits your project  better you are  also free to  use
 *             Bonzai under that license.
 *             You don't have  to do anything  special to choose  one license or
 *             the other  and you don't have to notify  anyone which license you
 *             are using.  You are free  to use Bonzai in commercial projects as
 *             long as the copyright header is left intact.
 *             <http://www.opensource.org/licenses/mit-license.php>
 *             <http://www.opensource.org/licenses/gpl-2.0.php>
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
#include "../standard/base64.h"
#include "../standard/file.h"
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

    char *key     = _bonzai_get_key();
    char *decoded = _bonzai_decode(code, key);

    char *eval_string = decoded;
    int len           = strlen(decoded);
    char *tmp         = (char *)emalloc(6);
    char *tmp2        = (char *)emalloc(4);

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

/**
 * @see php/ext/standard/file.c
 */
char *bonzai_get_bytecode(char *filename) {
    /* TODO: CONVERT FROM PHP TO C
    if (empty(filename) || !file_exists(filename)) {
        php_error_docref(NULL TSRMLS_CC, E_NOTICE, "The file `%s` is invalid.");
    }

    if (!is_readable(filename)) {
        php_error_docref(NULL TSRMLS_CC, E_NOTICE, "The file `%s` is not readable.");
    }

    if (filesize(filename) == 0) {
        php_error_docref(NULL TSRMLS_CC, E_NOTICE, "The file `%s` is empty.");
    }
    */

    char *tmpname = tempnam('.', "BNZTMP");
    FILE *fh = fopen(tmpname, 'w');

    bcompiler_write_file(fh, filename);
    fclose(fh);

    char *content = file_get_contents(tmpname);
    unlink(tmpname);

    //content = bonzai_convert_to_hex(bonzai_gzcompress($content, 9)); // TODO: UNCOMMENT
    content = bonzai_base64_encode(bonzai_gzcompress($content, 9));

    return content;
}

/*
char *convert_to_hex(char *string) {
  char *hex;
  int i, len = strlen(string);

  for(i = 0; i < len; i++) {
    hex .= str_pad(dechex(ord(string[i])), 2, '0', STR_PAD_LEFT);
  }

  return strtoupper(hex);
}
*/

// {{{ bonzai_base64_encode
/**
 * @param  char *data
 * @return char *
 * @see php/ext/standard/base64.c
 */
char *bonzai_base64_encode(char *data) {
    unsigned char *result;
    int str_len = strlen(data), ret_length;

    result = php_base64_encode(data, str_len, &ret_length);

    return (char *)result;
}
// }}}

// {{{ bonzai_base64_decode
/**
 * @param  char *data
 * @return char *
 * @see php/ext/standard/base64.c
 */
char *bonzai_base64_decode(char *data) {
    unsigned char *result;
    int str_len = strlen(data), ret_length;

    result = php_base64_decode(data, str_len, &ret_length);

    return (char *)result;
}
// }}}

// {{{ bonzai_gzcompress
/**
 * @param  char *data
 * @return char *
 * @see php/ext/zlib/zlib.h
 */
char *bonzai_gzcompress(char *data) {
    return gzcompress(data, 9);
/*
    int data_len = strlen(data), status;
    long level = 9;
    unsigned long l2;
    char *data, *s2;

    l2 = data_len + (data_len / PHP_ZLIB_MODIFIER) + 15 + 1;
    s2 = (char *) emalloc(l2);
    if (!s2) {
        RETURN_FALSE;
    }

    status = compress2(s2, &l2, data, data_len, level);
    if (status == Z_OK) {
        s2 = erealloc(s2, l2 + 1);
        s2[l2] = '\0';
        RETURN_STRINGL(s2, l2, 0);
    } else {
        efree(s2);
        php_error_docref(NULL TSRMLS_CC, E_WARNING, "%s", zError(status));
        RETURN_FALSE;
    }
*/
}
// }}}

// {{{ bonzai_gzuncompress
/**
 * @param  char *data
 * @return char *
 * @see php/ext/zlib/zlib.h
 */
char *bonzai_gzuncompress(char *data) {
    return gzuncompress(data);
/*
    int data_len = strlen(data), status;
    unsigned int factor = 1, maxfactor = 16;
    long limit = 0;
    unsigned long plength = 0, length;
    char *data, *s1 = NULL, *s2 = NULL;

    plength = limit;

    do {
        length = plength ? plength : (unsigned long)data_len * (1 << factor++);
        s2 = (char *) erealloc(s1, length);
        status = uncompress(s2, &length, data, data_len);
        s1 = s2;
    } while ((status == Z_BUF_ERROR) && (!plength) && (factor < maxfactor));

    if (status == Z_OK) {
        s2 = erealloc(s2, length + 1);
        s2[ length ] = '\0';
        RETURN_STRINGL(s2, length, 0);
    } else {
        efree(s2);
        php_error_docref(NULL TSRMLS_CC, E_WARNING, "%s", zError(status));
        RETURN_FALSE;
    }
*/
}
// }}}

PHP_FUNCTION(bonzai_logo_guid)
{
	if (ZEND_NUM_ARGS() != 0) {
		WRONG_PARAM_COUNT;
	}

	RETURN_STRINGL(BONZAI_LOGO_GUID, sizeof(BONZAI_LOGO_GUID) - 1, 1);
}
