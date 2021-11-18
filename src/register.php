<?php 
include "nav.php"; 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Biking@Parks</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
        <script type="text/JavaScript" src="validation.js"></script>
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
        <div class="content center">
            <img src="../assets/id.png" alt="Biking@Parks">
            <h1>Registration Form</h1>

            <?php
            if (isset($_SESSION['success'])) {
                $msg = $_SESSION['success'];
                echo "<p class='success-msg'>$msg</p>";
                unset($_SESSION['success']);
            }
            ?>
            <form class="center" id="registerForm" action="registerUser.php" method="post">
                <label for="ic">Identification Number</label><br>
                <input type="text" id="ic" name="ic"><br>
                <label for="name">Name</label><br>
                <input type="text" id="name" name="name"><br>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email"><br>
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password"><br>
                <label for="password2">Confirm Password</label><br>
                <input type="password" id="password2" name="password2"><br>

                <?php 
                if (isset($_SESSION['error'])) {
                    $error = $_SESSION['error'];
                    echo "<p class='error-msg'>$error</p>";
                    unset($_SESSION['error']);
                }
                ?>

                <button type="submit" name="submit">Register</button>
            </form>
        </div>
        <footer>
            <p>All Rights Reserved &copy; Vivian Cho 2021</p>
        </footer>

    </body>
</html>

<script>
    document.getElementById("registerForm").onsubmit = validate;
</script>
