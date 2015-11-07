<?php
	include("modules/editor/editor1.php");

	$sql = "select * from tbl_product where pd_id ='$_GET[id]' ";
	
	$baiviet = mysql_query($sql);
	
	$row = mysql_fetch_array($baiviet);
	
	
	
?>
<form action="modules/baiviet/xuly.php?id= <?php echo $row["pd_id"] ?>" method="post" enctype="multipart/form-data">	
	<div class="left" >	
		<table width="98%" height="252" border="0">
		  <tr>
			<td height="37" colspan="3"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG SỬA BÀI VIẾT  </strong></div></td>
		  </tr>
		  <tr>
			<td width="137" height="40"><strong>Tên sản phẩm: </strong></td>
			<td colspan="2">
				<input name="tenbaiviet" type="text" value="<?php echo $row["pd_name"]?>" >
			</td>
		  </tr>
		  <tr>
			<td height="37"><strong>Giá:  </strong></td>
			<td colspan="2"><input name="gia" type="text" value="<?php echo $row["pd_price"]?>" ></td>
		  </tr>
		  <tr>
			<td height="37"><strong>Số lượng:  </strong></td>
			<td colspan="2"><input name="soluong" type="text" value="<?php echo $row["pd_qty"]?>" ></td>
		  </tr>
		  <tr>
			<td height="37"><strong>Mục:  </strong></td>
			<?php
				
				$sql1 = "
							SELECT	cat_id, cat_name
							FROM	tbl_category;
						";
				$category = mysql_query($sql1);
			?>
			<td colspan="2">
				<select name="cat_id" >
			        <?php
				 	while($cat_id = mysql_fetch_array($category)) {
						if($cat_id["cat_id"] == $row["cat_id"]) {
				 ?>
			        <option value="<?php echo $cat_id["cat_id"] ?>" selected = "selected" ><?php echo $cat_id["cat_name"] ?></option>
			        <?php
						}else {			
				 ?>
			        <option value="<?php echo $cat_id["cat_id"] ?>" ><?php echo $cat_id["cat_name"] ?></option>
			        <?php
						}
					}
				 ?>
	          </select>

			</td>
		  </tr>
		  <tr>
			<td height="41"><strong>Ảnh minh họa:</strong> </td>
			<td colspan="2">
				 <input id="img_prd" name="anhminhhoa" type="file" />
				
				 <br />
				 <img src="../../images/<?php echo $row['pd_image'] ?>" alt="Image" width="300" height="200" id="blah1">
			</td>
		  </tr>
		  <tr>
			<td><strong>Nội dung:  </strong></td>
			<td colspan="2">
				<textarea name="noidung" cols="30" rows="5"><?php echo $row["pd_description"] ?></textarea>
			</td>
		  </tr>
		  <tr>
			<td height="42">&nbsp;</td>
			<td width="266"><input name="sua" type="submit" id="sua" value="   Sửa   ">
			&nbsp;</td>
			<td width="610"><input name="reset" type="reset" id="reset" value="   Hủy   ">
			&nbsp;</td>
		  </tr>
	  </table>
	</div>
</form>