<?php
session_start();
    include "../ketnoi/ketnoi.php";
    if(isset($_SESSION['tennv'])){
        unset($_SESSION['tennv']);
        header('Location: login.php');
    }
    
?>