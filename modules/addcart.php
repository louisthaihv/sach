<?php
	session_start();
	ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gio hang</title>
</head>

<body>
<?php
	$pd_id = $_GET['pd_id'];
	// session id 
	$sid = session_id();
	if ($pd_id != "")
	{
		include("config.php");
		// kiem tra xem sach nay co trong csdl hay không?
		$result = mysql_query("SELECT pd_id FROM tbl_product WHERE pd_id in ('$pd_id')");
		$row = mysql_num_rows($result);
		if ($row == 1)//neu sach co trong csdl
		{
			//Neu sach nay da co trong gio hang roi
			if (isset ($_SESSION['giohang'][$pd_id]))
			{
				//tang so luong len 1
				$_SESSION['giohang'][$pd_id]++;	
				
				$sql = "UPDATE tbl_cart 
		        SET ct_qty = ct_qty + 1
				WHERE ct_session_id = '$sid' AND pd_id = $pd_id";	
				$result = mysql_query($sql);		
			}
			else //neu sach nay chua co trong gio hang
			{
				$_SESSION['giohang'][$pd_id] = 1;
				
				$sql = "INSERT INTO tbl_cart (pd_id, ct_qty, ct_session_id, ct_date)
				VALUES ($pd_id, 1, '$sid', NOW())";
				$result = mysql_query($sql);
			}
			//mo trang gio hang
			header("location:cart.php");
		}
		else
		{
			header("location:../index.php");
		}
	}
	
?>
</body>
</html>