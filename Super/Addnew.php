<?php
    $server = "localhost";
    $user = "root";
    $dt_password = "";
    $new = "register";
    $connection = "";

    try{
        $conection = mysqli_connect($server,$user,$dt_password,$new);
    }
    catch(mysqli_sql_exception){
        die("Something went Wrong. Open Your xampp");
    }
?>