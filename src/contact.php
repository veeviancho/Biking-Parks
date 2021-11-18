<?php include "nav.php" ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Biking@Parks</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header class="banner">
            <a href="index.php"><img id="img-left" src="../assets/logo.png"></a>
            <h1>Biking@Parks</h1>
        </header>
        <nav>
            <div class="left-nav">
                <ul>
                    <?php left_navigation(); ?>
                </ul>
            </div>
            <div class="right-nav">
                <ul>
                    <?php right_navigation(); ?>
                </ul>
            </div>
        </nav>
        <div class="content contact-content">
            <h1>Hello.</h1>
            <br>
            <div class="columns">
                <div class="column">
                    <p>Technologies used for this website:</p>
                    <br>
                    <strong>Frontend:</strong>
                    <ul>
                        <li>HTML</li>
                        <li>CSS</li>
                        <li>JavaScript</li>
                    </ul>
                    <br>
                    <strong>Backend:</strong>
                    <ul>
                        <li>PHP</li>
                        <li>MySQL</li>
                    </ul>
                </div>
                <div class="column">
                    <p>Contact me:</p>
                    <br>
                    <strong>Email:</strong>
                    <ul>
                        <li><a href="mailto:veeviancho@gmail.com" class="mail">veeviancho@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <footer>
            <p>All Rights Reserved &copy; Vivian Cho 2021</p>
        </footer>

    </body>
</html>