<div class="block_prod">
    <h4 class="t_prod">
        <span>
            Tin mua bán nhà đất VIP                            
        </span>
        <a class="readmore_prod" href="sieu-thi-dia-oc.html"> Xem toàn bộ</a>
    </h4><!-- End .t_prod -->
    <div class="m_prod">
        <ul>
        <?php
            $bds=get_records("tbl_rv_item","status=1 and cate=0 and hot=1","date_up DESC,id DESC","0,28"," ");
            while($row_bds=mysql_fetch_assoc($bds)){
        ?>
            <li>
                <div class="li_prod clearfix">
                    <span class="lp_1">
                        <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                        <?php 
							if($row_bds['image']!="") $hinh=$row_bds['image'];else $hinh="imgs/noimage.png";
							$hinh=$linkrootbds."imagecache/image.php/".$hinh."?width=100&amp;height=100&amp;cropratio=1:1&amp;image=".$linkrootbds.$hinh;
						?>
                            <img src="<?php echo $hinh;?>" alt="<?php echo $row_bds['name'];?>">
                        </a>
                    </span><!-- End .lp_1 -->
                    <span class="lp_2">
                        <h4>
                            <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                <?php echo $row_bds['name'];?>
                            </a>
                        </h4>
                        <span class="vt_lp">Vị trí:  <?=get_field('tbl_quanhuyen_category','id',$row_bds['idcity'],'name');?></span>
						<span class="price_lp">Giá: <?php echo  $row_bds['price'];?> <?php echo value_unit($row_bds['donvi']);?>/<?php echo dientich($row_bds['dientich']);?></span>
                        <!--<span class="price_lp">Số quan tâm:  <?php echo  $row_bds['view'] ;?> người</span>-->
                        <ul class="tool_icon">
                         <li class="ti_1">
                             <?php echo  $row_bds['view'] ;?>
                            </li>
                            <li class="ti_2">
                            <?php echo  countComment($row_bds['id']);?>
                            </li>
                            <li class="ti_3">
                             <a href="<?=$linkrootbds?><?php if($row_bds['image']!="") echo $row_bds['image'];else echo "imgs/noimage.png";?>" style="color:#888;" target="_blank">
                             <?php echo rand(7, 75);?>
                             </a>
                            </li>
                        </ul>
                    </span><!-- End .lp_2 -->
                </div><!-- End .li_prod -->
            </li>
             <?php }?>
        </ul>
        <div class="clear"></div>
    </div><!-- End .m_prod -->
</div><!-- End .block_prod -->
<div class="block_prod">
    <h4 class="t_prod">
        <span>
            Nhà đất mới nhất                                
        </span>
        <a class="readmore_prod" href="<?php echo $linkrootbds?>sieu-thi-dia-oc.html"> Xem toàn bộ</a>
    </h4><!-- End .t_prod -->
    <div class="m_prod">
        <ul>
        <?php
            $bds=get_records("tbl_rv_item","status=1 and cate=0","date_up DESC,id DESC","0,14"," ");
            while($row_bds=mysql_fetch_assoc($bds)){
        ?>
            <li>
                <div class="li_prod clearfix">
                    <span class="lp_1">
                        <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                        <?php 
							if($row_bds['image']!="") $hinh=$row_bds['image'];else $hinh="imgs/noimage.png";
							$hinh=$linkrootbds."imagecache/image.php/".$hinh."?width=100&amp;height=100&amp;cropratio=1:1&amp;image=".$linkrootbds.$hinh;
						?>
                            <img src="<?php echo $hinh;?>" alt="<?php echo $row_bds['name'];?>">
                        </a>
                    </span><!-- End .lp_1 -->
                    <span class="lp_2">
                        <h4>
                            <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                <?php echo $row_bds['name'];?>
                            </a>
                        </h4>
                        <span class="vt_lp">Vị trí:  <?=get_field('tbl_quanhuyen_category','id',$row_bds['idcity'],'name');?></span>
						<span class="price_lp">Giá: <?php echo  $row_bds['price'];?> <?php echo value_unit($row_bds['donvi']);?>/<?php echo dientich($row_bds['dientich']);?></span>
                        <!--<span class="price_lp">Số quan tâm:  <?php echo  $row_bds['view'] ;?> người</span>-->
                        <ul class="tool_icon">
                         <li class="ti_1">
                             <?php echo  $row_bds['view'] ;?>
                            </li>
                            <li class="ti_2">
                            <?php echo  countComment($row_bds['id']);?>
                            </li>
                            <li class="ti_3">
                             <a href="<?php echo $linkrootbds?><?=$linkrootbds?><?php if($row_bds['image']!="") echo $row_bds['image'];else echo "imgs/noimage.png";?>" style="color:#888;" target="_blank">
                             <?php echo rand(7, 75);?>
                             </a>
                            </li>
                        </ul>
                    </span><!-- End .lp_2 -->
                </div><!-- End .li_prod -->
            </li>
             <?php }?>
        </ul>
        <div class="clear"></div>
    </div><!-- End .m_prod -->
</div><!-- End .block_prod -->
 