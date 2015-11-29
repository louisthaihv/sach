<?php
session_start();
ob_start();
include("config.php");

if (isset($_POST['submit'])){
		$id = session_id();
		$hoten = $_POST['hoten'];
		$email = $_POST['email'];
		$dienthoai = $_POST['dienthoai'];
		$diachi = $_POST['diachi'];
		$ghichu = $_POST['ghichu'];
		$thanhtoan = $_POST['thanhtoan'];
		$ngaynhan = $_POST['ngaynhan'];
		$tongtien = $_POST['tongtien'];
		
		//neu nhan nut dat hang thi luu thong tin vao phien giao dich
		$result2 = mysql_query("INSERT INTO `sach`.`tbl_transaction` (`tra_status`, `cus_fullname`, `cus_address`, `cus_email`, `cus_phone`, `tra_message`,`tra_amount`, `tra_payment`,`tra_date`) VALUES ('0','$hoten', '$diachi', '$email', '$dienthoai', '$ghichu','$tongtien', '$thanhtoan', NOW())");		
		//lay ma phien giao dich vua luu
		if($result2){
			$row_layMa = mysql_fetch_array(mysql_query("SELECT tra_id FROM tbl_transaction WHERE  1=1 ORDER BY tra_id DESC limit 1"));
			$tra_id = $row_layMa['tra_id'];
		//lay tat ca sach tu gio hang thuoc session hien tai
		$result = mysql_query("SELECT * FROM tbl_cart ct INNER JOIN tbl_product pd ON ct.pd_id = pd.pd_id WHERE ct.ct_session_id in ('$id')");
		//
			while ($row = mysql_fetch_array($result)){
				//gia tien moi don hang
				$od_amount =$row['ct_qty']*$row['pd_price'];
				//luu lai chi tiet don hang thuoc phien giao dich
				$result4 = mysql_query("INSERT INTO `sach`.`tbl_order_d` (`tra_id`, `pd_id`, `od_qty`, `od_amount`) VALUES ('$tra_id','{$row['pd_id']}', '{$row['ct_qty']}', '$od_amount')");			
			}
		//Xoa gio hang thuoc session hien tai		
		$result5 = mysql_query("DELETE FROM tbl_cart WHERE ct_session_id in ('$id')");
		session_destroy();
		}
		//lay email cua hang
		$sql = "SELECT * FROM tbl_shop_config";
		$shop = mysql_query($sql);
		$row_shop = mysql_fetch_array($shop);
		if ($thanhtoan =='nganluong'){
			header("location:https://www.nganluong.vn/button_payment.php?receiver=".$row_shop["sc_email"]."&product_name=".$tra_id."&price=".$tongtien."&return_url=success.php&comments=(Ghi chú về đơn hàng)");
		} else {
			header("location: ../index.php?ac=thanhcong");
		}
}
?>