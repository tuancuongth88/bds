<?php 
 
	$pageSize = 30;
	$totalRows = 0;
	$xeptheo='id';
	$dem=1;
	
 
	settype($pageSize,"int");

	settype($totalRows,"int");
	settype($dem,"int");
	
 
	if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
	if ($pageNum<=0) $pageNum=1;
	$startRow = ($pageNum-1) * $pageSize;
	
	if($dem_para==8 && $_GET['tukhoa']>=0 ) {
		$pageNum = $_GET['tukhoa'];
		if ($pageNum<=0) $pageNum=1;
		$startRow = ($pageNum-1) * $pageSize;
	}
 
	// 8 parameter full - htacess only 9 parameter
	$totalRows = countRecord("tbl_rv_item","status=1 AND cate=0 $str_city $str_tinh $str_huyen $str_duong $str_parent $srt_dientich $srt_gia "); 
   // echo "status=1 AND cate=0 $str_city $str_tinh $str_huyen $str_duong $str_parent $srt_dientich $srt_gia order by id DESC limit ".$startRow.",".$pageSize;
	$bds=get_records("tbl_rv_item","status=1 AND cate=0 $str_city $str_tinh $str_huyen $str_duong $str_parent $srt_dientich $srt_gia order by date_up DESC,id DESC limit ".$startRow.",".$pageSize," "," "," ");	 


	if($totalRows=="") $totalRows=0;
?>
<div class="breacrum"> 
    <ul  itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" >
        <li>
            <a itemprop="url" href="<?php echo $linkrootbds?>" title="Trang chủ"><span  itemprop="title" > Trang chủ</span></a>
        </li>
        <?php echo $breadcum;?>
    </ul>
</div>

<div class="f_cont clearfix">

    <article class="content">
    
        <div class="info_search">
            <h2 class="t_is">
               Tìm được <?=$totalRows;?> kết quả bất động sản
            </h2><!-- End .t_is -->
            <div class="m_is">
                <ul>
                	<?php if($dientich!=""){?>
                    <li>
                        Diện tích: <b><?=$dientich?></b>
                    </li> 
                    <?php }?>
                    <?php if($gia!=""){?>
                    <li>
                        Giá: <b><?=$gia?></b>
                    </li> 
                    <?php }?>
                    <li>
                        Tin kiểm duyệt: <b><?=$totalRows;?></b>
                    </li> 
                </ul>
            </div><!-- End .m_is -->
        </div>
        
        <div class="f_prod">
            <div class="block_prod"> 
            
                <div class="m_prod">
                    <ul>
                    <?php  
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
            
        </div>
        
        <div class="page">
                <div class="PageNum">
                    <?php  
					if($dem_para<8) echo pagesLinks_new_full($totalRows, $pageSize ,$root,"p","page-nha-dat".$chuoi);
					else echo pagesLinks_new_full_2014($totalRows, $pageSize ,$root,"page-nha-dat".$chuoi);
                    ?>
                </div>
                <div class="clear"></div>
            </div>
        
        
        
    </article><!-- End .content -->
    
   <?php include("module/slidebar.php") ;?>
    
</div><!-- End .f_cont -->