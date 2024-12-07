<?php
// Database connection variables
$servername = "localhost"; // Replace with your database server
$username = "root";        // Replace with your MySQL username
$password = "";            // Replace with your MySQL password
$dbname = "pharmaease_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
