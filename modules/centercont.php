<div class="center-content">
<?php
	if (isset($_GET['ac']) && $_GET['ac'] == "category"){
		$sql = "SELECT * FROM tbl_product WHERE cat_id = '$_GET[cat_id]' LIMIT 6 ";				
		echo " <div class=center-title-bar>".$_GET['cat_name']."</div>";     
	}else if(isset($_POST['key']) && !empty($_POST['key'])){
 		$select = $_POST["select"];
		if($select == "tensach") {		
    	$sql ="	SELECT * 
				FROM tbl_product 
				WHERE pd_name  
				LIKE '%". mysql_real_escape_string($_POST['key']) ."%'	";		
		}else if($select == "tentacgia") {		
    		$sql ="	SELECT * 
				FROM tbl_product 
				WHERE pd_author  
				LIKE '%". mysql_real_escape_string($_POST['key']) ."%'	";
		}else {		
    		$sql ="	SELECT * 
				FROM tbl_product 
				WHERE pd_price  
				LIKE '%". mysql_real_escape_string($_POST['key']) ."%'	";
		}
		echo " <div class=center-title-bar>Kết quả tìm kiếm</div>"; 
	}else {
		$sql = " SELECT * FROM tbl_product WHERE 1=1 ORDER BY pd_id DESC LIMIT 6 ";				
		echo " <div class=center-title-bar>Sách mới nhất</div>"; 
	}

	$product = mysql_query($sql) or die("Query: " . $query . " error!");
	while ($dong = mysql_fetch_array($product)) {?>
	<div class="prod-box">
		<div class="top-prod-box"></div>
		<div class="center-prod-box">
			<div class="product-title">
             <a href="index.php?ac=product&cat_id=<?php echo $dong['cat_id'] ?>&pd_id=<?php echo $dong['pd_id'] ?>"><?php echo $dong['pd_name'] ?></div>
              <div class="product-img"><img src="images/<?php echo $dong['pd_image'] ?>"  alt="sac-thu-ha-noi" width="133" height="193"></div>
              <div class="product-price" >
              <span class="reduce"></span>
              <span class="price"><?php echo $dong['pd_price']." VND" ?></span>
              </div>
            </a>
		</div>
		<div class="bottom-prod-box"></div>
		
		<div class="prod-details-tab">
		<a href="modules/addcart.php?pd_id=<?php echo $dong['pd_id']?>" title="header=[Add to cart] body=[&nbsp;]"><img src="images/cart.gif"  alt="cart" class="left-bt"></a>
		<a href="#" title="header=[Add to special] body=[&nbsp;]"><img src="images/favs.png" alt="special" class="left-bt"></a>
		<a href="#" title="header=[gift] body=[&nbsp;]"><img src="images/favorites.gif"  alt="gift" class="left-bt"></a>
		<a href="index.php?ac=product&cat_id=<?php echo $dong['cat_id'] ?>&pd_id=<?php echo $dong['pd_id'] ?>" class="prod-details">Details</a>
		</div>    
	</div>   
    
	<?php 
	}
	echo "</div>";	
	?>
