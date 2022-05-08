
<?php 
    include './connect_db.php'; 
    $idsp = $_GET['idsp'];
    // var_dump($idsp); exit;
    $sql = "SELECT * FROM `product` WHERE `idpk` = '$idpk'";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);  
    ?>
<div class="mainctsp">
<?php while ($row = mysqli_fetch_array($result)){ 
    ?>
    <form method="POST" action="index.php?quanly=sanpham&quanly=chitietsp&quanly=themgiohang&idsp=<?php echo $_GET['idsp']?>">
        <table>
            <tr>
                <td rowspan="6" style="width:60%; hegiht: 20%;text-align:center"><img src = "<?php echo $row['hinhanh'] ?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="ten"><?php echo $row['tensp'] ?></td>
            </tr>
            <tr>
                <td colspan="2" class="masp">Mã sp : <?php echo $row['idsp'] ?></td>
            </tr>
            <tr>
                <td  colspan="2" class="dongia"><?php echo  number_format($row['dongia'])?> vnd</td>
            </tr>
            <tr>
                <td  colspan="2" class="soluong">
                <input min="1" name='quantity' type='number' value='1' style="width:20%;font-size:22px; text-align:center; margin: 0 1% 0 1%">
                    <input type="hidden" name="idsp" value="<?php echo $row['idsp']?>">
                    <!-- <input style="font-size:22px;width:8%;" onclick="clicktang()" type='button' value='+' > -->
                </td>
            </tr>
            <tr>
                <!-- <td><a href="index.php?quanly=sanpham&quanly=chitietsp&quanly=themgiohang&idsp=<?=$row['idsp']?>">Mua ngay</td> -->
            
                <td><button type="submit" class="btn btn-primary" >Mua ngay</button></td>
            </tr>
        </table>
    </form>
</div>
<script>
    function clickgiam(){
        var result = document.getElementById('quantity'); 
        var qty = result.value; 
        if( !isNaN(qty) &amp, qty > 1 ) {
            result.value--;
        }return false;
    }
    function clicktang(){
        var result = document.getElementById('quantity'); 
        var qty = result.value; 
        if( !isNaN(qty)) 
            result.value++;
        return false;
    }
</script>
<?php } ?>
<table style="text-align: center;align-items: center;">
    <tr style="text-align: center;align-items: center;"> 
        <td style="text-align: center;align-items: center;font-size: 18px;">
            <strong>NIKE SNEAKER </strong>
            <i class='bx bx-check'></i>Giao hàng miễn phí 
            <i class='bx bx-check'></i> Thanh toán khi nhận hàng 
            <i class='bx bx-check'></i>Bảo hành chính hãng!!!
        </td>
    </tr>
    <tr>
        <td style="text-align: center;align-items: center;font-size: 18px;">
            Đến với "<strong>NIKE SNEAKER</strong>" quý khách hàng sẽ có những sản phẩm ưng ý nhất, chất lượng phục vụ tốt và giá thành tốt nhất, cùng những "
            <b>Chương trình khuyến mãi đặc biệt.</b>"
        </td>
    </tr>
</table>
<p style="margin-bottom:6%;"></p>
<style>
    .btn-primary{
        background-color:rgb(220, 20, 60);
        color: white;
        padding: 5% 10% 5% 10%;
        border:0;
        border-radius: 20px;
    }
    .masp{
        font-size: 20px;
    }
    /* table, th, td{
        border: 1px solid black;
    } */
    .mainctsp {
        margin: 8% 15% 8% 15%;
    }
    .mainctsp .ten{
        font-size: 35px;
        font-weight:bold;
    }
    .mainctsp .dongia{
        font-size: 25px;
        color: red;
    }
    .mainctsp .addcart{
        /* border: 1px solid black; */
        width: 100%;
        padding:5%;
        border-radius: 20px;
        font-size: 18px;
        font-weight:600;
        text-decoration:none;
        color: black;
        background-color: yellow;
    }
    .mainctsp .buy{
        /* border: 1px solid black; */
        width: 100%;
        padding:7%;
        border-radius: 20px;
        font-size: 18px;
        font-weight:600;
        text-decoration:none;
        color: white;
        background-color: rgb(220, 20, 60);
    }
    .mainctsp img{
        width:80%;
        height:80%;
    }
    .buttons_added {
    opacity:1;
    display:inline-block;
    display:-ms-inline-flexbox;
    display:inline-flex;
    white-space:nowrap;
    vertical-align:top;
}
.is-form {
    overflow:hidden;
    position:relative;
    background-color:#f9f9f9;
    height:2.2rem;
    width:1.9rem;
    padding:0;
    text-shadow:1px 1px 1px #fff;
    border:1px solid #ddd;
}
.is-form:focus,.input-text:focus {
    outline:none;
}
.is-form.minus {
    border-radius:4px 0 0 4px;
}
.is-form.plus {
    border-radius:0 4px 4px 0;
}
.input-qty {
    background-color:#fff;
    height:2.2rem;
    text-align:center;
    font-size:1rem;
    display:inline-block;
    vertical-align:top;
    margin:0;
    border-top:1px solid #ddd;
    border-bottom:1px solid #ddd;
    border-left:0;
    border-right:0;
    padding:0;
}
.input-qty::-webkit-outer-spin-button,.input-qty::-webkit-inner-spin-button {
    -webkit-appearance:none;
    margin:0;
}
</style>