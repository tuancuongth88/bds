<?php
	$row_title_lap=getRecord('tbl_config', "id=3");
	if($_GET['act']=="linhtinh"){ // tim kiem
		//http://www.batdongsanabc.vn/ho-chi-minh/quan-1/phuong-ben-nghe/800-trieu-den-1-ti/
		
		$field=array();
	
		for($i=1;$i<9;$i++){
			if($_GET['field'.$i]!="") $field[$i]=$_GET['field'.$i];
			if($_GET['field'.$i]!="") $chuoi.="/".$_GET['field'.$i];
		}
		//echo $chuoi."/";
		
		//kiem tra loai bien\
		
		$chuoi_tieude="";
		
		for($i=1;$i<9;$i++){
			if($field[$i]!="") {
				//echo $field[$i]."_";
				//kiem tra tinh 
				$tam=get_field('tbl_quanhuyen_category','subject',$field[$i],'id');  
				$quan  = getRecord('tbl_quanhuyen', "subject='".$field[$i]."' and parent='".get_field('tbl_quanhuyen_category','subject',$field[$i-1],'id')."'"); 
				$tam1=$quan['id']; 
				
				$phuong  = getRecord('tbl_phuongxa', "subject='".$field[$i]."' and parent='".get_field('tbl_quanhuyen','subject',$field[$i-1],'id')."'"); 
				$tam2=$phuong['id']; 
				
				$duong  = getRecord('tbl_street', "subject='".$field[$i]."' and parent='".get_field('tbl_quanhuyen','subject',$field[$i-2],'id')."'"); 
				
				if($duong['id']=="" )$duong=getRecord('tbl_street', "subject='".$field[$i]."' and parent='".get_field('tbl_quanhuyen','subject',$field[$i-1],'id')."'"); 
				$tam3=$duong['id']; 
				  
				$row_cate  = getRecord('tbl_rv_category', "subject='".$field[$i]."'"); 
				$srt_dientich=""; 
				switch($field[$i]){
					case "nho-hon-30-m2"   : {$srt_dientich=" and (dientich <= 30)";$dienticht=$field[$i];$dientich="nhỏ hơn 30 m2";break;}
					case "30-50-m2"        : {$srt_dientich=" and (30 < dientich and dientich < 50 )";$dienticht=$field[$i];$dientich="30 đến 50 m2";break;}
					case "50-80-m2"        : {$srt_dientich=" and (50 < dientich and dientich < 80 )";$dienticht=$field[$i];$dientich="50 đến 80 m2";break;}
					case "80-100-m2"       : {$srt_dientich=" and (80 < dientich and dientich < 100 )";$dienticht=$field[$i];$dientich="80 đến 100 m2";break;}
					case "100-150-m2"      : {$srt_dientich=" and (100 < dientich and dientich < 150 )";$dienticht=$field[$i];$dientich="100 đến 150 m2";break;}
					case "150-200-m2"      : {$srt_dientich=" and (150 < dientich and dientich < 200 )";$dienticht=$field[$i];$dientich="150 đến 200 m2";break;}
					case "200-250-m2"      : {$srt_dientich=" and (200 < dientich and dientich < 250 )";$dienticht=$field[$i];$dientich="200 đến 250 m2";break;}
					case "250-300-m2"      : {$srt_dientich=" and (250 < dientich and dientich < 300 )";$dienticht=$field[$i];$dientich="250 đến 300 m2";break;}
					case "lon-hon-300m2"   : {$srt_dientich=" and (300 < dientich)";$dienticht=$field[$i];$dientich="lớn hơn 300 m2";break;}
				}
				 
				 
				$srt_gia="";
				switch($field[$i]){
					case "nho-hon-500-trieu"  : {$srt_gia=" and (donvi=2 and price <500)";$giat=$field[$i];$gia="nhỏ hơn 300 triệu";break;}
					case "800-trieu-den-1-ti" : {$srt_gia=" and ((donvi=2 and price >=500) or (donvi=3 and price < 2))";$giat=$field[$i];$gia="800 triệu đến 1 tỉ";break;}
					case "1-den-3-ti"         : {$srt_gia=" and (donvi=3 and price <= 3 and   price >1)";$giat=$field[$i];$gia="1 đến 3 tỉ";break;}
					case "4-den-5-ti"         : {$srt_gia=" and (donvi=3 and price <= 5 and   price >=4)";$giat=$field[$i];$gia="4 đến 5 tỉ";break;}
					case "6-den-9-ti"         : {$srt_gia=" and (donvi=3 and price <= 6 and   price >9)";$giat=$field[$i];$gia="6 đến 9 tỉ";break;}
					case "lon-hon-10-ti"      : {$srt_gia=" and (donvi=3 and price >= 10)";$giat=$field[$i];$gia="lớn hơn 10 tỉ";break;}
				} 
				 
				if($tam>0) {
					$str_city=" and idcity='".$tam."'";
					$nam=get_field('tbl_quanhuyen_category','id',$tam,'name');
					$breadcum='<li> <a itemprop="url" href="'.$linkrootbds.$field[$i].'.html" title="'.$nam.'"><span  itemprop="title" > '.get_field('tbl_quanhuyen_category','id',$tam,'name').' </span> </a> </li>';
					$idtinh=$tam;
					$title=$nam;
				}elseif($tam1>0) { //kiem tra tinh huyen
					$str_tinh=" and idquan='".$tam1."'";
					for($j=1;$j<$i;$j++){
						$chuoi_tt.="/".$field[$j];
					}
					$chuoi_tt=substr($chuoi_tt,1);
					$nam=get_field('tbl_quanhuyen','id',$tam1,'name');
					$breadcum.='<li> <a itemprop="url" href="'.$linkrootbds.$chuoi_tt."/".$field[$i].'.html" title="'.$nam.'"><span  itemprop="title" > '.get_field('tbl_quanhuyen','id',$tam1,'name').' </span> </a> </li>';
					$idquan=$tam1;		
					$title.=" > ".$nam;
				}elseif($tam2>0) {//kiem tra tinh huyen
					$str_huyen=" and idphuong='".$tam2."'";
					$chuoi_tt="";
					for($j=1;$j<$i;$j++){
						$chuoi_tt.="/".$field[$j];
					}
					$chuoi_tt=substr($chuoi_tt,1);
					$nam=get_field('tbl_phuongxa','id',$tam2,'name');
					$breadcum.='<li> <a itemprop="url" href="'.$linkrootbds.$chuoi_tt."/".$field[$i].'/" title="'.$nam.'"><span  itemprop="title" > '.get_field('tbl_phuongxa','id',$tam2,'name').' </span> </a> </li>';
					$idphuong=$tam2;
					$title.=" > ".$nam;
				}elseif($tam3>0) {//kiem tra duong
					$str_duong=" and idstreet='".$tam3."'";
					
					$chuoi_tt="";
					for($j=1;$j<$i;$j++){
						$chuoi_tt.="/".$field[$j];
					}
					$chuoi_tt=substr($chuoi_tt,1);
					$nam=get_field('tbl_street','id',$tam3,'name');
					$breadcum.='<li> <a itemprop="url" href="'.$linkrootbds.$chuoi_tt."/".$field[$i].'/" title="'.$nam.'"><span  itemprop="title" > '.get_field('tbl_street','id',$tam3,'name').' </span> </a> </li>';
					$idstreet=$tam3;
					$title.=" > ".$nam;
				}elseif($row_cate['id']>0 && $row_cate['parent']==2) { 
					$str_parent=" and parent in ('".getParent("tbl_rv_category",$row_cate['id'])."' )";
					
					$chuoi_tt="";
					for($j=1;$j<$i;$j++){
						$chuoi_tt.="/".$field[$j];
					}
					
					$chuoi_tt=substr($chuoi_tt,1);
					if($chuoi_tt!="")$chuoi_tt.=$field[$i]."/";
					else $chuoi_tt.=$field[$i].".html";
					$breadcum.='<li> <a itemprop="url" href="'.$linkrootbds.$chuoi_tt.'" title="'.$row_cate['name'].'"><span  itemprop="title" > '.$row_cate['name'].' </span> </a> </li>';
					$idnhucau=$row_cate['id'];
					$title.=" > ".$row_cate['name'];
				}elseif($row_cate['id']>0) {//kiem tra duong
					$str_parent=" and parent ='".$row_cate['id']."'";
					
					$chuoi_tt="";
					for($j=1;$j<$i;$j++){
						$chuoi_tt.="/".$field[$j];
					}
					$chuoi_tt=substr($chuoi_tt,1);
					$breadcum.='<li> <a itemprop="url" href="'.$linkrootbds.$chuoi_tt."/".$field[$i].'/" title="'.$row_cate['name'].'"><span  itemprop="title" > '.$row_cate['name'].' </span> </a> </li>';
					$idloai=$row_cate['id'];
					$title.=" > ".$row_cate['name'];
				}elseif($srt_dientich!="") {
					
				}
				elseif($srt_gia!="") {
					
				}
				
			}
		}
		
		$title_t    =$title;
	    $description_t=$cate_t." ".$keyword.$city.$dientich_t.$huong_t.$price_t;
		$keywords_t =$row_title_lap['title'];
	}
	elseif($_GET['act']=='product_detail' && $_GET['bds']){ // chi tiet tin - danh muc bds,da,dn - list bds theo thanh pho
		$bds=$_GET['bds'];

		$row_rs_tit=getRecord('tbl_rv_item', "subject='".$bds."'");
		if($row_rs_tit['id']!=""){// chi tiet tin
				//http://www.batdongsanabc.vn/athena-building-van-phong-cho-thue-quan-tan-binh.html
				$title_t    =$row_rs_tit['title']!='' ? $row_rs_tit['title'] : $row_rs_tit['name'];
				$description_t=$row_rs_tit['description']!='' ? $row_rs_tit['description'] : $row_rs_tit['name'];
				$keywords_t =$row_rs_tit['keyword']!='' ? $row_rs_tit['keyword'] : $row_rs_tit['keyword'];
				
		}
		if($row_rs_tit['id']==""){// danh muc
				//http://www.batdongsanabc.vn/cho-thue-dat.html
				//http://www.batdongsanabc.vn/tin-tuc-bat-dong-san.html
				$row_rs_tit=getRecord('tbl_rv_category', "subject='".$bds."'");
				$title_t    =$row_rs_tit['title']!='' ? $row_rs_tit['title'] : $row_rs_tit['name'];
				$description_t=$row_rs_tit['description']!='' ? $row_rs_tit['description'] : $row_rs_tit['name']." ".$row_title_lap['description'];
				$keywords_t =$row_rs_tit['keyword']!='' ? $row_rs_tit['keyword'] : $row_title_lap['keyword'];
		}
		
		$tpvaduong=0;
		$a=getRecord('tbl_quanhuyen_category', "subject='".$bds."'");
	    if($row_rs_tit['id']=="" && $a['id']>0) { // Thành phố
			//http://www.batdongsanabc.vn/da-nang.html
			
			$title_t =" Mua Bán Nhà Đất › ".$a['name'];
			$description_t="Kênh thông tin bất động sản ".$a['name']." mua bán nhà đất, địa ốc, mua bán, rao vặt, mua nhà, bán nhà, cho thuê, cần thuê, nhà phố, chung cư, biệt thự, căn hộ, dự án, nhà xưởng.".$row_rs_tit['description'];		
		
			$keywords_t ="nha dat"." ".$a['name'].", ". "bat dong san"." ".$a['name'].", ". "dia oc"." ".$a['name'].", ". "mua nha"." ".$a['name'].", ".  " ban nha"." ".$a['name'].", ".  "cho thue nha"." ".$a['name'].", ". "can thue nha"." ".$a['name'].", "." nha pho"." ".$a['name'].", ". " chung cu"." ".$a['name'].", ". " biet thu"." ".$a['name'].", ". " can ho"." ".$a['name'].", ". " du an"." ".$a['name'].", ". "nha xuong"." ".$a['name'].",".$row_rs_tit['keyword'];
			$tpvaduong=1;
		} 
		
		$dem_ct=substr_count($bds, 'duong');
	
	if($dem_ct==1 && $tpvaduong==0){
		$chuoi=explode("-duong-",$bds);
		$tp=get_field('tbl_quanhuyen_category','subject',$chuoi[0],'id');
		$tenduong="duong-".$chuoi[1];;
		$duong=getRecord('tbl_street', "parent1='".$tp."' and subject='".$tenduong."'  ");
		$tp_tit=getRecord('tbl_quanhuyen_category', "id='".$tp."'");
	}
	else {
		$kt2=0;
		$chuoi=explode("-duong-",$bds);
		
		if(get_field('tbl_quanhuyen_category','subject',$chuoi[0],'id')>0){
			// abd-asds-duong-duong-quang-ham
			//echo $chuoi[0]." 0 abd-asds-duong-duong-quang-ham";
			$tp=get_field('tbl_quanhuyen_category','subject',$chuoi[0],'id');
			$tenduong=str_replace($chuoi[0], "",$_GET['bds']);;
			$tenduong=substr($tenduong,1);
			$duong=getRecord('tbl_street', "parent1='".$tp."' and subject='".$tenduong."'  ");
		}elseif(get_field('tbl_quanhuyen_category','subject',$chuoi[0]."-duong",'id')>0){
			// abd-asds-duong-duong-quang-trung
			//echo $chuoi[0]."-duong"." 0 abd-asds-duong-duong-quang-trung";
			$tp=get_field('tbl_quanhuyen_category','subject',$chuoi[0]."-duong",'id');
		    if(substr_count($bds, $chuoi[0]."-duong")>1)  $tenduong=str_replace($chuoi[0]."-duong", "",$_GET['bds']).$chuoi[0]."-duong";
			else $tenduong=str_replace($chuoi[0]."-duong", "",$_GET['bds']);
			$tenduong=substr($tenduong,1);
			$duong=getRecord('tbl_street', "parent1='".$tp."' and subject='".$tenduong."'  ");
		}
		
		$tp_tit=getRecord('tbl_quanhuyen_category', "id='".$tp."'");
 		
	}
 	
		if($duong['id']>0 ){
			
			// Thành Phố / Đường
			//http://www.batdongsanabc.vn/da-nang-duong-dang-thuy-tram.html

			$title_t =" Mua Bán Nhà Đất › ".$tp_tit['name']." › ".$duong['name'];
			$description_t=" ".$tp_tit['name']." ".$duong['name']." mua bán nhà đất, địa ốc, mua bán, rao vặt, mua nhà, bán nhà, cho thuê, cần thuê, nhà phố, chung cư, biệt thự, căn hộ, dự án, nhà xưởng.".$row_rs_tit['description'];		
		
			$keywords_t ="nha dat"." ".$tp_tit['name'].", ". "bat dong san"." ".$tp_tit['name'].", ". "dia oc"." ".$tp_tit['name'].", ". "mua nha"." ".$tp_tit['name'].", ".  " ban nha"." ".$tp_tit['name'].", ".  "cho thue nha"." ".$tp_tit['name'].", ". "can thue nha"." ".$tp_tit['name'].", "." nha pho"." ".$tp_tit['name'].", ". " chung cu"." ".$tp_tit['name'].", ". " biet thu"." ".$tp_tit['name'].", ". " can ho"." ".$tp_tit['name'].", ". " du an"." ".$tp_tit['name'].", ". "nha xuong"." ".$tp_tit['name'].",".$row_rs_tit['keyword'];
			
		}
		
	    
	}
	
	// Thành phố / Huyện
	elseif($_GET['act']=='huyen') // tp hcm
	{
		//http://www.batdongsanabc.vn/binh-duong/thi-xa-di-an.html
		$tenhuyen=get_field('tbl_quanhuyen','subject',$_GET['huyen'],'name');
		$tenquan=get_field('tbl_quanhuyen_category','subject',$_GET['quan'],'name');;
		$tenhuyen_kd=cat_kytu_dacbiet($tenhuyen,1,1,0,0,1);
		$tenquan_kd=cat_kytu_dacbiet($tenquan,1,1,0,0,1);
		
		$title_t    = " Mua Bán Nhà Đất › ".$tenquan." › ".$tenhuyen;
		$description_t="Kênh thông tin bất động sản ".$tenhuyen." ".$tenquan." mua bán nhà đất, địa ốc, mua bán, rao vặt, mua nhà, bán nhà, cho thuê, cần thuê, nhà phố, chung cư, biệt thự, căn hộ, dự án, nhà xưởng." .$row_rs_tit['description'];
		
		$keywords_t ="nha dat"." ".$tenhuyen_kd." ".$tenquan_kd.", ". "bat dong san"." ".$tenhuyen_kd." ".$tenquan_kd.", ". "dia oc"." ".$tenhuyen_kd." ".$tenquan_kd.", ". "mua nha"." ".$tenhuyen_kd." ".$tenquan_kd.", ".  " ban nha"." ".$tenhuyen_kd." ".$tenquan_kd.", ".  "cho thue nha"." ".$tenhuyen_kd." ".$tenquan_kd.", ". "can thue nha"." ".$tenhuyen_kd." ".$tenquan_kd.", "." nha pho"." ".$tenhuyen_kd." ".$tenquan_kd.", ". " chung cu"." ".$tenhuyen_kd." ".$tenquan_kd.", ". " biet thu"." ".$tenhuyen_kd." ".$tenquan_kd.", ". " can ho"." ".$tenhuyen_kd." ".$tenquan_kd.", ". " du an"." ".$tenhuyen_kd." ".$tenquan_kd.", ". "nha xuong"." ".$tenhuyen_kd." ".$tenquan_kd.",".$row_rs_tit['keyword'];
	}
	
	// Thành phố / Huyện / phuong
	elseif($_GET['act']=='phuong') // tp hcm
	{
		//http://www.batdongsanabc.vn/binh-duong/thi-xa-di-an.html
		
		$tenphuong=get_field('tbl_phuongxa','subject',$_GET['phuong'],'name');
		$tenhuyen=get_field('tbl_quanhuyen','subject',$_GET['huyen'],'name');
		$tenquan=get_field('tbl_quanhuyen_category','subject',$_GET['quan'],'name');;
		$tenhuyen_kd=cat_kytu_dacbiet($tenhuyen,1,1,0,0,1);
		$tenquan_kd=cat_kytu_dacbiet($tenquan,1,1,0,0,1);
		$tenphuong_kd=cat_kytu_dacbiet($tenquan,1,1,0,0,1);
		
		$title_t    = " Mua Bán Nhà Đất › ".$tenphuong." › ".$tenquan." › ".$tenhuyen;
		$description_t="Kênh thông tin bất động sản ".$tenhuyen." ".$tenquan." mua bán nhà đất, địa ốc, mua bán, rao vặt, mua nhà, bán nhà, cho thuê, cần thuê, nhà phố, chung cư, biệt thự, căn hộ, dự án, nhà xưởng." .$row_rs_tit['description'];
		
		$keywords_t ="nha dat"." ".$tenphuong_kd." ".$tenhuyen_kd." ".$tenquan_kd.", ". "bat dong san"." ".$tenphuong_kd." ".$tenhuyen_kd." ".$tenquan_kd.", ". "dia oc"." ".$tenphuong_kd." ".$tenhuyen_kd." ".$tenquan_kd.", ". "mua nha"." ".$tenphuong_kd." ".$tenhuyen_kd." ".$tenquan_kd.", ".  " ban nha"." ".$tenphuong_kd." ".$tenhuyen_kd." ".$tenquan_kd.", ".  "cho thue nha"." ".$tenphuong_kd." ".$tenhuyen_kd." ".$tenquan_kd.", ". "can thue nha"." ".$tenphuong_kd." ".$tenhuyen_kd." ".$tenquan_kd.", "." nha pho"." ".$tenphuong_kd." ".$tenhuyen_kd." ".$tenquan_kd.", ". " chung cu"." ".$tenphuong_kd." ".$tenhuyen_kd." ".$tenquan_kd.", ". " biet thu"." ".$tenphuong_kd." ".$tenhuyen_kd." ".$tenquan_kd.", ". " can ho"." ".$tenphuong_kd." ".$tenhuyen_kd." ".$tenquan_kd.", ". " du an"." ".$tenphuong_kd." ".$tenhuyen_kd." ".$tenquan_kd.", ". "nha xuong"." ".$tenphuong_kd." ".$tenhuyen_kd." ".$tenquan_kd.",".$row_rs_tit['keyword'];
	}
	
	
   //////////++++++++Nhu Cầu Tag  Siêu thị địa  ốc++++++++++++ /////////////////
	
	
