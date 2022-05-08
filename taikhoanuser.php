<?php 
    include './connect_db.php';
    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:15;
    $page = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($page - 1) * $item_per_page;
    $totalReconds = mysqli_query($con, "SELECT * FROM `user`");
    $totalReconds = $totalReconds->num_rows;
    $totalPage = ceil($totalReconds/$item_per_page);
    $result = mysqli_query ($con, "SELECT * FROM `user` ORDER BY 'id_user' ASC LIMIT ".$item_per_page." OFFSET ".$offset."");
    mysqli_close($con); 
?>
<div id="user_info">
    <h1>Danh sách tài khoản</h1>
    <!-- <a href="index.php?quanly=taikhoan&quanly=create_user">Tạo tài khoản mới</a> -->
    <form method="POST" action="index.php?quanly=taikhoanuser&quanly=search" style="margin-left: 74%; margin-bottom: 1%;">
        <input type="text" placeholder="Search..." class="box" name="tukhoa" style="font-size: 17px;">
        <input type="submit" name="search" class="sub" value="search" style="font-size: 17px;">
    </form>
    <table id="user-listing" style="width:98%;">
        <tr>
            <th class="iduser">Id</th>
            <th class="hoten" style="width:20%">Họ và tên</th>
            <th class="username" style="width: 10%;">Username</th>
            <th class="nam">Năm sinh</th>
            <th class="sdt">Sdt</th>
            <th class="mail">Mail</th>
            <th class="datedk">Ngày đăng kí</th>
            <th class="edit">Sửa</a></th>
            <th class="delete">Xoá</a></th>
            <th class="chitiet">Chi tiết</th>
        </tr>
        <?php 
            while($row = mysqli_fetch_array($result)){
            // var_dump($row);  
            echo "<tr>";
            echo "<th>".$row['id_user']."</th>";  
            echo "<td>".$row['hoten']."</td>";  
            echo "<td>".$row['ten_user']."</td>"; 
            echo "<td>".$row['namsinh']."</td>"; 
            echo "<td>".$row['sđt']."</td>";  
            echo "<td>".$row['mail']."</td>";  
            echo "<td>".$row['ngaydangki']."</td>";      
        ?>
        <!-- ?id_user=<= $row['id_user']?> -->
            <th class="edit">
                <a href="index.php?quanly=taikhoanuser&quanly=edit&id_user=<?= $row['id_user']?>">
                    <i class='bx bxs-edit' ></i>
                </a>
            </th>
            <th class="delete">
                <a href="index.php?quanly=taikhoanuser&quanly=delete&id_user=<?= $row['id_user']?>" >
                    <i class='bx bx-trash' ></i>
                </a>
            </th>
            <th class="info">
                <a href="index.php?quanly=taikhoanuser&quanly=chitiet&quanly=ctdhkh&id_user=<?= $row['id_user']?>">
                    <i class='bx bx-food-menu'></i>Chi tiết
                </a>
            </th>
        <?php echo "</tr>"; } ?>
    </table>
    <div class="chuyentrang" style="position: fixed; bottom:15px; margin-left:28%">
    <?php 
        if($page > 1){
            $prev_page = $page - 1; ?>
            <a class="page_item" href="index.php?quanly=taikhoanuser&per_page=<?=$item_per_page?>&page=<?=$prev_page?>" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold; bottom:9px; ">Prev</a>
        <?php }?>
    
        <a class="page_item" href="index.php?quanly=taikhoanuser" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold">1</a>
        <?php for($num = 2 ; $num <=$totalPage; $num++) { ?>
            <a class="page_item" href="index.php?quanly=taikhoanuser&per_page=<?=$item_per_page?>&page=<?=$num?>" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold"><?=$num?></a>
        <?php }?>
    
    <?php 
        if($page < $totalPage){
            $next_page = $page + 1; ?>
            <a class="page_item" href="index.php?quanly=taikhoanuser&per_page=<?=$item_per_page?>&page=<?=$next_page?>" style="font-size: 22px; margin-right: 5px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none;color: black; font-weight:bold;  bottom:9px; ">Next</a>
        <?php }
    ?>
    </div>
</div>