
<?php
	include("modules/editor/editor1.php");
	
?>

<?php
	$sql = "	 SELECT	*
				FROM	tbl_transaction tra
				INNER JOIN	tbl_order_d od
				ON 		tra.tra_id = od.tra_id
				INNER JOIN	tbl_product pd
				ON 		od.pd_id = pd.pd_id
				WHERE tra.tra_id = '$_GET[id]'				
			";
	$donhang = mysql_query($sql);//thực hiện câu lệnh sql
	
	$row = mysql_fetch_array($donhang);
?>
<form action="modules/donhang/xuly.php?role_id=<?php echo $_GET['role_id'] ?>&id=<?php echo $row["tra_id"] ?>" method="post" >
	<div class="left" style="padding-left:30px; margin-top:10px">	
		<table width="909" height="170" border="1">
		  <tr>
			<td height="37" colspan="5"><div align="center" style="color:#CC0033"><strong>THÔNG TIN GIAO DỊCH</strong></div></td>
		  </tr>
		  <tr>
		    <td width="161" height="40"><strong>Mã giao dịch: </strong></td>
		    <td colspan="2"><?php echo $row["tra_id"] ?></td>
			<td height="40"><strong>Ngày nhận hàng:</strong></td>
			<td width="301"><?php echo $row["tra_recieve"] ?></td>
		  </tr>
		  <tr>
		    <td height="33"><strong>Phương thức thanh toán: </strong></td>
		    <td colspan="2"><?php echo $row["tra_payment"] ?></td>
		    <td width="142" height="40"><strong>Ngày đặt hàng:</strong></td>
		    <td><?php echo $row["tra_date"] ?></td>
		  </tr>
		  <tr>
		    <td height="43"><strong>Trạng thái:</strong></td>
		    <td width="153"><select name="trangthai" id="trangthai">
		      <?php if($row["tra_status"] == "1") {?>
		      <option value="1" selected="selected">Hoàn thành</option>
		      <option value="0">Mới</option>
              <option value="-1">Hủy</option>
		      <?php }else if($row["tra_status"] == "-1"){ ?>
		      <option value="1" >1</option>
              <option value="0">Mới</option>
		      <option value="-1" selected="selected">Hủy</option>		      
              <?php }else { ?>
		      <option value="1" >Hoàn thành</option>
              <option value="-1">Hủy</option>
		      <option value="0" selected="selected">Mới</option>
		      <?php } ?>
	        </select></td>
		    <td width="130"><strong>
		      <input name="sua" type="submit" value=" Sửa trạng thái " id="sua" />
            </strong> &nbsp;</td>
		    <td><strong>Ghi chú:</strong></td>
		    <td><?php echo $row["tra_message"] ?>;</td>
	      </tr>
	  </table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<table width="907" height="172" border="1">
		  <tr>
		    <td height="37" colspan="4"><div align="center" style="color:#CC0033"><strong>CHI TIẾT ĐƠN HÀNG</strong></div></td>
	      </tr>
		  <tr>
		    <td width="354" height="40"><div align="center"><strong>Tên sách</strong></div></td>
		    <td><div align="center"><strong>Đơn giá</strong></div></td>
		    <td><div align="center"><strong>Số lượng</strong></div></td>
		    <td width="224" height="40"><div align="center"><strong>Thành tiền</strong></div></td>
	      </tr>
<?php
	$sql = "	 SELECT	*
				FROM	tbl_transaction tra
				INNER JOIN	tbl_order_d od
				ON 		tra.tra_id = od.tra_id
				INNER JOIN	tbl_product pd
				ON 		od.pd_id = pd.pd_id
				WHERE tra.tra_id = '$_GET[id]'				
			";
	$donhang = mysql_query($sql);//thực hiện lại câu lệnh sql để lấy lại dữ liệu 
if(mysql_num_rows($donhang)!=0){
	while ($row1 = mysql_fetch_array($donhang)) {
?>
		  <tr>
		    <td height="33"><?php echo $row1["pd_name"]?></td>
		    <td><?php echo $row1["pd_price"] ?></td>
		    <td><?php echo $row1["od_qty"] ?></td>
		    <td height="40"><?php echo $row1["od_amount"] ?></td>
	      </tr>
<?php
	}
}
?>
		  <tr>
		    <td height="43">&nbsp;</td>
		    <td width="185">&nbsp;</td>
		    <td width="126"><strong>Tổng tiền</strong></td>
		    <td><?php echo $row["tra_amount"] ?></td>
	      </tr>
	  </table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<table width="907" height="125" border="1">
		  <tr>
		    <td height="37" colspan="5"><div align="center" style="color:#CC0033"><strong>THÔNG TIN KHÁCH HÀNG</strong></div></td>
	      </tr>
		  <tr>
		    <td width="165" height="40"><strong>Họ tên: </strong></td>
		    <td colspan="2"><?php echo $row["cus_fullname"] ?></td>
		    <td height="40"><strong>Số điện thoại:</strong></td>
		    <td width="311"><?php echo $row["cus_phone"] ?></td>
	      </tr>
		  <tr>
		    <td height="33"><strong>Địa chỉ</strong></td>
		    <td colspan="2"><?php echo $row["cus_address"] ?></td>
		    <td width="171" height="40"><strong>Email:</strong></td>
		    <td><?php echo $row["cus_email"] ?></td>
	      </tr>
	  </table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
	</div>
</form>