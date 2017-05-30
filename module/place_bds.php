<?php
	require("../config.php");
	require("../common_start.php");
	include("../lib/func.lib.php");
?>
 
<?php
	$id=$_GET['id'];	
	$lati=$_GET['mlat'];
	$long=$_GET['mlong'];
	$radius=$_GET['mradius'];
	$radius1=$radius/1000;
	$query = mysql_query("SELECT *,( 6371 * acos( cos( radians({$lati}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) - radians({$long}) ) + sin( 	radians({$lati}) ) * sin( radians( `latitude` ) ) ) ) AS distance
		FROM `tbl_rv_item` WHERE id <>  {$id}
		HAVING distance <= {$radius1}
		ORDER BY distance ASC
		");  
	$total=mysql_num_rows($query);
		/*echo "SELECT *,( 6371 * acos( cos( radians({$lati}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) - radians({$long}) ) + sin( 	radians({$lati}) ) * sin( radians( `latitude` ) ) ) ) AS distance
		FROM `tbl_place`
		HAVING distance <= {$radius1}
		ORDER BY distance ASC
		";*/
	
	/*if($radius==500){
		$query = mysql_query("SELECT *,( 6371 * acos( cos( radians({$lati}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) - radians({$long}) ) + sin( 	radians({$lati}) ) * sin( radians( `latitude` ) ) ) ) AS distance
		FROM `tbl_place`
		HAVING distance <= {$radius1}
		ORDER BY distance ASC
		");  
	}elseif($radius==1000){
		$query = mysql_query("SELECT *,( 6371 * acos( cos( radians({$lati}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) - radians({$long}) ) + sin( 	radians({$lati}) ) * sin( radians( `latitude` ) ) ) ) AS distance
		FROM `tbl_place`
		HAVING distance <= {$radius1}
		ORDER BY distance ASC
		");  
	}elseif($radius==2000){
		$query = mysql_query("
		SELECT * , SQRT(
			POW(69.1 * (latitude - ".$lati."), 2) +
			POW(69.1 * (".$long." - longitude) * COS(latitude / 57.3), 2)) AS distance
		FROM tbl_place HAVING distance < 1.25 ORDER BY distance;
		"); 
		 
	}elseif($radius==3000){
		$query = mysql_query("
		SELECT * , SQRT(
			POW(69.1 * (latitude - ".$lati."), 2) +
			POW(69.1 * (".$long." - longitude) * COS(latitude / 57.3), 2)) AS distance
		FROM tbl_place HAVING distance < 1.875 ORDER BY distance;
		");  echo "
		SELECT * , SQRT(
			POW(69.1 * (latitude - ".$lati."), 2) +
			POW(69.1 * (".$long." - longitude) * COS(latitude / 57.3), 2)) AS distance
		FROM tbl_place HAVING distance < 3.125 ORDER BY distance;
		";
	}
	elseif($radius==5000){
		$query = mysql_query("
		SELECT * , SQRT(
			POW(69.1 * (latitude - ".$lati."), 2) +
			POW(69.1 * (".$long." - longitude) * COS(latitude / 57.3), 2)) AS distance
		FROM tbl_place HAVING distance < 3.125 ORDER BY distance;
		");
	}*/
	
	$i=1;
	$place=array();
	$place['total']=$total;
	$place['markers']=array();
	$i=0;
	while($row = mysql_fetch_assoc($query))
	{ 
	/*	$kc=getDistanceBetweenPointsNew($lati,$long,$row['latitude'],$row['longitude'],'Km'); 
		if($radius==500 && $kc < 0.5){ 
			$place['markers'][]=array('id'=>$row['id'],'title'=>$row['name'],'latitude'=>$row['latitude'],'longitude'=>$row['longitude'],'icon'=>$row['icon'],'content'=>$row['content'],'image'=>$row['image']);
		}elseif($radius==1000 && $kc < 1.1){
			$place['markers'][]=array('id'=>$row['id'],'title'=>$row['name'],'latitude'=>$row['latitude'],'longitude'=>$row['longitude'],'icon'=>$row['icon'],'content'=>$row['content'],'image'=>$row['image']);
		}
		elseif($radius==2000 && $kc < 2.1){
			$place['markers'][]=array('id'=>$row['id'],'title'=>$row['name'],'latitude'=>$row['latitude'],'longitude'=>$row['longitude'],'icon'=>$row['icon'],'content'=>$row['content'],'image'=>$row['image']);
		}elseif($radius==3000 && $kc < 3.1){
			$place['markers'][]=array('id'=>$row['id'],'title'=>$row['name'],'latitude'=>$row['latitude'],'longitude'=>$row['longitude'],'icon'=>$row['icon'],'content'=>$row['content'],'image'=>$row['image']);
		}elseif($radius==5000 && $kc < 5.1){
			$place['markers'][]=array('id'=>$row['id'],'title'=>$row['name'],'latitude'=>$row['latitude'],'longitude'=>$row['longitude'],'icon'=>$row['icon'],'content'=>$row['content'],'image'=>$row['image']);
		}*/
		
		$place['markers'][]=array('id'=>$row['id'],'subject'=>$row['subject'],'title'=>$row['name'],'latitude'=>$row['latitude'],'longitude'=>$row['longitude'],'icon'=>"place_7.png",'content'=>$row['content'],'image'=>$row['image'],'price'=>$row['price'].value_unit($row['donvi'])."/".dientich($row['dientich']),'tongdtsudung'=>$row['tongdtsudung'],'loai'=>get_field('tbl_rv_category','id',$row['parent'],'name'));
		$i++;
	}
	//print_r($place);
	print_r(json_encode($place));
?>
 
 