<?php
    session_start();
?>
<!DocType html>
<html>
    <head>
        <title>Verify email</title>
        <link rel="icon" href="louis.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description" content="This is a website about me Louis Radek and my programming projects">
        <meta name="author" content="Louis Radek">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php 
            include_once "navbar.php";
        ?>

        <main>
            <div class="login">
               <div class="wrapper" id="wrap-pass-reset">
                    <h1>Verify your email</h1>
                    <p class="pass-reset-text">We have send you a verification code to your email address. Don't forget to check your spam folder, when the email isn't in your mailbox. Then type the code in the field below.</p>
                    <div class="form-inner">
                        <form action="includes/verify-email.inc.php" class="login" method="POST">
                            <div class="field">
                                <input type="text" name="verify-code" placeholder="Enter the verification code" required>
                            </div>
                            <?php
                                if (isset($_GET["error"])) {
                                    if ($_GET["error"] == "verifyFailed") {
                                        echo '<div style="color:red; text-align:center;">Wrong verification code or signed up with wrong Email!</div>';
                                        echo "<style> #wrap-pass-reset #log-btn {margin-top: 15px;}</style>";
                                    } else if ($_GET["error"] == "stmtFailed") {
                                        echo '<div style="color:red; text-align:center;">Something went wrong, try again!</div>';
                                        echo "<style> #wrap-pass-reset #log-btn {margin-top: 15px;}</style>";
                                    } 
                                }
                            ?>
                            <div class="field btn" id="log-btn">
                                <div class="btn-layer"></div>
                                <input type="submit" name="verify-submit" value="verify your email">
                            </div>
                        </form> 
                    </div>
                </div> 
            </div>
        </main>
    </body>
</html>