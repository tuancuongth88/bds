 
<div class="breacrum">
    <ul>
        <li>
        	<a href="<?php echo $linkrootbds?>" title="Trang chủ">Trang chủ</a>
        </li> 
        <li>
             Lỗi không tìm thấy
        </li> 
    </ul>
</div>
 
<div class="f_cont clearfix">

    <article class="content">
         
		 <div class="f_detail clearfix">
			
            <div style="text-align:center;">
                 <br />
                <script>
                s=3; 
                setTimeout("document.location='<?php echo $linkrootbds?>'",s*1000); 
                setInterval("document.getElementById('sogiay').innerHTML=s--;",1000);
                </script> 
                <a href="<?php echo $linkrootbds?>"> Link quay lại trang chủ ngay</a><br />
                Sẽ quay lại trang chủ sau.<br />
                <span id=sogiay></span>
                <br />
            </div>
        
        </div><!-- End .f_detail --> 
         
    </article><!-- End .content -->
    
   <?php include("module/slidebar.php") ;?>
    
</div><!-- End .f_cont -->