<?php
if(isset($frame)==true){
	if($_SESSION['kt_login_level']!=4 && $_SESSION['kt_login_level']!=-1){
		$row_tbl_users=getRecord('tbl_users',"id = '".$_SESSION['kt_login_id']."'");
		if(userPermissEdit($row_tbl_users['listEdit'],2,1)!=true) header("location: admin.php");
	}
 
	
	if($_SESSION['kt_login_level']==3){
		$qCity=$row_tbl_users['listCity'];
		if($qCity=="") $strCity=" AND idcity =10000";
		else $strCity=" AND idcity in ($qCity)";
		
		$type=" AND type=1";
	}
	
}else{
	header("location:admin.php");
}


if (isset($_POST['tim'])==true)//isset kiem tra submit
{  
	if($_POST['tukhoa']!=""){$tukhoa=$_POST['tukhoa'];}else {$tukhoa="";}
	if($tukhoa=="Từ khóa...") $tukhoa="";
	$_SESSION['kt_tukhoa_bignew']=$tukhoa;
	$tukhoa = trim(strip_tags($tukhoa));
	if (get_magic_quotes_gpc()==false) 
	{
		$tukhoa = mysql_real_escape_string($tukhoa);
	}
 
	
	if($_POST['ddCat']!=NULL){$parent=$_POST['ddCat'];}else {$parent=-1;}
	$_SESSION['kt_parent_bignew']=$parent;
	
	if($_POST['ddCatch']!=NULL){$parent1=$_POST['ddCatch'];}else {$parent1=-1;}
	$_SESSION['kt_ddCatch_bignew']=$parent1;
	
 
	
		
}

if (isset($_POST['reset'])==true) {

	$_SESSION['kt_tukhoa_bignew']="";
	$_SESSION['kt_parent_bignew']=-1;
	$_SESSION['kt_ddCatch_bignew']=-1; 
	
}
if($_SESSION['kt_tukhoa_bignew']==NULL){$tukhoa="";}
if($_SESSION['kt_tukhoa_bignew']!=NULL){$tukhoa=$_SESSION['kt_tukhoa_bignew'];}
if($_SESSION['kt_parent_bignew']==NULL){$parent=-1;}
if($_SESSION['kt_parent_bignew']!=NULL){$parent=$_SESSION['kt_parent_bignew'];}

if($_SESSION['kt_ddCatch_bignew']==NULL){$parent1=-1;}
if($_SESSION['kt_ddCatch_bignew']!=NULL){$parent1=$_SESSION['kt_ddCatch_bignew'];}

if($_GET['anhien']==NULL){$anhien=-1;$_SESSION['kt_anhien']=$anhien;}
if($_GET['anhien']!=NULL){$anhien=$_GET['anhien'];$_SESSION['kt_anhien']=$anhien;}
settype($anhien,"int");

if($_GET['tang']==NULL){$tang=-1;$_SESSION['kt_tang']=$tang;}
if($_GET['tang']!=NULL){$tang=$_GET['tang'];$_SESSION['kt_tang']=$tang;}
settype($tang,"int");

if($_GET['noibat']==NULL){$noibat=-1;$_SESSION['kt_noibat']=$noibat;}
if($_GET['noibat']!=NULL){$noibat=$_GET['noibat'];$_SESSION['kt_noibat']=$noibat;}
settype($noibat,"int");

if($_GET['duyet']==NULL){$duyet=-1;$_SESSION['kt_duyet']=$duyet;}
if($_GET['duyet']!=NULL){$duyet=$_GET['duyet'];$_SESSION['kt_duyet']=$duyet;}
settype($duyet,"int");
 
if($tang==0){$ks='ASC';}//0 tang
elseif($tang==1){$ks='DESC';}//1 giam
else $ks='DESC';
 

?>

<script>

