<?php

	$ac = $_GET['ac'];
	if($ac == "lietke") {	
		include("modules/donhang/lietke.php");
	} else if ($ac == "sua"){
		include("modules/donhang/sua.php");
	}
?>