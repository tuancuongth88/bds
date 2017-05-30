<?php
$row_tbl_users=getRecord('tbl_users',"id = '".$_SESSION['kt_login_id']."'");
?>
<style>
.nav_menu {height: 40px; border-bottom: 2px solid #3d9b20; background: #40b01a;}
.nav_menu .min_wrap {position: relative;}
.ul_menu > li {font-weight: bold; color: #fff; float: left; font-size: 13px; position: relative;}
.ul_menu > li > a {
	display: block;
	color: #fff;
	line-height: 40px;
}
.ul_menu > li > a .line_menu_2 {padding: 0 20px;}
.ul_menu > li:first-child > a .line_menu_2 {padding: 0 10px;}
.ul_menu > li:first-child > a .line_menu_2 img {vertical-align: top;}
.ul_menu > li.active > a, .ul_menu > li:hover > a {background-color: #3d9b20;}
.ul_menu > li.active > a .line_menu_1 {background: url(../imgs/layout/line_menu.png) no-repeat left; display: block;}
.ul_menu > li.active > a .line_menu_2 {background: url(../imgs/layout/line_menu.png) no-repeat right; display: block;}
.ul_menu > li:hover > ul.menu_child {display: block;}
.ul_menu > li > ul.menu_child {
	display: none;
	position: absolute;
	top: 40px; left: 0;
	width: 200px;
	background: #3D9B20;
	z-index: 100;
	border-bottom: 2px solid #2d8013;
}
.ul_menu > li > ul.menu_child > li {position: relative;}
.ul_menu > li > ul.menu_child > li > a {color: #fff; padding: 7px 20px; display: block;}
.ul_menu > li > ul.menu_child > li + li > a {border-top: 1px solid #6abf4d; }
.ul_menu > li > ul.menu_child > li:hover > a {background: #2b7a12;}
.ul_menu > li > ul.menu_child > li:hover > ul.mn_child2 {display: block;}
.ul_menu > li > ul.menu_child > li > ul.mn_child2 {
	display: none;
	position: absolute;
	top: 0; left: 200px;
	width: 200px;
	background: #3D9B20;
	z-index: 100;
	border-bottom: 2px solid #2d8013;
}
.ul_menu > li > ul.menu_child > li > ul.mn_child2 > li > a {color: #fff; padding: 7px 20px; display: block;}
.ul_menu > li > ul.menu_child > li > ul.mn_child2 > li + li > a {border-top: 1px solid #6abf4d; }
.ul_menu > li > ul.menu_child > li > ul.mn_child2 > li:hover > a {color: #FF0;}

</style>
<nav class="nav_menu">
        <div class="min_wrap">
            
            <ul class="ul_menu">
                <li>
                    <a href="../index.php">                                  
                         <span class="line_menu_1">
                            <span class="line_menu_2"> 
                                Trang chủ
                            </span>
                        </span>  
                    </a>  
                </li>
                <?php if($_SESSION['kt_login_id']!=""){?>
                <li <?php if($frame=="home" || $frame=="") echo 'class="active"';?> >
                    <a href="admin.php">                                  
                         <span class="line_menu_1">
                            <span class="line_menu_2"> 
                                Admin
                            </span>
                        </span>  
                    </a>  
                </li>
                
                <li <?php if($frame=="bds" || $frame=="bds_da" || $frame=="bds_dn"   || $frame=="bds_category" || $frame=="bds_da_category"  || $frame=="bds_dn_category") echo 'class="active"';?>>
                    <a href="#">
                        <span class="line_menu_1">
                            <span class="line_menu_2"> 
                                Bất động sản
                            </span>
                        </span>                          
                    </a>
                    <ul class="menu_child">
                       <? if(userPermissEdit($row_tbl_users['listEdit'],1,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],2,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                        <li>
                            <a href="#">
                                Bất động sản
                            </a>
                            <ul class="mn_child2">
                            
								<? if(userPermissEdit($row_tbl_users['listEdit'],1,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                <li><a href="admin.php?act=bds_category">Danh mục nhà đất</a></li>
                                <?php }?>
                                <? if(userPermissEdit($row_tbl_users['listEdit'],2,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                <li><a href="admin.php?act=bds">Rao vặt nhà đất</a></li>
                                <li><a href="admin.php?act=bdsspam">Tin Spam</a></li>
                                <? } ?>
                                 
                            </ul>
                        </li>
                       <?php }?>
                       
                        <? if(userPermissEdit($row_tbl_users['listEdit'],5,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],6,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                        <li>
                            <a href="#">
                                Dự án
                            </a>
                            <ul class="mn_child2">
                            
								<? if(userPermissEdit($row_tbl_users['listEdit'],5,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                <li><a href="admin.php?act=bds_da_category"> Danh mục dự án </a></li>
                                <? } ?>
                                <? if(userPermissEdit($row_tbl_users['listEdit'],6,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                <li><a href="admin.php?act=bds_da">Dự án</a></li>
                                <? }?>
                                 
                            </ul>
                        </li>
                        <?php }?>
                        
                        <? if(userPermissEdit($row_tbl_users['listEdit'],7,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],8,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?> 
                        <li>
                            <a href="#">
                                Doanh nghiệp
                            </a>
                             <ul class="mn_child2">
                            
								<? if(userPermissEdit($row_tbl_users['listEdit'],7,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                <li><a href="admin.php?act=bds_dn_category"> Danh mục doanh nghiệp </a></li>
                                <? } ?>
                                <? if(userPermissEdit($row_tbl_users['listEdit'],8,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                <li><a href="admin.php?act=bds_dn">Doanh nghiệp</a></li>
                                <? } ?>
                                 
                            </ul>
                        </li>
                        <?php }?>
                        
                    </ul>
                </li>
                
                 
                <? if(userPermissEdit($row_tbl_users['listEdit'],13,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],14,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],15,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],16,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                <li <?php if($frame=="quanhuyen_category" || $frame=="quanhuyen" || $frame=="phuongxa" || $frame=="street") echo 'class="active"';?>>
                    <a href="#">
                        <span class="line_menu_1">
                            <span class="line_menu_2"> 
                               Địa danh
                            </span>
                        </span>
                    </a>
                     <ul class="menu_child">
                     
                            <? if(userPermissEdit($row_tbl_users['listEdit'],13,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                            <li><a href="admin.php?act=quanhuyen_category">Tỉnh/Tp</a></li>
                            <?php }?>   
                            
                            <? if(userPermissEdit($row_tbl_users['listEdit'],14,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                            <li><a href="admin.php?act=quanhuyen">Quận / Huyện</a></li>
                            <?php }?>  
                            <? if(userPermissEdit($row_tbl_users['listEdit'],15,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                            <li><a href="admin.php?act=phuongxa">Phường / Xã</a></li>
                            <? } ?> 
                            <? if(userPermissEdit($row_tbl_users['listEdit'],16,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                            <li><a href="admin.php?act=street"> Đường</a></li> 
                            <? } ?>
                         
                     </ul>
                    
                </li>
                <?php }?>
                
                
                 <? if(userPermissEdit($row_tbl_users['listEdit'],3,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],4,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],10,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],11,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],12,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],9,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                <li  <?php if($frame=="bds_news_category" || $frame=="bds_news" || $frame=="comment" || $frame=="video" || $frame=="adv_bds" || $frame=="bds_info") echo 'class="active"';?>>
                	<a href="#">
                    	<span class="line_menu_1">
                            <span class="line_menu_2"> 
                                Thông tin
                            </span>
                        </span>
                    </a> 
                    <ul class="menu_child" >
                    	 <? if(userPermissEdit($row_tbl_users['listEdit'],3,1)==true  || userPermissEdit($row_tbl_users['listEdit'],4,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                    	<li>
                    		<a href="#"> Tin tức</a> 
                             <ul class="mn_child2">
                            
								<? if(userPermissEdit($row_tbl_users['listEdit'],3,1)==true  ||   $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                <li><a href="admin.php?act=bds_news_category"> Danh mục Tin tức  </a></li>
                                <?php }?>
                                 <? if(userPermissEdit($row_tbl_users['listEdit'],4,1)==true  ||   $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                <li><a href="admin.php?act=bds_news">Tin tức</a></li>
                                <?php }?>
                                 
                            </ul>
                        </li>
                        <?php }?>
                        <? if(userPermissEdit($row_tbl_users['listEdit'],10,1)==true  ||   $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                         <li>
                            <a href="admin.php?act=comment">Bình luận</a>  
                        </li>
                         <?php }?>
                         <? if(userPermissEdit($row_tbl_users['listEdit'],11,1)==true  ||   $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                        <li>
                            <a href="admin.php?act=video">Video</a>  
                        </li>
                        <?php }?>
                        <? if(userPermissEdit($row_tbl_users['listEdit'],12,1)==true  ||   $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                         <li>
                            <a href="admin.php?act=adv_bds">Quảng cáo</a>  
                        </li>
                        <?php }?>
                        <? if(userPermissEdit($row_tbl_users['listEdit'],9,1)==true  ||   $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                         <li>
                            <a href="admin.php?act=bds_info">Thông tin</a>  
                        </li>
                        <?php }?>
                    </ul>
                </li>
                <?php }?>
                
                
               <? if(userPermissEdit($row_tbl_users['listEdit'],18,1)==true || userPermissEdit($row_tbl_users['listEdit'],19,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],20,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                <li  <?php if($frame=="user" || $frame=="customer" || $frame=="custom_data" ) echo 'class="active"';?>>
                    <a href="#">
                        <span class="line_menu_1">
                            <span class="line_menu_2"> 
                                Người dùng
                            </span>
                        </span>
                    </a> 
                    
                    <ul class="menu_child" > 
                    	 <? if(userPermissEdit($row_tbl_users['listEdit'],18,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                        <li><a href="admin.php?act=user">Thành viên</a> </li>
                        <? }?>
                        <? if(userPermissEdit($row_tbl_users['listEdit'],19,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                        <li><a href="admin.php?act=customer">Khách hàng</a></li>
                        <? } ?>
                        <? if(userPermissEdit($row_tbl_users['listEdit'],20,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                        <li><a href="admin.php?act=custom_data">Nhập liệu</a></li>
                        <? } ?>
                    </ul>
                    
                </li>
               <?php }?> 
               
               <? if(userPermissEdit($row_tbl_users['listEdit'],17,2)==true ||  $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
               <li <?php if($frame=="config") echo 'class="active"';?>> 
                	<a href="admin.php?act=config&id=3"> 
                        <span class="line_menu_1">
                            <span class="line_menu_2"> 
                                Cấu hình
                            </span>
                        </span>
                    </a> 
                </li>
                <?php }?>
               
                <? if(userPermissEdit($row_tbl_users['listEdit'],21,1)==true ||  $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
               <li <?php if($frame=="bds_data" || $frame=="bds_month" || $frame=="bds_day" || $frame=="bds_month_ano" || $frame=="bds_day_ano" || $frame=="bdsda_data" || $frame=="bdsda_month" || $frame=="bdsda_day" || $frame=="bdsda_month_ano" || $frame=="bdsda_day_ano" || $frame=="bdsdn_data" || $frame=="bdsdn_month" || $frame=="bdsdn_day"  || $frame=="bdsdn_month_ano" || $frame=="bdsdn_day_ano") echo 'class="active"';?>> 
                	<a href="#"> 
                        <span class="line_menu_1">
                            <span class="line_menu_2"> 
                                Thống kê
                            </span>
                        </span>
                    </a> 
                    <ul class="menu_child" > 
                    	<li> <a href="#"> Tin nhà đất</a>
                        	<ul class="mn_child2">
                            
								<li><a href="admin.php?act=bds_data">Tin đăng</a> </li>
                                <li><a href="admin.php?act=bds_month">Tin trong tháng</a> </li>
                                <li><a href="admin.php?act=bds_day">Tin trong ngày</a> </li>
                                <li><a href="admin.php?act=bds_month_ano">Tìm theo tháng</a> </li>
                                <li><a href="admin.php?act=bds_day_ano">Tìm theo ngày</a> </li>
                                 
                            </ul>
                        </li>
                        <li> <a href="#"> Dự án nhà đất</a>
                        	<ul class="mn_child2">
                            
								<li><a href="admin.php?act=bdsda_data">Tin đăng</a> </li>
                                <li><a href="admin.php?act=bdsda_month">Tin trong tháng</a> </li>
                                <li><a href="admin.php?act=bdsda_day">Tin trong ngày</a> </li>
                                <li><a href="admin.php?act=bdsda_month_ano">Tìm theo tháng</a> </li>
                                <li><a href="admin.php?act=bdsda_day_ano">Tìm theo ngày</a> </li>
                                 
                            </ul>
                        </li>
                        <li> <a href="#"> Doanh nghiệp nhà đất</a>
                        	<ul class="mn_child2">
                            
								<li><a href="admin.php?act=bdsdn_data">Tin đăng</a> </li>
                                <li><a href="admin.php?act=bdsdn_month">Tin trong tháng</a> </li>
                                <li><a href="admin.php?act=bdsdn_day">Tin trong ngày</a> </li>
                                <li><a href="admin.php?act=bdsdn_month_ano">Tìm theo tháng</a> </li>
                                <li><a href="admin.php?act=bdsdn_day_ano">Tìm theo ngày</a> </li>
                                 
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php }?>
                
                <? if($_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                <li  <?php if($frame=="program" ) echo 'class="active"';?>>
                    <a href="#">
                        <span class="line_menu_1">
                            <span class="line_menu_2"> 
                                Phần mềm
                            </span>
                        </span>
                    </a> 
                    
                    <ul class="menu_child" > 
                     
                        <li><a href="admin.php?act=program">Tài khoản</a> </li>
                      	<li><a href="admin.php?act=programcus">Khách hàng</a> </li>
                        
                    </ul>
                    
                </li>
                <?php } ?>
                
                <?php }?>
                
            </ul><!-- End .ul_menu -->
            
            <div class="clear"></div>
     
             
        </div><!-- End .min_wrap -->
    </nav>