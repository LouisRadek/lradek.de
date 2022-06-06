<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST["submit"])) {

    require_once "dbh.inc.php";
    require 'phpMailer/src/Exception.php';
    require 'phpMailer/src/PHPMailer.php';
    require 'phpMailer/src/SMTP.php';

    $currentUser = $_POST["user"];
    $comment = $_POST["comment"]; 
    $email = "radek.forgottenpwd@gmail.com";

    if (!isset($_POST["restricted"])) {
        header("location: ../comment.php?error=none&time=restricted");
        exit();
    }

    $sql = "INSERT comments(userUid, comment, commentDate) VALUES (?, ?, NOW());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../comment.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $currentUser, $comment);
    mysqli_stmt_execute($stmt);

    $mail = new PHPMailer();

    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'mail.gmx.net';
    $mail->SMTPAuth = "true";
    $mail->Username = '';
    $mail->Password = '';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = '465';
    $mail->SetFrom('');
    $mail->AddAddress($email);
    
    $mail->isHTML(true);
    $mail->Subject = 'Comment ' . $currentUser;
    $mail->Body = $comment;
    $mail->send();


    header("location: ../comment.php?error=none");
    exit();

} else {
    header("location: ../comment.php?error=noAccess");
    exit();
}