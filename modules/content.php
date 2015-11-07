<div class="clr"></div>
      <div class="content">
      	<div id="menu-tab">
        	<!-- menu tab-->
            <div class="left-menu-corner"></div>
            	<ul class="menu">
                	<li><a href="#" id="nar_hom">Home</a></li>
                    <li class="divider"></li>
                    <li><a href="#" id="nar_pro">Products</a></li>
                    <li class="divider"></li>
                    <li><a href="#" id="nar_spe">Specials</a></li>
                    <li class="divider"></li>
                    <li><a href="#" id="nar_acc">My account</a></li>
                    <li class="divider"></li>
                    <li><a href="#" id="nar_sig">Sign up</a></li>
                    <li class="divider"></li>
                    <li><a href="<a href="index.php?xem=shipping" id="nar_shipping">Shipping</a></li>
                    <li class="divider"></li>
                    <li><a href="index.php?xem=contact" id="nar_con">Contact Us</a></li>
                    <li class="divider"></li>                    
                </ul>
            <div class="right-menu-corner"></div>
        </div>
           
		<?php
			include("modules/leftcont.php");
			
			if ($_GET['ac'] == "product"){
				include("modules/detail.php");
			}else {
				include("modules/centercont.php");
			}
		?>
       
       
       
        <!--right content-->
         <div class="right-content" >
         	<!-- shopping card-->
            <div class="shopping-cart" >
            	<div class="cart-title"> Shopping cart</div>
                <div class="cart-detals">
                	3 iterm<br />
                    <span class="boder-cart"></span>
                    Total:<span class="price">350$</span>
                </div>
                <div class="cart-icon">
                	<a href="#" title="header=[Checkout] body=[&nbsp;]"><img src="images/shoppingcart.png" alt="shopping cart" /></a>
                </div>
            </div>
            
            <!-- what new-->
            <div class="title-box">What new ?</div>
             <div class="boder-box">
              	<div class="product-title"><a href="#">Tổng thống Mỹ</a></div>
              	<div class="product-img"><img src="images/sach-tong-thong-my-nhung-bai-dien-van-noi-tieng.jpg" alt="tong-thong-my"></div>
                <div class="product-price" >
                <span class="reduce">350$</span>
                <span class="price">300$</span>
                </div>
             </div>
            
         	
           <?php /*?> <div class="title-box">Manufactor</div>
           	<ul class="left-menu">
            	<li class="od"><a href="#">Kim Đồng</a></li>
                <li class="od"><a href="#">abc book</a></li>
                <li class="od"><a href="#">alphabook</a></li>
                <li class="od"><a href="#">first new</a></li>
            </ul>
         
         
            <div class="banner-adds">
             <a href="#"><img src="images/banner%202.png" alt="quang cao" /></a>
             </div>
         <?php */?>
         
         </div>
          
      </div>