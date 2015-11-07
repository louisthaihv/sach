<?php
	$sql = "SELECT * FROM tbl_product WHERE pd_id = '$_GET[pd_id]'";
	$product = mysql_query($sql);
	$dong = mysql_fetch_array($product);
?>
<div class="center_content">
  <div class="prod_box_big">
        <div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">
            <div class="product_img_big">
                <a href="#" title="header=[Zoom] body=[&nbsp;]">
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
                <div class="specifications">
                    Disponibilitate: <span class="blue">In stoc</span><br />
                    Garantie: <span class="blue">24 luni</span><br />
                    Tip transport: <span class="blue">Mic</span><br />
                    Petul include: <span class="blue">TVA</span><br />
                </div>
                <div class="product_price"> <span class="reduce">350$</span> <span class="price">270$</span> </div>
                
                <a href="#" class="addtocart">add to cart</a>
                <a href="#" class="compare">Back</a>
            </div>
        </div>
        <div class="bottom_prod_box_big"></div>
    </div>
 
</div>
