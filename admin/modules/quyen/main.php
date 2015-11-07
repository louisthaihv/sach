<?php

	$ac = $_GET['ac'];
	if($ac == "them") {
	
		include("modules/quyen/them.php");
	} else {
		include("modules/quyen/sua.php");
	}
	
	include("modules/quyen/lietke.php");
?>