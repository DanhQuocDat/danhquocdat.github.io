da	<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<div class="main">
	
	<div class="content">
		<div class="content_top">
			<div class="heading">
			<h3>SMARTWATCH</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="ptrang">
			<?php 
				//Phân Trang Sản Phẩm Thông minh
				$product_all = $product->getallproduct_protm();
				$product_count = mysqli_num_rows($product_all);
				$product_num = ceil($product_count/16);
				$i=0;
				for($i=1; $i<=$product_num; $i++){
					echo '<a class="phantrang" href="allprotm.php?page3='.$i.' ">'.$i.'</a>';
				}
			?>
		</div>
      	<div class="section group">
      		<?php
      			$product_allpro = $product->getproducttm_allpro();
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

