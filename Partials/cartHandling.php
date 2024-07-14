<?php
    include "dbconnect.php";
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
    {
        $user_id = $_SESSION['sno'];
        $product_id =$_GET['productid'];
        $quantity = $_GET['Quantity'];

        // echo "suecc";
        $sql2 = "select * from cart where user_id = $user_id and product_id = $product_id";
        $result2= mysqli_query($connection,$sql2);
        $row=mysqli_fetch_assoc($result2);
        $pre_quantity = $row['quantity'];
      

        if( $pre_quantity > 0)
        {
           
            $increment=1;
            $sql = "UPDATE cart SET quantity = '$pre_quantity'+ '$increment' WHERE user_id = '$user_id' and product_id = '$product_id';";
            $result= mysqli_query($connection,$sql);
            header("Location:/ecommereceweb/cart.php?productid=$product_id");
            exit;
        }
        else
        {
            $sql = "insert into cart (user_id,product_id,quantity) values ('$user_id',' $product_id','$quantity');";
            $result= mysqli_query($connection,$sql);
            header("Location:/ecommereceweb/cart.php?productid=$product_id");
            exit;
        }


       

    }
    else
    {
            header("Location:/ecommereceweb/login-register.php?cartlogin=false");
          
    }
    
?>