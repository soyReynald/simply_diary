<?php
session_start();
$_SESSION['username'] = $data['username'];
$_SESSION['password'] = $data['password'];
$_SESSION['salt'] = $data['salt'];

$encryptedPSW = SHA1($_SESSION['password']).$_SESSION['salt'];
if (isset($encryptedPSW)) {
    // 3. Organize the code so that the code also bring forth an answer to make a redirection [ ⚒️ ]
    
}

/*
Steps

1. SHOW UP THE JSON in the CLIENT-SIDE - ✔️ - TESTING 🧭.
2. Compare SAME PASSWORD with A COPY OF IT ✔️.
3. Organize the code so that the code also bring forth an answer to make a redirection ✔️ - Check in the clientside [✔️].
4. To place a conditional IN THE BEGININING of the file to test IF it is TO BE from an USER that is approved, tested or permitted.
4.1 PLACING a CONDITIONAL to REDIRECT FROM php THE USER in case that he was GRANTED or ACCESS permitted.

*/
// Read the raw POST data from the request body
$json = file_get_contents('php://input');

// Decode the JSON into a PHP associative array
$data = json_decode($json, true);

// Access your variable
$username = isset($data['username']) ? $data['username'] : "placeholderUsername"; 
$userPassword = isset($data['password']) ? $data['password'] :"placeholderPassword";
$passwordFromUser_salt_ = isset($data['salt']) ? $data['salt'] : "720";

$myObj = new stdClass();
$myObj->username = "soyreynald";

$salt = 6*30*4;

$_SESSION['salt'] = $salt;

$myObj->encryptation = $_SESSION['salt'];

$testedSalt = $salt == $passwordFromUser_salt_;
$encrypted_pw = SHA1($userPassword).strval($myObj->encryptation);


## Creating a JSON database on intenert for us to be able to use in the future
// Send a response back to JavaScript
if ($testedSalt) {
    echo json_encode(["status" => "received", "user" => $username, "encrypted_pw" => $encrypted_pw], JSON_PRETTY_PRINT);
}
// $myJSON = json_encode($myObj, JSON_PRETTY_PRINT);


?>