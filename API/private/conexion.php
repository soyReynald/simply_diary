<?php
DEFINE("SERVERNAME","localhost");
DEFINE("DBNAME", "simply_diary_db");
DEFINE("USERNAME", "root");
DEFINE("PASSWORD", "");
$con_string = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

if ($con_string->connect_error) {
    die("Connection failed: " . $con_string->connect_error);
} else {
    // echo '<h1 style="color: black; margin: 15% auto; text-align: center; font-weight: 20px;">Connected succesfully</h1>';
};


?>



