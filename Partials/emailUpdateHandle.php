
<?php
    include "dbconnect.php";
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $user_id = $_SESSION['sno'];
    
       
        if($_POST['useremail'] == $_POST['cuseremail'] && $_POST['cuseremail']!="")
        {
            $exist =0;

            $sql = "select * from users";
            $result = mysqli_query($connection, $sql);
            // echo "hello";
            while( $row = mysqli_fetch_assoc($result))
            {
                if($row['sno'] == $user_id)
                {
                    continue;
                }
                if($row['user_email'] == $_POST['useremail']){
                    $exist=1;
                    break;
                }
            }

            echo var_dump($exist);

            if($exist)
            {
                header("Location:/ecommereceweb/accounts.php?emailexist=true");
                exit;
            }
            else{
                $sql = "update users set user_email=' $_POST[useremail]' where sno='$user_id'";
                $result = mysqli_query($connection, $sql);
                header("Location:/ecommereceweb/accounts.php?emailexist=false");
            }
        }
    
    }
?>
