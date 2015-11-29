<?php

	if(!isset($_GET['page'])) {// neu khong ton tai bien page thi cho page=1
		$_GET['page']=1;
	}	
	$start=($_GET['page']-1)*10;//tinh vi tri bat dau lay so dong tin.limit 0,x, lay x dong tren 1 trang 
	$sql = "select * from tbl_category order by cat_id DESC limit $start,10";	
	$danhmuc = mysql_query($sql);
	
?>
<div>
<a href="index.php?role_id=<?php echo $_GET['role_id'] ?>&quanly=danhmuc&ac=them"><input style="margin:5 600 10 5; padding:5px " type="button" name="themdanhmuc" value="Thêm danh mục mới"  /></a>
	<table width="99%" height="105" border="1" id="custom">
	  <tr class="doimaunen">
		<td width="47" height="42"><div align="center"><strong>STT</strong></div></td>
		<td width="178"><div align="center"><strong>Tên danh mục</strong></div></td>
		<td width="191"><div align="center"><strong>Danh mục cha</strong></div></td>
		<td width="527"><div align="center"><strong>Nội dung</strong></div></td>
		<td><div align="center"><strong>Sửa</strong></div></td>
	    <td><div align="center"><strong>Xóa</strong></div></td>
	  </tr>
<?php	
	$stt = 1;
	if(mysql_num_rows($danhmuc)!=0){
		while ($row = mysql_fetch_array($danhmuc)) {	
		$sql1 = "
							SELECT	cat_name
							FROM	tbl_category
							WHERE 	cat_id=".$row['cat_parent_id'];
				$cate = mysql_query($sql1);
				$row_cat = mysql_fetch_array($cate);
?>
	  <tr >
		<td height="36"><div align="center"><?php echo $stt++; ?></div></td>
		<td><?php echo $row['cat_name']; ?></td>
		<td><?php echo $row_cat['cat_name']; ?></td>
		<td><?php echo $row['cat_description']; ?></td>
		<td width="48">
			<a href="index.php?role_id=<?php echo $_GET['role_id'] ?>&quanly=danhmuc&ac=sua&id=<?php echo $row["cat_id"] ?>">
				<div align="center" ><img src="img/sua.png" /></div>
	  	  	</a>		
		</td>
		<td width="51">
			<a onclick="return confirmAction()" href="modules/danhmuc/xuly.php?role_id=<?php echo $_GET['role_id'] ?>&xoa=danhmuc&id= <?php echo $row["cat_id"] ?>">
				<div align="center" ><img src="img/xoa.png" /></div>
		  </a>		
		</td>
	  </tr>
<?php
		}//dong while		
		//goi lai select de dem lai bien $count
		$sql = "select * from tbl_category;";
		$danhmuc = mysql_query($sql);
		
		//dem tong so dong tin trong csdl cua table benh
		$count = mysql_num_rows($danhmuc);
		
		//tinh tong so trang, lay tong so dong tin chia so dong tin tren moi trang
		$tongsotrang = floor($count/10)+1;
	echo "<div id=lietke>";				
			if($_GET['page']>1) {//neu trang >1 thi tao nut Back
				echo '   <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=danhmuc&ac=lietke&page='.($_GET['page']-1).' "  >Back</a>  ';
			}
		
		//dua ra cac trang dau
		for($i=1; $i<= $tongsotrang ; $i++){		
			if($i==$_GET['page']) {//cho biet chi so trang dang hien			
				echo ' Trang  '.$i;				
			} else {			
				echo '  <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=danhmuc&ac=lietke&page='.$i.' ">   Trang '.$i. '</a>  ';
			}	
		}//dong for
		
		if($_GET['page'] < $tongsotrang) {//tao nut Next neu trang lon hon tongsotrang
			echo '  <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=danhmuc&ac=lietke&page='.($_GET['page']+1).  ' "  >   Next</a>  ';
		}
	echo "</div>";	
	}//dong if
	mysql_free_result($danhmuc);
?>
  </table>
</div>