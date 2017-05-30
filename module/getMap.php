<?php
	require("../config.php");
	require("../common_start.php");
	include("../lib/func.lib.php");
	//require("check_login.php");
	$sonha=$_GET['sonha'];
	$duong=$_GET['duong'];
	$phuong=$_GET['phuong'];
	$huyen=$_GET['huyen'];
	$tinh=$_GET['tinh'];
	
	$tinh=get_field('tbl_quanhuyen_category','id',$tinh,'name');
	$huyen  = get_field('tbl_quanhuyen','id',$huyen,'name');; 
	$phuong  = get_field('tbl_phuongxa','id',$phuong,'name');; 
    $duong  = get_field('tbl_street','id',$duong,'name');; 
	
	if($sonha!="") $diachi.=",".$sonha;
	if($duong!="") $diachi.=",".$duong;
	if($phuong!="") $diachi.=",".$phuong;
	if($huyen!="") $diachi.=",".$huyen;
	if($tinh!="") $diachi.=",".$tinh;
	
	$diachi=substr($diachi,1);
	
	//echo $diachi;
	
	$address = $diachi; // Google HQ
	$address = urlencode(str_replace(",", ",+",$address)); ;
	
	$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
	//echo 'http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false';
	$output= json_decode($geocode);
	
	$lat = $output->results[0]->geometry->location->lat;
	$long = $output->results[0]->geometry->location->lng;
?>
<!--<script type="text/javascript" src="http://localhost/batdongsannew/scripts/map/js/jquery-1.7.1/jquery.min.js"></script>-->
 
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
		  detailsAttribute:"<?=$diachi?>",
		  location: true
		});
		
		$("#geocomplete").click(function(){
		  $("#geocomplete").trigger("geocode");
		}).click();
		
		 
		
	});
</script>
<input  type="hidden" name="lat" value="<?=$lat?>"  /><input  type="hidden" name="long" value="<?=$long?>"  />
<div class="maps-spct">
	<span class="t-maps-spct">
		bản đồ
	</span><!-- End .t-maps-spct -->
	<input style="display:none" type="text" id="geocomplete" value="<?=$diachi?>" />
	<div class="main-page-ct show_map" style="margin: 0;width:100%; overflow: hidden;" ></div><!-- End .main-page-ct -->
</div><!-- End .maps-spct -->