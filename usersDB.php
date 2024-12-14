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

// SQL query to create the products table
$sql_create_table = "CREATE TABLE registered_users (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- Unique identifier for each user
    first_name VARCHAR(100) NOT NULL,           -- User's first name
    last_name VARCHAR(100) NOT NULL,            -- User's last name
    birthday DATE NOT NULL,                     -- User's date of birth
    age INT NOT NULL,                           -- User's age
    contact_number VARCHAR(11) NOT NULL,        -- User's contact number (11 digits)
    email VARCHAR(255) NOT NULL UNIQUE,         -- User's email, must be unique
    address TEXT NOT NULL,                      -- User's address
    username VARCHAR(50) NOT NULL UNIQUE,       -- User's username, must be unique
    password VARCHAR(255) NOT NULL,             -- Hashed password
    is_verified TINYINT(1) DEFAULT 0,           -- Verification status: 0 = not verified, 1 = verified
    code_verification INT(6) DEFAULT NULL,      -- 6-digit verification code
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Record creation time
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Record update time
);";

// // Execute query to create the table
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table 'registered_users' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}