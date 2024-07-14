<?php
    include "dbconnect.php";
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
    {
        $user_id = $_SESSION['sno'];
        $product_id =$_GET['productid'];

        $sql2 = "select * from wishlist where user_id = $user_id and product_id = $product_id";
        $result2= mysqli_query($connection,$sql2);
        $num_row = mysqli_num_rows($result2);
        
    
        if(  $num_row > 0)
        {
            header("Location:/ecommereceweb/wishlist.php?productid=$product_id");
            exit;
        }
        else
        {
            $sql = "insert into wishlist (user_id,product_id) values ('$user_id',' $product_id');";
            $result= mysqli_query($connection,$sql);
            header("Location:/ecommereceweb/wishlist.php?productid=$product_id");
            exit;
        }

    }
    else
    {
            header("Location:/ecommereceweb/login-register.php?cartlogin=false");
          
    }
    
?>