<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST["reset-request-submit"])) {
    
    require 'phpMailer/src/Exception.php';
    require 'phpMailer/src/PHPMailer.php';
    require 'phpMailer/src/SMTP.php';

    require 'dbh.inc.php';
    require 'functions.inc.php';
    
    $userEmail = $_POST["email"];
    if (emailExists($conn, $userEmail) !== true) {
        header("location: ../email-pwd-reset.php?error=email!Exists");
        exit();
    }

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "https://www.lradek.de/reset-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    
    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../email-pwd-reset.php?error=stmtFailed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_execute($stmt);
    }

    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../email-pwd-reset.php?error=stmtFailed");
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = "Reset your password for radek.de";

    $message = "<p>We recieved a password reset request from you. Click on the link below to reset your password. 
    If you did not make this request, you can ignore this email.</p>";
    $message .= "<p>Here is your password reset link: <br>";
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $headers = "From: radek <radek@gmail.com>\r\n";             //Emails muessen geaendert werden
    $headers .= "Reply-To: radek@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";
    
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'mail.gmx.net';
    $mail->SMTPAuth = "true";
    $mail->Username = '';
    $mail->Password = '';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = '465';
    $mail->SetFrom('');
    $mail->AddAddress($to);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->Send();

    header("location: ../email-pwd-reset.php?reset=success");
} else {
    header("location: ../email-pwd-reset.php?error=noAccess");
    exit();
}