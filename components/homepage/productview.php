<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="homepage.css?v=<?php echo time(); ?>">
  <link rel="shortcut icon" type="image/png" href="/PharmaEase/PharmaEase-Final/assets/PharmaEaseLogo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <title>Welcome to PharmaEase</title>
  <script src="\PharmaEase\PharmaEase-Final\components\homepage\products.js"></script>
</head>
<body>
<div class="container">
    <!-- Main Navbar -->
    <header>
      <img src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseFullLight.png" alt="PharmaEase Logo" class="logo-img">
      <nav>
        <a href="#">My Account</a>
        <a href="#">Cart</a>
        <a href="#">Checkout</a>
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
      <div class="row">
  <div class="col-xl-8">
    <form action="#" class="search-box spaced-elements">
      <div class="select-form">
        <div class="select-itms">
          <input list="select1" name="select" placeholder="Search PharmaEase">
        </div>
      </div>
      <div class="select-form">
        <div class="select-itms">
          <select name="category" id="category">
            <option value="" disabled selected>Sort by Category</option>
            <option value="prescription">Prescription Medicines</option>
            <option value="overthecounter">Over-the-Counter</option>
            <option value="vitamins">Vitamins & Supplements</option>
            <option value="personalcare">Personal Care</option>
            <option value="medicinalsupplies">Medicinal Supplies</option>
            <option value="babycare">Baby Care</option>
            <option value="sexualwellness">Sexual Wellness</option>
          </select>
        </div>
      </div>
      <div class="select-form">
        <div class="select-itms">
          <select name="store" id="store">
            <option value="" disabled selected>Sort by Store</option>
            <option value="mercury">Mercury Drug</option>
            <option value="tgp">The Generics Pharmacy</option>
            <option value="generika">Generika</option>
            <option value="southstar">Southstar Drug</option>
            <option value="watsons">Watsons</option>
          </select>
        </div>
      </div>
      <div class="search-form">
        <a href="#"><img src="/PharmaEase/PharmaEase-Final/assets/search.png" alt="Search" class="searchIcon"></a>
      </div>
    </form>
  </div>
</div>
    </div>

    <footer>
      <ul>
        <li><a class="head" href="#">MY ACCOUNT</a></li>
        <li><a href="#">Orders</a></li>
        <li><a href="#">Returns/Refunds</a></li>
        <li><a href="#">Track Order</a></li>
        <li><a href="#">Frequently Asked Questions</a></li>
      </ul>
      <ul>
        <li><a class="head" href="#">POLICIES</a></li>
        <li><a href="#">Payment Options</a></li>
        <li><a href="#">Terms & Conditions</a></li>
        <li><a href="#">Returns & Exchange Policy</a></li>
        <li><a href="#">Shipping Policy</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Safety Checklist</a></li>
        <li><a href="#">License</a></li>
      </ul>
      <ul>
        <li><a class="head" href="#">CONTACT US</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Customer Support</a></li>
        <li><a href="#">Help Center</a></li>
        <li><a href="#">Local Pharmacies</a></li>
        <li><a href="#">Partnerships</a></li>
      </ul>
      <ul class="social-media">
        <li><a class="head" href="#">SOCIAL</a></li>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Tiktok</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">YouTube</a></li>
      </ul>
    </footer>
  </div>
</body>
</html>
