<?php 
    $ten_user = $_SESSION['dangnhapweb'];
    // var_dump($query);
    $result = mysqli_query($con, "SELECT * FROM `donhang`,`user`,`chitietdh` WHERE `donhang`.`id_user` = `user`.`id_user` AND `donhang`.`madh` = `chitietdh`.`madh` AND `donhang`.`id_user`= (SELECT id_user FROM user WHERE ten_user = '$ten_user')");
    // $row1 = mysqli_fetch_array($result);
    // var_dump($row1);
    mysqli_close($con);
?>
<div class="lichsu">
    <h1>Lịch sử đơn hàng</h1>
    <table class="lichsutable" style="width:98%;">
        <tr>
            <th style="width:8%">MADH</th>
            <!-- <th style="width:15%">Ngày lập đơn</th> -->
            <th style="width:8%">IDKH</th>
            <th style="width:15%">Tên khách hàng</th>
            <!-- <th>Idsp</th> -->
            <th style="width:6%">Hình ảnh </th>
            <th style="width:20%">Tên sản phẩm</th>
            <th style="width:8%">Số lượng</th>
            <th class="gia">Đơn giá</th>
            <th>Thành tiền</th>
            
        </tr>   
    <?php 
        while($row = mysqli_fetch_array($result)){
            
            echo '<tr>';
            echo '<th>'.$row['madh'].'</th>';  
            echo '<td style="text-align:center;">'.$row['id_user'].'</td>'; 
            echo '<td >'.$row['hoten'].'</td>'; 
            // echo '<td style="text-align:center;">'.$row['idsp'].'</td>'; 
            echo '<td style="text-align:center"><img style="width:60%; hegiht: 20%;text-align:center" src="'.$row['hinhanh'].'"></td>';
            echo '<td>'.$row['tensp'].'</td>'; 
            echo '<td style="text-align:center;" >'.$row['soluong'].'</td>'; 
            echo '<td style="text-align:center;">'.$row['dongia'].'</td>';
            echo '<td style="text-align:center;">'.($row['soluong']*$row['dongia']).'</td>';  
            // echo '<td style="text-align:center;">'.$row['tongtien'].'</td>'; 
            
                
    ?>
    <?php echo "</tr>"; } ?>
        <tr>
            <th colspan="9"  >
                <h4 style="margin:0;"><a href="index.php?quanly=giohang">Quay lại</a></h4>
            </th>
        </tr>
    </table>          
</div>
    

    <style>
        h1{
            margin:3%;
        }
        .lichsu{
            border: 1px solid black;
            margin:4%;
            font-size: 17px;
        }
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
            margin:1% 1% 3% 1%;
        }
    </style>