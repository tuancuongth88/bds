<?php

include('../config.php');
require("../common_start.php");
include("../lib/func.lib.php");

  

$user = isset($_GET['user']) ? $_GET['user'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';

if($user!=""){
	$kiemtra=get_field('tbl_users','username',$user,'id');
	
	if($kiemtra>0) echo "Tên đăng nhập này đã có người dùng vui lòng chọn tên khác";
}

if($email!=""){
	$kiemtram=get_field('tbl_users','email',$email,'id');
	
	if($kiemtram>0) echo "Tài khoản email này đã có người dùng vui lòng chọn tên khác";
}

?>