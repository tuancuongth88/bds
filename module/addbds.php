<link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>templates/jquery-ui.css">
<?php

$iduser= $_SESSION['kh_login_id'];
 
if($iduser=="")   {//header("location:".$linkrootbds);
$_SESSION['back_add']=$_SERVER['REQUEST_URI'];
$tinh="";
?>


<div id="dialog" style="display:none;">	  
</div>
<script type="text/javascript">
$(document).ready(function (){
	$('#dialog').html(' <br><br> Bạn phải đăng nhập để đăng tin! <br>  ');
	
	$('#dialog').dialog({
		autoOpen: true,
		show: "blind",
		hide: "explode",
		modal: true,
		open: function(event, ui) {
			setTimeout(function(){
				$('#dialog').dialog('close');                
			}, 2500);
		},
		close: function(event, ui) { window.location.href = "<?php echo $linkrootbds?>dang-nhap.html"; }
	});
});
</script>
<?php } ?>
<?php
$path = "images/bds";
$pathdb = "images/bds";

$bandau=0;

//Spam 
$nl=get_field('tbl_users','id',$iduser,'warning');

if($nl==0) $cate=0;
else $cate=5;
//5 la tin spam
 
if (isset($_POST['them'])==true && $iduser!="" && $iduser > 0)//isset kiem tra submit
	{  
	$code          = isset($_POST['txtCode']) ? trim($_POST['txtCode']) : '';
	$name          = $_POST['txtName'];

	$parent        = $_POST['ddCat'];
	$parent1       = $_POST['loai'];
	$listimage     = $_POST['chk'];
	$cap 		= $_POST['cap'];
	
	$iduser= $_SESSION['kh_login_id'];
	
	if($iduser=="") $iduser="0";
	
	//if($parent=="") $parent=2;
	
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
	
	//NL
	$nl=get_field('tbl_users','id',$iduser,'idgroup');
	
	if($nl==2) $type=1;
	else $type=0;
	
	//Spam 
	/*$nl=get_field('tbl_users','id',$iduser,'warning');
	
	if($nl==0) $cate=0;
	else $cate=5;
	//4 la tin spam*/
	
	$status=1;
	
	
	$image1         = isset($_POST['my_file_va_1']) ? trim($_POST['my_file_va_1']) : '';
	$image2         = isset($_POST['my_file_va_2']) ? trim($_POST['my_file_va_2']) : '';
	$image3         = isset($_POST['my_file_va_3']) ? trim($_POST['my_file_va_3']) : '';
	$image4         = isset($_POST['my_file_va_4']) ? trim($_POST['my_file_va_4']) : '';
	$image5         = isset($_POST['my_file_va_5']) ? trim($_POST['my_file_va_5']) : '';
	$image6         = isset($_POST['my_file_va_6']) ? trim($_POST['my_file_va_6']) : ''; 
	
	if($lat ==""){
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
	
	$dacdiemkhac = $_POST['dacdiemkhac'];
	//print_r($dacdiemkhac);
	if($dacdiemkhac!=""){
		$ddk='';
			foreach ($dacdiemkhac as $k=>$v){
				$ddk=$ddk.",".$v;
			}
		$ddk=substr($ddk,1);
		
		
		
		
		
	}
	
	$name          = mysql_real_escape_string($name);  
	
 
	if ($name=="") {$errMsg_tieude= "Hãy nhập tiêu đề rao vặt !<br>";$errMsg="error";}
	if ($detail==""){ $errMsg_noidung = "Hãy nhập nội dung rao vặt !<br>";$errMsg="error";}
	if ($parent==""){ $errMsg_chuyenmuc= "Hãy chọn ít nhất một chuyên mục!<br>";$errMsg="error";}
	if ($parent1==""){ $errMsg_chuyenmuc1= "Hãy chọn ít nhất một chuyên mục!<br>";$errMsg="error";}
	
	if($cate==0){ // not spam
		if ($tinh=="") {$errMsg_tinh= "Hãy chọn Tỉnh/Thành cần rao!<br>";$errMsg="error";}
		if ($huyen=="") {$errMsg_huyen= "Hãy chọn Quận/Huyện cần rao!<br>";$errMsg="error";}
		if ($phuong=="") {$errMsg_phuong= "Hãy chọn Phường/Xã cần rao!<br>";$errMsg="error";}
	}
 
	$aa=0;
		if(get_field("tbl_rv_item","name",$name,"id")!="") {$errMsg_tieude = "Tiêu đề bị trùng, hãy nhập tiêu đề rao vặt khác !<br>";$errMsg="error";;}
	
	if ($errMsg==''){ 
			 $sql = "insert into tbl_rv_item (code, iduser ,cate , idcity , idquan , idphuong, idstreet, sonha , latitude, longitude , type , name, khachhang , diachi , email , dienthoai  , catebds , parent, detail_short, detail , sort, price , donvi , dientich , huong , tinhtrangphaply , dtkhuonvien , tongdtsudung , solau , sophong , namxaydung , dacdiemkhac , raoban_thue , title, description , keyword , image , image1 , image2 , image3 , image4 , image5 , status , date_added, date_up , last_modified, lang) values ('".$code."','".$iduser."','".$cate."','".$tinh."','".$huyen."','".$phuong."','".$duong."','".$sonha."','".$lat."','".$long."','".$type."','".$name."','".$khachhang."','".$diachi."','".$email."','".$dienthoai."','".$loai."','".$parent."','".$detail_short."','".$detail."','".$sort."','".$price."','".$donvi."','".$dientich."','".$huong."','".$phaply."','".$dtkhuonvien."','".$tongdtsudung."','".$solau."','".$sophong."','".$namxaydung."','".$ddk."','".$raoban_thue."','".$title."','".$description."','".$keyword."','".$image1."','".$image2."','".$image3."','".$image4."','".$image5."','".$image6."','".$status."',now(),now(),now(),'".$lang."')";
			 
			if (mysql_query($sql,$conn)){
				if(empty($_POST['id'])) $oldid = mysql_insert_id();
				$r = getRecord("tbl_rv_item","id=".$oldid);
				$bandau=1;	
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
				
				 
				$arrField = array(
					"parent"          => "'".$oldid."'"
				);// ko them id vao cuoi cho dep	
				
				if($image1!="") $result = update("tbl_img_bds",$arrField,"image='".$image1."'");
				if($image2!="") $result = update("tbl_img_bds",$arrField,"image='".$image2."'");
				if($image3!="") $result = update("tbl_img_bds",$arrField,"image='".$image3."'");
				if($image4!="") $result = update("tbl_img_bds",$arrField,"image='".$image4."'");
				if($image5!="") $result = update("tbl_img_bds",$arrField,"image='".$image5."'");
				if($image6!="") $result = update("tbl_img_bds",$arrField,"image='".$image6."'"); 

			}else{
				$errMsg = "Không thể cập nhật !";
			}
	}
 
	if ($errMsg == '') {
	?>
	<div id="dialog" style="display:none;">	  
    </div>
    <script type="text/javascript">
    $(document).ready(function (){
        $('#dialog').html(' <br>Bạn vừa đăng tin thành công ! ');
        
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
            close: function(event, ui) { window.location.href = "<?=$linkrootbds;?>quan-ly-tin-dang.html"; }
        });
    });
    </script>
    <?
	}
	}//end thong bao dang tin
	?>
