
<?php

	$ac = $_GET['ac'];
	if($ac == "them") {
	
		include("modules/baiviet/them.php");
	} else {
		include("modules/baiviet/sua.php");
	}
	
	include("modules/baiviet/lietke.php");
?>