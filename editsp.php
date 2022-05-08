
 <?php 
    include './connect_db.php';
    $idsp=$_GET['idsp'];
    $mabrand = $_POST['brand'];
    $tensp = $_POST['tensp'];
    $hinhanh = $_POST['hinhanh'];
    $soluong = $_POST['soluong'];
    $dongia = $_POST['dongia'];
    $mota = $_POST['mota'];
    $error=false;
    if (isset($_GET['action']) && $_GET['action'] == 'capnhat'){
        if(isset($_POST['idsp']) && !empty($_POST['idsp'])){
            $result = mysqli_query ($con, "UPDATE `product` SET  `mabrand` = '$mabrand',`tensp` = '$tensp',  `hinhanh` = '$hinhanh', `soluong` = '$soluong',`dongia` = '$dongia', `mota` = '$mota'  WHERE `product`.`idsp` = ".$_POST['idsp']."; ");
            if(!$result) {
                $error = "Không thể cập nhật sản phẩm";
            }
            mysqli_close($con);
            if($error !== false) { ?>
                <div id="error-notify" class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                    <h1>Thông báo</h1>
                    <h4><?= $error ?></h4>
                    <a href="./index.php?quanly=sanpham">Danh sách sản phẩm.</a>
                </div>
            <?php } else { ?>
                <div id="edit-notify" class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                    <h1><?= ($error !== false) ? $error : "Sửa sản phẩm thành công" ?></h1>    
                    <a href="./index.php?quanly=sanpham">Danh sách sản phẩm.</a>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div id="edit-notify"class="box-content" style="border: 1px solid white; text-align:center; margin: 10%">
                <h1>Vui lòng nhập đủ thông tin để sửa sản phẩm</h1>    
                <a href="./editsp.php?idsp=<?=$_POST['idsp']?>">Quay lại sửa sản phẩm.</a>
            </div>
        <?php }       
    } else{
        $result1 = mysqli_query ($con, "SELECT * FROM `product`");
        $result = mysqli_query ($con, "SELECT * FROM `product` where `idsp`=" .$_GET['idsp']);
        $user = $result->fetch_array();
        mysqli_close($con);
        if(!empty($user)) {  ?>
            <div id="edit_user" class="edit_user" style="border: 1px solid white; text-align:center; margin: 10%">
                <h1>SỬA SẢN PHẨM "<?= $user['tensp'] ?>"</h1>
                <form action="index.php?quanly=sanpham&quanly=editsp&action=capnhat" method="POST" autocomplete="off" >
                    <input type="hidden" name="idsp" value="<?= $user['idsp']?>">
                    <table style="margin: 0 35%;">
                        <tr>
                            <td>Brand</td>
                            <td style="padding:5px"><input type="text" value="<?php echo $user['mabrand']; ?>" name="brand"></td>
                        </tr>
                        <tr>
                            <td>Hình ảnh</td>
                            <td><input type="text" value="<?php echo $user['hinhanh']; ?>" name="hinhanh"></td>
                        </tr>
                        <tr>
                            <td>Tên sản phẩm</td>
                            <td><input type="text" value="<?php echo $user['tensp']; ?>" name="tensp"></td>
                        </tr>
                        <tr>
                            <td>Số lượng</td>
                            <td><input type="number" value="<?php echo $user['soluong']; ?>" name="soluong"></td>
                        </tr>
                        <tr>
                            <td>Đơn giá</td>
                            <td><input type="text" value="<?php echo $user['dongia']; ?>" name="dongia"></td>
                        </tr>
                        <tr>
                            <td>Mô tả</td>
                            <td><input type="text" value="<?php echo $user['mota']; ?>" name="mota"></td>
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