<?php
	
	include("../config.php");
	$tendangnhap = $_POST["tendangnhap"];
	$matkhau = ($_POST["matkhau"]);
	$hoten = $_POST["hoten"];
	$email = $_POST["email"];
	$noio = $_POST["noio"];
	$maquyen = $_POST["maquyen"];
	$trangthai = $_POST["trangthai"];
	$ghichu = $_POST["ghichu"];
	$id = $_GET["id"];	
	
	if(isset($_POST["them"])) {
		//thuc hien them du lieu	
		$sql =	"	
					INSERT INTO	`sach`.`tbl_user` (user_name ,user_password ,user_fullname ,user_email, user_address, role_id, user_status, user_regdate, user_note)
					VALUES		('$tendangnhap','$matkhau','$hoten', '$email', '$noio', '$maquyen', '$trangthai', NOW(), '$ghichu')
				  ";				
		mysql_query($sql);
		
		header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=nguoidung&ac=lietke");
		
	}else if(isset($_POST["sua"])) {
		
		//thuc hien sua
		$sql =	"	 
				  UPDATE  `sach`.`tbl_user` 
				  SET `user_name` =   '$tendangnhap',`user_password` =  '$matkhau',`user_fullname` =  '$hoten',`user_email` =  '$email',`user_address` =  '$noio',`role_id` =   '$maquyen', `user_status` = '$trangthai', `user_note` =  '$ghichu' 
				  WHERE  `tbl_user`.`user_id` ='$id' 
				   ";				
		mysql_query($sql);
		
		header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=nguoidung&&ac=lietke");
		
	}else{
		//thuc hien xoa
		$sql =	"	
					DELETE FROM		tbl_user 
					WHERE			user_id = '$id'
				  ";
		mysql_query($sql);
		header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=nguoidung&ac=lietke");
	}

?>