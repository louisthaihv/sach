
<?php
	
	
	if(!isset($_GET['page'])) {// neu khong ton tai bien page thi cho page=1
		$_GET['page']=1;
	}
	
	$start=($_GET['page']-1)*10;//tinh vi tri bat dau lay so dong tin.limit 0,10, lay 10 dong tren 1 trang 
	
	$sql = "select * from log limit $start,10";
	
	$log = mysql_query($sql);

?>
<div class="right" style="padding-right:40px; margin-top:40px">	
	<table width="450" height="97" border="1" id="custom">
	  <tr class="doimaunen">
		<td width="61"><div align="center"><strong>STT</strong> </div></td>
		<td width="106"><div align="center"><strong>Mã người dùng</strong> </div></td>
		<td width="102"><div align="center"><strong>Ngày thay đổi</strong> </div></td>
		<td width="111"><div align="center"><strong>Nội dung</strong> </div></td>
		<td width="36"><div align="center"><strong>Xóa</strong></div></td>
	  </tr>
	   
	<?php
	
		$stt = 1;
		if(mysql_num_rows($log)!=0){
		
			while ($row = mysql_fetch_array($log)) {	
				
			
	?>
	  <tr>
		<td height="34"><div align="center"><?php  echo $stt++ ?></div></td>
		<td><?php echo $row[0] ?></td>
		<td><?php echo $row[1] ?></td>
		<td><?php echo $row[2] ?></td>
		<td>
			<a href="modules/log/xuly.php?xoa=log&id= <?php echo $row["maNguoidung"] ?>">
				<div align="center" ><img src="img/xoa.png" /></div>
			</a>		</td>
	  </tr>
	  
	 <?php
	 
			}//dong while
			//goi lai select de dem lai bien $count
			$sql = "select * from log";
			$log = mysql_query($sql);
			
			//dem tong so dong tin trong csdl cua table benh
			$count = mysql_num_rows($log);
			
			//printf($count);
			
			//tinh tong so trang, lay tong so dong tin chia so dong tin tren moi trang
			$tongsotrang = floor($count/10)+1;
			//printf($tongsotrang);
			
			
				if($_GET['page']>1) {//neu trang >1 thi tao nut Back
					echo '   <a href = "index.php?quanly=log&ac=them&page='.($_GET['page']-1).' ">Back</a>  ';
				}
			
			//dua ra cac rang
			for($i=1; $i<= $tongsotrang; $i++){
			
				if($i==$_GET['page']) {//cho biet chi so trang dang hien
				
					echo '  Trang  '.$i;
					
				} else {
				
					echo '  <a href = "index.php?quanly=log&ac=them&page='.$i.' ">   Trang  '.$i.   '</a>  ';
					
				}	
			}//dong for
			
			if($_GET['page'] < $tongsotrang) {//tao nut Next neu trang lon hon tongsotrang
				echo '  <a href = "index.php?quanly=log&ac=them&page='.($_GET['page']+1).  ' ">   Next</a>  ';
			}
		}//dong if
	 ?>
	</table>
</div>
