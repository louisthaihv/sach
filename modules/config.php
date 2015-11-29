<?php
	$tenmaychu = "localhost";
	$taikhoan = "root";
	$matkhau = "root";
	$csdl = "sach";//ten csdl
	
	@$con = mysql_connect($tenmaychu,$taikhoan,$matkhau);
	if(!$con) {
		echo "khong ket not duoc csdl";
		exit;
	}
	
	mysql_select_db($csdl,$con);
	mysql_query("SET NAMES 'UTF8'");
?>