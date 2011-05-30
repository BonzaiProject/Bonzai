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

#ifndef MD5_H
    #define MD5_H

    // {{{ INCLUDES
    #include "../headers/shared.h"
    // }}}

    #ifdef __alpha
        typedef unsigned int uint32;
    #else
        typedef unsigned long uint32;
    #endif

    struct MD5Context {
        /*@reldef@*/ uint32 buf[4];
        /*@reldef@*/ uint32 bits[2];
        /*@reldef@*/ unsigned char in[64];
    };

    void MD5Init(struct MD5Context *context);
    void MD5Update(struct MD5Context *context, unsigned char const *buf, unsigned len);
    void MD5Final(unsigned char *digest, struct MD5Context *context);
    static void MD5Transform(uint32 *buf, uint32 const *in);

    /*
     * This is needed to make RSAREF happy on some MS-DOS compilers.
     */
    typedef struct MD5Context MD5_CTX;
#endif /* !MD5_H */