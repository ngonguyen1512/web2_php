<?php 
    include './connect_db.php';
    $error=false;
    if (isset($_GET['id_user']) && !empty($_GET['id_user'])){           
        $result = mysqli_query ($con, "DELETE FROM `user` WHERE `id_user`= ".$_GET['id_user']);
        if(!$result) {
            $error = "Không thể xoá tài khoản";                
        }
        mysqli_close($con);
        if($error !== false) { ?>
            <div id="error-notify" class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                <h1>Thông báo</h1>
                <h4><?= $error ?></h4>
                <a href="index.php?quanly=taikhoanuser">Danh sách tài khoản.</a>
            </div>
        <?php } else { ?>
            <div id="success-notify" class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                <h1>Xoá tài khoản thành công <h1>    
                <a href="index.php?quanly=taikhoanuser" style="font-size: 18px;">Danh sách tài khoản.</a>
            </div>
        <?php } ?>
    <?php } 
?>