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
		if($tam == "baiviet") {
		
			include("modules/baiviet/main.php");
			
		} else if($tam == "benh") {
			
			include("modules/benh/main.php");
			
		}else if($tam == "caythuoc") {
			
			include("modules/caythuoc/main.php");
			
		}else if($tam == "log") {
			
			include("modules/log/main.php");
			
		}else if($tam == "tacdung") {
			
			include("modules/tacdung/main.php");
			
		}else if($tam == "quyen") {
			
			include("modules/quyen/main.php");
			
		}else if($tam == "nguoidung") {
			
			include("modules/nguoidung/main.php");
		}
	?>
</div>