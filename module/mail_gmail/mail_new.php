<?php 
	include "class.phpmailer.php"; 
	include "class.smtp.php"; 
	
	//function ten($table,$where,$name) {  if($where!=' '){$where="WHERE $where";}else $where=' ';  $sql = "SELECT * FROM $table $where"; $gt = mysql_query($sql) or die (mysql_error()); $row=mysql_fetch_assoc($gt); $kq=$row["$name"]; return $kq; }
	
	
	$guimail=get_records('tbl_config','id=1',' ',' ',' ');
	$row_guimail=mysql_fetch_assoc($guimail);
	
	
	$noidung_AltBody='
	Chào bạn! <br>
	Email này là do khách hàng của bạn gửi liên hệ thông qua website <a href="http://'.$domain.'"> http://'.$domain.'</a>  <br />';

?>
 <?php 
if (isset($_POST['them'])==true)//isset kiem tra submit
	{
			
		$tennguoigui_name 	= $_POST['tennguoigui_name'];
		$nguoigui_from 		= $_POST['nguoigui_from'];
		$tieude_Subject 	= $_POST['tieude_Subject'];
		$noidung_Body 		= $_POST['noidung_Body'];
		$dienthoai 			= $_POST['dienthoai'];
		$cap 				= $_POST['cap'];

		$tennguoigui_name 	= trim(strip_tags($tennguoigui_name));
		$nguoigui_from 		= trim(strip_tags($nguoigui_from));
		$tieude_Subject 	= trim(strip_tags($tieude_Subject));
		$noidung_Body 		= trim(strip_tags($noidung_Body));
		$dienthoai 			= trim(strip_tags($dienthoai));
		
		if (get_magic_quotes_gpc()==false) 
			{
				$tennguoigui_name 	= mysql_real_escape_string($tennguoigui_name);
				$nguoigui_from 		= mysql_real_escape_string($nguoigui_from);
				$tieude_Subject 	= mysql_real_escape_string($tieude_Subject);
				$noidung_Body 		= mysql_real_escape_string($noidung_Body);
				$dienthoai 			= mysql_real_escape_string($dienthoai);
			}
		
		$coloi=false;	
		if ($tennguoigui_name == NULL){$coloi=true; $coloi_hien_tennguoigui_name = "<br />Bạn chưa nhập tên của bạn";}
		if ($nguoigui_from == NULL){$coloi=true; $coloi_hien_nguoigui_from = "<br />Bạn chưa nhập địa chỉ email của bạn";}
		if ($tieude_Subject == NULL){$coloi=true; $coloi_hien_tieude_Subject = "<br />Bạn chưa nhập tiêu đề thư";}
		if ($dienthoai == NULL){$coloi=true; $coloi_hien_dienthoai= "<br />Bạn chưa nhập số điện thoại";}
		if ($noidung_Body == NULL){$coloi=true; $coloi_hien_noidung_Body = "<br />Bạn chưa nhập nội dung";}
		/*if ($cap == NULL){$coloi=true; $coloi_hien_cap= "<br />Bạn chưa nhập ký tự giống trong hình ";}*/
		
		if($tennguoigui_name!=NULL){
			if (strlen($tennguoigui_name)<3 ){$coloi=true; $coloi_hien_tennguoigui_name = "<br />Tên phải nhiều hơn 3 ký tự";}
		}
		
		if($tennguoigui_name!=NULL){
			if (strlen($tennguoigui_name)>50 ){$coloi=true; $coloi_hien_tennguoigui_name = "<br />Tên phải ít hơn 50 ký tự";}
		}
		
		if($dienthoai!=NULL){
			if (strlen($dienthoai)<5 ){$coloi=true; $coloi_hien_dienthoai = "<br />Điện thoại phải nhiều hơn 5 ký tự";}
		}
		
		if($dienthoai!=NULL){
			if (strlen($dienthoai)>20 ){$coloi=true; $coloi_hien_dienthoai = "<br />Điện thoại phải ít hơn 20 ký tự";}
		}
		
		if($tieude_Subject!=NULL){
			if (strlen($tieude_Subject)<5 ){$coloi=true; $coloi_hien_tieude_Subject= "<br />Tiêu đề thư phải nhiều hơn 5 ký tự";}
		}
		
		if($tieude_Subject!=NULL){
			if (strlen($tieude_Subject)>200 ){$coloi=true; $coloi_hien_tieude_Subject= "<br />Tiêu đề thư phải ít hơn 200 ký tự";}
		}
		
		if($noidung_Body!=NULL){
			if (strlen($noidung_Body)<5 ){$coloi=true; $coloi_hien_noidung_Body= "<br />Nội dung thư phải nhiều hơn 5 ký tự";}
		}
		
		if($noidung_Body!=NULL){
			if (strlen($noidung_Body)>1000 ){$coloi=true; $coloi_hien_noidung_Body= "<br />Nội dung thư  phải ít hơn 1000 ký tự";}
		}		
		
		if($nguoigui_from!=NULL){
			if (filter_var($nguoigui_from,FILTER_VALIDATE_EMAIL)==FALSE){$coloi=true; $coloi_hien_nguoigui_from= "<br />Bạn nhập email không đúng kiểu ( ten@yahoo.com )";	
			}
		}
		
	/*	if ($cap!=NULL){
		if ($_SESSION['captcha_code'] != $cap) {$coloi=true; $coloi_hien_cap="<i>Bạn nhập sai mã số trong hình rồi</i>";}
		}*/		
		
		if($coloi==FALSE)
		{
			
			$noidung_Body_full=$noidung_AltBody
			.'<strong>Thông tin khách hàng như sau:  </strong> <br />'
			.'<strong>Người gửi : </strong>'.$tennguoigui_name.'<br />'
			.'<strong>Email : </strong>'.$nguoigui_from.'<br />'
			.'<strong>Điện thoại : </strong>'.$dienthoai.'<br /><br />'
			.'<strong>Tiêu đề : </strong> <br>  '.$tieude_Subject.'<br />'
			.'<strong>Nội dung : </strong> <br>  '.$noidung_Body.'<br />'
			.'<br> <br><hr>
			JBS.vn bạn thực hiện giao dịch thành công, chúc công việc kinh doanh của bạn ngày càng thuận lợi." vào trong Email. <br>';
		
			
			$ng_ten=$tennguoigui_name;
			$ng_email=$nguoigui_from;
			
			$ch_email="guimaik@jbs.vn";
			$ch_pass="F-^)HUD,}XUy";
			
			$nn_ten=$row_mail['tengh'];
			$nn_email="sale06.leminhvina@yahoo.com";
			
			$noidung=$noidung_Body_full;			
						
			$tieude=$tieude_Subject;

			$kq=@guimail($ng_ten,$ng_email,$ch_email,$ch_pass,$nn_ten,$nn_email,$tieude,$noidung);
		
			if($kq==0)
				{
					$coloi_hien_tonquat="<h1>Gửi mail không thành công..!: " . $mail->ErrorInfo;
				}
				else
					{
						location($linkroot);
					};
				
		 	}
	}
