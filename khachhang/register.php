<?php
    include "../ketnoi/ketnoi.php";
    $dc = "SELECT * FROM diachikh";
    if(isset($_POST['dangky'])){
        $HoTenKH = $_POST['HoTenKH'];
      //  $TenCongTy = $_POST['TenCongTy'];
        $SoDienThoai = $_POST['SoDienThoai'];
      //  $SoFax = $_POST['SoFax'];
        $MatKhau = $_POST['MatKhau'];
        $DiaChi = $_POST['DiaChi'];
        $sql = "INSERT INTO khachhang(HoTenKH, TenCongTy, SoDienThoai, SoFax, MatKhau) VALUES('$HoTenKH', '$TenCongTy', '$SoDienThoai', '$SoFax', '$MatKhau')";
        $query = $con->query($sql);
        $sql = "SELECT * FROM khachhang WHERE HoTenKH = '$HoTenKH'";
        $query = $con->query($sql);
        $row = mysqli_fetch_array($query);
        $sql = "INSERT INTO diachikh(DiaChi,MSKH) VALUES('$DiaChi','".$row['MSKH']."')"; 
        $query = $con->query($sql);
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/mains.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>Đăng ký</title>
</head>
<body>
    <div class="container">
        <div class="title">Đăng ký</div>
        <form action="" method="POST">
            <div class="user-detail">
                <div class="input_box">
                    <span class="details">Họ và tên</span>
                    <input type="text" name="HoTenKH" placeholder="Nhập họ tên" required onkeyup="ktTen()">
                    <span class="HoTenKH"></span>
                </div>
                <div class="input_box">
                    <span class="details">Tên Công ty</span>
                    <input type="text" name="TenCongTy" placeholder="Nhập tên công ty" required>
                </div>
                <div class="input_box">
                    <span class="details">Số điện thoại</span>
                    <input type="text" name="SoDienThoai" placeholder="Nhập số điện thoại" required onkeyup="ktphone()">
                    <span class="SoDienThoai"></span>
                </div>
                <div class="input_box">
                    <span class="details">Số Fax</span>
                    <input type="text" name="SoFax" placeholder="Nhập số Fax" required>
                </div>
                <div class="input_box">
                    <span class="details">Mật khẩu</span>
                    <input type="password" name="MatKhau" placeholder="Nhập mật khẩu" onkeyup="ktpass()" required>
                    <span class="MatKhau"></span>
                </div>
                <div class="input_box">
                    <span class="details">Nhập lại mật khẩu</span>
                    <input type="password" name="rMatKhau" placeholder="Nhập mật khẩu" onkeyup="ktrpass()" required>
                    <span class="rMatKhau"></span>
                </div>
                <div class="input_box">
                    <span class="details">Địa chỉ</span>
                    <input type="text" name="DiaChi" placeholder="Địa chỉ" required>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Đăng ký" name="dangky">
            </div>
        </form>
    </div>
<script>
    var nameElement = document.querySelector('input[name="HoTenKH"]');
    var phoneElement = document.querySelector('input[name="SoDienThoai"]');
    var passElement = document.querySelector('input[name="MatKhau"]');
    var rpassElement = document.querySelector('input[name="rMatKhau"]');
    var sname = document.querySelector('.HoTenKH');
    var sphone = document.querySelector('.SoDienThoai');
    var spass = document.querySelector('.MatKhau');
    var srepass = document.querySelector('.rMatKhau')


    function ktTen(){
        if(nameElement.value.length < 6){
            nameElement.setAttribute('style','border-color: red');
            sname.innerText = 'Vui lòng nhập họ tên trên 6 ký tự';
        }else {
            nameElement.setAttribute('style','border-color: #000');
            sname.innerText = '';

        }
    }

    function ktphone(){
        if(phoneElement.value.length < 9){
            phoneElement.setAttribute('style','border-color: red');
            sphone.innerText = 'Vui lòng nhập số điện thoại trên 10 ký tự';
        }else {
            phoneElement.setAttribute('style','border-color: #000');
            sphone.innerText = '';

        }
    }

    function ktpass(){
        if(passElement.value.length < 8){
            passElement.setAttribute('style','border-color: red');
            spass.innerText = 'Vui lòng nhập mật khẩu trên 8 ký tự';
        }else {
            passElement.setAttribute('style','border-color: #000');
            spass.innerText = '';

        }
    } 

    function ktrpass(){
        if(passElement.value != rpassElement.value){
            rpassElement.setAttribute('style','border-color: red');
            srepass.innerText = 'Nhập khẩu nhập lại không trùng khớp';
        }else {
            rpassElement.setAttribute('style','border-color: #000');
            srepass.innerText = '';

        }
    }





</script>
</body>
</html>