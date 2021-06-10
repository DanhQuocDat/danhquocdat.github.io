<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<div class="main">
	
	<div class="content">
		<div class="content_top">
			<div class="heading">
			<h3><?php echo $name=$_GET['name']; ?></h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="ptrang">
			<?php 
				//Phân Trang Sản Phẩm menu
				$name=$_GET['name'];
				$type=$_GET['type'];
				$product_mn = $product->getallproductn_mn($name,$type);
				$product_count = mysqli_num_rows($product_mn);
				$product_num = ceil($product_count/8);
				$current_page = !empty($_GET['pagemn'])?$_GET['pagemn']:1;
				$i=0;
				if($current_page>3){
					echo '<a class="phantrang" href="donghotl.php?name='.$name.' &type='.$type.'&pagemn=1">'.'First</a>';
				}
				if($current_page>1){
					echo '<a class="phantrang" href="donghotl.php?name='.$name.' &type='.$type.'&pagemn='.($current_page-1).' ">'.'<'.'</a>';
				}
				for($i=1; $i<=$product_num; $i++){
					if($i != $current_page){
						if($i>$current_page-3 && $i<$current_page+3){
							echo '<a class="phantrang" href="donghotl.php?name='.$name.' &type='.$type.'&pagemn='.$i.' ">'.$i.'</a>';
						}
					}else{
						echo '<strong class="current">'.$i.'</strong>';
					}
				}
				if($current_page<$product_num-1){
					echo '<a class="phantrang" href="donghotl.php?name='.$name.' &type='.$type.'&pagemn='.($current_page+1).' ">'.'>'.'</a>';
				}
				if($current_page<$product_num-3){
					echo '<a class="phantrang" href="donghotl.php?name='.$name.' &type='.$type.'&pagemn='.$product_num.'">'.'Last</a>';
				}
				// $i=0;
				// for($i=1; $i<=$product_num; $i++){
				// 	echo '<a class="phantrang" href="donghotl.php?name='.$name.' &type='.$type.'&pagemn='.$i.' ">'.$i.'</a>';
				// }
			?>
		</div>
      	<div class="section group">
      		<?php
      			$name=$_GET['name'];
      			$type=$_GET['type'];
      			$product_dh = $product->getproduct_dhn($name,$type);
      			if($product_dh){
      				while ($result = $product_dh->fetch_assoc()) {
      				
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

