<?php

if (isset($_POST["submit"])) {
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    $username = $_POST["email-log"];
    $pwd = $_POST["pwd-log"];
    check_string($username);


    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyInput");
        exit();
    }

    loginUser($conn, $username, $pwd);

} else {
    header('location: ../login.php?error=noAccess');
    exit();
}