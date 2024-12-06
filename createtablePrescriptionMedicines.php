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
// ALL TABLE
// SQL query to create the products table
// $sql = "CREATE TABLE IF NOT EXISTS `Personal Care` (
//     `id` INT AUTO_INCREMENT PRIMARY KEY,
//     `name` VARCHAR(255) NOT NULL,
//     `price` DECIMAL(10, 2) NOT NULL,
//     `description` TEXT,
//     `category` VARCHAR(100) NOT NULL,
//     `store` VARCHAR(255),
//     `images` JSON,  -- Stores an array of image paths
//     `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );";

// $sql = "CREATE TABLE IF NOT EXISTS `Vitamins & Supplements` (
//     `id` INT AUTO_INCREMENT PRIMARY KEY,
//     `name` VARCHAR(255) NOT NULL,
//     `price` DECIMAL(10, 2) NOT NULL,
//     `description` TEXT,
//     `category` VARCHAR(100) NOT NULL,
//     `store` VARCHAR(255),
//     `images` JSON,  -- Stores an array of image paths
//     `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );";

// $sql = "CREATE TABLE IF NOT EXISTS `Over-the-Counter` (
//     `id` INT AUTO_INCREMENT PRIMARY KEY,
//     `name` VARCHAR(255) NOT NULL,
//     `price` DECIMAL(10, 2) NOT NULL,
//     `description` TEXT,
//     `category` VARCHAR(100) NOT NULL,
//     `store` VARCHAR(255),
//     `images` JSON,  -- Stores an array of image paths
//     `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );";

// $sql = "CREATE TABLE IF NOT EXISTS `Prescription Medicines` (
//     `id` INT AUTO_INCREMENT PRIMARY KEY,
//     `name` VARCHAR(255) NOT NULL,
//     `price` DECIMAL(10, 2) NOT NULL,
//     `description` TEXT,
//     `category` VARCHAR(100) NOT NULL,
//     `store` VARCHAR(255),
//     `images` JSON,  -- Stores an array of image paths
//     `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );";

// $sql = "CREATE TABLE IF NOT EXISTS `Medical Supplies` (
//     `id` INT AUTO_INCREMENT PRIMARY KEY,
//     `name` VARCHAR(255) NOT NULL,
//     `price` DECIMAL(10, 2) NOT NULL,
//     `description` TEXT,
//     `category` VARCHAR(100) NOT NULL,
//     `store` VARCHAR(255),
//     `images` JSON,  -- Stores an array of image paths
//     `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );";

$sql = "CREATE TABLE IF NOT EXISTS `Baby Care` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `description` TEXT,
    `category` VARCHAR(100) NOT NULL,
    `store` VARCHAR(255),
    `images` JSON,  -- Stores an array of image paths
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";

// $sql = "CREATE TABLE IF NOT EXISTS `Sexual Wellness` (
//     `id` INT AUTO_INCREMENT PRIMARY KEY,
//     `name` VARCHAR(255) NOT NULL,
//     `price` DECIMAL(10, 2) NOT NULL,
//     `description` TEXT,
//     `category` VARCHAR(100) NOT NULL,
//     `store` VARCHAR(255),
//     `images` JSON,  -- Stores an array of image paths
//     `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );";






// Execute query to create the table
if ($conn->query($sql) === TRUE) {
    echo "Table 'products' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Insert products into the products table with 3 images
$sql_insert = "
    INSERT INTO `products` (`name`, `price`, `description`, ` category`, `store`, `images`)
    VALUES
    ('Betadine Feminine Wash', 283.00, 'Is a gentle, pH-balanced cleanser for freshness and intimate care.','Feminine Wash', 'Mercury Drug', '[\"assets\ProductPics\SEXUAL WELLNESS\BETADINE FEMININE WASH (2).png\", \"assets\ProductPics\SEXUAL WELLNESS\BETADINE FEMININE WASH.png\"]');


// Execute insert query
if ($conn->query($sql_insert) === TRUE) {
    echo "3 products inserted successfully with images.<br>";
} else {
    echo "Error inserting products: " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>
