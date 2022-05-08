<div id="main"> 
    <?php
        // include("sidebar/sidebar.php");
    ?>

    <div class="main_content">
        <?php
            if(isset($_GET['quanly'])){
                $tam = $_GET['quanly'];
            }else{
                $tam = ' ';
            }
            if($tam == 'sanpham'){
                include("main/sanpham.php");
            }elseif($tam == 'giohang'){
                include("main/giohang.php");
            }elseif($tam == 'chungtoi'){
                include("main/chungtoi.php");
            }elseif($tam == 'phukien'){
                include("main/phukien.php");
            }elseif($tam == 'af'){
                include("main/main_content/af.php");
            }elseif($tam == 'am'){
                include("main/main_content/am.php");
            }elseif($tam == 'jd'){
                include("main/main_content/jd.php");
            }elseif($tam == 'lb'){
                include("main/main_content/lb.php");
            }elseif($tam == 'thap'){
                include("main/main_content/thap.php");
            }elseif($tam == 'trungbinh'){
                include("main/main_content/trungbinh.php");
            }elseif($tam == 'cao'){
                include("main/main_content/cao.php");
            }elseif($tam == 'searchwsp'){
                include("main/main_content/search.php");
            }elseif($tam == 'ctsp'){
                include("main/main_content/ctsp.php");
            }elseif($tam == 'ctpk'){
                include("main/main_content/ctpk.php");
            }elseif($tam == 'thanhtoan'){
                include("main/main_content/thanhtoan.php");
            }elseif($tam == 'lichsudh'){
                include("main/main_content/lichsudh.php");
            }
            elseif($tam == 'themgiohang'){
                include("main/main_content/themgiohang.php");
            }else{
                include("main/index.php");
            }
        ?>
    </div>
</div>