	<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<div class="main">
	
	<div class="content">
		<div class="content_top">
			<div class="heading">
			<h3>Đồng Hồ Đeo Tay Chính Hãng</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="ptrang">
			<?php 
				//Phân Trang Sản Phẩm Đồng Hồ Nam
				$product_all = $product->getallproduct_pro();
				$product_count = mysqli_num_rows($product_all);
				$product_num = ceil($product_count/16);
				$current_page = !empty($_GET['page3'])?$_GET['page3']:1;
				$i=0;
				if($current_page>3){
					echo '<a class="phantrang" href="allproduct.php?page3=1">'.'First</a>';
				}
				if($current_page>1){
					echo '<a class="phantrang" href="allproduct.php?page3='.($current_page-1).' ">'.'<'.'</a>';
				}
				for($i=1; $i<=$product_num; $i++){
					if($i != $current_page){
						if($i>$current_page-3 && $i<$current_page+3){
							echo '<a class="phantrang" href="allproduct.php?page3='.$i.' ">'.$i.'</a>';
						}
					}else{
						echo '<strong class="current">'.$i.'</strong>';
					}
				}
				if($current_page<$product_num-1){
					echo '<a class="phantrang" href="allproduct.php?page3='.($current_page+1).' ">'.'>'.'</a>';
				}
				if($current_page<$product_num-3){
					echo '<a class="phantrang" href="allproduct.php?page3='.$product_num.'">'.'Last</a>';
				}
			?>
		</div>
      	<div class="section group">
      		<?php
      			$product_allpro = $product->getproduct_allpro();
      			if($product_allpro){
      				while ($result = $product_allpro->fetch_assoc()) {
      				
      		?>
			<div class="grid_1_of_4 images_1_of_4">
				 <a href="details.php?proid=<?php echo $result['productId'] ?>">
				 	<img src="admin/uploads/<?php echo $result['image'] ?>" alt="" />
				 </a>
				 <a href="details.php?proid=<?php echo $result['productId'] ?>">
				 	<h2><?php echo $result['productName'] ?> </h2>
				 </a>
				 <br>
				 <p><?php echo $fm->textShorten($result['pro_desc'],50) ?></p>
				 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."đ" ?></span></p>
			     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Chi Tiết</a></span></div>
			</div>
			<?php
					}
      			}
			?>
		</div>
	</div>
</div>

<?php 
	include 'inc/footer.php';
?>

