<?php 
    include './connect_db.php';
    $result = mysqli_query ($con, "SELECT * FROM `nhanvienn`");
    mysqli_close($con);
?>
<div id="user_info">
    <h1>Danh sách tài khoản</h1>
    <a href="index.php?quanly=taikhoannv&quanly=logsignnvn" style=" font-size: 19px;">Tạo tài khoản mới</a>
    <!-- <a href="index.php?quanly=taikhoan&quanly=create_user">Tạo tài khoản mới</a> -->
    <form method="POST" action="index.php?quanly=taikhoannv&quanly=searchnvn" style="margin-left: 74%; margin-bottom: 1%;">
        <input type="text" placeholder="Search..." class="box" name="tukhoa" style="font-size: 17px;">
        <input type="submit" name="searchnvn" class="sub" value="search" style="font-size: 17px;">
    </form>
    <table id="user-listing" style="width:98%;">
        <tr>
            <th class="iduser">Id</th>
            <th class="iduser">Quyền</th>
            <th class="hoten" style="width:20%">Họ và tên</th>
            <th class="username" style="width: 10%;">Username</th>
            <th class="nam">Năm sinh</th>
            <th class="sdt">Sdt</th>
            <th class="mail">Mail</th>
            <th class="datedk">Trạng thái</th>
            <th class="edit">Sửa</a></th>
            <th class="delete">Xoá</a></th>
            <!-- // <th class="chitiet">Chi tiết</th> -->
        </tr>
        <?php 
            while($row = mysqli_fetch_array($result)){
            // var_dump($row);  
            echo '<tr>';
            echo '<th>'.$row['id_nv'].'</th>';  
            echo '<td style="text-align:center;">'.$row['id_quyen'].'</td>';
            echo '<td>'.$row['hoten'].'</td>';  
            echo '<td>'.$row['ten_nv'].'</td>'; 
            echo '<td style="text-align:center">'.$row['namsinh'].'</td>'; 
            echo '<td>'.$row['sđt'].'</td>';  
            echo '<td>'.$row['mail'].'</td>';  
            echo '<td style="text-align:center">'.$row['statuss'].'</td>';      
        ?>
        <!-- ?id_user=<= $row['id_user']?> -->
            <th class="edit">
                <a href="index.php?quanly=taikhoannv&quanly=editnv&id_nv=<?= $row['id_nv']?>">
                    <i class='bx bxs-edit' ></i>
                </a>
            </th>
            <th class="delete">
                <a href="index.php?quanly=taikhoannv&quanly=deletenv&id_nv=<?= $row['id_nv']?>">
                    <i class='bx bx-trash' ></i>
                </a>
            </th>
            <!-- <th class="info">
                <a href="index.php?quanly=taikhoannv&quanly=chitietnv&id_nv=<?= $row['id_nv']?>">
                    <i class='bx bx-food-menu'></i>Chi tiết
                </a>
            </th>    -->
        <?php echo "</tr>"; } ?>
    </table>
    
</div>