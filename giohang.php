<?php
    include './connect_db.php';
    session_start();
    $ten_user = $_SESSION['dangnhapweb'];
    $cart = (isset($_SESSION['cart']))? $_SESSION['cart'] : [];
?>
<div class="giohang">
    <h1>Giỏ hàng : <?php echo $ten_user?></h1>
    <a href="index.php?quanly=giohang&quanly=lichsudh" style="margin-left: 5%;">Lịch sử đơn hàng</a>
    <form action="" method="POST">
        <table class="table_giohang" style="width:98%;">
            <tr> 
                <th style="width:6%">Idsp</th>
                <th style="width:20%">Hình ảnh </th>
                <th style="width:20%">Tên sản phẩm</th>
                <th style="width:15%">Số lượng</th>
                <th style="width:15%;">Đơn giá</th>
                <th style="width:15%;">Thành tiền</th>
                <th style="width:6%;">Xoá</th>
            </tr>   
        <?php 
            $total_price = 0;
            foreach ($cart as $key => $value): 
                $total_price += ($value['dongia']*$value['quantity']);
        ?>
            <tr>
                <td style="text-align:center"><?php echo $value['idsp'] ?></td>
                <td style="text-align:center"><img style="width:60%; hegiht: 20%;text-align:center" src="<?php echo $value['hinhanh']?>"></td>
                <td><?php echo $value['tensp'] ?></td>
                <td style="text-align:center">
                    <form method ="POST" action="index.php?quanly=sanpham&quanly=chitietsp&quanly=themgiohang&idsp=<?php echo $value['idsp']?>">
                        <input type="hidden" name = "action" value="update">
                        <input type="hidden" name="idsp" value="<?php echo $value['idsp']?>">
                        <input min="1" name='quantity' type='number' value='<?php echo $value['quantity']?>' style="width:22%;font-size:22px; text-align:center; margin: 0 1% 0 1%">
                        <button type="submit">Cập nhật</button>
                    </form>
                </td>
                <td style="text-align:center"><?php echo  number_format($value['dongia']) ?> vnd</td> 
                <td style="text-align:center"><?php echo number_format($value['dongia']*$value['quantity'])?></td>
                <th class="delete">
                    <form method ="POST" action="index.php?quanly=sanpham&quanly=chitietsp&quanly=themgiohang&idsp=<?php echo $value['idsp']?>">
                        <input type="hidden" name = "action" value="delete">
                        <button type="submit">Xoá</button>
                    </form>
                </th>
            </tr>
        <?php endforeach ?>
            <tr>
                <td></td>
                <td colspan="4" style="font-size: 22px; font-weight: bold; padding-left: 5%;">Tổng tiền</td>
                <th style="font-size:20px;"><?php echo number_format($total_price)?> vnd</th>
            </tr>
        </table>
        <div class="thanhtoan">
            <?php
            if(isset($_SESSION['dangnhapweb'])) {?>
                <a href="index.php?quanly=giohang&quanly=thanhtoan" class="btn btn-info">Tiến hành thanh toán</a>
            <?php } else {?>
                <p>Bạn vui lòng đăng nhập để thanh toán đơn hàng!<a href="../webshop/login.php">Đăng nhập</a></p>
            <?php } ?>
        </div>
    </form>
</div>
<style>
    .giohang a{
        margin-left: 1%; 
        color: rgb(0, 0, 139);
        font-size: 16px;
        /* text-decoration: none; */
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
        border: 1px solid black;
        margin:5%;
    }
    h1{
        margin:2% 0 2% 3%;
    }
    table, th, td {
        border:1px solid black;
        border-collapse: collapse;
        margin: 3% 1% 3% 1%;
    }
</style>