<?php
	require("../config.php");
	require("../common_start.php");
	include("../lib/func.lib.php");
	
  
	
	if(isset($_POST['tagcontent'])){
		//$tukhoa=xuly_kytu_db_timkiem($_POST['keyword'],1);
		$cate=$_POST['cate'];
		$keyword=$_POST['tagcontent']; 
 		if($keyword=="") $keyword="bat-dong-san";
		 
		if($cate=='nha-dat-ban')  {$ghinho=1; $catebds="211";}
		elseif($cate=='nha-dat-cho-thue'  )  {$ghinho=1; $catebds="212";} 
		elseif($cate=='tin-tuc') $ghinho=2;
		elseif($cate=='du-an') $ghinho=3;
		elseif($cate=='doanh-nghiep') $ghinho=4;
		elseif($cate=='tat-ca') $ghinho=0;
		
		if($ghinho==1) $back=$linkrootbds.'nhu-cau/'.$cate.'/'.$keyword.'.html';
		else  $back=$linkrootbds.'tags/'.$cate.'/'.$keyword.'.html';
		header("location: $back");
	}else{
		header("location: $linkrootbds");
	}
	
?>