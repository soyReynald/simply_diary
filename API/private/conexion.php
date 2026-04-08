<?php
DEFINE("SERVERNAME","localhost");
DEFINE("DBNAME", "simply_diary_db");
DEFINE("USERNAME", "root");
DEFINE("PASSWORD", "");
$con_string = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME); // function.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #c03e3e; font-family: Arial, sans-serif;">
<?php

if ($con_string->connect_error) {
    die("Connection failed: " . $con_string->connect_error);
} else {
    echo '<h1 style="color: black; margin: 15% auto; text-align: center; font-weight: 20px;">Connected succesfully</h1>';
};

?>
</body>
</html>



