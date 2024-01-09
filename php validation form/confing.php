<?php
    $severname = "localhost";
    $username = "root";
    $password = "";
    $database = "signup-db";

    $arr = new mysqli($severname, $username, $password, $database);

    if($arr->connect_error){
        die("Connection Faild" . $arr->connect_error);
    }
    // echo "Connection Successfully";
?>