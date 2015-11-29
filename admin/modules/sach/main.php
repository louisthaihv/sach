
<?php
	$ac = $_GET['ac'];
	if($ac == "lietke") {	
		include("modules/sach/lietke.php");
	} else if ($ac == "them"){
		include("modules/sach/them.php");
	} else {
		include("modules/sach/sua.php");
	}
	
	//include("modules/sach/lietke.php");
	
?>