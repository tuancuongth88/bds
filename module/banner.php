<div class="banner">
    <div class="min_wrap">
    
        <a class="logo" href="<?php echo $linkrootbds?>" title="bat dong san">
            <img src="<?php echo $linkrootbds?>imgs/layout/logo.png" alt="bat dong san" width="192" height="80">
        </a>
        
        <div class="user_header">
            <ul>
            	<?php if($_SESSION['kh_login_username']!=""){?>
                <li>
                    <a class="show_user_login" href="javascript:void(0)">Chào: <?php echo $_SESSION['kh_login_username'];?></a>
                    <div class="m_user_login" style="display: none;">
                        <a href="<?php echo $linkrootbds?>quan-ly-tin-dang.html">Quản lý tin</a>
                        <a href="<?php echo $linkrootbds?>sua-thong-tin.html">Thông tin cá nhân</a>
                        <a href="<?php echo $linkrootbds?>doi-mat-khau.html">Đổi mật khẩu</a>
                        <a href="<?php echo $linkrootbds?>thoat.html">Thoát</a>
                    </div><!-- End .m_user_login -->
                </li>
                <?php }else {?>
                <li>
                    <a href="<?php echo $linkrootbds?>dang-nhap.html">Đăng nhập</a>
                </li>
                <li>
                    <a href="<?php echo $linkrootbds?>dang-ky.html">Đăng ký</a>
                </li>
                <?php }?>
            </ul>
            <div class="clear"></div>
        </div>
        
        <div class="search_top_header">
                        <form action="<?php echo $linkrootbds ;?>xu-ly.html" method="POST">
                        	 <input name="loaitim" type="hidden" value="0" />
                            <div class="select_item_search">
                                <span class="sp1_select">
                                    <select class="select22" name="cate">
										<?php   
                                        $cate=get_records("tbl_rv_category"," parent=2 and cate=0","sort ASC"," "," ");
                                        while($row=mysql_fetch_assoc($cate)){?>
                                        <option value="<?php echo $row['subject']; ?>"><?php echo $row['name']; ?></option> 
                                        <?php } ?>

                                         <option value="tin-tuc"> Tin tức</option>
                                         <option value="du-an">  Dự án</option>
                                         <option value="doanh-nghiep">  Doanh nghiệp</option>
                                    </select>
                                </span>
                            </div><!-- End .select_item_search -->
                            <div class="select_input_search">
                                <input  name="tagcontent" class="ipt_s" type="text" placeholder="Nhập từ khóa tìm kiếm..."/>
                            </div><!-- End .select_input_search -->
                            <input class="btn_s" type="submit" value="&nbsp;" name="timbds"/>
                            <div class="clear"></div>
                            
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('select.select22').each(function(){
                                        var title = $(this).attr('title');
                                        if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
                                        $(this)
                                            .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
                                            .after('<span class="sp2_select">' + title + '</span>')
                                            .change(function(){
                                                var val = $('option:selected',this).text();
                                                $(this).next().text(val);
                                            });
                                    });
                                });
                            </script>
                            
                            </form>
                    </div><!-- End .search_top_header -->
        
         
    
    </div><!-- End .min_wrap -->
</div><!-- End .banner -->