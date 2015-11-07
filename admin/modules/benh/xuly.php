<?php
	include("../config.php");
	
	$tenbenh = $_POST["tenbenh"];
	$id = $_GET["id"];
	
	if(isset($_POST["them"])) {
		//thuc hien them du lieu
		$sql =	"
					INSERT INTO		benh(tenBenh) 
					VALUE			('$tenbenh')
				";
		mysql_query($sql);
		
		header("location: ../../index.php?quanly=benh&ac=them");
	}else if(isset($_POST["sua"])) {
		//thuc hien sua
		$sql =	"	
					UPDATE  benh 
					SET  	tenBenh = '$tenbenh'
					WHERE  	maBenh = '$id'
				";
				
		mysql_query($sql);
		
		header("location: ../../index.php?quanly=benh&ac=sua&id=".$id);
		
	}else{
		//thuc hien xoa
		//printf($id);
		$sql =	"
					DELETE FROM benh 
					WHERE 		maBenh = '$id'
				";
		mysql_query($sql);
		header("location: ../../index.php?quanly=benh&ac=them");
	}

?>