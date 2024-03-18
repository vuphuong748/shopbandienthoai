<?php
    session_start();
    include "../ketnoi/ketnoi.php";
    // echo $_SESSION['tennv'];
    if(isset($_SESSION['tennv']) == false)
        header("Location: login.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../khachhang/assets/css/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        a{
            text-decoration: none;
        }
    </style>
    <title>Quản lý</title>
</head>

<body>

    <div class="card">
         <div class="card-header">
        <ul class="header__navbar">
                <li class="header__navbar-item">
                    <span><?php  echo $_SESSION['tennv'];?></span>
                </li>

                <li class="header__navbar-item">
                    <a href="logout.php">Đăng xuất</a>
                </li>
            </ul> 
            <h1>TRANG QUẢN TRỊ</h1>
        </div>
        <div class="card-body">
            <ul class="header_h">
                <li class="header_n">
                    <a href="danhsach.php">QUẢN LÝ HÀNG HÓA</a>

                </li>
                <li class="header_n">
                    <a href="donhang.php"> QUẢN LÝ ĐƠN HÀNG</a>
                </li>
            </ul>
        </div>
    </div>
    

</body>

</html>