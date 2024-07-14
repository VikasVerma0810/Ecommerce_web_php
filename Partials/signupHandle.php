<?php 
    $showAlert=false;
    $showError="false";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'dbconnect.php';
        $username = $_POST['signupusername'];
        $useremail = $_POST['signupEmail'];
        $password = $_POST['signuppassword'];
        $cpassword = $_POST['signupcpassword'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $phonenumber = $_POST['contactnumber'];

        $sqlExist = "select * from users where user_email='$useremail'";
        $exits=mysqli_query($connection, $sqlExist);
        $num = mysqli_num_rows($exits);

        if($num >0 ){
            $showError ="User of this email id and name  already exists";
        }
        else
        {
            if($password == $cpassword)
            {
                $passHash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "insert into users (username,user_email, password,country,city,state,pincode,phonenumber	) values('$username','$useremail','$passHash',' $country','$city','$state','$pincode','$phonenumber')";
                $result = mysqli_query($connection, $sql);
                if($result){
                    $showAlert=true;
                    header("location:/ecommereceweb/login-register.php?signupsuccess=true");
                    exit;
                }
            }
            else{
                $showError="Password do not match";
                
            }
        }

        header("location: /ecommereceweb/login-register.php?signupsuccess=false&error='.$showError.'");

    }
?>