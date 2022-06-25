<!DocType html>
<html>
    <head>
        <title>Reset password</title>
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
                    <h1>Reset your password</h1>
                    <p class="pass-reset-text">Type in your email in the field below. We will then send you an email how to reset your password.</p>
                    <div class="form-inner">
                        <form action="includes/reset-request.inc.php" class="login" method="POST">
                            <div class="field">
                                <input type="email" name="email" placeholder="Enter your Email" required>
                            </div>
                            <?php
                                if (isset($_GET["error"])) {
                                    if ($_GET["error"] == "email!Exists") {
                                        echo '<div style="color:red; text-align:center;">Email does not exist!</div>';
                                        echo "<style> #wrap-pass-reset #log-btn {margin-top: 15px;}</style>";
                                    } else if ($_GET["error"] == "stmtFailed") {
                                        echo '<div style="color:red; text-align:center;">Something went wrong, try again!</div>';
                                        echo "<style> #wrap-pass-reset #log-btn {margin-top: 15px;}</style>";
                                    } else if ($_GET["error"] == "noOrWrongToken") {
                                        echo '<div style="color:red; text-align:center;">Something went wrong, try again!</div>';
                                        echo "<style> #wrap-pass-reset #log-btn {margin-top: 15px;}</style>";
                                    } 
                                }

                                if (isset($_GET["reset"])){
                                    if ($_GET["reset"] == "success") {
                                        echo '<div style="color:green; text-align:center;">Check your email and if needed the spam folder!</div>';
                                        echo "<style> #wrap-pass-reset #log-btn {margin-top: 15px;}</style>";
                                    }
                                }
                            ?>
                            <div class="field btn" id="log-btn">
                                <div class="btn-layer"></div>
                                <input type="submit" name="reset-request-submit" value="reset your password by mail">
                            </div>
                        </form> 
                    </div>
                </div> 
            </div>
        </main>
    </body>
</html>