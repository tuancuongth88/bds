<?
	include('../config.php');
	require("../common_start.php");
	include("../lib/func.lib.php");
 
	$iduser= $_SESSION['kt_login_id'];// kiem tra da dang nhap chua
	$id=$_GET['id'];
	$loai=$_GET['loai'];
	if($iduser!="" && $id!="")   { 

			if ($_FILES["file"]["error"] > 0) {
				echo "Error: " . $_FILES["file"]["error"] . "<br>";
			}
			else {
				
				$a="Upload: " . $_FILES["file"]["name"];
				$kieufile=  $_FILES["file"]["type"];
				$size="Size: " . ($_FILES["file"]["size"] / 1024);
				$a="Stored in: " . $_FILES["file"]["tmp_name"]; 
				
				$choupload = array("image/gif","image/jpeg","image/pjpeg","image/png",'image/x-png');
				
				if (in_array($kieufile,$choupload)==false) {
					 echo "error.png";
					 return false;
				}
 				  
				$path = "../images/bds".$loai;
				$pathdb = "images/bds".$loai;
				$oldid=chuoingaunhien(5);
				$extsmall=getFileExtention($_FILES['file']['name']);
				$fname=getFileName($_FILES['file']['name']);
				if (makeUpload($_FILES['file'],"$path/$fname-$id-$oldid$extsmall")){
					@chmod("$path/$fname-$id-$oldid$extsmall", 0777);
					
					$fields_arr = array(
						"iduser"         => $iduser,
						"parent"         => "''",
						"image"          => "'".$pathdb."/".$fname."-".$id."-".$oldid.$extsmall."'",
						"date_added"     => "now()",
						"last_modified"  => "now()"
					);
					
					insert("tbl_img_bds",$fields_arr);
					
					}
			  	echo $pathdb."/".$fname."-".$id."-".$oldid.$extsmall;
				
			}
			
	}
 
?>