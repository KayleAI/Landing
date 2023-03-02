<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
// display errors
//header("Access-Control-Allow-Headers: Content-Type, Authorization");

// make a curl request to https://api.kayle.ai/v1/moderate with `message` as $_POST['input'] and `key` as `key_3ae7aaa593816ed31caa70e34a7a75c5fb466762a86ba7447e486f153fb7c939`
// then echo the JSON response -> score

if (!isset($_POST['input'])) {
    echo 'No input';
    exit();
} else {
    header('HTTP/1.1 200 OK');
}

// set post data
$data = array('message' => $_POST['input'], 'key' => 'key_3ae7aaa593816ed31caa70e34a7a75c5fb466762a86ba7447e486f153fb7c939');
$data_string = http_build_query($data);

// set cURL options
$ch = curl_init('https://api.kayle.ai/v1/moderate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// make the request and get the response
$response = curl_exec($ch);
curl_close($ch);

// decode the response JSON
$json = json_decode($response, true);

echo $json['score'];

?>