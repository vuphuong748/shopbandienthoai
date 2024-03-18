<?php
session_start();
include "../ketnoi/ketnoi.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_query = mysqli_query($con, "SELECT * FROM dathang WHERE MSKH = $id ");
    $query = mysqli_fetch_assoc($sql_query);
    //$id_user = $query['MSKH'];
    $user_query = mysqli_query($con,"SELECT * FROM khachhang k join diachikh d on k.MSKH = d.MSKH WHERE k.MSKH = $id");
    $user = mysqli_fetch_assoc($user_query);
    $product = mysqli_query($con, "SELECT * FROM dathang d join chitietdathang c on d.SoDonDH = c.SoDonDH join hanghoa h on c.MSHH = h.MSHH WHERE d.MSKH = $id");
    if (mysqli_fetch_assoc($product) == null)
        $sign = 1;
    else 
        $sign = 0;
}

?>


<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hóa đơn</title>
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../khachhang/assets/css/bootstrap-4.5.3-dist/css/bootstrap.min.css">
</head>

<body>

    <main role="main">
    <?php if ($sign ==0){?>
        <div class="container mt-4">
            <?php if(isset($_GET['id'])){?>
            <form class="needs-validation" name="frmthanhtoan" method="post" action="#">
                <input type="hidden" name="kh_tendangnhap" value="dnpcuong">
                <div class="py-5 text-center">
                    <i class="fas fa-file-invoice fa-4x" aria-hidden="true"></i>
                    <h2>Hóa đơn mua hàng</h2>
                </div>

                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Thông tin khách hàng</h4>
                        <div class="row">
                                <div class="col-md-12">
                                <label for="kh_ten">Họ tên khách hàng</label>
                                <input type="text" class="form-control" name="kh_ten" value="<?php echo $user["HoTenKH"];?>" readonly="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_gioitinh">Tên công ty</label>
                                <input type="text" class="form-control" name="kh_congty"  value="<?php echo $user["TenCongTy"];?>" readonly="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_diachi">Địa chỉ</label>
                                <input type="text" class="form-control" name="kh_diachi" value="<?php echo $user["DiaChi"];?>" readonly="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_dienthoai">Số điện thoại</label>
                                <input type="text" class="form-control" name="kh_dienthoai" value="<?php echo $user["SoDienThoai"];?>" readonly="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_email">Số Fax</label>
                                <input type="text" class="form-control" name="kh_sofax" value="<?php echo $user["SoFax"];?>" readonly="">
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Hóa đơn</span>
                        </h4>
                         <ul class="list-group mb-3">
                            <input type="hidden">
                            <input type="hidden">
                            <input type="hidden">

                            <?php 
                                    $total = 0;
                                
                                foreach ($product as $value) {
                                    $sum = 0;
                                    $sum = $value["SoLuong"] * $value["GiaDatHang"];
                                    $total += $sum;
                                ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><?php echo $value["TenHH"];?></h6>
                                    <small class="text-muted">
                                        <?php echo number_format( $value["GiaDatHang"],0,",",".")?>đ x <?php echo $value["SoLuong"];?>
                                    </small>
                                </div>
                                <span class="text-muted"><?php echo number_format($sum,0,",",".")?>đ</span>
                            </li>
                            <input type="hidden">
                            <input type="hidden">
                            <input type="hidden">
                           <?php } ?>
                            <input type="hidden">
                            <input type="hidden">
                            <input type="hidden">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tổng thành tiền</span>
                                <strong><?php echo number_format($total,0,",",".")?>đ</strong>
                            </li>
                            <input type="hidden">
                            <input type="hidden">
                            <input type="hidden">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Trạng thái đặt hàng</span>
                            <?php if($value["TrangThaiDH"] == 1){?>
                                <span class="label bg-green">
                                <i class="far fa-check-circle"></i>    
                                    Đã duyệt
                                </span>
                            <?php }elseif($value["TrangThaiDH"] == 2){?>
                                <span class="label bg-green">
                                <i class="fas fa-box-open"></i>
                                    Đã giao hàng</span>    
                           <?php }else{ ?>
                                <a href="delete_bill.php?SoDonDH=<?php echo $value["SoDonDH"];?>" class="btn btn-danger"  style="margin:10px 0; border: radius 5px;"> Hủy đơn hàng </a>
                                <?php unset($_GET["SoDonDH"]); ?>
                            <?php }?>
                            </li>
                        </ul>
                       
                    </div> 
                </div>
            </form>
            <?php }}else{?>
                <div class="alert alert-danger" style="margin: 5px 0 ;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Vui lòng về trang chủ mua hàng</strong> <a href="index.php" style="text-decoration: none;">Trang chủ</a>
                                </div>
                <?php }?>
        </div>
    </main>

</body>

</html>