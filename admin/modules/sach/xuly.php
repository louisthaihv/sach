<?php
	include("../config.php");
	$role_id = $_GET["role_id"];
	$tensach = $_POST["tensach"];
	$tentacgia = $_POST["tentacgia"];
	$anhminhhoa = $_FILES["anhminhhoa"];
	$gia = $_POST["gia"];
	$soluong = $_POST["soluong"];
	$cat_id = $_POST["cat_id"];
	$noidung = $_POST["noidung"];
	$id = $_GET["id"];
	$tenanh = $_FILES["anhminhhoa"]["name"];//lay ten anh
	
	if(isset($_POST["them"])) {
		//upload anh
		if(!empty($tenanh)){
			$target_dir = dirname(dirname(dirname(dirname(__FILE__)))).'/images/';
			$target_file = $target_dir .$tenanh;
			var_dump($target_file);
			// if everything is ok, try to upload file
		    if (move_uploaded_file($_FILES["anhminhhoa"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["anhminhhoa"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
		//thuc hien them du lieu
		$sql =	"	
					INSERT INTO	`sach`.`tbl_product` (`pd_name` ,`pd_author` ,`pd_price` ,`pd_qty` ,`pd_image` ,`pd_description`,`cat_id`)
					VALUES		('$tensach','$tentacgia','$gia','$soluong','$tenanh', '$noidung', '$cat_id')
				";
				
		mysql_query($sql);
		header("location: ../../index.php?role_id=".$_GET["role_id"]."&quanly=sach&ac=lietke");
		
	}else if(isset($_POST["sua"])) {
		//upload anh
		if(!empty($tenanh)){
			$target_dir = dirname(dirname(dirname(dirname(__FILE__)))).'/images/';
			$target_file = $target_dir .$tenanh;
			var_dump($target_file);
			// if everything is ok, try to upload file
		    if (move_uploaded_file($_FILES["anhminhhoa"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["anhminhhoa"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
		//thuc hien sua
		$sql =	"	
					UPDATE  `sach`.`tbl_product` 
					SET  	`pd_name` ='$tensach',`pd_author` ='$tentacgia',`pd_qty` ='$soluong',`pd_price` ='$gia', `pd_image` ='$tenanh', `pd_description` ='$noidung', `cat_id` ='$cat_id' 
					WHERE  	`tbl_product`.`pd_id`=".$id;		
		mysql_query($sql);
		header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=sach&ac=lietke");
		
	}else{
		//thuc hien xoa
		$sql =	"	
					DELETE FROM		tbl_product 
					WHERE			pd_id = '$id'
				";
		mysql_query($sql);
		header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=sach&ac=lietke");
	}

?>