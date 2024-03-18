<?php
include "../ketnoi/ketnoi.php";
$sql = "SELECT * FROM hanghoa h inner join hinhhanghoa hh on h.MSHH = hh.MSHH";
if(isset($_POST['timkiem']) && $_POST['timkiem']!=""){
    $TenHH = $_POST['timkiem'];
    $sql = "SELECT * FROM hanghoa h join hinhhanghoa hh on h.MSHH = hh.MSHH WHERE h.TenHH LIKE '%$TenHH%'";
}
else{
    $TenHH ="";
}
$query = mysqli_query($con, $sql);
?>

<div class="app__container">
    <div class="grid">
        <div class="grid_row app__content">
            <div class="grid__column-2">
                <nav class="category">
                    <h3 class="category__heading">Danh mục</h3>
                    <ul class="category-list">
                        <li class="category-item category-item--active">
                            <a href="index.php" class="category-item__link">Điện thoại</a>
                        </li>
                    </ul>
                </nav>

            </div>
            <div class="grid__column-10">
                <div class="home-filter">
                    <img src="https://cdn.tgdd.vn/2021/10/banner/1200-44-1200x44-3.png" alt="">
                </div>


                <div class="home-product">
                    <div class="grid_row">
                        <?php foreach ($query as $row) { ?>
                            <div class="grid__column-2-4">

                                <a class="home-product-item" href="details.php?MSHH=<?php echo $row['MSHH'] ?>">
                                    <div class="home-product-item__img" style="background-image: url('../quanly/<?php echo $row['TenHinh']; ?>');"></div>
                                    <h4 class="home-product-item__name"><?php echo $row['TenHH']; ?></h4>
                                    <div class="home-product-item__price">
                                        <span class="home-product-item__price-current"><?php echo number_format($row['Gia'], 0, ",", "."); ?> đ</span>
                                    </div>
                                    <div class="home-product-item__action">
                                        <span class="home-product-item__heart home-product-item__heart--liked">
                                            <i class="home-product-item__heart-icon-empty far fa-heart"></i>
                                            <i class="home-product-item__heart-icon-fill fas fa-heart"></i>
                                        </span>
                                        <div class="home-product-item__rating">
                                            <i class="home-product-item__star--gold fas fa-star"></i>
                                            <i class="home-product-item__star--gold fas fa-star"></i>
                                            <i class="home-product-item__star--gold fas fa-star"></i>
                                            <i class="home-product-item__star--gold fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="home-product-item__favourite">
                                        <i class="fas fa-check"></i>
                                        <span>Yêu thích</span>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>