<?php
	
	
	if(!isset($_GET['page'])) {// neu khong ton tai bien page thi cho page=1
		$_GET['page']=1;
	}
	
	$start=($_GET['page']-1)*5;//tinh vi tri bat dau lay so dong tin.limit 0,10, lay 10 dong tren 1 trang 
	
	$sql = "select * from caythuoc limit $start,5";
	
	$caythuoc = mysql_query($sql);
	
?>
<div >
<table width="20%" border="0" ">
  <tr>
    <td width="144">
    	<div id="box-chucnang" >
        	<a href="index.php?quanly=caythuoc&ac=them" style="text-decoration:none"  >
						
						  <p><img src="img/them.png" /></p>
						  <p><strong><em>Thêm cây thuốc mới</em></strong></p>
			</a> 
        </div>
	</td>
    
  </tr>
</table>

		
		<table width="50%" height="100" border="1" id="custom">
		  <tr class="doimaunen" >
			<td width="33" height="38"><div align="center"><strong>STT</strong> </div></td>
			<td width="273"><div align="center"><strong>Tên cây thuốc  </strong></div>			  <div align="center"></div>			  <div align="center"></div></td>
			<td width="119"><div align="center"><strong>Ảnh</strong></div>			  <div align="center"></div></td>
			<td><div align="center"><strong>Sửa</strong></div></td>
		    <td><div align="center"><strong>Xóa</strong></div></td>
		  </tr>
		  
<?php

	$stt = 1;
	if(mysql_num_rows($caythuoc)!=0){
	
		while ($row = mysql_fetch_array($caythuoc)) {	
		
?>
		  <tr>
			<td height="40"><div align="center"><?php echo $stt++ ?></div></td>
			<td><?php echo $row[1] ?></td>
			<td><div align="center"><img width="90" height="90" border="0" src="img/<?php echo $row[4];?>" /></div></td>
			<td width="32">
				<a href="index.php?quanly=caythuoc&ac=sua&id= <?php echo $row["maCaythuoc"] ?>">
						<div align="center" ><img src="img/sua.png" /></div>
	 	    </a>			</td>
			<td width="34">
				<a href="modules/caythuoc/xuly.php?xoa=caythuoc&id= <?php echo $row["maCaythuoc"] ?>">
					<div align="center" ><img src="img/xoa.png" /></div>
			  </a>
			</td>
		  </tr>
<?php
		}//dong while
		
		//goi lai select de dem lai bien $count
		$sql = "select * from caythuoc";
		$caythuoc = mysql_query($sql);
		
		//dem tong so dong tin trong csdl cua table benh
		$count = mysql_num_rows($caythuoc);
		
		//printf($count);
		
		//tinh tong so trang, lay tong so dong tin chia so dong tin tren moi trang
		$tongsotrang = floor($count/5)+1;
		//printf($tongsotrang);
		
		
			if($_GET['page']>1) {//neu trang >1 thi tao nut Back
				echo '   <a href = "index.php?quanly=caythuoc&ac=lietke&page='.($_GET['page']-1).' ">Back</a>  ';
			}
		
		//dua ra cac rang
		for($i=1; $i<= $tongsotrang; $i++){
		
			if($i==$_GET['page']) {//cho biet chi so trang dang hien
			
				echo '  Trang  '.$i;
				
			} else {
			
				echo '  <a href = "index.php?quanly=caythuoc&ac=lietke&page='.$i.' ">   Trang  '.$i.   '</a>  ';
				
			}	
		}//dong for
		
		if($_GET['page'] < $tongsotrang) {//tao nut Next neu trang lon hon tongsotrang
			echo '  <a href = "index.php?quanly=caythuoc&ac=lietke&page='.($_GET['page']+1).  ' ">   Next</a>  ';
		}
	}//dong if
?>
  </table>
</div>		