?>
<?php
	if (isset($_POST['quayra'])==true) {
		header("location: index.php");
	}
?>
 <style>
 .main_fct li {margin-top: 10px;}
.fct_1 {float: left; width: 25%; line-height: 32px; font-weight: normal;}
.fct_2 {float: right; width: 75%;}
.ipt_fct {
	border: 1px solid #ccc;
	width: 100%; height: 32px;
	font-size: 12px;
	color: #666;
	font-family: Arial, sans-serif, Helvetica;
	font-weight: 400;
	padding: 0 8px;
}
.txt_fct {
	border: 1px solid #ccc;
	width: 100%; height: 100px;
	font-size: 12px;
	color: #666;
	font-family: Arial, sans-serif, Helvetica;
	font-weight: 400;
	padding: 8px;
	resize: vertical;
}
.btn_fct {
	cursor: pointer;
	color: #fff;
	font-weight: bold;	
	font-family: Arial, sans-serif, Helvetica;
	padding: 5px 20px;
	background: #2E80D1;
	border: none;
	border-bottom: 1px solid #0c5297;
	text-transform: uppercase;
}
.btn_fct:focus {background: #0c5297;}

 </style>
<form action="" method="post" enctype="multipart/form-data" name=formdk id=formdk>  
 <div class="form_ct">
            Những ô có dấu sao <span class="color_star">(*)</span> là bắt buộc phải nhập.
            <ul class="main_fct">
                <li class="clearfix">
                    <h4 class="fct_1">
                        Tên của bạn <span class="color_star">*</span>
                    </h4><!-- End .fct_1 -->
                    <div class="fct_2">
                        <input class="ipt_fct box-sizing-fix" type="text" name="tennguoigui_name"  id="tennguoigui_name" title="Tên của bạn" value="<?php echo $tennguoigui_name ?>" placeholder="Bạn vui lòng nhập tên liên hệ..!">
                    </div><!-- End .fct_2 -->
                </li>
                 <li class="clearfix">
                    <h4 class="fct_1">
                        Điện thoại <span class="color_star">*</span>
                    </h4><!-- End .fct_1 -->
                    <div class="fct_2">
                        <input class="ipt_fct box-sizing-fix" name="dienthoai" type="text" id="dienthoai" title="Nhập điện thoại của bạn" value="<?php echo $dienthoai ?>" placeholder="Bạn vui lòng nhập số điện thoại liên hệ..!">
                    </div><!-- End .fct_2 -->
                </li>
                 <li class="clearfix">
                    <h4 class="fct_1">
                        Địa chỉ mail <span class="color_star">*</span>
                    </h4><!-- End .fct_1 -->
                    <div class="fct_2">
                        <input class="ipt_fct box-sizing-fix" name="nguoigui_from" type="text"  id="nguoigui_from" title="Nhập địa chỉ email" value="<?php echo $nguoigui_from ?>" placeholder="Bạn vui lòng nhập địa chỉ mail liên hệ..!">
                    </div><!-- End .fct_2 -->
                </li>
                 <li class="clearfix">
                    <h4 class="fct_1">
                        Tiêu đề thư <span class="color_star">*</span>
                    </h4><!-- End .fct_1 -->
                    <div class="fct_2">
                        <input class="ipt_fct box-sizing-fix" name="tieude_Subject" type="text" id="tieude_Subject" title="Tiêu đề thư"value="<?php echo $tieude_Subject ?>" placeholder="Bạn vui lòng nhập tiêu đề thư gửi..!">
                    </div><!-- End .fct_2 -->
                </li>
                 <li class="clearfix">
                    <h4 class="fct_1">
                        Nội dung thư <span class="color_star">*</span>
                    </h4><!-- End .fct_1 -->
                    <div class="fct_2">
                        <textarea class="txt_fct box-sizing-fix" name="noidung_Body"  id="noidung_Body" title="Nhập nội dung thư " placeholder="Bạn vui lòng nhập thông điệp bạn muốn gửi tới chúng tôi..!"></textarea>
                    </div><!-- End .fct_2 -->
                </li>
                 <li class="clearfix">
                    <h4 class="fct_1">&nbsp;
                        
                    </h4><!-- End .fct_1 -->
                    <div class="fct_2">
                        <input class="btn_fct" type="submit" name="them" value="Gửi đi">
                    </div><!-- End .fct_2 -->
                </li>
            </ul><!-- End .main_fct -->	
        </div>
</form> 