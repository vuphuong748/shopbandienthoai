<?php
session_start();
?>

 <header class="header">
    <div class="grid">
        <nav class="header__navbar">
            <ul class="header__navbar-list">
                <li class="header__navbar-item header__navbar--qr header__navbar-item--separate">
                    <a href="index.php" style="text-decoration: none; color: white">
                        Trang chủ
                        <i class="header__navbar-icons fas fa-home"></i>
                    </a>
                </li>
                <li class="header__navbar-item">
                    <span class="header__navbar-no-poiter">Kết nối</span>
                    <a href="" class="header__navbar-icon">
                        <i class="header__navbar-icons fab fa-facebook"></i>
                    </a>
                    <a href="" class="header__navbar-icon">
                        <i class="header__navbar-icons fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
            <ul class="header__navbar-list">
                <li class="header__navbar-item">
                    <a href="" class="header__navbar-link">
                        <i class="header__navbar-icons far fa-question-circle"></i>
                        Trợ giúp
                    </a>
                </li>
                <?php
                if (isset($_SESSION['tkdn'])) { 
                ?>
                    <li class="header__navbar-item heder__navbar-user">
                        <span class="header__navbar-user-name"><?php print_r($_SESSION['tkdn']['HoTenKH']) 
                                                                ?></span>

                        <ul class="header__navbar-user-menu">
                            <li class="header__navbar-user-item">
                                <a href="bill.php?id=<?php echo $_SESSION['tkdn']['MSKH']?>">Đơn mua hàng</a>
                            </li>
                            <li class="header__navbar-user-item header__navbar-user-item--separate">
                                <a href="logout.php">Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                <?php } else { 
                ?>
                    <li class="header__navbar-item header__navbar-item--strong header__navbar-item--separate">
                        <a style="text-decoration: none; color: white;" href="register.php">Đăng Ký</a>
                    </li>
                    <li class="header__navbar-item header__navbar-item--strong">
                        <a style="text-decoration: none; color: white;" href="login.php">Đăng Nhập</a>
                    </li>
                <?php } 
                ?>

            </ul>
        </nav>

        
        <div class="header-with-search">
            <div class="header__logo">
                <a href="index.php" class="header__logo-link">
                    <img src="https://www.dt-shop.com/fileadmin/images/bs4/dt-logo.png" alt="" class="header__logo-img">
                </a>

            </div>
            <form class="header__search" action="" method="POST">
                <div class="header__search_input-wrap">
                    <input type="text" class="header__search_input" name="timkiem" value="<?php if(isset($_POST["timkiem"])){echo $_POST["timkiem"];}?>" placeholder="Tìm kiếm sản phẩm">
                </div>
                <button class="header__search-btn">
                    <i class="header__search-btn-icon fas fa-search"></i>
                </button>
            </form>
           
            
            <a href="cart_show.php">
                <div class="header__cart">
                        <div class="header__cart-wrap">
                            <i class="header__cart-icon fas fa-shopping-cart"></i>
                            <?php if(isset($_SESSION["cart"])){ 
                            ?>
                            <span class="header__cart-notice"><?php  echo count($_SESSION["cart"]);
                                                                ?></span>
                            <?php }else{ 
                            ?>
                            <span class="header__cart-notice">0</span>
                            <?php } 
                            ?>
                        </div>
                </div>

        </div>
        </a>


    </div>
    </div>
</header>

