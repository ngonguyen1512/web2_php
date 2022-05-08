<?php 
    include './connect_db.php';
    session_start();
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
        unset($_SESSION['dangnhapweb']);
        session_destroy();
        header('Location: index.php');
    }
    $cart = (isset($_SESSION['cart']))? $_SESSION['cart'] : [];
?>
<div class="header">
    <div class="menu">
        <ul class="list_menu">
            <li style="margin-left: 3%; margin-right:6%">
                <a href="index.php" style="font-size: 22px; ">NIKE SNEAKER</a>
            </li>
            <li><a href="index.php">Trang chủ</a></li>
            <li>
                <a href="index.php?quanly=sanpham">Sản phẩm</a>
                <i class='bx bxs-chevron-down products-arrow arrow'></i>
                <ul class="products-sub-menu sub-menu">
                    <li><a href="index.php?quanly=sanpham&quanly=jd">JORDAN</a></li>
                    <li><a href="index.php?quanly=sanpham&quanly=af">AIR FORCE</a></li>
                    <li><a href="index.php?quanly=sanpham&quanly=am">AIR MAX</a></li>
                    <li><a href="index.php?quanly=sanpham&quanly=lb">LEBRON</a></li>
                    <!-- <li><a href="#">Putter Clubs</a></li> -->
                </ul>
            </li>
            <li><a href="index.php?quanly=phukien">Sản phẩm khác</a></li>
            <li><a href="index.php?quanly=chungtoi">Chúng tôi</a></li>
            <li>
                <a href="index.php?quanly=giohang">Giỏ hàng (<?php echo count($cart)?>)</a>
            </li>
            <div class="login_logsign">
                <ul>
                    <li class="user">
                        <?php
                            if(isset($_SESSION['dangnhapweb'])){ 
                                echo $_SESSION['dangnhapweb'];
                            } 
                        ?>
                    </li>
                    <li >
                        <?php 
                            if(isset($_SESSION['dangnhapweb'])){ ?>
                                <a href="index.php?dangxuat=1">Đăng xuất</a>
                            <?php }else{?>
                                    <li><a href="../webshop/login.php">Đăng nhập</a></li>
                                    <li><a href="../webshop/logsign.php">Đăng ký</a></li>
                            <?php } 
                        ?>
                    </li>
                </ul>
            </div>
        </ul>
    </div>
</div>
<style>
    .header{
        width:100%;
    }
    .user{
        font-size: 18px;
    }
    .list_menu ul{
        list-style: none;
    }
    .list_menu ul li {
       float: left;
    }
    .login_logsign  ul{
        list-style: none;
    }
    li{
        color: white;
        /* background-color:red; */
    }
    li:hover .products-arrow{
        transform: rotate(180deg);
    }
    li .arrow{
        height: 100%;
        width: 22px;
        /* line-height: 70px; */
        text-align: center;
        display: inline-block;
        color: white;
        transition: all 0.3s ease;
    }
    li .sub-menu{
        position: absolute;
        top: 41px;
        left: 31%;
        width:11%;
        line-height: 40px;
        background: black;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        border-radius: 0 0 5px 5px;
        display: none;
        z-index: 2;
    }
    li:hover .products-sub-menu{
        display: block;
    }
    li .sub-menu li{
        padding: 0;
        margin:0;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    li .sub-menu a{
        color: white;
        font-size: 12px;
        font-weight: 500;
        /* margin:0; */
    }
    li .products-sub-menu:hover {
        display: block;
    }
</style>
<script>
    let htmlcssArrow = document.querySelector(".products-arrow");
    htmlcssArrow.onclick = function() {
        navLinks.classList.toggle("show1");
    }
</script>
<div class="clear"></div>
