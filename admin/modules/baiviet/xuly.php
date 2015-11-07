<?php
	include("../config.php");
	
	$tenbaiviet = $_POST["tenbaiviet"];
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
					INSERT INTO	`sach`.`tbl_product` (`pd_name` ,`pd_price` ,`pd_image` ,`pd_description`,`cat_id`)
					VALUES		('$tenbaiviet','$gia','$tenanh', '$noidung', '$cat_id')
				";
				
		mysql_query($sql);
		
		header("location: ../../index.php?quanly=baiviet&ac=them");
		
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
					SET  	`pd_name` ='$tenbaiviet',`pd_price` ='$gia', `pd_image` ='$tenanh', `pd_description` ='$noidung', `cat_id` ='$cat_id' 
					WHERE  	`tbl_product`.`pd_id`=".$id;
		//printf($tenbaiviet);
		//printf($tenanh);
		
		mysql_query($sql);
		header("location: ../../index.php?quanly=baiviet&ac=sua&id=".$id);
		
	}else{
		//thuc hien xoa
		//printf($id);
		$sql =	"	
					DELETE FROM		baiviet 
					WHERE			maBaiViet = '$id'
				";
		mysql_query($sql);
		header("location: ../../index.php?quanly=baiviet&ac=them");
	}

?>