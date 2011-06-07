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
 * $Id$
 **/

/**
 *
 * @category  Security
 * @package   phpGuardian
 * @version   4.0
 * @author    Fabio Cicerchia <info@phpguardian.org>
 * @copyright 2006-2011 Fabio Cicerchia
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt GNU GPL 3.0
 * @link      http://www.phpguardian.org
 */
class PG_Decoder
{
    // {{{ METHODS
    // {{{ function elaborate
    /**
     *
     * @access public
     * @param  array        $element
     * @throws PG_Exception
     * @return void
     */
    public function elaborate($element)
    {
        if (!is_array($element) || empty($element)) {
            throw new PG_Exception('The element is invalid'); // TODO: NON BLOCKER
        }

        // Get the filename
        $filename = $element['FILE'];

        // Print a message
        PG_Utils::pg_message('Start decoding file `%s\'.', false, $filename);

        // Get the content
        $content = PG_Utils::getFileContent($filename);

        // Increase the total originary bytes
        PG_Registry::getInstance()->append('total_orig_bytes', strlen($content), PG_Registry::INTEGER_APPEND); // TODO: too long

        // Decode the content
        $decoded_content = $this->codeDecrypt($content);

        // If the decoded data isn't empty
        if (empty($decoded_content)) {
            // Set the file as skipped
            PG_Registry::getInstance()->append('skipped_files', $filename, PG_Registry::ARRAY_APPEND); // TODO: too long

            // Print a message
            PG_Utils::pg_message('ERROR: The decoded data is empty.', false);
            return;
        }

        PG_Utils::rename_file($filename);

        $decoded_filename = $this->getDecodedFilename($filename);

        // Print a message
        PG_Utils::pg_message('Saving %s bytes...', true, strlen($decoded_content)); // TODO: too long

        // Save the file
        PG_Utils::putFileContent($decoded_filename, $decoded_content);
    }
    // }}}

    // {{{ function codeDecrypt
    // TODO: cyclomatic complex: 7
    /**
     *
     * @access protected
     * @param  string       $data
     * @throws PG_Exception
     * @return string
     */
    protected function codeDecrypt($data)
    {
        if (empty($data)) {
            throw new PG_Exception('Cannot parse an empty data'); // TODO: NON BLOCKER
        }

        $data_len = strlen($data);
        $key_len  = strlen(PG_Script_Parser::$config['KEY']['KEY_HASH']);

        // Increase file counter
        PG_Registry::getInstance()->append('total_files', 1, PG_Registry::INTEGER_APPEND); // TODO: too long

        // Check key size
        if ($key_len == 0) {
            throw new PG_Exception('Skipped because the private key is empty.'); // TODO: NON BLOCKER
        }

        // Check if is a phpguardian file
        $start = strpos($data, 'phpg_exec(\'', 0);
        $end   = strpos($data, '\')', $start);
        if ($start == -1 || $end == -1) {
            throw new PG_Exception('Skipped because isn\'t a phpguardian file.'); // TODO: NON BLOCKER
        }
        $start += 11;

        // Get the encoded data
        $tmpdata  = substr($data, $start, $end - $start);
        $data_len = $end - $start;

        // TODO: THIS NEED CHANGES
        if (strlen($tmpdata) == $data_len && (($data_len % 2) != 0)) {
            $data_len--;
        }

        // Print a message
        PG_Utils::pg_message('Decoding %s bytes...', true, $data_len);

        // Decrypt the data
        $crdata = $this->cycleDecrypt($tmpdata, $key_len, $data_len);

        // Increase the total generated bytes
        PG_Registry::getInstance()->append('total_generated_bytes', strlen($crdata), PG_Registry::INTEGER_APPEND); // TODO: too long

        // Print a message
        PG_Utils::pg_message('Restored %s bytes.', true, strlen($crdata));

        return $crdata;
    }
    // }}}

    // {{{ function cycleDecrypt
    /**
     *
     * @access protected
     * @param  string       $string
     * @param  integer      $key_len
     * @param  integer      $data_len
     * @throws PG_Exception
     * @return string
     */
    protected function cycleDecrypt($string, $key_len, $data_len)
    {
        if (empty($string)) {
            throw new PG_Exception('Cannot parse an empty data'); // TODO: NON BLOCKER
        }

        // Init the container string
        $crdata = '';

        // Decode it
        for($i = 0, $j = 0; $i < $data_len; $i += 2, $j++) {
            $enc_char = substr($string, $i, 2);
            $crdata  .= $this->decodeChar($enc_char, PG_Script_Parser::$config['KEY']['KEY_HASH'][$j % $key_len]); // TODO: too long
        }

        return $crdata;
    }
    // }}}

    // {{{ function decodeChar
    /**
     *
     * @access protected
     * @param  string    $characters
     * @param  string    $key
     * @return string
     */
    protected function decodeChar($characters, $key)
    {
        return chr(hexdec($characters) ^ ord($key));
    }
    // }}}

    // {{{ function getDecodedFilename
    /**
     *
     * @access protected
     * @param  string    $filename
     * @return string
     */
    protected function getDecodedFilename($filename)
    {
        if (PG_Script_Parser::$config['CONFIGURATION']['SAVE_DECODED_AS_NEW']) {
            return "$filename.decoded";
        }

        return $filename;
    }
    // }}}
    // }}}
}
