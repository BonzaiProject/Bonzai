/**
 *        _            ____                     _ _             ____
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian HASH
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
 * $Id: core.c,v 1.4 2010-02-11 09:23:24 fabio Exp $
 **/

#ifndef _CORE_C
    // {{{ DEFINES
    #define _CORE_C
    // }}}

    // {{{ METHODS
    // {{{ char *pg_get_hash(char *text)
    /**
     * Generate the mixed hash
     * @param char *text
     * @return char *
     */
    char *pg_get_hash(char *text) {
        unsigned char *digest_sha1 = sha1_init(text);
        unsigned char *digest_md5 = md5_init(text);
        char *hex;

        int i;
        char *hash = (char *)malloc((80) * sizeof(char));
        (void)snprintf(hash, 80, "%s", "");
        for (i = 0; i < 20; i++) {
            hex = hex_char((unsigned int)digest_sha1[i]);
            strcat(hash, hex);
            free(hex);
            hex = hex_char((i > 15) ? (unsigned int)255 : (unsigned int)digest_md5[i]);
            strcat(hash, hex);
        }
        hash[80] = '\0';
        free(digest_sha1);
        free(digest_md5);
        free(hex);
        return hash;
    }
    // }}}

    // {{{ static unsigned char *sha1_init(char *text)
    /**
     * Init the SHA1
     * @param char *text
     * @return unsigned char *
     */
    static unsigned char *sha1_init(char *text) {
        SHA1_CTX context1;
        unsigned char *digest_sha1 = (unsigned char *)malloc(20 * sizeof(unsigned char));
        memset(digest_sha1, 0, sizeof(digest_sha1));

        SHA1Init(&context1);
        SHA1Update(&context1, (unsigned char *)text, (unsigned int)strlen(text));
        SHA1Final(digest_sha1, &context1);

        return digest_sha1;
    }
    // }}}

    // {{{ static unsigned char *md5_init(char *text)
    /**
     * Init the MD5
     * @param char *text
     * @return unsigned char *
     */
    static unsigned char *md5_init(char *text) {
        struct MD5Context context2;
        unsigned char *digest_md5 = (unsigned char *)malloc(16 * sizeof(unsigned char));
        memset(digest_md5, 0, sizeof(digest_md5));

        MD5Init(&context2);
        MD5Update(&context2, (unsigned char*)text, (unsigned int)strlen(text));
        MD5Final(digest_md5, &context2);

        return digest_md5;
    }
    // }}}

    // {{{ static char *hex_char(unsigned int character)
    /**
     * Convert to hex character
     * @param unsigned int character
     * @return char *
     */
    static char *hex_char(unsigned int character) {
        char *chr = (char *)malloc(2 * sizeof(char));
        (void)snprintf(chr, 2, "%02X", character);

        return chr;
    }
    // }}}
    // }}}
#endif /* _CORE_C */
