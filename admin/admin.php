<?php
	require("../config.php");
	require("../common_start.php");
	include("../lib/func.lib.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "hrvp://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="hrvp://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản trị Website</title>
<link href="templates/admin.css" rel="stylesheet" type="text/css" />
<link href="templates/khung_quantri.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/map/js/jquery-1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="../scripts/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../lib/ckfinder/ckfinder.js"></script>
<!--<script src="../lib/toolstip/ajax.js" type="text/javascript"></script>
<script src="../lib/toolstip/ajax-dynamic-content.js" type="text/javascript"></script>
<script src="../lib/toolstip/home.js" type="text/javascript"></script>
<script src="../lib/swfobject_modified.js" type="text/javascript"></script>-->
</head>

<body>
<div id="main">
	<!--<div id="ketop"></div>--><!--ketop -->
	 
        <div id="banner" style="">
          <img src="../imgs/logo_batdongsan.png" vspace="10" align="left" />
          <div id="dangnhap">
            <?php  include("login/login_dangnhap.php") ?>
            </div><!--dangnhap -->
        </div><!--banner -->
        <div id="menu"><?php  include("menu.php") ?></div><!--menu -->
   
    <div id="cen"  >
    <table width="100%">
       <tr>
          <td align="center" valign="top">
         
        	  <?php if($_SESSION['kt_login_id']!=""  &&  $_SESSION['kt_login_level']>2) include("processFrame.php");?>  
               <?php
               if($frame=="logout"){
					unset($_SESSION['kt_login_id']);
					unset($_SESSION['kt_login_username']);
					unset($_SESSION['kt_login_level']);
					echo "<script>window.location='admin.php'</script>";
			   }
			   ?>     
           </td>
       </tr>
    </table>
<script language="javascript">
	var popupWindow = null;
	function positionedPopup(url,winName,w,h,t,l,scroll){
		settings ='height='+h+',width='+w+',top='+t+',left='+l+',scrollbars='+scroll+',resizable'
		popupWindow = window.open(url,winName,settings)
	}
</script>   
</div><!--cen -->
    <?php include("conts.php"); ?>
<div id="ketop"></div><!--ketop -->
</div><!--main -->
</body>
</html>
 