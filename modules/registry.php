<head>
	<meta charset="utf-8" />
</head>
<?php
include("config.php");
if(isset($_POST['dangky'])) {

	//post varable from register form
	
	$hoTen	= trim($_POST['fullname']);		
	$email 	= trim($_POST['email']);
	$phone 	= trim($_POST['phone']);
	$address	= trim($_POST['address']);
	$username 	= trim($_POST['username']);
	$password 	= $_POST['password'];
	$re_Password 	= $_POST['re_password'];
	$passwordToDB	= md5($password);

	$sql = "SELECT * FROM tbl_customer WHERE cus_username ='" . $username."'";
	
	if ($result=mysql_query($sql)) {
		
		$rowcount=mysql_num_rows($result);
		if($rowcount !=0) {
			header("location: ../index.php?ac=registry&acdk=dangkythatbai");
		} else {
			$sql = "INSERT INTO tbl_customer 	(`cus_username`, `cus_password`, `cus_fullname`, `cus_email`, `cus_address`, `cus_phone`, `cus_date` ) VALUES('".$username."', '".$password."', '".$hoTen."', '".$email."','".$address."','".$phone."',NOW())";
			//die($sql);
			if(mysql_query($sql) == TRUE) {
				header("location: ../index.php?ac=login&acdk=dangkythanhcong");
              
			} else {
				echo 'Error: <b>' . $sql . '</b><br/>' ;
			}
		}
	} else {
		die('error');
	}

} else {
	die('access denine!');
}
?>