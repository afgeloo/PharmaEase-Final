<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmaease_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

$firstName = $lastName = $birthday = $age = $contactNumber = $email = $address = $username = $password = $confirmPassword = "";
$firstNameError = $lastNameError = $birthdayError = $ageError = $contactError = $emailError = $addressError = $usernameError = $passwordError = $confirmPasswordError = "";
$errors = 0;
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $birthday = $_POST["birthday"];
    $age = $_POST["age"];
    $contactNumber = $_POST["contact_number"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    if (empty($firstName)) $firstNameError = "First Name is required";
    if (empty($lastName)) $lastNameError = "Last Name is required";
    if (empty($birthday)) $birthdayError = "Birthday is required";
    if (empty($age)) $ageError = "Age is required";
    elseif (!is_numeric($age)) $ageError = "Age must be a number";
    elseif ($age < 13) $ageError = "You must be at least 13 years old";

    if (empty($contactNumber)) $contactError = "Contact Number is required";
    elseif (!preg_match("/^\d{11}$/", $contactNumber)) $contactError = "Contact number must be 11 digits";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $emailError = "Email is not valid";

    if (empty($address)) $addressError = "Address is required";
    if (empty($username)) $usernameError = "Username is required";

    if (empty($password)) $passwordError = "Password is required";
    elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/", $password)) {
        $passwordError = "Password must contain letters, numbers, and symbols, with a minimum of 8 characters";
    }

    if ($password !== $confirmPassword) $confirmPasswordError = "Passwords do not match";

    if (!$firstNameError && !$lastNameError && !$birthdayError && !$ageError && !$contactError && !$emailError && !$addressError && !$usernameError && !$passwordError && !$confirmPasswordError) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO registered_users (first_name, last_name, birthday, age, contact_number, email, address, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisssss", $firstName, $lastName, $birthday, $age, $contactNumber, $email, $address, $username, $hashedPassword);

        if ($stmt->execute()) {
            $successMessage = "Registration successful!";
            header("Location: ../main/main.php");
            exit();
        } else {
            $successMessage = "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>PHP Registration Form</title>
    <link rel="stylesheet" type="text/css" href="registration.css?v=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <script>
        function calculateAge() {
            var birthday = new Date(document.getElementById('birthday').value);
            var today = new Date();
            var age = today.getFullYear() - birthday.getFullYear();
            if (today.getMonth() < birthday.getMonth() || (today.getMonth() === birthday.getMonth() && today.getDate() < birthday.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
        }

        function validateContactNumber(input) {
            input.value = input.value.replace(/\D/g, '').substring(0, 11);
        }
    </script>
</head>
<body>
    <div class="container fade-in">
        <div class="main">
            <img src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseFull.png" alt="Logo" class="logo-img">
            <h2>Registration Form</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                <label>First Name:</label>
                <input class="input" type="text" name="first_name" value="<?php echo $firstName; ?>">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo "<div class='error'>$firstNameError</div>"; ?>

                <label>Last Name:</label>
                <input class="input" type="text" name="last_name" value="<?php echo $lastName; ?>">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo "<div class='error'>$lastNameError</div>"; ?>

                <label>Birthday:</label>
                <input class="input" type="date" name="birthday" id="birthday" value="<?php echo $birthday; ?>" onchange="calculateAge()">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo "<div class='error'>$birthdayError</div>"; ?>

                <label>Age:</label>
                <input class="input" type="text" name="age" id="age" value="<?php echo $age; ?>" readonly>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo "<div class='error'>$ageError</div>"; ?>

                <label>Contact Number:</label>
                <input class="input" type="text" name="contact_number" value="<?php echo $contactNumber; ?>" oninput="validateContactNumber(this)">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo "<div class='error'>$contactError</div>"; ?>

                <label>Email:</label>
                <input class="input" type="email" name="email" value="<?php echo $email; ?>">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo "<div class='error'>$emailError</div>"; ?>

                <label>Address:</label>
                <textarea class="input" name="address"><?php echo $address; ?></textarea>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo "<div class='error'>$addressError</div>"; ?>

                <label>Username:</label>
                <input class="input" type="text" name="username" value="<?php echo $username; ?>">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo "<div class='error'>$usernameError</div>"; ?>

                <label>Password:</label>
                <input class="input" type="password" name="password">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo "<div class='error'>$passwordError</div>"; ?>

                <label>Confirm Password:</label>
                <input class="input" type="password" name="confirm_password">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo "<div class='error'>$confirmPasswordError</div>"; ?>

                <input class="submit button" type="submit" name="submit" value="Register">
                <p><?php echo $successMessage; ?></p>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const container = document.querySelector('.container');
            container.classList.add('fade-in');
        });
    </script>
</body>
</html>