//Nhu Cầu
	elseif($_GET['act']=='nhucau'){
		//http://www.batdongsanabc.vn/binh-duong/thi-xa-di-an/phuong-dong-hoa/nha-dat-ban.html
		$cate=$_GET['nhucau'];
 
		$catebds=get_field('tbl_rv_category','subject',$_GET['nhucau'],'name');
		
		$tenhuyen=get_field('tbl_quanhuyen','subject',$_GET['huyen'],'name');
		$tenquan=get_field('tbl_quanhuyen_category','subject',$_GET['quan'],'name');;
		$tenhuyen_kd=cat_kytu_dacbiet($tenhuyen,1,1,0,0,1);
		$tenquan_kd=cat_kytu_dacbiet($tenquan,1,1,0,0,1);
		$catebds_kd=cat_kytu_dacbiet($catebds,1,1,0,0,1);

		$title_t    = get_field('tbl_quanhuyen_category','subject',$_GET['quan'],'name')." › ".get_field('tbl_quanhuyen','subject',$_GET['huyen'],'name')." › ".$catebds;
		
	    $description_t="".$tenquan." › ".$tenhuyen." › ".$catebds." vị trí đẹp, chi phí hợp lý lý, đủ các loại diện tích, hướng đông, bắc tây nam, đáp ứng mọi nhu cầu của khách hàng".$row_rs_tit['description'];
		
		$keywords_t ="".$catebds_kd." mat tien"." , ".$catebds_kd." pho" ." , ".$catebds_kd." biet thu" ." , ".$catebds_kd." villa" ." , ".$catebds_kd." xuong" ." , ".$catebds_kd." kho bai" ." , ".$catebds_kd." trong hem"  ." , ".$catebds_kd.$row_rs_tit['keyword'];
	}
	
	
	///////////////////////+++++++++++++++++++++++++++++++++++++++++++++/////////////////////////
	
		///////////////////////++++++++Tag loại nhà++++++++++++/////////////////////////
	elseif($_GET['act']=='bds'){
		$cate=$_GET['nhucau'];
		$catebds=get_field('tbl_rv_category','subject',$_GET['nhucau'],'name'); 
		
		$tenhuyen=get_field('tbl_quanhuyen','subject',$_GET['huyen'],'name');
		$tenquan=get_field('tbl_quanhuyen_category','subject',$_GET['quan'],'name');;
		$tenhuyen_kd=cat_kytu_dacbiet($tenhuyen,1,1,0,0,1);
		$tenquan_kd=cat_kytu_dacbiet($tenquan,1,1,0,0,1);
		$catebds_kd=cat_kytu_dacbiet($catebds,1,1,0,0,1);
		$loainha=cat_kytu_dacbiet(get_field('tbl_rv_category','subject',$_GET['bds'],'name'),1,1,0,0,1);

        
		$title_t    = get_field('tbl_quanhuyen_category','subject',$_GET['quan'],'name')." › ".get_field('tbl_quanhuyen','subject',$_GET['huyen'],'name')." › ".$catebds." › ".get_field('tbl_rv_category','subject',$_GET['bds'],'name');
	    $description_t="".$tenquan." › ".$tenhuyen." › ".$catebds." › ".get_field('tbl_rv_category','subject',$_GET['bds'],'name'). " vị trí đẹp, chi phí hợp lý lý, đủ các loại diện tích, hướng đông, bắc tây nam, đáp ứng mọi nhu cầu của khách hàng";
		
		$keywords_t ="".$row_rs_tit['keyword']."".$loainha." dep "." , " .$loainha." re" ." , " .$loainha." vi tri thuan loi"." , ".$loainha." huong dong"." , ".$loainha." huong bac" ." , ".$loainha." huong tay" ." , ".$loainha." huong nam" ." , ".$loainha." dong nam" ." , ".$loainha." dong bac" ." , ".$loainha." tay bac";
	}
	
	// Tag
	elseif($_GET['act']=='tags'){
		$tagcontent=$_GET['tagcontent']; 
		$tagcontent = str_replace("-", " ", $tagcontent);
		$cate=$_GET['cate'];
		
		$row_sanpham    = getRecord('tbl_rv_category', "subject='".$cate."'");// tag nhu cau
		
		if($row_sanpham['id']>0) {
			$title_t="Nhu cầu ".$row_sanpham['name']." ".$tagcontent;
			$description_t="Nhu cầu ".$row_sanpham['name'] .$tagcontent. " giá cả hợp lý, vị trí đẹp, đường rộng, nhiều diện tích khác nhau, hướng đông, tây, nam, bắc, có nhu cầu thuê " .$tagcontent. " vui lòng liên hệ..";
			$keywords_t   =$row_title_lap['keywords']; 
			
		}
		elseif($cate=='nha-dat-cho-thue') { 
			$title_t="Nhu cầu cho thuê ".$tagcontent;
			$description_t="Nhu cầu cho thuê " .$tagcontent. " giá cả hợp lý, vị trí đẹp, đường rộng, nhiều diện tích khác nhau, hướng đông, tây, nam, bắc, có nhu cầu thuê " .$tagcontent. " vui lòng liên hệ..";
			$keywords_t   =$row_title_lap['keywords']; 
		}
		
		if($cate=='tin-tuc') { 
			$title_t="Tin tức ".$tagcontent;
			$description_t=$tagcontent;
			$keywords_t   =$row_title_lap['keywords']; 
		}
		elseif($cate=='du-an') { 
			$title_t="Dự án ".$tagcontent;
			$description_t=$tagcontent;
			$keywords_t   =$row_title_lap['keywords']; 
		}
		elseif($cate=='doanh-nghiep') { 
			$title_t="Doanh nghiệp ".$tagcontent;
			$description_t=$tagcontent;
			$keywords_t   =$row_title_lap['keywords']; 
		}
		elseif($cate=='tat-ca') { 
			$title_t="Tìm tất cả ".$tagcontent;
			$description_t=$tagcontent;
			$keywords_t   =$row_title_lap['keywords']; 
		}
	  
	}
	elseif($_GET['act']=='sieuthidiaoc'){
		$title_t      =" Siêu thị địa ốc ";
	    $description_t="Nơi đăng tin quảng cáo mua bán bất động sản Khách Sạn, Biệt thự, Nhà phố, Nhà tạm, Văn phòng, Căn hộ chung cư, Căn hộ cao cấp, Đất dự án, Đất thổ cư, Đất cho sản xuất, Đất nông nghiệp, Đất lâm nghiệp, Nhà Kho  Xưởng, Mặt bằng, Cửa hàng, Phòng trọ";
		$keywords_t   ="Khach san, nha pho, biet thu, nha tam, van phong, can ho chung cu, can ho cao cap, dat du an, dat quy hoach, dat tho cu, dat san xuat, dat nong nghiep, nha kho, nha xuong, phong tro"; 
	}
	elseif($_GET['act']=='tinnhadat'){
		$title_t      =" Tin tức nhà đất";
	    $description_t="Cập nhập tin tức mới nhất về thị trường nhà đất, dự án bất động sản, chính sách quy hoạch những vấn đề liên quan tới nhà đất tại Việt Nam";
		$keywords_t   ="tin tuc nha dat, du an bat dong san, chinh sach quy hoach, nha dat, bat dong san"; 
	}
	elseif($_GET['act']=='duan'){
		$title_t      ="Dự án bất động sản";
	    $description_t="Thư viện tổng hợp các dự án nhà đất, khu đô thị, dự án cao ốc văn phòng, dự án khu căn hộ cao cấp, dự án khu du lịch nghỉ dưỡng, dự án khu công nghiệp, dự án nhà ở, dự án xây dựng có liên quan";
		$keywords_t   ="du an nha dat, du an cao oc, du an khu can ho cao cap, du an khu du lich, du an khu cong nghiep, du an nha o"; 
	}
	elseif($_GET['act']=='doanhnghiep'){
		$title_t      =" Nhà môi giới ";
	    $description_t="Chuyên trang tổng hợp danh bạ công ty giao dịch mua bán bất động sản, dịch vụ tư vấn, môi giới nhà đất bất động sản đứng đầu tại việt nam";
		$keywords_t   ="Danh ba cong ty, cong ty bat dong san, dich vu tu van, tu van bat dong san, mo gio"; 
	}
	elseif($_GET['act']=='video'){
		$title_t      =" Video dự án";
	    $description_t="Giới thiệu ".$row_title_lap['description'];
		$keywords_t   =$row_title_lap['keywords']; 
	} 
	elseif($_GET['act']=='addbds'){
		$title_t      =" Đăng tin bất động sản";
	    $description_t="Chào mừng bạn đến với trang đăng tin bất động sản trên website www.batdongsanabc.vn bạn muốn bán nhà, cho thuê, sang nhượng cửa hàng, bạn hãy điền vào fom đăng tin dưới để thông tin của bạn được hiển thị trên website";
		$keywords_t   =$row_title_lap['keywords']; 
	} 
	elseif($_GET['act']=='editbds'){
		$title_t      ="Sửa tin đăng bất động sản";
	    $description_t="Chào mừng bạn đến với trang sửa tin đăng bất động sản trên website www.batdongsanabc.vn bạn những thông tin còn thiếu hay chưa đúng bạn hãy sửa trực tiếp trên fom và nhấn chấp nhận";
		$keywords_t   =$row_title_lap['keywords']; 
	} 
	elseif($_GET['act']=='addda'){
		$title_t      =" Đăng dự án  bất động sản";
	    $description_t="Chào mừng bạn đến với trang đăng tin bất động sản trên website www.batdongsanabc.vn bạn muốn bán nhà, cho thuê, sang nhượng cửa hàng, bạn hãy điền vào fom đăng tin dưới để thông tin của bạn được hiển thị trên website";
		$keywords_t   =$row_title_lap['keywords']; 
	} 
	elseif($_GET['act']=='editda'){
		$title_t      ="Sửa thông tin dự án bất động sản";
	    $description_t="Chào mừng bạn đến với trang sửa tin đăng bất động sản trên website www.batdongsanabc.vn bạn những thông tin còn thiếu hay chưa đúng bạn hãy sửa trực tiếp trên fom và nhấn chấp nhận";
		$keywords_t   =$row_title_lap['keywords']; 
	}
	elseif($_GET['act']=='adddn'){
		$title_t      =" Đăng thông tin doanh nghiệp";
	    $description_t="Chào mừng bạn đến với trang đăng tin bất động sản trên website www.batdongsanabc.vn bạn muốn bán nhà, cho thuê, sang nhượng cửa hàng, bạn hãy điền vào fom đăng tin dưới để thông tin của bạn được hiển thị trên website";
		$keywords_t   =$row_title_lap['keywords']; 
	} 
	elseif($_GET['act']=='editdn'){
		$title_t      ="Sửa thông tin doanh nghiệp";
	    $description_t="Chào mừng bạn đến với trang sửa tin đăng bất động sản trên website www.batdongsanabc.vn bạn những thông tin còn thiếu hay chưa đúng bạn hãy sửa trực tiếp trên fom và nhấn chấp nhận";
		$keywords_t   =$row_title_lap['keywords']; 
	}
	elseif($_GET['act']=='manage'){
		$title_t      ="Quản lý tin đăng";
	    $description_t="Chào mừng bạn đến với trang sửa tin đăng bất động sản trên website www.batdongsanabc.vn bạn những thông tin còn thiếu hay chưa đúng bạn hãy sửa trực tiếp trên fom và nhấn chấp nhận";
		$keywords_t   =$row_title_lap['keywords']; 
	}
	elseif($_GET['act']=='forgetpass'){
		$title_t      ="Tìm lại mật khẩu";
	    $description_t="Chào mừng bạn đến với trang sửa tin đăng bất động sản trên website www.batdongsanabc.vn bạn những thông tin còn thiếu hay chưa đúng bạn hãy sửa trực tiếp trên fom và nhấn chấp nhận";
		$keywords_t   =$row_title_lap['keywords']; 
	}
	elseif($_GET['act']=='video_detail'){
		$name=$_GET['name'];

		$row_rs_tit=$row_rs_tit=getRecord('tbl_rv_video', "subject='".$name."'");
		
		$title_t    =$row_rs_tit['title']!='' ? $row_rs_tit['title'] : $row_rs_tit['name'];
	    $description_t=$row_rs_tit['description']!='' ? $row_rs_tit['description'] : $row_rs_tit['name'];
		$keywords_t =$row_rs_tit['keyword']!='' ? $row_rs_tit['keyword'] : $row_rs_tit['keyword'];
	}
	elseif($_GET['act']=='lienhe'){
		$title_t      ="Liên hệ với chúng tôi";
	    $description_t="Chúng tôi luôn rất vui được nghe ý kiến của bạn và có nhiều cách khác nhau để bạn có thể liên hệ với chúng tôi.".$row_title_lap['description'];
		$keywords_t   ="lien he, gop y, gop y bat dong san, bat dong san".$row_title_lap['keywords'];
	}
	elseif($_GET['act']=='contact'){
		$title_t    ="Liên hệ với chúng tôi";
	    $description_t="Chúng tôi luôn rất vui được nghe ý kiến của bạn và có nhiều cách khác nhau để bạn có thể liên hệ với chúng tôi cách đơn giản nhất là bạn có thể điền vào fom thông tin bên dưới và liên hệ với chúng tôi";
		$keywords_t =$row_title_lap['keywords'];	
	}
	elseif($_GET['act']=='dangky'){
		$title_t    ="Đăng ký tài khoản trên website www.batdognsanabc.vn";
	    $description_t="Chào mừng bạn đến với trang đăng ký tài khoản trên website www.batdongsanabc.vn để được là thành viên chính thức của chúng tôi bạn hãy nhập thông tin đăng ký để là thành viên chính thức";
		$keywords_t =$row_title_lap['keywords'];	
	}
	elseif($_GET['act']=='dangnhap'){
		$title_t    ="Đăng nhập tài khoản trên website www.batdongsanabc.vn";
	    $description_t="Chào mừng bạn đến với trang đăng nhập tài khoản trên website www.batdongsanabc.vn bạn vui lòng điền thông tin đăng nhập để sử dụng chức năng quảng cáo đăng tin bất động sản trên website ";
		$keywords_t =$row_title_lap['keywords'];	
	}
	elseif($_GET['act']=='page404'){
		$title_t    ="Lỗi không tìm thấy".' - '.$row_title_lap['title'];;
	    $description_t=$row_title_lap['description'];
		$keywords_t =$row_title_lap['keywords'];	
	}
	else{
		$title_t=$row_title_lap['title'];
		$description_t=$row_title_lap['description'];
		$keywords_t=$row_title_lap['keywords'];	
	}
?>
<title><?php echo $title_t ;?></title>
<meta name="description" content="<?php echo $description_t ;?>" />
<meta name="keywords" content="<?php echo $keywords_t ;?>" />