<?php

	$ac = $_GET['ac'];
	if($ac == "lietke") {	
		include("modules/nguoidung/lietke.php");
	} else if ($ac == "them"){
		include("modules/nguoidung/them.php");
	} else {
		include("modules/nguoidung/sua.php");
	}
?>