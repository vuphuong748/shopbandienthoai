<?php
    session_start();
    include "../ketnoi/ketnoi.php";
    
    if(isset($_POST['login'])){
        $login_name = $_POST['login_name'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM nhanvien where HoTenNV = '$login_name' and Matkhau='$password'";
        $query = mysqli_query($con,$sql);
        $numrow = mysqli_num_rows($query);
        if($numrow >0){
            $_SESSION['tennv'] = $login_name;
            header("Location: hienthi.php");
        }
    }

?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="../khachhang/assets/css/base.css">
    <link rel="stylesheet" href="../khachhang/assets/css/mains.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
     <title>Đăng nhập</title>
 </head>
 <body>
     <div class="dn_center">
         <h1>Đăng nhập</h1>
         <form method="post">
             <div class="dn_text-field">
                 <input type="text" required placeholder="Tên đăng nhập" name="login_name">  
             </div>
             <div class="dn_text-field">
                 <input type="password" required placeholder="Mật khẩu" name="password">
             </div>
            <input type="submit" value="Đăng nhập" name="login">
         </form>
     </div>
 </body>
 </html>