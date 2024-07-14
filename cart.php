<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <!--=============== FLATICON ===============-->
   <link rel='stylesheet'
   href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

   <!--=============== SWIPER CSS ===============-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

   <!--=============== CSS ===============-->
   <link rel="stylesheet" href="assets/css/styles.css" />

    <!--=============== Bootstrap  css===============-->
 

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
          <li><span class="breadcrumb__link">Cart</span></li>
        </ul>
      </section>

      <!--=============== CART ===============-->
      <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $user_id = $_SESSION['sno'];
              // $product_id = $_POST['product_id'];

              $sql = "select product_id,quantity from cart where user_id ='$user_id';";
              $result= mysqli_query($connection,$sql);   
              $num_row=mysqli_num_rows($result);

              for($i=1;$i<=$num_row;$i++){
                $row=mysqli_fetch_array($result);
                $quantity=$_POST["quantity".strval($i)];

                $pid= "productidname".$i;
                $product_id=$_POST[$pid];

                $sql2 = "UPDATE cart SET quantity = '$quantity' WHERE user_id = '$user_id' and product_id = '$product_id';";
                $result2= mysqli_query($connection,$sql2);
              
              }

            };
      ?>
          

      <section class="cart section--lg container">

                  <?php
                  
                      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
                      {
                          $user_id = $_SESSION['sno'];
                        
                          $sql = "select product_id,quantity from cart where user_id ='$user_id';";
                          $result= mysqli_query($connection,$sql);
                        
                          $num_row=mysqli_num_rows($result);
                          if($num_row>0)
                          {
                            $totalCost = 0;
                            echo '
                                <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
                                  <div class="table__container">
                                    <table class="table">
                                      <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Remove</th>
                                      </tr>';
                            $num=1;
                            while($row = mysqli_fetch_assoc($result)){
                                  $product_id = $row['product_id'];
                                  $quantity = $row['quantity'];

                                  $sql2= "select pname,description,new_price,image1 from products where product_id ='$product_id'";
                                  $result2= mysqli_query($connection,$sql2);
                                  $row2 = mysqli_fetch_assoc($result2);

                                  $pname = $row2['pname'];
                                  $description = $row2['description'];
                                  $price=$row2['new_price'];
                                  $image=$row2['image1'];

                                  
                                  
                                  $select_name="quantity".strval($num);
                                  $productidname="productidname".strval($num);

                                  echo ' <tr>
                                              <td><img src="'.$image.'" alt="" class="table__img"></td>
                            
                                              <td><h3 class="table__title">'.$pname.'</h3>
                                                <p class="table__description"> '. $description.'</p>
                                              </td>
                            
                                              <td><span class="table__price">'.$price.'</span></td>
                            
                                              <td><label for="product">Quantity :</label>
                                                      <select name="'.$select_name.'" id="product">';

                                                        for($i=1; $i<=6; $i++){
                                                            if ($i==$quantity){
                                                              echo '<option  value="'.$quantity.'" selected>'.$quantity.'</option>';
                                                            }
                                                            else
                                                            {
                                                              echo '<option value="'.$i.'">'.$i.'</option>';
                                                            }
                                                            // echo $select_name."hello";
                                                        }
                                                          
                                                        
                                                  echo '</select>
                                              </td>
                            
                                              <td><span class="table__subtotal">$ '.$quantity * $price.'</span></td>
                            
                                              <td id="remove"> <a href="Partials/removeProductHandle.php?productid='.$product_id.'&listtable=cart"><i class="fi fi-rr-trash table__trash"></i> </a></td>
                                          </tr>
                                          
                                          <input type="hidden" name="productidname' . $num . '" value="' . $product_id . '">
                                          ';
                                          $num=$num+1;
                                          $totalCost= $totalCost+$quantity * $price;

                            }
                            echo      '</table>
                                  </div>
                                  <div class="cart__actions">
                                      
                                      <button type="submit" class="btn flex btn--md>  
                                        <i class="fi-rr-shuffle"></i>Save Cart
                                      </button>

                                      <a href="shop.php?category=-1" class="btn flex btn--md "">
                                        <i class="fi-rr-shopping-bag-add"></i>Continue Shoppping
                                      </a>
                                  </div>
                              </form>';

                            echo ' <div class="divider">
                                      <i class="fi fi-rr-fingerprint"></i>
                                  </div>';

                            $sql3 = "select country,city,pincode,state from users where sno ='$user_id'";
                            $result3 = mysqli_query($connection,$sql3);
                            $row = mysqli_fetch_array($result3);


                            

                            echo '
                                  <div class="cart__group grid">
                                      <div>  
                                        <div class="cart__shipping"  >
                                          <h3 class="section__title">Shipping Address</h3>
                          
                                      
                                          <div class="form grid">
                                          
                                            <div class="form__grid grid">

                                              <input  name="country" type="text" placeholder="Country : '.$row['country'].'" class="form__input" id="address1" disabled>

                                              <input type="text" placeholder="State : '.$row['state'].'" class="form__input" id="address2" disabled>
                                              <input type="text" placeholder="City : '.$row['city'].'" class="form__input" id="address2" disabled>

                                              <input type="text" placeholder="Pincode :'.$row['pincode'].' " class="form__input " id="address3" disabled>

                                            </div>
                                          </div>
                                            <div class="form__btn">
                                                <a href="accounts.php">
                                                    <button  class="mt-3 btn flex btn--sm">
                                                      <i class="fi-rr-shuffle"></i>Update address
                                                    </button> 
                                                </a>
                                            </div>
                                        </div>
                                      </div>';

                                      
                                      // $sql3 = "select quantity from cart where user_id ='$user_id';";
                                      // $result= mysqli_query($connection,$sql3);
                                      $deliveryCharge=20;
                                      echo '<div class="cart__total">
                                        <h3 class="section__title">Cart Totals</h3>
                              
                                        <table class="cart__total-table">
                                          <tr>
                                            <td><span class="cart__total-title">Cart Subtotal</span></td>
                                            <td><span class="cart__total-price">$'.$totalCost.'</span></td>
                                          </tr>
                              
                                          <tr>
                                            <td><span class="cart__total-title">Shipping</span></td>
                                            <td><span class="cart__total-price">$10.00</span></td>
                                          </tr>
                              
                                          <tr>
                                            <td><span class="cart__total-title">Total</span></td>
                                            <td><span class="cart__total-price">$'.$totalCost + $deliveryCharge .'</span></td>
                                          </tr>
                              
                                        </table>
                              
                                        <a href="checkout.php" class="btn flex btn--md"> 
                                          <i class="fi fi-rr-box-alt"></i>Proceed To Checkout
                                        </a>
                                      </div>
                      
                                  </div>';

                        }
                        else
                        {
                          echo '<div class="jumbotron jumbotron-fluid mb-5">
                                  <div class="container">
                                    <p class="display-4">You Have Not Add Anything into Cart till now</p>
                                    <p class="lead">You can into cart for latter purchase</p>
                                  </div>
                                </div>';
                        }

                        
                      }
                      else
                      {
                        echo '<div class="jumbotron jumbotron-fluid mb-5">
                        <div class="container">
                          <p class="display-4">You are not loggin</p>
                          <p class="lead">Please login to see cart details</p>
                        </div>
                      </div>';
                      }
                      
                  ?>
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
