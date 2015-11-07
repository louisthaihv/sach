<?php

	$ac = $_GET['ac'];
	if($ac == "them") {
	
		include("modules/benh/them.php");
	} else {
		include("modules/benh/sua.php");
	}
	
	include("modules/benh/lietke.php");
?>