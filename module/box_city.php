<div class="block_sb" id="street_t">
    <h4 class="t_sb">
        <span>
           Tìm nhà đất theo tỉnh
        </span>
    </h4><!-- End .t_sb -->
    <div class="m_sb">
    
        <div id="content_ndb" class="f_rv" style="height: 609px;">
            <ul>
            <?php 
            $raovat=get_records("tbl_quanhuyen_category","status=1","sort ASC,name ASC"," "," ");
            while($row_cate=mysql_fetch_assoc($raovat)){
            ?>
                <li class="clearfix">                                        	
                    <span class="icon_rv"></span>
                    <span class="text_rv">
                       <a title=" Mua Bán Nhà Đất › <?php echo $row_cate['name'];?>" href="<?php echo $linkrootbds?><?php echo $row_cate['subject'];?>.html"> Mua Bán Nhà Đất › <?php echo $row_cate['name'];?></a>
                    </span>
                </li>
            <?php } ?>       
            </ul>
        </div><!-- End .f_rv -->
    
    </div><!-- End .m_sb -->
</div>


<div class="block_sb" id="street_t">
    <h4 class="t_sb">
        <span>
           <a href="<?php echo $linkrootbds?>nha-dat-chua-xac-thuc.html" title="Tin nhà đất chưa xác thực"> Tin nhà đất chưa xác thực </a>
        </span>
    </h4><!-- End .t_sb -->
    <div class="m_sb">
    
        <div class="f_rv"  >
            <ul>
            <?php 
            $raovat=get_records("tbl_rv_item","status=1 and cate=5","date_up DESC,id DESC","0,31"," ");
            while($row_cate=mysql_fetch_assoc($raovat)){
            ?>
                <li class="clearfix">                                        	
                    <span class="icon_rv"></span>
                    <span class="text_rv">
                       <a rel="nofollow" title="<?php echo $row_cate['name'];?>" href="<?php echo $linkrootbds?><?php echo $row_cate['subject'];?>.html"> <?php echo $row_cate['name'];?></a>
                    </span>
                </li>
            <?php } ?>   
            <li class="clearfix">
            	<div style="text-align:right; width:100%; border-bottom:dotted 1px #CCCCCC;"> <a style="float:right;" href="<?php echo $linkrootbds?>nha-dat-chua-xac-thuc.html" title="Tin nhà đất chưa xác thực">  Xem thêm </a>  <div  class="clear">  </div></div>
                
            </li>    
            
            </ul>
        </div><!-- End .f_rv -->
    
    </div><!-- End .m_sb -->
</div>