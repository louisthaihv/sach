<?php
	
	if(!isset($_GET['page'])) {// neu khong ton tai bien page thi cho page=1
		$_GET['page']=1;
	}
	
	$start=($_GET['page']-1)*10;//tinh vi tri bat dau lay so dong tin.limit 0,10, lay 5 dong tren 1 trang 

	$sql = "	SELECT	*
				FROM	tbl_user u
				INNER JOIN	tbl_role r
				ON 		u.role_id = r.role_id
				ORDER BY u.user_id DESC
				LIMIT	$start,10
			";
	$nguoidung = mysql_query($sql);
?>
<div style=" margin-top:20px">
	<a href="index.php?role_id=<?php echo $_GET['role_id'] ?>&quanly=nguoidung&ac=them"><input style="margin:5 600 10 5; padding:5px " type="button" name="themsach" value="Thêm người dùng mới"  /></a>
	<table width="98%" height="95" border="1" id="custom">
	  <tr class="doimaunen">
		<td width="29" height="43"><div align="center"><strong>STT</strong></div></td>
		<td width="58"><div align="center"><strong>Tên đăng nhập</strong></div></td>
		<td width="70"><div align="center"><strong>Họ tên</strong></div></td>
		<td width="94"><div align="center"><strong>Email</strong></div></td>
		<td width="66"><div align="center"><strong>Nơi ở</strong></div></td>
		<td width="44"><div align="center"><strong>Quyền</strong></div></td>
		<td width="43"><div align="center"><strong>Trạng thái</strong></div></td>
		<td width="64"><div align="center"><strong>Ngày đăng ký</strong></div></td>
		<td width="93"><div align="center"><strong>Ghi chú</strong></div></td>
		<td><div align="center"><strong>Sửa</strong></div></td>
	    <td><div align="center"><strong>Xóa</strong></div></td>
	  </tr>
	  
<?php	
	$stt = 1;
	if(mysql_num_rows($nguoidung)!=0){	
		while ($row = mysql_fetch_array($nguoidung)) {	
?>
	  <tr >
		<td height="36"><div align="center"><?php echo $stt++; ?></div></td>
		<td><?php echo $row['user_name']; ?></td>
		<td><?php echo $row['user_fullname']; ?></td>
		<td><?php echo $row['user_email']; ?></td>
		<td><?php echo $row['user_address']; ?></td>
		<td><?php echo $row['role_name']; ?></td>
		<td><?php echo $row['user_status']; ?></td>
		<td><?php echo date('Y-m-d', strtotime($row['user_regdate'])); ?></td>
		<td><?php echo $row['user_note']; ?></td>
		<td width="33">
			
			<a href="index.php?role_id=<?php echo $_GET['role_id'] ?>&quanly=nguoidung&ac=sua&id=<?php echo $row["user_id"] ?>">
				<div align="center" ><img src="img/sua.png" /></div>
	  	  	</a>		
		</td>
		<td width="45">
			<a onclick="return confirmAction()" href="modules/nguoidung/xuly.php?xoa=nguoidung&role_id=<?php echo $_GET['role_id'] ?>&id=<?php echo $row["user_id"] ?>">
				<div align="center" ><img src="img/xoa.png" /></div>
		  </a>		
		</td>
	  </tr>
<?php
			//}
		}//dong while
		
		//goi lai select de dem lai bien $count
		$sql = "select * from tbl_user";
		$nguoidung = mysql_query($sql);
		
		//dem tong so dong tin trong csdl cua table benh
		$count = mysql_num_rows($nguoidung);
		
		//tinh tong so trang, lay tong so dong tin chia so dong tin tren moi trang
		$tongsotrang = floor($count/10)+1;		
	echo "<div id=lietke>";
		if($_GET['page']>1) {//neu trang >1 thi tao nut Back
				echo '   <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=nguoidung&ac=lietke&page='.($_GET['page']-1).' "  >Back</a>  ';
			}
		//dua ra cac trang
		for($i=1; $i<= $tongsotrang ; $i++){		
			if($i==$_GET['page']) {//cho biet chi so trang dang hien			
				echo ' Trang  '.$i;				
			} else {			
				echo '  <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=nguoidung&ac=lietke&page='.$i.' ">   Trang '.$i. '</a>  ';
			}	
		}//dong for		
		//tao nut Next neu trang lon hon tongsotrang
		if($_GET['page'] < $tongsotrang) {
			echo '  <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=nguoidung&ac=lietke&page='.($_GET['page']+1).  ' "  >   Next</a>  ';
		}
	echo "</div>";
	}//dong if
	mysql_free_result($nguoidung);
?>
  </table>
</div>