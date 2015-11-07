<?php
	include("modules/editor/editor1.php");
?>
<form action="modules/baiviet/xuly.php" method="post" enctype="multipart/form-data">	
	<div class="left" >	
		<table width="98%" height="252" border="0">
		  <tr>
			<td height="37" colspan="3"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG THÊM BÀI VIẾT  </strong></div></td>
		  </tr>
		  <tr>
			<td width="137" height="40"><strong>Tên sản phẩm: </strong></td>
			<td colspan="2">
				<input name="tenbaiviet" type="text" value="" >
			</td>
		  </tr>
		  <tr>
			<td height="37"><strong>Giá:  </strong></td>
			<td colspan="2"><input name="gia" type="text" value="" ></td>
		  </tr>
		  <tr>
			<td height="37"><strong>Số lượng:  </strong></td>
			<td colspan="2"><input name="soluong" type="text" value="" ></td>
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
				 ?>
			        <option value="<?php echo $cat_id["cat_id"] ?>"><?php echo $cat_id["cat_name"] ?></option>
			        <?php
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
				 <img src="" alt="Image" width="300" height="200" id="blah1">
			</td>
		  </tr>
		  <tr>
			<td><strong>Nội dung:  </strong></td>
			<td colspan="2">
				<textarea name="noidung" cols="30" rows="5"></textarea>
			</td>
		  </tr>
		  <tr>
			<td height="42">&nbsp;</td>
			<td width="266"><input name="them" type="submit" value="  Thêm  ">
			&nbsp;</td>
			<td width="610"><input name="reset" type="reset" id="reset" value="   Hủy   ">
			&nbsp;</td>
		  </tr>
	  </table>
	</div>
</form>