<?php
	if (isset($_POST['quayra'])==true) {
		header("location:".$linkrootbds_bds);
	}

?>

<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/ckeditor/ckeditor.js"></script>
<!--<script src="<?php echo $linkrootbds?>lib/autocomplete/jquery.select-to-autocomplete.js"></script>
<link rel="stylesheet" href="<?php echo $linkrootbds?>lib/autocomplete/jquery-ui.css">-->


<script>
$(document).ready(function() {
	/*$('#tinh').selectToAutocomplete();*/
	$("#tinh").select2();$("#huyen").select2();$("#phuong").select2();$("#duong").select2();
	$("#loai").select2();$("#ddCat").select2();$("#huong").select2();$("#phaply").select2();
	$("#loai").change(function(){ 
		var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
		var table="tbl_rv_category";
		$("#ddCat").load("<?php echo $linkrootbds?>module/getChild.php?table="+ table + "&id=" +id); //alert(idthanhpho)
	});
	$("#tinh").change(function(){ 
		var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
		var table="tbl_quanhuyen";
		$("#huyen").load("<?php echo $linkrootbds?>module/getChild.php?table="+ table + "&id=" +id, function() {
  			/*$('#huyen').selectToAutocomplete();*/
			
		});
		
		  
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
<style>
.ui-autocomplete-input {
	border:none;
	background:none;
    font-family: Arial,sans-serif,Helvetica;
    font-size: 11px;
    font-weight: 400;
	padding-left:5px;
    width: 99%;
}
</style>
<div class="breacrum">
    <ul>
        <li>
            <a href="#">Trang chủ</a>
        </li>
        <li>
            Đăng tin  
        </li>
    </ul>
</div><!-- End .breacrum -->

<?php if($iduser=="") {?>    
    <div class="f_dt">
    
    </div>
<?php }elseif($iduser!="" && $bandau==0 ){?>
    
    <div class="f_dt">
    	<form action="<?php echo $linkrootbds?>dang-tin.html" method="post" enctype="multipart/form-data" name=formdk id=formdk>
        <span class="note_dt">
            Lưu ý: những ô có dấu sao * là bắt buộc phải nhập.  <?php  if($errMsg!="") echo "Lỗi: ".$errMsg;?>
        </span><!-- End .note_dt -->
        
        <?php
        if($cate==0){
		?>
        
        <div class="b_dt_1">
            <ul>
            	<li class="clearfix">
                    <span class="l1_bdt">
                        Người liên hệ
                    </span>
                    <span class="l2_bdt"> 
                        <input name="khachhang" type="text" class="ipt_bdt box-sizing-fix" id="khachhang" title="Nhập tiêu đề" size="70" value="<?php echo $khachhang ?>" placeholder="Bạn vui lòng nhập tên người liên hệ...!" />
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Loại hình giao dịch <span class="color_btd">*</span>
                    </span>
                    <span class="l2_bdt">
                        <div class="sty_bdt <?php if($errMsg_chuyenmuc1!="") echo 'errors_dt';?>">
                          <select name="loai" id="loai"  > 
                          		 <option value="">Chọn nhu cầu</option> 
								<?php   
                                $cate=get_records("tbl_rv_category"," parent=2 and cate=0","sort ASC"," "," ");
                                while($row=mysql_fetch_assoc($cate)){?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option> 
                                <?php } ?>
                          </select>
                        </div>
                        <?php if($errMsg_chuyenmuc1!="")  {?><span class="bl_dt"> <?=$errMsg_chuyenmuc1?></span> <?php }?>
                    </span>
                </li>
                
                <li class="clearfix">
                    <span class="l1_bdt">
                        Điện thoại
                    </span>
                    <span class="l2_bdt"> 
                        <input class="ipt_bdt box-sizing-fix" name="dienthoai" type="text"   id="dienthoai" title="Nhập tiêu đề" size="70" value="<?php echo $dienthoai ?>"  placeholder="Bạn vui lòng nhập số điện thoại liên hệ...!"  />
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Loại bất động sản <span class="color_btd">*</span>
                    </span>
                    <span class="l2_bdt">
                        <div class="sty_bdt  <?php if($errMsg_chuyenmuc!="") echo 'errors_dt';?>">
                            <select name="ddCat" id="ddCat" > 
								<?php if($_POST['ddCat']!=NULL){ ?>
                                <option value="<?php echo $idtheloaic=$_POST['ddCat'] ; ?>"><?php echo get_field('tbl_rv_category','id',$parent,'name'); ?></option>
                                <?php }?>
                                <option value="">Chọn hình thức</option> 
                          </select>
                        </div>
                        <?php if($errMsg_chuyenmuc!="")  {?><span class="bl_dt"> <?=$errMsg_chuyenmuc?></span> <?php }?>
                    </span> 
                    	
                     
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Địa chỉ
                    </span>
                    <span class="l2_bdt"> 
                         <input name="diachi" type="text" class="ipt_bdt box-sizing-fix" id="diachi" title="Nhập địa chỉ" value="<?php echo $diachi ?>"  placeholder="Bạn vui lòng nhập địa chỉ liên hệ...!"  />
                    </span>
                </li>
                 
                
                
                 <li class="clearfix">
                    <span class="l1_bdt">
                        Tiêu đề <span class="color_btd">*</span>
                    </span>
                    <span class="l2_bdt">
                   	 <input name="txtName" type="text" class="ipt_bdt box-sizing-fix <?php if($errMsg_tieude!="") echo 'errors_dt';?>" id="txtName" title="Nhập tiêu đề" size="70" value="<?php echo $name ?>" placeholder="Bạn cần phải nhập tiêu đề tin bất động sản...! " /> 
                     <?php if($errMsg_tieude!="") {?>
                    <span class="bl_dt">
                     <?php echo $errMsg_tieude;?>
                    </span>
                    <?php }?>
                    </span>
                     
                </li>
                
                <li class="clearfix">
                    <span class="l1_bdt">
                        Email
                    </span>
                    <span class="l2_bdt"> 
                          <input name="email" type="text" class="ipt_bdt box-sizing-fix" id="email" title="Nhập tiêu đề" size="70" value="<?php echo $email ?>"  placeholder="Bạn vui lòng nhập Email liên hệ...!"  />
                    </span>
                </li>
                
                <li class="clearfix">
                    <span class="l1_bdt" style="text-align:right; font-size:11px;">
                         
                    </span> 
                    <span class="l2_bdt" style="color:#F00; font-size:11px;"> 
                    	Lưu ý: Tiêu đề bài viết không được vượt quá 100 ký tự
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
                      <div class="sty_bdt  <?php if($errMsg_tinh!="") echo 'errors_dt';?>">
                          <select name="tinh" id="tinh"  > 
							  <?php if($_POST['tinh']!=NULL){ ?>
                              <option value="<?php echo $tinh=$_POST['tinh'] ; ?>"><?php echo get_field('tbl_quanhuyen_category','id',$tinh,'name'); ?></option>
                              <?php }?>
                              <option value="" <?php if($tinh=="") echo 'selected="selected"';?>> Chọn thành phố </option> 
                                
                              <?php   
                                $cate=get_records("tbl_quanhuyen_category"," ","sort ASC"," "," ");
                                while ($row=mysql_fetch_assoc($cate)){?>
                              <option value="<?php echo $row['id']; ?>" <?php if($tinh==$row['id']) echo 'selected="selected"';?> data-alternative-spellings="<?php echo $row['name']; ?>" ><?php echo $row['name']; ?></option> 
                              <?php } ?>
                            
                          </select>
           			  </div> 
						<?php if($errMsg_tinh!="") {?>
                        <span class="bl_dt">
                        <?php echo $errMsg_tinh;?>
                        </span>
                        <?php }?>
                  </span>
                </li>
              <li class="clearfix">
                  <span class="l1_bdt">
                     Quận huyện  <span class="color_btd">*</span>
                  </span>
                  <span class="l2_bdt">
                      <div class="sty_bdt <?php if($errMsg_huyen!="") echo 'errors_dt';?>">
                          <select name="huyen" id="huyen"  > 
							  <?php if($_POST['huyen']!=NULL){ ?>
                              <option value="<?php echo $huyen=$_POST['huyen'] ; ?>"><?php echo get_field('tbl_quanhuyen','id',$huyen,'name'); ?></option>
                              <?php }?>
                              <option value=""> Chọn Quận / Huyện </option> 
  
                          </select>
           			  </div>
					<?php if($errMsg_huyen!="") {?>
                    <span class="bl_dt">
                    <?php echo $errMsg_huyen;?>
                    </span>
                    <?php }?>
                  </span>
                </li>
                <li class="clearfix">
                  <span class="l1_bdt">
                     Phường/Xã  <span class="color_btd">*</span>
                  </span>
                  <span class="l2_bdt">
                      <div class="sty_bdt  <?php if($errMsg_phuong!="") echo 'errors_dt';?>">
                          <select name="phuong" id="phuong"  > 
							  <?php if($_POST['huyen']!=NULL){ ?>
                              <option value="<?php echo $phuong=$_POST['phuong'] ; ?>"><?php echo get_field('tbl_phuongxa','id',$phuong,'name'); ?></option>
                              <?php }?>
                              <option value=""> Chọn Phường / Xã </option> 
  
                          </select>
           			  </div> 
						<?php if($errMsg_phuong!="") {?>
                        <span class="bl_dt">
                        <?php echo $errMsg_phuong;?>
                        </span>
                        <?php }?>
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
                         <input name="sonha" type="text" class="ipt_bdt box-sizing-fix" id="sonha" title="Nhập số nhà" value="<?php echo $sonha ?>" placeholder="Bạn vui lòng nhập số nhà (vd: 2 hoặc 15...)...!" />
                    </span>
                </li>
                <li class="clearfix"></li>
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
						removePlugins: 'bidi,div,font,forms,flash,horizontalrule,iframe,table,tabletools,smiley',
						removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript,Image,SpecialChar,PageBreak,Link,Unlink,Source,About',
						format_tags: 'p;h1;h2;h3;pre;address',		
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
                     
                    <span class="l2_bdt">
						<?php if($errMsg_noidung!="") {?>
                        <span class="bl_dt">
                        <?php echo $errMsg_noidung;?>
                        </span>
                        <?php }?>
                    </span>
        
        </div><!-- End .b_dt_2 -->
        
        <div class="b_dt_3">
        
            <span class="t_dt">Thông tin giá</span>
            
            <ul>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Nhập giá
                    </span>
                    <span class="l2_bdt">
                        <div class="sty_bdt">
                            <input name="price" type="text" class="ipt_bdt box-sizing-fix" id="price" title="Nhập giá" size="30" value="<?php echo $price ?>" placeholder="Bạn vui lòng nhập giá bán, cho thuê...!" />
                        </div>
                        <span style="display: block; font-size: 11px; padding-top: 5px;">(VD: 3 hoặc 34.5, 0 = Thương lượng)</span>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Hướng
                    </span>
                    <span class="l2_bdt">
                        <div class="sty_bdt">


                            <select name="huong" id="huong"  > 
                                <option value="0" <?php if($huong==0) echo 'selected="selected"'; ?> > Không xác định </option>
                                <option value="1" <?php if($huong==1) echo 'selected="selected"'; ?>> Đông </option>
                                <option value="2" <?php if($huong==2) echo 'selected="selected"'; ?>> Nam </option>
                                <option value="3" <?php if($huong==3) echo 'selected="selected"'; ?>> Tây </option>
                                <option value="4" <?php if($huong==4) echo 'selected="selected"'; ?>> Bắc </option>
                                <option value="5" <?php if($huong==5) echo 'selected="selected"'; ?>> Đông bắc </option>
                                <option value="6" <?php if($huong==6) echo 'selected="selected"'; ?>> Đông nam </option>
                                <option value="7" <?php if($huong==7) echo 'selected="selected"'; ?>> Tây bắc </option>
                                <option value="8" <?php if($huong==8) echo 'selected="selected"'; ?>> Tây nam </option>
                            </select>
                        </div>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Đơn vị
                    </span>
                    <span class="l2_bdt">
                        <span class="li_bdt">
                            <input id="id_b1" type="radio"  value="1"  name="donvi"  <?php if($donvi==1) echo 'checked="checked"';?> >
                            <label for="id_b1">Ngàn</label>
                        </span>
                        <span class="li_bdt">
                            <input id="id_b2" type="radio"  value="2"  checked="checked" name="donvi"  <?php if($donvi==2 ) echo 'checked="checked"';?> >
                            <label for="id_b2">Triệu</label>
                        </span>
                        <span class="li_bdt">
                            <input id="id_b3" type="radio"  value="3"  name="donvi" <?php if($donvi==3 || $donvi=="") echo 'checked="checked"';?>>
                            <label for="id_b3">Tỷ</label>
                        </span>
                        <span class="li_bdt">
                            <input id="id_b4" type="radio"  value="4"  name="donvi" <?php if($donvi==4) echo 'checked="checked"';?>>
                            <label for="id_b4">USD</label>
                        </span>
                        <span class="li_bdt"> 
                            <input id="id_b5" type="radio"  value="5"  name="donvi" <?php if($donvi==5) echo 'checked="checked"';?>>
                            <label for="id_b5">Cây vàng</label>
                        </span>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Tính theo
                    </span>
                    <span class="l2_bdt">
                        <span class="li_bdt">
                            <input id="id_b6" type="radio" checked="checked"  value="1"  name="dientich" <?php if($dientich==1 ) echo 'checked="checked"'; ?> >
                            <label for="id_b6">/m2</label>
                        </span>
                        <span class="li_bdt">
                            <input id="id_b7" type="radio"  value="2"  name="dientich" <?php if($dientich==2) echo 'checked="checked"'; ?>>
                            <label for="id_b7">/Hecta</label>
                        </span>
                        <span class="li_bdt">
                            <input id="id_b8" type="radio"  value="3"  name="dientich" <?php if($dientich==3 || $dientich=="") echo 'checked="checked"'; ?>>
                            <label for="id_b8">/Tổng diện tích</label>
                        </span>
                        <span class="li_bdt">
                            <input id="id_b9" type="radio"  value="4"  name="dientich" <?php if($dientich==4) echo 'checked="checked"'; ?>>
                            <label for="id_b9">/Tháng</label>
                        </span>
                        <span class="li_bdt">
                            <input id="id_b10" type="radio"  value="5"  name="dientich" <?php if($dientich==5) echo 'checked="checked"'; ?>>
                            <label for="id_b10">/Năm</label>
                        </span>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Rao bán thuê <span class="color_btd">*</span>
                    </span>
                    <span class="l2_bdt">
                        <span class="li_bdt">
                            <input name="raoban_thue" id="raoban_thue"  type="radio" value="1" <?php if($raoban_thue==1 || $raoban_thue=="") echo 'checked="checked"';?> >
                            <label for="id_b11">Miễn trung gian</label>
                        </span>
                        <span class="li_bdt">
                            <input name="raoban_thue" id="raoban_thue"  type="radio" value="2"  <?php if($raoban_thue==2) echo 'checked="checked"';?> >
                            <label for="id_b12">Ký gửi môi giới</label>
                        </span>
                    </span>
                </li>
            </ul>
            <div class="clear"></div>
        
        </div><!-- End .b_dt_3 -->
        
        <div class="b_dt_3">
        
            <span class="t_dt">Thông tin cấu trúc và diện tích</span>
            
            <ul>
                <li class="clearfix">
                    <span class="l1_bdt">

                        Tình trạng pháp lý
                    </span>
                     <span class="l2_bdt">
                        <div class="sty_bdt">
                             <select name="phaply" id="phaply"  > 
                                <option value="0"  <?php if($phaply==0) echo 'selected="selected"'; ?>  >Không xác định </option>
                                <option value="1" <?php if($phaply==1) echo 'selected="selected"'; ?> > Hơp đồng </option>
                                <option value="2" <?php if($phaply==2) echo 'selected="selected"'; ?> > Giấy tờ hợp lệ </option>
                                <option value="3" <?php if($phaply==3) echo 'selected="selected"'; ?> > Sổ đỏ </option>
                                <option value="4" <?php if($phaply==4) echo 'selected="selected"'; ?> > Sổ hồng </option>
                                <option value="5" <?php if($phaply==5) echo 'selected="selected"'; ?> > Giấy tay </option>
                                <option value="6" <?php if($phaply==6) echo 'selected="selected"'; ?> > Đang hợp thức hóa </option>
                                <option value="7" <?php if($phaply==7) echo 'selected="selected"'; ?> > Chủ quyền tư nhân </option>
                            </select>
                        </div>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Số lầu
                    </span>
                    <span class="l2_bdt"> 
                         <input name="solau" type="text" class="ipt_bdt box-sizing-fix" id="solau" title="Nhập số lầu" size="30" value="<?php echo $solau ?>" placeholder="Bạn vui lòng nhập số lầu(tầng)...!" />
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Diện tích khuôn viên
                    </span>
                    <span class="l2_bdt"> 
                        <input name="dtkhuonvien" type="text" class="ipt_bdt box-sizing-fix" id="dtkhuonvien" title="Nhập diện tích khuôn viên" size="30" value="<?php echo $dtkhuonvien ?>" placeholder="Bạn vui lòng nhập diện tích nhà(vd: 5mx13m)...!" />
                        <span style="display: block; font-size: 11px; padding-top: 5px;">(ví dụ : 5x20)</span>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Số phòng
                    </span>
                    <span class="l2_bdt"> 
                         <input name="sophong" type="text" class="ipt_bdt box-sizing-fix" id="sophong" title="Nhập số phòng" size="30" value="<?php echo $sophong ?>" placeholder="Bạn vui lòng nhập số phòng(vd: 4)" />
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Diện tích
                    </span> 
                    <span class="l2_bdt"> 
                         <input name="tongdtsudung" type="text" class="ipt_bdt box-sizing-fix" id="tongdtsudung" title="Nhập số phòng" size="30" value="<?php echo $tongdtsudung ?>" placeholder="Bạn vui lòng nhập tổng diện tích(vd:65)...!" />
                         <span style="display: block; font-size: 11px; padding-top: 5px;">(ví dụ : 50 và được tính theo m2)</span>
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Năm xây dựng
                    </span>
                    <span class="l2_bdt"> 
                        <input name="namxaydung" type="text" class="ipt_bdt box-sizing-fix" id="namxaydung" title="Nhập năm xây dựng" size="30" value="<?php echo $namxaydung ?>" placeholder="Bạn vui lòng nhập năm xây dựng(vd:2014)...!" />
                        <span style="display: block; font-size: 11px; padding-top: 5px;">(ví dụ : 2001)</span>
                    </span>
                </li>
            </ul>
            <div class="clear"></div>
        
        </div><!-- End .b_dt_3 -->
        
        <div class="b_dt_3">
        
            <span class="t_dt">Đặc điểm khác</span>
            
            <div>
                <table class="tab_ddk">
                    <tbody>
                        <tr>
                            <td>
                                <input class="i_sty_ddk" type="checkbox"  name="dacdiemkhac[]" value="1" <?php echo valueinstr($ddk,1);?> >
                                <label class="l_sty_ddk" >Tiện để ở</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="5" <?php echo valueinstr($ddk,5);?> >
                                <label class="l_sty_ddk"  >Gần trường</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="9" <?php echo valueinstr($ddk,9);?> >
                                <label class="l_sty_ddk"   >Khu nội bộ</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="13" <?php echo valueinstr($ddk,13);?>>
                                <label class="l_sty_ddk"   >Truyền hình cáp</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="2" <?php echo valueinstr($ddk,2);?> >
                                <label class="l_sty_ddk"  >Tiện làm văn phòng</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="6" <?php echo valueinstr($ddk,6);?> >
                                <label class="l_sty_ddk"  >Gần bệnh viện</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="10" <?php echo valueinstr($ddk,10);?>>
                                <label class="l_sty_ddk"   >Có bảo vệ</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="14" <?php echo valueinstr($ddk,14);?> >
                                <label class="l_sty_ddk"  >Điện thoại</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="i_sty_ddk" type="checkbox"  name="dacdiemkhac[]" value="9" <?php echo valueinstr($ddk,9);?> >
                                <label class="l_sty_ddk" >Tiện cho sản xuất</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="7" <?php echo valueinstr($ddk,7);?> >
                                <label class="l_sty_ddk"  >Gần chợ - siêu thị</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="11" <?php echo valueinstr($ddk,11);?> > 
                                <label class="l_sty_ddk"  >Chỗ đậu xe hơi</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox"   name="dacdiemkhac[]" value="15" <?php echo valueinstr($ddk,15);?> > 
                                <label class="l_sty_ddk">Đồng hồ nước</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="13" <?php echo valueinstr($ddk,13);?> >
                                <label class="l_sty_ddk">Tiện kinh doanh</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="8" <?php echo valueinstr($ddk,8);?> >
                                <label class="l_sty_ddk">Gần công viên</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="12" <?php echo valueinstr($ddk,12);?> >
                                <label class="l_sty_ddk">Internet</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="16" <?php echo valueinstr($ddk,16);?> >
                                <label class="l_sty_ddk">Đồng hồ điện</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="17" <?php echo valueinstr($ddk,17);?> >
                                <label class="l_sty_ddk">Máy nước nóng</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="18" <?php echo valueinstr($ddk,18);?> >
                                <label class="l_sty_ddk">Máy lạnh</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="19" <?php echo valueinstr($ddk,19);?> >
                                <label class="l_sty_ddk">Hồ bơi</label>
                            </td>
                            <td>
                                <input class="i_sty_ddk" type="checkbox" name="dacdiemkhac[]" value="20" <?php echo valueinstr($ddk,20);?> >
                                <label class="l_sty_ddk">Sân vườn</label>
                            </td>
                        </tr>
                    </tbody>
                </table><!-- End .tab_ddk -->
            </div>
        
        </div><!-- End .b_dt_3 -->
        
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
        	<script> 
 
				$(document).ready(function() {
					// my upload image ver 1.0 
					$(".upload").click(function() {
						
						 var id=$(this).attr("value"); 
						 var valueTest=$("#my_file_va_"+id).attr("value"); 
						
						 if(valueTest=="" || valueTest=="imgs/image.png") $("input[id='my_file"+id+"']").click(); 
						
						 $("input[id='my_file"+id+"']").change(function() {  
						 
								var filename = $("#my_file"+id).val();
		
								// Use a regular expression to trim everything before final dot
								var extension = filename.replace(/^.*\./, '');
						
								// Iff there is no dot anywhere in filename, we would have extension == filename,
								// so we account for this possibility now
								if (extension == filename) {
									extension = '';
								} else {
									// if there is an extension, we convert to lower case
									// (N.B. this conversion will not effect the value of the extension
									// on the file upload.)
									extension = extension.toLowerCase();
								}
						
								switch (extension) {
									case 'jpg':/* do no thing*/;break;
									case 'jpeg':/* do no thing*/;break;
									case 'png': /* do no thing*/;break;
						
									// uncomment the next line to allow the form to submitted in this case:
						//          break;
						
									default:
										// Cancel the form submission
										alert("Loại tập tin này không được chấp nhận");
										submitEvent.preventDefault();
								}
							
								obj = this;
								var fd;
								fd = new FormData();    
								fd.append( 'file', $('#my_file'+id)[0].files[0] ); 
								
								$("#image_u"+id).attr({src: "<?php echo $linkrootbds?>imgs/loading.gif",title: "loading",alt: "loading Logo"});
								
								$.ajax({
								   type: "POST",
								   url:'<?php echo $linkrootbds?>module/file.php?id='+id,
								   processData: false,
								   contentType: false,
								   data: fd,
								   cache: false,
								   success: function(data){  
									$("#image_u"+id).attr({src: data,title: "loading",alt: "loading Logo"});
									$("#my_file_va_"+id).attr("value",data);
									$("#close_my_file_va_"+id).css("display","block");	 
								   }
								});		
						});;
						 
					});
					
					$(".close_t").click(function() {
						var id=$(this).attr("value"); 
						$("#image_u"+id).attr({
							src: "<?php echo $linkrootbds?>imgs/image.png",
							title: "loading",
							alt: "loading Logo"
						});
						$("#my_file_va_"+id).attr("value","");
						$(this).css("display","none");
					}); 
		 
				}); 
			</script> 
            <span class="t_dt">Hình ảnh</span>
            	<style>
					.ul_img_bdt1 li { 
					width:110px !important; height: 110px !important; float: left;
					background-color: #fff;
					border: 1px solid #cdcdcd;
					border-radius: 4px;
					color: white;
					display: inline-block;
					font-weight: bold;
					text-decoration: none;
					margin-left:20px;
					margin-top:5px !important;
					}
					.up_img_t { width:100px; height:100px; float:left; position:relative; padding:5px;}
					.up_img_t img { width:100%; height:100%;}
					.close_t { width:10px; height:10px; position:absolute; left:0; top:0; background:url(<?php echo $linkrootbds?>imgs/close.png)  no-repeat center #FFFFFF; display:none; padding:4px;}
				</style>
                <?php
					if($image1!="") $hinh1=$image1; 
					else $hinh1="imgs/image.png";
					if($image2!="") $hinh2=$image2; 
					else $hinh2="imgs/image.png";
					if($image3!="") $hinh3=$image3; 
					else $hinh3="imgs/image.png";
					if($image4!="") $hinh4=$image4; 
					else $hinh4="imgs/image.png";
					if($image5!="") $hinh5=$image5; 
					else $hinh5="imgs/image.png";
					if($image6!="") $hinh6=$image6; 
					else $hinh6="imgs/image.png";
				?>
                <ul class="ul_img_bdt1">
                	<li class="clearfix"> 
                    	<div class="up_img_t" >
                            <img class="upload" value="1" id="image_u1"  src="<?php echo $linkrootbds?><?=$hinh1?>"   /> 
                            <input type="file" name="my_file"  class="my_file" valuee="1" id="my_file1" style=" visibility:hidden;" />
                            <input type="hidden" id="my_file_va_1" name="my_file_va_1"  value="<?=$image1?>" />
                            <span class="close_t" id="close_my_file_va_1" value="1"  style=" <?php  if($image1!="") { ?>display:block;  <?php }?>" > </span>
                        </div>
                    </li>
                    <li class="clearfix"> 
                    	<div class="up_img_t" >
                            <img class="upload" value="2" id="image_u2"  src="<?php echo $linkrootbds?><?=$hinh2?>"   /> 
                            <input type="file"  name="my_file"   class="my_file" valuee="2" id="my_file2" style=" visibility:hidden;" />
                            <input type="hidden" id="my_file_va_2" name="my_file_va_2"  value="<?=$image2?>" />
                            <span class="close_t" id="close_my_file_va_2" value="2" style=" <?php  if($image2!="") { ?>display:block; <?php }?>" > </span>
                        </div>
                    </li>
                    <li class="clearfix"> 
                    	<div class="up_img_t" >
                            <img class="upload" value="3" id="image_u3"  src="<?php echo $linkrootbds?><?=$hinh3?>"  /> 
                            <input type="file"  name="my_file"   class="my_file" valuee="3" id="my_file3" style=" visibility:hidden;" />
                            <input type="hidden" id="my_file_va_3"  name="my_file_va_3" value="<?=$image3?>" />
                            <span class="close_t" id="close_my_file_va_3" value="3" style=" <?php  if($image3!="") { ?>display:block; <?php }?>"> </span>
                        </div>
                    </li>
                    <li class="clearfix"> 
                    	<div class="up_img_t" >
                            <img class="upload" value="4" id="image_u4"  src="<?php echo $linkrootbds?><?=$hinh4?>"  /> 
                            <input type="file"  name="my_file"   class="my_file" valuee="4" id="my_file4" style=" visibility:hidden;" />
                            <input type="hidden" id="my_file_va_4" name="my_file_va_4"  value="<?=$image4?>" />
                            <span class="close_t" id="close_my_file_va_4" value="4" style=" <?php  if($image4!="") { ?>display:block; <?php }?>"> </span>
                        </div>
                    </li>
                     <li class="clearfix"> 
                    	<div class="up_img_t" >
                            <img class="upload" value="5" id="image_u5"  src="<?php echo $linkrootbds?><?=$hinh5?>"  /> 
                            <input type="file"  name="my_file"   class="my_file" valuee="5" id="my_file5" style=" visibility:hidden;" />
                            <input type="hidden" id="my_file_va_5" name="my_file_va_5"   value="<?=$image5?>" />
                            <span class="close_t" id="close_my_file_va_5" value="5" style=" <?php  if($image5!="") { ?>display:block; <?php }?>"> </span>
                        </div>
                    </li>
                      <li class="clearfix"> 
                    	<div class="up_img_t" >
                            <img class="upload" value="6" id="image_u6"  src="<?php echo $linkrootbds?><?=$hinh6?>"  /> 
                            <input type="file"  name="my_file"   class="my_file" valuee="6" id="my_file6" style=" visibility:hidden;" />
                            <input type="hidden" id="my_file_va_6" name="my_file_va_6"  value="<?=$image6?>" />
                            <span class="close_t" id="close_my_file_va_6" value="6" style=" <?php  if($image6!="") { ?>display:block; <?php }?>" > </span>
                        </div>
                    </li>
                 
                     <div class="clear"></div>
                </ul>
            <div class="clear"></div>
        
        </div><!-- End .b_dt_4 -->
        
        <?php }else{?>
        <div class="b_dt_1">
            <ul>
            	 
                <li class="clearfix">
                    <span class="l1_bdt">
                        Loại hình giao dịch <span class="color_btd">*</span>
                    </span>
                    <span class="l2_bdt">
                        <div class="sty_bdt <?php if($errMsg_chuyenmuc1!="") echo 'errors_dt';?>">
                          <select name="loai" id="loai"  > 
                          		 <option value="">Chọn nhu cầu</option> 
								<?php   
                                $cate=get_records("tbl_rv_category"," parent=2 and cate=0","sort ASC"," "," ");
                                while($row=mysql_fetch_assoc($cate)){?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option> 
                                <?php } ?>
                          </select>
                        </div>
                        <?php if($errMsg_chuyenmuc1!="")  {?><span class="bl_dt"> <?=$errMsg_chuyenmuc1?></span> <?php }?>
                    </span>
                </li>
                
              
                <li class="clearfix">
                    <span class="l1_bdt">
                        Loại bất động sản <span class="color_btd">*</span>
                    </span>
                    <span class="l2_bdt">
                        <div class="sty_bdt  <?php if($errMsg_chuyenmuc!="") echo 'errors_dt';?>">
                            <select name="ddCat" id="ddCat" > 
								<?php if($_POST['ddCat']!=NULL){ ?>
                                <option value="<?php echo $idtheloaic=$_POST['ddCat'] ; ?>"><?php echo get_field('tbl_rv_category','id',$parent,'name'); ?></option>
                                <?php }?>
                                <option value="">Chọn hình thức</option> 
                          </select>
                        </div>
                        <?php if($errMsg_chuyenmuc!="")  {?><span class="bl_dt"> <?=$errMsg_chuyenmuc?></span> <?php }?>
                    </span> 
                    	
                     
                </li>
                
                
                
                 <li class="clearfix">
                    <span class="l1_bdt">
                        Tiêu đề <span class="color_btd">*</span>
                    </span>
                    <span class="l2_bdt">
                   	 <input name="txtName" type="text" class="ipt_bdt box-sizing-fix <?php if($errMsg_tieude!="") echo 'errors_dt';?>" id="txtName" title="Nhập tiêu đề" size="70" value="<?php echo $name ?>" placeholder="Bạn cần phải nhập tiêu đề tin bất động sản...! " /> 
                     <?php if($errMsg_tieude!="") {?>
                    <span class="bl_dt">
                     <?php echo $errMsg_tieude;?>
                    </span>
                    <?php }?>
                    </span>
                     
                </li>
                
                 
                
                <li class="clearfix">
                    <span class="l1_bdt" style="text-align:right; font-size:11px;">
                         
                    </span> 
                    <span class="l2_bdt" style="color:#F00; font-size:11px;"> 
                    	Lưu ý: Tiêu đề bài viết không được vượt quá 100 ký tự
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
						removePlugins: 'bidi,div,font,forms,flash,horizontalrule,iframe,table,tabletools,smiley',
						removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript,Image,SpecialChar,PageBreak,Link,Unlink,Source,About',
						format_tags: 'p;h1;h2;h3;pre;address',		
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
                     
                    <span class="l2_bdt">
						<?php if($errMsg_noidung!="") {?>
                        <span class="bl_dt">
                        <?php echo $errMsg_noidung;?>
                        </span>
                        <?php }?>
                    </span>
        
        </div>
        
        <div class="b_dt_4">
        	<script> 
 
				$(document).ready(function() {
					// my upload image ver 1.0 
					$(".upload").click(function() {
						
						 var id=$(this).attr("value"); 
						 var valueTest=$("#my_file_va_"+id).attr("value"); 
						
						 if(valueTest=="" || valueTest=="imgs/image.png") $("input[id='my_file"+id+"']").click(); 
						
						 $("input[id='my_file"+id+"']").change(function() {  
						 
								var filename = $("#my_file"+id).val();
		
								// Use a regular expression to trim everything before final dot
								var extension = filename.replace(/^.*\./, '');
						
								// Iff there is no dot anywhere in filename, we would have extension == filename,
								// so we account for this possibility now
								if (extension == filename) {
									extension = '';
								} else {
									// if there is an extension, we convert to lower case
									// (N.B. this conversion will not effect the value of the extension
									// on the file upload.)
									extension = extension.toLowerCase();
								}
						
								switch (extension) {
									case 'jpg':/* do no thing*/;break;
									case 'jpeg':/* do no thing*/;break;
									case 'png': /* do no thing*/;break;
						
									// uncomment the next line to allow the form to submitted in this case:
						//          break;
						
									default:
										// Cancel the form submission
										alert("Loại tập tin này không được chấp nhận");
										submitEvent.preventDefault();
								}
							
								obj = this;
								var fd;
								fd = new FormData();    
								fd.append( 'file', $('#my_file'+id)[0].files[0] ); 
								
								$("#image_u"+id).attr({src: "<?php echo $linkrootbds?>imgs/loading.gif",title: "loading",alt: "loading Logo"});
								
								$.ajax({
								   type: "POST",
								   url:'<?php echo $linkrootbds?>module/file.php?id='+id,
								   processData: false,
								   contentType: false,
								   data: fd,
								   cache: false,
								   success: function(data){  
									$("#image_u"+id).attr({src: data,title: "loading",alt: "loading Logo"});
									$("#my_file_va_"+id).attr("value",data);
									$("#close_my_file_va_"+id).css("display","block");	 
								   }
								});		
						});;
						 
					});
					
					$(".close_t").click(function() {
						var id=$(this).attr("value"); 
						$("#image_u"+id).attr({
							src: "<?php echo $linkrootbds?>imgs/image.png",
							title: "loading",
							alt: "loading Logo"
						});
						$("#my_file_va_"+id).attr("value","");
						$(this).css("display","none");
					}); 
		 
				}); 
			</script> 
            <span class="t_dt">Hình ảnh</span>
            	<style>
					.ul_img_bdt1 li { 
					width:110px !important; height: 110px !important; float: left;
					background-color: #fff;
					border: 1px solid #cdcdcd;
					border-radius: 4px;
					color: white;
					display: inline-block;
					font-weight: bold;
					text-decoration: none;
					margin-left:20px;
					margin-top:5px !important;
					}
					.up_img_t { width:100px; height:100px; float:left; position:relative; padding:5px;}
					.up_img_t img { width:100%; height:100%;}
					.close_t { width:10px; height:10px; position:absolute; left:0; top:0; background:url(<?php echo $linkrootbds?>imgs/close.png)  no-repeat center #FFFFFF; display:none; padding:4px;}
				</style>
                <?php
					if($image1!="") $hinh1=$image1; 
					else $hinh1="imgs/image.png";
					if($image2!="") $hinh2=$image2; 
					else $hinh2="imgs/image.png";
					if($image3!="") $hinh3=$image3; 
					else $hinh3="imgs/image.png";
					if($image4!="") $hinh4=$image4; 
					else $hinh4="imgs/image.png";
					if($image5!="") $hinh5=$image5; 
					else $hinh5="imgs/image.png";
					if($image6!="") $hinh6=$image6; 
					else $hinh6="imgs/image.png";
				?>
                <ul class="ul_img_bdt1">
                	<li class="clearfix"> 
                    	<div class="up_img_t" >
                            <img class="upload" value="1" id="image_u1"  src="<?php echo $linkrootbds?><?=$hinh1?>"   /> 
                            <input type="file" name="my_file"  class="my_file" valuee="1" id="my_file1" style=" visibility:hidden;" />
                            <input type="hidden" id="my_file_va_1" name="my_file_va_1"  value="<?=$image1?>" />
                            <span class="close_t" id="close_my_file_va_1" value="1"  style=" <?php  if($image1!="") { ?>display:block;  <?php }?>" > </span>
                        </div>
                    </li>
                    <li class="clearfix"> 
                    	<div class="up_img_t" >
                            <img class="upload" value="2" id="image_u2"  src="<?php echo $linkrootbds?><?=$hinh2?>"   /> 
                            <input type="file"  name="my_file"   class="my_file" valuee="2" id="my_file2" style=" visibility:hidden;" />
                            <input type="hidden" id="my_file_va_2" name="my_file_va_2"  value="<?=$image2?>" />
                            <span class="close_t" id="close_my_file_va_2" value="2" style=" <?php  if($image2!="") { ?>display:block; <?php }?>" > </span>
                        </div>
                    </li>
                    <li class="clearfix"> 
                    	<div class="up_img_t" >
                            <img class="upload" value="3" id="image_u3"  src="<?php echo $linkrootbds?><?=$hinh3?>"  /> 
                            <input type="file"  name="my_file"   class="my_file" valuee="3" id="my_file3" style=" visibility:hidden;" />
                            <input type="hidden" id="my_file_va_3"  name="my_file_va_3" value="<?=$image3?>" />
                            <span class="close_t" id="close_my_file_va_3" value="3" style=" <?php  if($image3!="") { ?>display:block; <?php }?>"> </span>
                        </div>
                    </li>
                    <li class="clearfix"> 
                    	<div class="up_img_t" >
                            <img class="upload" value="4" id="image_u4"  src="<?php echo $linkrootbds?><?=$hinh4?>"  /> 
                            <input type="file"  name="my_file"   class="my_file" valuee="4" id="my_file4" style=" visibility:hidden;" />
                            <input type="hidden" id="my_file_va_4" name="my_file_va_4"  value="<?=$image4?>" />
                            <span class="close_t" id="close_my_file_va_4" value="4" style=" <?php  if($image4!="") { ?>display:block; <?php }?>"> </span>
                        </div>
                    </li>
                     <li class="clearfix"> 
                    	<div class="up_img_t" >
                            <img class="upload" value="5" id="image_u5"  src="<?php echo $linkrootbds?><?=$hinh5?>"  /> 
                            <input type="file"  name="my_file"   class="my_file" valuee="5" id="my_file5" style=" visibility:hidden;" />
                            <input type="hidden" id="my_file_va_5" name="my_file_va_5"   value="<?=$image5?>" />
                            <span class="close_t" id="close_my_file_va_5" value="5" style=" <?php  if($image5!="") { ?>display:block; <?php }?>"> </span>
                        </div>
                    </li>
                      <li class="clearfix"> 
                    	<div class="up_img_t" >
                            <img class="upload" value="6" id="image_u6"  src="<?php echo $linkrootbds?><?=$hinh6?>"  /> 
                            <input type="file"  name="my_file"   class="my_file" valuee="6" id="my_file6" style=" visibility:hidden;" />
                            <input type="hidden" id="my_file_va_6" name="my_file_va_6"  value="<?=$image6?>" />
                            <span class="close_t" id="close_my_file_va_6" value="6" style=" <?php  if($image6!="") { ?>display:block; <?php }?>" > </span>
                        </div>
                    </li>
                 
                     <div class="clear"></div>
                </ul>
            <div class="clear"></div>
        
        </div><!-- End .b_dt_4 -->
        <?php }?>
        
        <div class="btn_bdt"> 
            <input type="submit" name="them" class="nut-table" value="Đăng tin" title="Chấp nhận hoàn thành " />
            <input type="submit" name="quayra" class="nut-table" value="Quay ra" title="Quay ra ngoài " />
        </div><!-- End .btn_bdt -->
        </form>
    
    </div><!-- End .f_dt -->
<?php }else {?>
<div class="f_dt">
    <center>  Bạn vừa đăng tin thành công </center>
</div>
<?php } ?>
 
    