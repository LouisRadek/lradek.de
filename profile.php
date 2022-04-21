<!DocType html>
<html>
    <head>
        <title>Profile</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include_once 'navbar.php';
            require_once 'includes/dbh.inc.php';
            $currentUser = $_SESSION["userUid"];
        ?>

        <main>
            <div class="wave1"></div>
            <section class="sec" id="change-sec"> 
                <h1>Hello <?php echo $currentUser ?></h1>

                <a class="reset" href="email-pwd-reset.php">Reset your password</a>

                <p class="change">Change username:</p>
                <div class="form-inner">
                    <form action="includes/reset-name.inc.php" class="reset-name" method="POST">
                        <input type="hidden" name="user" value="<?php echo $currentUser ?>">
                        <div class="field">
                            <input type="text" name="new-name" id="uid" placeholder="Enter new username" require>
                        </div>
                        <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "stmtFailed") {
                                    echo '<div style="color:red; text-align:center;">Something went wrong, try again!</div>';
                                } else if ($_GET["error"] == "none") {
                                    echo '<div style="color: green; text-align:center;">Username changed!</div>';
                                }
                            }
                        ?>
                        <div id="availability"></div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" name="submit" id="submit" value="change username">
                        </div>
                    </form>
                </div>
            </section>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#uid').blur(function(){

                        var username = $(this).val();

                        $.ajax ({
                            url: 'includes/check.inc.php',
                            method: "POST",
                            data: {user_name: username},
                            success:function(data){
                                if (data != '0') {
                                    $('#availability').html('<div class="text-failed">Username not available!</div>');
                                }
                            }
                        })
                    });
                });
            </script>
        </main>
    </body>
</html>