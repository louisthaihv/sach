<?php

	$ac = $_GET['ac'];
	if($ac == "them") {
	
		include("modules/tacdung/them.php");
	} else {
		include("modules/tacdung/sua.php");
	}
	
	include("modules/tacdung/lietke.php");
?>