
<?php	
	$sql = "select * from tbl_role where role_id = '$_GET[id]' ";
	
	$quyen = mysql_query($sql);
	
	$row = mysql_fetch_array($quyen);
	
	$sql = "SELECT * FROM tbl_function";
	$chucnang = mysql_query($sql);
	$list = mysql_query("SELECT * FROM tbl_role_function WHERE role_id = '$_GET[id]'");
	$chuoi = "";
	$dem=0;
	$arr[20] = array();
	while ($row_l = mysql_fetch_array($list)){
		$arr[$dem]=$row_l['function_id'];
		$dem++;
					
	}
	
?>
<form action="modules/quyen/xuly.php?role_id=<?php echo $_GET['role_id'] ?>&id= <?php echo $row["role_id"] ?>" method="post">	
	<div class="left" style="padding-left:40px; margin-top:40px">	
			<table width="426" height="128" border="0">
			  <tr>
				<td height="42" colspan="3"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG SỬA TÊN QUYỀN</strong></div></td>
			  </tr>
			  <tr>
				<td width="126" height="22"><strong>Tên quyền:</strong></td>
				<td colspan="2">
				<input name="tenquyen" type="text" value="<?php echo $row["role_name"] ?>" size="30">    </td>
			  </tr>
			  <tr>
			    <td height="25"><strong>Chức năng</strong></td>
			    <td colspan="2">
				<?php
					
					if (mysql_num_rows($chucnang)!=0){
						while ($row = mysql_fetch_array($chucnang)){	
							
				?>
                	<div>
		       			<input type="checkbox" name="chucnang[]" value="<?php echo $row["function_id"]?>"<?php for($i=0;$i<$dem;$i++){if($row['function_id'] == $arr[$i]) echo 'checked'; } ?>> <?php echo $row["function_name"] ?>
              	
           			</div>
			      <?php
							
						}
					}
				
				?></td>
		      </tr>
			  <tr>
				<td height="29"><div align="left">
				  <input name="sua" type="submit" id="sua" value="   Sửa  " />
			    </div></td>
				<td width="135"><input name="reset" type="reset" id="reset" value="   Hủy   " /></td>
				<td width="151"><input name="back" type="button" value="   Trở lại   " onclick="window.location='index.php?role_id=<?php echo $_GET['role_id'] ?>&quanly=quyen&ac=lietke'" /></td>
			  </tr>
	  </table>
	</div>
</form>