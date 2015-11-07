<?php
	
	include("../config.php");
	
	$manguoidung = $_POST["manguoidung"];
	$ngaythaydoi = $_POST["ngaythaydoi"];
	$noidung = $_POST["noidung"];
	$id = $_GET["id"];
	
	if(isset($_POST["them"])) {
		//thuc hien them du lieu
		$sql = "INSERT INTO  `caythuocvn`.`log` (`maNguoidung` ,`ngayThayDoi` ,`noiDung`)
				VALUES	('$manguoidung',  '$ngaythaydoi',  '$noidung');";
		mysql_query($sql);
		
		header("location: ../../index.php?quanly=log&ac=them");
	}else{
		//thuc hien xoa
		//printf($id);
		$sql = "DELETE FROM log 
				WHERE 		maNguoidung = '$id'";
		mysql_query($sql);
		header("location: ../../index.php?quanly=log&ac=them");
	}

?>