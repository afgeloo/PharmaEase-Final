<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmaease_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS registered_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    birthday DATE NOT NULL,
    age INT NOT NULL CHECK (age >= 13),
    contact_number VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    address TEXT NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'registered_users' created or already exists.";
} else {
    echo "Error creating table: " . $conn->error;
}

$firstName = $lastName = $birthday = $age = $contactNumber = $email = $address = $username = $password = $confirmPassword = "";
$firstNameError = $lastNameError = $birthdayError = $ageError = $contactError = $emailError = $addressError = $usernameError = $passwordError = $confirmPasswordError = "";
$errors = 0;
$successMessage = "";

if (isset($_POST['submit'])) {
   
}

$conn->close();

?>