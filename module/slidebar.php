<div class="sidebar">
    
    <?php
    	 if($frame!="home"  && $frame!="")include("module/box_filter_left.php");
	?>
    <?php include("module/box_diaphuong.php") ;?> 
	
    <?php include("module/box_video.php") ;?> 
    
    <?php //include("module/box_raovat.php") ;?> 
    
    <?php
		 $row_rs_tit=getRecord('tbl_rv_item', "subject='".$_GET['bds']."'");
    	 if($frame=="product_detail" && $row_rs_tit['id']>0 && $row_rs_tit['cate']==0)include("module/box_street.php");
	?>
    
    <?php include("module/box_ad.php") ;?> 
    
    <?php include("module/box_tag_right.php") ;?> 
    <?php 
    	// if($frame=="home" || $frame=="" ) include("module/box_city.php");
	?>
    
</div><!-- End .sidebar -->