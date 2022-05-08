<div class="slideshow">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
        $(function(){
            $('.fadein img:gt(0)').hide();
            setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
        });
    </script>
    <div class="fadein">
        <?php 
            $dir = "./image/slider/";
            $scan_dir = scandir($dir);
            foreach($scan_dir as $img):
                if(in_array($img,array('.','..')))
                    continue;
            ?>
            <img src="<?php echo $dir.$img ?>" alt="<?php echo $img ?>">
        <?php endforeach; ?>
    </div>
</div>
<?php
    include './connect_db.php';
    $result = mysqli_query($con, "SELECT * FROM `newproduct` WHERE `idnewsp` <= '5'");
    $result1 = mysqli_query($con, "SELECT * FROM `newproduct` WHERE `idnewsp` > '5'");
    mysqli_close($con);
?>
<div class="dbsp">
    <h1>Sản phẩm nổi bật</h1>
    <ul class="product_list">
    <?php 
        while($row = mysqli_fetch_array($result)){   
            echo'<li><a href = "index.php?quanly=sanpham&quanly=ctsp&idsp='.$row['idsp'].'">';
            echo '<img src = "'.$row['hinhanh'].'"><br><p class="title_product">'.$row['tensp'].'</p><br>
            <p class="price_product">'. number_format($row['dongia']) .' vnd</p><a class="addcart" href="index.php?quanly=sanpham&quanly=themgiohang&idsp='.$row['idsp'].'">Thêm vào giỏ hàng';
            echo '</a></li>';
        }
    ?>
    </ul>
</div>
<div class="newsp">
    <h1>Sản phẩm mới</h1>
    <ul class="product_new"> 
    <?php 
        while($row1 = mysqli_fetch_array($result1)){   
            echo'<li><a href = "index.php?quanly=sanpham&quanly=ctsp&idsp='.$row1['idsp'].'">';
            echo '<img src = "'.$row1['hinhanh'].'"><br><p class="title_product">'.$row1['tensp'].'</p><br>
            <p class="price_product">'. number_format($row1['dongia']) .' vnd</p><a class="addcart" href="index.php?quanly=sanpham&quanly=themgiohang&idsp='.$row1['idsp'].'">Thêm vào giỏ hàng';
            echo '</a></li>';
        }
    ?>
    </ul>
</div> 
<style>
    .dbsp, 
    .dbsp {
        list-style: none;
    }
    .dbsp li,
    .newsp li{
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
    .dbsp li img,
    .newsp li img{
        width: 100%;
        height: 70%;
    }
    .dbsp li a,
    .newsp li a{
        text-decoration: none;
    }
    .dbsp .addcart,
    .newsp .addcart{
        color: black;
        font-size: 15px;
        border:1px solid black;
        padding:3px;
        background-color: yellow;
        border-radius: 10px;
        margin: 0 0 0 16%;
    }
    .dbsp .title_product,
    .newsp .title_product {
        text-decoration: none;
        text-align: center;
        color: black;
        font-size: 16px;
        font-weight: bold;
        margin-top:0;
    }
    .dbsp .price_product,
    .newsp .price_product {
        margin-top: -10px;
        text-decoration: none;
        text-align: center;
        color: red;
        font-size: 16px;
        font-weight: bold;
    }
</style>