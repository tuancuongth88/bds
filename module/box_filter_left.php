<div class="block_sb">
    <h4 class="t_sb">
        <span>
           Tìm kiếm nhanh
        </span>
    </h4><!-- End .t_sb -->
    <div class="m_sb">
    
        <div class="slx_ttp">
            <style type="text/css">
                .slx_ttp {background: #FCFCFC; padding: 10px;}
                .slx_ttp span.customSelect {background-color: #fff !important;}
				.styled {
					background: none repeat scroll 0 0 #f9f9f9;
					border: 1px solid #ddd;
					padding: 2px;
					margin:2px 0 2px 0;
				}
            </style>
 
            <script>
			$(document).ready(function() {
				$("#tinh").select2();$("#huyen").select2();$("#phuong").select2();$("#duong").select2(); 
				$("#loai").select2();$("#ddCat").select2();
				$("#tinh").select2();$("#huyen").select2();$("#phuong").select2();$("#duong").select2(); 
				$("#loai").select2();$("#ddCat").select2(); $("#price").select2(); $("#dientich").select2(); 
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
            <form action="<?php echo $linkrootbds ;?>tim-bds.html" method="POST" enctype="multipart/form-data" >
            <ul>
                <li>
                    <select name="tinh" id="tinh"  class="styled"  > <?=$idtinh?>
                        
                            <option value=""> Chọn thành phố </option> 
                            
                            <?php   
                            $cate=get_records("tbl_quanhuyen_category"," ","sort ASC"," "," ");
                            while ($row=mysql_fetch_assoc($cate)){?>
                            <option value="<?php echo $row['subject']; ?>"  <?php if($idtinh==$row['id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option> 
                            <?php } ?>
                        
                        </select>
                </li>
                <li>
                    <select name="huyen" id="huyen"  class="styled"  > 
                    	 
                    	<option value=""> Chọn Quận / Huyện </option> 
                    	<?php if($idquan>0) {?>
                        <?php   
                            $cate=get_records("tbl_quanhuyen","parent='".$idtinh."'","sort ASC"," "," ");
                            while ($row=mysql_fetch_assoc($cate)){?>
                            <option value="<?php echo $row['subject']; ?>"  <?php if($idquan==$row['id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option> 
                            <?php } ?>
                        <?php }?>
                    </select>
                </li>
                <li>
                    <select name="phuong" id="phuong"  class="styled"  > 
                    
                        <option value="">Chọn Phường / Xã</option> 
                    	<?php if($idphuong>0) {?>
                        <?php   
                            $cate=get_records("tbl_phuongxa","parent='".$idquan."'","sort ASC"," "," ");
                            while ($row=mysql_fetch_assoc($cate)){?>
                            <option value="<?php echo $row['subject']; ?>"  <?php if($idphuong==$row['id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option> 
                            <?php } ?>
                        <?php }?>
                    </select>
                </li>
                <li>
                <select name="duong" id="duong"  class="styled"  > 
                
                	<option value="">Chọn đường</option> 
                    <?php if($idstreet>0) {?>
					<?php   
                    $cate=get_records("tbl_street","parent='".$idquan."'","sort ASC"," "," ");
                    while ($row=mysql_fetch_assoc($cate)){?>
                    <option value="<?php echo $row['subject']; ?>"  <?php if($idstreet==$row['id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option> 
                    <?php } ?> 
                    <?php }?>
                </select>
                </li>
                <li>
                    <select name="loai" id="loai" class="styled"  >
                    
                        <option value="">Chọn nhu cầu</option>   
                        <?php
                        $cate=get_records("tbl_rv_category"," parent=2 and cate=0","id DESC"," "," ");
                        while($row_cate=mysql_fetch_assoc($cate)){
                        ?>
                        <option value="<?=$row_cate['subject']?>" <?php if($idnhucau==$row_cate['id']) echo 'selected="selected"'; ?> >  <?=$row_cate['name']?></option>  
                        <?php }?>
                                   
                    </select>
                </li>
                <li>
                    <select name="ddCat" id="ddCat" class="styled" > 
                    
                        <option value="">Chọn hình thức</option>  
                        <?php if($idloai>0) {?>
                        <?php
                        $cate=get_records("tbl_rv_category"," parent='".$idnhucau."' and cate=0","id DESC"," "," ");
                        while($row_cate=mysql_fetch_assoc($cate)){
                        ?>
                        <option value="<?=$row_cate['subject']?>" <?php if($idloai==$row_cate['id']) echo 'selected="selected"'; ?> >  <?=$row_cate['name']?></option>  
                        <?php }?>
                        <?php }?>
                    </select>
                </li>
                <li>
                    <select id="price" name="price" class="styled" >
                        <option value="">Chọn giá</option>
                        <option value="nho-hon-500-trieu" <?php if($giat=="nho-hon-500-trieu") echo 'selected="selected"'; ?>> < 500 triệu </option>
                        <option value="800-trieu-den-1-ti" <?php if($giat=="800-trieu-den-1-ti") echo 'selected="selected"'; ?>>800 - 1 tỉ</option>
                        <option value="1-den-3-ti" <?php if($giat=="1-den-3-ti") echo 'selected="selected"'; ?>>1-3 tỉ</option>
                        <option value="4-den-5-ti" <?php if($giat=="4-den-5-ti") echo 'selected="selected"'; ?>>4-5 tỉ</option>
                        <option value="6-den-9-ti" <?php if($giat=="6-den-9-ti") echo 'selected="selected"'; ?>>6-9 tỉ</option>
                        <option value="lon-hon-10-ti" <?php if($giat=="lon-hon-10-ti") echo 'selected="selected"'; ?>> >10 tỉ</option>
                    </select>
                </li>
                <li>
                    <select name="dientich" id="dientich" class="styled" > 
                        <option value=""> Chọn diện tích </option> 
                        <option value="nho-hon-30-m2" <?php if($dienticht=="nho-hon-30-m2") echo 'selected="selected"'; ?>> < 30 m2 </option>
                        <option value="30-50-m2" <?php if($dienticht=="30-50-m2") echo 'selected="selected"'; ?>> 30 - 50 m2 </option>
                        <option value="50-80-m2" <?php if($dienticht=="50-80-m2") echo 'selected="selected"'; ?>> 50 - 80 m2 </option>
                        <option value="80-100-m2" <?php if($dienticht=="80-100-m2") echo 'selected="selected"'; ?>> 80 - 100 m2 </option>
                        <option value="100-150-m2" <?php if($dienticht=="100-150-m2") echo 'selected="selected"'; ?>> 100 - 150 m2 </option>
                        <option value="150-200-m2" <?php if($dienticht=="150-200-m2") echo 'selected="selected"'; ?>> 150 - 200 m2 </option>
                        <option value="200-250-m2" <?php if($dienticht=="200-250-m2") echo 'selected="selected"'; ?>> 200 - 250 m2 </option>
                        <option value="250-300-m2" <?php if($dienticht=="250-300-m2") echo 'selected="selected"'; ?>> 250 - 300 m2 </option>
                        <option value="lon-hon-300m2" <?php if($dienticht=="lon-hon-300m2") echo 'selected="selected"'; ?>> > 300 m2 </option>
                    </select>
                </li>
            </ul>
            
            <div style="text-align: right; padding-top: 7px;">
            	<input type="hidden" name="guitin"  value="guitin"/>
                <input id="timbds" name="timbds" class="btn_Search" type="submit" value="Tìm kiếm">
            </div>
            </form>
        </div>
    
    </div><!-- End .m_sb -->
</div>