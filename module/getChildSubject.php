<?php
	require("../config.php");
	require("../common_start.php");
	include("../lib/func.lib.php");
	//require("check_login.php");
	
	$id=$_GET['id'];  
	
	$table=$_GET['table']; 
	$tablep=$_GET['tablep']; 
	if ($id=="") die ("-1");
	if ($table=="") die ("-1");
	if ($tablep=="") die ("-1");
	
	 $id=get_field($tablep,'subject',$id,'id');

?>
<option value=""> Chọn danh mục con </option> 
<?
	$sql="SELECT *
			FROM $table 
			WHERE parent='{$id}'";
	$con=mysql_query($sql) or die(mysql_error());
	while ($row_con=mysql_fetch_assoc($con)){

?>

<option value="<?php echo $row_con['subject'];?>"> <?php echo $row_con['name'];?></option>
<?php }?>