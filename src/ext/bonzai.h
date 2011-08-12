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

#ifndef PHP_BONZAI_H

    // {{{ DEFINES
    //#define ZTS 1 // ???
    #define PHP_BONZAI_H
    #define PHP_BONZAI_VERSION "0.1"
    #define PHP_BONZAI_EXTNAME "Bonzai"
    #define SAPI_BONZAI_VERSION_HEADER "X-Encoded-By: Bonzai v" BONZAI_VERSION
    #define phpext_bonzai_ptr &bonzai_module_entry
#ifdef ZTS
    #define BONZAIG(v) TSRMG(bonzai_globals_id, zend_bonzai_globals *, v)
#else
    #define BONZAIG(v) (bonzai_globals.v)
#endif

    #define CHECK_BYTECODE(cond) { if (cond) { php_error_docref(NULL TSRMLS_CC, E_WARNING, "The compiled code is invalid."); RETURN_NULL(); } }
    #define CHECK_FILE(cond, message, filename) { if (cond) { php_error_docref(NULL TSRMLS_CC, E_NOTICE, message, filename); RETURN_NULL(); } }
    #define CHECK_COMPILING(cond, filename) { if (cond) { php_error_docref(NULL TSRMLS_CC, E_COMPILE_ERROR, "The file `%s` cannot be compiled.", filename); RETURN_NULL(); } }
    // }}}

#ifdef HAVE_CONFIG_H
    #include "config.h"
#endif

    #include <fcntl.h>
    #include <stdbool.h>
    #include <string.h>
    #include <sys/stat.h>
    #include <sys/types.h>
    #include "php.h"
    #include "SAPI.h"
#ifdef ZTS
    #include "TSRM.h"
#endif
    #include "zend_extensions.h"
    #include "ext/pcre/php_pcre.h"
    #include "ext/standard/base64.h"
    #include "ext/standard/css.h"
    #include "ext/standard/file.h"
    #include "ext/standard/head.h"
    #include "ext/standard/html.h"
    #include "ext/standard/php_var.h"
    #include "ext/standard/sha1.h"
    #include "../../main/php_streams.h"
    #include "../../TSRM/tsrm_virtual_cwd.h"
    #include "logos.h"

    // {{{ STRUCTS
    extern zend_module_entry bonzai_module_entry;
    // }}}

    // {{{ METHODS
    PHP_MINIT_FUNCTION(bonzai);
    PHP_MSHUTDOWN_FUNCTION(bonzai);
    PHP_MINFO_FUNCTION(bonzai);

    PHP_FUNCTION(bonzai_credits);
    PHP_FUNCTION(bonzai_exec);
    PHP_FUNCTION(bonzai_get_bytecode);
    PHP_FUNCTION(bonzai_info);
    PHP_FUNCTION(bonzai_logo_guid);
    PHP_FUNCTION(bonzai_version);

    char *bonzai_base64_decode(char *data);
    char *bonzai_base64_encode(char *data);
    void file_put_binary(char *filename, char *content);
    int filesize(char *filename);
    unsigned int hex2int(char *value);
    bool regexp_match(char *regexp, char *string);
    char *sha1(char *string);
    // }}}

#endif /* PHP_BONZAI_H */
