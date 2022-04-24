<?php

if (isset($_POST["submit"])) {
    $username = $_POST["email-log"];
    $pwd = $_POST["pwd-log"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyInput");
        exit();
    }

    loginUser($conn, $username, $pwd);

} else {
    header('location: ../login.php?error=noAccess');
    exit();
}