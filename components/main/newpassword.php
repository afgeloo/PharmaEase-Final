<?php
session_start();

if (!isset($_SESSION['reset_user'])) {
    header("Location: forgotpassword.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmaease_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

$newPassword = $confirmPassword = $error = "";

$passwordPattern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newPassword = trim($_POST["new_password"]);
    $confirmPassword = trim($_POST["confirm_password"]);

    if (!preg_match($passwordPattern, $newPassword)) {
        $error = "Password must be at least 8 characters long, contain letters, numbers, and special characters.";
    } elseif ($newPassword !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE registered_users SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $hashedPassword, $_SESSION['reset_user']['username']);

        if ($stmt->execute()) {
            unset($_SESSION['reset_user']);
            header("Location: ../main/main.php");
            exit();
        } else {
            $error = "Failed to update password. Please try again. Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newpassword.css">
    <title>Set New Password</title>
</head>
<body>
    <div class="container">
        <h2>Set New Password</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="password" placeholder="Enter New Password" name="new_password" required>
            <input type="password" placeholder="Confirm New Password" name="confirm_password" required>
            <button type="submit"><strong>Update Password</strong></button>
            <?php if (!empty($error)) echo "<p class='error-msg'>$error</p>"; ?>
        </form>
    </div>
</body>
</html>
