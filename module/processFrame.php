<?php 
switch ($frame){
	case "edit_bds"                : include("module/edit_bds.php");break;
	case "edit_da"                 : include("module/edit_da.php");break;
	case "edit_dn"                 : include("module/edit_dn.php");break;
	case "xoa_bds"                 : include("module/xoa_bds.php");break;
	case "dangtin"                 : include("module/dangtin.php");break;
	case "raovat_detail"           : include("module/raovat_detail.php");break;
	case "dangky"                  : include("module/dangky.php");break;
	case "dangnhap"                : include("module/dangnhap.php");break;
	case "changeinfo"              : include("module/changeinfo.php");break;
	case "changepass"              : include("module/changepass.php");break;
	case "raovat"                  : include("module/raovat.php");break;
	case "product_detail"          : include("module/product_detail.php");;break;
	
	case "sieuthidiaoc"            : include("module/sieuthidiaoc.php");break;
	case "tinnhadat"               : include("module/tinnhadat.php");break;
	case "duan"                    : include("module/duan.php");break;
	case "doanhnghiep"             : include("module/doanhnghiep.php");break;
	case "nhadatchuaxacthuc"       : include("module/nhadatchuaxacthuc.php");break;
	case "video"                   : include("module/video.php");break;
	case "video_detail"            : include("module/video_detail.php");break;
	case "manage"                  : include("module/manage.php");break;
	case "manageda"                : include("module/manageda.php");break;
	case "managedn"                : include("module/managedn.php");break;
	
	case "bds_of_city"             : include("module/bds_of_city.php");break;
	case "phuong"                  : include("module/phuong.php");break;
	case "huyen"                   : include("module/huyen.php");break;
	case "nhucau"                  : include("module/nhucau.php");break;
	case "bds"                     : include("module/bds.php");break;
	case "linhtinh"                : include("module/linhtinh.php");break;
	case "street"                   : include("module/street.php");break;
	
	case "search"                  : include("module/search.php");break;
	case "products"                : include("module/products.php");break;
	case "home"                    : include("module/raovat_home.php");break;
	case "order"                   : include("module/order.php");break;
	case "page404"                 : include("module/page404.php");break;
	case "viewcart"                : include("module/viewcart.php");break;
	case "addbds"                  : include("module/addbds.php");break;
	
	case "addda"                   : include("module/addda.php");break;
	case "adddn"                   : include("module/adddn.php");break;
	
	case "user"                    : include("module/user.php");break;
	case "tags"                    : include("module/tags.php");break;
	
	case "tag"                     : include("module/tag.php");break;
	
	case "contact"                 : include("module/contact.php");break;
	
	case "forgetpass"      		   : include("forgetpass.php");break;
	case "getpass"         		   : include("getpass.php");break;
	
	
	case "add_item"                : include("module/adcart.php");break;
	case "login"                   : include("module/login.php");break;
	
	case "logout"              	   : 
									{
										unset($_SESSION['kh_login_username']);
										unset($_SESSION['kh_login_id']);
										header("location: $linkrootraovat");
									};break;
	
	default                        : include("module/home.php");break;
	
}
?>