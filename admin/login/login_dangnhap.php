<?php

$errMsg='';
if (isset($_POST['btn_dangnhap'])==true){
	$username= $_POST['username'];
	$password= md5(md5(md5($_POST['password'])));
	
	if (get_magic_quotes_gpc()== false) 
	 {
		$username=trim(mysql_real_escape_string($username));
		$password=trim(mysql_real_escape_string($password));
	 }

	 $coloi=false;
	 
	 if ($username == NULL) {$coloi=true; $error_username1 = "Bạn chưa nhập tên đăng nhập";}
	 if ($_POST['password'] == NULL) {$coloi=true; $error_password1 = "Bạn chưa nhập password";}
	 if ($_POST['password'] !=NULL){
	 	if (check_table('tbl_users',"password='".$password."'",'id')==true){ $coloi=true; $error_password1 = "Mật khẩu bạn nhập không đúng";} 
	
	} 	 
	 if ($coloi==FALSE) {  
		 $sql = sprintf("SELECT * FROM tbl_users WHERE username='%s'", $username);
		 $user = mysql_query($sql);	
		 $row_user=mysql_fetch_assoc($user);
		 if(mysql_num_rows($user)<=0)$error_username1="Tên đăng nhập của bạn không đúng với bạn đăng ký.";
		 elseif (check_table('tbl_users',"username='".$username."' AND password='".$password."'",'id')==true)
		 	{ $coloi=true; $error_username1 = "Tài khoản và mật khẩu không đúng với bạn đăng ký";}
		 elseif($row_user['idgroup']==1 || $row_user['idgroup']==0)$error_quyen="Bạn không có quyền vào phần quản trị này.";
		 elseif($row_user['status']==0)$error_khoa="Tài khoản của bạn đã bị khóa, vui lòng liên hệ Admin để biết thêm chi tiết.";
			   else { 
					$sql = sprintf("SELECT * FROM tbl_users WHERE username='%s' AND password ='%s'",$username, $password);
					$user = mysql_query($sql);	

					if (mysql_num_rows($user)==1) 
						{	
						  $row_user = mysql_fetch_assoc($user);
						  $_SESSION['kt_login_id'] = $row_user['id'];
						  $_SESSION['kt_login_username'] = $row_user['username'];
						  $_SESSION['kt_login_level'] = $row_user['idgroup'];
						  $arrField = array(
							"last_loged"          => "now()"
						   );
						  update("tbl_users",$arrField,"id='".$row_user['id']."'"); 
							if (isset($_POST['rememberme'])== true)
								{
									setcookie("un", $_POST['username'], time() + 60*60*24*7 );
									setcookie("pw", $_POST['password'], time() + 60*60*24*7 );
								}else{
										setcookie("un", $_POST['username'], time()-1);
										setcookie("pw", $_POST['password'], time()-1);
									 }
							if (strlen($_SESSION['back'])>0)
								{
									$back = $_SESSION['back'];
									unset($_SESSION['back']);
									header("location:$back");
								}else{		
										//header("location:$linkroot/manage.html");
										$_SESSION['kt_login_username'] = $row_user['username'];
									}
						}else{header("location:$linkroot"."");}	
			}//else

	 }//if ($coloi==FALSE)

}// if isset
?>
<style type="text/css">
<!--
.img_cap {
	height: 25px;
}
.dangnhap {
	width:400px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	font-weight: bold;
	color: #006E65;
	float: right;
	padding-left: 20px;
	padding-top: 10px;
	background-color: #EFEFEF;
}
.dangnhap a {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-style: normal;
	font-weight: bold;
	color: #006E65;
	text-decoration: none;
	margin-left: 15px;
}
.text {
	width: 195px;
	height:23px;
	line-height:23px;
	padding-left:5px;
}
.text_qm  {
	width: 139px;
	height:23px;
	line-height:23px;
	padding-left:5px;
}
.dangnhap a:hover {
	text-decoration: underline;
}
.error {
	font-style: italic;
	color: #C00;
	font-weight: normal;
	font-size: 12px;
}
#baoerror {
	font-size: 12px;
	font-style: italic;
	color: #F00;
	clear: both;
	float: none;
	font-weight: normal;
}
.txt_t { width:100px; display:block; float:left; height:26px; line-height:26px;}
.txt_tt { width:200px; display:block; float:left;height:26px;}
#form1 p { clear:both; float:none;}
-->
</style>
<div style="float:left; margin-bottom:4px;">
  <div class="dangnhap" style="width:310px !important;">
	<?php if ($_SESSION['kt_login_username']==true){ ?> 
   	  <center>	
            <p>
            Chào  
			<?php
            if($_SESSION['kt_login_level']==1){echo 'Customer';}
            elseif($_SESSION['kt_login_level']==2){echo 'User';}
            elseif($_SESSION['kt_login_level']==3){echo 'Mod';}
            elseif($_SESSION['kt_login_level']==4){echo 'Admin';}
            ?> ! 
            <span style="text-transform:uppercase; color:#606">
            <?php echo get_field('tbl_users','id',$_SESSION['kt_login_id'],'username') ?>
            </span>
            </p>
          	<p>
            <a title="Đổi mật khẩu" href="admin.php?act=login_doipass">Mật khẩu</a>
            <a title="Đổi thông tin" href="admin.php?act=login_doithongtin">Thông tin</a>
            </p>
            	<p>
            <a title="Thoát đăng nhập" style="color:#F00" href="admin.php?act=logout">Thoát đăng nhập</a>
           </p>
  	   </center>      
<?php }else {?> 
<form id="form1" name="form1" method="post" action="">
            <p>	
                <span class="txt_t">Tên Đăng Nhập </span> 
                <span class="txt_tt"> <input name="username" type="text" class="text" id="username" title="Nhập tên đăng nhập của bạn" value="<?php  echo $_COOKIE['un'];?>"/></span><br /> 
                <span class="coloi_hien"> <?php echo $error_username1;?></span> 
            </p>
            <p>	 
                <span class="txt_t">  Mật Khẩu </span>  
                <span class="txt_tt"> <input name="password" type="password" class="text" id="password" title="Nhập mật khẩu của bạn" value="<?php  echo $_COOKIE['pw'];?>"/></span>
                <br /> <span class="coloi_hien"> <?php echo $error_password1;?></span> 
            </p>
            <!--<p>  
                <span class="txt_t">  Mã bảo mật   </span>
                <span class="txt_tt" style="width:150px !important;"><input name="cap" type="text" class="text_qm" id="cap" title="Nhập mã số bảo mật" value="<?php echo $cap; ?>" />&nbsp; </span>
                <img src="../lib/capcha/dongian.php" align="absmiddle" class="img_cap" />
                <br /> <br /> 
                <span class="coloi_hien"><?php //echo $coloi_hien_cap ?></span>     
            </p>
			-->       
	   <input title="Click để chấp nhận đăng nhập" type="submit" name="btn_dangnhap" class="nut_table" value="Đăng nhập"/>
            &nbsp;&nbsp;
       <input title="Check vào để ghi nhớ mật khẩu" type="checkbox" name="nho" id="nho" />&nbsp;&nbsp;Ghi nhớ<br /> 
</form>

 <?php }?> 
  <div id="baoerror"><?php echo $error_khoa;?></div>
  <div id="baoerror"><?php echo $_SESSION['error']; unset ($_SESSION['error']);?>	</div>  
  <div id="baoerror"><?php echo $error_quyen;?></div>
  </div>
</div>

