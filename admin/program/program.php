<?php
if(isset($frame)==true){
	if($_SESSION['kt_login_level']!=4 && $_SESSION['kt_login_level']!=-1){
		  header("location: admin.php");
	}
}else{
	header("location:admin.php");
}

if (isset($_POST['tim'])==true)//isset kiem tra submit
{
	if($_POST['tukhoa']!=NULL){$tukhoa=$_POST['tukhoa'];}else {$tukhoa="";}
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

if($_GET['packet']==NULL){$packet=-1;$_SESSION['kt_packet']=$packet;}
if($_GET['packet']!=NULL){$packet=$_GET['packet'];$_SESSION['kt_packet']=$packet;}
settype($packet,"int");

if($_GET['device']==NULL){$device=-1;$_SESSION['kt_device']=$device;}
if($_GET['device']!=NULL){$device=$_GET['device'];$_SESSION['kt_device']=$device;}
settype($device,"int");

if($_GET['noibat']==NULL){$noibat=-1;$_SESSION['kt_noibat']=$noibat;}
if($_GET['noibat']!=NULL){$noibat=$_GET['noibat'];$_SESSION['kt_noibat']=$noibat;}
settype($noibat,"int");
 
if($tang==0){$ks='ASC';}//0 tang
elseif($tang==1){$ks='DESC';}//1 giam
else $ks='DESC';
 

?>
<script>
$(document).ready(function() {	
		//dao trang thai an hien
	<?php 
if(userPermissEdit($row_jbs_service['listEdit'],19,7 )==true  ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1){
?>
	$("img.anhien").click(function(){

	id=$(this).attr("value");

	obj = this;

		$.ajax({

		   url:'field.php',

		   data: 'id='+ id +'&table=jbs_service' +'&type=1&cate=19',

		   cache: false,

		   success: function(data){ //alert(idvnexpres);

			obj.src=data;

			if (data=="images/anhien_1.png") obj.title="Nhắp vào để ẩn";

			else obj.title="Nhắp vào để hiện";

		  }

		});

	});
	
	$("img.spam").click(function(){

	id=$(this).attr("value");

	obj = this;

		$.ajax({

		   url:'field.php',

		   data: 'id='+ id +'&table=jbs_service' +'&type=5&cate=19',

		   cache: false,

		   success: function(data){ //alert(idvnexpres);

			obj.src=data;

			if (data=="images/anhien_1.png") obj.title="Nhắp vào để ẩn";

			else obj.title="Nhắp vào để hiện";

		  }

		});

	});
<?php }?>
	
 
	
	$("#chkall").click(function(){
		var status=this.checked;
		$("input[class='tai_c']").each(function(){this.checked=status;})
	});
	
});
</script>
<? if ($_REQUEST['code']==1) $errMsg = 'Cập nhật thành công.'?>
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
                        if(userPermissEdit($row_jbs_service['listEdit'],19,4)==true ||  $_SESSION['kt_login_level']==4  ||   $_SESSION['kt_login_level']==-1  ){
							switch ($_GET['action']){ // luu y lai viec xoa user: hinh anh, cac du lieu ve shop
								case 'del' :
									$id = $_GET['id'];
									$r = getRecord("jbs_service","id=".$id);
									 
									@$result = mysql_query("delete from jbs_service where id='".$id."'",$conn);
									if ($result){
										if(file_exists('../'.$r['image'])) @unlink('../'.$r['image']);
										if(file_exists('../'.$r['image_large'])) @unlink('../'.$r['image_large']);
										$errMsg = "Đã xóa thành công.";
									}else $errMsg = "Không thể xóa dữ liệu !";
								
							}
							
							if (isset($_POST['btnDel'])){
								$cntDel=0;
								$cntNotDel=0;
								$cntParentExist=0;
								if($_POST['chk']!=''){
									foreach ($_POST['chk'] as $id){
										$r = getRecord("jbs_service","id=".$id);
									 
										@$result = mysql_query("delete from jbs_service where id='".$id."'",$conn);
										if ($result){
											if(file_exists('../'.$r['image'])) @unlink('../'.$r['image']);
											if(file_exists('../'.$r['image_large'])) @unlink('../'.$r['image_large']);
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
                        $pageSize = 15;
                        $pageNum = 1;
                        $totalRows = 0;
                        
                        if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
                        if ($pageNum<=0) $pageNum=1;
                        $startRow = ($pageNum-1) * $pageSize;
                    
                        $where="1=1 and (id='{$tukhoa}' or emailLe LIKE '%$tukhoa%' or emailCus LIKE '%$tukhoa%' or mobile LIKE '%$tukhoa%' or username LIKE '%$tukhoa%' or mobile LIKE '%$tukhoa%' or name LIKE '%$tukhoa%' or '{$tukhoa}'=-1)   ";
					 
                        $where.="AND cate=1 AND ( packet='{$packet}' or '{$packet}'=-1)  AND ( device='{$device}' or '{$device}'=-1)";
						
                        $MAXPAGE=1;
                        $totalRows=countRecord("jbs_service",$where);
                        
                        if ($_REQUEST['cat']!='') $where="parent=".$_REQUEST['cat']; ?>
                        <form method="POST" action="admin.php?act=program" name="frmForm" enctype="multipart/form-data">
                            <input type="hidden" name="page" value="<?=$page?>">
                            <input type="hidden" name="act" value="program">
                        	 
                           <table width="100%"  class="admin_table">

                            <thead>
    
                                <tr align="center" >
                                  <td valign="middle"  colspan="5">
                                    <center>
                                        <div class="table_chu_tieude"><strong>Account</strong></div>
                                    </center>
                                   </td>
                                </tr>
                                <tr align="center" >
                                  <td valign="middle" style="background-color:#F0F0F0; height:40px; padding-left:20px" colspan="5"><input class="table_khungnho"  name="tukhoa" id="tukhoa" type="text" value="<?=$tukhoa?>"  placeholder="Từ khóa" />
                                        <input name="tim" type="submit" class="nut_table" id="tim" value="Tìm kiếm"/>
                                        <input type="submit" name="reset" class="nut_table" value="Reset" title=" Reset " />
                                 
                                  
                                  </td>
                                </tr>
                                <tr >
                                  <td valign="middle" align="left" style="background-color:#F0F0F0; height:40px; padding-left:20px" colspan="5"> 
                                        <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($packet==0  &&  $device==0) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=program&packet=-1&device=-1">Tất cả</a>
                                        </div>
                                        
                                        <div class="link_loc" style="width:80px; text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($packet==1) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>" >
                                        	<a href="admin.php?act=program&packet=1&device=<?php echo $_SESSION['kt_device'] ?>">3 tháng</a>
                                        </div>
                                        <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($packet==2) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=program&packet=2&device=<?php echo $_SESSION['kt_device'] ?>">6 tháng</a>
                                        </div>
                                       <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($packet==3) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=program&packet=3&device=<?php echo $_SESSION['kt_device'] ?>">12 tháng</a>
                                        </div>
                                         <div class="link_loc" style="width:120px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($device==1) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=program&packet=<?php echo $_SESSION['kt_packet'] ?>&device=1"> Iphone</a>
                                        </div>
                                         <div class="link_loc" style="width:120px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($device==2) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=program&packet=<?php echo $_SESSION['kt_packet'] ?>&device=2"> Android</a>
                                        </div>
                                          <div class="link_loc" style="width:120px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($device==3) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=program&packet=<?php echo $_SESSION['kt_packet'] ?>&device=3"> Symbian</a>
                                        </div>
                                         <div class="link_loc" style="width:120px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($device==4) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=program&packet=<?php echo $_SESSION['kt_packet'] ?>&device=4"> Backberry</a>
                                        </div>
                                  </td>
                                </tr>
                               <tr>
                                  <td align="center" colspan="2">
                                  <? if( $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                  <input type="submit" value="Xóa chọn" name="btnDel" onClick="return confirm('Bạn có chắc chắn muốn xóa ?');" class="button">
                                  <? } ?>
                                  </td>
                                 <td align="center" class="PageNum" colspan="2" height="30">
                                    	<?php echo pagesListLimit($totalRows,$pageSize);?>   
                                  </td>
                                  
                                 <td width="127" align="center" colspan="1">
                                 <? if(  $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                  <div><a href="admin.php?act=program_m">
                                  <img width="48" height="48" border="0" src="images/them.png">
                                  </a></div>
                                <? } ?>
                                </td>
                                </tr>
                                <tr class="admin_tieude_table">
                                        <td width="51" align="center">
                                            <input type="checkbox" name="chkall" onClick="chkallClick(this);"/>
                                        </td>
                                        <td width="77" align="center">
                                            STT
                                        </td>
                                        <!--<td width="10%" align="center"><a class="title" href="<?=getLinkSort(10)?>">Hình ảnh</a></td>-->
                                        <td width="164" align="center">Thông tin</td>
                                        <td width="159" align="center"><a class="title" href="<?=getLinkSort(12)?>">Ngày</a></td>
                                        <td width="127" align="center">
                                            Công cụ
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?
                                $sortby="order by id DESC";
                                if ($_REQUEST['sortby']!='') $sortby="order by ".(int)$_REQUEST['sortby'];
                                $direction=($_REQUEST['direction']==''||$_REQUEST['direction']=='0'?"desc":"");
                                
                                $sql="select *,DATE_FORMAT(date_added,'%d/%m/%Y %h:%i') as dateAdd,DATE_FORMAT(last_modified,'%d/%m/%Y %h:%i') as dateModify from jbs_service where  $where $sortby   limit ".($startRow).",".$pageSize;
                                $result=mysql_query($sql,$conn);
                                $i=0;
                                while($row=mysql_fetch_array($result)){
                                $parent = getRecord('jbs_service','id = '.$row['parent']);
                                $color = $i++%2 ? "#d5d5d5" : "#e5e5e5";
                                ?>
                                    <tr>
                                        <td align="center">
                                            <input type="checkbox" name="chk[]" value="<?=$row['id']?>"/>
                                            <style>
											.ngay_t { width:100px; display:block; float:left; font-weight:bold;}
											.ngay_tt { width:200px; display:block;float:left;}
											</style>
                                        </td>
                                        <td align="center">
                                            <?=$row['id']?>
                                        </td>
                                        <td align="left">
                                        Link cài: <a href="<?=$row['link']?>"  target="_blank"> <?=$row['link']?> </a><br /><br />
                                        <span class="ngay_t"> Gói </span><span class="ngay_tt"> : <? if($row['packet']==1) echo '3 Tháng';elseif($row['packet']==2) echo "6 Tháng";elseif($row['packet']==3) echo "12 Tháng";?></span> <br /> 
                                        <span class="ngay_t"> Thiết bị </span> <span class="ngay_tt"> : <? if($row['device']==1) echo 'Iphone';elseif($row['device']==2) echo "Android";elseif($row['device']==3) echo "Symbian";elseif($row['device']==4) echo "Blackberry";?></span> <br />
                                        <br />
                                        <span class="ngay_t">  Username </span><span class="ngay_tt"> : <?=$row['username']?> </span><br />
                                         <span class="ngay_t"> Email </span><span class="ngay_tt"> : <?=$row['emailLe']?> </span><br />
                                         <span class="ngay_t"> Pass </span><span class="ngay_tt"> : <?=$row['passCus']?></span> <br /><br />
                                        
                                        <strong >Ghi chú:</strong> <br />
                                        <div style="padding:5px;">
                                        <?=$row['note']?>
                                        </div>
                                        </td>
                                        <td align="left">
                                        <?
					 				$startTimeStamp = strtotime(date("Y/m/d"));
									$endTimeStamp = strtotime(date("Y/m/d",strtotime($row['date_Expr'])));
									
									$timeDiff = abs($endTimeStamp - $startTimeStamp);
									
									$numberDays = $timeDiff/86400;  // 86400 seconds in one day
									
									// and you might want to convert to integer
									$numberDays = intval($numberDays);
										?>
                                        <p> <span class="ngay_t"> Ngày còn lại </span>
                                          <span class="ngay_tt" > : <strong style="color:#06F;"> <?=$numberDays?> </strong></span>
                                        </p>

                                        <p> <span class="ngay_t"> Ngày hết hạn </span>
                                          <span class="ngay_tt" > : <strong style="color:#06F;"> <?=date("d/m/Y",strtotime($row['date_Expr']))?> </strong></span>
                                        </p>
                                        <p><span class="ngay_t">Ngày tạo</span>
                                          <span class="ngay_tt" > : <?=$row['dateAdd']?></span>
                                        </p>
                                          <p><span class="ngay_t">Ngày sửa</span>
                                           <span class="ngay_tt" > : <?=$row['dateModify']?></span>
                                        </p></td>
                                        <td align="center">
                                        	<a href="admin.php?act=program_detail&idpro=<?=$row['id']?>"> Xem chi tiết </a>&nbsp;
                                            <a href="admin.php?act=program_m&cat=<?=$_REQUEST['cat']?>&page=<?=$_REQUEST['page']?>&id=<?=$row['id']?>"><img src="images/icon3.png"/></a>&nbsp;
                                         
                                            <a  title="Xóa" href="admin.php?act=program&action=del&page=<?=$_REQUEST['page']?>&id=<?=$row['id']?>" onclick="return confirm('Bạn có muốn xoá luôn không ?');" ><img src="images/icon4.png" width="20" border="0" /></a>
                                          
                                        </td>
                                    </tr>
                                 <?php }?>  
                                   
                                </tbody>
                                <thead>
                                    <tr>
                                        <td colspan="5"> <center> <div class="PageNum"> <?php echo pagesListLimit($totalRows,$pageSize);?> </div> </center></td>
                                    </tr>
                                </thead>
                                
                            </table>
                        </form>
                
             
                </div>
            </div>
        </div>
    </div>
</div>