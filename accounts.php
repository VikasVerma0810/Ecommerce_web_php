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

  <style>
    @media screen and (max-width: 992px) {
      .modal-body {
        display: block !important;
      }
    }
  </style>
</head>

<body>
      <?php
          if (isset($_GET['nameexist']) && $_GET['nameexist'] == "true") {
            echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                      <strong>Success!</strong> The user of this name already exist.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
          }

          if (isset($_GET['nameexist']) && $_GET['nameexist'] == "false") {
            echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>Success!</strong> Username Updated Successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
          }

          if (isset($_GET['emailexist']) && $_GET['emailexist'] == "true") {
            echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                        <strong>Success!</strong> This email id is already in use
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
          }

          if (isset($_GET['emailexist']) && $_GET['emailexist'] == "false") {
            echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>Success!</strong> Email Updated Successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
          }

          if (isset($_GET['passUpadted']) && $_GET['passUpadted'] == "true") {
            echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>Success!</strong> Password Updated Successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
          }

          if (isset($_GET['passUpadted']) && $_GET['passUpadted'] == "false") {
            echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                    <strong>Error !</strong>Failed to update Password duwe to some techinical error
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
          }

          if (isset($_GET['PassMatch']) && $_GET['PassMatch'] == "false") {
            echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                    <strong>Error !</strong> New Pasword and Confirm Password do not match!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
          }

          if (isset($_GET['currPassMatch']) && $_GET['currPassMatch'] == "false") {
            echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                    <strong>Error !</strong> Current Password not match
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
        <li><span class="breadcrumb__link">Account</span></li>
      </ul>
    </section>

    <!--=============== ACCOUNTS ===============-->
    <section class="accounts  section--lg">
      <div class="account__container container grid">
        <div class="account__tabs">
          <p class="account__tab active-tab" data-target="#dashboard">
            <i class="fi fi-rr-settings-sliders"></i>Dashboard
          </p>

          <p class="account__tab" data-target="#orders">
            <i class="fi fi-rr-shopping-bag-add"></i>Orders
          </p>

          <p class="account__tab" data-target="#update-profile">
            <i class="fi fi-rr-user"></i>Update Profile
          </p>

          <p class="account__tab" data-target="#address">
            <i class="fi fi-rr-marker"></i>My Address
          </p>

          <p class="account__tab" data-target="#change-password">
            <i class="fi fi-rr-user"></i>Change Password
          </p>

          <div class="logout account__tab" id="logout">

            <div>
              <a style="color: var(--title-color)" id="logoutbtn" data-bs-toggle="modal" data-bs-target="#loginModal">
                <i class="fi fi-rr-exit">logout</i>
              </a>
            </div>

            <div class="modal fade" id="loginModal" aria-labelledby="loginModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered ">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="Partials/logout.php" method="POST">
                    <div class="modal-body">
                      <div clas=" my-3">Do you want to logout?</div>
                      <button type="submit" class="btn ">Logout</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="tabs__content"  id="dashboard">

        <?php

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
              $user_id = $_SESSION['sno'];

              $sql = "select username,user_email,phonenumber,timestamp from users where sno = '$user_id'";
              $result = mysqli_query($connection, $sql);
              $row = mysqli_fetch_array($result);
              echo '<div class="tab__content active-tab" content id="dashboard">
                            <h3 class="tab__header">Hello ' . $row['username'] . '!</h3>

                            <div class="tab__body">
                              <p class="tab__description"> Your Email Id  : ' . $row['user_email'] . '</p>
                              <p class="tab__description">Your Phone Number : ' . $row['phonenumber'] . '</p>
                              <p class="tab__description">Account Created at : ' . $row['timestamp'] . '</p>
                            </div>
                          </div>';
            }

        ?>


          <div class="tab__content " content id="orders">
            <h3 class="tab__header">Your Orders</h3>

            <div class="tab__body">
              <table class="placed__order-table">
               
                <?php 
                 $user_id = $_SESSION['sno'];
                 $sql = "select * from orders where user_id = $user_id";
                 $result=mysqli_query($connection, $sql);
                 $num_row=mysqli_num_rows($result);
                 if($num_row>0)
                 {
                  echo ' <tr>
                            <th>Orders</th>
                            <th>Date</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>';
                  while ($row = mysqli_fetch_array($result))
                  {
 
                     echo '<tr>
                             <td>'.$row['order_id'].'</td>
                             <td>'.$row['timestamp'].'</td>
                             <td>'.$row['paymentMethod'].'</td>
                             <td>'.$row['status'].'</td>
                             <td>$'.$row['total_cost'].'</td>
                             <td>
                             <a href="#" class="view__order">View</a></td>
                           </tr>';
                  }
                 }
                 else
                 {
                  echo '<div class="jumbotron jumbotron-fluid mb-5">
                                  <div class="container">
                                    <p class="lead">You have not ordered anythings</p>
                                  </div>
                                </div>';
                 }
                
                
                ?>
              </table>
            </div>
          </div>


          <div class="tab__content " content id="update-profile">
            <h3 class="tab__header">Update Profile</h3>

            <div class="tab__body " id="profileUpdate">
              <div>
                <form action="Partials/usernameUpdateHandle.php" method="POST" class="form grid">
                  <input  name="username" type="text" placeholder="Username" class="form__input" required>
                  <input  name="cusername" type="text" placeholder="Confirm Username" class="form__input" required>

                  <div class="form__btn">
                    <button type="submit" class="btn btn--md">Change username</button>
                  </div>
                </form>
              </div>

              <div>
                <form action="Partials/emailUpdateHandle.php" method="POST" class="form grid">
                  <input  name="useremail" type="email" placeholder="New Email id" class="form__input" required>
                  <input name="cuseremail" type="email" placeholder="Confirm Email id" class="form__input" required>

                  <div class="form__btn">
                    <button type="submit" class="btn btn--md">Change Email</button>
                  </div>
                </form>
              </div>

            </div>
          </div>

          <div class="tab__content " content id="address">
            <h3 class="tab__header">Shipping Address</h3>

            <div class="tab__body">
              <div class="address">

                <div class="form grid">

                  <div class="form__grid grid">
                  <?php  
                        $user_id = $_SESSION['sno'];
                        $sql ="select country, state, city, pincode from users where sno = '$user_id'";
                        $result=mysqli_query($connection, $sql);
                        $row=mysqli_fetch_assoc($result);
                        echo '<p class="form__input" id="address1">'.$row['country'].' </p>
                              <p class="form__input" id="address1">'.$row['state'].' </p>
                              <p class="form__input" id="address1">'.$row['city'].' </p>
                              <p class="form__input" id="address1">'.$row['pincode'].'</p>';
                    ?>

                    
                  </div>
                </div>

                <div class="form__btn">

                  <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#updateAddressModal">Change Address</button>

                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="updateAddressModal" aria-labelledby="updateAddressModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered ">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="updateAddressModalLabel">Update Address</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="Partials/updateAddressHandle.php" method="POST">
                  <div class="modal-body">
                   
                    <div class="mb-3">
                      <label for="country" class="form-label">Country Name</label>
                      <input type="text" class="form-control" id="country" name="country" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                      <label for="state" class="form-label">State Name</label>
                      <input type="password" class="form-control" id="state" name="state" required>
                    </div>

                    <div class="mb-3">
                      <label for="city" class="form-label">City Name</label>
                      <input type="password" class="form-control" id="city" name="city" required>
                    </div>

                    <div class="mb-3">
                      <label for="pincode" class="form-label">Pincode</label>
                      <input type="password" class="form-control" id="pincode" name="pincode" required>
                    </div>

                    <button type="submit" class="btn ">Save Address</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="tab__content " content id="change-password">
            <h3 class="tab__header">Change Password</h3>

            <div class="tab__body">
              <form action="Partials/passwordChangeHandle.php" method="POST" class="form grid">
                <input type="password" name="curr_password" placeholder="Current Password" class="form__input" required>

                <input type="password" name="new_password" placeholder="New Password" class="form__input" required>

                <input type="password" name="conf_new_password" placeholder="Confirm Password" class="form__input" required>

                <div class="form__btn">
                  <button class="btn btn--md">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>



    </section>

    <!--=============== NEWSLETTER ===============-->
    <?php include "Partials/newsletter.php"; ?>
  </main>

  <!--=============== FOOTER ===============-->
  <?php include "Partials/footer.php"; ?>

  <!--=============== Bootstrap JS ===============-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <!--=============== SWIPER JS ===============-->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="assets/js/main.js"></script>

  


</body>

</html>