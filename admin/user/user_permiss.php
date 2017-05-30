<?php 
if(isset($frame)==true){
	//check_permiss($_SESSION['kt_login_id'],5,'index.php');
}else{
	header("location: ../index.php");
}
  	$id=$_GET['id']; 	
	settype($id,"int");
	$sql="SELECT * FROM tbl_users WHERE id='{$id}'";
	$tbl_users=mysql_query($sql);
	$row_tbl_users=mysql_fetch_assoc($tbl_users);
		

?>
 <?php 
if (isset($_POST['them'])==true)//isset kiem tra submit
	{
		$listquanly = $_POST['cauhinh'];
		settype($idgroup,"int");
		
		$ddk='';
		$ddkcon="";
			foreach ($listquanly as $k=>$v){
				$ddk=$ddk.",".$v;
				
				$listquanlycon = $_POST['cauhinhcon'.$v];
				$ddkcon.="m".$v."o";
				if($listquanlycon!=""){
					foreach ($listquanlycon as $k1=>$v1){
						$ddkcon=$ddkcon.",".$v1;
					}
					 
				}
			}
		$ddk=substr($ddk,1);
        $ddkcon=substr($ddkcon,1);
		
		$coloi=false;
		if($coloi==FALSE)
		{	
			settype($idgroup,"int");
			settype($id,"int");
			$sql = "UPDATE tbl_users SET list='{$ddk}',listEdit='{$ddkcon}'  WHERE id='{$id}'";
			$kq = mysql_query($sql) or die (mysql_error());
			
			echo thongbao('?act=user',$thongbao='Bạn đã thực hiện thành công..!'); 
		}
	}
?>

<script type="text/javascript">
$(document).ready(function() {

	$("#chonhet").click(function(){
		var status=this.checked;
		$("input[class='check_md']").each(function(){this.checked=status;})
	});
	
	$(".chonhet").click(function(){
		var status=this.checked;
		var value=this.value; 
		$("input[id='cauhinhcon"+value+"']").each(function(){this.checked=status;})
		$("input[id='cauhinh"+value+"']").each(function(){this.checked=status;})
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
            <div class="widget-head overview-chart clearfix">
                <span class="h-icon"><i class="gray-icons graph"></i></span>
                <h4 class="pull-left">Danh sách thành viên&nbsp; </h4><h4 class="pull-left">Quyền thành viên</h4>
                <div id="reportrange" class="pull-right tai_form">
                    
                     
                </div>
            </div>
            <div class="widget-container">
                <div class="widget-block">
                    <style>
					#formdk  div span { padding:0 5px;}
					</style>
                   <form action="" method="post" enctype="multipart/form-data" name=formdk id=formdk>
            <center>   
                <div style="width:600px; height:auto; margin-left:auto; margin-right:auto; text-align:left"> 
                <b>Thành viên: </b> <?php echo $row_tbl_users['name'];?>
                <hr />
                <b>Chọn hết tất cả</b>:&nbsp;
                <input type="checkbox" name="chonhet" id="chonhet"  />
                <hr /> 
                <br />
                <?php
                $lap_quyen=get_records('tbl_permiss','status=1','sort ASC',' ',' ');
                while ($row_lap_quyen=mysql_fetch_assoc($lap_quyen)){?>  
                
                	<input <?php if(number_in_list($row_tbl_users['list'],$row_lap_quyen['id'])){ ?> checked="checked" <?php } ?> name="cauhinh[]" id="cauhinh<?php echo $row_lap_quyen['id']?>" class="check_md" type="checkbox" value="<?php echo $row_lap_quyen['id'] ?>" />
               <strong> <?php echo $row_lap_quyen['name'] ?> </strong> <br />
                	<div  style="padding:5px;">  
                	<span> Xem: <input name="cauhinhcon<?php echo $row_lap_quyen['id'] ?>[]"  id="cauhinhcon<?php echo $row_lap_quyen['id'] ?>" value="1" class="check_md" type="checkbox" <?php if(userPermissEdit($row_tbl_users['listEdit'],$row_lap_quyen['id'],1)) echo 'checked="checked"';?> /> </span>
                	<span> Thêm: <input  name="cauhinhcon<?php echo $row_lap_quyen['id'] ?>[]"  id="cauhinhcon<?php echo $row_lap_quyen['id'] ?>" value="2"  class="check_md" type="checkbox" <?php if(userPermissEdit($row_tbl_users['listEdit'],$row_lap_quyen['id'],2)) echo 'checked="checked"';?>  /> </span>
                	<span> Sửa: <input  name="cauhinhcon<?php echo $row_lap_quyen['id'] ?>[]"  id="cauhinhcon<?php echo $row_lap_quyen['id'] ?>"  value="3"  class="check_md" type="checkbox" <?php if(userPermissEdit($row_tbl_users['listEdit'],$row_lap_quyen['id'],3)) echo 'checked="checked"';?>  /> </span>
                    <span> Xoá: <input  name="cauhinhcon<?php echo $row_lap_quyen['id'] ?>[]"  id="cauhinhcon<?php echo $row_lap_quyen['id'] ?>"  value="4"  class="check_md" type="checkbox" <?php if(userPermissEdit($row_tbl_users['listEdit'],$row_lap_quyen['id'],4)) echo 'checked="checked"';?>  /> </span>
                    <span> Duyệt: <input  name="cauhinhcon<?php echo $row_lap_quyen['id'] ?>[]"  id="cauhinhcon<?php echo $row_lap_quyen['id'] ?>"  value="5"  class="check_md" type="checkbox" <?php if(userPermissEdit($row_tbl_users['listEdit'],$row_lap_quyen['id'],5)) echo 'checked="checked"';?>  /> </span>
                    <span> Nổi bật:  <input  name="cauhinhcon<?php echo $row_lap_quyen['id'] ?>[]"  id="cauhinhcon<?php echo $row_lap_quyen['id'] ?>"  value="6"  class="check_md" type="checkbox" <?php if(userPermissEdit($row_tbl_users['listEdit'],$row_lap_quyen['id'],6)) echo 'checked="checked"';?>  /> </span>
                    <span> Ẩn hiện:  <input  name="cauhinhcon<?php echo $row_lap_quyen['id'] ?>[]"  id="cauhinhcon<?php echo $row_lap_quyen['id'] ?>"  value="7"  class="check_md" type="checkbox" <?php if(userPermissEdit($row_tbl_users['listEdit'],$row_lap_quyen['id'],7)) echo 'checked="checked"';?>  /> </span>
                    <span> Up tin:  <input  name="cauhinhcon<?php echo $row_lap_quyen['id'] ?>[]"  id="cauhinhcon<?php echo $row_lap_quyen['id'] ?>"  value="8"  class="check_md" type="checkbox" <?php if(userPermissEdit($row_tbl_users['listEdit'],$row_lap_quyen['id'],8)) echo 'checked="checked"';?>  /> </span>
                    <span>&nbsp; <strong> Chọn hết: </strong> <input class="chonhet" type="checkbox" name="chonhet<?=$row_lap_quyen['id']?>" id="chonhet<?=$row_lap_quyen['id']?>"   value="<?=$row_lap_quyen['id']?>"/></span>
                    </div>
                    <hr />
                    <br />
                <?php }?>     
              </div>   
                
                <br /><br /> 
              <input type="submit" name="them" class="nut_table" value="Chấp nhận" title="Chấp nhận hoàn thành " />&nbsp;&nbsp;
    		</center>
        </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>