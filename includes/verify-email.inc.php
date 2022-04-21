<?php
if (isset($_POST["verify-submit"])) {
    
    require_once 'dbh.inc.php';

    $email = $_POST['email'];
    $verification_code = $_POST['verify-code'];

    
    $sql = "UPDATE users SET verifyDate = NOW() WHERE usersEmail=? AND verifyCode=? OR usersUid=? AND verifyCode =?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../verify-email.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $email, $verification_code, $email, $verification_code);
    mysqli_stmt_execute($stmt);

    if (mysqli_affected_rows($conn) == 0) {
        header("location: ../verify-email.php?error=verifyFailed&email=" . $email);
    } else {
        header("location: ../login.php?success=verification");
    }
    
} else {
    header('location: ../verify-email.php?error=noAccess');
    exit();
}