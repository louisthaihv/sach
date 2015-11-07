<?php
	
	$sql = "select * from benh where maBenh = '$_GET[id]' ";
	
	$benh = mysql_query($sql);
	
	$row = mysql_fetch_array($benh);
	
	
	
?>
<form action="modules/benh/xuly.php?id= <?php echo $row["maBenh"] ?>" method="post">	
	<div class="left" style="padding-left:40px; margin-top:40px">	
			<table width="426" height="128" border="0">
			  <tr>
				<td height="42" colspan="3" style="color:#CC0033"><div align="center"><strong>CHỨC NĂNG SỬA TÊN BỆNH</strong></div></td>
			  </tr>
			  <tr>
				<td width="104" height="47"><strong>Tên bệnh:  </strong></td>
				<td colspan="2">
				<input name="tenbenh" type="text" value="<?php echo $row["tenBenh"] ?>" size="30">    </td>
			  </tr>
			  <tr>
				<td height="29">&nbsp;</td>
				<td width="116">
				  <input name="sua" type="submit" id="sua" value="   Sửa   ">
				
				</td>
				<td width="192">
				  <input name="reset" type="reset" id="reset" value="   Hủy   ">
				
				</td>
			  </tr>
	  </table>
	</div>
</form>