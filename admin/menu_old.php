<?php
$row_tbl_users=getRecord('tbl_users',"id = '".$_SESSION['kt_login_id']."'");
?>
<script type="text/javascript" charset="utf-8" src="../lib/dropdown/js/dropdown.js"></script>
<link rel="stylesheet" type="text/css" href="../lib/dropdown/style.css" />
<div id="wrapper">
        <ul id="nav">
            <li><a href="../index.php">Trang chủ</a></li>
            
            <?php if($_SESSION['kt_login_id']!=""){?>
            <li><a href="admin.php">Admin</a></li> 
			
            <li><a href="#">Bất động sản &darr;</a>
                <ul> 
                	<? if(userPermissEdit($row_tbl_users['listEdit'],1,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],2,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                    <li>
                    	<a href="#"> Bất động sản &darr;</a> 
                        <ul> 
                        	<? if(userPermissEdit($row_tbl_users['listEdit'],1,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                            <li><a href="admin.php?act=bds_category">Danh mục BDS</a></li>
                            <?php }?>
                            <? if(userPermissEdit($row_tbl_users['listEdit'],2,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                            <li><a href="admin.php?act=bds">Rao vặt BDS</a></li>
                            <? } ?>
                        </ul>
                    </li>
                    <? } ?>
                    
                    <? if(userPermissEdit($row_tbl_users['listEdit'],5,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],6,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                    <li>
                    	<a href="#"> Dự án &darr;</a> 
                        <ul> 
                        	<? if(userPermissEdit($row_tbl_users['listEdit'],5,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                            <li><a href="admin.php?act=bds_da_category"> Danh mục dự án </a></li>
                            <? } ?>
                            <? if(userPermissEdit($row_tbl_users['listEdit'],6,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                            <li><a href="admin.php?act=bds_da">Dự án</a></li>
                            <? }?>
                        </ul>
                    </li>
                    <? } ?>
                     <? if(userPermissEdit($row_tbl_users['listEdit'],7,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],8,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                    <li>
                    	<a href="#"> Doanh nghiệp&darr;</a> 
                        <ul> 
                        	<? if(userPermissEdit($row_tbl_users['listEdit'],7,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                            <li><a href="admin.php?act=bds_dn_category"> Danh mục doanh nghiệp </a></li>
                            <? } ?>
                            <? if(userPermissEdit($row_tbl_users['listEdit'],8,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                            <li><a href="admin.php?act=bds_dn">Doanh nghiệp</a></li>
                            <? } ?>
                        </ul>
                    </li>
                    <? } ?>
                </ul>
                
                <? if(userPermissEdit($row_tbl_users['listEdit'],13,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],14,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],15,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],16,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                <li><a href="#"> Tỉnh thành &darr;</a>
                    <ul> 
                    	<? if(userPermissEdit($row_tbl_users['listEdit'],13,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                        <li><a href="admin.php?act=quanhuyen_category">Tỉnh/Tp</a> </li>
                        <? } ?>
                        <? if(userPermissEdit($row_tbl_users['listEdit'],14,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                        <li><a href="admin.php?act=quanhuyen">Quận / Huyện</a></li>
                         <? } ?>
                        <? if(userPermissEdit($row_tbl_users['listEdit'],15,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                        <li><a href="admin.php?act=phuongxa">Phường / Xã</a></li>
                         <? } ?> 
                        <? if(userPermissEdit($row_tbl_users['listEdit'],16,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                       <li><a href="admin.php?act=street"> Đường</a></li> 
                        <? } ?>
                    </ul>
            	</li>
                <? } ?>
                
                <? if(userPermissEdit($row_tbl_users['listEdit'],3,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],4,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],10,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],11,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],12,1)==true ||  userPermissEdit($row_tbl_users['listEdit'],9,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                <li>
                	<a href="#">Thông tin&darr;</a> 
                	<ul>
                    	 <? if(userPermissEdit($row_tbl_users['listEdit'],3,1)==true  || userPermissEdit($row_tbl_users['listEdit'],4,1)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                    	<li>
                    		<a href="#"> Tin tức &darr;</a> 
                            <ul> 
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
                
                <? if(userPermissEdit($row_tbl_users['listEdit'],18,2)==true || userPermissEdit($row_tbl_users['listEdit'],19,2)==true ||  userPermissEdit($row_tbl_users['listEdit'],20,2)==true || $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                <li><a href="#"> Người dùng &darr;</a>
                    <ul> 
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
                <? }?>
                
                <? if(userPermissEdit($row_tbl_users['listEdit'],17,2)==true ||  $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                <li> 
                	<a href="admin.php?act=config&id=3"> Cấu hình</a> 
                </li>
                <?php }?>
                
                  <? if(userPermissEdit($row_tbl_users['listEdit'],21,1)==true ||  $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                <li> 
                	<a href="#"> Thống kê&darr;</a>
                	<ul> 
                    	<li> <a href="#"> Tin BDS&darr;</a>
                        	<ul>
                                <li><a href="admin.php?act=bds_data">Tin đăng</a> </li>
                                <li><a href="admin.php?act=bds_month">Tin trong tháng</a> </li>
                                <li><a href="admin.php?act=bds_day">Tin trong ngày</a> </li>
                                <li><a href="admin.php?act=bds_month_ano">Tìm theo tháng</a> </li>
                                <li><a href="admin.php?act=bds_day_ano">Tìm theo ngày</a> </li>
                            </ul>
                        </li> 
                        
                        <li> <a href="#"> Dự án BDS&darr;</a>
                        	<ul>
                                <li><a href="admin.php?act=bdsda_data">Tin đăng</a> </li>
                                <li><a href="admin.php?act=bdsda_month">Tin trong tháng</a> </li>
                                <li><a href="admin.php?act=bdsda_day">Tin trong ngày</a> </li>
                                <li><a href="admin.php?act=bdsda_month_ano">Tìm theo tháng</a> </li>
                                <li><a href="admin.php?act=bdsda_day_ano">Tìm theo ngày</a> </li>
                            </ul>
                        </li> 
                        
                        <li> <a href="#"> Doanh nghiệp BDS&darr;</a>
                        	<ul>
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
                
                 
            </li>
            
            <?php }?>
  
      </ul>
      
</div>