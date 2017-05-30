<?php
	
	$pageSize = 30;
	$totalRows = 0;
	$xeptheo='id';
	$dem=1;
	
	$kkk="1";
	if(isset($_SESSION['filter1'])) {
		$xapxep=$_SESSION['filter1'];
		if($xapxep==" id DESC") $kkk="1";
		elseif($xapxep==" price ASC") $kkk="2";
		elseif($xapxep==" price DESC") $kkk="3";
	}
	else $xapxep="id DESC";
	
	settype($pageSize,"int");

	settype($totalRows,"int");
	settype($dem,"int");
	

	if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
	if ($pageNum<=0) $pageNum=1;
	$startRow = ($pageNum-1) * $pageSize;
	
// tu khoa tach ra khoang 3 tu la duoc
     $totalRows = countRecord("tbl_rv_item","status=1  and (  name LIKE '%$tag%' or  detail LIKE '%$tag%' or  keyword LIKE '%$tag%')"); 
	// echo "status=1 and (  name LIKE '%$tag%' or  detail LIKE '%$tag%' or  keyword LIKE '%$tag%')  order by $xapxep limit ".$startRow.",".$pageSize;
	$bds=get_records("tbl_rv_item","status=1  and (  name LIKE '%$tag%' or  detail LIKE '%$tag%' or  keyword LIKE '%$tag%')  order by $xapxep limit ".$startRow.",".$pageSize," "," "," ");	
	 
?>
<div class="f_prod">
        <div class="block_prod">
        
            <div class="m_prod">
                <ul>
                <?php 
                //$bds=get_records("tbl_rv_item","status=1","sort ASC"," "," ");
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
                                <span class="vt_lp">Loại:  <? if($row_bds['cate']==0) echo "Rao vặt BDS";elseif($row_bds['cate']==1) echo "Tin tức BDS";elseif($row_bds['cate']==2) echo "Dự án BDS";elseif($row_bds['cate']==3) echo "Doanh nghiệp BDS"; ?></span>
                                 
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
           echo pagesLinks_new_full_2013($totalRows, $pageSize ,$linkroot,"p","page-tags/".$_GET['cate']."/".$_GET['tagcontent']);
        ?>
    </div>
    <div class="clear"></div>
</div>
