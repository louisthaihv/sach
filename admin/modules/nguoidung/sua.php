
<?php
	include("modules/editor/editor1.php");
	
?>

<?php
	$sql = "select * from tbl_user where user_id = '$_GET[id]' ";//gán giá trị trong bảng người dùng vào biến $sql
	
	$nguoidung = mysql_query($sql);//thực hiện câu lệnh sql
	
	$row = mysql_fetch_array($nguoidung);//vì chỉ cần lấy 1 dòng
	
	
?>
<form action="modules/nguoidung/xuly.php?role_id=<?php echo $_GET['role_id'] ?>&id=<?php echo $row["user_id"] ?>" method="post" >
	<div class="left" style="padding-left:30px; margin-top:10px">	
		<table width="1019" height="242" border="0">
		  <tr>
			<td height="37" colspan="5"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG SỬA THÔNG TIN NGƯỜI DÙNG</strong></div></td>
		  </tr>
		  <tr>
		    <td width="184" height="40"><strong>Tên đăng nhập: </strong></td>
		    <td colspan="2"><input name="tendangnhap" type="text" id="tendangnhap" value="<?php echo $row['user_name']; ?>" />
  &nbsp;</td>
			<td height="40"><strong>Họ tên:</strong></td>
			<td><input name="hoten" type="text" id="hoten" value="<?php echo $row['user_fullname']; ?>" /></td>
		  </tr>
		  <tr>
		    <td height="33"><strong>Mật khẩu: </strong></td>
		    <td colspan="2"><input name="matkhau" type="text" id="matkhau" value="<?php echo $row['user_password']; ?>" />
  &nbsp;</td>
		    <td width="146" height="40"><strong>Email:</strong></td>
		    <td><input name="email" type="text" id="email" value="<?php echo $row['user_email']; ?>" /></td>
		  </tr>
		  <tr>
		    <td height="42"><strong>Mã quyền:</strong></td>
		    <td colspan="2"><?php
				
				$sql1 = "
							SELECT	*
							FROM	tbl_role
						";
				$quyen = mysql_query($sql1);
			?>
		      <select name="maquyen" >
		        <?php
			 	while($row_quyen = mysql_fetch_array($quyen)) {
					if($row_quyen["role_id"] == $row["role_id"]) {
			 ?>
		        <option value="<?php echo $row_quyen["role_id"] ?>" selected = "selected" ><?php echo $row_quyen["role_name"] ?></option>
		        <?php
					}else {			
			 ?>
		        <option value="<?php echo $row_quyen["role_id"] ?>" ><?php echo $row_quyen["role_name"] ?></option>
		        <?php
					}
				}
			 ?>
	          </select></td>
		    <td><strong>Nơi ở:</strong></td>
		    <td><input name="noio" type="text" id="noio" value="<?php echo $row['user_address']; ?>" /></td>
	      </tr>
		  <tr>
		    <td height="43"><strong>Trạng thái:</strong></td>
		    <td colspan="2"><select name="trangthai" id="trangthai">
		      <?php if($row["user_status"] == "1") {?>
		      <option value="1" selected="selected">1</option>
		      <option value="0">0</option>
		      <?php }else { ?>
		      <option value="1" >1</option>
		      <option value="0" selected="selected">0</option>
		      <?php } ?>
	        </select></td>
		    <td><strong>Ghi chú:</strong></td>
		    <td><input name="ghichu" type="text" id="ghichu" value="<?php echo $row['user_note']; ?>" /></td>
	      </tr>
		  <tr>
			<td height="26">&nbsp;</td>
			<td width="171"><strong>
		    <input name="sua" type="submit" value="   Sửa   " id="sua">
			</strong>			&nbsp;</td>
			<td width="162"><input name="reset" type="reset" id="reset" value="   Hủy   " />
&nbsp;</td>
			<td>&nbsp;</td>
			<td width="334">&nbsp;</td>
		  </tr>
	  </table>
	</div>
</form>