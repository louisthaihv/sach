<?php
	$sql = "SELECT * FROM tbl_shop_config";
	$row = mysql_fetch_array(mysql_query($sql));
?>
<div  style="margin:40px">
  <div align="center" >
    <table width="484" height="289" border="1" bordercolor="#009999">
      <tr>
        <td height="42" colspan="3"><div align="center" style="color:#CC0033"><strong>TÙY CHỈNH CỬA HÀNG</strong></div></td>
        </tr>
      <tr>
        <td width="135" height="24"><strong>Tên cửa hàng:</strong></td>
        <td colspan="2"><?php echo $row["sc_name"] ?></td>
        </tr>
      <tr>
        <td height="25"><strong>Địa chỉ:</strong></td>
        <td colspan="2"><?php echo $row["sc_address"] ?></td>
      </tr>
      <tr>
        <td height="51"><strong>Số điện thoại:</strong></td>
        <td colspan="2"><?php echo $row["sc_phone"] ?></td>
      </tr>
      <tr>
        <td height="51"><strong>Email:</strong></td>
        <td colspan="2"><?php echo $row["sc_email"] ?></td>
      </tr>
      <tr>
        <td height="29">&nbsp;</td>
        <td width="157"><div align="center"><a href="index.php?role_id=<?php echo $_GET['role_id'] ?>&quanly=tuychinh&ac=sua&id=<?php echo $row["sc_id"] ?>"><img src="img/sua.png" /></a></div></td>
        <td width="170"><div align="center">
          <input name="reset" type="reset" id="reset" value="   Hủy   " />
        </div></td>
        </tr>
    </table>
  </div>
</div>		
