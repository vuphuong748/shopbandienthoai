<?php
    
    include"../ketnoi/ketnoi.php";
    $s = "SELECT * FROM hanghoa as hh join hinhhanghoa as hhh on hh.MSHH = hhh.MSHH WHERE hh.MSHH=  ".$_GET['id']."";
    $query = mysqli_query($con, $s);
    $row = mysqli_fetch_array($query);

    $hh = "SELECT * FROM loaihanghoa";
    // $query = mysqli_query($conn, $sql);
    $query = $con->query($hh);

    if(isset($_POST['sbm'])){
      $TenHH = $_POST['TenHH'];

      $TenHinh = $_FILES['TenHinh']['name'];
      $TenHinh_tmp = $_FILES['TenHinh']['tmp_name'];

      $MaLoaiHang = $_POST['MaLoaiHang'];
      $Thongsokythuat = $_POST['Thongsokythuat'];
      $Gia = $_POST['Gia'];
      $SoLuongHang = $_POST['SoLuongHang'];

     
      if($TenHinh!=''){
        $sql = "UPDATE hanghoa SET TenHH = '$TenHH', Thongsokythuat = '$Thongsokythuat', Gia = '$Gia', SoLuongHang = '$SoLuongHang', MaLoaiHang = '$MaLoaiHang' WHERE MSHH = ".$_GET['id']."";
        $query = $con->query($sql);
     
        $sql = "UPDATE hinhhanghoa SET TenHinh ='$TenHinh' WHERE MSHH = ".$_GET['id']."";
        $query = $con->query($sql);
        move_uploaded_file($TenHinh_tmp, $TenHinh);
        header('Location: danhsach.php');
      }else{
        $sql = "UPDATE hanghoa SET TenHH = '$TenHH', Thongsokythuat = '$Thongsokythuat', Gia = '$Gia', SoLuongHang = '$SoLuongHang', MaLoaiHang = '$MaLoaiHang' WHERE MSHH = ".$_GET['id']."";
        $query = $con->query($sql);
        header('Location: danhsach.php');
      }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../khachhang/assets/css/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>Thêm</title>
</head>
<body>
    <div class="container-fuild">
        <div class="card">
            <div class="card-header">
                <h1>SỬA HÀNG HÓA</h1>
            </div>
            <div class="card-body">
               <form method="POST" enctype="multipart/form-data" action="">  
                    <div class="form-group">
                      <label for="">TenHH</label>
                      <input type="text" name="TenHH" class="form-control" value="<?php echo $row['TenHH']?>">
                    </div>

                    
                    <div class="form-group">
                      <label for="">TenHinh</label>
                      <input type="file" name="TenHinh" class="form-control">
                      <img src="<?php echo $row['TenHinh']?>" alt="" style="width: 100px; height: 100px;">
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
                      <textarea type="text" name="Thongsokythuat" class="form-control" ><?php echo $row['Thongsokythuat']?>
                      </textarea>
                    </div>

                    <div class="form-group">
                      <label for="">Gia</label>
                      <input type="number" name="Gia" class="form-control" value="<?php echo $row['Gia']?>">
                    </div>

                    <div class="form-group">
                      <label for="">SoLuongHang</label>
                      <input type="number" name="SoLuongHang" class="form-control" value="<?php echo $row['SoLuongHang']?>">
                    </div>
                        <button name="sbm" class="btn btn-success" type="submit">SỬA</button>
                </form>
            </div>
        </div>
    </div>

    </div>
</body>
</html>