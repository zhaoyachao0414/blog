<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<?php
include('connect_db.php');
@$id=$_GET['id'];
echo $id.'<br>';

$sql="delete from news where id=$id";
echo $sql.'<br>';
$ll=mysql_query($sql);
if($ll)
	{
		echo '数据删除成功';
		header('location:edit.php');	
	}else
	{
		die("数据删除失败");
	}

?>
<body>
</body>
</html>