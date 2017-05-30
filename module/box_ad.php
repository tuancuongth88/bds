<div class="block_sb" id="quangcao_t">
        <h4 class="t_sb">
            <span>
                Quảng cáo
            </span>
        </h4><!-- End .t_sb -->
        <div class="m_sb">
        
            <div class="f_adv">
                
                <ul>
					<?php
                    $adv=get_records("tbl_ad_bds","status=1","id DESC"," "," ");
                    while($row_adv=mysql_fetch_assoc($adv)){
                    ?>
                    <li>
                        <img src="<?php echo $linkrootbds?><?=$row_adv['image']?>" alt="<?=$row_adv['name']?>">
                        <a href="<?=$row_adv['link']?>" target="_blank"></a>
                    </li>
                    <?php }?>
                </ul>
                
            </div><!-- End .f_adv -->
        
        </div><!-- End .m_sb -->
    </div><!-- End .block_sb -->