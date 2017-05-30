<?php
	require("../config.php");
	require("../common_start.php");
	include("../lib/func.lib.php");
	//require("check_login.php");
	
	$id=$_GET['id']; 
	settype($id,"int");
	
	$table=$_GET['table']; 
	
	if ($id<=0) die ("-1");
	if ($table=="") die ("-1");

?>
<option value=""> Chọn danh mục con </option> 
<?
	$sql="SELECT *
			FROM $table 
			WHERE parent='{$id}' order by sort ASC,id ASC";
	$con=mysql_query($sql) or die(mysql_error());
	while ($row_con=mysql_fetch_assoc($con)){

?>

<option value="<?php echo $row_con['id'];?>" data-alternative-spellings="<?php echo $row_con['name']; ?>" > <?php echo $row_con['name'];?></option>
<?php }?>