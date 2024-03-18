<?php
    session_start();
    include "../ketnoi/ketnoi.php";
    $MSHH = $_GET["MSHH"];
    if(isset($_SESSION["cart"][$MSHH])){
        unset($_SESSION["cart"][$MSHH]);
    }
    header("location:cart_show.php");
?>