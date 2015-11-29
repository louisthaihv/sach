
<?php	
	$sql = "select * from tbl_shop_config where sc_id = '$_GET[id]' ";
	
	$tuychinh = mysql_query($sql);
	
	$row = mysql_fetch_array($tuychinh);
	
	
	
?>
<form action="modules/tuychinh/xuly.php?role_id=<?php echo $_GET['role_id'] ?>&id= <?php echo $row["sc_id"] ?>" method="post">		
			<div align="center" style="margin-top:50px">
			  <table width="426" height="281" border="1" >
			    <tr>
			      <td height="42" colspan="3"><div align="center" style="color:#CC0033"><strong>TÙY CHỈNH CỬA HÀNG</strong></div></td>
		        </tr>
			    <tr>
			      <td width="126" height="40"><strong>Tên cửa hàng:</strong></td>
			      <td colspan="2">
		          <input name="tencuahang" type="text" value="<?php echo $row["sc_name"] ?>" size="30">    </td>
		        </tr>
			    <tr>
			      <td height="42"><strong>Địa chỉ:</strong></td>
			      <td colspan="2"><input name="diachi" type="text" value="<?php echo $row["sc_address"] ?>" size="30" /></td>
		        </tr>
			    <tr>
			      <td height="47"><strong>Số điện thoại:</strong></td>
			      <td colspan="2"><input name="phone" type="text" value="<?php echo $row["sc_phone"] ?>" size="30" /></td>
		        </tr>
			    <tr>
			      <td height="42"><strong>Email:</strong></td>
			      <td colspan="2"><input name="email" type="text" value="<?php echo $row["sc_email"] ?>" size="30" /></td>
		        </tr>
			    <tr>
			      <td height="29"><div align="center">
			        <input name="sua" type="submit" id="sua" value="   Lưu  " />
		          </div></td>
			      <td width="135"><div align="center">
			        <input name="reset" type="reset" id="reset" value="   Hủy   " />
		          </div></td>
			      <td width="151"><div align="center">
			        <input type="button" value="  Back  " onclick="history.back(-1)" />
		          </div></td>
		        </tr>
		      </table>
	  </div>
</form>