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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_quantity = $_POST['product_quantity'];

  // Check if the product is already in the cart
  if (isset($_SESSION['cart'][$product_id])) {
      // Update quantity if product already exists
      $_SESSION['cart'][$product_id]['quantity'] += $product_quantity;
  } else {
      // Add new product to cart
      $_SESSION['cart'][$product_id] = array(
          'name' => $product_name,
          'price' => $product_price,
          'quantity' => $product_quantity
      );
  }

  // Redirect to the cart page with a success message
  header("Location: cart.php?success=1");
  exit();
}
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch products
$sql = "SELECT * FROM `sexual wellness`";
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
    <!-- Main Navbar -->
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
    <!-- Cart Segment -->
    <div class="cart-container">
      <h1>Shopping Cart</h1>

      <div class="shopping-cart">

        <div class="column-labels">
          <label class="product-image">Image</label>
          <label class="product-details">Product</label>
          <label class="product-price">Price</label>
          <label class="product-quantity">Quantity</label>
          <label class="product-removal">Remove</label>
          <label class="product-line-price">Total</label>
        </div>

        <div class="product">
          <input type="checkbox" class="product-checkbox">
          <div class="product-image">
            <img src="/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/ANTIGEN.png">
          </div>
          <div class="product-details">
            <div class="product-title">Antigen</div>
            <p class="product-description">Allow for at-home testing to detect the presence of the virus. Includes nasal swabs and instructions for use.</p>
          </div>
          <div class="product-price">150.00</div>
          <div class="product-quantity">
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
              <input type="number" class="quantity-input" data-quantity-target="" value="1" step="1" min="1">
              <button class="quantity-btn" data-quantity-plus="">
                <svg viewBox="0 0 426.66667 426.66667">
                  <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0" />
                </svg>
              </button>
            </div>
          </div>
          <div class="product-removal">
            <button class="remove-product">
              Remove
            </button>
          </div>
          <div class="product-line-price">150.00</div>
        </div>

        <div class="product">
          <input type="checkbox" class="product-checkbox">
          <div class="product-image">
            <img src="/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/face shield.png">
          </div>
          <div class="product-details">
            <div class="product-title">Face Shield</div>
            <p class="product-description">It protects the face from unforeseen bacteria and diseases.</p>
          </div>
          <div class="product-price">12.05</div>
          <div class="product-quantity">
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
              <input type="number" class="quantity-input" data-quantity-target="" value="1" step="1" min="1">
              <button class="quantity-btn" data-quantity-plus="">
                <svg viewBox="0 0 426.66667 426.66667">
                  <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0" />
                </svg>
              </button>
            </div>
          </div>
          <div class="product-removal">
            <button class="remove-product">
              Remove
            </button>
          </div>
          <div class="product-line-price">12.05</div>
        </div>

        <div class="product">
          <input type="checkbox" class="product-checkbox">
          <div class="product-image">
            <img src="/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/GILLETTE SHAVING CREAM.png">
          </div>
          <div class="product-details">
            <div class="product-title">Gillette</div>
            <p class="product-description">Shaving Cream</p>
          </div>
          <div class="product-price">133.00</div>
          <div class="product-quantity">
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
              <input type="number" class="quantity-input" data-quantity-target="" value="1" step="1" min="1">
              <button class="quantity-btn" data-quantity-plus="">
                <svg viewBox="0 0 426.66667 426.66667">
                  <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0" />
                </svg>
              </button>
            </div>
          </div>
          <div class="product-removal">
            <button class="remove-product">
              Remove
            </button>
          </div>
          <div class="product-line-price">133.00</div>
        </div>

        <div class="totals">
          <div class="totals-item">
            <label>Subtotal</label>
            <div class="totals-value" id="cart-subtotal">0.00</div>
          </div>
          <div class="totals-item">
            <label>Tax (5%)</label>
            <div class="totals-value" id="cart-tax">0.00</div>
          </div>
          <div class="totals-item">
            <label>Shipping</label>
            <div class="totals-value" id="cart-shipping">0.00</div>
          </div>
          <div class="totals-item totals-item-total">
            <label>Grand Total</label>
            <div class="totals-value" id="cart-total">0.00</div>
          </div>
          <button class="checkout" style="display: none;">Checkout</button>
          <a href="../checkout/checkout.php" class="checkout-button">Proceed to Checkout</a>
        </div>
            
        

      </div>
    </div>
     <!-- Footer  -->
     <?php include "../homepage/footer.php"; ?>
</div>
</body>
</html>
