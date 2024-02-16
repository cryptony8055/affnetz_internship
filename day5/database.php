<?php
include('config.php');
        $conn = mysqli_connect($host,$user,$password,$database_name);
    
        if(mysqli_connect_errno()){
            die("connection not achieved");
        }

        return $conn;
?>