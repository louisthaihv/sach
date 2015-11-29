<div class="clr"></div>
      <div class="content">
      	<div id="menu-tab">
        	<!-- menu tab-->
            <div class="left-menu-corner"></div>
            	<ul class="menu">
                	<li><a href="index.php" id="nar_hom">Home</a></li>
                    <li class="divider"></li>
                    <li><a href="#" id="nar_pro">Products</a></li>
                    <li class="divider"></li>
                    <li><a href="#" id="nar_spe">Specials</a></li>
                    <li class="divider"></li>
                    
                    <li><a href="#" id="nar_shipping">Giao hàng</a></li>
                    <li class="divider"></li>
                    <?php 						
            			if(isset( $_GET['acc'])){ 
					?>
					<li><a href="#" id="nar_acc">My account:<?php echo  $_GET['acc'] ?></a></li>
                    <li class="divider"></li>
                    <li><a href="index.php?ac=thoat" id="nar_acc">Đăng xuất</a></li>
                    <li class="divider"></li>
                    <?php
						}else{	
					?>
                    <li><a href="index.php?ac=login" id="nar_sig">Đăng nhập</a></li>
                    <li class="divider"></li>
                    <li><a href="index.php?ac=registry" id="nar_con">Đăng ký</a></li>
                    <li class="divider"></li>    
                    <?php
						}
					?>                
                </ul>
            <div class="right-menu-corner"></div>
        </div>
           
		<?php
			include("modules/leftcont.php");
			
			if (isset($_GET['ac']) && $_GET['ac'] == "product"){
				include("modules/detail.php");
			}else if (isset($_GET['ac']) && $_GET['ac'] == "registry"){
				include("modules/frmregistry.php");
			}else if (isset($_GET['ac']) && $_GET['ac'] == "login"){
				include("modules/frmlogin.php");
			}else {
				include("modules/centercont.php");
			}
		?>
       
       
       
        <!--right content-->
        
         <div class="right-content" >
         	<!-- shopping card-->
            <div class="shopping-cart" >
            	<div class="cart-title"> Shopping cart</div>
                <span class="boder-top-cart"></span>
                <div class="cart-detals"> 
        <?php
		//lay tat ca sach tu gio hang thuoc session hien tai
		$id = session_id();
		$result = mysql_query("SELECT * FROM tbl_cart ct INNER JOIN tbl_product pd ON ct.pd_id = pd.pd_id WHERE ct.ct_session_id in ('$id')");
		$total = 0;
		$count = 0;
			while ($row = mysql_fetch_array($result)){
				//gia tien moi don hang
				$od_amount =$row['ct_qty']*$row['pd_price'];
				$total = $total + $od_amount;
				$count = $count + $row['ct_qty'];
		?>
        	
              <?php echo $row['pd_name']?> 
                <span class="boder-cart"></span>
      <?php } ?>                    
                Tổng tiền:  <span class="price"><?php echo $total?></span><p>&nbsp;</p>
              </div>                
                <div class="cart-icon">
                                	<p><a href="modules/cart.php" title="Quản lý giỏ hàng"><img src="images/shoppingcart.png" alt="shopping cart" /></a>
                              	  </p>
                                	
                </div>
            
       
            <div class="clr"></div>
            <!-- what new-->
            <div class="new" >
              <div class="title-box">What new ?</div>
               <div class="boder-box">
                  <div class="product-title"><a href="#">Tổng thống Mỹ</a></div>
                  <div class="product-img"><img src="images/sach-tong-thong-my-nhung-bai-dien-van-noi-tieng.jpg" alt="tong-thong-my"></div>
                  <div class="product-price" >
                  <span class="reduce">350$</span>
                  <span class="price">300$</span>
                  </div>
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