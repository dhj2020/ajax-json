<?php
require_once('connect.php');

$last = $_POST['last'];
$amount = $_POST['amount'];

$query=mysql_query("select * from dhj2020 order by id desc limit $last,$amount");

while ($row=mysql_fetch_array($query)) { 
    $arr[] = array( 
        'content'=>$row['remark'], 
        'author'=>$row['uid'], 
        'date'=>date('m-d H:i',$row['regdate']) 
    ); 
} 
echo json_encode($arr);  //转换为json数据输出


?>