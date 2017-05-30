<?php
	require("../config.php");
	require("../common_start.php");
	include("../lib/func.lib.php");
	//require("check_login.php");
	
	$id=$_GET['id']; 
	$row_sanpham    = getRecord('tbl_rv_item', "id='".$id."'");
?>
<div id="tab1">
                                	
    <ul class="chon_tienich">
        <li>
            <span>Chọn bán kính để xem:</span>
        </li>
        <li>
            <input class="bk_s" type="radio" id="bankinh1" name="bankinh" value="500" >
            <span>500m</span>
        </li>
        <li>
            <input class="bk_s"  type="radio" id="bankinh2" name="bankinh" value="1000" >
            <span>1km</span>
        </li>
        <li>
            <input class="bk_s"  type="radio" id="bankinh3" name="bankinh" value="2000" >
            <span>2km</span>
        </li>
        <li>
            <input class="bk_s"  type="radio" id="bankinh4" name="bankinh" value="3000" >
            <span>3km</span>
        </li>
        <li>
            <input class="bk_s"  type="radio" id="bankinh5" name="bankinh" value="5000" >
            <span>5km</span>
        </li>
    </ul><!-- End .chon_tienich -->
    
    <div id="map_canvas" class="bando_tienich">
    
       <!-- <div id="map_canvas" class="map rounded"></div>-->
        
    </div><!-- End .bando_tienich -->
    
    <div class="list_tienich">
        <div id="total_property" class="tit_list_tienich">
            Các nhà đất trong cùng khu vực  
        </div>
        <div class="nhaxungquanh">
            <span>BĐS </span>
            <label>Diện tích</label>
            <strong>Giá</strong>
            <span>Khoảng cách</span>
        </div>
        <div id="content_1" class="detail_list_nhaxungquanh tienich_scroll_no">
    
       		<center> Để xem các nhà đất khác xung quanh vị trí nhà đất hiện tại bạn vui lòng chọn phạm vi bán kính muốn xem </center>         
           
        </div>
    </div><!-- End .list_tienich -->
    
</div><!-- End #tab1 -->

 

