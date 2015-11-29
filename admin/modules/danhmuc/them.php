<?php
	include("modules/editor/editor1.php");
?>
<form action="modules/danhmuc/xuly.php?role_id=<?php echo $_GET['role_id'] ?>&" method="post" >	
	<div class="left" >	
		<table width="98%" height="252" border="0">
		  <tr>
			<td height="37" colspan="4"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG THÊM DANH MỤC</strong></div></td>
		  </tr>
		  <tr>
			<td width="141" height="40"><strong>Tên danh mục: </strong></td>
			<td>
				<input name="tendanhmuc" type="text" value="" >
			</td>
			<td height="40">&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="37"><strong>Danh mục: </strong></td>			
        <?php				
				$sql1 = "
							SELECT	cat_id, cat_name
							FROM	tbl_category
							WHERE cat_parent_id = 0
						";
				$category = mysql_query($sql1);
			?>
			<td>
				<select name="cat_parent_id" >
                <option value="0">Tạo danh mục cha</option>
			        <?php
				 	while($row_category = mysql_fetch_array($category)) {
				 ?>
			        <option value="<?php echo $row_category["cat_id"] ?>" style="font-style:italic; font-size:15px; color:#C00"><?php echo $row_category["cat_name"] ?></option>                   
			     <?php
						
					}
				 ?>
	          </select>  
    	

			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td><strong>Nội dung:  </strong></td>
			<td colspan="3">
				<textarea name="noidung" cols="100" rows="5"></textarea>
			</td>
		  </tr>
		  <tr>
			<td height="42">&nbsp;</td>
			<td width="277"><input name="them" type="submit" value="  Thêm  ">
			&nbsp;</td>
			<td width="193"><input name="reset" type="reset" id="reset" value="   Hủy   ">
			&nbsp;</td>
			<td width="333"><input type="button" value="  Back  " onclick="history.back(-1)" /></td>
		  </tr>
	  </table>
	</div>
</form>