<?php 
 	 	
	
	$keywordcontent=$_GET['keyword'];
	$keyword = str_replace("-", " ", $keywordcontent);
	if($keyword=="bat dong san") $keyword="";
	
	$idcity=$_GET['idcity'];
	$cate=$_GET['cate'];
	$bds=$_GET['bds'];
	$dientich=$_GET['dientich'];
	$huong=$_GET['huong'];
	$price=$_GET['price']; 
	
	if($idcity!="cac-tinh") 
	{
		$parent11=get_field('tbl_quanhuyen_category','subject',$idcity,'id');
		$srt_city=" and idcity=$parent11";
	} 
	
	if($huong!="moi-huong") {
		switch($huong){
			case "huong-dong"       : $srt_huong=" and huong=1";break;
			case "huong-nam"        : $srt_huong=" and huong=2";break;
			case "huong-bac"        : $srt_huong=" and huong=3";break;
			case "huong-dong-bac"   : $srt_huong=" and huong=4";break;
			case "huong-dong-nam"   : $srt_huong=" and huong=5";break;
			case "huong-tay-bac"    : $srt_huong=" and huong=6";break;
			case "huong-tay-nam"    : $srt_huong=" and huong=7";break; 
		} 
	}
 
	
	if($cate!="moi-nhu-cau") {
		switch($cate){
			case "can-ban"   : $srt_cate=" and catebds=1";break; 
			case "can-mua"   : $srt_cate=" and catebds=2";break; 
			case "can-thue"  : $srt_cate=" and catebds=3";break; 
			case "cho-thue"  : $srt_cate=" and catebds=4";break; 
			case "sang-nhuong"   : $srt_cate=" and catebds=5";break; 
		} 
	}
	
	if($dientich!="moi-dien-tich") {
		switch($dientich){
			case "nho-hon-30-m2"   : $srt_dientich=" and (dientich <= 30)";break;
			case "30-50-m2"        : $srt_dientich=" and (30 < dientich and dientich < 50 )";break;
			case "50-80-m2"        : $srt_dientich=" and (50 < dientich and dientich < 80 )";break;
			case "80-100-m2"       : $srt_dientich=" and (80 < dientich and dientich < 100 )";break;
			case "100-150-m2"      : $srt_dientich=" and (100 < dientich and dientich < 150 )";break;
			case "150-200-m2"      : $srt_dientich=" and (150 < dientich and dientich < 200 )";break;
			case "200-250-m2"      : $srt_dientich=" and (200 < dientich and dientich < 250 )";break;
			case "250-300-m2"      : $srt_dientich=" and (250 < dientich and dientich < 300 )";break;
			case "lon-hon-300m2"   : $srt_dientich=" and (300 < dientich)";break;
		} 
	}
	
	if($bds!="moi-loai") {
		$parent11=get_field('tbl_rv_category','subject',$bds,'id');
		$srt_bds=" and parent=$parent11";
	}
	
	if($price!="tat-ca-gia") {
		switch($price){
			case "nho-hon-500-trieu"  : $srt_gia=" and (donvi=2 and price <500)";break;
			case "800-trieu-den-1-ti" : $srt_gia=" and ((donvi=2 and price >=500) or (donvi=3 and price < 2))";break;
			case "1-den-3-ti"         : $srt_gia=" and (donvi=3 and price <= 3 and   price >1)";break;
			case "4-den-5-ti"         : $srt_gia=" and (donvi=3 and price <= 5 and   price >=4)";break;
			case "6-den-9-ti"         : $srt_gia=" and (donvi=3 and price <= 6 and   price >9)";break;
			case "lon-hon-10-ti"      : $srt_gia=" and (donvi=3 and price >= 10)";break; 
		} 
	}
	
	$pageSize = 30;
	$totalRows = 0;
	$xeptheo='id';
	$dem=1;
	
 
	settype($pageSize,"int");

	settype($totalRows,"int");
	settype($dem,"int");
	

	if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
	if ($pageNum<=0) $pageNum=1;
	$startRow = ($pageNum-1) * $pageSize;
	

     $totalRows = countRecord("tbl_rv_item","status=1 AND cate=0 $srt_city $srt_huong $srt_cate $srt_dientich $srt_bds $srt_gia and (  name LIKE '%$keyword%' or  detail LIKE '%$keyword%' or  keyword LIKE '%$keyword%')"); 
	   //echo "status=1 AND cate=0  $srt_city $srt_huong $srt_cate $srt_dientich $srt_bds $srt_gia and (  name LIKE '%$keyword%' or  detail LIKE '%$keyword%' or  keyword LIKE '%$keyword%') order by id DESC limit ".$startRow;
	$bds=get_records("tbl_rv_item","status=1 AND cate=0  $srt_city $srt_huong $srt_cate $srt_dientich $srt_bds $srt_gia and (  name LIKE '%$keyword%' or  detail LIKE '%$keyword%' or  keyword LIKE '%$keyword%') order by date_up DESC,id DESC limit ".$startRow.",".$pageSize," "," "," ");	


	if($totalRows=="") $totalRows=0;
