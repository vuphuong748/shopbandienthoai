<?php
     include "../ketnoi/ketnoi.php";
     $sql = "SELECT * FROM hanghoa h inner join hinhhanghoa hh on h.MSHH = hh.MSHH WHERE hh.MSHH = ".$_GET['MSHH']."";
     $query = $con->query($sql);
     $row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../khachhang/assets/css/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <style>
        .preview-pic{
            padding: 10px 2px;
            margin: 0 auto;
        }
        .product-description{
            list-style: none;
        }
        
    </style>
</head>
<?php require "./header.php"?>
<body style="font-size: 20px;">
    <main role="main" style="margin-bottom: 90px;">
        <div class="container mt-4">
            <div class="card1">
                <div class="container-fliud">
                    <form name="chitiet"  method="post" action="cart.php?MSHH=<?php echo $row["MSHH"];?>">
                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <img src="../quanly/<?php echo $row['TenHinh']?>" style="width:250px; height:300px" alt="">
                                </div>
                                </ul>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title"><?php echo $row['TenHH'] ?></h3>
                                <ul class="product-description">MÔ TẢ THÔNG SỐ KỸ THUẬT
                                    <li><?php $str = explode(',', $row['Thongsokythuat']);
                                        foreach($str as $i){
                                            echo $i;
                                            echo '<br/>';
                                        }
                                    ?>
                                
                                </li>
                                </ul>
                                <h4 class="price" style="font-size: 20px;"><span><?php echo number_format($row['Gia'], 0, ",", ".") ;?> đ</span></h4>
                                <input name="sbm" class="btn btn-success" type="submit" style="font-size: 16px; margin: 10px 0" value="THÊM VÀO GIỎ HÀNG">
                            </div>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php require "./footer.php"?>
</body>
</html>
