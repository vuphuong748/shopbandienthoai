<?php 
     include"../ketnoi/ketnoi.php";
     $sql = "SELECT * FROM hinhhanghoa";
     $query = $con->query($sql);
     $row = mysqli_fetch_array($query);
     if(isset($_GET['id'])){
         $id = $_GET['id'];
         unlink("./img/".$row['TenHinh']);
        $sql = "DELETE FROM hinhhanghoa WHERE MSHH=' $id'";
        $query = $con->query($sql);
        $sql = "DELETE FROM hanghoa WHERE MSHH=' $id'";
        $query = $con->query($sql);

        header("Location: danhsach.php");
     }


?>