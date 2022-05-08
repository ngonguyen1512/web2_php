<?php 
    include './connect_db.php';
    $error=false;
    if (isset($_GET['id']) && !empty($_GET['id'])){           
        $result = mysqli_query ($con, "DELETE FROM `taikhoan` WHERE `id`= ".$_GET['id']);
        if(!$result) {
            $error = "Không thể xoá tài khoản";                
        }
        mysqli_close($con);
        if($error !== false) { ?>
            <div id="error-notify" class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                <h1>Thông báo</h1>
                <h4><?= $error ?></h4>
                <a href="index.php?quanly=taikhoan">Danh sách tài khoản.</a>
            </div>
        <?php } else { ?>
            <div id="success-notify" class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                <h1>Xoá tài khoản thành công <h1>    
                <a href="index.php?quanly=taikhoan" style="font-size: 18px;">Danh sách tài khoản.</a>
            </div>
    <?php } ?>
<?php } ?>