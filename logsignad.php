<?php 
    include './connect_db.php';
    if(isset($_POST['dangki'])){
        $hoten = $_POST['hoten'];
        $ten_admin = $_POST['ten_admin'];
        $namsinh = $_POST['namsinh'];
        $sđt = $_POST['sđt'];
        $mail = $_POST['mail'];
        $quyen = $_POST['id_quyen'];
        $matkhau = MD5($_POST['password']);
        // $ngaydangki = $_POST['ngaydangki'];
        $status = $_POST['status'];
        $sql_dangky = mysqli_query($con, "INSERT INTO `admin` (`id`,`id_quyen`, `hoten`, `ten_admin`, `namsinh`, `sđt`, `mail`, `password`, `status`) VALUES (NULL,'$quyen','$hoten','$ten_admin','$namsinh','$sđt','$mail','$matkhau','$status')");
        if($sql_dangky) {
            header("Location: index.php?quanly=taikhoanadmin");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./css/stylead2.css" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <title>Losign WebAdmin</title>
    </head>
    <body>
        <div class="wapper_losin" style="width: 30%; margin: 14% 0 0 35%">
            <form action="" method="POST" autocomplete="off">
                <table class="table-login">
                    <tr>
                        <td colspan="2" ><h3>Đăng kí</h3></td>
                    </tr>
                    <tr>
                        <th>Họ tên</th> 
                        <td><input type="text" name="hoten"></td>
                    </tr>
                    <tr>
                        <th>Tài khoản</th> 
                        <td><input type="text" name="ten_admin"></td>
                    </tr>
                    <tr>
                        <th>Năm sinh</th> 
                        <td><input type="text" name="namsinh"></td>
                    </tr>
                    <tr>
                        <th>SĐT</th> 
                        <td><input type="text" name="sđt"></td>
                    </tr>
                    <tr>
                        <th>Mail</th> 
                        <td><input type="email" name="mail"></td>
                    </tr>
                    <tr>
                        <th>Mật khẩu</th>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <th>Quyền</th> 
                        <td><input type="text" name="id_quyen" required></td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th> 
                        <td><input type="text" name="status"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom:0;" colspan="2"><input type="submit" name="dangki" value="Đăng kí"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
