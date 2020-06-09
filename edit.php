<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<script type="text/javascript">
function jump(id)
{
	if(confirm('确定要删除吗？'))
	{
		location.href='dele.php ? id='+ id ;	
	}	
}
</script>

<body>
<center>
<h2>编辑新闻</h2>
</center>
<table width="1200" border="1" align="center">
    <tr bgcolor="#FFFF33">
	<th width="40">ID</th>
    <th width="100">标题</th>
    <th>关键字</th>
    <th>作者</th>
    <th width="90">新闻发布时间</th>
    <th>新闻内容</th>
    <th width="110">编辑</th>
</tr>
<?php
include('connect_db.php');
$rs=mysql_query('select * from news order by id desc');

//循环取出匹配成索引数组
while($rows=mysql_fetch_array($rs)){
	echo "<tr bgcolor='#99FFFF'>";
	echo "<td>$rows[id]</td>";
	echo "<td>$rows[title]</td>";
	echo "<td>$rows[keywords]</td>";
	echo "<td>$rows[author]</td>";
	echo "<td>$rows[addtime]</td>";
	echo "<td>$rows[content]</td>";
	echo "<td><a href='modify.php?id=$rows[0]'>修改</a>
	&nbsp;&nbsp;&nbsp;&nbsp;<a href='dele.php?id=$rows[0]' onclick='jump($rows[id])'>删除</a></td>";
	echo '</tr>';
	}
?>
</table>
</body>
</html>