<?php 
    include './connect_db.php';
    if(isset($_POST['searchwsp'])){
        $tukhoasp = $_POST['tukhoasp'];
    }
    $sql_sp = "SELECT * FROM `product` WHERE `tensp` LIKE '%$tukhoasp%' OR `dongia` LIKE '%$tukhoasp%'";
    $query = mysqli_query($con, $sql_sp);
    // $row = mysqli_fetch_array($con);
?>

<div class="sideleft">
    <ul class="side_main">
        <li>
            <form method="POST" action="index.php?quanly=sanpham&quanly=searchwsp" >
                <input type="text" placeholder="Search..." class="box" name="tukhoasp" style="font-size: 17px; width:70%">
                <input type="submit" name="search" class="sub" value="search" style="font-size: 17px;">
            </form>
        </li>
        <!--Lọc theo brand-->
        <li style="margin-top:8%"></li>
        <li class="dm" ><a href="index.php?quanly=sanpham">TẤT CẢ SẢN PHẨM</a></li>
        <li class="dm"><a href="index.php?quanly=sanpham&quanly=jd">JORDAN</a></li>
        <li class="dm"><a href="index.php?quanly=sanpham&quanly=af">AIR FORCE 1</a></li>
        <li class="dm"><a href="index.php?quanly=sanpham&quanly=am">AIR MAX</a></li>
        <li class="dm"><a href="index.php?quanly=sanpham&quanly=lb">LEBRON</a></li>
        <!-- Lọc theo đơn giá -->
        <li style="margin-top:8%" class="dongia"><a href="index.php?quanly=thap">Dưới 4,000,000 đ</a></li>
        <li class="dongia"><a href="index.php?quanly=sanpham&quanly=trungbinh">4,000,000 đ - 10,000,000 đ</a></li>
        <li class="dongia"><a href="index.php?quanly=sanpham&quanly=cao">Trên 10,000,000</a></li>
        <li style="margin-bottom:15%;"></li>
    </ul>
</div>
<div class="mainsp">
<h1>TÌM KIẾM : <?php echo $_POST['tukhoasp'] ?></h1>
    <ul class="productsp">
    <?php 
        while($row = mysqli_fetch_array($query)){   
            echo '<li><a href = "index.php?quanly=sanpham&quanly=ctsp&idsp='.$row['idsp'].'">';
            echo '<img src = "'.$row['hinhanh'].'"><br><p class="title_product">'.$row['tensp'].'</p><br>
            <p class="price_product">'.$row['dongia'].' vnd</p><a class="addcart" href="index.php?quanly=sanpham&quanly=themgiohang&idsp='.$row['idsp'].'">Thêm vào giỏ hàng';
            echo '</a></li>';
        }
        echo '</ul>';
    ?>
    </div>
<style>
    /* h1{
        float: left;
    } */
    .productsp {
        list-style: none;
        
    }
    .productsp li{
        width: 20%;
        height: auto;
        border: 1px solid black;
        border-radius: 10px;
        margin: 10px;
        float: left;
        padding: 5px;
        background-color: #f2f2f2;
        align-content: center;
        justify-content: center;
        height: 330px;
    }
    .productsp li img{
        width: 100%;
        height: 70%;
    }
    .productsp li a{
        text-decoration: none;
    }
    .productsp .addcart{
        color: black;
        font-size: 15px;
        border:1px solid black;
        padding:3px;
        background-color: yellow;
        border-radius: 10px;
        margin: 0 0 0 16%;
    }
    
    .productsp .title_product {
        text-decoration: none;
        text-align: center;
        color: black;
        font-size: 16px;
        font-weight: bold;
        margin-top:0;
    }
    .productsp .price_product {
        margin-top: -10px;
        text-decoration: none;
        text-align: center;
        color: red;
        font-size: 16px;
        font-weight: bold;
    }
    .sideleft{
        margin:5% 5px 5% 2%;
        width: 20%;
        border: 1px solid rgb(147, 147, 147);
        /* margin-top: 5px;
        margin-left: 5px; */
        float: left;
        border-radius: 5px;
        /* background-color: rgb(147, 147, 147); */
    }
    .sideleft .side_main{
        list-style: none;
        margin-top: 10%;
    }
    .sideleft .side_main form input{
        margin-left: -8%;
        margin-top: 5%;
        margin-bottom:5%;
    }
    .mainsp{
        float: right;
        /* position:fixed; */
        width: 75%;
        margin-top:3%;
    }
    .sideleft .side_main a{
        font-size: 18px;
        text-decoration: none;
        color: black;
        margin-bottom: 3%;
    }
    .sideleft .side_main .dm,
    .sideleft .side_main .dongia{
        margin-bottom:5%;
    }
    .sideleft .side_main .dm:hover,
    .sideleft .side_main .dongia:hover{
        background-color: rgb(195, 195, 195);
        width: 70%;
        padding: 2%;
        border-radius: 5px;
    }
</style>
