
<?php
	$ac = $_GET['ac'];
	if($ac == "lietke") {	
		include("modules/danhmuc/lietke.php");
	} else if ($ac == "them"){
		include("modules/danhmuc/them.php");
	} else {
		include("modules/danhmuc/sua.php");
	}
	
?>