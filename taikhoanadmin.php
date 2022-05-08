<?php 
    include './connect_db.php';
    $result = mysqli_query ($con, "SELECT * FROM `admin`");
    mysqli_close($con);
?>
<h1>Danh sách tài khoản</h1>
<a href="index.php?quanly=taikhoanadmin&quanly=logsignad" style=" font-size: 19px;">Tạo tài khoản mới</a>
    <!-- <a href="index.php?quanly=taikhoan&quanly=create_user">Tạo tài khoản mới</a> -->
<form method="POST" action="index.php?quanly=taikhoanadmin&quanly=searchad" style="margin-left: 74%;  margin-bottom: 1%;">
    <input type="text" placeholder="Search..." class="box" name="tukhoa" style="font-size: 17px;">
    <input type="submit" name="searchad" class="sub" value="search" style="font-size: 17px;">
</form>
<table id="user-listing" style="width:98%;">
    <tr>
        <th class="idadmin">Id</th>
        
        <th class="hoten" style="width:20%">Họ và tên</th>
        <th class="username" style="width: 13%;">Username</th>
        <th class="nam">Năm sinh</th>
        <th class="sdt">Sdt</th>
        <th class="mail">Mail</th>
        <th class="status">Trạng thái</th>
        <th class="edit">Sửa</a></th>
        <th class="delete">Xoá</a></th>
    </tr>
    <?php 
        while($row = mysqli_fetch_array($result)){
            // var_dump($row);  
            echo "<tr>";
            echo "<th>".$row['id'].'</th>';  
            
            echo "<td>".$row['hoten'].'</td>';  
            echo "<td>".$row['ten_admin'].'</td>'; 
            echo '<td style="text-align:center;">'.$row['namsinh'].'</td>'; 
            echo "<td>".$row['sđt'].'</td>';  
            echo "<td>".$row['mail'].'</td>';  
            echo '<td style="text-align:center;">'.$row['status'].'</td>';  
    ?>
        <!-- ?id_user=<= $row['id_user']?> -->
        <th class="edit">
            <a href="index.php?quanly=taikhoan&quanly=editad&id=<?= $row['id']?>">
                <i class='bx bxs-edit' ></i>
            </a>
        </th>
        <th class="delete">
            <a href="index.php?quanly=taikhoan&quanly=deletead&id=<?= $row['id']?>" >
                <i class='bx bx-trash' ></i>
            </a>
        </th>
    <?php echo "</tr>"; } ?>
</table>