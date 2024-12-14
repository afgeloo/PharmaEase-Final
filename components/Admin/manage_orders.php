<?php
// manage_orders.php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// // Authentication Check
// if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
//     header("Location: ../login.php");
//     exit();
// }

// Database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmaease_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

// Fetch Orders with User Information
$sql = "SELECT orders.id, registered_users.first_name, registered_users.last_name, orders.product_name, orders.quantity, orders.status
        FROM orders
        JOIN registered_users ON orders.user_id = registered_users.id
        ORDER BY orders.id DESC";
$orderResult = $conn->query($sql);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin - Manage Orders</title>
    <!-- Link to Homepage CSS for common styles -->
    <link rel="stylesheet" type="text/css" href="/PharmaEase/PharmaEase-Final/components/homepage/homepage.css?v=1.0">
    <!-- Link to Admin-Specific CSS -->
    <link rel="stylesheet" type="text/css" href="/PharmaEase/PharmaEase-Final/components/Admin/admin.css?v=1.0">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Admin Navbar -->
        <header>
            <a href="homepage.php">
                <img src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseFullLight.png" alt="PharmaEase Logo" class="logo-img">
            </a>
            <nav class="admin-nav">
                <a href="homepage.php">Home</a>
                <a href="#">Cart</a>
                <a href="#">Checkout</a>
                <a href="#">My Account</a>
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1): ?>
                    <a href="manage_orders.php">Manage Orders</a>
                    <a href="manage_products.php">Manage Products</a>
                <?php endif; ?>
            </nav>
        </header>
        <div class="navlist">
            <div>
                <a href="allproducts.php">All Products</a>
                <a href="medicines.php">Prescription Medicines</a>
                <a href="overthecounter.php">Over-the-Counter</a>
                <a href="vitsandsupps.php">Vitamins and Supplements</a>
                <a href="personalcare.php">Personal Care</a>
                <a href="medsupps.php">Medicinal Supplies</a>
                <a href="babycare.php">Baby Care</a>
                <a href="sexualwellness.php">Sexual Wellness</a>
            </div>
            <div class="search">
                <form action="#">
                    <input type="text" placeholder="Search for Products & Brands" name="search">
                </form>
            </div>
        </div>
        <!-- Your content for managing orders goes here -->
    </div>
</body>
</html>
<?php
$conn->close();
?>
<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmaease_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loginError = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $loginUsername = $_POST["username"];
    $loginPassword = $_POST["password"];

    $stmt = $conn->prepare("SELECT password, is_admin FROM registered_users WHERE username = ? OR contact_number = ? OR email = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sss", $loginUsername, $loginUsername, $loginUsername);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($storedPassword, $isAdmin);
        $stmt->fetch();

        if (password_verify($loginPassword, $storedPassword)) {
            $_SESSION['user'] = $loginUsername;
            $_SESSION['is_admin'] = $isAdmin; // Store admin status in session
            header("Location: /PharmaEase/PharmaEase-Final/components/homepage/homepage.php");
            exit();
        } else {
            $loginError = "Invalid password.";
        }
    } else {
        $loginError = "No user found with the provided credentials.";
    }
}
?>