<?php
if(isset($frame)==true){
	if($_SESSION['kt_login_level']!=4 && $_SESSION['kt_login_level']!=-1){
		$row_tbl_users=getRecord('tbl_users',"id = '".$_SESSION['kt_login_id']."'");
		if( isset($_GET['id']) || !empty($_POST['id'])) {if(userPermissEdit($row_tbl_users['listEdit'],18,3)!=true) header("location: admin.php");}
		elseif(userPermissEdit($row_tbl_users['listEdit'],18,2)!=true) header("location: admin.php");
	}
}else{
	header("location:admin.php");
}
?>
<script language="javascript">
function btnSave_onclick(){
	if(test_empty(document.frmForm.txtName.value)){
		alert('Hãy nhập "tên" !');
		document.frmForm.txtName.focus();
		return false;
	}
	if(test_integer(document.frmForm.txtSort.value)){
		alert('"Thứ tự sắp xếp" phải là số !');
		document.frmForm.txtSort.focus();
		return false;
	}
	
	//document.forms.frmForm.elements.txtSubject.value = oEdit0.getHTMLBody();
	document.forms.frmForm.elements.txtDetailShort.value = oEdit1.getHTMLBody();
	document.forms.frmForm.elements.txtDetail.value = oEdit2.getHTMLBody();
	
	return true;
}
</script>



