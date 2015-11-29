<?php
	include("modules/editor/editor1.php");
?>
<form action="modules/sach/xuly.php?role_id=<?php echo $_GET['role_id'] ?>" method="post" enctype="multipart/form-data">	
	<div class="left" >	
		<table width="98%" height="252" border="0">
		  <tr>
			<td height="37" colspan="4"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG THÊM SÁCH  </strong></div></td>
		  </tr>
		  <tr>
			<td width="141" height="40"><strong>Tên sách: </strong></td>
			<td>
				<input name="tensach" type="text" value="" >
			</td>
			<td height="40"><strong>Tên tác giả: </strong></td>
			<td><input name="tentacgia" type="text" value="" /></td>
		  </tr>
		  <tr>
			<td height="37"><strong>Giá:  </strong></td>
			<td><input name="gia" type="text" value="" ></td>
			<td height="37"><strong>Số lượng: </strong></td>
			<td><input name="soluong" type="text" value="" /></td>
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
			<td colspan="3">
				<select name="cat_id" >
			        <?php
				 	while($row_category = mysql_fetch_array($category)) {
				 ?>
			        <option value="<?php echo $row_category["cat_id"] ?>" disabled="disabled" style="font-style:italic; font-size:15px; color:#C00"><?php echo $row_category["cat_name"] ?></option>
                    <?php				
					  $sql2 = "
								  SELECT	*
								  FROM	tbl_category
								  WHERE cat_parent_id = {$row_category["cat_id"]}
							  ";
					  $category2 = mysql_query($sql2);
					  
					  while($row_category2 = mysql_fetch_array($category2)) {
					?>
					  <option value="<?php echo $row_category2["cat_id"] ?>"><?php echo $row_category2["cat_name"] ?></option>
			     <?php
						}
					}
				 ?>
	          </select>  
    	

			</td>
		  </tr>
		  <tr>
			<td height="41"><strong>Ảnh minh họa:</strong> </td>
			<td colspan="3">
				 <input id="img_prd" name="anhminhhoa" type="file" />
				
				 <br />
				 <img src="" alt="Image" width="150" height="200" id="blah1">
			</td>
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