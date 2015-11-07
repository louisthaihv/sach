<?php
	session_start();
	ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sach</title>
</head>

<body>
<?php
	//kiem tra id sach co ton tai trc khi xoa
	if(isset ($_GET['pd_id']))
	{
		unset($_SESSION['giohang'][$_GET['pd_id']]);;
		header("location: miniCart.php");
	}
?>
</body>
</html>
