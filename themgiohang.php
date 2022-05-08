<?php
    include './connect_db.php';
    session_start();
    if(isset($_GET['idsp'])){
        $idsp = $_GET['idsp'];
    }
    $action = (isset($_POST['action'])) ? $_POST['action'] : 'add';
    $quantity = (isset($_POST['quantity'])) ? $_POST['quantity'] : 1;
    $query = mysqli_query($con, "SELECT * FROM product WHERE idsp = $idsp");
    if($query){
        $product = mysqli_fetch_array($query);
    }
    $item = [
        'idsp'=>$product['idsp'],
        'hinhanh'=>$product['hinhanh'],
        'tensp'=>$product['tensp'],
        'dongia'=>$product['dongia'],
        'quantity'=>$quantity
    ];
    //thêm vào gio hàng
    if($action == 'add'){
        if(isset($_SESSION['cart'][$idsp])){
            $_SESSION['cart'][$idsp]['quantity'] += $quantity;
        }
        else{
            $_SESSION['cart'][$idsp] = $item;
        }
    }
    //cập nhật giỏ hàng
    if($action == 'update') {
        $_SESSION['cart'][$idsp]['quantity'] = $quantity;
    }
    //xoá sản phẩm
    if($action == 'delete'){
        unset($_SESSION['cart'][$idsp]);
    }
    header('Location: index.php?quanly=giohang');
    echo "<pre>";
    print_r ($_SESSION['cart']);
?>