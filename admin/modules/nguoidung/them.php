
<?php
	include("modules/editor/editor1.php");
	
?>
<form action="modules/nguoidung/xuly.php?role_id=<?php echo $_GET['role_id'] ?>&" method="post" id="register">
	<div class="left" style="padding-left:30px; margin-top:10px">	
		<table width="1019" height="239" border="0">
		  <tr>
			<td height="37" colspan="5"><div align="center" style="color:#CC0033"><strong>CHỨC NĂNG THÊM MỚI NGƯỜI DÙNG</strong></div></td>
		  </tr>
		  <tr>
		    <td width="184" height="40"><strong>Tên đăng nhập: </strong>(<span class="required">*</span>)</td>
		    <td colspan="2">
		     <div id="username_err" style="color:red"></div>
		    	<input name="tendangnhap" type="text" id="tendangnhap" />
  &nbsp;</td>
			<td width="146" height="40"><strong>Họ tên:</strong>(<span class="required">*</span>)</td>
			<td>
			<div id="hoten_err" style="color:red"></div>
			<input type="text" name="hoten" id="hoten" /></td>
		  </tr>
		  <tr>
		    <td height="37"><strong>Mật khẩu: </strong>(<span class="required">*</span>)</td>
		    <td colspan="2">
		    	<div id="password_err" style="color:red"></div>
		    	<input name="matkhau" type="text" id="matkhau" />
  &nbsp;</td>
		    <td><strong>Email:</strong>(<span class="required">*</span>)</td>
			<td>
			<div id="email_err" style="color:red"></div>
			<input type="text" name="email" id="email" /></td>
		  </tr>
		  <tr>
		    <td height="42"><strong>Tên quyền:</strong></td>
		    <td colspan="2"><?php
				
				$sql = "
							SELECT	*
							FROM	tbl_role
						";
				$quyen = mysql_query($sql);
			?>
		      <select name="maquyen" >
		        <?php
			 	while($row_quyen = mysql_fetch_array($quyen)) {
			 ?>
		        <option value="<?php echo $row_quyen["role_id"] ?>"><?php echo $row_quyen["role_name"] ?></option>
		        <?php
				}
			 ?>
	          </select></td>
		    <td><strong>Nơi ở:</strong>(<span class="required">*</span>)</td>
			<td><div id="noio_err" style="color:red"></div><input name="noio" type="text" id="noio" /></td>
		  </tr>
		  <tr>
		    <td height="43"><strong>Trạng thái:</strong></td>
		    <td colspan="2"><select name="trangthai" id="trangthai">
		      <option value="1" selected="selected">1</option>
		      <option value="0">0</option>
	        </select></td>
		    <td><strong>Ghi chú:</strong></td>
		    <td><input type="text" name="ghichu" id="ghichu" /></td>
	      </tr>
		  <tr>
			<td height="26">&nbsp;</td>
			<td width="171"><strong>
		    <input name="them" type="submit" value="  Thêm  ">
			</strong>			&nbsp;</td>
			<td width="162"><input name="reset" type="reset" id="reset" value="   Hủy   " />
&nbsp;</td>
			<td>&nbsp;</td>
			<td width="334">&nbsp;</td>
		  </tr>
	  </table>
	</div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $( "#register" ).submit(function( event ) {
         var pass = $('input[name=matkhau]').val();
         var username = $('input[name=tendangnhap]').val();
         var hoten = $('input[name=hoten]').val();
         var email = $('input[name=email]').val();
         var noio = $('input[name=noio]').val();
         if(username.length <6 || username.length >15){
            $("#username_err").text("Tên đăng nhập từ 6 -15 ký tự");
            return false;
         }
         if(hoten.length <6 || hoten.length >15){
            $("#hoten_err").text("Tên đăng nhập từ 6 -15 ký tự");
            return false;
         }
         if(!email.length > 0){
            $("#email_err").text("Nhập Email!");
            return false;
         }
         if(!isEmail(email)){
            $("#email_err").text("Email không đúng định dạng");
            return false;
         }
         if(pass.length <6 || pass.length >15){
            $("#password_err").text("Mật khẩu từ 6 -15 ký tự");
            return false;
         }
        if(noio.length <15){
            $("#noio_err").text("Nơi ở > 15 kí tự");
            return false;
         }
          return true;
        });
    });

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
</script>