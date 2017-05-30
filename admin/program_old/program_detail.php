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
                    
                    
						 
                
                        <form method="POST" action="admin.php?act=programcus" name="frmForm" enctype="multipart/form-data">
                            <input type="hidden" name="page" value="<?=$page?>">
                            <input type="hidden" name="act" value="programcus">
                        	 
                           <table width="100%"  class="admin_table">

                            <thead>
    
                                <tr align="center" >
                                  <td valign="middle"  colspan="3">
                                    <center>
                                        <div class="table_chu_tieude"><strong>Thông tin</strong></div>
                                    </center>
                                   </td>
                                </tr>
                               <tr>
                                  <td align="center">
                                  <? if( $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                   
                                  <? } ?>
                                  </td>
                                 <td align="center" class="PageNum" colspan="2" height="30">
                                    	<?php echo pagesListLimit($totalRows,$pageSize);?>   
                                  </td>
                                </tr>
                                <tr class="admin_tieude_table">
                                        <td width="51" align="center">
                                            <input type="checkbox" name="chkall" onClick="chkallClick(this);"/>
                                        </td>
                                        <!--<td width="10%" align="center"><a class="title" href="<?=getLinkSort(10)?>">Hình ảnh</a></td>-->
                                        <td width="164" align="center">Khách hàng</td>
                                        <td width="159" align="center"><a class="title" href="<?=getLinkSort(12)?>">Tài khoản</a></td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
								$oldid=$_GET['idpro'];
							    $sql = "select * from jbs_service where id='".$oldid."'";
								$a = mysql_query($sql,$conn);
								$row=mysql_fetch_assoc($a);
								?>
                                    <tr>
                                        <td align="center">
                                            <input type="checkbox" name="chk[]" value="<?=$row['id']?>"/>
                                            <style>
											.ngay_t { width:100px; display:block; float:left; font-weight:bold; }
											.ngay_tt { width:200px; display:block;float:left;}
											.ngay_tt a { color:#3d9b20;}
											</style>
                                        </td>
                                        <td align="left">
                                        <?
                                        $parent = getRecord('jbs_service',"emailLe ='".$row['emailLe']."' and cate=1");
										?>
                                         <br /><br />
                                        <span class="ngay_t"> Gói </span><span class="ngay_tt"> : <? if($row['packet']==1) echo '3 Tháng';elseif($row['packet']==2) echo "6 Tháng";elseif($row['packet']==3) echo "12 Tháng";?></span> <br /> 
                                        <span class="ngay_t"> Thiết bị </span> <span class="ngay_tt"> : <? if($row['device']==1) echo 'Iphone';elseif($row['device']==2) echo "Android";elseif($row['device']==3) echo "Symbian";elseif($row['device']==4) echo "Blackberry";?></span> <br />
                                        <br />
                                        <span class="ngay_t">  Tài khoản </span><span class="ngay_tt"> :<a href="admin.php?act=program_m&cat=&page=&id=<?=$parent['id'] ?>" target="_blank"> <?=$row['emailLe']?> </a></span><br />
                                        <span class="ngay_t"> Email Sử dụng </span><span class="ngay_tt"> : <?=$row['emailCus']?> </span><br />
                                        <span class="ngay_t"> Pass </span><span class="ngay_tt"> : <?=$row['passCus']?></span> <br /><br />
                                        <br />
                                        <span class="ngay_t">  Họ và tên</span><span class="ngay_tt"> : <?=$row['name']?> </span><br />
                                         <span class="ngay_t">  Điện thoại </span><span class="ngay_tt"> : <?=$row['mobile']?> </span><br />
                                         <span class="ngay_t">  Địa chỉ </span><span class="ngay_tt"> : <?=$row['address']?> </span><br />
                                         <span class="ngay_t">  Địa chỉ cài </span><span class="ngay_tt"> : <?=$row['addressSetup']?> </span><br />
                                        
                                        <strong >Ghi chú:</strong> <br />
                                        <div style="padding:5px;">
                                        <?=$row['note']?>
                                        </div>
                                        
                                         <p><br />
                                           <span class="ngay_t">Ngày hết hạn</span><span class="ngay_tt"> : <strong style="color:#06F;">
                                           <?=date("d/m/Y",strtotime($row['date_Expr']))?>
                                           </strong></span><br />
                                           <span class="ngay_t">Ngày tạo</span><span class="ngay_tt"> : 
                                           <?=date("d/m/Y",strtotime($row['date_added']))?>
                                          </span></p>
                                          <br /><br />
                                         <a href="admin.php?act=programcus_m&amp;cat=&amp;page=&amp;id=<?=$row['id'] ?>" target="_blank">Sửa thông tin </a><br />
                                          
                                         
                                        </td>
                                        <td align="left" valign="top">
                                        	 Link cài: <a href="<?=$parent['link']?>"  target="_blank"> <?=$parent['link']?> </a><br /><br />
                                        <span class="ngay_t"> Gói </span><span class="ngay_tt"> : <? if($parent['packet']==1) echo '3 Tháng';elseif($parent['packet']==2) echo "6 Tháng";elseif($parent['packet']==3) echo "12 Tháng";?></span> <br /> 
                                        <span class="ngay_t"> Thiết bị </span> <span class="ngay_tt"> : <? if($parent['device']==1) echo 'Iphone';elseif($parent['device']==2) echo "Android";elseif($parent['device']==3) echo "Symbian";elseif($parent['device']==4) echo "Blackberry";?></span> <br />
                                        <br />
                                        <span class="ngay_t">  Username </span><span class="ngay_tt"> : <?=$parent['username']?> </span><br />
                                         <span class="ngay_t"> Email </span><span class="ngay_tt"> : <?=$parent['emailLe']?> </span><br />
                                         <span class="ngay_t"> Pass </span><span class="ngay_tt"> : <?=$parent['passCus']?></span> <br /><br />
                                        
                                        <strong >Ghi chú:</strong> <br />
                                        <div style="padding:5px;">
                                        <?=$parent['note']?>
                                        </div>
                                        <br />
                                         <span class="ngay_t">Ngày hết hạn</span><span class="ngay_tt"> : <strong style="color:#06F;">
                                         <?=date("d/m/Y",strtotime($parent['date_Expr']))?>
                                         </strong></span><br />
                                         <span class="ngay_t">Ngày tạo</span><span class="ngay_tt"> : 
                                         <?=date("d/m/Y",strtotime($parent['date_added']))?>
                                         </span><br /><br />
                                         <a href="admin.php?act=program_m&cat=&page=&id=<?=$parent['id'] ?>" target="_blank"> Sửa thông tin </a>
                                        </td>
                                    </tr>
                               
                                   
                                </tbody>
                                <thead>
                                    <tr>
                                        <td colspan="3"> <center> <div class="PageNum"> <?php echo pagesListLimit($totalRows,$pageSize);?> </div> </center></td>
                                    </tr>
                                </thead>
                                
                            </table>
                        </form>
                
             
                </div>
            </div>
        </div>
    </div>
</div>