<?php

if (isset($_POST["submit"])) {

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    session_start();
    $user = $_SESSION["userUid"];
    
    if (invalidUid($user) !== false) {
        header("location: ../profile.php?error=invalidUid");
        exit();
    }

    $sql = "DELETE FROM users WHERE usersUid=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);

    session_start();
    session_unset();
    session_destroy();


    header("location: ../login.php?success=delete");
    exit();
} else {
    header("location: ../profile.php?error=noAccess");
    exit();
}