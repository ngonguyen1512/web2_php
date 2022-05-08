<?php 
    include './connect_db.php';
    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:15;
    $page = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($page - 1) * $item_per_page;
    $totalReconds = mysqli_query($con, "SELECT * FROM `donhang`");
    $totalReconds = $totalReconds->num_rows;
    $totalPage = ceil($totalReconds/$item_per_page);
    $result = mysqli_query ($con, "SELECT * FROM `donhang`,`user` WHERE `donhang`.`id_user` = `user`.`id_user` ORDER BY 'madh' ASC LIMIT ".$item_per_page." OFFSET ".$offset."");
    mysqli_close($con);
?>
<div id="user_info">
    <h1>Danh sách đơn hàng</h1>
    <form method="POST" action="index.php?quanly=donhang&quanly=searchdh" style="margin-left: 74%; margin-bottom: 1%;">
        <input type="text" placeholder="Search..." class="box" name="tukhoadh" style="font-size: 17px;">
        <input type="submit" name="searchdh" class="sub" value="search" style="font-size: 17px;">
    </form>
    <table id="user-listing" style="width:98%;">
        <tr>
            <th style="width:5%">MADH</th>
            <th style="width:9%">Ngày đặt</th>
            <th style="width:5%">IDKH</th>
            <th style="width:16%">Tên khách hàng</th>
            <th style="width:20%">Địa chỉ</th>
            <th style="width:10%">Tổng ĐH</th>
            <th class="delete">Xoá</th>
            <th style="width:5%">Chi tiết</th>
        </tr>   
        <?php 
            while($row = mysqli_fetch_array($result)){
                echo '<tr>';
                echo '<th>'.$row['madh'].'</th>';   
                echo '<td style="text-align:center;">'.$row['ngaydat'].'</td>';  
                echo '<td style="text-align:center;">'.$row['id_user'].'</td>'; 
                echo '<td>'.$row['hoten'].'</td>'; 
                echo '<td style="text-align:center">'.$row['address'].'</td>';
                echo '<td style="text-align:center;">'.number_format($row['tongtien']).'</td>';
            ?>
                    <th class="delete">
                        <a href="index.php?quanly=donhang&quanly=deletedh&madh=<?= $row['madh']?>">
                            <i class='bx bx-trash' ></i>
                        </a>
                    </th>
                    <th class="info">
                        <a href="index.php?quanly=donhang&quanly=chitietdh&madh=<?= $row['madh']?>">
                            <i class='bx bx-food-menu'></i>
                        </a>
                    </th>
            <?php echo "</tr>"; 
            } 
        ?>
    </table>
    <div class="chuyentrang" style="position: fixed; bottom:15px; margin-left:32%">
        <?php 
            if($page > 1){
                $prev_page = $page - 1; ?>
                <a class="page_item" href="index.php?quanly=donhang&per_page=<?=$item_per_page?>&page=<?=$prev_page?>" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold;  bottom:9px;">Prev</a>
            <?php } ?>
            <a class="page_item" href="index.php?quanly=donhang" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold">1</a>
            <?php for($num = 2 ; $num <=$totalPage; $num++) { ?>
                <a class="page_item" href="index.php?quanly=donhang&per_page=<?=$item_per_page?>&page=<?=$num?>" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold"><?=$num?></a>
            <?php } ?>
            <?php 
                if($page < $totalPage){
                    $next_page = $page + 1; ?>
                    <a class="page_item" href="index.php?quanly=donhang&per_page=<?=$item_per_page?>&page=<?=$next_page?>" style="font-size: 22px; margin-right: 5px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none;color: black; font-weight:bold;  bottom:9px;">Next</a>
            <?php } ?>
    </div>
</div>
