<?php
include('../../config.php');
require("../../common_start.php");
include("../../lib/func.lib.php");

if(isset($_GET['id']))
{
   $id=$_GET['id'];
 if($_GET['idspcon'])$id=$_GET['idspcon'];    

?>

<script language='javascript'>
    $(document).ready(function(){
		 $('#txtNoiDung').val('');
        $('#btnComment').click(function(){
            
            if($('#txtNoiDung').val() == "")
            {
                alert('Nhập vào nội dung');
                $('#txtNoiDung').focus();
                return false;
            }
            var kiemtra = 0; 
            $.ajax({
                url:"<?php echo $linkrootbds?>module/add_comment_ajax.php",
                type:"GET",
                data: "id="+$(this).attr('idsp')+"&&top=0"+"&&content="+$('#txtNoiDung').val(),
                success:function(){
                    kiemtra = 1;
					
                }
            })
            
            
            $.ajax({
                url:"<?php echo $linkrootbds?>module/get_comment.php",
                type:"GET",
                data:"id="+$(this).attr('idsp')+"&&content="+$('#txtNoiDung').val(),
                success:function(data){
                    $('.nd_cmt').html(data);
					$('#txtNoiDung').val("");
                }
            })
            
            
        })
		
		
		$('.btnCommentChi').click(function(){
           
		   var valtt=$(this).attr('vall'); 
            if($('#txtNoiDungChi'+valtt).val() == "")
            {
                alert('Nhập vào nội dung');
                $('#txtNoiDungChi'+valtt).focus();
                return false;
            }
        
			
			$.ajax({
                url:"<?php echo $linkrootbds?>module/add_comment_ajax.php",
                type:"GET",
                data: "id="+$(this).attr('idsp')+"&&top=1"+"&&content="+$('#txtNoiDungChi'+valtt).val(),
                success:function(){
                }
            })
            
  
			
			 $.ajax({
                url:"<?php echo $linkrootbds?>module/get_comment.php",
                type:"GET",
                data:"id="+$(this).attr('idsp')+"&&idspcon="+$(this).attr('idspcon'),
                success:function(data){
                    $('.nd_cmt').html(data);
                }
            })  
             $('#txtNoiDungChi'+valtt).val("");
            
        })
		
		$('.respo').click(function(){ 
			var idh=$(this).attr('vall'); 
			var valt=$(this).attr('valt');
			if(valt=="0") {
				$('#con'+idh).css({'display':'block'});
				$(this).attr('valt', '1');
				$(this).html("Đóng");
			}else{
				$('#con'+idh).css({'display':'none'});
				$(this).attr('valt', '0');
				$(this).html("Trả lời");
			}
		})
		
    })
</script>

    <ul class="ul_cmt_1">
    <?php  
    $query = mysql_query("select * from tbl_comment where parent='".$id."' and status=1 and top=0 order by id ASC");
	$i=1;
    while($row = mysql_fetch_array($query))
    {
    ?>
            
        <li>
            <span>
                <?php echo $row['content']; ?>
            </span>
            <div class="info_cmt clearfix">
                <h4>
                    <a href="#"><?=get_field('tbl_customer','id',$row['iduser'],'username');?></a> - (<?php echo $row['date_added']; ?>)
                </h4>
                 <span>
                    <a style="cursor: pointer;"  vall="<?php echo $row['id']; ?>"  class="respo" valt="0">Trả lời</a>
                </span> 
            </div><!-- End .info_cmt -->
            <div class="repply_cmt"  style="display:none;"  id="con<?php echo $row['id']; ?>" >
                    <textarea id="txtNoiDungChi<?=$i?>" name="txtNoiDungChi<?=$i?>" class="txt_cmt box-sizing-fix" placeholder="Nhập ý kiến của bạn"></textarea>
                    <span class="btn_cmt">
                    <input  class="btnCommentChi" type="submit" value="Gửi" id="btnCommentChi" name="btnCommentChi" idsp="<?php echo $row['id']; ?>" idspcon="<?php echo $id; ?>" vall="<?=$i?>">
                    </span>
            </div>
            <?php 
            $query1 = mysql_query("select * from tbl_comment where parent='".$row['id']."' and status=1 and top=1 order by id ASC");
            $dem=mysql_num_rows($query1);
            if($dem>=1){
            ?>
            <ul class="ul_cmt_2">
                <li>
                    <?php  
                    
                    while($row1 = mysql_fetch_array($query1))
                    {
                    ?>
                    <span>
                        <?php echo $row1['content']; ?>
                    </span>
                    <div class="info_cmt clearfix">
                        <h4>
                            <a href="#"><?=get_field('tbl_customer','id',$row1['iduser'],'username');?></a> - (<?php echo $row['date_added']; ?>)
                        </h4>
                        <span>
                    
                        </span>
                    </div>  
                    <?php }$i++;?>
                    
        
                </li>
                 
            </ul><!-- End .ul_cmt_2 -->
            <?php }?>
        </li>
    <?php
    }
    ?>
    </ul>
        
<?php }?>