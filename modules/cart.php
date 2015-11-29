<?php
	session_start();
	ob_start();
	include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
	// session id 
	$sid = session_id();
	//xu ly cap nhat
	$giohang = $_SESSION['giohang'];
	//neu nguoi dung cap nhat lai gio hang
	if(isset($_POST['capnhat']) && count($giohang) !="")
	{
		$soluong_cn = $_POST['soluong'];
		foreach ($soluong_cn as $pd_id => $sl)
		{
			//neu nguoi dung dat lai so luong = 0 -> thi huy luon sach do trong gio hang
			if($sl == 0)
			{
				unset($_SESSION['giohang'][$pd_id]);
				
				$sql1 = "SELECT * FROM tbl_cart WHERE pd_id in ('$pd_id')";
				$result1 = mysql_query($sql1);
				$row = mysql_fetch_array($result1);
				
				$sql  = "DELETE FROM tbl_cart
						 WHERE ct_id = {$row['ct_id']}";
				$result = mysql_query($sql);
				
				//header("location:../index.php");
			}
			// nguoc lai cap nhat lai so luong trong gio hang
			else if ($sl > 0 && is_numeric($sl))
			{
				$_SESSION['giohang'][$pd_id] = $sl;
				
				$sql1 = "SELECT * FROM tbl_cart WHERE pd_id in ('$pd_id')";
				$result1 = mysql_query($sql1);
				$row = mysql_fetch_array($result1);
				
				$sql = "UPDATE tbl_cart 
		        SET ct_qty = $sl
				WHERE ct_id = {$row['ct_id']}";
				$result = mysql_query($sql);
			}
			//refresh lai gio hang
			header("location:".$_SERVER['REQUEST_URI']."");
		}
	}
	
	//xu ly hien thi gio hang
	if(count($giohang))
	{
?>
<form action="" method="post">
<table width="709" height="290" border="1" align="center" cellpadding="5px" cellspacing="1" bordercolor="#0066FF" bgcolor="#E8ECFF" style="border-spacing:1">
  <tr>
    <td width="354"><div align="center"><strong>Tên sách</strong></div></td>
    <td width="70"><div align="center"><strong>Số lượng</strong></div></td>
    <td width="70"><div align="center"><strong>Đơn giá</strong></div></td>
    <td width="102"><div align="center"><strong>Thành tiền</strong></div></td>
    <td width="76">&nbsp;</td>
  </tr>
<?php
	//duyet qua mang gio hang
	$tongcong = 0;
	foreach($giohang as $pd_id => $sl)
	{
		//lay thong tin sach
		$result = mysql_query("SELECT * FROM tbl_product WHERE pd_id in ('$pd_id')");
		$row = mysql_fetch_array($result);
?>
  <tr>
    <td><img src="../images/<?php echo $row['pd_image'];?>" alt="" width="120" height="170" align="left" style="padding-right:10px"/><div style="margin-top:70px;"><?php echo $row['pd_name'];?></div></td>
    <td><input name = "soluong[<?php echo $pd_id?>]" type="text" size="4" value="<?php echo $sl?>"/></td>
    <td><?php echo number_format($row["pd_price"])."VND";?></td>
    <td><?php echo number_format($sl*$row["pd_price"],0)."VND";?></td>
    <td><a href="removebook.php?pd_id=<?php echo $row["pd_id"]?>" style="text-decoration:none"><input type="button" value="Xóa sách"/></a></td>
  </tr>
<?php
	//tong tien
	$tongcong += $sl*$row["pd_price"];
	}
?>
  <tr>
    <td align="right"><div align="center">
      <input type="submit" name="capnhat" value="Cập nhật"/>
    </div></td>
    <td colspan="2" align="right">Tổng cộng: </td>
    <td colspan="2" align="left"><?php echo number_format($tongcong)."VND";?></td>
    </tr>
  <tr>
    <td align="center"><div align="center">
      <input type="button" name="muathem" value=" Mua thêm" id="muathem" onclick="window.location='../index.php'"/>  
    </div></td>
    <td colspan="4" align="center">
    <input type="button" name="dathang" value=" Đặt hàng " id="dathang" onclick="window.location='payment.php'"/>
    </td>
    </tr>
</table>
</form>
<?php
	}
?>
</body>
</html>
