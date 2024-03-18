<?php
    session_start();
    include "../ketnoi/ketnoi.php";
    if(isset($_SESSION['tkdn'])){
        unset($_SESSION['tkdn']);
        header('Location: index.php');
    }
    
?>