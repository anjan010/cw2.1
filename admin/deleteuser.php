<?php

    require('inc/essentials.php');
    adminLogin();
?>
<?php
$mysqli = require __DIR__ . "/database.php";

// Query to retrieve all users' data
$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);

// Check if any rows were returned
// Close the database connection
// $mysqli->close();
?>









<?php $mysqli->close(); ?>