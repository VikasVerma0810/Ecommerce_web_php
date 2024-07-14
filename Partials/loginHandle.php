<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'dbconnect.php';
    $username = $_POST['username'];
    $pass = $_POST['loginpassword'];

    $sqlExist = "select * from users where username='$username'";
    $result = mysqli_query($connection, $sqlExist);
    $num = mysqli_num_rows($result);

    if($num == 1){
        $row = mysqli_fetch_assoc($result);

        if(password_verify($pass, $row['password']))
        {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno']=$row['sno'];

            $_SESSION['useremail']=$username;
            // echo "login";
            header("location: /ecommereceweb/index.php?loggin=true&userid='.$sno.'");
            exit;
        }
        
    }
    
        header("location: /ecommereceweb/login-register.php?loggin=false");
}
?>