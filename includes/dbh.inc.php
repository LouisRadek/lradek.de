<?php

$serverName = "192.168.0.100";
$dBUserName = "lradekde_Website";
$dBPassword = "d78v!H309t^Fn55";
$dBName = "lradede_Website";
error_reporting(0);
$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);
error_reporting(E_ALL);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

