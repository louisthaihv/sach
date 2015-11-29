<?php
	
	include("../config.php");
	$trangthai = $_POST["trangthai"];
	$id = $_GET["id"];	
	
	if(isset($_POST["sua"])) {
		
		//thuc hien sua
		$sql =	"	 
				  UPDATE  `sach`.`tbl_transaction` 
				  SET `tra_status` = '$trangthai' 
				  WHERE  `tra_id` ='$id' 
				   ";				
		mysql_query($sql);
		
		header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=donhang&&ac=lietke");
		
	}
?>