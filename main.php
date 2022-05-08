<!--  -->
<div class="main_content">
    <?php
        if(isset($_GET['quanly'])){
            $tam = $_GET['quanly'];
        }else{
            $tam = ' ';
        }
        if($tam == 'taikhoanuser'){
            include 'main/taikhoanuser.php';
        }elseif($tam == 'taikhoannv'){
            include 'main/taikhoannv.php';
        }
        elseif($tam == 'taikhoanadmin'){
            include 'main/taikhoanadmin.php';
        }
        // elseif($tam == 'taikhoan'){
        //     include 'main/taikhoan.php';
        // }
        elseif($tam == 'dashboard'){
            include 'main/dashboard.php';
        }elseif($tam == 'thongbao'){
            include 'main/thongbao.php';
        }
        // elseif($tam == 'dangnhap'){
        //     include 'main/login.php';
        // }
        elseif($tam == 'sanpham'){
            include 'main/sanpham.php';
        }elseif($tam == 'deletesp'){
            include 'main/main_sp/deletesp.php';
        }elseif($tam == 'thongke'){
            include 'main/thongke.php';
        }elseif($tam == 'addsp'){
            include 'main/main_sp/addsp.php';
        }elseif($tam == 'searchsp'){
            include 'main/main_sp/searchsp.php';
        }elseif($tam == 'editsp'){
            include 'main/main_sp/editsp.php';
        }elseif($tam == 'donhang'){
            include 'main/donhang.php';
        }elseif($tam == 'edit'){
            include 'main/main_sp/edit_user.php';
        }elseif($tam == 'editad'){
            include 'main/main_sp/edit_admin.php';
        }elseif($tam == 'editnv'){
            include 'main/main_sp/edit_nv.php';
        }elseif($tam == 'delete'){
            include 'main/main_sp/delete_user.php';
        }elseif($tam == 'deletead'){
            include 'main/main_sp/delete_admin.php';
        }elseif($tam == 'deletenv'){
            include 'main/main_sp/delete_nv.php';
        }elseif($tam == 'deletedh'){
            include 'main/main_sp/deletedh.php';
        }elseif($tam == 'capnhat'){
            include 'main/main_sp/xuly.php';
        }elseif($tam == 'search'){
            include 'main/main_sp/search.php';
        }elseif($tam == 'searchad'){
            include 'main/main_sp/searchad.php';
        }elseif($tam == 'searchnvn'){
            include 'main/main_sp/searchnv.php';
        }elseif($tam == 'logsignad'){
            include 'main/main_sp/logsignad.php';
        }elseif($tam == 'logsignnvn'){
            include 'main/main_sp/logsignnv.php';
        }elseif($tam == 'chitietdh'){
            include 'main/main_sp/ctdh.php';
        }elseif($tam == 'ctdhkh'){
            include 'main/main_sp/ctdhkh.php';
        }elseif($tam == 'chitietsp'){
            include 'main/main_sp/ctsp.php';
        }elseif($tam == 'searchdh'){
            include 'main/main_sp/searchdh.php';
        }elseif($tam == 'ctdhkh'){
            include 'main/main_sp/ctdhkh.php';
        }else{
            include 'main/index.php';
        }
    ?>  
</div>
<!--  -->