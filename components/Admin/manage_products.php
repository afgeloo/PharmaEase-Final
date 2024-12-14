<?php
// manage_products.php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
    die("Connection failed: " . $conn->connect_error);
}

// Handle product deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_product'])) {
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

// Handle product update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_product'])) {
    $productId = intval($_POST['product_id']);
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = floatval($_POST['price']);
    $stock = intval($_POST['stock']);
    $sku = $_POST['sku'];

    $stmt = $conn->prepare("UPDATE products SET name = ?, category = ?, price = ?, quantity = ?, sku = ? WHERE id = ?");
    $stmt->bind_param("ssdisi", $name, $category, $price, $quantity, $sku, $productId);
    if ($stmt->execute()) {
        $successMessage = "Product ID #$productId has been updated.";
    } else {
        $errorMessage = "Error updating product: " . $conn->error;
    }
    $stmt->close();
}

// Fetch Products
$productSql = "SELECT * FROM products ORDER BY id DESC";
$productResult = $conn->query($productSql);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin - Manage Products</title>
    <!-- Link to Homepage CSS for common styles -->
    <link rel="stylesheet" type="text/css" href="/PharmaEase/PharmaEase-Final/components/homepage/homepage.css?v=1.0">
    <!-- Link to Admin-Specific CSS -->
    <link rel="stylesheet" type="text/css" href="/PharmaEase/PharmaEase-Final/components/Admin/admin.css?v=1.0">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/PharmaEase/PharmaEase-Final/assets/PharmaEaseLogo.png">
</head>
<body>
    <div class="container">
        <!-- Main Navbar -->
        <header>
            <img src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseFullLight.png" alt="PharmaEase Logo" class="logo-img">
            <nav>
                <a href="homepage.php">Home</a>
                <a href="../cart/cart.php">Cart</a>
                <a href="../checkout/checkout.php">Checkout</a>
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
        <!-- Products Management Section -->
        <div class="admin-container">
            <h2 class="admin-header">Manage Products</h2>
            <?php if (isset($successMessage)): ?>
                <p class="success-message"><?php echo $successMessage; ?></p>
            <?php endif; ?>
            <?php if (isset($errorMessage)): ?>
                <p class="error-message"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
            <?php if ($productResult->num_rows > 0): ?>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>SKU</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($product = $productResult->fetch_assoc()): ?>
                            <?php
                                $productId = htmlspecialchars($product['id']);
                                $name = htmlspecialchars($product['name']);
                                $category = htmlspecialchars($product['category']);
                                $price = htmlspecialchars($product['price']);
                                $quantity = htmlspecialchars($product['stock']);
                                $sku = htmlspecialchars($product['label']);
                            ?>
                            <tr>
                                <td><?php echo $productId; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $category; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td><?php echo $sku; ?></td>
                                <td>
                                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" style="display:inline;">
                                        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                        <button type="submit" name="delete_product" class="btn cancel-btn">Delete</button>
                                    </form>
                                    <button class="btn edit-btn" onclick="openEditForm(<?php echo $productId; ?>, '<?php echo $name; ?>', '<?php echo $category; ?>', <?php echo $price; ?>, <?php echo $quantity; ?>, '<?php echo $sku; ?>')">Edit</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No products found.</p>
            <?php endif; ?>
        </div>
        <!-- Edit Product Form -->
        <div id="editForm" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeEditForm()">&times;</span>
                <h2>Edit Product</h2>
                <form method="POST">
                    <input type="hidden" id="edit_product_id" name="product_id">
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="edit_product_name" name="product_name" required>
                    <label for="category">Category:</label>
                    <input type="text" id="edit_category" name="category" required>
                    <label for="price">Price:</label>
                    <input type="number" step="0.01" id="edit_price" name="price" required>
                    <label for="stock">Stock:</label>
                    <input type="number" id="edit_stock" name="stock" required>
                    <label for="sku">SKU:</label>
                    <input type="text" id="edit_sku" name="sku" required>
                    <button type="submit" name="edit_product" class="btn confirm-btn">Update Product</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function openEditForm(id, name, category, price, stock, sku) {
            document.getElementById('edit_product_id').value = id;
            document.getElementById('edit_product_name').value = name;
            document.getElementById('edit_category').value = category;
            document.getElementById('edit_price').value = price;
            document.getElementById('edit_stock').value = stock;
            document.getElementById('edit_sku').value = sku;
            document.getElementById('editForm').style.display = 'block';
        }

        function closeEditForm() {
            document.getElementById('editForm').style.display = 'none';
        }
    </script>
</body>
</html>
<?php
$conn->close();
?>