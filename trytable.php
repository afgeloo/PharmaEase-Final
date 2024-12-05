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
$sql = "CREATE TABLE IF NOT EXISTS `products` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `sku` VARCHAR(100) NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `original_price` DECIMAL(10, 2) NOT NULL,
    `description` TEXT,
    `store` VARCHAR(255),
    `images` JSON,  -- Stores an array of image paths
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";

// Execute query to create the table
if ($conn->query($sql) === TRUE) {
    echo "Table 'products' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Insert products into the products table with 3 images
$sql_insert = "
    INSERT INTO `products` (`name`, `sku`, `price`, `original_price`, `description`, `store`, `images`)
    VALUES
    ('DISPOSABLE FACEMASK', '89356', 50.00, 80.00, '3-ply with earloop disposable face mask, filters droplets, pollen, dust and other air particulates.', 'Mercury Drug', '[\"/PharmaEase/PharmaEase-Final/assets/product/facemask1.png\", \"/PharmaEase/PharmaEase-Final/assets/product/facemask2.png\", \"/PharmaEase/PharmaEase-Final/assets/product/facemask3.png\"]'),
    ('ALCOHOL GEL', '89567', 120.00, 150.00, 'Hand sanitizer gel with 70% alcohol, kills 99.9% of germs.', 'Watsons', '[\"/PharmaEase/PharmaEase-Final/assets/product/facemask1.png\", \"/PharmaEase/PharmaEase-Final/assets/product/facemask2.png\", \"/PharmaEase/PharmaEase-Final/assets/product/facemask3.png\"]'),
    ('VITAMIN C', '98765', 200.00, 250.00, 'Vitamin C tablets to boost immunity and protect against colds.', 'Mercury Drug', '[\"/PharmaEase/PharmaEase-Final/assets/product/facemask1.png\", \"/PharmaEase/PharmaEase-Final/assets/product/facemask2.png\", \"/PharmaEase/PharmaEase-Final/assets/product/facemask3.png\"]');
";

// Execute insert query
if ($conn->query($sql_insert) === TRUE) {
    echo "3 products inserted successfully with images.<br>";
} else {
    echo "Error inserting products: " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>
