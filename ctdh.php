<?php 
    include './connect_db.php';
    $madh=$_GET['madh'];
    $result1 = mysqli_query ($con, "SELECT * FROM `chitietdh` WHERE `madh` = '$madh'");
    $row1 = mysqli_fetch_array($result1);
    $result = mysqli_query ($con, "SELECT * FROM `donhang`,`chitietdh`,`product` where `donhang`.`madh` = `chitietdh`.`madh` AND `chitietdh`.`idsp` = `product`.`idsp` AND `donhang`.`madh` = '$madh' ");
    mysqli_close($con);
?>
<div id="user_info">
    <h1>Danh sách đơn hàng</h1>
    <table id="user-listing" style="width:98%;">
        <tr>
            <th style="width:7%">MACTDH</th>
            <th style="width:6%">MADH</th>
            <th style="width:6%">IDSP</th>
            <th style="width:10%">Hình ảnh </th>
            <th style="width:25%">Tên sản phẩm</th>
            <th style="width:8%">Số lượng</th>
            <th class="gia">Đơn giá</th>
            <th class="gia">Thành tiền</th>
        </tr>   
        <?php 
            while($row = mysqli_fetch_array($result)){
                echo '<tr>';
                echo '<th>'.$row['mactdh'].'</th>';
                echo '<td style="text-align:center;">'.$row['madh'].'</td>'; 
                echo '<td style="text-align:center">'.$row['idsp'].'</td>'; 
                echo '<td><img src="'.$row['hinhanh'].'" style="width:100%; height:8%"></td>';  
                echo '<td>'.$row['tensp'].'</td>'; 
                echo '<td style="text-align:center;">'.$row1['soluong'].'</td>';  
                echo '<td style="text-align:center;">'.number_format($row['dongia']).'</td>';  
                echo '<td style="text-align:center;">'.number_format($row1['soluong']*$row['dongia']).'</td>';
                echo '</tr>'; 
            }
        ?>
        <tr>
            <th colspan="8"  >
                <h4 style="margin:0;"><a href="index.php?quanly=donhang">Quay lại</a></h4>
            </th>
        </tr>
    </table>
</div>
