<?php 
    include './connect_db.php';
    if(isset($_POST['searchdh'])){
        $tukhoa = $_POST['tukhoadh'];
    }
    $sql_dh = "SELECT * FROM `donhang`,`user` WHERE `madh` LIKE '%$tukhoa%' AND `donhang`.`id_user` = `user`.`id_user`";
    $query = mysqli_query($con, $sql_dh);
    // $row = mysqli_fetch_array($con);
?>
<h2>TÌM KIẾM : <?php echo $_POST['tukhoadh'] ?></h2>
<table id="user-listing" style="width:98%;">
    <tr>
    <th style="width:7%">MADH</th>
            <!-- <th style="width:15%">Ngày lập đơn</th> -->
            <th style="width:6%">IDKH</th>
            <th style="width:20%">Tên khách hàng</th>
            <!-- <th>IDSP</th> -->
            <!-- <th style="width:6%">Hình ảnh </th> -->
            <!-- <th style="width:20%">Tên sản phẩm</th> -->
            <!-- <th style="width:8%">Số lượng</th> -->
            <th style="width:20%">Địa chỉ</th>
            <th style="width:10%">Tổng ĐH</th>
        <!-- <th class="edit">Sửa</th> -->
        <!-- <th class="delete">Xoá</th> -->
        <th style="width:10%">Chi tiết</th>
        <!-- <th style="width:30%">Mô tả</th> -->
    </tr>
    <?php 
        while($row = mysqli_fetch_array($query)){
                    // var_dump($row);  
                    echo '<tr>';
                    echo '<th>'.$row['madh'].'</th>';  
                    // echo '<td style="text-align:center;">'.$row['ngaydh'].'</td>';
                    // echo '<td><img src="'.$row['hinhanh'].'" style="width:100%; height:8%"></td>';  
                    echo '<td style="text-align:center;">'.$row['id_user'].'</td>'; 
                    echo '<td>'.$row['hoten'].'</td>'; 
                    // echo '<td style="text-align:center">'.$row['idsp'].'</td>'; 
                    // foreach($cart as $key => $value):
                    echo '<td style="text-align:center">'.$row['address'].'</td>';
                    echo '<td style="text-align:center;">'.number_format($row['tongtien']).'</td>';    
        ?>
        <th class="info">
                    <a href="index.php?quanly=donhang&quanly=chitietdh&madh=<?= $row['madh']?>">
                        <i class='bx bx-food-menu'></i>
                    </a>
                </th>
    <?php echo "</tr>"; } ?>
    <tr>
        <th colspan="8"  >
            <h4 style="margin:0;"><a href="index.php?quanly=donhang">Quay lại</a></h4>
        </th>
    </tr>
</table>
