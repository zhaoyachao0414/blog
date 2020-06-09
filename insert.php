<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body bgcolor="#66FFCC">
<?php
//连接数据库，，引用
include("connect_db.php");

$title=$_POST['title'];
$keywords=$_POST['keyword'];
$author=$_POST['author'];
$content=$_POST['content'];

date_default_timezone_set('PRC');
$time=date('Y-m-d h:i:s');

/*mysql_connect('localhost','root','') or die('AAA');
mysql_select_db('newsdb') or die('BBB');
mysql_query('set names utf8');*/

$sql="insert into news values(null,'$title','$keywords','$author','$time','$content')";
//var_dump($sql);
$insert=mysql_query($sql);
if($insert){
	print "<h2>新闻录入成功</h2>";}
else{
	echo '<h2>新闻录入失败</h2>';}

echo '<br>';
echo '<hr>';
echo '<a href="index_1.html">返回首页</a>';
?>
</body>
</html>