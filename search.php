<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<style type="text/css">
table,td,th{
	border:#6F9 solid 2px;
	}
table{
	width:1110px;
	margin:auto;
	font-size:18px;
	background:#cc99bb;
	}
</style>

<body>
<h1 align="center">搜索结果</h1>
<table width="1200" border="1" align="center">
<tr>
<th>ID</th>
<th>标题</th>
<th>关键字</th>
<th>作者</th>
<th>新闻发布时间</th>
<th>新闻内容</th>
</tr>
<a href="index_1.html">返回首页</a>
<?php
include('connect_db.php');
@$title=$_POST['title'];

$sql="select * from news where title like '%$title%'";
$select = mysql_query($sql);
$rows=mysql_fetch_row($select);
//var_dump($rows);

while($rows=mysql_fetch_row($select)){
	echo '<tr>';
	echo "<td>$rows[0]</td>";
	echo "<td>$rows[1]</td>";
	echo "<td>$rows[2]</td>";
	echo "<td>$rows[3]</td>";
	echo "<td>$rows[4]</td>";
	echo "<td>$rows[5]</td>";
	echo '<tr>';
	   }
?>
</table>

</body>
</html>