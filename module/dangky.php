<?php  
$password="";
$ghinho_dangky=0;
if (isset($_POST['btn_dangky'])==true)//isset kiem tra submit
	{
		
		
		$tendk = $_POST['tendk'];
		$matkhau = $_POST['password'];
		$golaimatkhau = $_POST['repassword'];
		$hoten = $_POST['hoten'];
		$email = $_POST['email'];
		$cmnd = $_POST['cmnd'];
		$dienthoai = $_POST['dienthoai'];
		//$cap = $_POST['cap'];
		
		
		$tendk = trim(strip_tags($tendk));
		$matkhau = trim(strip_tags($matkhau));
		$golaimatkhau = trim(strip_tags($golaimatkhau));
		$hoten = trim(strip_tags($hoten));
		$email = trim(strip_tags($email));
		$cmnd = trim(strip_tags($cmnd));
		$dienthoai = trim(strip_tags($dienthoai));

		
		if (get_magic_quotes_gpc()==false) 
			{
				$tendk = mysql_real_escape_string($tendk);
				$matkhau = mysql_real_escape_string($matkhau);
				$golaimatkhau = mysql_real_escape_string($golaimatkhau);
				$hoten = mysql_real_escape_string($hoten);
				$email = mysql_real_escape_string($email);
				$cmnd = mysql_real_escape_string($cmnd);
				$dienthoai = mysql_real_escape_string($dienthoai);
			}
		
		$coloi=false;		
		if ($tendk == NULL){$coloi=true; $coloi_hien_tendk = "Bạn chưa nhập tên đăng nhập (>=4 ký tự)";} 
		if ($cmnd == NULL){$coloi=true; $coloi_hien_cmnd = "Bạn chưa nhập cmnd(=9 ký tự)";} 
		if ($matkhau == NULL){$coloi=true; $coloi_hien_matkhau = "Bạn chưa nhập mật khẩu (>=6 ký tự)";}
		if ($golaimatkhau == NULL){$coloi=true; $coloi_hien_golaimatkhau = "Bạn chưa nhập lại mật khẩu";}
		if ($hoten == NULL){$coloi=true; $coloi_hien_hoten = "Bạn chưa nhập họ tên";}
		if ($email == NULL){$coloi=true; $coloi_hien_email= "Bạn chưa nhập email";}
/*		if ($dienthoai == NULL){$coloi=true; $coloi_hien_dienthoai= "<br />Bạn chưa nhập số điện thoại";}*/
		//if ($cap == NULL){$coloi=true; $coloi_hien_cap= "Bạn chưa nhập ký tự giống trong hình ";} 

		
		if($tendk!=NULL){
			if (strlen($tendk)<4){$coloi=true; $coloi_hien_tendk = "Tên đăng nhập (>=4 ký tự)";}
		}

/*		if($dienthoai!=NULL){
			if (!is_numeric($dienthoai)){$coloi=true; $coloi_hien_dienthoai = "Số điện thoại phải là số";}
		}*/
		
		if($matkhau!=NULL){
			if (strlen($matkhau)<6 ){$coloi=true; $coloi_hien_matkhau = "Mật khẩu (>=6 ký tự)";}
		}
		if($golaimatkhau!=NULL){	
			if ($matkhau != $golaimatkhau ){$coloi=true; $coloi_hien_golaimatkhau = "Mật khẩu lần 2 không giống lần 1";} 
		}
		
 		if($email!=NULL){
			if (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE){$coloi=true; $coloi_hien_email= "Bạn nhập email không đúng kiểu ( email@yahoo.com )";	
			}
		} 
		
		if($tendk!=NULL){	
			if (check_table('tbl_users','username='."'".$tendk."'",'id')==false) {$coloi=true; $coloi_hien_tendk = "Tên đăng nhập này đã có người dùng";}
  
		}
		
	
		
		if($email!=NULL){
			if (check_table('tbl_users','email='."'".$email."'",'id')==false) {$coloi=true; $coloi_hien_email = "Địa chỉ mail này đã có người dùng";}  
		}
		
 

		if ($loi!="") {$coloi=true; $error_hien_filechon = $loi;}

		if ($coloi==FALSE) 
		{  
			
			$password=md5(md5(md5($matkhau)));
			$randomkey=chuoingaunhien(50);
			$khoa=1;
			$kichhoatx=1;
			$vale1='username,password,name,cmnd,mobile,email,date_added,last_modified,active,idgroup,status,randomkey';
			$vale2="'".$tendk."','".$password."','".$hoten."','".$dienthoai."','".$email."','".$cmnd."','".$ngay."','"
			.$ngay."','".$kichhoatx."',1,'".$khoa."','".$randomkey."'";
			 insert_table('tbl_users',$vale1,$vale2,$hinh);
			
			 $ghinho_dangky=1;
			
			$_SESSION['register_re']="1";

			//header("location: ".$linkrootbds."dang-nhap.html");
			/*echo thongbao($linkrootbds."dang-nhap.html",$thongbao='Chúc mừng bạn đã đăng ký tài khoản thành công..! Vui lòng kích hoạt tài khoản trực tiếp trên trang web trước khi đăng nhập..!')	;*/
			
		}
}

	$username = $_SESSION['kh_login_username'];
	if (isset($_POST['quayra'])==true) {

		header("location: $linkrootbds");
	}

