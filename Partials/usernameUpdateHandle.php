<?php
include "dbconnect.php";
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $user_id = $_SESSION['sno'];


    if ($_POST['username'] == $_POST['cusername'] && $_POST['username'] != "" && $_POST['cusername'] != "") {
        $exist = 0;

        $sql = "select * from users";
        $result = mysqli_query($connection, $sql);
        echo "hello";
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['sno'] == $user_id) {
                continue;
            }
            if ($row['username'] == $_POST['username']) {
                $exist = 1;
                break;
            }
        }

        echo var_dump($exist);

        if ($exist) {
            header("Location:/ecommereceweb/accounts.php?nameexist=true");
            exit;
        } else {
            $sql = "update users set username=' $_POST[username]' where sno='$user_id'";
            $result = mysqli_query($connection, $sql);
            header("Location:/ecommereceweb/accounts.php?nameexist=false");
            exit;
        }
    } else {
        header("Location:/ecommereceweb/accounts.php?usernamematch=true");
        exit;
    }
}
?>


