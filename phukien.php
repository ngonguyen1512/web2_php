<?php 
    include './connect_db.php'; 
    // include 'side/sideleft.php'; 
    $result= mysqli_query($con, "SELECT * FROM `product` WHERE `mabrand` = 'SPK'");
    mysqli_close($con);
?>
<div class="pk">
    <h1>SẢN PHẨM KHÁC</h1>

    <ul class="productsp">
    
    <?php 
        while($row = mysqli_fetch_array($result)){   
            echo'<li><a href = "index.php?quanly=sanpham&quanly=ctsp&idsp='.$row['idsp'].'">';
            echo '<img src = "'.$row['hinhanh'].'"><br><p class="title_product">'.$row['tensp'].'</p><br><p class="price_product">'. number_format($row['dongia']) .' vnd</p><a class="addcart" href="index.php?quanly=sanpham&quanly=themgiohang&idsp='.$row['idsp'].'">Thêm vào giỏ hàng';
            echo '</a></li>';
        }
        echo '</ul>';
    
    ?>
</div>
<style>
    .pk h1{
        margin: 5% 0 0 8%;
    }
    .productsp {
        list-style: none;
        margin-left: 7%;
        margin-bottom: 5%;
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
    .productsp .title_product {
        text-decoration: none;
        text-align: center;
        color: black;
        font-size: 16px;
        font-weight: bold;
        margin-top: 0;
    }
    .productsp .addcart{
        color: black;
        font-size: 15px;
        border:1px solid black;
        padding:3px;
        background-color: yellow;
        border-radius: 10px;
        margin: 0 0 0 24%;
    }
    .productsp .price_product {
        margin-top: -10px;
        text-decoration: none;
        text-align: center;
        color: red;
        font-size: 16px;
        font-weight: bold;
    }
</style>
