<?php
error_reporting(0);
	ini_set('max_execution_time', 15000); //300 seconds = 5 minutes
	require("config.php");
	require("common_start.php");
	include("lib/func.lib.php");	 

?>
 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="content-language" content="vi" />
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="audience" content="general" /><meta name="resource-type" content="document" /><meta name="abstract" content="Thông tin Bất Động Sản Việt Nam" /><meta name="classification" content="Bất động sản Việt Nam" /><meta name="area" content="Bất Động Sản" /><meta name="placename" content="Việt Nam" /><meta name="author" content="Gianggia.com" /><meta name="owner" content="ygiahome.com" /><meta name="distribution" content="Global" /><meta name="revisit-after" content="1 days" /><meta name="robots" content="follow" />
<meta name="google-site-verification" content="BI1ntifjOKhc5Jn_Ln9Cmfvvn1Ms6c7k7rOTyRxrVjE" />
<base href="<?=$linkrootbds?>"  />
<?php include("module/title.php") ;?>

<link rel="alternate" href="http://hocmarketingbinhduong.com" hreflang="vi-vn" />
<link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>templates/css-queries.css">
<link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>templates/cssAdd.css">
<!--<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/jquery-1.10.0.min.js"></script>-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/map/js/jquery-1.7.1/jquery.min.js"></script>

<!--<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/jquery-ui.js"></script>-->
<link href="<?php echo $linkrootbds?>lib/select2/select2.css" rel="stylesheet"/>
<script src="<?php echo $linkrootbds?>lib/select2/select2.js"></script>
<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/scrolltopcontrol.js"></script>

 <script type="text/javascript" src="<?php echo $linkrootbds?>lib/jquery-ui.min.js"></script> 

<!-- bxSlider Javascript file -->
<script src="bxslider/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="bxslider/jquery.bxslider.css" rel="stylesheet" />

<!--[if lt IE 9]>
	<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/selectivizr-min.js"></script>
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/respond.min.js"></script>
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/html5.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>templates/FIX_IE.css" />    
<![endif]-->

</head>
<body itemscope="itemscope" itemtype="http://schema.org/WebPage">

	<div id="wrapper">
        
        <header id="header">
        	
            <?php include("module/banner.php") ;?>
            
            <?php include("module/menu_main.php") ;?>
            
        </header><!-- End #header -->
        
        <div id="container">
        	<div class="min_wrap">
            	
                <?php 
					if($frame=="dangtin") include("module/dangtin.php") ;
					elseif($frame=="dangtin") include("module/suatin.php") ; 
					elseif($frame=="dangnhap") include("module/dangnhap.php") ;
					elseif($frame=="dangky") include("module/dangky.php") ;
					else include("module/processFrame.php")
				?> 
            
            </div><!-- End .min_wrap -->
        </div><!-- End #container -->
        
        <footer id="footer">
        	<div class="min_wrap">
            
            	<?php if($frame!="dangky" &&  $frame!="dangnhap" &&  $frame!="addbds" &&  $frame!="editbds" &&  $frame!="addda" &&  $frame!="editda" &&  $frame!="adddn" &&  $frame!="editdn" &&  $frame!="changeinfo" &&  $frame!="changepass" &&  $frame!="manage") include("module/partner.php") ;?> 
            
            	<?php include("module/menu_foot.php") ;?> 
                
                <?php include("module/info_foot.php") ;?> 
            
            </div><!-- End .min_wrap -->
        </footer><!-- End #footer -->
        
    </div><!-- End #wrapper -->
    
    <?php include("module/menu_mobile.php") ;?> 
    
    <link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>scripts/swiper/idangerous.swiper.css">
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/swiper/idangerous.swiper.min.js"></script>
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/jquery.customSelect-master/jquery.customSelect.min.js"></script>    
    <link rel="stylesheet" type="text/css" href="scripts/royalslider/assets/royalslider/royalslider.css">
    <link rel="stylesheet" type="text/css" href="scripts/royalslider/assets/royalslider/skins/minimal-white/rs-minimal-white.css">
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/royalslider/assets/royalslider/jquery.royalslider.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>scripts/custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/frame_script.js"></script>
    
</body>
</html>