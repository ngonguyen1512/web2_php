<?php 
    session_start();
    include './connect_db.php';
    
    if(isset($_POST['dangnhap'])) {
        $status = $_GET['status'];
        $taikhoan = $_POST['username'];
        $matkhau = MD5($_POST['password']);
        $id_quyen = $_GET['id_quyen'];
        $statuss = $_GET['statuss'];
        $sql1 = "SELECT * FROM `admin`,`nhanvienn` WHERE `ten_admin` = '$taikhoan' AND  `status` = '1' AND `password` = '$matkhau' OR `ten_nv` = '$taikhoan' AND  `status` = '1' AND `pass` = '$matkhau'";
        $row1 = mysqli_query($con, $sql1);
        $count1 = mysqli_num_rows($row1);
        if($count1>0){
            $_SESSION['dangnhap'] = $taikhoan;
            header("Location: index.php");
        }
        else if($statuss == '0' || $status =='0'){
            echo '<p style="text-align:center"> Tài khoản của bạn chưa được kích hoạt</p>';
        }else{
            echo '<p style="text-align:center">Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại</p>';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="./css/styleadmin.css" rel="stylesheet"> -->
        <link href="./css/stylead2.css" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <title>Login WebAdmin</title>
        <!-- <link href="" -->
    </head>
    <body>
        <div class="wapper_login">
            <form action="" method="POST" autocomplete="off">
                <table class="table-login">
                    <tr>
                        <td colspan="2" ><h1>Đăng nhập</h1></td>
                    </tr>
                    <tr>
                        <th style="font-size: 22px;">Tài khoản</th> 
                        <td><input  style="font-size: 20px;" type="text" name="username" required></td>
                    </tr>
                    <tr>
                        <th style="font-size: 22px;">Mật khẩu</th>
                        <td><input style="font-size: 20px;" type="password" name="password" required></td>
                    </tr>
                    <!-- <tr style ="float:right;">
                        <td col="2" style="float:right; border: 0px;"><a  href="../webshop/logsign.php">Đăng ký</a></td>
                    </tr> -->
                    <tr>
                        <td style="border-bottom:0;" colspan="2"><input style="font-size: 20px;" type="submit" name="dangnhap" value="Đăng nhập"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>