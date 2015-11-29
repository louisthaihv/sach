<?php
	include("modules/editor/editor1.php");
?>
<form action="modules/sach/xuly.php?role_id=<?php echo $_GET['role_id'] ?>" method="post" enctype="multipart/form-data" id="them_sach">	
	<div class="left" >	
		<table width="98%" height="252" border="0">
		  <tr>
			<td height="37" colspan="4"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG THÊM SÁCH  </strong></div></td>
		  </tr>
		  <tr>
			<td width="141" height="40"><strong>Tên sách: </strong>(<span class="required">*</span>)</strong></td>
			<td>
				<div id="tensach_err" style="color:red"></div>
				<input name="tensach" type="text" value="" required id="tensach">
			</td>
			<td height="40"><strong>Tên tác giả: </strong>(<span class="required">*</span>)</td>
			<td>
				<div id="tentacgia_err" style="color:red"></div>
				<input name="tentacgia" type="text" value="" required id="tentacgia"/>
			</td>
		  </tr>
		  <tr>
			<td height="37"><strong>Giá:  </strong>(<span class="required">*</span>)</td>
			<td>
				<div id="gia_err" style="color:red"></div>
				<input name="gia" type="text" value="" required id="gia">
			</td>
			<td height="37"><strong>Số lượng: </strong>(<span class="required">*</span>)</td>
			<td>
				<div id="soluong_err" style="color:red"></div>
				<input name="soluong" type="text" value="" required required id="soluong"/>
			</td>
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
			<td height="41"><strong>Ảnh minh họa:</strong> (<span class="required">*</span>)</td>
			<td colspan="3">
				<div id="anhminhhoa_err" style="color:red"></div>
				 <input id="img_prd" name="anhminhhoa" type="file" required id="anhminhhoa"/>
				
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
<script type="text/javascript">
(function (exports) {
    function valOrFunction(val, ctx, args) {
        if (typeof val == "function") {
            return val.apply(ctx, args);
        } else {
            return val;
        }
    }

    function InvalidInputHelper(input, options) {
        input.setCustomValidity(valOrFunction(options.defaultText, window, [input]));

        function changeOrInput() {
            if (input.value == "") {
                input.setCustomValidity(valOrFunction(options.emptyText, window, [input]));
            } else {
                input.setCustomValidity("");
            }
        }

        function invalid() {
            if (input.value == "") {
                input.setCustomValidity(valOrFunction(options.emptyText, window, [input]));
            } else {
               input.setCustomValidity(valOrFunction(options.invalidText, window, [input]));
            }
        }

        input.addEventListener("change", changeOrInput);
        input.addEventListener("input", changeOrInput);
        input.addEventListener("invalid", invalid);
    }
    exports.InvalidInputHelper = InvalidInputHelper;
})(window);



InvalidInputHelper(document.getElementById("tensach"), {
    defaultText: "Nhập tên sách!",
    emptyText: "Nhập tên sách!",
    
});
InvalidInputHelper(document.getElementById("tentacgia"), {
    defaultText: "Nhập tên tác giả!",
    emptyText: "Nhập tên tác giả!",
    
});
InvalidInputHelper(document.getElementById("gia"), {
    defaultText: "Nhập giá!",
    emptyText: "Nhập giá!",
    
});
InvalidInputHelper(document.getElementById("soluong"), {
    defaultText: "Nhập số lượng!",
    emptyText: "Nhập số lượng",
    
});
InvalidInputHelper(document.getElementById("anhminhhoa"), {
    defaultText: "Nhập ảnh!",
    emptyText: "Nhập ảnh!",
    
});
</script>