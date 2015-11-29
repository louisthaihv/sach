
<?php
	
	
	if(!isset($_GET['page'])) {// neu khong ton tai bien page thi cho page=1
		$_GET['page']=1;
	}
	
	$start=($_GET['page']-1)*10;//tinh vi tri bat dau lay so dong tin.limit 0,10, lay 10 dong tren 1 trang 
	
	$sql = "select * from tbl_role limit $start,10";
	
	$quyen = mysql_query($sql);
	
	
?>
<div class="right" style="padding-right:100px; margin-top:40px">
		<table width="508" height="100" border="1" id="custom">
		  <tr class="doimaunen">
			<td width="44" height="49"><div align="center"><strong>STT</strong></div></td>
			<td width="96"><div align="center"><strong>Tên quyền</strong></div></td>
			<td width="212"><div align="center"><strong>Chức năng</strong></div></td>
			<td><div align="center"><strong>Sửa</strong></div></td>
		    <td><div align="center"><strong>Xóa</strong></div></td>
		  </tr>
		  
<?php

	$stt = 1;
	
	if(mysql_num_rows($quyen)!=0){
	
		while ($row = mysql_fetch_array($quyen)) {	
		
?>

		  <tr>
			<td height="40"><div align="center"><?php echo $stt++; ?></div></td>
			<td><?php echo $row['role_name'] ?></td>
			<td>
            <?php
				$chucnang = mysql_query("SELECT * FROM tbl_role_function rf INNER JOIN tbl_function f ON rf.function_id = f.function_id WHERE role_id = {$row['role_id']}");
				while ($row_c = mysql_fetch_array($chucnang))
					echo $row_c['function_name'].", ";
				
			?>
            </td>
			<td width="32">
					
				<a href="index.php?role_id=<?php echo $_GET['role_id'] ?>&quanly=quyen&ac=sua&id=<?php echo $row["role_id"] ?>">
					<div align="center" ><img src="img/sua.png" /></div>
		  	  </a>			
			</td>
			<td width="32">
				<a onclick="return confirmAction()" href="modules/quyen/xuly.php?role_id=<?php echo $_GET['role_id'] ?>&xoa=quyen&id=<?php echo $row["role_id"] ?>">
					<div align="center"><img src="img/xoa.png" /></div>	
			  </a>		
			</td>
		  </tr>
<?php
		}//dong while
		
		//goi lai select de dem lai bien $count
		$sql = "select * from tbl_role";
		$quyen = mysql_query($sql);
		
		//dem tong so dong tin trong csdl cua table benh
		$count = mysql_num_rows($quyen);
		//tinh tong so trang, lay tong so dong tin chia so dong tin tren moi trang
		$tongsotrang = floor($count/10)+1;
			if($_GET['page']>1) {//neu trang >1 thi tao nut Back
				echo '   <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=quyen&ac=them&page='.($_GET['page']-1).' ">Back</a>  ';
			}
		
		//dua ra cac rang
		for($i=1; $i<= $tongsotrang; $i++){
		
			if($i==$_GET['page']) {//cho biet chi so trang dang hien
			
				echo '  Trang  '.$i;
				
			} else {
			
				echo '  <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=quyen&ac=them&page='.$i.' ">   Trang  '.$i.   '</a>  ';
				
			}	
		}//dong for
		
		if($_GET['page'] < $tongsotrang) {//tao nut Next neu trang lon hon tongsotrang
			echo '  <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=quyen&ac=them&page='.($_GET['page']+1).  ' ">   Next</a>  ';
		}
	}//dong if
	echo "</div>";
?>
  </table>
</div>		
