<?php
if(isset($frame)==true){
	if($_SESSION['kt_login_level']!=4 && $_SESSION['kt_login_level']!=-1){
 		 header("location: admin.php"); 
 
	}
}else{
	header("location:admin.php");
}
?>
<? $errMsg =''?>
<?
$username="";
$path = "../images/nhanvien";
$pathdb = "images/nhanvien";
if (isset($_POST['btnSave'])){
	$link          = isset($_POST['link']) ? trim($_POST['link']) : '';
	$name          = isset($_POST['name']) ? trim($_POST['name']) : '';
	$username      = isset($_POST['username']) ? trim($_POST['username']) : '';
	$passCus      = isset($_POST['passCus']) ? trim($_POST['passCus']) : '';
	$repassword    = isset($_POST['repassword']) ? trim($_POST['repassword']) : '';
	$mobile        = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
	$email         = isset($_POST['email']) ? trim($_POST['email']) : '';
	$address         = isset($_POST['address']) ? trim($_POST['address']) : '';
	$packet          = isset($_POST['packet']) ? trim($_POST['packet']) : '';
	$name          = isset($_POST['name']) ? trim($_POST['name']) : '';
	$ghichu        = isset($_POST['ghichu']) ? trim($_POST['ghichu']) : '';
	$device       = isset($_POST['device']) ? $_POST['device'] : 1;
	
    $date=isset($_POST['date']) ? trim($_POST['date']) : '';
	$dateadd=date("Y-m-d", strtotime(str_replace('/', '-', $date)));
	$date=str_replace('/', '-', $date);
	if($packet==1) $date=date("Y-m-d", strtotime($date." + 3 month"));
	elseif($packet==2) $date=date("Y-m-d", strtotime($date." + 6 month"));
	elseif($packet==3) $date=date("Y-m-d", strtotime($date." + 12 month"));

	$sort          = isset($_POST['txtSort']) ? trim($_POST['txtSort']) : 0;
	$status        = $_POST['status']!='' ? 1 : 0;
	
	if(!$multiLanguage){
		$lang      = $catInfo['lang'];
	}else{
		$lang      = $catInfo['lang'] != '' ? $catInfo['lang'] : $_POST['cmbLang'];
	}

	$errMsg .= checkUpload($_FILES["txtImage"],".jpg;.gif;.bmp",500*1024,0);
	$errMsg .= checkUpload($_FILES["txtImageLarge"],".jpg;.gif;.bmp",500*1024,0);

	if ($errMsg==''){
		if (!empty($_POST['id'])){
			$oldid = $_POST['id'];
		 
			 $sql = "update jbs_service set username='".$username."', link='".$link."', emailLe='".$email."', passCus='".$passCus."', device='".$device."',packet='".$packet."',note='".$ghichu."',date_added='".$dateadd."',date_Expr='".$date."',last_modified=now() where id='".$oldid."'";
			 
		}else{
			 $sql = "insert into jbs_service (  username, passCus, cate , link ,  mobile, emailLe, address , device , packet , note ,   date_Expr ,  date_added, last_modified) values ('".$username."','".$passCus."',1,'".$link."','".$mobile."','".$email."','".$address."','".$device."','".$packet."','".$ghichu."','".$date."','".$dateadd."',now())";
		}
		if (mysql_query($sql,$conn)){
			if(empty($_POST['id'])) $oldid = mysql_insert_id();
			$r = getRecord("jbs_service","id=".$oldid);
  
		}else{
			$errMsg = "Không thể cập nhật !";
		}
	}

	if ($errMsg == '') {
		echo '<script>window.location="admin.php?act=program_detail&idpro='.$oldid.'"</script>' ;
	}
}else{
	if (isset($_GET['id'])){
		$oldid=$_GET['id'];
		$page = $_GET['page'];

		$sql = "select * from jbs_service where id='".$oldid."'";
		if ($result = mysql_query($sql,$conn)) {
				$row=mysql_fetch_array($result);
				$name          = $row['name'];
				$passCus       = $row['passCus'];
				$username      = $row['username'];
				$mobile        = $row['mobile'];
				$email         = $row['emailLe'];
				$address       = $row['address'];
				$link          = $row['link'];
				$packet        = $row['packet'];
				$date          = $row['date'];
				$device        = $row['device'];
				$passCus       = $row['passCus'];
				$ghichu        = $row['note'];
				$image         = $row['image'];
				$image_large   = $row['image_large'];
				$status        = $row['status'];
				$date_added    = $row['date_added'];
				$last_modified = $row['last_modified'];
				$dateadd       = $row['date_added'];
				$image_large   = $row['image_large'];
				$idgroup       = $row['idgroup'];
		}
	}
}

