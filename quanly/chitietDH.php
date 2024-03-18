<?php 
    include "../ketnoi/ketnoi.php";
    if(isset($_GET["id"])){
    $sql = "SELECT * FROM dathang d inner join chitietdathang c on d.SoDonDH = c.SoDonDH inner join hanghoa h on c.MSHH = h.MSHH inner join hinhhanghoa t on h.MSHH = t.MSHH WHERE c.SoDonDH = ".$_GET["id"]." ";
    $query = $con->query($sql);
    }

    if(isset($_POST["status"])){
        mysqli_query($con, "UPDATE dathang  SET TrangThaiDH = ".$_POST["status"]." WHERE SoDonDH = ".$_GET["id"]."");
        header("Location: donhang.php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../khachhang/assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../khachhang/assets/css/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Đơn hàng</title>
</head>

<body>
    <div class="container-fuild">
        <div class="card">
            <div class="card-header">
                <h1>CHI TIẾT ĐƠN HÀNG</h1>
            </div>
            <div class="card-body">
                <!-- <a href="hienthi.php" class="btn btn-primary" style="margin: 0 0 5px;">Về trang quản trị</a> -->
                
                <table class="table" border="1">
                    <thead class="thead-dark">
                        <tr>
                            <th>Số đơn hàng</th>
                            <th>Tên hàng</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá đặt hàng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $total = 0;
                        foreach ($query as $value) { 
                            $sum = 0;
                            $sum = $value["SoLuong"] * $value["GiaDatHang"];
                            $total += $sum;
                            ?>
                            <tr>
                                <td><?php echo $value["SoDonDH"]; ?></td>
                                <td><?php echo $value['TenHH']; ?></td>
                                <td><img src="<?php echo $value['TenHinh']?>" width="50px" alt=""></td>   
                                <td><?php echo $value["SoLuong"]?></td>
                                <td><?php echo number_format($value["GiaDatHang"],0, ",", ".");?>đ</td>
                                <td><?php echo number_format($sum,0, ",", ".")?>đ</td>
                            </tr>
                       <?php } ?>
                            <tr>
                                <td colspan="6">Tổng tiền: <?php echo number_format($total,0, ",", ".")?>đ</td>
                            </tr>
                    </tbody>
                </table>
                
                <div class="panel panel-info" style="margin: 10px 0">
                      <div class="panel-body">
                              
                              <form action="" method="POST" class="form-inline" role="form">
                              
                                  <div class="form-group">
                                      <label class="sr-only">Trạng thái</label>
                                     <select name="status" id="input" class="form-control" required="required">
                                         <option value="0">Chưa duyệt</option>
                                         <option value="1">Đã duyệt</option>
                                         <option value="2">Đã giao hàng</option>
                                     </select>
                                     
                                  </div>
                                  <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Cập nhật</button>
                              </form>
                                
                      </div>
                </div>
                
                <a href="donhang.php" class="btn btn-danger">
                                    <i class="fa fa-arrow-left" aria-hidden="true" ></i>
                                    &nbsp;Về đơn hàng
                </a>
            </div>
        </div>
    </div>
</body>

</html>