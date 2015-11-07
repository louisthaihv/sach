<?php

/*
	Kiểm tra nếu phiên user id có hay không. Nếu không chuyển
	tới trang login. Nếu có và tìm thấy
	$_GET['logout'] trong truy vấn thì đăng xuất thành viên
*/
function checkUser()
{
	// Nếu phiên id không thiết lập, chuyển tới trang login
	if (!isset($_SESSION['plaincart_user_id'])) {
		header('Location: ' . WEB_ROOT . 'admin/login.php');
		exit;
	}
	
	// thành viên này muốn đăng xuất
	if (isset($_GET['logout'])) {
		doLogout();
	}
}

/*
	
*/
function doLogin()
{
	// nếu tìm thấy lỗi, lưu lỗi vào biến sau
	$errorMessage = '';
	
	$userName = $_POST['txtUserName'];
	$password = $_POST['txtPassword'];
	
	// trước tiên, chắc chắn là username & password có giá trị
	if ($userName == '') {
		$errorMessage = 'You must enter your username';
	} else if ($password == '') {
		$errorMessage = 'You must enter the password';
	} else {
		// kiểm tra database và thấy nếu username và password đều có
		$sql = "SELECT user_id
		        FROM tbl_user 
				WHERE user_name = '$userName' AND user_password = '$password'";
		$result = dbQuery($sql);
	
		if (dbNumRows($result) == 1) {
			$row = dbFetchAssoc($result);
			$_SESSION['plaincart_user_id'] = $row['user_id'];
			
			// ghi lại thời gian mà thành viên đó đăng nhập lần cuối
			$sql = "UPDATE tbl_user 
			        SET user_last_login = NOW() 
					WHERE user_id = '{$row['user_id']}'";
			dbQuery($sql);

			// giờ, user được kiểm tra và chuyển tới trang tiếp
            // nếu thành viên đã ở trang admin trước đó, ta chuyển tới
			// trang mà user đó mới vào
			if (isset($_SESSION['login_return_url'])) {
				header('Location: ' . $_SESSION['login_return_url']);
				exit;
			} else {
				header('Location: index.php');
				exit;
			}
		} else {
			$errorMessage = 'Wrong username or password';
		}		
			
	}
	
	return $errorMessage;
}

/*
	Thành viên đăng xuất
*/
function doLogout()
{
	if (isset($_SESSION['plaincart_user_id'])) {
		unset($_SESSION['plaincart_user_id']);
		session_unregister('plaincart_user_id');
	}
		
	header('Location: login.php');
	exit;
}


/*
	Tạo tùy chỉnh combo box chứa các danh mục ta có.
	Nếu $catId được thiết lập sau đó danh mục đó được chọn
*/
function buildCategoryOptions($catId = 0)
{
	$sql = "SELECT cat_id, cat_parent_id, cat_name
			FROM tbl_category
			ORDER BY cat_id";
	$result = dbQuery($sql) or die('Cannot get Product. ' . mysql_error());
	
	$categories = array();
	while($row = dbFetchArray($result)) {
		list($id, $parentId, $name) = $row;
		
		if ($parentId == 0) {
			// tạo mảng mới cho mỗi cấp danh mục
			$categories[$id] = array('name' => $name, 'children' => array());
		} else {
			// Các danh mục con được đưa vào mảng của danh mục cha
			$categories[$parentId]['children'][] = array('id' => $id, 'name' => $name);	
		}
	}	
	
	// Tạo tùy chỉnh combo box	$list = '';
	foreach ($categories as $key => $value) {
		$name     = $value['name'];
		$children = $value['children'];
		
		$list .= "<optgroup label=\"$name\">"; 
		
		foreach ($children as $child) {
			$list .= "<option value=\"{$child['id']}\"";
			if ($child['id'] == $catId) {
				$list.= " selected";
			}
			
			$list .= ">{$child['name']}</option>\r\n";
		}
		
		$list .= "</optgroup>";
	}
	
	return $list;
}



