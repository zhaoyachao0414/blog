<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
table,td,th{
	border:#6F9 solid 2px;
	}
table{
	width:980px;
	margin:auto;
	font-size:18px;
	background:#cc99bb;
	}
</style>
</head>

<body>
<?php
	//连接数据库
	$link=@mysql_connect('localhost','root','') or die('数据库连接失败！！！');
	mysql_query('use data0401') or die('数据库选择失败？');
	mysql_query('set names utf8');
	
	//定义页面大小
	$pagesize=8;
	
	//求总记录数
	$rs=mysql_query('select count(*) from products');
	$rows=mysql_fetch_row($rs);		//将资源匹配成索引数组
	$recordcount=$rows[0];         //总记录数
	//求总页数
	$pagecount=ceil($recordcount/$pagesize);
	//echo $pagecount.'<br>';
	//获得传递的当前页码
	$pageno=isset($_GET['$pageno'])?$_GET['$pageno']:1;
	echo $pageno;
	//求当前页的起始位置
	$startno=($pageno-1)*$pagesize;
	//获取当前页的内容
	$sql="select * from products limit $startno,$pagesize";
	$rss=mysql_query($sql);
?>
<table>
<tr bgcolor="#FFFF33">
      <th width="50">编号</th>
      <th width="180">商品名称</th>
      <th width="180">价格</th>
      <th width="100">规格</th>
      <th width="100">库存量</th>
      <th width="80">图片</th>
      <th>网址</th>
    </tr>
<?php
//循环取出，取出一条记录匹配成关联数组
while($rows=mysql_fetch_assoc($rss)){
	echo '<tr>';
	echo '<td width="50">'.$rows['proID'].'</td>';
	echo '<td width="180">'.$rows['proname'].'</td>';
	echo '<td width="180">'.$rows['proguide'].'</td>';
	echo '<td width="100">'.$rows['proprice'].'</td>';
	echo '<td width="100">'.$rows['promount'].'</td>';
	echo $rows['proimages']=='' ? '<td>图片暂缺</td>' : '<td width="80"><img src="'.$rows['proimages'].'"/></td>';
	echo '<td>'.$rows['proweb'].'</td>';
	echo '</tr>';
	}	
?>
</table>


<!--循环页面-->
<table>
<tr>
	<td>
    <?php
    for($i=1;$i<$pagecount;$i++)
    {
    	echo '<a href="fenye.php?pageno='.$i.'">'.$i.'</a>&nbsp&nbsp&nbsp&nbsp&nbsp';
    }
	?>
    </td>
</tr>
</table>
</body>
</html> 