?>
<div class="form_dn">
  <script>
$(document).ready(function() {	
	$("#tendk").keyup(function(){  
	   var val=this.value;
	   var strlen=val.length;
	   if(strlen>=4) $("#error_user").load("<?php echo $linkrootbds;?>module/username.php?user="+val); 
	});
	
	$("#email").keyup(function(){  
	   var val=this.value;
	   var strlen=val.length;
	   if(strlen>=4) $("#error_email").load("<?php echo $linkrootbds;?>module/username.php?email="+val); 
	});
	 
	$("form[id=form1]").bind('submit',function(){
		var tendk=$("#tendk").val();
		var cmnd=$("#cmnd").val();
		var user_s=tendk.length;
		var password=$("#password").val();  
		var repassword=$("#repassword").val(); 
		var hoten=$("#hoten").val();
		var email=$("#email").val();
		var cap=$("#cap").val();
		
		if(tendk=="") {
			alert("Bạn chưa nhập tên đăng ký");
			return false;
		}
		if(cmnd=="") {
			alert("Bạn chưa nhập cmnd đăng ký");
			return false;
		}
		if(user_s <6 ){
			alert("Tên đăng ký phải nhiều hơn 6 ký tự");
			return false;
		}
		if(password=="") {
			alert("Bạn phải nhập mật khẩu");
			return false;
		}
		if(repassword=="") {
			alert("Bạn phải nhập xác nhận mật khẩu");
			return false;
		}
		if(repassword.length < 6 ) {
			alert("Mật khẩu phải có ít nhất là 6 ký tự");
			return false;
		}
		if(repassword!=password) {
			alert("Bạn phải nhập mật khẩu 2 lần giống nhau");
			return false;
		}
		
		if(hoten=="") {
			alert("Bạn phải nhập tên");
			return false;
		} 
		
		if(email==""){
			alert("Bạn phải nhập email");
			return false;
		}else{ 
			var reg = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
			
			if (reg.test(email) == false) {
			   	alert("Địa chỉ email phải đúng định dạng, vd: abc@yahoo.com");
				return false;
			}  
		}
		
		if(cap=="") {
			alert("Bạn chưa nhập mã bảo mật");
			return false;
		}
	})
	
});
	
	

