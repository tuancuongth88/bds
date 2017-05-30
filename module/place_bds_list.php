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
		/*echo "SELECT *,( 6371 * acos( cos( radians({$lati}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) - radians({$long}) ) + sin( 	radians({$lati}) ) * sin( radians( `latitude` ) ) ) ) AS distance
		FROM `tbl_rv_item` WHERE id <>  {$id}
		HAVING distance <= {$radius1}
		ORDER BY distance ASC
		";*/
	$total=mysql_num_rows($query); 
		 
	$i=1;
	$place=array();
	$place['markers']=array();
	$mang=$place['markers'];
	$i=0;
?>
<script type="text/javascript">
	$("#content_1").mCustomScrollbar({
		autoHideScrollbar:true,
		theme:"dark-thin"
	});
</script>
<ul>
 

<?
	while($row = mysql_fetch_assoc($query))
	{  
?>
	<li>
	<?
	 	$kc=getDistanceBetweenPointsNew($lati,$long,$row['latitude'],$row['longitude'],'Km'); 
		$place['markers'][]=array('id'=>$row['id'],'title'=>$row['name'],'latitude'=>$row['latitude'],'longitude'=>$row['longitude'],'icon'=>$row['icon'],'content'=>$row['content'],'image'=>$row['image']);
?>
		<span>
            <a href="<?php echo $linkrootbds?><?=$row['subject']?>.html">
                <?=$row['name']?>
            </a>
        </span>
        <label> <?=str_replace("m2", "", $row['tongdtsudung'])?> m2</label>
        <strong><?=$row['price']?> <?php echo value_unit($row['donvi']);?>/<?php echo dientich($row['dientich']);?></strong>
        <span><?php echo $kc*1000?>m</span>
	</li>
<?
	}
 
?>
     
</ul>
 
 
 