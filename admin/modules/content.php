<head>
	<meta charset="utf-8" />
</head>
<div id="content">
	<?php
		if(isset($_GET['quanly'])) {
		
			$tam = $_GET['quanly'];
		} else {
		
			$tam = "";
		}
		if($tam == "sach") {
		
			include("modules/sach/main.php");
			
		} else if($tam == "danhmuc") {
			
			include("modules/danhmuc/main.php");
			
		}else if($tam == "tuychinh") {
			
			include("modules/tuychinh/main.php");
			
		}else if($tam == "quyen") {
			
			include("modules/quyen/main.php");
			
		}else if($tam == "donhang") {
			
			include("modules/donhang/main.php");
			
		}else if($tam == "nguoidung") {
			
			include("modules/nguoidung/main.php");
		}
	?>
</div>