$(document).ready(function() {	
 
$("#chkall").click(function(){
	 
		var status=this.checked;

		$("input[class='chon']").each(function(){this.checked=status;})

	});
<?php 
if(userPermissEdit($row_tbl_users['listEdit'],2,5)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
?>
	$("img.certi").click(function(){

	id=$(this).attr("value");

	obj = this;

		$.ajax({

		   url:'field.php',

		   data: 'id='+ id +'&table=tbl_rv_item'+'&type=4&cate=2',

		   cache: false,

		   success: function(data){ //alert(idvnexpres);

			obj.src=data;

			if (data=="images/anhien_1.png") obj.title="Nhắp vào để ẩn";

			else obj.title="Nhắp vào để hiện";

		  }

		});

	});
<?php }?>

 
<?php 
if(userPermissEdit($row_tbl_users['listEdit'],2,7 )==true  ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1){
?>
	$("img.anhien").click(function(){

	id=$(this).attr("value");

	obj = this;

		$.ajax({

		   url:'field.php',

		   data: 'id='+ id +'&table=tbl_rv_item' +'&type=1&cate=2',

		   cache: false,

		   success: function(data){ //alert(idvnexpres);

			obj.src=data;

			if (data=="images/anhien_1.png") obj.title="Nhắp vào để ẩn";

			else obj.title="Nhắp vào để hiện";

		  }

		});

	});
<?php }?>
	
<?php 
if(userPermissEdit($row_tbl_users['listEdit'],2,6)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
?>
	$("img.hot").click(function(){

	id=$(this).attr("value");

	obj = this;

		$.ajax({

		   url:'field.php',

		   data: 'id='+ id +'&table=tbl_rv_item' +'&type=2&cate=2',

		   cache: false,

		   success: function(data){ //alert(idvnexpres);

			obj.src=data;

			if (data=="images/noibat_1.png") obj.title="Nhắp vào để ẩn";

			else obj.title="Nhắp vào để hiện";

		  }

		});

	});
<?php }?>
<?php 
if(userPermissEdit($row_tbl_users['listEdit'],2,8)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
?>	
	$("img.up").click(function(){

	id=$(this).attr("value");

	obj = this;

		$.ajax({

		   url:'field.php',

		   data: 'id='+ id +'&table=tbl_rv_item' +'&type=3&cate=2',

		   cache: false,

		   success: function(data){ //alert(idvnexpres);

			obj.src=data;

			if (data=="images/anhien_1.png") obj.title="Nhắp vào để ẩn";

			else obj.title="Nhắp vào để hiện";

		  }

		});

	});
 
<?php }?>
	

});

