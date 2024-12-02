<?php
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

if (isset($_POST['submit'])) { 

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

    if (empty($firstName)) {
        $firstNameError = "First Name is required";
        $errors = 1;
    }

    if (empty($lastName)) {
        $lastNameError = "Last Name is required";
        $errors = 1;
    }

    if (empty($birthday)) {
        $birthdayError = "Birthday is required";
        $errors = 1;
    }

    if (empty($age)) {
        $ageError = "Age is required";
        $errors = 1;
    } elseif (!is_numeric($age)) {
        $ageError = "Age must be a number";
        $errors = 1;
    } elseif ($age < 13) {
        $ageError = "You must be at least 13 years old";
        $errors = 1;
    }

    if (empty($contactNumber)) {
        $contactError = "Contact Number is required";
        $errors = 1;
    } elseif (!preg_match("/^\d{11}$/", $contactNumber)) {
        $contactError = "Contact number must be 11 digits";
        $errors = 1;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Email is not valid";
        $errors = 1;
    }

    if (empty($address)) {
        $addressError = "Address is required";
        $errors = 1;
    }

    if (empty($username)) {
        $usernameError = "Username is required";
        $errors = 1;
    }

    if (empty($password)) {
        $passwordError = "Password is required";
        $errors = 1;
    } elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/", $password)) {
        $passwordError = "Password must be at least 8 characters long, contain letters, numbers, and symbols";
        $errors = 1;
    }

    if ($password !== $confirmPassword) {
        $confirmPasswordError = "Passwords do not match";
        $errors = 1;
    }

    if ($errors == 0) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $checkStmt = $conn->prepare("SELECT contact_number, email, username FROM registered_users WHERE contact_number = ? OR email = ? OR username = ?");
        $checkStmt->bind_param("sss", $contactNumber, $email, $username);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            while ($checkStmt->fetch()) {
                if ($contactNumber == $contactNumber) {
                    $contactError = "Contact Number already exists.";
                }
                if ($email == $email) {
                    $emailError = "Email already exists.";
                }
                if ($username == $username) {
                    $usernameError = "Username already exists.";
                }
            }
            $errors = 1;
        }

        $checkStmt->close(); 

        if ($errors == 0) {
            // Insert new user into the database with hashed password
            $stmt = $conn->prepare("INSERT INTO registered_users (first_name, last_name, birthday, age, contact_number, email, address, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssisssss", $firstName, $lastName, $birthday, $age, $contactNumber, $email, $address, $username, $hashedPassword);

            if ($stmt->execute()) {
                $successMessage = "Form Submitted successfully!";
                $firstName = $lastName = $birthday = $age = $contactNumber = $email = $address = $username = $password = $confirmPassword = "";
            } else {
                $successMessage = "Error submitting form: " . $conn->error;
            }

            $stmt->close(); 
        }
    }
}

$conn->close(); 
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>PHP Registration Form</title>
    <link rel="stylesheet" type="text/css" href="registration.css">
    <script>
        function calculateAge() {
            var birthday = new Date(document.getElementById('birthday').value);
            var today = new Date();
            var age = today.getFullYear() - birthday.getFullYear();
            var month = today.getMonth() - birthday.getMonth();
            if (month < 0 || (month === 0 && today.getDate() < birthday.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
        }

        function validateContactNumber(input) {
            var value = input.value.replace(/\D/g, ''); 
            if (value.length > 11) {
                value = value.substring(0, 11); 
            }
            input.value = value;
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="main">
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

                <input class="submit" type="submit" name="submit" value="Register">
                <p><?php echo $successMessage; ?></p>
            </form>
        </div>
    </div>
</body>
</html>
