<?php
session_start();

// Database connection variables
$servername = "localhost"; // Replace with your database server
$username = "root";        // Replace with your MySQL username
$password = "";            // Replace with your MySQL password
$dbname = "pharmaease_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if (!isset($_SESSION['cart2'])) {
  $_SESSION['cart2'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_quantity = $_POST['product_quantity'];
  

  // Check if the product is already in the cart2
  if (isset($_SESSION['cart2'][$product_id])) {
      // Update quantity if product already exists
      $_SESSION['cart2'][$product_id]['quantity'] += $product_quantity;
  } else {
      // Add new product to cart2
      $_SESSION['cart2'][$product_id] = array(
          'name' => $product_name,
          'price' => $product_price,
          'quantity' => $product_quantity,
          'description' => $product_description 
      );
  }

  // Redirect to the cart2 page with a success message
  header("Location: cart2.php?success=1");
  exit();
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
  <script src="\PharmaEase\PharmaEase-Final\components\cart2\cart2.js"></script>
</head>
<body>
<div class="container">
    <header>
      <img src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseFullLight.png" alt="PharmaEase Logo" class="logo-img">
      <nav>
        <a href="../homepage/homepage.php">Home</a>
        <a href="cart2.php">Cart</a>
        <a href="../checkout/checkout.php">Checkout</a>
        <a href="../orderstatus/orders.php">Track Order</a>
        <a href="../myaccount/account.php">My Account</a>
        <a href="../main/main.php"><ion-icon name="log-out-outline"></ion-icon> Sign Out</a>
      </nav>
    </header>
    <div class="cart2-container">
      <h1>Shopping Cart</h1>

      <div class="shopping-cart2">

        <div class="column-labels">
          <label class="product-image">Image</label>
          <label class="product-details">Product</label>
          <label class="product-price">Price</label>
          <label class="product-quantity">Quantity</label>
          <label class="product-removal">Remove</label>
          <label class="product-line-price">Total</label>
        </div>

        <?php
        // Display products in cart2
// Display products in cart2
if (isset($_SESSION['cart2'])) {
    foreach ($_SESSION['cart2'] as $product_id => $product_details) {
        $product_name = $product_details['name'];
        $product_description = $product_details['description']; // Correctly access the description
        $product_price = $product_details['price'];
        $product_quantity = $product_details['quantity'];
        ?>
        <div class="product">
            <div class="product-image">
                <img src="/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/<?php echo $product_name; ?>.png">
            </div>
            <div class="product-details">
                <div class="product-title"><?php echo $product_name; ?></div>
                <p class="product-description"><?php echo $product_description; ?></p> <!-- Display description -->
            </div>
            <div class="product-price"><?php echo $product_price; ?></div>
            <div class="product-quantity">
                <div class="quantity-control" data-quantity="">
                    <button class="quantity-btn" data-quantity-minus="">
                        <svg viewBox="0 0 409.6 409.6">
                            <path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
                        </svg>
                    </button>
                    <input type="number" class="quantity-input" value="<?php echo $product_quantity; ?>" step="1" min="1">
                    <button class="quantity-btn" data-quantity-plus="">
                        <svg viewBox="0 0 426.66667 426.66667">
                            <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="product-removal">
                <button class="remove-product">Remove</button>
            </div>
            <div class="product-line-price"><?php echo $product_price * $product_quantity; ?></div>
        </div>
        <?php
    }
}
?>

        

      </div>
    </div>
</body>
</html>
