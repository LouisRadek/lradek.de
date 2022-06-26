<?php


if (isset($_POST["submit"])) {
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    session_start();

    $currentUser = $_SESSION["userUid"];
    $newUid = $_POST["new-name"];
    
    if (invalidUid($currentUser) !== false) {
        header("location: ../profile.php?error=invalidUid");
        exit();
    }

    if (invalidUid($newUid) !== false) {
        header("location: ../profile.php?error=invalidUid");
        exit();
    }

    session_destroy();
    session_start();
    
    $_SESSION["userUid"] = $newUid;
     
    $sql = "UPDATE users SET usersUid=? WHERE usersUid=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $newUid, $currentUser);
    mysqli_stmt_execute($stmt);
    header("location: ../profile.php?error=none");
    exit();
}