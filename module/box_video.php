<?php
$so=1;
$video=get_records("tbl_rv_video","status=1 AND hot=1 "," "," "," ");
$rs_video=mysql_fetch_assoc($video);

$LK1 = explode("=",$rs_video['link']);
	$ls1=$LK1[1];
$LK2 = explode("&",$ls1);
	$kq_video=$LK2[0];	
?>
<div class="block_sb">
    <h4 class="t_sb">
        <span>
            Video giới thiệu
        </span>
    </h4><!-- End .t_sb -->
    <div class="m_sb">
    
        <div class="f_video">
            
            <?php if($rs_video['link']!=""){ ?>           
        <object width="100%" height="170">
            <param name="movie" value="http://www.youtube.com/v/vURcezzpM2Y?hl=vi_VN&amp;version=3&amp;autoplay=0"></param>
            <param name="allowFullScreen" value="true"></param>
            <param name="allowscriptaccess" value="always"></param>
            <embed src="http://www.youtube.com/v/<?php echo $kq_video; ?>?hl=vi_VN&amp;version=3&amp;autoplay=0" type="application/x-shockwave-flash" width="100%" height="170" allowscriptaccess="always" allowfullscreen="true"></embed>
        </object>
        <?php }?>
            
        </div><!-- End .f_video -->
    
    </div><!-- End .m_sb -->
</div><!-- End .block_sb -->