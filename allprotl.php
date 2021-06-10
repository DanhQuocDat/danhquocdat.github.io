<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<div class="main">
	
	<div class="content">
		<div class="content_top">
			<div class="heading">
			<h3>Đồng Hồ <?php echo $n=$_GET['n']; ?></h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="ptrang">
			<?php 
				//Phân Trang Sản Phẩm Đồng Hồ Nam
				$type=$_GET['type'];	
				$product_all = $product->getallproduct_feathered($type);
				$product_count = mysqli_num_rows($product_all);
				$product_num = ceil($product_count/8);
				$current_page = !empty($_GET['page1'])?$_GET['page1']:1;
				$i=0;
				if($current_page>3){
					echo '<a class="phantrang" href="allprotl.php?type='.$type.' &n='.$n.' &page1=1">'.'First</a>';
				}
				if($current_page>1){
					echo '<a class="phantrang" href="allprotl.php?type='.$type.' &n='.$n.' &page1='.($current_page-1).' ">'.'<'.'</a>';
				}
				for($i=1; $i<=$product_num; $i++){
					if($i != $current_page){
						if($i>$current_page-3 && $i<$current_page+3){
							echo '<a class="phantrang" href="allprotl.php?type='.$type.' &n='.$n.' &page1='.$i.' ">'.$i.'</a>';
						}
					}else{
						echo '<strong class="current">'.$i.'</strong>';
					}
				}
				if($current_page<$product_num-1){
					echo '<a class="phantrang" href="allprotl.php?type='.$type.' &n='.$n.' &page1='.($current_page+1).' ">'.'>'.'</a>';
				}
				if($current_page<$product_num-3){
					echo '<a class="phantrang" href="allprotl.php?type='.$type.' &n='.$n.' &page1='.$product_num.'">'.'Last</a>';
				}
			?>
		</div>
      	<div class="section group">
      		<?php
      			$product_feathered = $product->getproduct_feathered($type);
      			if($product_feathered){
      				while ($result = $product_feathered->fetch_assoc()) {
      				
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

