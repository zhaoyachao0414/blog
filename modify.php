<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<style type="text/css">
table,td,th{
	border:#6F9 solid 1px;
	}
table{
	width:900px;
	margin:auto;
	font-size:18px;
	background:#cc99bb;
	}
</style>

<body  bgcolor="#66FFCC">
<?php
//获取需要修改的数据编号
@$id=$_GET['id'];
echo $id.'<br>';

include('connect_db.php');
//执行修改的业务逻辑
if(isset($_POST['button'])){
	$title=$_POST['title'];
	$keywords=$_POST['keywords'];
	$author=$_POST['author'];
	$content=$_POST['content'];
	//拼接一个sql语句
	$sql="update news set title='$title',keywords='$keywords',author='$author',content='$content' where id=$id";
	echo $sql;
	if(mysql_query($sql))
	{
		echo '修改成功';
		//	
	}
	else
	{	
		echo '修改失败';
		exit();
	}
}
//取出id对应的数据信息
$sql="select * from news where id=$id";
$rs = mysql_query($sql);
@$rows = mysql_fetch_array($rs)


?>
<form action="" method="post">
  <table width="500" border="1">
    <tr>
      <td colspan="2" align="center"><h2>修改新闻</h2></td>
    </tr>
    <tr>
      <td width="128"><strong>新闻标题：</strong></td>
      <td width="362"><label for="textfield"></label>
      <input type="text" name="title" id="textfield" value="<?php echo $rows[1]?>"/></td>
    </tr>
    <tr>
      <td><strong>关键字：</strong></td>
      <td><label for="textfield2"></label>
      <input type="text" name="keywords" id="textfield2" value="<?php echo $rows[2]?>"/></td>
    </tr>
    <tr>
      <td><strong>作者：</strong></td>
      <td><label for="textfield3"></label>
      <input type="text" name="author" id="textfield3" value="<?php echo $rows[2]?>"/></td>
    </tr>
    <tr>
      <td><strong>新闻内容：</strong></td>
      <td><label for="textarea"></label>
      <textarea name="content" id="content" cols="45" rows="5"><?php echo $rows[5]?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="button" id="button" value="修改" />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="button2" id="button2" value="取消" /></td>
    </tr>
  </table>
</form>














</body>
</html>