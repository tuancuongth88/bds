 <?php

	include "mail_gmail/class.phpmailer.php"; 
	include "mail_gmail/class.smtp.php"; 
	
	if (isset($_POST['btn_doipass'])==true) {
		
		$email = $_POST['email'];

		$email = trim(strip_tags($email));

	
		if (get_magic_quotes_gpc()==false) 
				{
					$email = mysql_real_escape_string($email);
				}
		// kiểm tra dữ liệu nhập
		$coloi=false;	
		
		$rowtin=getRecord("tbl_customer", "email='".$email."'");
		$rowshopt=getRecord("tbl_shop", "id='".$idshop."'");
		
		
		if ($rowtin['id'] == ""){
				$coloi=true;
			    echo "<script language='javascript'>alert('Email này sai hoặc chưa tồn tại trong hệ thống, vui lòng kiểm tra lại..!');</script>";
			}
		else{ // cập nhật pass
			
			if($rowshopt['iduser']!=$rowtin['id']){
				echo "<script language='javascript'>alert('Email này không phải cửa bạn hoặc chưa tồn tại trong hệ thống, vui lòng kiểm tra lại..!');</script>"; 
			}else{
			
				$rowmail=getRecord("tbl_config", "id=1");
				
				$noidung_Body_full=$noidung_AltBody
				.'<strong>website : </strong>'.$row_shop['name'].'<br />'
				.'<strong>Từ : </strong>'.$host_link_full.'<br />';
			
				$ng_ten=$row_shop['name'];;
				$ng_email=$rowmail['cauhinh_mail_ten'];
				$ch_email=$rowmail['cauhinh_mail_ten'];
				$ch_pass =$rowmail['cauhinh_mail_mk'];
			
				$nn_ten="Thành viên";
				$nn_email=$email;
				
				$tieude="Phục hồi mật khẩu - vui lòng không trả lời vào mail này";
				$noidung=$noidung_AltBody;
				
				
				
				/*********************************/
				
				if($email!=""){	
					$randomkey=chuoingaunhien(50);;
					$arrField = array(
						"idshop"              => "'".$idshop."'",
						"email"               => "'".$email."'",
						"dateadd"             => "'".$ngay."'",
						"randomkey"           => "'".$randomkey."'"
					); 
					insert("tbl_pass_randomkey",$arrField);
				
			
					$noidung_AltBody.="
					Có người vừa yêu cầu phục hồi mật khẩu, nếu không phải là bạn vui lòng quả qua và nếu đúng vui lòng làm theo hướng dẫn để phục hồi 
					<br> Nhấp vào link này để tiến hành xác nhận phục hồi mật khẩu <a href='".$host_link_full."/quantri/index.php?act=getpass&randomkey=".$randomkey."'> click here </a>";
					$noidung=$noidung_AltBody;
					
					$kq=@guimail($ng_ten,$ng_email,$ch_email,$ch_pass,$nn_ten,$nn_email,$tieude,$noidung);
				
				}
					
				echo "<script language='javascript'>alert('Bạn vừa yêu cầu khẩu thành công, xin vui lòng kiểm tra mail để phục hồi lại mật khẩu..!');</script>";
				echo '<script type="text/javascript"> window.location = ""; </script>';
			
			}
		}
	}
	if (isset($_POST['quayra'])==true) {
	
		echo '<script type="text/javascript"> window.location = ""; </script>';
	}

?>
 
   <script type="text/javascript">  
 
	$(document).ready(function() {				

		$("form[name=form1]").bind('submit',function(){
 
 
			var email=$("#email").val(); 
			
			if(email=="") {
				alert("Bạn chưa nhập email vào");
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
            	<form id="form1" name="form1" method="post" action="<?=$linkrootbds;?>quen-mat-khau.html">
                        <ul>
                            <li>
                                <span class="l_k_dn2">
                                    Email <span class="color_btd">*</span>
                                </span><!-- End .l_k_dn2 -->
                                <span class="r_k_dn2">
                                    <input placeholder="Bạn phải nhập email vào" required="required" name="email" class="box-sizing-fix ipt_dn2" type="text">
                                </span><!-- End .r_k_dn2 -->
                            </li>
                            <li class="mbm2">
                                <span class="l_k_dn2">
                                    Mã bảo mật <span class="color_btd">*</span>
                                </span><!-- End .l_k_dn2 -->
                                <span class="r_k_dn2">
                                    <input class="box-sizing-fix ipt_dn2" type="text">
                                    <img class="img_cap" align="absmiddle" alt="" src="<?php echo $linkrootbds?>lib/capcha/dongian.php">
                                </span><!-- End .r_k_dn2 -->
                            </li>
                            <li>
                                <span class="l_k_dn2">
                                    &nbsp;
                                </span><!-- End .l_k_dn2 -->
                                <span class="r_k_dn2">
                                    <input name="btn_doipass" class="btn_dn2" type="submit" value="Gửi thông tin">
                                </span><!-- End .r_k_dn2 -->
                            </li>
                        </ul>
                <span class="erros_fu_dndk" <?php if($error_login==""){?> style="display: none;" <?php }?> > <?php echo $error_login;?> <?php echo $error_username_in;?> <?php echo $error_password_in;?><?php echo $coloi_hien_cap;?></span>
                </form>
            </div><!-- End .m_khung_dn2 -->
        
        </div><!-- End .f_khung_dn2 -->
        
        
    </article><!-- End .content -->
    
    <?php  include("module/slidebar_login.php"); ?>
    <!-- End .sidebar -->
    
    <div class="clear"> </div>