?>
<?php
	if( $errMsg !=""){ 
?>
<div class="alert alert-block no-radius fade in">
    <button type="button" class="close" data-dismiss="alert"><span class="mini-icon cross_c"></span></button>
    <h4>Warning!</h4>
     <?=$errMsg;?>
</div>
<?php }?>
<div class="row-fluid">
    <div class="span12">
        <div class="box-widget">
          <div class="widget-container">
              <div class="widget-block">
                    
                <form method="post" name="frmForm" enctype="multipart/form-data" action="admin.php?act=program_m">
                        <input type="hidden" name="act" value="program_m">
                        <input type="hidden" name="id" value="<?=$_REQUEST['id']?>">
                        <input type="hidden" name="page" value="<?=$_REQUEST['page']?>">
                   
                     <table  class="table_chinh">
                          <tr>
                            <td class="table_chu_tieude_them" colspan="2" align="center" valign="middle"  >KHÁCH HÀNG</td>
                         </tr>
                         <tr>
                           <td valign="middle"  class="table_chu">&nbsp;</td>
                           <td valign="middle">&nbsp;</td>
                         </tr>
                         <tr>
                             <td valign="middle" width="30%">
                                 Email  <span class="sao_bb">*</span>
                             </td>
                             <td valign="middle" width="70%">
                                 <input name="email" type="text" class="table_khungnho" id="email" value="<?=$email?>"/>
                             </td>
                         </tr>
                         <tr>
                             <td valign="middle" width="30%">
                                 Username  <span class="sao_bb">*</span>
                             </td>
                             <td valign="middle" width="70%">
                                 <input name="username" type="text" class="table_khungnho" id="username" value="<?=$username?>"/>
                             </td>
                         </tr>
                         <tr>
                             <td valign="middle" width="30%">Password<span class="sao_bb">*</span>
                             </td>
                             <td valign="middle" width="70%"><input name="passCus" type="text" class="table_khungnho" id="passCus" value="<?=$passCus?>"/></td>
                         </tr>
                         
                          <tr>
                             <td valign="middle" width="30%">
                             Link cài</td>
                             <td valign="middle" width="70%">
                                 <input name="link" type="text" class="table_khungnho" id="link" value="<?=$link?>"/>
                             </td>
                         </tr>
                          
                         <tr>
                           <td valign="top">Thiết bị</td>
                            <td valign="middle"><label for="device"></label>
                            <select name="device" id="device" class="table_khungnho">
                            	<option value="1" <?php if($device==1) echo 'selected="selected"';?> > Iphone </option>
                                <option value="2" <?php if($device==2) echo 'selected="selected"';?> > Android </option>
                                <option value="3" <?php if($device==3) echo 'selected="selected"';?> > Symbian </option>
                                <option value="4" <?php if($device==4) echo 'selected="selected"';?> > Blackberry </option>
                            </select>
                            </td>
                       </tr>
                        <tr>
                           <td valign="top">Ngày kích hoạt</td>
                            <td valign="middle">
                             <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
									 
                            <input name="date" type="text" class="table_khungnho" id="date" value="<? if($dateadd!="") echo date("d/m/Y",strtotime($dateadd))?>"/>
                            <script>
                                    $(function() {
										$( "#date" ).datepicker();  
										$( "#date" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
										<?php if($dateadd!=""){?>
										$( "#date" ).datepicker('setDate', '<?  echo date("d/m/Y",strtotime($dateadd))?>');
										<? }?>
                                    });
                                    </script>
                            <select name="packet" id="packet" class="table_khungnho" style="width:100px;">
                            	<option value="1" <?php if($packet==1) echo 'selected="selected"';?> > 3 Tháng </option>
                                <option value="2" <?php if($packet==2) echo 'selected="selected"';?> > 6 Tháng </option>
                                <option value="3" <?php if($packet==3) echo 'selected="selected"';?> > 12 Tháng </option> 
                            </select>
                            </td>
                       </tr>
                         <tr>
                             <td valign="top" width="30%">
                                 Ghi chú  <span class="sao_bb">*</span>
                             </td>
                             <td valign="middle" width="70%">
                                 <textarea name="ghichu" class="text_ghichu" id="ghichu"><?=$ghichu;?></textarea>
                             </td>
                         </tr>
                         <tr>
                             <td valign="top" width="30%">&nbsp;
                                        
                             </td>
                             <td valign="middle" width="70%">
                                 <input name="btnSave" type="submit" id="btnSave" value=" Lưu thông tin"/>
                                 <input type="reset" value="Xóa trắng"/>
                             </td>
                         </tr>
                     </table>
                            
                  </form> 

                </div>
            </div>
        </div>
    </div>
</div>