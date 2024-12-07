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
$sql_create_table = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    sku VARCHAR(100) NOT NULL UNIQUE,
    category VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    images JSON NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

// Execute query to create the table
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table 'products' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// SQL query to insert dummy data into the products table
$sql_insert_data = "INSERT INTO products (name, description, price, sku, category, quantity, images)
VALUES
    ('Product A', 'This is a description for Product A.', 19.99, 'SKU123', 'Category A', 100, '[\"image1.jpg\", \"image2.jpg\"]'),
    ('Product B', 'This is a description for Product B.', 49.99, 'SKU124', 'Category B', 200, '[\"image3.jpg\"]'),
    ('Product C', 'This is a description for Product C.', 29.99, 'SKU125', 'Category A', 150, '[\"image4.jpg\", \"image5.jpg\"]');";

// Execute query to insert dummy data
if ($conn->query($sql_insert_data) === TRUE) {
    echo "Dummy data inserted into 'products' table successfully.<br>";
} else {
    echo "Error inserting data: " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>
