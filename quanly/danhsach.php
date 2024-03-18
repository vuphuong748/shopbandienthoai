<?php
        include"../ketnoi/ketnoi.php";
        

        $sql = "SELECT * FROM hanghoa hh inner join hinhhanghoa hhh on hh.MSHH = hhh.MSHH inner join loaihanghoa lhh on lhh.MaLoaiHang = hh.MaLoaiHang";
        // echo $sql;
        // $query = mysqli_query($conn, $sql);
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
    <title>Danh sách</title>
</head>

<body>

<?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            // case 'danhsach':
            //     require_once 'danhsach.php';
            //     break;
            case 'themhanghoa':
                require_once 'themhanghoa.php';
                break;
            case 'suahanghoa':
                require_once 'suahanghoa.php';
                break;
            case 'xoahanghoa':
                require_once 'xoahanghoa.php';
                break;
            default:
                require_once 'danhsach.php';
                break;
        }
    }else{
         require_once 'danhsach.php';
    }

    ?>

<div class="container-fuild">
<div class="card">
    <div class="card-header">
        <h1>DANH SÁCH HÀNG HÓA</h1>
    </div>
    <div class="card-body">
        <table class="table" border="1">
            <thead class="thead-dark">
                <tr>
                    <th>TenHH</th>
                    <th>TenHinh</th>
                    <th>TenLoaiHang</th>
                    <th>ThongSoKyThuat</th>
                    <th>Gia</th>
                    <th>SoLuongHang</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($rows = $query->fetch_assoc()){?>
                        <tr>
                            <td><?php echo $rows['TenHH']; ?></td>
                            <td>
                               <img src="<?php echo $rows['TenHinh']?>" alt="" style="width: 50px; height: 50px;">

                             
                             </td>
                            <td><?php echo $rows['TenLoaiHang']; ?></td>
                            <td><?php echo $rows['Thongsokythuat']; ?></td>
                            <td><?php echo $rows['Gia']; ?></td>
                            <td><?php echo $rows['SoLuongHang']; ?></td>
                            <td>
                                 <a href="suahanghoa.php?page_layout=suahanghoa&id=<?php echo $rows['MSHH'] ?>">Sửa</a> 
                            </td>
                            <td>
                                <a href="xoahanghoa.php?page_layout=xoahanghoa&id=<?php echo $rows['MSHH'] ?>">Xóa</a>  
                            </td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
       <a class="btn btn-primary" href="themhanghoa.php?page_layout=themhanghoa">THÊM</a>
       <a href="hienthi.php" class="btn btn-danger">
                                    <i class="fa fa-arrow-left" aria-hidden="true" ></i>
                                    &nbsp;Về trang quản trị 
        </a>
    </div>
    
</div>
</div>


</body>

</html>