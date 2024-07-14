<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== Bootstrap  css===============-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!--=============== FLATICON ===============-->
    <link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

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
     
      <!--=============== PRODUCTS ===============-->
      <section class="products section--lg container">
        <p class="total__products">We found <span>688</span> items for you!</p>

        <div class="products__container grid">

        <?php
          
            $sql = "select * from products where match(pname,description,category) against ('$_GET[search]'); ";
            $result = mysqli_query($connection, $sql);
            $num_row = mysqli_num_rows($result);
            
            if ($num_row>0) {
                // Fetch each row as an associative array
                while ($row = mysqli_fetch_assoc($result)) {
                  $product_id = $row['product_id'];
                  $category = $row['category'];
                  $name = $row['pname'];
                  $new_price = $row['new_price'];
                  $old_price = $row['old_price'];
                  $img2 = $row['image2'];
                  $img1 = $row['image1'];

                  echo '<div class="product__item">

                    <div class="product__banner">
                      <a href="details.php?productid='.$product_id.'" class="product__images">
                        <img src="' . $img2 . '" alt="" class="product__img default">
      
                        <img src="' . $img1 . '" alt="" class="product__img hover">
                      </a>
      
                      <div class="product__actions">
                        <a href="#" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>
      
                        <a href="Partials/wishlistHandling.php?productid='.$product_id.'" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>
      
                        <a href="#" class="action__btn" aria-label="Compare"><i class="fi fi-rr-shuffle"></i></a>
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
      
                      <a href="Partials/cartHandling.php?productid='.$product_id.'&Quantity=1" class="action__btn cart__btn" aria-label="Add To Cart"><i
                          class="fi fi-rr-shopping-bag-add"></i></a>
                    </div>
                  </div>';
                }
              }
              else
              {
                echo ' <div class="jumbotron jumbotron-fluid mb-5">
                            <div class="container">
                                <p class="display-5">No Result Found</p>
                                <p class="lead">Try Another keyword</p>
                            </div>
                        </div>';
              }
            ?>
        
        </div>

        <ul class="pagination">
          <li><a href="#" class="pagination__link active">01</a></li>
          <li><a href="#" class="pagination__link">02</a></li>
          <li><a href="#" class="pagination__link">03</a></li>
          <li><a href="#" class="pagination__link">...</a></li>
          <li><a href="#" class="pagination__link">16</a></li>
          <li>
            <a href="#" class="pagination__link icon">
              <i class="fi-rr-angle-double-small-right"></i>
            </a>
          </li>
        </ul>
      </section>

      <!--=============== NEWSLETTER ===============-->
      <?php include "Partials/newsletter.php";?>
    </main>

    <!--=============== FOOTER ===============-->
    <?php include "Partials/footer.php";?>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>

     <!--=============== Bootstrap JS ===============-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  </body>
</html>
