<?php
 
		$id= $_SESSION['kh_login_id'];	
		settype($id,"int");
		
		if($id=="") header("location: $linkrootbds");
		
		$row_quantri=getRecord('tbl_customer','id='.$id);

	if (isset($_POST['btn_dangky'])==true)//isset kiem tra submit
	
		{
			$ten = $_POST['hoten'];
			$mobile  = $_POST['mobile'];
			$email  = $_POST['email'];
			$address  = $_POST['address'];
			$cmnd  = $_POST['cmnd'];
			
	
			$ten = trim(strip_tags($ten));
			$mobile = trim(strip_tags($mobile));
			$emai = trim(strip_tags($emai));
			$diachi = trim(strip_tags($diachi));
			$cmnd = trim(strip_tags($cmnd));
	
			if (get_magic_quotes_gpc()==false) 
	
				{
					$ten = mysql_real_escape_string($ten);
					$mobile = mysql_real_escape_string($mobile);
					$emai = mysql_real_escape_string($emai);
					$diachi  = mysql_real_escape_string($diachi);
					$cmnd  = mysql_real_escape_string($cmnd);
				}
	
			$coloi=false;	
			if ($ten == NULL){$coloi=true; $coloi_hien_ten = "Bạn chưa nhập họ tên";}
			if ($mobile == NULL){$coloi=true; $coloi_hien_mobile = "Bạn chưa nhập số điện thoại";}
			if ($email == NULL){$coloi=true; $coloi_hien_email = "Bạn chưa nhập địa chỉ mail";}
			if ($address == NULL){$coloi=true; $coloi_hien_diachi = "Bạn chưa nhập địa chỉ";} 

			if($email!=NULL){
				if (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE){$coloi=true;echo  $coloi_hien_email= "Bạn nhập email không đúng kiểu ( email@yahoo.com )";	
				}
			}
			
			if($email!=NULL){
				if (check_table('tbl_customer','email='."'".$email."' AND id!=".$id,'id')==false) {$coloi=true;echo  $coloi_hien_email = "Địa chỉ mail này đã có người dùng";}
			}
			if($mobile!=NULL){
				if (check_table('tbl_customer','mobile='."'".$mobile."' AND id!=".$id,'id')==false) {$coloi=true; echo $coloi_hien_mobile = "Điện thoại này đã có người dùng";}
			}

			
			if($coloi==FALSE)
			{	 
				$up="name='".$ten."',mobile='".$mobile."',email='".$email."',address='".$address."',cmnd='".$cmnd."'";
				update_table('tbl_customer',$id,$up,$hinh,' ');
				/*echo "<script language='javascript'>alert('Chúc mừng bạn đã thay đổi thông tin tài khoản thành công..!');</script>";*/
	 
				
				location($linkrootbds."quan-ly-tin-dang.html");
				//header("location: admin.php");
			}
		}
	if (isset($_POST['quayra'])==true) {
		header("location: $linkrootshop");
	}
 
	
	$name=$row_quantri['name'];
	$mobile=$row_quantri['mobile'];
	$address=$row_quantri['address'];
	$email=$row_quantri['email'];
 	$cmnd=$row_quantri['cmnd'];
	$username=$row_quantri['username'];
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
               Thay đổi thông tin tài khoản <span style="color: #40B01A;">GIA THỊNH HƯNG</span>
            </div><!-- End .t_khung_dn2 -->
            <div class="m_khung_dn2">
             <form id="form1" name="form1" method="post" action="<?php echo $linkrootbds;?>sua-thong-tin.html">
                <ul>
                    <li>
                        <span class="l_k_dn2">
                            Tên đăng nhập <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2" required   type="text" id="tendk" name="tendk" value="<?php echo $username; ?>"  disabled="disabled" >
                        </span><!-- End .r_k_dn2 -->
                    </li>
                   
                    <li>
                        <span class="l_k_dn2">
                            Họ tên <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2" required type="text" name="hoten"  value="<?php echo $name; ?>" placeholder="Bạn vui lòng nhập họ & tên..!" >
                        </span><!-- End .r_k_dn2 -->
                    </li>
                     <li>
                        <span class="l_k_dn2">
                            Điện thoại <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2"  required   type="text" name="mobile"  value="<?php echo $mobile; ?>" placeholder="Bạn vui lòng nhập số điện thoại..!" >
                        </span><!-- End .r_k_dn2 -->
                        <span>
                        <?php echo $coloi_hien_mobile;?>
                        </span>
                    </li>
                    <li>
                        <span class="l_k_dn2">
                            Địa chỉ <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2"  required   type="text" name="address"  value="<?php echo $address; ?>" placeholder="Bạn vui lòng nhập số diachi..!" >
                        </span><!-- End .r_k_dn2 -->
                    </li>
                    <li>
                        <span class="l_k_dn2">
                            Email <span class="color_btd">*</span>
                        </span><!-- End .l_k_dn2 -->
                        <span class="r_k_dn2">
                            <input class="box-sizing-fix ipt_dn2"  required   type="text" name="email"  value="<?php echo $email; ?>" placeholder="Bạn vui lòng nhập email..!" >
                        </span><!-- End .r_k_dn2 -->
                        <span>
                        	<?=$coloi_hien_email;?>
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