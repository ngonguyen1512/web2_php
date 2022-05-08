<?php 
    include './connect_db.php';
    if(isset($_POST['logsignnvn'])){
        $hoten = $_POST['hoten'];
        $ten_user = $_POST['ten_user'];
        $namsinh = $_POST['namsinh'];
        $sđt = $_POST['sđt'];
        $mail = $_POST['mail'];
        $date = date("Y-m-d");
        $matkhau = MD5($_POST['password']);
        $sql_dangky = mysqli_query($con, "INSERT INTO `user` (`id_user`, `hoten`, `ten_user`, `namsinh`, `sđt`, `mail`, `pass`, `ngaydangki`) VALUES (NULL,'$hoten','$ten_user','$namsinh','$sđt','$mail','$matkhau','$date')");
        if($sql_dangky) {
            $_SESSION['idkh'] = mysqli_insert_id($con);
            header("Location: login.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <title>Losign Nike Sneaker</title>
        <style>
            .wapper_login {
                width: 25%;
                align-items: center;
                margin: 16% auto;
            }
            h3{
                font-size: 24px;
            }
            table , th, td{
                border-collapse: collapse;
                border: 1px solid black;
                border-radius: 12px;
            }
            table.table-login{
                width:100%;
            }
            .table-login {
                text-align: center;
            }
            table.table-login tr td{
                padding: 5px;
            }
            .box_acc {
                position: fixed;
                border: 1px solid black;
                width: 8%;
                right: 8%;
                border-radius: 5px;
                text-align: center;
                display: none;
            }
            .wapper_losign {
                width: 50%;
                align-items: center;
            }
        </style>
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
                        <td><input type="text" name="ten_user"></td>
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
                        <td style="border-bottom:0;" colspan="2"><input type="submit" name="logsignnvn" value="Đăng kí"></td>
                    </tr>
                </table>
            </form>
        </div>
       
    </body>
</html>
