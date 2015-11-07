<?php
	
	
	if(!isset($_GET['page'])) {// neu khong ton tai bien page thi cho page=1
		$_GET['page']=1;
	}
	
	$start=($_GET['page']-1)*10;//tinh vi tri bat dau lay so dong tin.limit 0,10, lay 10 dong tren 1 trang 
	
	$sql = "select * from benh limit $start,10";//gioi han 10 dong lay ra
	
	$benh = mysql_query($sql);
	
?>

<div class="right" style="padding-right:50px; margin-top:40px">
		<table width="451" height="97" border="1" id="custom">
		  <tr class="doimaunen">
			<td width="37" height="49"><div align="center"><strong>STT</strong></div></td>
			<td width="314"><div align="center"><strong>Tên bệnh </strong></div></td>
			<td><div align="center"><strong>Sửa</strong></div></td>
		    <td><div align="center"><strong>Xóa</strong></div></td>
		  </tr>
		  
<?php

	$stt = 1;
	if(mysql_num_rows($benh)!=0){
		while ($row = mysql_fetch_array($benh)) {	
		
?>
		  <tr>
			<td height="40"><div align="center"><? echo $stt++; ?></div></td>
			<td><? echo $row[1]?></td>
			<td width="36">
					
				<a href="index.php?quanly=benh&ac=sua&id= <?php echo $row["maBenh"] ?>">
					<div align="center" ><img src="img/sua.png" /></div>
			  </a>			
		    </td>
			<td width="36">
				<a href="modules/benh/xuly.php?xoa=benh&id= <?php echo $row["maBenh"] ?>">
					<div align="center"><img src="img/xoa.png" /></div>			
			  </a>
			</td>
				
		  </tr>
<?php
		}//dong while
		
		//goi lai select de dem lai bien $count
		$sql = "select * from benh";
		$benh = mysql_query($sql);
		
		//dem tong so dong tin trong csdl cua table benh
		$count = mysql_num_rows($benh);
		
		//printf($count);
		
		//tinh tong so trang, lay tong so dong tin chia so dong tin tren moi trang
		$tongsotrang = floor($count/10)+1;
		//printf($tongsotrang);
		
		
			if($_GET['page']>1) {//neu trang >1 thi tao nut Back
				echo '   <a href = "index.php?quanly=benh&ac=them&page='.($_GET['page']-1).' ">Back</a>  ';
			}
		
		//dua ra cac rang
		for($i=1; $i<= $tongsotrang; $i++){
		
			if($i==$_GET['page']) {//cho biet chi so trang dang hien
			
				echo '  Trang  '.$i;
				
			} else {
			
				echo '  <a href = "index.php?quanly=benh&ac=them&page='.$i.' ">   Trang  '.$i.   '</a>  ';
				
			}	
		}//dong for
		
		if($_GET['page'] < $tongsotrang) {//tao nut Next neu trang lon hon tongsotrang
			echo '  <a href = "index.php?quanly=benh&ac=them&page='.($_GET['page']+1).  ' ">   Next</a>  ';
		}
	}//dong if

?>
  </table>
</div>		
