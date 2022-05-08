<?php 
    include './connect_db.php';
    $id_user = $_GET['id_user'];
    $result = mysqli_query($con, "SELECT * FROM `donhang`,`user`,`chitietdh` WHERE `donhang`.`id_user` = `user`.`id_user` AND `donhang`.`madh` = `chitietdh`.`madh` AND `user`.`id_user`= $id_user");
    mysqli_close($con);
?>
<div id="user_info">
    <h1>Chi tiết đơn hàng của khách hàng</h1>
    <table class="lichsutable" style="width:98%;">
        <tr>
            <th style="width:8%">MADH</th>
            <th>Ngày đặt</th>
            <th style="width:9%">Hình ảnh </th>
            <th style="width:20%">Tên sản phẩm</th>
            <th style="width:8%">Số lượng</th>
            <th class="gia">Đơn giá</th>
            <th>Thành tiền</th>
            
        </tr>   
    <?php 
        while($row = mysqli_fetch_array($result)){
            
            echo '<tr>';
            echo '<th>'.$row['madh'].'</th>';  
            echo '<td style="text-align:center;">'.$row['ngaydat'].'</td>';  
            // echo '<td style="text-align:center;">'.$row['id_user'].'</td>'; 
            // echo '<td >'.$row['hoten'].'</td>'; 
            echo '<td style="text-align:center"><img style="width:100%; hegiht: 20%;text-align:center" src="'.$row['hinhanh'].'"></td>';
            echo '<td>'.$row['tensp'].'</td>'; 
            echo '<td style="text-align:center;" >'.$row['soluong'].'</td>'; 
            echo '<td style="text-align:center;">'.$row['dongia'].'</td>';
            echo '<td style="text-align:center;">'.($row['soluong']*$row['dongia']).'</td>';  
            // echo '<td style="text-align:center;">'.$row['tongtien'].'</td>';   
    ?>
             <?php echo "</tr>"; } ?>
             <tr>
            <th colspan="9"  >
                <h4 style="margin:0;"><a href="index.php?quanly=taikhoanuser">Quay lại</a></h4>
            </th>
        </tr>
            </table>
            
</div>
