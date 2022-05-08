<?php
    session_start();
    include './connect_db.php';
    $ten_user = $_SESSION['dangnhapweb'];
    $result = mysqli_query($con, "SELECT * FROM user WHERE ten_user = '$ten_user'");
    $row = mysqli_fetch_array($result);
    $idkh = $row;
    $date = date("Y-m-d");
    $total_price = 0;
    foreach ($cart as $key => $value) {
        $total_price += ($value['dongia']*$value['quantity']);  
    }
    if(isset($_POST['hoten'])){
        // var_dump($_POST);exit;
        $id_user = $row['id_user'];
        $phone = $_POST['sđt'];
        $add = $_POST['address'];
        $query = mysqli_query($con, "INSERT INTO `donhang`(`madh`, `ngaydat`, `id_user`, `sđt`, `address`, `tongtien`) VALUES (NULL,'$date','$id_user','$phone','$add','$total_price')");
        if($query){
            $madh = mysqli_insert_id($con);
            foreach ($cart as $value){
                mysqli_query($con, "INSERT INTO `chitietdh`(`mactdh`, `madh`, `idsp`, `hinhanh`, `tensp`, `soluong`, `dongia`) VALUES (NULL,'$madh','$value[idsp]','$value[hinhanh]','$value[tensp]','$value[quantity]','$value[dongia]')");
            }
            unset($_SESSION['cart']);
            header("Location: index.php");
        }
    }
?>
<form method="POST">
    <div>
        <div class="formnhap">
            <h1>Nhập thông tin</h1>
            <table>
                <tr>
                    <th>Họ tên</th>
                    <td><input type="text"  name="hoten" value="<?php echo $row['hoten']?>"></td>
                </tr>
                <tr>
                    <th>Mail</th>
                    <td><input type="text"  name="mail" value="<?php echo $row['mail']?>"></td>
                </tr>
                <tr>
                    <th>SĐT</th>
                    <td><input type="text"  name="sđt" value="<?php echo $row['sđt']?>"></td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td><input type="text" name="address" class="address"></td>
                </tr>
            </table>
        </div>
        <div class="giohang">
            <h1>Thông tin đơn hàng</h1>
            <table class="table_giohang" style="width:98%;">
                <tr> 
                    <th style="width:5%">Idsp</th>
                    <th style="width:8%">Hình ảnh</th>
                    <th style="width:20%">Tên sản phẩm</th>
                    <th style="width:5%">Số lượng</th>
                    <th style="width:8%;">Đơn giá</th>
                    <th style="width:8%;">Thành tiền</th>
                </tr>   
            <?php 
                $total_price = 0;
                foreach ($cart as $key => $value): 
                    $total_price += ($value['dongia']*$value['quantity']);
            ?>
                <tr>
                    <th><?php echo $value['idsp'] ?></th>
                    <td style="text-align:center"><img style="width:60%; hegiht: 20%;text-align:center" src="<?php echo $value['hinhanh']?>"></td>
                    <td><?php echo $value['tensp'] ?></td>
                    <td style="text-align:center"><?php echo $value['quantity'] ?></td>
                    <td style="text-align:center"><?php echo  number_format($value['dongia']) ?> vnd</td> 
                    <td style="text-align:center"><?php echo number_format($value['dongia']*$value['quantity'])?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td></td>
                <td colspan="4" style="font-size: 22px; font-weight: bold; padding-left: 5%;">Tổng tiền</td>
                <th style="font-size:20px;"><?php echo number_format($total_price)?> vnd</th>
            </tr>
            </table>
            <button class="btn btn-info" >Than toán</button>
        </div>
    </div>
</form>
<style>
    /* .address {
        width: 200px;
        height:150px;
        text-align: left;
    } */
    .formnhap {
        float: left;
        width: 30%;
        margin:3%;
        font-size: 17px;
    }
    .formnhap th,
    .formnhap td{
        font-size:17px;
        padding: 5px 10px 5px 10px;
        /* margin: 2%; */
    }
    .formnhap input,
    .formnhap textarea{
        font-size:17px;
        width: 300px;
    }
    .giohang{
        float: right;
        right:0;
        width:55%;
        margin:3%;
    }
    
    .giohang a{
        margin-left: 1%; 
        color: black;
        font-size: 16px;
        text-decoration: none;
    }
    .thanhtoan{
        text-align: center;
        margin-bottom: 2%;
    }
    .thanhtoan a{
        font-size:18px;
        font-weight: bold;
        border: 1px solid black;
        align-items: center;
        padding:5px 15px 5px 15px;
        border-radius: 5px;
        text-decoration: none;

        /* text-align: center; */
        color: black;
    }
    td{
        font-size: 18px;
    }
    .bx-trash{
        color: black;
        font-size: 22px;
    }
    .giohang{
        /* border: 1px solid black;
        margin:5%;
        float: */
        float:right;
    }
    h1{
        margin:2% 0 2% 3%;
    }
    .giohang table, th, td,
    .formnhap table, th, td {
        border:1px solid black;
        border-collapse: collapse;
        margin: 3% 1% 3% 1%;
        font-size: 17px;
    }
</style>