<head>
	<meta charset="utf-8"
</head>

<?php
	
	
	if(!isset($_GET['page'])) {// neu khong ton tai bien page thi cho page=1
		$_GET['page']=1;
	}
	
	$start=($_GET['page']-1)*10;//tinh vi tri bat dau lay so dong tin.limit 0,10, lay 10 dong tren 1 trang 
	
	$sql = "select * from tacdung limit $start,10";
	
	$tacdung = mysql_query($sql);
	
	
?>
<div class="right" style="padding-right:50px; margin-top:40px">
		<table width="400" height="91" border="1" id="custom">
		  <tr class="doimaunen">
			<td width="29" height="49"><div align="center"><strong>STT</strong></div></td>
			<td width="344"><div align="center"><strong>Tên tác dụng </strong></div></td>
			<td><div align="center"><strong>Sửa</strong></div></td>
		    <td><div align="center"><strong>Xóa</strong></div></td>
		  </tr>
		  
<?php

	$stt = 1;
	
	if(mysql_num_rows($tacdung)!=0){
	
		while ($row = mysql_fetch_array($tacdung)) {	
			//printf("Ten: %s  Tom: %s  Noi: %s", $row["tenBaiviet"], $row["tomTat"], $row["noiDung"]);
		
?>

		  <tr>
			<td height="36"><div align="center"><?php echo $stt++; ?></div></td>
			<td><?php echo $row[1] ?></td>
			<td width="32">
					
				<a href="index.php?quanly=tacdung&ac=sua&id= <?php echo $row["maTacdung"] ?>">
					<div align="center" ><img src="img/sua.png" /></div>
		  	  </a>			
			</td>
			<td width="32">
				<a href="modules/tacdung/xuly.php?xoa=tacdung&id= <?php echo $row["maTacdung"] ?>">
					<div align="center"><img src="img/xoa.png" /></div>	
			  </a>		
			</td>
		  </tr>
<?php
		}//dong while
		
		//goi lai select de dem lai bien $count
		$sql = "select * from tacdung";
		$tacdung = mysql_query($sql);
		
		//dem tong so dong tin trong csdl cua table benh
		$count = mysql_num_rows($tacdung);
		
		//printf($count);
		
		//tinh tong so trang, lay tong so dong tin chia so dong tin tren moi trang
		$tongsotrang = floor($count/10)+1;
		//printf($tongsotrang);
		
		
			if($_GET['page']>1) {//neu trang >1 thi tao nut Back
				echo '   <a href = "index.php?quanly=tacdung&ac=them&page='.($_GET['page']-1).' ">Back</a>  ';
			}
		
		//dua ra cac rang
		for($i=1; $i<= $tongsotrang; $i++){
		
			if($i==$_GET['page']) {//cho biet chi so trang dang hien
			
				echo '  Trang  '.$i;
				
			} else {
			
				echo '  <a href = "index.php?quanly=tacdung&ac=them&page='.$i.' ">   Trang  '.$i.   '</a>  ';
				
			}	
		}//dong for
		
		if($_GET['page'] < $tongsotrang) {//tao nut Next neu trang lon hon tongsotrang
			echo '  <a href = "index.php?quanly=tacdung&ac=them&page='.($_GET['page']+1).  ' ">   Next</a>  ';
		}
	}//dong if
?>
  </table>
</div>		
