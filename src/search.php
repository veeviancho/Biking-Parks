<?php

function search() {

    // Start session
    session_start();

    // Connect to database
    include "dbconnect.php";

    // var_dump($_POST);

    // Variable assignment
    $location = isset($_POST['location']) ? $_POST['location'] : "any";
    $date = $_POST['date'];
    $bike_type = isset($_POST['bike_type']) ? $_POST['bike_type'] : "any";
    $rental_rates = isset($_POST['rental_rates']) ? $_POST['rental_rates'] : "any";
    $rating = isset($_POST['rating']) ? $_POST['rating'] : "any";
    $reward = isset($_POST['reward']) ? $_POST['reward'] : "any";

    // Initialise empty array
    $conditions = array();

    // Append non-empty values into an array
    if ($location != "any") {
        $conditions[] = "bicycles.bike_location='$location'";
    }
    if ($bike_type != "any") {
        $conditions[] = "bicycles.bike_type='$bike_type'";
    }
    if ($rental_rates != "any") {
        $conditions[] = "bicycles.rental_rate<'$rental_rates'";
    }
    if ($rating != "any") {
        $conditions[] = "bicycles.rating='$rating'";
    }
    if ($reward != "any") {
        $conditions[] = "bicycles.reward_points='$reward'";
    }

    // If date is specified as a filter
    // Initialise empty array
    $booked_id_arr = array();
    // Get an array of booked IDs on the specific date
    if (!empty($date)) {
        $sql = "SELECT bike_id FROM bookings WHERE booked_date='$date'";
        $result = $db -> query($sql);
        $num_results = $result -> num_rows;
        for ($i=0; $i<$num_results; $i++) {
            $row = $result -> fetch_assoc();
            $booked_id_arr[] = $row["bike_id"];
        }
    }

    // var_dump($booked_id_arr);

    // Query formulation to retrieve bike info from bicycles db
    $sql = "SELECT * FROM bicycles";
    // Join array to form a string for query using implode(string $separator, array $array): string
    if (count($conditions) > 0) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    // echo $sql;

    // Query submission
    $result = $db -> query($sql);
    $num_results = $result -> num_rows;

    if ($result && $num_results > 0) {
        // Loop through each row of result and display the results
        for ($i=0; $i<$num_results; $i++) {
            $row = $result -> fetch_assoc();
            $current_id = $row["bike_id"];
            $current_location = $row["bike_location"];
            $current_name = $row["bike_name"];
            $current_type = $row["bike_type"];
            $current_rate = $row["rental_rate"];
            $current_rating = $row["reward"];
            $current_reward = $row["reward_points"];

            if ((!empty($date) && !in_array($current_id, $booked_id_arr)) || (empty($date))) {
                // If date is specified, only display if the bike is not booked
                // If date is not specified, display all
                $date = !empty($date) ? $date : null;
                display($current_id, $current_name, $current_location, $current_type, $current_rate, $current_reward, $date);
            }
        }
    } else {
        echo "Sorry no results!";
    }

    $db -> close();
}

function redirect() {
    // Send user back to home page
    Header("Location: index.php");
    // header('Location: ' . $_SERVER['PHP_SELF'] . '?' . SID);
    // Terminate
    exit;
}

function display($id, $name, $location, $type, $rate, $reward, $date) {

    // Get current page URL
    $self = $_SERVER['PHP_SELF'];

    // Display items
    echo "<div class='bike'>";
    echo "<a class='bike-info' href='$self?add=$id&date=$date'>";
    echo "<img class='icon' src='../assets/bike.png'>";
    echo "<div class='bike-info'><strong>$name</strong><br>Location: $location<br>$type bike @ $$rate/day <br>Reward Points: $reward</div>";
    echo "</a></div>";
}
?>