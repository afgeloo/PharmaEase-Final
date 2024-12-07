<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="orders.css?v=<?php echo time(); ?>">
  <link rel="shortcut icon" type="image/png" href="/PharmaEase/PharmaEase-Final/assets/PharmaEaseLogo.png">
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <title>PharmaEase - Order Status</title>
</head>
<body>
<div class="container">
    <!-- Main Navbar -->
    <header>
      <img src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseFullLight.png" alt="PharmaEase Logo" class="logo-img">
      <nav>
        <a href="../homepage/homepage.php">Home</a>
        <a href="../cart/cart.php">Cart</a>
        <a href="../checkout/checkout.php">Checkout</a>
        <a href="#">My Account</a>
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
        </form>
      </div>
    </div>

    <!-- Order Status Content -->
    <div class="order-status">
      <h2><ion-icon name="reader-outline"></ion-icon> Your Orders</h2>
      <!-- Order details will be dynamically loaded here -->
      <div class="order-container">
        <div class="order-details">
          <p><strong>Order Number:</strong> ORD-123456</p>
          <p><strong>Order Date:</strong> October 15, 2023</p>
          <p><strong>Order Status:</strong> Pending</p>
          <h3>Order Items:</h3>
          <ul class="order-items">
            <li>
              <img src="/path/to/product1.jpg" alt="Product 1" class="order-item-image">
              Product 1 - Quantity: 2 - Price: ₱500.00
            </li>
            <li>
              <img src="/path/to/product2.jpg" alt="Product 2" class="order-item-image">
              Product 2 - Quantity: 1 - Price: ₱300.00
            </li>
          </ul>
          <p><strong>Total Amount:</strong> ₱1300.00</p>
          <a href="../checkout/checkout.php" class="view-receipt-button">View Receipt</a>
        </div>
        <ol class="progtrckr" data-progtrckr-steps="5">
          <li class="progtrckr-done">Pending</li><!--
       --><li class="progtrckr-todo">Verifying</li><!--
       --><li class="progtrckr-todo">Packing</li><!--
       --><li class="progtrckr-todo">Shipped</li><!--
       --><li class="progtrckr-todo">Delivered</li>
        </ol>
      </div>
      <hr class="order-divider">
      <div class="order-container">
        <div class="order-details">
          <p><strong>Order Number:</strong> ORD-654321</p>
          <p><strong>Order Date:</strong> October 16, 2023</p>
          <p><strong>Order Status:</strong> Pending</p>
          <h3>Order Items:</h3>
          <ul class="order-items">
            <li>
              <img src="/path/to/product3.jpg" alt="Product 3" class="order-item-image">
              Product 3 - Quantity: 1 - Price: ₱700.00
            </li>
            <li>
              <img src="/path/to/product4.jpg" alt="Product 4" class="order-item-image">
              Product 4 - Quantity: 3 - Price: ₱200.00
            </li>
          </ul>
          <p><strong>Total Amount:</strong> ₱1300.00</p>
          <a href="../checkout/checkout.php" class="view-receipt-button">View Receipt</a>
        </div>
        <ol class="progtrckr" data-progtrckr-steps="5">
          <li class="progtrckr-done">Pending</li><!--
       --><li class="progtrckr-todo">Verifying</li><!--
       --><li class="progtrckr-todo">Packing</li><!--
       --><li class="progtrckr-todo">Shipped</li><!--
       --><li class="progtrckr-todo">Delivered</li>
        </ol>
      </div>
    </div>

    <!-- Footer -->
    <?php include "../homepage/footer.php"; ?>
</div>
</body>
</html>
