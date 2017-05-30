<div class="block_sb">
    <h4 class="t_sb">
        <span>
            Rao vặt
            <img class="img_rv" src="<?php echo $linkrootbds?>imgs/layout/img-rv.png" alt="" width="102" height="32">
        </span>
    </h4><!-- End .t_sb -->
    <div class="m_sb">
    
        <div class="f_rv">
            <ul>
            <?php
            //$raovat=get_records("tbl_raovat","status=1 and cate=0 $chuoit","id DESC","0,8"," ");
            //while($row_cate=mysql_fetch_assoc($raovat)){
            ?>
                <li class="clearfix">                                        	
                    <span class="icon_rv"></span>
                    <span class="text_rv">
                         <a target="_blank" href="http://raovat.jbs.vn/<?php echo $row_cate['subject'];?>.html"> <?php echo $row_cate['name'];?></a>
                    </span>
                </li>
              <?php //} ?>   
            </ul>
        </div><!-- End .f_rv -->
    
    </div><!-- End .m_sb -->
</div><!-- End .block_sb -->