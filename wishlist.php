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

        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Wishlist</span></li>
      </ul>
    </section>

    <!--=============== WISHLIST ===============-->
    <section class="wishlist section--lg container">
      <div class="table__container">
        <table class="table">
          <!-- <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock Status</th>
            <th>Action</th>
            <th>Remove</th>
          </tr> -->

          <?php

          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            $user_id = $_SESSION['sno'];

            $sql = "select product_id from wishlist where user_id ='$user_id';";
            $result = mysqli_query($connection, $sql);

            $num_row = mysqli_num_rows($result);
            if ($num_row > 0) 
            {
              echo '<tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Stock Status</th>
                      <th>Action</th>
                      <th>Remove</th>
                    </tr>';
             
              while ($row = mysqli_fetch_assoc($result)){
                $product_id = $row['product_id'];

                $sql2 = "select pname,description,new_price,image1,stock_quantity from products where product_id ='$product_id'";
                $result2 = mysqli_query($connection, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo '<tr>
                          <td><img src="'.$row2['image1'].'" alt="" class="table__img"></td>
              
                          <td>
                            <h3 class="table__title">'.$row2['pname'].'</h3>
                            <p class="table__description">'.$row2['description'].'</p>
                          </td>
              
                          <td><span class="table__price">$'.$row2['new_price'].'</span></td>';

                          if ($row2['stock_quantity'] > 0)
                          {
                            echo '<td><span class="table__stock">In Stock </span></td>';
                          }
                          else
                          {
                            echo '<td><span class="table__stock">Out of Stock </span></td>';
                          }
              
                          echo '<td><a href="Partials/cartHandling.php?productid='.$product_id.'" class="btn btn--sm ">Add to Cart</a></td>
              
                          <td id="remove"> <a href="Partials/removeProductHandle.php?productid='.$product_id.'&listtable=wishlist"><i class="fi fi-rr-trash table__trash"></i> </a></td>
                      </tr>';


              }
             
            } else {
              echo '<div class="jumbotron jumbotron-fluid mb-5">
            <div class="container">
              <p class="display-4">You Have Not Add Anything into Wishlist till now</p>
              <p class="lead">You can add product into wishlist for latter purchase</p>
            </div>
          </div>';
            }
          } else {
            echo '<div class="jumbotron jumbotron-fluid mb-5">
                      <div class="container">
                        <p class="display-4">You are not loggin</p>
                        <p class="lead">Please login to see wishlist details</p>
                      </div>
                  </div>';
          }

          
          ?>

        </table>
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