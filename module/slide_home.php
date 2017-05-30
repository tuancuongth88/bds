<div class="bs_2 box-sizing-fix">
        
        <div class="swiper-container1">
            <div class="swiper-wrapper">
            
				<?php
                    $bds=get_records("tbl_rv_item","status=1 and cate=2 and hot=1","id DESC","0,5"," ");
                    while($row_bds=mysql_fetch_assoc($bds)){
                ?>
                <div class="swiper-slide">
                    <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                        <img src="<?php echo $row_bds['image'];?>" alt="<?php echo $row_bds['name'];?>">
                        <span>
                           <?php echo $row_bds['name'];?>
                        </span>
                    </a>
                </div>
                <?php }?>  
                
                
            </div>
        </div><!-- End .swiper-container1 -->
        
        <div class="clear"></div>
        
        <a class="arrow-left" href="#"></a> 
        <a class="arrow-right" href="#"></a>
        
    </div><!-- End .bs_2 -->