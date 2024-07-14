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
        <li><span class="breadcrumb__link">Compare</span></li>
      </ul>
    </section>

    <?php

    $pname1 = "Add item ";
    $pname2 = "Add item ";
    $pname3 = "Add item ";

    $price1 = "0";
    $price2 = "0";
    $price3 = "0";


    ?>


    <!--=============== COMPARE ===============-->
    <section class="compare container section--lg">
      

      <?php
            $user_id = $_SESSION['sno'];

            // Fetch product IDs from the productCompare table
            $compareQuery = "SELECT product_id FROM compare where user_id =' $user_id'";
            $compareResult = mysqli_query($connection, $compareQuery);

            // Check if there are products to compare
            if (mysqli_num_rows($compareResult) > 0) {
              // Extract product IDs from the result
              $productIDs = [];
              while ($compareRow = mysqli_fetch_assoc($compareResult)) {
                $productIDs[] = $compareRow['product_id'];
              }

              // Fetch product details for the selected product IDs
              $productQuery = "SELECT * FROM products WHERE product_id IN (" . implode(',', $productIDs) . ")";
              $productResult = mysqli_query($connection, $productQuery);

              // Check if there are products to display
              if (mysqli_num_rows($productResult) > 0) {
                // Header row
                echo '<table class="compare__table">';
               

                // Other rows
                $fieldsToDisplay = ['image1','pname', 'new_price', 'description', 'colors', 'weight', 'dimensions', 'product_id'];
                foreach ($fieldsToDisplay as $field) {
                  // Exclude 'product_id' from being displayed in the table header and column values
                  if ($field == 'product_id') {
                    echo '<tr>';
                    echo '<th></th>';
                  }
                  elseif ($field == 'image1') {
                    echo '<tr>';
                    echo '<th>Image</th>';
                  }
                  elseif ($field == 'new_price') {
                    echo '<tr>';
                    echo '<th>Price</th>';
                  }
                  elseif ($field == 'pname') {
                    echo '<tr>';
                    echo '<th>Name</th>';
                  }
                  else
                  {
                    echo '<tr>';
                    echo '<th>' . ucfirst($field) . '</th>';
                  }
                    // Product columns
                    foreach ($productIDs as $productID) {
                      // Fetch product details
                      $productQuery = "SELECT * FROM products WHERE product_id = $productID";
                      $singleProductResult = mysqli_query($connection, $productQuery);
                      $singleProductRow = mysqli_fetch_assoc($singleProductResult);

                      echo '<td>';

                      // Handle different fields differently
                      switch ($field) {
                        case 'description':
                          echo $singleProductRow[$field];
                          break;
                        case 'image1':
                          echo'<img src="' . $singleProductRow[$field] . '" alt="" class="compare__img">';
                          break;
                        case 'product_id':
                          $id=$singleProductRow[$field];
                          echo '<a href="Partials/cartHandling.php?productid='.$id.'&Quantity=1" class="btn btn--sm">Add to cart</a><br><br>
                          <p > <a id="remove" href="Partials/removeProductHandle.php?productid='.$id.'&listtable=compare"><i class="fi fi-rr-trash table__trash"></i> </a></p>';
                          break;
                        case 'colors':
                          echo '<ul class="color__list compare__colors">';
                          // Assuming 'colors' is a comma-separated list in the database
                          $colors = explode(',', $singleProductRow[$field]);
                          foreach ($colors as $color) {
                            echo '<li><a href="#" class="color__link" style="background-color: ' . $color . ';"></a></li>';
                          }
                          echo '</ul>';
                          break;
                        default:
                          echo '<span class="table__' . $field . '">' . $singleProductRow[$field] . '</span>';
                      }

                      echo '</td>';

                      // Free the result set for each product
                      mysqli_free_result($singleProductResult);
                    }
                    echo '</tr>';
                  }
                

                echo '</table>';
              } else {
                echo 'No products found for comparison.';
              }

              // Free the product result set
              mysqli_free_result($productResult);
            } else {
              echo 'No products selected for comparison.';
            }

            // Free the productCompare result set
            mysqli_free_result($compareResult);

            // Close the connection
            mysqli_close($connection);

      ?>


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