</script>
<script>
$(document).ready(function() {
	$("#ddCat").change(function(){ 
		var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
		var table="tbl_rv_category";
		$("#ddCatch").load("getChild.php?table="+ table + "&id=" +id); //alert(idthanhpho)
	});
});
</script>
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

					<?
					
					if(userPermissEdit($row_tbl_users['listEdit'],2,4)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
						
						switch ($_GET['action']){
							case 'del' :
								$id = $_GET['id'];
								$r = getRecord("tbl_rv_item","id=".$id);
								$resultParent = 0;
								@$result = mysql_query("delete from tbl_rv_item where id='".$id."'",$conn);
								if ($result){
									if(file_exists('../'.$r['image'])) @unlink('../'.$r['image']);
									if(file_exists('../'.$r['image1'])) @unlink('../'.$r['image1']);
									if(file_exists('../'.$r['image2'])) @unlink('../'.$r['image2']);
									if(file_exists('../'.$r['image3'])) @unlink('../'.$r['image3']);
									if(file_exists('../'.$r['image4'])) @unlink('../'.$r['image4']);
									if(file_exists('../'.$r['image5'])) @unlink('../'.$r['image5']);
									$errMsg = "Đã xóa thành công.";
								}else $errMsg = "Không thể xóa dữ liệu !";
								break;
						}
		
						
		
						if (isset($_POST['btnDel'])){
							$cntDel=0;
							$cntNotDel=0;
							$cntParentExist=0;
							if($_POST['chk']!=''){
								foreach ($_POST['chk'] as $id){
									$r = getRecord("tbl_rv_item","id=".$id);
									$resultParent = 0;
									@$result = mysql_query("delete from tbl_rv_item where id='".$id."'",$conn);
									if ($result){
										if(file_exists('../'.$r['image'])) @unlink('../'.$r['image']);
										if(file_exists('../'.$r['image1'])) @unlink('../'.$r['image1']);
										if(file_exists('../'.$r['image2'])) @unlink('../'.$r['image2']);
										if(file_exists('../'.$r['image3'])) @unlink('../'.$r['image3']);
										if(file_exists('../'.$r['image4'])) @unlink('../'.$r['image4']);
										if(file_exists('../'.$r['image5'])) @unlink('../'.$r['image5']);
										$cntDel++;
									}else $cntNotDel++;
								}   
								$errMsg = "Đã xóa ".$cntDel." phần tử.<br><br>";   
								$errMsg .= $cntNotDel>0 ? "Không thể xóa ".$cntNotDel." phần tử.<br>" : '';    
								$errMsg .= $cntParentExist>0 ? "Đang có danh mục con sử dụng ".$cntParentExist." phần tử." : '';
							}else{
									$errMsg = "Hãy chọn trước khi xóa !";
							}
		
						}
						
						
						 
						
					}
					
					if(userPermissEdit($row_tbl_users['listEdit'],2,8)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
						
						if (isset($_POST['btnUp'])){
							$cntDel=0;
							$cntNotDel=0;
							$cntParentExist=0;
							if($_POST['chk']!=''){
									foreach ($_POST['chk'] as $id){
										$r = getRecord("tbl_rv_item","id=".$id);
										$resultParent = 0;
										$sql="UPDATE tbl_rv_item SET date_up=now() WHERE id='{$id}'";
										mysql_query($sql) or die(mysql_error());
									}   
									 
							} 
		
						}
					}
					
					if(userPermissEdit($row_tbl_users['listEdit'],2,5)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
						if (isset($_POST['btnCert'])){  
							if($_POST['chk']!=''){
								foreach ($_POST['chk'] as $id){ 
									 $sql="SELECT active FROM tbl_rv_item WHERE id='{$id}'";
									$rs = mysql_query($sql) or die(mysql_error());
									$row_rs=mysql_fetch_row($rs);
									$active=$row_rs[0]; 
									if($active==0){ // duyet qua roi thi ko duyet lai nua
										$sql="UPDATE tbl_rv_item SET active=1 , date_actived=now() , idmod='".$_SESSION['kt_login_id']."' WHERE id='{$id}'";
										mysql_query($sql) or die(mysql_error());
									}
									
								}   
								 
							} 
						
						}
					}
					
					if(userPermissEdit($row_tbl_users['listEdit'],2,4)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
						if (isset($_POST['btnMov'])){  
							if($_POST['chk']!=''){
								foreach ($_POST['chk'] as $id){ 
									  
									$sql="UPDATE tbl_rv_item SET cate=5 , last_modified=now() WHERE id='{$id}'";
									mysql_query($sql) or die(mysql_error());
									 
									
								}   
								 
							} 
						
						}
						
					}
					

                    $pageSize = 50;
                    $pageNum = 1;
                    $totalRows = 0;
  
                    if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
    
                    if ($pageNum<=0) $pageNum=1;
    
                    $startRow = ($pageNum-1) * $pageSize;
    
                
    
                    if($parent!=-1 || $parent1!=-1) {
						if($parent1!='-1') $parenstrt="$parent1";
						else $parenstrt=getParent("tbl_rv_category",$parent);
						$where="1=1  and cate=0 and (id='{$tukhoa}' or name LIKE '%$tukhoa%' or '{$tukhoa}'=-1) and  ( parent in ({$parenstrt}) or id=$parent)";
					}
                    else $where="1=1 and cate=0  and (id='{$tukhoa}' or name LIKE '%$tukhoa%' or '{$tukhoa}'=-1)";
					
					$where.=" $strCity $type AND ( status='{$anhien}' or '{$anhien}'=-1)  AND ( hot='{$noibat}' or '{$noibat}'=-1) AND ( active='{$duyet}' or '{$duyet}'=-1)"; 
    
                    //echo $where;
    
                    $MAXPAGE=1;
    
                    $totalRows=countRecord("tbl_rv_item",$where);
    
                    
    
                    if ($_REQUEST['cat']!='') $where="parent=".$_REQUEST['cat']; ?>
    
                    <form method="POST" action="#" name="frmForm" enctype="multipart/form-data">
    
                    <input type="hidden" name="page" value="<?=$page?>">
    
                    <input type="hidden" name="act" value="bds">
    
                    <?
    
                   // $pageadmin = createPage(countRecord("tbl_rv_item",$where),"./?act=shop_category&cat=".$_REQUEST['cat']."&page=",$MAXPAGE,$page)?>
    
    
                    <? if ($_REQUEST['code']==1) $errMsg = 'Cập nhật thành công.'?>
    
    					 
                         <table width="100%"  class="admin_table">

                            <thead>
    
                                <tr align="center" >
                                  <td valign="middle"  colspan="11">
                                    <center>
                                        <div class="table_chu_tieude"><strong>RAO VAT BẤT ĐỘNG SẢN</strong></div>
                                    </center>
                                   </td>
                                </tr>
                                <tr align="center" >
                                  <td valign="middle" style="background-color:#F0F0F0; height:40px; padding-left:20px" colspan="11">   
                                        
                                    <select name="ddCat" id="ddCat" class="list_tim_loc"> 
											<?php if($_POST['ddCat']!=NULL){ ?>
                                            <option value="<?php echo $idtheloaic=$_POST['ddCat'] ; ?>"><?php echo get_field('tbl_rv_category','id',$parent,'name'); ?> </option> 
                                            <?php }?>
                                            
                                            <option value="-1" <?php if($parent==-1) echo 'selected="selected"';?> > Chọn danh mục </option> 
                                            <?php   
											$gt=get_records("tbl_rv_category","parent=2 and cate=0 and status=0 ","id DESC"," "," ");
                                            while($row=mysql_fetch_assoc($gt)){?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option> 
                                            <?php } ?>
                                        
                                        </select>
                                        <select name="ddCatch" id="ddCatch" class="list_tim_loc"> 
											<?php if($_POST['ddCatch']!=NULL && $_POST['ddCatch']!=-1 ){ ?>
                                            <option value="<?php echo $parent1=$_POST['ddCatch'] ; ?>"><?php echo get_field('tbl_rv_category','id',$parent1,'name'); ?> </option> 
                                            <?php }?>
                                        	<option value="-1"> Chọn danh mục con </option> 
                                        </select>
                                        <input class="table_khungnho"  name="tukhoa" id="tukhoa" type="text" value="<?=$tukhoa?>"  placeholder="Từ khóa" />
                                        <input name="tim" type="submit" class="nut_table" id="tim" value="Tìm kiếm"/>
                                        <input type="submit" name="reset" class="nut_table" value="Reset" title=" Reset " />
                                 
                                  
                                  </td>
                                </tr>
                                <tr >
                                  <td valign="middle" align="left" style="background-color:#F0F0F0; height:40px; padding-left:20px" colspan="11"> 
                                        <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($noibat==0  &&  $anhien==0) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=bds&tang=1&anhien=-1&noibat=-1">Tất cả</a>
                                        </div>
                                        <div class="link_loc" style="width:80px; text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($tang==1) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>" >
                                        	<a href="admin.php?act=bds&tang=1&anhien=<?php echo $_SESSION['kt_anhien'] ?>&noibat=<?php echo $_SESSION['kt_noibat']?>">Tăng dần</a>
                                        </div>
                                        <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($tang==0) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=bds&tang=0&anhien=<?php echo $_SESSION['kt_anhien'] ?>&noibat=<?php echo $_SESSION['kt_noibat']?>">Giảm dần</a>
                                        </div>
                                        <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($anhien==1) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=bds&tang=<?php echo $_SESSION['kt_tang'] ?>&anhien=1&noibat=<?php echo $_SESSION['kt_noibat'] ?>"> Ẩn </a>
                                        </div>
                                         <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($anhien==0) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=bds&tang=<?php echo $_SESSION['kt_tang'] ?>&anhien=0&&noibat=<?php echo $_SESSION['kt_noibat'] ?>">Hiện</a>
                                        </div>
                                        <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($noibat==1) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=bds&tang=<?php echo $_SESSION['kt_tang'] ?>&anhien=<?php echo $_SESSION['kt_anhien'] ?>&noibat=1">Nổi bật</a>
                                        </div>
                                         <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($noibat==0) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=bds&tang=<?php echo $_SESSION['kt_tang'] ?>&anhien=<?php echo $_SESSION['kt_anhien'] ?>&noibat=0">ko nổi bật</a>
                                        </div>
                                        <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($duyet==1) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=bds&tang=<?php echo $_SESSION['kt_tang'] ?>&anhien=<?php echo $_SESSION['kt_anhien'] ?>&noibat=<?php echo $_SESSION['kt_noibat']?>&duyet=1">Đã duyệt</a>
                                        </div>
                                         <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($duyet==0) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=bds&tang=<?php echo $_SESSION['kt_tang'] ?>&anhien=<?php echo $_SESSION['kt_anhien'] ?>&noibat=<?php echo $_SESSION['kt_noibat']?>&duyet=0">Chưa duyệt</a>
                                        </div>
                                  </td>
                                </tr>
                               <tr>
                                  <td align="center" colspan="2">
                                   <? if(userPermissEdit($row_tbl_users['listEdit'],2,4)==true ||  $_SESSION['kt_login_level']==4||  $_SESSION['kt_login_level']==-1 ){?>
                                  <input type="submit" value="Xóa chọn" name="btnDel" onClick="return confirm('Bạn có chắc chắn muốn xóa ?');" class="button">
                                  <?php }?>
                                  </td>
                                  <td align="center" class="PageNum" colspan="8" height="30" >
                                    	<?php echo pagesListLimit($totalRows,$pageSize);?>   
                                  </td>
                                  
                                 <td width="102" align="center" colspan="1">
                                 <? if(userPermissEdit($row_tbl_users['listEdit'],2,2)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){?>
                                  <div><a href="admin.php?act=bds_m">
                                  <img width="48" height="48" border="0" src="images/them.png">
                                  </a></div>
                                  <? }?>
                                  </td>
                                </tr>
								<?php 
                                if(userPermissEdit($row_tbl_users['listEdit'],2,8)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
                                ?>
                                <tr>
                                  <td colspan="2" align="center"><input type="submit" value=" Up nhiều tin" name="btnUp" onclick="return confirm('Bạn có chắc chắn muốn up nhiều tin ?');" class="button" /></td>
                                  <td align="center">
                                   <? if(userPermissEdit($row_tbl_users['listEdit'],2,4)==true ||  $_SESSION['kt_login_level']==4||  $_SESSION['kt_login_level']==-1 ){?>
                                  <input type="submit" value=" Spam " name="btnMov" onClick="return confirm('Bạn có chắc chắn muốn chuyển  ?');" class="button">
                                  <?php }?>
                                  </td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                </tr>
                                <?php }?>
                                <?php 
