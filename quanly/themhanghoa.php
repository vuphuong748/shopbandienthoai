<?php
    
    include"../ketnoi/ketnoi.php";

    $hh = "SELECT * FROM loaihanghoa";
    $query = $con->query($hh);
    if(isset($_POST['sbm'])){
      $TenHH = $_POST['TenHH'];

      $TenHinh = "./img/".$_FILES['TenHinh']['name'];
      $TenHinh_tmp = $_FILES['TenHinh']['tmp_name'];

      $MaLoaiHang = $_POST['MaLoaiHang'];
      $QuyCach = $_POST['Thong so ky thuat'];
      $Gia = $_POST['Gia'];
      $SoLuongHang = $_POST['SoLuongHang'];

      $sql = "INSERT INTO hanghoa(TenHH, Thongsokythuat, Gia, SoLuongHang, MaLoaiHang) values ('$TenHH', '$Thongsokythuat', '$Gia' ,'$SoLuongHang', '$MaLoaiHang')";
      $query = $con->query($sql);
      $sql = "SELECT * FROM hanghoa WHERE TENHH = '$TenHH'";
      $query = $con->query($sql);
      $row = mysqli_fetch_array($query);
      $sql = "INSERT INTO hinhhanghoa(TENHINH,MSHH) values ('$TenHinh',".$row['MSHH'].")";
      $query = $con->query($sql);
      move_uploaded_file($TenHinh_tmp,$TenHinh);
      header("Location: danhsach.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Thêm</title>
</head>
<body>
    <div class="container-fuild">
        <div class="card">
            <div class="card-header">
                <h1>THÊM HÀNG HÓA</h1>
            </div>
            <div class="card-body">
               <form method="POST" enctype="multipart/form-data">  
                    <div class="form-group">
                      <label for="">TenHH</label>
                      <input type="text" name="TenHH" class="form-control">
                    </div>

                    
                    <div class="form-group">
                      <label for="">TenHinh</label>
                      <input type="file" name="TenHinh" class="form-control">
                    </div>

                    
                   <div class="form-group">
                     <label for="">TenLoaiHang</label>
                     <select class="form-control" name = "MaLoaiHang">
                       <?php foreach ($query as $key => $value) { ?>
                         <option value="<?php echo $value['MaLoaiHang'] ?>">
                         <?php echo $value['TenLoaiHang'] ?>
                        </option>
                      <?php } ?> 
                     </select>
                   </div>
                    
                    <div class="form-group">
                      <label for="">Thongsokythuat</label>
                      <input type="text" name="Thongsokythuat" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="">Gia</label>
                      <input type="number" name="Gia" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="">SoLuongHang</label>
                      <input type="number" name="SoLuongHang" class="form-control">
                    </div>
                        <button name="sbm" class="btn btn-success" type="submit">THÊM</button>
                </form>
            </div>
        </div>
    </div>

    </div>
</body>
</html>