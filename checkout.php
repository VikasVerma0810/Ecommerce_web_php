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
        <li><span class="breadcrumb__link">Checkout</span></li>
      </ul>
    </section>

    <!--=============== CHECKOUT ===============-->
    <section class="checkout section--lg">
      <div class="checkout__container container grid">
        <div class="checkout__group">
          <h3 class="section__title">Billing Details</h3>
          <div class="form grid">
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
              $user_id = $_SESSION['sno'];
              $sql = "select * from users where sno = '$user_id'";
              $result = mysqli_query($connection, $sql);
              $row = mysqli_fetch_assoc($result);

              $username = $row['username'];
              $user_email = $row['user_email'];
              $country = $row['country'];
              $city = $row['city'];
              $state = $row['state'];
              $pincode = $row['pincode'];
              $contactnumber = $row['phonenumber'];

              echo '<p class="form__input"> Name : ' . "  " .  $username . ' </p>
                        <p class="form__input"> Email : ' . "  " .  $user_email . '</p>
                        <p class="form__input"> Address : ' . "  " .  $city . "  " .  $state . "  " . $pincode . '</p>
                        <p class="form__input"> City : ' . "  " .  $city . '</p>
                        <p class="form__input"> State : ' . "  " .  $state . '</p>
                        <p class="form__input"> Country : ' . "  " .  $country . '</p>
                        <p class="form__input"> Pincode : ' . "  " .  $pincode . '</p>
                        <p class="form__input"> Phone number : ' . "  " .  $contactnumber . '</p>';
            }
            ?>
          </div>
        </div>

        <div class="checkout__group">
          <h3 class="section__title">Cart Total</h3>

          <table class="order__table">
            <tr>
              <th colspan="2">Products</th>
              <th>Total</th>
            </tr>

            <?php

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
              $user_id = $_SESSION['sno'];
              $total = 0;
              $sql = "select product_id,quantity from cart where user_id = '$user_id'";
              $result = mysqli_query($connection, $sql);
              while ($row = mysqli_fetch_array($result)) {
                $product_id = $row['product_id'];
                $quantity = $row['quantity'];

                $sql2 = "select pname,new_price, image1 from products where product_id = '$product_id'";
                $result2 = mysqli_query($connection, $sql2);
                $row2 = mysqli_fetch_array($result2);

                echo '<tr>
                                <td>
                                  <img src="' . $row2['image1'] . '" 
                                  alt="" 
                                  class="order__img">
                                </td>
                
                                <td>
                                  <h3 class="table__title">' . $row2['pname'] . '</h3>
                                  <p class="table__quantity">x ' . $quantity . '</p>
                                </td>
                
                                <td>
                                  <span class="table__price">$' . $quantity * $row2['new_price'] . '</span>
                                </td>
      
                            </tr>';
                $total = $total + $quantity * $row2['new_price'];
              }
              $shipping = 20;
              echo ' <tr>
                            <td><span class="order__subtitle">SubTotal</span></td>
                            <td colspan="2"><span class="table__price">$' . $total . '</span></td>
                          </tr>
            
                          <tr>
                            <td><span class="order__subtitle">Shipping</span></td>
                            <td colspan="2"><span class="table__price">$20</span></td>
                          </tr>
            
                          <tr>
                            <td><span class="order__subtitle">Total</span></td>
                            <td colspan="2"><span class="order__grand-total">$' . $total +  $shipping . '</span></td>
                          </tr>';
            }
            echo ' </table>

                  <form action="Partials/orderHandle.php?totalcost='. $total +  $shipping.'" method="POST">
                  <div class="payment__methods">
                      <h3 class="checkout__title payment__title">Payment Method</h3>
        
                      <div class="payment__option flex">
                        <input type="radio" name="payment" id="direct" checked class="payment__input" value="Direct Bank Transfer">
                        <lable class="direct">Direct Bank Transfer</lable>
                      </div>
        
                      <div class="payment__option flex">
                        <input type="radio" name="payment" id="upi" class="payment__input" value="UPI  Payment">
                        <lable class="upi">UPI  Payment</lable>
                      </div>
        
                      <div class="payment__option flex">
                        <input type="radio" name="payment" id="netB" class="payment__input" value="Net Banking">
                        <lable class="netB">Net Banking</lable>
                      </div>
        
                      <button type="submit" class="btn btn--md">Place Order</button>
                    </div>
                    </form>
                  </div>
              </div>';

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