<?php

	$ac = $_GET['ac'];
	if($ac == "them") {
	
		include("modules/nguoidung/them.php");
	} else {
		include("modules/nguoidung/sua.php");
	}
	
	include("modules/nguoidung/lietke.php");
?>