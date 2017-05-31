<?php  
 
if (isset($_POST['btn_dangnhap_in'])==true){
	$username= $_POST['username'];
	$password= md5(md5(md5($_POST['password'])));// md5()
	//$cap 				= $_POST['cap'];
	
	if (get_magic_quotes_gpc()== false) 
	 {
		$username=trim(mysql_real_escape_string($username));
		$password=trim(mysql_real_escape_string($password));
	 }
	$coloi=false;
	if ($username == NULL) {$coloi=true; $error_username_in = "Bạn chưa nhập tên đăng nhập";}
	elseif ($_POST['password'] == NULL) {$coloi=true; $error_password_in = "Bạn chưa nhập password";}
	/*
	if($cap==NULL){$coloi=true; $error_cap = "Bạn chưa nhập mã bảo mật";}
	if ($cap!=NULL){
		if ($_SESSION['captcha_code'] != $cap) {$coloi=true; $error_cap="<i>Bạn nhập sai mã số trong hình rồi</i>";}
	}	
	 */
	 if ($coloi==FALSE) {
		 
		 $sql = sprintf("SELECT * FROM tbl_users WHERE username='%s'", $username);
		 $user = mysql_query($sql);	
		 $row_user=mysql_fetch_assoc($user);
		 if (check_table('tbl_users',"username='".$username."' AND password='".$password."'",'id')==true)
			{ $coloi=true;  $error_username_in="Tài khoản hoặc mật khẩu không đúng, vui lòng đăng nhập lại";}
		 elseif($row_user['active']==0)
		 	{ $error_username_in="Bạn chưa kích hoạt tài khoản, vui lòng kích hoạt mới đăng nhập tiếp";}
		 elseif($row_user['status']==0)
		 	{ location($linkrootbds.'dang-nhap.html');$error_username_in="Tài khoản của bạn đã bị khóa, vui lòng liên hệ Admin để biết thêm chi tiếp";}
		 
			   else {	//check neu dung chay
					$sql = sprintf("SELECT * FROM tbl_users WHERE username='%s' AND password ='%s'",$username, $password);
					$user = mysql_query($sql);	
					if (mysql_num_rows($user)==1) {//Thành công	
						$row_user = mysql_fetch_assoc($user);
						$_SESSION['kh_login_id'] = $row_user['id'];
						$_SESSION['kh_login_username'] = $row_user['username'];
						$arrField = array(
							"last_loged"          => "now()"
						);
						update("tbl_users",$arrField,"id='".$row_user['id']."'"); 
				  
					//luu usernam va pass words
						if (isset($_POST['nho'])== true){
							setcookie("un", $_POST['username'], time() + 60*60*24*7 );
							setcookie("pw", $_POST['password'], time() + 60*60*24*7 );
						} else 
						{
							setcookie("un", $_POST['username'], time()-1);
							setcookie("pw", $_POST['password'], time()-1);
						}
						
						 
						if($_SESSION['back_add']!="") 	echo '<script>window.location="'.$_SESSION['back_add'].''.'"</script>';
						else 	echo '<script>window.location="'.$linkrootbds.''.'"</script>';
						
				
					}else{ //Thất bại
						header("location: $linkrootbds");
				  	}	
			}//else
	 }//if ($coloi==FALSE)
}// if isset
	if (isset($_POST['quayra'])==true) {

		header("location: $linkrootbds");
	}
?>
 
   <script type="text/javascript">  
 
	$(document).ready(function() {				

		$("form[name=form1]").bind('submit',function(){
 
 
			var username=$("#username").val();
			var password=$("#password").val(); 
			var cap=$("#cap").val();
			if(username=="") {
				alert("Bạn chưa nhập tài khoản");
				return false;
			}
			if(password=="") {
				alert("Bạn chưa nhập mật khẩu");
				return false;
			} 
			
			if(cap=="") {
				alert("Bạn chưa nhập mã bảo mật");
				return false;
			} 
			 
			 
		    
		});
		
		 
		 
	});				
</script>          

    <article class="content">
        
        
        <div class="f_khung_dn2">
        
            <div class="t_khung_dn2">
                Chào mừng bạn đến với <span style="color: #40B01A;">Đất Đại Việt</span>
            </div><!-- End .t_khung_dn2 -->
            <div class="m_khung_dn2">
            	<form id="form1" name="form1" method="post" action="<?=$linkrootbds;?>dang-nhap.html">
                <ul>
                    <li>
                        <span class="l_k_dn2">
                            Tên đăng nhập <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2"> 
                            <input class="box-sizing-fix ipt_dn2" type="text" id="username" name="username" value="<?php  echo $_COOKIE['un'];?>" required="required" placeholder="Bạn vui lòng nhập tên đăng nhập..!"/>
                        </span><!-- End .r_k_dn2 -->
                        <?php if($error_username_in!=""){?> 
                         <span class="l_k_dn2">
                         	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         </span>
                        <span class="bl_dt">  <?=$error_username_in?></span>
                        <?php }?> 
                    </li>
                    <li>
                        <span class="l_k_dn2">
                            Mật khẩu <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2"> 
                             <input class="box-sizing-fix ipt_dn2" type="password" id="password" name="password" value="<?php  echo $_COOKIE['pw'];?>" placeholder="Bạn vui lòng nhập mật khẩu đăng nhập..!" required="required" />
                        </span><!-- End .r_k_dn2 --> 
                        <?php if($error_password_in!=""){?> 
                         <span class="l_k_dn2">
                         	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         </span>
                        <span class="bl_dt">  <?=$error_password_in?></span>
                        <?php }?> 
                    </li>
					<?php /*
                    <li class="mbm2">
                        <span class="l_k_dn2">
                            Mã bảo mật <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input id="cap" name="cap" class="box-sizing-fix ipt_dn2" type="text" placeholder="Bạn vui lòng nhập mã bảo mật..!" required="required">
                            <img class="img_cap" align="absmiddle" alt="" src="<?php echo $linkrootbds?>lib/capcha/dongian.php">
                        </span><!-- End .r_k_dn2 -->
                        <?php if($error_cap!="" || $error_login!=""){?> 
                         <span class="l_k_dn2">
                         	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         </span>
                        <span class="bl_dt">  <?=$error_cap?>  <?=$error_login?></span>
                        <?php }?> 
                    </li>
					*/ ?>
                    <li>
                        <span class="l_k_dn2">
                            &nbsp;
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input name="btn_dangnhap_in" class="btn_dn2" type="submit" value="Đăng nhập">
                        </span><!-- End .r_k_dn2 -->
                    </li>
                </ul>
                <!--<span class="erros_fu_dndk" <?php if($coloi==false){?> style="display: none;" <?php }?> > <?php echo $error_login;?> <?php echo $error_username_in;?> <?php echo $error_password_in;?><?=$error_cap?></span>-->
                </form>
            </div><!-- End .m_khung_dn2 -->
        
        </div><!-- End .f_khung_dn2 -->
        
        
    </article><!-- End .content -->
    
    <?php  include("module/slidebar_login.php"); ?>
    <!-- End .sidebar -->
    
    <div class="clear"> </div>