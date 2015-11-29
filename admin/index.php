<?php
	session_start();
	if($_SESSION["tendangnhap"] == "") {
		header("location: ../index.php?ac=login");
		exit();
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Trang người quản trị hệ thống</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/confirm.js"></script>
	<body>
	
		<?php
			include("modules/config.php");
			include("modules/banner.php");
			include("modules/menu.php");
			include("modules/content.php");
			include("modules/footer.php");
		?>
		
	</body>
	<script type="text/javascript">
        function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(id).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    $('#img_prd').change(function(){
        readURL(this, '#blah1');
    });
</script>
</html>
