<?php
//$_SESSION['shop_return_url'] = $_SERVER['REQUEST_URI'];
//
//$catId  = (isset($_GET['c']) && $_GET['c'] != '1') ? $_GET['c'] : 0;
//$pdId   = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : 0;
//
//require_once 'include/header.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Ban Sach</title>
<link rel="stylesheet" type="text/css" href="css/top.css"/>
<link rel="stylesheet" type="text/css" href="css/rightcontent.css"/>
<link rel="stylesheet" type="text/css" href="css/navigation.css"/>
<link rel="stylesheet" type="text/css" href="css/menu-tab.css"/>
<link rel="stylesheet" type="text/css" href="css/leftcontent.css"/>
<link rel="stylesheet" type="text/css" href="css/header.css"/>
<link rel="stylesheet" type="text/css" href="css/footer.css"/>
<link rel="stylesheet" type="text/css" href="css/centercontent.css"/>
<link rel="stylesheet" type="text/css" href="css/contact.css"/>
<link rel="stylesheet" type="text/css" href="css/detail.css"/>
</head>

<body>
	<div class="main">
    
      <!-- top Start-->
      <?php
			include("modules/config.php");
			include("modules/top.php");
			include("modules/header.php");
			include("modules/content.php");
			include("modules/footer.php");
		?>
      <!-- top END-->
	</div>
</body>
</html>
