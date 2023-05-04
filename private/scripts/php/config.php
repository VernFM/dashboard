<?php

/*
// Real server
$servername = "";
$username = "";
$password = "";
$dbname = "vernfm_database";
*/

// Local server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vernfm_database";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
