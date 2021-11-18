<?php

if (isset($_POST['insertBicycle'])) {
    insertBicycle();
}

function insertBicycle() {

    // start session
    session_start();

    // connect database
    include "dbconnect.php";

    // check that all records are filled in
    $arr = $_POST;
    foreach ($arr as $key => $value) {
        if (empty($value) && ($key != "insertBicycle")) {
            $_SESSION['error'] = "Record $key to be filled in.";
            redirect();
        }
    }

    // Variable assignment
    $name = $_POST['name'];
    $location = $_POST['location'];
    $type = $_POST['bike-type'];
    $rate = $_POST['rental-rates'];
    $reward = $_POST['reward'];
    $rating = 0; //initialise rating as 0

    // insert new bicycle 
    $sql = "INSERT INTO bicycles (bike_name, bike_location, bike_type, rental_rate, rating, reward_points) VALUES ('$name', '$location', '$type', '$rate', '$rating', '$reward');";
    $result = $db -> query($sql);

    if ($result) {
        $_SESSION['success'] = "Successfully added.";
        redirect();
    } else {
        $_SESSION['error'] = "Cannot add new bicycle. Try again later.";
        redirect();
    }

    $db -> close;
}

function redirect() {
    // Redirect to admin page
    Header("Location: admin.php");
    // Terminate
    exit;
}
?>