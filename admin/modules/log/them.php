<form action="modules/log/xuly.php" method="post">
	<div class="left" style="padding-left:40px; margin-top:40px">	
		<table width="422" height="195" border="0">
			  <tr>
				<td height="35" colspan="3"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG GHI LOG </strong></div></td>
			  </tr>
			  <tr>
				<td width="175"><strong>Mã người dùng: </strong></td>
				<td colspan="2"><input type="text" name="manguoidung" id="manguoidung"/></td>
			  </tr>
			  <tr>
				<td><strong>Ngày thay đổi: </strong></td>
				<td colspan="2"><input type="date" name="ngaythaydoi" id="ngaythaydoi"/></td>
			  </tr>
			  <tr>
				<td><strong>Nội dung:  </strong></td>
				<td colspan="2"><select name="noidung" id="select">
				  <option value="Bài viết">Bài viết</option>
				  <option value="Bệnh">Bệnh</option>
				  <option value="Cây thuốc">Cây thuốc</option>
				  <option value="Tác dụng">Tác dụng</option>
			    </select></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td width="102"><input name="them" type="submit" id="them" value="   Thêm   " /></td>
			    <td width="97"><input name="reset" type="reset" id="reset" value="   Hủy   " /></td>
			  </tr>
		</table>

	</div>
</form>