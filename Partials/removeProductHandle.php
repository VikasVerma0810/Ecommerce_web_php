<?php
    include "dbconnect.php";
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
    {
        $user_id = $_SESSION['sno'];
        $product_id =$_GET['productid'];
        $listtable =$_GET['listtable'];
       
       if( $listtable == "cart")
       {
            $sql ="delete from cart where user_id = '$user_id' and product_id = '$product_id';";
            $result=mysqli_query($connection,$sql);
            header("Location:/ecommereceweb/cart.php");
       }
       if( $listtable == "wishlist")
       {
            $sql ="delete from wishlist where user_id = '$user_id' and product_id = '$product_id';";
            $result=mysqli_query($connection,$sql);
            header("Location:/ecommereceweb/wishlist.php");
       }
       if( $listtable == "compare")
       {
            $sql ="delete from compare where user_id = '$user_id' and product_id = '$product_id';";
            $result=mysqli_query($connection,$sql);
            header("Location:/ecommereceweb/compare.php");
       }
        

    }

?>