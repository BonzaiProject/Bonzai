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
 * $Id: core.c,v 1.4 2010-02-11 09:23:24 fabio Exp $
 **/

#ifndef _UTILITY_C
    // {{{ DEFINES
    #define _UTILITY_C
    // }}}

    // {{{ METHODS
    // {{{ bool is_equal(char* a, char* b)
    /**
     * Compare if two string are equals
     * @params char *a
     * @params char *b
     * @return bool
     */
    bool is_equal(char* a, char* b) {
        return strcmp(a, b) == 0;
        
    }
    // }}}
    
    // {{{ char *str_replace(char *search, char *replace, char *subject)
    /**
     * Replace string with another
     * @params char *search
     * @params char *replace
     * @params char *subject
     * @return char *
     */
    char *str_replace(char *search, char *replace, char *subject) {
        if (search == NULL || SLEN(search) == 0 || replace == NULL || subject == NULL || SLEN(subject) == 0) {
            return subject;
        }

        char *part1 = NULL, *part2 = NULL;//(char *)malloc(0);
        size_t len;

        while (strstr(subject, search)) {
            part1 = strstr(subject, search);
            len = (part2 != NULL) ? strlen(part2) : 0;
            strncpy(part2 + len, subject, (size_t)(part1 - subject));
            strcat(part2, replace);
            part1 += strlen(search);
            subject = part1;
        }
        return strcat(part2, part1);
    }
    // }}}

    // {{{ unsigned int hex2int(char *value)
    /**
     * Convert hex value to int
     * @params char *value
     * @return unsigned int
     */
    unsigned int hex2int(char *value) {
        int i, ch, value_len = SLEN(value);
        unsigned int int_value = 0;

        for (i = 0; i < value_len; i++) {
            ch = (int)value[i];
            
            if (ch >= 48 && ch <= 57)       ch = ch - 48; // From 0 to 9
            else if (ch >= 65 && ch <= 70)  ch = ch - 55; // From A to F
            else if (ch >= 97 && ch <= 102) ch = ch - 87; // From a to f
            else return int_value;
            
            int_value = (int_value << 4) + ch;
        }
        return int_value;
    }
    // }}}

    // {{{ char *int2hex(unsigned int value)
    /**
     * Convert int value to hex
     * @params unsigned int value
     * @return char *
     */
    char *int2hex(unsigned int value) {
        const char *hex_map = "0123456789ABCDEF";
        int i;
        char *buf = (char *)malloc(2 * sizeof(char));
        memset(buf, 0, sizeof(buf));

        for (i = 0; i < 2; i++) {
            buf[1 - i] = hex_map[value & 0xf];
            value = value >> 4;
        }
        return buf;
    }
    // }}}

    // {{{ char *file_get_content(char *filename)
    /**
     * Get the content of file
     * @params char *filename
     * @return char *
     */
    char *file_get_content(char *filename) {
        FILE *fp;
        (void)stat(filename, &filestats);
        if ((int)filestats.st_size >= 0) {
            char *content = (char *)malloc((size_t)(filestats.st_size + 1) * sizeof(char));
            memset(content, 0, sizeof(content));

            fp = fopen(filename, "r");
            (void)fread(content, 1, (size_t)filestats.st_size, fp);
            (void)fclose(fp);
            content[filestats.st_size] = '\0';
            return content;
        }
        
        return NULL;
    }
    // }}}

    // {{{ void file_put_content(char *filename, char *data, char *header, char *footer)
    /**
     * Save content into file
     * @params char *filename
     * @params char *data
     * @params char *header
     * @params char *footer
     * @return void
     */
    void file_put_content(char *filename, char *data, char *header, char *footer) {
        FILE *fp = fopen(filename, "w+");
        
        if (!is_equal(header, "")) (void)fwrite(header, 1, strlen(header), fp);
        (void)fwrite(data, 1, strlen(data), fp);
        if (!is_equal(footer, "")) (void)fwrite(footer, 1, strlen(footer), fp);
        (void)fclose(fp);
    }
    // }}}

    // {{{ char **explode(char *separator, char *string)
    /**
     * Split a string into an array
     * @params char *separator
     * @params char *string
     * @return char **
     */
    char **explode(char *separator, char *string) {
        int occurrences = count_occurrence(string, separator);

        char **tokens = (char **)malloc(occurrences * sizeof(char *));
        int i = 0, co = 0, last = 0, len = SLEN(separator);
        char *tmp = (char *)malloc(len * sizeof(char));
        memset(tmp, 0, sizeof(tmp));
        while (string[i] != '\0') {
            strncpy(tmp, string + i, (size_t)len);
            tmp[len] = '\0';
            if (is_equal(tmp, separator)) {
                tokens[co] = (char *)malloc((1 + (i - last)) * sizeof(char));
                memset(tokens[co], 0, sizeof(tokens[co]));
                strncpy(tokens[co], string + last, (size_t)(i - last));
                tokens[co][i - last] = '\0';
                last = i + len;
                co++;
            }
            i++;
        }
        free(tmp);
        tokens[co] = (char *)malloc((1 + (i - last)) * sizeof(char));
        memset(tokens[co], 0, sizeof(tokens[co]));
        strncpy(tokens[co], string + last, (size_t)(i - last));
    //    tokens[co][i - last] = '\0';

        return tokens;
    }
    // }}}

    // {{{ int count_occurrence(char *string, char *substring)
    /**
     * Count the occurrence of a substring into a string
     * @params char *string
     * @params char *substring
     * @return int
     */
    int count_occurrence(char *string, char *substring) {
        int i, occurrences = 0, substring_len = SLEN(substring), string_len = SLEN(string);
        char *tmp = (char *)malloc(substring_len * sizeof(char));
        for (i = 0; i < string_len; i++) {
            strncpy(tmp, string + i, (size_t)substring_len);
            tmp[substring_len] = '\0';
            if (is_equal(tmp, substring)) occurrences++;
        }
        free(tmp);
        return occurrences;
    }
    // }}}

    // {{{ int strpos(char *string, char *substring, int start)
    /**
     * Find the position of a substring into a string
     * @params char *string
     * @params char *substring
     * @params int start
     * @return int
     */
    int strpos(char *string, char *substring, int start) {
        int pos = 0, string_len = SLEN(string);
        char *tmp = (char *)malloc(((string_len - start) + 1) * sizeof(char));

        tmp = strncpy(tmp, string + start, (size_t)(string_len - start));
        tmp[string_len - start] = '\0';

        char *dest = strstr(tmp, substring);
        pos = (dest - tmp) + start;
        //pos += start;
        free(tmp);
        return ((pos < 0) ? -1 : pos);
    }
    // }}}

    // {{{ char *lower(char *string)
    /**
     * Lowercase a string
     * @params char *string
     * @return char *
     */
    char *lower(char *string) {
        int i, string_len = SLEN(string);
        
        if (string_len > 0) {
            char *str_lower = (char *)malloc((string_len + 1) * sizeof(char));
            strcpy(str_lower, string);
            for (i = 0; i < string_len; i++) str_lower[i] = tolower(string[i]);
            free(string);
            return str_lower;
        }
        
        return string;
    }
    // }}}

    // {{{ char *upper(char *string)
    /**
     * Uppercase a string
     * @params char *string
     * @return char *
     */
    char *upper(char *string) {
        int i, string_len = SLEN(string);
        
        if (string_len > 0) {
            char *str_upper = (char *)malloc((string_len + 1) * sizeof(char));
            strcpy(str_upper, string);
            for (i = 0; i < string_len; i++) str_upper[i] = toupper(string[i]);
            free(string);
            return str_upper;
        }
        
        return string;
    }
    // }}}

    // {{{ int get_size(char *filename)
    /**
     * Get the file size
     * @params char *filename
     * @return int
     */
    int get_size(char *filename) {
        if (stat(filename, &filestats) == 0) return (int)filestats.st_size;
        return 0;
    }
    // }}}

    // {{{ char *read_process(char *process)
    /**
     * Get the output of a process
     * @params char *process
     * @return char *
     */
    char *read_process(char *process) {
        FILE *fp;
        int size = 2;

        char *source = (char *)malloc(size * sizeof(char));
        memset(source, 0, sizeof(source));

        fp = popen(process, "r");

        char *tmp = (char *)malloc(size * sizeof(char));

        while(fgets(tmp, 2, fp) != NULL) {
            strcat(source, tmp);
            source = (char *)realloc(source, ++size * sizeof(char));
        }
        source[SLEN((source)] = '\0';
        pclose(fp);
        free(tmp);

        return source;
    }
    // }}}

    /*
    void scan(char *path) {
        DIR *fd;
        struct dirent *file;
        struct stat stat_buffer;

        char new_path[500];

        if ((fd = opendir(path)) == NULL) perror("Error");

        while ((file = readdir(fd)) != NULL) {
            lstat(file->d_name, &stat_buffer);

            if (S_ISDIR(stat_buffer.st_mode)) {
                if (strcmp(".", file->d_name) == 0 || strcmp("..", file->d_name) == 0)
                    continue;

                // costruisco il nuovo path
                sprintf(new_path, "%s/%s", path, file->d_name);
                // modifico la stampa anche col path
                printf(" - PATH: %s\n", new_path);
                // lancio lo scan col nuovo path
                if (file->d_type == DT_DIR)
                    scan(new_path);
            }
        }
        closedir(fd);
    }
    //static int pg_file_parse(const struct dirent *entry) {
    //
    //    int len = strlen(current_dir);
    //    int len_curr = strlen((char *)entry->d_name);
    //    char *full_path = (char *)malloc((len + len_curr + 1) * sizeof(char));
    //    memset(full_path, '\0', sizeof(full_path));
    //    strcat(full_path, current_dir);
    //    strcat(full_path, "/");
    //
    //    if (entry->d_type == DT_DIR) {
    //        if (strcmp(entry->d_name, ".") != 0 && strcmp(entry->d_name, "..") != 0) {
    //            printf("DIR: %s%s\n", full_path, entry->d_name);
    //            //walkdir(full_path, (char *)entry->d_name);
    //
    //            strcat(full_path, entry->d_name);
    //            current_dir = full_path;
    //            struct dirent **namelist;
    //            scandir(full_path, &namelist, pg_file_parse, alphasort);
    //        }
    //    } else {
    //        printf("FILE: %s%s\n", full_path, entry->d_name);
    //    }
    //    return 0;
    //}

    // {{{ void walkdir
    **
     * File / Directory parser for encoding / decoding
     * @param char *filename
     *
    void walkdir(char *path) {
        scan(path);
    //    struct dirent **namelist;
    //    current_dir = path;
    //
    //    char *full_path = (char *)malloc((strlen(path) + strlen(name) + 1) * sizeof(char));
    //    memset(full_path, '\0', sizeof(full_path));
    //    strcat(full_path, path);
    //    if (path[strlen(path) - 1] != '/') {
    //        strcat(full_path, "/");
    //    }
    //    if (strcmp(name, "") != 0) {
    //        strcat(full_path, name);
    //    }
    //
    //    printf("FULL: %s\n", full_path);
    //
    //    scandir(full_path, &namelist, pg_file_parse, alphasort);
    //    free(namelist);
    //    free(full_path);


    //    int i = 0, n = scandir(filename, &namelist, pg_file_parse, alphasort);
    //    char **dir_list = (char **)malloc(20 * sizeof(char *));
    //    while (--n > 0) {
    //        if (namelist[n]->d_type == DT_DIR) {
    //            if (strcmp((char *)namelist[n]->d_name, ".") != 0 && strcmp((char *)namelist[n]->d_name, "..") != 0) {
    //                printf("> %s/%s\n", filename, (char *)namelist[n]->d_name);
    //
    //                int len = strlen(filename);
    //                int len_curr = strlen((char *)namelist[n]->d_name);
    //
    //                dir_list[i] = (char *)malloc((len + len_curr + 2) * sizeof(char));
    //                memset(dir_list[i], '\0', sizeof(dir_list[i]));
    //                strcat(dir_list[i], filename);
    //                strcat(dir_list[i], "/");
    //                strcat(dir_list[i], namelist[n]->d_name);
    //                i++;
    //                //printf("FUNZA..\n");
    //                //while (--n2 > 0) {
    //                //    printf("- %s/%s\n", filename, (char *)namelist[n2]->d_name);
    //                //}
    //                // Non va in ricorsione!
    //                //walkdir(full_dir, 0);
    //            }
    //        } else {
    //            printf("* %s/%s\n", filename, (char *)namelist[n]->d_name);
    //            //pg_parser(namelist[n]->d_name);
    //        }
    //    }
    //    free(namelist);
    //
    //    while (i-- > 0) {
    //        printf("POST: %s\n", dir_list[i]);
    //        walkdir(dir_list[i], 0);
    //    }
    }
    // }}}
    */

    // {{{ void multi_free(void *__ptr, ...)
    /**
     * Free more than one resource
     * @params void *__ptr
     * @params mixed ...
     * @return void
     */
    void multi_free(/*@only@*/ void *__ptr, ...) {
        va_list vp;
        va_start(vp, __ptr);

        free(__ptr);
        __ptr = va_arg(vp, void *);
        while(__ptr != NULL) {
            free(__ptr);
            __ptr = va_arg(vp, void *);
        }

        va_end(vp);
    }
    // }}}
    // }}}
#endif /* _UTILITY_C */