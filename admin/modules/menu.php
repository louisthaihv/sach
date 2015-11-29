<?php

if (isset($_GET['role_id']) ){
	
	$sql = "SELECT * 
			FROM tbl_role r
			INNER JOIN tbl_role_function rf
			ON  r.role_id = rf.role_id
			INNER JOIN tbl_function f
			ON rf.function_id = f.function_id
			WHERE r.role_id = {$_GET['role_id']}
			";
 //else header("location: ../index.php?ac=login");
	//$role_id = $_GET['role_id'];
	$chucnang = mysql_query($sql);
	echo "<div id=menu>";
	if (mysql_num_rows($chucnang)!=0) {
		while ($row = mysql_fetch_array($chucnang)){
?>
	<a href="index.php?quanly=<?php echo $row['function_id'] ?>&role_id=<?php echo $_GET['role_id'] ?>&ac=lietke">
		<div id="box-chucnang">
			<img src="img/<?php echo $row['function_img'] ?>" alt="images" height="50" width="50" />
			<p><?php echo $row['function_name'] ?></p>
		</div>
	</a>
<?php
		}
	}
}
?>
	<a href="../index.php?ac=thoat">
		<div id="box-chucnang">
		  <img src="img/dangxuat.png" alt="images" height="50" width="50" />
		  <p>Đăng xuất </p>
	</div>
	</a>
 </div>
