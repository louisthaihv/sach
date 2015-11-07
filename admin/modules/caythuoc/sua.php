<?php
	include("modules/editor/editor1.php");
	
?>


<?php
	$sql = "select * from caythuoc where maCaythuoc = '$_GET[id]' ";
	
	$caythuoc = mysql_query($sql);
	
	$row = mysql_fetch_array($caythuoc);
	
	
	
?>
<form action="modules/caythuoc/xuly.php?id= <?php echo $row["maCaythuoc"] ?>" method="post" enctype="multipart/form-data">	
	<div class="left" >	
	  <table width="98%" height="35%" border="0" >
		<tr>
		  <td height="21" colspan="4"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG SỬA CÂY THUỐC</strong></div></td>
		</tr>
		<tr>
		  <td width="166" height="37"><strong>Tên cây thuốc: </strong></td>
		  <td width="299">
				  <input name="tencaythuoc" type="text" id="tenCT" value="<?php echo $row["tenCaythuoc"] ?>">		  </td>
		  <td width="285" height="37" rowspan="2"><strong>Mô tả: </strong></td>
		  <td width="260" rowspan="2"><textarea name="mota" cols="25" rows="2"><?php echo $row["moTa"] ?></textarea>
  &nbsp;</td>
	    </tr>
		<tr>
		  <td height="11"><strong>Tên khác: </strong></td>
		  <td><input name="tenkhac" type="text" value="<?php echo $row["tenKhac"] ?>" />
  &nbsp;</td>
	    </tr>
		<tr>
		  <td><strong>Tên khoa hoc: </strong></td>
		  <td><input name="tenkhoahoc" type="text" value="<?php echo $row["tenKhoahoc"] ?>" />
  &nbsp;</td>
		  <td height="17" rowspan="3"><strong>Thu hai: </strong></td>
		  <td rowspan="3"><textarea name="thuhai" cols="25" rows="2"><?php echo $row["thuHai"] ?></textarea>
  &nbsp;</td>
	    </tr>
		<tr>
		  <td><strong>Họ:</strong></td>
		  <td><input name="ho" type="text" value="<?php echo $row["ho"] ?>" /></td>
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
				$sql1= "select * from `caythuoc-tacdung` where `maCaythuoc` = '$_GET[id]' ";
				$thuoctd= mysql_query($sql1);
		
				$chuoi = "";
				$dem=0;$arr[20];
				while($row_thuoctd = mysql_fetch_array($thuoctd)) {
					
					$arr[$dem]=$row_thuoctd['maTacdung'];
					//$chuoi = $chuoi.' '.$row_thuoctd['maTacdung'];
					$dem++;
					
				}
				//echo "dem..."." ".$dem."<br/>";
				
				//echo "chuoi..."." ".$chuoi."<br/>";
				//$mang = explode($chuoi,' ');
				//echo "mang..."." ".$mang."<br/>";
				//echo "count-mang..."." ".count($mang);

			 	while($row_tacdung = mysql_fetch_array($tacdung)) {
					//while($row_thuoctd = mysql_fetch_array($thuoctd)){
			 ?>
             <div>
		       <?php echo ++$stt;?><input type="checkbox" name="matacdung[]" value="<?php echo $row_tacdung["maTacdung"]?>"<?php for($i=0;$i<$dem;$i++){if($row_tacdung['maTacdung'] == $arr[$i]) echo 'checked'; } ?>> <?php echo $row_tacdung["tenTacdung"] ?>
              	
            </div>
		      <?php
					//}
				}
			 ?></td>
		  <td><strong>Thành phần hóa học:</strong></td>
		  <td><textarea name="thanhphanhoahoc" cols="25" rows="2"><?php echo $row["thanhPhanHoaHoc"] ?></textarea>
  &nbsp;</td>
	    </tr>
		<tr>
		  <td height="26"><strong>Tác dụng dược lý: </strong></td>
		  <td><textarea name="tacdungduocly" cols="25" rows="2"><?php echo $row["tacDungDuocLy"] ?></textarea>
  &nbsp;</td>
	    </tr>
		
		<tr>
		  <td rowspan="2"><strong>Tên bệnh: </strong></td>
		  <td rowspan="2"><?php
				
				$sql = "
							SELECT	*
							FROM	`benh`
							ORDER BY `tenBenh` ASC
						";
				$benh = mysql_query($sql);
				$stt=0;
			$sql2= "select * from `caythuoc-benh` where `maCaythuoc` = '$_GET[id]' ";
				$thuocbenh= mysql_query($sql2);
		
				$chuoi = "";
				$dem2=0;$arr2[20];
				while($row_thuocbenh = mysql_fetch_array($thuocbenh)) {
					
					$arr2[$dem2]=$row_thuocbenh['maBenh'];
				
					$dem2++;
					
				}
			
			 	while($row_benh = mysql_fetch_array($benh)) {
					
			 ?>
             <div>
		       <?php echo ++$stt;?><input type="checkbox" name="mabenh[]" value="<?php echo $row_benh["maBenh"]?>"<?php for($i=0;$i<$dem2;$i++){if($row_benh['maBenh'] == $arr2[$i]) echo 'checked'; } ?>> <?php echo $row_benh["tenBenh"] ?>
              	
            </div>
		      <?php

				}
			 ?></td>
		  <td><strong>Công dụng: </strong></td>
		  <td><textarea name="congdung" cols="25" rows="2"><?php echo $row["congDung"] ?></textarea>
  &nbsp;</td>
	    </tr>
		<tr>
		  <td><strong>Đơn thuốc: </strong></td>
		  <td><textarea name="donthuoc" cols="25" rows="2"><?php echo $row["donThuoc"] ?></textarea>
  &nbsp;</td>
	    </tr>
		
		<tr>
		  <td height="26">&nbsp;</td>
	      <td height="26"><input name="sua" type="submit" id="sua" value="  Sửa   " /></td>
	      <td height="26"><input name="reset" type="reset" id="reset" value="   Hủy   " />	        <a href="index.php?quanly=caythuoc&ac=lietke" ></a></td>
	      <td height="26"><a href="index.php?quanly=caythuoc&amp;ac=lietke" >Trở lại trang liệt kê cây thuốc</a></td>
        </tr>
	  </table>
	</div>
</form>