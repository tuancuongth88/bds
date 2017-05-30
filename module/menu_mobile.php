<div class="menu_mobile" style="visibility: hidden;">
    <span class="close_menu_mobile">
        <a class="icon_close_menu_mobile" href="javascript:void(0)"></a>
    </span>
        
    <div class="accordion">            
        
        <a class="t_accordion" href="<?php echo $linkrootbds?>" title="Trang chủ">Trang chủ</a>
        <div class="m_accordion">            
        </div><!-- End .m_accordion -->
        
        <a class="t_accordion" href="javascript:void(0)">Tin nhà đất</a>
        <div class="m_accordion">
            <div class="accordion">
				<?php
                $cate=get_records("tbl_rv_category"," parent=2 and cate=1","sort ASC"," "," ");
                while($row_cate=mysql_fetch_assoc($cate)){
                ?> 
                <a class="t_accordion" href="<?php echo $linkrootbds?><?=$row_cate['subject']?>.html">  <?=$row_cate['name'];?></a>
                <ul class="ul_accordion_1">
                </ul>
                 <?php }?> 
                
            </div><!-- End .accordion -->
        </div><!-- End .m_accordion -->
        
		<?php
        $cate=get_records("tbl_rv_category"," parent=2 and cate=0","sort ASC"," "," ");
        while($row_cate=mysql_fetch_assoc($cate)){
        ?>
        
        <a class="t_accordion" href="javascript:void(0)"><?=$row_cate['name']?></a>
        <div class="m_accordion">
            <div class="accordion">
				<?php
                $cate1=get_records("tbl_rv_category"," parent='".$row_cate['id']."' and cate=0","sort ASC"," "," ");
                while($row_cate1=mysql_fetch_assoc($cate1)){
                ?> 
                <a class="t_accordion" href="<?php echo $linkrootbds?><?=$row_cate1['subject']?>.html" title="<?=$row_cate1['name'];?>">  &nbsp;&nbsp;&nbsp;&nbsp;<?=$row_cate1['name'];?></a> 
                <ul class="ul_accordion_1">
                </ul>
                <?php }?>
                
                
            </div><!-- End .accordion -->
        </div><!-- End .m_accordion -->
        
        <?php }?>
        
        <a class="t_accordion" href="javascript:void(0)">Dự án BĐS</a>
        <div class="m_accordion">
            <div class="accordion">
				<?php
                $cate=get_records("tbl_rv_category"," parent=2 and cate=2","sort ASC"," "," ");
                while($row_cate=mysql_fetch_assoc($cate)){
                ?> 
                <a class="t_accordion" href="<?php echo $linkrootbds?><?=$row_cate['subject']?>.html">  <?=$row_cate['name'];?></a>
                <ul class="ul_accordion_1">
                </ul>
                <?php }?>
                
            </div><!-- End .accordion -->
        </div><!-- End .m_accordion -->
        
        <a class="t_accordion" href="<?php echo $linkrootbds?>video.html">Video dự án</a>
        <div class="m_accordion">
        </div><!-- End .m_accordion -->
        
        <a class="t_accordion" href="javascript:void(0)">Nhà môi giới</a>
        <div class="m_accordion">
            <div class="accordion">
				<?php
                $cate=get_records("tbl_rv_category"," parent=2 and cate=3","sort ASC"," "," ");
                while($row_cate=mysql_fetch_assoc($cate)){
                ?> 
                <a class="t_accordion"  href="<?php echo $linkrootbds?><?=$row_cate['subject']?>.html">-:- <?=$row_cate['name'];?></a>
                <ul class="ul_accordion_1">
                </ul>
                <?php }?>
                
            </div><!-- End .accordion -->
        </div><!-- End .m_accordion -->
        
        <a class="t_accordion" href="<?php echo $linkrootbds?>lien-he.html" title="Liên hệ">Liên hệ</a>
        <div class="m_accordion">            
        </div><!-- End .m_accordion -->
                    
    </div><!-- End #accordion -->
    
</div><!-- End .menu_mobile -->