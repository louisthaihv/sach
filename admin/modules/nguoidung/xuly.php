<?php
	
	include("../config.php");
	$manguoidung = $_POST["manguoidung"];
	$tendangnhap = $_POST["tendangnhap"];
	$matkhau = md5($_POST["matkhau"]);
	$hoten = $_POST["hoten"];
	$email = $_POST["email"];
	$noio = $_POST["noio"];
	$maquyen = $_POST["maquyen"];
	$trangthai = $_POST["trangthai"];
	$ngaydangky = $_POST["ngaydangky"];
	$ghichu = $_POST["ghichu"];
	$id = $_GET["id"];
	
	
	if(isset($_POST["them"])) {
		//thuc hien them du lieu
	
		$sql =	"	
					INSERT INTO	`sach`.`tbl_user` (user_id, user_name ,user_password ,ho_ten ,email, noi_o, role_id, trang_thai, user_regdate, ghi_chu)
					VALUES		('$manguoidung', '$tendangnhap','$matkhau','$hoten', '$email', '$noio', '$maquyen', '$trangthai', '$ngaydangky', '$ghichu')
				  ";
				
		mysql_query($sql);
		
		header("location: ../../index.php?quanly=nguoidung&ac=them");
		
	}else if(isset($_POST["sua"])) {
		
		//thuc hien sua
		$sql =	"	 
				  UPDATE  `sach`.`tbl_user` 
				  SET `user_name` =   '$tendangnhap',`user_password` =  '$matkhau',`hoten` =  '$hoten',`email` =  '$email',`noi_o` =  '$noio',`role_id` =   '$maquyen', `trang_thai` = '$trangthai', `user_regdate` =  '$ngaydangky',`ghi_chu` =  '$ghichu' 
				  WHERE  `tbl_user`.`user_id` ='$id' 
				   ";
				
		mysql_query($sql);
		
		header("location: ../../index.php?quanly=nguoidung&ac=sua&id=".$id);
		
	}else{
		//thuc hien xoa
		//printf($id);
		$sql =	"	
					DELETE FROM		tbl_user 
					WHERE			user_id = '$id'
				  ";
		mysql_query($sql);
		header("location: ../../index.php?quanly=nguoidung&ac=them");
	}

?>