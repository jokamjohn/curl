<?php
/**
 * Created by PhpStorm.
 * User: jokamjohn
 * Date: 3/2/2016
 * Time: 9:42 PM
 */
$file_path = "C:/wamp/www/test.zip";

$post_data = [
    "name" => "kagga",
    "upload" => new CURLFile($file_path)
];

const URL = "http://localhost:8080/curl/upload_file.php";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//Doing a post request.
curl_setopt($ch, CURLOPT_POST, 1);
//Adding the post data.
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

$output = curl_exec($ch);
curl_close($ch);

echo $output;