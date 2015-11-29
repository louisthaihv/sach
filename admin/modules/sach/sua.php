<?php
	include("modules/editor/editor1.php");

	$sql = "select * from tbl_product where pd_id ='$_GET[id]' ";
	
	$sach = mysql_query($sql);
	
	$row = mysql_fetch_array($sach);
	
	
	
?>
<form action="modules/sach/xuly.php?role_id=<?php echo $_GET['role_id'] ?>&id=<?php echo $row["pd_id"] ?>" method="post" enctype="multipart/form-data">	
	<div class="left" >	
		<table width="98%" height="252" border="0">
		  <tr>
			<td height="37" colspan="4"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG SỬA SÁCH  </strong></div></td>
		  </tr>
		  <tr>
			<td width="140" height="40"><strong>Tên sách: </strong></td>
			<td>
				<input name="tensach" type="text" value="<?php echo $row["pd_name"]?>" >
			</td>
			<td height="40"><strong>Tên tác giả: </strong></td>
			<td><input name="tentacgia" type="text" value="<?php echo $row["pd_author"]?>" /></td>
		  </tr>
		  <tr>
			<td height="37"><strong>Giá:  </strong></td>
			<td><input name="gia" type="text" value="<?php echo $row["pd_price"]?>" ></td>
			<td height="37"><strong>Số lượng: </strong></td>
			<td><input name="soluong" type="text" value="<?php echo $row["pd_qty"]?>" /></td>
		  </tr>
		  <tr>
			<td height="37"><strong>Mục:  </strong></td>
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
				<?php /*?><select name="cat_id" >
			        <?php
				 	while($row_category = mysql_fetch_array($category)) {
						if($row_category["cat_id"] == $row["cat_id"]) {
				 ?>
			        <option value="<?php echo $row_category["cat_id"] ?>" selected = "selected" ><?php echo $row_category["cat_name"] ?></option>
			        <?php
						}else {			
				 ?>
                 	<option value="0">Tạo danh mục cha</option>
			        <option value="<?php echo $row_category["cat_id"] ?>" style="font-style:italic; font-size:15px; color:#C00"><?php echo $row_category["cat_name"] ?></option>
                    
			        <?php						
					}
				}
				 ?>
	          </select><?php */?>

			</td>
		  </tr>
		  <tr>
			<td height="41"><strong>Ảnh minh họa:</strong> </td>
			<td colspan="3">
				 <input id="img_prd" name="anhminhhoa" type="file" />
				
				 <br />
				 <img src="../images/<?php echo $row['pd_image'] ?>" alt="Image" width="150" height="200" id="blah1">
			</td>
		  </tr>
		  <tr>
			<td><strong>Nội dung:  </strong></td>
			<td colspan="3">
				<textarea name="noidung" cols="100" rows="5"><?php echo $row["pd_description"] ?></textarea>
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