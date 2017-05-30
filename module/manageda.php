 <?php 
	$iduser= $_SESSION['kh_login_id'];
	if($iduser=="")   header("location:".$linkrootbds);
 
	$pageSize = 5;
	$totalRows = 0;
	$xeptheo='id';
	$dem=1;
	
	$kkk="1";
	if(isset($_SESSION['filter1'])) {
		$xapxep=$_SESSION['filter1'];
		if($xapxep==" id DESC") $kkk="1";
		elseif($xapxep==" price ASC") $kkk="2";
		elseif($xapxep==" price DESC") $kkk="3";
	}
	else $xapxep="id DESC";
	
	settype($pageSize,"int");

	settype($totalRows,"int");
	settype($dem,"int");
	

	if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
	if ($pageNum<=0) $pageNum=1;
	$startRow = ($pageNum-1) * $pageSize;
	

     $totalRows = countRecord("tbl_rv_item"," cate=2 and  iduser=$iduser"); 
	 //echo "status=1 $chuoit AND parent in ({$parent}) order by $xapxep limit ";
	$bds=get_records("tbl_rv_item"," cate=2 and iduser=$iduser  order by $xapxep limit ".$startRow.",".$pageSize," "," "," ");	

?>
<div class="breacrum">
    <ul>
        <li>
            <a href="<?php echo $linkrootbds?>" title="Trang chủ">Trang chủ</a>
        </li>
 
        <li>
           	Quản lý tin đăng dự án
        </li>
       
    </ul>
</div>
 
<div class="f_cont clearfix">

    <article class="content">
         
        <div class="f-qldh">
            <table>
                <thead>
                    <tr>
                        <td width="6%" align="center">STT</td>
                        <td width="46%">Thông tin</td>
                        <td width="11%" align="center">Loại</td>
                        <td width="8%" align="center">Ngày</td>
                        <td width="12%" align="center">Trạng thái</td>
                        <td width="17%" align="center">Tool</td>
                    </tr>
                </thead>
                <tbody>
					<?php 
                    //$bds=get_records("tbl_rv_item","status=1","sort ASC"," "," ");
					$i=1;
                    while($row_bds=mysql_fetch_assoc($bds)){ 
                    
                    ?>
                    <tr>
                        <td align="center"><?php echo $i; $i++;?></td>
                        <td width="46%">
                            <h4 class="name_qldh">
                                <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                	<?php echo $row_bds['name'];?>
                                </a>
                            </h4>
                            <ul class="info_qldh">
                            	<li>
                                     <?=get_field('tbl_rv_category','id',$row_bds['parent'],'name');?>
                                </li>
                                <li>
                                    Vị trí:  <?=get_field('tbl_quanhuyen_category','id',$row_bds['idcity'],'name');?>
                                </li>
                                <li>
                                   Số quan tâm:  <?php echo  $row_bds['view'] ;?> người
                                </li>
                            </ul>
                        </td>
                        <td align="center">
                        
                        	<?php if($row_bds['cate']==0) echo "Rao vặt";elseif($row_bds['cate']==2) echo "Dự án";elseif($row_bds['cate']==3) echo "Doanh nghiệp";?>
                        </td>
                        <td align="center">
                        	<?php echo  date("H", strtotime($row_bds['date_added']));?>h <br /> 
                        	<?php echo  date("d-m-Y", strtotime($row_bds['date_added']));?> 
                        </td>
                        <td align="center">Đã duyệt</td>
                        <td align="center">
                            <a href="<?php echo $linkrootbds?><?php if($row_bds['cate']==0) echo "sua-tin";elseif($row_bds['cate']==2) echo "sua-du-an";elseif($row_bds['cate']==3) echo "sua-doanh-nghiep";?>/<?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                <img src="<?php echo $linkrootbds?>imgs/layout/sua.png" alt="">
                            </a>
                              <a href="<?php echo $linkrootbds?>xoa-tin/<?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>" onclick="return confirm('Bạn có muốn xoá luôn không ?');">
                                <img src="<?php echo $linkrootbds?>imgs/layout/xoa.png" alt="">
                            </a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div><!-- End .f-qldh -->
                        
        <div class="page">
            <div class="PageNum">
				<?php  
                echo pagesLinks_new_full_2013($totalRows, $pageSize , "","p","page-quan-ly-tin-dang-du-an");
                ?>
            </div>
            <div class="clear"></div>
        </div><!-- End .page --> 
         
    </article><!-- End .content -->
   
    <div class="sidebar">
        
        <div class="block_sb">
            <h4 class="t_sb">
                <span>
                    Danh mục quản lý
                </span>
            </h4><!-- End .t_sb -->
            <div class="m_sb">
            
                <div class="m_dmql">
                
                    <ul>
                        <li <?php if($frame=="manage") echo 'class="active"';?> >
                            <a href="<?php echo $linkrootbds?>quan-ly-tin-dang.html" title="Quản lý tin bất động sản">Quản lý tin bất động sản</a>
                        </li>
                        <li <?php if($frame=="manageda") echo 'class="active"';?>  >
                            <a href="<?php echo $linkrootbds?>quan-ly-tin-dang-du-an.html" title="Quản lý tin đăng dự án">Quản lý tin đăng dự án</a>
                        </li>
                        <li <?php if($frame=="managedn") echo 'class="active"';?> >
                            <a href="<?php echo $linkrootbds?>quan-ly-tin-dang-doanh-nghiep.html" title="Quản lý tin doanh nghiệp">Quản lý tin doanh nghiệp</a>
                        </li>
                    </ul>
                    
                </div><!-- End .m_dmql -->
            
            </div><!-- End .m_sb -->
        </div><!-- End .block_sb -->
        
        <div class="block_sb">
            <h4 class="t_sb">
                <span>
                   Thông tin công ty
                </span>
            </h4><!-- End .t_sb -->
            <div class="m_sb">
            
                <div class="m_dmql">
                
                    <ul>
                        <li <?php if($frame=="manage") echo 'class="active"';?> >
                            <a href="<?php echo $linkrootbds?>tuyen-dung.html" title="Tuyển dụng nhân sự" target="_blank">Tuyển dụng nhân sự</a>
                        </li>
                        <li <?php if($frame=="manageda") echo 'class="active"';?>  >
                            <a href="<?php echo $linkrootbds?>hop-tac-doi-tac.html" title="Cơ hội giao thương" target="_blank"> Cơ hội giao thương</a>
                        </li>
                        <li <?php if($frame=="managedn") echo 'class="active"';?> >
                            <a href="<?php echo $linkrootbds?>huong-dan-dang-tin.html"  title="Hướng dẫn đăng tin" target="_blank">Hướng dẫn đăng tin</a>
                        </li>
                        <li <?php if($frame=="managedn") echo 'class="active"';?> >
                            <a href="<?php echo $linkrootbds?>quy-dinh-dang-tin.html" title="Quy định đăng tin" target="_blank">Quy định đăng tin</a>
                        </li>
                    </ul>
                    
                </div><!-- End .m_dmql -->
            
            </div><!-- End .m_sb -->
        </div>  <!-- Thông tin -->
        
    </div>
    
 
    
</div><!-- End .f_cont -->