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
            <a href="index.php"><img id="img-left" src="assets/logo.png"></a>
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
        <div class="content center">
            <img src="assets/id.png" alt="Biking@Parks">
            <h1>Login</h1>
            <form class="center" id="loginForm" action="loginUser.php" method="post">
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email"><br>
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password"><br>

                <?php

                if (isset($_SESSION['error'])) {
                    $error = $_SESSION['error'];
                    echo "<p class='error-msg'>$error</p>";
                    unset($_SESSION['error']);
                }

                ?>

                <button type="submit" name="submit">Login</button>
            </form>
            Not a member? <a class="link" href="register.php">Sign up</a> now.
        </div>
        <footer>
            <p>All Rights Reserved &copy; Vivian Cho 2021</p>
        </footer>

    </body>
</html>
