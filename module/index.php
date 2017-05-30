<?php
	ini_set('max_execution_time', 15000); //300 seconds = 5 minutes
	require("config.php");
	require("common_start.php");
	include("lib/func.lib.php");
	
 	
	
	/*$bds=get_records("tbl_quanhuyen"," "," "," "," ");
	while($row_bds=mysql_fetch_assoc($bds)){
		$chuoi= str_replace("  ", "Huyện ",$row_bds['name']);
	 	$chuoi= str_replace("Q.", "Quận ",$chuoi);
		$chuoi= str_replace("TX.", "Thị Xã ",$chuoi);
		$chuoi= str_replace("TP.", "Thành Phố ",$chuoi);
		$subject=cat_kytu_dacbiet($chuoi,1,1,0,1,1); echo "<br>"; 
		
	 	$sql = "update tbl_quanhuyen set  name='".$chuoi."' where id='".$row_bds['id']."'";
		mysql_query($sql,$conn); 
	}*/
	
	/*$bds1=get_records("tbl_place"," "," "," "," ");	
	while($row = mysql_fetch_assoc($bds1))
	{ 
		$a=getRecord('tbl_place', "latitude='".$row['latitude']."'and  longitude='".$row['longitude']."'and  name='".$row['name']."' and id <> '".$row['id']."'");
		if($a['id']!="") {
			echo $sql="DELETE FROM `tbl_place` WHERE `tbl_place`.`name` = '".$row['name']."' and `tbl_place`.`id` = '".$row['id']."' LIMIT 1";
			mysql_query("$sql");
		}
	}*/
 
	if($_SERVER['REQUEST_URI']!="/") $_SESSION['back_bds']="http://<?php echo $root?>".$_SERVER['REQUEST_URI'];else $_SESSION['back_bds']="http://<?php echo $root?>";
 	 
	if($_SESSION['idtinh']!="") {
			$idtinh=$_SESSION['idtinh'];
			if($idtinh==1000) {
				$chuoit="";
			}
			elseif($idtinh==103) {
	
				$chuoi=mysql_query("select id from tbl_quanhuyen_category where parent=3",$conn);
				$ddk=''; 
				while($rows=mysql_fetch_assoc($chuoi)){ 
					$ddk=$ddk.",".$rows['id']; 
				} 
				$ddk=substr($ddk,1);

				$chuoit=" AND idcity in ($ddk)";
			}elseif($idtinh==102) {
				$chuoi=mysql_query("select id from tbl_quanhuyen_category where parent=2",$conn);
				$ddk=''; 
				while($rows=mysql_fetch_assoc($chuoi)){ 
					$ddk=$ddk.",".$rows['id']; 
				} 
				$ddk=substr($ddk,1);
				$chuoit=" AND idcity in ($tinh)";
			}elseif($idtinh==101) {
				$chuoi=mysql_query("select id from tbl_quanhuyen_category where parent=1",$conn);
				$ddk=''; 
				while($rows=mysql_fetch_assoc($chuoi)){ 
					$ddk=$ddk.",".$rows['id']; 
				} 
				$ddk=substr($ddk,1);

				$chuoit=" AND idcity in ($ddk)";
			}else $chuoit=" AND ( idcity=$idtinh or idcity=100  )";
	}
	
	 
?>
 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="content-language" content="vi" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="audience" content="general" /><meta name="resource-type" content="document" /><meta name="abstract" content="Thông tin Bất Động Sản Việt Nam" /><meta name="classification" content="Bất động sản Việt Nam" /><meta name="area" content="Bất Động Sản" /><meta name="placename" content="Việt Nam" /><meta name="author" content="<?php echo $root?>" /><meta name="owner" content="<?php echo $root?>" /><meta name="distribution" content="Global" /><meta name="revisit-after" content="1 days" /><meta name="robots" content="follow" />
<meta name="google-site-verification" content="BI1ntifjOKhc5Jn_Ln9Cmfvvn1Ms6c7k7rOTyRxrVjE" />
<base href="<?=$linkrootbds?>"  />
<?php include("module/title.php") ;?>
<link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>templates/css-queries.css">
<!--<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/jquery-1.10.0.min.js"></script>-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/map/js/jquery-1.7.1/jquery.min.js"></script>

<!--<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/jquery-ui.js"></script>-->

 <script type="text/javascript" src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script> 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97332015-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"/qjMi1a8Dy0084", domain:"<?php echo $root?>",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=/qjMi1a8Dy0084" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->  
<!--[if lt IE 9]>
	<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/selectivizr-min.js"></script>
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/respond.min.js"></script>
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/html5.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>templates/FIX_IE.css" />    
<![endif]-->

</head>
<body itemscope itemtype="http://schema.org/WebPage">

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