<?php
	
	
	include("../config.php");
	
	$tencuahang = $_POST["tencuahang"];
	$diachi = $_POST["diachi"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$id = $_GET["id"];
		
	if(isset($_POST["sua"])) {
		//thuc hien sua
		$sql =	"	
					UPDATE  tbl_shop_config
					SET  	sc_name = '$tencuahang', sc_address = '$diachi', sc_phone = '$phone',sc_email = '$email'
					WHERE  	sc_id = '$id'
				";
				
		mysql_query($sql);
		
		header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=tuychinh&ac=lietke");
		
	}

?>