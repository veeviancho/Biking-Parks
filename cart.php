<?php 

include "nav.php";

// Start session
session_start();

// If reset button is clicked
if (isset($_GET['empty'])) {
    // Empty session cart
    unset($_SESSION['cart']);
    // Redirect back to page
    header ("location: " . $_SERVER['PHP_SELF'] . '?' . SID);
}

?>

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
            <!-- <img src="assets/bike-icon.png" alt="Biking@Parks"> -->
            <h1>Cart</h1>

            <?php

            // Connect database
            include "dbconnect.php";

            // Loop through cart array to get contents
            $arr = $_SESSION['cart'];
            $arr_count = count($_SESSION['cart']);

            if ($arr_count > 0) {

                // Initialise table
                echo "<table class='center-content cart-table'>";
                echo "<tr> <th>Name</th> <th>Location</th> <th>Type</th> <th>Date</th> <th>Rate (/day)</th> <th>Total Price</th></tr>";

                // Loop through cart array
                for ($i=0; $i<$arr_count; $i++) {
                    // Get item ID
                    $id = $arr[$i];
                    
                    // Get information from database
                    $sql = "SELECT * FROM bicycles WHERE bike_id='$id';";
                    $result = $db -> query($sql);
                    if ($result) {
                        $row = $result -> fetch_assoc();

                        // Variable assignment
                        $name = $row['bike_name'];
                        $location = $row['bike_location'];
                        $type = $row['bike_type'];
                        $rate = number_format($row['rental_rate'], 2, '.', '');
                        $points = $row['reward_points'];

                        $date = isset($_SESSION['date'][$i]) ? $_SESSION['date'][$i] : "idk";
                        
                        echo "<tr>";
                        echo "<td>$name</td> <td>$location</td> <td>$type</td> <td>$date</td> <td>$$rate</td> <td>??</td>";
                        echo "</tr>";
                    }
                }

                echo "</table>";

            } else {
                echo "No item added in cart yet.";
            }

            ?>

            <br>
            <button name="confirm">Confirm Order</button>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?empty=1"><button name="empty">Empty Cart</button></a>

        </div>
        <footer>
            <p>All Rights Reserved &copy; Vivian Cho 2021</p>
        </footer>

    </body>
</html>
