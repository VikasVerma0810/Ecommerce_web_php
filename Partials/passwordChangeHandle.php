
<?php
    include "dbconnect.php";
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $user_id = $_SESSION['sno'];
        $currPass_Form = $_POST['curr_password'];

        $sql = "select  password from users where sno='$user_id'";
        $result=mysqli_query($connection,$sql);
        $row=mysqli_fetch_assoc($result);
       
        if(password_verify( $currPass_Form, $row['password']))
        {
           
            if($_POST['new_password'] == $_POST['conf_new_password'] && $_POST['new_password']!="" && $_POST['conf_new_password']!="")
            {
                $passHash = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                $sql2 = "update users set password='$passHash' where sno='$user_id'";
                $result2=mysqli_query($connection,$sql2);
                header("Location:/ecommereceweb/accounts.php?passUpadted=true");
                exit;
            }
            else
            {
                header("Location:/ecommereceweb/accounts.php?PassMatch=false");
                exit;
            }
           
        }
        else
        {
            header("Location:/ecommereceweb/accounts.php?currPassMatch=false");
            exit;
        }
    
    }
?>

