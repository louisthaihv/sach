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
<table width="550" border="0" align="center" cellpadding="10" cellspacing="0">
    <tr> 
        <td>Vui lòng cho chúng tôi biết thông tin của bạn!</td>
    </tr>
</table>
<?php 
//	if (isset($_POST['tienmat'])){
//		$hoten = $_POST['hoten'];
//		$email = $_POST['email'];
//		$dienthoai = $_POST['dienthoai'];
//		$diachi = $_POST['diachi'];
//		$tongtien = $_POST['tongtien'];
//		$result2 = mysql_query("INSERT INTO `sach`.`tbl_transaction` (`tra_status`, `tra_user_name`, `tra_user_email`, `tra_user_phone`, `tra_amount`, `tra_payment`, `tra_created`) VALUES ('0', '$hoten', '$email', '$dienthoai', '$tongtien', 'tienmat', NOW());");	
//		if($result2){
//			$row_layMa = mysql_fetch_array(mysql_query("SELECT tra_id FROM tbl_transaction WHERE  1=1 ORDER BY tra_id DESC limit = 1"));
//			$tra_id = $row_layMa['tra_id'];
//			$result4 = mysql_query("INSERT INTO `sach`.`tbl_order_d` (`tra_id`, `pd_id`, `od_qty`, `od_amount`, `od_data`, `od_status`) VALUES ('$tra_id','12', '12', '12', '112', '0');");
//		}
//	}
?>
<form action="addorder.php" method="post" name="frmThanhtoan" id="frmThanhtoan">
    <table width="576" border="1" align="center" cellpadding="5" cellspacing="1" class="entryTable">
        <tr class="entryTableHeader"> 
            <td colspan="2"><strong>Thông tin vận chuyển</strong></td>
        </tr>
        <tr> 
            <td width="150" class="label">Họ tên:</td>
            <td width="397" class="content"><input name="hoten" type="text" class="box" id="hoten" size="30" maxlength="50"></td>
        </tr>
        <tr> 
            <td width="150" class="label">Email</td>
            <td class="content"><input name="email" type="text" class="box" id="email" size="30" maxlength="50"></td>
        </tr>
        <tr> 
            <td width="150" class="label">Điện thoại</td>
            <td class="content"><input name="dienthoai" type="text" class="box" id="dienthoai" size="30" maxlength="32"></td>
        </tr>
        <tr>
          <td class="label">Địa chỉ</td>
          <td class="content"><input name="diachi" type="text" class="box" id="diachi" size="50" maxlength="100" /></td>
        </tr>
        <tr>
          <td class="label">Ngày nhận hàng</td>
          <td class="content"><input name="ngaynhan" type="date" /></td>
        </tr>
        <tr>
          <td class="label">Ghi chú</td>
          <td class="content"><input name="ghichu" type="text" /></td>
        </tr>
    </table>
    <p>&nbsp;</p>
 
<table width="575" height="152" border="1" cellpadding="5px" bordercolor="#0066FF" align="center" bgcolor="#E8ECFF">
  <tr>
    <td colspan="4" align="right"><div align="left"><strong>Sản phẩm đặt mua</strong></div></td>
    </tr>
  <tr>
    <td width="258" height="38"><div align="center"><strong>Tên sách</strong></div></td>
    <td width="78"><div align="center"><strong>Số lượng</strong></div></td>
    <td width="103"><div align="center"><strong>Đơn giá</strong></div></td>
    <td width="76"><div align="center"><strong>Thành tiền</strong></div></td>
    </tr>
<?php
		$id = session_id();
		//lay thong tin sach
		$result = mysql_query("SELECT * FROM tbl_cart WHERE ct_session_id in ('$id')");
		
		while ($row = mysql_fetch_array($result)){
			$result1 = mysql_query("SELECT * FROM tbl_product WHERE pd_id = {$row['pd_id']}");
			$row1 = mysql_fetch_array($result1);
?>
  <tr>
    <td height="40"><div ><?php echo $row1['pd_name'];?></div></td>
    <td><?php echo $row['ct_qty']?></td>
    <td><?php echo $row1["pd_price"]?></td>
    <td><?php echo $row['ct_qty']*$row1["pd_price"]?></td>
    </tr>
<?php
		//tong tien
		@$tongcong += $row['ct_qty']*$row1["pd_price"];		
		}
?>
  <tr>
    <td colspan="3" align="right">Tổng cộng: </td>
    <td align="left"><input type="text" id="tongtien" name="tongtien" value="<?php echo $tongcong?>" size="20" readonly="readonly" /></td>
    </tr>
</table>

    <p>&nbsp;</p>
    <table width="550" border="1" align="center" cellpadding="5" cellspacing="1" class="entryTable">
      <tr>
        <td width="193" class="entryTableHeader"><strong>Phương thức thanh toán </strong></td>
        <td width="159" class="content">
          <div align="center">
            <input type="radio" name="thanhtoan"  value="cash" /> Tiền mặt </br>
            
          </div></td>
        <td width="156" class="content">
       
          <div align="center">
            <input type="radio" name="thanhtoan"  value="nganluong" />
            Ngân lượng </br>
           
        </div></td>
      </tr>
    </table>
    <p>
    <input style="margin-left:450px" type="button" value="  Back  " onclick="history.back(-1)" />
    <input style="margin-left:300px" type="submit" value="  Đặt hàng  " name="submit"/>
      
      <br /><br />
    </p> 
</form>
</body>
</html>