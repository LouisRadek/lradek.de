<?php

$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "websitedb";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if ($conn->connect_error) {
   die("Connection failed: " . mysqli_connect_error() );
}


