<?php

	if(!isset($_GET['page'])) {// neu khong ton tai bien page thi cho page=1
		$_GET['page']=1;
	}	
	$start=($_GET['page']-1)*5;//tinh vi tri bat dau lay so dong tin.limit 0,5, lay 5 dong tren 1 trang 
	
	if(isset($_POST['cat_id']) && $_POST['cat_id']!= 'all'){
		$sql = "select * from tbl_product where cat_id = {$_POST['cat_id']} order by pd_id DESC limit $start,5";	
	} else {
		$sql = "select * from tbl_product order by pd_id DESC limit $start,5";	
	}
	$sach = mysql_query($sql);
	
?>
<div>
<a href="index.php?quanly=sach&role_id=<?php echo $_GET['role_id'] ?>&ac=them"><input style="margin:0 50 20 20; padding:5px ; float:left" type="button" name="themsach" value="Thêm sách mới"  /></a>
<form action="" method="post" style="margin-top:20px;">
	<?php				
				$sql1 = "
							SELECT	cat_id, cat_name
							FROM	tbl_category
							WHERE cat_parent_id = 0
						";
				$category = mysql_query($sql1);
			?>
				<select name="cat_id"  style="  padding:5px">
                <option value="all">  Tất cả  </option>
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
     <input type="submit" name="loc" value=" Lọc " style="  padding:5px" />
</form>
	<table width="99%" height="204" border="1" id="custom">
	  <tr class="doimaunen">
		<td width="31" height="42"><div align="center"><strong>STT</strong></div></td>
		<td width="70"><div align="center"><strong>Tên sản phẩm</strong></div></td>
		<td width="66"><div align="center"><strong>Tác giả</strong></div></td>
		<td width="120"><div align="center"><strong>Danh mục</strong></div></td>
		<td width="430"><div align="center"><strong>Thông tin chi tiết</strong></div></td>
		<td width="83"><div align="center"><strong>Giá</strong></div></td>
		<td width="64"><div align="center"><strong>Số lượng</strong></div></td>
		<td width="90"><div align="center"><strong>Ảnh </strong></div></td>
		<td><div align="center"><strong>Sửa</strong></div></td>
	    <td><div align="center"><strong>Xóa</strong></div></td>
	  </tr>
<?php	
	$stt = 1;
	if(mysql_num_rows($sach)!=0){
		while ($row = mysql_fetch_array($sach)) {	
		$sql1 = "
							SELECT	cat_name
							FROM	tbl_category
							WHERE 	cat_id=".$row['cat_id'];
				$cate = mysql_query($sql1);
				$row_cat = mysql_fetch_array($cate);
?>
	  <tr >
		<td height="154"><div align="center"><?php echo $stt++; ?></div></td>
		<td><?php echo $row['pd_name']; ?></td>
		<td><?php echo $row['pd_author']; ?></td>
		<td><?php echo $row_cat['cat_name']; ?></td>
		<td><div  style="width:430px; height:150px; overflow:scroll"><?php echo $row['pd_description']; ?></div></td>
		<td><?php echo $row['pd_price']; ?></td>
		<td><?php echo $row['pd_qty']; ?></td>
		<td><img width="90" height="120" src="../images/<?php echo $row['pd_image'];?>" /></td>
		<td width="32">
			<a href="index.php?quanly=sach&ac=sua&role_id=<?php echo $_GET['role_id'] ?>&id= <?php echo $row["pd_id"] ?>">
				<div align="center" ><img src="img/sua.png" /></div>
	  	  	</a>		
		</td>
		<td width="32">
        	<?php /*?><a onclick="return confirmAction()" href="modules/sach/xuly.php?xoa=sach&id= <?php echo $row["pd_id"] ?>">Click Ngay</a>
			<input type="submit" onclick="confirmAction()" value="Click Ngay" /><?php */?>
			<a onclick="return confirmAction()" href="modules/sach/xuly.php?xoa=sach&role_id=<?php echo $_GET['role_id'] ?>&id= <?php echo $row["pd_id"] ?>">
				<div align="center" ><img src="img/xoa.png" /></div>
		  </a>		
		</td>
	  </tr>
<?php
		}//dong while
		
		//goi lai select de dem lai bien $count
		$sql = "select * from tbl_product;";
		$sach = mysql_query($sql);
		
		//dem tong so dong tin trong csdl cua table benh
		$count = mysql_num_rows($sach);
		
		//tinh tong so trang, lay tong so dong tin chia so dong tin tren moi trang
		$tongsotrang = floor($count/5)+1;
	echo "<div id=lietke style=margin-bottom:20px>";				
			if($_GET['page']>1) {//neu trang >1 thi tao nut Back
				echo '   <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=sach&ac=lietke&page='.($_GET['page']-1).' "  >Back</a>  ';
			}
		
		//dua ra cac trang dau
		for($i=1; $i<= $tongsotrang && $i<=2 ; $i++){		
			if($i==$_GET['page']) {//cho biet chi so trang dang hien			
				echo ' Trang  '.$i;				
			} else {			
				echo '  <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=sach&ac=lietke&page='.$i.' ">   Trang '.$i. '</a>  ';
			}	
		}//dong for
		//hien so trang rieng
		if($_GET['page'] < $tongsotrang-2 &&$_GET['page']>3) {
			echo '<a id="mau" href = "index.php?role_id='.$_GET['role_id'].'&quanly=sach&ac=lietke&page='.($_GET['page']).' " > ...Trang '.$_GET['page'].'...</a>  ';
		} else if ($_GET['page']==3){
			echo '<a id="mau" href = "index.php?role_id='.$_GET['role_id'].'&quanly=sach&ac=lietke&page='.($_GET['page']).' " >    Trang '.$_GET['page'].'...</a>  ';
		}else if ($_GET['page'] == $tongsotrang-2){
			echo '<a id="mau" href = "index.php?role_id='.$_GET['role_id'].'&quanly=sach&ac=lietke&page='.($_GET['page']).' " >...Trang '.$_GET['page'].'   </a>  ';
		}else {
			echo " ... ";
		}
		//dua ra cac trang cuoi
		for($i=$tongsotrang-1; $i<= $tongsotrang; $i++){		
			if($i==$_GET['page']) {//cho biet chi so trang dang hien			
				echo '  Trang  '.$i;				
			} else {			
				echo '  <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=sach&ac=lietke&page='.$i.' "  >   Trang  '.$i.'</a>  ';
			}	
		}//dong for
		
		if($_GET['page'] < $tongsotrang) {//tao nut Next neu trang lon hon tongsotrang
			echo '  <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=sach&ac=lietke&page='.($_GET['page']+1).  ' "  >   Next</a>  ';
		}
	echo "</div>";	
	}//dong if
	mysql_free_result($sach);
?>
  </table>
</div>