if(userPermissEdit($row_tbl_users['listEdit'],2,5)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
?>
                                <tr  >
                                  <td colspan="2" align="center">
                                  <input type="submit" value=" Duyệt nhiều tin" name="btnCert" onclick="return confirm('Bạn có chắc chắn muốn duyệt nhiều tin ?');" class="button" /></td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                </tr>
                                <?php }?>
                                <tr class="admin_tieude_table">
    
                                    <td width="41" align="center">
    
                                        <input id="chkall" type="checkbox" name="chkall"  />
    
                                    </td>
    
                                    <td width="59" align="center">
    
                                        STT
    
                                    </td>
    
                                    <td width="137" align="center"><span class="title"><a class="title" >Hình</a></span></td>
    
                                    <td width="431" align="center"><a class="title" href="<?=getLinkSort(3)?>">Tên </a></td>
                                    <td width="54" align="center"><a class="title" href="<?=getLinkSort(10)?>">NL </a></td>
                                    <td width="73" align="center"><a class="title" href="<?=getLinkSort(15)?>">Duyệt</a></td>
                                    <td width="73" align="center"><a class="title" href="<?=getLinkSort(15)?>">Up</a></td>
    
                                    <td width="73" align="center"><a class="title" href="<?=getLinkSort(15)?>">Tiêu biểu</a></td>
    
                                    <td width="65" align="center"><span class="title"><a class="title" href="<?=getLinkSort(11)?>">Ẩn hiện</a></span></td>
    
                                    <td width="92" align="center"><a class="title" href="<?=getLinkSort(12)?>">Ngày đăng</a></td>                                        
    
                                    <td align="center">
    
                                        Công cụ
    
                                    </td>
    
                                </tr>
    
                            </thead>
    
                            <tbody>
    
                            <?
    
                            $sortby="order by id $ks";
    
                            if ($_REQUEST['sortby']!='') $sortby="order by ".(int)$_REQUEST['sortby'];
    
                            $direction=($_REQUEST['direction']==''||$_REQUEST['direction']=='0'?"desc":"");
    
                            
    
                           $sql="select *,DATE_FORMAT(date_added,'%d/%m/%Y %h:%i') as dateAdd,DATE_FORMAT(last_modified,'%d/%m/%Y %h:%i') as dateModify,DATE_FORMAT(date_up,'%d/%m/%Y %h:%i') as dateUp from tbl_rv_item where  $where $sortby  limit ".($startRow).",".$pageSize;
    
                            $result=mysql_query($sql,$conn);
    
                            $i=0;
    
                            while($row=mysql_fetch_array($result)){
    
                            $parent = getRecord('tbl_rv_item','id = '.$row['parent']);
    
                            $color = $i++%2 ? "#d5d5d5" : "#e5e5e5";
    
                            ?>
    
                                <tr>
    
                                    <td align="center">
    
                                        <input  class="chon"  type="checkbox" name="chk[]" value="<?=$row['id']?>"/>
    
                                    </td>
    
                                    <td align="center">
    
                                        <?=$row['id']?>
    
                                    </td>
    
                                    <td align="center">
    
                                         <?php if($row['image']==true){ ?>
    
                                        <a onclick="positionedPopup (this.href,'myWindow','500','400','100','400','yes');return false" href="<?=$row['hinh1']?>" title="Click vào xem ảnh">
    
                                        <img src="../<?=$row['image']?>" width="80" height="80" border="0" class="hinh" />
    
                                        </a>
    
                                      <?php }else{?>
    
                                        <img src="../<?php echo $noimgs; ?>" width="80" height="80" border="0" class="hinh" />
    
                                      <?php }?>
    
                                    </td>
    
                                    <td align="left" style=" padding:5px;">
                                        <font style="font-size:15px; font-weight:bold;"><?=$row['name']?>  </font><br /><a href="http://giathinhcantho.com/<?=$row['subject']?>.html" target="_blank"> Xem tin </a><br />
                                        <p>
                                        Người đăng: <?php if($row['iduser']!=0) echo get_field('tbl_users','id',$row['iduser'],'username');else echo "Admin";?> &nbsp;
                                        <? if(get_field('tbl_users','id',$row['iduser'],'idgroup')==2) echo "( Nhập liệu ) ";?>
                                        </p>
                                        <p>
                                         Người duyệt: <?php if($row['idmod']!=0) echo get_field('tbl_users','id',$row['idmod'],'username');?> &nbsp; - Ngày duyệt: <? if($row['date_actived']!="") echo $row['date_actived'];?>
                                         </p>
                                         <p>
                                         Up: <?=$row['dateUp']?>
                                         </p>
									</td>
                                    <td align="center">
    
                                        <? if($row['type']==1) {?>
                                        <img src="images/warning.png" width="25" height="25"   title="Ẩn hiện" value="<?=$row['id']?>" />
                                        <?php }else echo "_";?>
    
                                    </td>
                                    <td align="center"><span class="smallfont"><img src="images/cert_<?=$row['active']?>.png" width="25" height="25" class="certi" title="Ẩn hiện" value="<?=$row['id']?>" /></span></td>
                                    <td align="center"><span class="smallfont"><img src="images/up_1.png" width="25" height="25" class="up" title="Ẩn hiện" value="<?=$row['id']?>" /></span></td>
    
                                    <td align="center"><span class="smallfont"><img src="images/noibat_<?=$row['hot']?>.png" alt="" width="25" height="25" class="hot" title="Tiêu biểu" value="<?=$row['id']?>" /></span></td>
    
                                    <td align="center"><span class="smallfont"><img src="images/anhien_<?=$row['status']?>.png" width="25" height="25" class="anhien" title="Ẩn hiện" value="<?=$row['id']?>" /></span></td>
    
                                    <td align="center">
    
                                        <?=$row['dateAdd']?> <br />
                                        <?=$row['dateModify']?><br /> 
                                    </td>                                        
    
                                    <td align="center">
    									 <? if(userPermissEdit($row_tbl_users['listEdit'],2,3)==true ||  $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                        <a href="admin.php?act=bds_m&cat=<?=$_REQUEST['cat']?>&page=<?=$_REQUEST['page']?>&id=<?=$row['id']?>"><img src="images/icon3.png"/></a>
                                        <?php }?>
    									 <? if(userPermissEdit($row_tbl_users['listEdit'],2,4)==true ||  $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                        <a  title="Xóa" href="admin.php?act=bds&action=del&page=<?=$_REQUEST['page']?>&id=<?=$row['id']?>" onclick="return confirm('Bạn có muốn xoá luôn không ?');" ><img src="images/icon4.png" width="20" border="0" /></a>
    									<?php }?>
                                    </td>
    
                                </tr>
    
                             <?php }?>  
                                <tr>
                                    <td  class="PageNext" colspan="11" align="center" valign="middle">
                                        <div style="padding:5px;">
                                        <?php echo pagesLinks($totalRows,$pageSize);// Trang đầu,  Trang kế, tang trước, trang cuối ??>
                                        </div>
                                    </td>  							  
                                </tr>
                               
    
                            </tbody>
    
                            
    
                        </table>
                    </form>
                
             
                </div>
            </div>
        </div>
    </div>
</div>