<?php
/*
<div class="block_sb" id="street_t">
    <h4 class="t_sb">
        <span>
            Nhà đất bán
        </span>
    </h4><!-- End .t_sb -->
    <div class="m_sb">
    
        <div id="content_ndb" class="f_rv" style="height: 509px;">
            <ul>
            <?php
			$idquan=$row_sanpham['idquan'];
			$idcity=$row_sanpham['idcity'];
             $raovat=get_records("tbl_street","status=1 and parent1='".$idcity."' and parent='".$idquan."' ","id DESC"," "," ");
            while($row_cate=mysql_fetch_assoc($raovat)){
            ?>
                <li class="clearfix">                                        	
                    <span class="icon_rv"></span>
                    <span class="text_rv">
                       <a href="<?php echo $linkrootbds?><?php echo get_field('tbl_quanhuyen_category','id',$idcity,'subject');?>-<?php echo $row_cate['subject'];?>.html"> <?php echo $row_cate['name'];?></a>
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
           <a href="<?php echo $linkrootbds?>nha-dat-chua-xac-thuc.html"> Tin nhà đất chưa xác thực </a>
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
                       <a  rel="nofollow" title="<?php echo $row_cate['name'];?>" href="<?php echo $linkrootbds?><?php echo $row_cate['subject'];?>.html"> <?php echo $row_cate['name'];?></a>
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
*/ ?>