<?php 
    include './connect_db.php';
    $id_user=$_GET['id_user'];
    $hoten=$_POST['hoten'];
    $ten_user=$_POST['ten_user'];
    $namsinh=$_POST['namsinh'];
    $mail=$_POST['mail'];
    $sđt=$_POST['sđt'];
    $error=false;
    if (isset($_GET['action']) && $_GET['action'] == 'capnhat'){
        if(isset($_POST['id_user']) && !empty($_POST['id_user'])){
            $result = mysqli_query ($con, "UPDATE `user` SET  `hoten` = '$hoten',`ten_user` = '$ten_user',  `namsinh` = '$namsinh', `mail` = '$mail',`sđt` = '$sđt'  WHERE `user`.`id_user` = ".$_POST['id_user']."; ");
            if(!$result) {
                $error = "Không thể cập nhật tài khoản";
            }
            mysqli_close($con);
            if($error !== false) { ?>
                <div id="error-notify" class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                    <h1>Thông báo</h1>
                    <h4><?= $error ?></h4>
                    <a href="./index.php?quanly=taikhoanuser">Danh sách tài khoản.</a>
                </div>
            <?php } else { ?>
                <div id="edit-notify" class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                    <h1><?= ($error !== false) ? $error : "Sửa tài khoản thành công" ?></h1>    
                    <a href="./index.php?quanly=taikhoanuser">Danh sách tài khoản.</a>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div id="edit-notify"class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                <h1>Vui lòng nhập đủ thông tin để sửa tài khoản</h1>    
                <a href="./edit_user.php?id=<?=$_POST['id_user']?>">Quay lại sửa tài khoản.</a>
            </div>
        <?php }    
    } else{
        $result1 = mysqli_query ($con, "SELECT * FROM `user`");
        $result = mysqli_query ($con, "SELECT * FROM `user` where `id_user`=" .$_GET['id_user']);
        $user = $result->fetch_array();
        mysqli_close($con);
        if(!empty($user)) {  ?>
            <div id="edit_user" class="edit_user" style="border: 1px solid white; text-align:center; margin: 10%">
                <h1>SỬA TÀI KHOẢN "<?= $user['ten_user'] ?>"</h1>
                <form action="index.php?quanly=taikhoanuser&quanly=edit&action=capnhat" method="POST" autocomplete="off" >
                    <input type="hidden" name="id_user" value="<?= $user['id_user']?>">
                    <table style="margin: 0 40%;">
                        <tr>
                            <td>Họ và tên</td>
                            <td style="padding:5px"><input type="text" value="<?php echo $user['hoten']; ?>" name="hoten"></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" value="<?php echo $user['ten_user']; ?>" name="ten_user"></td>
                        </tr>
                        <tr>
                            <td>Năm sinh</td>
                            <td><input type="text" value="<?php echo $user['namsinh']; ?>" name="namsinh"></td>
                        </tr>
                        <tr>
                            <td>SĐT</td>
                            <td><input type="text" value="<?php echo $user['sđt']; ?>" name="sđt"></td>
                        </tr>
                        <tr>
                            <td>Mail</td>
                            <td><input type="text" value="<?php echo $user['mail']; ?>" name="mail"></td>
                        </tr>
                        <tr>
                            <th colspan="2"><input type="submit" value="Cập nhật" name="capnhat"></th>
                        </tr>
                    </table>
                </form>
            </div>
        <?php } 
    } 
?>