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
$sql_create_table = "CREATE TABLE IF NOT EXISTS `sexual wellness` (
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
    echo "Table 'sexual wellness' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Array of products to insert
$products = [
    [
        'name' => 'Modess',
        'label' => 'Napkin/Panty Liner',
        'price' => 35.00,
        'sku' => 5234,
        'description' => "Designed to provide comfort and protection for your baby. They are made with high-quality materials to keep your baby's skin healthy and prevent leakages.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/MODESS NAPKIN.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/MODESS NAPKIN (2).png"
        ])
    ],
    [
        'name' => 'Durex',
        'label' => 'Condoms',
        'price' => 50.00,
        'sku' => 6789,
        'description' => "High-quality latex condoms for safe and comfortable use.",
        'store' => 'Mercury Drug',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/DUREX.png"
        ])
    ]
    // Add more products here
];

// Insert each product
foreach ($products as $product) {
    $description = $conn->real_escape_string($product['description']);
    $sql_insert = "INSERT INTO `sexual wellness` (name, label, price, sku, description, store, images)
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