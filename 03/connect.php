<?php

$conn=@mysql_connect("localhost","root","dhj525") or die("数据库连接出错！"); //连接本地或网站数据库
mysql_select_db("dhj2020",$conn) or die("数据库打开出错！");  //打开数据库
mysql_query("SET names UTF8");
$timezone="Asia/Shanghai";

header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set($timezone); //北京时间

?>
