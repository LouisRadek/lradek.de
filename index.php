<!DocType html>
<html>
    <head>
        <title>Louis Website</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/0700c14651.js" crossorigin="anonymous"></script>
        <script src="snake.js"></script>
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
                .iframe-container{
                    margin: 2% 0 0 5.5%;
                    position: relative;
                    width: 90%;
                    padding-bottom: 49%; 
                }
                .iframe-container iframe{
                    position: absolute;
                    top:0;
                    left: 0;
                    width: 100%;
                    height: 95%;
                }

                main {
                    background: #000;
                }

            </style>
        </main>
    </body>
</html>