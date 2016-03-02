<?php
/**
 * Created by PhpStorm.
 * User: jokamjohn
 * Date: 3/2/2016
 * Time: 8:06 PM
 */

const GOOGLE_URL = "http://www.google.com/search?q=curl";

//Step 1: Initialize the curl
$curl = curl_init();

//Step 2: set some options.
curl_setopt($curl, CURLOPT_URL, GOOGLE_URL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);

//Step 3: Get the result.
$result = curl_exec($curl);

//Curl information.
$info = curl_getinfo($curl);

//Step 4: close curl.
curl_close($curl);

//Step 5: error handling.

if ($result === FALSE) {
    echo "Curl error: " . curl_error($curl);
} else {
//    echo $result;
}

//Curl info.
var_dump($info);