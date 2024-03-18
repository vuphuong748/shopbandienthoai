 <?php
 session_start();
    include "../ketnoi/ketnoi.php";
    if(isset($_POST['login'])){
        $logname = $_POST['logname'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM khachhang WHERE SoDienThoai = '$logname' AND Matkhau = '$password'";
        $query = $con->query($sql);
        $numrow = mysqli_num_rows($query);
        if($numrow > 0){
            $row = mysqli_fetch_array($query);
                $_SESSION['tkdn'] = $row;
                if(isset($_GET['action'])){
                    $action = $_GET['action'];
                    header("Location: ".$action.'.php');
                }else{
                    header("Location: index.php");
                }
               
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
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/mains.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
     <title>Đăng nhập</title>
 </head>
 <body>
     <div class="dn_center">
         <h1>Đăng nhập</h1>
         <form method="post">
             <div class="dn_text-field">
                 <input type="text" required placeholder="Số điện thoại" name="logname">  
             </div>
             <div class="dn_text-field">
                 <input type="password" required placeholder="Mật khẩu" name="password">
             </div>
            <div class="dn_pass">
               <span>Quên mật khẩu?</span> 
               <span class="dn_signup-link"><a href="register.php">Đăng ký tại đây.</a></span>
            </div>
            <input type="submit" value="Đăng nhập" name="login">
         </form>
     </div>
 </body>
 </html>