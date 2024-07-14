<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        echo "logging you out Please wait...";
        session_start();
        session_unset();
        session_destroy();
        header("location: /ecommereceweb/index.php");
    }
  
?>