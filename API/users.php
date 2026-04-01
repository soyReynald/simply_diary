<?php
session_start();
// Read the raw POST data from the request body
$json = file_get_contents('php://input');

// Decode the JSON into a PHP associative array
$data = json_decode($json, true);

// Access your variable
$username = $data['username']; 
$userPassword = SHA1($data['password']);
$passwordFromUser_salt_ = $data['salt'];

// Send a response back to JavaScript
// echo json_encode(["status" => "received", "user" => $username, "encrypted_pw" => $userPassword]);

$myObj = new stdClass();
$myObj->username = "soyreynald";

$salt = 6*30*4;

$_SESSION['salt'] = $salt;

$myObj->encryptation = $_SESSION['salt'];

$testedSalt = $myObj->encryptation == $passwordFromUser_salt_;

## Creating a JSON database on intenert for us to be able to use in the future 
// $myJSON = json_encode($myObj, JSON_PRETTY_PRINT);

if ($testedSalt && SHA1($userPassword) == SHA1($userPassword)) {
    header("Location: ../index.html");
}

?>