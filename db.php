<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "digital_wallet";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>