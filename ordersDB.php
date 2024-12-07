<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

// Ensure the 'registered_users' table exists and has data
// Create 'registered_users' table if it doesn't exist
$sql_create_registered_users_table = "CREATE TABLE IF NOT EXISTS registered_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);";
$conn->query($sql_create_registered_users_table);

// Insert dummy data into 'registered_users' (only if needed)
$sql_insert_registered_users = "INSERT INTO registered_users (name) VALUES
('User 1'), 
('User 2'), 
('User 3');";

// Execute the insert for dummy data (only if needed)
$conn->query($sql_insert_registered_users);

// SQL query to create the orders table
$sql_create_orders_table = "CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'Pending',
    FOREIGN KEY (user_id) REFERENCES registered_users(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);";

// Execute query to create the orders table
if ($conn->query($sql_create_orders_table) === TRUE) {
    echo "Table 'orders' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// SQL query to insert dummy data into the orders table
$sql_insert_orders_data = "INSERT INTO orders (user_id, product_name, quantity, status)
VALUES
    (1, 'Product A', 2, 'Pending'),
    (2, 'Product B', 1, 'Completed'),
    (3, 'Product C', 5, 'Processing');";

// Execute query to insert dummy data into orders table
if ($conn->query($sql_insert_orders_data) === TRUE) {
    echo "Dummy data inserted into 'orders' table successfully.<br>";
} else {
    echo "Error inserting data: " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>
