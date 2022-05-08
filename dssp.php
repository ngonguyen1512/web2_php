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
            echo '<li><a href = "#">';
            echo '<img src = "'.$row['hinhanh'].'"><br><p class="title_product">'.$row['tensp'].'</p><br>
            <p class="price_product">'.$row['dongia'].' đ</p>';
            echo '</a></li>';
        }
        echo '</ul>';
       
    ?>
    
<style>
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
    .productsp .title_product {
        text-decoration: none;
        text-align: center;
        color: black;
        font-size: 16px;
        font-weight: bold;
    }
    .productsp .price_product {
        margin-top: -5px;
        text-decoration: none;
        text-align: center;
        color: red;
        font-size: 16px;
        font-weight: bold;
    }
</style>