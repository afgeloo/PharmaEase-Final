<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmaease_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// SQL query to fetch products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

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
  <script src="/PharmaEase/PharmaEase-Final/components/homepage/products.js"></script>
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
    </form>
  </div>
</div>
    </div>
    <!-- mask layout -->
    <section class="section-grid grid-six-col gallery" id="gallery">
        <div class="card">
        </div>
        <div class="card gallery-slider">
      <div class="gallery-slider__container">
        <figure class="gallery-slider__slide">
          <figcaption class="content">
          </figcaption>
        </figure>
        <figure class="gallery-slider__slide">
          <figcaption class="content">
            <h2 class="card__title">Welcome to PharmaEase</h2>
          </figcaption>
        </figure>
        <figure class="gallery-slider__slide">
          <figcaption class="content">
            <h2 class="card__title">Find the latest deals</h2>
          </figcaption>
        </figure>
        <figure class="gallery-slider__slide">
          <figcaption class="content">
            <h2 class="card__title">PharmaEase: The Medicine that’s Always Within Reach.</h2>
          </figcaption>
        </figure>
      </div>
      <div class="gallery__dots dots">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
    </div>
    <div class="card">
      <button class="slider__btn--grid gallery-next"><img src="/PharmaEase/PharmaEase-Final/assets/slider/rightArrow.png" alt="right arrow"></button>
      <button class="slider__btn--grid gallery-prev"><img src="/PharmaEase/PharmaEase-Final/assets/slider/leftArrow.png" alt="left arrow"></button>
    </div>
      </section>
    <div class="details">
      <img
        src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseLogoHD.png"
        ;
        alt="mask"
      />
      <div class="stay-home">
          <h2>PharmaEase</h2>
      </div>
          <p>PharmaEase is an online pharmacy designed to empower local pharmacies by providing a digital avenue to offer their services and products. PharmaEase ensures that individuals can access essential medications conveniently, especially during emergencies when immediate assistance may not be available. By connecting pharmacies directly with consumers, PharmaEase enhances accessibility to healthcare and supports the modernization of local pharmaceutical services. </p>
    </div>
    <!-- Deals of the day -->
    <h2>Top Products</h2>
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
                            

                            <div class="view_gallery">View gallery</div>
                            <a href="productview.php?id=<?php echo $row['id']; ?>" class="view_details">View details</a>

                            <div class="stats">
                                <div class="stats-container">
                                    <span class="product_price">₱<?php echo number_format($row['price'], 2); ?></span>
                                    <span class="product_name"><?php echo htmlspecialchars($row['name']); ?></span>
                                    <div class="product-options">
                                    <br /><strong>DESCRIPTION</strong>
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
    <?php include "footer.php"; ?>
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
    this.container.style.left = `${-this.slideWidth * dotIndex}%`;
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