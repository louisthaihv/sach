<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$productsPerRow = 2;
$productsPerPage = 4;


$children = array_merge(array($catId), getChildCategories(NULL, $catId));
$children = ' (' . implode(', ', $children) . ')';

$sql = "SELECT pd_id, pd_name, pd_price, pd_thumbnail, pd_qty, c.cat_id
		FROM tbl_product pd, tbl_category c
		WHERE pd.cat_id = c.cat_id AND pd.cat_id IN $children 
		ORDER BY pd_name";
$result     = dbQuery(getPagingQuery($sql, $productsPerPage));
$pagingLink = getPagingLink($sql, $productsPerPage, "c=$catId");
$numProduct = dbNumRows($result);

// ảnh sản phẩm sắp xếp vào bảng. chắc chắn mỗi tấm ảnh có chiều rộng phù hợp khoảng trống của bảng
$columnWidth = (int)(100 / $productsPerRow);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="20">
<?php 
if ($numProduct > 0 ) {

	$i = 0;
	while ($row = dbFetchAssoc($result)) {
	
		extract($row);
		if ($pd_thumbnail) {
			$pd_thumbnail = WEB_ROOT . 'images/product/' . $pd_thumbnail;
		} else {
			$pd_thumbnail = WEB_ROOT . 'images/no-image-small.png';
		}
	
		if ($i % $productsPerRow == 0) {
			echo '<tr>';
		}

		// định dạng cách hiển thị giá cả
		$pd_price = displayAmount($pd_price);
		
		echo "<td width=\"$columnWidth%\" align=\"center\"><a href=\"" . $_SERVER['PHP_SELF'] . "?c=$catId&p=$pd_id" . "\"><img src=\"$pd_thumbnail\" border=\"0\"><br>$pd_name</a><br>Price : $pd_price";

		// nếu sản phẩm không có trong giỏ, liên hệ khách hàng
		if ($pd_qty <= 0) {
			echo "<br>Out Of Stock";
		}
		
		echo "</td>\r\n";
	
		if ($i % $productsPerRow == $productsPerRow - 1) {
			echo '</tr>';
		}
		
		$i += 1;
	}
	
	if ($i % $productsPerRow > 0) {
		echo '<td colspan="' . ($productsPerRow - ($i % $productsPerRow)) . '">&nbsp;</td>';
	}
	
} else {
?>
	<tr><td width="100%" align="center" valign="center">No products in this category</td></tr>
<?php	
}	
?>
</table>
<p align="center"><?php echo $pagingLink; ?></p>