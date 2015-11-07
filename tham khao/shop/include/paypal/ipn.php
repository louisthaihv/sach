<?php
// Chỉ xử lý phương thức POST từ web paypal
// Chắc chắn là chỉ có một yêu cầu gửi từ paypal. Ta có thể kiểm tra địa chỉ IP phải bắt đầu với 66.135.197.
if (strpos($_SERVER['REMOTE_ADDR'], '66.135.197.') === false) {
	exit;
}

require_once 'paypal.inc.php';

// gửi lại các biến tới trang paypal cho mục đích xác thực
$result = fsockPost($paypal['url'], $_POST); 

//kiểm tra mã ipn nhận về từ paypal
if (eregi("VERIFIED", $result)) { 
	
        require_once '../../library/config.php';
            
        // kiểm tra đơn hàng chưa được xử lý trước đó
        $sql = "SELECT od_status
                FROM tbl_order
                WHERE od_id = {$_POST['invoice']}";

        $result = dbQuery($sql);

        // nếu chưa xử lý với số tìm thấy,thoát ra
        if (dbNumRows($result) == 0) {
            exit;
        } else {
        
            $row = dbFetchAssoc($result);
            
            // Xử lý báo cáo chỉ khi trạng thái là 'New'
            if ($row['od_status'] !== 'New') {
                exit;
            } else {

                // kiểm tra người mua đã gửi tổng tiền đúng
                $sql = "SELECT SUM(pd_price * od_qty) AS subtotal
                        FROM tbl_order_item oi, tbl_product p
                        WHERE oi.od_id = {$_POST['invoice']} AND oi.pd_id = p.pd_id
                        GROUP by oi.od_id";
                $result = dbQuery($sql);
                $row    = dbFetchAssoc($result);		
                
                $subTotal = $row['subtotal'];
                $total    = $subTotal + $shopConfig['shippingCost'];
                            
                if ($_POST['payment_gross'] != $total) {
                    exit;
                } else {
                   
					$invoice = $_POST['invoice'];
					$memo    = $_POST['memo'];
					if (!get_magic_quotes_gpc()) {
						$memo = addslashes($memo);
					}
					
                    // ok, báo cáo đã hoàn thiện
                    // ta có thể cập nhận trạng thái lên 'Paid'
                    // cập nhật memo
                    $sql = "UPDATE tbl_order
                            SET od_status = 'Paid', od_memo = '$memo', od_last_update = NOW()
                            WHERE od_id = $invoice";
                    $result = dbQuery($sql);
                }
            }
        }

} else { 
	exit;
} 


?>

