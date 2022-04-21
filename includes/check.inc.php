<?php

if (isset($_POST["user_name"])) {
    require_once "dbh.inc.php";

    $result = 0;
    $username = $_POST["user_name"];

    $sql = "SELECT * FROM users WHERE usersUid=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    echo mysqli_num_rows($result);
    exit();
}
