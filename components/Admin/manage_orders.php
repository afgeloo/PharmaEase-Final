<?php
// manage_orders.php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Authentication Check
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

// Handle Confirm Order
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_order'])) {
    $orderId = intval($_POST['order_id']);
    $stmt = $conn->prepare("UPDATE orders SET status = 'Confirmed' WHERE id = ?");
    $stmt->bind_param("i", $orderId);
    if ($stmt->execute()) {
        $successMessage = "Order #$orderId has been confirmed.";
    } else {
        $errorMessage = "Error confirming order: " . $conn->error;
    }
    $stmt->close();
}

// Handle Cancel Order
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancel_order'])) {
    $orderId = intval($_POST['order_id']);
    $stmt = $conn->prepare("UPDATE orders SET status = 'Cancelled' WHERE id = ?");
    $stmt->bind_param("i", $orderId);
    if ($stmt->execute()) {
        $successMessage = "Order #$orderId has been cancelled.";
    } else {
        $errorMessage = "Error cancelling order: " . $conn->error;
    }
    $stmt->close();
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
                <a href="manage_orders.php" class="active">Manage Orders</a>
                <a href="manage_products.php">Manage Products</a>
                <a href="../logout.php">Logout</a>
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
                    <input type="text" placeholder="Search for Products & Brands" name="search" />
                </form>
            </div>
        </div>

        <!-- Manage Orders Section -->
        <div class="admin-container">
            <h2 class="admin-header">Admin Panel - Manage Orders</h2>
            <?php
            if (isset($successMessage)) {
                echo "<div class='message success'>$successMessage</div>";
            }
            if (isset($errorMessage)) {
                echo "<div class='message error'>$errorMessage</div>";
            }
            ?>
            <div class="table-responsive">
                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>User Name</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    if ($orderResult->num_rows > 0) {
                        while($row = $orderResult->fetch_assoc()) {
                            $orderId = htmlspecialchars($row['id']);
                            $userName = htmlspecialchars($row['first_name'] . ' ' . $row['last_name']);
                            $product = htmlspecialchars($row['product_name']);
                            $quantity = htmlspecialchars($row['quantity']);
                            $status = htmlspecialchars($row['status']);
                            
                            echo "<tr>
                                    <td>$orderId</td>
                                    <td>$userName</td>
                                    <td>$product</td>
                                    <td>$quantity</td>
                                    <td>$status</td>
                                    <td>";
                            if ($status !== 'Confirmed' && $status !== 'Cancelled') {
                                echo "<form method='post' style='display:inline; margin-right:5px;'>
                                        <input type='hidden' name='order_id' value='$orderId'>
                                        <button type='submit' name='confirm_order' class='btn confirm-btn' onclick=\"return confirm('Are you sure you want to confirm this order?');\">Confirm</button>
                                      </form>
                                      <form method='post' style='display:inline;'>
                                        <input type='hidden' name='order_id' value='$orderId'>
                                        <button type='submit' name='cancel_order' class='btn cancel-btn' onclick=\"return confirm('Are you sure you want to cancel this order?');\">Cancel</button>
                                      </form>";
                            } else {
                                echo "-";
                            }
                            echo "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No orders found.</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>