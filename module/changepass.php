<?php
         
		$id= $_SESSION['kh_login_id'];	
		settype($id,"int");
		
		if($id=="") header("location: $linkrootbds");
		
		$row_quantri=getRecord('tbl_customer','id='.$id);
		
		
		
		$username = $_SESSION['kh_login_username'];
		if (isset($_POST['btn_doipass'])==true) {
		
		$pass_old1 = $_POST['pass_old1'];
		$pass_new1 = $_POST['pass_new1'];
		$pass_new2 = $_POST['pass_new2'];
		$username = $_SESSION['kh_login_username'];
		$id= $_SESSION['kh_login_id'];
		settype($id, "int");
		
		$pass_old1 = trim(strip_tags($pass_old1));
		$pass_new1 = trim(strip_tags($pass_new1));
		$pass_new2 = trim(strip_tags($pass_new2));
	
		if (get_magic_quotes_gpc()==false) 
				{
					$pass_old1 = mysql_real_escape_string($pass_old1);
					$pass_new1 = mysql_real_escape_string($pass_new1);
					$pass_new2 = mysql_real_escape_string($pass_new2);
				}
		// kiểm tra dữ liệu nhập
		$coloi=false;	
		$passmin=6;
		$md5_pass_old1=md5(md5(md5($pass_old1)));
		$matkhaulay=get_field('tbl_customer','id',$id,'password');
		$md5_matkhaulay=md5(md5(md5($matkhaulay)));
		if ($pass_old1 == NULL){$coloi=true; $error_pass1= 'Bạn chưa nhập mật khẩu củ..!';}
		elseif ($pass_new1 == NULL){$coloi=true; $error_pass2= 'Bạn chưa nhập mật khẩu mới..!'; }
		elseif (strlen($pass_new1)<$passmin ){$coloi=true;$error_pass2= 'Mật khẩu mới phải lớn hơn 2 ký  tự..!'; }
		elseif ($pass_new1!=$pass_new2){$coloi=true; $error_pass= 'Mật khẩu mới bạn nhập 2 lần không giống nhau...!'; }
		elseif ($md5_matkhaulay!=$md5_matkhaulay){$coloi=true; $error_pass= 'Mật khẩu củ bạn nhập không đúng...!';}
		else{ // cập nhật pass
			$sql=sprintf("update tbl_customer set password='%s' 
						where id='%d'", md5(md5(md5($pass_new1))), $id);
			mysql_query($sql) or die(mysql_error());
		/*	 echo "<script language='javascript'>alert('Chúc mừng bạn đã thay đổi mật khẩu thành công..!');</script>";*/
			 
			
			location($linkrootbds);
		}
	}
	if (isset($_POST['quayra'])==true) {

		header("location: $linkrootshop");
	}

?>
<div class="form_dn">
  <script>
$(document).ready(function() {	
	$("#tendk").keyup(function(){  
	   var val=this.value;
	   var strlen=val.length;
	  // if(strlen>=4) $("#error").load("<?php echo $linkrootbds;?>/module/username.php?user="+val); 
	});
	 
	$("form[id=form1]").bind('submit',function(){
		var tendk=$("#tendk").val();
		var password=$("#password").val();  
		var golaimatkhau=$("#golaimatkhau").val(); 
		var hoten=$("#hoten").val();
		var email=$("#email").val();
		var cap=$("#cap").val();
		
		if(tendk=="") {
			alert("Bạn chưa nhập tên đăng ký");
			return false;
		}
		if(password=="") {
			alert("Bạn phải nhập mật khẩu");
			return false;
		}
		if(golaimatkhau!=password) {
			alert("Bạn phải nhập mật khẩu 2 lần giống nhau");
			return false;
		}
		if(golaimatkhau=="") {
			alert("Bạn phải nhập xác nhận mật khẩu");
			return false;
		}
		if(hoten=="") {
			alert("Bạn phải nhập tên");
			return false;
		} 
		if(email=="") {
			alert("Bạn phải nhập email");
			return false;
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
               Thay đổi thông tin tài khoản <span style="color: #40B01A;">BINH DUONG MICRO</span>
            </div><!-- End .t_khung_dn2 -->
            <div class="m_khung_dn2">
             <form id="form1" name="form1" method="post" action="<?php echo $linkrootbds;?>doi-mat-khau.html">
                <ul>
                    <li>
                        <span class="l_k_dn2">
                            Mật khẩu cũ <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2" required   type="text"   name="pass_old1" value="<?php echo $pass_old1; ?>" >
                        </span><!-- End .r_k_dn2 -->
                        <span>
                         <?=$error_pass1?>
                        </span>
                    </li>
                   
                    <li>
                        <span class="l_k_dn2">
                            Mật khẩu mới <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2" required  type="password" name="pass_new1" value="<?php echo $pass_new1; ?>" >
                        </span><!-- End .r_k_dn2 -->
                        <span>
                        <?=$error_pass2?>
                        </span>
                    </li>
                     <li>
                        <span class="l_k_dn2">
                           Nhập lại mật khẩu mới<span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2"  required  type="password" name="pass_new2" value="<?php echo $pass_new2; ?>" >
                        </span><!-- End .r_k_dn2 -->
                        <span>
                        <?php echo $coloi_hien_mobile;?>
                        </span>
                    </li>
                   
                  
                    <li class="mbm2">
                        <span class="l_k_dn2">
                            Mã bảo mật <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2" required  name="cap" value="<?php echo $cap; ?>"   type="text" placeholder="Bạn vui lòng nhập mã bảo mật..!" >
                            <img class="img_cap" align="absmiddle" alt="" src="<?php echo $linkrootbds?>lib/capcha/dongian.php">
                        </span><!-- End .r_k_dn2 -->
                    </li>
                    <li>
                        <span class="l_k_dn2">
                            &nbsp;
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input name="btn_doipass"  class="btn_dn2" type="submit" value="Đăng ký">
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