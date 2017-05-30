<?php 
if(isset($frame)==true){
	if($_SESSION['kt_login_level']!=4 && $_SESSION['kt_login_level']!=-1){
		$row_tbl_users=getRecord('tbl_users',"id = '".$_SESSION['kt_login_id']."'");
		if( isset($_GET['id']) || !empty($_POST['id'])) {if(userPermissEdit($row_tbl_users['listEdit'],4,3)!=true) header("location: admin.php");}
		elseif(userPermissEdit($row_tbl_users['listEdit'],4,2)!=true) header("location: admin.php");
	}
}else{
	header("location:admin.php");
}

$iduser= $_SESSION['kt_login_id'];
//if($iduser=="")   header("location:".$linkrootbds);

$id=$_GET['id'];

$row_sanpham   = getRecord('tbl_rv_item', "id='".$id."'");

//if($row_sanpham['iduser']!=$iduser) header("location:".$linkrootbds);

$path = "images/bds";
$pathdb = "images/bds";
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
	
	$image1         = isset($_POST['my_file_va_1']) ? trim($_POST['my_file_va_1']) : '';
	$image2         = isset($_POST['my_file_va_2']) ? trim($_POST['my_file_va_2']) : '';
	$image3         = isset($_POST['my_file_va_3']) ? trim($_POST['my_file_va_3']) : '';
	$image4         = isset($_POST['my_file_va_4']) ? trim($_POST['my_file_va_4']) : '';
	$image5         = isset($_POST['my_file_va_5']) ? trim($_POST['my_file_va_5']) : '';
	$image6         = isset($_POST['my_file_va_6']) ? trim($_POST['my_file_va_6']) : ''; 
	
	
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
	 
			 if (!empty($_POST['id'])){
					 $oldid = $_POST['id'];
			 		 $sql = "update tbl_rv_item set   name='".$name."',khachhang='".$khachhang."',diachi='".$diachi."',email='".$email."',dienthoai='".$dienthoai."',catebds='".$loai."',parent='".$loai."',idcity='".$tinh."',idquan='".$huyen."',idphuong='".$phuong."',idstreet='".$duong."',sonha='".$sonha."',latitude='".$lat."',longitude='".$long."',detail_short='".$detail_short."',detail='".$detail."',type='".$loaihinh."' , price='".$price."',donvi='".$donvi."', dientich='".$dientich."', huong='".$huong."', tinhtrangphaply='".$phaply."', dtkhuonvien='".$dtkhuonvien."', tongdtsudung='".$tongdtsudung."', solau='".$solau."', sophong='".$sophong."', namxaydung='".$namxaydung."', dacdiemkhac='".$ddk."', raoban_thue='".$raoban_thue."',  sort='".$sort."', title ='".$title ."', description ='".$description ."', keyword='".$keyword."', last_modified=now() where id='".$oldid."'";
			 }else{
					   $sql = "insert into tbl_rv_item (code, iduser ,cate , idcity , idquan , idphuong, idstreet, sonha , latitude, longitude , type , name, khachhang , diachi , email , dienthoai  , catebds , parent, detail_short, detail , sort, price , donvi , dientich , huong , tinhtrangphaply , dtkhuonvien , tongdtsudung , solau , sophong , namxaydung , dacdiemkhac , raoban_thue , title, description , keyword , image , image1 , image2 , image3 , image4 , image5 , status , date_added, last_modified, lang) values ('".$code."','".$iduser."',1,'".$tinh."','".$huyen."','".$phuong."','".$duong."','".$sonha."','".$lat."','".$long."','".$loaihinh."','".$name."','".$khachhang."','".$diachi."','".$email."','".$dienthoai."','".$loai."','".$parent."','".$detail_short."','".$detail."','".$sort."','".$price."','".$donvi."','".$dientich."','".$huong."','".$phaply."','".$dtkhuonvien."','".$tongdtsudung."','".$solau."','".$sophong."','".$namxaydung."','".$ddk."','".$raoban_thue."','".$title."','".$description."','".$keyword."','".$image1."','".$image2."','".$image3."','".$image4."','".$image5."','".$image6."','0',now(),now(),'".$lang."')";
			}
	 
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
			
			if($image1!=$r['image']){
				$sqlUpdateField = " image='$image1' ";
				if(file_exists("../".$r['image'])) @unlink("../".$r['image']);
				$sqlUpdate = "update tbl_rv_item set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$conn);
			}
			if($image2!=$r['image1']){
				$sqlUpdateField = " image1='$image2' ";
				if(file_exists("../".$r['image1'])) @unlink("../".$r['image1']);
				$sqlUpdate = "update tbl_rv_item set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$conn);
			}
			
			if($image3!=$r['image2']){
				$sqlUpdateField = " image2='$image3' ";
				if(file_exists("../".$r['image2'])) @unlink("../".$r['image2']);
				$sqlUpdate = "update tbl_rv_item set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$conn);
			}
			
			if($image4!=$r['image3']){
				$sqlUpdateField = " image3='$image4' ";
				if(file_exists("../".$r['image3'])) @unlink("../".$r['image3']);
				$sqlUpdate = "update tbl_rv_item set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$conn);
			}
			
			if($image5!=$r['image4']){
				$sqlUpdateField = " image4='$image5' ";
				if(file_exists("../".$r['image4'])) @unlink("../".$r['image4']);
				$sqlUpdate = "update tbl_rv_item set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$conn);
			}
			
			if($image6!=$r['image5']){
				$sqlUpdateField = " image5='$image6' ";
				if(file_exists("../".$r['image5'])) @unlink("../".$r['image5']);
				$sqlUpdate = "update tbl_rv_item set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$conn);
			}	
			
			 
		}else{
			$errMsg = "Không thể cập nhật !";
		}
	}

	if ($errMsg == '')
		 /*echo '<script>window.location="'.$linkrootbds.'quan-ly-tin-dang.html"</script>' */;
}else{
	if (isset($_GET['id'])){
		$id=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from tbl_rv_item where id='".$id."'";
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
			$image1         = $row['image'];
			$image2         = $row['image1'];
			$image3         = $row['image2'];
			$image4         = $row['image3'];
			$image5         = $row['image4'];
			$image6         = $row['image5'];
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
 
<?php if($iduser=="") {?>    
    <div class="f_dt">
    
    </div>
<?php
 }elseif($iduser!=""  ){
	 if($bandau==0){
?>    
<div class="f_dt">
		<div class="table_chu_tieude">
        	SỬA TIN TỨC</div>
        <div class="clear"> </div>
    	<form action="admin.php?act=bds_dn_m" method="post" enctype="multipart/form-data" name=formdk id=formdk>
        <input type="hidden" name="act" value="bds_dn_m" />
         <input type="hidden" name="id" value="<?=$_REQUEST['id']?>">
        <span class="note_dt">
            Lưu ý: những ô có dấu sao * là bắt buộc phải nhập. <?php  if($errMsg!="") echo "Lỗi: ".$errMsg;?>
        </span><!-- End .note_dt -->
        
        <div class="b_dt_1">
            <ul>
              <li class="clearfix">
                  <span class="l1_bdt">
                      Loại tin tức <span class="color_btd">*</span>
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
                              <option value=""> Chọn tin tức </option> 
							  <?php   
                                $cate=get_records("tbl_rv_category"," parent=2 and cate=1","sort ASC"," "," ");
                                while($row=mysql_fetch_assoc($cate)){?>
                              <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option> 
                              <?php } ?>
                        </select>
                      </div>
                  </span>
                </li>
            	<li class="clearfix">
                    <span class="l1_bdt">
                        Tiêu đề<span class="color_btd">*</span>
                    </span>
                    <span class="l2_bdt">
                   	 <input name="txtName" type="text" class="ipt_bdt box-sizing-fix" id="txtName" title="Nhập tiêu đề" size="70" value="<?php echo $name ?>" placeholder="Bạn cần phải nhập tiêu đề tin bất động sản" /> 
                    </span>
                    <span>
                     <?php echo $errMsg_tieude;?>
                    </span>
                </li>
            </ul>
            <div class="clear"></div>
        </div><!-- End .b_dt_1 -->
        
         
        
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
                               url:'<?php echo $linkrootbds?>admin/file.php?id='+id+"&loai=_dn",
                               processData: false,
                               contentType: false,
                               data: fd,
                               cache: false,
                               success: function(data){  
                                $("#image_u"+id).attr({src:"<?php echo $linkrootbds?>"+data,title: "loading",alt: "loading Logo"});
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
                 
             
                 <div class="clear"></div>
            </ul>
        <div class="clear"></div>
    
    </div><!-- End .b_dt_4 -->
        
        <div class="btn_bdt"> 
            <input type="submit" name="them" class="nut-table" value=" Sửa tin" title="Chấp nhận hoàn thành " />
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
            <div style="text-align:center;">
                 <br />
               <script>
                s=2; 
                setTimeout("document.location='<?php echo $linkrootbds?>admin/admin.php?act=bds_da'",s*1000); 
                setInterval("document.getElementById('sogiay').innerHTML=s--;",1000);
                </script>  
                <a href="<?php echo $linkrootbds?>admin/admin.php?act=bds_da"> Link quay lại trang chủ ngay</a><br />
                Sẽ quay lại trang chủ sau.<br />
                <span id=sogiay></span>
                <br />
            </div>
        </div>
    </div>
<?php
	}
 }
?>
    
    