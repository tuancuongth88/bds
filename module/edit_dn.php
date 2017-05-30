<?php 
$iduser= $_SESSION['kh_login_id'];
if($iduser=="")   header("location:".$linkrootbds);

$tensanpham=$_GET['tensanpham'];

$row_sanpham   = getRecord('tbl_rv_item', "subject='".$tensanpham."'");

if($row_sanpham['iduser']!=$iduser) header("location:".$linkrootbds);

$path = "images/bds_da";
$pathdb = "images/bds_da";
$bandau=0;
if (isset($_POST['them'])==true && $iduser!="" && $iduser > 0)//isset kiem tra submit
{
	$code          = isset($_POST['txtCode']) ? trim($_POST['txtCode']) : '';
	$name          = $_POST['txtName'];

	
	$parent        = $_POST['loai'];
	$parent1       = $_POST['ddCat'];
	
	if($parent1==-1) $parent1=$parent;
	
	$listimage     = $_POST['chk'];
	$cap 		= $_POST['cap'];
	
	$iduser= $_SESSION['kh_login_id'];
	
	if($iduser=="") $iduser="0";
	
	if($parent=="") $parent=2;
	
	$subject       = vietdecode($name);
	$detail_short  = isset($_POST['detail_short']) ? trim($_POST['detail_short']) : '';
	$detail        =  $_POST['noidung'];
	$khuyenmai     = isset($_POST['khuyenmai']) ? trim($_POST['khuyenmai']) : '';
	$baohanh        = isset($_POST['baohanh']) ? trim($_POST['baohanh']) : '';
	$mausac        = isset($_POST['mausac']) ? trim($_POST['mausac']) : '';
	$sort          = isset($_POST['txtSort']) ? trim($_POST['txtSort']) : 0;
	$status        = 0;
	$maluc          = isset($_POST['maluc']) ? trim($_POST['maluc']) : '';
	$sit            = isset($_POST['sit']) ? trim($_POST['sit']) : '';
	$title          = isset($_POST['title']) ? trim($_POST['title']) : '';
	$description    = isset($_POST['description']) ? trim($_POST['description']) : '';
	$keyword        = isset($_POST['keyword']) ? trim($_POST['keyword']) : '';
	$price          = isset($_POST['price']) ? trim($_POST['price']) : '';
	$pricekm        = isset($_POST['price2']) ? trim($_POST['price2']) : '';
	$loaihinh       = isset($_POST['loaihinh']) ? trim($_POST['loaihinh']) : '';
	$nhucau         = isset($_POST['nhucau']) ? trim($_POST['nhucau']) : '';
	$tinh           = isset($_POST['tinh']) ? trim($_POST['tinh']) : '';
	$huyen          = isset($_POST['huyen']) ? trim($_POST['huyen']) : '';
	$phuong         = isset($_POST['phuong']) ? trim($_POST['phuong']) : '';
	$duong          = isset($_POST['duong']) ? trim($_POST['duong']) : '';
	$sonha          = isset($_POST['sonha']) ? trim($_POST['sonha']) : '';
	$lat            = isset($_POST['lat']) ? trim($_POST['lat']) : '';
	$long           = isset($_POST['long']) ? trim($_POST['long']) : '';
	
	$dienthoai      = isset($_POST['dienthoai']) ? trim($_POST['dienthoai']) : '';
	$email          = isset($_POST['email']) ? trim($_POST['email']) : '';
	$diachi         = isset($_POST['diachi']) ? trim($_POST['diachi']) : '';
	$khachhang      = isset($_POST['khachhang']) ? trim($_POST['khachhang']) : '';
	$donvi          = isset($_POST['donvi']) ? trim($_POST['donvi']) : '';
	$dientich       = isset($_POST['dientich']) ? trim($_POST['dientich']) : '';
	$huong          = isset($_POST['huong']) ? trim($_POST['huong']) : '';
	$phaply         = isset($_POST['phaply']) ? trim($_POST['phaply']) : '';
	$dtkhuonvien    = isset($_POST['dtkhuonvien']) ? trim($_POST['dtkhuonvien']) : '';
	$tongdtsudung    = isset($_POST['tongdtsudung']) ? trim($_POST['tongdtsudung']) : '';
	$solau          = isset($_POST['solau']) ? trim($_POST['solau']) : '';
	$sophong        = isset($_POST['sophong']) ? trim($_POST['sophong']) : '';
	$namxaydung     = isset($_POST['namxaydung']) ? trim($_POST['namxaydung']) : '';
	$raoban_thue     = isset($_POST['raoban_thue']) ? trim($_POST['raoban_thue']) : '';
    $loai            = isset($_POST['loai']) ? trim($_POST['loai']) : '';
	
	
	$name          = mysql_real_escape_string($name);;
	

	if ($name=="") {$errMsg_tieude .= "Hãy nhập tiêu đề rao vặt !<br>";$errMsg="Lỗi";}
	if ($detail==""){ $errMsg_noidung .= "Hãy nhập nội dung rao vặt !<br>";$errMsg="Lỗi";}
	if ($parent=="") {$errMsg_chuyenmuc .= "Hãy chọn ít nhất một chuyên mục!<br>";$errMsg="Lỗi";}
	if ($tinh=="") {$errMsg_tinh .= "Hãy chọn Tỉnh/Thành cần rao!<br>";$errMsg="Lỗi";}
	if ($huyen==""){ $errMsg_huyen .= "Hãy chọn Quận/Huyện cần rao!<br>";$errMsg="Lỗi";}
	
	if($lat =="" && $errMsg=="" && $tinh!="" && $huyen!=""){
		$tinh1=get_field('tbl_quanhuyen_category','id',$tinh,'name');
		$huyen1  = get_field('tbl_quanhuyen','id',$huyen,'name');; 
		$phuong1  = get_field('tbl_phuongxa','id',$phuong,'name');; 
		$duong1  = get_field('tbl_street','id',$duong,'name');; 
		
		if($sonha1!="") $diachi1.=",".$sonha1;
		if($duong1!="") $diachi1.=", ".$duong1;
		if($phuong1!="") $diachi1.=", ".$phuong1;
		if($huyen1!="") $diachi1.=", ".$huyen1;
		if($tinh1!="") $diachi1.=", ".$tinh1;
		$diachi1.=", Việt Nam ";
		$diachi1=substr($diachi1,1);
		
		if($diachi1=="") $diachi1=$diachi;
		
		//echo $diachi;
		//$diachi=str_replace(array("Đường", "Quận", "Huyện", "Thị xã", "Thành phố"), "", $diachi);
		$address = $diachi1; // Google HQ
		$address = urlencode(str_replace(",", ",+",$address)); ;
		
		$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
		//echo 'http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false';
		$output= json_decode($geocode);
		
		$lat = $output->results[0]->geometry->location->lat;
		$long = $output->results[0]->geometry->location->lng;
	}

	$aa=0;
	if(isset($_POST['id']))if(get_field("tbl_rv_item","name",$name,"id")!="" && $_POST['id']!=get_field("tbl_rv_item","name",$name,"id")) $aa=1;

	if ($errMsg==''){
	 
			 $oldid = $row_sanpham['id'];
			 $sql = "update tbl_rv_item set   name='".$name."',khachhang='".$khachhang."',diachi='".$diachi."',email='".$email."',dienthoai='".$dienthoai."',catebds='".$loai."',parent='".$loai."',idcity='".$tinh."',idquan='".$huyen."',idphuong='".$phuong."',idstreet='".$duong."',sonha='".$sonha."',latitude='".$lat."',longitude='".$long."',detail_short='".$detail_short."',detail='".$detail."',type='".$loaihinh."' , price='".$price."',donvi='".$donvi."', dientich='".$dientich."', huong='".$huong."', tinhtrangphaply='".$phaply."', dtkhuonvien='".$dtkhuonvien."', tongdtsudung='".$tongdtsudung."', solau='".$solau."', sophong='".$sophong."', namxaydung='".$namxaydung."', dacdiemkhac='".$ddk."', raoban_thue='".$raoban_thue."',  sort='".$sort."', title ='".$title ."', description ='".$description ."', keyword='".$keyword."', last_modified=now() where id='".$oldid."'";
	 
		if (mysql_query($sql,$conn)){
			$bandau=1;
			$r = getRecord("tbl_rv_item","id=".$oldid);
					
			if($aa==1){
				$arrField = array(
				"subject"          => "'".cat_kytu_dacbiet(str_replace("sym", "SYM",$name),1,1,0,1,1)."-".$oldid."'"
				);// ko them id vao cuoi cho dep	
			}else{
				$arrField = array(
				"subject"          => "'".cat_kytu_dacbiet(str_replace("sym", "Sym",$name),1,1,0,1,1)."'"
				);// ko them id vao cuoi cho dep
			}
			$result = update("tbl_rv_item",$arrField,"id=".$oldid);
			
			$sqlUpdateField = "";
			$sqlUpdateField1 = "";
			$sqlUpdateField2 = "";
			$sqlUpdateField3 = "";
			$sqlUpdateField4 = "";
			$sqlUpdateField5 = "";
			
			if ($_POST['chkClearImg']==''){
				$extsmall=getFileExtention($_FILES['txtImage']['name']);
				$fname=getFileName($_FILES['txtImage']['name']);
				if (makeUpload($_FILES['txtImage'],"$path/$fname-$oldid$extsmall")){
					@chmod("$path/$fname-$oldid$extsmall", 0777);
					$sqlUpdateField = " image='$pathdb/$fname-$oldid$extsmall' ";
					if(file_exists($r['image'])) @unlink($r['image']);
				}
			}else{
				if(file_exists($r['image'])) @unlink($r['image']);
				$sqlUpdateField = " image='' ";
			}
			
			if($sqlUpdateField!='')	{
				    $sqlUpdate = "update tbl_rv_item set $sqlUpdateField where id='".$oldid."'";
					mysql_query($sqlUpdate,$conn);
			}
			
			if ($_POST['chkClearImg1']==''){
				$extsmall=getFileExtention($_FILES['txtImage1']['name']);
				$fname=getFileName($_FILES['txtImage1']['name']);
				if (makeUpload($_FILES['txtImage1'],"$path/$fname$oldid$extsmall")){
					@chmod("$path/$fname$oldid$extsmall", 0777);
					$sqlUpdateField1 = " image1='$pathdb/$fname$oldid$extsmall' ";
					if(file_exists($r['image1'])) @unlink($r['image1']);
				}
			}else{
				if(file_exists($r['image1'])) @unlink($r['image1']);
				$sqlUpdateField1 = " image1='' ";
			}
			
			if($sqlUpdateField1!='')	{
				    $sqlUpdate1 = "update tbl_rv_item set $sqlUpdateField1 where id='".$oldid."'";
					mysql_query($sqlUpdate1,$conn);
			}
			
			if ($_POST['chkClearImg2']==''){
				$extsmall=getFileExtention($_FILES['txtImage2']['name']);
				$fname=getFileName($_FILES['txtImage2']['name']);
				if (makeUpload($_FILES['txtImage2'],"$path/$fname-2-$oldid$extsmall")){
					@chmod("$path/$fname-2-$oldid$extsmall", 0777);
					$sqlUpdateField2 = " image2='$pathdb/$fname-2-$oldid$extsmall' ";
					if(file_exists($r['image2'])) @unlink($r['image2']);
				}
			}else{
				if(file_exists($r['image2'])) @unlink($r['image2']);
				$sqlUpdateField2 = " image2='' ";
			}
			
			if($sqlUpdateField2!='')	{
					$sqlUpdate2 = "update tbl_rv_item set $sqlUpdateField2 where id='".$oldid."'";
					mysql_query($sqlUpdate2,$conn);
			}
			
			if ($_POST['chkClearImg3']==''){
				$extsmall=getFileExtention($_FILES['txtImage3']['name']);
				$fname=getFileName($_FILES['txtImage3']['name']);
				if (makeUpload($_FILES['txtImage3'],"$path/$fname-3-$oldid$extsmall")){
					@chmod("$path/$fname-3-$oldid$extsmall", 0777);
					$sqlUpdateField3 = " image3='$pathdb/$fname-3-$oldid$extsmall' ";
					if(file_exists($r['image3'])) @unlink($r['image3']);
				}
			}else{
				if(file_exists($r['image3'])) @unlink($r['image3']);
				$sqlUpdateField3 = " image3='' ";
			}
			
			if($sqlUpdateField3!='')	{
					$sqlUpdate3 = "update tbl_rv_item set $sqlUpdateField3 where id='".$oldid."'";
					mysql_query($sqlUpdate3,$conn);
			}
				
			if ($_POST['chkClearImg4']==''){
				$extsmall=getFileExtention($_FILES['txtImage4']['name']);
				$fname=getFileName($_FILES['txtImage4']['name']);
				if (makeUpload($_FILES['txtImage4'],"$path/$fname-4-$oldid$extsmall")){
					@chmod("$path/$fname-4-$oldid$extsmall", 0777);
					$sqlUpdateField4 = " image4='$pathdb/$fname-4-$oldid$extsmall' ";
					if(file_exists($r['image4'])) @unlink($r['image4']);
				}
			}else{
				if(file_exists($r['image4'])) @unlink($r['image4']);
				$sqlUpdateField4 = " image4='' ";
			}
			
			if($sqlUpdateField4!='')	{
					$sqlUpdate4 = "update tbl_rv_item set $sqlUpdateField4 where id='".$oldid."'";
					mysql_query($sqlUpdate4,$conn);
			}
			
			if ($_POST['chkClearImg5']==''){
				$extsmall=getFileExtention($_FILES['txtImage5']['name']);
				$fname=getFileName($_FILES['txtImage5']['name']);
				if (makeUpload($_FILES['txtImage5'],"$path/$fname-5-$oldid$extsmall")){
					@chmod("$path/$fname-5-$oldid$extsmall", 0777);
					$sqlUpdateField5 = " image5='$pathdb/$fname-5-$oldid$extsmall' ";
					if(file_exists($r['image5'])) @unlink($r['image5']);
				}
			}else{
				if(file_exists($r['image5'])) @unlink($r['image5']);
				$sqlUpdateField5 = " image5='' ";
			}
			
			if($sqlUpdateField5!='')	{
				    $sqlUpdate5 = "update tbl_rv_item set $sqlUpdateField5 where id='".$oldid."'";
					mysql_query($sqlUpdate5,$conn);
			}
			
			 
		}else{
			$errMsg = "Không thể cập nhật !";
		}
	}

	if ($errMsg == '')
		 /*echo '<script>window.location="'.$linkrootbds.'quan-ly-tin-dang.html"</script>'*/ ;
}else{
	if (isset($_GET['tensanpham'])){
		$tensanpham=$_GET['tensanpham'];
		$page = $_GET['page'];
		$sql = "select * from tbl_rv_item where subject='".$tensanpham."'";
		if ($result = mysql_query($sql,$conn)) {
			$row=mysql_fetch_array($result);
			$code          = $row['code'];
			$name          = mysql_real_escape_string($row['name']);;
			 
			$parent1        = $row['parent'];
			$parent         = get_field('tbl_rv_category','id',$parent1,'parent');
			
			if($parent==2) {
				$parent=$parent1;
				$parent1=-1;
			}
			 
			$subject       = $row['subject'];
			$detail_short  = $row['detail_short'];
			$link         = $row['link'];
			$detail        = $row['detail'];
			$image         = $row['image'];
			$image1         = $row['image1'];
			$image2         = $row['image2'];
			$image3         = $row['image3'];
			$image4         = $row['image4'];
			$image5         = $row['image5'];
			$image_large   = $row['image_large'];
			$sort          = $row['sort'];
			$status        = $row['status'];
			$date_added    = $row['date_added'];
			$last_modified = $row['last_modified'];
			
			$title         = $row['title'];
			$description   = $row['description'];
			$keyword       = $row['keyword'];
			

			$tinh          =$row['idcity'];
			$huyen         =$row['idquan'];
			$phuong        =$row['idphuong'];
			$duong         =$row['idstreet'];
			$sonha         =$row['sonha'];
			$loaihinh      =$row['type'];
			$nhucau        =$row['nhucau'];
			$price         =$row['price'];
			
			$dienthoai     =$row['dienthoai'];
			$email         =$row['email'];
			$diachi        =$row['diachi']; 
			$khachhang     =$row['khachhang'];
			$donvi         =$row['donvi'];
			$dientich      =$row['dientich'];
			$huong         =$row['huong'];
			$phaply        =$row['tinhtrangphaply'];
			$dtkhuonvien   =$row['dtkhuonvien'];
			$solau         =$row['solau'];
			$sophong       =$row['sophong'];
			$namxaydung    =$row['namxaydung'];
			$dacdiemkhac    =$row['dacdiemkhac'];
			$raoban_thue    =$row['raoban_thue'];
			$loai           =$row['catebds'];
		}
	}
}
if ($errMsg == '' && $bandau==1) {  
?>
<link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>templates/jquery-ui.css">
<div id="dialog" style="display:none;">	  
</div>
<script type="text/javascript">
$(document).ready(function (){
	$('#dialog').html(' <br>Bạn vừa sữa tin đăng  thành công ! ');
	
	$('#dialog').dialog({
		autoOpen: true,
		show: "blind",
		hide: "explode",
		modal: true,
		open: function(event, ui) {
			setTimeout(function(){
				$('#dialog').dialog('close');                
			}, 1500);
		},
		close: function(event, ui) { window.location.href = "<?=$linkrootbds;?>quan-ly-tin-dang-doanh-nghiep.html"; }
	});
});
</script>
<?
}//end thong bao dang tin
?>
<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/ckeditor/ckeditor.js"></script>
<script>
$(document).ready(function() {
	$("#loai").change(function(){ 
		var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
		var table="tbl_rv_category";
		$("#ddCat").load("<?php echo $linkrootbds?>module/getChild.php?table="+ table + "&id=" +id); //alert(idthanhpho)
	});
	$("#tinh").change(function(){ 
		var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
		var table="tbl_quanhuyen";
		$("#huyen").load("<?php echo $linkrootbds?>module/getChild.php?table="+ table + "&id=" +id); //alert(idthanhpho)
	});
	$("#huyen").change(function(){ 
		var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
		var table="tbl_street";
		$("#duong").load("<?php echo $linkrootbds?>module/getChild.php?table="+ table + "&id=" +id); //alert(idthanhpho)
	});
	$("#huyen").change(function(){  
		var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
		var table="tbl_phuongxa";
		$("#phuong").load("<?php echo $linkrootbds?>module/getChild.php?table="+ table + "&id=" +id); //alert(idthanhpho)
	});
});

