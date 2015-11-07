<?php
	
	
	include("../config.php");
	
	$tenquyen = $_POST["tenquyen"];
	$id = $_GET["id"];
	
	
	if(isset($_POST["them"])) {
		//thuc hien them du lieu
		$sql =	"
					INSERT INTO 	tbl_roles(name) 
					VALUE			('$tenquyen')
				";
		mysql_query($sql);
		
		header("location: ../../index.php?quanly=quyen&ac=them");
	}else if(isset($_POST["sua"])) {
		//thuc hien sua
		$sql =	"	
					UPDATE  tbl_roles 
					SET  	name = '$tenquyen'
					WHERE  	id = '$id'
				";
				
		mysql_query($sql);
		
		header("location: ../../index.php?quanly=quyen&ac=sua&id=".$id);
		
	}else{
		
		$sql =	"
					DELETE FROM 	tbl_roles 
					WHERE 			id = '$id'
				";
		mysql_query($sql);
		header("location: ../../index.php?quanly=quyen&ac=them");
	}

?>