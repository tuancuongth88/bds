<div class="f_nmg">
    <h4 class="t_nmg">
        <a href="<?php echo $linkrootbds?>doanh-nghiep.html" title="Nhà môi giới">Nhà môi giới</a>
    </h4><!-- End .t_nmg -->
    <div class="m_nmg">
    
        <div class="swiper-container3">
            <div class="swiper-wrapper">
				<?php
                $partner=get_records("tbl_rv_item","status=1 and cate=3 and hot=1","sort DESC","0,8"," ");
                while($row_partner=mysql_fetch_assoc($partner)){
                ?>
                <div class="swiper-slide">
                
                    <span class="sws_1">
                        <a href="<?php echo $linkrootbds?><?php echo $row_partner['subject'];?>.html" title="<?php echo $row_partner['name'];?>"><img src="<?php echo $linkrootbds?><?php echo $row_partner['image'];?>" alt="<?php echo $row_partner['name'];?>"/></a>
                    </span><!-- End .sws_1 -->
                    
                    <span class="sws_2">
                        <a href="<?php echo $linkrootbds?><?php echo $row_partner['subject'];?>.html" title="<?php echo $row_partner['name'];?>">
                            <?php echo $row_partner['name'];?>
                        </a>
                        <p>
                        	 <?php echo $row_partner['detail_short'];?>
                        </p>
                    </span><!-- End .sws_2 -->
                    
                    <div class="clear"></div>
                    
                </div><!-- End .swiper-slide -->
                <?php }?>
                
            </div><!-- End .swiper-wrapper -->
        </div><!-- End .swiper-container3 -->
        
        <a class="sc3_left" href="#"></a> 
        <a class="sc3_right" href="#"></a>
        
        <div class="clear"></div>
    
    </div><!-- End .m_nmg -->
</div><!-- End .f_nmg -->