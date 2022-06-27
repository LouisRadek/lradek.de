<!DocType html>
<html>
    <head>
        <title>Login</title>
        <link rel="icon" href="louis.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description" content="This is a website about me Louis Radek and my programming projects">
        <meta name="author" content="Louis Radek">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include_once 'navbar.php';
        ?>

        <div class="login">
            <div class="wrapper" id="wrap-form">
            <div class="title-text">
               <div class="title login">
                  Login
               </div>
               <div class="title signup">
                  Signup
               </div>
            </div>
            <div class="form-container">
               <div class="slide-controls">
                  <input type="radio" name="slide" id="login" checked>
                  <input type="radio" name="slide" id="signup">
                  <label for="login" class="slide login">Login</label>
                  <label for="signup" class="slide signup">Sign up</label>
                  <div class="slider-tab"></div>
               </div>
               <div class="form-inner">
                  <form action="includes/login.inc.php" class="login" method="POST">
                     <div class="field">
                        <input type="text" name="email-log" placeholder="Email/Username" required>
                     </div>
                     <div class="field">
                        <input id="password" type="password" name="pwd-log" placeholder="Password" required>
                        <div id="eye" onclick="toggle()">
                           <svg id="eye-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z"/></svg>
                        </div>
                     </div>
                     
                     <?php 
                        if (isset($_GET["error"])){
                           if ($_GET["error"] == "emptyInput") {
                              echo '<div style="color:red; text-align:center;">Fill out all boxes!</div>';
                              echo "<style> #forgot {margin: 0px;} #log-btn {margin-top: 5px;}</style>";
                           } else if ($_GET["error"] == "wrongUid") {
                              echo '<div style="color:red; text-align:center;">Wrong username!</div>';
                              echo "<style> #forgot {margin: 0px;} #log-btn {margin-top: 5px;}</style>";
                           } else if ($_GET["error"] == "wrongPwd") {
                              echo '<div style="color:red; text-align:center;">Wrong password!</div>';
                              echo "<style> #forgot {margin: 0px;} #log-btn {margin-top: 5px;}</style>";
                           } else if ($_GET["error"] == "notVerified") {
                              $email = $_GET["email"];
                              echo '<div style="color:red; text-align:center;">Please verify your account <a style="color: red;" href="verify-email.php">here</a></div>';
                              echo "<style> #forgot {margin: 0px;} #log-btn {margin-top: 5px;}</style>";
                           } else if ($_GET["error"] == "stmtFailed") {
                              echo '<div style="color:red; text-align:center;">Something went wrong, try again!</div>';
                              echo "<style> #forgot {margin: 0px;} #log-btn {margin-top: 5px;}</style>";
                           } else if ($_GET["error"] == "dbhConnFailed") {
                              echo '<div style="color:red; text-align:center;">Connection to Database failed, try it later!</div>';
                              echo "<style> #forgot {margin: 0px;} #log-btn {margin-top: 5px;}</style>";
                           }
                        }

                        if (isset($_GET["success"])){
                           if ($_GET["success"] == "newPwd") {
                              echo '<div style="color:green; text-align:center;">Your password has been reseted!</div>';
                              echo "<style> #forgot {margin: 0px;} #log-btn {margin-top: 5px;}</style>";
                           } else if ($_GET["success"] == "verification") {
                              echo '<div style="color:green; text-align:center;">Now you can log in!</div>';
                              echo "<style> #forgot {margin: 0px;} #log-btn {margin-top: 5px;}</style>";
                           } else if ($_GET["success"] == "delete") {
                              echo '<div style="color:green; text-align:center;">Your account got deleted!</div>';
                              echo "<style> #forgot {margin: 0px;} #log-btn {margin-top: 5px;}</style>";
                           }
                        }
                     ?>
                     <div class="pass-link" id="forgot">
                        <a href="email-pwd-reset.php">Forgot password?</a>
                     </div>
                     <div class="field btn" id="log-btn">
                        <div class="btn-layer"></div>
                        <input type="submit" name="submit" value="Login">
                     </div>
                     <div class="signup-link">
                        Not a member? <a href="">Sign up</a>
                     </div>
                  </form>
                  <form action="includes/signup.inc.php" class="signup" method="POST">
                     <div class="field">
                        <input type="email" name="email-sign" placeholder="Email Address" required>
                     </div>
                     <div class="field">
                        <input type="text" name="uid" id="uid" placeholder="Username" required>
                     </div>
                     <div class="field">
                        <input id="password2" type="password" name="pwd-sign" placeholder="Password" required>
                        <div id="eye" onclick="toggle2()">
                           <svg id="eye2-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z"/></svg>
                        </div>
                     </div>
                     <div class="field">
                        <input id="password3" type="password" name="pwdrepeat" placeholder="Confirm password" required>
                        <div id="eye" onclick="toggle3()">
                           <svg id="eye3-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z"/></svg>
                        </div>
                     </div>
                     <div style="margin-top: 15px; margin-left: 10px;">
                        <input style="margin-right: 10px;" type="checkbox" name="link1" value="link" required>
                        <a href="privacy.php" target="_blank">You agree with our policy and privacy</a>
                     </div>
                     <div id="availability"></div>
                     <div class="field btn" id="signupBt">
                        <div class="btn-layer"></div>
                        <input type="submit" name="submit" id="submit" value="Sign up">
                     </div>
                  </form>
               </div>
            </div>
        </div>
        
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
                              $('#submit').attr("disabled", true);
                           } else {
                              $('#availability').html('<div class="text-success">Username available!</div>');
                              $('#submit').attr("disabled", false);
                           }
                        }
                  })
               });
            });
        </script>
        <script src="script.js"></script>
        </div>
    </body>
</html>