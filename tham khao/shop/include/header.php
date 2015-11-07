<?php
if (!defined('WEB_ROOT')) {
	exit;
}

// thiết lập tiêu đề trang mặc định
$pageTitle = 'TH5B Online Shop';

// nếu product id thiếu lập tên sản phẩm
// tới tiêu đề trang nhưng nếu product id không
// check nếu category id xuất hiện trong câu truy vấn
// và thêm tên danh mục tới tiêu đề trang
if (isset($_GET['p']) && (int)$_GET['p'] > 0) {
	$pdId = (int)$_GET['p'];
	$sql = "SELECT pd_name
			FROM tbl_product
			WHERE pd_id = $pdId";
	
	$result    = dbQuery($sql);
	$row       = dbFetchAssoc($result);
	$pageTitle = $row['pd_name'];
	
} else if (isset($_GET['c']) && (int)$_GET['c'] > 0) {
	$catId = (int)$_GET['c'];
	$sql = "SELECT cat_name
	        FROM tbl_category
			WHERE cat_id = $catId";

    $result    = dbQuery($sql);
	$row       = dbFetchAssoc($result);
	$pageTitle = $row['cat_name'];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo $pageTitle; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="include/shop.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="library/common.js"></script>
</head>
<body>