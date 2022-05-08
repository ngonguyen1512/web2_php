<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./css/styleadmin.css" rel="stylesheet">
        <link href="./css/stylead2.css" rel="stylesheet2">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <title>AdminShop</title>
    </head>
    <?php
        include './connect_db.php';
        session_start();
        if(!isset($_SESSION['dangnhap'])){
            header('Location:login.php');
        }
    ?>
    <body>
        <div class="wrapper">
            <?php include './pages/header.php'; ?>
        </div>
        <div class="sidebar-main">
            <div class="sidebar">
            <?php
                if(isset($_SESSION['dangnhap'])){ 
                    $taikhoan = $_SESSION['dangnhap'];
                    $sql1 = "SELECT * FROM `nhanvienn` WHERE `ten_nv` = '$taikhoan' AND `id_quyen` = 'ql'";
                    $row1 = mysqli_query($con, $sql1);
                    $sql2 = "SELECT * FROM `nhanvienn` WHERE `ten_nv` = '$taikhoan' AND `id_quyen` = 'nv'";
                    $row2 = mysqli_query($con, $sql2);
                    if($count1 = mysqli_fetch_array($row1)){
                        include './pages/sidemenuql.php';
                    } else if($count2 = mysqli_fetch_array($row2)) {
                        include './pages/sidemenunv.php';
                    }else {
                        include './pages/sidemenu.php';
                    }
                }
            ?>
            </div>
            <div class="main">
                <?php include './pages/main.php'; ?>
                
            </div>
            <!-- <h1 class="title_admin">Chào mừng bạn đến với WebAdmin</h1> -->
        </div>
        <!-- <style>
            h1{
                text-align: center;
            }
        </style> -->
        
    </body>
</html>