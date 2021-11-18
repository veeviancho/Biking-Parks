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
            <h1>Biking@Parks - Admin</h1>
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
            <img src="../assets/bike-icon.png" alt="Biking@Parks">
            <h1>Bicycle Registration Form</h1>

            <?php 

            if (isset($_SESSION['success'])) {
                $msg = $_SESSION['success'];
                echo "<p class='success-msg'>$msg</p>";
                unset($_SESSION['success']);
            }

            ?>

            <form class="center" id="registerForm" action="adminInsert.php" method="post">
                <label for="name">Name</label><br>
                <input type="text" id="name" name="name"><br>

                <label for="location">Location</label><br>
                <select name="location" id="location">
                    <option value="East Coast Park">East Coast Park</option>
                    <option value="West Coast Park">West Coast Park</option>
                    <option value="Pasir Ris Park">Pasir Ris Park</option>
                    <option value="Jurong Central Park">Jurong Central Park</option>
                </select><br>

                <label for="bike-type">Bike Type</label><br>
                <select name="bike-type" id="bike-type">
                    <option value="Children">Children</option>
                    <option value="Adults">Adults</option>
                    <option value="Family">Family</option>
                </select><br>

                <label for="rental-rates">Rental Rates (/day)</label><br>
                <input type="number" step="0.01" name="rental-rates" id="rental-rates"><br>

                <label for="reward">Reward Points</label><br>
                <select name="reward" id="reward">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select><br>

                <?php

                if (isset($_SESSION['error'])) {
                    $msg = $_SESSION['error'];
                    echo "<p class='error-msg'>$msg</p>";
                    unset($_SESSION['error']);
                }

                ?>

                <button type="submit" name="insertBicycle">Add</button>
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
