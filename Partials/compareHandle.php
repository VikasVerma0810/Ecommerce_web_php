<?php
    include "dbconnect.php";
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
    {
        $user_id = $_SESSION['sno'];
        $product_id =$_GET['productid'];
        
        $sql2 = "select * from compare where user_id = '$user_id'";
        $result2= mysqli_query($connection,$sql2);
        $num_row = mysqli_num_rows($result2);
        $exist="false";
        while($row = mysqli_fetch_array($result2))
        {
            if($row['product_id'] == $product_id)
            {
                $exist="true";
                break;
            }
        }

        if($exist=="true")
        {
            header("Location:/ecommereceweb/compare.php");
            exit;
        }
        else
        {
            if( $num_row == 3 ) 
            {
                header("Location:/ecommereceweb/compare.php?removeProduct=true");
                exit;

            
            }
            else
            {
                $sql = "insert into compare (user_id, product_id) values (' $user_id',' $product_id');";
                $result= mysqli_query($connection,$sql);
                header("Location:/ecommereceweb/compare.php?removeProduct=false");
                exit;
            }
        }
            

    }
    else
    {
            header("Location:/ecommereceweb/login-register.php?cartlogin=false");
          
    }
    
?>