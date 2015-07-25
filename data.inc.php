<?php

define('FILE_MANAGEMENT', 'data.json');


/**
 * Configuration of fields for the page
 */
$fields = [
    'Basic Information' => [
        'Name',
        'Birth Date',
        'Blood Sign'
    ],
    'Field 1',
    'Category'          => [
        'Category - Field',
        'Category - Field 2'
    ],
    'Field 3'
];

/**
 * Configuration of privacy levels
 */
$privacy = ['public' => 'Public', 'private' => 'Private', 'qrcode' => 'QR Code'];

/**
 * Return the data from the file
 *
 * @return array|mixed
 */
function read_data()
{
    $content = json_decode(file_get_contents(FILE_MANAGEMENT), true);
    if (!is_array($content)) {
        $content = [];
    }

    return $content;
}

/**
 * Save data into a file
 *
 * @param array $data
 * @return int
 */
function save_data(Array $data)
{
    return file_put_contents(FILE_MANAGEMENT, json_encode($data));
}