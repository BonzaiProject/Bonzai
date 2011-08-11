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

#include "bonzai.h"

#ifdef PHP_WIN32
    #define PHP_ZLIB_MODIFIER 100
#else
    #define PHP_ZLIB_MODIFIER 1000
#endif
    #define Z_OK            0
    #define Z_BUF_ERROR    (-5)

#pragma pack(1)

static function_entry bonzai_functions[] = {
    PHP_FE(bonzai_exec, NULL)
    PHP_FE(bonzai_info, NULL)
    PHP_FE(bonzai_credits, NULL)
    PHP_FE(bonzai_version, NULL)
    PHP_FE(bonzai_get_bytecode, NULL)
    {NULL, NULL, NULL}
};

zend_module_entry bonzai_module_entry = {
#if ZEND_MODULE_API_NO >= 20050922
    STANDARD_MODULE_HEADER_EX,
    NULL,
    NULL,
#else
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

// {{{ PHP_MINIT_FUNCTION
PHP_MINIT_FUNCTION(bonzai) {
    php_register_info_logo(BONZAI_LOGO_GUID, "image/gif", bonzai_logo, sizeof(bonzai_logo));

    REGISTER_STRING_CONSTANT("BONZAI_VERSION", PHP_BONZAI_VERSION, CONST_CS | CONST_PERSISTENT);

    return SUCCESS;
}
// }}}

// {{{ PHP_MSHUTDOWN_FUNCTION
PHP_MSHUTDOWN_FUNCTION(bonzai) {
    return SUCCESS;
}
// }}}

// {{{ PHP_MINFO_FUNCTION
PHP_MINFO_FUNCTION(bonzai) {
    php_info_print_table_start();
    php_info_print_table_row(2, "Bonzai support", "enabled");
    php_info_print_table_row(2, "Bonzai version", PHP_BONZAI_VERSION);
    php_info_print_table_end();
}
// }}}

// FUNCTION FOR PUBLIC USE

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

// {{{ PHP_FUNCTION bonzai_exec
/**
 * Execute an encoded source
 */
PHP_FUNCTION(bonzai_exec)
{
    FILE *fp;
    char *code, *plain, *tmpname = "BNZTMP2";
    char hex[2];
    int code_len, i, len, res;
    struct stat finfo;
    unsigned int chr;
	zend_op_array *op_array;

    if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "s", &code, &code_len) == FAILURE) {
        RETURN_NULL();
    }

    plain = bonzai_base64_decode(code);
    len   = strlen(plain);

    fp = fopen(tmpname, "wb");
    for(i = 0; i < len; i += 2) {
        strncpy(hex, plain + i, 2);
        hex[2] = '\0';

        chr = hex2int((char *)hex);
        fputc(chr, fp);
    }
    fclose(fp);

    stat(tmpname, &finfo);
    fp  = fopen(tmpname, "rb");
    res = fread(&op_array, sizeof(op_array), 1, fp);
    fclose(fp);

	zend_execute(op_array TSRMLS_CC);

    unlink(tmpname);

#ifdef ZEND_ENGINE_2
	destroy_op_array(op_array TSRMLS_CC);
#else
	destroy_op_array(op_array);
#endif
	efree(op_array);

    efree(plain);
}
// }}}

// {{{ PHP_FUNCTION bonzai_get_bytecode
/**
 * @see php/ext/standard/file.c
 */
