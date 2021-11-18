<?php 

// Start session
session_start();

// Call function to register user after submission of form
if (isset($_POST['submit'])) {
    registerUser();
}

function registerUser() {

    // Connect to database
    include "dbconnect.php";

    // Check all fields are filled in
    if (empty($_POST['ic']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2'])) {
        $_SESSION['error'] = "All fields are required to be filled in.";
        redirect();
    }

    // Variable assignment
    $ic = $_POST['ic'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Check database to see if IC has been taken
    $sql = "SELECT * FROM customers WHERE customer_ic='$ic'"; // Query formulation
    $result = $db -> query($sql); // Query submission
    if ($result -> num_rows > 0) {
        $_SESSION['error'] = "Identification number is already in use.";
        redirect();
    }

    // Check database to see if email has been taken
    $sql = "SELECT * FROM customers WHERE customer_email='$email'";
    $result = $db -> query($sql);
    if ($result -> num_rows > 0) {
        $_SESSION['error'] = "Email has already been taken.";
        redirect();
    }

    // Check passwords match and hash password
    if ($password == $password2) {
        $password = md5($password);
    } else {
        $_SESSION['error'] = "Passwords do not match!";
        redirect();
    }

    // Add customer information to database
    $sql = "INSERT INTO customers (customer_ic, customer_name, customer_email, customer_password) VALUES ('$ic', '$name', '$email', '$password');";
    $result = $db -> query($sql);

    // Successful registration
    if ($result) {
        $_SESSION['success'] = "User successfully registered. Please proceed to <a class='link success-msg' href='login.php'>login</a>.";
        redirect();
    } else {
        $_SESSION['error'] = "Unable to register user. Please try again.";
        redirect();
    }

    $db -> close();
}

function redirect() {
    // Send user back to the registration form
    header("Location: register.php");
    // Terminate execution of script
    exit;
}

?>