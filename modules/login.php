<?php
include("config.php");
session_start();
if (isset($_POST['dangnhap']) && !empty($_POST['tendangnhap']) && !empty($_POST['matkhau'])) {
	$tendangnhap = $_POST['tendangnhap'];
	$matkhau     = $_POST['matkhau'];
	$sql = " SELECT	*
			FROM	tbl_user
			WHERE	user_name = '$tendangnhap'
			AND		user_password = '$matkhau'
			AND		user_status = '1'	";
	$sql1 = "SELECT	*
			FROM	tbl_customer
			WHERE	cus_username = '$tendangnhap'
			AND		cus_password = '$matkhau'";
	$ketqua = mysql_query($sql);
	$ketqua1 = mysql_query($sql1);	
	if (mysql_num_rows($ketqua) >0) {		
		$_SESSION["tendangnhap"] = $tendangnhap;
		$row = mysql_fetch_array($ketqua);
		header("location: ../admin/index.php?role_id=$row[role_id]");
	} else if ($_GET['ac'] == "thoat") {
		session_destroy();
		header("location: ../index.php");
	} else if (mysql_num_rows($ketqua1) >0) {
		header("location: ../index.php?acc=$tendangnhap");
	}else {
		session_destroy();
		header("location: ../index.php?ac=login&acdn=thatbai");
	}

} else {
	session_destroy();
	header("location: ../index.php?ac=login&acdn=thatbai");
	
}
?>

