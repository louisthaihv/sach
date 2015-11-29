<div class="center_content">
    <div class="center-title-bar">Đăng ký thành viên</div>
    <div class="prod_box_big">
        <div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">
            <div class="contact_form">
                <div class="form_row">
                <form action="modules/registry.php" method="post" id="register">
                    <div id="username_err" style="color:red"></div>
                    <label class="contact"><strong>Tên đăng nhập: (<span class="required">*</span>)</strong></label>
                    <input type="text" class="contact_input" name="username" />
                    
                <div class="form_row">
                    <div id="pass_err" style="color:red"></div>
                    <label class="contact"><strong>Mật khẩu: (<span class="required">*</span>)</strong></label>
                    <input type="password" class="contact_input" name="password" />
                </div>
                <div class="form_row">
                    <div id="re_pass_err" style="color:red"></div>
                    <label class="contact"><strong>Nhập lại mật khẩu: (<span class="required">*</span>)</strong></label>
                    <input type="password" class="contact_input" name="re_password"/>
                </div>  
                <div class="form_row">
                    <label class="contact"><strong>Họ và tên: </strong></label>
                    <input type="text" class="contact_input" name="fullname"/>
                </div>
                <div class="form_row">
                    <div id="email_err" style="color:red"></div>
                    <label class="contact"><strong>Email: (<span class="required">*</span>)</strong></label>
                    <input type="text" class="contact_input" name="email"/>
                </div>
                
                <div class="form_row">
                    <label class="contact"><strong>Điện thoại:</strong></label>
                    <input type="text" class="contact_input" name="phone" />
                </div>
            
                <div class="form_row">
                    <label class="contact"><strong>Địa chỉ:</strong></label>
                    <input type="text" class="contact_input" name="address" />
                </div>    
                <div class="form_row">
                    <input type="submit" name="dangky" value="Đăng ký" class="contact"/>
                </div>      
            </form>
            </div> 
        </div>
        <div class="bottom_prod_box_big"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $( "#register" ).submit(function( event ) {
         var pass = $('input[name=password]').val();
         var re_pass = $('input[name=re_password]').val();
         var username = $('input[name=username]').val();
         var email = $('input[name=email]').val();
         if(username.length <6 || username.length >15){
            $("#username_err").text("Tên đăng nhập từ 6 -15 ký tự");
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
            $("#pass_err").text("Mật khẩu từ 6 -15 ký tự");
            return false;
         }
         if(re_pass.length <6 || re_pass.length >15){
            $("#re_pass_err").text("Mật khẩu từ 6 -15 ký tự");
            return false;
         }
         if(re_pass != pass){
            $("#re_pass_err").text("Mật khẩu không khớp");
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