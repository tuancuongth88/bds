<div class="breacrum">
     <div id="breacrum" xmlns:v="http://rdf.data-vocabulary.org/#" >
         <span typeof="v:Breadcrumb">
            <a href="<?php echo $linkrootbds?>"  rel="v:url" property="v:title"  title="Trang chủ"> Trang chủ </a>
        </span>
        <span typeof="v:Breadcrumb">&raquo;
            <a  rel="v:url" property="v:title"  title="<?=get_field('tbl_quanhuyen_category','subject',$_GET['quan'],'name');?>" href="<?php echo $linkrootbds?><?=$_GET['quan'];?>.html"> <?=get_field('tbl_quanhuyen_category','subject',$_GET['quan'],'name');?> </a>
        </span>
         <span typeof="v:Breadcrumb">&raquo;
            <?=get_field('tbl_quanhuyen','subject',$_GET['huyen'],'name');?>
        </span>
    </div>
</div>
 
<?php 
 
 	$quan=$_GET['quan'];
	
	$row_quan    = getRecord('tbl_quanhuyen_category', "subject='".$quan."'");
	
	$huyen=$_GET['huyen'];
	
	if($huyen!="khac") {
		$row_huyen    = getRecord('tbl_quanhuyen', "subject='".$huyen."'");
		$str_h=" and idquan='".$row_huyen['id']."'";
	}
	
	
	
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
	else $xapxep="date_up DESC,id DESC";
	
	settype($pageSize,"int");

	settype($totalRows,"int");
	settype($dem,"int");
	

	if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
	if ($pageNum<=0) $pageNum=1;
	$startRow = ($pageNum-1) * $pageSize;
	

    $totalRows = countRecord("tbl_rv_item","status=1 AND cate=0 and idcity='".$row_quan['id']."' $str_h $chuoit"); 
	// echo "status=1 $chuoit AND cate=0 and idquan='".$row_huyen['id']." ";
	$bds=get_records("tbl_rv_item","status=1 $chuoit AND cate=0 and idcity='".$row_quan['id']."' $str_h order by $xapxep limit ".$startRow.",".$pageSize," "," "," ");	

?>
<div class="f_cont clearfix">

    <article class="content">
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
                echo pagesLinks_new_full_2013($totalRows, $pageSize ,$linkroot,"p","page-tim/".$_GET['quan']."/".$_GET['huyen']);
                ?>
            </div>
            <div class="clear"></div>
        </div>
        
        
        
    </article><!-- End .content -->
    
   <?php include("module/slidebar.php") ;?>
    
</div><!-- End .f_cont -->