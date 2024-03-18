<?php
session_start();
include "../ketnoi/ketnoi.php";
if (isset($_POST["update"])) {
    foreach ($_SESSION["cart"] as $value) {
        if ($_POST["SoLuongHang" . $value["MSHH"]] <= 0) {
            unset($_SESSION["cart"][$value["MSHH"]]);
        } else {
            $_SESSION["cart"][$value["MSHH"]]["SoLuongHang"] = $_POST["SoLuongHang" . $value["MSHH"]];
        }
    }
}

if (isset($_POST["checkout"])) {
    $MSKH = $_SESSION['tkdn']['MSKH'];
    if (isset(($_SESSION["cart"])) || $_SESSION["cart"] != null) {
        $sqlDatHang = "INSERT INTO dathang(MSKH, MSNV, NgayDH, NgayGH, TrangThaiDH) VALUES('$MSKH','1','" . date("Y-m-d") . "','" . date("Y-m-d", strtotime(' + 10 days')) . "','0')";
        // echo $sqlDatHang; exit;
        $queryDatHang = $con->query($sqlDatHang);
        $sodonDH = mysqli_insert_id($con);

        foreach ($_SESSION["cart"] as $var) {
            $sqlCTDatHang = "INSERT INTO chitietdathang(SoDonDH,MSHH,SoLuong,GiaDatHang) VALUES('".$sodonDH."','".$var["MSHH"]."','".$var["SoLuongHang"]."','".$var["Gia"]."')";
            $queryCTDatHang = $con->query($sqlCTDatHang);
        }
       
    }
    unset($_SESSION["cart"]);
    header("Location: index.php");
}



?>


<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../khachhang/assets/css/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <style>
        .bg-dark1 {
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .hinhdaidien {
            width: 50px;
            height: 50px;
        }

        .header__cart-list img {
            width: 500px;
        }

        .header__cart-list {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header__cart-list-no-cart-msg {
            margin: 20px;
            font-size: 30px;
        }
    </style>

</head>

<body style="font-size: 16px;">
    <?php
    if (isset($_SESSION["cart"]) && $_SESSION["cart"] != null) { ?>
        <main role="main">
            <div class="container mt-4">
                <h1 class="text-center">Giỏ hàng</h1>
                    <div class="row">
                        <div class="col col-md-12">
                            <form action="cart_show.php" method="POST">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datarow">
                                        <?php if (isset($_SESSION["cart"])) {
                                            $total = 0;
                                            foreach ($_SESSION["cart"] as $value) {
                                                $sum = 0;
                                                $sum = $value["Gia"] * $value["SoLuongHang"];
                                                $total += $sum;
                                        ?>
                                                <tr>
                                                    <td><?php echo $value["TenHH"] ?></td>
                                                    <td>
                                                        <img src="../quanly/<?php echo $value["TenHinh"] ?>" class="hinhdaidien">
                                                    </td>
                                                    <td class="text-right"><input type="number" min="1" name="SoLuongHang<?php echo $value["MSHH"] ?>" value="<?php echo $value["SoLuongHang"] ?>"></td>
                                                    <td class="text-right"><?php echo number_format($value["Gia"], 0, ",", ".") ?>đ</td>
                                                    <td class="text-right"><?php echo number_format($sum, 0, ",", ".");  ?>đ</td>
                                                    <td>
                                                        <a href="delete_cart.php?MSHH=<?php echo $value["MSHH"]; ?>" class="btn btn-danger">
                                                            <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                                        </a>
                                                        <button class="btn btn-danger" name="update">
                                                            <i class="fas fa-pencil-alt"></i> Cập nhật
                                                        </button>
                                                    </td>
                                                </tr>

                                        <?php }
                                        } ?>
                                        <tr>
                                            <td colspan="6" style="text-align: center;">Tổng tiền của đơn hàng: <?php echo number_format($total, 0, ",", "."); ?>đ </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="index.php" class="btn btn-warning">
                                    <i class="fa fa-arrow-left" aria-hidden="true" ></i>
                                    &nbsp;Quay về trang chủ
                                </a>
                                <a href="index.php" class="btn btn-primary" >&nbsp;Tiếp tục mua hàng</a>
                                <?php if (isset($_SESSION['tkdn'])) { ?>
                                <button class="btn btn-primary" name="checkout">&nbsp;Đặt hàng</button>
                            <?php } else { ?>
                                <div class="alert alert-danger" style="margin: 5px 0 ;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Vui lòng đăng nhập để thanh toán</strong> <a href="login.php?action=cart_show" style="text-decoration: none;">Đăng nhập</a>
                                </div>
                            <?php } ?>
                           
                            </form>
                           
                        </div>
                    </div>
            </div>
        </main>
    <?php } else { ?>
        <div class="header__cart-list">
            <img src="./assets/img/no_cart.png" alt="" class="header__cart-no-cart-img">
            <span class="header__cart-list-no-cart-msg">
                Chưa có sản phẩm
            </span>
            <a href="index.php" class="btn btn-warning">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                &nbsp;Quay về trang chủ
            </a>
        </div>
    <?php }
    ?>


</body>
</html>