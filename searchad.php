<?php 
    include './connect_db.php';
    if(isset($_POST['searchad'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_admin = "SELECT * FROM `admin` WHERE `ten_admin` LIKE '%$tukhoa%' OR `id` LIKE '%$tukhoa%' OR `namsinh` LIKE '%$tukhoa%'" ;
    $query = mysqli_query($con, $sql_admin);
?>
<h2>TÌM KIẾM : <?php echo $_POST['tukhoa'] ?></h2>
<table id="user-listing" style="width:98%;">
    <tr>
        <th class="iduser">Id</th>
        <th class="hoten" style="width:25%">Họ và tên</th>
        <th class="username" style="width: 15%;">Username</th>
        <th class="namsinh">Năm sinh</th>
        <th class="sdt">Sdt</th>
        <th class="mail">Mail</th>
        <th class="datedk">Trạng thái</th>
    </tr>
    <?php 
        while($row = mysqli_fetch_array($query)){
        echo "<tr>";
        echo "<th>".$row['id']."</th>";  
        echo "<td>".$row['hoten'].'</td>';  
        echo "<td>".$row['ten_admin'].'</td>'; 
        echo '<td style="text-align:center;">'.$row['namsinh'].'</td>'; 
        echo "<td>".$row['sđt'].'</td>';  
        echo "<td>".$row['mail'].'</td>';  
        echo '<td style="text-align:center;">'.$row['status'].'</td>';          
    ?>
    <?php echo "</tr>"; } ?>
    <tr>
        <th colspan="7"  >
            <h4 style="margin:0;"><a href="index.php?quanly=taikhoanadmin">Quay lại</a></h4>
        </th>
    </tr>
</table>