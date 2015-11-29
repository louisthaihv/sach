<?php
	include("modules/editor/editor1.php");

	$sql = "select * from tbl_category where cat_id ='$_GET[id]' ";
	
	$danhmuc = mysql_query($sql);
	
	$row = mysql_fetch_array($danhmuc);
	
	
	
?>
<form action="modules/danhmuc/xuly.php?role_id=<?php echo $_GET['role_id'] ?>&id=<?php echo $row["cat_id"] ?>" method="post">	
	<div class="left" >	
		<table width="98%" height="252" border="0">
		  <tr>
			<td height="37" colspan="4"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG SỬA DANH MỤC</strong></div></td>
		  </tr>
		  <tr>
			<td width="140" height="40"><strong>Tên danh mục: </strong></td>
			<td>
				<input name="tendanhmuc" type="text" value="<?php echo $row["cat_name"]?>" >
			</td>
			<td height="40">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="37"><strong>Danh mục cha:  </strong></td>
			<?php
				
				$sql1 = "
							SELECT	*
							FROM	tbl_category
							WHERE cat_parent_id = 0
						";
				$category = mysql_query($sql1);
			?>
			<td>                         
				<select name="cat_parent_id" >
			        <?php
				 	while($row_category = mysql_fetch_array($category)) {
						if($row_category["cat_id"] == $row["cat_parent_id"]) {
				 ?>
			        <option value="<?php echo $row_category["cat_id"] ?>" selected = "selected" ><?php echo $row_category["cat_name"] ?></option>
			        <?php /*?><?php
						}else if($row_category["cat_parent_id"] == 0) {
				 ?>
			        <option value="0" selected = "selected" >Là danh mục cha</option><?php */?>
			        <?php
						}else{			
				 ?>
			        <option value="<?php echo $row_category["cat_id"] ?>" style="font-style:italic; font-size:15px; color:#C00"><?php echo $row_category["cat_name"] ?></option>
                    
			        <?php						
					}
				}
				 ?>
                 	<option value="0" selected="selected">Tạo danh mục cha</option>
	          </select>

			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td><strong>Nội dung:  </strong></td>
			<td colspan="3">
				<textarea name="noidung" cols="100" rows="5"><?php echo $row["cat_description"] ?></textarea>
			</td>
		  </tr>
		  <tr>
			<td height="42">&nbsp;</td>
			<td width="272"><input name="sua" type="submit" id="sua" value="   Sửa   ">
			&nbsp;</td>
			<td width="243"><input name="reset" type="reset" id="reset" value="   Hủy   ">
			&nbsp;</td>
			<td width="381"><input type="button" value="  Back  " onclick="history.back(-1)" />&nbsp;</td>
            
		  </tr>
	  </table>
	</div>
</form>