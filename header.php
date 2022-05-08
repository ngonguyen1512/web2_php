<?php 
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
        unset($_SESSION['dangnhap']);
        header('Location:login.php');
    }
?>
<div class="header">
    <div class="logo">
        <a href="./index.php">NIKE SNEAKER</a>
    </div>
    <div class="accout_logout">
        <div class="logout">
            <a href="index.php?dangxuat=1">
                <i class='bx bx-log-out'></i>
                
            </a>
        </div>
        <div class="accout">    
            <?php 
                if(isset($_SESSION['dangnhap'])){ 
                    echo $_SESSION['dangnhap'];
                }
            ?>
        </div>
    </div>
</div>
<div class="clear"></div>