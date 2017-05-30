<?php
header("content-type: text/xml");

require("../config.php");
require("../common_start.php");
include("../lib/func.lib.php");

$row_title_lap=getRecord('tbl_config', "id=3");

$feed=$_GET['feed'];

if($feed!="") {

 
$row_theloai_tin_index=getRecord('tbl_rv_category', "subject='".$feed."'");
 
 
if($row_theloai_tin_index['id']==""){

print '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
  <channel>
    <title>RSS news</title>
    <description>'.$row_title_lap['name'].'</description>
    <link>'.$linkrootbds.'</link>
    <copyright>'.$linkrootbds.'</copyright>
    <generator>'.$linkrootbds.'</generator>
    <pubDate>'.$ngay.'</pubDate>
    <lastBuildDate>'.$ngay.'</lastBuildDate>';

print '
           <item>
            <title>'.$row_title_lap['title'].'</title>
            <description>'.$row_title_lap['description'].'</description>
            <link>http://phpbasic.com/?php=article&amp;basic=view&amp;id='.$row_title_lap['id'].'</link>
            <pubDate>'.$ngay.'</pubDate>
        </item>
';

print '
  </channel>
</rss>
';	
}
else {

$parent=getParent("tbl_rv_category",$row_theloai_tin_index['id']);
$bds=get_records("tbl_rv_item","status=1  AND parent in ({$parent})","id DESC"," "," ");
print '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
  <channel>
    <title>RSS news</title>
    <description>'.$row_title_lap['name'].'</description>
    <link>'.$linkrootbds.'</link>
    <copyright>'.$linkrootbds.'</copyright>
    <generator>'.$linkrootbds.'</generator>
    <pubDate>'.$ngay.'</pubDate>
    <lastBuildDate>'.$ngay.'</lastBuildDate>';
while($row=mysql_fetch_assoc($bds)){
print '
           <item>
            <title>'.$row['name'].'</title>
            <description>'.$row['name'].'</description>
            <link>'.$linkrootbds.$row['subject'].'.html</link>
            <pubDate>'.$row['date_added'].'</pubDate>
        </item>
';
}
print '
  </channel>
</rss>
';
}
}else {

print '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
  <channel>
    <title>RSS news</title>
    <description>Thám tử tam long</description>
    <link>http://thamtutamlong.com</link>
    <copyright>www.thamtutamlong.com</copyright>
    <generator>thamtutamlong.com</generator>
    <pubDate>'.$ngay.'</pubDate>
    <lastBuildDate>'.$ngay.'</lastBuildDate>';

print '
           <item>
            <title>'.$rs['title'].'</title>
            <description>'.$rs['intro'].'</description>
            <link>http://phpbasic.com/?php=article&amp;basic=view&amp;id='.$rs['id'].'</link>
            <pubDate>'.$rs['date'].'</pubDate>
        </item>
';

print '
  </channel>
</rss>
';
}
?>