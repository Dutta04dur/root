<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guestbook_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//CREATE DATABASE guestbook_db;

/*USE guestbook_db;

CREATE TABLE guestbook_entries (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);*/

?>