</script>

<div class="breacrum">
    <ul>
        <li>
            <a href="#">Trang chủ</a>
        </li>
        <li>
            Sửa doanh nghiệp
        </li>
    </ul>
</div><!-- End .breacrum -->
<?php if($iduser=="") {?>    
    <div class="f_dt">
    
    </div>
<?php
 }elseif($iduser!=""  ){
	 if($bandau==0){
?>     
<div class="f_dt">
    	<form action="<?php echo $linkrootbds?>sua-doanh-nghiep/<?=$row_sanpham['subject']?>.html" method="post" enctype="multipart/form-data" name=formdk id=formdk>
        <input type="hidden" name="act" value="edit_dn" />
        <span class="note_dt">
            Lưu ý: những ô có dấu sao * là bắt buộc phải nhập. <?php  if($errMsg!="") echo "Lỗi: ".$errMsg;?>
        </span><!-- End .note_dt -->
        
        <div class="b_dt_1">
            <ul>
            	<li class="clearfix">
                    <span class="l1_bdt">
                        Người liên hệ
                    </span>
                    <span class="l2_bdt"> 
                        <input name="khachhang" type="text" class="ipt_bdt box-sizing-fix" id="khachhang" title="Nhập tiêu đề" size="70" value="<?php echo $khachhang ?>" />
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Loại hình doanh nghiệp <span class="color_btd">*</span>
                    </span>
                    <span class="l2_bdt">
                        <div class="sty_bdt"> 
                          <select name="loai" id="loai"  > 
								<?php if($_POST['loai']!=NULL){ ?>
                                <option value="<?php echo $idtheloaic=$_POST['loai'] ; ?>"><?php echo get_field('tbl_rv_category','id',$parent,'name'); ?></option>
                                <?php }?>
                                <?php if($parent!=""){?>
                                <option value="<?php echo $parent ?>"><?php echo get_field('tbl_rv_category','id',$parent,'name'); ?></option>
                                <?php }?>
                                <option value=""> Chọn loại doanh nghiệp </option> 
								<?php   
                                $cate=get_records("tbl_rv_category"," parent=2 and cate=3","sort ASC"," "," ");
                                while($row=mysql_fetch_assoc($cate)){?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option> 
                                <?php } ?>
                          </select>
                        </div>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Địa chỉ liên hệ 
                    </span>
                    <span class="l2_bdt"> 
                         <input name="diachi" type="text" class="ipt_bdt box-sizing-fix" id="diachi" title="Nhập địa chỉ" value="<?php echo $diachi ?>" />
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                       Tên doanh nghiệp <span class="color_btd">*</span>
                    </span>
                    <span class="l2_bdt">
                   	 <input name="txtName" type="text" class="ipt_bdt box-sizing-fix" id="txtName" title="Nhập tiêu đề" size="70" value="<?php echo $name ?>" /> 
                    </span>
                    <span>
                    	<?=$errMsg_tieude;?>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Điện thoại
                    </span>
                    <span class="l2_bdt"> 
                        <input class="ipt_bdt box-sizing-fix" name="dienthoai" type="text"   id="dienthoai" title="Nhập tiêu đề" size="70" value="<?php echo $dienthoai ?>" />
                    </span>
                </li>

                
                <li class="clearfix">
                    <span class="l1_bdt">
                        Email
                    </span>
                    <span class="l2_bdt"> 
                          <input name="email" type="text" class="ipt_bdt box-sizing-fix" id="email" title="Nhập tiêu đề" size="70" value="<?php echo $email ?>" />
                    </span>
                </li>
            </ul>
            <div class="clear"></div>
        </div><!-- End .b_dt_1 -->
        
        <div class="b_dt_1">
            <ul>
              <li class="clearfix">
                  <span class="l1_bdt">
                      Thành phố <span class="color_btd">*</span>
                  </span>
                  <span class="l2_bdt">
                      <div class="sty_bdt">  
                          <select name="tinh" id="tinh"  > 
							  <?php if($_POST['tinh']!=NULL){ ?>
                              <option value="<?php echo $tinh=$_POST['tinh'] ; ?>"><?php echo get_field('tbl_quanhuyen_category','id',$tinh,'name'); ?></option>
                              <?php }?>
                              <option value=""> Chọn thành phố </option> 
                                
                              <?php   
                                $cate=get_records("tbl_quanhuyen_category"," ","sort ASC"," "," ");
                                while ($row=mysql_fetch_assoc($cate)){?>
                              <option value="<?php echo $row['id']; ?>" <?php if($tinh==$row['id']) echo 'selected="selected"';?> ><?php echo $row['name']; ?></option> 
                              <?php } ?>
                            
                          </select>
           			  </div>
                  </span>
                </li>
              <li class="clearfix">
                  <span class="l1_bdt">
                     Quận huyện  <span class="color_btd">*</span>
                  </span>
                  <span class="l2_bdt">
                      <div class="sty_bdt">
                          <select name="huyen" id="huyen"  > 
							  <?php if($_POST['huyen']!=NULL){ ?>
                              <option value="<?php echo $huyen=$_POST['huyen'] ; ?>"><?php echo get_field('tbl_quanhuyen','id',$huyen,'name'); ?></option>
                              <?php }?>
                              <option value="<?php echo $huyen ?>"><?php echo get_field('tbl_quanhuyen','id',$huyen,'name'); ?></option>
                              <option value=""> Chọn quận/huyện </option> 
  
                          </select>
           			  </div>
                      <span>
                      <?php echo $errMsg_tinh;?>
                      </span>
                  </span>
                </li>
                <li class="clearfix">
                  <span class="l1_bdt">
                     Phường/Xã  <span class="color_btd">*</span>
                  </span>
                  <span class="l2_bdt">
                      <div class="sty_bdt">
                          <select name="phuong" id="phuong"  > <?=$phuong ?>
							  <?php if($_POST['phuong']!=NULL){ ?>
                              <option value="<?php echo $phuong=$_POST['phuong'] ; ?>"><?php echo get_field('tbl_phuongxa','id',$phuong,'name'); ?></option>
                              <?php }?>
                               <option value="<?php echo $phuong ?>"><?php echo get_field('tbl_phuongxa','id',$phuong,'name'); ?></option>
                              <option value=""> Chọn Phường/Xã </option> 
  
                          </select>
           			  </div>
                      <span>
                      <?php echo $errMsg_huyen;?>
                      </span>
                  </span>
                </li>
                <li class="clearfix">
                  <span class="l1_bdt">
                    Đường  <span class="color_btd">*</span>
                  </span>
                  <span class="l2_bdt">
                      <div class="sty_bdt">
                          <select name="duong" id="duong"  > 
							  <?php if($_POST['duong']!=NULL){ ?>
                              <option value="<?php echo $duong=$_POST['duong'] ; ?>"><?php echo get_field('tbl_street','id',$duong,'name'); ?></option>
                              <?php }?>
                              <option value="<?php echo $duong ?>"><?php echo get_field('tbl_street','id',$duong,'name'); ?></option>
                              <option value=""> Chọn đường </option> 
  
                          </select>
           			  </div>
                  </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Số nhà
                    </span>
                    <span class="l2_bdt"> 
                         <input name="sonha" type="text" class="ipt_bdt box-sizing-fix" id="sonha" title="Nhập số nhà" value="<?php echo $sonha ?>" placeholder="Bạn cần phải nhập số nhà" />
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Xem bản đồ
                    </span>
                    <span class="l2_bdt"> 
                          <input id="clickxem" name="clickxem" type="button" value=" click xem trước " /> (Click xem trước bản đồ)
                    </span>
                </li>
            </ul>
            <div class="clear"></div>
			<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script> 
            <script type="text/javascript" src="http://localhost/batdongsannew/scripts/jquery.geocomplete.js"></script>
            <div class="bando" style="width:100%; overflow:hidden;">
            
            </div>
            <script>
			$(document).ready(function() {
				$("#clickxem").click(function(){ 
					var sonha=$('#sonha').val();  
					var duong=$('#duong').val(); 
					var tinh=$('#tinh').val();
					var huyen=$('#huyen').val();  
					var phuong=$('#phuong').val();
					/*$(".bando").append( '<div style="height:100px;"><img src="<?php echo $linkrootbds?>imgs/loading83.gif"></div>' );*/
					$(".bando").load("<?php echo $linkrootbds?>module/getMap.php?sonha="+ sonha + "&duong=" +duong+ "&phuong=" +phuong+ "&huyen=" +huyen+ "&tinh=" +tinh); //alert(idthanhpho)
				});
				 
			});
			</script>
        </div>
        
      <!--  <div class="b_dt_2" style="padding:0px;">
        	<div  style="text-indent:5px;">Mô tả ngắn: </div>
            <div style="padding:5px;">
        	<textarea class="ipt_bdt" id="detail_short" name="detail_short" rows="4" cols="80" style="width:100%; padding:0px; height:80px;" >  <?=$detail_short?></textarea>
            </div>
        </div>-->
        
        <div class="b_dt_4">
        
            <span class="t_dt">Thông tin thêm</span>
            
            <ul>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Mô tả ngắn: 
                    </span>
                    <span class="l2_bdt">  
                          <textarea class="txt_bdt box-sizing-fix" id="detail_short" name="detail_short"   style="width:570px;" >  <?=$detail_short?></textarea>
                    </span>
                </li> 
            </ul>
            <div class="clear"></div>
        
        </div>
        
        <div class="b_dt_2" style="padding:0px;">
        
             <textarea id="noidung" name="noidung" rows="16" cols="80" style="width:100%;"> <?=$detail?></textarea> 
					<script type="text/javascript">
                    
                    var editor = CKEDITOR.replace( 'noidung',
                    
                    {
                    
                        height:200,		
						skin:'moonocolor',							
                    
                        fullPage : false
                    
                    }); 
                    
                    </script>
                    <script>	  		  	
                        setTimeout("HienDuLieu1()", 1000);		
                        function HienDuLieu1(){
                            var str= "<?=$detail?>";			
                            var oEditor = CKEDITOR.instances.noidung;			
                            oEditor.setData( str);				
                        }
                    </script>
                    <span>
                    	<?=$errMsg_noidung;?>
                    </span>
        
        </div><!-- End .b_dt_2 --><!-- End .b_dt_3 --><!-- End .b_dt_3 --><!-- End .b_dt_3 -->
        
        <div class="b_dt_4">
        
            <span class="t_dt">Thông tin thêm</span>
            
            <ul>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Tiêu đề hiển thị trên trình duyệt web:
                    </span>
                    <span class="l2_bdt"> 
                          <textarea name="title" class="txt_bdt box-sizing-fix" id="title" title="Nhập Title" style="width:570px;"><?php echo $title ?></textarea>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Mô tả thông tin rao vặt khi tìm kiếm:
                    </span>
                    <span class="l2_bdt"> 
                        <textarea name="description" class="txt_bdt box-sizing-fix" id="description" title="Nhập Description" style="width:570px;"><?php echo $description ?></textarea>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Từ khóa dùng cho việc tìm kiếm:
                    </span>
                    <span class="l2_bdt"> 
                        <textarea name="keyword"  class="txt_bdt box-sizing-fix" id="keyword" title="Nhập Keywords" style="width:570px;"><?php echo $keyword ?></textarea>
                    </span>
                </li>
            </ul>
            <div class="clear"></div>
        
        </div><!-- End .b_dt_4 -->
        
        <div class="b_dt_4">
        
            <span class="t_dt">Hình ảnh</span>
            
            <ul class="ul_img_bdt">
                <li class="clearfix"><?=$linkrootbds_bds?>
                    
                      <input type="file" name="txtImage" id="txtImage" class="textbox" size="34">  <? if ($image!='') echo '<img border="0" width="80" height="80" src="'.$linkrootbds.$image.'">';else echo '<img border="0" width="80" height="80" src="'.$linkrootbds.'imgs/noimage.png">'; ?> 
                      <input type="checkbox" name="chkClearImg" value="on"> Xóa bỏ hình ảnh
                </li> 
            </ul>
            <div class="clear"></div>
        
        </div><!-- End .b_dt_4 -->
        
        <div class="btn_bdt"> 
            <input type="submit" name="them" class="nut-table" value=" Sửa tin" title="Chấp nhận hoàn thành " />
             <a href="<?php echo $linkrootbds?>quan-ly-tin-dang-doanh-nghiep.html"> <input type="button" name="quayra" class="nut-table" value="Quay ra" title="Quay ra ngoài " /></a>
        </div><!-- End .btn_bdt -->
        </form>
    
    </div><!-- End .f_dt -->
 <?php 
}else{
?>
	<div class="f_dt">
    	<div style="min-width:150px; margin:0 auto; text-align:center; width:100%;">
            <br />
            	Bạn vừa thao tác thành công
            <br />
        </div>
    </div>
<?php
	}
 }
?>
    
    