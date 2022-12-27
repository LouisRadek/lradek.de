<?php
    session_start();
?>
<!DocType html>
<html>
    <head>
        <title>Home</title>
        <link rel="icon" href="louis.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description" content="This is a website about me Louis Radek and my programming projects">
        <meta name="author" content="Louis Radek">
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/0700c14651.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php 
            include_once 'navbar.php' ;
        ?>
        <main>
            <div class="iframe-container">
                <iframe src="https://www.youtube.com/embed/F6ct7uCKMgs?start=1&vq=hd1080&showinfo=0&rel=0&controls=0&autoplay=1&mute=1&iv_load_policy=3&fs=0&color=white&controls=0&disablekb=1" frameborder="0"></iframe>
            </div>

            <style>

                html, main {
                    background: #000;
                }

            </style>
        </main>
    </body>
</html>