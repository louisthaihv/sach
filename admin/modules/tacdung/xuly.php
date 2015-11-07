<?php
	include("../config.php");
	
	$tentacdung = $_POST["tentacdung"];
	$id = $_GET["id"];
	
	
	if(isset($_POST["them"])) {
		//thuc hien them du lieu
		$sql =	"
					INSERT INTO 	tacdung(tentacdung) 
					VALUE			('$tentacdung')
				";
		mysql_query($sql);
		
		header("location: ../../index.php?quanly=tacdung&ac=them");
	}else if(isset($_POST["sua"])) {
		//thuc hien sua
		$sql =	"	
					UPDATE  tacdung 
					SET  	tenTacdung = '$tentacdung'
					WHERE  	maTacdung = '$id'
				";
				
		mysql_query($sql);
		
		header("location: ../../index.php?quanly=tacdung&ac=sua&id=".$id);
		
	}else{
		//thuc hien xoa
		//printf($id);
		$sql =	"
					DELETE FROM 	tacdung 
					WHERE 			maTacdung = '$id'
				";
		mysql_query($sql);
		header("location: ../../index.php?quanly=tacdung&ac=them");
	}

?>