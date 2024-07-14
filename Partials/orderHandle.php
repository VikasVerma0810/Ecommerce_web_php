<?php
    include "dbconnect.php";
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user_id = $_SESSION['sno'];
        $cost = $_GET['totalcost'];
        $paymentmethod = $_POST['payment'];
       

        $sql2 = "insert into orders (user_id,total_cost,paymentMethod) values ('$user_id','$cost',' $paymentmethod')";
        $result2= mysqli_query($connection,$sql2);
        header("Location:/ecommereceweb/accounts.php");
        exit;
      
        
    

    }
    else
    {
            header("Location:/ecommereceweb/login-register.php?cartlogin=false");
          
    }
    
?>