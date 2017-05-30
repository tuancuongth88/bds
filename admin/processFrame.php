<?php
switch ($frame){
	
	//  category shop
	case "shop_category"    : include("shop_category/shop_category.php");break;
	case "shop_category_m"  : include("shop_category/shop_category_m.php");break;
	
	//  shop
	case "shop"             : include("shop/shop.php");break;
	case "shop_m"           : include("shop/shop_m.php");break;
	
	//  template
	case "template"         : include("template/template.php");break;
	case "template_m"       : include("template/template_m.php");break;
	
	//  user
	case "user"             : include("user/user.php");break;
	case "user_m"           : include("user/user_m.php");break;
	case "user_permiss"     : include("user/user_permiss.php");break;
	case "user_permiss_city"     : include("user/user_permiss_city.php");break;
	
	//  customer
	case "customer"         : include("customer/customer.php");break;
	case "customer_m"       : include("customer/customer_m.php");break;
	
	case "custom_data"      : include("custom_data/custom_data.php");break;
	case "custom_data_m"    : include("custom_data/custom_data_m.php");break;
	
	//  slider
	case "slider"           : include("slider/slider.php");break;
	case "slider_m"         : include("slider/slider_m.php");break;
	
	case "info_category"    : include("info_category/info_category.php");break;
	case "info_category_m"  : include("info_category/info_category_m.php");break;
	
	case "info"             : include("info/info.php");break;
	case "info_m"           : include("info/info_m.php");break;
	
	case "item"             : include("item/item.php");break;
	case "service"          : include("item/service.php");break;
	case "item_m"           : include("item/item_m.php");break;
	case "itemsaleoff"      : include("item/itemsaleoff.php");break;
	
	//support
	case "hotro"             : include("hotro/hotro.php");break;
	case "hotro_m"           : include("hotro/hotro_m.php");break;
	
	case "config"           : include("config/config.php");break;
 
	case "raovatAdmin"         : include("raovat/raovatAdmin.php");break;
	case "raovatCustom"        : include("raovat/raovatCustom.php");break;
	case "raovatAnony"         : include("raovat/raovatAnony.php");break;
	
	case "bds_category"        : include("bds_category/bds_category.php");break;
	case "bds_category_m"      : include("bds_category/bds_category_m.php");break;
	
	case "bdsspam"             : include("bds/bdsspam.php");break;
	case "bds"                 : include("bds/bds.php");break;
	case "bds_m"               : include("bds/bds_m.php");break;
	
	case "bds_info"            : include("bds_info/bds_info.php");break;
	case "bds_info_m"          : include("bds_info/bds_info_m.php");break;
	
	case "bds_news_category"   : include("bds_news_category/bds_news_category.php");break;
	case "bds_news_category_m" : include("bds_news_category/bds_news_category_m.php");break;
	
	case "bds_news"            : include("bds_news/bds_news.php");break;
	case "bds_news_m"          : include("bds_news/bds_news_m.php");break;
	
	case "bds_da_category"     : include("bds_da_category/bds_da_category.php");break;
	case "bds_da_category_m"   : include("bds_da_category/bds_da_category_m.php");break;
	
	case "bds_da"              : include("bds_da/bds_da.php");break;
	case "bds_da_m"            : include("bds_da/bds_da_m.php");break;
	
	case "bds_dn_category"     : include("bds_dn_category/bds_dn_category.php");break;
	case "bds_dn_category_m"   : include("bds_dn_category/bds_dn_category_m.php");break;
	
	case "bds_dn"              : include("bds_dn/bds_dn.php");break;
	case "bds_dn_m"            : include("bds_dn/bds_dn_m.php");break;
	
	case "comment"              : include("comment/comment.php");break;
	case "comment_m"            : include("comment/comment_m.php");break;
	
	case "quanhuyen_category"   : include("quanhuyen_category/quanhuyen_category.php");break;
	case "quanhuyen_category_m" : include("quanhuyen_category/quanhuyen_category_m.php");break;
	
	case "quanhuyen"           : include("quanhuyen/quanhuyen.php");break;
	case "quanhuyen_m"         : include("quanhuyen/quanhuyen_m.php");break;
	
	case "phuongxa"            : include("phuongxa/phuongxa.php");break;
	case "phuongxa_m"          : include("phuongxa/phuongxa_m.php");break;
	
	case "street"              : include("street/street.php");break;
	case "street_m"            : include("street/street_m.php");break;
	
	case "video"               : include("video/video.php");break;
	case "video_m"             : include("video/video_m.php");break;
 
	case "adv_bds"             : include("adv_bds/adv_bds.php");break;
	case "adv_bds_m"           : include("adv_bds/adv_bds_m.php");break;
 
	case "bds_data"            : include("total/bds_data.php");break;
	case "bds_month"           : include("total/bds_month.php");break;
	case "bds_day"             : include("total/bds_day.php");break;
	
	case "bds_month_ano"       : include("total/bds_month_ano.php");break;
	case "bds_day_ano"         : include("total/bds_day_ano.php");break;
	
	
	case "bdsda_data"            : include("total/bdsda_data.php");break;
	case "bdsda_month"           : include("total/bdsda_month.php");break;
	case "bdsda_day"             : include("total/bdsda_day.php");break;
	
	case "bdsda_month_ano"       : include("total/bdsda_month_ano.php");break;
	case "bdsda_day_ano"         : include("total/bdsda_day_ano.php");break;
	
	case "bdsdn_data"            : include("total/bdsdn_data.php");break;
	case "bdsdn_month"           : include("total/bdsdn_month.php");break;
	case "bdsdn_day"             : include("total/bdsdn_day.php");break;
	
	case "bdsdn_month_ano"       : include("total/bdsdn_month_ano.php");break;
	case "bdsdn_day_ano"         : include("total/bdsdn_day_ano.php");break;
	
	case "program_detail"        : include("program/program_detail.php");break;
	case "program"               : include("program/program.php");break;
	case "program_m"             : include("program/program_m.php");break;
	case "programcus"            : include("program/programcus.php");break;
	case "programcus_m"          : include("program/programcus_m.php");break;
		
	case "login"               : include("login.php");break;
	case "login_doipass"       : include("login/login_doipass.php");break;
	case "logout" :
		unset($_SESSION['kt_login_id']);
		unset($_SESSION['kt_login_username']);
		unset($_SESSION['kt_login_level']);
		echo "<script>window.location='admin.php'</script>";
		break;
		
	//----------------------------------------------------------------------------------------------
	
	case "home"          : include("home.php");break;
	default              : include("home.php");break;
}
?>