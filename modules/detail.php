<?php
	$sql = "SELECT * FROM tbl_product WHERE pd_id = '$_GET[pd_id]'";
	$product = mysql_query($sql);
    $num_rows = mysql_num_rows($product);
    $dong = mysql_fetch_array($product);
    $view = $dong['pd_view'] + 1;
    if($num_rows  == 1){
        $sql_update = "UPDATE tbl_product SET pd_view = ".$view. " WHERE pd_id = $_GET[pd_id]";
        mysql_query($sql_update);
    }
?>
<div class="center_content">
  <div class="prod_box_big">
        <div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">
            <div class="product_img_big">
                <a title="header=[Zoom] body=[&nbsp;]">
                    <img src="images/<?php echo $dong['pd_image'] ?>" width="130" height="180" alt="Laptop" />
                </a>               
                <?php /*?><div class="thumbs">
                    <a href="#" title="header=[thumb1] body=[&nbsp;]"><img src="images/thumb1.gif" alt="Laptop" /></a>
                    <a href="#" title="header=[thumb2] body=[&nbsp;]"><img src="images/thumb1.gif" alt="Laptop" /></a>
                    <a href="#" title="header=[thumb3] body=[&nbsp;]"><img src="images/thumb1.gif" alt="Laptop" /></a>
                </div><?php */?>
            </div>
            <div class="details_big_box">
                <div class="product_title_big"><?php echo $dong['pd_name'] ?></div>
                <div class="specifications"> <strong>Tác giả: <?php echo $dong['pd_author'] ?></strong></div>
                <span class="reduce"></span>
                <div class="product_price" style="font-size:15px">
                <span class="price"><strong>Price: <?php echo $dong['pd_price']." VND"; ?><br /></strong></span>
                </div> <br />            
                	<?php
                    // nếu ta vẫn có sản phẩm kho
                    // hiển thị nút 'Add to cart'
                    if ($dong['pd_qty'] > 0) {
                    ?>
                    <!--<a href="#" class="addtocart">add to cart</a>
                    <a href="#" class="compare">compare</a>-->
              <a title="header=[Add to cart] body=[&nbsp;]" class="addtocart"><input style="margin-top:5px" type="button" value="  Thêm vào giỏ  " onclick="window.location='modules/addcart.php?pd_id=<?php echo $dong['pd_id']?>'" /></a>
                    <?php
                    } else {
                        echo 'Hết hàng!';
                    }
                    ?>
                 <a class="back"><input style="margin-top:5px" type="button" value="  Trở lại  " onclick="history.back(-1)" /></a>   
                
          </div>
        	<div class="clr"></div><br /> 
            <div class="description"> <?php echo $dong['pd_description']; 
            ?></div>  
        </div>
         
        <div class="bottom_prod_box_big"></div>
  </div>
</div>