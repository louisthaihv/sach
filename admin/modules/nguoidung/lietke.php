
<?php
	
	
	if(!isset($_GET['page'])) {// neu khong ton tai bien page thi cho page=1
		$_GET['page']=1;
	}
	
	$start=($_GET['page']-1)*5;//tinh vi tri bat dau lay so dong tin.limit 0,10, lay 10 dong tren 1 trang 

	$sql = "	SELECT	*
				FROM	tbl_user u
				INNER JOIN	tbl_roles r
				ON 		u.role_id = r.id
				LIMIT	$start,5
			";
	$nguoidung = mysql_query($sql);
?>
<div style=" margin-top:20px">
	<table width="98%" height="95" border="1" id="custom">
	  <tr class="doimaunen">
		<td width="31" height="43"><div align="center"><strong>STT</strong></div></td>
		<td width="46"><div align="center"><strong>Mã người dùng</strong></div></td>
		<td width="112"><div align="center"><strong>Tên đăng nhập</strong></div></td>
		<td width="88"><div align="center"><strong>Họ tên</strong></div></td>
		<td width="153"><div align="center"><strong>Email</strong></div></td>
		<td width="105"><div align="center"><strong>Nơi ở</strong></div></td>
		<td width="40"><div align="center"><strong>Quyền</strong></div></td>
		<td width="45"><div align="center"><strong>Trạng thái</strong></div></td>
		<td width="89"><div align="center"><strong>Ngày đăng ký</strong></div></td>
		<td width="161"><div align="center"><strong>Ghi chú</strong></div></td>
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
		<td><?php echo $row['user_id']; ?></td>
		<td><?php echo $row['user_name']; ?></td>
		<td><?php echo $row['hoten']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['noi_o']; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['trang_thai']; ?></td>
		<td><?php echo date('Y-m-d', strtotime($row['user_regdate'])); ?></td>
		<td><?php echo $row['ghi_chu']; ?></td>
		<td width="35">
			
			<a href="index.php?quanly=nguoidung&ac=sua&id=<?php echo $row["user_id"] ?>">
				<div align="center" ><img src="img/sua.png" /></div>
	  	  	</a>		
		</td>
		<td width="46">
			<a href="modules/nguoidung/xuly.php?xoa=nguoidung&id=<?php echo $row["user_id"] ?>">
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
		
		//printf($count);
		
		//tinh tong so trang, lay tong so dong tin chia so dong tin tren moi trang
		$tongsotrang = floor($count/5)+1;
		//printf($tongsotrang);
		
		
			if($_GET['page']>1) {//neu trang >1 thi tao nut Back
				echo '   <a href = "index.php?quanly=nguoidung&ac=them&page='.($_GET['page']-1).' ">Back</a>  ';
			}
		
		//dua ra cac rang
		for($i=1; $i<= $tongsotrang; $i++){
		
			if($i==$_GET['page']) {//cho biet chi so trang dang hien
			
				echo '  Trang  '.$i;
				
			} else {
			
				echo '  <a href = "index.php?quanly=nguoidung&ac=them&page='.$i.' ">   Trang  '.$i.   '</a>  ';
				
			}	
		}//dong for
		
		if($_GET['page'] < $tongsotrang) {//tao nut Next neu trang lon hon tongsotrang
			echo '  <a href = "index.php?quanly=nguoidung&ac=them&page='.($_GET['page']+1).  ' ">   Next</a>  ';
		}
		
	}//dong if
	mysql_free_result($nguoidung);
?>
  </table>
</div>