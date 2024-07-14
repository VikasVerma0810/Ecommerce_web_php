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
    <!--=============== BREADCRUMB ===============-->
    <section class="breadcrumb">
      <ul class="breadcrumb__list flex container">
        <li><a href="index.php" class="breadcrumb__link">Home</a></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Shop</span></li>
      </ul>
    </section>

    <!--=============== PRODUCTS ===============-->
    <section class="products section--lg container">
      

      <?php

          $category = $_GET['category'];
          // echo $category;

          if ($category == -1) {
            $sql = "SELECT product_id,category,pname,new_price,old_price, image1,image2 FROM products ";
            $result = mysqli_query($connection, $sql);
          } else {
            $sql = "SELECT product_id, category,pname,new_price,old_price, image1,image2 FROM products where category = '$category' ";
            $result = mysqli_query($connection, $sql);
          }
          $num_row=mysqli_num_rows($result);

          echo '<p class="total__products">We found <span>'.$num_row.'</span> items for you!</p>


          <div class="products__container grid">';

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
                          <a href="#" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>
        
                          <a href="Partials/wishlistHandling.php?productid=' . $product_id . '" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>
        
                          <a href="Partials/compareHandle.php?productid='.$product_id.'" class="action__btn" aria-label="Compare"><i class="fi fi-rr-shuffle"></i></a>
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
      <!-- <script src="assets/js/paggination.js"> </script> -->
      <div class="container">
        <ul class="pagination">
          <button onclick="backBtn()">
            <i class="fi-rr-angle-double-small-left"></i>
          </button>
          <li class="pagination__link link active" value="1" onclick="paggination()">01</li>

          <li class="pagination__link link" value="2" onclick="paggination()">02</li>
          <li class="pagination__link link" value="3" onclick="paggination()">03</li>
          <li class="pagination__link link" value="4" onclick="paggination()">04</li>
          <li class="pagination__link link" value="5" onclick="paggination()">05</li>

          <button onclick="nextbtn()">

            <i class="fi-rr-angle-double-small-right"></i>

          </button>
        </ul>
      </div>



    </section>

    <!--=============== NEWSLETTER ===============-->
    <?php include "Partials/newsletter.php"; ?>
  </main>

 
  <!--=============== FOOTER ===============-->
  <?php include "Partials/footer.php"; ?>
  <script src="assets/js/paggination.js"> </script>
  <!--=============== SWIPER JS ===============-->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="assets/js/main.js"></script>

  <!--=============== Bootstrap JS ===============-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>