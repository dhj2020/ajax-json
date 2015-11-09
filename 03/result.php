<?php
require_once('connect.php'); //连接数据库 
 
$page = intval($_GET['page']);  //获取请求的页数 
$start = $page*4; 
$query=mysql_query("select * from dhj2020 order by id desc limit $start,4"); 
while ($row=mysql_fetch_array($query)) { 
    $arr[] = array('content'=>$row['remark'],'author'=>$row['uid'],'date'=>$row['regdate']); 
} 
echo json_encode($arr);  //转换为json数据输出 

?>