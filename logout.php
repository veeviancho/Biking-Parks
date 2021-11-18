<?php

// Start session
session_start();

// Destroy variables assigned
if (count($_SESSION) > 0) {
    foreach ($_SESSION as $key => $value) {
        unset($_SESSION[$key]);
    }
}

// Destroy session
session_destroy();

// Redirect to home page with 2s delay
// Header("Refresh:2; URL=index.php");

// Redirect to home page
Header("Location: index.php");

?>