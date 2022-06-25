<?php

if (isset($_POST["reset-password-submit"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../reset-password.php?error=emptyInput");
        exit();
    } else if ($password != $passwordRepeat) {
        header("Location: ../reset-password.php?error=pwdDismatch");
        exit();
    }

    $currentDate = date("U");

    require 'dbh.inc.php';

    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../email-pwd-reset.php?error=stmtFailed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            header("location: ../email-pwd-reset.php?error=noToken");
            exit();
        } else {

            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck === false) {
                header("location: ../email-pwd-reset.php?error=noOrWrongToken");
                exit();
            } else if ($tokenCheck === true) {
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM users WHERE usersEmail=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../email-pwd-reset.php?error=stmtFailed");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        header("location: ../email-pwd-reset.php?error=stmtFailed");
                        exit();
                    } else {

                        $sql = "UPDATE users SET usersPwd=? WHERE usersEmail=?;";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("location: ../email-pwd-reset.php?error=stmtFailed");
                            exit();
                        } else {
                            $newHashedPwd = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newHashedPwd, $tokenEmail);
                            mysqli_execute($stmt);

                            $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                header("location: ../email-pwd-reset.php?error=stmtFailed");
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_execute($stmt);
                                header("location: ../login.php?success=newPwd");
                                exit();
                            }

                        }
                        
                    }
                }
            }

        }
    }

} else {
    header("location: ../reset-password.php?error=noAccess");
    exit();
}