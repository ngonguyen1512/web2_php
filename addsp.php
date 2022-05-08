<?php 
    include './connect_db.php';
    if(isset($_POST['themsp'])){
        $brand = $_POST['brand'];
        $tensp = $_POST['tensp'];
        $hinhanh = $_POST['hinhanh'];
        $soluong = $_POST['soluong'];
        $dongia = $_POST['dongia'];
        // $status = $_POST['status'];
        $mota = $_POST['mota'];
        $sql_themsp = mysqli_query($con, "INSERT INTO `product` (`idsp`, `mabrand`, `hinhanh`, `tensp`, `soluong`, `dongia`, `mota`) VALUES (NULL,'$brand','$hinhanh','$tensp','$soluong','$dongia','$mota')");
        if($sql_themsp) {
            header("Location: index.php?quanly=sanpham");
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
            <form action="" method="POST" autocomplete="off" role ="form" enctype="multipart/form-data">
                <table class="table-login">
                    <tr>
                        <td colspan="2" ><h3>Thêm sản phẩm</h3></td>
                    </tr>
                    <tr>
                        <th>Brand</th> 
                        <td><input type="text" name="brand">
                    
                        </td>
                    </tr>
                    <tr>
                        <th>Hình ảnh</th> 
                        <td><input type="text" name="hinhanh"></td>
                    </tr>
                    <tr>
                        <th>Tên sản phẩm</th> 
                        <td><input type="text" name="tensp"></td>
                    </tr>
                    <tr>
                        <th>Số lượng</th> 
                        <td><input type="number" name="soluong"></td>
                    </tr>
                    <tr>
                        <th>Đơn giá</th> 
                        <td><input type="text" name="dongia"></td>
                    </tr>
                    <tr>
                        <th>Mô tả</th> 
                        <td><input type="text" name="mota"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom:0;" colspan="2"><input type="submit" name="themsp" value="Thêm sản phẩm"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
