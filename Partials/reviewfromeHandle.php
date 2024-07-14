<?php 
                  include "dbconnect.php";
                 session_start();
                  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true")
                  {
                      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $pid = $_GET['productid'];
                        $review = $_POST['review'];
                        $rating = $_POST['rating'];
      
                        $review = str_replace("<", "&lt;", $review);
                        $review = str_replace(">", "&gt;", $review);
                        $review = str_replace("'", "\'", $review);
      
                        $sno = $_POST['sno']; 
                      //   echo $sno;
      
                        
                        $sql = "insert into review (product_id,	review,user_id,rating) values('$pid','$review',' $sno',  '$rating');";
                        $result = mysqli_query($connection, $sql);
                        echo "success";
                        // echo $pid;
                        // echo "/ecommereceweb/details.php?productid='$pid'";
                        header("location:/ecommereceweb/details.php?productid=$pid");
                        exit;
                    };
                  }
                  else
                  {
                        header("Location:/ecommereceweb/login-register.php");
                        // echo "hello";
                  }
                 
?>
    