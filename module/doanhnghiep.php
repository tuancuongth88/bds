<div class="breacrum">
    <ul  itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" >
        <li>
           <a itemprop="url" href="<?php echo $linkrootbds?>" title="Trang chủ"><span  itemprop="title" >Trang chủ</span></a>
        </li>
        <li>
             <a itemprop="url" href="<?php echo $linkrootbds?>doanh-nghiep.html" title="doanh nghiệp"><span  itemprop="title" >Doanh nghiệp</span></a>
        </li>
    </ul>
</div>
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
	

     $totalRows = countRecord("tbl_rv_item","status=1 AND cate=3 $chuoit"); 
	 //echo "status=1 $chuoit AND parent in ({$parent}) order by $xapxep limit ";
	$bds=get_records("tbl_rv_item","status=1 $chuoit AND cate=3  order by $xapxep limit ".$startRow.",".$pageSize," "," "," ");	

?>
<div class="f_cont clearfix">

    <article class="content">
        <div class="f_news">
            <ul>
				<?php 
                //$bds=get_records("tbl_rv_item","status=1","sort ASC"," "," ");
                while($row_bds=mysql_fetch_assoc($bds)){ 
                
                ?>
                <li class="clearfix">
                    <span class="fn_1">
                        <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title=""> 
							<?php 
							if($row_bds['image']!="") $hinh=$row_bds['image'];else $hinh="imgs/noimage.png";
							$hinh=$linkrootbds."imagecache/image.php/".$hinh."?width=100&amp;height=100&amp;cropratio=1:1&amp;image=".$linkrootbds.$hinh;
						?>
                            <img src="<?php echo $hinh;?>" alt="<?php echo $row_bds['name'];?>">
                        </a> 
                    </span><!-- End .fn_1 -->
                    <span class="fn_2">
                        <h4>
                             <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>"><?php echo $row_bds['name'];?></a>   
                        </h4>
                        <span>(<?php echo $row_bds['date_added'];?>)</span>
                        <p>
                            <?php echo catchuoi_tuybien(strip_tags($row_bds['detail_short']),35);?>
                        </p>
                    </span><!-- End .fn_2 -->
                </li>
             <?php }?>    
            </ul>
        </div>
        
        <div class="page">
                <div class="PageNum">
                    <?php  
                     echo pagesLinks_new_full_2013($totalRows, $pageSize , "http://www.giathinhcantho.com","p","page-doanh-nghiep");
                    ?>
                </div>
                <div class="clear"></div>
            </div>
        
        
        
    </article><!-- End .content -->
    
   <?php include("module/slidebar.php") ;?>
    
</div><!-- End .f_cont -->