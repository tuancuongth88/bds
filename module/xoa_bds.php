 
<div class="breacrum">
    <ul>
        <li>
            <a href="<?php echo $linkrootbds?>" title="Trang chủ">Trang chủ</a>
        </li>
 
        <li>
           	Quản lý tin đăng
        </li>
       
    </ul>
</div>
 
<div class="f_cont clearfix">

    <article class="content">
         
        <div class="f-qldh">
             	<?php 
				$iduser= $_SESSION['kh_login_id'];
				if($iduser=="")   header("location:".$linkrootbds);
				
				$tensanpham=$_GET['tensanpham'];
				
				$row_sanpham   = getRecord('tbl_rv_item', "subject='".$tensanpham."'");
				
				if($row_sanpham['iduser']!=$iduser) header("location:".$linkrootbds);
				else {
				
					$id = $row_sanpham['id'];
					
					$r = getRecord("tbl_rv_item","id=".$id);
					
					$resultParent = 0;
					
					
					echo "as das das";
					@$result = mysql_query("delete from tbl_rv_item where id='".$id."'",$conn);
					
					if ($result){
					
					if(file_exists(''.$r['image'])) @unlink(''.$r['image']);
					if(file_exists(''.$r['image1'])) @unlink(''.$r['image1']);
					if(file_exists(''.$r['image2'])) @unlink(''.$r['image2']);
					if(file_exists(''.$r['image3'])) @unlink(''.$r['image3']);
					if(file_exists(''.$r['image4'])) @unlink(''.$r['image4']);
					if(file_exists(''.$r['image5'])) @unlink(''.$r['image5']);
					$errMsg = "Đã xóa thành công.";
					
					
					}else $errMsg = "Không thể xóa dữ liệu !";
				}
				
				echo "bạn vừa xoá dữ liệu thành công";
				
				 echo '<script>window.location="'.$linkrootbds.'quan-ly-tin-dang.html"</script>' ; 
				
				?>


 
        </div><!-- End .f-qldh -->
                        
        <div class="page">
            <div class="PageNum">
				 
            </div>
            <div class="clear"></div>
        </div><!-- End .page --> 
         
    </article><!-- End .content -->
   
    <div class="sidebar">
        
        <div class="block_sb">
            <h4 class="t_sb">
                <span>
                    Danh mục quản lý
                </span>
            </h4><!-- End .t_sb -->
            <div class="m_sb">
            
                <div class="m_dmql">
                
                    <ul>
                        <li class="active">
                            <a href="<?php echo $linkrootbds?>quan-ly-tin-dang.html">Quản lý tin đăng</a>
                        </li>
                        <li>
                            <a href="<?php echo $linkrootbds?>quan-ly.html">Thông tin cá nhân</a>
                        </li>
                        <li>
                            <a href="<?php echo $linkrootbds?>quan-ly.html">Đổi mật khẩu</a>
                        </li>
                        <li>
                            <a href="<?php echo $linkrootbds?>thoat.html">Thoát</a>
                        </li>
                    </ul>
                    
                </div><!-- End .m_dmql -->
            
            </div><!-- End .m_sb -->
        </div><!-- End .block_sb -->
        
    </div>
    
 
    
</div><!-- End .f_cont -->