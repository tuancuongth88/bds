<div class="bs_3 box-sizing-fix">
                    	
                        <h4 class="t_bs t_bs2">
                        	<span>Tin nổi bật</span>
                        </h4><!-- End .t_bs -->
                        
                        <div class="m_bs">
                        
                        	<div class="news_bs">
                            
                            	<div class="swiper-container2123">
                                    <div class="swiper-wrapper123">
                                    <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" direction="up" align="center" width="280px" height="304px">
                                    <?php
                                    // $bds=get_records("tbl_rv_item","status=1 and cate=1 and hot=1","sort DESC","0,5"," ");
									$bds=get_records("tbl_rv_item"," cate = 0 AND (id = '' OR NAME LIKE '%%' OR '' =- 1) AND (STATUS = '-1' OR '-1' =- 1) AND (hot = '1' OR '1' =- 1) AND (active = '-1' OR '-1' =- 1)","sort DESC"," "," ");
									while($row_bds=mysql_fetch_assoc($bds)){
									?>
                                        <div class="swiper-slide">
											
                                            <!-- <span class="nbs_1">
                                            	  <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                                  
													  <?php 
                                                        if($row_bds['image']!="") $hinh=$row_bds['image'];else $hinh="imgs/noimage.png";
                                                        $hinh=$linkrootbds."imagecache/image.php/".$hinh."?width=100&amp;height=100&amp;cropratio=1:1&amp;image=".$linkrootbds.$hinh;
                                                    ?>
                                                        <img src="<?php echo $hinh;?>" alt="<?php echo $row_bds['name'];?>">
                                                    </a>  
                                            </span> -->
                                            <span class="nbs_2" style="font-weight: bold;">
                                            	<a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                                	<?php echo $row_bds['name'];?>
                                                </a>
                                                <span>(<?php echo $row_bds['date_added'];?>)</span>
                                            </span>
                                            
                                            <div class="clear"></div>
                                            
                                        </div>
                                         
                                      <?php }?>     
                                         </marquee>
                                         
                                        
                                    </div>
                                </div><!-- End .swiper-container2 -->
                                
                                <div class="clear"></div>
                                
                                <span class="mask_nbs"></span>
                            
                            </div><!-- End .news_bs -->
                        
                        </div><!-- End .m_bs -->
                        
                    </div><!-- End .bs_3 -->