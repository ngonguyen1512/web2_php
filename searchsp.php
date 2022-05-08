<?php 
    include './connect_db.php';
    if(isset($_POST['searchsp'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_sp = "SELECT * FROM `product` WHERE `idsp` LIKE '%$tukhoa%' OR `tensp` LIKE '%$tukhoa%' OR `mabrand` LIKE '%$tukhoa%'";
    $query = mysqli_query($con, $sql_sp);
    mysqli_close($con);
?>
<h2>TÌM KIẾM : <?php echo $_POST['tukhoa'] ?></h2>
<table id="user-listing" style="width:98%;">
    <tr>
        <th class="id">Id</th>
        <th style="width:2%">Brand</th>
        <th style="width:6%">Hình ảnh </th>
        <th class="name">Tên sản phẩm</th>
        <th class="brand">Số lượng</th>
        <th class="gia">Giá</th>
        <th style="width:5%">Chi tiết</th>
    </tr>
    <?php 
        while($row = mysqli_fetch_array($query)){
            echo '<tr>';
            echo '<th>'.$row['idsp'].'</th>';  
            echo '<td style="text-align:center;">'.$row['mabrand'].'</td>';
            echo '<td><img src="'.$row['hinhanh'].'" style="width:90%; height:6%"></td>';   
            echo '<td>'.$row['tensp'].'</td>'; 
            echo '<td style="text-align:center">'.$row['soluong'].'</td>'; 
            echo '<td style="text-align:center">'.$row['dongia'].'</td>';  
            // echo '<td >'.$row['mota'].'</td>'; 
        ?>
        <th class="info">
            <a href="index.php?quanly=sanpham&quanly=chitietsp&idsp=<?= $row['idsp']?>">
                <i class='bx bx-food-menu'></i>
            </a>
        </th>
    <?php echo "</tr>"; } ?>
    <tr>
        <th colspan="8"  >
            <h4 style="margin:0;"><a href="index.php?quanly=sanpham">Quay lại</a></h4>
        </th>
    </tr>
</table>