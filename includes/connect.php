<?php

$user = "root";
$host = "localhost";
$password = "";
$db = "paster";

$conn = mysqli_connect($host, $user, $password, $db);

if($conn) {
    if($GLOBALS['debug'] == 1) {
    echo "<script>console.log('connected to ".$host."');</script>"; 
    }
}


?>
