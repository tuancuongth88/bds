<?php
	require("../config.php");
	require("../common_start.php");
	include("../lib/func.lib.php");
	
  
	
	if( $_POST['guitin']!=""){  
	  
		$idcity=$_POST['tinh']; 
		$huyen=$_POST['huyen']; 
		$phuong=$_POST['phuong']; 
		$duong=$_POST['duong'];
		$loai=$_POST['loai'];  
		$bds=$_POST['ddCat'];  
		$dientich=$_POST['dientich'];  
		$price=$_POST['price']; 
		$idcity1=$idcity;
		$huyen1=$_POST['huyen'];
		$loai1=$_POST['loai'];  
		$bds1=$_POST['ddCat'];
		
		if($idcity!="") $str.=$idcity."/";
		if($huyen!="") $str.=$huyen."/";
		if($phuong!="") $str.=$phuong."/";
		if($duong!="") $str.=$duong."/";
		if($loai!="") $str.=$loai."/";
		if($bds!="") $str.=$bds."/";
		if($dientich!="") $str.=$dientich."/";
		if($price!="") $str.=$price."/";
		
		$back=$linkrootbds.$str;
	 	 
		if($huyen=="" && $loai=="" && $dientich=="" && $price=="" )$back=$linkrootbds.$idcity1.".html";
		if($huyen!="" && $loai=="" && $dientich=="" && $price=="" && $phuong=="" && $duong==""  )$back=$linkrootbds.$idcity1."/".$huyen1.".html";
		if($idcity=="" && $dientich=="" && $price=="" && $loai!="" && $bds==""){  $back=$linkrootbds.$loai1.".html";}
		if($idcity=="" && $huyen=="" && $dientich=="" && $price=="" && $loai!="" && $bds!="")$back=$linkrootbds.$bds1.".html";
	 	// var_dump($str);die;
	 	if($str){
		 	//echo $back;
		 	header("location: $back");
	 	}else{
	 		header("location: $linkrootbds");
	 	}
	}else{
		header("location: $linkrootbds");
	}
	
?>