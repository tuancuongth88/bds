<?php
if(isset($frame)==true){
	if($_SESSION['kt_login_level']!=4 && $_SESSION['kt_login_level']!=-1){
		$row_tbl_users=getRecord('tbl_users',"id = '".$_SESSION['kt_login_id']."'");
		if(userPermissEdit($row_tbl_users['listEdit'],21,1)!=true) header("location: admin.php");
	}
 
	
	if($_SESSION['kt_login_level']==3){
	/*	$qCity=$row_tbl_users['listCity'];
		if($qCity=="") $strCity=" AND idcity =10000";
		else $strCity=" AND idcity in ($qCity)";*/
		
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
	
	if($_POST['user']!=NULL){$user=$_POST['user'];}else {$user="";}
	$_SESSION['kt_user_data']=$user;
	
	if($_POST['datebegin']!=NULL){$datebegin=$_POST['datebegin'];}else {$datebegin="";}
	$_SESSION['kt_datebegin']=$datebegin;
	
 	if($_POST['dateend']!=NULL){$dateend=$_POST['dateend'];}else {$dateend="";}
	$_SESSION['kt_dateend']=$dateend;
	
		
}

if (isset($_POST['reset'])==true) {

	$_SESSION['kt_tukhoa_bignew']="";
	$_SESSION['kt_user_data']=-1;
	$_SESSION['kt_datebegin']=""; 
	$_SESSION['kt_dateend']="";
	
}
 
if($_SESSION['kt_user_data']==NULL){$user="";}
if($_SESSION['kt_user_data']!=NULL){$user=$_SESSION['kt_user_data'];}

if($_SESSION['kt_datebegin']==NULL){$datebegin="";}
if($_SESSION['kt_datebegin']!=NULL){$datebegin=$_SESSION['kt_datebegin'];}

if($_SESSION['kt_dateend']==NULL){$kt_dateend="";}
if($_SESSION['kt_dateend']!=NULL){$kt_dateend=$_SESSION['kt_dateend'];}

if($_GET['anhien']==NULL){$anhien=-1;$_SESSION['kt_anhien']=$anhien;}
if($_GET['anhien']!=NULL){$anhien=$_GET['anhien'];$_SESSION['kt_anhien']=$anhien;}
settype($anhien,"int");

if($_GET['tang']==NULL){$tang=-1;$_SESSION['kt_tang']=$tang;}
if($_GET['tang']!=NULL){$tang=$_GET['tang'];$_SESSION['kt_tang']=$tang;}
settype($tang,"int");

if($_GET['noibat']==NULL){$noibat=-1;$_SESSION['kt_noibat']=$noibat;}
if($_GET['noibat']!=NULL){$noibat=$_GET['noibat'];$_SESSION['kt_noibat']=$noibat;}
settype($noibat,"int");
 
if($tang==0){$ks='ASC';}//0 tang
elseif($tang==1){$ks='DESC';}//1 giam
else $ks='DESC';
 

?>
 
<script>
$(document).ready(function() {
	$("#ddCat").change(function(){ 
		var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
		var table="tbl_rv_category";
		$("#ddCatch").load("getChild.php?table="+ table + "&id=" +id); //alert(idthanhpho)
	});
});
</script>
<!--<script src="../lib/autocomplete/jquery-ui.min.js"></script>-->
	<script src="../lib/autocomplete/jquery.select-to-autocomplete.js"></script>
	<script>
	 $(document).ready(function() {
	 
	      $('#user').selectToAutocomplete();
	      /*$('#frmForm').submit(function(){
	        alert( $(this).serialize() );
	        return false;
	      });*/
	    
	  });
	</script>
<!--	<link rel="stylesheet" href="../lib/autocomplete/jquery-ui.css">-->
	<style>
 
    .ui-autocomplete {
      padding: 0;
      list-style: none;
      background-color: #fff;
      width: 218px;
      border: 1px solid #B0BECA;
      max-height: 350px;
      overflow-x: hidden;
    }
    .ui-autocomplete .ui-menu-item {
      border-top: 1px solid #B0BECA;
      display: block;
      padding: 4px 6px;
      color: #353D44;
      cursor: pointer;
    }
    .ui-autocomplete .ui-menu-item:first-child {
      border-top: none;
    }
    .ui-autocomplete .ui-menu-item.ui-state-focus {
      background-color: #D5E5F4;
      color: #161A1C;
    }
	</style>
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

                    $pageSize = 50;
                    $pageNum = 1;
                    $totalRows = 0;
  
                    if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
    
                    if ($pageNum<=0) $pageNum=1;
    
                    $startRow = ($pageNum-1) * $pageSize; 
    				if($datebegin!="") $datebegin=date("Y/m/d",strtotime($datebegin));
					if($dateend!="") $dateend=date("Y/m/d",strtotime($dateend));;
					
					$datebeginold=$datebegin;
					$dateendold=$dateend;
					
                	if($datebegin!="" && $dateend=="") {
						 $strDate=" and ( date_actived >=  '$datebegin')";
					}
					
					if($datebegin=="" && $dateend!="") {
						 $strDate=" and ( date_actived <=  '$dateend')";
					}
					
					if($datebegin!="" && $dateend!="") {
						 $strDate=" and ( date_actived >= '$datebegin' and date_actived <= '$dateend')";
					}
					
					$idu=get_field('tbl_users','username',$user,'id');
					if($idu=="") $idu=-1;	
    
                    $where="1=1 AND cate=3  AND (id='{$tukhoa}' or name LIKE '%$tukhoa%' or '{$tukhoa}'=-1)";
					
					$where.=" AND type=1 AND ( iduser='{$idu}' or '{$idu}'=-1)  and ( Year(date_actived) = Year(CURRENT_TIMESTAMP)  AND Month(date_actived) = Month(CURRENT_TIMESTAMP) )"; 
    
                    //echo $where;
    
                    $MAXPAGE=1;
    
                    $totalRows=countRecord("tbl_rv_item",$where);
    
                    
    
                    if ($_REQUEST['cat']!='') $where="parent=".$_REQUEST['cat']; ?>
    
                    <form method="POST" action="admin.php?act=bdsdn_month" name="frmForm" enctype="multipart/form-data">
    
                    <input type="hidden" name="page" value="<?=$page?>">
    
                    <input type="hidden" name="act" value="bdsdn_month">
    
                    <?
    
                   // $pageadmin = createPage(countRecord("tbl_rv_item",$where),"./?act=shop_category&cat=".$_REQUEST['cat']."&page=",$MAXPAGE,$page)?>
    
    
                    <? if ($_REQUEST['code']==1) $errMsg = 'Cập nhật thành công.'?>
    
    					 
                         <table width="100%"  class="admin_table">

                            <thead>
    
                                <tr align="center" >
                                  <td valign="middle"  colspan="7">
                                    <center>
                                        <div class="table_chu_tieude"><strong>Tin trong tháng</strong></div>
                                    </center>
                                   </td>
                                </tr>
                                <tr align="center" >
                                  <td valign="middle" style="background-color:#F0F0F0; height:40px; padding-left:20px" colspan="7">   
                                  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
									<script>
                                    $(function() {
										$( "#datebegin" ).datepicker();
										$( "#dateend" ).datepicker();/*
                                    	$( "#datebegin" ).datepicker("option","dateFormat","dd/mm/yy");
										$( "#dateend" ).datepicker("option","dateFormat","dd/mm/yy");*/
                                    });
                                    </script>
									<select name="user" id="user" class="table_khungnho">
									  <option value="" selected="selected" > Chọn thành viên </option>
									  <?php   
											//$gt=get_records("tbl_users"," ","name ASC"," "," ");
											$gt=get_records("tbl_users"," idgroup=2","name ASC"," "," ");
                                            while($row=mysql_fetch_assoc($gt)){?>
									  <option value="<?php echo $row['username']; ?>" <?php if($user==$row['username']) echo 'selected="selected"';?>  ><?php echo $row['username']; ?></option>
									  <?php } ?>
								    </select>
									<input name="tim" type="submit" class="nut_table" id="tim" value="Tìm kiếm"/>
                                    <input type="submit" name="reset" class="nut_table" value="Reset" title=" Reset " />
                                 
                                  
                                  </td>
                                </tr>
                                <tr >
                                  <td valign="middle" align="left" style="background-color:#F0F0F0; height:40px; padding-left:20px" colspan="7">
                                   Tổng số tin: <?=$totalRows?> tin
                                  </td>
                                </tr>
                               <tr>
                                  <td align="center" colspan="2">&nbsp;</td>
                                  <td align="center" class="PageNum" colspan="5" height="30" >
                                    	<?php echo pagesListLimit($totalRows,$pageSize);?>   
                                  </td>
                                </tr>
                                <tr class="admin_tieude_table">
    
                                    <td width="41" align="center">
    
                                        <input type="checkbox" name="chkall" onClick="chkallClick(this);"/>
    
                                    </td>
    
                                    <td width="59" align="center">
    
                                        STT
    
                                    </td>
    
                                    <td width="137" align="center"><span class="title"><a class="title" >Hình</a></span></td>
    
                                    <td width="431" align="center"><a class="title" href="<?=getLinkSort(3)?>">Tên </a></td>
                                    <td width="73" align="center"><a class="title" href="<?=getLinkSort(15)?>">Duyệt</a></td>
                                    <td width="92" align="center"><a class="title" href="<?=getLinkSort(12)?>">Ngày </a><a class="title" href="<?=getLinkSort(15)?>">Duyệt</a></td>
                                    <td width="92" align="center"><a class="title" href="<?=getLinkSort(12)?>">Ngày đăng</a></td>                                        
    
                                </tr>
    
                            </thead>
    
                            <tbody>
    
                            <?
    
                            $sortby="order by id $ks";
    
                            if ($_REQUEST['sortby']!='') $sortby="order by ".(int)$_REQUEST['sortby'];
    
                            $direction=($_REQUEST['direction']==''||$_REQUEST['direction']=='0'?"desc":"");
    
                            
    
                            $sql="select *,DATE_FORMAT(date_added,'%d/%m/%Y %h:%i') as dateAdd,DATE_FORMAT(last_modified,'%d/%m/%Y %h:%i') as dateModify from tbl_rv_item where  $where $sortby  limit ".($startRow).",".$pageSize;
    
                            $result=mysql_query($sql,$conn);
    
                            $i=0;
    
                            while($row=mysql_fetch_array($result)){
    
                            $parent = getRecord('tbl_rv_item','id = '.$row['parent']);
    
                            $color = $i++%2 ? "#d5d5d5" : "#e5e5e5";
    
                            ?>
    
                                <tr>
    
                                    <td align="center">
    
                                        <input type="checkbox" name="chk[]" value="<?=$row['id']?>"/>
    
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
                                        <font style="font-size:15px; font-weight:bold;"><?=$row['name']?>  </font><br /><a href="http://batdongsanabc.vn/<?=$row['subject']?>.html" target="_blank"> Xem tin </a><br />
                                        <p>
                                        Người đăng: <?php if($row['iduser']!=0) echo get_field('tbl_users','id',$row['iduser'],'username');else echo "Admin";?> &nbsp;
                                        <? if(get_field('tbl_users','id',$row['iduser'],'idgroup')==2) echo "( Nhập liệu ) ";?>
                                        </p>
                                        <p>
                                         Người duyệt: <?php if($row['idmod']!=0) echo get_field('tbl_users','id',$row['idmod'],'username');?> &nbsp; - Ngày duyệt: <? if($row['date_actived']!="") echo $row['date_actived'];?>
                                         </p>
									</td>
                                    <td align="center"><span class="smallfont"><img src="images/cert_<?=$row['active']?>.png" width="25" height="25" class="certi" title="Ẩn hiện" value="<?=$row['id']?>" /></span></td>
                                    <td align="center"><?=$row['date_actived']?></td>
                                    <td align="center">
    
                                        <?=$row['dateAdd']?> <br />
                                        <?=$row['dateModify']?>
    
                                    </td>                                        
    
                                </tr>
    
                             <?php }?>  
                                <tr>
                                    <td  class="PageNext" colspan="7" align="center" valign="middle">
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