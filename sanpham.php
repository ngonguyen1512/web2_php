<?php 
    include './connect_db.php';
    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
    $page = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($page - 1) * $item_per_page;
    $totalReconds = mysqli_query($con, "SELECT * FROM `product`");
    $totalReconds = $totalReconds->num_rows;
    $totalPage = ceil($totalReconds/$item_per_page);
    $result = mysqli_query ($con, "SELECT * FROM `product` ORDER BY 'idsp' ASC LIMIT ".$item_per_page." OFFSET ".$offset."");
    mysqli_close($con);
?>
<div id="user_info">
    <h1>Danh sách sản phẩm</h1>
    <a href="index.php?quanly=sanpham&quanly=addsp" style=" font-size: 19px;">Thêm sản phẩm mới</a>
    <form method="POST" action="index.php?quanly=sanpham&quanly=searchsp" style="margin-left: 74%; margin-bottom: 1%;">
        <input type="text" placeholder="Search..." class="box" name="tukhoa" style="font-size: 17px;">
        <input type="submit" name="searchsp" class="sub" value="search" style="font-size: 17px;">
    </form>
    <table id="user-listing" style="width:98%;">
        <tr>
            <th style="width:4%">Id</th>
            <th style="width:5%">Brand</th>
            <th style="width:6%">Hình ảnh </th>
            <th style="width:20%">Tên sản phẩm</th>
            <th style="width:8%">Số lượng</th>
            <th class="gia">Đơn giá</th>
            <th class="edit">Sửa</th>
            <th class="delete">Xoá</th>
            <th style="width:5%">Chi tiết</th>
        </tr>   
        <?php 
            while($row = mysqli_fetch_array($result)){
                echo '<tr>';
                echo '<th>'.$row['idsp'].'</th>';  
                echo '<td style="text-align:center;">'.$row['mabrand'].'</td>';
                echo '<td><img src="'.$row['hinhanh'].'" style="width:100%; height:10%"></td>';  
                echo '<td>'.$row['tensp'].'</td>'; 
                echo '<td style="text-align:center">'.$row['soluong'].'</td>'; 
                echo '<td style="text-align:center;">'.number_format($row['dongia']).'</td>';  
            ?>
                <th class="edit">
                    <a href="index.php?quanly=sanpham&quanly=editsp&idsp=<?= $row['idsp']?>">
                        <i class='bx bxs-edit' ></i>
                    </a>
                </th>
                <th class="delete">
                    <a href="index.php?quanly=sanpham&quanly=deletesp&idsp=<?= $row['idsp']?>">
                        <i class='bx bx-trash' ></i>
                    </a>
                </th>
                <th class="info">
                    <a href="index.php?quanly=sanpham&quanly=chitietsp&idsp=<?= $row['idsp']?>">
                        <i class='bx bx-food-menu'></i>
                    </a>
                </th>
                <?php echo "</tr>"; } ?>
            </table>
            <div class="chuyentrang" style="position: fixed; bottom:15px; margin-left:21%">
                <?php 
                    if($page > 1){
                        $prev_page = $page - 1; ?>
                        <a class="page_item" href="index.php?quanly=sanpham&per_page=<?=$item_per_page?>&page=<?=$prev_page?>" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold;  bottom:9px;">Prev</a>
                    <?php }
                ?>
                    <a class="page_item" href="index.php?quanly=sanpham" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold">1</a>
                    <?php for($num = 2 ; $num <=$totalPage; $num++) { ?>
                        <a class="page_item" href="index.php?quanly=sanpham&per_page=<?=$item_per_page?>&page=<?=$num?>" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold"><?=$num?></a>
                    <?php }?>
                <?php 
                    if($page < $totalPage){
                        $next_page = $page + 1; ?>
                        <a class="page_item" href="index.php?quanly=sanpham&per_page=<?=$item_per_page?>&page=<?=$next_page?>" style="font-size: 22px; margin-right: 5px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none;color: black; font-weight:bold;  bottom:9px;">Next</a>
                    <?php }
                ?>
            </div>
        </div>
    </div>
</div>
