<?php

if (isset($_POST["submit"])) {

    require_once "dbh.inc.php";

    $currentUser = $_POST["user"];
    $comment = $_POST["comment"]; 

    $sql = "INSERT comments(userUid, comment, commentDate) VALUES (?, ?, NOW());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../comment.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $currentUser, $comment);
    mysqli_stmt_execute($stmt);

    header("location: ../comment.php?error=none");
    exit();

} else {
    header("location: ../comment.php?error=noAccess");
    exit();
}