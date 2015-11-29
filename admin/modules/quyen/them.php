<?php 	
	$sql = "SELECT * FROM tbl_function";
	$chucnang = mysql_query($sql);
?>

<form action="modules/quyen/xuly.php?role_id=<?php echo $_GET['role_id'] ?>&" method="post">
	<div class="left" style="padding-left:40px; margin-top:40px">	
			<table width="426" height="183" border="0">
			  <tr>
				<td height="42" colspan="3"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG THÊM QUYỀN</strong></div></td>
			  </tr>
			  <tr>
				<td width="106" height="24"><strong>Tên quyền:</strong></td>
				<td colspan="2">
				<input name="tenquyen" type="text" size="30">    </td>
			  </tr>
			  <tr>
			    <td width="106" height="25"><strong>Chức năng</strong></td>
                
			    <td colspan="2">
                <?php
					if (mysql_num_rows($chucnang)!=0){
						while ($row = mysql_fetch_array($chucnang)){
				?>
                <input name="chucnang[]" type="checkbox" value="<?php echo $row['function_id']?>"/><?php echo $row['function_name']?><br />
                <?php
						}
					}
				
				?>
                </td>
		      </tr>
			  <tr>
				<td height="29">&nbsp;</td>
				<td width="116">
				  <input name="them" type="submit" id="them" value="   Thêm  ">			</td>
				<td width="190"><input name="reset" type="reset" id="reset" value="   Hủy   " /></td>
			  </tr>
	  </table>
	</div>
</form>