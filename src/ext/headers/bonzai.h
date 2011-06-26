/**
 *
 * BONZAI
 * (was phpGuardian)
 *
 * CODE NAME:      phoenix
 * ENGINE VERSION: 0.1
 * MODULE VERSION: 0.1
 *
 * URL:            http://bonzai.fabiocicerchia.it
 * E-MAIL:         bonzai@fabiocicerchia.it
 *
 * COPYRIGHT:      2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * LICENSE:        MIT or GNU GPL 2
 *                 The MIT License is recommended for most projects, it's simple
 *                 and  easy  to understand and it places almost no restrictions
 *                 on  what  you  can do with bonzai.
 *                 If  the  GPL  suits  your project better you are also free to
 *                 use bonzai under that license.
 *                 You   don't  have  to  do  anything  special  to  choose  one
 *                 license  or  the  other  and  you don't have to notify anyone
 *                 which   license   you   are   using.  You  are  free  to  use
 *                 bonzai  in  commercial  projects  as  long  as  the copyright
 *                 header is left intact.
 *                 <http://www.opensource.org/licenses/mit-license.php>
 *                 <http://www.opensource.org/licenses/gpl-2.0.php>
 **/

#ifndef PHP_BONZAI_H
    // {{{ DEFINES
    #define PHP_BONZAI_H
    #define PHP_BONZAI_VERSION "0.1"
    #define PHP_BONZAI_EXTNAME "bonzai"
    /*#define BONZAI_FOOTER_KEY "\n# PHPGUARDIAN P_KEY END BLOCK ##########"
    #define BONZAI_HEADER_KEY "# PHPGUARDIAN P_KEY START BLOCK ########\n"*/
    #define ZTS 1
    #define phpext_bonzai_ptr &bonzai_module_entry
    // }}}

    // {{{ STRUCTS
    extern zend_module_entry bonzai_module_entry;
    // }}}

    // {{{ METHODS
    PHP_MINIT_FUNCTION(bonzai);
    PHP_MSHUTDOWN_FUNCTION(bonzai);
    PHP_MINFO_FUNCTION(bonzai);

    PHP_FUNCTION(bonzai_exec);
    char *_pg_decode(char *code, char *key);
    char *_pg_get_key();
    PHP_FUNCTION(bonzai_info);
    PHP_FUNCTION(bonzai_credits);
    PHP_FUNCTION(bonzai_version);
    PHP_FUNCTION(bonzai_log);
    char *bonzai_base64_encode(char *data);
    PHP_FUNCTION(bonzai_logo_guid);
    // }}}
#endif /* PHP_BONZAI_H */
