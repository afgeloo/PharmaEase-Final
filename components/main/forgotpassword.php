<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmaease_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

$forgotUsername = $forgotEmail = $forgotContactNumber = "";
$usernameError = $emailError = $contactNumberError = $generalError = "";
$showErrors = false;  

$maxAttempts = 2;
$cooldownDuration = 60;

if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
    $_SESSION['last_attempt_time'] = time();
}

if ($_SESSION['attempts'] >= $maxAttempts) {
    $timePassed = time() - $_SESSION['last_attempt_time'];
    if ($timePassed < $cooldownDuration) {
        $remainingTime = $cooldownDuration - $timePassed;
        $showErrors = true;
        $generalError = "You have exceeded the maximum number of attempts. Please try again in <span id='countdown'>$remainingTime</span> seconds.";
    } else {
        $_SESSION['attempts'] = 0;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SESSION['attempts'] < $maxAttempts) {
    $forgotUsername = $_POST["username"];
    $forgotEmail = $_POST["email"];
    $forgotContactNumber = $_POST["contact_number"];

    $stmt = $conn->prepare("SELECT id FROM registered_users WHERE username = ?");
    $stmt->bind_param("s", $forgotUsername);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows == 0) {
        $usernameError = "Username does not exist.";
    }
    $stmt->close();

    $stmt = $conn->prepare("SELECT id FROM registered_users WHERE email = ?");
    $stmt->bind_param("s", $forgotEmail);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows == 0) {
        $emailError = "Email does not exist.";
    }
    $stmt->close();

    $stmt = $conn->prepare("SELECT id FROM registered_users WHERE contact_number = ?");
    $stmt->bind_param("s", $forgotContactNumber);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows == 0) {
        $contactNumberError = "Contact number does not exist.";
    }
    $stmt->close();

    if (empty($usernameError) && empty($emailError) && empty($contactNumberError)) {
        $_SESSION['reset_user'] = [
            'username' => $forgotUsername,
            'email' => $forgotEmail,
            'contact_number' => $forgotContactNumber
        ];
        header("Location: newpassword.php");
        exit();
    } else {
        $_SESSION['attempts'] += 1;
        $_SESSION['last_attempt_time'] = time();
        $generalError = "Please ensure all fields are correct.";
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
    <link rel="stylesheet" href="forgotpassword.css">
    <title>Forgot Password</title>
    <script>
        function validateContactNumber(event) {
            const input = event.target;
            input.value = input.value.replace(/[^0-9]/g, '').slice(0, 11);
        }

        function startCooldownTimer(remainingTime) {
            const countdownElement = document.getElementById('countdown');
            const submitButton = document.querySelector("button[type='submit']");

            let timeLeft = remainingTime;

            const timerInterval = setInterval(() => {
                if (timeLeft <= 0) {
                    clearInterval(timerInterval); 
                    countdownElement.textContent = ''; 
                    submitButton.disabled = false; 
                } else {
                    countdownElement.textContent = timeLeft;
                    timeLeft--;
                }
            }, 1000);
        }

        window.onload = function() {
            const remainingTime = <?php echo isset($remainingTime) ? $remainingTime : 0; ?>;
            if (remainingTime > 0) {
                document.querySelector("button[type='submit']").disabled = true;
                startCooldownTimer(remainingTime);
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" placeholder="Enter Username" name="username" value="<?php echo htmlspecialchars($forgotUsername); ?>" required>
            <?php if ($showErrors && !empty($usernameError)) echo "<p class='error-msg'>$usernameError</p>"; ?>
            
            <input type="text" placeholder="Enter Email" name="email" value="<?php echo htmlspecialchars($forgotEmail); ?>" required>
            <?php if ($showErrors && !empty($emailError)) echo "<p class='error-msg'>$emailError</p>"; ?>
            
            <input type="text" placeholder="Enter Contact Number" name="contact_number" value="<?php echo htmlspecialchars($forgotContactNumber); ?>" required maxlength="11" oninput="validateContactNumber(event)">
            <?php if ($showErrors && !empty($contactNumberError)) echo "<p class='error-msg'>$contactNumberError</p>"; ?>
            
            <button type="submit"><strong>Proceed</strong></button>
            <?php if ($showErrors && !empty($generalError)) echo "<p class='allerror-msg'>$generalError</p>"; ?>
        </form>
    </div>
</body>
</html>
