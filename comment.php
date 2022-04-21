<!DocType html>
<html>
    <head>
        <title>Comment</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include_once 'navbar.php';
            error_reporting(0);
            $currentUser = $_SESSION['userUid'];
            error_reporting(E_ALL);
        ?>

        <main>
            <div class="login" id="drop">
                <div class="wrapper">
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
                                            <div class="field">
                                                <textarea class="comment" name="comment" placeholder="Enter a comment..." cols="40" rows="4" required></textarea>
                                            </div>
                                            <?php
                                                if (isset($_GET["error"])){
                                                    if ($_GET["error"] == "stmtFailed") {
                                                       echo '<div style="color:red; text-align:center; margin-top: 135px;">Something went wrong, try again!</div>';
                                                       echo '<style>#log-btn{ margin: 0; margin-top: 25px;}</style>';
                                                    } else if ($_GET["error"] == "none") {
                                                       echo '<div style="color:green; text-align:center; margin-top: 135px;">Comment send!</div>';
                                                       echo '<style>#log-btn{ margin: 0; margin-top: 25px;}</style>';
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
                .comment {
                    background: #34343d;
                    border-radius: 5px;
                    padding: 4px;
                    resize: none;
                    margin-top: 15px;
                    border-style: solid;
                    outline: none !important;
                }

                .comment:focus {
                    border-color: #6649b8;
                }

                textarea::-webkit-scrollbar {
                    width: 0.35rem;
                    height: 0.35rem;
                }

                textarea::-webkit-scrollbar-thumb {
                    background: #6649b8;
                }

                textarea::-webkit-scrollbar-track {
                    background: #34343d;
                }

                .wrapper {
                    max-width: 500px;
                }
            </style>
        </main>
    </body>
</html>