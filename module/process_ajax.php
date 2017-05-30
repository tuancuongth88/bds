<?php 
	require("../../config.php");
	require("../../common_start.php");
	include("../../lib/func.lib.php");
?>

<?php
	
	
	if(isset($_GET['idtinh'])) {
		$idtinh=$_GET['idtinh'];
		settype($idtinh, "int");
		if($idtinh==1000) $idtinh=-1;
	    $_SESSION['kt_thanhpho']=$idtinh; header("location:".$linkrootbds); 
	
	}
	
	if(isset($_GET['idhuyen'])) {
		$idhuyen=$_GET['idhuyen'];
		settype($idhuyen, "int");
		if($idhuyen==1000) $idhuyen=-1;
	    $_SESSION['kt_quanhuyen']=$idhuyen;
		if(isset($_GET['them']))  header("location:".$host_link_full."?p=raovat"); 
		else header("location:".$_SERVER['HTTP_REFERER']); 
	}
	
	if(isset($_GET['idphuong'])) {
		$idphuong=$_GET['idphuong'];
		settype($idphuong, "int");
		if($idphuong==1000) $idphuong=-1;
	    $_SESSION['kt_phuongxa']=$idphuong;
		if(isset($_GET['them']))  header("location:".$host_link_full."?p=raovat"); 
		else header("location:".$_SERVER['HTTP_REFERER']); 
	}
	
	
	
	elseif(isset($_GET['nhucau'])) {
		$nhucau=$_GET['nhucau'];
		settype($nhucau, "int");
		if($nhucau==0)$nhucau=-1;
		$_SESSION['kt_nhucau']=$nhucau;
		 header("location:".$_SERVER['HTTP_REFERER']); 
	}
	
	elseif(isset($_GET['tinhtrang'])) {
		$tinhtrang=$_GET['tinhtrang'];
		settype($tinhtrang, "int");
		if($tinhtrang==0)$tinhtrang=-1;
		$_SESSION['kt_tinhtrang']=$tinhtrang;
		if(isset($_GET['them']))  header("location:".$host_link_full."?p=raovat"); 
	else header("location:".$_SERVER['HTTP_REFERER']); 
	}
	elseif(isset($_GET['filter'])) {
		$filter=$_GET['filter'];
		$filter=ten_table('raovat_nhucau','tenmien',$filter,'id');
		if($filter==0)$filter=-1;
		$_SESSION['kt_filter']=$filter;
		if(isset($_GET['them']))  header("location:".$host_link_full."?p=raovat"); 
	else header("location:".$_SERVER['HTTP_REFERER']); 
	}
	
				
?>