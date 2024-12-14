<?php
session_start();

// Database connection variables
$servername = "localhost"; // Replace with your database server
$username = "root";        // Replace with your MySQL username
$password = "";            // Replace with your MySQL password
$dbname = "pharmaease_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add product to cart
    if (isset($_POST['add_to_cart'])) {
        $product_image = $_POST['product_image'];
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $quantity = intval($_POST['quantity']); // Ensure quantity is an integer
        $product_description = $_POST['product_description'];

        // Check if the product is already in the cart
        if (isset($_SESSION['cart'][$product_id])) {
            // Update quantity if product already exists
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            // Add new product to cart
            $_SESSION['cart'][$product_id] = array(
                'images' => $product_image,
                'name' => $product_name,
                'price' => $product_price,
                'description' => $product_description,
                'quantity' => $quantity
            );
        }
        // Redirect to the cart page after adding the product
        header("Location: cart.php?success=1");
        exit();
    }

    // Remove product from cart
    if (isset($_POST['remove_product']) && isset($_POST['product_id_to_remove'])) {
        $product_id_to_remove = $_POST['product_id_to_remove'];

        // Check if product is in the cart
        if (isset($_SESSION['cart'][$product_id_to_remove])) {
            unset($_SESSION['cart'][$product_id_to_remove]); // Remove the product
        }

        // Redirect to the cart page after removal
        header("Location: cart.php");
        exit();
    }
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch products
$sql = "SELECT * FROM `sexual wellness`
        UNION ALL
        SELECT * FROM `prescription medicines`
        UNION ALL
        SELECT * FROM `over the counter`
        UNION ALL
        SELECT * FROM `vitamins & suppliments`
        UNION ALL
        SELECT * FROM `personal care`
        UNION ALL
        SELECT * FROM `medicinal supplies`
        UNION ALL
        SELECT * FROM `baby care`
        ORDER BY RAND()";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="cart.css?v=<?php echo time(); ?>">
  <link rel="shortcut icon" type="image/png" href="/PharmaEase/PharmaEase-Final/assets/PharmaEaseLogo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <title>PharmaEase - Shopping Cart</title>
  <script src="\PharmaEase\PharmaEase-Final\components\cart\cart.js"></script>
</head>
<body>
<div class="container">
    <header>
      <img src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseFullLight.png" alt="PharmaEase Logo" class="logo-img">
      <nav>
        <a href="../homepage/homepage.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="../checkout/checkout.php">Checkout</a>
        <a href="../orderstatus/orders.php">Track Order</a>
        <a href="../myaccount/account.php">My Account</a>
        <a href="../main/main.php"><ion-icon name="log-out-outline"></ion-icon> Sign Out</a>
      </nav>
    </header>
    
    <div class="navlist">
      <div>
      <a href="../homepage/allproducts.php">All Products</a>
        <a href="../homepage/medicines.php">Prescription Medicines</a>
        <a href="../homepage/overthecounter.php">Over-the-Counter</a>
        <a href="../homepage/vitsandsupps.php">Vitamins and Supplements</a>
        <a href="../homepage/personalcare.php">Personal Care</a>
        <a href="../homepage/medsupps.php">Medicinal Supplies</a>
        <a href="../homepage/babycare.php">Baby Care</a>
        <a href="../homepage/sexualwellness.php">Sexual Wellness</a>
      </div>
      <div class="search">
        <form action="#">
          <input
            type="text"
            placeholder="Search for Products & Brands"
            name="search"
          />
          <!-- <button>
            <i class="fa fa-search" style="font-size: 18px"> </i>
          </button> -->
        </form>
      </div>
    </div>

    <div class="cart-container">
      <h1>Shopping Cart</h1>

      <div class="shopping-cart">

        <div class="column-labels">
          <label class="product-image">Image</label>
          <label class="product-details">Product</label>
          <label class="product-price">Price</label>
          <label class="quantity">Quantity</label>
          <label class="product-removal">Remove</label>
          <label class="product-line-price">Total</label>
        </div>

        <?php
    // Display products in cart
    if (isset($_SESSION['cart'])) {
        $subtotal = 0; // Initialize subtotal
        foreach ($_SESSION['cart'] as $product_id => $product_details) {
            $product_image = $product_details['images'];
            $product_name = $product_details['name'];
            $product_description = isset($product_details['description']) ? $product_details['description'] : 'No description available'; // Check if description exists
            $product_price = $product_details['price'];
            $quantity = isset($product_details['quantity']) ? $product_details['quantity'] : 1; // Default to 1 if not set

            // Update subtotal
            $subtotal += $product_price * $quantity;
            ?>
            <div class="product">
                <input type="checkbox" class="product-checkbox">
                <div class="product-image">
                    <img src="<?php echo htmlspecialchars($product_image); ?>" alt="<?php echo htmlspecialchars($product_name); ?>"> <!-- Correct image path -->
                </div>
                <div class="product-details">
                    <div class="product-title"><?php echo htmlspecialchars($product_name); ?></div>
                    <p class="product-description"><?php echo htmlspecialchars($product_description); ?></p> <!-- Display description -->
                </div>
                <div class="product-price"><?php echo number_format($product_price, 2); ?></div>
                <div class="quantity">
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
                    <!-- Display the quantity in the input field -->
                    <input type="number" class="quantity-input" value="<?php echo $quantity; ?>" step="1" min="1" data-quantity-target readonly>
                    <button class="quantity-btn" data-quantity-plus="">
                        <svg viewBox="0 0 426.66667 426.66667">
                            <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0" />
                        </svg>
                    </button>
                </div>
                </div>
                <div class="product-removal">
                <!-- Remove button form -->
                <form method="POST" action="">
                    <button class="remove-product" type="submit" name="remove_product">Remove</button>
                    <input type="hidden" name="product_id_to_remove" value="<?php echo $product_id; ?>">
                </form>
            </div>
                <div class="product-line-price"><?php echo number_format($product_price * $quantity, 2); ?></div>
            </div>
        <?php
        }
    }
    ?>
    <div class="totals">
        <div class="totals-item">
            <label>Subtotal</label>
            <div class="totals-value" id="cart-subtotal"><?php echo number_format($subtotal, 2); ?></div>
        </div>
        <div class="totals-item">
            <label>Tax (5%)</label>
            <div class="totals-value" id="cart-tax"><?php echo number_format($subtotal * 0.05, 2); ?></div>
        </div>
        <div class="totals-item">
            <label>Shipping</label>
            <div class="totals-value" id="cart-shipping">0.00</div>
        </div>
        <div class="totals-item totals-item-total">
            <label>Grand Total</label>
            <div class="totals-value" id="cart-total"><?php echo number_format($subtotal * 1.05, 2); ?></div>
        </div>
        <button class="checkout" style="display: none;">Checkout</button>
        <a href="../checkout/checkout.php" class="checkout-button">Proceed to Checkout</a>
    </div>
    <?php include "../homepage/footer.php"; ?>
</body>
</html>


