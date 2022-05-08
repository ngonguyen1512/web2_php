<?php 
    session_start();
    include './connect_db.php';
    
    if(isset($_POST['dangnhapweb'])) {
        $taikhoan = $_POST['username'];
        $idkh = $_GET['id_user'];
        $matkhau = MD5($_POST['password']);
        $sql = "SELECT * FROM `user` WHERE `ten_user` = '".$taikhoan."'  AND `pass` = '".$matkhau."' ";
        $row = mysqli_query($con, $sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $_SESSION['dangnhapweb'] = $taikhoan;
            header("Location: ./index.php");
        }
        else{
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
        <title>Login Nike Sneaker</title>
        <style>
            .wapper_login {
                width: 25%;
                align-items: center;
                margin: 16% auto;
            }
            h3{
                /* margin: 5%; */
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
                
                /* border-radius: 5px; */
            }
        </style>
        <!-- <link href="" -->
    </head>
    <body>
        <div class="wapper_login">
            <form action="" method="POST" autocomplete="off">
                <table class="table-login">
                    <tr>
                        <td colspan="2" ><h1>Đăng nhập</h1>
                        <p>Nike Sneaker</p></td>
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
                        <td col="2" style="float:right; border: 0px;"><a  href="./logsign.php">Đăng ký</a></td>
                    </tr> -->
                    <tr>
                        <td style="border-bottom:0;" colspan="2"><input style="font-size: 20px;" type="submit" name="dangnhapweb" value="Đăng nhập"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>