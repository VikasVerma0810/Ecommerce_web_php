<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--=============== Bootstrap  css===============-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <!--=============== FLATICON ===============-->
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

  <!--=============== SWIPER CSS ===============-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="assets/css/styles.css" />


  <title>Ecommerce Website</title>
</head>

<body>

  <!--=============== HEADER ===============-->
  <?php include 'Partials/header.php'; ?>

  <!--=============== MAIN ===============-->
  <main class="main">
    <!--=============== HOME ===============-->
    <section class="home section--lg">
      <div class="home__container container grid">
        <div class="home__content">
          <span class="home__subtitle">Hot promoyons</span>
          <h1 class="home__title">Fashion Trending <span>Great Collection</span>
          </h1>
          <p class="home__description">Save more with coupons & up to 20% off</p>
          <a href="shop.php?category=-1" class="btn">Shop Now</a>
        </div>

        <img src="assets/img/home-img.png" alt="" class="home__img">

      </div>
    </section>

    <!--=============== CATEGORIES ===============-->
    <section class="categories container section">
      <h3 class="section__title"><span>Popular</span> categories</h3>

      <div class="categories__container swiper">
        <div class="swiper-wrapper">

          <?php
          $sql = "SELECT DISTINCT  category, image1 FROM products LIMIT 6";
          $result = mysqli_query($connection, $sql);

          if ($result) {
            // Fetch each row as an associative array
            while ($row = $result->fetch_assoc()) {
              $category = $row['category'];
              $img = $row['image1'];
              echo '<a href="shop.php?category=' . $category . '" class="category__item swiper-slide">
                  <img src="' . $img . '" alt="" class="category__img">
                  <h3 class="category__title">' . $category . '</h3>
                </a>';
            }
          }
          ?>

        </div>

        <div class="swiper-button-next"><i class="fi fi-rr-angle-small-right"></i></div>
        <div class="swiper-button-prev">
          <i class="fi fi-rr-angle-small-left"></i>
        </div>
      </div>
    </section>

    <!--=============== PRODUCTS ===============-->
    <section class="products section container">
      <div class="tab_btns d-flex">
        <span class="tab_btn active-tab" data-target="#featured">Featured</span>
        <span class="tab_btn" data-target="#popular">Popular</span>
        <span class="tab_btn" data-target="#new-added">New Added</span>
      </div>

      <div class="tab__items">
        <div class="tab__item active-tab" content id="featured">
          <div class="products__container grid">

            <?php
            $sql = "SELECT product_id,category,pname,new_price,old_price, image1,image2 FROM products where is_featured =1";
            $result = mysqli_query($connection, $sql);

            if ($result) {
              // Fetch each row as an associative array
              while ($row = $result->fetch_assoc()) {
                $product_id = $row['product_id'];
                $category = $row['category'];
                $name = $row['pname'];
                $new_price = $row['new_price'];
                $old_price = $row['old_price'];
                $img2 = $row['image2'];
                $img1 = $row['image1'];

                echo '<div class="product__item">

                  <div class="product__banner">
                    <a href="details.php?productid=' . $product_id . '" class="product__images">
                      <img src="' . $img1 . '" alt="" class="product__img default">
    
                      <img src="' . $img2 . '" alt="" class="product__img hover">
                    </a>
    
                    <div class="product__actions">
                      <a href="" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>
    
                      <a href="Partials/wishlistHandling.php?productid=' . $product_id . '" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>
    
                      <a href="Partials/compareHandle.php?productid=' . $product_id . '" class="action__btn" aria-label="Compare"><i class="fi fi-rr-shuffle"></i></a>
                    </div>
    
                    <div class="product__badge light-pink">Hot</div>
                  </div>
    
                  <div class="product__content">
                    <span class="product__category">' . $category . '</span>
                    <a href="details.php">
                      <h3 class="product__title">' . $name . '</h3>
                    </a>
                    <div class="product__rating">
                      <i class="fi fi-rr-star"></i>
                      <i class="fi fi-rr-star"></i>
                      <i class="fi fi-rr-star"></i>
                      <i class="fi fi-rr-star"></i>
                      <i class="fi fi-rr-star"></i>
                    </div>
                    <div class="product__price flex">
                      <span class="new__price">$' . $new_price . '</span>
                      <span class="old__price">$' . $old_price . '</span>
                    </div>
    

                    <a href="Partials/cartHandling.php?productid=' . $product_id . '&Quantity=1" class="action__btn cart__btn" aria-label="Add To Cart"><i
                        class="fi fi-rr-shopping-bag-add"></i></a>
                  </div>
                </div>';
              }
            }
            ?>

          </div>
        </div>

        <div class="tab__item" content id="popular">
          <div class="products__container grid">

            <?php
            $sql = "SELECT product_id,category,pname,new_price,old_price, image1,image2 FROM products where is_popular =1";
            $result = mysqli_query($connection, $sql);

            if ($result) {
              // Fetch each row as an associative array
              while ($row = $result->fetch_assoc()) {
                $product_id = $row['product_id'];
                $category = $row['category'];
                $name = $row['pname'];
                $new_price = $row['new_price'];
                $old_price = $row['old_price'];
                $img2 = $row['image2'];
                $img1 = $row['image1'];

                echo ' <div class="product__item">
                  <div class="product__banner">
                    <a href="details.php?productid=' . $product_id . '" class="product__images">
                      <img src="' . $img1 . '" alt="" class="product__img default">
    
                      <img src="' . $img2 . '" alt="" class="product__img hover">
                    </a>
    
                    <div class="product__actions">
                      <a href="#" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>
    
                      <a href="Partials/wishlistHandling.php?productid=' . $product_id . '" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>
    
                      <a href="Partials/compareHandle.php?productid=' . $product_id . '" class="action__btn" aria-label="Compare"><i class="fi fi-rr-shuffle"></i></a>
                    </div>
    
                    <div class="product__badge light-pink">Hot</div>
                  </div>
    
                  <div class="product__content">
                    <span class="product__category">' . $category . '</span>
                    <a href="details.php">
                      <h3 class="product__title">' . $name . '</h3>
                    </a>
                    <div class="product__rating">
                      <i class="fi fi-rr-star"></i>
                      <i class="fi fi-rr-star"></i>
                      <i class="fi fi-rr-star"></i>
                      <i class="fi fi-rr-star"></i>
                      <i class="fi fi-rr-star"></i>
                    </div>
                    <div class="product__price flex">
                      <span class="new__price">$' . $new_price . '</span>
                      <span class="old__price">$' . $old_price . '</span>
                    </div>
    
                    <a href="Partials/cartHandling.php?productid=' . $product_id . '" class="action__btn cart__btn" aria-label="Add To Cart"><i
                        class="fi fi-rr-shopping-bag-add"></i></a>
                  </div>
                </div>';
              }
            }
            ?>


          </div>
        </div>

        <div class="tab__item" content id="new-added">
          <div class="products__container grid">

            <?php
            $sql = "SELECT product_id,category,pname,new_price,old_price, image1,image2 FROM products where is_new =1";
            $result = mysqli_query($connection, $sql);

            if ($result) {
              // Fetch each row as an associative array
              while ($row = $result->fetch_assoc()) {
                $product_id = $row['product_id'];
                $category = $row['category'];
                $name = $row['pname'];
                $new_price = $row['new_price'];
                $old_price = $row['old_price'];
                $img2 = $row['image2'];
                $img1 = $row['image1'];

                echo ' <div class="product__item">
                  <div class="product__banner">
                    <a href="details.php?productid=' . $product_id . '" class="product__images">
                      <img src="' . $img1 . '" alt="" class="product__img default">
    
                      <img src="' . $img2 . '" alt="" class="product__img hover">
                    </a>
    
                    <div class="product__actions">
                      <a href="#" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>
    
                      <a href="Partials/wishlistHandling.php?productid=' . $product_id . '" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>
    
                      <a href="Partials/compareHandle.php?productid=' . $product_id . '" class="action__btn" aria-label="Compare"><i class="fi fi-rr-shuffle"></i></a>
                    </div>
    
                    <div class="product__badge light-pink">Hot</div>
                  </div>
    
                  <div class="product__content">
                    <span class="product__category">' . $category . '</span>
                    <a href="details.php">
                      <h3 class="product__title">' . $name . '</h3>
                    </a>
                    <div class="product__rating">
                      <i class="fi fi-rr-star"></i>
                      <i class="fi fi-rr-star"></i>
                      <i class="fi fi-rr-star"></i>
                      <i class="fi fi-rr-star"></i>
                      <i class="fi fi-rr-star"></i>
                    </div>
                    <div class="product__price flex">
                      <span class="new__price">$' . $new_price . '</span>
                      <span class="old__price">$' . $old_price . '</span>
                    </div>
    
                    <a href="Partials/cartHandling.php?productid=' . $product_id . '" class="action__btn cart__btn" aria-label="Add To Cart"><i
                        class="fi fi-rr-shopping-bag-add"></i></a>
                  </div>
                </div>';
              }
            }
            ?>


          </div>
        </div>
      </div>
    </section>

    <!--=============== DEALS ===============-->
    <section class="deals section">
      <div class="deals__container container grid">
        <!-- details.php?productid='.$product_id.' -->
        <?php
        $sql = "SELECT product_id,pname,new_price,old_price, image1 FROM products where is_deal_of_the_day =1";
        $result = mysqli_query($connection, $sql);
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
          while ($row = mysqli_fetch_array($result)) {
            echo '<div class="deals__item" style=" background-image: url(' . $row['image1'] . ');background-size: cover;
                  background-position: 150px -100px; background-repeat: no-repeat;">
                            <div class="deals__group">
                              <h3 class="deals__brand">Deals of the Day</h3>
                              <span class="deals__cotegory limited_time_deal">Limites quantities.</span>
                            </div>
                  
                            <h4 class="deals__title">
                              ' . $row['pname'] . '
                            </h4>
                  
                  
                            <div class="deals__price flex">
                              <span class="new__price">$' . $row['new_price'] . '</span>
                              <span class="old__price">$' . $row['old_price'] . '</span>
                            </div>
                  
                            <div class="deals__group">
                              <p class="deals__countdown-text">Hurry Up! Offer End In:</p>
                  
                              <div class="countdown" >
                               
                                  <div class="countdown__amount">
                                    <p class="countdown__period" id="hours' . $row['product_id'] . '">22</p>
                                    <span class="unit">Hours</span>
                                  </div>
                    
                                  <div class="countdown__amount">
                                    <p class="countdown__period" id="minute' . $row['product_id'] . '">57</p>
                                    <span class="unit">Mins</span>
                                  </div>
                    
                                  <div class="countdown__amount">
                                    <p class="countdown__period" id="second' . $row['product_id'] . '">24</p>
                                    <span class="unit">Sec</span>
                                  </div>
                              </div>
                              <script> 
                              function startCountdown(pid) {
                                var today = new Date();
                                var tomorrow = new Date(today.getTime() + (24 * 60 * 60 * 1000));
                                
                                var x = setInterval(function () {
                                  var now = new Date().getTime();
                                  var diff = tomorrow - now;
                          
                                  var days = Math.floor(diff / (1000 * 60 * 60 * 24));
                                  var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                  var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                                  var seconds = Math.floor((diff % (1000 * 60)) / 1000);
                          
                                  // document.getElementById("days' . $row['product_id'] . '").innerHTML = days;
                                  document.getElementById("hours' . $row['product_id'] . '").innerHTML = hours;
                                  document.getElementById("minute' . $row['product_id'] . '").innerHTML = minutes;
                                  document.getElementById("second' . $row['product_id'] . '").innerHTML = seconds;
                          
                                  if (diff < 0) {
                                    clearInterval(x);
                                    document.getElementById("countdown").innerHTML = "EXPIRED";
                                  }
                                }, 1000);
                              }
                          
                              // Call the function with your desired destination date and time
                              startCountdown(); 
                              </script>
                            </div>
                  
                            <div class="deals__btn">
                              <a href="details.php?productid=' . $row['product_id'] . '" class="btn btn--md">Shop Now</a>
                            </div>
                        </div>';
          }
        }

        ?>
        <!-- <div class="deals__item">
          <div class="deals__group">
            <h3 class="deals__brand">Deals of the Day</h3>
            <span class="deals__cotegory limited_time_deal">Limites quantities.</span>
          </div>

          <h4 class="deals__title">
            Summer Collection New Morden Design
          </h4>


          <div class="deals__price flex">
            <span class="new__price">$139.00</span>
            <span class="old__price">$160.99</span>
          </div>

          <div class="deals__group">
            <p class="deals__countdown-text">Hurry Up! Offer End In:</p>

            <div class="countdown">
              <div class="countdown__amount">
                <p class="countdown__period">02</p>
                <span class="unit">Days</span>
              </div>

              <div class="countdown__amount">
                <p class="countdown__period">22</p>
                <span class="unit">Hours</span>
              </div>

              <div class="countdown__amount">
                <p class="countdown__period">57</p>
                <span class="unit">Mins</span>
              </div>

              <div class="countdown__amount">
                <p class="countdown__period">24</p>
                <span class="unit">Sec</span>
              </div>
            </div>
          </div>

          <div class="deals__btn">
            <a href="details.php" class="btn btn--md">Shop Now</a>
          </div>
        </div>

        <div class="deals__item">
          <div class="deals__group">
            <h3 class="deals__brand">Women Clothing</h3>
            <span class="deals__cotegory limited_time_deal">Limites quantities.</span>
          </div>

          <h4 class="deals__title">
            Try Something new on vacation
          </h4>

          <div class="deals__price flex">
            <span class="new__price">$139.00</span>
            <span class="old__price">$160.99</span>
          </div>

          <div class="deals__group">
            <p class="deals__countdown-text">Hurry Up! Offer End In:</p>

            <div class="countdown">
              <div class="countdown__amount">
                <p class="countdown__period">02</p>
                <span class="unit">Days</span>
              </div>

              <div class="countdown__amount">
                <p class="countdown__period">22</p>
                <span class="unit">Hours</span>
              </div>

              <div class="countdown__amount">
                <p class="countdown__period">57</p>
                <span class="unit">Mins</span>
              </div>

              <div class="countdown__amount">
                <p class="countdown__period">24</p>
                <span class="unit">Sec</span>
              </div>
            </div>
          </div>

          <div class="deals__btn">
            <a href="details.php" class="btn btn--md">Shop Now</a>
          </div>
        </div> -->
      </div>
    </section>

    <!--=============== NEW ARRIVALS ===============-->
    <!-- <section class="new__arrivals container section">
      <h3 class="section__title"><span>New </span> Arrival</h3>

      <div class="new__container swiper">
        <div class="swiper-wrapper">
          <div class="product__item swiper-slide">
            <div class="product__banner">
              <a href="details.php" class="product__images">
                <img src="assets/img/product-1-1.jpg" alt="" class="product__img default">

                <img src="assets/img/product-1-2.jpg" alt="" class="product__img hover">
              </a>

              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>

                <a href="#" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>

                <a href="#" class="action__btn" aria-label="Compare"><i class="fi fi-rr-shuffle"></i></a>
              </div>

              <div class="product__badge light-pink">Hot</div>
            </div>

            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.php">
                <h3 class="product__title">Colorfull Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>

              <a href="#" class="action__btn cart__btn" aria-label="Add To Cart"><i
                  class="fi fi-rr-shopping-bag-add"></i></a>
            </div>
          </div>

          <div class="product__item swiper-slide">
            <div class="product__banner">
              <a href="details.php" class="product__images">
                <img src="assets/img/product-2-1.jpg" alt="" class="product__img default">

                <img src="assets/img/product-2-2.jpg" alt="" class="product__img hover">
              </a>

              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>

                <a href="#" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>

                <a href="#" class="action__btn" aria-label="Compare"><i class="fi fi-rr-shuffle"></i></a>
              </div>

              <div class="product__badge light-green">Hot</div>
            </div>

            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.php">
                <h3 class="product__title">Colorfull Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>

              <a href="#" class="action__btn cart__btn" aria-label="Add To Cart"><i
                  class="fi fi-rr-shopping-bag-add"></i></a>
            </div>
          </div>

          <div class="product__item swiper-slide">
            <div class="product__banner">
              <a href="details.php" class="product__images">
                <img src="assets/img/product-3-1.jpg" alt="" class="product__img default">

                <img src="assets/img/product-3-2.jpg" alt="" class="product__img hover">
              </a>

              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>

                <a href="#" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>

                <a href="#" class="action__btn" aria-label="Compare"><i class="fi fi-rr-shuffle"></i></a>
              </div>

              <div class="product__badge light-orange">Hot</div>
            </div>

            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.php">
                <h3 class="product__title">Colorfull Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>

              <a href="#" class="action__btn cart__btn" aria-label="Add To Cart"><i
                  class="fi fi-rr-shopping-bag-add"></i></a>
            </div>
          </div>

          <div class="product__item swiper-slide">
            <div class="product__banner">
              <a href="details.php" class="product__images">
                <img src="assets/img/product-4-1.jpg" alt="" class="product__img default">

                <img src="assets/img/product-4-2.jpg" alt="" class="product__img hover">
              </a>

              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>

                <a href="#" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>

                <a href="#" class="action__btn" aria-label="Compare"><i class="fi fi-rr-shuffle"></i></a>
              </div>

              <div class="product__badge light-blue">Hot</div>
            </div>

            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.php">
                <h3 class="product__title">Colorfull Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>

              <a href="#" class="action__btn cart__btn" aria-label="Add To Cart"><i
                  class="fi fi-rr-shopping-bag-add"></i></a>
            </div>
          </div>

          <div class="product__item swiper-slide">
            <div class="product__banner">
              <a href="details.php" class="product__images">
                <img src="assets/img/product-5-1.jpg" alt="" class="product__img default">

                <img src="assets/img/product-5-2.jpg" alt="" class="product__img hover">
              </a>

              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>

                <a href="#" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>

                <a href="#" class="action__btn" aria-label="Compare"><i class="fi fi-rr-shuffle"></i></a>
              </div>

              <div class="product__badge light-pink">-30%</div>
            </div>

            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.php">
                <h3 class="product__title">Colorfull Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>

              <a href="#" class="action__btn cart__btn" aria-label="Add To Cart"><i
                  class="fi fi-rr-shopping-bag-add"></i></a>
            </div>
          </div>

          <div class="product__item swiper-slide">
            <div class="product__banner">
              <a href="details.php" class="product__images">
                <img src="assets/img/product-6-1.jpg" alt="" class="product__img default">

                <img src="assets/img/product-6-2.jpg" alt="" class="product__img hover">
              </a>

              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>

                <a href="#" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>

                <a href="#" class="action__btn" aria-label="Compare"><i class="fi fi-rr-shuffle"></i></a>
              </div>

              <div class="product__badge light-pink">-22%</div>
            </div>

            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.php">
                <h3 class="product__title">Colorfull Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>

              <a href="#" class="action__btn cart__btn" aria-label="Add To Cart"><i
                  class="fi fi-rr-shopping-bag-add"></i></a>
            </div>
          </div>

          <div class="product__item swiper-slide">
            <div class="product__banner">
              <a href="details.php" class="product__images">
                <img src="assets/img/product-7-1.jpg" alt="" class="product__img default">

                <img src="assets/img/product-7-2.jpg" alt="" class="product__img hover">
              </a>

              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>

                <a href="#" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>

                <a href="#" class="action__btn" aria-label="Compare"><i class="fi fi-rr-shuffle"></i></a>
              </div>

              <div class="product__badge light-green">Hot</div>
            </div>

            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.php">
                <h3 class="product__title">Colorfull Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>

              <a href="#" class="action__btn cart__btn" aria-label="Add To Cart"><i
                  class="fi fi-rr-shopping-bag-add"></i></a>
            </div>
          </div>

          <div class="product__item swiper-slide">
            <div class="product__banner">
              <a href="details.php" class="product__images">
                <img src="assets/img/product-8-1.jpg" alt="" class="product__img default">

                <img src="assets/img/product-8-2.jpg" alt="" class="product__img hover">
              </a>

              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>

                <a href="#" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>

                <a href="#" class="action__btn" aria-label="Compare"><i class="fi fi-rr-shuffle"></i></a>
              </div>

            </div>

            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.php">
                <h3 class="product__title">Colorfull Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
                <i class="fi fi-rr-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>

              <a href="#" class="action__btn cart__btn" aria-label="Add To Cart"><i
                  class="fi fi-rr-shopping-bag-add"></i></a>
            </div>
          </div>
        </div>

        <div class="swiper-button-next"><i class="fi fi-rr-angle-small-right"></i></div>
        <div class="swiper-button-prev">
          <i class="fi fi-rr-angle-small-left"></i>
        </div>
      </div>
    </section> -->

    <!--=============== SHOWCASE ===============-->
    <section class="showcase section">
      <div class="showcase__container container grid">
        <div class="showcase__wrapper">
          <h3 class="section__title">Hot Release</h3>

          <?php
          $sql = "SELECT product_id,pname,new_price,old_price, image1 FROM products where is_hot_release =1";
          $result = mysqli_query($connection, $sql);

          if ($result) {
            // Fetch each row as an associative array
            while ($row = $result->fetch_assoc()) {
              $product_id = $row['product_id'];
              $name = $row['pname'];
              $new_price = $row['new_price'];
              $old_price = $row['old_price'];
              $img1 = $row['image1'];

              echo '<div class="showcase__item">
              <a href="details.php?productid=' . $product_id . '" class="showcase__img-box">
                <img src="' . $img1 . '" alt="" class="showcase__img">
              </a>
  
              <div class="showcase__content">
                <a href="details.php?productid=' . $product_id . '">
                  <h4 class="showcase__title">
                    ' . $name . '
                  </h4>
                </a>
  
                <div class="showcase__price flex">
                  <span class="new__price">$' . $new_price . '</span>
                  <span class="old__price">$' . $old_price . '</span>
                </div>
              </div>
            </div>';
            }
          }
          ?>


        </div>

        <div class="showcase__wrapper">
          <h3 class="section__title">Deals & Outlet</h3>


          <?php
          $sql = "SELECT product_id,pname,new_price,old_price, image1 FROM products where is_outlet =1";
          $result = mysqli_query($connection, $sql);

          if ($result) {
            // Fetch each row as an associative array
            while ($row = $result->fetch_assoc()) {
              $product_id = $row['product_id'];
              $name = $row['pname'];
              $new_price = $row['new_price'];
              $old_price = $row['old_price'];
              $img1 = $row['image1'];

              echo '<div class="showcase__item">
                <a href="details.php?productid=' . $product_id . '" class="showcase__img-box">
                  <img src="' . $img1 . '" alt="" class="showcase__img">
                </a>
    
                <div class="showcase__content">
                  <a href="details.php?productid=' . $product_id . '">
                    <h4 class="showcase__title">
                      ' . $name . '
                    </h4>
                  </a>
    
                  <div class="showcase__price flex">
                    <span class="new__price">$' . $new_price . '</span>
                    <span class="old__price">$' . $old_price . '</span>
                  </div>
                  <div class="limited_time_deal">Limited Time Deals</div>
                </div>
              </div>';
            }
          }
          ?>



        </div>

        <div class="showcase__wrapper">
          <h3 class="section__title">Top Selling</h3>

          <?php
          $sql = "SELECT product_id, pname,new_price,old_price, image1 FROM products where is_top_selling =1";
          $result = mysqli_query($connection, $sql);

          if ($result) {
            // Fetch each row as an associative array
            while ($row = $result->fetch_assoc()) {
              $product_id = $row['product_id'];
              $name = $row['pname'];
              $new_price = $row['new_price'];
              $old_price = $row['old_price'];
              $img1 = $row['image1'];

              echo '<div class="showcase__item">
                <a href="details.php?productid=' . $product_id . '" class="showcase__img-box">
                  <img src="' . $img1 . '" alt="" class="showcase__img">
                </a>
    
                <div class="showcase__content">
                  <a href="details.php?productid=' . $product_id . '">
                    <h4 class="showcase__title">
                      ' . $name . '
                    </h4>
                  </a>
    
                  <div class="showcase__price flex">
                    <span class="new__price">$' . $new_price . '</span>
                    <span class="old__price">$' . $old_price . '</span>
                  </div>
                </div>
              </div>';
            }
          }
          ?>



        </div>

        <div class="showcase__wrapper">
          <h3 class="section__title">Trendy</h3>

          <?php
          $sql = "SELECT product_id,pname,new_price,old_price, image1 FROM products where is_trending =1";
          $result = mysqli_query($connection, $sql);

          if ($result) {
            // Fetch each row as an associative array
            while ($row = $result->fetch_assoc()) {
              $product_id = $row['product_id'];
              $name = $row['pname'];
              $new_price = $row['new_price'];
              $old_price = $row['old_price'];
              $img1 = $row['image1'];

              echo '<div class="showcase__item">
                <a href="details.php?productid=' . $product_id . '" class="showcase__img-box">
                  <img src="' . $img1 . '" alt="" class="showcase__img">
                </a>
    
                <div class="showcase__content">
                  <a href="details.php?productid=' . $product_id . '">
                    <h4 class="showcase__title">
                      ' . $name . '
                    </h4>
                  </a>
    
                  <div class="showcase__price flex">
                    <span class="new__price">$' . $new_price . '</span>
                    <span class="old__price">$' . $old_price . '</span>
                  </div>
                </div>
              </div>';
            }
          }
          ?>

        </div>
      </div>
    </section>

    <!--=============== NEWSLETTER ===============-->
    <?php include "Partials/newsletter.php"; ?>

  </main>

  <!--=============== FOOTER ===============-->
  <?php include "Partials/footer.php"; ?>

  <!--=============== SWIPER JS ===============-->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="assets/js/main.js"></script>

  <!--=============== Bootstrap JS ===============-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>