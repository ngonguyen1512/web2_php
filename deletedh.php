<?php 
    include './connect_db.php';
    $error=false;
    if (isset($_GET['madh']) && !empty($_GET['madh'])){           
        $result = mysqli_query ($con, "DELETE FROM `donhang` WHERE `madh`= ".$_GET['madh']);
        if(!$result) {
            $error = "Không thể xoá tài khoản";                
        }
        mysqli_close($con);
        if($error !== false) { ?>
            <div id="error-notify" class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                <h1>Thông báo</h1>
                <h4><?= $error ?></h4>
                <a href="index.php?quanly=donhang">Danh sách tài khoản.</a>
            </div>
        <?php } else { ?>
            <div id="success-notify" class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                <h1>Xoá tài khoản thành công <h1>    
                <a href="index.php?quanly=donhang" style="font-size: 18px;">Danh sách tài khoản.</a>
            </div>
        <?php } ?>
    <?php } 
?>