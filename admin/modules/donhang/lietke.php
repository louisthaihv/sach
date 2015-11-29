<?php
	
	if(!isset($_GET['page'])) {// neu khong ton tai bien page thi cho page=1
		$_GET['page']=1;
	}
	
	$start=($_GET['page']-1)*10;//tinh vi tri bat dau lay so dong tin.limit 0,10, lay 5 dong tren 1 trang 
if (isset($_POST['trangthai']) &&$_POST['trangthai']!=2){
	$sql = "	SELECT	*
				FROM	tbl_transaction
				WHERE tra_status = {$_POST['trangthai']}
				ORDER BY tra_recieve DESC
				LIMIT	$start,10
			";
} else{
	$sql = "	SELECT	*
				FROM	tbl_transaction
				ORDER BY tra_recieve DESC
				LIMIT	$start,10
			";
}
	$donhang = mysql_query($sql);
?>
<div style=" margin-top:20px">
<form action="" method="post">
	<select name="trangthai" id="trangthai" style="  padding:5px">
    	<option value="2">Tất cả</option>
        <option value="1">Hoàn thành</option>
        <option value="0">Mới</option>
        <option value="-1">Hủy</option>        
	 </select>
     <input type="submit" name="submit" value=" Lọc " style="  padding:5px"/>
</form>
	<table width="98%" height="95" border="1" id="custom">
	  <tr class="doimaunen">
		<td width="116" height="43"><div align="center"><strong>Mã giao dịch</strong></div></td>
		<td width="159"><div align="center"><strong>Tên khách hàng</strong></div></td>
		<td width="176"><div align="center"><strong>Tổng tiền</strong></div></td>
		<td width="141"><div align="center"><strong>Trạng thái</strong></div></td>
		<td width="160"><div align="center"><strong>Ngày đặt hàng</strong></div></td>
		<td width="180"><div align="center"><strong>Ngày nhận hàng</strong></div></td>
		<td><div align="center"><strong>Sửa</strong></div></td>
	    </tr>
	  
<?php	
	$stt = 1;
	if(mysql_num_rows($donhang)!=0){	
		while ($row = mysql_fetch_array($donhang)) {	
?>
	  <tr >
		<td height="36"><div align="center"><?php echo $row['tra_id'] ?></div></td>
		<td><?php echo $row['cus_fullname']; ?></td>
		<td><?php echo $row['tra_amount']; ?></td>
		<td><?php 
			if ($row['tra_status']==0)
				echo 'Mới'; 
			else if ($row['tra_status']==1)
				echo 'Hoàn thành'; 
			else echo 'Hủy';
			?>
        </td>
		<td><?php echo date('Y-m-d', strtotime($row['tra_date'])); ?></td>
		<td><?php echo $row['tra_recieve']; ?></td>
		<td width="93">
			
			<a href="index.php?role_id=<?php echo $_GET['role_id'] ?>&quanly=donhang&ac=sua&id=<?php echo $row["tra_id"] ?>">
				<div align="center" ><img src="img/sua.png" /></div>
	  	  	</a>		
		</td>        
		</tr>
<?php
			//}
		}//dong while
		
		//goi lai select de dem lai bien $count
		$sql = "select * from tbl_transaction";
		$donhang = mysql_query($sql);
		
		//dem tong so dong tin trong csdl cua table benh
		$count = mysql_num_rows($donhang);
		
		//tinh tong so trang, lay tong so dong tin chia so dong tin tren moi trang
		$tongsotrang = floor($count/10)+1;		
	echo "<div id=lietke style=margin-bottom:20px>";
		if($_GET['page']>1) {//neu trang >1 thi tao nut Back
				echo '   <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=donhang&ac=lietke&page='.($_GET['page']-1).' "  >Back</a>  ';
			}
		//dua ra cac trang
		for($i=1; $i<= $tongsotrang ; $i++){		
			if($i==$_GET['page']) {//cho biet chi so trang dang hien			
				echo ' Trang  '.$i;				
			} else {			
				echo '  <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=donhang&ac=lietke&page='.$i.' ">   Trang '.$i. '</a>  ';
			}	
		}//dong for		
		//tao nut Next neu trang lon hon tongsotrang
		if($_GET['page'] < $tongsotrang) {
			echo '  <a href = "index.php?role_id='.$_GET['role_id'].'&quanly=donhang&ac=lietke&page='.($_GET['page']+1).  ' "  >   Next</a>  ';
		}
	echo "</div>";
	}//dong if
	mysql_free_result($donhang);
?>
  </table>
</div>