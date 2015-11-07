<?php
	if ($_GET['ac'] == "category"){
		$sql = "SELECT * FROM tbl_product WHERE cat_id = '$_GET[cat_id]' LIMIT 6 ";
		$product = mysql_query($sql);
	
?>

 <div class="center-content">
	<div class="center-title-bar"><?php echo $_GET['cat_name'] ?></div>
   
	<!-- 4 -->
	<?php while ($dong = mysql_fetch_array($product)) {?>
	<div class="prod-box">
		<div class="top-prod-box"></div>
		<div class="center-prod-box">
			<div class="product-title">
             <a href="index.php?ac=product&cat_id=<?php echo $dong['cat_id'] ?>&pd_id=<?php echo $dong['pd_id'] ?>"><?php echo $dong['pd_name'] ?></div>
              <div class="product-img"><img src="images/<?php echo $dong['pd_image'] ?>"  alt="sac-thu-ha-noi" width="133" height="193"></div>
              <div class="product-price" >
              <span class="reduce"></span>
              <span class="price"><?php echo $dong['pd_price'] ?></span>
              </div>
            </a>
		</div>
		<div class="bottom-prod-box"></div>
		
		<div class="prod-details-tab">
		<a href="modules/addcart.php?pd_id=<?php echo $dong['pd_id']?>" title="header=[Add to cart] body=[&nbsp;]"><img src="images/cart.gif"  alt="cart" class="left-bt"></a>
		<a href="#" title="header=[Add to special] body=[&nbsp;]"><img src="images/favs.png" alt="special" class="left-bt"></a>
		<a href="#" title="header=[gift] body=[&nbsp;]"><img src="images/favorites.gif"  alt="gift" class="left-bt"></a>
		<a href="#" class="prod-details">Details</a>
		</div>    
	</div>   
    
	<?php }
	echo "</div>";
	
	}else {
	?>
<div class="center-content">									   
 <div class="center-title-bar">Latest products</div>
 <?php
	$sql4 = " SELECT * FROM tbl_product WHERE 1=1 ORDER BY pd_id DESC LIMIT 6 ";
	$product2 = mysql_query($sql4);
	while ($dong2 = mysql_fetch_array($product2)) {
 ?>

   <!--product1-->
	<div class="prod-box">
		<div class="top-prod-box"></div>
		<div class="center-prod-box">
			<div class="product-title"><a href="index.php?xem=product&cat_id=<?php echo $dong2['cat_id'] ?>&pd_id=<?php echo $dong2['pd_id'] ?>"><?php echo $dong2['pd_name'] ?></a></div>
			<div class="product-img"><img src="images/<?php echo $dong2['pd_image'] ?>" width="133" height="193" alt="dac-nahn-tam"></div>
			<div class="product-price" >
			<span class="reduce"></span>
			<span class="price"><?php echo $dong2['pd_price'] ?></span>
			</div>
		</div>
		<div class="bottom-prod-box"></div>
		
		<div class="prod-details-tab">
		<a href="#" title="header=[Add to cart] body=[&nbsp;]"><img src="images/cart.gif"  alt="cart" class="left-bt"></a>
		<a href="#" title="header=[Add to special] body=[&nbsp;]"><img src="images/favs.png" alt="special" class="left-bt"></a>
		<a href="#" title="header=[gift] body=[&nbsp;]"><img src="images/favorites.gif"  alt="gift" class="left-bt"></a>
		<a href="#" class="prod-details">Details</a>
		</div>    
	</div> 
 <?php }?>  
 </div>
<?php 
	}
?>
		