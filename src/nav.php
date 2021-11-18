<?php

// Start session
session_start();

function left_navigation() {
    // If user is logged in
    if ($_SESSION['valid_user_id']) {
        echo '<li><a href="index.php">Home</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="bookings.html">My Bookings</a></li>
        <li><a href="profile.php">Profile</a></li>';
    } 
    
    // If user is not logged in
    else {
        echo '<li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Sign up</a></li>';
    }
}

function right_navigation() {
    // Only display if user is logged in
    if ($_SESSION['valid_user_id']) {
        echo '<li><a href="cart.php">Cart</a></li>
        <li><a href="logout.php">Logout</a></li>';
    }
}

?>