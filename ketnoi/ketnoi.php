<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "quanlydathang";

    // $conn = mysqli_connect($servername, $username, $password, $db);

    // if(mysqli_connect_errno()){
    //     exit();
    // }
    $con = new mysqli($servername,$username,$password, $db);
    $con->set_charset("utf8");
?>