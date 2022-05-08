<?php 
    include './connect_db.php';
    $id_nv=$_GET['id_nv'];
    $hoten=$_POST['hoten'];
    $ten_nv=$_POST['ten_nv'];
    $namsinh=$_POST['namsinh'];
    $mail=$_POST['mail'];
    $sđt=$_POST['sđt'];
    $statuss=$_POST['statuss'];
    $id_quyen=$_POST['id_quyen'];
    $error=false;
    if (isset($_GET['action']) && $_GET['action'] == 'capnhat'){
        if(isset($_POST['id_nv']) && !empty($_POST['id_nv'])){
            $result = mysqli_query ($con, "UPDATE `nhanvienn` SET `id_quyen` = '$id_quyen', `hoten` = '$hoten',`ten_nv` = '$ten_nv',  `namsinh` = '$namsinh', `mail` = '$mail',`sđt` = '$sđt',`statuss` = '$statuss'  WHERE `nhanvienn`.`id_nv` = ".$_POST['id_nv']."; ");
            if(!$result) {
                $error = "Không thể cập nhật tài khoản";
            }
            mysqli_close($con);
            if($error !== false) { ?>
                <div id="error-notify" class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                    <h1>Thông báo</h1>
                    <h4><?= $error ?></h4>
                    <a href="./index.php?quanly=taikhoannv">Danh sách tài khoản.</a>
                </div>
            <?php } else { ?>
                <div id="edit-notify" class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                    <h1><?= ($error !== false) ? $error : "Sửa tài khoản thành công" ?></h1>    
                    <a href="./index.php?quanly=taikhoannv">Danh sách tài khoản.</a>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div id="edit-notify"class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                <h1>Vui lòng nhập đủ thông tin để sửa tài khoản</h1>    
                <a href="./edit_nv.php?id=<?=$_POST['id_nv']?>">Quay lại sửa tài khoản.</a>
            </div>
        <?php }       
    } else{
        $result1 = mysqli_query ($con, "SELECT * FROM `nhanvienn`");
        $result = mysqli_query ($con, "SELECT * FROM `nhanvienn` where `id_nv`=" .$_GET['id_nv']);
        $user = $result->fetch_array();
        mysqli_close($con);
        if(!empty($user)) {  ?>
            <div id="edit_user" class="edit_user" style="border: 1px solid white; text-align:center; margin: 10%">
                <h1>SỬA TÀI KHOẢN "<?= $user['ten_nv'] ?>"</h1>
                <form action="index.php?quanly=taikhoannv&quanly=editnv&action=capnhat" method="POST" autocomplete="off" >
                    <input type="hidden" name="id_nv" value="<?= $user['id_nv']?>">
                    <table style="margin: 0 35%;">
                        <tr>
                            <td style="width:40%">Họ và tên</td>
                            <td style="padding:5px"><input type="text" value="<?php echo $user['hoten']; ?>" name="hoten"></td>
                        </tr>
                        <tr>
                            <td style="width:40%">Username</td>
                            <td><input type="text" value="<?php echo $user['ten_nv']; ?>" name="ten_nv"></td>
                        </tr>
                        <tr>
                            <td style="width:40%">Năm sinh</td>
                            <td><input type="text" value="<?php echo $user['namsinh']; ?>" name="namsinh"></td>
                        </tr>
                        <tr>
                            <td style="width:40%">SĐT</td>
                            <td><input type="text" value="<?php echo $user['sđt']; ?>" name="sđt"></td>
                        </tr>
                        <tr>
                            <td style="width:40%">Mail</td>
                            <td><input type="text" value="<?php echo $user['mail']; ?>" name="mail"></td>
                        </tr>
                        <tr>
                            <td style="width:40%">Quyền</td>
                            <td><input type="text" value="<?php echo $user['id_quyen']; ?>" name="id_quyen"></td>
                        </tr>
                        <tr>
                            <td style="width:40%">Trạng thái</td>
                            <td><input type="text" value="<?php echo $user['statuss']; ?>" name="statuss"></td>
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