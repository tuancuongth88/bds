<link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>templates/jquery-ui.css">
<?php

$iduser= $_SESSION['kh_login_id'];
 
if($iduser=="")   {//header("location:".$linkrootbds);
$_SESSION['back_add']=$_SERVER['REQUEST_URI'];
?>


<div id="dialog" style="display:none;">	  
</div>
<script type="text/javascript">
$(document).ready(function (){
	$('#dialog').html(' <br><br>Bạn phải đăng ký mới sử dụng được chức năng này! <br>  ');
	
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
$path = "images/bds_da";
$pathdb = "images/bds_da";

$bandau=0;

if (isset($_POST['them'])==true && $iduser!="" && $iduser > 0)//isset kiem tra submit
	{  
	$code          = isset($_POST['txtCode']) ? trim($_POST['txtCode']) : '';
	$name          = $_POST['txtName'];

	$parent        = $_POST['loai']; 
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
	$diachida       = isset($_POST['diachida']) ? trim($_POST['diachida']) : '';
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
	
	$image1         = isset($_POST['my_file_va_1']) ? trim($_POST['my_file_va_1']) : '';
	$image2         = isset($_POST['my_file_va_2']) ? trim($_POST['my_file_va_2']) : '';
	$image3         = isset($_POST['my_file_va_3']) ? trim($_POST['my_file_va_3']) : '';
	$image4         = isset($_POST['my_file_va_4']) ? trim($_POST['my_file_va_4']) : '';
	$image5         = isset($_POST['my_file_va_5']) ? trim($_POST['my_file_va_5']) : '';
	$image6         = isset($_POST['my_file_va_6']) ? trim($_POST['my_file_va_6']) : ''; 
	
	
	if($lat ==""){
		 
		 $diachida.=", Việt Nam ";
		$diachi1=substr($diachi1,1);
		
		//echo $diachi;
		//$diachi=str_replace(array("Đường", "Quận", "Huyện", "Thị xã", "Thành phố"), "", $diachi);
		$address = $diachida; // Google HQ
		$address = urlencode(str_replace(",", ",+",$address)); ;
		//echo 'http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false';
		$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
		//echo 'http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false';
		$output= json_decode($geocode);
		
		$lat = $output->results[0]->geometry->location->lat;
		$long = $output->results[0]->geometry->location->lng;
	}
	
	
	$name          = mysql_real_escape_string($name);  
	
	$nl=get_field('tbl_users','id',$iduser,'idgroup');
	
	if($nl==2) $type=1;
	else $type=0;

	if ($name=="") {$errMsg_tieude .= "Hãy nhập tiêu đề rao vặt !<br>";$errMsg="error";}
	if ($detail==""){ $errMsg_noidung .= "Hãy nhập nội dung rao vặt !<br>";$errMsg="error";} 
	
	$aa=0;
	
	if(get_field("tbl_rv_item","name",$name,"id")!="") {$errMsg_tieude = "Tiêu đề bị trùng, hãy nhập tiêu đề rao vặt khác !<br>";$errMsg="error";;}
	
	if ($errMsg==''){ 
	
			 $sql = "insert into tbl_rv_item (code, iduser ,cate , idcity , idquan , idphuong, idstreet, sonha , latitude, longitude , type , name, khachhang , diachi , email , dienthoai  , catebds , parent, detail_short, detail , sort, price , donvi , dientich , huong , tinhtrangphaply , dtkhuonvien , tongdtsudung , solau , sophong , namxaydung , dacdiemkhac , raoban_thue , title, description , keyword , image , image1 , image2 , image3 , image4 , image5 , status , date_added, last_modified, lang) values ('".$code."','".$iduser."',2,'".$tinh."','".$huyen."','".$phuong."','".$duong."','".$sonha."','".$lat."','".$long."','".$type."','".$name."','".$khachhang."','".$diachi."','".$email."','".$dienthoai."','".$loai."','".$parent."','".$detail_short."','".$detail."','".$sort."','".$price."','".$donvi."','".$dientich."','".$huong."','".$phaply."','".$dtkhuonvien."','".$tongdtsudung."','".$solau."','".$sophong."','".$namxaydung."','".$ddk."','".$raoban_thue."','".$title."','".$description."','".$keyword."','".$image1."','".$image2."','".$image3."','".$image4."','".$image5."','".$image6."','0',now(),now(),'".$lang."')";
			 
			 
			if (mysql_query($sql,$conn)){
				if(empty($_POST['id'])) $oldid = mysql_insert_id();
				$r = getRecord("tbl_rv_item","id=".$oldid);
				$bandau=1;	
				if($aa==1){
					$arrField = array(
					"subject"          => "'".cat_kytu_dacbiet($name,1,1,0,1,1)."-".$oldid."'"
					);// ko them id vao cuoi cho dep	
				}else{
					$arrField = array(
					"subject"          => "'".cat_kytu_dacbiet($name,1,1,0,1,1)."'"
					);// ko them id vao cuoi cho dep
				}
				$result = update("tbl_rv_item",$arrField,"id=".$oldid);
  
			
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
 
		
		$( '#formdk' ).each(function(){
			this.reset();
		});
			 
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
            close: function(event, ui) { window.location.href = "<?=$linkrootbds;?>quan-ly-tin-dang-du-an.html"; }
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
            Đăng dự án
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
    	<form action="<?php echo $linkrootbds?>dang-du-an.html" method="post" enctype="multipart/form-data" name=formdk id=formdk>
        <input type="hidden" name="act" value="addda" />
        <span class="note_dt">
            Lưu ý: những ô có dấu sao * là bắt buộc phải nhập.  <?php  if($errMsg!="") echo "Lỗi: ".$errMsg;?>
        </span><!-- End .note_dt -->
        
        <div class="b_dt_1">
            <ul>
            	<li class="clearfix">
                    <span class="l1_bdt">
                        Người liên hệ
                    </span>
                    <span class="l2_bdt"> 
                        <input name="khachhang" type="text" class="ipt_bdt box-sizing-fix" id="khachhang" title="Nhập tiêu đề" size="70" value="<?php echo $khachhang ?>" placeholder="Bạn cần phải nhập tên người liên hệ" />
                    </span>
                </li>
            	<li class="clearfix">
                    <span class="l1_bdt">
                        Loại dự án <span class="color_btd">*</span>
                    </span>
                    <span class="l2_bdt">
                        <div class="sty_bdt">
                          <select name="loai" id="loai"  > 
                          		 <option value=""> Chọn Loại dự án</option> 
								<?php   
                                $cate=get_records("tbl_rv_category"," parent=2 and cate=2","sort ASC"," "," ");
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
                         <input name="diachi" type="text" class="ipt_bdt box-sizing-fix" id="diachi" title="Nhập địa chỉ" value="<?php echo $diachi ?>" placeholder="Bạn cần phải nhập địa chỉ" />
                    </span>
                </li>
                <li class="clearfix">
                    <span class="l1_bdt">
                        Tên dự án <span class="color_btd">*</span>
                    </span>
                    <span class="l2_bdt">
                   	 <input name="txtName" type="text" class="ipt_bdt box-sizing-fix" id="txtName" title="Nhập tiêu đề" size="70" value="<?php echo $name ?>" placeholder="Bạn cần phải nhập tiêu đề tin bất động sản" /> 
                    </span>
                    <span>
                     <?php echo $errMsg_tieude;?>
                    </span>
                </li>
                
                <li class="clearfix">
                    <span class="l1_bdt">
                        Điện thoại
                    </span>
                    <span class="l2_bdt"> 
                        <input class="ipt_bdt box-sizing-fix" name="dienthoai" type="text"   id="dienthoai" title="Nhập tiêu đề" size="70" value="<?php echo $dienthoai ?>" placeholder="Bạn cần phải nhập số điện thoại liên hệ" />
                    </span>
                </li>
                 
                
                <li class="clearfix">
                    <span class="l1_bdt">
                        Địa chỉ dự án <span class="color_btd">*</span>
                    </span>
                    <span class="l2_bdt">
                   	 <input name="diachida" type="text" class="ipt_bdt box-sizing-fix" id="diachida" title="Nhập tiêu đề" size="70" value="<?php echo $diachida ?>" placeholder=" abc , Đường x , Phường(Xã) x , quận(huyện) y , thành phố  hoặc [tên dự án]" /> 
                    </span>
                    <span>
                     <?php echo $errMsg_tieude;?>
                    </span>
                </li>
                 <li class="clearfix">
                    <span class="l1_bdt">
                        Email
                    </span>
                    <span class="l2_bdt"> 
                          <input name="email" type="text" class="ipt_bdt box-sizing-fix" id="email" title="Nhập email" size="70" value="<?php echo $email ?>" placeholder="Bạn cần phải nhập email" />
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
                    <span>
                     <?php echo $errMsg_noidung;?>
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
        
        <div class="btn_bdt"> 
            <input type="submit" name="them" class="nut-table" value="Đăng tin" title="Chấp nhận hoàn thành " />
            <input type="submit" name="quayra" class="nut-table" value="Quay ra" title="Quay ra ngoài " />
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
    