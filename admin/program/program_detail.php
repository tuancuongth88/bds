<?php
if(isset($frame)==true){
	if($_SESSION['kt_login_level']!=4 && $_SESSION['kt_login_level']!=-1){
		 header("location: admin.php");
	}
}else{
	header("location:admin.php");
}
$aaa=0;
if (isset($_REQUEST['idpro'])==true && isset($_REQUEST['btnSave'])==true )//isset kiem tra submit
{
    $link          = isset($_POST['link']) ? trim($_POST['link']) : '';
	$name          = isset($_POST['name']) ? trim($_POST['name']) : '';
	$username      = isset($_POST['username']) ? trim($_POST['username']) : '';
	$passCus       = isset($_POST['passCus']) ? trim($_POST['passCus']) : '';
	$repassword    = isset($_POST['repassword']) ? trim($_POST['repassword']) : '';
	$mobile        = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
	$email         = isset($_POST['email']) ? trim($_POST['email']) : '';
	$emailLe       = isset($_POST['emailLe']) ? trim($_POST['emailLe']) : '';
	$address       = isset($_POST['address']) ? trim($_POST['address']) : '';
	$addressset    = isset($_POST['addressset']) ? trim($_POST['addressset']) : '';
	$packet        = isset($_POST['packet']) ? trim($_POST['packet']) : '';
	$name          = isset($_POST['name']) ? trim($_POST['name']) : '';
	$ghichu        = isset($_POST['ghichu']) ? trim($_POST['ghichu']) : '';
	$device       = isset($_POST['device']) ? $_POST['device'] : 1;
	
	$date=isset($_POST['date']) ? trim($_POST['date']) : '';
	$dateadd=date("Y-m-d", strtotime(str_replace('/', '-', $date)));
	$date=str_replace('/', '-', $date);
	if($packet==1) $date=date("Y-m-d", strtotime($date." + 3 month"));
	elseif($packet==2) $date=date("Y-m-d", strtotime($date." + 6 month"));
	elseif($packet==3) $date=date("Y-m-d", strtotime($date." + 12 month"));
	elseif($packet==4) $date=date("Y-m-d", strtotime($date." + 1 month"));
 
	$aaa=1;

	if ($errMsg==''){
		 
			 $sql = "insert into jbs_service (  name , username, passCus, cate , link ,  mobile , emailLe , emailCus, address , addressSetup , device , packet , note ,   date_Expr ,  date_added, last_modified) values ('".$name."','".$username."','".$passCus."',2,'".$link."','".$mobile."','".$emailLe."','".$email."','".$address."','".$addressset."','".$device."','".$packet."','".$ghichu."','".$date."','".$dateadd."',now())";
		 
		if (mysql_query($sql,$conn)){
			if(empty($_POST['id'])) $oldid = mysql_insert_id();
			$r = getRecord("jbs_service","id=".$oldid);
  
		}else{
			$errMsg = "Không thể cập nhật !";
		}
	}

	if ($errMsg == '') {
		 echo '<script>window.location="admin.php?act=program_detail&idpro='.$_REQUEST['idpro'].'"</script>' ;
	}
}
 
 

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
                                        <td width="150" align="center">
                                            <input type="checkbox" name="chkall" onClick="chkallClick(this);"/>
                                        </td>
                                        <!--<td width="10%" align="center"><a class="title" href="<?=getLinkSort(10)?>">Hình ảnh</a></td>-->
                                        <td width="414" align="center"><a class="title" href="<?=getLinkSort(12)?>">Tài khoản</a></td>
                                        <td width="508" align="center"><a class="title" href="<?=getLinkSort(12)?>">Khách hàng</a></td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
								$oldid=$_GET['idpro'];
							    $sql = "select * from jbs_service where id='".$oldid."'";
								$a = mysql_query($sql,$conn);
								$parent=mysql_fetch_assoc($a);
								?>
                                    <tr>
                                        <td align="center">
                                            <input type="checkbox" name="chk[]" value="<?=$row['id']?>"/>
                                            <style>
											.ngay_t { width:100px; display:block; float:left; font-weight:bold; }
											.ngay_tt { /*width:200px;*/ display:block;float:left;}
											.ngay_tt a { color:#3d9b20;}
											</style>
                                        </td>
                                        <td align="left" valign="top">
                                          <div>
                                         Link cài: <a href="<?=$parent['link']?>"  target="_blank">
                                          <?=$parent['link']?>
                                          </a><br />
                                          <br />
                                          <span class="ngay_t"> Gói </span><span class="ngay_tt"> :
                                            <? if($parent['packet']==1) echo '3 Tháng';elseif($parent['packet']==2) echo "6 Tháng";elseif($parent['packet']==3) echo "12 Tháng";?>
                                            </span> <br />
                                          <span class="ngay_t"> Thiết bị </span> <span class="ngay_tt"> :
                                            <? if($parent['device']==1) echo 'Iphone';elseif($parent['device']==2) echo "Android";elseif($parent['device']==3) echo "Symbian";elseif($parent['device']==4) echo "Blackberry";?>
                                            </span> <br />
                                          <br />
                                          <span class="ngay_t"> Username </span><span class="ngay_tt"> :
                                            <?=$parent['username']?>
                                            </span><br />
                                          <span class="ngay_t"> Email </span><span class="ngay_tt"> :
                                            <?=$parent['emailLe']?>
                                            </span><br />
                                          <span class="ngay_t"> Pass </span><span class="ngay_tt"> :
                                            <?=$parent['passCus']?>
                                            </span> <br />
                                          <br />
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
                                            </span><br />
                                          <br />
                                          <hr />
                                          <div  style="padding:5px;">
                                          <a style="color:#3C3" href="admin.php?act=program_m&amp;cat=&amp;page=&amp;id=<?=$parent['id'] ?>"  > Sửa tài khoản </a>&nbsp;&nbsp;&nbsp;&nbsp;  <a  style="color:#09C" class="them_t" target="_blank"> Thêm khách hàng </a>
                                          </div>
                                          <hr />
                                          </div>
                                          <br />
                                          <script>
											$(document).ready(function() {
												<?php
												if($aaa==1){
												?>
												$('.themcus').css('display','block');
												<? } ?>
												$(".them_t").click(function(){
													$('.themcus').css('display','block');
												})	
											})
											</script>
                                            <style>
											.themcus input { height:20px; background:#E6E6E6;}
											</style>
                                          <div  class="themcus" style="display:none;">
                                            <form method="post" name="frmForm" enctype="multipart/form-data" action="admin.php?act=program_detail&idpro=<?=$_REQUEST['idpro']?>">
                                                <input type="hidden" name="act" value="program_detail">
                                                <input type="hidden" name="id" value="<?=$_REQUEST['id']?>">
                                                <input type="hidden" name="page" value="<?=$_REQUEST['page']?>">
                                                                       
                                               <table  class="table_chinh">
                                                   <tr>
                                                     <td valign="middle"  class="table_chu">&nbsp;</td>
                                                     <td valign="middle">&nbsp;</td>
                                                   </tr>
                                                    
                                                   <tr>
                                                       <td valign="middle" width="30%">
                                                           Email  <span class="sao_bb">*</span>
                                                       </td>
                                                       <td valign="middle" width="70%">
                                                       	   <input  name="emailLe" id="emailLe" value="<?=$parent['emailLe']?>"  type="hidden"  class="table_khungnho"/>
                                                           <input name="email" type="text" class="table_khungnho" id="email" value="<?=$email?>"/>
                                                       </td>
                                                   </tr>
                                                   <tr>
                                                       <td valign="middle" width="30%">Password<span class="sao_bb">*</span>
                                                       </td>
                                                       <td valign="middle" width="70%"><input name="passCus" type="text" class="table_khungnho" id="passCus" value="<?=$passCus?>"/></td>
                                                   </tr>
                                                                             
                                                   <tr>
                                                       <td valign="middle" width="30%">Họ và tên<span class="sao_bb">*</span>
                                                       </td>
                                                       <td valign="middle" width="70%"><input name="name" type="text" class="table_khungnho" id="name" value="<?=$name?>"/></td>
                                                   </tr>
                                                   <tr>
                                                       <td valign="middle" width="30%">Điện thoại<span class="sao_bb">*</span>
                                                       </td>
                                                       <td valign="middle" width="70%"><input name="mobile" type="text" class="table_khungnho" id="mobile" value="<?=$mobile?>"/></td>
                                                   </tr>
                                                    <tr>
                                                       <td valign="middle" width="30%">Điạ chỉ<span class="sao_bb">*</span>
                                                       </td>
                                                       <td valign="middle" width="70%"><input name="address" type="text" class="table_khungnho" id="address" value="<?=$address?>"/></td>
                                                   </tr>
                                                   <tr>
                                                       <td valign="middle" width="30%">Nơi cài<span class="sao_bb">*</span>
                                                       </td>
                                                       <td valign="middle" width="70%"><input name="addressset" type="text" class="table_khungnho" id="addressset" value="<?=$addressset?>"/>
                                                       <input name="device" id="device" type="hidden"  value="<?=$parent['device']?>" />
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
                                                                                     
                                                            <option value="4" <?php if($packet==4) echo 'selected="selected"';?> > 1 Tháng </option>
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
                                          </td>
                                      <td align="left" valign="top"> 
                                         <?php
											$bds=get_records("jbs_service","cate=2 and emailLe='".$parent['emailLe']."'","id DESC"," "," ");
											while($row=mysql_fetch_assoc($bds)){
										?>
                                          <div  >
                                          <table width="100%" border="1" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="65%">
                                            <span class="ngay_t"> Gói </span><span class="ngay_tt"> :
                                                <? if($row['packet']==1) echo '3 Tháng';elseif($row['packet']==2) echo "6 Tháng";elseif($row['packet']==3) echo "12 Tháng";elseif($row['packet']==4) echo "1  Tháng";?>
                                                </span> <br />
                                            <br />
                                              <span class="ngay_t"> Email KH </span><span class="ngay_tt"> :
                                                <?=$row['emailCus']?>
                                                </span><br />
                                              <span class="ngay_t"> Pass </span><span class="ngay_tt"> :
                                                <?=$row['passCus']?>
                                                </span> <br />
                                              <br />
                                              <br />
                                              <span class="ngay_t"> Họ và tên</span><span class="ngay_tt"> :
                                                <?=$row['name']?>
                                                </span><br />
                                              <span class="ngay_t"> Điện thoại </span><span class="ngay_tt"> :
                                                <?=$row['mobile']?>
                                                </span><br />
                                              <span class="ngay_t"> Địa chỉ </span><span class="ngay_tt"> :
                                                <?=$row['address']?>
                                                </span><br />
                                              <span class="ngay_t"> Địa chỉ cài </span><span class="ngay_tt"> :
                                                <?=$row['addressSetup']?>
                                                </span><br /><br />
                                            </td>
                                            <td>
                                            	 <strong >Ghi chú:</strong> <br />
                                                    <div style="padding:5px;">
                                                        <?=$row['note']?>
                                                        <br /> <hr />
                                                    </div>
                                                    <p><br />
                                                      <span class="ngay_t">Ngày hết hạn</span><span class="ngay_tt"> : <strong style="color:#06F;">
                                                        <?=date("d/m/Y",strtotime($row['date_Expr']))?>
                                                        </strong></span><br />
                                                      <span class="ngay_t">Ngày tạo</span><span class="ngay_tt"> :
                                                        <?=date("d/m/Y",strtotime($row['date_added']))?>
                                                        </span><a href="admin.php?act=programcus_m&amp;cat=&amp;page=&amp;id=<?=$row['id'] ?>" target="_blank"></a><br />
                                                    </p>
                                                	<br /> <br /><br />
                                                  <div style="text-align:right;"> <a href="admin.php?act=programcus_m&amp;cat=&amp;page=&amp;id=<?=$row['id'] ?>"> Sửa  </a>&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;&nbsp; <a href="ddd"> xoá </a></div>
                                            </td>
                                          </tr>
                                        </table>

                                              
                                              
                                             
                                          <div style="clear:both; float:none;"> <hr style="margin:5px;" /> </div>
                                          </div>
                                          <?php }?>
                                          
                                          
                                      </td>
                                    </tr>
                               
                                   
                                </tbody>
                                <thead>
                                    <tr>
                                        <td colspan="3"> <center> <div class="PageNum"> <?php echo pagesListLimit($totalRows,$pageSize);?> </div> </center></td>
                                    </tr>
                                </thead>
                                
                            </table>
                    
                
             
                </div>
            </div>
        </div>
    </div>
</div>