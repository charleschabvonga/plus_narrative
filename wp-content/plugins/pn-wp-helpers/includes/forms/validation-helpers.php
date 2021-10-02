<?php
/**
 * Form validation helper functions.
 *
 * @category Helpers
 * @package  PN_WP_Helpers
 * @author   Jethro May <jethro@plusnarrative.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://plusnarrative.com/
 */

/**
 * Validates a file
 * @param  array  $file      The info for the file
 * @param  array  $whitelist The allowed file mime type
 * @return array             An array of whether the validation was a success or not and what they reasons for any errors are
 */
function validateFile($file, $whitelist = ['pdf'])
{
    // Check post_max_size (http://us3.php.net/manual/en/features.file-upload.php#73762)
    $POST_MAX_SIZE = '4M';
    $unit = strtoupper(substr($POST_MAX_SIZE, -1));
    $multiplier =
        $unit == 'M'
            ? 1048576
            : ($unit == 'K'
                ? 1024
                : ($unit == 'G'
                    ? 1073741824
                    : 1));

    if (
        isset($_SERVER['CONTENT_LENGTH']) && (int) $_SERVER['CONTENT_LENGTH'] > $multiplier * (int) $POST_MAX_SIZE &&
        $POST_MAX_SIZE
    ) {
        return [
            'success' => false,
            'message' => 'POST exceeded maximum allowed size.'
        ];
    }

    // Settings
    $max_file_size_in_bytes = 4194304; // 4MB in bytes
    $backlist = array('php', 'php3', 'php4', 'phtml', 'exe'); // Restrict file extensions
    $valid_chars_regex = 'A-Za-z0-9_\-\s\.'; // Characters allowed in the file name (in a Regular Expression format)

    // Other variables
    $MAX_FILENAME_LENGTH = 260;
    $file_name = '';
    $file_extension = '';
    $uploadErrors = array(
        0 => 'There is no error, the file uploaded with success',
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder'
    );

    // Validate the upload
    if (!isset($file)) {
        return [
            'success' => false,
            'message' => 'No upload found'
        ];
    } elseif (isset($file['error']) && $file['error'] != 0) {
        return [
            'success' => false,
            'message' => $uploadErrors[$file['error']]
        ];
    } elseif (
        !isset($file['tmp_name']) ||
        !is_uploaded_file($file['tmp_name'])
    ) {
        return [
            'success' => false,
            'message' => 'Upload failed is_uploaded_file test.'
        ];
    } elseif (!isset($file['name'])) {
        return ['success' => false, 'message' => 'File has no name.'];
    }

    // Validate the file size (Warning: the largest files supported by this code is 2GB)
    $file_size = filesize($file['tmp_name']);
    if (!$file_size || $file_size > $max_file_size_in_bytes) {
        return [
            'success' => false,
            'message' => 'File exceeds the maximum allowed size'
        ];
    }

    if ($file_size <= 0) {
        return [
            'success' => false,
            'message' => 'File size outside allowed lower bound'
        ];
    }

    // Validate its a MIME Images (Take note that not all MIME is the same across different browser, especially when its zip file)
    if ('application/pdf' !== $file['type']) {
        return ['success' => false, 'message' => 'Please upload a valid file!'];
    }

    // Validate file name (for our purposes we'll just remove invalid characters)
    $file_name = preg_replace(
        '/[^' . $valid_chars_regex . ']|\.+$/i',
        '',
        strtolower(basename($file['name']))
    );
    if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH) {
        return ['success' => false, 'message' => 'Invalid file name'];
    }

    // Validate file extension
    if (!in_array(end(explode('.', $file_name)), $whitelist)) {
        return ['success' => false, 'message' => 'Invalid file extension'];
    }
    if (in_array(end(explode('.', $file_name)), $backlist)) {
        return ['success' => false, 'message' => 'Invalid file extension'];
    }

    return ['success' => true];
}

/**
 * Validates a South African ID
 * @param  int $id The ID to be compared about.
 * @return boolean Whether an ID is a South African ID
 */
function validateId($id)
{
    if (!preg_match('/^\d+$/', $id)) {
        return false;
    }

    $comparison = +substr($id, -1);
    $rest = substr($id, 0, 12);
    $odd = 0;
    $even = 0;
    $evenAdd = 0;
    $oddAddEven = 0;

    for ($i = 0; $i < strlen($rest); $i++) {
        $odd += +$rest[$i];
        $i++;
    }

    for ($j = 1; $j < strlen($rest); $j++) {
        $even .= (string)$rest[$j];
        $j++;
    }

    $even = "" . $even * 2;

    for ($k = 0; $k < strlen($even); $k++) {
        $evenAdd += +$even[$k];
    }

    $oddAddEven = abs(10 - +substr("" . ($odd + $evenAdd), 1));

    if (strlen($oddAddEven) > 1) {
        $oddAddEven = +substr($oddAddEven, 1);
    }

    return $comparison === $oddAddEven;
}