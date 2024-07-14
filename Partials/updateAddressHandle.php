<?php 
    include "dbconnect.php";
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $user_id = $_SESSION['sno'];
            // echo $user_id;
            $sql ="UPDATE users
            SET country = '$_POST[country]', state = '$_POST[state]', city = '$_POST[city]', pincode = '$_POST[pincode]' where sno = '$user_id'";
            $result=mysqli_query($connection, $sql);
            header("location: /ecommereceweb/accounts.php");
        }
    }
   
?>