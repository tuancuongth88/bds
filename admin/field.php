<?php
	require("../config.php");
	require("../common_start.php");
	include("../lib/func.lib.php");
	require("checkLogin.php");
	
	//kiem tra user tu copy link len thanh address
	$row_tbl_users=getRecord('tbl_users',"id = '".$_SESSION['kt_login_id']."'");
	
	$id=$_GET['id']; 
	settype($id,"int");
	
	$table=$_GET['table']; 
	
	$type=$_GET['type']; 
	settype($type,"int");
	
	$cate=$_GET['cate']; 
	settype($cate,"int");
	
	if ($id<=0) die ("-1");
	if ($table=="") die ("-1");
	if ($type=="") die ("-1");
	if ($cate=="") die ("-1");
	
	if($type==1){
		//status
		 if(userPermissEdit($row_tbl_users['listEdit'],$cate,7)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
			$sql="SELECT status FROM $table WHERE id='{$id}'";
			$rs = mysql_query($sql) or die(mysql_error());
			$row_rs=mysql_fetch_row($rs);
			$status=$row_rs[0]; 
		
			if ($status==1) $status=0;else $status=1; 
		
			$sql="UPDATE $table SET status='{$status}' WHERE id='{$id}'";
			mysql_query($sql) or die(mysql_error());
			echo "images/anhien_{$status}.png";	
		 }
		
	}elseif($type==2){
		//hot
		if(userPermissEdit($row_tbl_users['listEdit'],$cate,6)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
			$sql="SELECT hot FROM $table WHERE id='{$id}'";
			$rs = mysql_query($sql) or die(mysql_error());
			$row_rs=mysql_fetch_row($rs);
			$hot=$row_rs[0]; 
		
			if ($hot==1) $hot=0;else $hot=1; 
		
			$sql="UPDATE $table SET hot='{$hot}' WHERE id='{$id}'";
			mysql_query($sql) or die(mysql_error());
			echo "images/noibat_{$hot}.png";	
		}
		
	}elseif($type==3){
		//up tin 
		
		if(userPermissEdit($row_tbl_users['listEdit'],$cate,8)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
			$sql="UPDATE $table SET date_up=now() WHERE id='{$id}'";
			mysql_query($sql) or die(mysql_error());
			echo "images/up_1.png";	
		}
		
		
	}
	elseif($type==4){
		//cert
		
		if(userPermissEdit($row_tbl_users['listEdit'],$cate,5)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
		
			$sql="SELECT active FROM $table WHERE id='{$id}'";
			$rs = mysql_query($sql) or die(mysql_error());
			$row_rs=mysql_fetch_row($rs);
			$active=$row_rs[0]; 
			if($active==0){ // duyet qua roi thi ko duyet lai nua
				$sql="UPDATE $table SET active=1 , date_actived=now() , idmod='".$_SESSION['kt_login_id']."' WHERE id='{$id}'";
				mysql_query($sql) or die(mysql_error());
			}
			echo "images/cert_1.png";
				
		}
		
	}elseif($type==5){
		//status
		 if(userPermissEdit($row_tbl_users['listEdit'],$cate,7)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
			$sql="SELECT warning FROM $table WHERE id='{$id}'";
			$rs = mysql_query($sql) or die(mysql_error());
			$row_rs=mysql_fetch_row($rs);
			$status=$row_rs[0]; 
		
			if ($status==1) $status=0;else $status=1; 
		
			$sql="UPDATE $table SET warning='{$status}' WHERE id='{$id}'";
			mysql_query($sql) or die(mysql_error());
			echo "images/anhien_{$status}.png";	
		 }
		
	}
 
?>