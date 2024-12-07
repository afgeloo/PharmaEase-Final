<?php
session_start();
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
    <!-- Main Navbar -->
    <header>
      <a href="homepage.php">
        <img src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseFullLight.png" alt="PharmaEase Logo" class="logo-img">
      </a>
      <nav>
        <a href="homepage.php">Home</a>
        <a href="#">Cart</a>
        <a href="#">Checkout</a>
        <a href="#">My Account</a>
        <a href="../main/main.php"><ion-icon name="log-out-outline"></ion-icon> Sign Out</a>
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
    <div class="product-details">
      <ul class="product-images">
        <li class="preview"><img src="/PharmaEase/PharmaEase-Final/assets/product/facemask1.png" alt="Product Image"></li>
        <li><img src="/PharmaEase/PharmaEase-Final/assets/product/facemask1.png" alt="Product Image"></li>
        <li><img src="/PharmaEase/PharmaEase-Final/assets/product/facemask2.png" alt="Product Image"></li>
        <li><img src="/PharmaEase/PharmaEase-Final/assets/product/facemask3.png" alt="Product Image"></li>
      </ul>
      <ul class="product-info">
        <li class="product-name">Disposable Facemask</li>
        <li class="product-label">Medicinal Supplies</li>
        <li class="product-no">Product No.: <strong>2</strong></li>
        <li class="product-price">₱50.00</li>
        <li class="product-stocks">Stocks: 5234</li>
        <li class="product-attributes">
          <strong>DESCRIPTION:</strong>
          <span>3-ply with earloop disposable face mask, filters droplets, pollen, dust and other air particulates.</span>
        </li>
        <li class="product-attributes">
        <strong>STORE:</strong>
        <span>Mercury Drug</span>
        </li>
        <li class="product-attributes">
        <strong>QUANTITY</strong>
        </li>
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
          <button>ADD TO CART</button>
        </li>
        <li class="product-description">
          <p>PharmaEase ensures that individuals can access essential medications conveniently, especially during emergencies when immediate assistance may not be available.</p>
        </li>
      </ul>
    </div>
    <!-- Footer  -->
    <?php include "footer.php"; ?>
</body>
</html>
