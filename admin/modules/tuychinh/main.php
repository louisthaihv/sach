<?php

	$ac = $_GET['ac'];
	if($ac == "lietke") {	
		include("modules/tuychinh/lietke.php");
	} else if($ac == "sua"){
		include("modules/tuychinh/sua.php");
	}
		
?>