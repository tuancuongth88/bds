<?php

include('../config.php');
require("../common_start.php");
include("../lib/func.lib.php");


$id = "";
$hoten = "";
$email = "";
$noidung = "";
$ids = "";

$id = isset($_GET['id']) ? $_GET['id'] : '';
$hoten = isset($_GET['name']) ? $_GET['name'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$noidung = isset($_GET['content']) ? $_GET['content'] : '';
$ids = isset($_GET['idshop']) ? $_GET['idshop'] : '';
$ngayhientai = date('Y-m-d h:m:s');

$iduser= $_SESSION['kh_login_id'];

if(isset($_GET['top'])) $top=$_GET['top']; // top: 0 commnet dau
else $top=0;


if($iduser>0){

	if(isset($_GET['id'])) 
	{
		
		if(mysql_query("INSERT INTO `tbl_comment` (`name`, `type` , `cate` , `email`, `date_added`, `content`, `iduser`, `parent`, `top`, `status`) VALUES ('".$hoten."', '1' , '0' , '".$email."', '".$ngayhientai."', '".$noidung."', '".$iduser."' , '".$id."' , '".$top."' , 1)"))
		{
			echo 'Thành công';
		}
		else
			echo "INSERT INTO `tbl_comment` (`name`, `type` , `cate` , `email`, `date_added`, `content`, `iduser`, `parent`, `top`, `status`) VALUES ('".$hoten."', '1' , '0' , '".$email."', '".$ngayhientai."', '".$noidung."', '".$iduser."' , '".$id."' , '".$top."' , 0)";
	}
}
?>