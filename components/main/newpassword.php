<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmaease_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

$newPassword = $confirmPassword = "";
$passwordError = $confirmPasswordError = $generalError = "";
$showErrors = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];
    $username = $_SESSION['reset_user']['username'];

    // Fetch the current hashed password from the database
    $stmt = $conn->prepare("SELECT password FROM registered_users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($currentHashedPassword);
    $stmt->fetch();
    $stmt->close();

    if (empty($newPassword)) {
        $passwordError = "Password is required";
    } elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/", $newPassword)) {
        $passwordError = "Password must contain letters, numbers, and symbols, with a minimum of 8 characters";
    } elseif (password_verify($newPassword, $currentHashedPassword)) {
        $passwordError = "New password cannot be the same as the old password";
    }

    if ($newPassword !== $confirmPassword) {
        $confirmPasswordError = "Passwords do not match";
    }

    if (empty($passwordError) && empty($confirmPasswordError)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $updateStmt = $conn->prepare("UPDATE registered_users SET password = ? WHERE username = ?");
        $updateStmt->bind_param("ss", $hashedPassword, $username);

        if ($updateStmt->execute()) {
            $successMessage = "Password reset successful!";
            header("Location: main.php");
            exit();
        } else {
            $generalError = "Error: " . $conn->error;
        }
        $updateStmt->close();
    } else {
        $showErrors = true;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newpassword.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" type="image/png" href="/PharmaEase/PharmaEase-Final/assets/PharmaEaseLogo.png">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <title>Reset Password</title>
</head>
<body>
    <div class="container fade-in">
        <div class="main">
            <h2>Reset Password</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label>New Password:</label>
                <div class="password-field">
                    <input id="new_password" class="input" type="password" name="new_password" value="<?php echo htmlspecialchars($newPassword); ?>" required>
                    <button type="button" class="toggle-password" onclick="togglePasswordVisibility('new_password')">
                        <svg id="icon-new-password" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 4.5C7.25 4.5 3.25 8.25 2 12c1.25 3.75 5.25 7.5 10 7.5s8.75-3.75 10-7.5c-1.25-3.75-5.25-7.5-10-7.5zM12 17.5c-2.9 0-5.25-2.35-5.25-5.25S9.1 7 12 7s5.25 2.35 5.25 5.25S14.9 17.5 12 17.5zm0-8.25c-1.65 0-3 1.35-3 3s1.35 3 3 3 3-1.35 3-3-1.35-3-3-3z"></path>
                        </svg>
                    </button>
                </div>
                <?php if ($showErrors && !empty($passwordError)) echo "<div class='error'>$passwordError</div>"; ?>

                <label>Confirm Password:</label>
                <div class="password-field">
                    <input id="confirm_password" class="input" type="password" name="confirm_password" value="<?php echo htmlspecialchars($confirmPassword); ?>" required>
                    <button type="button" class="toggle-password" onclick="togglePasswordVisibility('confirm_password')">
                        <svg id="icon-confirm-password" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 4.5C7.25 4.5 3.25 8.25 2 12c1.25 3.75 5.25 7.5 10 7.5s8.75-3.75 10-7.5c-1.25-3.75-5.25-7.5-10-7.5zM12 17.5c-2.9 0-5.25-2.35-5.25-5.25S9.1 7 12 7s5.25 2.35 5.25 5.25S14.9 17.5 12 17.5zm0-8.25c-1.65 0-3 1.35-3 3s1.35 3 3 3 3-1.35 3-3-1.35-3-3-3z"></path>
                        </svg>
                    </button>
                </div>
                <?php if ($showErrors && !empty($confirmPasswordError)) echo "<div class='error'>$confirmPasswordError</div>"; ?>

                <button class="submit button" type="submit" name="submit"><strong>Reset Password</strong></button>
                <?php if ($showErrors && !empty($generalError)) echo "<div class='error'>$generalError</div>"; ?>
            </form>
        </div>
    </div>
    <script>
        function togglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(`icon-${inputId}`);
            if (input.type === "password") {
                input.type = "text";
                icon.innerHTML = `<path d="M12 4.5C7.25 4.5 3.25 8.25 2 12c1.25 3.75 5.25 7.5 10 7.5s8.75-3.75 10-7.5c-1.25-3.75-5.25-7.5-10-7.5zM12 15c-1.65 0-3 1.35-3 3s1.35 3 3 3 3-1.35 3-3-1.35-3-3-3z"></path>`;
            } else {
                input.type = "password";
                icon.innerHTML = `<path d="M12 4.5C7.25 4.5 3.25 8.25 2 12c1.25 3.75 5.25 7.5 10 7.5s8.75-3.75 10-7.5c-1.25-3.75-5.25-7.5-10-7.5zM12 17.5c-2.9 0-5.25-2.35-5.25-5.25S9.1 7 12 7s5.25 2.35 5.25 5.25S14.9 17.5 12 17.5zm0-8.25c-1.65 0-3 1.35-3 3s1.35 3 3 3 3-1.35 3-3-1.35-3-3-3z"></path>`;
            }
        }
    </script>
</body>
</html>
