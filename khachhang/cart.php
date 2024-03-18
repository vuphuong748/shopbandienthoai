<?php 
    session_start();
    include "../ketnoi/ketnoi.php";
    $MSHH = $_GET['MSHH'];
    $sql = "SELECT * FROM hanghoa h inner join hinhhanghoa hh on h.MSHH = hh.MSHH WHERE hh.MSHH = $MSHH";
    $query = $con->query($sql);
    //$row = mysqli_fetch_array($query);

    $product_cart = array();
    foreach ($query as $value){
        $product_cart[$value['MSHH']] = $value;
    }
    if(isset($_POST["sbm"])){
        if(!isset($_SESSION["cart"]) || $_SESSION["cart"] == null){
            $product_cart[$MSHH]["SoLuongHang"] = 1;
            $_SESSION["cart"][$MSHH] = $product_cart[$MSHH];
        }
        else{
            if(array_key_exists($MSHH, $_SESSION["cart"])){
                $_SESSION["cart"][$MSHH]["SoLuongHang"] += 1;
            }
            else{
                $product_cart[$MSHH]["SoLuongHang"] = 1;
                $_SESSION["cart"][$MSHH] = $product_cart[$MSHH];
            }
        }
        header("Location: cart_show.php");
    }

?>