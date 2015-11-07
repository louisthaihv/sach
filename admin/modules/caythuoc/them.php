<?php
	include("modules/editor/editor1.php");
?>


<form action="modules/caythuoc/xuly.php" method="post" enctype="multipart/form-data">
	<div >	
	  <table width="99%" height="30%" border="0">
		<tr>
		  <td height="23" colspan="4"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG THÊM CÂY THUỐC MỚI </strong></div></td>
		</tr>
		<tr>
		  <td width="127" height="39"><strong>Tên cây thuốc: </strong></td>
		  <td width="271"><input name="tencaythuoc" type="text" id="tencaythuoc"></td>
		  <td width="204" height="39" rowspan="2"><strong>Mô tả: </strong></td>
		  <td width="419" rowspan="2"><textarea name="mota" cols="25" rows="2"></textarea>
		    &nbsp;</td>
	    </tr>
		<tr>
		  <td height="12"><p><strong>Tên khác:</strong></p>
		    <p>&nbsp;</p></td>
		  <td><input name="tenkhac" type="text" />
		    &nbsp;</td>
	    </tr>
		<tr>
		  <td><strong>Tên khoa hoc: </strong></td>
		  <td><input name="tenkhoahoc" type="text" />
  &nbsp;</td>
		  <td height="18" rowspan="3"><strong>Thu hái: </strong></td>
		  <td rowspan="3"><textarea name="thuhai" cols="25" rows="2"></textarea>
		    &nbsp;</td>
	    </tr>
		<tr>
		  <td><strong>Họ:</strong></td>
		  <td><input name="ho" type="text" /></td>
	    </tr>
		<tr>
		  <td height="26"><p><strong>Ảnh:</strong></p></td>
		  <td><input name="anh" type="file" /></td>
	    </tr>
		<tr>
		  <td rowspan="2"><strong>Tên tác dụng: </strong></td>
		  <td rowspan="2"><?php
				
				$sql = "
							SELECT	*
							FROM	`tacdung`
							ORDER BY `tenTacdung` ASC 
						";
				$tacdung = mysql_query($sql);
			
			 	while($row_tacdung = mysql_fetch_array($tacdung)) {
			 ?>
             <div>
		       <?php echo ++$stt;?><input type="checkbox" name="matacdung[]" value="<?php echo $row_tacdung["maTacdung"] ?>"><?php echo $row_tacdung["tenTacdung"] ?>
            </div>
		      <?php
				}
			 ?>
	       </td>
		  <td><strong>Thành phần hóa học:</strong></td>
		  <td><textarea name="thanhphanhoahoc" cols="25" rows="2"></textarea>
  &nbsp;</td>
	    </tr>
		<tr>
		  <td><strong><strong>Tác dụng dược lý: </strong></td>
		  <td><textarea name="tacdungduocly" cols="25" rows="2"></textarea>
  &nbsp;</td>
	    </tr>
		
		<tr>
		  <td rowspan="2"><strong>Tên bệnh:</strong></td>
		  <td rowspan="2"><?php
				
				$sql = "
							SELECT	*
							FROM	`benh`
							ORDER BY `tenBenh` ASC
						";
				$benh = mysql_query($sql);
				$stt=0;
			while($row_benh = mysql_fetch_array($benh)) {
			 ?>
             <div>
		      <?php echo ++$stt;?><input type="checkbox" name="mabenh[]" value="<?php echo $row_benh["maBenh"] ?>"><?php echo $row_benh["tenBenh"] ?>
            </div>
		      <?php
				}
			 ?>
	        </td>
		  <td><strong>Công dụng: </strong></td>
		  <td><textarea name="congdung" cols="25" rows="2"></textarea>
  &nbsp;</td>
	    </tr>
		<tr>
		  <td><strong>Đơn thuốc: </strong></td>
		  <td><textarea name="donthuoc" cols="25" rows="2"></textarea>
  &nbsp;</td>
	    </tr>
		
			  <tr>
				<td height="26">&nbsp;</td>
				<td>
			    <input name="them" type="submit" id="them" value="   Thêm   ">				</td>
				<td><input name="reset" type="reset" id="reset" value="   Hủy   " />
                <a href="index.php?quanly=caythuoc&ac=lietke" ></a>                </td>
				<td><a href="index.php?quanly=caythuoc&amp;ac=lietke" >Trở lại trang liệt kê cây thuốc</a></td>
			  </tr>
	  </table>
	</div>
</form>