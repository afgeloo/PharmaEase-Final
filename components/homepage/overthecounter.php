<?php
session_start();

// Database connection variables
$servername = "localhost"; // Replace with your database server
$username = "root";        // Replace with your MySQL username
$password = "";            // Replace with your MySQL password
$dbname = "pharmaease_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch products
$sql = "SELECT * FROM `over the counter`
        ORDER BY RAND()";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="overthecounter.css?v=<?php echo time(); ?>">
  <link rel="shortcut icon" type="image/png" href="/PharmaEase/PharmaEase-Final/assets/PharmaEaseLogo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <title>PharmaEase - Over-the-Counter</title>
  <script src="\PharmaEase\PharmaEase-Final\components\homepage\products.js"></script>
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
        <a href="../myaccount/account.php">My Account</a>
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
    
    <div id="grid-selector">
               <div id="grid-menu">
                      View:
                   <ul>           	   
                       <li class="largeGrid"><a href=""></a></li>
                       <li class="smallGrid"><a class="active" href=""></a></li>
                   </ul>
               </div>
               
               Showing 1–9 of 48 results 
        </div>
        
        <div id="grid">
        <?php
        // Check if products are available
        if ($result->num_rows > 0) {
            // Loop through each product and display it
            while($row = $result->fetch_assoc()) {
                $images = json_decode($row['images'], true); // Decode the images from JSON format
                ?>
                
                <div class="product">
                    <!-- Product Info -->
                    <div class="info-large">
                        <h4><?php echo htmlspecialchars($row['name']); ?></h4>
                        <div class="sku">
                            PRODUCT NO.: <strong><?php echo htmlspecialchars($row['sku']); ?></strong>
                        </div>

                        <div class="price-big">
                            <span>₱<?php echo number_format($row['original_price'], 2); ?></span> 
                            ₱<?php echo number_format($row['price'], 2); ?>
                        </div>

                        <h3>DESCRIPTION</h3>
                        <div class="colors-large">
                            <span><?php echo htmlspecialchars($row['description']); ?></span>
                        </div>

                        <h3>STORE</h3>
                        <div class="sizes-large">
                            <span><?php echo htmlspecialchars($row['store']); ?></span>
                        </div>

                        <button class="add-cart-large">Add To Cart</button>
                    </div>

                    <!-- 3D Product Display -->
                    <div class="make3D">
                        <div class="product-front">
                            <div class="shadow"></div>
                            <?php
                            // Check if there are images and display the first one
                            if (!empty($images)) {
                                echo '<img src="' . htmlspecialchars($images[0]) . '" alt="Product Front Image" />';
                            } else {
                                echo '<img src="/path/to/default-image.jpg" alt="Default Front Image" />';
                            }
                            ?>
                            <div class="image_overlay"></div>
                            <div class="add_to_cart">Add to cart</div>
                            <div class="view_gallery">View gallery</div>
                            <a href="productview.php?id=<?php echo $row['id']; ?>" class="view_details">View details</a>

                            <div class="stats">
                                <div class="stats-container">
                                    <span class="product_price">₱<?php echo number_format($row['price'], 2); ?></span>
                                    <span class="product_name"><?php echo htmlspecialchars($row['name']); ?></span>
                                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                                    <div class="product-options">
                                        <strong>DESCRIPTION</strong>
                                        <span><?php echo htmlspecialchars($row['description']); ?></span>
                                        <strong>STORE</strong>
                                        <div class="colors">
                                            <span><?php echo htmlspecialchars($row['store']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Back (Carousel) -->
                        <div class="product-back">
                            <div class="shadow"></div>
                            <div class="carousel">
                                <ul class="carousel-container">
                                    <?php
                                    // Display additional images if available (up to 3 images)
                                    if (!empty($images)) {
                                        $carousel_images = array_slice($images, 0, 3); // Show up to 3 images in carousel
                                        foreach ($carousel_images as $image) {
                                            echo '<li><img src="' . htmlspecialchars($image) . '" alt="Product Image" /></li>';
                                        }
                                    } else {
                                        echo '<li><img src="/path/to/default-image.jpg" alt="Default Image" /></li>';
                                    }
                                    ?>
                                </ul>
                                <div class="arrows-perspective">
                                    <div class="carouselPrev">
                                        <div class="y"></div>
                                        <div class="x"></div>
                                    </div>
                                    <div class="carouselNext">
                                        <div class="y"></div>
                                        <div class="x"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="flip-back">
                                <div class="cy"></div>
                                <div class="cx"></div>
                            </div>
                        </div>
                    </div>  
                </div>
                <?php
            }
        } else {
            echo "No products found.";
        }
        ?>
        
    </div>
    <!-- Footer  -->
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
  <script>
const _ = className => document.querySelector(className);
const __ = className => document.querySelectorAll(className);
// slide width in %

class Slider {
  constructor(next, prev, slides, dots, container, slideWidth, slideIndex = 0, timer = 0) {
    Object.assign(this, {
      next,
      prev,
      slides,
      dots,
      container,
      slideWidth,
      slideIndex,
      timer
    });
  };

  // NEXT CLICK
  moveRight() {
    this.slideIndex++;
    if (this.slideIndex === this.slides.length) {
      this.slideIndex = 0;
      this.dots.forEach(dot => {
        dot.classList.remove('active');
      });
      this.dots[this.slideIndex].classList.add('active');
    } else {
      this.dots.forEach(dot => {
        dot.classList.remove('active');
      });
      this.dots[this.slideIndex].classList.add('active');
    };
    this.container.style.left = `${-this.slideWidth*this.slideIndex}%`;
  };
  nextListener() {
    this.next.addEventListener('click', () => {
      this.moveRight();
    });
  };

  // PREV CLICK
  moveLeft() {
    if (this.slideIndex <= 0) this.slideIndex = this.slides.length;
    this.slideIndex--;
    this.container.style.left = `${-this.slideWidth*this.slideIndex}%`;
    this.dots.forEach(dot => {
      dot.classList.remove('active');
    });
    this.dots[this.slideIndex].classList.add('active');
  };
  prevListener() {
    this.prev.addEventListener('click', () => {
      this.moveLeft();
    });
  };

  // DOTS CLICK
  dotSelect(e) {
    let dotsArray = Array.from(this.dots);
    this.dots.forEach(dot => {
      dot.classList.remove('active');
    });
    e.target.classList.add('active');
    let dotIndex = dotsArray.indexOf(e.target);
    this.container.style.left = `${-this.slideWidth*dotIndex}%`;
    this.slideIndex = dotIndex;
  };

  // AUTO RUN
  autoRun() {
    this.timer = setInterval(() => {
      this.moveRight();
    }, 5000); // Slow down the slider speed to 5 seconds
  };

  // STOP AUTORUN
  clearAutoRun() {
    this.next.addEventListener('mouseenter', () => {
      clearInterval(this.timer);
    });
    this.prev.addEventListener('mouseenter', () => {
      clearInterval(this.timer);
    });
    this.dots.forEach(dot => {
      dot.addEventListener('mouseenter', () => {
        clearInterval(this.timer);
      });
    });
  };

  // RESTORE AUTORUN
  restoreAutoRun() {
    this.next.addEventListener('mouseleave', () => {
      this.autoRun();
    });
    this.prev.addEventListener('mouseleave', () => {
      this.autoRun();
    });
    this.dots.forEach(dot => {
      dot.addEventListener('mouseleave', () => {
        this.autoRun();
      });
    });
  };

  // INIT SLIDER
  init() {
    this.nextListener();
    this.prevListener();
    this.dots.forEach(dot => {
      dot.addEventListener('click', (e) => {
        this.dotSelect(e);
      });
    });
    this.autoRun();
    this.clearAutoRun();
    this.restoreAutoRun();
  };
};

// INIT GALLERY SLIDER
const gallerySlider = new Slider(_('.gallery-next'), _('.gallery-prev'), __('.gallery-slider__slide'), __('.gallery__dots .dot'), _('.gallery-slider__container'), 100);
gallerySlider.init();
</script>
</body>
</html>