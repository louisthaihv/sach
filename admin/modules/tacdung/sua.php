<head>
	<meta charset="utf-8" />
</head>

<?php
	
	$sql = "select * from tacdung where maTacdung = '$_GET[id]' ";
	
	$tacdung = mysql_query($sql);
	
	$row = mysql_fetch_array($tacdung);
	
	
	
?>
<form action="modules/tacdung/xuly.php?id= <?php echo $row["maTacdung"] ?>" method="post">	
	<div class="left" style="padding-left:40px; margin-top:40px">	
			<table width="426" height="128" border="0">
			  <tr>
				<td height="42" colspan="3"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG SỬA TÊN TÁC DỤNG</strong></div></td>
			  </tr>
			  <tr>
				<td width="126" height="47"><strong>Tên tác dụng:</strong></td>
				<td colspan="2">
				<input name="tentacdung" type="text" value="<?php echo $row["tenTacdung"] ?>" size="30">    </td>
			  </tr>
			  <tr>
				<td height="29">&nbsp;</td>
				<td width="94">
				  <input name="sua" type="submit" id="sua" value="   Sửa   ">
				
				</td>
				<td width="192">
				  <input name="reset" type="reset" id="reset" value="   Hủy   ">
				
				</td>
			  </tr>
	  </table>
	</div>
</form>