<?php
	require("../config.php");
	require("../common_start.php");
	include("../lib/func.lib.php");
?>
 
<?php	  
	$lati=$_GET['mlat'];
	$long=$_GET['mlong'];
	$radius=$_GET['mradius'];
	$radius1=$radius/1000;
	$mschool=$_GET['mschool'];
	$mhos=$_GET['mhos'];
	$mmarket=$_GET['mmarket'];
	$mpagoda=$_GET['mpagoda'];
	$str="";
	if($mschool==1) $str=",1";
	if($mhos==1) $str.=",2";
	if($mmarket==1) $str.=",3";
	if($mpagoda==1) $str.=",4";
	$str=substr($str,1);
	if($str!=""){
	
	$query = mysql_query("SELECT *,( 6371 * acos( cos( radians({$lati}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) - radians({$long}) ) + sin( 	radians({$lati}) ) * sin( radians( `latitude` ) ) ) ) AS distance
		FROM `tbl_place`
		WHERE parent in ($str) 
		HAVING distance <= {$radius1}
		ORDER BY distance ASC
		"); 
		 
	$total=mysql_num_rows($query);	
		 
	$i=1;
	$place=array();
	$place['total']=$total;
	$place['markers']=array();
	$mang=$place['markers'];
	$i=0;
	while($row = mysql_fetch_assoc($query))
	{ 
	 	$kc=getDistanceBetweenPointsNew($lati,$long,$row['latitude'],$row['longitude'],'Km');
		$place['markers'][]=array('id'=>$row['id'],'title'=>$row['name'],'latitude'=>$row['latitude'],'longitude'=>$row['longitude'],'icon'=>$row['icon'],'content'=>$row['content'],'image'=>$row['image'],'kc'=>$kc*1000);
		$i++;
	}
 
	print_r(json_encode($place));
	}
?>
 
 