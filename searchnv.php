<?php 
    include './connect_db.php';
    if(isset($_POST['searchnvn'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_nv = "SELECT * FROM `nhanvienn` WHERE `id_quyen` LIKE '%$tukhoa%' OR `ten_nv` LIKE '%$tukhoa%' OR `id_nv` LIKE '%$tukhoa%'  OR `namsinh` LIKE '%$tukhoa%'";
    $query = mysqli_query($con, $sql_nv);
    // $row = mysqli_fetch_array($con);
?>
<h2>TÌM KIẾM : <?php echo $_POST['tukhoa'] ?></h2>
<table id="user-listing" style="width:98%;">
    <tr>
        <th class="iduser">Id</th>
        <th class="iduser">Quyền</th>
        <th class="hoten" style="width:25%">Họ và tên</th>
        <th class="username" style="width: 15%;">Username</th>
        <th class="namsinh">Năm sinh</th>
        <th class="sdt">Sdt</th>
        <th class="mail">Mail</th>
    </tr>
    <?php 
        while($row = mysqli_fetch_array($query)){
            // var_dump($row);  
        echo "<tr>";
        echo "<th>".$row['id_nv']."</th>";  
        echo "<td>".$row['id_quyen']."</td>";
        echo "<td>".$row['hoten']."</td>";  
        echo "<td>".$row['ten_nv']."</td>";  
        echo "<td>".$row['namsinh']."</td>";
        echo "<td>".$row['sđt']."</td>";  
        echo "<td>".$row['mail']."</td>";  
        // echo "<td>".$row['ngaydangki']."</td>";          
    ?>
    <?php echo "</tr>"; } ?>
    <tr>
        <th colspan="8"  >
            <h4 style="margin:0;"><a href="index.php?quanly=taikhoannv">Quay lại</a></h4>
        </th>
    </tr>
</table>
