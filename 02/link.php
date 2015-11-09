<?php
$conn=@mysql_connect("localhost","root","dhj525")or die("数据库连接出错！"); //连接本地或网站数据库
$data="create database `dhj2020`";  //创建数据库
mysql_query($data,$conn);   //执行创建数据库
mysql_select_db("dhj2020",$conn) or die("数据库打开出错！");  //打开数据库

//在打开的数据库中插入数据表
$database="CREATE TABLE `dhj2020` (
  `id` int(10) NOT NULL auto_increment,
  `uid` varchar(10) NOT NULL default '0',
  `regdate` date NOT NULL,
  `remark` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;";

mysql_query("set names 'utf8'");   //插入数据时解决中文乱码
mysql_query($database,$conn);  //执行插入数据表


//在数据表中添加数据
$insert="INSERT INTO `dhj2020` (`id`, `uid`, `regdate`, `remark`) VALUES
	(1, '张三01', '2008-07-02', '学生'),
	(2, '李四02', '2008-07-03', '学生'),
	(3, '王五03', '2008-07-02', '工人'),
	(4, '张三04', '2008-07-02', '学生'),
	(5, '李四05', '2008-07-03', '学生'),
	(6, '王五06', '2008-07-02', '工人'),
	(7, '张三07', '2008-07-02', '学生'),
	(8, '李四08', '2008-07-03', '学生'),
	(9, '王五09', '2008-07-02', '工人'),
	(10, '张三10', '2008-07-02', '学生'),
	(11, '李四11', '2008-07-03', '学生'),
	(12, '王五12', '2008-07-02', '工人'),
	(13, '张三13', '2008-07-02', '学生'),
	(14, '李四14', '2008-07-03', '学生'),
	(15, '王五15', '2008-07-02', '工人'),
	(16, '张三16', '2008-07-02', '学生'),
	(17, '李四17', '2008-07-03', '学生'),
	(18, '王五18', '2008-07-02', '工人'),
	(19, '赵六19', '2008-07-01', '学生');";

mysql_query("set names 'utf8'");   //插入数据时解决中文乱码
mysql_query($insert,$conn);  //执行在数据表中添加数据


/*----------------------------------------------------------------------------------------------------------------------*/
//开始进行在浏览器中显示数据库数据

$sql = "select *from `dhj2020`";  //首先自定义一个查询变量"$sql"
$a=mysql_query($sql,$conn);  //自定义一个变量"$a",作为执行查询的返回值


//循环把所有数据输出浏览器窗口
$show=mysql_fetch_array($a);
	echo $show[0],"，",$show[1],"，",$show[2],"，",$show[3],"<br><hr>";  //解决不能输出第一条数据的方法
while($show=mysql_fetch_array($a)){
	echo $show["id"],"，",$show["uid"],"，",$show["regdate"],"，",$show["remark"],"<br><hr>";
}

echo "<p>";

echo "数据一共有".mysql_num_rows($a)."行";  //用于计算查询结果中所得行的数目

/*------------------------------------------------------------------------------------------------------------------------*/

echo "<p>";

echo "/*---------------------------------------------知识巩固**以下为输出数据的两种方法------------------------------------------------------------*/";

echo "<p>";

//读取输出数据库数据 方法-(字段显示，比较常用)
$sql = "select *from `dhj2020`";  //首先自定义一个查询变量"$sql"
$a=mysql_query($sql,$conn);  //自定义一个变量"$a",作为执行查询的返回值
$show=mysql_fetch_array($a);
echo  $show["id"],"，",$show["uid"],"，",$show["regdate"],"，",$show["remark"]; //也可以用数组 echo $row[2];

echo "<br>";
//或"打印输出结构"
print_r($show);

echo "<p>";

//读取输出数据库数据 方法二(行数显示)：
$sql = "select *from `dhj2020`";  //首先自定义一个查询变量"$sql"
$a=mysql_query($sql,$conn);  //自定义一个变量"$a",作为执行查询的返回值
$show=mysql_fetch_row($a);
echo $show[0],"，",$show[1],"，",$show[2],"，",$show[3];
echo "<br>";
//或"打印输出结构"
print_r($show);

?>

