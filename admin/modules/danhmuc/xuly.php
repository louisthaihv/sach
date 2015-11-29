<?php
	include("../config.php");
	
	$tendanhmuc = $_POST["tendanhmuc"];
	$cat_parent_id = $_POST["cat_parent_id"];
	$noidung = $_POST["noidung"];
	$id = $_GET["id"];
	
	if(isset($_POST["them"])) {		
		//thuc hien them du lieu
		$sql =	"	
					INSERT INTO	`sach`.`tbl_category` (`cat_name` ,`cat_description`,`cat_parent_id`)
					VALUES		('$tendanhmuc','$noidung', '$cat_parent_id')
				";
				
		mysql_query($sql);
		
		header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=danhmuc&ac=lietke");
		
	}else if(isset($_POST["sua"])) {
		//thuc hien sua
		$sql =	"	
					UPDATE  `sach`.`tbl_category` 
					SET  	`cat_name` ='$tendanhmuc',`cat_description` ='$noidung', `cat_parent_id` ='$cat_parent_id' 
					WHERE  	`tbl_category`.`cat_id`=".$id;
		mysql_query($sql);
		header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=danhmuc&ac=lietke");
		
	}else{
		//thuc hien xoa
		$sql =	"	
					DELETE FROM		tbl_category 
					WHERE			cat_id = '$id'
					AND				cat_parent_id <>0
				";
		mysql_query($sql);
		header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=danhmuc&ac=lietke");
	}

?>