?>
<div class="breacrum">
    <ul  itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" >
        <li>
            <a itemprop="url" href="<?php echo $linkrootbds?>" title="Trang chủ"><span  itemprop="title" > Trang chủ</span></a>
        </li>
        <li>
            <span  itemprop="title" >Kết quả tìm kiếm</span>
        </li>
    </ul>
</div>

<div class="f_cont clearfix">

    <article class="content">
        <div class="f_prod">
            <div class="block_prod">
            	<div style="padding:5px; border-bottom: solid dotted #CCC;">
                	Tìm được với ( <?=$title_t;?> ) là <?=$totalRows;?> kết quả
                </div>
            
                <div class="m_prod">
                    <ul>
                    <?php 
                    //$bds=get_records("tbl_rv_item","status=1","sort ASC"," "," ");
                    while($row_bds=mysql_fetch_assoc($bds)){ 
                     
                    ?>
                        <li>
                            <div class="li_prod clearfix">
                                <span class="lp_1">
                                    <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                       <?php 
										if($row_bds['image']!="") $hinh=$row_bds['image'];else $hinh="imgs/noimage.png";
										$hinh=$linkrootbds."imagecache/image.php/".$hinh."?width=100&amp;height=100&amp;cropratio=1:1&amp;image=".$linkrootbds.$hinh;
									?>
										<img src="<?php echo $hinh;?>" alt="<?php echo $row_bds['name'];?>">
									</a> 
                                </span><!-- End .lp_1 -->
                                <span class="lp_2">
                                    <h4>
                                        <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                            <?php echo $row_bds['name'];?>
                                        </a>
                                    </h4>
                                    <span class="vt_lp">Vị trí:  <?=get_field('tbl_quanhuyen_category','id',$row_bds['idcity'],'name');?></span>
                                    <ul class="tool_icon">
                                     <li class="ti_1">
                                         <?php echo  $row_bds['view'] ;?>
                                        </li>
                                        <li class="ti_2">
                                        <?php echo  countComment($row_bds['id']);?>
                                        </li>
                                        <li class="ti_3">
                                         <?php echo rand(7, 75);?>
                                        </li>
                                    </ul>
                                </span><!-- End .lp_2 -->
                            </div><!-- End .li_prod -->
                        </li>
                         <?php }?>
                    </ul>
                    <div class="clear"></div>
                </div><!-- End .m_prod -->
            
            
            
        	</div><!-- End .block_prod -->
            
        </div>
        
        <div class="page">
                <div class="PageNum">
                    <?php  
                    echo pagesLinks_new_full_2013($totalRows, $pageSize , $linkroot,"p","page-tim-bds/".$_GET['keyword'].'/'.$_GET['idcity'].'/'.$_GET['cate'].'/'.$_GET['bds'].'/'.$_GET['dientich'].'/'.$_GET['huong'].'/'.$_GET['price']);
                    ?>
                </div>
                <div class="clear"></div>
            </div>
        
        
        
    </article><!-- End .content -->
    
   <?php include("module/slidebar.php") ;?>
    
</div><!-- End .f_cont -->