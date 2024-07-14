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
        <li><span class="breadcrumb__link">Fashion</span></li>

        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Henley Shirt</span></li>
      </ul>
    </section>

    <!--=============== DETAILS ===============-->
   
    <?php
        $productid = $_GET['productid'];
      
        $sql = "SELECT * FROM products where product_id ='$productid'";
      
        $result = mysqli_query($connection, $sql);
        

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $product_id = $row['product_id'];

            echo '<section class="details section--lg">
                <div class="details__container container grid">
                  <div class="details__group">
                    <img src="' . $row['image1'] . '" alt="" class="details__img">

                    <div class="details__small-images grid">
                      <img src="' . $row['image3'] . '" alt="" class="details__small-img">

                      <img src="' . $row['image1'] . '" alt="" class="details__small-img">

                      <img src="' . $row['image2'] . '" alt="" class="details__small-img">
                    </div>
                  </div>';

            echo ' <div class="details__group">
                <h3 class="details__title">' . $row['pname'] . '</h3>
                <p class="details__brand">Brands: <span>' . $row['brand_name'] . '</span></p>
    
                <div class="details__price flex">
                  <span class="new__price">$' . $row['new_price'] . '</span>
                  <span class="old__price">$' . $row['old_price'] . '</span>
                  <span class="save__price">$' . $row['percent_discount'] . '</span>
                </div>
    
                <p class="short__description">' . $row['description'] . '</p>
    
                <ul class="product__list">
                  <li class="list__item flex">
                    <i class="fi-rr-crown"></i>' . $row['warranty'] . ' Year Al Jazeera Brand Warranty
                  </li>
    
                  <li class="list__item flex">
                    <i class="fi-rr-refresh"></i> 30 Day Return Policy
                  </li>
                  <li class="list__item flex">
                    <i class="fi-rr-credit-card"></i>Cash on Delivery available
                  </li>
                </ul>
    
                <div class="details__color flex">
                  <span class="details__color-title">Color</span>
    
                  <ul class="color__list">
                  ';

                $colorString = $row['colors'];

                // Convert the comma-separated string to an array of sizes
                $colorArray = array_map('trim', explode(',', $colorString));

                // Output or use each size as needed
                foreach ($colorArray as $color) {
                  echo '<li>
                          <a href="#" class="color__link" style="background-color:' . $color . ';"></a>
                        </li>';
            }

            echo ' 
                </ul>
              </div>
    
              <div class="details__size flex">
                <span class="details__size-title">Size</span>
    
                <ul class="size__list">';

                $sizeString = $row['sizes_available'];

                // Convert the comma-separated string to an array of sizes
                $sizeArray = array_map('trim', explode(',', $sizeString));

            // Output or use each size as needed
                for ($i = 0; $i < sizeof($sizeArray); $i++) {
                  if ($i == 0) {
                    echo '  <li>
                                      <a href="#" class="size__link size-active" >' . $sizeArray[$i] . '</a>
                                  </li>';
                  } else {
                    echo '  <li>
                                    <a href="#" class="size__link " >' . $sizeArray[$i] . '</a>
                                  </li>';
                  }
                }

            echo '
                </ul>
                </div>
                  <div class="details__action">
                    
                    <a href="Partials/cartHandling.php?productid='.$product_id.'&Quantity=1" class="btn btn--sm">Add to Cart</a>
                    <a href="Partials/wishlistHandling.php?productid='.$product_id.'" class="btn btn--sm">Add to wishlist</a>
      
                    
                  </div>
    
                <ul class="details__meta">
                  <li class="meta__list flex"><span>Tags :</span> ' . $row['tags'] . '</li>
                  <li class="meta__list flex"><span>Availability :</span> ' . $row['stock_quantity'] . ' items in stock</li>
                </ul>
              </div>
              </div>
          </section>';
          }
          // }

        // <!--=============== DETAILS TAB ===============-->
      echo  '<section class="details__tab container ">
          <div class="detail__tabs">
            <span class="detail__tab active-tab" data-target="#info">
              Additional Info
            </span>
            <span class="detail__tab" data-target="#reviews">Reviews(3)</span>
          </div>

          <div class="details__tabs-content">
            <div class="details__tab-content active-tab" content id="info">
              <table class="info__table">';
        
                $productid = $_GET['productid'];
                $sql = "SELECT * FROM products where product_id ='$productid'";
                $result = mysqli_query($connection, $sql);
                $row = mysqli_fetch_assoc($result);
                $material = $row['material'];
                $weight = $row['weight'];
                $manufacturer = $row['manufacturer'];
                $Country_of_Origin = $row['Country_of_Origin'];

                echo '<tr>
                        <th>Material</th>
                        <td>'.$material.'</td>
                      </tr>
          
                      <tr>
                        <th>Weigth</th>
                        <td>'.$weight.'</td>
                      </tr>
          
                      <tr>
                        <th> Manufacturer</th>
                        <td> '.$manufacturer.'</td>
                      </tr>
          
                      <tr>
                        <th>Country of Origin</th>
                        <td> ' . $Country_of_Origin .'</td>
                      </tr>
                      </table>
                    </div>
                    
                    
                    <div class="details__tab-content" content id="reviews">
                    <div class="reviews__container grid">';

                    $no_result_found = true;
              
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
                    {
                      $user_id = $_SESSION["sno"];
                      $pid = $_GET['productid'];
                      $sql = "select * from review where  product_id='$pid';";
                      $result = mysqli_query($connection, $sql);
                  
                      while ($row = mysqli_fetch_assoc($result)) {
                          $no_result_found = false;
                          
                          $review = $row['review'];
                          $num_rating= $row['rating'];
                          $time= $row['timestamp'];

                          $sql2 = "select username from users where sno = $user_id";
                          $result2 = mysqli_query($connection, $sql2);
                          $row2 = mysqli_fetch_assoc($result2);

                          echo '<div class="review__single">
                                <div>
                                    <img src="assets/img/user-default.png" alt="" class="review__img">
                                      <h4 class="review__title">' . $row2['username'].'</h4>
                                </div>
                          
                                <div class="review__deta">
                                    <div class="review__rating">';
                        for($i=0; $i<$num_rating; $i++)
                        {
                          
                          echo ' <i class="fi fi-rr-star"></i>';
                      
                        }
                        echo '  </div>';

                        echo '<p class="reiew__description">'.$review.'</p>

                              <span class="review__date">'.$time.'</span> 
                        </div>
                        </div>';


                      }
                    }

                    
        
                if ($no_result_found) {
                    echo ' <div class="jumbotron jumbotron-fluid mb-5">
                      <div class="container">
                      <p class="display-4">No Review Found</p>
                      <p class="lead">Be the First Person to give Review</p></div>
                  </div>';
                }
        
        
                echo '</div>
                <div class="review__form">
                <h4 class="review__form-title"> Add a Review</h4>
                
                <form action="Partials/reviewfromeHandle.php?productid='. $productid.'" method="POST" class="form grid">

                  <div>
                      <label for="rating">Select rating  from 1 to 5:</label>
                      <input type="range" id="rating" name="rating" min="0" max="5" value="1">
                  </div>
                  <textarea class="form__input textarea" id="review" name="review" placeholder="Write Comment"></textarea>';

                  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
                  {
                    $user_id = $_SESSION["sno"];
                    echo '<input type="hidden" name="sno" value="'.$user_id.'">';
                  }
                  

                  echo '<div class="form__btn">
                    <button class="btn">Submit Review</button>
                  </div>
                </form>
                </div>
                </div>
              </div>
            </section>';
                
    ?>
            
          

    <!--=============== PRODUCTS ===============-->
    <section class="products container section--lg">
      <h3 class="section__title"><span>Related</span>Products</h3>

      <div class="products__container grid">

      <?php 
      $productid= $_GET["productid"];
            $sql2= "select category from products where product_id = '$productid';";
            $result2 =  mysqli_query($connection, $sql2);
            $row = mysqli_fetch_assoc($result2);
            $category = $row["category"];

            $sql = "SELECT product_id,category,pname,new_price,old_price, image1,image2 FROM products where category = '$category'";
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
                    <a href="details.php?productid='.$product_id.'" class="product__images">
                      <img src="' . $img2 . '" alt="" class="product__img default">

                      <img src="' . $img1 . '" alt="" class="product__img hover">
                    </a>

                    <div class="product__actions">
                      <a href="#" class="action__btn" aria-label="Quick View"><i class="fi fi-rr-eye"></i></a>

                      <a href="#" class="action__btn" aria-label="Add to Wishlist"><i class="fi fi-rr-heart"></i></a>

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

                    <a href="#" class="action__btn cart__btn" aria-label="Add To Cart"><i
                        class="fi fi-rr-shopping-bag-add"></i></a>
                  </div>
                </div>';
              }
            }
            else
            {
              echo ' <div class="jumbotron jumbotron-fluid mb-5">
               <div class="container">
                  <p class="display-4">No related product Found</p>
               </div>
           </div>';
            }
      
      ?>

      

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