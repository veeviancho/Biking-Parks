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
        <div class="content columns">
            <div class="left-column">
                <?php 
                
                if (isset($_SESSION['cart'])) {
                    $items_no = count($_SESSION['cart']);
                    echo "Hello! Your cart contains <strong>$items_no</strong> items.<br><br>";
                }

                ?>
                <form method="post">
               
                    <label for="location">Location</label><br>
                    <select name="location" id="location">
                        <option value="any">Any</option>
                        <option value="East Coast Park">East Coast Park</option>
                        <option value="West Coast Park">West Coast Park</option>
                        <option value="Pasir Ris Park">Pasir Ris Park</option>
                        <option value="Jurong Central Park">Jurong Central Park</option>
                    </select><br>
                    
                    <label for="date">Date</label><br>
                    <input type="date" name="date" id="date"><br>
                
                    <label for="bike_type">Bike Type</label><br>
                    <select name="bike_type" id="bike_type">
                        <option value="any">Any</option>
                        <option value="Children">Children</option>
                        <option value="Adults">Adults</option>
                        <option value="Family">Family</option>
                    </select><br>

                    <p><b>FILTER BY...</b></p>
                    <label for="rental_rates">Rental Rates (/day)</label><br>
                    <select name="rental_rates" id="rental_rates">
                        <option value="any">Any</option>
                        <option value="5"><$5</option>
                        <option value="10"><$10</option>
                        <option value="20"><$20</option>
                    </select><br>

                    <label for="rating">Rating</label><br>
                    <select name="rating" id="rating">
                        <option value="any">Any</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                    </select><br>
                    
                    <label for="reward">Reward Points</label><br>
                    <select name="reward" id="reward">
                        <option value="any">Any</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>

                    <?php 

                    if (isset($_SESSION['error'])) {
                        $msg = $_SESSION['error'];
                        echo "<p class='error-msg'>$msg</p>";
                        unset($_SESSION['error']);
                    }

                    ?>

                    <button class="mr" type="submit" name="submit" id="submit">SEARCH</button>
                    <button type="reset" name="reset" id="reset">CLEAR</button>
       
                </form>
            </div>
            <div class="right-column">
                <?php 
                include "search.php";

                // Start session
                session_start();

                // Initialise cart array if not already exist
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                }

                // If someone clicks on item, add item to cart array
                if (isset($_GET['add'])) {
                    $_SESSION['cart'][] = $_GET['add'];
                    $_SESSION['date'][$_GET['add']] = $_GET['date'];
                    redirect();
                }

                // var_dump($_SESSION['cart']);
                // unset($_SESSION['cart']);

                search();
                ?>
            </div>
        </div>
        <footer>
            <p>All Rights Reserved &copy; Vivian Cho 2021</p>
        </footer>

    </body>
</html>