PHP_FUNCTION(bonzai_get_bytecode)
{
    FILE *fp;
    char *filename, *real_path, *content, *base64, *tmpname = "BNZTMP";
    char hex[2];
    int filename_len, i = -1;
    php_stream *stream;
    struct stat finfo;
	zend_file_handle file_handle = {0};
	zend_op_array *op_array = NULL;

    if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "s", &filename, &filename_len) == FAILURE) {
        RETURN_NULL();
    }

    if (strlen(filename) == 0 || VCWD_ACCESS(filename, F_OK) == -1) {
        php_error_docref(NULL TSRMLS_CC, E_NOTICE, "The file `%s` is invalid.", filename);
        RETURN_NULL();
    }

    if (VCWD_ACCESS(filename, R_OK) == -1) {
        php_error_docref(NULL TSRMLS_CC, E_NOTICE, "The file `%s` is not readable.", filename);
        RETURN_NULL();
    }

    stat(filename, &finfo);
    if (finfo.st_size == 0) {
        php_error_docref(NULL TSRMLS_CC, E_NOTICE, "The file `%s` is empty.", filename);
        RETURN_NULL();
    }

	real_path = expand_filepath(filename, NULL TSRMLS_CC);
	if (!real_path) {
		RETURN_FALSE;
	}

	file_handle.filename      = real_path;
	file_handle.free_filename = 0;
	file_handle.type          = ZEND_HANDLE_FILENAME;
	file_handle.opened_path   = NULL;
	CG(zend_lineno) = 0;

	op_array = zend_compile_file(&file_handle, ZEND_INCLUDE TSRMLS_CC);
	zend_destroy_file_handle(&file_handle TSRMLS_CC);

	if (!op_array) {
		efree(real_path);
        return;
	}

    fp = fopen(tmpname, "wb");
    fwrite(&op_array, sizeof op_array, 99999, fp); // TODO: calculate the size of zend_op_array
    fclose(fp);

    stat(tmpname, &finfo);
    content = (char *)malloc((finfo.st_size * 2) * sizeof(char));
    fp = fopen(tmpname, "rb");
    while (++i < finfo.st_size) {
        sprintf(hex, "%02X", fgetc(fp));
        hex[2] = '\0';
        strcat(content, (char *)hex);
    }
    fclose(fp);

    base64 = bonzai_base64_encode(content);

    unlink(tmpname);

    RETURN_STRING(base64, 1);

#ifdef ZEND_ENGINE_2
	destroy_op_array(op_array TSRMLS_CC);
#else
	destroy_op_array(op_array);
#endif
	efree(op_array);

    efree(base64);
    efree(content);
}
// }}}

// {{{ PHP_FUNCTION bonzai_info
/**
 * Print informations about bonzai extension
 */
PHP_FUNCTION(bonzai_info)
{
    char temp_api[10];

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

// {{{ PHP_FUNCTION bonzai_logo_guid
PHP_FUNCTION(bonzai_logo_guid)
{
	if (ZEND_NUM_ARGS() != 0) {
		WRONG_PARAM_COUNT;
	}

	RETURN_STRINGL(BONZAI_LOGO_GUID, sizeof(BONZAI_LOGO_GUID) - 1, 1);
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

// FUNCTION FOR INTERNAL USE ONLY

// {{{ bonzai_base64_decode
/**
 * @param  char *data
 * @return char *
 * @see php/ext/standard/base64.c
 */
char *bonzai_base64_decode(char *data) {
    int str_len = strlen(data), ret_length;
    unsigned char *result;

    return (char *)php_base64_decode(data, str_len, &ret_length);
}
// }}}

// {{{ bonzai_base64_encode
/**
 * @param  char *data
 * @return char *
 * @see php/ext/standard/base64.c
 */
char *bonzai_base64_encode(char *data) {
    int str_len = strlen(data), ret_length;
    unsigned char *result;

    return (char *)php_base64_encode(data, str_len, &ret_length);
}
// }}}

// {{{ hex2int
/**
 * @param  char *value
 * @return unsigned int
 */
unsigned int hex2int(char *value) {
    int i, ch, value_len = strlen(value);
    unsigned int int_value = 0;

    for (i = 0; i < value_len; i++) {
        ch = (int)value[i];
        if      (ch >= 48 && ch <= 57)  ch = ch - 48; // From 0 to 9
        else if (ch >= 65 && ch <= 70)  ch = ch - 55; // From A to F
        else if (ch >= 97 && ch <= 102) ch = ch - 87; // From a to f
        else return int_value;
        int_value = (int_value << 4) + ch;
    }
    return int_value;
}
// }}}
