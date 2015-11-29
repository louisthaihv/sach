<div class="left-content">
    <!-- categories-->
        <div class="title-box">Danh mục Sách</div>

    <ul class="left-menu">
    	<?php				
		  $sql = "
					  SELECT	*
					  FROM	tbl_category
					  WHERE cat_parent_id = 0
				  ";
		  $category = mysql_query($sql);
		  
		  while($row_category = mysql_fetch_array($category)) {
		?>
     	<li><strong><a ><?php echo $row_category["cat_name"] ?></a></strong>
          <ul class="left-menu">
              <?php				
                $sql2 = "
                            SELECT	*
                            FROM	tbl_category
                            WHERE cat_parent_id = {$row_category["cat_id"]}
                        ";
                $category2 = mysql_query($sql2);
                
                while($row_category2 = mysql_fetch_array($category2)) {
              ?>
                      <li><strong><a href="index.php?ac=category&cat_name=<?php echo $row_category2['cat_name'] ?>&cat_id=<?php echo $row_category2['cat_id'] ?>"><?php echo $row_category2["cat_name"] ?></a></strong></li>
              <?php
                
                 }
              ?> 
          </ul> 
     	</li>
    	<?php
			  
		  }
		?>
    </ul>

<?php
	$sql3 = " SELECT * FROM tbl_product WHERE 1=1 ORDER BY pd_id DESC LIMIT 10 ";
	$product = mysql_query($sql3);
?>
 <div class="title-box">Specials Product</div>
   <div class="boder-box">
   <?php $dong = mysql_fetch_array($product)?>
      <div class="product-title"><a href="index.php?ac=product&cat_id=<?php echo $dong['cat_id'] ?>&pd_id=<?php echo $dong['pd_id'] ?>"><?php echo $dong['pd_name'] ?></div>
      <div class="product-img"><img width="140" height="200" src="images/<?php echo $dong['pd_image'] ?>"  alt="bac-ho"></div>
      <div class="product-price" >
      <span class="reduce"></span>
      <span class="price"><?php echo $dong['pd_price']." VND" ?></span>
      </div>
      </a>
   </div>
   
 <?php /*?><div class="title-box">Yeu cau</div>
   <div class="boder-box">
      <input type="text" name="yeu cau" class="yeucau-input" value="ten sach"/>
      <a href="#" class="sent">sent</a>
   </div>
   <?php */?>
   <div class="banner-adds">
      <a href="#"><img src="images/banner%20trái.jpg" alt="quang cao" /></a>
   </div>
   
</div>