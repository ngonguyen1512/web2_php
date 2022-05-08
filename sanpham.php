<?php 
    include './connect_db.php'; 
    
?>
<div class="sideleft">
    <ul class="side_main">
        <li >
            <form method="POST" action="index.php?quanly=sanpham&quanly=searchwsp" >
                <input type="text" placeholder="Search..." class="box" name="tukhoasp" style="font-size: 17px; width:68%">
                <input type="submit" name="searchwsp" class="sub" value="search" style="font-size: 17px;margin-left:2px;">
            </form>
        </li>
        <!--Lọc theo brand-->
        <li style="margin-top:8%"></li>
        <li class="dm" ><a href="index.php?quanly=sanpham">TẤT CẢ SẢN PHẨM</a></li>
        <li class="dm"><a href="index.php?quanly=sanpham&quanly=jd">JORDAN</a></li>
        <li class="dm"><a href="index.php?quanly=sanpham&quanly=af">AIR FORCE 1</a></li>
        <li class="dm"><a href="index.php?quanly=sanpham&quanly=am">AIR MAX</a></li>
        <li class="dm"><a href="index.php?quanly=sanpham&quanly=lb">LEBRON</a></li>
        <!--Lọc theo đơn giá-->
        <li style="margin-top:8%" class="dongia"><a href="index.php?quanly=thap">Dưới 4,000,000 đ</a></li>
        <li class="dongia"><a href="index.php?quanly=sanpham&quanly=trungbinh">4,000,000 đ - 10,000,000</a></li>
        <li class="dongia"><a href="index.php?quanly=sanpham&quanly=cao">Trên 10,000,000</a></li>
        <li style="margin-bottom:15%;"></li>
    </ul>
</div>
<div class="mainsp">
    <?php 
        include './connect_db.php';
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:12;
        $page = !empty($_GET['page'])?$_GET['page']:1;
        $offset = ($page - 1) * $item_per_page;
        $totalReconds = mysqli_query($con, "SELECT * FROM `product`");
        $totalReconds = $totalReconds->num_rows;
        $totalPage = ceil($totalReconds/$item_per_page);
        $result = mysqli_query ($con, "SELECT * FROM `product` ORDER BY 'idsp' ASC LIMIT ".$item_per_page." OFFSET ".$offset."");
        
        mysqli_close($con);
    ?>
    <h1>SẢN PHẨM</h1>
        <ul class="productsp">
            <?php 
                while($row = mysqli_fetch_array($result)){   
                    echo'<li><a href = "index.php?quanly=sanpham&quanly=ctsp&idsp='.$row['idsp'].'">';
                    echo '<img src = "'.$row['hinhanh'].'"><br><p class="title_product">'.$row['tensp'].'</p><br>
                    <p class="price_product">'. number_format($row['dongia']) .' vnd</p><a class="addcart" href="index.php?quanly=sanpham&quanly=themgiohang&idsp='.$row['idsp'].'">Thêm vào giỏ hàng';
                    echo '</a></li>';
                }?>
                
                <?php echo '</ul>';
            ?>
</div>

<div class="chuyentrang" style="margin: 3% 0 2% 42%; ">
    <?php 
        if($page > 1){
            $prev_page = $page - 1; ?>
            <a class="page_item" href="index.php?quanly=sanpham&per_page=<?=$item_per_page?>&page=<?=$prev_page?>" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold;  margin-bottom:3%; border-radius:10px;">Prev</a>
        <?php }?>        
        <a class="page_item" href="index.php?quanly=sanpham" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold; margin-bottom:3%;border-radius:10px;">1</a>
        <?php for($num = 2 ; $num <=$totalPage; $num++) { ?>
            <a class="page_item" href="index.php?quanly=sanpham&per_page=<?=$item_per_page?>&page=<?=$num?>" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold; margin-bottom:3%;border-radius:10px;"><?=$num?></a>
        <?php }
        if($page < $totalPage){
            $next_page = $page + 1; ?>
            <a class="page_item" href="index.php?quanly=sanpham&per_page=<?=$item_per_page?>&page=<?=$next_page?>" style="font-size: 22px; margin-right: 5px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none;color: black; font-weight:bold;  margin-bottom:3%; border-radius:10px;">Next</a>
        <?php }
    ?>
</div>
<style>
    .phantran{
        display: block;
        justify-content: right;
        margin-bottom: 10%;
    }
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
        margin:5% 5px 0 2%;
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