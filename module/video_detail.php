<?php 
 
	
    $name=$_GET['name'];
	
	$row_sanpham   = getRecord('tbl_rv_video', "subject='".$name."'");
 
 
 
?>
<div class="breacrum">
     <div id="breacrum" xmlns:v="http://rdf.data-vocabulary.org/#" >
         <span typeof="v:Breadcrumb">
            <a  rel="v:url" property="v:title"  title="Trang chủ" href="<?php echo $linkrootbds?>"> Trang chủ </a>
        </span>
        <span typeof="v:Breadcrumb">
            <a  rel="v:url" property="v:title"  title="Video" href="<?php echo $linkrootbds?>video.html"> Video </a>
        </span>
         <span typeof="v:Breadcrumb"> &raquo;
            <?=$row_sanpham['name']?>
        </span>
    </div>
</div>
 
<div class="f_cont clearfix">

    <article class="content">
         
        <h2 class="t_ndct">
            <?=$row_sanpham['name']?>
        </h2><!-- End .t_ndct -->
        
        <div class="info_video_D">
			<?php
            $LK1 = explode("=",$row_sanpham['link']);
                $ls1=$LK1[1];
            $LK2 = explode("&",$ls1);
                $kq_video=$LK2[0];	
                
            ?> 
            <?php if($row_sanpham['link']!=""){ ?>      
            <object width="100%" height="400">
                <param name="movie" value="http://www.youtube.com/v/vURcezzpM2Y?hl=vi_VN&amp;version=3"></param>
                <param name="allowFullScreen" value="true"></param>
                <param name="allowscriptaccess" value="always"></param>
                <embed src="http://www.youtube.com/v/<?php echo $kq_video; ?>?hl=vi_VN&amp;version=3" type="application/x-shockwave-flash" width="100%" height="400" allowscriptaccess="always" allowfullscreen="true"></embed>
            </object>
             <?php }?>
        </div><!-- End .info_video_D -->
        
        <div class="block_pD">
            <h4 class="t_prod">
                <span>
                    Thông tin chi tiết
                </span>
            </h4><!-- End .t_prod -->
            <div class="m_pD">
            
                <div class="f_detail clearfix">
                
        				<?=$row_sanpham['detail']?>
                    
                </div><!-- End .f_detail -->
            
            </div><!-- End .m_pD -->
        </div><!-- End .block_pD -->
        
        <div class="news_other">
        
            <h4 class="t_prod">
                <span>
                    Video khác
                </span>
            </h4><!-- End .t_prod -->
        
            <div class="f_video_D">
        
                <ul>
                <?php
				$bds=get_records("tbl_rv_video","status=1","rand()","0,6"," ");
				while($row_bds=mysql_fetch_assoc($bds)){
				?>
                    <li>
                          <a href="<?php echo $linkrootbds?>video/<?php echo $row_bds['subject'];?>.html" title="">
                            <div class="bg_miv">
                                <div class="mask_img_v">                                   	
                                    <?php if($row_bds['image']!="") $hinh=$row_bds['image'];else $hinh="imgs/noimage.png";?>
                                    <img src="<?php echo $hinh;?>" alt="<?php echo $row_bds['name'];?>"> 
                                </div>
                            </div><!-- End .mask_img_v -->
                            <h4>
                                <?php echo catchuoi_tuybien(strip_tags($row_bds['detail_short']),15);?>
                            </h4>
                            <div class="clear"></div>
                        </a>
                    </li>
                <?php }?>  
                </ul>
                
                <div class="clear"></div>
            
            </div><!-- End .f_video_D -->
            
        </div><!-- End .news_other -->
         
        
        
        
    </article><!-- End .content -->
    
   <?php include("module/slidebar.php") ;?>
    
</div><!-- End .f_cont -->