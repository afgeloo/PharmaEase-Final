<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmaease_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $contact_number = $_POST["contact_number"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $id_file = $_FILES["id_file"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($id_file);

    if (move_uploaded_file($_FILES["id_file"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO users (first_name, last_name, email, contact_number, age, id_file, address, username, password) 
                VALUES ('$first_name', '$last_name', '$email', '$contact_number', '$age', '$target_file', '$address', '$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading ID file.";
    }
}

$conn->close();
?>
