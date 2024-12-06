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

// // SQL query to create the products table
$sql_create_table = "CREATE TABLE IF NOT EXISTS `medicinal supplies` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    label VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    sku INT NOT NULL,
    description TEXT,
    store VARCHAR(255),
    images JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";

// Execute query to create the table
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table 'personal care' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Array of products to inserT

// Array of products to insert
$products = [
    [
        'name' => 'N95',
        'label' => 'Face Mask',
        'price' => 120.00,
        'sku' => 1432,
        'description' => "Help prevent the spread of COVID-19 by filtering out respiratory droplets.",
        'store' => 'Mercury',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/n95.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/n95 (2).png"
        ])
    ],
    [
        'name' => 'Hand Sanitizer',
        'label' => 'Sanitizer',
        'price' => 55.00,
        'sku' => 1422,
        'description' => "Kills germs on hands when soap and water are not available. Look for sanitizers with at least 60% alcohol content for effective disinfection.",
        'store' => 'SouthStar Drug',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/hand sanitizer.png"
        ])
    ],
    [
        'name' => 'Cleaning Disinfectants',
        'label' => 'Disinfectants',
        'price' => 250.00,
        'sku' => 1211,
        'description' => "Used to clean surfaces and objects that may be contaminated with the virus. Effective against a wide range of pathogens.",
        'store' => 'SouthStar Drug',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/clorox (disinfectant).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/20.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/21.png"
        ])
    ],
    [
        'name' => 'Nitrile Gloves',
        'label' => 'Gloves',
        'price' => 585.00,
        'sku' => 1341,
        'description' => "Provide a barrier to protect hands from contamination. Use disposable gloves and discard after each use to prevent cross-contamination.",
        'store' => 'Mercury',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/30.png"
        ])
    ],
    [
        'name' => 'Face Shields',
        'label' => 'Shields',
        'price' => 12.05,
        'sku' => 1321,
        'description' => "Provide an additional layer of protection by covering the eyes, nose, and mouth. Often used in conjunction with masks for added safet..",
        'store' => 'SouthStar Drug',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/face shield.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/face shield (3).png"
        ])
    ],
    [
        'name' => 'Antigen',
        'label' => 'Covid-19 Test Kits',
        'price' => 150.0,
        'sku' => 1322,
        'description' => "Allow for at-home testing to detect the presence of the virus. Includes nasal swabs and instructions for use.",
        'store' => 'SouthStar Drug',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/antigen.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/antigen (2).png"
        ])
    ],
        ];
        
        // Insert each product
        foreach ($products as $product) {
            $description = $conn->real_escape_string($product['description']);
            $sql_insert = "INSERT INTO `medicinal supplies` (name, label, price, sku, description, store, images)
                VALUES (
                    '{$product['name']}',
                    '{$product['label']}',
                    {$product['price']},
                    {$product['sku']},
                    '$description',
                    '{$product['store']}',
                    '{$product['images']}'
                );";
        
            // Execute insert query
            if ($conn->query($sql_insert) === TRUE) {
                echo "Product '{$product['name']}' inserted successfully.<br>";
            } else {
                echo "Error inserting product '{$product['name']}': " . $conn->error . "<br>";
            }
        }
        
        // Close connection
        $conn->close();
        ?>
