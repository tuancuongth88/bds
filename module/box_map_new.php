<style>
			#infobox {
    background: none repeat scroll 0 0 #fff;
    border: 1px solid #000;
    border-radius: 2px;
    box-shadow: 0 0 4px #000;
    color: #222;
    font-size: 10px;
    margin-top: 8px;
    overflow: hidden;
}
.tit_googlemap {
    background: none repeat scroll 0 0 #3d3d3d;
    float: left;
    padding: 5px;
    width: 268px;
}
.tit_googlemap a {
    color: #fff;
    text-decoration: none;
}
.tit_googlemap a:hover {
    color: #5eab1f;
}
.detail_googlemap {
    background: none repeat scroll 0 0 #fff;
    float: left;
    padding: 5px;
    width: 266px;
}
.img_googlemap {
    float: left;
    height: 50px;
    margin-right: 10px;
    width: 70px;
}
.img_googlemap a {
    display: block;
    height: 50px;
    overflow: hidden;
    width: 70px;
}
.img_googlemap a img {
    height: 50px;
    width: 100px;
}
.text_googlemap {
    float: left;
    font-size: 11px;
    font-weight: 700;
    width: 186px;
}
.text_googlemap ul {
}
.text_googlemap ul li {
    color: #222;
    float: left;
    margin-bottom: 3px;
    width: 100%;
}
.text_googlemap ul li b {
    color: #ff5400;
}
a.close_map {
    background: none repeat scroll 0 0 #5eab1f;
    border: 1px solid #286400;
    border-radius: 2px;
    color: #fff;
    float: right;
    font-weight: 500;
    margin: -21px 0 0;
    padding: 2px 5px;
}
a.close_map:hover {
    background: none repeat scroll 0 0 #ff5400;
    border: 1px solid #bb5200;
    cursor: pointer;
}
		</style>
<div class="maps_D">
    <h4 class="t_gh">
        <div class="sty_t_gh">
            <span class="tab_gh1" id_tab="1">Vị trí nhà đất</span>
            <span class="tab_gh2" id_tab="2">Tiện ích xung quanh bản đồ</span>
        </div>
    </h4><!-- End .t_gh -->
    <div class="nd_gh_online">
        <!-- NOI DUNG TABS -->
        
        <!-- NOI DUNG TABS -->
    </div><!-- End .nd_gh_online -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".tab_gh1").addClass("active");
            $(".nd_gh_online").load("<?php echo $linkrootbds?>module/box_map_new_1.php?id="+<?=$row_sanpham['id']?>);						
            
            $(".t_gh span").click(function(){
                var id_tab=$(this).attr("id_tab");
                $(".nd_gh_online").load("<?php echo $linkrootbds?>module/box_map_new_"+id_tab+".php?id="+<?=$row_sanpham['id']?>);
                $(".t_gh span").removeClass("active");
                $(".tab_gh"+id_tab).addClass("active");
            });
        });
    </script>
</div><!-- End .maps_D -->