<!--<script type="text/javascript" src="<?php echo $linkrootbds?>map/js/jquery-1.7.1/jquery.min.js"></script>-->
<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/map/js/underscore-1.2.2/underscore.min.js"></script>
<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/map/js/backbone-0.5.3/backbone.min.js"></script>
<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/map/js/prettify/prettify.min.js"></script>
<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/map/js/demo.js"></script>
<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/map/ui/jquery.ui.map.js"></script>
<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/map/ui/jquery.ui.map.overlays.js"></script>
<script type="text/javascript" src="http://123nhadat.vn/styles/infobox.js"></script>
<script type="text/javascript">
	$("#content_1").mCustomScrollbar({
		autoHideScrollbar:true,
		theme:"dark-thin"
	});
	$(function() { 
			var lati='<?=$row_sanpham['latitude']?>';
			var long='<?=$row_sanpham['longitude']?>';
			var url="<?php echo $linkrootbds?>";
		 
			$('#map_canvas').gmap({'center': lati+','+long, 'zoom': 16, 'maxZoom': 30,  'minZoom': 14,  'scrollwheel': false,  'scaleControl': false , 'callback': function() {
				var self = this; 
				self.addMarker({'position': this.get('map').getCenter() , 'icon' : '<?php echo $linkrootbds?>imgs/map/icon/iconhome.png' }).click(function() {
					self.openInfoWindow({ 'content': '<?=$row_sanpham['name']?>' }, this);
				});	 
			}});
			
			$('#map_canvas').gmap().bind('init', function() { 
					$('#map_canvas').gmap('addControl', 'control', google.maps.ControlPosition.LEFT_TOP);                                           
			});
			 
				
				$('.bk_s').click(function() {  
						// home
						var bankinh=$(this).attr('value'); 
						
						$('#map_canvas').gmap('clear', 'overlays');
						$('#map_canvas').gmap('clear', 'markers');
						
						// ve vong
						$('#map_canvas').gmap('addShape', 'Circle', {
						'strokeColor': "#008595",
						'strokeOpacity': 0.8,
						'strokeWeight': 2,
						'fillColor': "#008595",
						'fillOpacity': 0.35,
						'center': new google.maps.LatLng(lati,long),
						'radius':parseInt(bankinh, 10),
						'clickable': false });
						
						
						var boxText = document.createElement("div"); 
						boxText.innerHTML = "<div id=\"infobox\"><div class=\"tit_googlemap\"><a href=\"\"><?=$row_sanpham['name']?></a></div><div class=\"detail_googlemap\"><div class=\"img_googlemap\"><a href=\"\"><img src=\"<?php echo $linkrootbds?><?=$row_sanpham['image']?>\" alt=\"\"></a></div><div class=\"text_googlemap\"><ul><li><b><?=$row_sanpham['price']?> <?php echo value_unit($row_sanpham['donvi']);?>/<?php echo dientich($row_sanpham['dientich']);?></b></li><li><?=$row_sanpham['tongdtsudung']?> m2</li><li>30 m²</li><li><a href=\"javascript:closeMyInfo();\" class=\"close_map\">Đóng</a></li></ul></div></div></div>";
						
						var	infobox2 = new InfoBox({
								 content: boxText,
								 disableAutoPan: false,
								 isHidden: false,
								 maxWidth: 280,
								 pixelOffset: new google.maps.Size(-140, 0),
								 boxStyle: {
									background: "<?php echo $linkrootbds?>imgs/map/icon/tipbox.gif') no-repeat",
									opacity: 1,
									width: "280px"
								},
								pane: "floatPane",
								enableEventPropagation: false, 
								infoBoxClearance: new google.maps.Size(1, 1)
						});
						
						$('#map_canvas').gmap('addMarker', { 'position': new google.maps.LatLng(lati,long),'icon' : '<?php echo $linkrootbds?>imgs/map/icon/my_place.png', 'bounds':false } ).click(function() {
								infobox2.close();
								if(infobox2.getVisible()==false){
									infobox2.setContent(boxText);
									infobox2.open($('#map_canvas').gmap('get', 'map'), this);
								}
						});
						
						$("#content_1").load('<?php echo $linkrootbds?>module/place_bds_list.php?mlat='+lati+'&mlong='+long+'&cid=8&mradius='+bankinh+'&mschool=1&mhos=1&mbank=0&mmarket=1&mpagoda=1&id='+<?=$row_sanpham['id']?>); //alert(idthanhpho)
						
						$('#content_1').removeClass("tienich_scroll_no");
						// And make this active
						$('#content_1').addClass("tienich_scroll");
														
						$.getJSON( '<?php echo $linkrootbds?>module/place_bds.php?mlat='+lati+'&mlong='+long+'&cid=8&mradius='+bankinh+'&mschool=1&mhos=1&mbank=0&mmarket=1&mpagoda=1&id='+<?=$row_sanpham['id']?>, function(data) { 
							$('#total_property').html("Có "+data.total+" bất động sản");
							$.each( data.markers, function(i, marker) {
								 
								$('#map_canvas').gmap('addMarker', { 
									'position': new google.maps.LatLng(marker.latitude, marker.longitude),'icon' : url+'imgs/map/icon/'+marker.icon+'',
									 
								}).click(function() {
									//$('#map_canvas').gmap('openInfoWindow', { 'content':marker.title}, this);
									boxText.innerHTML = "<div id=\"infobox\"><div class=\"tit_googlemap\"><a href=\""+url+marker.subject+".html\"> "+marker.title+"</a></div><div class=\"detail_googlemap\"><div class=\"img_googlemap\"><a href=\""+url+marker.subject+".html\"><img src=\""+url+marker.image+"\" alt=\"\"></a></div><div class=\"text_googlemap\"><ul><li><b>"+marker.price+"</b></li><li>"+marker.loai+"</li><li>"+marker.tongdtsudung+" m²</li><li><a href=\"javascript:closeMyInfo();\" class=\"close_map\">Đóng</a></li></ul></div></div></div>";
									infobox2.close();
									if(infobox2.getVisible()==false){
										infobox2.setContent(boxText);
										infobox2.open($('#map_canvas').gmap('get', 'map'), this);
									}
								});
							});
						}); 
						
				})
		 
	});
</script>
