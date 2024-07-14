<?php 

    $server="localhost";
    $username="root";
    $password="";
    $database="ecommerce_db";

    $connection=mysqli_connect($server,$username,$password,$database);

    if(!$connection){
        echo "Error connecting to database";
    }

?>