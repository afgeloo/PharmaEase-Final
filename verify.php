<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify'])) {
    $inputCode = $_POST['verification_code'];

    if ($inputCode == $_SESSION['verification_code']) {
        // Insert user into the database
        $userData = $_SESSION['user_data'];
        $conn = new mysqli("localhost", "root", "", "pharmaease_db");

        if ($conn->connect_error) die("Connection Error: " . $conn->connect_error);

        $stmt = $conn->prepare("INSERT INTO registered_users (first_name, last_name, birthday, age, contact_number, email, address, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "sssisssss",
            $userData['firstName'],
            $userData['lastName'],
            $userData['birthday'],
            $userData['age'],
            $userData['contactNumber'],
            $userData['email'],
            $userData['address'],
            $userData['username'],
            $userData['password']
        );

        if ($stmt->execute()) {
            unset($_SESSION['verification_code'], $_SESSION['user_data']);
            header("Location: success.php");
            exit();
        } else {
            $errorMessage = "Error: " . $conn->error;
        }
        $conn->close();
    } else {
        $errorMessage = "Invalid verification code.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Phone</title>
</head>
<body>
    <h2>Phone Verification</h2>
    <?php if (!empty($errorMessage)) echo "<div>$errorMessage</div>"; ?>
    <form method="post">
        <label>Enter Verification Code:</label>
        <input type="text" name="verification_code" required>
        <button type="submit" name="verify">Verify</button>
    </form>
</body>
</html>
