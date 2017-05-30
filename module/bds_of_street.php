<?php
	 
 
	
	$idcity=$duong['parent1'];
	$idstreet=$duong['id'];
	
	$chuoi_d="";
	$tim_duong=get_records("tbl_street","parent1='".$idcity."' and subject='".$duong['subject']."'"," "," "," ");
	while($row_tim_duong=mysql_fetch_assoc($tim_duong)){
		$chuoi_d.=",".$row_tim_duong['id']; 
	}
	$chuoi_d=substr($chuoi_d,1);
	
	
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
	else $xapxep="date_up DESC";
	
	settype($pageSize,"int");

	settype($totalRows,"int");
	settype($dem,"int");
	

	if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
	if ($pageNum<=0) $pageNum=1;
	$startRow = ($pageNum-1) * $pageSize;
	

    $totalRows = countRecord("tbl_rv_item","status=1  and cate=0  AND idcity='".$idcity."' and idstreet in ('".$idstreet."')"); 
	//echo "status=1   AND parent in ({$parent}) order by $xapxep limit ";
	$bds=get_records("tbl_rv_item","status=1  and cate=0 AND idcity='".$idcity."'  and idstreet in ('".$idstreet."') order by $xapxep limit ".$startRow.",".$pageSize," "," "," ");	
 
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
                                       <?php if($row_bds['image']!="") $hinh=$row_bds['image'];else $hinh="imgs/noimage.png";?>
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
                                        <?php echo rand(5, 35);?>
                                        </li>
                                        <li class="ti_3">
                                        <?php echo rand(7, 75);?>
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
               echo pagesLinks_new_full_2013($totalRows, $pageSize , $root,"p","page-danh-muc/".$_GET['bds']);
            ?>
        </div>
        <div class="clear"></div>
    </div>

