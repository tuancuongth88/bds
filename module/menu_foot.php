<div class="menu_foot">
    <ul>
		<?php
        $cate=get_records("tbl_rv_item","cate=4","id ASC"," "," ");
        while($row_cate=mysql_fetch_assoc($cate)){
        ?>
        <li>
            <a href="<?php echo $linkrootbds?><?=$row_cate['subject']?>.html"><?=$row_cate['name']?></a>
        </li>
        <?php }?>
    </ul>
</div><!-- End .menu_foot -->