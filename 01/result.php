<?php
$host="localhost";
$db_user="root";
$db_pass="dhj525";
$db_name="dhj2020";
$timezone="Asia/Shanghai";

$link=mysql_connect($host,$db_user,$db_pass);
mysql_select_db($db_name,$link);
mysql_query("SET names UTF8");

header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set($timezone); //北京时间


$sql = "select *from `dhj2020`";  //首先自定义一个查询变量"$sql"
$a=mysql_query($sql,$conn);  //自定义一个变量"$a",作为执行查询的返回值

 


$page = intval($_GET['page']);  //获取请求的页数 
$start = $page*4; 


$query=mysql_query("select * from dhj2020 order by id desc limit $start,4"); 

while ($row=mysql_fetch_array($query)) { 
    $arr[] = array( 
        'content'=>$row['remark'], 
        'author'=>$row['uid'], 
        'date'=>date('m-d H:i',$row['regdate']) 
    ); 
} 
echo json_encode($arr);  //转换为json数据输出
	
	 
?>