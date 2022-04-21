<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST["submit"])){
    $email = $_POST["email-sign"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd-sign"];
    $pwdRepeat = $_POST["pwdrepeat"]; 

    require 'phpMailer/src/Exception.php';
    require 'phpMailer/src/PHPMailer.php';
    require 'phpMailer/src/SMTP.php';
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

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
        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '587';
        $mail->isHTML(true);
        $mail->Username = 'radek.forgottenpwd@gmail.com';
        $mail->Password = 'Php<?Zo39a%!';
        $mail->SetFrom('radek.forgottenpwd@gmail.com');
        $mail->AddAddress($email);

        $verification_code = substr(md5(uniqid(rand(), true)), 6,6);

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