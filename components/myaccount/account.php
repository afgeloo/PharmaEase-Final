<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="account.css?v=<?php echo time(); ?>">
  <link rel="shortcut icon" type="image/png" href="/PharmaEase/PharmaEase-Final/assets/PharmaEaseLogo.png">
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <title>PharmaEase - My Account</title>
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
        <a href="../orderstatus/orders.php">Track Order</a>
        <a href="account.php">My Account</a>
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

    <!-- Account Content -->
    <div class="account-content">
      <h2>My Account</h2>
      <div class="account-details">
        <p><strong>Name:</strong> John Doe</p>
        <p><strong>Username:</strong> johndoe123</p>
        <p><strong>Contact No.:</strong> 123-456-7890</p>
        <p><strong>Email:</strong> johndoe@example.com</p>
        <p><strong>Saved Address:</strong> 123 Main St, City, Country</p>
      </div>
      <a href="../main/forgotpassword.php" class="reset-password-button">Reset Password</a>
      <a href="../main/main.php" class="reset-password-button"><ion-icon name="log-out-outline"></ion-icon> Sign Out</a>
    </div>

    <!-- Footer -->
    <?php include "../homepage/footer.php"; ?>
</div>
</body>
</html>
