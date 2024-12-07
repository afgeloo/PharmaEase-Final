<?php
session_start();

// Database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmaease_db";

// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the product ID is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = intval($_GET['id']);

    // Fetch product details
    $sql = "
    SELECT id, name, price, description, images, sku, store FROM `sexual wellness` WHERE id = ?
    UNION ALL
    SELECT id, name, price, description, images, sku, store FROM `baby care` WHERE id = ?
    UNION ALL
    SELECT id, name, price, description, images, sku, store FROM `prescription medicines` WHERE id = ?
    UNION ALL
    SELECT id, name, price, description, images, sku, store FROM `over the counter` WHERE id = ?
    UNION ALL
    SELECT id, name, price, description, images, sku, store FROM `vitamins & suppliments` WHERE id = ?
    UNION ALL
    SELECT id, name, price, description, images, sku, store FROM `personal care` WHERE id = ?
    UNION ALL
    SELECT id, name, price, description, images, sku, store FROM `medicinal supplies` WHERE id = ?
    LIMIT 1";    

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Query preparation failed: " . $conn->error);
}
$stmt->bind_param("iiiiiii", $productId, $productId, $productId, $productId, $productId, $productId, $productId);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    die("Product not found.");
}
$stmt->close();
} else {
    die("Product ID is missing.");
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="productview.css?v=<?php echo time(); ?>">
  <link rel="shortcut icon" type="image/png" href="/PharmaEase/PharmaEase-Final/assets/PharmaEaseLogo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <title>Product View - PharmaEase</title>
  <script src="productview.js"></script>
</head>
<body>
<div class="container">
    <!-- Navbar -->
    <header>
        <a href="homepage.php">
            <img src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseFullLight.png" alt="PharmaEase Logo" class="logo-img">
        </a>
        <nav>
        <a href="homepage.php">Home</a>
        <a href="../cart/cart.php">Cart</a>
        <a href="../checkout/checkout.php">Checkout</a>
        <a href="../orderstatus/orders.php">Track Order</a>
        <a href="../myaccount/account.php">My Account</a>
        <a href="../main/main.php"><ion-icon name="log-out-outline"></ion-icon> Sign Out</a>
        </nav>
    </header>

    <!-- Product Navigation -->
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
    </div>

    <!-- Product Details -->
    <div class="product-details">
    <ul class="product-images" id="product-images-list">
        <?php
        // Assuming 'images' is a JSON string containing an array of image URLs
        $images = json_decode($product['images'], true);
        if (!empty($images)) {
            // Display the first image as the large preview image
            $firstImage = htmlspecialchars($images[0]);
            echo '<li class="preview"><img src="' . $firstImage . '" alt="Product Image" id="large-image"></li>';

            // Loop through the images and create the small images
            foreach ($images as $index => $image) {
                // We display the first image again as a small one
                if ($index == 0) {
                    echo '<li><img src="' . $firstImage . '" alt="Product Image" class="small-image" data-large-image="' . $firstImage . '"></li>';
                } else {
                    echo '<li><img src="' . htmlspecialchars($image) . '" alt="Product Image" class="small-image" data-large-image="' . htmlspecialchars($image) . '"></li>';
                }
            }
        } else {
            echo '<li class="preview"><img src="/PharmaEase/PharmaEase-Final/assets/product/default-image.jpg" alt="Default Image" id="large-image"></li>';
            echo '<li><img src="/PharmaEase/PharmaEase-Final/assets/product/default-image.jpg" alt="Default Image" class="small-image" data-large-image="/PharmaEase/PharmaEase-Final/assets/product/default-image.jpg"></li>';
        }
        ?>
    </ul>

        <ul class="product-info">
            <li class="product-name"><?php echo htmlspecialchars($product['name']); ?></li>
            <li class="product-label">Category: Sexual Wellness</li>
            <li class="product-no">Product No.: <strong><?php echo htmlspecialchars($product['id']); ?></strong></li>
            <li class="product-price">₱<?php echo number_format($product['price'], 2); ?></li>
            <li class="product-stocks">Stock: <?php echo htmlspecialchars($product['sku']); ?></li>
            <li class="product-attributes">
                <strong>Description:</strong>
                <span><?php echo htmlspecialchars($product['description']); ?></span>
            </li>
            <li class="product-attributes">
                <strong>Store:</strong>
                <span><?php echo htmlspecialchars($product['store']); ?></span>
            </li>
            <!-- Quantity Control -->
            <div class="quantitycontainer">
                <div class="quantity-control" data-quantity="">
                    <button class="quantity-btn" data-quantity-minus="">
                        <svg viewBox="0 0 409.6 409.6">
                            <g>
                                <g>
                                    <path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
                                </g>
                            </g>
                        </svg>
                    </button>
                    <input type="number" class="quantity-input" data-quantity-target="" value="1" step="1" min="1" max="" name="quantity">
                    <button class="quantity-btn" data-quantity-plus="">
                        <svg viewBox="0 0 426.66667 426.66667">
                            <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0" />
                        </svg>
                    </button>
                </div>
            </div>
            <li class="product-addtocart">
                <button type="submit">ADD TO CART</button>
            </li>
            <li class="product-description">
                <p>PharmaEase ensures that individuals can access essential medications conveniently, especially during emergencies when immediate assistance may not be available.</p>
            </li>
        </ul>
    </div>
    <!-- Footer -->
    <?php include "footer.php"; ?>
</div>
</body>
</html>
