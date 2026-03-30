<?php

$myObj = new stdClass();
$myObj->username = "soyreynald";
$myObj->encryptation = "a39cb27b70572c0f75eb1811de53496e8b31daae";
## Creating a JSON database on intenert for us to be able to use in the future 
$myJSON = json_encode($myObj, JSON_PRETTY_PRINT);

print_r($myJSON);

?>