<!DocType html>
<html>
    <head>
        <title>Comment</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description" content="This is a website about me Louis Radek and my programming projects">
        <meta name="author" content="Louis Radek">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include_once 'navbar.php';
            error_reporting(0);
            $currentUser = $_SESSION['userUid'];
            $restriction = $_GET["error"];
            error_reporting(E_ALL);
        ?>

        <main>
            <div class="login">
                <div class="wrapper" id="com">
                    <div class="title-text">
                        <div class="title login">
                            Comment
                        </div>
                    </div>
                    <div class="form-container">
                        <div class="form-inner">
                            <?php
                                if (!isset($_SESSION["userUid"])) {
                                    echo '<div class="field" style="margin-top: 20px;">Please log in to write a comment.</div>';
                                } else {
                            ?>
                                        <form action="includes/comment.inc.php" class="login" method="POST">
                                            <input type="hidden" name="user" value="<?php echo $currentUser ?>">
                                            <input type="hidden" name="restricted" value="<?php echo $restriction ?>">
                                            <div class="field">
                                                <textarea class="comment" name="comment" placeholder="Enter a comment..." cols="40" rows="4" required></textarea>
                                            </div>
                                            <?php
                                                if (isset($_GET["error"])){
                                                    if (isset($_GET["time"])){
                                                        if ($_GET["time"] == "restricted") {
                                                            echo '<div style="color:red; text-align:center; margin-top: 135px;">Only one comment per day!</div>';
                                                            echo '<style>#log-btn{ margin: 0; margin-top: 25px;}</style>';
                                                        } 
                                                    } else {
                                                        if ($_GET["error"] == "stmtFailed") {
                                                            echo '<div style="color:red; text-align:center; margin-top: 135px;">Something went wrong, try again!</div>';
                                                            echo '<style>#log-btn{ margin: 0; margin-top: 25px;}</style>';
                                                        } else if ($_GET["error"] == "none") {
                                                            echo '<div style="color:green; text-align:center; margin-top: 135px;">Comment send!</div>';
                                                            echo '<style>#log-btn{ margin: 0; margin-top: 25px;}</style>';
                                                        }
                                                    }
                                                } else {
                                                    echo  '<style>#log-btn {margin-top: 150px;}</style>';
                                                }
                                            ?>
                                            <div class="field btn" id="log-btn">
                                                <div class="btn-layer"></div>
                                                <input type="submit" name="submit" value="send comment">
                                            </div>
                                        </form>
                                <?php
                                    }
                                ?>
                        </div>
                    </div>
                </div>  
            </div>
            <style>
                .wrapper {
                    max-width: 500px;
                }
            </style>
        </main>
    </body>
</html>