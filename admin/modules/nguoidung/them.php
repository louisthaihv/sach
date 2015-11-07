
<?php
	include("modules/editor/editor1.php");
	
?>
<form action="modules/nguoidung/xuly.php" method="post" >
	<div class="left" style="padding-left:30px; margin-top:10px">	
		<table width="1019" height="278" border="0">
		  <tr>
			<td height="37" colspan="5"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG THÊM MỚI NGƯỜI DÙNG</strong></div></td>
		  </tr>
		  <tr>
		    <td width="184" height="40"><strong>Tên đăng nhập: </strong></td>
		    <td colspan="2"><input name="tendangnhap" type="text" id="tendangnhap" />
  &nbsp;</td>
			<td width="146" height="40"><strong>Họ tên:</strong></td>
			<td><input type="text" name="hoten" id="hoten" /></td>
		  </tr>
		  <tr>
		    <td height="37"><strong>Mật khẩu: </strong></td>
		    <td colspan="2"><input name="matkhau" type="text" id="matkhau" />
  &nbsp;</td>
		    <td><strong>Email:</strong></td>
			<td><input type="text" name="email" id="email" /></td>
		  </tr>
		  <tr>
		    <td height="42"><strong>Tên quyền:</strong></td>
		    <td colspan="2"><?php
				
				$sql = "
							SELECT	*
							FROM	quyen
						";
				$quyen = mysql_query($sql);
			?>
		      <select name="maquyen" >
		        <?php
			 	while($row_quyen = mysql_fetch_array($quyen)) {
			 ?>
		        <option value="<?php echo $row_quyen["maQuyen"] ?>"><?php echo $row_quyen["tenQuyen"] ?></option>
		        <?php
				}
			 ?>
	          </select></td>
		    <td><strong>Nơi ở:</strong></td>
			<td><input name="noio" type="text" id="noio" /></td>
		  </tr>
		  <tr>
		    <td height="43"><strong>Ngày đăng ký:</strong></td>
		    <td colspan="2"><input type="date" name="ngaydangky" id="ngaydangky" /></td>
		    <td><strong>Trạng thái:</strong></td>
		    <td><select name="trangthai" id="trangthai">
		      <option value="1" selected="selected">1</option>
		      <option value="0">0</option>
		      </select></td>
		  </tr>
		  <tr>
		    <td height="43">&nbsp;</td>
		    <td colspan="2">&nbsp;</td>
		    <td><strong>Ghi chú:</strong></td>
		    <td><input type="text" name="ghichu" id="ghichu" /></td>
	      </tr>
		  <tr>
			<td height="26">&nbsp;</td>
			<td width="171"><strong>
		    <input name="them" type="submit" value="  Thêm  ">
			</strong>			&nbsp;</td>
			<td width="162"><input name="reset" type="reset" id="reset" value="   Hủy   " />
&nbsp;</td>
			<td>&nbsp;</td>
			<td width="334">&nbsp;</td>
		  </tr>
	  </table>
	</div>
</form>