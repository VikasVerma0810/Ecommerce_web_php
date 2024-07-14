<?php
  include "dbconnect.php";
  session_start();
    echo ' <header class="header">';
    if (isset($_GET['removeProduct']) && $_GET['removeProduct'] == "true") {
      echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> Remove  Previous product to compare new products
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
      echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> You can login Now.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    if (isset($_GET['error']) && $_GET['error'] != "false") {
      echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error!</strong> ' . $_GET['error'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

        
    if(isset($_GET['loggin']) && $_GET['loggin'] =="true"){
      echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> You have logedin.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if(isset($_GET['loggin']) && $_GET['loggin'] =="false"){
      echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Failed!</strong>check your credentials.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    
    echo'<div class="header__top">
      <div class="header__container container">
        <div class="header__contact">
          <span>1234567895</span>

          <span>Our Location</span>

        </div>

        <p class="headrer__alert-news">Super Value Deals -Save more with coupons</p>

        <a href="login-register.php" class="header__top-action">Log In/Sign Up</a>
      </div>
    </div>

    <nav class="nav container">
      <a href="index.php" class="nav__logo">
        <img src="assets/img/logo.svg" alt="" class="nav__logo-img">
      </a>

      <div class="nav__menu" id="nav-menu">
        <div class="nav__menu-top">
          <a href="index.php" class="nav__menu-logo">
            <img src="assets/img/logo.svg" alt="">
          </a>

          <div class="nav__close" id="nav-close">
            <i class="fi fi-rr-cross-small"></i>
          </div>
        </div>
        <ul class="nav__list">
          <li class="nav__item">
            <a href="index.php" class="nav__link active-link">Home</a>
          </li>

          <li class="nav__item">
            <a href="shop.php?category=-1" class="nav__link">Shop</a>
          </li>

          <li class="nav__item">
            <a href="#" class="nav__link">Blog</a>
          </li>

          <li class="nav__item">
            <a href="#footer" class="nav__link">Contact Us</a>
          </li>';
          
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo ' <li class="nav__item">
                    <a href="accounts.php" class="nav__link">My Account</a>
                  </li>';
          }
          else {
            echo '<li class="nav__item">
                    <a href="login-register.php" class="nav__link">Login/Signup</a>
                  </li>';
          }
          

        echo '</ul> 
        <div class="header__search">
          <form action="search.php" method="get">
              <input type="text" name="search" placeholder="Search for item..." class="form__input">

              <button class="search__btn">
                <img src="assets/img/search.png" alt="">
              </button>
          </form>
        </div>
      </div>';

      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true")
      {
          $user_id =$_SESSION['sno'];
          $sql ="select * from cart where user_id =' $user_id';";
          $result = mysqli_query($connection,$sql);
          $cart_num =mysqli_num_rows($result);

          $sql2 ="select * from wishlist where user_id =' $user_id';";
          $result2 = mysqli_query($connection,$sql2);
          $wishlist_num =mysqli_num_rows($result2);
          echo '
              <div class="header__user-actions">
                  <a href="wishlist.php" class="header__action-btn">
                    <img src="assets/img/icon-heart.svg" alt="">
                    <span class="count">'.$wishlist_num.'</span>
                  </a>
          
                  <a href="cart.php" class="header__action-btn">
                    <img src="assets/img/icon-cart.svg" alt="">
                    <span class="count">'.$cart_num.'</span>
                  </a>';
      }
      else
      {
        echo '
              <div class="header__user-actions">
                  <a href="wishlist.php" class="header__action-btn">
                    <img src="assets/img/icon-heart.svg" alt="">
                    <span class="count">0</span>
                  </a>
          
                  <a href="cart.php" class="header__action-btn">
                    <img src="assets/img/icon-cart.svg" alt="">
                    <span class="count">0</span>
                  </a>';
      }
      
    echo '<div class="header__action-btn nav__toggle" id="nav-toggle">
          <img src="assets/img/menu-burger.svg" alt="">
        </div>
      </div>
    
    </nav>
  </header>';
  
?>

