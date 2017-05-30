<style>
<!--
#foot {
	clear: both;
	float: none;
	height: auto;
	width: 100%;
	text-align: center;
	font-size: 12px;
	color: #FFF;
	padding-top: 20px;
	padding-bottom: 20px;
	border-top-width: 3px;
	border-top-style: solid;
	border-top-color: #CCC;
}
#foot .copy {
	font-size: 14px;
	font-weight: bold;
	color: #FFF;
}
#foot .leminh {
	font-size: 12px;
	font-weight: bold;
	color: #FF0;
}
#foot .leminh a{
	font-size: 12px;
	font-weight: bold;
	color: #FF0;
	text-decoration: none;
}
#foot .leminh a:hover{
	color: #FFF;
	text-decoration: underline;
}
-->
</style>
<div id="foot">
	<?php 
		$foot=get_records("tbl_config","id=1"," "," "," ");
		$row_foot=mysql_fetch_assoc($foot);
	?>	
  <span class="copy">Công ty TNHH Tư vấn & Đào tạo Internet Marketing Binh Duong Micro</span><br />
        <strong>Địa chỉ :</strong>99/1/1 Khu 2 Phú Lợi, Thủ Dầu Một, Bình Dương<br />
  		<strong>Điện thoại :</strong>- 0945 771982 &nbsp;&nbsp;
  		<span><strong>Hotline :</strong> - 0945 771982<br />
        <strong>Email :</strong>  - mr.khongnoiduoc@gmail.com<br /> 
        <strong>Fax :</strong> - 0945 771982<br />
</div><!--foot -->