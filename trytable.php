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
// $sql_create_table = "CREATE TABLE IF NOT EXISTS `sexual wellness` (
//     `id` INT AUTO_INCREMENT PRIMARY KEY,
//     `name` VARCHAR(255) NOT NULL,
//     `label` VARCHAR(255) NOT NULL,
//     `price` DECIMAL(10, 2) NOT NULL,
//     `description` TEXT,
//     `store` VARCHAR(255),
//     `images` JSON,
//     `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );";

// Execute query to create the table
// if ($conn->query($sql_create_table) === TRUE) {
//     echo "Table 'sexual wellness' created successfully.<br>";
// } else {
//     echo "Error creating table: " . $conn->error . "<br>";
// }

// Prepare the description and escape any special characters
$description = $conn->real_escape_string("Designed to provide comfort and protection for your baby. They are made with high-quality materials to keep your baby's skin healthy and prevent leakages.");

// SQL query to insert products
$sql_insert = "INSERT INTO `sexual wellness` (`name`, `label`, `price`, `description`, `store`, `images`)
    VALUES
    (
        'Modess',
        'Napkin/Panty Liner',
        35.00,
        '$description',
        'Watsons',
        '[\"/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/MODESS NAPKIN.png\", \"/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/MODESS NAPKIN (2).png\"]'
    );";

// Execute insert query
if ($conn->query($sql_insert) === TRUE) {
    echo "Product inserted successfully.<br>";
} else {
    echo "Error inserting product: " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>
