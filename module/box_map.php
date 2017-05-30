 
	<style>
		.show_map{width:100%; height:250px;}
	</style>
	<script>
		$(document).ready(function() {
			$("#geocomplete").geocomplete({
			  bounds: true,	
			  map: ".show_map",
			  mapOptions: {zoom: 18},
			  markerOptions: {draggable: true},
			  details: "input",
			  detailsAttribute:"<?=$row_sanpham['diachi']?>",
			  location: true
			});
			
			$("#geocomplete").click(function(){
			  $("#geocomplete").trigger("geocode");
			}).click();
			
			 
			
		});
	</script>
	
	<div class="maps-spct">
		<span class="t-maps-spct">
			bản đồ
		</span><!-- End .t-maps-spct -->
		<input style="display:none" type="text" id="geocomplete" value="<?=$row_sanpham['diachi']?>" />
		<div class="main-page-ct show_map" style="margin: 0;width:100%; overflow: hidden;" ></div><!-- End .main-page-ct -->
	</div><!-- End .maps-spct -->