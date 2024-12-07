<?php
// Admin.php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$allowedEmail = "dennislaysonjr3@gmail.com";
$allowedUsername = "dslaysonjr";

// Check if the user is authenticated
if (!isset($_SESSION['email']) || !isset($_SESSION['username']) || 
    $_SESSION['email'] !== $allowedEmail || $_SESSION['username'] !== $allowedUsername) {
    // Redirect or deny access if credentials do not match
    header("Location: ../Admin/Admin.php");
    exit;
}

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

// Handle Add Product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    // Retrieve and sanitize form inputs
    $productName = htmlspecialchars(trim($_POST['product_name']));
    $description = htmlspecialchars(trim($_POST['description']));
    $price = floatval($_POST['price']);
    $sku = htmlspecialchars(trim($_POST['sku']));
    $category = htmlspecialchars(trim($_POST['category']));
    $quantity = intval($_POST['quantity']);

    // Handle Image Upload
    $imagePaths = [];
    $uploadDirectory = "/Applications/XAMPP/xamppfiles/htdocs/pharmaease/PharmaEase-Final/assets/ProductPics/" . ucfirst(str_replace(' ', '_', $category)) . "/";

    // Create category directory if it doesn't exist
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    foreach ($_FILES['product_images']['tmp_name'] as $key => $tmp_name) {
        $file_name = basename($_FILES['product_images']['name'][$key]);
        $targetFilePath = $uploadDirectory . $file_name;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($tmp_name, $targetFilePath)) {
            $imagePaths[] = "/PharmaEase/PharmaEase-Final/assets/ProductPics/" . ucfirst(str_replace(' ', '_', $category)) . "/" . $file_name;
        }
    }

    // Convert image paths to JSON
    $imagesJson = json_encode($imagePaths);

    // Prepare SQL statement to insert new product
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, sku, category, quantity, images) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssdsiss", $productName, $description, $price, $sku, $category, $quantity, $imagesJson);
        if ($stmt->execute()) {
            $successMessage = "Product '$productName' has been added successfully.";
        } else {
            $errorMessage = "Error adding product: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $errorMessage = "Prepare failed: " . $conn->error;
    }
}

// Handle Delete Product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
    $productId = intval($_POST['product_id']);
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $productId);
    if ($stmt->execute()) {
        $successMessage = "Product ID #$productId has been deleted.";
    } else {
        $errorMessage = "Error deleting product: " . $conn->error;
    }
    $stmt->close();
}

// Fetch Orders with User Information
$sql = "SELECT orders.id, registered_users.first_name, registered_users.last_name, orders.product_name, orders.quantity, orders.status
        FROM orders
        JOIN registered_users ON orders.user_id = registered_users.id
        ORDER BY orders.id DESC";
$orderResult = $conn->query($sql);

// Fetch Products
$productSql = "SELECT * FROM products ORDER BY id DESC";
$productResult = $conn->query($productSql);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin - Manage Orders & Products</title>
    <!-- Link to Homepage CSS for common styles -->
    <link rel="stylesheet" type="text/css" href="/PharmaEase/PharmaEase-Final/components/homepage/homepage.css?v=1.0">
    <!-- Link to Admin-Specific CSS -->
    <link rel="stylesheet" type="text/css" href="/PharmaEase/PharmaEase-Final/components/Admin/admin.css?v=1.0">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Main Navbar -->
        <header>
            <a href="homepage.php">
                <img src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseFullLight.png" alt="PharmaEase Logo" class="logo-img">
            </a>
            <nav>
                <a href="homepage.php">Home</a>
                <a href="../cart/cart.php">Cart</a>
                <a href="../checkout/checkout.php">Checkout</a>
                <a href="#">My Account</a>
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

        <!-- Manage Products Section -->
        <div class="admin-container">
            <h2 class="admin-header">Admin Panel - Manage Products</h2>

            <!-- Add Product Form -->
            <div class="add-product-form">
                <h3>Add New Product</h3>
                <form action="Admin.php" method="post" enctype="multipart/form-data">
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" required>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>

                    <label for="price">Price ($):</label>
                    <input type="number" step="0.01" id="price" name="price" required>

                    <label for="sku">SKU:</label>
                    <input type="text" id="sku" name="sku" required>

                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="Vitamins_and_Supplements">Vitamins and Supplements</option>
                        <option value="Prescription_Medicines">Prescription Medicines</option>
                        <option value="Over-the-Counter">Over-the-Counter</option>
                        <option value="Personal_Care">Personal Care</option>
                        <option value="Medicinal_Supplies">Medicinal Supplies</option>
                        <option value="Baby_Care">Baby Care</option>
                        <option value="Sexual_Wellness">Sexual Wellness</option>
                        <!-- Add more categories as needed -->
                    </select>

                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" required>

                    <label for="product_images">Product Images:</label>
                    <input type="file" id="product_images" name="product_images[]" multiple accept="image/*" required>

                    <button type="submit" name="add_product" class="btn confirm-btn">Add Product</button>
                </form>
            </div>

            <!-- Remove Product List -->
            <div class="remove-product-list">
                <h3>Existing Products</h3>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price ($)</th>
                            <th>Quantity</th>
                            <th>SKU</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        if ($productResult->num_rows > 0) {
                            while($product = $productResult->fetch_assoc()) {
                                $productId = htmlspecialchars($product['id']);
                                $name = htmlspecialchars($product['name']);
                                $category = htmlspecialchars($product['category']);
                                $price = htmlspecialchars($product['price']);
                                $quantity = htmlspecialchars($product['quantity']);
                                $sku = htmlspecialchars($product['sku']);
                                
                                echo "<tr>
                                        <td>$productId</td>
                                        <td>$name</td>
                                        <td>$category</td>
                                        <td>$price</td>
                                        <td>$quantity</td>
                                        <td>$sku</td>
                                        <td>
                                            <form method='post' onsubmit=\"return confirm('Are you sure you want to delete this product?');\">
                                                <input type='hidden' name='product_id' value='$productId'>
                                                <button type='submit' name='delete_product' class='btn cancel-btn'>Delete</button>
                                            </form>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No products found.</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>