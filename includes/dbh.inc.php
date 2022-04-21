<?php

$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "websiteDb";
error_reporting(0);
$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);
error_reporting(E_ALL);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

