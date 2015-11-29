<?php
	
	
	include("../config.php");
	
	$tenquyen = $_POST["tenquyen"];
	$id = $_GET["id"];
	if(isset($_POST["them"])) {
		//thuc hien them du lieu
		$sql =	"
					INSERT INTO 	tbl_role(role_name) 
					VALUE			('$tenquyen')
				";
		mysql_query($sql);
		
		if($sql) {
		$row_layMa = mysql_fetch_array(mysql_query("SELECT role_id FROM tbl_role where role_name = '$tenquyen'"));
			$maquyen = $row_layMa['role_id'];
			
			if(isset($_POST['chucnang'])){
				foreach($_POST['chucnang'] as $machucnang){
					
					$sql2 = mysql_query("INSERT INTO `sach`.`tbl_role_function` (`role_id`, `function_id`) VALUES ('$maquyen', '$machucnang')");
				}
			}
			header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=quyen&ac=lietke");			
		}
		
		header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=quyen&ac=lietke");
	}else if(isset($_POST["sua"])) {
		//thuc hien sua
		$sql =	"	
					UPDATE  tbl_role 
					SET  	role_name = '$tenquyen'
					WHERE  	role_id = '$id'
				";				
		mysql_query($sql);
		
		if($sql){
			$row_layMa = mysql_fetch_array(mysql_query("SELECT role_id FROM tbl_role where role_name = '$tenquyen'"));
			$maquyen = $row_layMa['role_id'];
			$sql2 = mysql_query("DELETE FROM `tbl_role_function` WHERE `role_id`='$maquyen' ");
			foreach($_POST['chucnang'] as $machucnang){
					$sql2 = mysql_query("INSERT INTO `sach`.`tbl_role_function` (`role_id`, `function_id`) VALUES ('$maquyen', '$machucnang')");
			}
		}
		
		
		header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=quyen&ac=sua&id=".$id);
		
	}else{
		
		$sql =	"
					DELETE FROM 	tbl_role 
					WHERE 			role_id = '$id'
				";
		mysql_query($sql);
		header("location: ../../index.php?role_id=".$_GET['role_id']."&quanly=quyen&ac=lietke");
	}

?>