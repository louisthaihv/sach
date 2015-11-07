
<?php
	
	
	$sql = "select * from tbl_roles where id = '$_GET[id]' ";
	
	$quyen = mysql_query($sql);
	
	$row = mysql_fetch_array($quyen);
	
	
	
?>
<form action="modules/quyen/xuly.php?id= <?php echo $row["id"] ?>" method="post">	
	<div class="left" style="padding-left:40px; margin-top:40px">	
			<table width="426" height="128" border="0">
			  <tr>
				<td height="42" colspan="3"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG SỬA TÊN QUYỀN</strong></div></td>
			  </tr>
			  <tr>
				<td width="126" height="47"><strong>Tên quyền:</strong></td>
				<td colspan="2">
				<input name="tenquyen" type="text" value="<?php echo $row["name"] ?>" size="30">    </td>
			  </tr>
			  <tr>
				<td height="29">&nbsp;</td>
				<td width="94">
				  <input name="sua" type="submit" id="sua" value="   Sửa  ">
				
				</td>
				<td width="192">
				  <input name="reset" type="reset" id="reset" value="   Hủy   ">
				
				</td>
			  </tr>
	  </table>
	</div>
</form>