<? $errMsg =''?>
<?
$username="";
$path = "../images/nhanvien";
$pathdb = "images/nhanvien";
if (isset($_POST['btnSave'])){

	$name          = isset($_POST['name']) ? trim($_POST['name']) : '';
	$username      = isset($_POST['username']) ? trim($_POST['username']) : '';
	$password      = isset($_POST['password']) ? trim($_POST['password']) : '';
	$repassword    = isset($_POST['repassword']) ? trim($_POST['repassword']) : '';
	$mobile        = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
	$email         = isset($_POST['email']) ? trim($_POST['email']) : '';
	$cmnd          = isset($_POST['cmnd']) ? trim($_POST['cmnd']) : '';
	$address       = isset($_POST['address']) ? trim($_POST['address']) : '';
	$ghichu        = isset($_POST['ghichu']) ? trim($_POST['ghichu']) : '';
	$idgroup       = isset($_POST['idgroup']) ? $_POST['idgroup'] : 1;
	
	if($repassword!="")
		if($password==$repassword){
			$password=md5(md5(md5($password)));
	
		}else $errMsg.="Password phải nhâp giống nhau";
	

	$sort          = isset($_POST['txtSort']) ? trim($_POST['txtSort']) : 0;
	$status        = $_POST['status']!='' ? 1 : 0;
	
	if(!$multiLanguage){
		$lang      = $catInfo['lang'];
	}else{
		$lang      = $catInfo['lang'] != '' ? $catInfo['lang'] : $_POST['cmbLang'];
	}

	if ($name=="") $errMsg .= "Hãy nhập tên danh mục !<br>";
	$errMsg .= checkUpload($_FILES["txtImage"],".jpg;.gif;.bmp",500*1024,0);
	$errMsg .= checkUpload($_FILES["txtImageLarge"],".jpg;.gif;.bmp",500*1024,0);

	if ($errMsg==''){
		if (!empty($_POST['id'])){
			$oldid = $_POST['id'];
			if($repassword=="") $sql = "update tbl_users set name='".$name."', username='".$username."', mobile='".$mobile."',email='".$email."',address='".$address."',cmnd='".$cmnd."',ghichu='".$ghichu."',sex='".$gioitinh."',idgroup='".$idgroup."',status='".$status."',last_modified=now() where id='".$oldid."'";
			else $sql = "update tbl_users set name='".$name."', username='".$username."', password='".$password."', mobile='".$mobile."',email='".$email."',address='".$address."',cmnd='".$cmnd."',ghichu='".$ghichu."',sex='".$gioitinh."',status='".$status."',last_modified=now() where id='".$oldid."'";
			
		}else{
			$sql = "insert into tbl_users (name, username, password, mobile, email , address , cmnd,ghichu, sex,idgroup, status,  date_added, last_modified) values ('".$name."','".$username."','".$password."','".$mobile."','".$email."','".$address."','".$cmnd."','".$ghichu."','".$gioitinh."','".$idgroup."','1',now(),now())";
		} 
		if (mysql_query($sql,$conn)){
			if(empty($_POST['id'])) $oldid = mysql_insert_id();
			$r = getRecord("tbl_users","id=".$oldid);
			
			$sqlUpdateField = "";
			
			if ($_POST['chkClearImg']==''){
				$extsmall=getFileExtention($_FILES['txtImage']['name']);
				if (makeUpload($_FILES['txtImage'],"$path/user_s$oldid$extsmall")){
					@chmod("$path/user_s$oldid$extsmall", 0777);
					$sqlUpdateField = " image='$pathdb/user_s$oldid$extsmall' ";
				}
			}else{
				if(file_exists('../'.$r['image'])) @unlink('../'.$r['image']);
				$sqlUpdateField = " image='' ";
			}
					
			if($sqlUpdateField!='')	{
				$sqlUpdate = "update tbl_users set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$conn);
			}
		}else{
			$errMsg = "Không thể cập nhật !";
		}
	}

	if ($errMsg == '')
		echo '<script>window.location="admin.php?act=user&cat='.$_REQUEST['cat'].'&page='.$_REQUEST['page'].'&code=1"</script>';
}else{
	if (isset($_GET['id'])){
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from tbl_users where id='".$oldid."'";
		if ($result = mysql_query($sql,$conn)) {
			$row=mysql_fetch_array($result);
			$name          = $row['name'];
			$password      = $row['password'];
			$username      = $row['username'];
			$mobile        = $row['mobile'];
			$email         = $row['email'];
			$address       = $row['address'];
			$ghichu        = $row['ghichu'];
			$idgroup       = $row['idgroup'];
			$cmnd          = $row['cmnd'];
			$image         = $row['image'];
			$gioitinh      = $row['gioitinh'];
			$image_large   = $row['image_large'];
			$status        = $row['status'];
			$date_added    = $row['date_added'];
			$last_modified = $row['last_modified'];
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
     <? $errMsg =''?>
</div>
<?php }?>
<div class="row-fluid">
    <div class="span12">
        <div class="box-widget">
             
            <div class="widget-container">
                <div class="widget-block">
                    
                   <form method="post" name="frmForm" enctype="multipart/form-data" action="admin.php?act=user_m">
                        <input type="hidden" name="act" value="user_m">
                        <input type="hidden" name="id" value="<?=$_REQUEST['id']?>">
                        <input type="hidden" name="page" value="<?=$_REQUEST['page']?>"> 
                        
                            <table  class="table_chinh">
                                <tr>
                                	<td class="table_chu_tieude_them" colspan="2" align="center" valign="middle"  >RAO VẶT BẤT ĐỘNG SẢN</td>
                                </tr>
                                <tr>
                                    <td valign="middle"  class="table_chu">&nbsp;</td>
                                    <td valign="middle">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign="middle">Quyền</td>
                                    <td valign="middle">
                                    <?php if($quyen=="") $quyen=1?>
                                    <input type="radio" name="idgroup" id="idgroup" value="1" <?php if($idgroup==1) echo 'checked="checked"';?>   />Customer
                                    <input type="radio" name="idgroup" id="idgroup" value="2" <?php if($idgroup==2) echo 'checked="checked"';?>   />User
                                    <input type="radio" name="idgroup" id="idgroup" value="3" <?php if($idgroup==3) echo 'checked="checked"';?> />Mode
                                    <input type="radio" name="idgroup" id="idgroup" value="4" <?php if($idgroup==4) echo 'checked="checked"';?> />Admin
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="30%">Tên người dùng<span class="sao_bb">*</span>
                                    </td>
                                    <td valign="middle" width="70%">
                                        <input name="name" type="text" class="table_khungnho" id="name" value="<?=$name?>"/>
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
                                    <td valign="middle" width="70%"><input name="password" type="password" class="table_khungnho" id="password" value="<?=$password?>"/></td>
                                </tr>
                                <tr>
                                	<td valign="middle">Repassword</td>
                                	<td valign="middle"><input name="repassword" type="password" class="table_khungnho" id="repassword" value="<?=$repassword?>"/></td>
                                </tr>
                                <tr>
                                  <td valign="middle"> Địa chỉ <span class="sao_bb">*</span></td>
                                  <td valign="middle"><input name="address" type="text" class="table_khungnho" id="address" value="<?=$address?>"/></td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="30%">Mobile<span class="sao_bb">*</span>
                                    </td>
                                    <td valign="middle" width="70%">
                                        <input name="mobile" type="text" class="table_khungnho" id="mobile" value="<?=$mobile?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="30%">
                                        Email  <span class="sao_bb">*</span>
                                    </td>
                                    <td valign="middle" width="70%">
                                        <input name="email" type="text" class="table_khungnho" id="email" value="<?=$email;?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="30%">
                                        Số chứng minh  <span class="sao_bb">*</span>
                                    </td>
                                    <td valign="middle" width="70%">
                                        <input name="cmnd" type="text" class="table_khungnho" id="cmnd" value="<?=$cmnd?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="30%">
                                        Giới tính  <span class="sao_bb">*</span>
                                    </td>
                                    <td valign="middle" width="70%">
                                        <input name="status" type="radio"  id="gioitinh" value="1" <?php if($gioitinh==1) echo 'checked="checked"';?>  /> Nam
                                        <input name="status"  type="radio" id="gioitinh" value="0" <?php if($gioitinh==0) echo 'checked="checked"';?>/> Nữ
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%" height="166" valign="middle">
                                        Hình đại diện  <span class="sao_bb">*</span>
                                    </td>
                                    <td valign="middle" width="70%">
                                        <input name="txtImage" type="file" class="" id="txtImage"/><input type="checkbox" name="chkClearImg" value="on"> Xóa bỏ hình ảnh <br /><br /> 
                                        
										<?php if($image==true){ ?>
                                        
                                        <a onclick="positionedPopup (this.href,'myWindow','500','400','100','400','yes');return false" href="<?=$row['hinh1']?>" title="Click vào xem ảnh">
                                        
                                        <img src="../<?=$image?>" width="80" height="80" border="0" class="hinh" />
                                        
                                        </a>
                                        
                                        <?php }else{?>
                                        
                                        <img src="../<?php echo $noimgs; ?>" width="80" height="80" border="0" class="hinh" />
                                        
                                        <?php }?>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" width="30%">
                                        Ghi chú  <span class="sao_bb">*</span>
                                    </td>
                                    <td valign="middle" width="70%">
                                        <textarea name="ghichu" class="table_khungnho" id="ghichu"><?=$ghichu;?></textarea>
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