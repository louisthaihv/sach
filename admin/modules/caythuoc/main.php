<?php

	$ac = $_GET['ac'];
	if($ac == "lietke") {
		
		include("modules/caythuoc/lietke.php");
		
	}else if($ac == "them"){
		
		include("modules/caythuoc/them.php");
		
	} else if($ac == "sua"){
		
		include("modules/caythuoc/sua.php");
	}else if($ac == "timkiem"){
		
		include("modules/caythuoc/lietke.php");
	}
	
	
?>