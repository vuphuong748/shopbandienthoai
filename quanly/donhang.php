<?php
include "../ketnoi/ketnoi.php";

$sql = "SELECT * FROM khachhang k inner join dathang d on k.MSKH = d.MSKH";
$query = $con->query($sql);
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
                <h1>ĐƠN ĐẶT HÀNG CỦA KHÁCH HÀNG</h1>
            </div>
            <div class="card-body">
                <table class="table" border="1">
                    <thead class="thead-dark">
                        <tr>
                            <th>Đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Ngày giao hàng</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($rows = $query->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $rows["SoDonDH"]; ?></td>
                                <td><?php echo $rows['HoTenKH']; ?></td>
                                <td><?php echo $rows['NgayDH']; ?></td>
                                <td><?php echo $rows['NgayGH'] ?></td>
                                <td>
                                    <?php if ($rows['TrangThaiDH'] == "1") { ?>
                                        <span class="label bg-green">Đã duyệt</span>

                                    <?php } elseif ($rows['TrangThaiDH'] == "2") { ?>
                                        <i class="far fa-check-circle"></i> Đã giao hàng
                                    
                                    <?php } else { ?>
                                        <span class="label bg-red">Chưa duyệt</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="chitietDH.php?id=<?php echo $rows["SoDonDH"] ?>" class="btn btn-danger" name="update">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="hienthi.php" class="btn btn-danger">
                                    <i class="fa fa-arrow-left" aria-hidden="true" ></i>
                                    &nbsp;Về trang quản trị 
                </a>
            </div>
        </div>
    </div>
</body>

</html>