<?php
if(isset($frame)==true){
	if($_SESSION['kt_login_level']!=4 && $_SESSION['kt_login_level']!=-1){
		$row_tbl_users=getRecord('tbl_users',"id = '".$_SESSION['kt_login_id']."'");
		if( isset($_GET['id']) || !empty($_POST['id'])) {if(userPermissEdit($row_tbl_users['listEdit'],1,3)!=true) header("location: admin.php");}
		elseif(userPermissEdit($row_tbl_users['listEdit'],1,2)!=true) header("location: admin.php");
	}
}else{
	header("location:admin.php");
}
?>


<? $errMsg =''?>
<?

$path = "../web/images/shopcate";
$pathdb = "images/shopcate";
if (isset($_POST['btnSave'])){
	$code          = isset($_POST['txtCode']) ? trim($_POST['txtCode']) : '';
	$name          = isset($_POST['txtName']) ? trim($_POST['txtName']) : '';
	
	$parent        = $_POST['ddCat'];
	$parent1       = $_POST['ddCatch'];
	
	if($parent1==-1) $parent1=$parent;
	if($parent1==-1) $parent1=2;
	if($parent1=="") $parent1=2;
	$subject       = vietdecode(mysql_real_escape_string($name));
	$detail_short  = isset($_POST['txtDetailShort']) ? trim($_POST['txtDetailShort']) : '';
	$detail        = isset($_POST['txtDetail']) ? trim($_POST['txtDetail']) : '';
	$sort          = isset($_POST['txtSort']) ? trim($_POST['txtSort']) : 0;
	
	
	$title         = isset($_POST['title']) ? trim($_POST['title']) : "";
	$description   = isset($_POST['description']) ? trim($_POST['description']) : "";
	$keyword       = isset($_POST['keyword']) ? trim($_POST['keyword']) : "";
	
	$status        = $_POST['chkStatus']!='' ? 1 : 0;
	
	$catInfo       = getRecord('tbl_rv_category', 'id='.$parent);
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
			$sql = "update tbl_rv_category set code='".$code."',name='".$name."', parent='".$parent1."',subject='".$subject."',detail_short='".$detail_short."',detail='".$detail."', sort='".$sort."', title='".$title."', description='".$description."', keyword='".$keyword."',last_modified=now(), lang='".$lang."' where id='".$oldid."'";
		}else{
			$sql = "insert into tbl_rv_category (code, cate , name, parent, subject, detail_short, detail, title , description , keyword , sort, status,  date_added, last_modified, lang) values ('".$code."','0','".$name."','".$parent1."','".$subject."','".$detail_short."','".$detail."','".$title."','".$description."','".$keyword."','".$sort."','1',now(),now(),'".$lang."')";
		}
		if (mysql_query($sql,$conn)){
			if(empty($_POST['id'])) $oldid = mysql_insert_id();
			$r = getRecord("tbl_rv_category","id=".$oldid);
		
			$arrField = array(
			"subject"          => "'".vietdecode($name)."'"
			);// ko them id vao cuoi cho dep
			$result = update("tbl_rv_category",$arrField,"id=".$oldid);
			
			$sqlUpdateField = "";
			
			if ($_POST['chkClearImg']==''){
				$extsmall=getFileExtention($_FILES['txtImage']['name']);
				if (makeUpload($_FILES['txtImage'],"$path/item_category_s$oldid$extsmall")){
					@chmod("$path/item_category_s$oldid$extsmall", 0777);
					$sqlUpdateField = " image='$pathdb/item_category_s$oldid$extsmall' ";
				}
			}else{
				if(file_exists('../'.$r['image'])) @unlink('../'.$r['image']);
				$sqlUpdateField = " image='' ";
			}
			
			if ($_POST['chkClearImgLarge']==''){
				$extlarge=getFileExtention($_FILES['txtImageLarge']['name']);
				if (makeUpload($_FILES['txtImageLarge'],"$path/item_category_l$oldid$extlarge")){
					@chmod("$path/item_category_l$oldid$extlarge", 0777);
					if($sqlUpdateField != "") $sqlUpdateField .= ",";
					$sqlUpdateField .= " image_large='$pathdb/item_category_l$oldid$extlarge' ";
				}
			}else{
				if(file_exists('../'.$r['image_large'])) @unlink('../'.$r['image_large']);
				if($sqlUpdateField != "") $sqlUpdateField .= ",";
				$sqlUpdateField .= " image_large='' ";
			}
			
			if($sqlUpdateField!='')	{
				$sqlUpdate = "update tbl_rv_category set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$conn);
			}
		}else{
			$errMsg = "Không thể cập nhật !";
		}
	}

	if ($errMsg == '')
		echo '<script>window.location="admin.php?act=bds_category&cat='.$_REQUEST['cat'].'&page='.$_REQUEST['page'].'&code=1"</script>';
}else{
	if (isset($_GET['id'])){
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from tbl_rv_category where id='".$oldid."'";
		if ($result = mysql_query($sql,$conn)) {
			$row=mysql_fetch_array($result);
			$code          = $row['code'];
			$name          = $row['name'];
			
			$parent1        = $row['parent'];
			$parent         = get_field('tbl_rv_category','id',$parent1,'parent');
			
			if($parent==2 || $parent1==2) {
				$parent=$parent1;
				$parent1=-1;
			}
			
			$subject       = $row['subject'];
			$detail_short  = $row['detail_short'];
			$detail        = $row['detail'];
			$image         = $row['image'];
			$image_large   = $row['image_large'];
			$sort          = $row['sort'];
			$status        = $row['status'];
			$date_added    = $row['date_added'];
			$last_modified = $row['last_modified'];
			
			$title         = $row['title'];
			$description   = $row['description'];
			$keyword       = $row['keyword'];
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
<script>
$(document).ready(function() {
	$("#ddCat").change(function(){ 
		var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
		var table="tbl_rv_category";
		$("#ddCatch").load("getChild.php?table="+ table + "&id=" +id); //alert(idthanhpho)
	});
});
</script>
<div class="row-fluid">
    <div class="span12">
        <div class="box-widget">
             
            <div class="widget-container">
                <div class="widget-block">
                    
                   <form method="post" name="frmForm" enctype="multipart/form-data" action="admin.php?act=bds_category">
                        <input type="hidden" name="txtSubject" id="txtSubject">
                        <input type="hidden" name="txtDetailShort" id="txtDetailShort">
                        <input type="hidden" name="txtDetail" id="txtDetail">
                        
                        <input type="hidden" name="act" value="bds_category_m">
                        <input type="hidden" name="id" value="<?=$_REQUEST['id']?>">
                        <input type="hidden" name="page" value="<?=$_REQUEST['page']?>">
                       
                            <table  class="table_chinh">

                                <tr>
                                  <td class="table_chu_tieude_them" colspan="2" align="center" valign="middle"  >DANH MỤC BẤT ĐỘNG SẢN</td>
                              </tr>
                                <tr>
                                  <td valign="middle"  class="table_chu">&nbsp;</td>
                                  <td valign="middle">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="30%">
                                        Tên  <span class="sao_bb">*</span>
                                    </td>
                                    <td valign="middle" width="70%">
                                        <input name="txtName" type="text" class="table_khungnho" id="txtName" value="<?=$name?>"/>
                                    </td>
                                </tr>
                                <tr>

                                  <td valign="middle"  class="table_chu">Danh mục<span class="sao_bb">*</span></td>
            
                                  <td valign="middle"><select name="ddCat" id="ddCat" class="table_list">
                                    <?php if($_POST['ddCat']!=NULL){ ?>
                                    <option value="<?php echo $idtheloaic=$_POST['ddCat'] ; ?>"><?php echo get_field('tbl_rv_category','id',$parent,'name'); ?></option>
                                    <?php }?>
                                    <?php if($parent!=-1 && $parent!=""){?>
                                     <option value="<?php echo $parent ?>"><?php echo get_field('tbl_rv_category','id',$parent,'name'); ?></option>
                                     <?php }?>
                                    <option value="-1" <?php if($parent==-1) echo 'selected="selected"';?> > Chọn danh mục </option>
                                    <?php   
                                    $gt=get_records("tbl_rv_category","parent=2 and cate=0 and status=0 ","id DESC"," "," ");
                                    while($row=mysql_fetch_assoc($gt)){?>
                                    <option value="<?php echo $row['id']; ?>" <?php if($parent==$row['id']) echo 'selected="selected"';?> ><?php echo $row['name']; ?></option>
                                    <?php } ?>
                                  </select></td>
            
                                </tr>
            
                                <tr>
                                  <td height="31" valign="middle" class="table_chu">Danh mục con</td>
                                  <td valign="middle"> 
                                    <select name="ddCatch" id="ddCatch" class="table_list">
                                      <?php if($_POST['ddCatch']!=NULL && $_POST['ddCatch']!=-1 ){ ?>
                                      <option value="<?php echo $parent1=$_POST['ddCatch'] ; ?>"><?php echo get_field('tbl_rv_category','id',$parent1,'name'); ?></option>
                                      <?php }?>
                                       <?php if($parent1!=-1 && $parent1!=""){?>
                                      <option value="<?php echo $parent1 ?>"><?php echo get_field('tbl_rv_category','id',$parent1,'name'); ?></option>
                                      <?php }?>
                                      <option value="-1"> Chọn danh mục con </option>
                                    </select>
                                   </td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="30%">
                                       Thứ tự sắp xếp<span class="sao_bb">*</span>
                                    </td>
                                    <td valign="middle" width="70%">
                                        <input class="table_khungnho" value="<?=$sort?>" type="text" name="txtSort"  />
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" width="30%">
                                    Hình đại diện</td>
                                    <td valign="middle" width="70%">
                                        <input type="file" name="txtImage" class="textbox" size="34">
                                        <input type="checkbox" name="chkClearImg" value="on"> Xóa bỏ hình ảnh	 <br>
                                        <? if ($image!=''){ echo '<img border="0" src="../'.$image.'"><br><br>Hình (kích thước nhỏ)';}?>&nbsp;&nbsp;
                                        <?  if ($image_large!=''){ echo '<img border="0" src="../'.$image_large.'"><br><br>Hình (kích thước lớn)';}?>
                                 
                                        
                                    </td>
                                </tr>
                                 <tr>
                                <td valign="middle" width="30%">
                                    title  <span class="sao_bb">*</span>
                                </td>
                                <td valign="middle" width="70%">
                                    <input name="title" type="text" class="table_khungnho" id="title" value="<?=$title?>"/>
                                </td>
                            </tr>
                             <tr>
                                <td valign="middle" width="30%">
                                    description  <span class="sao_bb">*</span>
                                </td>
                                <td valign="middle" width="70%">
                                    <input name="description" type="text" class="table_khungnho" id="description" value="<?=$description?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td valign="middle" width="30%">
                                    keyword  <span class="sao_bb">*</span>
                                </td>
                                <td valign="middle" width="70%">
                                    <input name="keyword" type="text" class="table_khungnho" id="keyword" value="<?=$keyword?>"/>
                                </td>
                            </tr>
                                <tr>
                                    <td valign="top" width="30%">
                                        Không hiển thị</td>
                                    <td valign="middle" width="70%">
                                        <input type="checkbox" name="chkStatus" value="on" <? if ($status>0) echo 'checked' ?>>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" width="30%">&nbsp;
                                        
                                    </td>
                                    <td valign="middle" width="70%">
                                        <input type="submit" name="btnSave" VALUE="Cập nhật" class=button onclick="return btnSave_onclick()">
                                        <input type="reset" class=button value="Nhập lại">	
                                    </td>
                                </tr>
                            </table>
                            </form> 

                </div>
            </div>
        </div>
    </div>
</div>