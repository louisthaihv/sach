<?php
if (!defined('WEB_ROOT')) {
	exit;
}

// lấy tất cả các danh mục
$categories = fetchCategories();

// định dạng danh mục để hiển thị
$categories = formatCategories($categories, $catId);
?>
<ul>
<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>">All Category</a></li>
<?php
foreach ($categories as $category) {
	extract($category);
	// giờ ta có $cat_id, $cat_parent_id, $cat_name
	
	$level = ($cat_parent_id == 0) ? 1 : 2;
    $url   = $_SERVER['PHP_SELF'] . "?c=$cat_id";

	// cho danh mục cấp 2, ta in ra khoảng trắng
	// lùi vào đầu dòng
	if ($level == 2) {
		$cat_name = '&nbsp; &nbsp; &raquo;&nbsp;' . $cat_name;
	}
	
	// assign id="current" cho danh mục được chọn hiện thời
	// bôi đen tên danh mục
	$listId = '';
	if ($cat_id == $catId) {
		$listId = ' id="current"';
	}
?>
<li<?php echo $listId; ?>><a href="<?php echo $url; ?>"><?php echo $cat_name; ?></a></li>
<?php
}
?>
</ul>
