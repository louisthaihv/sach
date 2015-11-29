<?php
if (isset($_POST['dangnhap'])){
	 session_start();
	 if($_SESSION["tendangnhap"] == "") {
	 	header("location: ../index.php?ac=login");
	 	exit();
	 }
}else if(isset($_GET['acdk'])&& $_GET['acdk']=='dangkythanhcong'){
	echo "<script language='javascript'>alert('Đăng ký thành công!');</script>";
}else if(isset($_GET['acdk'])&& $_GET['acdk']=='dangkythatbai'){
	echo "<script language='javascript'>alert('Tên đăng nhập đã tồn tại, bạn hãy nhập tên khác!');</script>";
}else if(isset($_GET['acdn'])&& $_GET['acdn']=='thatbai'){
	echo "<script language='javascript'>alert('Đăng nhập thất bại! Bạn hãy kiểm tra lại tên đăng nhập và mật khẩu!');</script>";
}else if (isset($_GET['ac'])&&$_GET['ac'] == "thoat") {
	session_unset();
	session_destroy();
	header("location: index.php");
}
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
  <link rel="stylesheet" type="text/css" href="css/slide.css" media="screen" />
  <script language="javascript" src="js/jquery-1.9.1.min.js"></script>
  <script language="javascript" src="js/custom.js"></script>  
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1609703232582143";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>
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