/*
	Tạo thumbnail của $srcFile và lưu vào $destFile.
	Thumbnail có kích thước $width pixel.
*/
function createThumbnail($srcFile, $destFile, $width, $quality = 75)
{
	$thumbnail = '';
	
	if (file_exists($srcFile)  && isset($destFile))
	{
		$size        = getimagesize($srcFile);
		$w           = number_format($width, 0, ',', '');
		$h           = number_format(($size[1] / $size[0]) * $width, 0, ',', '');
		
		$thumbnail =  copyImage($srcFile, $destFile, $w, $h, $quality);
	}
	
	// trả về tên file thumbnail khi thành công hoặc để trắng nếu không được
	return basename($thumbnail);
}

/*
	Cop ảnh tới file đích. Cỡ ảnh được thiết lập $w X $h pixel
*/
function copyImage($srcFile, $destFile, $w, $h, $quality = 75)
{
    $tmpSrc     = pathinfo(strtolower($srcFile));
    $tmpDest    = pathinfo(strtolower($destFile));
    $size       = getimagesize($srcFile);

    if ($tmpDest['extension'] == "gif" || $tmpDest['extension'] == "jpg")
    {
       $destFile  = substr_replace($destFile, 'jpg', -3);
       $dest      = imagecreatetruecolor($w, $h);
       imageantialias($dest, TRUE);
    } elseif ($tmpDest['extension'] == "png") {
       $dest = imagecreatetruecolor($w, $h);
       imageantialias($dest, TRUE);
    } else {
      return false;
    }

    switch($size[2])
    {
       case 1:       //GIF
           $src = imagecreatefromgif($srcFile);
           break;
       case 2:       //JPEG
           $src = imagecreatefromjpeg($srcFile);
           break;
       case 3:       //PNG
           $src = imagecreatefrompng($srcFile);
           break;
       default:
           return false;
           break;
    }

    imagecopyresampled($dest, $src, 0, 0, 0, 0, $w, $h, $size[0], $size[1]);

    switch($size[2])
    {
       case 1:
       case 2:
           imagejpeg($dest,$destFile, $quality);
           break;
       case 3:
           imagepng($dest,$destFile);
    }
    return $destFile;

}

/*
	Tạo link phân trang
*/
function getPagingNav($sql, $pageNum, $rowsPerPage, $queryString = '')
{
	$result  = mysql_query($sql) or die('Error, query failed. ' . mysql_error());
	$row     = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
	
	// số trang ta có khi phân trang
	$maxPage = ceil($numrows/$rowsPerPage);
	
	$self = $_SERVER['PHP_SELF'];
	
	// Tạo link 'previous' và 'next'
	// 'first page' và 'last page'
	
	// In ra 'previous' chỉ khi không ở trang 1
	if ($pageNum > 1)
	{
		$page = $pageNum - 1;
		$prev = " <a href=\"$self?page=$page{$queryString}\">[Prev]</a> ";
	
		$first = " <a href=\"$self?page=1{$queryString}\">[First Page]</a> ";
	}
	else
	{
		$prev  = ' [Prev] ';       // Ở trang 1, không bật 'previous' link
		$first = ' [First Page] '; // và không 'first page' link
	}
	
	// in ra 'next' link chỉ khi không ở trang cuối
	if ($pageNum < $maxPage)
	{
		$page = $pageNum + 1;
		$next = " <a href=\"$self?page=$page{$queryString}\">[Next]</a> ";
	
		$last = " <a href=\"$self?page=$maxPage{$queryString}{$queryString}\">[Last Page]</a> ";
	}
	else
	{
		$next = ' [Next] ';      // ở trang cuối, không bật 'next' link
		$last = ' [Last Page] '; // và không 'last page' link
	}
	
	// trả về trang thường
	return $first . $prev . " Showing page <strong>$pageNum</strong> of <strong>$maxPage</strong> pages " . $next . $last; 
}
?>