<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST["submit"])){
    require 'phpMailer/src/Exception.php';
    require 'phpMailer/src/PHPMailer.php';
    require 'phpMailer/src/SMTP.php';
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    $email = $_POST["email-sign"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd-sign"];
    $pwdRepeat = $_POST["pwdrepeat"]; 


    if (emptyInputSignup($email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyInput");
        exit();
    }

    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invalidUid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passwordDismatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernameTaken");
        exit();
    }
    
    $mail = new PHPMailer();

    try {
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
        
        $verification_code = substr(md5(uniqid(rand(), true)), 6,6);
        
        $mail->isHTML(true);
        $mail->Subject = 'Email verification';
        $mail->Body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
        $mail->send();

        createUser($conn, $email, $username, $pwd, $verification_code);
        exit();
    } catch (Exception $e) {
        header("location: ../signup.php?error=mailError");
    }
    

} else {
    header("location: ../signup.php?error=noAccess");
    exit();
}