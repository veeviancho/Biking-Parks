<?php

//Variable declaration for database connection
$hostname = "localhost";
$username = "root";
$password = "";
$database = "gobiking";

@ $db = new mysqli($hostname, $username, $password, $database);
if (mysqli_connect_errno()) {
    $_SESSION['error'] = "Error connecting to database.";
}

?>