<?php 
    include './connect_db.php';
    $idsp=$_GET['idsp'];
    $mota = $_GET['mota'];
    $result = mysqli_query ($con, "SELECT * FROM `product` where `idsp`=" .$_GET['idsp']);
    mysqli_close($con);
?>
<div id="user_info">
    <h1>Danh sách sản phẩm</h1>
    <table id="user-listing" style="width:98%;">
        <tr>
            <th style="width:4%">Id</th>
            <th>Mô tả sản phẩm</th>
        </tr>   
    <?php 
        while($row = mysqli_fetch_array($result)){
            echo '<tr>';
            echo '<th>'.$row['idsp'].'</th>';  
            echo '<td>'.$row['mota'].'</td>';  
            echo "</tr>"; 
        } 
    ?>
        <tr>
            <th colspan="2"  >
                <h4 style="margin:0;"><a href="index.php?quanly=sanpham">Quay lại</a></h4>
            </th>
        </tr>
    </table>
</div>