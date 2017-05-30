<?
	include('../config.php');
	require("../common_start.php");
	include("../lib/func.lib.php");
	
	$iduser= $_SESSION['kh_login_id'];
	
	$visitorLimit=60*10;
	$visitorLimit1=60*30;
	$id=$_GET['id']; 
	settype($id,"int");
	
	$table=$_GET['table']; 
	
	$sql="select 
	(
	CASE 
		WHEN  UNIX_TIMESTAMP(date_up) < UNIX_TIMESTAMP(now())- ".$visitorLimit1." THEN 1
		ELSE 0
	END) AS total
	from tbl_users where id='".$iduser."'";
	$a=mysql_query($sql) or die(mysql_error());
	$aa=mysql_fetch_assoc($a);
	
	if($aa['total']==1){
	
		$iduser= $_SESSION['kh_login_id'];
		$sql1="UPDATE tbl_users SET date_up=now() WHERE id='{$iduser}'";
		mysql_query($sql1) or die(mysql_error());
	
		$sql="UPDATE $table SET date_up=now() WHERE id='{$id}' and UNIX_TIMESTAMP(date_up) < UNIX_TIMESTAMP(now())-$visitorLimit";
		mysql_query($sql) or die(mysql_error());
		
	}
	echo "images/up_1.png";	
	
?>