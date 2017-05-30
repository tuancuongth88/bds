<div class="block_sb" id="street_t">
    <h4 class="t_sb">
        <span>
			<a title=" Nhà đất Hà Nội " href="<?php echo $linkrootbds?>ha-noi.html">
			Nhà đất Hà Nội
		   </a>
        </span>
    </h4><!-- End .t_sb -->
    <div class="m_sb">    
        <div id="content_ndb" class="f_rv">
            <ul>
            <?php 
            $raovat=get_records("tbl_quanhuyen","parent=2","sort ASC,id ASC",10," ");
            while($row_cate=mysql_fetch_assoc($raovat)){
            ?>
                <li class="clearfix">                                        	
                    <span class="icon_rv"></span>
                    <span class="text_rv">
                       <a title=" Mua bán nhà đất <?php echo $row_cate['name'];?>" href="<?php echo $linkrootbds?>ha-noi/<?php echo $row_cate['subject'];?>.html"> <?php echo $row_cate['name'];?></a>
                    </span>
                </li> 
            <?php } ?>       
            </ul>
        </div><!-- End .f_rv -->
    
    </div><!-- End .m_sb -->
</div>