</script>        

    <article class="content">
        <?php if($ghinho_dangky==1){?>
        <div class="f_khung_dn2">
        	<link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>templates/jquery-ui.css">
        	<div id="dialog" style="display:none;">	  
            </div>
            <script type="text/javascript">
            $(document).ready(function (){
                $('#dialog').html(' <br><br>Bạn vừa đăng ký tài khoản thành công!<br>  ');
                
                $('#dialog').dialog({
                    autoOpen: true,
                    show: "blind",
                    hide: "explode",
                    modal: true,
                    open: function(event, ui) {
                        setTimeout(function(){
                            $('#dialog').dialog('close');                
                        }, 1500);
                    },
                    close: function(event, ui) { window.location.href = "<?php echo $linkrootbds?>dang-nhap.html"; }
                });
            });
            </script>
       	</div>
        <?php }else{?>
        
        <div class="f_khung_dn2">
        
            <div class="t_khung_dn2">
                Chào mừng bạn đến với trang đăng ký tài khoản <span style="color: #40B01A;">Đất Đại Việt</span>
            </div><!-- End .t_khung_dn2 -->
            <div class="m_khung_dn2">
             <form id="form1" name="form1" method="post" action="<?php echo $linkrootbds;?>dang-ky.html">
                <ul>
                    <li>
                        <span class="l_k_dn2">
                            Tên đăng nhập <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2" required   type="text" id="tendk" name="tendk" value="<?php echo $tendk; ?>" placeholder="Bạn vui lòng nhập tên đăng nhập..!" style="text-transform:lowercase;" >
                        </span><!-- End .r_k_dn2 -->
                        <span class="erros_fu_dndk" id="error_user" style=" margin-top:0px !important;">
                        </span>
                        <?php if($coloi_hien_tendk!=""){?> 
                         <span class="l_k_dn2">
                         	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         </span>
                        <span class="bl_dt">  <?=$coloi_hien_tendk?></span>
                        <?php }?> 
                    </li>
                    <li>
                        <span class="l_k_dn2">
                            Mật khẩu <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2" required   type="password" id="password" name="password" value="<?php echo $password; ?>" placeholder="Bạn vui lòng nhập mật khẩu đăng nhập..!" >
                        </span><!-- End .r_k_dn2 -->
                        <?php if($coloi_hien_matkhau!=""){?> 
                         <span class="l_k_dn2">
                         	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         </span>
                        <span class="bl_dt">  <?=$coloi_hien_matkhau?></span>
                        <?php }?> 
                    </li>
                    <li>
                        <span class="l_k_dn2">
                            Nhập lại mật khẩu <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2" required   type="password" id="repassword" name="repassword" value="<?php echo $golaimatkhau; ?>" placeholder="Bạn vui lòng nhập lại mật khẩu..!" >
                        </span><!-- End .r_k_dn2 -->
                        <?php if($coloi_hien_golaimatkhau!=""){?> 
                         <span class="l_k_dn2">
                         	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         </span>
                        <span class="bl_dt">  <?=$coloi_hien_golaimatkhau?></span>
                        <?php }?> 
                    </li>
                    <li>
                        <span class="l_k_dn2">
                            Họ tên <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2" required type="text" id="hoten" name="hoten"  value="<?php echo $hoten; ?>" placeholder="Bạn vui lòng nhập họ & tên..!" >
                        </span><!-- End .r_k_dn2 -->
                    </li>
                    <li>
                        <span class="l_k_dn2">
                            Email <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2"  required   type="text" id="email" name="email"  value="<?php echo $email; ?>" placeholder="Bạn vui lòng nhập email..!" >
                        </span><!-- End .r_k_dn2 -->
                        <?php if($coloi_hien_email!=""){?> 
                         <span class="erros_fu_dndk" id="error_email"><?=$coloi_hien_email?></span>
                         <? }?>
                    </li>
					 <li>
                        <span class="l_k_dn2">
                            CMND <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2"  required   type="text" id="cmnd" name="cmnd"  value="<?php echo $cmnd; ?>" placeholder="Bạn vui lòng nhập cmnd..!" >
                        </span><!-- End .r_k_dn2 -->
                        <?php if($coloi_hien_cmnd!=""){?> 
                         <span class="erros_fu_dndk" id="cmnd"><?=$cmnd?></span>
                         <? }?>
                    </li>
					<?php /*
                    <li class="mbm2">
                        <span class="l_k_dn2">
                            Mã bảo mật <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2" required id="cap"  name="cap" value="<?php echo $cap; ?>"   type="text" placeholder="Bạn vui lòng nhập mã bảo mật..!" >
                            <img class="img_cap" align="absmiddle" alt="" src="<?php echo $linkrootbds?>lib/capcha/dongian.php">
                        </span><!-- End .r_k_dn2 -->
                        <?php if($coloi_hien_cap!=""){?> 
                         <span class="erros_fu_dndk" id="error_email"><?=$coloi_hien_cap?></span>
                         <? }?>
                    </li>
					*/ ?>
                    <li>
                        <span class="l_k_dn2">
                            &nbsp;
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input name="btn_dangky" class="btn_dn2" type="submit" value="Đăng ký">
                        </span><!-- End .r_k_dn2 -->
                    </li>
                </ul>
                <span class="erros_fu_dndk" <?php if($coloi!=true){?> style="display: none;" <?php }?>> <?=$coloi_hien_tendk.$coloi_hien_matkhau.$coloi_hien_golaimatkhau.$coloi_hien_hoten.$coloi_hien_email.$coloi_hien_cap;?></span>
             </form>
            </div><!-- End .m_khung_dn2 -->
        
        </div><!-- End .f_khung_dn2 -->
        
        <?php }?>
        
    </article><!-- End .content -->
    
    <?php  include("module/slidebar_login.php"); ?>
    <!-- End .sidebar -->
    
    <div class="clear"> </div>