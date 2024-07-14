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
    <?php
        if(isset($_GET['cartlogin']) and $_GET['cartlogin'] == "false")
        {
          echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                    <strong>Error!</strong> Please Login to Add product in Your Cart
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }    
    ?>

    <!--=============== HEADER ===============-->
    <?php include 'Partials/header.php'; ?>

    

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->
      <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
          <li><a href="index.php" class="breadcrumb__link">Home</a></li>
          <li><span class="breadcrumb__link">></span></li>
          <li><span class="breadcrumb__link">Login /SignUp</span></li>
        </ul>
      </section>

      <!--=============== LOGIN-REGISTER ===============-->
      
      <section class="login-register section--lg">

        <div class="login-register__container container">
          <div class="login" id="login">
            <h3 class="section__title">Login</h3>

            <form action="Partials/loginHandle.php" class="form grid" method="POST">
              <input type="text" placeholder="Your Username" id="username" name="username" class="form__input" required>

              <input type="password" placeholder="Your Password" id="loginpassword" name="loginpassword"  class="form__input" required>

              <div class="form__btn">
                <button class="btn">Login</button>
               
              </div>
              <div id="account">
             Don't have an account <br>
             <a href="#" onclick="loginRegister()"> <span >Create account</span> </a> here
        </div>
            </form>
          </div>

          <div class="register" id="registerblock">
            <h3 class="section__title">Create an Account</h3>

            <form action="Partials/signupHandle.php" method="POST" class="form grid">
              <input type="text" placeholder="Username" id="signupusername" name="signupusername"  class="form__input" required>

              <input type="email" placeholder="Your Email" id="signupEmail" name="signupEmail" class="form__input" required>

              <input type="text" placeholder="Country Name" id="country" name="country" class="form__input" required>

              <input type="text" placeholder="State Name" id="state" name="state" class="form__input" required>

              <input type="text" placeholder="City Name" id="city" name="city" class="form__input" required>

              <input type="text" placeholder="Pincode" id="Pincode" name="pincode" class="form__input" required>

              <input type="text" placeholder="Contact Number" id="contactnumber" name="contactnumber" class="form__input" required>

              <input type="password" placeholder="Your Password" id="signuppassword" name="signuppassword"  class="form__input" required>

              <input type="password" placeholder="Confirm Password" id="signupcpassword" name="signupcpassword"  class="form__input" required>

              <div class="form__btn">
                <button class="btn"> Register</button>
                <a href="#" onclick="loginRegister()" class="btn">Cancle</a>
              </div>
            </form>
          </div>
        </div>
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
