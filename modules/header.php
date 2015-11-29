<?php 
  $sql = "SELECT * FROM tbl_product ORDER BY pd_view DESC LIMIT 10";
  $products = mysql_query($sql);
  $num_rows = mysql_num_rows($products);
?>
<div class="header">
      	<div id="logo"><img src="images/bookstore.png" alt="image"/></div>
        <div class="slider" >
        	<div class="top-divider"><img src="images/header_divider.png" alt="image"/></div>
            <!--<div class="slide-content" >
            	<div class="content">
                	<img src="images/naruto%201.jpg" height="110" alt="image" class="slide-img"/>
                    <div class="slide-details" >
                    	<div class="slide-title">NARUTO</div>
                        <div class="slide-text">
                        Naruto là một cậu bé có mơ ước trở thành hokage của làng Konoha, được Hokage phong ấn trong người một trong 9 quái vật của thể giới: Cửu vĩ Hồ ly. Vì cho cậu là một con quái ..
                        </div>
                        <a href="#" class="details">  details </a>
                    </div>
                </div>
                <div class="clr"></div>
            	<div class="pagination">
             <?php 
                for($i = 1; $i<10; $i++) {
              ?>
                <span 
                <?php if($i ==1){
                  echo "class='current'";
                }?>
                ><?=$i; ?></span>
              <?php 
                }
              ?>
              </div>
            
            </div>-->
            <div class="slide-holder">
              <div class="slide-pager">
                  <div class="slide-control-prev">«</div>
                  <div class="slide-control-next">»</div>
              </div>
              <div class="slide-container">
                  <div class="slide-stage">
                  <?php 
                    while ($dong = mysql_fetch_array($products)) {
                  ?>
                      <div class="slide-image"><a href="index.php?ac=product&cat_id=<?php echo $dong['cat_id'] ?>&pd_id=<?php echo $dong['pd_id'] ?>"><img src="images/<?php echo $dong['pd_image'] ?>"/></a></div>
                  <?php 
                    }
                  ?>
                  </div>
              </div>
          </div>            
            <div class="top-divider"><img src="images/header_divider.png" alt="image"/></div>
        </div>
</div>