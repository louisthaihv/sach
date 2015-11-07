<?php
	
	
	if(!isset($_GET['page'])) {// neu khong ton tai bien page thi cho page=1
		$_GET['page']=1;
	}
	
	$start=($_GET['page']-1)*10;//tinh vi tri bat dau lay so dong tin.limit 0,10, lay 10 dong tren 1 trang 

	$sql = "select * from tbl_product limit $start,10";
	
	$baiviet = mysql_query($sql);
	
	
?>
<div >
	<table width="98%" height="105" border="1" id="custom">
	  <tr class="doimaunen">
		<td width="29" height="43"><div align="center"><strong>STT</strong></div></td>
		<td width="143"><div align="center"><strong>Tên sản phẩm</strong></div></td>
		<td width="143"><div align="center"><strong>Danh mục</strong></div></td>
		<td width="400"><div align="center"><strong>Thông tin chi tiết</strong></div></td>
		<td width="40"><div align="center"><strong>Giá</strong></div></td>
		<td width="40"><div align="center"><strong>Số lượng</strong></div></td>
		<td width="121"><div align="center"><strong>Ảnh </strong></div></td>
		<td><div align="center"><strong>Sửa</strong></div></td>
	    <td><div align="center"><strong>Xóa</strong></div></td>
	  </tr>
	  
<?php
	
	$stt = 1;

	if(mysql_num_rows($baiviet)!=0){
	
		while ($row = mysql_fetch_array($baiviet)) {	
			//printf("Ten: %s  Tom: %s  Noi: %s", $row["tenBaiviet"], $row["tomTat"], $row["noiDung"]);
			//printf($row["maBaiViet"]);
			//printf($_GET["id"]);
			//if($row["maBaiViet"] == $_GET["id"]) {
		$sql1 = "
							SELECT	cat_name
							FROM	tbl_category
							WHERE 	cat_id=".$row['cat_id'];
				$cate = mysql_query($sql1);
				$row_cat = mysql_fetch_array($cate);

?>			

	  <tr >
		<td height="54"><div align="center"><?php echo $stt++; ?></div></td>
		<td><?php echo $row['pd_name']; ?></td>
		<td><?php echo $row_cat['cat_name']; ?></td>
		<td><div  style="width:400px; height:200px; overflow:scroll"><?php echo $row['pd_description']; ?></div></td>
		<td><?php echo $row['pd_price']; ?></td>
		<td><?php echo $row['pd_qty']; ?></td>
		<td><img width="120" height="120" src="../../images/<?php echo $row['pd_image'];?>" /></td>
		<td width="32">
			
			<a href="index.php?quanly=baiviet&ac=sua&id= <?php echo $row["pd_id"] ?>">
				<div align="center" ><img src="img/sua.png" /></div>
	  	  	</a>		
		</td>
		<td width="32">
			<a href="modules/baiviet/xuly.php?xoa=baiviet&id= <?php echo $row["pd_id"] ?>">
				<div align="center" ><img src="img/xoa.png" /></div>
		  </a>		
		</td>
	  </tr>
<?php
			//}
		}//dong while
		
		//goi lai select de dem lai bien $count
		$sql = "select * from tbl_product;";
		$baiviet = mysql_query($sql);
		
		//dem tong so dong tin trong csdl cua table benh
		$count = mysql_num_rows($baiviet);
		
		//printf($count);
		
		//tinh tong so trang, lay tong so dong tin chia so dong tin tren moi trang
		$tongsotrang = floor($count/10)+1;
		//printf($tongsotrang);
		
		
			if($_GET['page']>1) {//neu trang >1 thi tao nut Back
				echo '   <a href = "index.php?quanly=baiviet&ac=them&page='.($_GET['page']-1).' ">Back</a>  ';
			}
		
		//dua ra cac rang
		for($i=1; $i<= $tongsotrang; $i++){
		
			if($i==$_GET['page']) {//cho biet chi so trang dang hien
			
				echo '  Trang  '.$i;
				
			} else {
			
				echo '  <a href = "index.php?quanly=baiviet&ac=them&page='.$i.' ">   Trang  '.$i.   '</a>  ';
				
			}	
		}//dong for
		
		if($_GET['page'] < $tongsotrang) {//tao nut Next neu trang lon hon tongsotrang
			echo '  <a href = "index.php?quanly=baiviet&ac=them&page='.($_GET['page']+1).  ' ">   Next</a>  ';
		}
		
	}//dong if
	mysql_free_result($baiviet);
?>
  </table>
</div>