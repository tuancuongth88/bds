<div class="bs_1 box-sizing-fix">
     	<script>
		$(document).ready(function() {
			$("#tinh").select2();$("#huyen").select2();$("#phuong").select2();$("#duong").select2(); 
			$("#loai").select2();$("#ddCat").select2();
			$("#tinh").select2();$("#huyen").select2();$("#phuong").select2();$("#duong").select2(); 
			$("#loai").select2();$("#ddCat").select2();  
			$("#tinh").change(function(){ 
				var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
				var table="tbl_quanhuyen";
				var tablep="tbl_quanhuyen_category";
				$("#huyen").load("<?php echo $linkrootbds?>module/getChildSubject.php?table="+ table+ "&tablep=" +tablep + "&id=" +id); //alert(idthanhpho)
			});
			$("#huyen").change(function(){ 
				var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
				var table="tbl_street";
				var tablep="tbl_quanhuyen";
				$("#duong").load("<?php echo $linkrootbds?>module/getChildSubject.php?table="+ table+ "&tablep=" +tablep + "&id=" +id); //alert(idthanhpho)
			});
			$("#huyen").change(function(){ 
				var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
				var table="tbl_phuongxa";
				var tablep="tbl_quanhuyen";
				$("#phuong").load("<?php echo $linkrootbds?>module/getChildSubject.php?table="+ table+ "&tablep=" +tablep + "&id=" +id); //alert(idthanhpho)
			});
			$("#loai").change(function(){ 
				var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
				var table="tbl_rv_category";
				var tablep="tbl_rv_category";
				$("#ddCat").load("<?php echo $linkrootbds?>module/getChildSubject.php?table="+ table+ "&tablep=" +tablep + "&id=" +id); //alert(idthanhpho)
			});
		});
		</script>   
        <h4 class="t_bs t_bs1">
            <span>Tìm kiếm bất động sản</span>
        </h4><!-- End .t_bs -->
        
        <div class="m_bs">
        	<form action="<?php echo $linkrootbds ;?>tim-bds.html" method="POST" enctype="multipart/form-data" >
            	<div class="search_bs">
                <style>
				.styled {
					background: none repeat scroll 0 0 #f9f9f9;
					border: 1px solid #ddd;
					padding: 2px;
				}
				</style>
                    <ul>
                        <li> 
                            <select name="tinh" id="tinh"  class="styled"  > 
                            
                                <option value=""> Chọn thành phố </option> 
                                
                                <?php   
                                $cate=get_records("tbl_quanhuyen_category"," ","sort ASC"," "," ");
                                while ($row=mysql_fetch_assoc($cate)){?>
                                <option value="<?php echo $row['subject']; ?>"  <?php if($_SESSION['kt_thanhpho']==$row['id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option> 
                                <?php } ?>
                            
                            </select>
                        </li>
                         <li> 
                            <select name="huyen" id="huyen"  class="styled"  > 
                            
                                <option value=""> Chọn Quận / Huyện </option> 
     
                            </select>
                        </li>
                         <li> 
                            <select name="phuong" id="phuong"  class="styled"  > 
                            
                                <option value="">Chọn Phường / Xã</option> 
    
                            </select>
                        </li>
                          <li> 
                            <select name="duong" id="duong"  class="styled"  > 
                            
                                <option value=""> Chọn đường</option> 
    
                            </select>
                        </li>
                        <li>
                             <select name="loai" id="loai" class="styled"  >
                             
                                    <option value="">  Chọn nhu cầu</option>   
                                    <?php
                                    $cate=get_records("tbl_rv_category"," parent=2 and cate=0","id DESC"," "," ");
                                    while($row_cate=mysql_fetch_assoc($cate)){
                                    ?>
                                    <option value="<?=$row_cate['subject']?>">  <?=$row_cate['name']?></option>  
                                    <?php }?>
                                               
                              </select>
                        </li>
                        <li>
                            <select name="ddCat" id="ddCat" class="styled" > 
            
                                    <option value="">Chọn hình thức </option>  
                                
                              </select>
                        </li>  
                        <li class="check_3_search clearfix">
                            
                            <div class="c1_s">
                                <select name="price" class="styled" >
                                    <option value="">Chọn giá</option>
                                    <option value="nho-hon-500-trieu"> < 500 triệu </option>
                                    <option value="800-trieu-den-1-ti">800 - 1 tỉ</option>
                                    <option value="1-den-3-ti">1-3 tỉ</option>
                                    <option value="4-den-5-ti">4-5 tỉ</option>
                                    <option value="6-den-9-ti">6-9 tỉ</option>
                                    <option value="lon-hon-10-ti"> >10 tỉ</option>
                                </select>
                            </div>
                            
                            <div class="c1_s">
                               <select name="dientich" id="dientich" class="styled" style="width:169px;"  > 
                                <option value=""> Chọn diện tích </option> 
                                <option value="nho-hon-30-m2"> < 30 m2 </option>
                                <option value="30-50-m2"> 30 - 50 m2 </option>
                                <option value="50-80-m2"> 50 - 80 m2 </option>
                                <option value="80-100-m2"> 80 - 100 m2 </option>
                                <option value="100-150-m2"> 100 - 150 m2 </option>
                                <option value="150-200-m2"> 150 - 200 m2 </option>
                                <option value="200-250-m2"> 200 - 250 m2 </option>
                                <option value="250-300-m2"> 250 - 300 m2 </option>
                                <option value="lon-hon-300m2"> > 300 m2 </option>
                            </select>
                            </div>
                             
                        </li>
                        <li>
                            <input type="hidden" name="guitin"  value="guitin"/>
                            <input id="timbds" name="timbds" class="btn_Search" type="submit" value="Tìm kiếm">
                        </li>
                    </ul>
                    <div class="error-sty" style="display: none;">
                        Báo lỗi tìm kiếm
                    </div>
            	</div><!-- End .search_bs --> 
        	</form>
        </div><!-- End .m_bs -->
        
    </div><!-- End .bs_1 -->