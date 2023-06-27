<?php

session_start();

if (!isset($_SESSION["name"])) {   //to check if the user is log in, if not it will redirect to the login page
    header("Location: login.html");
    exit();
}

echo "Welcome, " . $_SESSION["name"] . "! This is the dashboard page."; //to display on dashboard

echo "<br><a href='logout.php'>Logout</a>";    //logout link

?>
