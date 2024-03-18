<?php
    session_start();
    include "../ketnoi/ketnoi.php";
    if(isset($_GET['SoDonDH'])){
        $xoa = $_GET['SoDonDH'];
        $chitiet = "DELETE FROM chitietdathang WHERE SoDonDH = '$xoa'";
        $chitiet_query = mysqli_query($con,$chitiet);
        $dathang = "DELETE FROM dathang WHERE SoDonDH = '$xoa' ";
        $dathang_query = mysqli_query($con, $dathang);
        header("Location: index.php");
    }
    
?>