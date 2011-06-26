<?php
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

/**
 *
 * @category  Security
 * @package   Bonzai
 * @version   0.1
 * @author    Fabio Cicerchia <info@fabiocicerchia.it>
 * @copyright 2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @license   http://www.opensource.org/licenses/gpl-2.0.php     GNU GPL 2
 * @link      http://bonzai.fabiocicerchia.it
 */

class Bonzai_Decoder
{
    // {{{ METHODS
    // {{{ function elaborate
    /**
     *
     * @access public
     * @param  array        $element
     * @throws Bonzai_Exception
     * @return void
     */
    public function elaborate($element)
    {
        if (!is_array($element) || empty($element)) {
            throw new Bonzai_Exception('The element is invalid'); // TODO: NON BLOCKER
        }

        // Get the filename
        $filename = $element['FILE'];

        // Print a message
        Bonzai_Utils::bonzai_message('Start decoding file `%s\'.', false, $filename);

        // Get the content
        $content = Bonzai_Utils::getFileContent($filename);

        // Increase the total originary bytes
        Bonzai_Registry::getInstance()->append('total_orig_bytes', strlen($content), Bonzai_Registry::INTEGER_APPEND); // TODO: too long

        // Decode the content
        $decoded_content = $this->codeDecrypt($content);

        // If the decoded data isn't empty
        if (empty($decoded_content)) {
            // Set the file as skipped
            Bonzai_Registry::getInstance()->append('skipped_files', $filename, Bonzai_Registry::ARRAY_APPEND); // TODO: too long

            // Print a message
            Bonzai_Utils::bonzai_message('ERROR: The decoded data is empty.', false);
            return;
        }

        Bonzai_Utils::rename_file($filename);

        $decoded_filename = $this->getDecodedFilename($filename);

        // Print a message
        Bonzai_Utils::bonzai_message('Saving %s bytes...', true, strlen($decoded_content)); // TODO: too long

        // Save the file
        Bonzai_Utils::putFileContent($decoded_filename, $decoded_content);
    }
    // }}}

    // {{{ function codeDecrypt
    // TODO: cyclomatic complex: 7
    /**
     *
     * @access protected
     * @param  string       $data
     * @throws Bonzai_Exception
     * @return string
     */
    protected function codeDecrypt($data)
    {
        if (empty($data)) {
            throw new Bonzai_Exception('Cannot parse an empty data'); // TODO: NON BLOCKER
        }

        $data_len = strlen($data);
        // TODO: $key_len  = strlen(Bonzai_Script_Parser::$config['KEY']['KEY_HASH']);

        // Increase file counter
        Bonzai_Registry::getInstance()->append('total_files', 1, Bonzai_Registry::INTEGER_APPEND); // TODO: too long

        // Check key size
        /* TODO: if ($key_len == 0) {
            throw new Bonzai_Exception('Skipped because the private key is empty.'); // TODO: NON BLOCKER
        }*/

        // Check if is a bonzai file
        $start = strpos($data, 'bonzai_exec(\'', 0);
        $end   = strpos($data, '\')', $start);
        if ($start == -1 || $end == -1) {
            throw new Bonzai_Exception('Skipped because isn\'t a bonzai file.'); // TODO: NON BLOCKER
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
        Bonzai_Utils::bonzai_message('Decoding %s bytes...', true, $data_len);

        // Decrypt the data
        // TODO: USE APC + ECC...

        // Increase the total generated bytes
        // TODO: Bonzai_Registry::getInstance()->append('total_generated_bytes', strlen($crdata), Bonzai_Registry::INTEGER_APPEND); // TODO: too long

        // Print a message
        // TODO: Bonzai_Utils::bonzai_message('Restored %s bytes.', true, strlen($crdata));

        // TODO: return $crdata;
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
        /* TODO: if (Bonzai_Script_Parser::$config['CONFIGURATION']['SAVE_DECODED_AS_NEW']) {
            return "$filename.decoded";
        }*/

        return $filename;
    }
    // }}}
    // }}}
}
