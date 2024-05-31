<?php
    $con = mysqli_connect ("localhost: 3307", "root", "", "login_db");
        if(mysqli_connect_error()){
            echo "Failed to connect to Mysql: " .mysqli_connect_error();
        }
?>