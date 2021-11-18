<?php

// Start session
session_start();

var_dump($_SESSION);

// Call function to login user after submission of form
if (isset($_POST['submit'])) {
    loginUser();
}

function loginUser() {

    // Connect to database
    include "dbconnect.php";

    // Check if all fields are filled in
    if (empty($_POST['email']) || (empty($_POST['password']))) {
        $_SESSION['error'] = "Please make sure all fields are filled in.";
        redirect();
    }

    // Variable assignment from form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email is in database
    $sql = "SELECT * FROM customers WHERE customer_email='$email';";
    $result = $db -> query($sql);

    // var_dump($result);
    // echo ($result -> num_rows);

    // If email entered is not in database
    if ($result -> num_rows == 0) {
        $_SESSION['error'] = "Email entered does not exist.";
        redirect();
    }

    // Hash password
    $password = md5($password);

    // Check if email and password combination is in database
    $sql = "SELECT * FROM customers WHERE customer_email='$email' AND customer_password='$password';";
    $result = $db -> query($sql);

    // If email and password combination is not in database
    if ($result -> num_rows == 0) {
        $_SESSION['error'] = "Please re-enter your password.";
        redirect();
    } else {
        $row = $result -> fetch_assoc();
        // Register user into session
        $_SESSION['valid_user_id'] = $row['customer_id'];
        $_SESSION['valid_user_ic'] = $row['customer_ic'];
        $_SESSION['valid_user_name'] = $row['customer_name'];
        $_SESSION['valid_user_email'] = $row['customer_email'];
        // Redirect user to home page after successful login
        header("Location: index.php"); 
    }

    $db -> close();
}

function redirect() {
    // Send user back to login form
    header("Location: login.php");
    exit;
}

?>