<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to a login page or any other desired location
header("location: index.php"); // Replace "login.php" with the appropriate URL
exit();
