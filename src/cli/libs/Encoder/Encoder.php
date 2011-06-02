<?php
/**
 *        _            ____                     _ _             ____
 *  _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \
 * | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
 * | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/
 * | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
 * |_|         |_| phpGuardian CLI
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
 * $Id: $
 **/

/**
 *
 * @category  Security
 * @package   phpGuardian
 * @version   4.0
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Fabio Cicerchia
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt GNU General Public License 3.0
 * @link      http://www.phpguardian.org
 */
class PG_Encoder {
    /**
     *
     * @access public
     * @param  array $element
     */
    public function elaborate($element) {
        if (!is_array($element) || empty($element)) {
            throw new PG_Exception('The element is invalid'); // TODO: NON BLOCKER
        }

        // Get the filename
        $filename = $element['FILE'];

        // Print a message
        PG_Utils::pg_message("Start encoding file `%s'.", false, filename);

        // Get the content
        $file_content = PG_Utils::getFileContent($filename);

        // Convert the content
        $converted_content = PG_Converter::convert($file_content, PG_Script_Parser::$config['SETUP']['USE_ASP_TAGS']);

        $encoded_content = $this->pgCodeCrypt($converted_content);

        if (empty($encoded_content)) {
            // Set the file as skipped
            PG_Registry::getInstance()->append('skipped_files', $filename, PG_Registry::ARRAY_APPEND);

            // Print a message
            PG_Utils::pg_message("ERROR: The encoded data is empty.", false);
            return;
        }

        PG_Utils::rename_file($filename);
        $encoded_filename = $this->getEncodedFilename($filename);

        // Print a message
        PG_Utils::pg_message("Saving %s bytes...", true, strlen($encoded_content));

        // Save the file
        PG_Utils::putFileContent($encoded_filename, $encoded_content . get_header($element, get_inner()) . getFooter($element));
    }

    protected function pgCodeCrypt($data) {
        if (empty($data)) {
            // Print a message
            PG_Utils::pg_message("ERROR: The converted data is empty.", false);

            return null;
        }

        $data_len = strlen($data);
        $key_len  = strlen(PG_Script_Parser::$config['KEY']['KEY_HASH']);

        // Increase file counter
        PG_Registry::getInstance()->append('total_files', 1, PG_Registry::INTEGER_APPEND);

        // Check key size
        if ($key_len == 0) {
            PG_Utils::pg_message("ERROR: Skipped because the private key is empty.", false);
            return "";
        }

        // Print a message
        PG_Utils::pg_message("Encoding %d bytes...", true, $data_len);

        // Encrypt the data
        $crdata = $this->pgCycleEncrypt($data, $data_len, $key_len);

        // Increase the total generated bytes
        PG_Registry::getInstance()->append('total_generated_bytes', strlen($crdata), PG_Registry::INTEGER_APPEND);

        // Print a message
        PG_Utils::pg_message("Generated %s bytes.", true, strlen($crdata));

        return $crdata;
    }

    protected function pgCycleEncrypt($string, $key_len, $data_len) {
        if (empty($string)) {
            throw new PG_Exception('Cannot parse an empty data'); // TODO: NON BLOCKER
        }

        // Init the container string
        $crdata = '';

        // Encode the data
        for($i = 0; $i < $data_len; $i++) {
            $crdata .= $this->encodeChar($string[$i], PG_Script_Parser::$config['KEY']['KEY_HASH'][$i % $key_len]);
        }

        return $crdata;
    }

    protected function encodeChar($character, $key) {
        return int2hex(ord($character) ^ ord($key));
    }

    protected function getInner() {
        $PHPG_LIBRARY_STRING        = ''; // TODO: need include this from .h
        $PG_S_BASE_LIB_PATH         = ''; // TODO: need include this from .h
        $PHPG_EXTENSION_STRING      = ''; // TODO: need include this from .h
        $PG_S_EXTENSION_MODULE_PATH = ''; // TODO: need include this from .h

        if (PG_Script_Parser::$config['SETUP']['USE_PHP_EXTENSION']) {
            return $PHPG_EXTENSION_STRING . $PG_S_EXTENSION_MODULE_PATH; // TODO: MISSING STRINGS
        }

        return $PHPG_LIBRARY_STRING . $PG_S_BASE_LIB_PATH; // TODO: MISSING STRINGS
    }

    protected function getHeader($element, $inner) {
        $header = "<" . "?php\n\n" . $element['HEADER'] . $inner;
        if ($element['HEADER'] == PG_Script_Parser::$config['CONFIGURATION']['HEADER']) {
            $header = "<" . "?php\n\n" . PG_Script_Parser::$config['CONFIGURATION']['HEADER'] . $inner;
        }

        return $header;
    }

    protected function getFooter($element) {
        $footer = "');\n" . $element['FOOTER'] . "\n?" . ">";
        if ($element['FOOTER'] == PG_Script_Parser::$config['CONFIGURATION']['FOOTER']) {
            $footer = "');\n" . PG_Script_Parser::$config['CONFIGURATION']['FOOTER'] . "\n?" . ">";
        }

        return $footer;
    }

    protected function getEncodedFilename($filename) {
        if (PG_Script_Parser::$config['CONFIGURATION']['SAVE_ENCODED_AS_NEW']) {
            return $filename . ".encoded";
        }

        return $filename;
    }

    protected function pgCreateFileKey() {
        if (empty(PG_Script_Parser::$config['KEY']['KEY_FILE'])) {
            PG_Script_Parser::$config['KEY']['KEY_FILE'] = "key.pgk";
        }

        PG_Utils::pg_message("Saving key (%s bytes) into file `%s'.", true, strlen(PG_Script_Parser::$config['KEY']['KEY_HASH']), PG_Script_Parser::$config['KEY']['KEY_FILE']);

        @unlink(PG_Script_Parser::$config['KEY']['KEY_FILE']);
        //file_put_content(PG_S_KEY_FILE, PG_S_KEY_HASH, PHPG_HEADER_KEY, PHPG_FOOTER_KEY);

        if (!is_writable(PG_Script_Parser::$config['KEY']['KEY_FILE'])) {
            throw new PG_Exception('The file `' . PG_Script_Parser::$config['KEY']['KEY_FILE'] . '` cannot be written'); // TODO: BLOCKER ?
        }
        file_put_content(PG_Script_Parser::$config['KEY']['KEY_FILE'], PG_Script_Parser::$config['KEY']['KEY_HASH'], "", "");
    }
}
