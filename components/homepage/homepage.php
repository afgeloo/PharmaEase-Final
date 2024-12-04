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
            <div class="product">
                <div class="info-large">
                    <h4>DISPOSABLE FACEMASK</h4>
                    <div class="sku">
                        PRODUCT NO.: <strong>89356</strong>
                    </div>
                     
                    <div class="price-big">
                        <span>₱80</span> ₱50
                    </div>
                     
                    <h3>DESCRIPTION</h3>
                    <div class="colors-large">
                        <span>3-ply with earloop disposable face mask, filters droplets, pollen, dust and other air particulates.</span>
                    </div>
        
                    <h3>STORE</h3>
                    <div class="sizes-large">
                         <span>Mercury Drug</span>
                    </div>
                    
                    <button class="add-cart-large">Add To Cart</button>                          
                                 
                </div>
                <div class="make3D">
                    <div class="product-front">
                        <div class="shadow"></div>
                        <img src="/PharmaEase/PharmaEase-Final/assets/product/facemask1.png" alt="" />
                        <div class="image_overlay"></div>
                        <div class="add_to_cart">Add to cart</div>
                        <div class="view_gallery">View gallery</div>                
                        <div class="stats">        	
                            <div class="stats-container">
                                <span class="product_price">₱50</span>
                                <span class="product_name">DISPOSABLE FACEMASK</span>    
                                <p>Essentials</p>                                            
                                
                                <div class="product-options">
                                <strong>DESCRIPTION</strong>
                                <span> 3-ply with earloop, filters droplets, and other air particulates.</span>
                                <strong>STORE</strong>
                                <div class="colors">
                                <span>Mercury Drug</span>
                                </div>
                            </div>                       
                            </div>                         
                        </div>
                    </div>
                    
                    <div class="product-back">
                        <div class="shadow"></div>
                        <div class="carousel">
                            <ul class="carousel-container">
                                <li><img src="/PharmaEase/PharmaEase-Final/assets/product/facemask1.png" alt="" /></li>
                                <li><img src="/PharmaEase/PharmaEase-Final/assets/product/facemask2.png" alt="" /></li>
                                <li><img src="/PharmaEase/PharmaEase-Final/assets/product/facemask3.png" alt="" /></li>
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
            
            
            <div class="product">
            <div class="info-large">
                    <h4>PLEAT PRINTED DRESS</h4>
                    <div class="sku">
                        PRODUCT SKU: <strong>89356</strong>
                    </div>
                     
                    <div class="price-big">
                        <span>$43</span> $39
                    </div>
                     
                    <h3>COLORS</h3>
                    <div class="colors-large">
                        <ul>
                            <li><a href="" style="background:#222"><span></span></a></li>
                            <li><a href="" style="background:#6e8cd5"><span></span></a></li>
                            <li><a href="" style="background:#f56060"><span></span></a></li>
                            <li><a href="" style="background:#44c28d"><span></span></a></li>
                        </ul> 
                    </div>
        
                    <h3>SIZE</h3>
                    <div class="sizes-large">
                         <span>XS</span>
                        <span>S</span>
                        <span>M</span>
                        <span>L</span>
                        <span>XL</span>
                        <span>XXL</span>
                    </div>
                    
                    <button class="add-cart-large">Add To Cart</button>                          
                                 
                </div>
                <div class="make3D">
                    <div class="product-front">
                        <div class="shadow"></div>
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/2.jpg" alt="" />
                        <div class="image_overlay"></div>
                        <div class="add_to_cart">Add to cart</div>
                        <div class="view_gallery">View gallery</div>
                        <div class="stats">        	
                            <div class="stats-container">
                                <span class="product_price">$39</span>
                                <span class="product_name">PLEAT PRINTED DRESS</span>    
                                <p>Summer dress</p>                                            
                                
                                <div class="product-options">
                                <strong>SIZES</strong>
                                <span>XS, S, M, L, XL, XXL</span>
                                <strong>COLORS</strong>
                                <div class="colors">
                                    <div class="c-blue"><span></span></div>
                                    <div class="c-red"><span></span></div>
                                    <div class="c-white"><span></span></div>
                                    <div class="c-green"><span></span></div>
                                </div>
                            </div>                       
                            </div>                         
                        </div>
                    </div>
                    
                    <div class="product-back">
                        <div class="shadow"></div>
                        <div class="carousel">
                            <ul class="carousel-container">
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/2.jpg" alt="" /></li>
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/3.jpg" alt="" /></li>
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/4.jpg" alt="" /></li>
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
            
            <div class="product">
            <div class="info-large">
                    <h4>FLOWY SHIRT DRESS</h4>
                    <div class="sku">
                        PRODUCT SKU: <strong>89356</strong>
                    </div>
                     
                    <div class="price-big">
                        <span>$43</span> $39
                    </div>
                     
                    <h3>COLORS</h3>
                    <div class="colors-large">
                        <ul>
                            <li><a href="" style="background:#222"><span></span></a></li>
                            <li><a href="" style="background:#6e8cd5"><span></span></a></li>
                            <li><a href="" style="background:#f56060"><span></span></a></li>
                            <li><a href="" style="background:#44c28d"><span></span></a></li>
                        </ul> 
                    </div>
        
                    <h3>SIZE</h3>
                    <div class="sizes-large">
                         <span>XS</span>
                        <span>S</span>
                        <span>M</span>
                        <span>L</span>
                        <span>XL</span>
                        <span>XXL</span>
                    </div>
                    
                    <button class="add-cart-large">Add To Cart</button>                          
                                 
                </div>
                <div class="make3D">        
                    <div class="product-front">
                        <div class="shadow"></div>
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/3.jpg" alt="" />
                        <div class="image_overlay"></div>
                        <div class="add_to_cart">Add to cart</div>
                        <div class="view_gallery">View gallery</div>
                        <div class="stats">        	
                            <div class="stats-container">
                                <span class="product_price">$39</span>
                                <span class="product_name">FLOWY SHIRT DRESS</span>    
                                <p>Summer dress</p>                                            
                                
                                <div class="product-options">
                                <strong>SIZES</strong>
                                <span>XS, S, M, L, XL, XXL</span>
                                <strong>COLORS</strong>
                                <div class="colors">
                                    <div class="c-blue"><span></span></div>
                                    <div class="c-red"><span></span></div>
                                    <div class="c-white"><span></span></div>
                                    <div class="c-green"><span></span></div>
                                </div>
                            </div>                       
                            </div>                         
                        </div>
                    </div>
                    
                    <div class="product-back">
                        <div class="shadow"></div>
                        <div class="carousel">
                            <ul class="carousel-container">
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/3.jpg" alt="" /></li>
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/4.jpg" alt="" /></li>
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/1.jpg" alt="" /></li>
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
            
            
            <div class="product">
            <div class="info-large">
                    <h4>DOUBLE LAYER DRESS</h4>
                    <div class="sku">
                        PRODUCT SKU: <strong>89356</strong>
                    </div>
                     
                    <div class="price-big">
                        <span>$43</span> $39
                    </div>
                     
                    <h3>COLORS</h3>
                    <div class="colors-large">
                        <ul>
                            <li><a href="" style="background:#222"><span></span></a></li>
                            <li><a href="" style="background:#6e8cd5"><span></span></a></li>
                            <li><a href="" style="background:#f56060"><span></span></a></li>
                            <li><a href="" style="background:#44c28d"><span></span></a></li>
                        </ul> 
                    </div>
        
                    <h3>SIZE</h3>
                    <div class="sizes-large">
                         <span>XS</span>
                        <span>S</span>
                        <span>M</span>
                        <span>L</span>
                        <span>XL</span>
                        <span>XXL</span>
                    </div>
                    
                    <button class="add-cart-large">Add To Cart</button>                          
                                 
                </div>
                <div class="make3D">
                    <div class="product-front">
                        <div class="shadow"></div>
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/4.jpg" alt="" />
                        <div class="image_overlay"></div>
                        <div class="add_to_cart">Add to cart</div>
                        <div class="view_gallery">View gallery</div>
                        <div class="stats">        	
                            <div class="stats-container">
                                <span class="product_price">$39</span>
                                <span class="product_name">DOUBLE LAYER DRESS</span>    
                                <p>Summer dress</p>                                            
                                
                                <div class="product-options">
                                <strong>SIZES</strong>
                                <span>XS, S, M, L, XL, XXL</span>
                                <strong>COLORS</strong>
                                <div class="colors">
                                    <div class="c-blue"><span></span></div>
                                    <div class="c-red"><span></span></div>
                                    <div class="c-white"><span></span></div>
                                    <div class="c-green"><span></span></div>
                                </div>
                            </div>                       
                            </div>                         
                        </div>
                    </div>
                    
                    <div class="product-back">
                        <div class="shadow"></div>
                        <div class="carousel">
                            <ul class="carousel-container">
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/4.jpg" alt="" /></li>
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/6.jpg" alt="" /></li>
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/7.jpg" alt="" /></li>
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
            
            <div class="product">
            <div class="info-large">
                    <h4>BEAD DETAIL DRESS</h4>
                    <div class="sku">
                        PRODUCT SKU: <strong>89356</strong>
                    </div>
                     
                    <div class="price-big">
                        <span>$43</span> $39
                    </div>
                     
                    <h3>COLORS</h3>
                    <div class="colors-large">
                        <ul>
                            <li><a href="" style="background:#222"><span></span></a></li>
                            <li><a href="" style="background:#6e8cd5"><span></span></a></li>
                            <li><a href="" style="background:#f56060"><span></span></a></li>
                            <li><a href="" style="background:#44c28d"><span></span></a></li>
                        </ul> 
                    </div>
        
                    <h3>SIZE</h3>
                    <div class="sizes-large">
                         <span>XS</span>
                        <span>S</span>
                        <span>M</span>
                        <span>L</span>
                        <span>XL</span>
                        <span>XXL</span>
                    </div>
                    
                    <button class="add-cart-large">Add To Cart</button>                          
                                 
                </div>
                <div class="make3D">
                    <div class="product-front">
                        <div class="shadow"></div>
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/5.jpg" alt="" />
                        <div class="image_overlay"></div>
                        <div class="add_to_cart">Add to cart</div>
                        <div class="view_gallery">View gallery</div>
                        <div class="stats">        	
                            <div class="stats-container">
                                <span class="product_price">$39</span>
                                <span class="product_name">BEAD DETAIL DRESS</span>    
                                <p>Summer dress</p>                                            
                                
                                <div class="product-options">
                                <strong>SIZES</strong>
                                <span>XS, S, M, L, XL, XXL</span>
                                <strong>COLORS</strong>
                                <div class="colors">
                                    <div class="c-blue"><span></span></div>
                                    <div class="c-red"><span></span></div>
                                    <div class="c-white"><span></span></div>
                                    <div class="c-green"><span></span></div>
                                </div>
                            </div>                       
                            </div>                         
                        </div>
                    </div>
                    
                    <div class="product-back">
                        <div class="shadow"></div>
                        <div class="carousel">
                            <ul class="carousel-container">
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/5.jpg" alt="" /></li>
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/7.jpg" alt="" /></li>
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
            
            
            <div class="product">
            <div class="info-large">
                    <h4>PLEATED DETAIL DRESS</h4>
                    <div class="sku">
                        PRODUCT SKU: <strong>89356</strong>
                    </div>
                     
                    <div class="price-big">
                        <span>$43</span> $39
                    </div>
                     
                    <h3>COLORS</h3>
                    <div class="colors-large">
                        <ul>
                            <li><a href="" style="background:#222"><span></span></a></li>
                            <li><a href="" style="background:#6e8cd5"><span></span></a></li>
                            <li><a href="" style="background:#9b887b"><span></span></a></li>
                            <li><a href="" style="background:#44c28d"><span></span></a></li>
                        </ul> 
                    </div>
        
                    <h3>SIZE</h3>
                    <div class="sizes-large">
                         <span>XS</span>
                        <span>S</span>
                        <span>M</span>
                        <span>L</span>
                        <span>XL</span>
                        <span>XXL</span>
                    </div>
                    
                    <button class="add-cart-large">Add To Cart</button>                          
                                 
                </div>
                <div class="make3D">
                    <div class="product-front">
                        <div class="shadow"></div>
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/6.jpg" alt="" />
                        <div class="image_overlay"></div>
                        <div class="add_to_cart">Add to cart</div>
                        <div class="view_gallery">View gallery</div>
                        <div class="stats">        	
                            <div class="stats-container">
                                <span class="product_price">$39</span>
                                <span class="product_name">PLEATED DETAIL DRESS</span>    
                                <p>Summer dress</p>                                            
                                
                                <div class="product-options">
                                <strong>SIZES</strong>
                                <span>XS, S, M, L, XL, XXL</span>
                                <strong>COLORS</strong>
                                <div class="colors">
                                    <div class="c-blue"><span></span></div>
                                    <div class="c-red"><span></span></div>
                                    <div class="c-white"><span></span></div>
                                    <div class="c-green"><span></span></div>
                                </div>
                            </div>                       
                            </div>                         
                        </div>
                    </div>
                    
                    <div class="product-back">
                        <div class="shadow"></div>
                        <div class="carousel">
                            <ul class="carousel-container">
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/6.jpg" alt="" /></li>
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/7.jpg" alt="" /></li>
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
            
            <div class="product">
            <div class="info-large">
                    <h4>PRINTED DRESS</h4>
                    <div class="sku">
                        PRODUCT SKU: <strong>89356</strong>
                    </div>
                     
                    <div class="price-big">
                        <span>$43</span> $39
                    </div>
                     
                    <h3>COLORS</h3>
                    <div class="colors-large">
                        <ul>
                            <li><a href="" style="background:#222"><span></span></a></li>
                            <li><a href="" style="background:#6e8cd5"><span></span></a></li>
                            <li><a href="" style="background:#9b887b"><span></span></a></li>
                            <li><a href="" style="background:#44c28d"><span></span></a></li>
                        </ul> 
                    </div>
        
                    <h3>SIZE</h3>
                    <div class="sizes-large">
                         <span>XS</span>
                        <span>S</span>
                        <span>M</span>
                        <span>L</span>
                        <span>XL</span>
                        <span>XXL</span>
                    </div>
                    
                    <button class="add-cart-large">Add To Cart</button>                          
                                 
                </div>
                <div class="make3D">
                    <div class="product-front">
                        <div class="shadow"></div>
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/7.jpg" alt="" />
                        <div class="image_overlay"></div>
                        <div class="add_to_cart">Add to cart</div>
                        <div class="view_gallery">View gallery</div>
                        <div class="stats">        	
                            <div class="stats-container">
                                <span class="product_price">$39</span>
                                <span class="product_name">PRINTED DRESS</span>    
                                <p>Summer dress</p>                                            
                                
                                <div class="product-options">
                                <strong>SIZES</strong>
                                <span>XS, S, M, L, XL, XXL</span>
                                <strong>COLORS</strong>
                                <div class="colors">
                                    <div class="c-blue"><span></span></div>
                                    <div class="c-red"><span></span></div>
                                    <div class="c-white"><span></span></div>
                                    <div class="c-green"><span></span></div>
                                </div>
                            </div>                       
                            </div>                         
                        </div>
                    </div>
                    
                    <div class="product-back">
                        <div class="shadow"></div>
                        <div class="carousel">
                            <ul class="carousel-container">
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/7.jpg" alt="" /></li>
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/5.jpg" alt="" /></li>
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/4.jpg" alt="" /></li>
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
            
            <div class="product">
            <div class="info-large">
                    <h4>PRINTED DRESS</h4>
                    <div class="sku">
                        PRODUCT SKU: <strong>89356</strong>
                    </div>
                     
                    <div class="price-big">
                        <span>$43</span> $39
                    </div>
                     
                    <h3>COLORS</h3>
                    <div class="colors-large">
                        <ul>
                            <li><a href="" style="background:#222"><span></span></a></li>
                            <li><a href="" style="background:#6e8cd5"><span></span></a></li>
                            <li><a href="" style="background:#9b887b"><span></span></a></li>
                            <li><a href="" style="background:#44c28d"><span></span></a></li>
                        </ul> 
                    </div>
        
                    <h3>SIZE</h3>
                    <div class="sizes-large">
                         <span>XS</span>
                        <span>S</span>
                        <span>M</span>
                        <span>L</span>
                        <span>XL</span>
                        <span>XXL</span>
                    </div>
                    
                    <button class="add-cart-large">Add To Cart</button>                          
                                 
                </div>
                <div class="make3D">
                    <div class="product-front">
                        <div class="shadow"></div>
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/8.jpg" alt="" />
                        <div class="image_overlay"></div>
                        <div class="add_to_cart">Add to cart</div>
                        <div class="view_gallery">View gallery</div>
                        <div class="stats">        	
                            <div class="stats-container">
                                <span class="product_price">$39</span>
                                <span class="product_name">PRINTED DRESS</span>    
                                <p>Summer dress</p>                                            
                                
                                <div class="product-options">
                                <strong>SIZES</strong>
                                <span>XS, S, M, L, XL, XXL</span>
                                <strong>COLORS</strong>
                                <div class="colors">
                                    <div class="c-blue"><span></span></div>
                                    <div class="c-red"><span></span></div>
                                    <div class="c-white"><span></span></div>
                                    <div class="c-green"><span></span></div>
                                </div>
                            </div>                       
                            </div>                         
                        </div>
                    </div>
                    
                    <div class="product-back">
                        <div class="shadow"></div>
                        <div class="carousel">
                            <ul class="carousel-container">
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/8.jpg" alt="" /></li>
                                <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/7.jpg" alt="" /></li>
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
        </div>
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