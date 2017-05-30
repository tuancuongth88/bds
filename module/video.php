<div class="breacrum">
     <div id="breacrum" xmlns:v="http://rdf.data-vocabulary.org/#" >
         <span typeof="v:Breadcrumb">
            <a href="<?php echo $linkrootbds?>" rel="v:url" property="v:title"  title="Trang chủ"> Trang chủ </a>
        </span>
         <span typeof="v:Breadcrumb"> &raquo;
             Video
        </span>
    </div>
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
	

     $totalRows = countRecord("tbl_rv_video","status=1  "); 
	 //echo "status=1 $chuoit AND parent in ({$parent}) order by $xapxep limit ";
	$bds=get_records("tbl_rv_video","status=1 order by $xapxep limit ".$startRow.",".$pageSize," "," "," ");	

?>
<div class="f_cont clearfix">

    <article class="content">
         
        <div class="f_video_D">
        
            <ul>
            <?php 
                //$bds=get_records("tbl_rv_item","status=1","sort ASC"," "," ");
            while($row_bds=mysql_fetch_assoc($bds)){ 
			 
            ?>
                <li>
                      <a href="<?php echo $linkrootbds?>video/<?php echo $row_bds['subject'];?>.html" title="">
                        <div class="bg_miv">
                            <div class="mask_img_v">                                   	
								<?php if($row_bds['image']!="") $hinh=$row_bds['image'];else $hinh="imgs/noimage.png";?>
                                <img src="<?php echo $hinh;?>" alt="<?php echo $row_bds['name'];?>">
                            </div>
                        </div><!-- End .mask_img_v -->
                        <h4>
                            <?php echo $row_bds['name'];?>
                        </h4>
                        <div class="clear"></div>
                    </a>
                </li>
              <?php }?>    
            </ul>
            
            <div class="clear"></div>
        
        </div>
        
        <div class="page">
                <div class="PageNum">
                    <?php  
                     echo pagesLinks_new_full_2013($totalRows, $pageSize ,$linkroot,"p","page-video");
                    ?>
                </div>
                <div class="clear"></div>
            </div>
        
        
        
    </article><!-- End .content -->
    
   <?php include("module/slidebar.php") ;?>
    
</div><!-- End .f_cont -->