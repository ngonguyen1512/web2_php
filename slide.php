<?php 
        if($page > 1){
            $prev_page = $page - 1; ?>
            <a class="page_item" href="index.php?quanly=sanpham&per_page=<?=$item_per_page?>&page=<?=$prev_page?>" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold; position: fixed; bottom:9px; margin-left:25%">Prev</a>
        <?php } ?>
        <div class="chuyentrang" style="position: fixed; bottom:15px; margin-left:31%">
            <a class="page_item" href="index.php?quanly=sanpham" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold">1</a>
            <?php for($num = 2 ; $num <=$totalPage; $num++) { ?>
                <a class="page_item" href="index.php?quanly=sanpham&per_page=<?=$item_per_page?>&page=<?=$num?>" style="font-size: 22px; margin-right: 10px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none; color: black; font-weight:bold"><?=$num?></a>
            <?php }?>
        </div>
        <?php 
            if($page < $totalPage){
                $next_page = $page + 1; ?>
                <a class="page_item" href="index.php?quanly=sanpham&per_page=<?=$item_per_page?>&page=<?=$next_page?>" style="font-size: 22px; margin-right: 5px; border: 1px solid black; padding: 5px 10px 5px 10px; text-decoration:none;color: black; font-weight:bold; position: fixed; bottom:9px; margin-left:48%">Next</a>
        <?php }
    ?>