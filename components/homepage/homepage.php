<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="homepage.css?v=<?php echo time(); ?>">
  <link rel="shortcut icon" type="image/png" href="/PharmaEase/PharmaEase-Final/assets/PharmaEaseLogo.png">
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <title>Welcome to PharmaEase</title>
</head>
<body>
<div class="container">
    <!-- Main Navbar -->
    <header>
      <img src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseFullLight.png" alt="PharmaEase Logo" class="logo-img">
      <nav>
        <a href="#">My Account</a>
        <a href="#">WishList</a>
        <a href="#">Shopping</a>
        <a href="#">Cart</a>
        <a href="#">Checkout</a>
      </nav>
    </header>
    <div class="navlist">
      <div>
        <a href="#">Medicines</a>
        <a href="#">Health Supplements</a>
        <a href="#">Personal Care</a>
        <a href="#">Medical Devices</a>
        <a href="#">Wellness</a>
        <a href="#">Baby Care</a>
        <a href="#">COVID Essentials</a>
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
    <!-- mask layout -->
    <section class="section-grid grid-six-col gallery" id="gallery">
        <div class="card">
        </div>
        <div class="card gallery-slider">
          <div class="gallery-slider__container">
            <figure class="gallery-slider__slide">
              <figcaption class="content">
                <h2 class="card__title">Nemesis free PSD Template</h2>
              </figcaption>
            </figure>
            <figure class="gallery-slider__slide">
              <figcaption class="content">
                <h2 class="card__title">Nemesis free PSD Template</h2>
              </figcaption>
            </figure>
            <figure class="gallery-slider__slide">
              <figcaption class="content">
                <h2 class="card__title">Nemesis free PSD Template</h2>
              </figcaption>
            </figure>
            <figure class="gallery-slider__slide">
              <figcaption class="content">
                <h2 class="card__title">Nemesis free PSD Template</h2>
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
      </section>
    <div class="details">
      <img
        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtgl0RsUF_sYU0wlqjQ3kYOhkIi25CKiM8BqI3xh_m1dOjKL9a1DZBhPmGK9xgC4bbTnQ&usqp=CAU"
        ;
        alt="mask"
      />
      <div class="stay-home">
        <p class="p1">STAY HOME,</p>
        <p class="p2">STAY SAFE.</p>
      </div>
      <ul>
        <li>Contactless Deliveries</li>
        <li>All delivery staff trained in COVID-19 preventive measures</li>
        <li>
          All Delivery and warehouse staff are equipped with medical-grade
          hand Santizers
        </li>
        <li>
          All warehouse staff undergo daily mandatory thermal temperature
          scanning
        </li>
        <li>No deliveries in 'highly affected' areas</li>
      </ul>
    </div>
    <!-- Deals of the day -->
    <h2>Deals of the day</h2>
    <div class="deals-row">
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>Sports & Fitness Gear Upto 80% Off</p>
      </div>
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>Branded Jeans Upto 50% Off</p>
      </div>
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>Branded T-Shirts Upto 60% Off</p>
      </div>
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>Sports & Fitness Gear Upto 50% Off</p>
      </div>
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>Branded Kids T-Shirts Upto 40% Off</p>
      </div>
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>Sports Girls T Shirts Upto 550% Off</p>
      </div>
    </div>
    <!-- Fashion Categories-->
    <h2 class="h2-fashion">Fashion Categories</h2>
    <div class="fashion-row">
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>Kurtas</p>
      </div>
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>Shirts</p>
      </div>
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>Pants</p>
      </div>
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>TShirts</p>
      </div>
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>Shoes</p>
      </div>
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>Casual Shirts</p>
      </div>
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>JEANS</p>
      </div>
      <div>
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS89oTOleTgYvvOuZl3zKWoSfG8Y3Ws2lXGEQ&usqp=CAU"
          alt=""
        />
        <p>Tops</p>
      </div>
    </div>

    <!-- Brands Name -->
    <div class="brands-name">
      <a href="#">Adidas |</a>
      <a href="#">Arrow |</a>
      <a href="#">Fila |</a>
      <a href="#">Online Shopping|</a>
      <a href="#">Nike |</a>
      <a href="#">Pepe Jeans |</a>
      <a href="#">Puma |</a>
      <a href="#">United Colors of Benetton |</a>
      <a href="#">Fastrack |</a>
      <a href="#">Shorts |</a>
      <a href="#">Being Human |</a>
      <a href="#">Skirts |</a>
      <a href="#">Woodland |</a>
      <a href="#">Supra Dresses Clothing |</a>
      <a href="#">Jewellery |</a>
      <a href="#">T-shirts |</a>
      <a href="#">Shoes |</a>
      <a href="#">Bags |</a>
      <a href="#">Watches |</a>
      <a href="#">Caps |</a>
      <a href="#">Shirts |</a>
      <a href="#">Bagpacks |</a>
      <a href="#">Flip Flops |</a>
      <a href="#">Sunglasses |</a>
      <a href="#">Kurtas |</a>
      <a href="#">Jackets |</a>
      <a href="#">Sketchers |</a>
      <a href="#">Saree |</a>
      <a href="#">Sandals |</a>
      <a href="#">Puma Tshirts |</a>
      <a href="#">Woodland Shoes |</a>
      <a href="#">Titan Watches |</a>
      <a href="#">Fastrack Watches |</a>
      <a href="#">Wrangler Shirts |</a>
      <a href="#">Adidas Tshirts |</a>
      <a href="#">Nike Shoes |</a>
      <a href="#">Roadster Shirts |</a>
      <a href="#">Casual Shoes |</a>
      <a href="#">Running Shoes |</a>
      <a href="#">Nike Sport Shoes |</a>
      <a href="#">Jeans |</a>
      <a href="#">Being Human |</a>
      <a href="#">Tshirts |</a>
      <a href="#">Converse Shoes |</a>
      <a href="#">Cricket Shoes |</a>
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
        <li><a href="#">Terms & Conditions of Use</a></li>
        <li><a href="#">Terms & Conditions of Membership Program</a></li>
        <li><a href="#">Offer Terms & Conditions</a></li>
        <li><a href="#">Returns & Exchange Policy</a></li>
        <li><a href="#">Shipping Policy</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Safety Checklist</a></li>
      </ul>
      <ul>
        <li><a class="head" href="#">CONTACT US</a></li>
        <li><a href="#">Customer Support</a></li>
        <li><a href="#">Store Locators</a></li>
        <li><a href="#">Help Center</a></li>
        <li class="about-us"><a href="#">About Us</a></li>
        <li><a href="#">Official Brand Store</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Careers</a></li>
      </ul>
      <ul class="social-media">
        <li><a class="head" href="#">SOCIAL</a></li>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">YouTube</a></li>
      </ul>
    </footer>
  </div>
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    const slides = document.querySelectorAll(".gallery-slider__slide");
    const dots = document.querySelectorAll(".dot");
    const nextButton = document.querySelector(".gallery-next");
    const prevButton = document.querySelector(".gallery-prev");
    let currentIndex = 0;
    let autoSlideInterval;

    function showSlide(index) {
      const container = document.querySelector(".gallery-slider__container");
      container.style.transform = `translateX(-${index * 100 / slides.length}%)`;
      dots.forEach(dot => dot.classList.remove("active"));
      dots[index].classList.add("active");
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % slides.length;
      showSlide(currentIndex);
    }

    function prevSlide() {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      showSlide(currentIndex);
    }

    function startAutoSlide() {
      autoSlideInterval = setInterval(nextSlide, 4000);
    }

    function stopAutoSlide() {
      clearInterval(autoSlideInterval);
    }

    nextButton.addEventListener("click", function() {
      stopAutoSlide();
      nextSlide();
      startAutoSlide();
    });

    prevButton.addEventListener("click", function() {
      stopAutoSlide();
      prevSlide();
      startAutoSlide();
    });

    dots.forEach((dot, index) => {
      dot.addEventListener("click", function() {
        stopAutoSlide();
        currentIndex = index;
        showSlide(currentIndex);
        startAutoSlide();
      });
    });

    showSlide(currentIndex);
    startAutoSlide();
  });
</script>
</body>
</html>