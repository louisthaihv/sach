<?php

	$ac = $_GET['ac'];
	if($ac == "lietke") {
	
		include("modules/quyen/them.php");
	} else if($ac == "sua"){
		include("modules/quyen/sua.php");
	}
	
	include("modules/quyen/lietke.php");
?>